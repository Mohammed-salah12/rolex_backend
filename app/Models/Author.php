<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Author extends Authenticatable
{
    use HasFactory , HasRoles;

    protected $fillable = [
        'gmail',
        'password',
    ];
}
