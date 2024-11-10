
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админ-панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin-top: 20px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #6c757d;
            color: white;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        .card-body {
            padding: 20px;
        }
        h1 {
            color: #212529;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        button {
            background-color: #198754;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #1565bd;
        }
    </style>
</head><nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Админ-панель</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link " aria-current="page" href="{{ route('admin.dashboard') }}">Главная</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('admin.news.index') }}">Новости</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.theatres.index') }}">Театры</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.bookings.index') }}">Бронирования</a></li>
            </ul>
        </div><div class="auth-menu">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Выйти</button>
            </form>
        </div>
    </div>
</nav><h1>Управление новостями</h1>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        text-align: left;
        padding: 12px;
        border-bottom: 1px solid #dee2e6;
    }

    th {
        background-color: #f8f9fa;
        font-weight: bold;
        color: #212529;
    }

    tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .btn {
        background-color: #198754;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #1565bd;
    }

    .btn-danger {
        background-color: #dc3545;
    }
</style>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Дата публикации</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->published_date }}</td>
                <td>
                    <form method="POST" action="{{ route('news.destroy', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                    <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary">Редактировать</a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
