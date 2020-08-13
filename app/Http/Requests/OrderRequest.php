<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $productId
 * @property string $count
 */
class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'productId' => ['required', 'exists:product,id'],
            'count' => ['required', 'numeric', 'min:0'],
        ];
    }
}
