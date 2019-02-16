-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.38 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных blog
CREATE DATABASE IF NOT EXISTS `blog` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `blog`;

-- Дамп структуры для таблица blog.comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `text` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.comment: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Дамп структуры для таблица blog.document
CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `href` text NOT NULL,
  `description` text NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `id_lesson` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-document-id_lesson` (`id_lesson`),
  CONSTRAINT `fk-document-id_lesson` FOREIGN KEY (`id_lesson`) REFERENCES `lesson` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.document: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` (`id`, `name`, `href`, `description`, `updated_at`, `created_at`, `id_lesson`) VALUES
	(1, 'Выходит ne очень', 'txt.svg', 'Посмотрим что из этого выйдет. A kak ', 2147483647, 2147483647, 3),
	(2, 'Новый документ', 'txt.svg', '12fdsdfdas', 2147483647, 2147483647, 2),
	(3, 'Не очень новый документ', 'txt.svg', '12fdsdfdas', 2147483647, 2147483647, 2),
	(4, 'Очень очень новый документ', 'txt.svg', '12fdsdfdas', 2147483647, 2147483647, 1),
	(5, 'Самый не новый документ', 'txt.svg', '12fdsdfdas', 2147483647, 2147483647, 1);
/*!40000 ALTER TABLE `document` ENABLE KEYS */;

-- Дамп структуры для таблица blog.group
CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.group: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` (`id`, `name`) VALUES
	(1, 'Група 26');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;

-- Дамп структуры для таблица blog.information
CREATE TABLE IF NOT EXISTS `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `value` text NOT NULL,
  `comment` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.information: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `information` DISABLE KEYS */;
INSERT INTO `information` (`id`, `name`, `value`, `comment`) VALUES
	(1, 'vkontakte', 'http://vk.com/id1', 'Страница ВКонтакте'),
	(2, 'mail', 'mail@ru.ru', 'Почта для ображращения'),
	(3, 'facebook', 'страница в файсбуке', 'страница в файсбуке'),
	(4, 'pointOfView', 'Моя точка зрения', 'Моя точка зрения'),
	(5, 'AboutMe', 'Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi', 'Страница О себе. Главная запись'),
	(6, 'whoAmI', 'Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi', 'Страница О себе. Кто я'),
	(7, 'myMission', 'Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi', 'Страница О себе. Моя миссия'),
	(8, 'myOpinion', 'Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi', 'Страница О себе. Мой взгляд'),
	(9, 'myValues', 'Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi', 'Страница О себе. Мой ценности'),
	(10, 'mainFeedback', 'Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi', 'Главный текст на странице обратная связь'),
	(11, 'address', 'Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi', 'Адрес, где можно найти');
/*!40000 ALTER TABLE `information` ENABLE KEYS */;

-- Дамп структуры для таблица blog.lesson
CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.lesson: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `lesson` DISABLE KEYS */;
INSERT INTO `lesson` (`id`, `name`) VALUES
	(1, 'Урок номер 1'),
	(2, 'Урок номер 2'),
	(3, 'Урок номер 3');
/*!40000 ALTER TABLE `lesson` ENABLE KEYS */;

-- Дамп структуры для таблица blog.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.migration: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1550315764),
	('m130524_201442_init', 1550315768),
	('m190216_095215_create_table', 1550315776),
	('m190216_104002_insert_information_table', 1550315776);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Дамп структуры для таблица blog.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(150) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `icon` text NOT NULL,
  `id_lesson` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-post-id_lesson` (`id_lesson`),
  CONSTRAINT `fk-post-id_lesson` FOREIGN KEY (`id_lesson`) REFERENCES `lesson` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=340 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.post: ~13 rows (приблизительно)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `title`, `description`, `created_at`, `updated_at`, `type`, `icon`, `id_lesson`) VALUES
	(1, 'k', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 154885766, 1548857663, 2, 'herobg.jpg', 1),
	(2, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньv', 'Даже не знаю как сюда что писать ну пОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньускай будет пока что так. потмо гасим lore,', 1548857663, 1548857663, 2, 'kek.jpg', 1),
	(5, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Даже не знаю как сюда что писать ну Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньпускай будет пока что так. потмо гасим lore,', 1548857663, 1548857663, 2, 'kek.jpg', 1),
	(6, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 1548857663, 1548857663, 2, 'kek.jpg', 2),
	(7, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Даже не знаю как сюда что писать ну Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньбудет пока что так. потмо гасим lore,', 154885766, 154885766, 1, 'lolka.jpg', 1),
	(8, 'Аудио Очень, ну прям очень интерестная стратья, без которой жизнь не жизньпост', 'Даже не знаю как сюда что писать ну пускай будет пока что так. потмо гасим lore,', 1548857663, 1548857663, 2, 'kek.jpg', 2),
	(9, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям', 'Даже не знаю как сюда что писать ну пуОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньскай будет пока что так. потмо гасим lore,', 154885766, 1548857663, 1, 'kek.jpg', 2),
	(11, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 1548857663, 1548857663, 2, 'kek.jpg', 1),
	(12, 'АудОчень, ну прям очень интерестная стратья, без которой жизнь не жизньио пост', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 1548857663, 1548857663, 2, 'kek.jpg', 2),
	(336, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 1548857663, 1548857663, 2, 'kek.jpg', 2),
	(337, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 1548857663, 1548857663, 2, 'kek.jpg', 1),
	(338, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 1548857663, 1548857663, 2, 'kek.jpg', 1),
	(339, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 2048857663, 1548857663, 2, 'kek.jpg', 1);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Дамп структуры для таблица blog.postFile
CREATE TABLE IF NOT EXISTS `postFile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `id_post` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-postFile-id_post` (`id_post`),
  CONSTRAINT `fk-postFile-id_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.postFile: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `postFile` DISABLE KEYS */;
INSERT INTO `postFile` (`id`, `name`, `id_post`) VALUES
	(1, 'AirReview-Landmarks-02-ChasingCorporate.mp3', 1),
	(2, 'AirReview-Landmarks-02-ChasingCorporate.mp3', 1),
	(3, 'herobg.jpg', 7),
	(4, 'herobg.jpg', 7);
/*!40000 ALTER TABLE `postFile` ENABLE KEYS */;

-- Дамп структуры для таблица blog.tag
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.tag: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` (`id`, `name`) VALUES
	(1, 'Тег1'),
	(2, 'Мирный мир'),
	(3, 'Мировой шифр'),
	(17, 'Новый тег'),
	(18, 'Новый при новый тег');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;

-- Дамп структуры для таблица blog.tagDocument
CREATE TABLE IF NOT EXISTS `tagDocument` (
  `id_document` int(11) NOT NULL DEFAULT '0',
  `id_tag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_document`,`id_tag`),
  KEY `idx-tagDocument-id_document` (`id_document`),
  KEY `idx-tagDocument-id_tag` (`id_tag`),
  CONSTRAINT `fk-tagDocument-id_document` FOREIGN KEY (`id_document`) REFERENCES `document` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-tagDocument-id_tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.tagDocument: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `tagDocument` DISABLE KEYS */;
INSERT INTO `tagDocument` (`id_document`, `id_tag`) VALUES
	(3, 2),
	(3, 3);
/*!40000 ALTER TABLE `tagDocument` ENABLE KEYS */;

-- Дамп структуры для таблица blog.tagPost
CREATE TABLE IF NOT EXISTS `tagPost` (
  `id_post` int(11) NOT NULL DEFAULT '0',
  `id_tag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_post`,`id_tag`),
  KEY `idx-tagPost-id_post` (`id_post`),
  KEY `idx-tagPost-id_tag` (`id_tag`),
  CONSTRAINT `fk-tagPost-id_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-tagPost-id_tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.tagPost: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `tagPost` DISABLE KEYS */;
/*!40000 ALTER TABLE `tagPost` ENABLE KEYS */;

-- Дамп структуры для таблица blog.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы blog.user: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, '', 'YrEQRJw5yvjUKQTPOvsJMR7_a9x6p1hQ', '$2y$13$nFJcz8cipEZGROAitf2NXejPYKYPR.Kvabt28hYFj94uCLZ0zIjRK', NULL, 'admin@mail.ru', 10, 1550322551, 1550322551);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Дамп структуры для таблица blog.userFrontend
CREATE TABLE IF NOT EXISTS `userFrontend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_group` int(11) NOT NULL,
  `icon` text COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `id_group` (`id_group`),
  CONSTRAINT `FK_userFrontend_group` FOREIGN KEY (`id_group`) REFERENCES `group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы blog.userFrontend: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `userFrontend` DISABLE KEYS */;
INSERT INTO `userFrontend` (`id`, `name`, `middlename`, `patronymic`, `id_group`, `icon`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(5, 'fgdsfg', 'fgssdfg', 'fgsdf', 1, '', 'TfmhEYSxgFKXpa6ojMOX4oLcIrvw7inK', '$2y$13$VrLXBrZsbfYAxDqmSR9KG.LuwY4lAlJP6YCvxWNlCUFsSWZvLlZEm', NULL, 'urbanovich.ilia@mail.re', 10, 1550325876, 1550325876),
	(6, 'fgdsfg', 'fgssdfg', 'fgsdf', 1, '', '8ZRQ1sTUPhYdeTAfbcoNZjbIxKLAC2JM', '$2y$13$YOB7cgNqnuyQzsH4JgB9/ep6dNlwX3lBE2URGCn9LPYBrhBLK.kd.', NULL, 'admi@dm.tu', 10, 1550327682, 1550327682),
	(7, 'Виктор', 'Александрович', 'Алексеевич', 1, '', 'KjsF4twqYiLYxqyvgMsB3_bvBGMQuuL-', '$2y$13$8K18WfaeggSGVdknWfKlc.wfrTFpYBvuDA4IzJ6TygmeYhguMJNCa', NULL, 'admin@mail.ru', 10, 1550332338, 1550332338);
/*!40000 ALTER TABLE `userFrontend` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
