<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Shopping Cart</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @forelse ($cart as $productId => $item)
                        <div class="py-4 border-b last:border-b-0">
                            <div class="flex justify-between items-center">

                                <div class="flex items-center gap-4">
                                    @if ($item['image'])
                                        <img src="{{ asset('storage/' . $item['image']) }}"
                                            alt="{{ $item['title'] }}"
                                            class="w-20 h-20 object-contain">
                                    @endif

                                    <div>
                                        <h3 class="font-semibold">{{ $item['title'] }}</h3>
                                        <p>€{{ number_format($item['price'], 2) }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <form method="POST" action="{{ route('cart.update', $productId) }}" class="flex gap-2">
                                        @csrf
                                        @method('PUT')

                                        <input type="number" name="quantity" min="1"
                                            value="{{ $item['quantity'] }}"
                                            class="w-20 border-gray-300 rounded-md">

                                        <x-primary-button>Update</x-primary-button>
                                    </form>

                                    <form method="POST" action="{{ route('cart.remove', $productId) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="text-red-600 hover:underline">
                                            Remove
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">Your cart is empty.</p>
                    @endforelse

                    @if (count($cart))
                        <div class="mt-6 text-right">
                            <p class="text-xl font-semibold">
                                Total: €{{ number_format($total, 2) }}
                            </p>
                        </div>
                        <a href="{{ route('checkout.create') }}"
                            class="inline-block mt-4 px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                            Checkout
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>