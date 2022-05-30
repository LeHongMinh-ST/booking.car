<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = ['Đỏ', 'Xanh', 'Vàng', 'Đen', 'Trắng'];

        for ($i = 0; $i < 100; $i++) {
            $name = "Xe ". Str::random(5) . $i;
            Product::create([
                'name' => $name,
                'color' => $color[array_rand($color,1)],
                'km' => rand(1,9) * 1000,
                'year' => rand(2010, 2022),
                'price' => rand(10, 50) * 10000,
                'thumbnail' => "",
                'other_parameters' => [],
                'license_plates' => rand(10, 99) . Str::random(1) . '-' . rand(10000,99999),
                'description' => "",
                'brand_id' => rand(1,3),
                'link_video' => "https://www.youtube.com/embed/V4ncIBNT6Dk",
                'overtime_price' => rand(1,5) * 100000,
                'over_km_price' => null,
                'deposit_price' => rand(1,5) * 100000,
                'number_of_seats' => 5,
                'status' => Product::STATUS['normal'],
                'slug' => Str::slug($name)
            ]);
        }
    }
}
