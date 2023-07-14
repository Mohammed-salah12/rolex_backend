<?php

namespace App\repositories;

use App\Models\Opinion;

class OpinionRepository
{
    private $model;

    public function __construct(Opinion $model)
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
    public function getLatestOpinionsWithPaginate(){
        return $this->model->latest()->paginate(5);
    }

}
