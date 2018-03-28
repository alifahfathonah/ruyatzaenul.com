<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CatBerita extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'cat_berita';
    protected $fillable = ['nama_kategori', 'desc', 'id_divisi', 'created_at', 'updated_at'];

    public function divisi()
    {
      return $this->belongsTo('App\Models\DivisiCCIT', 'id_divisi');
    }

    public function berita()
    {
      return $this->hasMany('App\Models\Berita');
    }
}
