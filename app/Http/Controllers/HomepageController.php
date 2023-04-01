<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use App\Models\Homepages;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $homepages=Homepage::orderBy('id' , 'desc')->paginate(5);
      return response()->view('cms.homepages.index' , compact('homepages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $homepages=Homepage::all();
        return response()->view('cms.homepages.create' , compact('homepages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'title' => 'string',
            
        ]);

        if (!$validator->fails()) {
            $homepages = new Homepage();
            if (request()->hasFile('img')) {

                $img = $request ->file('img');

                $imgName = time() . 'img.' . $img->getClientOriginalExtension();

                $img->move('storage/images/homepages', $imgName);

                $homepages->img = $imgName;
            }

            $homepages->title = $request->get('title');
            $homepages->discription = $request->get('discription');
            $homepages->price = $request->get('price');


            $isSaved  = $homepages->save();

            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => "Created is successfully"], 200);
            } else {
                return response()->json(['icon' => 'Failed', 'title' => "Created is Failed"], 400);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
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
        $homepages=Homepage::findOrFail($id);
        return response()->view('cms.homepages.edit' , compact('homepages'));
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
            'title' => 'required|string|',
        ]);

        if (! $validator->fails()){

            $homepages = Homepage::findOrFail($id);
            $homepages->title = $request->get('title');
            $homepages->discription = $request->get('discription');
            $homepages->price = $request->get('price');
            $isUpdated = $homepages->save();

            if (request()->hasFile('img')) {

                $img = $request->file('img');

                $imageName = time() . 'img.' . $img->getClientOriginalExtension();

                $img->move('storage/images/homepages', $imageName);

                $homepages->img = $imageName;
                }
                $isUpdated = $homepages->save();

            return ['redirect' => route('homepages.index')];
            if($isUpdated){
                return response()->json(['icon' => 'success' , 'title' => 'Updated is Successfully'] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'Updated is Failed'] , 400);

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
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
      $homepages=Homepage::destroy($id);
    }
}
