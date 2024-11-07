<?php

namespace Database\Factories;

use App\Enums\TransactionStatus;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{

    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = fake()->numberBetween(1, 20);
        $price = Product::factory()->create()->price;

        return [
            'product_id' => Product::factory(),
            'status' => fake()->randomElement(TransactionStatus::toArray()),
            'quantity' => $quantity,
            'total_price' => $price
        ];
    }
}
