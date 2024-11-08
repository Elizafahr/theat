<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Theatre;
use App\Models\Booking;

class AdminController extends Controller
{
    public function index()
{

    $news = News::latest()->paginate(10);
    $theatres = Theatre::all();
    $bookings = Booking::where('status', 'Ожидание')->get();

    return view('admin.index', compact('news', 'theatres', 'bookings'));
}


    public function newsIndex()
    {
        $news = News::all();
        return view('admin.news', compact('news'));
    }

    public function theatreIndex()
    {
        $theatres = Theatre::all();
        return view('admin.theatre', compact('theatres'));
    }

    public function bookingIndex()
    {
        $bookings = Booking::all();
        return view('admin.book', compact('bookings'));
    }

    public function approveBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'Подтверждено']);
        return redirect()->back()->with('success', 'Бронирование подтверждено');
    }

    public function rejectBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'Отменено']);
        return redirect()->back()->with('success', 'Бронирование отменено');
    }
    public function destroyNews($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Новость была успешно удалена.');
    }
    public function destroyTheatre($id)
    {
        $theatre = Theatre::findOrFail($id);
        $theatre->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Театр был успешно удален.');
    }
}
