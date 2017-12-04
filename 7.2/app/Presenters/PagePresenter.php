<?php
namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class PagePresenter extends Presenter {
    public function paddedTitle() {
        $padding = str_repeat('&nbsp;', $this->depth * 4);
        return $padding.$this->title;
    }

    public function dropDownClass() {
        return $this->children->count() ? 'dropdown' : '';
    }
}