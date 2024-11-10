<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'price_min',
        'price_max',
        'theatre_id'
    ];


    public function theatre()
    {
        return $this->belongsTo(Theatre::class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function getCityAttribute($value)
    {
        return $this->theatre->city;
    }

    public function getTheatreNameAttribute()
    {
        return $this->theatre->name;
    }
}
