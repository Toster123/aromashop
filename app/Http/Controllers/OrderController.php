<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
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
}
