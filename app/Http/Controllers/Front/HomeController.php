<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Homepage;
use App\Models\Opinion;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $homepages = Homepage::latest()->first();
        $products = Product::all();
        $newProducts = Product::where(function ($query) {
            $query->where('is_new', 1)
                ->orWhere('created_at', '>=', now()->subDays(7));
        })
            ->latest()
            ->paginate(5);

        $featuredProducts = Product::where('is_featured', 1)->latest()->paginate(5);

        $latestOpinions = Opinion::latest()->get();

        return view('rolex.index', compact('homepages', 'products', 'newProducts', 'featuredProducts', 'latestOpinions'));
    }


}
