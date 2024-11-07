<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->word();

        return [
            'name' => $name,
            'category_id' => fake()->numberBetween(1, 6),
            'slug' => $name,
            'price' => fake()->randomFloat(2, 1, 100),
            'available_quantity' => fake()->numberBetween(1, 100),
        ];
    }
}
