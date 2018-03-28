<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Testimony;

class Testimony extends Model
{
    use SoftDeletes;
    protected $table = 'testimony';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama','jabatan','perusahaan','desc','photo','created_at','updated_at'];
}
