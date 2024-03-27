<?php

namespace App\Repositories;

use App\Models\Person;
use App\Models\Role;

class RoleRepository extends BaseRepository {

    function getModel() {
        return Role::class;
    }
}
