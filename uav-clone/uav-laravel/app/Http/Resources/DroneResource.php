<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'drone_type_id' => $this->drone_type_id,
            'drone_type' => $this->droneType ? new ParameterResource($this->droneType) : null,
            'airframe_id' => $this->airframe_id,
            'airframe' => $this->airframe ? new ParameterResource($this->airframe) : null,
            'manufacturer_id' => $this->manufacturer_id,
            'manufacturer' => $this->manufacturer ? new ParameterResource($this->manufacturer) : null,
            'name' => $this->name,
            'serial_number' => $this->serial_number,
            'registration_number' => $this->registration_number,
            'warranty_period' => $this->warranty_period,
            'hour_used' => $this->hour_used,
            'minute_used' => $this->minute_used,
            'image_url' => $this->image_url,
        ];
    }
}
