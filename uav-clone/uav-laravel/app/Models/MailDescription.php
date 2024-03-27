<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailDescription extends Model
{
    use HasFactory;
    protected $table = 'mail_descriptions';

    protected $fillable = [
        'user_id', 'mail_send_id', 'email', 'status', 'error_message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mailSend()
    {
        return $this->belongsTo(MailSend::class, 'mail_send_id');
    }
}
