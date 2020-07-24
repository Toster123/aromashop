<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use App\Order;
use App\Item;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function tracking () {
        $orders = [];
	    if (Auth::check()) {
		    $orders = Auth::user()->orders;
	    }
        return view('order.tracking', compact('orders'));

    }

    public function order (Order $order) {
        if (!is_null(Auth::user()->orders->find($order->id))) {
            return view('order.order', compact('order'));
        }
    }

    function checkout () {
	    if (Auth::check()) {
		    $order = Auth::user()->cart;
		    return view('order.checkout', compact('order'));
	    } else {
	        $items = [];
		    $cartList = session('cartList');
		    if (!is_null($cartList)) {
                $items = Item::whereIn('id', $cartList)->get();
                $counts = array_count_values($cartList);
		    foreach($items as $item) {
			    if (isset($counts[$item->id])) {
				    $item->setAttribute('count', $counts[$item->id]);
			    }
		    }
		    }
		    return view('order.checkout', compact('items'));
	    }
    }

    public function orderCreate (Request $request) {
        if (Auth::check()) {
            if ($request->accept == 'on' && $request->full_name && !is_null($request->payment_method) && $request->email && !Auth::user()->cart->items->isEmpty() && Auth::user()->cart->isAvailibleItems()) {

                    if ($request->delivery_method == 1) {

                        $order = Auth::user()->cart;
                        $cart = new Order ();
                        $cart->type = 1;
                        $cart->user_id = Auth::id();
                        $cart->save();

                        $order->type = 3;
                        $order->status_id = 1;
                        $order->full_name = $request->full_name;
                        $order->email = $request->email;
                        $order->delivery_method = 1;
                        $order->payment_method = $request->payment_method == 2 ? 2 : 1;
                        $order->placed_at = now();
                        $order->notes = $request->notes;
                        $order->save();

                        $order->addPricesToPivots();
                        return view('order.confirmation', compact('order'));
                    } elseif ($request->delivery_method == 2 && $request->date && $request->adress) {

                        $order = Auth::user()->cart;
                        $cart = new Order ();
                        $cart->type = 1;
                        $cart->user_id = Auth::id();
                        $cart->save();

                        $order->type = 3;
                        $order->status_id = 1;
                        $order->full_name = $request->full_name;
                        $order->email = $request->email;
                        $order->delivery_method = 2;
                        $order->adress = $request->adress;
                        $order->payment_method = $request->payment_method == 2 ? 2 : 1;
                        $order->placed_at = now();
                        $order->must_delivered_at = $request->date;
                        $order->notes = $request->notes;
                        $order->save();

                        $order->addPricesToPivots();
                        return view('order.confirmation', compact('order'));
                    }

            }
        }
        return redirect()->back();
}

    public function orderUpdate (Request $request, $orderId) {
        if ($request->full_name && $request->email) {
            try {
                $order = Auth::user()->orders->where('status_id', 1)->findOrFail($orderId);
                $order->full_name = $request->full_name;
                $order->email = $request->email;
                if ($request->delivery_method == 1) {
                    $order->delivery_method = $request->delivery_method;
                    $order->adress = null;
                    $order->must_delivered_at = null;
                } elseif ($request->delivery_method == 2 && $request->adress && $request->must_delivered_at) {
                    $order->delivery_method = $request->delivery_method;
                    $order->adress = $request->adress;
                    $order->must_delivered_at = $request->must_delivered_at;
                }
                if ($request->payment_method == 1 && $request->paid == 0) {
                    $order->payment_method = 1;
                } elseif ($request->payment_method == 2 && $request->paid == 0) {
                    $order->payment_method = 2;
                }
                $order->notes = $request->notes;
                $order->save();
            } catch (ModelNotFoundException $e) {

            }
        }
    return redirect()->back();
    }

    public function setCoupon (Request $request, $orderId) {
        if ($request->code) {
            try {
                $order = Order::where('user_id', Auth::id())->where('id', $orderId)->where('type', '!=', 2)->where('paid', 0)->firstOrFail();
                $coupon = Coupon::where('code', $request->code)
                ->where('price_min', '<', $order->getPriceWithCoupons())
                ->where('price_max', '>', $order->getPriceWithCoupons())
                ->firstOrFail();
                if (Auth::user()->getCountOfUsedCoupon($coupon->id) < $coupon->count_of_uses &&
                    Auth::user()->orders->count() < $coupon->count_of_first_orders_to_use &&
                    !$order->coupons->contains($coupon->id)) {
                    $order->coupons()->attach($coupon->id);
                }
            } catch (ModelNotFoundException $e) {

            }
        }
        return redirect()->back();
    }

    public function removeCoupon ($orderId, $code) {
        try {
            $order = Order::where('user_id', Auth::id())->where('id', $orderId)->where('type', '!=', 2)->where('paid', 0)->firstOrFail();
            $coupon = Coupon::where('code', $code)->firstOrFail();

            if ($order->coupons->contains($coupon->id)) {
                $order->coupons()->detach($coupon->id);
            }
        } catch (ModelNotFoundException $e) {

        }
    return redirect()->back();
    }
}
