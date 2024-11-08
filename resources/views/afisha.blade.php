<link rel="stylesheet" href="{{ asset('css/afisha.css') }}">
@include('blocks.header')

<div class="container">
    <div class="main__filter categories">
        <div class="main__filter-item">
            <button class="main__filter-button active">Все</button>
        </div>
        @foreach ($uniqueCategories as $category)
            <div class="main__filter-item">
                <button class="main__filter-button">{{ $category }}</button>
            </div>
        @endforeach
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
            <select name="city" id="">
                <option value="none">Не выбрано</option>
                <option value="first">Театр 1</option>
                <option value="sec">Театр 2</option>
            </select>
        </div>
        <div class="filter-date">

            <select>

                <option value="Июнь">Июнь</option>
                <option value="Июль">Июль</option>
            </select>
        </div>
    </div>



    <div class="main__events">
        @foreach ($events as $event)
            <div class="card mb-6 main__event">
                <div class="main__event-title" style="display: none;">
                    <span>{{ $event->category }}</span>
                </div>
                <div class="card-body">
                    <div class="left">
                        <img src="{{ asset('images/' . $event->poster) }}" alt="Event Image" class="img-fluid">
                    </div>
                    <div class="right">
                        <h2 class="card-title">{{ $event->title }}</h2>
                        <p><strong>Место:</strong> {{ $event->location }}</p>
                        <div class="flex">
                            <p><strong>Дата:</strong> {{ $event->start_date }}</p>
                            <p><strong>Время:</strong> {{ $event->start_time }}</p>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('event.show', $event->id) }}" class="btn">Подробнее</a>
                            @if (Auth::check())
                                <a href="{{ route('ticketBooking.store', [$event]) }}" class="btn btn-primary">Купить
                                    билет</a>
                            @else
                                <div class="btn-group">
                                    <a href="{{ route('login') }}" class="btn">Войти</a>
                                    <a href="{{ route('register') }}" class="btn">Регистрация</a>
                                </div>
                            @endif
                        </div>
                        <div class="ticket">
                            <p>Стоимость билетов: от {{ $event->seats->min('price') }}₽</p>
                        </div>
                        {{-- <div class="age bg-light text-center p-2 rounded-circle">
                            <p>{{ $event->age_limit }}</p>
                        </div> --}}
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
                let isVisible = true;

                if (button.classList.contains('active') && button.textContent !== 'Все') {
                    const category = event.querySelector('.main__event-title span:first-child')
                        .textContent;
                    isVisible = category === button.textContent;
                }

                event.style.display = isVisible ? 'block' : 'none';
            });
        });
    });
</script>
</body>

</html>
