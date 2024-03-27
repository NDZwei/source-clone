<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'title', 'content', 'status', 'error_message'
    ];

    public function notifications()
    {
        return $this->hasMany(NotificationDescription::class);
    }
}
