<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Item;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function trackingPage () {
	    if (Auth::check()) {
		    $orders = Order::get()->where('type', 3)->where('user_id', Auth::id());
		    
		    return view('tracking', compact('orders'));
	    } else {
		    
	    return view('tracking');
    	}
    }
    
    public function orderPage ($orderId) {
	    if (Auth::check()) {
	    $items = Order::where('type', 3)->where('id', $orderId)->where('user_id', Auth::id())->firstOrFail();
	    
	    if (!is_null($items)) {
		    return view('order', compact('items'));
	    } else {
		    dd('не найдено');
	    }
	    
    }
    }
    
    function checkout () {
	    
	    
	    if (Auth::check()) {
		    $order = Order::where('type', 1)->where('user_id', Auth::id())->firstOrFail()->items;
		    return view('checkout', compact('order'));
	    } else {
		    $cartList = session('cartList');
		    $order = Item::get()->whereIn('id', $cartList);
		    if (!is_null($cartList)) {
			    $counts = array_count_values($cartList);
		    foreach($order as $item) {
			    if (isset($counts[$item->id])) {
				    $item->setAttribute('count', $counts[$item->id]);
			    }
		    }
		    return view('checkout', compact('order'));
		    } else {
			    return view('checkout');
		    }
		    
		    
		    
	    }
	    
	    
	    
    }
}
