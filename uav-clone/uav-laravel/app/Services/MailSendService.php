<?php

namespace App\Services;

use App\Repositories\MailDescriptionRepository;

class MailSendService extends BaseService {

    public function __construct(MailDescriptionRepository $repository)
    {
        parent::__construct($repository);
    }
}
