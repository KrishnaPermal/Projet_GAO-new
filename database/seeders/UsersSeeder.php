<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                "id" => 1,
                "name" => "ADMIN",
                "email" => "admin@admin.com",
                "password" => bcrypt('admin'),
                "id_role" => 1,
            ],
            
        ];

        DB::table('users')->insert($array);
    }
}
