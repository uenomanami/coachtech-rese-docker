<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'detail/comment') {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'star' => 'required|integer',
            'comment' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'star.required' => '評価を入力してください',
            'comment.required' => 'コメントを入力してください',
            'comment.string' => 'コメントを正しく入力してください'
        ];
    }
}
