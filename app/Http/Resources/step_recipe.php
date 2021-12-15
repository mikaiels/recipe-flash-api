<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class step_recipe extends JsonResource
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
            'recipe_id' => $this->recipe_id,
            'step_number' => $this->step_number,
            'description' => $this->description,
            'timer' => $this->timer,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
