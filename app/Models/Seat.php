<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'event_id',
    //     'row',
    //     'seat_number',
    //     'price',
    //     'is_available',
    // ];

    protected $fillable = [
        'event_id', 'row', 'seat_number', 'price', 'is_available'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function booking()
    {
        return $this->hasOne(Ticket::class);
    }

      //метод для изменения статуса is_available
      public static function updateAvailability($seatId, $newStatus)
      {
          return self::find($seatId)->update(['is_available' => $newStatus]);
      }
}
