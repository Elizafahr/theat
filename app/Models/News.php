<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class News extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'content',
        'image',
        'published_date',
        'user_id',
        'theatre_id'
    ];


    protected $casts = [
        'published_date' => 'datetime',
    ];

    public function theatre()
    {
        return $this->belongsTo(Theatre::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
