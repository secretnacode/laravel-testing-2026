<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // uses TestResource::collection because this author can have a multiple value of posts
        // in short it has a multiple post value that is connected in a single user(as its indicated in the TestModel in the User Method)
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "posts" => TestResource::collection($this->whenLoaded("TestModel"))
        ];
    }
}
