<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //this uses a new UserResource because you can only have a single author in per post(all the entity was base on the posting value just like posting in facebook) 
        // in short, it has only one connect the the user model(as its indicated in the author method in the testModel)
        return [
            "id" => $this->id,
            "title" => $this->title,
            "body" => $this->body,
            "created_at" => $this->created_at->format('Y-m-d H-m-s'),
            "updated_at" => $this->updated_at->format('Y-m-d H-m-s'),
            "author" => new UserResource($this->whenLoaded('author')),
        ];
    }
}
