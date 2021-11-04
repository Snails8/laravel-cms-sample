<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $paths = [
            'contact.post'
        ];

        return (in_array($this->route()->action['as'], $paths));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'company'        => 'required|max:255',
            'name'           => 'required|max:255',
            'email'          => 'required|email',
            'tel'            => 'required|regex:/^[0-9]{2,4}[0-9]{2,4}[0-9]{3,4}$/',
            'employee_count' => 'integer|min:1',
            'contact_type'   => 'integer|min:1',
            'detail'         => 'required',
        ];

        return $rules;
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        $messages = [
            'company.required'           => '名前は必ず入力してください。',
            'company.max'                => '255文字以内で入力してください。',
            'name.required'              => '名前は必ず入力してください。',
            'name.max'                   => '255文字以内で入力してください。',
            'email.required'             => 'メールアドレスは必ず入力してください。',
            'email.email'                => '有効なメールアドレスの形式ではありません。',
            'tel.required'               => '電話番号は必ず入力してください。',
            'tel.regex'                  => '有効な電話番号の形式ではありません。',
            'employee_count.integer'     => '従業員数の入力値が有効な形式ではありません。',
            'employee_count.min'         => '従業員数は必ず選択してください。',
            'contact_type.integer'       => '入力値が有効な形式ではありません。',
            'contact_type.min'           => '必ず選択してください。',
            'detail.required'            => '必ず入力してください。',
        ];

        return $messages;
    }
}
