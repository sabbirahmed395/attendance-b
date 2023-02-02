<?php

namespace App\Http\Requests;

class UserRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'mobile' => ['nullable'],
            'gender' => ['required'],
            'user_type' => ['required'],
        ];

        if (request()->method == 'POST') {
            $rules['password'] = ['required'];
        }

        return $rules;
    }
}
