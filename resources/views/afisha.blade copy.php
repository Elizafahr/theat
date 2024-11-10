@include('blocks.header')


<div class="container">
    <div class="main__filter categories">
        <div class="main__filter-item">
            <button class="main__filter-button active">Все</button>
        </div>
        <div class="main__filter-item">
            <button class="main__filter-button">Спектакли</button>
        </div>
        <div class="main__filter-item">
            <button class="main__filter-button">Детские сказки</button>
        </div>
        <div class="main__filter-item">
            <button class="main__filter-button">Концерты</button>
        </div>
        <div class="main__filter-item">
            <button class="main__filter-button">Пьессы</button>
        </div>
    </div>
    <div class="filter">
        <div class="filter-price">
            <input type="number" placeholder="от">
            <input type="number" placeholder="до">
        </div>

        <div class="filter-location">
            <select name="city" id="">
                <option value="none">Не выбрано</option>
                <option value="Ecat">Екатеринбург</option>
            </select>
        </div>
        <div class="filter-theatre">
            <select name="theatre" id="">
                <option value="none">Не выбрано</option>
                <option value="first">Театр 1</option>
                <option value="sec">Театр 2</option>
            </select>
        </div>
        <div class="filter-date">

            <select name="date" id="">

                <option value="Июнь">Июнь</option>
                <option value="Июль">Июль</option>
            </select>
        </div>
    </div>
    <form action="{{ route('events.filterByPrice') }}" method="GET">
        <input type="number" name="min_price" placeholder="Минимальная цена">
        <input type="number" name="max_price" placeholder="Максимальная цена">
        <button type="submit">Фильтровать</button>
    </form>


    <div class="main__events">
        @foreach ($events as $event)
            <div class="main__event">
                <div class="main__event-title" style="display: none;">
                    <span>{{ $event->category }}</span>
                </div>
                <div class="card">
                    <div class="left"></div>
                    <div class="right">
                        <div class="info">
                            <h2 class="title">{{ $event->title }}</h2>
                            <p>{{ $event->location }}</p>
                            <p>{{ $event->date }}</p>
                            <p>{{ $event->time }}</p>
                            <div class="ticket">
                                <p>Стоимость билетов: от {{ $event->seats->min('price') }}₽</p>
                            </div>
                            <div class="age">
                                <p>{{ $event->age_limit }}</p>
                            </div>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('event.show', $event->id) }}" class="btn">Подробнее</a>
                            @if (Auth::check())
                                <a href="{{ route('ticketBooking.store', [$event]) }}"
                                    class="btn btn-primary mb-3"> Купить билет</a>
                            @else
                                <a href="{{ route('login') }}">Войти</a>
                                <a href="{{ route('register') }}">Регистрация</a>
                            @endif

                            {{-- <button class="btn">Купить билет</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  </div>

    <script>
        const filterButtons = document.querySelectorAll('.main__filter-button');
        const events = document.querySelectorAll('.main__event');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                events.forEach(event => {
                    if (button.classList.contains('active') && button.textContent === 'Все') {
                        event.style.display = 'block';
                    } else if (button.classList.contains('active') && event.querySelector(
                            '.main__event-title span:first-child').textContent === button
                        .textContent) {
                        event.style.display = 'block';
                    } else {
                        event.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>
