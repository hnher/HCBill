<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     *
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required|unique:users,email|regex:/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/',
            'password'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'会员名不能为空',
            'email.required'=>'邮箱不能为空',
            'email.regex'=>'必须是邮箱格式',
            'email.unique'=>'邮箱已存在',
            'password.required'=>'密码不能为空',
        ];
    }
}
