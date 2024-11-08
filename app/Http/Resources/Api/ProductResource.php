<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'products',
            'id' => (string) $this->id,
            'attributes' => [
                'name' => $this->name,
                'category' => $this->category->name,
                'slug' => $this->slug,
                'price' => (float) $this->price,
                'availableQuantity' => (int) $this->available_quantity,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at
            ],
            'relationships' => [
                'category' => [
                    'data' => [
                        'id' => (string) $this->category_id,
                        'type' => 'categories'
                    ]
                ],
            ],
        ];
    }
}
