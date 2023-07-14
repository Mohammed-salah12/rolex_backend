<?php

namespace App\repositories;

use App\Models\Admin;

class AdminRepository
{
    private $model;

    public function __construct(Admin $model)
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

    public function getLatestAdminsWithPaginate(){
        return $this->model->latest()->paginate(5);
    }
}
