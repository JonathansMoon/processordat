<?php

namespace App\Jobs;

use App\Services\ProcessorService;

class Processor extends Job
{
    public $tries = 3;
    private $service;
    public function __construct(ProcessorService $service)
    {
        $this->service = $service;
    }

    public function handle()
    {
        $this->service->processor();
    }
}
