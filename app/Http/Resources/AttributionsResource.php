<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $customer = new CustomersResource($this->customer);

        return [
            'id' => $this->id,
            'timetable' => $this->timetable,
            //'name' => $this->name,
            'dated' => $this->dated,
            'customer' => $customer,
        ];
    }
}
