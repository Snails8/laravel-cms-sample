<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsPostRequest extends FormRequest
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
            'admin.news.store',
            'admin.news.update',
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
            'title'            => 'required',
            'body'             => 'required',
            'public_date'      => 'required|date',
            'image'            => '',
            'description'      => 'required',
            'news_categories' => 'required',
        ];

        return $rules;
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        $messages = [
            'title.required'            => 'タイトルは必ず入力してください。',
            'body.required'             => '記事内容は必ず入力してください。',
            'public_date.required'      => '公開日は必ず入力してください。',
            'public_date.date'          => '日付形式で入力してください。',
            'description.required'      => 'descriptionは必ず入力してください。',
            'news_categories.required' => 'カテゴリは必ず選択してください。',
        ];

        return $messages;
    }
}
