<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    </head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="logo.png" alt="Логотип">
            </div>
            <nav>
                <ul>
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">Афиша</a></li>
                    <li><a href="#">Театры</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="#">О нас</a></li>
                </ul>
            </nav>
            <button class="btn">Купить билет</button>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1>{{ $event->title }}</h1>
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
                <div class="time">
                    <img src="clock.png" alt="Часы">
                    <p>Продолжительность спектакля составляет 3 часа 30 минут</p>
                </div>
                <div class="place">
                    <img src="place.png" alt="Место проведения">
                    <p>Основная сцена</p>
                </div>
                <button class="btn ticket">Стоимость билетов: 400-600 ₽</button>
            </div>
        </section>

        <section class="description">
            <div class="container">
                <h2>Описание спектакля</h2>
                <p>Премьера спектакля состоялась: 10 октября 2009 года</p>
                <p>Два юных друга-студента Чарлей и Эрик хотят обвенчаться в любви своим избранницам, но вокруг сплошные препятствия. Девушки не могут выйти замуж без согласия опекуна, который за их содержание получает значительно сумму. К тому же приличие требует встречаться с возлюбленными только в чем-то присутствии. Очень кстати приезжает тетушка Чарлей. Она должна приехать, но почему-то задерживается.</p>
                <p>Бабс, успешно играющей в студенческом театре женскую роль, соглашается представиться тетушкой. Прокурор сразу влюбляется в нее и за возможность брака с богатой вдовой-миллионершей дает разрешение на замужество Эни и Китти. Вскоре с настоящей тетушкой, донной Лоцией, приезжает давняя возлюбленная бабс Элла и он, сив пожилокие одежды, объясняется наконец ей в любви. Донна Лоция тоже встречает свою прежнюю любовь – полковника Френсиса Чеснея, отца Эрика. В финале спектакля счастливыми становятся четыре любящие пары.</p>
                <p>Автор музыкальной комедии "Здравствуйте, я ваша тетя!" Оскар Борисович Фельцман хорошо известен как композитор-песенник. Огромную популярность у слушателей завоевали его песни "Черное море мое…", "Венок Дунаю", "Огромное небо", "Мир дому твоему!", "Лодочная замечательного поэта Расула Гамзатова "С любовью к женщине", "Это-Мы". В театрах страны с успехом шли его оперетты "Пусть гитара играет", "Старые дома", второе название - "Здравствуйте, я ваша тетя!". О.Фельцман создал веселую, ироничную, пронизанную современными ритмами музыку. А сюжет этой веселой, темпераментной комедии очень забавен.</p>
            </div>
        </section>

        <section class="team">
            <div class="container">
                <h2>Постановочная группа</h2>
                <div class="row">
                    <div class="col">
                        <p>Режиссер-постановщик</p>
                        <p>Инна Хачатурова</p>
                    </div>
                    <div class="col">
                        <p>Донна Лоция</p>
                        <p>Заслуженная артистка РФ</p>
                        <p>Ирина Комленко</p>
                    </div>
                    <div class="col">
                        <p>Полковник Чесней</p>
                        <p>Заслуженный артист РФ</p>
                        <p>Алим Абальмасов</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Балетмейстер-постановщик</p>
                        <p>Дмитрий Ремуков</p>
                    </div>
                    <div class="col">
                        <p>Элла</p>
                        <p>Почетный деятель искусств СК</p>
                        <p>Юлия Сивкова</p>
                    </div>
                    <div class="col">
                        <p>Эни</p>
                        <p>Оксана Филиппилова</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>За дирижерским пультом</p>
                        <p>Дмитрий Ремуков</p>
                    </div>
                    <div class="col">
                        <p>Прокурор Спенглет</p>
                        <p>Заслуженный артист РФ</p>
                        <p>Николай Смирнов</p>
                    </div>
                    <div class="col">
                        <p>Китти</p>
                        <p>Наталья Тысячная</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Дерижер-постановщик</p>
                        <p>Заслуженный артист Грузии</p>
                        <p>Лев Шабанов</p>
                    </div>
                    <div class="col">
                        <p>Бабс Баберлей</p>
                        <p>Почетный деятель искусств СК</p>
                        <p>Алексей Яковлев</p>
                    </div>
                    <div class="col">
                        <p>Чарлет</p>
                        <p>Владимир Подсвиров</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Сценограф художник по костюмам</p>
                        <p>Заслуженный артист России</p>
                        <p>Валерий Мелещенков</p>
                    </div>
                    <div class="col">
                        <p>Эрик</p>
                        <p>Почетный деятель искусств СК</p>
                        <p>Дмитрий Патров</p>
                    </div>
                    <div class="col">
                        <p>Брассет</p>
                        <p>Сергей Шадрин</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="actors">
            <div class="container">
                <h2>Действующие исполнители</h2>
            </div>
        </section>

        <section class="schedule">
            <div class="container">
                <div class="date">
                    <img src="calendar.png" alt="Календарь">
                    <p>25 июня 19:30</p>
                </div>
                <div class="time">
                    <img src="clock.png" alt="Часы">
                    <p>4 часа 45 минут с 2 антрактами</p>
                </div>
            </div>
        </section>

        <section class="tickets">
            <div class="container">
                <div class="price">
                    <p>400 ₽</p>
                    <p>Балкон</p>
                </div>
                <div class="price">
                    <p>400 ₽</p>
                    <p>Партер</p>
                </div>
                <button class="btn">Купить билет</button>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">Афиша</a></li>
                    <li><a href="#">Театры</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="#">О нас</a></li>
                </ul>
            </nav>
            <div class="logo">
                <img src="logo.png" alt="Логотип">
            </div>
            <button class="btn">Купить билет</button>
            <p>Политика конфиденциальности</p>
        </div>
    </footer>
</body>
</html>