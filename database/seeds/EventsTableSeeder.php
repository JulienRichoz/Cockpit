<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Generate titles from the model 'Event'
     * @return void
     */
    public function run()
    {
        foreach(Event::getTitles() as $key => $title){
            $event = new Event();
            $event->title = $title;
            $event->save();
        }
    }
}
