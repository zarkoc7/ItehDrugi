<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='product';
    public function toArray($request)
    {
        return [
            'Id->'=>$this->resource->id,
            'Product_Name->'=>$this->resource->product_name,
            'Description->'=>$this->resource->description,
            'Price->'=>$this->resource->price,
            'Manufacturer->'=>new ManufacturerResource($this->resource->manufacturer),
            'User->'=>new UserResource($this->resource->user)
        ];
    }
}
