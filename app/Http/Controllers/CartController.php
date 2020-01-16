<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart () {
	    return view('cart');
    }
    
    public function cartAdd ($itemId) {
	    
	    $orderId = session('orderId');
	    if (is_null($orderId)) {
		    $orderId = Order::create()->id;
		    session(['orderId' => $orderId]);
	    } else {
		    $order = Order::find($orderId);
	    }
	    $order->items()->attach($itemId);
	    
	    dump($order->items());
	    
	    dump($order);
    }
}
