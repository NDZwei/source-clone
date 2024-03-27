<?php

namespace App\Http\Controllers;

use App\Services\FlightLogService;

class FlightLogController extends BaseController {
    public function __construct(FlightLogService $service)
    {
        parent::__construct($service);
    }
}
