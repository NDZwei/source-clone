<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailSend extends Model
{
    use HasFactory;

    protected $table = 'mail_sends';

    protected $fillable = [
        'title', 'content', 'status', 'error_message'
    ];

    public function mails()
    {
        return $this->hasMany(MailDescription::class);
    }
}
