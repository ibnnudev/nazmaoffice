<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSylabus extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'title',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
