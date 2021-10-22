<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PostResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'published' => $this->published,
            'date' => $this->date->format('d/m/Y'),
            'intro' => $this->intro,
            'text' => $this->text,
            'seo_title' => $this->seo_title,
            'seo_description' => $this->seo_description,
            'tags' => TagResource::collection($this->tags)
        ];
    }
}
