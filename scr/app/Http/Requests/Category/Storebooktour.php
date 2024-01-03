<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class Storebooktour extends FormRequest
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
            'id_tour' => ['required', 'string'],
            'customer_name' => ['required','string'],
            'email' => ['required', 'integer'],
            'phone' => ['required', 'integer'], 
            'address' => ['required', 'string'],
            'note' => ['nullable', 'string'],
            'quantity' => ['nullable', 'integer'],
            'total' => ['nullable', 'integer'],
            'deposit' => ['nullable', 'integernt'],
            'status' => ['nullable', 'integer'],
            'payment' => ['nullable', 'integer'],
            'startdate' => ['required', 'date_format:Y-m-d\TH:i'],
            'enddate' => ['required','date_format:Y-m-d\TH:i'],
        ];
    }
}
