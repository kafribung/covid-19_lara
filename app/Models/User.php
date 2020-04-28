<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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

    // Relasi One to One (COvid)
    public function covid()
    {
        return $this->hasOne('App\Models\Covid');
    }

    // Relasi One to One (Pencegahan)
    public function pencegahan()
    {
        return $this->hasOne('App\Models\Pencegahan');
    }

     // Relasi One to Many (Hospital)
     public function hospitals()
     {
        return $this->hasMany('App\Models\Hospital');
     }

}
