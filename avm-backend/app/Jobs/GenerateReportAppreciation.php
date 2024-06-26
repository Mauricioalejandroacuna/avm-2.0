<?php

namespace App\Jobs;

use App\Services\ApiService;
use App\Services\AppreciationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateReportAppreciation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $appreciationData;

    public function __construct($appreciationData)
    {
        $this->appreciationData = $appreciationData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $appreciationService = new AppreciationService();
        $apiService = new ApiService();
        //$apiService->testApi($this->appreciationData);
        $appreciationService->createAppreciation($this->appreciationData);
        \Log::error('END_WORK');
    }
}
