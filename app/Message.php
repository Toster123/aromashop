<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    public function images () {
        return $this->hasMany(messageImage::class);
    }
}
