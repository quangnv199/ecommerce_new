<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name'=>'Iphone 14 Pro Max',
                'price'=>'200',
                'category'=>'mobile',
                'descrition'=>'A smart phone 4gb ram',
                'gallery'=>'https://cdn.tgdd.vn/Products/Images/42/251192/iphone-14-pro-max-vang-thumb-600x600.jpg'
            ],
            [
                'name'=>'Iphone 11 Pro Max',
                'price'=>'100',
                'category'=>'mobile',
                'descrition'=>'A smart phone 8gb ram',
                'gallery'=>'https://cdn.tgdd.vn/Products/Images/42/153856/iphone-11-trang-600x600.jpg'
            ],
            [
                'name'=>'Laptop Acer',
                'price'=>'300',
                'category'=>'laptop',
                'descrition'=>'A Laptop much more feature',
                'gallery'=>'https://cdn.tgdd.vn/Products/Images/44/269533/TimerThumb/acer-aspire-7-gaming-a715-42g-r05g-r5-nhqaysv007-(42).jpg'
            ],
            [
                'name'=>'Laptop Asus',
                'price'=>'500',
                'category'=>'laptop',
                'descrition'=>'A Laptop Asus much more feature',
                'gallery'=>'https://cdn.tgdd.vn/Products/Images/44/279259/TimerThumb/asus-tuf-gaming-fx506lhb-i5-hn188w-(44).jpg'
            ],
        ]);
    }
}
