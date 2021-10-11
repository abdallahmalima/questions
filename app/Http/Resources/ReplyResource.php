<?php

namespace App\Http\Resources;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'user_name'=>$this->user->name,
            'comments_count'=>$this->comments->count(),
            'votes_count'=>$this->votes()->count(),
            'question'=>new QuestionResource($this->whenLoaded('question')),
        ];
    }
}
