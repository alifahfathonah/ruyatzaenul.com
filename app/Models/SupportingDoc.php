<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupportingDoc extends Model
{
    //
    use SoftDeletes;
    protected $table = 'supporting_doc';
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','desc','file','view','created_at','updated_at'];
}
