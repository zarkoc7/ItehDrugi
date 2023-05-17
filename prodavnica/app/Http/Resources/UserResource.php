<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='User';
    public function toArray($request)
    {
        return [
            'Id->'=>$this->resource->id,
            'Name->'=>$this->resource->name,
            'Email->'=>$this->resource->email,
            // 'Password->'=>$this->resource->password, za proveru logovanja
        ];
    }
}
