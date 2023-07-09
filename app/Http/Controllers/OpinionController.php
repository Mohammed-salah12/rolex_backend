<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOpinionRequest;
use App\Models\Opinion;
use App\repositories\OpinionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OpinionController extends Controller
{
    /**
     * @var OpinionRepository
     */
    /**
     * @var OpinionRepository
     */
    private $opinionRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public  function  __construct(OpinionRepository $opinionRepository)
     {

         $this->opinionRepository = $opinionRepository;
     }

    public function index()
    {
        $opinions = $this->opinionRepository->getopinions();
        return response()->view('cms.opinions.index', compact('opinions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->opinionRepository->create();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,CreateOpinionRequest $createOpinionRequest)
    {
        $opinions = $this->opinionRepository->store($request, $createOpinionRequest);

        return $opinions;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $opinions = $this->opinionRepository->findId($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $opinions = $this->opinionRepository->findId($id);
        return view('cms.opinions.edit', compact('opinions'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, CreateOpinionRequest $createOpinionRequest)
    {
        // Validate the request
        $validator = Validator::make($request->all(), $createOpinionRequest->rules());

        if ($validator->fails()) {
            // Handle validation errors
            return response()->json(['icon' => 'error', 'title' => 'Validation failed', 'errors' => $validator->errors()], 400);
        }

        // Find the opinion by ID
        $opinion = $this->opinionRepository->findId($id);

        // Update the opinion data
        $opinion->massage = $request->input('massage');
        $opinion->name = $request->input('name');
        $opinion->job_name = $request->input('job_name');

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . 'img.' . $img->getClientOriginalExtension();
            $img->move('storage/images/opinion', $imgName);
            $opinion->img = $imgName;
        }

        // Save the updated opinion
        $isUpdated = $opinion->save();

        if ($isUpdated) {
            return response()->json(['icon' => 'success', 'title' => 'Updated successfully', 'redirect' => route('opinions.index')], 200);
        } else {
            return response()->json(['icon' => 'error', 'title' => 'Update failed'], 400);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opinions = $this->opinionRepository->findId($id);
        $opinions = $this->opinionRepository->delete($id);

    }
}
