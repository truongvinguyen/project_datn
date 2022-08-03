<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name' => $this->category_name,
            'parent_id' => $this->parent_id,
            'parent_name' => $this->parentCategory?->category_name,
            'employee_id' => $this->employee_id,
            'employee_name' => $this->categoryCreator?->name,
            'slug' => $this->category_slug,
            'image' => $this->category_image,
            'description' => $this->category_description,
            'created_date' => $this->created_at?->format('d-m-Y'),
            'created_time' => $this->created_at?->format('d-m-Y'),
            'created_timezone' => $this->created_at?->format('T'),
            'updated_date' => $this->updated_at?->format('h:i:s'),
            'updated_time' => $this->updated_at?->format('h:i:s'),
            'updated_timezone' => $this->updated_at?->format('T'),
        ];
    }
}
