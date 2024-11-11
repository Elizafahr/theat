<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Театр оперетты</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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
                    <li><a href="{{ route('afisha') }}">Афиша</a></li>
                    <li><a href="{{ route('theatres') }}">Театры</a></li>
                    {{-- <li><a href="{{ route('contact') }}">Контакты</a></li> --}}
                </ul>

            </nav>


            <div class="auth-menu  "  style="display: flex; flex-direction: column; justify-content: center; align-items: " >
                @if (Auth::check())
                    <a href="{{ route('profile.show', ['id' => auth()->id()]) }}">Профиль</a>


                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="  btn" style="  background-color: #C4122F; " type="submit">Выйти</button>
                    </form>
                @else
                   <div class="">
                    <a class="  btn" href="{{ route('login') }}">Войти</a>
                    <a class="  btn" href="{{ route('register') }}">Регистрация</a>
                   </div>
                @endif
            </div>

            {{-- <button class="btn">
                <img src="{{ asset('ticket.svg') }}" alt="Логотип">

                Купить билет</button> --}}

        </div>
    </header>
