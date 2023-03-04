<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'storemanager/edit') {
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
            'area' => 'required|integer',
            'category' => 'required|integer',
            'description' => 'required|string'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '店名を入力してください',
            'name.string' => '文字で入力してください',
            'area.required' => 'エリアを選択してください',
            'area.integer' => '指定された形式で選択してください',
            'category.required' => 'カテゴリーを選択してください',
            'category.integer' => '指定された形式で選択してください',
            'description.required' => '紹介文を入力してください',
            'description.string' => '文字で入力してください',
        ];
    }
}
