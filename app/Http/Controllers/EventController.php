<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Seat;
use App\Models\Favorite;
use App\Models\Theatre;
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

    public function indexEvent(Request $request)
    {


        // Получаем все события
        $events = Event::with('theatre', 'seats')->get();
        $minPrice = $request->has('min_price');
        $maxPrice = $request->has('maxPrice');
        // Фильтрация по городу и театру
        $cityId = $request->input('city_id', null);
        $theatreId = $request->input('theatre_id', null);

        if ($cityId) {
            $events = $events->filter(function($event) use ($cityId) {
                return $event->theatre->city === $cityId;
            });
        }

        if ($theatreId) {
            $events = $events->filter(function($event) use ($theatreId) {
                return $event->theatre->name === $theatreId;
            });
        }

        // Фильтрация по категории
        $category = $request->input('category', 'all');
        if ($category !== 'all') {
            $events = $events->filter(function($event) use ($category) {
                return $event->category === $category;
            });
        }

        // Фильтрация по цене
        if ($request->has('min_price')) {
            $minPrice = $request->min_price;
            $events = $events->filter(function($event) use ($request) {
                return $event->seats->min('price') >= $request->min_price;
            });
        }
          if ($request->has('max_price')) {
                        $max_price = $request->max_price;
$events = $events->filter(function($event) use ($request) {
                return $event->seats->min('price') <= $request->max_price;
            });

        }

         // Если цена не указана, используем максимальную цену для верхней границы и минимальную для нижней границы
         if (!$request->has('min_price') && !$request->has('max_price')) {
            $minPrice = $events->min('seats.price');
            $maxPrice = $events->max('seats.price');
        } elseif (!$request->has('min_price')) {
            $minPrice = $events->min('seats.price');
        } elseif (!$request->has('max_price')) {
            $maxPrice = $events->max('seats.price');
        }




        // Группировка событий по городам
        $uniqueCities = $events->groupBy('theatre.city')->map(function($group) {
            return $group->first()->theatre->city;
        })->toArray();

        // Группировка событий по театрам
        $uniqueTheatres = $events->groupBy('theatre.name')->map(function($group) {
            return $group->first()->theatre->name;
        })->toArray();

        // Группировка событий по категориям
        $uniqueCategories = $events->groupBy('category')->map(function($group) {
            return $group->first()->category;
        })->toArray();

        return view('afisha', compact('events', 'uniqueCities', 'uniqueTheatres', 'uniqueCategories', 'minPrice', 'maxPrice', 'cityId', 'category', 'theatreId'));
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
