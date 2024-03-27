<?php

namespace App\Http\Controllers;

use App\Services\AdministrativeUnitService;
use Exception;

class AdministrativeUnitController extends BaseController {

    public function __construct(AdministrativeUnitService $service)
    {
        parent::__construct($service);
    }

    public function downloadExcel() {
        return $this->service->downloadExcel();
    }

    public function getAllProvince() {
        try {
            $data = $this->service->getAllProvince();
            return $this->getResponse200($data);
        } catch (Exception $e) {
            return $this->getResponse500($e->getMessage());
        }
    }

    public function getAllByParent($parentId) {
        try {
            $data = $this->service->getAllByParent($parentId);
            return $this->getResponse200($data);
        } catch (Exception $e) {
            return $this->getResponse500($e->getMessage());
        }
    }
}
