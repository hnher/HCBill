<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
     * 这是注册会员的验证
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->id) {
            return [
                'name'=>'required',
                'email'=>'required|regex:/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/',
            ];
        }

        return [
            'name'=>'required',
            'email'=>'required|regex:/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/',
            'password'=>'regex:/^[A-Za-z0-9]{6,20}$/',
        ];
        }

    public function messages()
    {
        return [
            'name.required'=>'会员名不能为空',
            'email.required'=>'邮箱不能为空',
            'email.regex'=>'必须是邮箱格式',
            'email.unique'=>'邮箱已存在',
            'password.regex'=>'新密码必须是6--21数字加字母组成，不能是纯数字或纯英文',
        ];
    }
}
