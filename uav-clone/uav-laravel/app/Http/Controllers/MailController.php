<?php

namespace App\Http\Controllers;

use App\Services\MailSendService;

class MailController extends BaseController {
    public function __construct(MailSendService $service)
    {
        parent::__construct($service);
    }
}
