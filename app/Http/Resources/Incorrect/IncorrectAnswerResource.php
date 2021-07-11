<?php

namespace App\Http\Resources\Incorrect;

use Illuminate\Http\Resources\Json\JsonResource;

class IncorrectAnswerResource extends JsonResource
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
            'answer_id' => $this->id,
            'incorrect_content' => $this->IAcontent,
            'question_id' => $this->question_id,
        ];
    }
}
