<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommoditiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commodities = [
            'Rice',
            'Yellow Corn',
            'White Corn',
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
    }
}
