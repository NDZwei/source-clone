<?php

namespace App\Repositories;

use App\Models\MailDescription;

class MailDescriptionRepository extends BaseRepository {

    function getModel() {
        return MailDescription::class;
    }
}
