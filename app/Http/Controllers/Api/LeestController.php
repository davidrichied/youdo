<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Leest;
use Illuminate\Http\Request;

class LeestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $leest = new Leest([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'order' => $request->has('order') ? $request->get('order') : null,
            'is_ordered' => $request->has('order'),
            'user_id' => $user->id,
        ]);
        return response()->json(['leest' => $leest], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leest  $leest
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Leest $leest)
    {
        $leest->loadMissing('items');
        return response()->json(['leest' => $leest]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leest  $leest
     * @return \Illuminate\Http\Response
     */
    public function edit(Leest $leest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leest  $leest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leest $leest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leest  $leest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leest $leest)
    {
        //
    }
}
