<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Processors',
            'Video Cards',
            'Motherboards',
            'Cases',
            'Power Supplies',
            'RAM',
            'Storage',
        ];

        foreach ($categories as $category){
            Category::firstOrCreate(['name' => $category,]);
        }
    }
}
