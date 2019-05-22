<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    private const Titles = [
        'point d\'attention',
        'projets',
        'divers',
        'calendrier'
    ];

    public static function getTitles(){
        return self::Titles;
    }
}
