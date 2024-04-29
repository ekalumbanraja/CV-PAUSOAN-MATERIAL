<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'product_name' => 'PALU',
            'category_id' => '1',
            'stok' => '20',
        ]);
        
        DB::table('products')->insert([
            'product_name' => 'Batu Bata',
            'category_id' => '2',
            'stok' => '200',
        ]);
        
    }
}
