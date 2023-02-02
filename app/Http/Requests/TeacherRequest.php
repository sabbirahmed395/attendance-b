<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use App\Rules\ExistsInModelAttribute;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'teacher_id' => ['required'],
            'title' => ['nullable'],
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['required'],
            'designation' => ['required', new ExistsInModelAttribute(Teacher::class, 'designation')],
            'description' => ['nullable']
        ];
    }
}
