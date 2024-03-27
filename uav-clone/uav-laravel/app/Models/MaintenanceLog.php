<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceLog extends Model
{
    use HasFactory;

    protected $table = 'maintenance_logs';

    protected $fillable = [
        'person_id', 'drone_id', 'maintenance_place_id', 'repair_date', 'category_repair', 'content_repair',
        'reason_repair', 'anomaly_report', 'maintenance_place_detail', 'confirmer', 'remarks'
    ];

    protected $casts = [
        'repair_date' => 'datetime',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function drone()
    {
        return $this->belongsTo(Drone::class, 'drone_id');
    }

    public function maintenancePlace()
    {
        return $this->belongsTo(AdministrativeUnit::class, 'maintenance_place_id');
    }

    public function getMaintenancePlaceDetailAttribute()
    {
        $result = $this->maintenance_place_detail;
        if($this->maintenancePlace) {
            $commune = $this->maintenancePlace;
            $result.', '.$commune->name;
            if($commune->parent) {
                $district = $commune->parent;
                $result.', '.$district->name;
                if($district->parent) {
                    $province = $district->parent;
                    $result.', '.$province->name;
                }
            }
        }
        return $this->result;
    }
}
