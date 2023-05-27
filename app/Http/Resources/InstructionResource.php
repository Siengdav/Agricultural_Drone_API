<?php

namespace App\Http\Resources;

use App\Models\Drone;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructionResource extends JsonResource
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
            'drone_id' => $this->drone_id,
            'plan_id' => $this->plan_id,
            'drone' => $this->drone,
        ];
    }
}
