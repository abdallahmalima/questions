<?php

namespace App\Http\Controllers;

use App\Http\Resources\LikeResource;
use App\Models\Dislike;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return LikeResource::collection(Like::with(['user','comment'])->get());
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
        $dislike=Dislike::whereUserIdAndCommentId($request->user()->id,$request->comment_id)->first();
        if($dislike)  $dislike->delete();
       
        return new LikeResource($request->user()->likes()->firstOrCreate($request->except('user_id')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
        return new LikeResource($like->loadMissing(['user','comment']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
        $like->update($request->except('user_id'));
        return new LikeResource($like);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
        $like->delete();
        return response()->noContent();
    }
}
