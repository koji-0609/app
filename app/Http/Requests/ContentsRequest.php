<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentsRequest extends FormRequest
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
            'title'    => 'required ',
            'contents' => 'required ',
            'gole'     => 'required '
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です。',  
            'contents.required' => 'コンテンツは必須です。',
            'gole.required' => 'ゴールは必須です。',
        
        ];
    }
}
