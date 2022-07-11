<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required | max:100 | min:3',
            'content' => 'required | max:255 | min:1',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Questo campo è obbligatorio',
            'title.max' => 'Non puoi inserire più di :max caratteri',
            'title.min' => 'Non puoi inserire meno di :min caratteri',

            'content.required' => 'Questo campo è obbligatorio',
            'content.max' => 'Non puoi inserire più di :max caratteri',
            'content.min' => 'Non puoi inserire meno di :min caratteri',
        ];
    }
}
