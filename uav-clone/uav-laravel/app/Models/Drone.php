<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Drone extends Model
{
    use HasFactory;

    protected $table = 'drones';

    protected $fillable = [
        'drone_type_id', 'airframe_id', 'manufacturer_id', 'name', 'serial_number',
        'registration_number', 'warranty_period', 'hour_used', 'minute_used', 'image_url'
    ];

    protected $casts = [
        'warranty_period' => 'datetime',
    ];

    public function droneType()
    {
        return $this->belongsTo(Parameter::class, 'drone_type_id');
    }

    public function airframe()
    {
        return $this->belongsTo(Parameter::class, 'airframe_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Parameter::class, 'manufacturer_id');
    }

    public function persons()
    {
        return $this->belongsToMany(Person::class, 'persons_drones');
    }

    public function getImageUrlAttribute($value)
    {
        if ($value) {
            $urlSlashToDot = str_replace("/", ".", $value);
            $avatarUrl = 'images/drones/' .$this->getKey().'/';
            $avatarUrl = $avatarUrl . $urlSlashToDot;
            if (Storage::disk('public')->exists($avatarUrl)) {
                return url('storage/' . $avatarUrl);
            }
        }
        return null;
    }
}
