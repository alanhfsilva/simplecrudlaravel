<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                'name' => 'iMac 27 Core i7',
                'category_id' => 2,
                'price' => 1799.00,
                'inventory' => 10
            ]
        );
        DB::table('products')->insert(
            [
                'name' => 'Beyond ANC Hybrid Aukey',
                'category_id' => 3,
                'price' => 59.00,
                'inventory' => 8
            ]
        );
        DB::table('products')->insert(
            [
                'name' => 'Lenovo Yoga 9i',
                'category_id' => 1,
                'price' => 998.87,
                'inventory' => 2
            ]
        );
    }
}