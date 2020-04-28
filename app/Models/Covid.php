<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    protected $touches = ['user'];
    protected $fillable= ['info'];
    // Relasi One to One (COvid to User)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
