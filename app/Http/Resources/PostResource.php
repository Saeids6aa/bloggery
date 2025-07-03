<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'title'    => $this->title,
          
            'description'  => $this->description,
            'image' => $this->image
                ? url('images/posts/image/' . $this->image)
                : null,

            'admin'    => [
                'id'   => $this->admin->id ?? null,
                'name' => $this->admin->admin_name ?? null,
            ],
            'category' => [
                'id'   => $this->category->id ?? null,
                'name' => $this->category->name ?? null,
            ],
            'tags'     => $this->tags->pluck('name'),
        ];
    }
}
