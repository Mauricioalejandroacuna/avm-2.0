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
        \Log::error($request->rut);
        if($this->validateRut->validatorRut($request->rut)){
            return response()->json(['success' => false, 'message' => 'Rut incorrecto']);
        }
        //dispatch(new ScriptAppreciation($request->data, $accessCodeService, $apiService, $calculateService, $mailService))->afterResponse();
        \Log::error('CREATING_APPRECIATION');
        $res = $this->appreciationService->createAppreciation($request);
        return response()->json([
            'success' => true,
            'message' => 'El sistema esta procesando la valoracion'
        ]);
    }
}
