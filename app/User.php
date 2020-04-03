<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

public function browsingHistory() {
	return $this->belongsToMany(Item::class)->withTimestamps();
}

public function comments () {
    return $this->hasMany(Comment::class);
}

public function reviews () {
    return $this->hasMany(Review::class);
}
public function orders () {
    return $this->hasMany(Order::class)->where('type', 3);
}
public function dialog () {
    return $this->hasOne(Dialog::class);
}
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
