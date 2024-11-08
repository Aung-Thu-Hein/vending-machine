<x-layouts.user-layout title="Little Vending">
    <div class="m-12">
        <div class="grid grid-cols-5 gap-x-3 gap-y-2">
            @foreach ($products as $product)
                <x-product-card :$product />
            @endforeach
        </div>
        <div class="py-5 mx-4">
            {{ $products->onEachSide(1)->links() }}
        </div>
    </div>
</x-layouts.user-layout>
