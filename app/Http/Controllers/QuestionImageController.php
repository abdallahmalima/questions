<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionImageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,Question $question)
    {
       
        $url=$question->image->url??null;
        if(!$url){
            return response(null,204);
        }
        
        return response()->download($url);
    }
}
