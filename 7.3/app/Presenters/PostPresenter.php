<?php
namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use Carbon\Carbon;

class PostPresenter extends Presenter {
    public function publishedDate() {
        return Carbon::parse($this->published_at)->toFormattedDateString();
    }
}