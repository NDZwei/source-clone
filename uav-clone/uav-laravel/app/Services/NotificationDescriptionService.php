<?php

namespace App\Services;

use App\Repositories\NotificationDescriptionRepository;

class NotificationDescriptionService extends BaseService {

    public function __construct(NotificationDescriptionRepository $repository)
    {
        parent::__construct($repository);
    }
}
