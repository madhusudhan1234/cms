<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();
        DB::table('posts')->insert([
           ['auther_id' => 1,
            'title' => ' My First Post here',
            'slug' => 'my_first_post_here',
            'body' => 'This is my First Posts description here',
            'published_at' => date('Y-m-d h:m:s',strtotime('now'))
           ],
           ['auther_id' => 2,
            'title' => ' My Second Post here',
            'slug' => 'my_second_post_here',
            'body' => 'This is my Second Posts description here',
            'published_at' => date('Y-m-d h:m:s',strtotime('+2weeks'))
           ],
           ['auther_id' => 3,
            'title' => ' My Third Post here',
            'slug' => 'my_third_post_here',
            'body' => 'This is my third Posts description here',
            'published_at' => date('Y-m-d h:m:s',strtotime('now'))
           ],
           ['auther_id' => 4,
            'title' => ' My Fourth Post here',
            'slug' => 'my_fourth_post_here',
            'body' => 'This is my Fourth Posts description here',
            'published_at' => date('Y-m-d h:m:s',strtotime('null'))
           ]
        ]);
    }
}
