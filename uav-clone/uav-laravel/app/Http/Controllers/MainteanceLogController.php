<?php

namespace App\Http\Controllers;

use App\Services\MaintenanceLogService;

class MainteanceLogController extends BaseController {
    public function __construct(MaintenanceLogService $service)
    {
        parent::__construct($service);
    }
}
