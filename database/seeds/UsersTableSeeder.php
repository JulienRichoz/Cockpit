<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // MANUAL SEEDER

        /* Create two definite users
            1. mail: admin@admin.com    username: admin  Password: admin
            2. mail: test@test.com      username: test   Password: test
        */
        DB::table('users') 
            -> insert(array(
                // Admin user
                array(
                    'name' => 'admin',
                    'username' => 'admin',
                    'email' => 'admin@admin.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('admin'),
                    'remember_token' => Str::random(10),
                ),
                // Test user
                array(
                    'name' => 'test',
                    'username' => 'test',
                    'email' => 'test@test.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('test'),
                    'remember_token' => Str::random(10),
                )
            ));
    }
}
