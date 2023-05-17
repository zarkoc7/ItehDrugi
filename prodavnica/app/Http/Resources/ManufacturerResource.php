<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ManufacturerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='manufacturer';
    public function toArray($request)
    {
        return [
            'Id->'=>$this->resource->id,
            'Name->'=>$this->resource->name,
            'Country->'=>$this->resource->country,
            'Category->'=>new CategoryResource($this->resource->category)
        ];

    }
}
