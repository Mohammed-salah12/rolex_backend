<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'is_new' => 'boolean',
        'is_featured' => 'boolean',

    ];
    protected $fillable = [
        // other attributes
        'name',
        'price',
        'img',
        'is_new',
        'is_featured',


    ];



}
