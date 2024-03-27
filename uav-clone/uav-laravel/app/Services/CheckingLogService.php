<?php

namespace App\Services;

use App\Repositories\MailSendRepository;

class CheckingLogService extends BaseService {

    public function __construct(MailSendRepository $repository)
    {
        parent::__construct($repository);
    }
}
