<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HrCompanyPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $paths = [
            'admin.hr_company.store',
            'admin.hr_company.update',
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
            'name'           => 'required|max:255',
            'zipcode1'       => 'required|regex:/^[0-9]{3}$/',
            'zipcode2'       => 'required|regex:/^[0-9]{4}$/',
            'address'        => 'required|string|max:255',
            'address_other'  => 'string|max:255',
            'tel'            => 'required|regex:/^[0-9]{2,4}[0-9]{2,4}[0-9]{3,4}$/',
            'email'          => 'required|email',
            'representative' => 'required|max:255',
        ];

        return $rules;
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        $messages = [
            'name.required'                => '会社名は必ず入力してください。',
            'name.max'                     => '会社名は255文字以内で入力してください。',
            'name.string'                  => '数字や記号は除外してください。',
            'zipcode1.required'            => '郵便番号1は必ず入力してください。',
            'zipcode1.regex'               => '郵便番号は数字3桁で入力してください。',
            'zipcode2.required'            => '郵便番号2は必ず入力してください。',
            'zipcode2.regex'               => '郵便番号は数字4桁で入力してください。',
            'address.required'             => '住所は必ず入力してください。',
            'address.string'               => '住所の入力値が有効な形式ではありません。',
            'address.max'                  => '住所は255文字以内で入力してください。',
            'address_other.string'         => '建物名/部屋番号の入力値が有効な形式ではありません。',
            'address_other.max'            => '建物名/部屋番号は255文字以内で入力してください。',
            'tel.required'                 => '電話番号は必ず入力してください。',
            'tel.regex'                    => '有効な電話番号の形式ではありません。',
            'email.required'               => 'メールアドレスは必ず入力してください。',
            'email.email'                  => '有効なメールアドレスの形式ではありません。',
            'representative.required' => '会社名は必ず入力してください。',
            'representative.max'      => '会社名は255文字以内で入力してください。',
        ];

        return $messages;
    }
}
