<?php

namespace App\Http\Resources\Question;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionIncorrectAnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'incorrect_answer_id' => $this->id,
            'question_content' => $this->Qcontent,
            'incorrect_answer_content' => $this->IAcontent,
            'quiz_id' => $this->quiz_id,
            'question_id' => $this->question_id,
        ];
    }
}
