<?php

namespace App\Repositories;

use App\Models\AdministrativeUnit;

class AdministrativeUnitRepository extends BaseRepository {

    function getModel() {
        return AdministrativeUnit::class;
    }
}
