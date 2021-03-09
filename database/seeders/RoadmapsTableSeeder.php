<?php

namespace Database\Seeders;

use App\Models\Roadmap;
use Illuminate\Database\Seeder;

class RoadmapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roadmap::factory(10)->create();
    }
}
