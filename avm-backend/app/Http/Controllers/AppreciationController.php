<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateReportAppreciation;
use App\Jobs\ScriptAppreciation;
use App\Services\AppreciationService;
use Illuminate\Http\Request;
use App\Helpers\validateRut;
use App\Http\Requests\StoreAppreciationRequest;

class AppreciationController extends Controller
{
    private AppreciationService $appreciationService;

    public function __construct(AppreciationService $appreciationService, validateRut $validateRut)
    {
        $this->validateRut = $validateRut;
        $this->appreciationService = $appreciationService;
    }

    public function getAppreciationByAdmins(Request $request){
        $res = $this->appreciationService->getAppreciationByAdmin($request);
        return response()->json($res);
    }

    public function getAppreciationByClient(Request $request){
        $res = $this->appreciationService->getAppreciationByClient($request);
        return response()->json($res);
    }

    public function createAppreciation(StoreAppreciationRequest $request){
        if($this->validateRut->validatorRut($request->rut)){
            return response()->json(['success' => false, 'message' => 'Rut incorrecto']);
        }
        $dataToReport = [
            'userLoggedId' => $request->user()->id,
            'newClient' => $request->newClient,
            'name' => $request->name,
            'rut' => $request->rut,
            'email' => $request->email,
            'phone' => $request->phone,
            'typeSupervisor' => $request->typeSupervisor,
            'typeOfAsset' => $request->typeOfAsset,
            'communeId' => $request->communeId,
            'addressMap' => $request->addressMap,
            'rolBlock' => $request->rolBlock,
            'rolPlotOfLand' => $request->rolPlotOfLand,
            'terrainArea' => $request->terrainArea,
            'terrainConstruction' => $request->terrainConstruction,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ];
        \Log::error('CREATING_APPRECIATION_WITH_JOB');
        dispatch(new GenerateReportAppreciation($dataToReport))->onQueue('high');
        return response()->json([
            'success' => true,
            'message' => 'El sistema esta procesando la valoracion'
        ]);
    }
}
