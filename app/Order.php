<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    public function items() {
	    return $this->belongsToMany(Item::class)->withPivot('count', 'price')->withTimestamps();
    }

    public function status () {
        return $this->belongsTo(Status::class);
    }
    public function getFullPrice () {
	    $sum = 0;
	    foreach($this->items as $item) {
		    $sum += $item->getPriceForCount();
	    }
        return (int)$sum;
    }
//    public function addItemsByArray ($items) {
//        $counts = array_count_values($items);
//        $items = array_unique($items);
//        $items = Item::whereIn('id', $items)->get();
//        foreach($items as $item) {
//            $this->items()->attach($item->id);
//            if (isset($counts[$item->id])) {
//                $pivotRow = $this->items()->where('item_id', $item->id)->first()->pivot;
//                $pivotRow->count = $counts[$item->id];
//                $pivotRow->update();
//            }
//            $pivotRow = $this->items()->where('item_id', $item->id)->first()->pivot;
//            $pivotRow->price = $item->getPriceWithDiscount();
//            $pivotRow->update();
//
//        }
//    }

    public function getFullPriceAtTheTimeOfRegistration () {//зато понятно)
        $sum = 0;
        foreach($this->items as $item) {
            $sum += $item->pivot->price * $item->pivot->count;
        }
        return $sum;
    }

    public function addPricesToPivots () {
        foreach ($this->items as $item) {
            $item->pivot->price = $item->getPriceWithDiscount();
            $item->pivot->update();
        }
    }
    public function coupons () {
        return $this->belongsToMany(Coupon::class)->withTimestamps();
    }
    public function getPriceWithCoupons () {
        if ($this->type == 3) {
            $price = $this->getFullPriceAtTheTimeOfRegistration();
        } elseif ($this->type == 1) {
            $price = $this->getFullPrice();
        }
        $result = $price;
        foreach ($this->coupons as $coupon) {
            if ($coupon->percentage_discount) {
                $result -= $price / 100 * $coupon->percentage_discount;
            } elseif ($coupon->сurrency_discount) {
                $result -= $coupon->сurrency_discount;
            }
        }
        return (int)$result;
    }

    public function isAvailibleItems () {
        foreach($this->items as $item) {
            if ($item->pivot->conut > $item->quantity) {
                return false;
            }
        }
        return true;
    }
}
