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

    // Soft delete an activity
    public function archive(Request $request){
        try{
            $activity = Activity::find($request->input('id'));
            $activity->trashed();

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
