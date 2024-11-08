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

            <h2 class="mt-4 mb-3">Список бронирований:</h2>
            <ul class="list-group">
                @foreach ($bookings as $booking)
                <li class="list-group-item">{{ $booking->event->title }} -{{ $booking->id }} - {{ $booking->booking_date }}</li>
                @endforeach
            </ul>

            <h2 class="mt-4 mb-3">Избранные мероприятия:</h2>
            <ul class="list-group">
                @foreach ($favorites as $favorite)
                    <li class="list-group-item">{{ $favorite->event->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- Подключение Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
