<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this ->id,
            'type' => $this ->type,
            'dateTime' => $this -> dateTime,
            'battery' => $this -> battery,
            'user_id' => $this -> user_id,
        ];
    }
}
