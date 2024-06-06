<?php

namespace App\Services;

use Illuminate\Support\Facades\Process;

class ScriptService
{
    public function scrappingData($dataAppreciation){
        $address = $dataAppreciation['address_map'];
        $result = Process::run("python C:\Users\mauricio.acuna\Documents\Working\Script\ScriptScrapping.py --data " . $address);
        \Log::error($result->output());
    }
}
