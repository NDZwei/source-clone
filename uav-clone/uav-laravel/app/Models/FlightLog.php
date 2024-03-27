<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightLog extends Model
{
    use HasFactory;

    protected $table = 'flight_logs';

    protected $fillable = [
        'person_id', 'drone_id', 'flight_purpose_id', 'flight_method_id', 'no_fly_zone_method_id',
        'takeoff_location_id', 'landing_place_id', 'flight_date', 'flight_path', 'takeoff_location_detail',
        'takeoff_time', 'landing_place_detail', 'landing_time', 'flight_time', 'remarks'
    ];

    protected $casts = [
        'takeoff_time' => 'datetime',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function drone()
    {
        return $this->belongsTo(Drone::class, 'drone_id');
    }

    public function flightPurpose()
    {
        return $this->belongsTo(Parameter::class, 'flight_purpose_id');
    }

    public function flightMethod()
    {
        return $this->belongsTo(Parameter::class, 'flight_method_id');
    }

    public function noFlyZoneMethod()
    {
        return $this->belongsTo(Parameter::class, 'no_fly_zone_method_id');
    }

    public function takeOffLocation()
    {
        return $this->belongsTo(AdministrativeUnit::class, 'takeoff_location_id');
    }

    public function landingPlace()
    {
        return $this->belongsTo(AdministrativeUnit::class, 'landing_place_id');
    }

    public function getTakeoffLocationDetailAttribute()
    {
        $result = $this->takeoff_location_detail;
        if($this->takeOffLocation) {
            $commune = $this->takeOffLocation;
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

    public function getLandingPlaceAttribute()
    {
        $result = $this->landing_place_detail;
        if($this->landingPlace) {
            $commune = $this->landingPlace;
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
