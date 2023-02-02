<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'user_id' => $this->user_id,
            'teacher_id' => $this->teacher_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'name' => str_replace('  ', ' ', trim($this->title . ' ' . $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name, ' ')),
            'designation' => $this->designation,
        ];
    }
}
