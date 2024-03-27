<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightLogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'person_id' => $this->person_id,
            'person' => $this->person ? new PersonResource($this->person) : null,
            'drone_id' => $this->drone_id,
            'drone' => $this->drone ? new DroneResource($this->drone) : null,
            'flight_purpose_id' => $this->flight_purpose_id,
            'flight_purpose' => $this->flightPurpose ? new ParameterResource($this->flightPurpose) : null,
            'flight_method_id' => $this->flight_method_id,
            'flight_method' => $this->flightMethod ? new ParameterResource($this->flightMethod) : null,
            'no_fly_zone_method_id' => $this->no_fly_zone_method_id,
            'no_fly_zone_method' => $this->noFlyZoneMethod ? new ParameterResource($this->noFlyZoneMethod) : null,
            'takeoff_location_id' => $this->takeoff_location_id,
            'takeoff_location' => $this->takeOffLocation ? new AdministrativeResource($this->takeOffLocation) : null,
            'landing_place_id' => $this->landing_place_id,
            'landing_place' => $this->landingPlace ? new AdministrativeResource($this->landingPlace) : null,
            'flight_date' => $this->flight_date,
            'flight_path' => $this->flight_path,
            'takeoff_location_detail' => $this->takeoff_location_detail,
            'takeoff_time' => $this->takeoff_time,
            'landing_place_detail' => $this->landing_place_detail,
            'landing_time' => $this->landing_time,
            'flight_time' => $this->flight_time,
            'remarks' => $this->remarks,
        ];
    }
}
