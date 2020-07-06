<?php

namespace App\Http\ViewComposers;

use App\BrowsingHistory;
use App\Item;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BrowsingHistoryComposer
{
    public function compose(View $view)
    {
        $reversed = [];
        if (Auth::check()) {
            $user = Auth::user();
            $reversed = $user->browsingHistory->reverse();


            $cart = Order::where('type', 1)->where('user_id', Auth::id())->firstOrFail()->items;
            $likes = Order::where('type', 2)->where('user_id', Auth::id())->firstOrFail()->items;

            foreach($reversed as $i) {

                $i->setAttribute('in_cart', $cart->contains($i->id));

                $i->setAttribute('is_liked', $likes->contains($i->id));
            }

        } else {
            $browsingHistory = session('browsingHistory');
            if (!is_null($browsingHistory)) {
                $items = Item::find($browsingHistory)->sortBy(function ($item) use ($browsingHistory) {
                    return array_search($item->getKey(), $browsingHistory);
                });
                $reversed = $items->reverse();

            }

            $cartList = session('cartList');
            $likesList = session('likesList');

            foreach($reversed as $i) {

                $i->setAttribute('in_cart', !is_null($cartList) && in_array($i->id, $cartList));

                $i->setAttribute('is_liked', !is_null($likesList) && in_array($i->id, $likesList));
            }

        }

        return $view->with('browsingHistory', $reversed);
    }
}
