<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post', 'author_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Check if the user is Author or Admin
     * @return bool
     */
    public function isAuthor() {

        return $this->role == 'author' || $this->role == 'admin';
    }



}
