<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picket extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = [
        'name', // String
        'start_at', // dateTime
        'end_at',   // dateTime
    ];
}
