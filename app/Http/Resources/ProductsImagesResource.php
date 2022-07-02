<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->file_name,
            'size'=>$this->size,
            'path'=>$this->original_url,
            'url'=>'storage/'.$this->id.'/'.$this->file_name,
        ];
    }
}
