<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 35; $i++) {
            
            DB::table('posts')->insert([
                'type' => rand(1, 9),
                'title' => Str::random(10) . ' ' . Str::random(10),
                'cover' => Str::random(10),
                'brief' => Str::random(10),
                'content' => Str::random(10),
                'slug' => Str::random(10),
            ]);
            sleep(1);
        }
    }
}
