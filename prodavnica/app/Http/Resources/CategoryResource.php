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
    public static $wrap='category';
    public function toArray($request)
    {
        return [
            'Id->'=>$this->resource->id,
            'Name->'=>$this->resource->name,
            'Description->'=>$this->resource->description
        ];
    }
}
