<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
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
            'name' => $this->name,
            'age' => $this->age,
            'description' => $this->description,
            'image' => $this->image,
            'price' => $this->price,
            'type' => $this->whenLoaded('type', function () {
                return $this->type;
            }),
            'breed' => $this->whenLoaded('breed', function () {
                return $this->breed;
            }),
            'is_sold' => $this->is_sold,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
        ];
    }
}
