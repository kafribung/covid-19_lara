<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pencegahan extends Model
{
    protected $touches  = ['user'];
    protected $fillable = ['pencegahan'];

    // Relasi one to one (pencegahan to user)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
