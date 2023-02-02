<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use App\Rules\ExistsInModelAttribute;
use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required']
        ];
    }
}
