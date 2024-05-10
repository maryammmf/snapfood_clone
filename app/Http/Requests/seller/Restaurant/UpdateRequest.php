<?php

namespace App\Http\Requests\seller\restaurant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required'],
            'number' => ['required' ],
            'address' => ['required'],
            'latitude'  => ['required'],
            'longitude'  => ['required'],
            'bank_info' => ['required'],
            'restaurant_category_id' => ['required'],
            'is_open' => ['required'],
            'schedule' => ['string'],
            'days' => ['required' , 'array'],
            'days_time' => ['required' , 'array'],
            'shipping_cost' => ['integer'],
//            'photo' => ['required'],
        ];
    }
}
