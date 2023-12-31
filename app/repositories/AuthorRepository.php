<?php

namespace App\repositories;

use App\Models\Author;
use App\Models\Opinion;

class AuthorRepository
{
    private $model;

    public function __construct(Author $model)
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
    public function getLatestAuthorsWithPaginate(){
        return $this->model->latest()->paginate(5);
    }

}
