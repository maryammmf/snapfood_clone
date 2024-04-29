<?php

namespace App\Http\Requests\seller\food;

use Illuminate\Foundation\Http\FormRequest;

class AddFoodRequest extends FormRequest
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
            'name' => ['required' , 'string' ],
            'material'=> ['string'],
            'price'=> ['required'],
            'photo'=> ['string'],
            'food_category_id'=> ['required'],
        ];
    }
}
