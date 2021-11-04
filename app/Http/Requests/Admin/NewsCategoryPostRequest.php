<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsCategoryPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 呼び出せるpathを指定
        $paths = [
            'admin.news_category.store',
            'admin.news_category.update',
        ];

        return (in_array($this->route()->action['as'], $paths));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'sort_no' => '',
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'カテゴリ名は必ず入力してください。',
            'name.string'   => '数字や記号は除外してください。',
            'name.max'      => '255文字以内で入力してください。',
        ];

        return $messages;
    }
}
