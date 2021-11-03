<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name'=>'Fatih',
        'email'=>'fatih@test.com',
        'password'=>bcrypt('123456')
        ]);
    }
}
