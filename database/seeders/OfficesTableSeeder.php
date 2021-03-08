<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('offices')->truncate();

        DB::table('offices')->insert([
            [
                'name'          => 'National Rice Program',
                'short_name'    => 'Rice'
            ],
            [
                'name'          => 'National Corn Program',
                'short_name'    => 'Corn'
            ],
            [
                'name'          => 'High Value Crops Development Program',
                'short_name'    => 'HVCDP'
            ],
            [
                'name'          => 'National Livestock Program',
                'short_name'    => 'Livestock'
            ],
            [
                'name'          => 'National Organic Agriculture Program',
                'short_name'    => 'Organic'
            ],
            [
                'name'          => 'National Fisheries Program',
                'short_name'    => 'Fisheries'
            ],
            [
                'name'          => 'Halal Food Industry Development Program',
                'short_name'    => 'Halal'
            ],
            [
                'name'          => 'Philippine Coconut Authority',
                'short_name'    => 'PCA'
            ],
            [
                'name'          => 'Philippine Fiber Industry Development Authority',
                'short_name'    => 'PhilFIDA'
            ],
            [
                'name'          => 'National Tobacco Administration',
                'short_name'    => 'NTA'
            ],
            [
                'name'          => 'Sugar Regulatory Administration',
                'short_name'    => 'SRA'
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
