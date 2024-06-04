<?php
namespace App\Services;

use App\Models\Appreciation;
use App\Models\File;
use App\Models\User;

class AppreciationService
{
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

    public function createAppreciation($data){
        $apiService = new ApiService();
        $calculateService = new CalculateService();
        $mailService = new MailService();

        try {
            if($data['newClient'] === true) {
                $client = new User();
                $client->name = $data['name'];
                $client->rut = $data['rut'];
                $client->user_types_id = 3;
                $client->email = $data['email'];
                $client->phone = $data['phone'];
                $client->save();
            } else {
                $client = User::where('rut', $data['rut'])->first();
            }
            // falta enviar el numero de direccion
            $resCalculateValoration = $calculateService->calculateAppreciation($data);
            $queryValoranet = $resCalculateValoration['query_valoranet'];
            $queryWitnesses = $resCalculateValoration['query_witnesses'];
            $appreciation = new Appreciation();
            $appreciation->client_id = $client->id;
            $appreciation->coordinator_id = $data['userLoggedId'];
            $appreciation->supervisor_id = $data['typeSupervisor'];
            $appreciation->type_assets_id = $data['typeOfAsset'];
            $appreciation->access_code_id = 1;
            $appreciation->commune_id = $data['communeId'];
            $appreciation->address = $data['addressMap'];
            $appreciation->rol = $data['rolBlock'].'-'.$data['rolPlotOfLand'];
            $appreciation->terrain_area =$data['terrainArea'];
            $appreciation->construction_area = $data['terrainConstruction'];
            $appreciation->bedrooms = $data['bedroom'];
            $appreciation->bathrooms = $data['bathroom'];
            $appreciation->latitude = $data['latitude'];
            $appreciation->longitude = $data['longitude'];
            $appreciation->status = true;
            $uf = $apiService->getUf(); // get uf
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
            $mailService->generateExcelCoordinator($appreciation->id, $queryValoranet, $queryWitnesses, $path);
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
