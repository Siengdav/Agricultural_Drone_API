<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class ShowMapResource extends JsonResource
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
            'province' => $this ->province,
            'image' => $this ->image,
            'drone_id' => $this -> drone_id,
            'farm_id' => $this -> farm_id
        ];
    }
}
