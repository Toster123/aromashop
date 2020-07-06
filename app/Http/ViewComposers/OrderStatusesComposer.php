<?php

namespace App\Http\ViewComposers;

use App\Status;
use Illuminate\View\View;

class OrderStatusesComposer
{
    public function compose(View $view)
    {
        return $view->with('statuses', Status::get());
    }
}
