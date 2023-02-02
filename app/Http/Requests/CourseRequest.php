<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use App\Rules\ExistsInModelAttribute;
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends BaseFormRequest
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
            'course_code' => ['required'],
            'course_title' => ['required'],
            'credit_hours' => ['required']
        ];
    }
}
