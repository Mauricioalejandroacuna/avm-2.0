<?php

namespace App\Services;

use App\Models\Appreciation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MailService
{
    public function sendExcelCoordinator($id){
        try{
            $appreciation = Appreciation::where('id', $id)
                ->with('client')
                ->with('commune.region')
                ->first();
            $date = $appreciation['updated_at']->format('d-m-Y');
            // calculate pesos
            $value_uf = explode('.', $appreciation['value_uf_report']);
            $value_pesos = explode('.', ($appreciation['value_uf_saved'] * $appreciation['value_uf_report']));
            $full_address = $appreciation['address'] . ' ' . $appreciation['address_number'];

            // Calculate +- 15% for final range
            $rango_min_p_temp = $value_pesos[0] * 0.85;
            $rango_max_p_temp = $value_pesos[0] * 1.15;

            $rango_min_p = round($rango_min_p_temp);
            $rango_max_p = round($rango_max_p_temp);

            $rango_min_uf_temp = $value_uf[0] * 0.85;
            $rango_max_uf_temp = $value_uf[0] * 1.15;

            $rango_min_uf = round($rango_min_uf_temp);
            $rango_max_uf = round($rango_max_uf_temp);

            list($rol_izq, $rol_der) = explode('-', $appreciation['rol']);

            \Log::error($appreciation->commune[0]->code_commune);
            $query = 'CALL valorane_SII_1SEM_2022.sp_lista_sii(?,?,?,?)';
            $stored_sii = DB::connection('valoranet')->select($query, array(
                $appreciation->commune[0]->code_commune,
                $rol_izq,
                $rol_der,
                $full_address
            ));

            if ($stored_sii == NULL or $stored_sii == []) {
                $stored_sii[0] = (object)array('AVALUO_FISCAL' => 0, 'SUP_TOTAL_TERRENO' => 0, 'DESCRIPCION_DESTINO' => 0);
            }

            $sii_extras = DB::connection('valoranet')
            ->table('valorane_SII_1SEM_2022.NO_AGRICOLA_SII_DET')
            ->select('NO_AGRICOLA_SII_DET.LINEA_CONST', 'MATERIALIDAD_SII.DESCRIPCION_MATERIALIDAD', 'CALIDAD_SII.DESCRIPCION_CALIDAD', 'AGNO_LINEA_CONST', 'SUP_LINEA_CONST')
            ->join('valorane_SII_1SEM_2022.MATERIALIDAD_SII', 'MATERIALIDAD_SII.CODIGO_MATERIALIDAD', 'NO_AGRICOLA_SII_DET.MATERIALIDAD_LINEA_CONST')
            ->join('valorane_avmqa.communes', 'communes.code_commune', 'NO_AGRICOLA_SII_DET.COMUNA_SII')
            ->join('valorane_SII_1SEM_2022.CALIDAD_SII', 'CALIDAD_SII.ID_CALIDAD_SII', 'NO_AGRICOLA_SII_DET.CALIDAD_LINEA_CONST')
            ->join('valorane_avmqa.appreciations', 'appreciations.id_commune', 'communes.id_commune')
            ->where('appreciations.id_appreciation', $appreciation->id)
            ->where('appreciations.rol', $appreciation['rol'])
            ->where('communes.code_commune', $appreciation->commune[0]->code_commune)
            ->where('NO_AGRICOLA_SII_DET.MANZANA', $rol_izq)
            ->where('NO_AGRICOLA_SII_DET.PREDIO', $rol_der)
            ->first();

            if ($sii_extras == [] || $sii_extras == NULL) {
                $sii_extras = (object)array('LINEA_CONST' => 0, 'DESCRIPCION_MATERIALIDAD' => 0, 'DESCRIPCION_CALIDAD' => 0, 'AGNO_LINEA_CONST' => 0, 'SUP_LINEA_CONST' => 0);
            }

            $googleKey = "AIzaSyBq0gCDbH5Gn7_rS2RhVTBqVkUwE40FpWs";
            $heading = 0;
            $i = 0;
            do {
                $url = "https://maps.googleapis.com/maps/api/streetview?size=400x400&location=" . $appreciation["latitude"] . "," . $appreciation["longitude"] . "&fov=90&heading=" . $heading . "&pitch=0&key=" . $googleKey;
                Storage::disk('public')->put('streetView' . $i . '.png', file_get_contents($url));
                $i++;
                $heading += 90;
            } while ($heading < 271);
            // Map google with center point

            $url_mapa = "https://maps.googleapis.com/maps/api/staticmap?center=" . $query['latitude'] . "," . $query['longitude'] . "&zoom=16&size=600x300&maptype=roadmap&markers=color:red%7C" . $query['latitude'] . "," . $query['longitude'] . "&key=AIzaSyD88W13wg9gTVksO9058WCUl7h1OcFQ1Aw";
            Storage::disk('public')->put('mapa.png', file_get_contents($url_mapa));

            // Mapa References valoranet
            $valo = json_decode($request['valo'], true);
            $wit = json_decode($request['wit'], true);
            $url_img_val = "https://maps.googleapis.com/maps/api/staticmap?center=" . $query['latitude'] . "," . $query['longitude'] . "&zoom=13&size=600x300&maptype=roadmap&markers=color:red%7C" . $query['latitude'] . "," . $query['longitude'];
            $img5 = $url_img_val . self::img_map_valuaciones($url_img_val, (array)$valo);
            Storage::disk('public')->put('mapa_valo.png', file_get_contents($img5));

            // References Witnesses

            $url_img_wit = "https://maps.googleapis.com/maps/api/staticmap?center=" . $query['latitude'] . "," . $query['longitude'] . "&zoom=13&size=600x300&maptype=roadmap&markers=color:red%7C" . $query['latitude'] . "," . $query['longitude'];
            $img6 = $url_img_wit . self::img_map_mercado($url_img_wit, (array)$wit);
            Storage::disk('public')->put('mapa_wit.png', file_get_contents($img6));

            // save data to details varaible to send to blade view
            $details = [
                'nombre_cliente' => $query['name_client'],
                'email_supervisor' => $request['email_supervisor'],
                'informe' => $query['id_appreciation'],
                'fecha' => $date,
                'region' => $query['name_region'] . ' / ' . $query['name_commune'],
                'rol' => $query['rol'],
                'tipo_bien' => $query['description'],
                'sup_const' => $query['construction_area'],
                'sup_terreno' => $query['terrain_area'],
                'direccion' => $full_address,
                'valor_uf' => number_format($value_uf[0], 0, ",", "."),
                'value_uf_saved' => $query['value_uf_saved'],
                'valor_pesos' => number_format($value_pesos[0], 0, ",", "."),
                'avaluo' => $stored_sii[0]->AVALUO_FISCAL,
                'sup_sii' => $stored_sii[0]->SUP_TOTAL_TERRENO,
                'destino' => $stored_sii[0]->DESCRIPCION_DESTINO,
                'linea' => $sii_extras->LINEA_CONST,
                'materialidad' => $sii_extras->DESCRIPCION_MATERIALIDAD,
                'calidad' => $sii_extras->DESCRIPCION_CALIDAD,
                'ano' => $sii_extras->AGNO_LINEA_CONST,
                'sup_lc' => $sii_extras->SUP_LINEA_CONST,
                'max_uf' => number_format($rango_max_uf, 0, ",", "."),
                'min_uf' => number_format($rango_min_uf, 0, ",", "."),
                'max_pesos' => number_format($rango_max_p, 0, ",", "."),
                'min_pesos' => number_format($rango_min_p, 0, ",", "."),
                'valo' => $valo,
                'wit' => $wit,
                'quality' => $query['quality'],
            ];

            return $stored_sii;
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return [
                'success' => false,
                'error' => 'Error al enviar correo con valoracion'
            ];
        }
    }

    public function sendInfoClient(){
        try{
            return true;
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return [
                'success' => false,
                'error' => 'Error al enviar correo con valoracion'
            ];
        }
    }
}
