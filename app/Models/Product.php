<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Product extends Model
{
    use HasFactory;
    protected $casts = [
        'is_new' => 'boolean',
        'is_featured' => 'boolean',

    ];
    protected $fillable = [
        // other attributes
        'product_name',
        'price_product',
        'img',
        'is_new',
        'is_featured',


    ];



}
