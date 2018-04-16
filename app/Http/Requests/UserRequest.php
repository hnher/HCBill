<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'old_password'=>'required',
            'password'=>'required|regex:/^[A-Za-z0-9]{6,20}$/',
            'confirm_password'=>'required|regex:/^[A-Za-z0-9]{6,20}$/',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required'=>'旧密码不能为空',
            'password.required'=>'新密码不能为空',
            'confirm_password.required'=>'确认新密码不能为空',
            'password.regex'=>'新密码必须是6--21数字加字母组成，不能是纯数字或纯英文',
            'confirm_password.regex'=>'新密码必须是6--21数字加字母组成，不能是纯数字或纯英文',

        ];
    }
}
