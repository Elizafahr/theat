<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Theatre;
use App\Models\Booking;

class AdminController extends Controller
{
    // Выводит список новостей на главную страницу админ-панели
    public function index()
    {
        $news = News::latest()->paginate(10);
        $theatres = Theatre::all();
        $bookings = Booking::where('status', 'Ожидание')->get();

        return view('admin.index', compact('news', 'theatres', 'bookings'));
    }

    // Выводит список всех новостей
    public function newsIndex()
    {
        $news = News::all();
        return view('admin.news', compact('news'));
    }

    // Выводит список всех театров
    public function theatreIndex()
    {
        $theatres = Theatre::all();
        return view('admin.theatre', compact('theatres'));
    }

    // Выводит список всех бронирований
    public function bookingIndex()
    {
        $bookings = Booking::all();
        return view('admin.book', compact('bookings'));
    }

    // Подтверждает бронирование
    public function approveBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'Подтверждено']);
        return redirect()->back()->with('success', 'Бронирование подтверждено');
    }

    // Отменяет бронирование
    public function rejectBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'Отменено']);
        return redirect()->back()->with('success', 'Бронирование отменено');
    }

    // Удаляет новость
    public function destroyNews($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Новость была успешно удалена.');
    }

    // Удаляет театр
    public function destroyTheatre($id)
    {
        $theatre = Theatre::findOrFail($id);
        $theatre->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Театр был успешно удален.');
    }

    // Создает новую новость
    public function createNews()
    {
        return view('admin.create-news');
    }

    // Сохраняет новую новость
    public function storeNews(Request $request)
    {
        $validatedData = $request->validate([


        ]);

        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'published_date' => now(),
            'user_id' => auth()->id(),
        ]);


        return redirect()->route('admin.dashboard')->with('success', 'Новость успешно добавлена');
    }


    public function editNews($id)
{
    $news = News::findOrFail($id);
    return view('admin.edit-news', compact('news'));
}


public function updateNews(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string|max:1000',
     ]);

    $news = News::findOrFail($id);
    $news->update($validatedData);

    return redirect()->route('admin.dashboard')->with('success', 'Новость успешно обновлена');
}

    // Создает новый театр
    public function createTheatre()
    {
        return view('admin.create-theatre');
    }

    // Сохраняет новый театр
    public function storeTheatre(Request $request)
    {
        $data = $request->only(['name', 'address', 'phone', 'website', 'description']);

        if (empty($data)) {
            return redirect()->back()->withErrors(['Все поля обязательны'])->withInput();
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'city' => 'nullable|string|max:50',
        ]);

        Theatre::create($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Театр успешно добавлен');
    }

    // Отображает форму редактирования театра
    public function editTheatre($id)
    {
        $theatre = Theatre::findOrFail($id);
        return view('admin.edit-theatre', compact('theatre'));
    }

    // Обновляет существующий театр
    public function updateTheatre(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
         ]);

        $theatre = Theatre::findOrFail($id);
        $theatre->update($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Театр успешно обновлен');
    }


    // Создает новое бронирование
    public function createBooking()
    {
        return view('admin.create-booking');
    }

    // Сохраняет новое бронирование
    public function storeBooking(Request $request)
    {
        // Здесь нужно добавить логику сохранения нового бронирования
        // Например:
        // $validatedData = $request->validate([
        //     'event_id' => 'required|exists:events,id',
        //     'date' => 'required|date',
        // ]);
        //
        // Booking::create($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Бронирование успешно добавлено');
    }

    // Отображает форму редактирования бронирования
    public function editBooking($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.edit-booking', compact('booking'));
    }

    // Обновляет существующее бронирование
    public function updateBooking(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Бронирование успешно обновлено');
    }
}
