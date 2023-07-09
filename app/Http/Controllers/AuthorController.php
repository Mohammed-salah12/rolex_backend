<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequset;
use App\Models\Author;
use App\repositories\AuthorRepository;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * @var AuthorRepository
     */
    private $authorRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function index()
    {
       $authors=Author::latest()->paginate(5);
        return $this->generateResponse('index' , compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->generateResponse('create');

    }

    /**s
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequset $request)
    {
        Author::create($request->validated());

        $response = $this->generateSweetAlertResponse('success');

        return $response;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = $this->authorRepository->findId($id);
        return $this->generateResponse('edit',  compact('authors'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all() , [
          'password' => 'nullable',
            'gmail'=> 'required|email'
       ]);

        $authors = Author::findOrFail($id);
        $validator = Validator($request->all() , [
            'password' => 'nullable',
            'gmail'=> 'required|email'
        ]);

        $author = $this->authorRepository->findId($id);
        $author->fill($request->only('gmail'));
        $isSaved = $author->save();

        if($isSaved){
            return ['redirect'=>route('authors.index')];
        }
        else{

            $response = $this->generateSweetAlertResponse('error');

            return $response;

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
        $author = $this->authorRepository->findId($id);
        $author = $this->authorRepository->delete($id);

    }

    function generateResponse($action, $data = [])
    {
        $view = 'cms.authors.' . $action;
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
