<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $admins=Admin::orderBy('id' , 'desc')->paginate(5);
      return  response()->view('cms.admins.index' , compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins=Admin::all();
        return response()->view('cms.admins.create',compact('admins'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valedetor=validator(request()->all([
            'password'=>'required|password' ,
            'gmail'=>'required' ,

           ]));
           if(! $valedetor->fails() ){
            $admins= new Admin();
            $admins->gmail=$request->get('gmail');
            $admins->password=Hash::make($request->get('password'));
            $IsSaved=$admins->save();
            if ($IsSaved) {
                return response()->json(['icon' => 'success', 'title' => "Created is successfully"], 200);
            } else {
                return response()->json(['icon' => 'Failed', 'title' => "Created is Failed"], 400);
            }
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins=Admin::findOrFail($id);
        return response()->view('cms.admins.edit',compact('admins'));
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
        ]);

        if(! $validator->fails()){
            $admins = Admin::findOrFail($id);
            $admins->gmail = $request->get('gmail');
            $isSaved = $admins->save();

            if($isSaved){

                return ['redirect'=>route('admins.index')];

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] ,400);
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
        $admins = Admin::destroy($id);

    }
}
