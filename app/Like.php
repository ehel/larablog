<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;



    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
    ];


    public function comments()
    {
        return $this->morphedByMany('App\Comment', 'likeable');
    }


    public function posts()
    {
        return $this->morphedByMany('App\Post', 'likeable');
    }
}
