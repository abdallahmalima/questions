<?php

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');

Route::group(['middleware'=>'auth:sanctum','prefix'=>'v1'],function(){
    Route::get('/user', function (Request $request) {
        return response(['user'=>$request->user()],200);
    });
    Route::get('questions/search',[App\Http\Controllers\SearchQuestionController::class,'search']);
    Route::apiResource('questions',App\Http\Controllers\QuestionController::class);
    Route::apiResource('replies',App\Http\Controllers\ReplyController::class)->except('store');
    Route::apiResource('votes',App\Http\Controllers\VoteController::class);
    Route::apiResource('comments',App\Http\Controllers\CommentController::class);
    Route::apiResource('likes',App\Http\Controllers\LikeController::class);
    Route::apiResource('dislikes',App\Http\Controllers\DislikeController::class);
    Route::apiResource('questions/{question}/replies',App\Http\Controllers\QuestionReplyController::class);
    Route::apiResource('replies/{reply}/comments',App\Http\Controllers\ReplyCommentController::class);
});