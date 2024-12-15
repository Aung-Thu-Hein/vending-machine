<?php

namespace Tests\Feature\Product;

use App\Models\User;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ProductControllerTest extends TestCase
{
    #[Test]
    public function storeRequest()
    {

        $admin = User::where('role_id', 1)->first();

        $this->assertNotNull($admin, "doesn't exist");

        $this->actingAs($admin, 'sanctum');


        $request_data = [
            'data' => [
                'attributes' => [
                    'name' => 'Test Product',
                    'category' => '1',
                    'price' => '100.00',
                    'availableQuantity' => '10',
                ],
            ],
        ];

        $response = $this->postJson('/api/products', $request_data);

        $response->assertStatus(201);
        $response->assertJson([
            'data' => [
                'attributes' => [
                    'name' => 'Test Product',
                ],
            ],
        ]);
    }
}
