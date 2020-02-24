<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Item;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function likes () {
	    
	    if (Auth::check()) { 
		    $items = Order::where('type', 2)->where('user_id', Auth::id())->firstOrFail();
		    return view('likes', compact('items')); 
	    } else {
		    
		    $likesList = session('likesList');
     
     if ($likesList) {
	     
	     /* foreach ($cartList as $cartItem) {
		     if (in_array($cartItem, $list)) {
			     $list[$cartItem]++;
		     } else {
		     $list[] = $cartItem => 1;
		     }
	     } */

	     
	     $items = Item::get()->whereIn('id', $likesList);
	     	     
	     return view('likes', compact('items'));
	     
     } else {
	     
	     return view('likes');
     }
     
	    }
	    
    }
    
    public function likesAdd (Request $request) {
	    $itemId = $request->get('itemId');
	    if (Auth::check()) {
		    $order = Order::where('type', 2)->where('user_id', Auth::id())->firstOrFail();
		    
		    if (!$order->items->contains($itemId)) {
			    $order->items()->attach($itemId);
		    }
		    
		    
	    } else {
		    
	    $likesList = session('likesList');
	    
	    if (is_null($likesList)) {
		    
		    session(['likesList' => [$itemId]]);
		    
		    
	    } else {
		    
		   
		
			
		    if (!in_array($itemId, $likesList)) { //важно, проверка эллементов массива по значению
			    
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
		    
		    
		    session()->push('likesList', $itemId);
		    
		    
		    
		    
		    }
	    }
	    
	    
	    
	    }
	    return response()->json(true);
	    
    }
    
    public function likesRemove (Request $request) {
	    	    $itemId = $request->get('itemId');
	     if (Auth::check()) {
		   $order = Order::where('type', 2)->where('user_id', Auth::id())->firstOrFail();
		   if ($order->items->contains($itemId)) {
			   $order->items()->detach($itemId);
			    
			    
		    } else {
			    
		    }
	    } else {
		    $likesList = session('likesList');
	    if (is_null($likesList)) {
		    return false;
	    } else {
		    dump(session()->all());
unset($likesList[array_search($itemId, $likesList)]);
session()->put('likesList', $likesList);
		   dump(session()->all());
	    }
	    }
	    return response()->json(true);
	    
    }
}
