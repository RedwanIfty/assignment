<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<50;$i++){
            DB::table('student')->insert([
                'name' => Str::random(10),
                'course' => Str::random(10),
                'institute' => Str::random(10),
                'fees'=>100,
            ]);
        }
    }
}
