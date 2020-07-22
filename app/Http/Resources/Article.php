<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
class Article extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->bodyl,
            'created_at' => $this->created_at,
            'user_id' => User::find($this->user_id),
            'category_id' => Category::find($this->category_id),
        ];
    }
}
