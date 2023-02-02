<?php

namespace App\Http\Requests;

class BatchRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'program_id' => ['required', 'exists:programs,id'],
            'batch_no' => ['required']
        ];
    }
}
