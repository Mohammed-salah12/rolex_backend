<?php

namespace App\repositories;

use App\Models\Opinion;
use Spatie\Permission\Models\Role;

class RoleRepository
{

    private $model;

    public function __construct(Role $model)
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
    public function getLatestRolesWithPaginate(){
        return $this->model->latest()->paginate(5);
    }
}
