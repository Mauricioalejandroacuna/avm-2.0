<?php

namespace App\Services;

use Illuminate\Support\Facades\Process;

class ScriptService
{

    public function scrappingData($dataAppreciation){
        $result = Process::run('python C:\Users\mauricio.acuna\Documents\Working\Script\main.py --appreciation_id=1');
        \Log::error($result->output());
    }
}
