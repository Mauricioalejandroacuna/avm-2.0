<?php

namespace App\Services;

use App\Models\AccessCode;
use Illuminate\Support\Facades\Hash;

class AccessCodeService
{

    function random_string($length){
        $str_result = '1234567890ABCDFGHIJKLMNOPKRSTUVWXZYabcdefghijklmnopqrstuvwxzy';
        return substr(str_shuffle($str_result),0,$length);
    }
    public function createAccessCode($clientId){
        try {
            $random = $this->random_string(6);
            $accessCode = new AccessCode();
            $accessCode->client_id = $clientId;
            $accessCode->code = Hash::make($random);
            $accessCode->save();
            return [
                'success' => true,
                'message' => 'Codigo de accesso creado satisfactoriamente',
                'access_code' => $random
            ];
        } catch(\Throwable $th){
            \Log::error($th->getMessage());
            return [
                'success' => false,
                'message' => 'Error al crear Access Code'
            ];
        }
    }
}
