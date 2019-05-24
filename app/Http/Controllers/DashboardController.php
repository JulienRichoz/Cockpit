<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picket;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        $activities = ActivityController::getActivities();
        $events = EventController::getAll();
        $weekly_activities = WeeklyActivityController::getAll();
        $pickets = PicketController::getCurrentPickets();
        $activePickets = PicketController::countActivePickets();
        $gapTimePickets = PicketController::gapTimePickets();
        // Limit view to 16 activities max.
        $activities_count = 0;
        foreach ($activities as $activity_type){
            $activities_count += $activity_type->count();
        }

        return view('dashboard',[
            'activities' => $activities,
            'activities_count' => $activities_count,
            'events' => $events,
            'weekly_activities' => $weekly_activities,
            'pickets' => $pickets,
            'active_pickets' => $activePickets,
            'gap_time_pickets' => $gapTimePickets,
        ]);
    }
}
