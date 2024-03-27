<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaintenanceLogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'person_id' => $this->person_id,
            'person' => $this->person ? new PersonResource($this->person) : null,
            'drone_id' => $this->drone_id,
            'drone' => $this->drone ? new DroneResource($this->drone) : null,
            'maintenance_place_id' => $this->maintenance_place_id,
            'maintenance_place' => $this->maintenancePlace ? new AdministrativeResource($this->maintenancePlace) : null,
            'repair_date' => $this->pair_date,
            'category_repair' => $this->category_repair,
            'content_repair' => $this->content_repair,
            'reason_repair' => $this->reason_repair,
            'anomaly_report' => $this->anomaly_report,
            'maintenance_place_detail' => $this->maintenance_place_detail,
            'confirmer' => $this->confirmer,
            'remarks' => $this->remarks,
        ];
    }
}
