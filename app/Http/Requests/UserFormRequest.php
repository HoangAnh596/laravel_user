<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
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
        $formRules = [
            "name" => [
                "required",
                Rule::unique('users')->ignore($this->id)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->id)
            ],   
            'password'=>'required',
            'file_upload' => [
                "mimes:jpg,bmp,png,gif"
            ],         
            'phone' => [
                'required',
                'regex:/^0[0-9]{9}$/',
                Rule::unique('users')->ignore($this->id)
            ],
            'address'=>'required'
        ];
        
        if($this->id == null){
            $formRules['file_upload'][] = "required";
        }
        return $formRules;
    }
    // validate
    public function messages()
    {
        return [
            'name.required' => 'name không được để trống',
            'name.regex' => 'name từ 3 đến 16 ký tự gồm chữ và số',
            'password.required' => 'Password không được để trống',
            'file_upload.required' => 'file_upload không được để trống',
            'file_upload.mimes' => 'file_upload phải thuộc jpg,bmp,png,gif',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email chưa đúng định dạng',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại gồm 10 số',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'address.required' => 'Địa chỉ không được để trống',
            
        ];
    }
}