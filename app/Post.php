<?php

namespace App;

use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Facades\Purifier;

class Post extends Model
{
//    use AlgoliaEloquentTrait;


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

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function setPreviewAttribute($value)
    {
        $this->attributes['preview'] = Purifier::clean($value);
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = Purifier::clean($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }
}
