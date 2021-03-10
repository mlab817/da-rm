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
            ['Rice',1],
            ['Yellow Corn',2],
            ['White Corn',2],
            ['Cassava',2],
            ['Cacao',3],
            ['Coffee',3],
            ['Rubber',3],
            ['Banana',3],
            ['Mango',3],
            ['Hog',4],
            ['Broiler',4],
            ['Layer',4],
            ['Dairy',4],
            ['Small Ruminant',4],
            ['Beef Cattle',4],
            ['Duck',4],
            ['Organic',5],
            ['Tuna',6],
            ['Seaweeds',6],
            ['Tilapia',6],
            ['Shrimp',6],
            ['Bangus / Milkfish',6],
            ['Shellfish',6],
            ['Halal',7],
            ['Coconut',8],
            ['Abaca',9],
            ['Tobacco',10],
            ['Sugarcane',11],
        ];

        foreach ($commodities as $item)
        {
            DB::table('commodities')->insert([
                'name'      => $item[0],
                'office_id' => $item[1],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
