<h2>Редактировать театр</h2>
<form action="{{ route('theatres.update', $theatre->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div>
        <label for="name">Название:</label>
        <input type="text" id="name" name="name" value="{{ $theatre->name }}" required>
    </div>
    <div>
        <label for="address">Адрес:</label>
        <input type="text" id="address" name="address" value="{{ $theatre->address }}" required>
    </div>

    <button type="submit">Обновить театр</button>
</form>
