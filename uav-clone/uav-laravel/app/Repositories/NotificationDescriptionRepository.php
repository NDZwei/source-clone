<?php

namespace App\Repositories;

use App\Models\NotificationDescription;

class NotificationDescriptionRepository extends BaseRepository {

    function getModel() {
        return NotificationDescription::class;
    }
}
