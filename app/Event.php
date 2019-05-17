<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = [
        'attention_point',  // String
        'project',  // String
        'diverse',  // String
        'calendar'  // String
    ];
}
