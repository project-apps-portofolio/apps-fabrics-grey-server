<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ScheduleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'date' => '2021-01-18',
                'owner_id' => 1,
                'title' => 'Test 2',
                'description' => '',
                'start' => '2021-01-17 00:30:00',
                'end' => '2021-01-18 06:30:00',
                'is_all_day' => 'false',
                'machine_id' => '1',
                'job_id' => '1',
            ],
            [
                'date' => '2021-01-17',
                'owner_id' => 1,
                'title' => 'Test 2',
                'description' => '',
                'start' => '2021-01-17 00:30:00',
                'end' => '2021-01-18 06:30:00',
                'is_all_day' => 'false',
                'machine_id' => '1',
                'job_id' => '1',
            ],
            [
                'date' => '2021-01-16',
                'owner_id' => 1,
                'title' => 'Test 2',
                'description' => '',
                'start' => '2021-01-16 00:30:00',
                'end' => '2021-01-18 06:30:00',
                'is_all_day' => 'false',
                'machine_id' => '1',
                'job_id' => '1',
            ],
            ];

        DB::table('schedules')->insert($data);
    }
}
