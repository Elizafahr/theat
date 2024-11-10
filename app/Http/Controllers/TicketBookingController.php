<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Theatre;
use App\Models\Ticket;
use App\Models\Seat;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;



class TicketBookingController  extends Controller
{

    // Отображает страницу бронирования билетов для конкретного мероприятия
    public function indexBooking($eventId)
    {
        // Получаем мероприятие по ID
        $event = Event::findOrFail($eventId);

        return view('events.ticket-booking', [
            'event' => $event,
            'availableSeats' => $event->seats()->where('is_available', true)->get()
        ]);
    }


    // Сохраняет бронирование билетов
    public function store(Request $request, $eventId)
    {
        $validatedData = $request->validate([
            'seats.*' => 'required|exists:seats,id',
        ]);

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'event_id' => $eventId,
            'total_price' => array_sum(array_column($validatedData['seats'], 'price')),
        ]);

        foreach ($validatedData['seats'] as $seatId) {
            Seat::updateAvailability($seatId, false);

            Ticket::create([
                'booking_id' => $booking->id,
                'seat_id' => $seatId,
                'is_used' => false,
            ]);
        }

        return redirect()->route('event.show', $eventId)->with('success', 'Билеты успешно забронированы!');
    }

    // Отменяет бронирование билетов
    public function cancelBooking($eventId, $bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        if ($booking->event_id != $eventId) {
            abort(403, $eventId .$booking->event_id. $bookingId);
        }

        $booking->delete();

        // Восстанавливаем доступность мест
        $booking->tickets()->each(function ($ticket) {
            Seat::updateAvailability($ticket->seat_id, true);
        });

        session()->flash('success', 'Билеты успешно забронированы!');

        return redirect()->route('event.show', $eventId);
    }
}
