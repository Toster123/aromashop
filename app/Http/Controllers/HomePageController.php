<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Item;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function home () {
	    
	    $itemsWithDiscount = Item::orderBy('discount', 'desc')->limit(8)->get();
	    $popularItems = Item::orderBy('purchases', 'desc')->limit(8)->get();
	    
	    
	    
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
			return view('home', compact('popularItems', 'itemsWithDiscount'));
		}
		   
		

	    
	    }
	    return view('home', compact('reversed', 'popularItems', 'itemsWithDiscount'));
    }
}
