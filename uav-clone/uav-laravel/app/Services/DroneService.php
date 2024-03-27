<?php

namespace App\Services;

use App\Repositories\DroneRepository;

class DroneService extends BaseService {

    public function __construct(DroneRepository $repository)
    {
        parent::__construct($repository);
    }
}
