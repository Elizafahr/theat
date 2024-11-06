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

            {{-- <div class="auth-menu">
                @if (Auth::check())
                    <span>Здравствуйте, {{ Auth::user()->name }}!</span>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-link">
                        Выйти
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}">Войти</a>
                    <a href="{{ route('register') }}">Регистрация</a>
                @endif
            </div> --}}
            <div class="auth-menu">
                @if (Auth::check())
                    {{-- <span>Здравствуйте, {{ Auth::user()->name }}!</span> --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Выйти</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Войти</a>
                    <a href="{{ route('register') }}">Регистрация</a>
                @endif
            </div>

            <button class="btn">
                <img src="{{ asset('ticket.svg') }}" alt="Логотип">

                Купить билет</button>

        </div>
    </header>
