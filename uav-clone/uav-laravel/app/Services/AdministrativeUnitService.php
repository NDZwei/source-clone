<?php

namespace App\Services;

use App\Http\Resources\AdministrativeUnitResource;
use App\Repositories\AdministrativeUnitRepository;

class AdministrativeUnitService extends BaseService {

    public function __construct(AdministrativeUnitRepository $repository)
    {
        parent::__construct($repository);
    }

    public function downloadExcel() {
        $template = resource_path('templates/administrative-unit.xlsx');
        return response()->download($template, 'template_file.xlsx');
    }

    public function importExcel() {

    }

    public function getAllProvince() {
        $result = $this->repository->findByConditions([
            ['column' => 'parent_id', 'operator' => 'is', 'value' => 'null'],
            ['column' => 'level', 'operator' => '=', 'value' => '3'],
        ]);
        return AdministrativeUnitResource::collection($result);
    }

    public function getAllByParent($parentId) {
        $result = $this->repository->findByConditions([
            ['column' => 'parent_id', 'operator' => '=', 'value' => $parentId]
        ]);
        return AdministrativeUnitResource::collection($result);
    }

    public function getPage($pageIndex, $pageSize, $columns = ['*'], array $request) {
        $conditions = [];
        if(isset($request['parent_id'])) {
            $conditions[] = [
                ['column' => 'parent_id', 'operator' => '=', 'value' => $request['parent_id']]
            ];
        } else {
            $conditions[] = [
                ['column' => 'parent_id', 'operator' => 'is', 'value' => null]
            ];
        }
        if(isset($request['keyword'])) {
            $conditions[] = [
                ['column' => 'code', 'operator' => 'like', 'value' => $request['keyword']]
            ];
        }
        return $this->repository->getPage($pageIndex, $pageSize, $columns, $conditions);
    }

}
