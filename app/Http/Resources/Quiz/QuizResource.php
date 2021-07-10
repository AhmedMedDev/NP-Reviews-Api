<?php

namespace App\Http\Resources\Quiz;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
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
            'quiz_id' => $this->id,
            'quiz_name' => $this->Qname,
            'system_id' => $this->system_id,
            'paginate' => [
                // 'from' => $this->total(),
                // 'to' => $this->to
            ]
        ];
    }
}
