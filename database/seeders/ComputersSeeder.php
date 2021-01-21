<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputersSeeder extends Seeder
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
                'name' => 'Poste1',
            ],
            [
                'id' => 2,
                'name' => 'Poste_2',
            ],
            [
                'id' => 3,
                'name' => 'Poste_3',
            ],
            [
                'id' => 4,
                'name' => 'Poste_4',
            ],
            [
                'id' => 5,
                'name' => 'Poste_5',
            ],
        ];

        DB::table('computers')->insert(
            $array
        );
    }
}
