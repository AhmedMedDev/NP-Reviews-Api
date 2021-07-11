<?php

namespace App\Http\Requests\IncorrectAnswer;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncorrectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'IAcontent' => 'string|regex:/^[a-zA-Z ]+$/',
            'question_id' => 'exists:App\Models\Question,id',
        ];
    }
}
