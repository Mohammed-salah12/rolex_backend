<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{


    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
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
            ->latest()
            ->paginate(5);

        // Update is_new to 0 for products older than 7 days
        $this->updateOldProductsStatus();
        $featuredProducts = Product::where('is_featured', 1)->get();

        $this->authorize('viewAny' , Product::class);

        return $this->generateResponse('index' , compact('products'));

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
        $this->authorize('create' , Product::class);
        $this->productRepository->getPage();
        return $this->generateResponse('create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $products = new Product();
        $products->fill($request->validated());
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . 'img.' . $img->getClientOriginalExtension();
            $img->move('storage/images/products', $imgName);
            $products->img = $imgName;
        }
        $products->is_new = 1;
        $products->created_at = now();
        $products->is_featured = $request->boolean('is_featured') ? 1 : 0;
        $isSaved = $products->save();
        $response = $isSaved
            ? $this->generateSweetAlertResponse('success')
            : $this->generateSweetAlertResponse('error');
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
        $this->authorize('update' , Product::class);
        $products =$this->productRepository->findId($id);
        return $this->generateResponse('edit' , compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        $products = $this->productRepository->findId($id);
        $products->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imageName = time() . 'img.' . $img->getClientOriginalExtension();
            $img->move('storage/images/products', $imageName);
            $products->img = $imageName;
        }

        $products->is_new = 1;
        $products->created_at = now();
        $products->is_featured = $request->boolean('is_featured') ? 1 : 0;
        $isUpdated = $products->save();

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete' , Product::class);
        $this->productRepository->findId($id);
        $this->productRepository->delete($id);
    }



    function generateResponse($action, $data = [])
    {

        $view = 'cms.products.' . $action;
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
