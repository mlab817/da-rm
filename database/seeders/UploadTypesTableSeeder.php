<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UploadTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('upload_types')->insert([
            [
                'name' => 'progress report',
            ],
            [
                'name' => 'roadmap'
            ],
            [
                'name' => 'focal designation'
            ],
        ]);
    }
}
