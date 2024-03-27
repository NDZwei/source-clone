<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $table = 'parameters';

    protected $fillable = [
        'person_id', 'name', 'type', 'disabled'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
