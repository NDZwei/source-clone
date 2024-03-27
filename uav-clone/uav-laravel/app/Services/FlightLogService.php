<?php

namespace App\Services;

use App\Repositories\FlightLogRepository;

class FlightLogService extends BaseService {

    public function __construct(FlightLogRepository $repository)
    {
        parent::__construct($repository);
    }
}
