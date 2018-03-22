<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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
            'project_Id'=>'required',
            'name'=>'required',
            'amount'=>'required',
            'handle_Id'=>'required',
            'price'=>'required',
            'cash_disburse'=>'required',
            'cash_recover'=>'required',
            'oil_disburse'=>'required',
            'oil_recover'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'project_Id.required'=>'项目名不能为空',
            'name.required'=>'品名不能为空',
            'amount.required'=>'数量不能为空',
            'handle_Id.required'=>'经手人不能为空',
            'price.required'=>'运价不能为空',
            'cash_disburse.required'=>'现金支出不能为空',
            'cash_recover.required'=>'现金回收不能为空',
            'oil_disburse.required'=>'油卡支出为空',
            'oil_recover.required'=>'油卡回收不能为空',
        ];
    }
}