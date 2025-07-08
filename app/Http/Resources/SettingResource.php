<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'address'  => $this->address,
            'phone'    => $this->phone,
            'email'    => $this->email,
            'url_whatsapp'=> $this->url_whatsapp,
            'url_facebook'=> $this->url_facebook,
            'url_twitter' => $this->url_twitter,

            'icon' => $this->icon
                ? url('images/setting/'.$this->icon)
                : null,

                       ];



    }
}
