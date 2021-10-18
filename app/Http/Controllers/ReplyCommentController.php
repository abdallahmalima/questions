<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReplyCommentRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ReplyCommentResource;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $reply=Reply::find($id);
        if(!$reply)   return  response()->noContent();
        return new ReplyCommentResource($reply->loadMissing(['user','question.user','comments.user'])->loadCount(['comments']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReplyCommentRequest $request,Reply $reply)
    {
        //
        $inputs=$request->all();
        $inputs['reply_id']=$reply->id;
        return new CommentResource($request->user()->comments()->create($inputs));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->noContent();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
    public function destroy($id)
    {
        //
        return response()->noContent();
    }
}
