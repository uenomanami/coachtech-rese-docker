<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CloseddateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'storemanager/storedate/create') {
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
            'date' => 'required|date_format:Y-m-d|after:today',
        ];
    }
    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'date.after' => '日付は翌日以降の日付を指定してください',
        ];
    }
}
