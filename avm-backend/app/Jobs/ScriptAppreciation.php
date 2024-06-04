<?php

namespace App\Jobs;

use App\Services\ScriptService;
use App\Services\AppreciationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\AccessCodeService;
use App\Services\ApiService;
use App\Services\CalculateService;
use App\Services\MailService;

class ScriptAppreciation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     protected $appreciationData;
     private ScriptService $scriptService;

    public function __construct($appreciationData)
    {
        $this->appreciationData = $appreciationData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            //$this->scriptService->generateValoration($this->appreciationData);
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
        }
    }
}
