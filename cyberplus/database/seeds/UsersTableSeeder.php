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
        // populate users table on start
        DB::table('users')->insert([
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'status' => true ,
            'is_paid' => true ,
            'role_id' => 1 ,
            'password' => bcrypt('pass_word'),
        ]);
    }
}
