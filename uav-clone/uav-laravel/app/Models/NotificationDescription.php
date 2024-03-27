<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationDescription extends Model
{
    use HasFactory;

    protected $table = 'notification_descriptions';

    protected $fillable = [
        'user_id', 'notification_id', 'status', 'error_message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function notification()
    {
        return $this->belongsTo(Notification::class, 'notification_id');
    }
}
