<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = [
        'type', // enum
        'name', // String
        'place', // String
        'begin_date', // date
        'end_date'  //date
    ];
}
