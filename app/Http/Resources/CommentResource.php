<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'reply'=>new ReplyResource($this->whenLoaded($this->reply)),
            'likes'=>LikeResource::collection($this->whenLoaded($this->likes)),
            'dislikes'=>DislikeResource::collection($this->whenLoaded($this->dislikes)),
        ];
    }
}
