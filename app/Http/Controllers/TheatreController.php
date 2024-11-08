<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Theatre;

class TheatreController extends Controller
{

    // Отображает список всех театров
    public function index()
    {
        $theatres = Theatre::all();
        return view('theatres', compact('theatres'));
    }

    // Отображает детальную информацию о конкретном театре и его предстоящих мероприятиях
    public function show($id)
    {
        $theatre = Theatre::findOrFail($id);

        // Получаем все предстоящие мероприятия этого театра, отсортированные по дате и времени начала
        $events = Event::where('theatre_id', $id)
            ->orderBy('start_date', 'asc')
            ->orderBy('start_time', 'asc')
            ->get();

        return view('theatre', compact('theatre', 'events'));
    }
}
