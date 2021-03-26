<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBalancePackageRequest extends FormRequest
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
            'title' => 'required|max:150',
            'description' => 'required|max:255',
            'amount' => 'required|integer|min:1|max:30',
            'price' => 'required|numeric',
            'active' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => __('title is required'),
            'description.required' => __('description is required'),
            'amount.required' => __('amount is required'),
            'price.required' => __('price is required'),
            'title.max' => __('title may not be greater than :max characters'),
            'description.max' => __('description may not be greater than :max characters'),
            'amount.integer' => __('amount must be integer'),
            'amount.min' => __('amount must be at least 1'),
            'amount.max' => __('amount may not be greater than 30'),
            'price.numeric' => __('price must be a number'),
        ];
    }
}
