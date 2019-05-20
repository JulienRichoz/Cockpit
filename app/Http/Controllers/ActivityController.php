<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Activity;

class ActivityController extends Controller
{
    use SoftDeletes;
    //
    public static function getActivities(){
        $activities = [];

        foreach(Activity::getTypes() as $activity_key => $activity_type){
            $activities[$activity_key] = Activity::where(['type' => $activity_key])->get();
        }
    
        return $activities;
    }
}
