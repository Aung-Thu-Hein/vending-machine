@props(['product'])
<div class="flex flex-col gap-y-3 bg-white shadow-productCard border p-3 rounded-md">
    <div>
        <img src="https://prd.place/400" alt="{{"product-" . $product->slug}}" class="w-[200px] h-[200px]">
    </div>
    <div class="text-xl font-bold">
        <p>{{$product->name}}</p>
    </div>
    <div class="flex justify-between">
        <p class="text-green-600">{{"$" . $product->price}}</p>
        <a href="{{route('products.detail', ['product' => $product])}}" class="underline text-violet-400">product detail</a>
    </div>
</div>
