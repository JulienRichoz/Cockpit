<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picket extends Model
{
    // Function to render a 'name' => 'Ne'
    public static function getPicketShortName($name){
        return ucfirst(substr($name, 0, 1).substr($name, -1));
    }
    
}
