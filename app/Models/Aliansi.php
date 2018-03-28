<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Aliansi extends Model
{
    use SoftDeletes;
    protected $table = 'aliansi';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama_aliansi','logo','alamat','no_kontak','desc','tingkat','created_at','updated_at'];
}
