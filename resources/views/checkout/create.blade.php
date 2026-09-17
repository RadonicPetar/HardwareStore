<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Checkout</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form method="POST" action="{{ route('checkout.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="name" value="Name" />
                            <x-text-input id="name" name="name" class="mt-1 block w-full"
                                :value="old('name', auth()->user()->name)" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                :value="old('email', auth()->user()->email)" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="address" value="Address" />
                            <x-text-input id="address" name="address" class="mt-1 block w-full"
                                :value="old('address')" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="city" value="City" />
                            <x-text-input id="city" name="city" class="mt-1 block w-full"
                                :value="old('city')" />
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>

                        <div class="mt-6 border-t pt-4">
                            <h3 class="font-semibold mb-3">Order Summary</h3>

                            @foreach ($cart as $item)
                                <div class="flex justify-between mb-2">
                                    <span>{{ $item['title'] }} × {{ $item['quantity'] }}</span>
                                    <span>€{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                </div>
                            @endforeach

                            <div class="flex justify-between font-semibold text-lg mt-4">
                                <span>Total</span>
                                <span>€{{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <x-primary-button>Place Order</x-primary-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>