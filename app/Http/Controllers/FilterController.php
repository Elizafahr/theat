<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theatre;
use App\Models\Event;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        $events = Event::query();

        // Фильтрация по категории
        $category = $request->input('category', null);
        if ($category !== 'all') {
            $events->whereHas('category', function($q) use ($category) {
                $q->where('name', $category);
            });
        }

        // Фильтрация по городу
        $cityId = $request->input('city_id');
        if ($cityId) {
            $events->whereHas('theatre', function($q) use ($cityId) {
                $q->where('city', $cityId);
            });
        }

        // Фильтрация по театру
        $theatreId = $request->input('theatre_id');
        if ($theatreId) {
            $events->where('theatre_id', $theatreId);
        }

        // Фильтрация по цене
        if ($request->has('min_price') && $request->has('max_price')) {
            $events->whereBetween('seats.price', [$request->input('min_price'), $request->input('max_price')]);
        }

        return view('afisha', compact('events'));
    }

}
