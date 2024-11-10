 @include('blocks.header')
 <link rel="stylesheet" href="{{ asset('css/theatres.css') }}">


 <div class="container">
     <h1>ТЕАТРЫ СВЕРДЛОВСКОЙ ОБЛАСТИ</h1>

     <h1>Театры</h1>
     @foreach ($theatres as $theatre)
         <div class="theatre-item">
             <img src="/images/{{ $theatre->image }}" alt="{{ $theatre->name }}">
             <div class="th-item-text">
                 <p>Адрес: {{ $theatre->address ?? 'Не указан' }}</p>
                 <h2>{{ $theatre->name }}</h2>
                 <a href="{{ route('theatre', $theatre->id) }}" class="btn">Подробнее</a>
                </div>
         </div>
     @endforeach
 </div>

 @include('blocks.footer')
