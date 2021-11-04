<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UsageCasePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $paths = [
            'admin.usage_case.store',
            'admin.usage_case.update',
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
            'title' => '',
            'image' => '',
            'introduction' => '',
            'hr_company_id' => '',
        ];

        return $rules;
    }
}
