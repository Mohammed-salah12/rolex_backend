<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomePageRequest;
use App\Http\Requests\OpinionRequest;
use App\Models\Opinion;
use App\repositories\OpinionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OpinionController extends Controller
{

    /**
     * @var OpinionRepository
     */
    private $opinionRepository;

    public function __construct(OpinionRepository $opinionRepository)
    {
        $this->opinionRepository = $opinionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny' , Opinion::class);
        $opinions = $this->opinionRepository->getLatestOpinionsWithPaginate();
        return $this->generateResponse('index' , compact('opinions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create' , Opinion::class);
        $this->opinionRepository->getPage();
        return $this->generateResponse('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpinionRequest $request)
    {
        $opinions = new Opinion($request->validated());
        if (request()->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . 'img.' . $img->getClientOriginalExtension();
            $img->move('storage/images/opinions', $imgName);
            $opinions->img = $imgName;
        }
        $isSaved = $opinions->save();
        if ($isSaved) {
            $response = $this->generateSweetAlertResponse('success');
            return $response;
        } else {
            $response = $this->generateSweetAlertResponse('error');
            return $response;
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update' , Opinion::class);
        $opinions=$this->opinionRepository->findId($id);
        return $this->generateResponse('edit' , compact('opinions'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(OpinionRequest $request, $id)
    {
        $opinions = $this->opinionRepository->findId($id);
        $opinions->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imageName = time() . 'img.' . $img->getClientOriginalExtension();
            $img->move('storage/images/opinions', $imageName);
            $opinions->img = $imageName;
            $opinions->save();
        }



        return ['redirect'=>route('opinions.index')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete' , Opinion::class);
        $this->opinionRepository->findId($id);
        $this->opinionRepository->delete($id);
    }


    function generateResponse($action, $data = [])
    {

        $view = 'cms.opinions.' . $action;
        return response()->view($view, $data);
    }

    function generateSweetAlertResponse($status)
    {
        $response = [];

        if ($status === 'success') {
            $response['icon'] = 'success';
            $response['title'] = 'Worked successfully';
            $responseCode = 200;
        } else {
            $response['icon'] = 'error';
            $response['title'] = 'Something went wrong ';
            $responseCode = 400;
        }

        return response()->json($response, $responseCode);
    }
}
