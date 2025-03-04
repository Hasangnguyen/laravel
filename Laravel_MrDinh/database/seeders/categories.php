<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Thời trang nam',
                'discription' => 'Các sản phẩm thời trang dành cho nam.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thời trang nữ',
                'discription' => 'Các sản phẩm thời trang dành cho nữ.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Phụ kiện',
                'discription' => 'Các loại phụ kiện thời trang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
