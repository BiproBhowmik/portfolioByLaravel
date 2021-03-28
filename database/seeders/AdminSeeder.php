<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	'adUrName'=>"biprobhowmik5@gmail.com",
        	'adCode'=>"Joy%%55Bhowmik"
        ]);
    }
}
