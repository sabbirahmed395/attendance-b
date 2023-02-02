<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'name' => str_replace('  ', ' ', trim($this->title . ' ' . $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name, ' ')),
            'batch' => $this->batch->batch_no,
            'program' => $this->batch->program->name,
        ];
    }
}
