<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $province = null;
        $district = null;
        $commune = null;
        if($this->administrativeUnit && $this->administrativeUnit->level == 3) {
            $province =  $this->administrativeUnit->parent->parent;
            $district =  $this->administrativeUnit->parent;
            $commune =  $this->administrativeUnit;
        } else if($this->administrativeUnit && $this->administrativeUnit->level == 4) {
            $province =  $this->administrativeUnit->parent;
            $district =  $this->administrativeUnit;
        } else if($this->administrativeUnit && $this->administrativeUnit->level == 5) {
            $province =  $this->administrativeUnit;
        }
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'display_name' => $this->display_name,
            'birthdate' => $this->birthdate,
            'phone_number' => $this->phone_number,
            'avatar_url' => $this->avatar_url,
            'address_detail' => $this->address_detail,
            'hour_used' => $this->hour_used,
            'minute_used' => $this->minute_used,
            'email' => $this->user?->email,
            'province' => $province,
            'district' => $district,
            'commune' => $commune,
        ];
    }
}
