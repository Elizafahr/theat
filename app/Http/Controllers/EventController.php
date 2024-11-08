<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Seat;
use App\Models\Favorite;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //определенное мероприятие
    public function show($id)
    {
        $event = Event::find($id);


        $minPrice = Seat::where('event_id', $event->id)->min('price');
        $maxPrice = Seat::where('event_id', $event->id)->max('price');

        return view('events.event', compact('event', 'minPrice', 'maxPrice'));
    }

    //Отображает все события
    public function index()
    {
        $events = Event::all();
        $uniqueCategories = $events->pluck('category')->unique()->toArray();

        return view('afisha', compact('events', 'uniqueCategories'));
    }

    //Добавляет событие в избранное
    public function addToFavorites(Request $request)
    {
        $eventId = $request->route('eventId');

        // Проверяем, уже ли это мероприятие в избранном
        $favoriteExists = Favorite::where('event_id', $eventId)->where('user_id', auth()->id())->exists();

        if ($favoriteExists) {
        }

        // Добавляем новое избранное
        try {
            $favorite = Favorite::firstOrNew([
                'event_id' => $eventId,
                'user_id' => auth()->id(),
            ]);

            $favorite->save();


            session()->flash('success', 'Мероприятие успешно добавлено в список избранных.');

            return redirect()->route('home');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ошибка при добавлении в избранное: ' . $e->getMessage()], 500);
        }
    }

    //Удаляет событие из избранного.
    public function removeFromFavorites(Request $request)
    {
        $eventId = $request->route('eventId');

        $favorite = Favorite::where('event_id', $eventId)->where('user_id', auth()->id())->first();

        if (!$favorite) {
            abort(404, 'Мероприятие не находится в ваших избранных');
        }

        $favorite->delete();

        return redirect()->back()->with('message', 'Мероприятие успешно удалено из списка избранных');
    }
}
