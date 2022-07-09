<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bag = Product::create([
           'name' => 'Sling Bag',
//           'category_id' => Category::factory(), //only use for factory
            'category_id' => '1',
            'brand_id' => '1',
            'price' => '500',
            'sku' => '12042556',
            'description' => 'Virtual Louis Vuitton Sling Bag For Men Shop, 60% OFF',
            'image' => '1657356358-Sling-Bag.jpg'
        ]);
    }
}
