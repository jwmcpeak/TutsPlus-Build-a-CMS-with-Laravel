<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'slug',
        'body',
        'excerpt',
        'published_at'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
