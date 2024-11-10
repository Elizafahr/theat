    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 @include('blocks.header')
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <style>
     #mainCarousel,
     .carousel-inner,
     .carousel-item,
     .carousel-item img,
     .carousel-item .row {
         height: 100%;
         margin: 0px !important;
     }

     .carousel-caption {
         justify-content: center;
         align-items: center;
     }

     .row {
         height: 100%;
         margin: 0px !important;
         padding: 0px;
         width: 100%;
     }
 </style>
 <main>
     <section class="hero mainSlider">
         <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
             <div class="carousel-inner">
                 @foreach ($allEvents as $index => $event)
                     <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                         <img src="{{ asset('/images/1 screen.png') }}" class="d-block w-100" alt="...">
                         <div class="container carousel-caption d-none d-md-block">
                             <div class="row align-items-center">
                                 <div class="col-md-10">
                                     <h2>{{ $event->title }}</h2>
                                     <div class="info">
                                         <div>
                                             <p>Автор:</p>
                                             <p><span>{{ $event->theatre->name }}</span></p>
                                         </div>
                                         <div>
                                             <p>Возрастная категория:</p>
                                             <p><span>16+</span></p>
                                         </div>
                                         <div>
                                             <p>{{ $event->start_date }}</p>
                                             <p>{{ $event->start_time }}</p>
                                         </div>
                                         <div>
                                             <p>Афиша:</p>
                                             <p><span>{{ $event->theatre->address }}</span></p>
                                         </div>
                                     </div>
                                     <a href="{{ route('event.show', $event->id) }}" class="btn">Подробнее</a>
                                 </div>
                                 {{-- <div class="col-md-6 bg-image">
                                    <img src="{{ asset('/Rectangle 15.png') }}" alt="Изображение мероприятия">
                                </div> --}}

                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
             <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="visually-hidden">Previous</span>
             </button>
             <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="visually-hidden">Next</span>
             </button>
         </div>
     </section>
     <section class="recommendations">
         <div class="container">
             <div class="flex j-btw">
                 <h3>РЕКОМЕНДУЕМ</h3>
                 <div class="navigation">
                     <button id="recomendation-arrow-left" class="arrow left">
                         <img src="{{ asset('arrow-left.svg') }}" alt="">
                     </button>
                     <button class="arrow right" id="recomendation-arrow-right">
                         <img src="{{ asset('arrow-right.svg') }}" alt="">
                     </button>
                 </div>
             </div>
             <div class="recommendations-wrapper">
                 <div class="slider">
                     @foreach ($allEvents as $event)
                     <div class="recommendation" style="max-width: 300px; background-image: url('{{ asset('images/event.png') }}');">
                        <div class="time">
                                 <div class="col">
                                     <p>{{ $event->start_date }}</p>
                                     <p> {{ $event->start_time }}</p>
                                 </div>
                                 <span>16+</span>
                             </div>
                             <div class="">
                                 <h4>{{ $event->title }}</h4>
                                 <p>{{ $event->description }}</p>
                             </div>
                             <a href="{{ route('event.show', $event->id) }}" class="btn">Подробнее</a>

                             @if (Auth::check())
                                 @if (\App\Models\Favorite::where('event_id', $event->id)->where('user_id', auth()->id())->exists())
                                     <form action="{{ route('remove-from-favorites', ['eventId' => $event->id]) }}"
                                         method="POST" style="display:inline;">
                                         @csrf
                                         <button type="submit" class="btn btn-outline-secondary add-to-favorites-btn">
                                             Удалить из избранных </button>
                                     </form>
                                 @else
                                     <form action="/add-to-favorites/{{ $event->id }}" method="POST"
                                         style="display:inline;">
                                         @csrf
                                         <button type="submit" class="btn btn-outline-secondary add-to-favorites-btn">
                                             Добавить в избранное</button>
                                     </form>
                                 @endif
                             @else
                                 <span>Войдите для добавления в избранное</span>
                             @endif

                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </section>

     <section class="news">
         <div class="container">
             <div class="flex j-btw">
                 <h3>ПОСЛЕДНИЕ НОВОСТИ</h3>
                 <button class="btn">Все новости</button>

             </div>
             <div class="news-wrapper">
                 @foreach ($news as $item)
                     <div class="news-item">
                         <p class="date">{{ $item->published_date }}</p>
                         <a href="#" class="news-title">{{ $item->title }}</a>
                     </div>
                 @endforeach
             </div>
         </div>
     </section>
 </main>
 @include('blocks.footer')
