<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    public function getUf(){
        $currentDate = now('America/santiago')->format('d-m-Y');
        $currentDateValo = now('America/santiago')->format('Y-m-d');
        $ufApi = Http::get("https://mindicador.cl/api/uf/" . $currentDate);
        if ($ufApi->failed()) {
            $query = DB::connection('valoranet')->table('UF')->select('VALOR_UF')
                ->where('FECHA_UF', '=', $currentDateValo)->pluck('VALOR_UF')->first();
            $ufDay = $query;
        } else {
            $ufDayArray = $ufApi->json();
            $ufDay = $ufDayArray['serie'][0]['valor'];
        }
        return $ufDay;
    }

    public function testApi($appreciationData)
    {
        \Log::error('TEST API');
        $jsonData = [
            'direccion' => $appreciationData['addressMap'],
            'tipo' => 'DEPARTAMENTO',
            'distancia' => 2,
            'cantidadDormitoriosI' => (string)($appreciationData['bedroom']-1),
            'cantidadDormitoriosF' => (string)($appreciationData['bedroom']+1),
            'cantidadBaniosI' => (string)($appreciationData['bathroom']-1),
            'cantidadBaniosF' => (string)($appreciationData['bathroom']+1),
            'cantidadEstacionamientosI' => '0',
            'cantidadEstacionamientosF' => '1',
            'metrosTotalesI' => (string)($appreciationData['terrainArea']*0.85),
            'metrosTotalesF' => (string)($appreciationData['terrainArea']*1.15),
            'metrosUtilesI' => (string)($appreciationData['terrainConstruction']*0.85),
            'metrosUtilesF' => (string)($appreciationData['terrainConstruction']*1.15),
            'aniosPropiedadI' => '0',
            'aniosPropiedadF' => '100',
        ];
        $response = Http::timeout(-1)->post('http://127.0.0.1:5000/witnessFinder', $jsonData);

        return ['status' => 200];
    }
}
