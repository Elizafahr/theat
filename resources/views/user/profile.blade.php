@include('blocks.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-4">
    <h1 class="text-center mb-4">Профиль пользователя</h1>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">Информация о пользователе:</div>
                <div class="card-body">
                    <p>Имя: {{ $user->first_name }} {{ $user->last_name }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <p>Роль: {{ $user->role }}</p>
                    <p>Телефон: {{ $user->phone }}</p>
                </div>
            </div>

                 <div class="card mt-5">
                    <div class="card-header bg-primary text-white">
                         Список бронирований
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Название мероприятия</th>
                                    <th>Дата бронирования</th>
                                    <th>Статус</th>
                                    <th>Цена</th>
                                    <th>Количество билетов</th>
                                    <th>Действия</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->event->title }}</td>
                                        <td>{{ $booking->booking_date }}</td>
                                        <td>{{ $booking->status }}</td>
                                        <td>{{ $booking->total_price }}</td>
                                        <td>({{ count($booking->tickets) }})</td>
                                        <td>
                                            <form action="{{ route('ticketBooking.cancel', [$booking->event_id, $booking->id]) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-danger">Отменить бронирование</button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            <h2 class="mt-4 mb-3">Избранные мероприятия:</h2>
            <ul class="list-group">
                @foreach ($favorites as $favorite)
                    <li class="list-group-item">{{ $favorite->event->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
