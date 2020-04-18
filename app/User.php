<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model  as Authenticatable;
use Illumiate\Auth\Authenticatable as AuthenticableTrait;
use Illumiate\Contracts\Auth\Authenticable;
class User extends Authenticatable implements Authenticatable
{
    use Notifiable;


    protected $connection = "mongodb";

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
