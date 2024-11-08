    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('blocks.header')
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


                <button class="btn ticket"> Стоимость билетов: {{ $minPrice }} - {{ $maxPrice }} ₽</button>
            </div>
        </section>

        @if (session('success'))
            <div id="successMessage" class="alert alert-success mt-5 position-fixed top-0 end-50 p-3">
                {{ session('success') }}</div>
        @endif

        <section class="description">
            <div class="container">
                <h2>Описание спектакля</h2>
                <p>{{ $event->description }}</p>
            </div>
        </section>

        <section class="team">
            <div class="container">
                <h2>Постановочная группа</h2>
                <div class="row">
                    <div class="col">
                        <p>Режиссер-постановщик</p>
                        <p>Инна Хачатурова</p>
                    </div>
                    <div class="col">
                        <p>Донна Лоция</p>
                        <p>Заслуженная артистка РФ</p>
                        <p>Ирина Комленко</p>
                    </div>
                    <div class="col">
                        <p>Полковник Чесней</p>
                        <p>Заслуженный артист РФ</p>
                        <p>Алим Абальмасов</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Балетмейстер-постановщик</p>
                        <p>Дмитрий Ремуков</p>
                    </div>
                    <div class="col">
                        <p>Элла</p>
                        <p>Почетный деятель искусств СК</p>
                        <p>Юлия Сивкова</p>
                    </div>
                    <div class="col">
                        <p>Эни</p>
                        <p>Оксана Филиппилова</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>За дирижерским пультом</p>
                        <p>Дмитрий Ремуков</p>
                    </div>
                    <div class="col">
                        <p>Прокурор Спенглет</p>
                        <p>Заслуженный артист РФ</p>
                        <p>Николай Смирнов</p>
                    </div>
                    <div class="col">
                        <p>Китти</p>
                        <p>Наталья Тысячная</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Дерижер-постановщик</p>
                        <p>Заслуженный артист Грузии</p>
                        <p>Лев Шабанов</p>
                    </div>
                    <div class="col">
                        <p>Бабс Баберлей</p>
                        <p>Почетный деятель искусств СК</p>
                        <p>Алексей Яковлев</p>
                    </div>
                    <div class="col">
                        <p>Чарлет</p>
                        <p>Владимир Подсвиров</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Сценограф художник по костюмам</p>
                        <p>Заслуженный артист России</p>
                        <p>Валерий Мелещенков</p>
                    </div>
                    <div class="col">
                        <p>Эрик</p>
                        <p>Почетный деятель искусств СК</p>
                        <p>Дмитрий Патров</p>
                    </div>
                    <div class="col">
                        <p>Брассет</p>
                        <p>Сергей Шадрин</p>
                    </div>
                </div>
            </div>
        </section>


        <section class="schedule">
            <div class="container">
                <div class="date">
                    <img src="calendar.png" alt="Календарь">
                    <p>25 июня 19:30</p>
                </div>
                <div class="time">
                    <img src="clock.png" alt="Часы">
                    <p>4 часа 45 минут с 2 антрактами</p>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Событие</div>

                        <div class="card-body">
                            <h2>{{ $event->title }}</h2>
                            <p>Дата: {{ $event->date }}</p>
                            <p>Цена от: {{ $minPrice }} до {{ $maxPrice }}</p>



                        </div>
                        @if (Auth::check())
                            <a href="{{ route('ticketBooking.store', [$event]) }}" class="btn btn-primary mb-3">Купить
                                билеты</a>
                        @else
                            <a href="{{ route('login') }}">Войти</a>
                            <a href="{{ route('register') }}">Регистрация</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <section class="tickets">
            <div class="container">
                <h2>Билеты</h2>
                <div class="ticket-types">
                    @foreach ($event->seats()->where('is_available', true)->get() as $seat)
                        <div class="price">
                            <p>{{ $seat->price }} ₽</p>
                            <p>{{ $seat->section }}</p>
                        </div>
                    @endforeach
                </div>
                {{-- <a href="{{ route('ticketBooking.store', ['eventId' => $event->id]) }}"
                        class="btn btn-primary">Купить билет</a> --}}
                @if (Auth::check())
                    <a href="{{ route('ticketBooking.store', [$event]) }}" class="btn btn-primary mb-3">Купить
                        билеты</a>
                @else
                    <a href="{{ route('login') }}">Войти</a>
                    <a href="{{ route('register') }}">Регистрация</a>
                @endif
            </div>
        </section>
    </main>

    {{--
@if (session('success'))
    <div id="successMessage" class="position-fixed bottom-0 end-0 p-3" style="z-index: 1030;">
        <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <strong>Успешное бронирование!</strong><br>
                    Ваш заказ успешно подтвержден.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('successMessage');

            // Показываем сообщение
            successMessage.style.display = 'block';

            // Ожидаем 5 секунд
            setTimeout(function() {
                // Скрываем сообщение после 5 секунд
                successMessage.style.display = 'none';
            }, 5000);
        });
    </script>
    @include('blocks.footer')
