<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'administor/mail') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'user.required' => '送信先を指定してください',
            'user.required' => 'タイトルを記載してください',
            'content.required' => '本文を記載してください'
        ];
    }
}
