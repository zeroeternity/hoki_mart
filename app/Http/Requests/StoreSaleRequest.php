<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSaleRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'member_id' => ['sometimes', 'nullable',],
            'payment_method' => ['required', 'string'],
            'items' => ['required', 'array'],
            'items.*.code' => ['required', 'string', Rule::exists('items', 'code')],
            'items.*.qty' => 'required|numeric|gt:0',
            'items.*.purchase_price' => 'required|numeric|gt:0',
        ];
    }
}
