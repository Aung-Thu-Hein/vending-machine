<?php

namespace Tests\Unit\Product;

use Mockery;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Dao\Product\ProductDao;
use App\Models\Product;

class ProductDaoTest extends TestCase
{

    /**
     * test not hitting the database
     */
    #[Test]
    public function storeProduct()
    {
        $product_data = [
            'name' => 'Lenovo Idea Pad 310',
            'category_id' => 1,
            'slug' => 'Lenovo-Idea-Pad-310',
            'price' => 23.45,
            'available_quantity' => 4,
        ];

        $mock_product = Mockery::mock(Product::class);
        $mock_product->shouldReceive('create')
            ->once()
            ->with($product_data)
            ->andReturn((new Product)->fill($product_data));

        $product_dao = new ProductDao($mock_product);

        $result = $product_dao->create($product_data);

        $this->assertInstanceOf(Product::class, $result);
        $this->assertEquals('Lenovo Idea Pad 310', $result->name);
        $this->assertEquals(1, $result->category_id);
        $this->assertEquals(23.45, $result->price);
        $this->assertEquals(4, $result->available_quantity);

    }

    protected function tearDown(): void
    {
        // Close Mockery after each test
        Mockery::close();
        parent::tearDown();
    }
}
