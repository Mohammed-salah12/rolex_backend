<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where(function ($query) {
            $query->where('is_new', 1)
                ->orWhere('created_at', '>=', now()->subDays(7));
        })
            ->orderBy('id', 'desc')
            ->paginate(5);

        // Update is_new to 0 for products older than 7 days
        $this->updateOldProductsStatus();
        $featuredProducts = Product::where('is_featured', true)->get();


        return response()->view('cms.products.index', compact('products'));
    }


    private function updateOldProductsStatus()
    {
        $oldProducts = Product::where('created_at', '<=', now()->subDays(7))->get();

        foreach ($oldProducts as $product) {
            $product->is_new = 0;
            $product->save();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::get();
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
            'is_new' => 'boolean',
            'is_featured' => 'boolean',


        ]);

        if (!$validator->fails()) {
            $products = new Product();
            if (request()->hasFile('img')) {

                $img = $request ->file('img');

                $imgName = time() . 'img.' . $img->getClientOriginalExtension();

                $img->move('storage/images/products', $imgName);

                $products->img = $imgName;
            }
            $products->is_new = true;
            $products->created_at = now();
            $products->product_name = $request->get('product_name');
            $products->is_featured = $request->boolean('is_featured') ? 1 : 0;
            $products->price_product = $request->get('price_product');

            $isSaved  = $products->save();

            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => "Created is successfully"], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => "Created is Failed"], 400);
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
            'name_product' => 'nullable|string|',
            'price_product' => 'nullable',
            'is_new' => 'boolean',
            'is_featured' => 'boolean',

        ]);

        if (! $validator->fails()){

            $products = Product::findOrFail($id);
            $products->product_name = $request->get('product_name');
            $products->price_product = $request->get('price_product');
            $products->is_featured = $request->boolean('is_featured') ? 1 : 0;

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
