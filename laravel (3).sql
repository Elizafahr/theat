-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 11 2024 г., 01:15
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT '2024-10-24 07:59:02',
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('Ожидание','Подтверждено','Отменено') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ожидание',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `event_id`, `booking_date`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(13, 8, 2, '2024-10-24 07:59:02', '0.00', 'Подтверждено', '2024-11-08 17:23:03', '2024-11-08 19:11:27'),
(17, 2, 2, '2024-08-31 21:00:00', '120.00', 'Отменено', '2024-08-11 10:00:00', '2024-11-10 14:30:14');

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `theatre_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `start_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `start_time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `poster` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `theatre_id`, `title`, `description`, `start_date`, `start_time`, `end_date`, `end_time`, `poster`, `created_at`, `updated_at`, `category`) VALUES
(2, 6, 'Вишневый сад', 'Пьеса в четырех действиях', '2024-03-05', '19:00:00', '2024-03-05', '21:00:00', 'evennt.png', '2024-10-24 08:15:30', '2024-10-24 08:15:30', 'Детские сказки'),
(3, 1, 'Щелкунчик', 'Балет в двух действиях', '2024-12-25', '18:00:00', '2024-12-25', '20:00:00', 'evennt.png', NULL, NULL, 'Концерты'),
(4, 2, 'Дядя Ваня', 'Пьеса в четырех действиях', '2024-04-10', '19:30:00', '2024-04-10', '21:30:00', 'evennt.png', NULL, NULL, 'Концерты'),
(5, 12, 'Спящая красавица', 'Балет в трех действиях', '2024-05-15', '19:00:00', '2024-05-15', '21:15:00', 'evennt.png', NULL, NULL, 'Спектакли'),
(6, 2, 'Три сестры', 'Пьеса в четырех действиях', '2024-06-20', '19:00:00', '2024-06-20', '21:00:00', 'evennt.png', NULL, NULL, 'Спектакли'),
(10, 1, 'Премьера балета \"Лебединое озеро\"', 'Знаменитый балет в постановке известного хореографа. Не пропустите возможность увидеть эту классическую работу!', '2024-05-15', '19:30:00', '2024-05-15', '22:00:00', 'evennt.png', '2024-04-01 07:00:00', '2024-04-01 07:00:00', 'Балет'),
(11, 2, 'Школа актерского мастерства', 'Программа обучения для начинающих актеров. Научитесь основам театрального искусства и попробуйте себя в роли!', '2024-06-01', '10:00:00', '2024-06-01', NULL, 'evennt.png', '2024-05-15 11:00:00', '2024-05-15 11:00:00', 'Театральные курсы'),
(12, 1, 'Концерт классической музыки', 'Выдающиеся музыканты представят лучшие произведения мировой классики. Не пропустите шанс насладиться живым звучанием!', '2024-07-04', '19:00:00', '2024-07-04', '21:30:00', 'evennt.png', '2024-06-20 06:30:00', '2024-06-20 06:30:00', 'Музыкальный концерт'),
(16, 1, 'Премьера балета \"Лебединое озеро\"', 'Знаменитый балет в постановке известного хореографа. Не пропустите возможность увидеть эту классическую работу!', '2024-05-15', '19:30:00', '2024-05-15', '22:00:00', 'evennt.png', '2024-04-01 07:00:00', '2024-04-01 07:00:00', 'Балет'),
(17, 2, 'Школа актерского мастерства', 'Программа обучения для начинающих актеров. Научитесь основам театрального искусства и попробуйте себя в роли!', '2024-06-01', '10:00:00', '2024-06-01', NULL, 'evennt.png', '2024-05-15 11:00:00', '2024-05-15 11:00:00', 'Театральные курсы'),
(18, 5, 'Концерт классической музыки', 'Выдающиеся музыканты представят лучшие произведения мировой классики. Не пропустите шанс насладиться живым звучанием!', '2024-07-04', '19:00:00', '2024-07-04', '21:30:00', 'evennt.png', '2024-06-20 06:30:00', '2024-06-20 06:30:00', 'Музыкальный концерт');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `event_id`, `created_at`, `updated_at`) VALUES
(6, 8, 3, '2024-11-08 17:54:06', '2024-11-08 17:54:06'),
(7, 9, 3, '2024-11-08 19:30:50', '2024-11-08 19:30:50'),
(9, 2, 2, '2024-08-11 12:00:00', '2024-08-11 12:00:00'),
(11, 9, 2, '2024-11-10 14:31:23', '2024-11-10 14:31:23');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_24_134634_create_theatres_table', 1),
(6, '2024_10_24_134641_create_events_table', 1),
(7, '2024_10_24_134648_create_seats_table', 1),
(8, '2024_10_24_134655_create_bookings_table', 1),
(9, '2024_10_24_134701_create_tickets_table', 1),
(10, '2024_10_24_134707_create_reviews_table', 1),
(11, '2024_10_24_134714_create_favorites_table', 1),
(12, '2024_10_24_134721_create_news_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_date` timestamp NOT NULL DEFAULT '2024-10-24 07:59:02',
  `user_id` bigint UNSIGNED NOT NULL,
  `theatre_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `published_date`, `user_id`, `theatre_id`, `created_at`, `updated_at`) VALUES
(1, 'Большой театр объявляет новый сезон!', 'В новом сезоне зрителей ждет множество премьqер и гастролей... eee', NULL, '2024-10-24 07:59:02', 1, 1, '2024-10-24 08:13:55', '2024-11-10 17:37:19'),
(2, 'Малый театр представляет премьеру', 'Новая постановка пьесы...', NULL, '2024-10-24 07:59:02', 1, 2, '2024-10-24 08:13:55', '2024-10-24 08:13:55');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `seats`
--

CREATE TABLE `seats` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `row` int NOT NULL,
  `seat_number` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `section` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `seats`
--

INSERT INTO `seats` (`id`, `event_id`, `row`, `seat_number`, `price`, `is_available`, `created_at`, `updated_at`, `section`) VALUES
(1, 2, 1, 1, '300.00', 0, NULL, '2024-11-08 17:23:03', 'партер'),
(4, 2, 2, 1, '500.00', 0, NULL, '2024-11-10 14:31:45', 'балкон'),
(5, 18, 2, 22, '2222.00', 0, NULL, '2024-11-10 14:35:59', 'а'),
(16, 2, 1, 1, '500.00', 0, '2024-08-11 11:00:00', '2024-11-10 14:31:45', 'B'),
(17, 2, 1, 2, '500.00', 1, '2024-08-11 11:00:00', '2024-08-11 11:00:00', 'B'),
(18, 2, 1, 3, '500.00', 1, '2024-08-11 11:00:00', '2024-08-11 11:00:00', 'B'),
(19, 2, 1, 4, '500.00', 1, '2024-08-11 11:00:00', '2024-08-11 11:00:00', 'B'),
(20, 2, 1, 5, '50.00', 1, '2024-08-11 11:00:00', '2024-08-11 11:00:00', 'B'),
(21, 2, 1, 6, '50.00', 1, '2024-08-11 11:00:00', '2024-08-11 11:00:00', 'B'),
(22, 2, 1, 7, '50.00', 1, '2024-08-11 11:00:00', '2024-08-11 11:00:00', 'B'),
(23, 2, 1, 8, '50.00', 1, '2024-08-11 11:00:00', '2024-08-11 11:00:00', 'B'),
(24, 2, 1, 9, '50.00', 1, '2024-08-11 11:00:00', '2024-08-11 11:00:00', 'B'),
(25, 2, 1, 10, '50.00', 1, '2024-08-11 11:00:00', '2024-08-11 11:00:00', 'B');

-- --------------------------------------------------------

--
-- Структура таблицы `theatres`
--

CREATE TABLE `theatres` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(2222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `theatres`
--

INSERT INTO `theatres` (`id`, `name`, `address`, `phone`, `website`, `description`, `created_at`, `updated_at`, `image`, `city`) VALUES
(1, 'Большой театр', 'Театральная площадь, 11', '+74951234567', 'www.bolshoi.ru', 'Знаменитый театр оперы и балета', '2024-10-24 08:09:40', '2024-11-10 17:37:33', 'Rectangle 15.png', 'Екатеринбург'),
(2, 'Малый театр', 'Театральная площадь, 2', '+74951234568', 'www.maly.ru', 'Классический драматический театр', '2024-10-24 08:09:40', '2024-10-24 08:09:40', 'Rectangle 15.png', 'Москва'),
(3, 'Театр 1', 'Екатеринбург, ул ..., ...', NULL, '--', '--', NULL, NULL, '---', 'Екатеринбург'),
(5, 'Театр 5', 'Екатеринбург, ул ..., ...', NULL, '--', '--', NULL, NULL, '---', 'Екатеринбург'),
(6, 'Театр 2', 'Екатеринбург, ул ..., ...', NULL, '--', '--', NULL, NULL, '---', 'Екатеринбург'),
(8, 'Театр 4', 'Екатеринбург, ул ..., ...', NULL, '--', '--', NULL, NULL, '---', 'Екатеринбург'),
(9, 'Театр 6', 'Каменск-Уральский, ул ..., ...', NULL, '--', '--', NULL, NULL, '---', 'Каменск-Уральский'),
(11, 'Театр 8', 'Каменск-Уральский', NULL, '--', '--', NULL, NULL, '---', 'Каменск-Уральский'),
(12, 'Театр 9', 'Каменск-Уральский', NULL, '--', '--', NULL, NULL, '---', 'Каменск-Уральский'),
(14, 'еw', 'еkk', NULL, NULL, NULL, '2024-11-10 17:12:54', '2024-11-10 17:33:19', NULL, 'е');

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `seat_id` bigint UNSIGNED NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `booking_id`, `seat_id`, `is_used`, `created_at`, `updated_at`) VALUES
(13, 13, 1, 0, '2024-11-08 17:23:03', '2024-11-08 17:23:03');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Посетитель','Клиент','Администратор') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Посетитель',
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `first_name`, `last_name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$fS828Wo2WR8EYsWKFm6j.O2f6EMexbbsaJTEjIVjgZvhXu2JrZKEq', 'admin@example.com', 'Администратор', 'Администратор', 'Системы', '+79991234567', '2024-10-24 07:59:10', '2024-10-24 07:59:10'),
(2, 'user1', '$2y$10$kvIV4gWSkYHxFuZHDrLe.OZhUAzSs6jW7VYpZ5ECx1cboYQTf1RP2', 'user1@example.com', 'Клиент', 'Иван', 'Иванов', '+79991234568', '2024-10-24 07:59:10', '2024-10-24 07:59:10'),
(3, '111', '$2y$12$/zEPOUOWxedE3liPjySLtuf1IG1v6UT82AhcVIJpYbhHVqJScOmwa', '111@d', 'Посетитель', NULL, NULL, '+79991234567', '2024-11-06 14:35:45', '2024-11-06 14:35:45'),
(4, '1112', '$2y$12$hQi.njmQ1vY42d5lI58rlu/Aoe2BPlx/4TLL4sAlpFny7XL8AG6oK', '111@d2', 'Посетитель', NULL, NULL, '+79991234567', '2024-11-06 14:39:51', '2024-11-06 14:39:51'),
(5, 'new', '$2y$12$Fk2TU7Uja8BYRreEAnTubeOJcI2D7FtTreVwltjjl0BBWHFv.Xr1O', 'new@gmail.com', 'Посетитель', NULL, NULL, '+79991234567', '2024-11-06 14:45:02', '2024-11-06 14:45:02'),
(6, 'eee', '$2y$12$UMRcV7afbyP8bd5iD7vdiem/ePrSjzaYPz1ONfmCK7rr1zYLBrLB.', 'eee@e', 'Посетитель', NULL, NULL, '+79991234567', '2024-11-06 14:50:10', '2024-11-06 14:50:10'),
(7, 'ц', '$2y$12$XuvMM3AeE6T9XSNzJ2o3geQGoe7Sr6Lv1ThfPZRbMdNeMcdeX/CKG', 's@ds', 'Посетитель', NULL, NULL, '+79991234567', '2024-11-06 14:55:18', '2024-11-06 14:55:18'),
(8, 'new@new', '$2y$12$KU8acRKmifLPjbxOmdTdaekNGjUt2BlNkRBhM8PuEn/6//jz0.Kqa', 'new@new', 'Администратор', NULL, NULL, '+79991234567', '2024-11-08 16:13:45', '2024-11-08 16:13:45'),
(9, 'user', '$2y$12$ZBfK5AWMI2B8OfhtOoDN5eHrxmlaUd8BRVuq6Z9Ppnd.4NaJz8uNG', 'user@user', 'Клиент', NULL, NULL, '+79991234567', '2024-11-08 19:23:14', '2024-11-08 19:23:14'),
(13, 'john_doe', 'hashed_password', 'john@example.com', 'Посетитель', 'John', 'Doe', '+7 (999) 123-45-67', '2024-01-01 07:00:00', '2024-01-01 07:00:00'),
(14, 'alice_smith', 'hashed_password', 'alice@example.com', 'Клиент', 'Alice', 'Smith', '+7 (888) 987-65-43', '2024-02-15 09:00:00', '2024-02-15 09:00:00'),
(15, 'admin_user', 'hashed_password', 'admin@admin.com', 'Администратор', 'Admin', 'User', '+7 (777) 555-01-23', '2024-03-20 11:30:00', '2024-03-20 11:30:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_event_id_foreign` (`event_id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_theatre_id_foreign` (`theatre_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_event_id_foreign` (`event_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`),
  ADD KEY `news_theatre_id_foreign` (`theatre_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_event_id_foreign` (`event_id`);

--
-- Индексы таблицы `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_event_id_foreign` (`event_id`);

--
-- Индексы таблицы `theatres`
--
ALTER TABLE `theatres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `theatres_name_unique` (`name`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_booking_id_foreign` (`booking_id`),
  ADD KEY `tickets_seat_id_foreign` (`seat_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `theatres`
--
ALTER TABLE `theatres`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_theatre_id_foreign` FOREIGN KEY (`theatre_id`) REFERENCES `theatres` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_theatre_id_foreign` FOREIGN KEY (`theatre_id`) REFERENCES `theatres` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
