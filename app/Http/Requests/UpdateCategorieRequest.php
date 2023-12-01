<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategorieRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:categories,name,'.$this->id,
            'slug'=>'required',
            'description'=>'required',
            'meta_title'=>'required',
            'meta_descrip'=>'required',
            'meta_keywords'=>'required',
        ];
    }
}
