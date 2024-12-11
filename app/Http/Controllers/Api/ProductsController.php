<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductRequest;
use App\Http\Resources\Api\ProductResource;
use App\Contracts\Services\Product\ProductService;
use App\Models\Product;
use App\Traits\ApiResponse;

class ProductsController extends Controller
{
    use ApiResponse;

    protected $product_service;

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }

    public function index(): ResourceCollection
    {
        return $this->product_service->index();
    }

    public function store(ProductRequest $request): ProductResource
    {
       return $this->product_service->storeProduct($request);
    }

    public function show(Product $product): ProductResource
    {
        return $this->product_service->show($product);
    }

    //For PUT method
    public function replace($id, ProductRequest $request)
    {
        $is_updated = $this->product_service->update($id, $request);

        if(!$is_updated) {
            return $this->error("No product is found to update", 404);
        }

        return $this->ok("Product has been successfully updated!");
    }

    public function destroy($id)
    {
        $is_deleted = $this->product_service->delete($id);

        if(!$is_deleted) {
            return $this->error("No product is found to delete", 404);
        }

        return $this->ok("Product has been successfully deleted!");
    }
}
