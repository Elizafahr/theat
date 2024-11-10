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
        <form id="filter-form" style="display: flex">
            <div class="filter-city">
                <select name="city_id" id="citySelect">
                    <option value="">Все города</option>
                    @foreach ($uniqueCities as $city)
                        <option value="{{ $city }}">{{ $city }}</option>
                    @endforeach
                </select>
            </div>

            <div class="filter-theatre">
                <select name="theatre_id" id="theatreSelect">
                    <option value="">Все театры</option>
                    @foreach ($uniqueTheatres as $theatre)
                        <option value="{{ $theatre }}">{{ $theatre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter-price">
                <label for="min_price">От:</label>
                <input type="number" id="min_price" name="min_price">
                <label for="max_price">До:</label>
                <input type="number" id="max_price" name="max_price">
            </div>


            <button type="submit">Применить фильтр</button>
        </form>
    </div>
    <div class="container">

        <div class="main__events">
            <h3>Фильтрованные результаты:</h3>




            @if (!empty($minPrice))
            <p>Цена: от {{ $minPrice }}  </p>
        @endif
        @if (!empty($maxPrice))
            <p>Цена: до {{ $maxPrice }}</p>
        @endif


                @if (!empty($cityId))
                    <p>Город: {{ $cityId }}</p>
                @endif

                @if (!empty($theatreId))
                    <p>Театр: {{ $theatreId }}</p>
                @endif




        </div>
    </div>

  <div class="main__events container">
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
                            <p><strong>Место:</strong> {{ $event->theatre->address }}</p>
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

                                @endif
                            </div>
                            <div class="ticket">
                                <p>Стоимость билетов: от {{ $event->seats->min('price') }}₽</p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    {{-- <div class="main__events container">
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
                        <p><strong>Место:</strong> {{ $event->theatre->address }}</p>
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

                            @endif
                        </div>
                        <div class="ticket">
                            <p>Стоимость билетов: от {{ $event->seats->min('price') }}₽</p>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}

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
