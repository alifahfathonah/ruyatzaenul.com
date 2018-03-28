<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Berita extends Model
{
    use SoftDeletes;

    protected $table = 'berita';
    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'desc', 'file','view','flag','id_kategori','id_user','slug', 'created_at', 'updated_at'];

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function cat_berita()
    {
      return $this->belongsTo('App\Models\CatBerita', 'id_kategori');
    }
}
