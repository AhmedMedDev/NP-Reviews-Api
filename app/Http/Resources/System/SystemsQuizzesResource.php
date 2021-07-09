<?php

namespace App\Http\Resources\System;

use Illuminate\Http\Resources\Json\JsonResource;

class SystemsQuizzesResource extends JsonResource
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
            "quiz_id"       => $this->id,
            "system_name"   => $this->Sname,
            "quiz_name"     => $this->Qname,
            "system_id"     => $this->system_id,
        ];
    }
}
