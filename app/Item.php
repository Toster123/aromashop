<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
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
	
    public function getPriceForCount () {
	    if (!is_null($this->pivot)) {
		    return $this->pivot->count * $this->price;
	    } else {
		    dd('gg');
		    return $this->price;
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
