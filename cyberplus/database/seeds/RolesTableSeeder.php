<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // populate roles table on start

        DB::table('roles')->insert([
            [

               'role_name' => 'Admin', 

            ],
            [
                'role_name' => 'Store Owner',
            ],
            [
                'role_name' => 'Store Attendant',
            ]

            ]);
    }
}
