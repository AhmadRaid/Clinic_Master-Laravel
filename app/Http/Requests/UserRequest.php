<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email'  => 'required|email|unique:users,email,'.$this -> id,
            'password' => 'required_without:id|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'الاسم الاول مطلوب.',
            'last_name.required' => 'الاسم الاخير مطلوب.',
            'email.required' => 'البريد الالكتروني مطلوب.',
            'email.unique' => 'البريد الالكتروني مسجل من قبل.',
            'password.confirmed' => 'الرقم السري غير متوافق.',
        ];
    }
}
