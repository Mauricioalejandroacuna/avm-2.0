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
            $appreciations = Appreciation::where($type, $request->user()->id)->with('file')->with('client')
                ->with('type_asset')->get();
            return [ 'success' => true, 'appreciations' => $appreciations];
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return [ 'success' => false,  'error' => 'Error al obtener valoraciones' ];
        }
    }

    public function getAppreciationByClient($request){
        try {
            $appreciationsByClient = Appreciation::where('client_id', $request->user()->id)
                ->with('file')->with('type_asset')->get();
            return [ 'success' => true, 'appreciations' => $appreciationsByClient ];
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return [ 'success' => false,  'error' => 'Error al obtener valoraciones de cliente' ];
        }
    }

    public function createAppreciation($request){
        try {
            if($request['newClient'] === true) {
                $client = new User();
                $client->name = $request['name'];
                $client->rut = $request['rut'];
                $client->user_types_id = 3;
                $client->email = $request['email'];
                $client->phone = $request['phone'];
                $client->save();
            } else {
                $client = User::where('rut', $request['rut'])->first();
            }
            // falta enviar el numero de direccion
            $resCalculateValoration = $this->calculateService->calculateAppreciation($request);
            $queryValoranet = $resCalculateValoration['query_valoranet'];
            $queryWitnesses = $resCalculateValoration['query_witnesses'];
            $appreciation = new Appreciation();
            $appreciation->client_id = $client->id;
            $appreciation->coordinator_id = $request->user()->id;
            $appreciation->supervisor_id = $request['typeSupervisor'];
            $appreciation->type_assets_id = $request['typeOfAsset'];
            $appreciation->access_code_id = 1;
            $appreciation->commune_id = $request['communeId'];
            $appreciation->address = $request['addressMap'];
            $appreciation->rol = $request['rolBlock'].'-'.$request['rolPlotOfLand'];
            $appreciation->terrain_area =$request['terrainArea'];
            $appreciation->construction_area = $request['terrainConstruction'];
            $appreciation->bedrooms = $request['bedroom'];
            $appreciation->bathrooms = $request['bathroom'];
            $appreciation->latitude = $request['latitude'];
            $appreciation->longitude = $request['longitude'];
            $appreciation->status = true;
            $uf = $this->apiService->getUf(); // get uf
            $value_uf_reference = $resCalculateValoration['value_uf_reference'];
            $value_uf_valoranet = $resCalculateValoration['value_uf_valoranet'];
            $value_uf_report = $resCalculateValoration['value_uf_valoranet'];
            $quality = $resCalculateValoration['quality'];
            $appreciation->value_uf_saved = $uf;
            $appreciation->value_uf_reference = $value_uf_reference;
            $appreciation->value_uf_valoranet =  $value_uf_valoranet;
            $appreciation->value_uf_report =  $value_uf_report;
            $appreciation->quality = $quality;
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
