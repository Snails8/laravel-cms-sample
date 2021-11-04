<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OfficePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $paths = [
            'admin.office.store',
            'admin.office.update',
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
            'name'              => 'required|string|max:255',
            'address'           => 'required|string|max:255',
            'tel'               => 'required|regex:/^[0-9]{2,4}[0-9]{2,4}[0-9]{3,4}$/',
            'manager'           => 'required|string|max:255',
            'post'              => 'required|string|max:255',
        ];

        return $rules;
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        $messages = [
            'name.required'              => '名前は必ず入力してください。',
            'name.string'                => '数字や記号は除外してください。',
            'name.max'                   => '255文字以内で入力してください。',
            'address.required'           => '住所は必ず入力してください。',
            'address.string'             => '数字や記号は除外してください。',
            'address.max'                => '255文字以内で入力してください。',
            'tel.required'               => '電話番号は必ず入力してください。',
            'tel.regex'                  => '有効な電話番号の形式ではありません。',
            'manager.required'           => '代表者名は必ず入力してください。',
            'manager.string'             => '数字や記号は除外してください。',
            'manager.max'                => '255文字以内で入力してください。',
            'post.required'              => '代表者名は必ず入力してください。',
            'post.string'                => '数字や記号は除外してください。',
            'post.max'                   => '255文字以内で入力してください。',
        ];

        return $messages;
    }
}
