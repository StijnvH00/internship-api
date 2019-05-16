<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Internship extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'intern' => $this->intern,
            'assignment' => $this->assignment,
            'start' => $this->start,
            'end' => $this->end
        ];
    }
}
