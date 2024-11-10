<h2>Редактировать новость</h2>

<form action="{{ route('news.update', $news->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div>
        <label for="title">Заголовок:</label>
        <input type="text" name="title" value="{{ $news->title }}">
    </div>
    <div>
       <label for="content">Содержание:</label>
            <textarea name="content">{{ $news->content }}</textarea>
        </div>

        <button type="submit">Обновить</button>
</form>
