<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<5;$i++){
            DB::table('admins')->insert([
                'name'=>'Rasul',
                'email'=>'resulresull510@gmail.com',
                'password'=>bcrypt(102030),
            ]);
        }
    }
}
