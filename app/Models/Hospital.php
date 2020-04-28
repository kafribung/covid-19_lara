<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $touches  = ['user'];
    protected $fillable = ['provinsi', 'hospital'];
     // Relasi many to one  (Hospital to User)

     public function user()
     {
        return $this->belongsTo('App\Models\User');
     }
}
