<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart () {
	    
	   /* $orderId = session('orderId');
	    if (!is_null($orderId)) {
		    $order = Order::findOrFail($orderId);
		    return view('cart', compact('order'));	    
    
	    }
	    */
	    
	    if (Auth::check()) {
		    
		    $items = Order::where('type', 1)->where('user_id', Auth::id())->firstOrFail();
		    
		    return view('cart', compact('items'));	    
	    } else {
		    
     $cartList = session('cartList');
     
     if (!is_null($cartList)) {
	     /* foreach ($cartList as $cartItem) {
		     if (in_array($cartItem, $list)) {
			     $list[$cartItem]++;
		     } else {
		     $list[] = $cartItem => 1;
		     }
	     } */
	     $counts = array_count_values($cartList);
	     $cartList = array_unique($cartList);
	     
	     $items = Item::get()->whereIn('id', $cartList);
	     	     
	     return view('cart', compact('items', 'counts'));
	     
     } else {
	     return view('cart');
     }
     
    }
    
    }
    
    public function cartAdd ($itemId) {
	    
	  /*  $orderId = session('orderId');
	    if (is_null($orderId)) {
		    $order = Order::create();
		    session(['orderId' => $order->id]);
	    } else {
		    $order = Order::find($orderId);
	    }
	    $order->items()->attach($itemId); */
	    
	    if (Auth::check()) {
		    $order = Order::where('type', 1)->where('user_id', Auth::id())->firstOrFail();
		    if ($order->items->contains($itemId)) {
			    $pivotRow = $order->items()->where('item_id', $itemId)->first()->pivot;
			    $pivotRow->count++;
			    $pivotRow->update();
		    } else {
			    $order->items()->attach($itemId);
		    }
	    } else {
	    $cartList = session('cartList');
	    if (is_null($cartList)) {
		    session(['cartList' => [$itemId]]);
		    
		    
	    } else {
		    /*if (isset($cartList[$itemId])) {

			    session()->forget('count');
			    
			    session(['count' => [$itemId => 8]]);
			    session(['count' => [1 => 5]]);
			    session()->push('count', [7 => [4 => 3]]); 
			    session()->push(, [7 => [4 => 3]]); 
			    dd(session('count'));
		    } else {
		    session()->push('cartList', $itemId);
		    session()->push('count', $itemId, 1);
		    }*/
		    session()->push('cartList', $itemId);
	    }
	    
	    
	    
	    }
	    return redirect('cart');
    }
    
    public function cartRemove ($itemId) {
	    
	     if (Auth::check()) {
		   $order = Order::where('type', 1)->where('user_id', Auth::id())->firstOrFail();
		   if ($order->items->contains($itemId)) {
			    $pivotRow = $order->items()->where('item_id', $itemId)->first()->pivot;
			    if ($pivotRow->count < 2) {
				    $order->items()->detach($itemId);
			    } else {
				    $pivotRow->count--;
					$pivotRow->update();
			    }
			    
			    
		    } else {
			    
		    }
	    } else {
		    $cartList = session('cartList');
	    if (is_null($cartList)) {
		    return false;
	    } else {
		    dump(session()->all());
$array = session()->pull('cartList',[]);
unset($array[array_search($itemId, $array)]);
session()->put('cartList',$array);
		   dump(session()->all());
	    }
	    }
	    return redirect('cart');
	    
    }
    
}
