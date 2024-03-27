<?php

namespace App\Services;

use App\Repositories\ParameterRepository;

class ParameterService extends BaseService {

    public function __construct(ParameterRepository $repository)
    {
        parent::__construct($repository);
    }
}
