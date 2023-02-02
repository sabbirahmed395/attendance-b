<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use App\Rules\ExistsInModelAttribute;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'program_id' => ['required', 'exists:programs,id'],
            'batch_id' => ['required', 'exists:batches,id'],
            'student_id' => ['required'],
            'title' => ['nullable'],
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['required'],
            'description' => ['nullable']
        ];
    }
}
