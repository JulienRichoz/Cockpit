<?php

namespace App\Http\Controllers;

use App\WeeklyActivity;
use Illuminate\Http\Request;
use Exception;

class WeeklyActivityController extends Controller
{
    public static function getAll(){
        return WeeklyActivity::all();
    }

    public function store(Request $request)
    {
        // Check validate form
        $this->validate($request,[
            'name' => 'required|max:50',
            'location' => 'required|max:50',
            'date' => 'required|max:50',
            'people' => 'required|max:50',
        ]);

        try{

            /**
             * If the request has no id -> create a new weekly activity
             * If the request has an id -> edit the weekly activity
            */

            if($request->input('id'))
                $information = WeeklyActivity::where('id', $request->input('id'))->first();
            else
                $information = new WeeklyActivity();

            // Get the weekly activity from the request form and save them
            $information->name = $request->input('name');
            $information->location = $request->input('location');
            $information->date = $request->input('date');
            $information->people = $request->input('people');
            $information->save();

            return response()->json([
                'title' => 'Activité hebdomadaire sauvegardée',
                'response' => 'Activité sauvegardée'
            ])->setStatusCode(200);
        }
        catch (Exception $e){
            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $information = WeeklyActivity::where('id', $id)->first();
        $information->delete();

        return response()->json([
            'title' => 'Activité hebdomadaire supprimée',
            'response' => 'Activité supprimée'
        ])->setStatusCode(200);

    }
}
