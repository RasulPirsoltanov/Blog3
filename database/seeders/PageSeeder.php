<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $count=0;
        $pages = ['About', 'kareer', 'Mission',' Vision', 'Healty', 'Sport', 'Science'];
        foreach ($pages as $page) {
            $count=$count+1;
            DB::table('pages')->insert([
                'title' => $page,
                'slug' => Str::slug($page),
                'content' => $faker->text(),
                'image' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg',
                'order' => $count,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
