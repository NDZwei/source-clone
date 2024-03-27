<?php

namespace App\Services;

use App\Repositories\MaintenanceLogReposiroty;

class MaintenanceLogService extends BaseService {

    public function __construct(MaintenanceLogReposiroty $repository)
    {
        parent::__construct($repository);
    }
}
