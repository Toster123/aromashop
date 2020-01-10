<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class RouterController extends Controller
{
	
    public function home () {
	    return view('home');
    }
    
    public function store () {
	    $items = Item::get();
	    return view('store', compact('items'));
    }
    
    public function contact () {
	    return view('contact');
    }
    
    public function cart () {
	    return view('cart');
    }
    
    public function tracking () {
	    return view('tracking');
    }
    
    public function item () {
	    return view('item');
    }
}
