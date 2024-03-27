<?php

namespace App\Http\Controllers;

use App\Services\CheckingLogService;

class CheckingLogController extends BaseController {

    public function __construct(CheckingLogService $service)
    {
        parent::__construct($service);
    }
}
