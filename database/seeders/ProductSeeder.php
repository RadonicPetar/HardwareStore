<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $processor = Category::where('name', 'Processors')->first();
        $videoCard = Category::where('name', 'Video Cards')->first();
        $ram = Category::where('name', 'RAM')->first();

        Product::create([
            'category_id' => $processor->id,
            'title' => 'AMD Ryzen 7 9800X3D',
            'description' => 'Harness the ultimate gaming edge with AMD Ryzen™ 7 9800X3D Processor',
            'price' => 399.99,
            'image' => null,
        ]);

        Product::create([
            'category_id' => $videoCard->id,
            'title' => 'NVIDIA GeForce RTX 5090',
            'description' => 'The NVIDIA® GeForce RTX™ 5090 the most powerful GeForce GPU ever made',
            'price' => 1999.99,
            'image' => null,
        ]);

        Product::create([
            'category_id' => $ram->id,
            'title' => 'Crucial Pro 32GB DDR5 RAM',
            'description' => 'Crucial Pro DDR5 RAM Kit (2x16GB) 6000MHz CL36',
            'price' => 399.99,
            'image' => null,
        ]);
    }
}
