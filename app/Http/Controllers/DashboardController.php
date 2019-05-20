<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        $activities = ActivityController::getActivities();
        
        return view('dashboard',[
            'activities' =>$activities,
        ]);
    }
}
