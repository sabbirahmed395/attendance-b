<?php

namespace App\Http\Requests;

class ClassroomRequest extends BaseFormRequest
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
            'batch_id' => ['required', 'exists:batches,id'],
            'course_id' => ['required', 'exists:courses,id'],
            'status' => ['required']
        ];
    }
}
