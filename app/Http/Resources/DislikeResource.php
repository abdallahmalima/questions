<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DislikeResource extends JsonResource
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
            'user'=>new UserResource($this->whenLoaded($this->user)),
            'comment'=>new CommentResource($this->whenLoaded($this->comment))
        ];
    }
}
