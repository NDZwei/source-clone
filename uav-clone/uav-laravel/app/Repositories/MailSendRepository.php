<?php

namespace App\Repositories;

use App\Models\MailSend;

class MailSendRepository extends BaseRepository {

    function getModel() {
        return MailSend::class;
    }
}
