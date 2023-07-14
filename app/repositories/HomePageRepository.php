<?php

namespace App\repositories;
use App\Models\Homepage;

class HomePageRepository
{
    private $model;

    public function __construct(Homepage $model)
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
    public function getLatestHomePagesWithPaginate(){
        return $this->model->latest()->paginate(5);
    }
}
