<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|string',
            'age' => 'numeric',
            'date' => 'string',
            'phone' => 'numeric',
            'web' => 'string',
            'address' => 'string',
        ];
    }
    /**
     * Thông báo lỗi khi validation không hợp lệ
     */
    public function messages()
    {
        return [
            'name.string' => 'Vui lòng điền tên cho đúng',
            'age.numeric' => 'Vui lòng nhập tuổi cho đúng',
            'date.string' => 'Vui lòng điền lại ngày tháng',
            'phone.numeric' => 'Vui lòng kiểm tra lại số điện thoại',
            'web.string' => 'Vui lòng nhập kiểm tra lại kí tự',
            'address.string' => 'Vui lòng nhập lại địa chỉ',
        ];
    }
}