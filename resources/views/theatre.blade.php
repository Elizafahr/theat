<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@include('blocks.header')
 <link rel="stylesheet" href="{{ asset('css/theatre.css') }}">


<main>
    <section class="hero" style="background-image: url('{{ asset('images/event.png') }}'); color: white;">
        <div class=" ">
            <h1>{{ $theatre->name }}</h1>
            <p>{{ $theatre->description }}</p>
        </div>
    </section>
    <section class="about">
        <div class="container">
            <h2>Основная информация</h2>
            <div class="info info-block">
                <div class="item">
                    <img src="{{ asset('images/location.png') }}" alt="Адрес">
                    <div class="text">{{ $theatre->address ?? 'Не указан' }}</div>
                </div>
                <div class="item">
                    <img src="{{ asset('images/phone.png') }}" alt="Телефон">
                    <div class="text">{{ $theatre->phone ?? 'Не указан' }}</div>
                </div>
                <div class="item">
                    <img src="{{ asset('images/email.png') }}" alt="Почта">
                    <div class="text"><a href="mailto:{{ $theatre->email ?? 'mail@teatr.stavropol.ru' }}">{{ $theatre->email ?? 'mail@teatr.stavropol.ru' }}</a></div>
                </div>
                <div class="item">
                    <img src="{{ asset('images/website.png') }}" alt="Сайт">
                    <div class="text"><a href="{{ $theatre->website ?? '#' }}">сайт.музыкальныйтеатр.ru</a></div>
                </div>
            </div>
        </div>
    </section>
<section class="recommendations">
    <div class="container">
        <div class="flex j-btw">
            <h2>Ближайшие мероприятия</h2>
            <div class="navigation">
                <button id="recomendation-arrow-left" class="arrow left">
                    <img src="{{ asset('arrow-left.svg') }}" alt="">
                </button>
                <button class="arrow right" id="recomendation-arrow-right">
                    <img src="{{ asset('arrow-right.svg') }}" alt="">
                </button>
            </div>
        </div>
        <div class="recommendations-wrapper">
            <div class="slider">
                @foreach ($events as $event)
                    <div class="recommendation event" style="background-image: url('{{ asset('images/event.png') }}');">
                        <div class="time">
                            <div class="col">
                                <p>{{ $event->start_date }}</p>
                                <p>{{ $event->start_time }}</p>
                            </div>
                            <span>16+</span>
                        </div>
                        <div class="">
                            <h4>{{ $event->title }}</h4>
                            <p>{{ $event->description }}</p>
                        </div>
                        <a href="{{ route('event.show', $event->id) }}" class="btn">Подробнее</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


</main>

 @include('blocks.footer')
