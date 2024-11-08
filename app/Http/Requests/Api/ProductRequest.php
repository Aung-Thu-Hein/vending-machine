<?php

namespace App\Http\Requests\Api;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'data.attributes.name' => ['required', 'max:255'],
            'data.attributes.category' => ['required', Rule::in(Category::pluck('id'))],
            'data.attributes.price' => ['required', 'decimal:2', 'gt:0'],
            'data.attributes.availableQuantity' => ['required', 'integer']
        ];
    }
}
