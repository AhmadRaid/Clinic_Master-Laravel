<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
            'name' => 'required|max:150|unique:medicines,Name_Medicine,' . $this->id,
            'numberStrips' => 'required|integer|min:1',
            'numberGrains' => 'required|integer|min:1',
            'numberStock' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'إسم العلاج مطلوب',
            'name.max' => 'إسم العلاج يجب الا يزيد عن 150 حرف',
            'name.unique' => 'إسم العلاج موجود من قبل',
            'numberStrips.required' => 'عدد الشرائط مطلوب',
            'numberStrips.min' => 'يجب الا يقل عدد الشرائط عن 1',
            'numberGrains.required' => 'عدد الحبوب مطلوب',
            'numberGrains.min' => 'يجب الا يقل عدد الحبوب عن 1',
            'numberStock.required' => 'المخزون مطلوب',
        ];
    }
}
