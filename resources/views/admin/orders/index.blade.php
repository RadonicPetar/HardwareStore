<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Orders</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @forelse ($orders as $order)
                        <div class="py-4 border-b last:border-b-0">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="font-semibold">{{ $order->order_number }}</h3>
                                    <p>{{ $order->name }} - {{ $order->email }}</p>
                                    <p class="text-sm text-gray-500">
                                        {{ $order->created_at->format('d.m.Y H:i') }}
                                    </p>
                                    <p class="mt-1">
                                        Status: <span class="font-semibold">{{ ucfirst($order->status) }}</span>
                                    </p>
                                </div>

                                <div class="text-right">
                                    <p class="font-semibold">€{{ number_format($order->total, 2) }}</p>

                                    <a href="{{ route('admin.orders.show', $order) }}"
                                        class="text-blue-600 hover:underline">
                                        View Order
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No orders found.</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>