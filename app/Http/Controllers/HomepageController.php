<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomePageRequest;
use App\Models\Homepage;
use App\repositories\HomePageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomepageController extends Controller
{
    /**
     * @var HomePageRepository
     */
    private $homePageRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(HomePageRepository $homePageRepository)
    {

        $this->homePageRepository = $homePageRepository;
    }
    public function index()
    {
      $homepages=$this->homePageRepository->getLatestHomePagesWithPaginate();
        $this->authorize('viewAny' , Homepage::class);
        return $this->generateResponse('index' , compact('homepages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $homepages=$this->homePageRepository->getPage();
        $this->authorize('create' , Homepage::class);
        return $this->generateResponse('create' , compact('homepages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomePageRequest $request)
    {
        $homepages = new Homepage($request->validated());
        if (request()->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . 'img.' . $img->getClientOriginalExtension();
            $img->move('storage/images/homepages', $imgName);
            $homepages->img = $imgName;
        }
        $isSaved = $homepages->save();
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
        $this->authorize('update' , Homepage::class);
        $homepages=$this->homePageRepository->findId($id);
        return $this->generateResponse('edit' , compact('homepages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HomePageRequest $request, $id)
    {

        $homepages = $this->homePageRepository->findId($id);
        $homepages->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imageName = time() . 'img.' . $img->getClientOriginalExtension();
            $img->move('storage/images/homepages', $imageName);
            $homepages->img = $imageName;
            $homepages->save();
        }



        return ['redirect'=>route('homepages.index')];


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Homepage::class);
        $this->homePageRepository->findId($id);
        $this->homePageRepository->delete($id);

    }


    function generateResponse($action, $data = [])
    {
        $view = 'cms.homepages.' . $action;
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
