<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Item;
use App\Leest;
use Illuminate\Http\Request;

class ItemController extends Controller
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
        $leest = $request->has('leest') ? Leest::find($request->get('leest')) : null;
        // If there's no leest, get the user's first leest or create one if he doesn't have any;
        if ($leest === null) {
            $leest = $user->leests()->first();
            if ($leest === null) {
                $leest = new Leest([
                    'title' => 'Todo',
                    'user_id' => $user->id,
                ]);
                $leest->save();
            }
        }
        // Create the item
        $item = new Item([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'order' => $request->has('order') ? $request->get('order') : null,
            'is_ordered' => $request->has('order'),
            'user_id' => $user->id,
            'leest_id' => $leest->id,
        ]);
        $item->save();
        return response()->json(['item' => $item], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
