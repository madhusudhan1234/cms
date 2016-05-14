<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->truncate();

        DB::table('pages')->insert([

            [
                'title' => 'About',
                'uri' =>'about',
                'content' => 'This is About Page',
                'parent_id' => null,
                'lft' => 3,
                'rgt' => 8,
                'depth' => 0
            ],
            [
                'title' => 'Portfolio',
                'url' =>'portfolio',
                'content' => 'This is Portfolio Page',
                'parent_id' => 1,
                'lft' => 4,
                'rgt' => 5,
                'depth' => 1
            ],
            [
                 'title' => 'FAQ',
                 'url' => 'url',
                 'content' => 'This is content',
                'parent_id' => 1,
                'lft' => 6,
                'rgt' => 7,
                'depth' => 1
            ],
            [
                'title' => 'Media',
                'url' =>'media',
                'content' => 'This is media Page',
                'parent_id' => null,
                'lft' => 1,
                'rgt' => 2,
                'depth' => 0
            ],
            [
                'title' => 'Characters',
                'url' =>'characters',
                'content' => 'This is characters Page',
                'parent_id' => null,
                'lft' => 9,
                'rgt' => 10,
                'depth' => 0
            ],

        ]);
    }
}
