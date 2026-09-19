<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Storage::disk('public')->makeDirectory('products');

        $products = [
            [
                'category' => 'Processors',
                'title' => 'AMD Ryzen 7 9800X3D',
                'description' => 'Harness the ultimate gaming edge with AMD Ryzen™ 7 9800X3D Processor',
                'price' => 399.99,
                'image' => 'amd-ryzen-7-9800x3d.jpg',
            ],
            [
                'category' => 'Video Cards',
                'title' => 'NVIDIA GeForce RTX 5090',
                'description' => 'The NVIDIA® GeForce RTX™ 5090 the most powerful GeForce GPU ever made',
                'price' => 1999.99,
                'image' => 'nvidia-geforce-rtx-5090.jpg',
            ],
            [
                'category' => 'RAM',
                'title' => 'Crucial Pro 32GB DDR5 RAM',
                'description' => 'Crucial Pro DDR5 RAM Kit (2x16GB) 6000MHz CL36',
                'price' => 399.99,
                'image' => 'crucial-pro-32gb-ddr5.jpg',
            ],
            [
                'category' => 'Processors',
                'title' => 'AMD Ryzen 7 7800X3D',
                'description' => 'AMD Ryzen 7 7800X3D gaming processor with 8 cores, 16 threads and 3D V-Cache technology.',
                'price' => 349.99,
                'image' => 'amd-ryzen-7-7800x3d.jpg',
            ],
            [
                'category' => 'Processors',
                'title' => 'AMD Ryzen 5 7600X',
                'description' => 'AMD Ryzen 5 7600X desktop processor with 6 cores and 12 threads for gaming and everyday performance.',
                'price' => 199.99,
                'image' => 'amd-ryzen-5-7600x.jpg',
            ],
            [
                'category' => 'Processors',
                'title' => 'Intel Core i5-14600K',
                'description' => 'Intel Core i5-14600K desktop processor designed for high-performance gaming and multitasking.',
                'price' => 289.99,
                'image' => 'intel-core-i5-14600k.jpg',
            ],
            [
                'category' => 'Video Cards',
                'title' => 'NVIDIA GeForce RTX 4070 Super',
                'description' => 'NVIDIA GeForce RTX 4070 Super graphics card for high-performance gaming with ray tracing and DLSS support.',
                'price' => 649.99,
                'image' => 'nvidia-geforce-rtx-4070-super.jpg',
            ],
            [
                'category' => 'Video Cards',
                'title' => 'AMD Radeon RX 7800 XT',
                'description' => 'AMD Radeon RX 7800 XT graphics card designed for high-quality 1440p gaming and demanding workloads.',
                'price' => 529.99,
                'image' => 'amd-radeon-rx-7800-xt.jpg',
            ],
            [
                'category' => 'Video Cards',
                'title' => 'NVIDIA GeForce RTX 4060',
                'description' => 'NVIDIA GeForce RTX 4060 graphics card offering efficient 1080p gaming with ray tracing and DLSS support.',
                'price' => 329.99,
                'image' => 'nvidia-geforce-rtx-4060.jpg',
            ],
            [
                'category' => 'Motherboards',
                'title' => 'MSI B650 Gaming Plus WiFi',
                'description' => 'MSI B650 Gaming Plus WiFi motherboard for AMD AM5 processors with DDR5 memory and integrated WiFi support.',
                'price' => 179.99,
                'image' => 'msi-b650-gaming-plus-wifi.png',
            ],
            [
                'category' => 'Motherboards',
                'title' => 'ASUS TUF Gaming B650-Plus',
                'description' => 'ASUS TUF Gaming B650-Plus motherboard for AMD AM5 processors with durable components and DDR5 support.',
                'price' => 189.99,
                'image' => 'asus-tuf-gaming-b650-plus.png',
            ],
            [
                'category' => 'Motherboards',
                'title' => 'Gigabyte B760 Gaming X',
                'description' => 'Gigabyte B760 Gaming X motherboard designed for Intel processors with gaming-focused connectivity and expansion.',
                'price' => 159.99,
                'image' => 'gigabyte-b760-gaming-x.jpg',
            ],
            [
                'category' => 'Cases',
                'title' => 'Corsair 4000D Airflow',
                'description' => 'Corsair 4000D Airflow mid-tower PC case with a high-airflow front panel and versatile component support.',
                'price' => 94.99,
                'image' => 'corsair-4000d-airflow.png',
            ],
            [
                'category' => 'Cases',
                'title' => 'NZXT H5 Flow',
                'description' => 'NZXT H5 Flow mid-tower PC case designed for efficient airflow, clean cable management and modern gaming builds.',
                'price' => 89.99,
                'image' => 'nzxt-h5-flow.png',
            ],
            [
                'category' => 'Cases',
                'title' => 'Fractal Design Pop Air',
                'description' => 'Fractal Design Pop Air PC case with strong airflow, a clean design and support for modern gaming hardware.',
                'price' => 84.99,
                'image' => 'fractal-design-pop-air.jpg',
            ],
            [
                'category' => 'Power Supplies',
                'title' => 'Corsair RM750e 750W',
                'description' => 'Corsair RM750e 750W power supply offering efficient and reliable power delivery for modern gaming systems.',
                'price' => 109.99,
                'image' => 'corsair-rm750e-750w.jpg',
            ],
            [
                'category' => 'Power Supplies',
                'title' => 'Seasonic Focus GX-850',
                'description' => 'Seasonic Focus GX-850 power supply with 850W output for powerful gaming and workstation configurations.',
                'price' => 139.99,
                'image' => 'seasonic-focus-gx-850.jpg',
            ],
            [
                'category' => 'Power Supplies',
                'title' => 'be quiet! Pure Power 12 M 750W',
                'description' => 'be quiet! Pure Power 12 M 750W power supply designed for quiet operation and efficient power delivery.',
                'price' => 119.99,
                'image' => 'be-quiet-pure-power-12-m-750w.jpg',
            ],
            [
                'category' => 'RAM',
                'title' => 'Corsair Vengeance 32GB DDR5',
                'description' => 'Corsair Vengeance 32GB DDR5 memory kit providing fast and reliable performance for modern desktop systems.',
                'price' => 99.99,
                'image' => 'corsair-vengeance-32gb-ddr5.jpg',
            ],
            [
                'category' => 'RAM',
                'title' => 'Kingston Fury Beast 32GB DDR5',
                'description' => 'Kingston Fury Beast 32GB DDR5 memory kit designed for gaming, multitasking and high-performance systems.',
                'price' => 94.99,
                'image' => 'kingston-fury-beast-32gb-ddr5.jpg',
            ],
            [
                'category' => 'RAM',
                'title' => 'G.Skill Flare X5 32GB DDR5',
                'description' => 'G.Skill Flare X5 32GB DDR5 memory kit offering high-speed performance for modern desktop platforms.',
                'price' => 104.99,
                'image' => 'gskill-flare-x5-32gb-ddr5.jpg',
            ],
            [
                'category' => 'Storage',
                'title' => 'Samsung 990 Pro 2TB',
                'description' => 'Samsung 990 Pro 2TB NVMe SSD providing high-speed storage for gaming, applications and large files.',
                'price' => 169.99,
                'image' => 'samsung-990-pro-2tb.jpg',
            ],
            [
                'category' => 'Storage',
                'title' => 'WD Black SN850X 2TB',
                'description' => 'WD Black SN850X 2TB NVMe SSD designed for fast game loading and high-performance desktop storage.',
                'price' => 149.99,
                'image' => 'wd-black-sn850x-2tb.webp',
            ],
            [
                'category' => 'Storage',
                'title' => 'Crucial P3 Plus 1TB',
                'description' => 'Crucial P3 Plus 1TB NVMe SSD offering fast and affordable storage for everyday computing and gaming.',
                'price' => 69.99,
                'image' => 'crucial-p3-plus-1tb.jpg',
            ],
        ];

        foreach ($products as $product) {
            $category = Category::where('name', $product['category'])->firstOrFail();

            Product::updateOrCreate(
                ['title' => $product['title']],
                [
                    'category_id' => $category->id,
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'image' => $this->seedImage($product['image']),
                ]
            );
        }
    }

    private function seedImage(string $filename): ?string
    {
        $source = database_path('seeders/images/products/' . $filename);

        if (!File::exists($source)) {
            return null;
        }

        $destination = 'products/' . $filename;

        Storage::disk('public')->put(
            $destination,
            File::get($source)
        );

        return $destination;
    }
}
