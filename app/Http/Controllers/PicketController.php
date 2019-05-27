<?php

namespace App\Http\Controllers;

use App\Picket;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PicketController extends Controller
{
    public static function getPickets()
    {
        return Picket::all();
    }


    // Count only active pickets
    public static function countActivePickets()
    {
        return Picket::where('end_date', '>=', Carbon::now())->count();
    }

    public static function gapTimePickets(){
        if(self::countActivePickets() > 1) {
            $current_picket = Picket::select('end_date')->where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->first()->end_date;
            $next_picket = Picket::select('start_date')->where('start_date', '>=', $current_picket)->orderBy('start_date', 'asc')->first();

            $current_picket = Carbon::parse($current_picket);
            $next_picket = Carbon::parse($next_picket->start_date);
            
            return $next_picket->diffInDays($current_picket);
        } 

        return false;
    }

    // Return the pickets of this week and next week
    public static function getCurrentPickets()
    {
        $current_picket = Picket::where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->first();

        $result = [];
        if ($current_picket) {
            $next_picket = Picket::where('start_date', '>', $current_picket->start_date)->orderBy('start_date', 'asc')->first();
            array_push($result, $current_picket);
            array_push($result, $next_picket);
        }

        return collect($result);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'main' => 'required',
            'substitute' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date'
        ]);
        
        // Try to store a new piquet
        try {
            // Concatene time with date to have a full datetime format
            $start_datetime = $request->input('start_date') . ' ' . $request->input('start_time');
            $end_datetime = $request->input('end_date') . ' ' . $request->input('end_time');

            // TODO: Improve to cover all cases
            // Avoid creating picket when there is another one in the schedule
            if (Picket::where('end_date', '>', $start_datetime)->where('start_date', '<', $end_datetime)->where('id', '!=', $request->input('id'))->count()) {
                return response()->json([
                    'message' => 'Ce piquet ne peut être sauvé, il chevauche un autre.'
                ])->setStatusCode(422);
            }
        
            // Edit existing picket or create a new one
            if ($request->input('id')) 
            {
                $picket = Picket::where('id', $request->input('id'))->first();
            } else {
                $picket = new Picket();
            }

            $picket->main = $request->input('main');
            $picket->substitute = $request->input('substitute');
            $picket->start_date = $start_datetime;
            $picket->end_date = $end_datetime;
            $picket->save();
            return response()->json([
                'title' => 'Piquet sauvegardé',
                'response' => 'Piquet sauvegardé'
            ])->setStatusCode(200);
        } catch (Exception $e) {
            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }
    }


    // Return picket data to the picket manager view
    public function edit() 
    {
        // Method paginate only exits on query and not collection, so we use DB::table instead of Picket::all()
        $pickets = DB::table('pickets')->paginate(50);

        return view('pickets.pickets_manager', [
            'pickets' => $pickets
        ]);
    }

    // Soft delete an activity
    public function delete(Request $request){
        try{
            $picket = Picket::find($request->input('id'));
            $picket->delete();

            return response()->json([
                'title'=>'Succès',
                'response'=>'Piquet archivé'
            ])->setStatusCode(200);
        }
        catch (Exception $e){
            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }
    }
}
