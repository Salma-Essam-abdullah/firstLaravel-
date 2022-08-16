<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name_ar' => 'required|max:100|unique:offers,name_ar,'. $this->id,
            'name_en' => 'required|max:100|unique:offers,name_en,' . $this->id,
      
            'price' => 'required|numeric',
            'details_ar' => 'required',
            'details_en' => 'required',

        ];

    }
    public function messages()
    {
        return [
            'name_ar.required' => __('messages.offer name required'),
            'name_en.required' => __('messages.offer name required'),
            'name_ar.max' => __('messages.offer name max'),
            'name_en.max' => __('messages.offer name max 100'),
            'name_ar.unique' => __('messages.offer name unique'),
            'name_en.unique' => __('messages.offer name unique'),
            'price.required' => __('messages.price required'),
            'price.numeric' => __('messages.price numeric'),
            'details_ar.required' => __('messages.details required'),
            'details_en.required' => __('messages.details required'),


        ];
    }
}
