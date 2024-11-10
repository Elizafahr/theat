<h2>Добавить театр</h2>
<form method="POST" action="{{ route('theatres.store') }}">
    @csrf
    <div>
        <label for="name">Название:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="address">Адрес:</label>
        <input type="text" id="address" name="address" required>
    </div>
    <div>
        <label for="phone">Телефон:</label>
        <input type="tel" id="phone" name="phone">
    </div>
    <div>
        <label for="website">Сайт:</label>
        <input type="text" id="website" name="website">
    </div>
    <div>
        <label for="description">Описание:</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div>
        <label for="city">Город:</label>
        <input type="text" id="city" name="city">
    </div>
    <button type="submit">Добавить театр</button>
</form>
