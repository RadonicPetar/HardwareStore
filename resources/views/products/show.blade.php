<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex gap-8">
                        @if ($product->image)
                        <div class="w-1/3">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->title }}" class="w-full h-64 object-contain">
                        </div>
                        @endif

                        <div class="flex-1">
                            <p class="text-sm text-gray-500">{{ $product->category->name }}</p>

                            <h1 class="text-2xl font-semibold mt-1">
                                {{ $product->title }}
                            </h1>

                            @if ($product->description)
                            <p class="mt-4 text-gray-700">
                                {{ $product->description }}
                            </p>
                            @endif

                            <p class="mt-6 text-xl font-semibold">
                                €{{ number_format($product->price, 2) }}
                            </p>

                            <form method="POST" action="{{ route('cart.add', $product) }}" class="mt-6">
                                @csrf
                                <x-primary-button>Add to Cart</x-primary-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>