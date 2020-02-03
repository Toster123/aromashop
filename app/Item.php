<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function getPriceForCount () {
	    if (!is_null($this->pivot)) {
		    return $this->pivot->count * $this->price;
	    } else {
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
