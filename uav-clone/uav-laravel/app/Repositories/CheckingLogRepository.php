<?php

namespace App\Repositories;

use App\Models\CheckingLog;

class CheckingLogRepository extends BaseRepository {

    function getModel() {
        return CheckingLog::class;
    }
}
