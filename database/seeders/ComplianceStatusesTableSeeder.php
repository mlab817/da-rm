<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplianceStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('compliance_statuses')->insert([
            [
                'id'    => 1,
                'name'  => 'For Compliance'
            ],
            [
                'id'    => 2,
                'name'  => 'Returned'
            ],
            [
                'id'    => 3,
                'name'  => 'Resolved'
            ],
            [
                'id'    => 4,
                'name'  => 'Cancelled'
            ],
        ]);
    }
}
