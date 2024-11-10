<h2>Добавить новость</h2>
<form method="POST" action="{{ route('news.store') }}">
    @csrf
    <div>
        <label for="title">Заголовок:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="content">Содержание:</label>
        <textarea id="content" name="content" required></textarea>
    </div>
    <div>
        <label for="image">Изображение:</label>
        <input type="file" id="image" name="image">
    </div>

    <button type="submit">Добавить новость</button>
</form>
