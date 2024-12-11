<?php

namespace App\Contracts\Services\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Requests\Api\ProductRequest;
use App\Http\Resources\Api\ProductResource;
use App\Models\Product;

interface ProductService
{

    /**
     * show products with pagination
     *
     * @return ResourceCollection
     */
    public function index(): ResourceCollection;

    /**
     * store product record
     *
     * @param Request $request
     * @return ProductResource
     */
    public function storeProduct(ProductRequest $request): ProductResource;

    /**
     * get a product
     *
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product): ProductResource;

    /**
     * update a product record
     *
     * @param $id
     * @param Request $request
     * @return bool|int
     */
    public function update($id, ProductRequest $product): bool|int;

    /**
     * delete a product record
     *
     * @param $id
     * @return bool|null
     */
    public function delete($id): bool|null;

}
