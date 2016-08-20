<?php


namespace App\Traits;


use Illuminate\Support\Facades\Auth;

trait Likeable
{
    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable')->whereDeletedAt(null);
    }

    public function getIsLikedAttribute()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();

        return (!is_null($like)) ? true : false;
    }

    public function likesCount(){

        return $this->likes()->count();
    }
}