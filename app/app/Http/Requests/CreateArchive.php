<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArchive extends FormRequest
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
            'title' => 'required|max:20',
            'period' => 'required|integer|max:1000',
            'success_level' => 'required|integer|max:10',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'period' => '取組期間',
            'success_level' => '達成評価',
        ];
    }

    public function messages()
    {
        return [
            'title.max' => ':attributeは20文字以内で入力してください。',
            'period.integer' => ':attributeは1000以内の整数を入力してください。',
            'period.max' => ':attributeは1000以内の整数を入力してください。',
            'success_level.integer' => ':attributeは1～10の間で選択してください。',
            'success_level.max' => ':attributeは1～10の間で選択してください。',
        ];
    }
}
