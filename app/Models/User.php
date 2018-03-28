<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'username', 'password', 'level', 'status',
    ];

    protected $hidden = [
        'password',
    ];

    public function berita()
    {
      return $this->hasMany('App\Models\Berita');
    }

    public function event()
    {
      return $this->hasMany('App\Models\Event');
    }

    public function staff()
    {
      return $this->hasMany('App\Models\Staff');
    }

    public function karir()
    {
      return $this->hasMany('App\Models\Karir');
    }
}
