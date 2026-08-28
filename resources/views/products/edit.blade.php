<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Product</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="category_id" value="Category" />
                            <select name="category_id" id="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" class="mt-1 block w-full"
                                :value="old('title', $product->title)" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="description" value="Description" />
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="price" value="Price" />
                            <x-text-input id="price" name="price" type="number" step="0.01"
                                class="mt-1 block w-full" :value="old('price', $product->price)" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="image" value="Image" />
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->title }}" class="w-32 h-32 object-contain my-3">
                            @endif
                            <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp"
                                class="mt-1 block w-full text-sm text-gray-700">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <x-primary-button>Update Product</x-primary-button>
                        <a href="{{ route('products.index') }}" class="ml-4 text-gray-600">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>