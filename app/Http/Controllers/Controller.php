<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Event;
use App\Models\News;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        // Получение данных из базы данных
        $event = Event::inRandomOrder()->first(); // Выбираем рандомное событие
        $newsItems = News::orderBy('published_date', 'desc')->limit(2)->get();
        $allEvents = Event::all(); // Получаем все события

        return view('home', [
            'event' => $event, // Передача данных о текущем событии
            'news' => $newsItems, // Передача данных о последних новостях 
            'allEvents' => $allEvents
        ]);
    }
}
