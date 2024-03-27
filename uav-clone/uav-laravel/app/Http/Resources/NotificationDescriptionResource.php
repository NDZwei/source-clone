<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationDescriptionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user' => $this->user ? new UserResource($this->user) : null,
            'notification_id' => $this->notification_id,
            'status' => $this->status,
            'error_message' => $this->error_message,
        ];
    }
}
