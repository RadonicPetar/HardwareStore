<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $order->order_number }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="font-semibold text-lg mb-3">Customer</h3>

                    <p><strong>Name:</strong> {{ $order->name }}</p>
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                    <p><strong>Address:</strong> {{ $order->address }}, {{ $order->city }}</p>
                    <p><strong>Date:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="font-semibold text-lg mb-3">Order Status</h3>

                    <form method="POST" action="{{ route('admin.orders.update', $order) }}"
                        class="flex items-center gap-4">
                        @csrf
                        @method('PUT')

                        <select name="status" class="border-gray-300 rounded-md shadow-sm">
                            <option value="pending" @selected($order->status === 'pending')>Pending</option>
                            <option value="processing" @selected($order->status === 'processing')>Processing</option>
                            <option value="shipped" @selected($order->status === 'shipped')>Shipped</option>
                            <option value="completed" @selected($order->status === 'completed')>Completed</option>
                            <option value="cancelled" @selected($order->status === 'cancelled')>Cancelled</option>
                        </select>

                        <x-primary-button>Update Status</x-primary-button>
                    </form>

                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-lg mb-3">Products</h3>

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