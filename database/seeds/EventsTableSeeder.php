<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // MANUAL SEEDER

        /*
            Generate one instruction
        */ 
        DB::table('events') 
            -> insert(array(
                'attention_point' => 'Travaux en cours à Los Angeles',
                'project' => 'Défense de diplôme le 20.06',
                'diverse' => 'Sortie au MAD le 20.06',
                'calendar' => 'Bon anniversaire Julien (27.10) !',
            ));
    }
}
