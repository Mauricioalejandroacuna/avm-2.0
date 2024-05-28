<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\ScriptService;

class GenerateReportAppreciation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $appreciationData;

    //private ScriptService $scriptService;

    public function __construct($appreciationData)
    {
        $this->appreciationData = $appreciationData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Log::error($this->appreciationData);
    }
}
