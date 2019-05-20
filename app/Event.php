<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    // The attributes that are mass assignable.
    protected $fillable = [
        'attention_point',  // String
        'project',  // String
        'diverse',  // String
        'calendar'  // String
    ];
}
