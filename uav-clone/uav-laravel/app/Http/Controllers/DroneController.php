<?php

namespace App\Http\Controllers;

use App\Services\DroneService;

class DroneController extends BaseController {
    public function __construct(DroneService $service)
    {
        parent::__construct($service);
    }
}
