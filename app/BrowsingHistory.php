<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrowsingHistory extends Model
{
    public function users() {
	    return $this->belongsTo(User::class);
    }
}
