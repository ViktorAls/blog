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
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL DEFAULT '0',
  `id_parent` int(11) DEFAULT '0',
  `text` text NOT NULL,
  `created_at` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.comment: ~14 rows (приблизительно)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`id_comment`, `id_post`, `id_parent`, `text`, `created_at`, `id_user`) VALUES
	(1, 1, 0, 'Первый', '2019-02-02 14:05:28', 2),
	(2, 1, 0, 'Второй', '2019-02-02 14:05:37', 1),
	(3, 1, 111, 'ytxtqys', '2019-02-02 14:08:00', 2),
	(4, 1, 2, '2,4', '2019-02-02 14:08:12', 2),
	(5, 1, 3, '3,5', '2019-02-02 14:08:23', 1),
	(6, 1, 4, '4,6', '2019-02-02 14:08:50', 1),
	(7, 1, 5, '5,7', '2019-02-02 14:20:10', 2),
	(8, 1, 3, '3,8', '2019-02-02 14:20:11', 2),
	(9, 1, 2, '2,9', '2019-02-02 14:20:11', 2),
	(10, 1, 7, '7,10', '2019-02-02 14:27:46', 2),
	(11, 1, 6, '6,11', '2019-02-02 14:27:57', 2),
	(12, 1, 7, '7,12', '2019-02-02 14:28:04', 2),
	(13, 1, 2, '2,13', '2019-02-02 14:43:54', 1),
	(14, 1, 1, '1,14', '2019-02-02 14:48:09', 1),
	(15, 1, 4, '4,15', '0000-00-00 00:00:00', 1);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Дамп структуры для таблица blog.document
CREATE TABLE IF NOT EXISTS `document` (
  `id_document` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `href` text NOT NULL,
  `description` text NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `id_lesson` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_document`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.document: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` (`id_document`, `name`, `href`, `description`, `updated_at`, `created_at`, `id_lesson`) VALUES
	(1, 'Выходит ne очень', 'txt.svg', 'Посмотрим что из этого выйдет. A kak ', 2147483647, 2147483647, 3),
	(2, 'Новый документ', 'txt.svg', '12fdsdfdas', 2147483647, 2147483647, 2),
	(3, 'Не очень новый документ', 'txt.svg', '12fdsdfdas', 2147483647, 2147483647, 2),
	(4, 'Очень очень новый документ', 'txt.svg', '12fdsdfdas', 2147483647, 2147483647, 1),
	(5, 'Самый не новый документ', 'txt.svg', '12fdsdfdas', 2147483647, 2147483647, 1);
/*!40000 ALTER TABLE `document` ENABLE KEYS */;

-- Дамп структуры для таблица blog.group
CREATE TABLE IF NOT EXISTS `group` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.group: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` (`id_group`, `name`) VALUES
	(1, '21-11-26ТП');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;

-- Дамп структуры для таблица blog.information
CREATE TABLE IF NOT EXISTS `information` (
  `id_information` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `value` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id_information`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.information: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `information` DISABLE KEYS */;
INSERT INTO `information` (`id_information`, `name`, `value`, `comment`) VALUES
	(1, 'vkontakte', 'http://vk.com/id1', ''),
	(5, 'mail', 'mail@ru.ru', ''),
	(6, 'facebook', 'fds', ''),
	(7, 'pointOfView', 'Даже Не знаю что тут сказать', ''),
	(8, 'AboutMe', 'Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi', 'Страница О себе. Главная запись'),
	(10, 'WhoAmI', 'Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit', 'Страница О себе. Кто я'),
	(12, 'MyMission', 'Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit', 'Страница О себе. Моя миссия'),
	(13, 'MyOpinion', 'Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit', 'Страница О себе. Мой взгляд'),
	(14, 'MyValues', 'Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit', 'Страница О себе. Мой ценности');
/*!40000 ALTER TABLE `information` ENABLE KEYS */;

-- Дамп структуры для таблица blog.lesson
CREATE TABLE IF NOT EXISTS `lesson` (
  `id_lesson` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_lesson`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.lesson: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `lesson` DISABLE KEYS */;
INSERT INTO `lesson` (`id_lesson`, `name`) VALUES
	(1, 'Новый урок'),
	(2, 'Очень Новый Урок');
/*!40000 ALTER TABLE `lesson` ENABLE KEYS */;

-- Дамп структуры для таблица blog.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.migration: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1547484568),
	('m130524_201442_init', 1547484570),
	('m160821_095131_create_comment_table', 1549104941),
	('m160821_100528_create_article_table', 1549104942),
	('m160821_200405_add_position_column_to_comment_table', 1549104944),
	('m160822_184711_add_position_column_to_comment_table', 1549104945);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Дамп структуры для таблица blog.post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL COMMENT 'название',
  `description` text NOT NULL COMMENT 'описание',
  `created_at` bigint(20) NOT NULL COMMENT 'создал',
  `updated_at` bigint(20) NOT NULL COMMENT 'обновил',
  `type` int(11) NOT NULL COMMENT 'тип записи (аудио, видео,просто пост)',
  `icon` text NOT NULL,
  `id_lesson` int(11) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=340 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.post: ~14 rows (приблизительно)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id_post`, `title`, `description`, `created_at`, `updated_at`, `type`, `icon`, `id_lesson`) VALUES
	(1, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 154885766, 1548857663, 2, 'herobg.jpg', 1),
	(2, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньv', 'Даже не знаю как сюда что писать ну пОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньускай будет пока что так. потмо гасим lore,', 1548857663, 1548857663, 2, 'kek.jpg', 1),
	(5, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Даже не знаю как сюда что писать ну Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньпускай будет пока что так. потмо гасим lore,', 1548857663, 1548857663, 2, 'kek.jpg', 1),
	(6, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 1548857663, 1548857663, 2, 'kek.jpg', 2),
	(7, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Даже не знаю как сюда что писать ну Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньбудет пока что так. потмо гасим lore,', 154885766, 154885766, 1, 'lolka.jpg', 1),
	(8, 'Аудио Очень, ну прям очень интерестная стратья, без которой жизнь не жизньпост', 'Даже не знаю как сюда что писать ну пускай будет пока что так. потмо гасим lore,', 1548857663, 1548857663, 2, 'kek.jpg', 2),
	(9, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям', 'Даже не знаю как сюда что писать ну пуОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньскай будет пока что так. потмо гасим lore,', 154885766, 1548857663, 1, 'kek.jpg', 2),
	(11, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 1548857663, 1548857663, 2, 'kek.jpg', 1),
	(12, 'АудОчень, ну прям очень интерестная стратья, без которой жизнь не жизньио пост', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 1548857663, 1548857663, 2, 'kek.jpg', 2),
	(335, 'апвыапва', 'укецуке', 154885766, 0, 2, 'lolka.jpg', 1),
	(336, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 1548857663, 1548857663, 2, 'kek.jpg', 2),
	(337, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 1548857663, 1548857663, 2, 'kek.jpg', 1),
	(338, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 1548857663, 1548857663, 2, 'kek.jpg', 1),
	(339, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 2048857663, 1548857663, 2, 'kek.jpg', 1);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Дамп структуры для таблица blog.postFile
CREATE TABLE IF NOT EXISTS `postFile` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `id_post` int(11) NOT NULL,
  PRIMARY KEY (`id_file`),
  KEY `id_post` (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.postFile: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `postFile` DISABLE KEYS */;
INSERT INTO `postFile` (`id_file`, `name`, `id_post`) VALUES
	(1, 'AirReview-Landmarks-02-ChasingCorporate.mp3', 1),
	(2, 'AirReview-Landmarks-02-ChasingCorporate.mp3', 1),
	(3, 'herobg.jpg', 7),
	(4, 'herobg.jpg', 7);
/*!40000 ALTER TABLE `postFile` ENABLE KEYS */;

-- Дамп структуры для таблица blog.tag
CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.tag: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` (`id_tag`, `name`) VALUES
	(1, 'Миру мир'),
	(2, 'Мирный мир'),
	(3, 'Мировой шифр'),
	(17, 'Новый тег'),
	(18, 'Новый при новый тег');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;

-- Дамп структуры для таблица blog.tagDocument
CREATE TABLE IF NOT EXISTS `tagDocument` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_document` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.tagDocument: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `tagDocument` DISABLE KEYS */;
INSERT INTO `tagDocument` (`id`, `id_document`, `id_tag`) VALUES
	(1, 1, 1),
	(2, 3, 1),
	(3, 4, 1),
	(4, 5, 1),
	(5, 2, 1),
	(6, 6, 1),
	(7, 4, 2),
	(8, 4, 4);
/*!40000 ALTER TABLE `tagDocument` ENABLE KEYS */;

-- Дамп структуры для таблица blog.tagPost
CREATE TABLE IF NOT EXISTS `tagPost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.tagPost: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `tagPost` DISABLE KEYS */;
INSERT INTO `tagPost` (`id`, `id_post`, `id_tag`) VALUES
	(1, 1, 1),
	(2, 335, 2),
	(3, 3, 1),
	(4, 4, 1),
	(5, 5, 1),
	(6, 6, 1),
	(7, 7, 1),
	(8, 8, 2),
	(9, 9, 2),
	(10, 10, 3),
	(11, 11, 2),
	(12, 12, 2),
	(13, 3, 2),
	(14, 1, 2),
	(15, 3, 3),
	(16, 335, 1);
/*!40000 ALTER TABLE `tagPost` ENABLE KEYS */;

-- Дамп структуры для таблица blog.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_group` int(11) NOT NULL DEFAULT '0',
  `icon` text COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`name`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы blog.user: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `middlename`, `patronymic`, `id_group`, `icon`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Виктор', 'Алексеевич', 'Александрович', 1, '1549576026_GzIsxz.png', 'd6K77igBYRYJ6QmZbwDMCbnvgJ6T-aLy', '$2y$13$lS3jEoOVSqK78XCdMbvyRefm3iLXVNuFxhAAP0XAwbgzFDSgg72QG', NULL, 'vitia14@mail.ru', 10, 1548857663, 1548857663),
	(2, 'Анастасия', 'Семёнова', 'Александровна', 1, '1549576026_GzIsxz.png', 'J3vZUBKegHW2Ic_XBkoUCW9hc3zOYLlL', '$2y$13$OLBJ8AVo7PK.0p0vXcyBsOjNSae1bAKb3tQlPECJ13seuT4zTysgq', NULL, 'vip.viktor98@yandex.ru', 10, 1549041948, 1549576026);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
