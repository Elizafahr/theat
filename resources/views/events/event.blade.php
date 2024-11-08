<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@include('blocks.header')
<link rel="stylesheet" href="{{ asset('css/event.css') }}">
<style>
    .icon-calendar {
        background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"%3E%3Cpath d="M21 18.25V19.75a2.25 2.25 0 0 1-2.25 2.25H4.75A2.25 2.25 0 0 1 2.5 16.5H5.25a2.25 2.25 0 1 1 0-4.5 2.25 2.25 0 0 1 4 0z"/%3E%3Cpath d="M22 12a2 2 0 0 1 2 2v1m-2 4a2 2 0 0 1-2 2H3m14-6a2 2 0 0 1-2 2v3a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h3.5a2 2 0 0 1 2 2v3zm-9-9a2 2 0 0 0-2-2 2 2 0 0 0 2-2h3.5a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h3.5z"/%3E%3C/svg%3E');
        background-repeat: no-repeat;
        background-size: contain;
        height: 24px;
        width: 24px;
    }

    .icon-clock {
        background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"%3E%3Ccircle cx="12" cy="12" r="10"/%3E%3Cline x1="12" y1="8" x2="12" y2="16"/%3E%3Cline x1="8" y1="12" x2="16" y2="12"/%3E%3C/svg%3E');
        background-repeat: no-repeat;
        background-size: contain;
        height: 24px;
        width: 24px;
    }
</style>
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
