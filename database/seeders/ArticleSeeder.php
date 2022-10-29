<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<5;$i++){
            DB::table('articles')->insert([
                'category_id'=>rand(1,6),
                'title'=>$faker->name(),
                'image'=>$faker->imageUrl($width='300px', $height='300px', 'cats'),
                'slug'=>Str::slug($faker->name()),
                'content'=>$faker->text(),
                'created_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at'=>now(),
            ]);
        }
     
    }
}
