<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catagory extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=['id'];
    // protected $fillable=[
    //     'title',
    //     'slug',
    //     'is_active'

    // ];
}
