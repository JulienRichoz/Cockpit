<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Week extends Model
{
    use SoftDeletes;
    // The attributes that are mass assignable.
    protected $fillable = [
        'name', // String
        'location', // String
        'date', // String
        'people', // String
    ];
}
