<?php

namespace App\Repositories;

use App\Models\Notification;

class NotificationRepository extends BaseRepository {

    function getModel() {
        return Notification::class;
    }
}
