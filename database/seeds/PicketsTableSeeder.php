<?php

use Illuminate\Database\Seeder;

class PicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 4 pickets with seeding (fake data)
        factory(App\Picket::class, 4)->create();
    }
}
