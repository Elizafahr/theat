
@include('blocks.header')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

<link href="{{ asset('css/ticket-styles.css') }}" rel="stylesheet">

<section class="tickets">
    <div class="container">
        <h2>Бронирование билетов</h2>

        <form method="POST" action="{{ route('ticketBooking.store', ['eventId' => $event->id]) }}">
            @csrf

            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <table class="ticket-table">
                <thead>
                    <tr>
                        <th>Зона</th>
                        <th>Цена</th>
                        <th>Ряд</th>
                        <th>Место</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($availableSeats as $seat)
                        <tr>
                            <td>{{ $seat->section }}</td>
                            <td>{{ $seat->price }} ₽</td>
                            <td>{{ $seat->row }}</td>
                            <td>{{ $seat->seat_number }}</td>
                            <td>
                                <label>
                                    <input type="checkbox" name="seats[]" value="{{ $seat->id }}" />
                                    Бронировать место
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Продолжить бронирование</button>
        </form>
    </div>
</section>

@if(session('success'))
    <div id="successToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
        <div class="toast-header">
            <strong class="me-auto">Успешное бронирование!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
        </div>
        <div class="toast-body">
            Ваш заказ успешно подтвержден.
        </div>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'));
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl);
        });
    });
</script>
