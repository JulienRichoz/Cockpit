<?php

use Illuminate\Database\Seeder;

class WeeklyActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 10 weeks activity with seeding (fake data)
        factory(App\WeeklyActivity::class, 7)->create(); 
    }
}
