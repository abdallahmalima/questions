<?php

namespace App\Http\Controllers;

use App\Http\Resources\DislikeResource;
use App\Models\Dislike;
use Illuminate\Http\Request;

class DislikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return DislikeResource::collection(Dislike::with(['user','comment'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return new DislikeResource($request->user()->create($request->except('user_id')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dislike $dislike)
    {
        //
        return new DislikeResource($dislike->loadMissing(['user','comment']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dislike $dislike)
    {
        //
        $dislike->update($request->except('user_id'));
        return new DislikeResource($dislike);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Dislike $dislike)
    {
        //
        $dislike->delete();
        return response()->noContent();
    }
}
