<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name,' . $this->id,
            'slug' => 'required',
            'categorie_id' => 'required',
            'brand_id' => 'required',
            'small_description' => 'required',
            'description' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'trending' => 'required',
            'status' => 'required',
            'file' => 'required|array|min:4|max:4',
            'colore' => 'required|array|min:1',
            'file.*' => 'image',
            'tags'=>'required'
        ];
    }
}
