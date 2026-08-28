<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
            <a href="{{ route('products.create') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                Add Product
            </a>
        </div>
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

                    @forelse ($products as $product)
                        <div class="py-4 border-b last:border-b-0">
                            <div class="flex justify-between items-start">
                                <div>
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->title }}" class="w-32 h-32 object-contain mb-3">
                                    @endif

                                    <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
                                    <p class="text-sm text-gray-500">{{ $product->category->name }}</p>

                                    @if ($product->description)
                                        <p class="mt-2 text-gray-700">{{ $product->description }}</p>
                                    @endif

                                    <p class="mt-2 font-semibold">€{{ number_format($product->price, 2) }}</p>
                                </div>

                                <div class="flex gap-3">
                                    <a href="{{ route('products.edit', $product) }}" class="text-blue-600 hover:underline">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('products.destroy', $product) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline"
                                            onclick="return confirm('Delete this product?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No products found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>