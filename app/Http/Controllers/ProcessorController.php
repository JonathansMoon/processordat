<?php

namespace App\Http\Controllers;

use App\Jobs\Processor;
use App\Services\ProcessorService;

class ProcessorController extends Controller
{

    private $service;
    public function __construct(ProcessorService $service)
    {
        $this->service = $service;
    }
    public function processor()
    {
        dispatch(new Processor($this->service));
    }


}
