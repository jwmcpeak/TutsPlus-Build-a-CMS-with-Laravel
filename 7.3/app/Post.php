<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Post extends Model
{
    use PresentableTrait;

    protected $presenter  = 'App\Presenters\PostPresenter';

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
