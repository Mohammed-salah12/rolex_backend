<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $products=Product::orderBy('id','desc')->paginate(5);
         return response()->view('cms.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        return response()->view('cms.products.create',compact('products'));

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
            'price_product' => 'string',
        ]);

        if (!$validator->fails()) {
            $products = new Product();
            if (request()->hasFile('img')) {

                $img = $request ->file('img');

                $imgName = time() . 'img.' . $img->getClientOriginalExtension();

                $img->move('storage/images/products', $imgName);

                $products->img = $imgName;
            }

            $products->product_name = $request->get('product_name');
            $products->price_product = $request->get('price_product');

            $isSaved  = $products->save();

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
        $products = Product::find($id);
        return response()->view('cms.products.edit' , compact('products'));
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
            'name_product' => 'required|string|',
            'name_product' => 'nullable',
        ]);

        if (! $validator->fails()){

            $products = Product::findOrFail($id);
            $products->product_name = $request->get('product_name');
            $products->price_product = $request->get('price_product');
            $isUpdated = $products->save();

            if (request()->hasFile('img')) {

                $img = $request->file('img');

                $imageName = time() . 'img.' . $img->getClientOriginalExtension();

                $img->move('storage/images/products', $imageName);

                $products->img = $imageName;
                }
                $isUpdated = $products->save();

            return ['redirect' => route('products.index')];
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
        $products = Product::destroy($id);
    }
}
