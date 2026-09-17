<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function create()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('checkout.create', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
        ]);

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        DB::transaction(function () use ($validated, $cart, $total, $request) {
            $order = Order::create([
                'order_number' => 'ORD-' . Str::upper(Str::random(8)),
                'user_id' => $request->user()->id,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'total' => $total,
            ]);

            foreach ($cart as $productId => $item) {
                $order->items()->create([
                    'product_id' => $productId,
                    'product_title' => $item['title'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ]);
            }
        });

        session()->forget('cart');

        return redirect()->route('products.index')->with('success', 'Order placed successfully.');
    }
}
