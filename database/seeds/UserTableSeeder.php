<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([

        	[
        		'name' => 'Madhu',
        		'email' =>'madhu@acd.edu.np',
        		'password' => bcrypt('secret')
        	],
        	[
        		'name' => 'Sudhan',
        		'email' =>'sudhan@acd.edu.np',
        		'password' => bcrypt('secret')
        	]

        ]);
    }
}
