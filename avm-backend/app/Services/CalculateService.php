<?php

namespace App\Services;

/**
 * In the calculate services, there are function
 * to calculate data from APIS or DBs
 */

class CalculateService
{
    /**
     * Calculate valoranet function generate one valoration
     * with data of table valoranet of AVM
     */
    public function calculateValueValoranet($appreciationData){
        $dbService = new DBService();
        $currentDate = now('America/santiago')->format('d-m-Y');
        $currentDateValo = now('America/santiago')->format('Y-m-d');
        $getYear = substr($currentDateValo, 0, 4);
        $getRestDate = substr($currentDateValo, 4);
        $getYear -= 1;
        $dateYearsLess = $getYear . $getRestDate;
        $latitude = $appreciationData['latitude'];
        $longitude = $appreciationData['longitude'];
         // set type of asset
         if ($appreciationData['typeOfAsset'] == 1) {
            $typeAsset = 'CASA';
            $typeAsset2 = 'VIVIENDA_UNIFAMILIAR';
        } else if ($appreciationData['typeOfAsset'] == 2) {
            $typeAsset = 'DEPARTAMENTO';
            $typeAsset2 = 'DEPARTAMENTO';
        }

        // get the +-15% of variation in construction area
        $baseArea = $appreciationData['terrainConstruction'];
        $variationArea = 0.3 * $baseArea;
        $upperArea = $baseArea + $variationArea;
        $lowerArea = $baseArea - $variationArea;

        // set some helpers
        $distanceValoranet = 1;
        $queryReferences = [];
        $promedioValoranet = 0;
        $qualityValoranet = 7.5;
        $statusValueValoranet = 1;

        do {
            $queryReferences = $dbService->getValueValoranet($latitude, $longitude, $distanceValoranet, $dateYearsLess, $currentDateValo, $typeAsset, $typeAsset2, (float)$lowerArea, (float)$upperArea);
            $distanceValoranet += 0.5;
            $qualityValoranet -= 0.5;
            if ($qualityValoranet <= 1) {
                $statusValueValoranet = 0;
            }
        } while ($statusValueValoranet != 0 && count($queryReferences) <= 10 && $distanceValoranet < 8);
        $i = 1;

        foreach ($queryReferences as $row) {
            $promedioValoranet += (int)$row->VALOR_COMERCIAL_ENCARGO_SUPERVISADO_UF;
            $i += 1;
        };
        if ($i == 1) {
            $i = 2;
        }

        $value_uf_valoranet = $promedioValoranet / ($i - 1);
        return [
            'value_uf_valoranet' => $value_uf_valoranet,
            'query_reference_valoranet' => $queryReferences,
            'quality_valoranet' => $qualityValoranet
        ];
    }

    /**
     * Calculate witnesses function generate one valoration
     * with data of table witnesses of AVM
     *
     */
    public function calculateValueWitnesses($appreciationData){
        $dbService = new DBService();
        $currentDate = now('America/santiago')->format('d-m-Y');
        $currentDateValo = now('America/santiago')->format('Y-m-d');
        $getYear = substr($currentDateValo, 0, 4);
        $getRestDate = substr($currentDateValo, 4);
        $getYear -= 1;
        $dateYearsLess = $getYear . $getRestDate;
        $latitude = $appreciationData['latitude'];
        $longitude = $appreciationData['longitude'];
        $distanceWitnesses = 0.5;
        $promedioWitnesses = 0;
        $qualityWitnesses = 7.5;
        $difAsset = 1;
        $statusValueWitnesses = 1;
        $baseArea = $appreciationData['terrainConstruction'];
        $variationArea = 0.3 * $baseArea;
        $upperArea = $baseArea + $variationArea;
        $lowerArea = $baseArea - $variationArea;
        do {
            $queryWitnesses = $dbService->getValueWitnesses($latitude, $longitude, $distanceWitnesses, $lowerArea, $upperArea, $difAsset, $dateYearsLess, $currentDateValo, $appreciationData);
            $distanceWitnesses += 0.3;
            $qualityWitnesses -= 1.0;
            if ($qualityWitnesses == 3) {
                $difAsset += 1;
            }
            if ($qualityWitnesses <= 1) {
                $statusValueWitnesses = 0;
            }
        } while ($statusValueWitnesses != 0 && count($queryWitnesses) <= 10 && $distanceWitnesses <= 3);

        \Log::error('CALCULATE SERVICES WITNESSES');
        \Log::error($queryWitnesses);
        $j = 1;
        foreach ($queryWitnesses as $row) {
            $promedioWitnesses += $row->value_uf;
            $j += 1;
        };
        if ($j == 1) {
            $j = 2;
        }
        $value_uf_reference = 0;
        if (count($queryWitnesses) != 0) {
            $value_uf_reference = $promedioWitnesses / ($j - 1);
        } else {
            $qualityWitnesses = 1;
        }
        return [
            'value_uf_reference' => $value_uf_reference,
            'query_reference_witnesses' => $queryWitnesses,
            'quality_witnesses' => $qualityWitnesses
        ];
    }

    /**
     * In calculate average function create
     * average data valoranet and data witnesses
     */
    public function calculateAverages($qualityValoranet, $qualityWitnesses, $bathrooms, $bedrooms){
        if ($qualityValoranet <= 1) {
            $qualityValoranet = 1;
        }
        if ($qualityWitnesses <= 1) {
            $qualityWitnesses = 1;
        }

        if ($bathrooms == 0 || $bedrooms == 0) {
            $qualityWitnesses -= 2;
            if ($qualityWitnesses <= 1) {
                $qualityWitnesses = 1;
            }
        }
        $quality = ($qualityWitnesses + $qualityValoranet) / 2;

        return $quality;
    }

    /**
     * In calculate appreciation function handle the
     * process to calculate appreciation in valoranet data and
     * witnesses data and then generate average
     */
    public function calculateAppreciation($data){
            $resCalculateValoranet = $this->calculateValueValoranet($data);
            $resCalculateWitnesses = $this->calculateValueWitnesses($data);

            $queryValoranet = $resCalculateValoranet['query_reference_valoranet'];
            $queryWitnesses = $resCalculateWitnesses['query_reference_witnesses'];

            $value_uf_valoranet = $resCalculateValoranet['value_uf_valoranet'];
            $value_uf_reference = $resCalculateWitnesses['value_uf_reference'];

            $qualityWitnesses =  $resCalculateWitnesses['quality_witnesses'];
            $qualityValoranet =  $resCalculateValoranet['quality_valoranet'];
            // calculate report value between reference and valoranet
            $resCalculateAverage = $this->calculateAverages($qualityValoranet, $qualityWitnesses, $data['bathroom'], $data['bedroom']);

            if ($value_uf_valoranet == 0) {
                $value_uf_valoranet = $value_uf_reference;
            }
            if ($value_uf_reference == 0) {
                $value_uf_reference = $value_uf_valoranet;
            }
            $valueValoranetTemp = (40 / 100) * $value_uf_valoranet;
            $valueReferencesTemp = (60 / 100) * $value_uf_reference;

            $value_uf_report = ($valueValoranetTemp + $valueReferencesTemp);

            if ($value_uf_report == 0 || $value_uf_report == null) {
                return [ 'status' => 422, 'error' => 'No se pudo valorar esta propiedad, revise datos ingresados' ];
            }
            \Log::error('CALCULATE APPRECIATION END');
            \Log::error($queryWitnesses);
            return [
                'query_valoranet' => $queryValoranet,
                'query_witnesses' => $queryWitnesses,
                'value_uf_reference'=> $value_uf_reference,
                'value_uf_valoranet' => $value_uf_valoranet,
                'value_uf_report' => $value_uf_report,
                'quality' => $resCalculateAverage
            ];
    }


}
