<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDislikeRequest;
use App\Http\Resources\DislikeResource;
use App\Models\Dislike;
use App\Models\Like;
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
    public function store(StoreDislikeRequest $request)
    {
        //
        $like=Like::whereUserIdAndCommentId($request->user()->id,$request->comment_id)->first();
        if($like) $like->delete();
        return new DislikeResource($request->user()->dislikes()->create($request->except('user_id')));
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
        return response()->noContent();
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
