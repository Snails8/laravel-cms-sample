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
            'name'          => 'required',
            'kana'          => 'required',
            'tel'           => 'required|regex:/^[0-9]{2,4}[0-9]{2,4}[0-9]{3,4}$/',
            'email'         => 'required|email',
            'password'              => 'required|confirmed|regex:/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i',
            'password_confirmation' => 'required',
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
            'kana.required'        => '会社名は必ず入力してください。',
            'kana.max'             => '会社名は255文字以内で入力してください。',
            'tel.required'         => '電話番号は必ず入力してください。',
            'tel.regex'            => '有効な電話番号の形式ではありません。',
            'email.required'       => 'メールアドレスは必ず入力してください。',
            'email.email'          => '有効なメールアドレスの形式ではありません。',
            'email.unique'       => 'このメールアドレスは既に登録されています。',
            'password.required'  => 'パスワードは必須項目です。',
            'password.regex'     => '半角英数字それぞれを1種類以上含む8-100文字で入力してください。',
            'password.confirmed' => '確認用パスワードと一致していません。',
            'password_confirmation.required' => 'パスワードは必須項目です。',
        ];

        return $messages;
    }
}
