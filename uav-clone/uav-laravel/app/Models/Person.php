<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'user_id', 'administrative_unit_id', 'display_name', 'birthdate',
        'phone_number', 'avatar_url', 'address_detail', 'hour_used', 'minute_used'
    ];

    protected $casts = [
        'birthdate' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function administrativeUnit()
    {
        return $this->belongsTo(AdministrativeUnit::class);
    }

    public function drones()
    {
        return $this->belongsToMany(Drone::class, 'persons_drones');
    }

    public function getAvatarUrlAttribute($value)
    {
        if ($value) {
            $urlSlashToDot = str_replace("/", ".", $value);
            $avatarUrl = 'images/persons/' .$this->getKey().'/';
            $avatarUrl = $avatarUrl . $urlSlashToDot;
            if (Storage::disk('public')->exists($avatarUrl)) {
                return url('storage/' . $avatarUrl);
            }
        }
        return null;
    }

    public function getAddressDetailAttribute()
    {
        $result = $this->getAttribute('address_detail');
        if($this->administrativeUnit) {
            $commune = $this->administrativeUnit;
            $result .= ', ' . $commune->name;
            if($commune->parent) {
                $district = $commune->parent;
                $result .= ', ' . $district->name;
                if($district->parent) {
                    $province = $district->parent;
                    $result .= ', ' . $province->name;
                }
            }
        }
        return $result;
    }
}
