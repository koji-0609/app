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
            //
            'name'  => 'required | max:10',
            'email' => 'required | email:filter,dns'
        ];
    }


    public function messages()
    {
        return [

            'name.required'   => '名前は必須です。',
            'name.max'        => ':max 文字以内で入力してください。',
            'email.required'  => 'メールアドレスは必須です。',
            'email.email'     => 'メールアドレスは、正しく入力してください。。'
        ];
    }
}
