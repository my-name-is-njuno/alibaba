<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Star extends JsonResource
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
            'note_id' =>$this->note_id,
            'user_id' => $this->user_id,
            'stars'=> $this->stars
        ];
    }
}
