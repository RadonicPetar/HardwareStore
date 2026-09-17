<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Order #{{ $order->order_number }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <p><strong>Name:</strong> {{ $order->name }}</p>
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                    <p><strong>Address:</strong> {{ $order->address }}, {{ $order->city }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                    <p><strong>Date:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @foreach ($order->items as $item)
                        <div class="py-4 border-b last:border-b-0 flex justify-between">
                            <div>
                                <h3 class="font-semibold">{{ $item->product_title }}</h3>
                                <p class="text-gray-500">Quantity: {{ $item->quantity }}</p>
                            </div>

                            <div class="text-right">
                                <p>€{{ number_format($item->price, 2) }} each</p>
                                <p class="font-semibold">
                                    €{{ number_format($item->price * $item->quantity, 2) }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                    <div class="mt-6 text-right">
                        <p class="text-xl font-semibold">
                            Total: €{{ number_format($order->total, 2) }}
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>