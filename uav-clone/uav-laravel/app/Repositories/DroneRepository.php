<?php

namespace App\Repositories;

use App\Models\Drone;

class DroneRepository extends BaseRepository {

    function getModel() {
        return Drone::class;
    }
}
