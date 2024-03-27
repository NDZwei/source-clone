<?php

namespace App\Services;

use App\Repositories\UserDeviceTokenRepository;

class UserDeviceTokenService extends BaseService {

    public function __construct(UserDeviceTokenRepository $repository)
    {
        parent::__construct($repository);
    }
}
