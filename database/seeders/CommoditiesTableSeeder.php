<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommoditiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('commodities')->truncate();

        $commodities = [
            'Rice',
            'Yellow Corn',
            'White Corn',
            'Cassava',
            'Cacao',
            'Coffee',
            'Rubber',
            'Banana',
            'Mango',
            'Hog',
            'Broiler',
            'Layer',
            'Dairy',
            'Small Ruminant',
            'Beef Cattle',
            'Duck',
            'Tuna',
            'Seaweeds',
            'Tilapia',
            'Shrimp',
            'Bangus / Milkfish',
            'Shellfish',
            'Tobacco',
            'Coconut',
            'Abaca',
            'Sugarcane',
        ];

        foreach ($commodities as $item)
        {
            DB::table('commodities')->insert([
                'name'      => $item,
                'office_id' => 1,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
