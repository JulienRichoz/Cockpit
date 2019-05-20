<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;
    // The attributes that are mass assignable.
    protected $fillable = [
        'type', // enum
        'name', // String
        'place', // String
        'begin_date', // date
        'end_date'  //date
    ];

    /**
     * Add constant parameters to the activtiy model
     */
    const ACTIVITY_TYPES = [
        1 => ['name' => 'exploitation'],
        2 => ['name' => 'operationnel']
    ];

    public function getType(){
        return self::ACTIVITY_TYPES[$this->type];
    }

    public static function getTypes(){
        return self::ACTIVITY_TYPES;
    }
}
