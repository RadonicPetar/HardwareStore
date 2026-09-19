<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'admin@mail.com')->firstOrFail();

        $processor = Product::where('title', 'AMD Ryzen 7 7800X3D')->first();
        $videoCard = Product::where('title', 'NVIDIA GeForce RTX 4070 Super')->first();
        $ram = Product::where('title', 'Corsair Vengeance 32GB DDR5')->first();

        $order1 = Order::updateOrCreate(
            ['order_number' => 'ORD-TEST0001'],
            [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'address' => 'Zagrebacka 1',
                'city' => 'Zagreb',
                'status' => 'completed',
                'total' => $processor->price + $ram->price,
            ]
        );

        $order1->items()->delete();

        $order1->items()->createMany([
            [
                'product_id' => $processor->id,
                'product_title' => $processor->title,
                'price' => $processor->price,
                'quantity' => 1,
            ],
            [
                'product_id' => $ram->id,
                'product_title' => $ram->title,
                'price' => $ram->price,
                'quantity' => 1,
            ],
        ]);

        $order2 = Order::updateOrCreate(
            ['order_number' => 'ORD-TEST0002'],
            [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'address' => 'Zagrebacka 1',
                'city' => 'Zagreb',
                'status' => 'processing',
                'total' => $videoCard->price,
            ]
        );

        $order2->items()->delete();

        $order2->items()->create([
            'product_id' => $videoCard->id,
            'product_title' => $videoCard->title,
            'price' => $videoCard->price,
            'quantity' => 1,
        ]);
    }
}
