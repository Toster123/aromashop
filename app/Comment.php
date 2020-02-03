<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function answers() {
	    return $this->hasMany(Answer::class);
    }
    
    public function user () {
	    return $this->belongsTo('App\User');
    }
}
