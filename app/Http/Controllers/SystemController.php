<?php

namespace App\Http\Controllers;

use App\Http\Requests\System\StoreSystemRequest;
use App\Http\Requests\System\UpdateSystemRequest;
use App\Http\Resources\System\SystemResource;
use App\Http\Resources\System\SystemsQuizzesResource;
use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'payload' => SystemResource::collection(System::paginate(5))
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystemRequest $request)
    {
        $request = $request->validated();

        $system = System::create( $request );

        return response()->json([
            'success' => true,
            'payload' => [
                'id' => $system->id
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {
        return response()->json([
            'success' => true,
            'payload' => new SystemResource($system)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSystemRequest $request,System $system)
    {
        $request = $request->validated();

        $system = $system->update( $request );

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
    public function destroy(System $system)
    {
        $system = $system->delete( $system );

        if ($system) return response()->json([
            'success' => true,
        ]);
    }


    /**
     * Get all Quizzes of Custion System
     */

    public function quizzes($system_id)
    {
        $quizzes_of_system = DB::table('systems')
        ->join('quizzes','systems.id','quizzes.system_id')
        ->where('quizzes.system_id',$system_id)
        ->paginate(5);

        return response()->json([
            'success' => true,
            'payload' => SystemsQuizzesResource::collection($quizzes_of_system)
        ]);
    }
}
