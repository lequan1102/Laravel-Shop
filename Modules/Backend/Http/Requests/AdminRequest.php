<?php

namespace Modules\Backend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name'                  => 'required|min:3|max:50',
            'email'                 => 'required|email|unique:admin',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
            'roles'                 => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'                     => 'Tên người dùng không được để trống',
            'name.min'                          => 'Tên người dùng quá ngắn',
            'name.max'                          => 'Tên người dùng quá dài',
            'email.required'                    => 'Email để khôi phục mật khẩu không được để trống',
            'email.email'                       => 'Định đạng email không chính xác',
            'email.unique'                      => 'Email này đã có người sử dụng.',
            'password.required'                 => 'Mật khẩu không được để trống',
            'password.confirmed'                => 'Mật khẩu không trùng khớp',
            'password_confirmation.required'    => 'Mật khẩu nhập lại không được để trống',
            'password_confirmation.min'         => 'Mật khẩu nhập lại quá ngắn',
            'roles.required'                    => 'Chọn ít nhất một quyền cho người dùng này',
        ];
    }
}
