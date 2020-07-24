<?php

namespace App\Http\ViewComposers;

use App\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view)
    {
        $footerTrandingItems = Item::orderBy('purchases', 'desc')->limit(6)->get(['id', 'img_href']);

        return $view->with('footerTrandingItems', $footerTrandingItems);
    }
}
