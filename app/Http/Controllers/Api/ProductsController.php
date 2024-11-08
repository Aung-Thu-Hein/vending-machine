<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductRequest;
use App\Http\Resources\Api\ProductResource;
use App\Models\Product;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $products = Product::paginate(10);
        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function store(ProductRequest $request)
    {
        $model = [
            'name' => $request->input('data.attributes.name'),
            'category_id' => $request->input('data.attributes.category'),
            'price' => $request->input('data.attributes.price'),
            'available_quantity' => $request->input('data.attributes.availableQuantity'),
        ];

        return new ProductResource(Product::create($model));
    }

    public function edit(string $id)
    {
        //
    }

    // FOR PUT method
    public function replace(ProductRequest $request, string $id)
    {
        try {
            $product = Product::findOrFail($id);

            $model = [
                'name' => $request->input('data.attributes.name'),
                'category_id' => $request->input('data.attributes.category'),
                'price' => $request->input('data.attributes.price'),
                'available_quantity' => $request->input('data.attributes.availableQuantity'),
            ];

            $product->update($model);

            return new ProductResource($product);
        } catch (ModelNotFoundException $exception) {
            return $this->error('Product cannot be found.', 404);
        }
    }

    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return $this->ok('Procuct successfully deleted');

        } catch (ModelNotFoundException $exception) {
            return $this->error('Product cannot found.', 404);
        }
    }
}
