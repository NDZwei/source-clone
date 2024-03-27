<?php

namespace App\Http\Controllers;

use App\Services\ParameterService;

class ParameterController extends BaseController {
    public function __construct(ParameterService $service)
    {
        parent::__construct($service);
    }
}
