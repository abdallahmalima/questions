<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionReplyRequest;
use App\Http\Resources\QuestionReplyResource;
use App\Http\Resources\ReplyResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return new QuestionReplyResource($question->loadMissing(['user','replies.user','replies.comments'])->loadCount(['replies']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionReplyRequest $request,Question $question)
    {
        //
       $inputs=$request->all();
       $inputs['question_id']=$question->id;
       $reply=$request->user()->replies()->create($inputs);
       if($request->hasFile('image')){
        $reply->image()->create(['url'=>$request->file('image')->store('images','public')]); 
       }
        return new ReplyResource($reply);
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
