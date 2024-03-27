<?php

namespace App\Repositories;

use App\Models\UserDeviceToken;

class FlightLogRepository extends BaseRepository {

    function getModel() {
        return UserDeviceToken::class;
    }
}
