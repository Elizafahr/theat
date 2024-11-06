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


    public function ticketBookingstore(Request $request)
    {
        $eventId = $request->input('eventId');

        // Валидация входных данных
        $validatedData = $request->validate([
            'ticket_type' => 'required',
            'quantity' => 'required|numeric|min:1|max:' . $request->input('total_tickets'),
            'seats' => 'required|array',
        ]);

        // Получение информации о событии
        $event = Event::find($request->input('event_id'));

        if (!$event) {
            return redirect()->back()->with('error', 'Событие не найдено.');
        }

        // Проверка доступности мест
        $availableSeats = Seat::where('event_id', $event->id)
            ->whereIn('id', $validatedData['seats'])
            ->where('is_available', true)
            ->where('price', $validatedData['ticket_type'])
            ->get();

        if ($availableSeats->isEmpty()) {
            return redirect()->back()->with('error', 'Недостаточно доступных мест для выбранного типа билета.');
        }

        // Создание бронирования
        $booking = Booking::create([
            'event_id' => $event->id,
            'user_id' => 1, // Используйте auth()->id() вместо жестко закодированного ID пользователя
            "booking_date" => now(),
            "status" => "Ожидание",
            'total_price' => $validatedData['quantity'] * $availableSeats[0]->price,
            // 'seats' => json_encode(value: $validatedData['seats']),
        ]);
        dd($booking);
        // Обработка успешного бронирования
        // Здесь можно добавить логику для отправки подтверждения или перенаправления на страницу с результатом

        return redirect()->to('/event/' . $event->id . '/book')->with('success', 'Бронирование успешно оформлено!');
    }
}
