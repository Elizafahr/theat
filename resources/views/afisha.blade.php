@include('blocks.header')
<style>
    .main__filter {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .main__filter-item {
        margin-right: 10px;
    }

    .main__filter-button {
        background-color: #eee;
        color: #333;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
    }

    .main__filter-button.active {
        background-color: #000;
        color: #fff;
    }

    .main__filter-block {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .main__filter-range {
        display: flex;
    }

    .main__filter-range-item {
        margin-right: 10px;
    }

    .main__filter-range-item input {
        width: 50px;
        padding: 5px;
        border: 1px solid #eee;
        border-radius: 5px;
        text-align: center;
    }

    .main__filter-location {
        display: flex;
        align-items: center;
    }

    .main__filter-location img {
        margin-right: 5px;
    }

    .main__filter-date {
        display: flex;
        align-items: center;
    }

    .main__filter-date img {
        margin-right: 5px;
    }

    .card {
        display: flex;
        max-width: 800px;
    }

    .left {
        width: 50%;
        background-color: #eee;
    }

    .right {
        width: 50%;
        padding: 20px;
    }

    .info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .age {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #eee;
        border: 1px solid #ccc;
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #000;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        margin-right: 10px;
    }

    .btn:hover {
        background-color: #333;
    }

    .ticket {
        background-color: #eee;
        padding: 10px 20px;
        border-radius: 5px;
        display: flex;
        align-items: center;
    }

    .main__event {
        margin-top: 20px;
    }

    .card-body {
        display: flex;
        max-width: 800px;
        margin-bottom: 30px;
        border: none;
        border-radius: 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .left {
        width: 40%;
        background-color: #eee;
        padding: 20px;
    }

    .left img {
        width: 100%;

    }

    .right {
        width: 60%;
        padding: 20px;
    }

    .card-body {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .btn-group {
        display: flex;
        gap: 10px;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #000;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #333;
    }

    .ticket {
        background-color: #f8f9fa;
        padding: 10px 20px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        margin-top: 15px;
    }
</style>

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
