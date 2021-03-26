<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BalancePackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=> $this->id,
            'title'=> $this->title,
            'description'=> $this->description,
            'amount'=> $this->amount,
            'price'=> $this->price,
            'active'=> $this->active
            // 'created_at' =>  $this->created_at,
            // 'updated_at' =>  $this->updated_at
        ];    }
}
