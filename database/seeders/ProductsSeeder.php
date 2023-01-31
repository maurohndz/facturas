<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'name' => 'Producto 1',
            'price' => '117.28',
            'price_tax' => '123.45',
            'tax' => '0.05'
        ]);

        DB::table('products')->insert([
            'name' => 'Producto 2',
            'price' => '38.80',
            'price_tax' => '45.65',
            'tax' => '0.15'
        ]);

        DB::table('products')->insert([
            'name' => 'Producto 3',
            'price' => '34.96',
            'price_tax' => '39.73',
            'tax' => '0.12'
        ]);

        DB::table('products')->insert([
            'name' => 'Producto 4',
            'price' => '230.00',
            'price_tax' => '250.00',
            'tax' => '0.08'
        ]);

        DB::table('products')->insert([
            'name' => 'Producto 5',
            'price' => '53.42',
            'price_tax' => '59.35',
            'tax' => '0.10'
        ]);
    }
}
