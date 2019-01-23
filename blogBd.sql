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

-- Дамп структуры для таблица blog.document
CREATE TABLE IF NOT EXISTS `document` (
  `id_document` int(11) NOT NULL,
  `name` text NOT NULL,
  `href` text NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.document: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
/*!40000 ALTER TABLE `document` ENABLE KEYS */;

-- Дамп структуры для таблица blog.information
CREATE TABLE IF NOT EXISTS `information` (
  `id_information` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id_information`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.information: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `information` DISABLE KEYS */;
INSERT INTO `information` (`id_information`, `name`, `value`) VALUES
	(1, 'vkontakte', 'http://vk.com/id1'),
	(5, 'mail', 'mail@ru.ru'),
	(6, 'facebook', 'fds'),
	(7, 'pointOfView', 'Даже Не знаю что тут сказать');
/*!40000 ALTER TABLE `information` ENABLE KEYS */;

-- Дамп структуры для таблица blog.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.migration: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1547484568),
	('m130524_201442_init', 1547484570);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Дамп структуры для таблица blog.post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL COMMENT 'название',
  `description` text NOT NULL COMMENT 'описание',
  `created_at` bigint(20) NOT NULL COMMENT 'создал',
  `updated_at` bigint(20) NOT NULL COMMENT 'обновил',
  `type` int(11) NOT NULL COMMENT 'тип записи (аудио, видео,просто пост)',
  `icon` text,
  `have_looked` int(11) NOT NULL DEFAULT '0' COMMENT 'Просмотренно',
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=340 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы blog.post: ~13 rows (приблизительно)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id_post`, `title`, `description`, `created_at`, `updated_at`, `type`, `icon`, `have_looked`) VALUES
	(1, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 123143253, 34234, 2, 'herobg.jpg', 1),
	(2, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньv', 'Даже не знаю как сюда что писать ну пОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньускай будет пока что так. потмо гасим lore,', 123143253, 2134, 2, 'kek.jpg', 1),
	(5, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Даже не знаю как сюда что писать ну Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньпускай будет пока что так. потмо гасим lore,', 123143253, 2134, 2, 'kek.jpg', 1),
	(6, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 123143253, 2134, 2, 'kek.jpg', 1),
	(7, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Даже не знаю как сюда что писать ну Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньбудет пока что так. потмо гасим lore,', 123143253, 342342313, 1, 'lolka.jpg', 1),
	(8, 'Аудио Очень, ну прям очень интерестная стратья, без которой жизнь не жизньпост', 'Даже не знаю как сюда что писать ну пускай будет пока что так. потмо гасим lore,', 123143253, 2134, 2, 'kek.jpg', 1),
	(9, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям', 'Даже не знаю как сюда что писать ну пуОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньскай будет пока что так. потмо гасим lore,', 123143253, 342342313, 1, 'kek.jpg', 1),
	(11, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 123143253, 2134, 2, 'kek.jpg', 1),
	(12, 'АудОчень, ну прям очень интерестная стратья, без которой жизнь не жизньио пост', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 123143253, 2134, 2, 'kek.jpg', 1),
	(335, 'апвыапва', 'укецуке', 231423412, 31423, 2, 'lolka.jpg', 0),
	(336, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 123143253, 2134, 2, 'kek.jpg', 1),
	(337, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 123143253, 2134, 2, 'kek.jpg', 1),
	(338, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 123143253, 2134, 2, 'kek.jpg', 1),
	(339, 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 'Очень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизньОчень, ну прям очень интерестная стратья, без которой жизнь не жизнь', 123143253, 2134, 2, 'kek.jpg', 1);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Дамп структуры для таблица blog.postFile
CREATE TABLE IF NOT EXISTS `postFile` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы blog.user: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
