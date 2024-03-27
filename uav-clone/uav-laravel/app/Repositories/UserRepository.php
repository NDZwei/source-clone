<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository {

    function getModel() {
        return User::class;
    }

    public function getUserByEmail($email) {
        return $this->model->where('email', 'like', $email)->first();
    }
}
