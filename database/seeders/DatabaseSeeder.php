<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ComplianceStatusesTableSeeder::class);
        $this->call(ReportPeriodsTableSeeder::class);
        $this->call(OfficesTableSeeder::class);
        $this->call(UploadTypesTableSeeder::class);
        $this->call(CommoditiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OutlineItemsTableSeeder::class);
    }
}
