<?php

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;

class NavbarComposer
{
    public function compose(View $view)
    {
        return $view->with('categories', Category::get());
    }
}
