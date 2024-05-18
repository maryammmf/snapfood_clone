<?php

namespace App\Http\Requests\seller\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
//        dd(11);
        return [
            'name' => ['required'],
            'number' => ['required' ],
            'address' => ['required'],
            'bank_info' => ['required'],
            'restaurant_category_id' => ['required'],
            'seller_id' => ['required']
        ];

    }
}
