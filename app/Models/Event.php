<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
    use SoftDeletes;
    protected $table = 'event';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama_event','lokasi','tanggal_event','waktu','desc','flag','view','pic','id_user','created_at','updated_at'];
    public function user()
    {
      return $this->belongsTo('App\Models\User', 'id_user');
    }
}
