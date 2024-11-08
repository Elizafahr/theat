<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('blocks.header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    <main class="container mx-auto px-4 py-8">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-6">
                <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="card-header bg-gray-100 p-4">
                        <h2 class="text-center mb-0">Регистрация</h2>
                    </div>
                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Имя пользователя</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Электронная почта</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Пароль</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Подтвердите пароль</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Зарегистрироваться</button>
                        </form>

                        {{-- @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="btn btn-link mt-2">Забыл пароль?</a>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
