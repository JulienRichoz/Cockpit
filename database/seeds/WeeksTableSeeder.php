<?php

use Illuminate\Database\Seeder;

class WeeksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 10 weeks activity with seeding (fake data)
        factory(App\Week::class, 10)->create();
    }
}
