<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MailDescriptionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user' => $this->user ? new UserResource($this->user) : null,
            'mail_send_id' => $this->mail_send_id,
            'email' => $this->email,
            'status' => $this->status,
            'error_message' => $this->error_message,
        ];
    }
}
