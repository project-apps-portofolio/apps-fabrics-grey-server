<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ScheduleSeed;
use Database\Seeders\MachineSeed;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        $this->call(ScheduleSeed::class);
        $this->call(MachineSeed::class);
    }
}
