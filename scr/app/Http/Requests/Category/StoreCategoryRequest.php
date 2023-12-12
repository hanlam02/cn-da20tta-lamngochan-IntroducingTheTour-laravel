<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreCategoryRequest extends FormRequest
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
            'name_location' => 'required|unique:location,name_location',
        ];

    }
    public function messages():array{
        return [
             'name_location.required'=>'Vui lòng điền tên địa điểm',
             'name_location.unique'=>"$this->name_location đã tồn tại",
            ];
    }
}
