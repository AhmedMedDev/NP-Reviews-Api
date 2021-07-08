<?php

namespace App\Http\Controllers;

use App\Http\Requests\System\StoreSystemRequest;
use App\Http\Requests\System\UpdateSystemRequest;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = System::get();

        return response()->json($systems, 200);
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
            'message' => 'success',
            'data' => $system
        ], 200);
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
            'message' => 'success',
            'data' => $system
        ], 200);
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
            'message' => 'success',
        ], 200);
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
            'message' => 'success',
        ], 200);
    }
}
