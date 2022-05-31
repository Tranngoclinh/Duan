<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'name'=>'required',
            'age' =>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên',
            'age.required'=>'Vui lòng nhập tuổi',
            'email.required'=>'Vui lòng nhập email',
            'phone.required'=>'Vui lòng nhập sđt',
            'address.required'=>'Vui lòng nhập địa chỉ'
        ];
    }
}
