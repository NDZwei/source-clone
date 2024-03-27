<?php

namespace App\Services;

abstract class BaseService {
    protected $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function save(array $data) {
        return $this->repository->save($data);
    }

    public function deleteById($id) {
        return $this->repository->deleteById($id);
    }

    public function getDataColumnWithRelation($columns = '*', $relation = [])
    {
        return $this->repository->getDataColumnWithRelation($columns, $relation);
    }

    public function findByIds($columns = ['*'], array $ids)
    {
        return $this->repository->findByIds($columns, $ids);
    }

    public function findByConditions(array $conditions)
    {
        return $this->repository->findByConditions($conditions);
    }

    public function getPage($pageIndex, $pageSize, $columns = ['*'], array $request) {
        $conditions = $request['$conditions'];
        return $this->repository->getPage($pageIndex, $pageSize, $columns, $conditions);
    }
}
