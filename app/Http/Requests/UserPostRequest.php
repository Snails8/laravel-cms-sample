<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserPostRequest
 * @package App\Http\Requests
 */
class UserPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $paths = [
            'admin.user.store',
            'admin.user.update',
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
            'office_id'               => 'required|integer',
            'name'                  => 'required',
            'kana'                  => '',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|confirmed|regex:/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i',
            'password_confirmation' => 'required',
            'role'                  => 'required',
            'post'                  => '',
        ];

        // 更新時にユニークがあると登録済のメールアドレスと重複しバリデーションで弾かれてしまうためユニークを外す
        // update 時に password 項目の入力が必須にならないため
        if ($this->route()->action['as'] === 'user.update') {
            $rules['email'] = 'required|email';
            $rules['password'] = 'confirmed|regex:/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i';
            $rules['password_confirmation'] = '';
        }

        return $rules;

    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        $messages = [
            'office.required'    => '店舗は必ず選択してください。',
            'office.integer'     => '店舗に有効ではない値が入力されています。',
            'name.required'      => 'ユーザー名は必須項目です。',
            'email.required'     => 'メールアドレスは必須項目です。',
            'email.email'        => 'このメールアドレスは有効な形式ではありません。',
            'email.unique'       => 'このメールアドレスは既に登録されています。',
            'password.required'  => 'パスワードは必須項目です。',
            'password.regex'     => '半角英数字それぞれを1種類以上含む8-100文字で入力してください。',
            'password.confirmed' => '確認用パスワードと一致していません。',
            'password_confirmation.required' => 'パスワードは必須項目です。',
            'role.required'      => '権限は必ず選択してください。',
        ];

        return $messages;
    }
}
