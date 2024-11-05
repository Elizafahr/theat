
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Театр оперетты</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header>
        <div class="container">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('logo.svg') }}" alt="Логотип">
            </a>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    {{-- <li><a href="{{ route('afisha') }}">Афиша</a></li> --}}
                    <li><a href="{{ route('theatres') }}">Театр</a></li>
                    <li><a href="{{ route('contact') }}">Контакты</a></li>
                    <li><a href="{{ route('about') }}">О нас</a></li>
                </ul>

            </nav>
            <button class="btn">
                <img src="{{ asset('ticket.svg') }}" alt="Логотип">

                Купить билет</button>
        </div>
    </header>
