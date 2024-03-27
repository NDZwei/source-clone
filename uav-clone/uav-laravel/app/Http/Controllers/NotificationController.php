<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;

class NotificationController extends BaseController {
    public function __construct(NotificationService $service)
    {
        parent::__construct($service);
    }
}
