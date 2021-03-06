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
                'name' => 'PC1',
            ],
            [
                'id' => 2,
                'name' => 'PC2',
            ],
            [
                'id' => 3,
                'name' => 'PC3',
            ],
            [
                'id' => 4,
                'name' => 'PC4',
            ],
            [
                'id' => 5,
                'name' => 'PC5',
            ],
        ];

        DB::table('computers')->insert(
            $array
        );
    }
}
