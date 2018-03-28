<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    //
    use SoftDeletes;
    protected $table = 'profile';
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','desc','category','flag','pic','view','created_at','updated_at'];
}
