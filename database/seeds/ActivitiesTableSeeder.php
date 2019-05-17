<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 12 activities with seeding (fake data)
        factory(App\Activity::class, 12)->create();
    }
}
