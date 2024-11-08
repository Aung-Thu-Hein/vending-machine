<x-layouts.user-layout title="{{'Product' . $product->slug}}">
    <div class="w-[50%] mx-auto">
        <div class="flex flex-col gap-y-3 bg-white shadow-productCard border p-3 rounded-md">
            <div class="flex">
                <img src="https://prd.place/400" alt="{{"product-" . $product->slug}}" class="w-[200px] h-[200px] mr-20">
                <div class="text-xl flex flex-col gap-y-3">
                    <p>Product Name: <span class="font-semibold">{{ $product->name}}</span></p>
                    <p>Product Price: <span class="font-semibold">{{"$" . $product->price}}</span></p>
                    <p>Product Category: <span class="font-semibold">{{$product->category->name}}</span></p>
                    <p>Available Amount: <span class="font-semibold">{{$product->available_quantity}}</span></p>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{route('products.list')}}" class="underline text-violet-400">back</a>
            </div>
        </div>
    </div>
</x-layouts.user-layout>
