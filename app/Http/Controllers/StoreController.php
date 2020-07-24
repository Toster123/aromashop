<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use App\Order;
use App\Category;
use App\Brand;
use App\Color;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function store (Request $request) {
      $reversed = [];
	    if ($request->ajax()) {
	        $specs = [];
		    if ($request->category) {
          $category = Category::where('title', $request->category)->firstOrFail();
          if (!is_null($category)) {
            $specs[] = ['category_id', '=', $category->id];
          }
	    }
	    if ($request->brand) {
        $brand = Brand::where('title', $request->brand)->firstOrFail();
        if (!is_null($brand)) {
          $specs[] = ['brand_id', '=', $brand->id];
          }
		}
	    if ($request->color) {
        $color = Color::where('title', $request->color)->firstOrFail();
        if (!is_null($color)) {
          $specs[] = ['color_id', '=', $color->id];
          }
	    }
	    if ($request->priceMin) {
		    $specs[] = ['price', '>=', (float)$request->priceMin];
	    }
	    if ($request->priceMax) {
		    $specs[] = ['price', '<=', (float)$request->priceMax];
	    }
	    if ($request->term) {
		    $specs[] = ['title', 'LIKE', '%'.$request->term.'%'];
	    }
	        switch ($request->sortby) {
                case 'priceInDes':
                    $collumn = 'price';
                    $orderBy = 'desc';
                    break;
                case 'priceInAsc':
                    $collumn = 'price';
                    $orderBy = 'asc';
                    break;
                case 'raiting':
                    $collumn = 'purchases';
                    $orderBy = 'desc';
                    break;
                case 'reviews':
                    $collumn = 'purchases';
                    $orderBy = 'desc';
                    break;
                default:
                    $collumn = 'purchases';
                    $orderBy = 'desc';
            }


	    if (isset($specs)) {
		    $items = Item::where($specs)->orderBy($collumn, $orderBy)->paginate(9)->withPath("?".http_build_query($request->except('page')));
	    } else {
		    $items = Item::orderBy($collumn, $orderBy)->paginate(9)->withPath("?".http_build_query($request->except('page')));
	    }

	    if (Auth::check()) {

		    $cart = Auth::user()->cart->items;

		    $likes = Auth::user()->likes->items;


	    } else {
		    $cart = Item::get()->whereIn('id', session('cartList'));
		    $likes = Item::get()->whereIn('id', session('likesList'));
	    }

	    foreach($items as $item) {
			    $item->setAttribute('in_cart', $cart->contains($item->id));
			    $item->setAttribute('is_liked', $likes->contains($item->id));
	    }

	    return view('layouts.store.items', compact('items'));



	    } else {
            $categories = Category::get();
            $brands = Brand::get();
            $colors = Color::get();
	    /*if (Auth::check()) {
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
			return view('store', compact('categories', 'brands', 'colors'));
		}




	    }*/



	    return view('basic.store.store', compact('categories', 'brands', 'colors'));
	    }
    }

public function search (Request $request) {
	$search = $request->get('term');
	$result = Item::select('title')
	->where('title', 'LIKE', '%'.$search.'%')
	->pluck('title');

	return response()->json($result);
}
}
