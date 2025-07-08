<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class About_usResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
return [
        'id' => $this->id,
        'descrption' => $this->descrption,
        'image' => $this->image
                ? url('images/about/'.$this->image)
                : null,

                       ];    }
}
