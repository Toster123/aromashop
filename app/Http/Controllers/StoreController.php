<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function store (Request $request) {
	    if ($request->ajax()) {
		    if (!is_null($request->get('category'))) {
		    $specs[] = ['category', '=', $request->get('category')];
	    }
	    if (!is_null($request->get('brand'))) {
		    $specs[] = ['brand', '=', $request->get('brand')];
	    }
	    if (!is_null($request->get('color'))) {
		    $specs[] = ['color', '=', $request->get('color')];
	    }
	    if (!is_null($request->get('priceMin'))) {
		    $specs[] = ['price', '>=', (float)$request->get('priceMin')];
	    }
	    if (!is_null($request->get('priceMax'))) {
		    $specs[] = ['price', '<=', (float)$request->get('priceMax')];
	    }
	    if (!is_null($request->get('term'))) {
		    $specs[] = ['title', 'LIKE', '%'.$request->get('term').'%'];
	    }
	    if (!is_null($request->get('sortby'))) {
		    if ($request->get('sortby') == 'priceInDes') {
			    $collumn = 'price';
				$orderBy = 'desc';
		    }
		    if ($request->get('sortby') == 'priceInAsc') {
			    $collumn = 'price';
				$orderBy = 'asc';
		    }
		    if ($request->get('sortby') == 'raiting') {
			    $collumn = 'purchases';
				$orderBy = 'desc';
		    }
		    if ($request->get('sortby') == 'reviews') {
			    $collumn = 'purchases';
				$orderBy = 'desc';
		    }
		    
	    } else {
		    $collumn = 'purchases';
		    $orderBy = 'desc';
	    }
	    
	    
	    if (isset($specs)) {
		    $items = Item::where($specs)->orderBy($collumn, $orderBy)->paginate(3)->withPath("?".http_build_query($request->except('page')));
	    } else {
		    $items = Item::orderBy($collumn, $orderBy)->paginate(3)->withPath("?".http_build_query($request->except('page')));
	    }
	    
	    if (Auth::check()) {
		    
		    $cart = Order::where('type', 1)->where('user_id', Auth::id())->firstOrFail()->items;
		    
		    $likes = Order::where('type', 2)->where('user_id', Auth::id())->firstOrFail()->items;
		    
		    	    
	    } else {
		    $cartList = session('cartList');
		    $cart = Item::get()->whereIn('id', $cartList);
		    $likesList = session('likesList');
		    $likes = Item::get()->whereIn('id', $likesList);
	    }
		    	    
	    foreach($items as $item) {
		    if ($cart->contains($item->id)) {
			    $item->setAttribute('in_cart', true);
		    } else {
			    $item->setAttribute('in_cart', false);
		    }
		    if ($likes->contains($item->id)) {
			    $item->setAttribute('is_liked', true);
		    } else {
			    $item->setAttribute('is_liked', false);
		    }
	    }
	    
	    return view('layouts.items', compact('items'));
	    
	    
	    
	    } else {
	    if (Auth::check()) {
		    $user = User::where('id', Auth::id())->firstOrFail();
		    
		    $reversed = $user->browsingHistory->reverse();
		    } else {
			    
		    
		    $browsingHistory = session('browsingHistory');
		    
		if (!is_null($browsingHistory)) {
			$items = Item::find($browsingHistory)->sortBy(function ($item) use ($browsingHistory) {
    return array_search($item->getKey(), $browsingHistory);
});
$reversed = $items->reverse();
		} else {
			return view('store');
		}
		   
		

	    
	    }
	    
	    return view('store', compact('items', 'reversed'));
	    }
    }
    
    public function ajaxItems (Request $request) {
	    
	    if (!is_null($request->get('category'))) {
		    $specs[] = ['category', '=', $request->get('category')];
	    }
	    if (!is_null($request->get('brand'))) {
		    $specs[] = ['brand', '=', $request->get('brand')];
	    }
	    if (!is_null($request->get('color'))) {
		    $specs[] = ['color', '=', $request->get('color')];
	    }
	    if (!is_null($request->get('priceMin'))) {
		    $specs[] = ['price', '>=', (float)$request->get('priceMin')];
	    }
	    if (!is_null($request->get('priceMax'))) {
		    $specs[] = ['price', '<=', (float)$request->get('priceMax')];
	    }
	    if (!is_null($request->get('term'))) {
		    $specs[] = ['title', 'LIKE', '%'.$request->get('term').'%'];
	    }
	    if (!is_null($request->get('sortby'))) {
		    if ($request->get('sortby') == 'priceInDes') {
			    $collumn = 'price';
				$orderBy = 'desc';
		    }
		    if ($request->get('sortby') == 'priceInAsc') {
			    $collumn = 'price';
				$orderBy = 'asc';
		    }
		    if ($request->get('sortby') == 'raiting') {
			    $collumn = 'purchases';
				$orderBy = 'desc';
		    }
		    if ($request->get('sortby') == 'reviews') {
			    $collumn = 'purchases';
				$orderBy = 'desc';
		    }
		    
	    } else {
		    $collumn = 'purchases';
		    $orderBy = 'desc';
	    }
	    
	    
	    if (isset($specs)) {
		    $items = Item::where($specs)->orderBy($collumn, $orderBy)->paginate(3);
	    } else {
		    $items = Item::orderBy($collumn, $orderBy)->paginate(3);
	    }
	    
	    if (Auth::check()) {
		    
		    $cart = Order::where('type', 1)->where('user_id', Auth::id())->firstOrFail()->items;
		    
		    $likes = Order::where('type', 2)->where('user_id', Auth::id())->firstOrFail()->items;
		    
		    	    
	    } else {
		    $cartList = session('cartList');
		    $cart = Item::get()->whereIn('id', $cartList);
		    $likesList = session('likesList');
		    $likes = Item::get()->whereIn('id', $likesList);
	    }
		    	    
	    foreach($items as $item) {
		    if ($cart->contains($item->id)) {
			    $item->setAttribute('in_cart', true);
		    } else {
			    $item->setAttribute('in_cart', false);
		    }
		    if ($likes->contains($item->id)) {
			    $item->setAttribute('is_liked', true);
		    } else {
			    $item->setAttribute('is_liked', false);
		    }
	    }
	    
	    return view('layouts.items', compact('items'));
    
    
}

public function search (Request $request) {
	$search = $request->get('term');
	$result = Item::select('title')
	->where('title', 'LIKE', '%'.$search.'%')
	->pluck('title');
	
	return response()->json($result);
}
}