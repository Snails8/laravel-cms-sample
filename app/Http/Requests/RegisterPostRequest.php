<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $paths = [
            'register.post',
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
            'name'          => 'required|max:255',
            'zipcode'       => 'required',
            'address'       => 'required|string|max:255',
            'address_other' => 'string|max:255',
            'tel'           => 'required|regex:/^[0-9]{2,4}[0-9]{2,4}[0-9]{3,4}$/',
            'email'         => 'required|email',
            'ceo'           => 'required|max:255',
        ];

        return $rules;
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        $messages = [
            'name.required'        => '会社名は必ず入力してください。',
            'name.max'             => '会社名は255文字以内で入力してください。',
            'zipcode.required'     => '郵便番号は必ず入力してください。',
            'address.required'     => '住所は必ず入力してください。',
            'address.string'       => '住所の入力値が有効な形式ではありません。',
            'address.max'          => '住所は255文字以内で入力してください。',
            'address_other.string' => '建物名/部屋番号の入力値が有効な形式ではありません。',
            'address_other.max'    => '建物名/部屋番号は255文字以内で入力してください。',
            'tel.required'         => '電話番号は必ず入力してください。',
            'tel.regex'            => '有効な電話番号の形式ではありません。',
            'email.required'       => 'メールアドレスは必ず入力してください。',
            'email.email'          => '有効なメールアドレスの形式ではありません。',
            'ceo.required'         => '代表名は必ず入力してください。',
            'ceo.max'              => '代表名は255文字以内で入力してください。',
        ];

        return $messages;
    }
}
