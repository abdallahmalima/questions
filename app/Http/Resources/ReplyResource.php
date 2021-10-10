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
            'user'=>new UserResource($this->whenLoaded($this->user)),
            'comments'=>CommentResource::collection($this->whenLoaded($this->comments)),
            'votes'=>VoteResource::collection($this->whenLoaded($this->votes)),
            'question'=>new QuestionResource($this->whenLoaded($this->question)),
        ];
    }
}
