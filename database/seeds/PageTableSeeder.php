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
                'content' => 'This is About Page'
            ],
            [
                'title' => 'Services',
                'url' =>'services',
                'content' => 'This is Services Page'
            ],
            [
                'title' => 'Portfolio',
                'url' =>'portfolio',
                'content' => 'This is Portfolio Page'
            ],
            [
                'title' => 'Testimonials',
                'url' =>'testimonials',
                'content' => 'This is Testimonials Page'
            ],

        ]);
    }
}
