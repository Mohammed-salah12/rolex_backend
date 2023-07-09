<?php

namespace App\repositories;

use App\Http\Requests\CreateOpinionRequest;
use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OpinionRepository
{
    /**
     * @var Opinion
     */
    /**
     * @var Opinion
     */
    private $model;

    public function __construct(Opinion $model)
    {
        $this->model = $model;
    }

    public function getopinions(){
        return Opinion::orderBy('id', 'desc')->paginate(5);
    }


    public function create()
    {
        return response()->view('cms.opinions.create');
    }


    public function store(Request $request, CreateOpinionRequest $createOpinionRequest)
    {
        $validator = Validator::make($request->all(), $createOpinionRequest->rules());



        $opinion = new Opinion();

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . 'img.' . $img->getClientOriginalExtension();
            $img->move('storage/images/opinion', $imgName);
            $opinion->img = $imgName;
        }

        $opinion->massage = $request->input('massage');
        $opinion->name = $request->input('name');
        $opinion->job_name = $request->input('job_name');

        $isSaved = $opinion->save();

        if ($isSaved) {
            return response()->json(['icon' => 'success', 'title' => 'Created successfully'], 200);
        } else {
            return response()->json(['icon' => 'error', 'title' => 'Creation failed'], 400);
        }
    }


    public function findId($id)
    {
        return Opinion::findOrFail($id);
    }

    public function update($id, Request $request, CreateOpinionRequest $createOpinionRequest)
    {
        $validator = Validator::make($request->all(), $createOpinionRequest->rules());

        $opinion = Opinion::findOrFail($id);

        $opinion->massage = $request->input('massage');
        $opinion->name = $request->input('name');
        $opinion->job_name = $request->input('job_name');

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . 'img.' . $img->getClientOriginalExtension();
            $img->move('storage/images/opinion', $imgName);
            $opinion->img = $imgName;
        }

        $isUpdated = $opinion->save();

        if ($isUpdated) {
            return response()->json(['icon' => 'success', 'title' => 'Updated successfully', 'redirect' => route('opinions.index')], 200);
        } else {
            return response()->json(['icon' => 'error', 'title' => 'Update failed'], 400);
        }
    }

    public function delete($id)
    {
        return $this->model->destroy($id);

    }
}
