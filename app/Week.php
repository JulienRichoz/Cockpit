<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = [
        'name', // String
        'location', // String
        'date', // String
        'people', // String
    ];
}
