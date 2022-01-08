<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        // return parent::toArray($request); // Default

        // Custom
        return [
            'subject' => $this->subject->name,
            'title' => $this->title,
            'body' => $this->body,
            'username' => $this->user->name,
            'published' => $this->updated_at->format('d F Y')
        ];
    }

    public function with($request)
    {
        return [
            'status' => 'success'
        ];
    }
}
