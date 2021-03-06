<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributionsSeeder extends Seeder
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
                'id_customers' => 1,
                'id_computers' => 1,
                'timetable' => '10',
                'dated' => '2021-01-25',
            ],
            [
                'id_customers' => 2,
                'id_computers' => 1,
                'timetable' => '15',
                'dated' => '2021-01-24',
            ],
            [
                'id_customers' => 3,
                'id_computers' => 4,
                'timetable' => '8',
                'dated' => '2021-01-23',
            ],
            [
                'id_customers' => 4,
                'id_computers' => 3,
                'timetable' => '11',
                'dated' => '2021-01-22',
            ],
            [
                'id_customers' => 5,
                'id_computers' => 5,
                'timetable' => '14',
                'dated' => '2021-01-21',
            ],
        ];

        DB::table('attributions')->insert($array);
    }
}
