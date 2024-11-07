<x-layouts.app title="Products | Create">
    <div class="mx-6 my-6 w-[50%]">
        <form action="{{route('products.update', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-y-1 mb-5">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" class="px-4 py-2 border border-gray-500 rounded-md" value="{{old('product_name') ?? $product->name}}" />
                @error('product_name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-y-1 mb-5">
                <label for="category">Category Name</label>
                <select name="category" class="px-4 py-2 border border-gray-500 rounded-md">
                    <option value=""> Select Catgory</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected((old('category') ?? $product->category->id) == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-y-1 mb-5">
                <label for="price">Price</label>
                <input type="text" name="price" class="px-4 py-2 border border-gray-500 rounded-md" value="{{old('price') ?? $product->price}}" />
                @error('price')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-y-1 mb-5">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" class="px-4 py-2 border border-gray-500 rounded-md" value="{{old('quantity') ?? $product->available_quantity}}"/>
                @error('quantity')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex gap-x-3 mt-5">
                <div class="px-2 py-2 rounded-md bg-gray-300 w-40 text-white flex justify-center">
                    <a href="{{route('products.index')}}">Cancel</a>
                </div>
                <div class="px-2 py-2 rounded-md bg-adminPrimary w-40 text-white flex justify-center">
                    <button type="submit">Update Product</button>
                </div>
            </div>
        </form>
    </div>

</x-layouts.app>
