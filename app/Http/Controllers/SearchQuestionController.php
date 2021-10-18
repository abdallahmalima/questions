<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class SearchQuestionController extends Controller
{
    public function search(Request $request){
        $questions=$request->whenFilled('keyword', fn(string $word)=>
         Question::where('title','like',"%{$word}%")->get()
         ,fn()=>  Question::all()
         );
 
         return  QuestionResource::collection($questions);
     }
}
