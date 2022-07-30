<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name' => 'required|string|max:40|min:3',
            'description' => 'required|string|max:500|min:3',
            'small_meal_price' => 'required|numeric',
            'medium_meal_price' => 'required|numeric',
            'large_meal_price' => 'required|numeric',
            'category' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg',
        ];
    }
}
