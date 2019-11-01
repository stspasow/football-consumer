<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Goal extends JsonResource
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
            'id' => $this->resource->GoalID,
            'goalgetterID' => $this->resource->GoalGetterID,
            'goalgetterName' => $this->resource->GoalGetterName,
        ];
    }
}
