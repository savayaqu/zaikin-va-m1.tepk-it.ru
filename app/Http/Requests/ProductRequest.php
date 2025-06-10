<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_type_id' => 'required|exists:product_types,id',
            'name' => 'required|string|max:255',
            'article' => 'required|string|max:255',
            'min_price' => 'required|decimal:0,2|min:0.01|max:9999999999999999.99',
            'width' => 'required|decimal:0,2',
        ];
    }
}
