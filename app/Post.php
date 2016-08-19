<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Facades\Purifier;

class Post extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'preview', 'body',
    ];

    public function author()
    {
        return $this->belongsTo('App\User');
    }

    public function setPreviewAttribute($value)
    {
        $this->attributes['preview'] = Purifier::clean($value);
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = Purifier::clean($value);
    }
}
