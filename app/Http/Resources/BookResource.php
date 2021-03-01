<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'isbn' => $this->id,
            'title' => $this->title,
            'cover'=> $this->cover,
            'authors'=> $this->author,
            ];
    }
}
