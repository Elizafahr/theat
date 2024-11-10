
-- Вставка пользователей
INSERT INTO users (id, username, password, email, role, first_name, last_name, phone, created_at, updated_at) VALUES
(1, 'john_doe', 'hashed_password', 'john@example.com', 'Посетитель', 'John', 'Doe', '+7 (999) 123-45-67', '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
(2, 'alice_smith', 'hashed_password', 'alice@example.com', 'Клиент', 'Alice', 'Smith', '+7 (888) 987-65-43', '2024-02-15 12:00:00', '2024-02-15 12:00:00'),
(3, 'admin_user', 'hashed_password', 'admin@example.com', 'Администратор', 'Admin', 'User', '+7 (777) 555-01-23', '2024-03-20 14:30:00', '2024-03-20 14:30:00');

-- Вставка мероприятий
INSERT INTO events (id, theatre_id, title, description, start_date, start_time, end_date, end_time, poster, created_at, updated_at, category) VALUES
(1, 1, 'Премьера балета "Лебединое озеро"',
'Знаменитый балет в постановке известного хореографа. Не пропустите возможность увидеть эту классическую работу!',
'2024-05-15', '19:30:00', '2024-05-15', '22:00:00', 'lebedinoye_ozero_poster.jpg',
'2024-04-01 10:00:00', '2024-04-01 10:00:00', 'Балет'),
(2, 2, 'Школа актерского мастерства',
'Программа обучения для начинающих актеров. Научитесь основам театрального искусства и попробуйте себя в роли!',
'2024-06-01', '10:00:00', '2024-06-01', NULL, 'shkola_aktora_poster.jpg',
'2024-05-15 14:00:00', '2024-05-15 14:00:00', 'Театральные курсы'),
(3, 3, 'Концерт классической музыки',
'Выдающиеся музыканты представят лучшие произведения мировой классики. Не пропустите шанс насладиться живым звучанием!',
'2024-07-04', '19:00:00', '2024-07-04', '21:30:00', 'klassicheskaya_musika_poster.jpg',
'2024-06-20 09:30:00', '2024-06-20 09:30:00', 'Музыкальный концерт');




-- Вставка бронирований
INSERT INTO bookings (id, user_id, event_id, booking_date, total_price, status, created_at, updated_at) VALUES
(1, 1, 1, '2024-08-15', 150.00, 'Подтверждено', '2024-08-11 13:00:00', '2024-08-11 13:00:00'),
(2, 2, 2, '2024-09-01', 120.00, 'Ожидает оплаты', '2024-08-11 13:00:00', '2024-08-11 13:00:00');

-- Вставка кресел

INSERT INTO `seats` (`id`, `event_id`, `row`, `seat_number`, `price`, `is_available`, `created_at`, `updated_at`, `section`)
VALUES
(NULL, 1, 1, 1, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'A'),
(NULL, 1, 1, 2, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'A'),
(NULL, 1, 1, 3, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'A'),
(NULL, 1, 1, 4, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'A'),
(NULL, 1, 1, 5, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'A'),
(NULL, 1, 1, 6, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'A'),
(NULL, 1, 1, 7, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'A'),
(NULL, 1, 1, 8, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'A'),
(NULL, 1, 1, 9, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'A'),
(NULL, 1, 1, 10, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'A'),
(NULL, 2, 1, 1, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'B'),
(NULL, 2, 1, 2, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'B'),
(NULL, 2, 1, 3, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'B'),
(NULL, 2, 1, 4, 500, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'B'),
(NULL, 2, 1, 5, 50, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'B'),
(NULL, 2, 1, 6, 50, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'B'),
(NULL, 2, 1, 7, 50, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'B'),
(NULL, 2, 1, 8, 50, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'B'),
(NULL, 2, 1, 9, 50, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'B'),
(NULL, 2, 1, 10, 50, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00', 'B');

-- Вставка избранного
INSERT INTO favorites (id, user_id, event_id, created_at, updated_at) VALUES
(1, 1, 1, '2024-08-11 14:00:00', '2024-08-11 14:00:00'),
(2, 2, 2, '2024-08-11 15:00:00', '2024-08-11 15:00:00');

-- Вставка новостей
INSERT INTO news (id, title, content, image, published_date, user_id, theatre_id, created_at, updated_at) VALUES
(1, 'Новое сезонное представление!',
'Мы рады сообщить, что начало нового театрального сезона! Наше главное событие - премьера балета "Лебединое озеро" в постановке известного хореографа.',
'https://example.com/news/luzhenka.jpg',
'2024-10-24 07:59:02',
1, 1, '2024-08-15 10:00:00', '2024-08-15 10:00:00'),
(2, 'Скидка на школьные спектакли!',
'Уважаемые родители! Мы предлагаем специальную скидку на все школьные спектакли в этом месяце. Не упустите шанс познакомиться с миром театра!',
'https://example.com/news/skidka.jpg',
'2024-10-24 07:59:02',
2, NULL, '2024-08-22 09:30:00', '2024-08-22 09:30:00'),
(3, 'Открытие новой зала!',
'Мы гордимся тем, что открыли новый концертный зал в нашем театре. Теперь мы можем принимать гостей из других городов и стран!',
'https://example.com/news/novy_zal.jpg',
'2024-10-24 07:59:02',
3, 1, '2024-09-01 12:00:00', '2024-09-01 12:00:00');

-- Вставка театров
INSERT INTO theatres (id, name, address, phone, website, description, created_at, updated_at, image) VALUES
(1, 'Государственный Театр оперы и балета',
'ул. Театральная, дом 1', '+7 (495) 123-45-67', 'http://www.teatr.ru',
'Наши театр располагается в центре города и является одним из старейших в стране. Мы предлагаем широкий репертуар оперных и балетных спектаклей.',
'2024-01-01 10:00:00', '2024-01-01 10:00:00', 'teatr.jpg'),
(2, 'Театр имени Маяковского',
'пр. Ленина, дом 42', '+7 (495) 234-56-78', 'http://mayakovskiy.ru',
'Мы стремимся сохранить традиции русской классической драматургии и при этом экспериментируем с современными тенденциями в театральном искусстве.',
'2024-02-15 12:00:00', '2024-02-15 12:00:00', 'mayskiy.jpg'),
(3, 'Новый Концертный Зал',
'ул. Культурная, дом 99', '+7 (495) 345-90-12', 'http://novykonsertnyzal.ru',
'Мы гордимся своим новым концертным залом, который открыт совсем недавно. Здесь проходят концерты мировых звезд и фестивали.',
'2024-03-20 14:30:00', '2024-03-20 14:30:00', 'novy_konsertny_zal.jpg');
