<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    public function dialog () {
        return $this->belongsTo(Dialog::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function images () {
        return $this->hasMany(messageImage::class);
    }
}
