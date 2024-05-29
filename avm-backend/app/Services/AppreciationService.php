<?php
namespace App\Services;

use App\Models\Appreciation;
use App\Models\File;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AppreciationExport;
use App\Services\AccessCodeService;
use App\Services\ApiService;
use App\Services\CalculateService;
use App\Services\MailService;

class AppreciationService
{
    private AccessCodeService $accessCodeService;
    private ApiService $apiService;
    private CalculateService $calculateService;
    private MailService $mailService;

    public function __construct(
        AccessCodeService $accessCodeService,
        ApiService $apiService,
        CalculateService $calculateService,
        MailService $mailService
    )
    {
        $this->accessCodeService = $accessCodeService;
        $this->apiService = $apiService;
        $this->calculateService = $calculateService;
        $this->mailService = $mailService;
    }

    public function getAppreciationByAdmin($request){

        $adminType = $request->user()->user_types_id;
        if($adminType === 1){
            $type = 'coordinator_id';
        } else if ($adminType === 2){
            $type = 'supervisor_id';
        }

        try {
            $appreciations = Appreciation::where($type, $request->user()->id)->with('file')->get();
            return [ 'success' => true, 'appreciations' => $appreciations];
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return [ 'success' => false,  'error' => 'Error al obtener valoraciones' ];
        }
    }

    public function getAppreciationByClient($request){
        try {
            $appreciationsByClient = Appreciation::where('client_id', $request->user()->id)
                ->with('file')
                ->get();
            return [ 'success' => true, 'appreciations' => $appreciationsByClient ];
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return [ 'success' => false,  'error' => 'Error al obtener valoraciones de cliente' ];
        }
    }

    public function createAppreciation($request){
        try {
            if($request->data['newClient'] === true) {
                $client = new User();
                $client->name = $request->data['name'];
                $client->rut = $request->data['rut'];
                $client->user_types_id = 3;
                $client->email = $request->data['email'];
                $client->phone = $request->data['phone'];
                $client->save();
            } else {
                $client = User::where('rut', $request->data['rut'])->first();
            }
            $this->accessCodeService->createAccessCode($client->id);
            $appreciation = new Appreciation();
            $appreciation->client_id = $client->id;
            $appreciation->coordinator_id = $request->user()->id;
            $appreciation->supervisor_id = $request->data['typeSupervisor'];
            $appreciation->type_assets_id = $request->data['typeOfAsset'];
            $appreciation->access_code_id = 1;
            $appreciation->commune_id = $request->data['communeId'];
            $appreciation->address = $request->data['addressMap'];
            $appreciation->address_number = 123;
            $appreciation->rol = $request->data['rolBlock'].'-'.$request->data['rolPlotOfLand'];
            $appreciation->terrain_area =$request->data['terrainArea'];
            $appreciation->construction_area = $request->data['terrainConstruction'];
            $appreciation->bedrooms = $request->data['bedroom'];
            $appreciation->bathrooms = $request->data['bathroom'];
            $appreciation->latitude = $request->data['latitude'];
            $appreciation->longitude = $request->data['longitude'];
            $appreciation->status = true;
            $uf = $this->apiService->getUf(); // get uf
            $resCalculateValoranet = $this->calculateService->calculateValueValoranet($request->data);
            $resCalculateWitnesses = $this->calculateService->calculateValueWitnesses($request->data);
            $queryValoranet = $resCalculateValoranet['query_reference_valoranet'];
            $queryWitnesses = $resCalculateWitnesses['query_reference_witnesses'];
            $appreciation->value_uf_saved = $uf;
            $appreciation->value_uf_reference = $uf;
            $appreciation->value_uf_valoranet =  $resCalculateValoranet['value_uf_valoranet'];
            $appreciation->value_uf_report =  $resCalculateWitnesses['value_uf_reference'];
            $appreciation->quality = 10;
            $appreciation->save();
            $path = $client->id.'/appreciation'.$appreciation->id.'.xlsx';
            $this->mailService->generateExcelCoordinator($appreciation->id, $queryValoranet, $queryWitnesses, $path);
            $file = new File;
            $file->appreciation_id = $appreciation->id;
            $file->client_id = $client->id;
            $file->file_type_id = 2;
            $file->path = $path;
            $file->save();
            \Log::error('SERVICES_APPRECIATION_END');
            return [ 'success' => true, 'message' => 'La valoracion esta siendo procesada' ];
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return [ 'success' => false, 'message' => 'Error' ];
        }
    }
}
