<?php

namespace App\Http\Resources\Question;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionAnswerResource extends JsonResource
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
            'question_content' => $this->Qcontent,
            'answer_content' => $this->Acontent,
            'quiz_id' => $this->quiz_id,
            'question_id' => $this->question_id,
        ];
    }
}
