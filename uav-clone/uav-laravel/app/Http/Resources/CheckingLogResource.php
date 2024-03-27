<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckingLogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'person_id' => $this->person_id,
            'person' => $this->person ? new PersonResource($this->person) : null,
            'drone_id' => $this->drone_id,
            'drone' => $this->drone ? new DroneResource($this->drone) : null,
            'checked_date' => $this->checked_date,
            'whole_airframe' => $this->whole_airframe,
            'propeller' => $this->propeller,
            'flame' => $this->flame,
            'communication_system' => $this->communication_system,
            'propulsion_system' => $this->propulsion_system,
            'power_system' => $this->power_system,
            'automatic_control_system' => $this->automatic_control_system,
            'control_device' => $this->control_device,
            'gps_gnss' => $this->gps_gnss,
            'remote_equipment' => $this->remote_equipment,
            'light' => $this->light,
            'camera' => $this->camera,
            'verifier' => $this->verifier,
        ];
    }
}
