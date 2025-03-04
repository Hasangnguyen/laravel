<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Áo sơ mi',
                'price' => 250000,
                'image' => 'ao_so_mi.jpg',
                'cate_id' => 1, // Giả sử cate_id = 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo thun',
                'price' => 180000,
                'image' => 'ao_thun.jpg',
                'cate_id' => 2, // Giả sử cate_id = 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Áo trễ vai',
                'price' => 300000,
                'image' => 'ao_tre_vai.jpg',
                'cate_id' => 3, // Giả sử cate_id = 3
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }        
}
