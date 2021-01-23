<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
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
                'id' => 1,
                'name' => 'Roque',
                'firstname' => 'Jean Lou'
            ],
            [
                'id' => 2,
                'name' => 'Gros',
                'firstname' => 'Benzi'
            ],
            [
                'id' => 3,
                'name' => 'Kiki',
                'firstname' => 'Krish'
            ],
            [
                'id' => 4,
                'name' => 'Ti',
                'firstname' => 'Colin'
            ],
            [
                'id' => 5,
                'name' => 'Spider',
                'firstname' => 'Matt'
            ],
        ];

        DB::table('customers')->insert(
            $array
        );
    }
}
