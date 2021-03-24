<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tenantRequest extends FormRequest
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
            //
            'T_name'=>'required|string|min:2|max:30',
            'phone'=>'required|string|min:10|max:20',
        ];
    }
    public function messages()
    {
       return[
         'T_name.required'=>'住戶姓名為必填',
           'T_name.min'=>'住戶姓名至少為兩個子元',
           'phone.required'=>'電話為必填',
           'phone.min'=>'電話至少為10個號碼',
       ];

    }
}
