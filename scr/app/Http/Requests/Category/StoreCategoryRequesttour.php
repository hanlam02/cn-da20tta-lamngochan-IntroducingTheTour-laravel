<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequesttour extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nametour' => ['required', 'string'],
            'image' => ['nullable','mimes:jpg,jpeg,png'],
            'price' => ['required', 'string'],
            'sale_price' => ['nullable', 'string'], // Kiểm tra định dạng giá tiền
            'itinerary' => ['required', 'string'],
            'schedule' => ['required', 'string'],
            'id_location' => ['nullable', 'numeric'],
            'numberguests' => ['required', 'numeric'],
            'vehicle' => ['nullable', 'string'],
            'domain' => ['nullable', 'string'],
            'description' => ['required', 'string'],
        ];
    }
}