<?php

namespace App\Repositories;

use App\Models\MaintenanceLog;

class MaintenanceLogReposiroty extends BaseRepository {

    function getModel() {
        return MaintenanceLog::class;
    }
}
