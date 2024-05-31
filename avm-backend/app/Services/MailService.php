<?php

namespace App\Services;

use App\Models\Appreciation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Exports\AppreciationExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\AccessCodeService;
use App\Mail\CodeToClient;

class MailService
{

    private AccessCodeService $accessCodeService;

    public function __construct(AccessCodeService $accessCodeService)
    {
        $this->accessCodeService = $accessCodeService;
    }

    public function generateExcelCoordinator($id, $queryValoranet, $queryWitnesses, $path){
        try{
            $appreciation = Appreciation::where('id', $id)->with('client')->with('commune.region')->with('type_asset')->with('supervisor')->first();
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
            if (empty($sii_extras)) {
                $sii_extras_reformating = array('LINEA_CONST' => 0, 'DESCRIPCION_MATERIALIDAD' => 0, 'DESCRIPCION_CALIDAD' => 0, 'AGNO_LINEA_CONST' => 0, 'SUP_LINEA_CONST' => 0);
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
            $url_mapa = "https://maps.googleapis.com/maps/api/staticmap?center=" . $appreciation['latitude'] . "," . $appreciation['longitude'] . "&zoom=16&size=600x300&maptype=roadmap&markers=color:red%7C" . $appreciation['latitude'] . "," . $appreciation['longitude'] . "&key=AIzaSyBL1KI92Lt_nzwiO3FPbbAnaZpd-vuvNFk";
            Storage::disk('public')->put('mapa.png', file_get_contents($url_mapa));

            $dataDecodeValoration = json_decode($queryValoranet, true);
            $dataDecodeWitnesses =  json_decode($queryWitnesses, true);
            $url_img_val = "https://maps.googleapis.com/maps/api/staticmap?center=" . $appreciation['latitude'] . "," . $appreciation['longitude'] . "&zoom=13&size=600x300&maptype=roadmap&markers=color:red%7C" . $appreciation['latitude'] . "," . $appreciation['longitude'];
            $img5 = $url_img_val . self::img_map_valuaciones($url_img_val, (array)$dataDecodeValoration);

            Storage::disk('public')->put('mapa_valo.png', file_get_contents($img5));
            // References Witnesses
            $url_img_wit = "https://maps.googleapis.com/maps/api/staticmap?center=" . $appreciation['latitude'] . "," . $appreciation['longitude'] . "&zoom=13&size=600x300&maptype=roadmap&markers=color:red%7C" . $appreciation['latitude'] . "," . $appreciation['longitude'];
            $img6 = $url_img_wit . self::img_map_mercado($url_img_wit, (array)$dataDecodeWitnesses);
            Storage::disk('public')->put('mapa_wit.png', file_get_contents($img6));

            $dataValoranet = json_decode($queryValoranet, true);
            $dataWitnesses = json_decode($queryWitnesses, true);
            // save data to details varaible to send to blade view
            $details = [
                'nombre_cliente' => $appreciation->client[0]->name,
                'email_supervisor' => $appreciation['supervisor_id'],
                'informe' => $appreciation['appreciation_id'],
                'fecha' => $date,
                'region' => $appreciation->commune[0]->region->name . ' / ' . $appreciation->commune[0]->name,
                'rol' => $appreciation['rol'],
                'tipo_bien' => $appreciation->type_asset[0]->name,
                'sup_const' => $appreciation['construction_area'],
                'sup_terreno' => $appreciation['terrain_area'],
                'direccion' => $full_address,
                'valor_uf' => number_format($value_uf[0], 0, ",", "."),
                'value_uf_saved' => $appreciation['value_uf_saved'],
                'valor_pesos' => number_format($value_pesos[0], 0, ",", "."),
                'avaluo' => $stored_sii[0]->AVALUO_FISCAL,
                'sup_sii' => $stored_sii[0]->SUP_TOTAL_TERRENO,
                'destino' => $stored_sii[0]->DESCRIPCION_DESTINO,
                'linea' => $sii_extras_reformating['LINEA_CONST'],
                'materialidad' => $sii_extras_reformating['DESCRIPCION_MATERIALIDAD'],
                'calidad' => $sii_extras_reformating['DESCRIPCION_CALIDAD'],
                'ano' =>$sii_extras_reformating['AGNO_LINEA_CONST'],
                'sup_lc' => $sii_extras_reformating['SUP_LINEA_CONST'],
                'max_uf' => number_format($rango_max_uf, 0, ",", "."),
                'min_uf' => number_format($rango_min_uf, 0, ",", "."),
                'max_pesos' => number_format($rango_max_p, 0, ",", "."),
                'min_pesos' => number_format($rango_min_p, 0, ",", "."),
                'valo' => (array)$dataValoranet,
                'wit' => (array)$dataWitnesses,
                'quality' => $appreciation['quality'],
            ];
            $excel = Excel::store(new AppreciationExport($details), $path, 'files');
            Mail::to($appreciation->supervisor[0]->email)->send(new OrderShipped($details, $path));
            $this->sendInfoClient($appreciation, $details);
            return true;
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return [
                'success' => false,
                'error' => 'Error al enviar correo con valoracion'
            ];
        }
    }



    public function img_map_valuaciones($url_img_val, $data)
    {
        foreach ($data as $row) {
            $url_format = $url_img_val . "&markers=color:blue%7C" . $row['LATITUD'] . "," . $row['LONGITUD'];
        }
        $url_format . "&key=AIzaSyBL1KI92Lt_nzwiO3FPbbAnaZpd-vuvNFk";
        return $url_format . "&key=AIzaSyBL1KI92Lt_nzwiO3FPbbAnaZpd-vuvNFk";
    }

    public function img_map_mercado($url_img_wit, $data)
    {
        foreach ($data as $row) {
            $url_img_wit = $url_img_wit . "&markers=color:blue%7C" . $row['latitude'] . "," . $row['longitude'];
        }
        $url_img_wit . "&key=AIzaSyBL1KI92Lt_nzwiO3FPbbAnaZpd-vuvNFk";
        return $url_img_wit . "&key=AIzaSyBL1KI92Lt_nzwiO3FPbbAnaZpd-vuvNFk";
    }

    public function sendInfoClient($appreciation, $details){
        try{
            // generate access code
            $responseCodeService = $this->accessCodeService->createAccessCode($appreciation->client[0]->id);
            \Log::error($appreciation->client[0]->name);
            \Log::error($details['direccion']);
            \Log::error($responseCodeService['access_code']);
            $detailsClient = [
                'title' => 'Estimado/a ' . $appreciation->client[0]->name . '. A continuación se encuentran los datos para ingresar al sistema de tasación automatica(AVM), Si desea, ingrese al enlace incluido con su correo y código de acceso. Mas detalles en el informe adjunto en PDF',
                'code' => ' ' . $responseCodeService['access_code'] . ' ',
                'mail' => $appreciation->client[0]->email,
                'address' => $details['direccion'] . ' ' . $appreciation->address_number,
                'rol' => $appreciation->rol,
                'region' => $appreciation->commune[0]->region->name . ' / ' . $appreciation->commune[0]->name,
                'bien' => $appreciation['description'],
                'nota' => $appreciation['quality'],
                'valor' => $details['valor_uf'] . ' / $' . $details['valor_pesos'],
                'bien' => $details['tipo_bien']
            ];
            Mail::to($appreciation->client[0]->email)->send(new CodeToClient($detailsClient));
            \Log::error('MAIL CLIENT END');
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
