<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function getPriceWithDiscount () {
        $price = number_format((float)$this->price - ($this->price / 100 * $this->discount), 0, '.', '');
        return $price;
    }

	public function getOverall() {
		if (!is_null($this->reviews)) {
			$count = 0;
			$overall = 0;
			foreach($this->reviews as $review) {
				$count++;
				$overall += $review->rating;
				}
				if($count != 0) {
				$overall /= $count;
				$responces = [$overall, $count];

			return $responces;
			}
		} else {
			return [0, 0];
		}
	}

	public function category () {
	    return $this->belongsTo(Category::class);
    }

    public function getPriceForCount () {
	    if (!is_null($this->pivot)) {
		    return $this->pivot->count * $this->getPriceWithDiscount();
	    } else {

		    return $this->getPriceWithDiscount();
	    }

    }


    public function specs() {
	    return $this->hasMany(Specification::class);
    }

    public function comments() {
	    return $this->hasMany(Comment::class);
    }

    public function reviews() {
	    return $this->hasMany(Review::class);
    }

}
