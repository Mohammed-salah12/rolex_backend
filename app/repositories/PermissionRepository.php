<?php

namespace App\repositories;

use Spatie\Permission\Models\Permission;

class PermissionRepository
{
    /**
     * @var Permission
     */
    private $model;

    public function __construct(Permission $model)
{
    $this->model = $model;
}

    public function findId($id)
    {
        return $this->model->findOrFail($id);
    }
    public function delete($id)
    {
        return $this->model->destroy($id);

    }
    public function getPage()
    {
        return $this->model->get();
    }

    public function getLatestPermissionsWithPaginate(){
        return $this->model->latest()->paginate(5);
    }




}
