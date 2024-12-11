<?php

namespace App\Dao\Product;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Contracts\Dao\Product\ProductDao as ProductDaoInterface;
use App\Models\Product;

class ProductDao implements ProductDaoInterface
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProducts(): LengthAwarePaginator
    {
        return $this->product::paginate(10);
    }

    public function create(array $model): Product
    {
        return $this->product->create($model);
    }

    public function getProductById($id): Product
    {
        return $this->product->find($id);
    }

    public function updateProductById($id, array $model): bool|int
    {
        $product = $this->product->find($id);

        if(!$product) {
            return false;
        }

        return $product->update($model);
    }

    public function deleteProductById($id): bool|null
    {
        $product = $this->product->find($id);

        if(!$product) {
            return false;
        }

        return $product->delete();
    }
}
