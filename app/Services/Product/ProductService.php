<?php

namespace App\Services\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Requests\Api\ProductRequest;
use App\Http\Resources\Api\ProductResource;
use App\Contracts\Services\Product\ProductService as ProductServiceInterface;
use App\Dao\Product\ProductDao;
use App\Models\Product;

class ProductService implements ProductServiceInterface
{
    protected $product_dao;

    public function __construct(ProductDao $product_dao)
    {
        $this->product_dao = $product_dao;
    }

    public function index(): ResourceCollection
    {
        $products = $this->product_dao->getProducts();
        return ProductResource::collection($products);
    }

    public function storeProduct(ProductRequest $request): ProductResource
    {
        $model = [
            'name' => $request->input('data.attributes.name'),
            'category_id' => $request->input('data.attributes.category'),
            'price' => $request->input('data.attributes.price'),
            'available_quantity' => $request->input('data.attributes.availableQuantity'),
        ];

        $product = $this->product_dao->create($model);

        return new ProductResource($product);
    }

    public function show(Product $product): ProductResource
    {
        $product = $this->product_dao->getProductById($product->id);

        return new ProductResource($product);
    }

    public function update($id, ProductRequest $request): bool|int
    {
        $model = [
            'name' => $request->input('data.attributes.name'),
            'category_id' => $request->input('data.attributes.category'),
            'price' => $request->input('data.attributes.price'),
            'available_quantity' => $request->input('data.attributes.availableQuantity'),
        ];

        return $this->product_dao->updateProductById($id, $model);
    }

    public function delete($id): bool|null
    {
        return $this->product_dao->deleteProductById($id);
    }
}
