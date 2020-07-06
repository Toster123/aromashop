<?php

namespace App\Http\ViewComposers;

use App\Category;
use App\Item;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BestDiscountComposer
{
    public function compose(View $view)
    {
        $itemsWithDiscount = Item::orderBy('discount', 'desc')->limit(8)->get();
        if (Auth::check()) {
            $user = Auth::user();

            $cart = Order::where('type', 1)->where('user_id', Auth::id())->firstOrFail()->items;
            $likes = Order::where('type', 2)->where('user_id', Auth::id())->firstOrFail()->items;

            foreach($itemsWithDiscount as $i) {

                $i->setAttribute('in_cart', $cart->contains($i->id));

                $i->setAttribute('is_liked', $likes->contains($i->id));
            }

        } else {

            $cartList = session('cartList');
            $likesList = session('likesList');

            foreach($itemsWithDiscount as $i) {

                $i->setAttribute('in_cart', !is_null($cartList) && in_array($i->id, $cartList));

                $i->setAttribute('is_liked', !is_null($likesList) && in_array($i->id, $likesList));
            }

        }

        return $view->with('itemsWithDiscount', $itemsWithDiscount);
    }
}
