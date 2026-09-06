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

        $products = [
            ['category' => 'Processors', 'title' => 'AMD Ryzen 7 7800X3D', 'price' => 349.99],
            ['category' => 'Processors', 'title' => 'AMD Ryzen 5 7600X', 'price' => 199.99],
            ['category' => 'Processors', 'title' => 'Intel Core i5-14600K', 'price' => 289.99],

            ['category' => 'Video Cards', 'title' => 'NVIDIA GeForce RTX 4070 Super', 'price' => 649.99],
            ['category' => 'Video Cards', 'title' => 'AMD Radeon RX 7800 XT', 'price' => 529.99],
            ['category' => 'Video Cards', 'title' => 'NVIDIA GeForce RTX 4060', 'price' => 329.99],

            ['category' => 'Motherboards', 'title' => 'MSI B650 Gaming Plus WiFi', 'price' => 179.99],
            ['category' => 'Motherboards', 'title' => 'ASUS TUF Gaming B650-Plus', 'price' => 189.99],
            ['category' => 'Motherboards', 'title' => 'Gigabyte B760 Gaming X', 'price' => 159.99],

            ['category' => 'Cases', 'title' => 'Corsair 4000D Airflow', 'price' => 94.99],
            ['category' => 'Cases', 'title' => 'NZXT H5 Flow', 'price' => 89.99],
            ['category' => 'Cases', 'title' => 'Fractal Design Pop Air', 'price' => 84.99],

            ['category' => 'Power Supplies', 'title' => 'Corsair RM750e 750W', 'price' => 109.99],
            ['category' => 'Power Supplies', 'title' => 'Seasonic Focus GX-850', 'price' => 139.99],
            ['category' => 'Power Supplies', 'title' => 'be quiet! Pure Power 12 M 750W', 'price' => 119.99],

            ['category' => 'RAM', 'title' => 'Corsair Vengeance 32GB DDR5', 'price' => 99.99],
            ['category' => 'RAM', 'title' => 'Kingston Fury Beast 32GB DDR5', 'price' => 94.99],
            ['category' => 'RAM', 'title' => 'G.Skill Flare X5 32GB DDR5', 'price' => 104.99],

            ['category' => 'Storage', 'title' => 'Samsung 990 Pro 2TB', 'price' => 169.99],
            ['category' => 'Storage', 'title' => 'WD Black SN850X 2TB', 'price' => 149.99],
            ['category' => 'Storage', 'title' => 'Crucial P3 Plus 1TB', 'price' => 69.99],
        ];

        foreach ($products as $product) {
            $category = Category::where('name', $product['category'])->first();

            Product::create([
                'category_id' => $category->id,
                'title' => $product['title'],
                'description' => null,
                'price' => $product['price'],
                'image' => null,
            ]);
        }
    }
}
