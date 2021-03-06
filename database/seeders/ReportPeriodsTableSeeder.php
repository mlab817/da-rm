<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportPeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report_periods')->insert([
            [
                'name' => 'Feb 1, 2021'
            ],
            [
                'name' => 'Feb 28, 2021'
            ],
            [
                'name' => 'March 15, 2021'
            ],
            [
                'name' => 'March 31, 2021'
            ],
            [
                'name' => 'April 15, 2021'
            ],
            [
                'name' => 'April 30, 2021'
            ],
        ]);
    }
}
