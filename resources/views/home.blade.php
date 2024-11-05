 @include('blocks.header')
 <main>
     <section class="hero mainSlider">
         <div class="container">
             <button class="arrow left"><- </button>
                     <div class="event">
                         @if ($event)
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
                                     <p> {{ $event->start_time }}</p>
                                 </div>
                                 <div>
                                     <p>Афиша:</p>
                                     <p><span>{{ $event->theatre->address }}</span></p>
                                 </div>
                             </div>
                             <!-- <button class="btn">Подробнее</button> -->
                             <a href="{{ route('event.show', $event->id) }}" class="btn">Подробнее</a>
                         @endif
                     </div>
                     <button class="arrow right">-></button>
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
                         <div class="recommendation">
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
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </section>
     <section class="news">
         <div class="container">
             <div class="flex j-btw">
                 <h3>НОВОСТИ ТЕАТРА</h3>
                 <button class="btn">Все новости</button>
                 <div class="navigation">
                     <button class="arrow left">
                         <img src="{{ asset('arrow-left.svg') }}" alt="">
                     </button>
                     <button class="arrow right">
                         <img src="{{ asset('arrow-right.svg') }}" alt="">

                     </button>
                 </div>
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
