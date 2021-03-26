<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'title'=> $this->title,
            'description'=> $this->description,
            'deep'=> $this->deep,
            'published'=> $this->published,
            'user_id'=> $this->user_id,
            'childrens' => self::collection($this->whenLoaded('childrens'))  ,
        ];
    }
}
