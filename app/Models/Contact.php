<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    //
    use SoftDeletes;
    protected $table = 'contact';
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','alamat','telepon','email','maps','created_at','updated_at'];
}
