-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 27 2022 г., 21:17
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `huntjobs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int NOT NULL,
  `vacancy_id` int NOT NULL,
  `user_id` int NOT NULL,
  `timestamp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `resumes`
--

CREATE TABLE `resumes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `full_name` text NOT NULL,
  `age` text NOT NULL,
  `exp` text NOT NULL,
  `education` text NOT NULL,
  `requirements` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(24) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Не указан'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `email`, `password`, `phone`) VALUES
(1, 'Admin', 2, 'test@gmail.com', '9bc43b811fa686ee21575d045e7d6800', 'Не указан');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `job` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `salary` int NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category` text NOT NULL,
  `timestamp` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `vacancies`
--

INSERT INTO `vacancies` (`id`, `user_id`, `job`, `salary`, `description`, `category`, `timestamp`, `slug`) VALUES
(1, 1, 'Junior Front-end Developer', 30000, 'Наша компания оказывается услуги в области дополнительного профессионального образования. В нашей компании смогут реализовать себя как начинающие, так и опытные специалисты в различных областях, которым мы сможем предложить интересную работу, где они смогут применить свои знания и получить за это достойную оплату.', 'web_programist', '19.10.2022', 'vacancy-1'),
(2, 1, 'Web-разработчик', 180000, 'Группа компаний объявляет набор на должность Web-разработчика для выполнения цикла работ по развитию и поддержке текущих сайтов и сервисов.\r\nКомпания успешно работает и развивается более 15 лет и зарекомендовала себя как ответственного поставщика и надежного работодателя.\r\nИщем активного и целеустремленного сотрудника, готового развиваться и двигаться вверх по карьерной лестнице. Наша компания занимается производством товаров и услуг в области отопительного оборудования, изготовления бань, производства мебели, организации спортивных мероприятий.', 'web_programist', '21.11.2022', 'vacancy-2'),
(3, 1, 'PHP разработчик', 45000, 'Кодекс – крупная надежная российская компания, занимающаяся созданием и распространением информационно-правовых систем. Мы ищем PHP-разработчика, в отдел веб-разработки, который занимается созданием, развитием и сопровождением всех веб-сервисов компании.\r\nВ нашей команде используются все современные практики разработки - от обязательного code review и написания тестов до использования k8s и налаженных механизмов CI/CD. Не потому, что это хайпово, а потому, что это реально помогает нам повышать свою эффективность и получать удовольствие от того, что мы делаем.', 'web_programist', '23.11.2022', 'vacancy-3'),
(4, 1, 'Системный программист (L1 phy проект)', 250000, 'Внимание! Готовы рассмотреть готовые команды, слаженные коллективы с опытом разработки в мобильной связи, радиолокации.\r\nОбязанности:\r\nПроектирование и разработка системного и прикладного ПО для SoC NXP QorIQ B4860.\r\nРабота в компактной команде разработчиков совместно с FPGA-разработчиком, HW/RF-дизайнером, Signal Processing инженером.\r\nУмение принимать технические решения и брать за них ответственность.\r\nРазработка программ и методик тестирования продукта, взаимодействие с QA.\r\nРазработка технических спецификаций модулей ПО, взаимодействие с исследователями и разработчиками.', 'sistemnyi_programist', '23.11.2022', 'vacancy-4');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `resume_id` (`user_id`);

--
-- Индексы таблицы `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Индексы таблицы `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
