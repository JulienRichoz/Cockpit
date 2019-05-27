<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Activity;
use Carbon\Carbon;

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

    /**
     * Convert input date to a % of the year, to display it in a progress bar
     */
    public static function dateToPercent($date){

        // Check if the input date is valid
        try{
            Carbon::parse($date);
        } catch (\Exception $e){
            return 'Invalid date';
        }
        $date = Carbon::parse($date);
        // We handle only date from the current year, else we don't display it
        $currentDate = Carbon::now();
        if($date->year == $currentDate->year && $date){    
            // Convert the input date in the number of days from current year
            $firstDayOfYear = Carbon::parse((string) $currentDate->year.'-01-01');  // Convert the first day of the year in carbon date format
            $dateToDays = $date->diffInDays($firstDayOfYear)+1; // Convert the input date to days number in this year
            $daysInThisYear = 365 + $firstDayOfYear->format('L');   // Get the number of days in this year (including leap year). $firstDayOfYear returns 1 if it's a leap year otherwise 0

            // Convert input date to % and round it to 2 decimal 
            return round($dateToDays/$daysInThisYear * 100, 2);
        }
        
        // Return 367 if the date to display is > currentYear
        if($date->year > $currentDate->year) return 367;

        return false;
    }
}
