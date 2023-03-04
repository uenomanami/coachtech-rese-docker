<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'detail/reserve' or $this->path() == 'detail/reserve/update') {
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
            'date' => 'required|date_format:Y-m-d|after:today|before:2months',
            'start_at' => 'required|date_format:H:i',
            'num_of_people' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'date.date_format' => '日付の形式で入力してください',
            'date.after' => '日付は翌日以降の日付を指定してください',
            'date.before' => '日付は３ヶ月以内を選択してください',
            'start_at.required' => '予約時間を入力してください',
            'start_at.date_format' => '時間の形式で入力してください',
            'num_of_people.required' => '人数を入力してください',
            'num_of_people.integer' => '人数は数値で入力してください',
        ];
    }
}
