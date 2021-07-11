<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncorrectAnswer\StoreIncorrectRequest;
use App\Http\Requests\IncorrectAnswer\UpdateIncorrectRequest;
use App\Models\IncorrectAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncorrectAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incorrectanswers = DB::table('incorrectanswer')->paginate(5);

        return response()->json([
            'success' => true,
            'payload' => $incorrectanswers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncorrectRequest $request)
    {
        $request = $request->validated();

        $incorrectanswer = IncorrectAnswer::create( $request );

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(IncorrectAnswer $incorrectanswer)
    {
        return response()->json([
            'success' => true,
            'payload' => $incorrectanswer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncorrectRequest $request, IncorrectAnswer $incorrectanswer)
    {
        $request = $request->validated();

        $incorrectanswer = $incorrectanswer->update( $request );

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
    public function destroy(IncorrectAnswer $incorrectanswer)
    {
        $incorrectanswer = $incorrectanswer->delete( $incorrectanswer );

        if ($incorrectanswer) return response()->json([
            'success' => true,
        ]);
    }
}
