<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Theatre;

class TheatreController extends Controller
{


    public function index()
    {
        $theatres = Theatre::all();
        return view('theatres', compact('theatres'));
    }

    public function show($id)
    {
        $theatre = Theatre::findOrFail($id);


        $events = Event::where('theatre_id', $id)->orderBy('start_date', 'asc')->orderBy('start_time', 'asc')->get();

         return view('theatre', compact('theatre', 'events'));

    }

}
