<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

use Carbon\Carbon;

class MachineSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach (range(1, 800) as $index) {
            DB::table('machines')->insert([
                'name' => "MM",
                'short_name' => 'MM',
                'type_machine' => "GG",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return $faker;
    }
}
