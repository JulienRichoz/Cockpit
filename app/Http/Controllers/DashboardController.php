<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        $activities = ActivityController::getActivities();
        
        // Limit view to 16 activities max.
        $activities_count = 0;
        foreach ($activities as $activity_type){
            $activities_count += $activity_type->count();
        }

        return view('dashboard',[
            'activities' => $activities,
            'activities_count' => $activities_count,
        ]);
    }
}
