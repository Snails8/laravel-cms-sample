<?php

namespace App\Http\Requests\Api\HrAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

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
            'hr_admin.user.store'
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
            'last_name' => 'required',
            'fast_name' => '',
            'last_name_kana' => '',
            'fast_name_kana' => '',
            'email' => 'required|email',
        ];

        return $rules;
    }

    public function messages(): array
    {
        $messages = [
            'last_name.required' => '名字は必ず入力してください。',
        ];

        return $messages;
    }


    /**
     * 試験的にAPI のvalidation 追加
     * @param Validator $validator
     */
//    protected function failedValidation(Validator $validator)
//    {
//        $res = [
//            'errors' => $validator->errors()->toArray(),
//        ];
//
//        throw new HttpResponseException(response()->json($res, 422));
//    }

    protected function failedValidation( Validator $validator ){
        $response['errors']  = $validator->errors()->toArray();
        throw new HttpResponseException( response()->json( $response, 422 ));
    }
}
