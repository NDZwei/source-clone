<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckingLog extends Model
{
    use HasFactory;

    protected $table = 'checking_logs';

    protected $fillable = [
        'person_id', 'drone_id', 'checked_date', 'whole_airframe', 'propeller', 'flame',
        'communication_system', 'propulsion_system', 'power_system', 'automatic_control_system',
        'control_device', 'gps_gnss', 'remote_equipment', 'light', 'camera', 'verifier'
    ];

    protected $casts = [
        'checked_date' => 'datetime',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function drone()
    {
        return $this->belongsTo(Drone::class, 'drone_id');
    }
}
