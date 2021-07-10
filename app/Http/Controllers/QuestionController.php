<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\QuestionStoreRequest;
use App\Http\Requests\Question\QuestionUpdateRequest;
use App\Http\Resources\Question\QuestionAnswerResource;
use App\Http\Resources\Question\QuestionIncorrectAnswer;
use App\Http\Resources\Question\QuestionIncorrectAnswerResource;
use App\Http\Resources\Question\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = DB::table('questions')->paginate(5);

        return response()->json([
            'success' => true,
            'payload' => QuestionResource::collection($questions)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionStoreRequest $request)
    {
        $request = $request->validated();

        $question = Question::create( $request );

        return response()->json([
            'sucess' => true,
            'payload' => new QuestionResource($question)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return response()->json([
            'sucess' => true,
            'payload' => new QuestionResource($question)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, Question $question)
    {
        $request = $request->validated();

        $question = $question->update( $request );

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question = $question->delete();

        if ($question) return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Get list of Question's answer 
     */
    public function answers(Question $question)
    {
        $answerOfQuestion = DB::table('questions')
        ->join('answers','questions.id','answers.question_id')
        ->where('answers.question_id',$question->id)
        ->paginate(5);

        return response()->json([
            'success' => true,
            'payload' => QuestionAnswerResource::collection($answerOfQuestion)
        ]);
    }

    /**
     * Get list of Question's incorrect answer
     */
    public function incorrectanswers(Question $question)
    {
        $incorrectanswersOfQuestion = DB::table('questions')
        ->join('incorrectanswer','questions.id','incorrectanswer.question_id')
        ->where('incorrectanswer.question_id',$question->id)
        ->paginate(5);

        return response()->json([
            'success' => true,
            'payload' => QuestionIncorrectAnswerResource::collection($incorrectanswersOfQuestion)
        ]);
    }

}
