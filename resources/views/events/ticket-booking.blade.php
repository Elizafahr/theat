@include('blocks.header')

<link href="{{ asset('css/ticket-styles.css') }}" rel="stylesheet">

{{-- @include('blocks.header')
<link rel="stylesheet" href="{{ asset('css/event.css') }}">

<main>
    <section class="hero">
        <div class="container">
            <h1>{{ $event->title }}</h1>
            <div class="info">
                <div>
                    <p>Автор:</p>
                    <p><span>{{ $event->theatre->name }}</span></p>
                </div>

                <div>
                    <p>{{ $event->start_date }}</p>
                    <p> {{ $event->start_time }}</p>
                </div>
                <div>
                    <p>Место проведения:</p>
                    <p><span>{{ $event->theatre->address }}</span></p>
                </div>
            </div>


            <button class="btn ticket">Стоимость билетов: 400-600 ₽</button>
        </div>
    </section>

    <section class="description">
        <div class="container">
            <h2>Описание спектакля</h2>
            <p>{{ $event->description }}</p>
        </div>
    </section>

    <section class="team">
        <!-- Содержимое команды -->
    </section>

    <section class="actors">
        <div class="container">
            <h2>Действующие исполнители</h2>
        </div>
    </section>

    <section class="schedule">
        <div class="container">
            <div class="date">
                <img src="calendar.png" alt="Календарь">
                <p>{{ $event->start_date }} {{ $event->start_time }}</p>
            </div>
            <div class="time">
                <img src="clock.png" alt="Часы">
                <p>{{ $event->duration }} с {{ $event->interval_count }} антрактами</p>
            </div>
        </div>
    </section>

    <section class="tickets">
        <div class="container">
            <h2>Выберите количество билетов</h2>
            <form method="POST" action="{{ route('ticket.booking.store') }}">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <div class="price">
                    <p>400 ₽</p>
                    <p>Балкон</p>
                </div>
                <div class="price">
                    <p>400 ₽</p>
                    <p>Партер</p>
                </div>
                <select name="ticket_type" id="ticket-type">
                    <option value="">Выберите тип билета</option>
                    @foreach ($tickets as $ticket)
                        <option value="{{ $ticket->id }}">{{ $ticket->type }}</option>
                    @endforeach
                </select>
                <input type="number" name="quantity" min="1" max="{{ $totalTickets }}" placeholder="Количество">
                <button type="submit" class="btn">Купить билеты</button>
            </form>
        </div>
    </section>
</main>

@include('blocks.footer')
 --}}


 <section class="tickets">
    <div class="container">
        <h2>Бронирование билетов</h2>

        <form method="POST" action="{{ route('ticketBooking.store', ['eventId' => $event->id]) }}">
            @csrf

            <input type="text" name="event_id" value="{{ $event->id }}">

            <table class="ticket-table">
                <thead>
                    <tr>
                        <th>Зона</th>
                        <th>Цена</th>
                        <th>Ряд</th>
                        <th>Место</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($availableSeats as $seat)
                        <tr>
                            <td>{{ $seat->section }}</td>
                            <td>{{ $seat->price }} ₽</td>
                            <td>{{ $seat->row }}</td>
                            <td>{{ $seat->seat_number }}</td>
                            <td>
                                <label>
                                    <input type="checkbox" name="seats[]" value="{{ $seat->id }}" />
                                    Бронировать место
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Продолжить бронирование</button>
        </form>
    </div>
</section>

{{--
 <h2>1 вариант</h2>

     <section class="tickets">
        <div class="container">
            <h2>Бронирование билетов</h2>

            <form method="POST" action="{{ route('ticketBookingstore', [$event]) }}">
                @csrf

                <input type="hidden" name="event_id" value="{{ $event->id }}">

                <div class="ticket-types">
                    @foreach($availableSeats as $seat)
                        <div class="price">
                            <p>{{ $seat->price }} ₽</p>
                            <p>{{ $seat->section }}</p>
                            <p>{{ $seat->row }}</p>
                            <p>{{ $seat->seat_number }}</p>
                        </div>
                        <label>
                            <input type="checkbox" name="seats[]" value="{{ $seat->id }}" />
                            Бронировать место
                        </label>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Продолжить бронирование</button>
            </form>
        </div>
    </section>


    <h2>2 вариант</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Выбор мест</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('ticketBookingstore', [$event]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="ticket_type">Тип билета:</label>
                                <select id="ticket_type" name="ticket_type" class="form-control">
                                    @foreach ($availableSeats as $seat)
                                        <option value="{{ $seat->price }}">{{ $seat->price }} руб.</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Количество:</label>
                                <input type="number" id="quantity" name="quantity" min="1" max="{{ count($availableSeats) }}" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Забронировать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
