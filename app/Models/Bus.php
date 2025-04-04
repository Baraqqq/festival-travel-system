<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'festival_id',
        'capaciteit',
        'status',
        'breng_tijd',
        'ophaal_tijd',
        'ophaal_punt',
    ];

    // Voeg deze regel toe om datumvelden automatisch naar Carbon objecten te converteren
    protected $casts = [
        'breng_tijd' => 'datetime',
        'ophaal_tijd' => 'datetime',
    ];

    public function festival()
    {
        return $this->belongsTo(Festival::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}