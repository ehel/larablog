<?php

namespace App;

use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use App\Traits\Likeable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;

class Post extends Model
{
//    use AlgoliaEloquentTrait;
        use Likeable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'preview', 'body',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * @param $value
     */
    public function setPreviewAttribute($value)
    {
        $this->attributes['preview'] = Purifier::clean($value);
    }

    /**
     * @param $value
     */
    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = Purifier::clean($value);
    }

    /**
     * @param $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }

    /**
     * Check if post author is authenticated user or admin
     * @return bool
     */
    public function isOwnedByAuthenticatedUser() {

        if(Auth::check()){
            return $this->author_id == Auth::id() || Auth::user()->role == 'admin';
        }
        return false;
    }


}
