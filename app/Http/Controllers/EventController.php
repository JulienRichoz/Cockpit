<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Get all events
    public static function getAll(){
        return Event::all();
    }

    public function store(Request $request)
    {
        try{
            $id = $request->input('id');
            $event = Event::where('id', $id)->first();

            $event->text = $request->input('text');
            $event->save();

            return response()->json()->setStatusCode(200);
        }
        catch (Exception $e){
            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }
    }
}
