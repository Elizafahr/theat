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


    public function indexBooking($eventId)
    {

        // Получаем мероприятие по ID
        $event = Event::findOrFail($eventId);

        // return view('events.ticket-booking', [
        //     'event' => $event,
        //     'tickets' => $event->tickets()->get()
        // ]);
        return view('events.ticket-booking', [
            'event' => $event,
            'availableSeats' => $event->seats()->where('is_available', true)->get()
        ]);
    }


    // public function ticketBookingstore(Request $request)
    // {
    //     $eventId = $request->input('eventId');

    //     // Валидация входных данных
    //     $validatedData = $request->validate([
    //         'ticket_type' => 'required',
    //         'quantity' => 'required|numeric|min:1|max:' . $request->input('total_tickets'),
    //         'seats' => 'required|array',
    //     ]);

    //     // Получение информации о событии
    //     $event = Event::find($request->input('event_id'));

    //     if (!$event) {
    //         return redirect()->back()->with('error', 'Событие не найдено.');
    //     }

    //     // Проверка доступности мест
    //     $availableSeats = Seat::where('event_id', $event->id)
    //         ->whereIn('id', $validatedData['seats'])
    //         ->where('is_available', true)
    //         ->where('price', $validatedData['ticket_type'])
    //         ->get();

    //     if ($availableSeats->isEmpty()) {
    //         return redirect()->back()->with('error', 'Недостаточно доступных мест для выбранного типа билета.');
    //     }

    //     // Создание бронирования
    //     $booking = Booking::create([
    //         'event_id' => $event->id,
    //         'user_id' => 1, // Используйте auth()->id() вместо жестко закодированного ID пользователя
    //         "booking_date" => now(),
    //         "status" => "Ожидание",
    //         'total_price' => $validatedData['quantity'] * $availableSeats[0]->price,
    //         // 'seats' => json_encode(value: $validatedData['seats']),
    //     ]);
    //     dd($booking);
    //     // Обработка успешного бронирования
    //     // Здесь можно добавить логику для отправки подтверждения или перенаправления на страницу с результатом

    //     return redirect()->to('/event/' . $event->id . '/book')->with('success', 'Бронирование успешно оформлено!');
    // }


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

    public function cancelBooking($eventId, $bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        if ($booking->event_id !== $eventId) {
            abort(403, 'У вас нет разрешения на отмену этой бронирования.');
        }

        $booking->delete();

        // Восстанавливаем доступность мест
        $booking->tickets()->each(function ($ticket) {
            Seat::updateAvailability($ticket->seat_id, true);
        });

        session()->flash('success', 'Билеты успешно забронированы!');

        return redirect()->route('event.show', $eventId);    }
}
