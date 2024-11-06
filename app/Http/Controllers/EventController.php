<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Seat;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show($id)
    {
        $event = Event::find($id);


        $minPrice = Seat::where('event_id', $event->id)->min('price');
        $maxPrice = Seat::where('event_id', $event->id)->max('price');

        return view('events.event', compact('event', 'minPrice', 'maxPrice'));
    }

    public function index()
    {
        $events = Event::all();

        return view('afisha', compact('events'));
    }
}
