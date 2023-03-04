<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreinfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'storemanager/create') {
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
            'name' => 'required|string',
            'area' => 'required|integer',
            'category' => 'required|integer',
            'description' => 'required|string',
            'image_url' => 'required|mimes:jpg,jpeg,png,gif'
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
            'image_url.required' => '画像をアップロードしてください',
            'image_url.mimes' => '拡張子はjpg,jpeg,png,gifから指定してください'
        ];
    }
}
