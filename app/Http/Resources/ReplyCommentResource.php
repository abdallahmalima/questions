<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyCommentResource extends JsonResource
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
            'quetion_title'=>$this->question->title,
            'question_user_name'=>$this->question->user->name,
            'reply_title'=>$this->title,
            'reply_user_name'=>$this->user->name,
            'comments_count'=>(int)$this->comments_count,
            'comments'=>CommentResource::collection($this->whenLoaded('comments')),
        ];
    }
}
