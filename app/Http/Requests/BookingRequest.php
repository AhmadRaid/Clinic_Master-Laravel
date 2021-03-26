<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'patient_id' => 'required|integer|min:1|max:30',
            'service_id' => 'required|integer|min:1|max:30',
            'time' => 'required',
            'date' => 'required',
            'price' => 'nullable',
            'status' => 'nullable',
            'type' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'patient_id.required' => 'مطلوب اختيار المريض.',
            'service_id.required' => 'مطلوب اختيار الخدمة.',
            'time.required' => 'مطلوب تحديد الوقت.',
            'date.unique' => 'مطلوب تحديد التاريخ.',
            'status' => 'الحالة .',
            'type' => 'مطلوب نوع الحجز.',
        ];
    }
}
