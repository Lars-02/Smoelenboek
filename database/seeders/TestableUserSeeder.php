<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestableUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user')->insert([
            'email' => 'test@avans.nl',
            'password' => bcrypt('password'),
        ]);

        \DB::table('employee')->insert([
            'username' => 'testuser',
            'user_id' => 21,
            'firstname' => 'test',
            'lastname' => 'user',
            'phoneNumber' => '06987476733',
            'department' => 'AI&I',
        ]);
    }
}
