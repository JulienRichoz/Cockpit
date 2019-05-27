<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Activity;

class ActivityController extends Controller
{
    use SoftDeletes;
    
    // Get all activity 
    public static function getActivities(){
        $activities = [];

        foreach(Activity::getTypes() as $activity_key => $activity_type){
            $activities[$activity_key] = Activity::where(['type' => $activity_key])->get();
        }
    
        return $activities;
    }

    // store a new activity or edit one
    public function store(Request $request){

        // Check validate form
        $this->validate($request,[
            'name' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
        ]);

        try{

            /**
             * If the request has no id -> create a new activity (he clicked on the empty row)
             * If the request has an id -> edit this field (he clicked on an existing row)
            */
            if($request->input('id')){
                $activity = Activity::where('id', $request->input('id'))->first();
            }
            else{
                $activity = new Activity();
            }

            // Get the activity from the request form and save them
            $activity->name = $request->input('name');
            $activity->location = $request->input('location');
            $activity->start_date = $request->input('start_date');
            $activity->end_date = $request->input('end_date');
            $activity->type = $request->input('type');
            $activity->save();

            return response()->json([
                'title' => 'Activité sauvegardée',
                'response' => 'Activité sauvegardée'
            ])->setStatusCode(200);
        }
        catch (Exception $e){
            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }
    }

    // Soft delete an activity
    public function archive(Request $request){
        try{
            $activity = Activity::find($request->input('id'));
            $activity->delete();

            return response()->json([
                'title'=>'Succès',
                'response'=>'Activité archivée'
            ])->setStatusCode(200);
        }
        catch (Exception $e){
            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }
    }
}
