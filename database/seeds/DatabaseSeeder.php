<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                "author" => "Arturo",
                "title" => "Test 1",
                "slug" => "test_1",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                'created_at' => Carbon::now()->format('Y-m-d');
            ],
            [
                "author" => "Auronix",
                "title" => "Test 2",
                "slug" => "test_2",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                'created_at' => Carbon::now()->format('Y-m-d');
            ],
            [
                "author" => "Arturo",
                "title" => "Test 3",
                "slug" => "test_3",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                'created_at' => Carbon::now()->format('Y-m-d');
            ]
        ];

        DB::table('post')->insert($posts);
    }
}
