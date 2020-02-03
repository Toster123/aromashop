<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items() {
	    return $this->belongsToMany(Item::class)->withPivot('count')->withTimestamps();
    }
    public function getFullPrice () {
	    $sum = 0;
	    foreach($this->items as $item) {
		    $sum += $item->getPriceForCount();
	    }
	    return $sum;
    }
}
