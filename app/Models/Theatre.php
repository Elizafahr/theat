<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'content',
        'image',
        'published_date',
        'user_id',
        'theatre_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function theatre()
    {
        return $this->belongsTo(Theatre::class)->nullable();
    }
}