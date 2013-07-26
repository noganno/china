-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 17 2013 г., 19:45
-- Версия сервера: 5.5.31-0ubuntu0.13.04.1
-- Версия PHP: 5.4.9-4ubuntu2.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yii_dev`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dev_category`
--

CREATE TABLE IF NOT EXISTS `dev_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias_cat` varchar(255) NOT NULL,
  `position` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `dev_category`
--

INSERT INTO `dev_category` (`id`, `title`, `alias_cat`, `position`) VALUES
(1, 'Общая', '/', '2'),
(2, 'Статьи', 'articles', '2'),
(4, 'Информационная страница', 'content', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `dev_comments`
--

CREATE TABLE IF NOT EXISTS `dev_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `material_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_website` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `dev_comments`
--

INSERT INTO `dev_comments` (`id`, `content`, `material_id`, `created`, `user_id`, `user_name`, `user_email`, `user_website`) VALUES
(32, 'Тестовый камент', 3, 1373791526, 0, 'Никита', 'admin@admin.com', ''),
(34, 'Тестовый камент 2', 3, 1373786189, 0, 'Сергей(администратор)', 'info@q-seo.ru', 'q-seo.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `dev_content`
--

CREATE TABLE IF NOT EXISTS `dev_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `introtext` text,
  `content` text,
  `alias` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `uri` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `dev_content`
--

INSERT INTO `dev_content` (`id`, `title`, `introtext`, `content`, `alias`, `description`, `keywords`, `uri`, `created`, `status`, `category_id`) VALUES
(1, 'Yii  - The Fast, Secure and Professional PHP Framework ', '4', ' <h2>\r\nYii is a\r\n<a href="/performance/">high-performance</a>\r\nPHP framework best for developing Web 2.0 applications.\r\n</h2>', 'yii-framework.html', 'Опубликована', 'Опубликована', '/content/yii-framework.html', 345436456, 1, 4),
(2, 'Контакты', 'Адрес', '<p> Адрес: 123242, Россия, Москва, Большой Предтеченский переулок, д. ...</p>\r\n<p>Секретарь - Тел.: (499) 999-999-999,  Факс: (499) 9999-9999-9999 </p>', 'contacts', '', '', '/contacts', 1371715980, 1, 1),
(3, 'О нашей компании', '333', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	', 'aboutus', '3333334545346', '46456457567', '/content/aboutus', 1371902918, 1, 4),
(4, 'Главная', '5', '<p>Контент главной страницы</p>\r\n<p>Показ  заголовка отключен в контроллере</p>', '/', '', '', '/', 1371905700, 1, 1),
(5, 'Продукция', '1', 'Проду́кция — термин, характеризующий результат производственной, хозяйственной деятельности. Представляет собой совокупность продуктов, явившихся результатом производства отдельного предприятия, отрасли промышленности', 'product', '', '', '/product', 1371922804, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `dev_filescounter`
--

CREATE TABLE IF NOT EXISTS `dev_filescounter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `remote_addr` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `dev_filescounter`
--

INSERT INTO `dev_filescounter` (`id`, `filename`, `remote_addr`, `date`) VALUES
(1, 'проверка', '93.170.76.57', 1372081911);

-- --------------------------------------------------------

--
-- Структура таблицы `dev_settings`
--

CREATE TABLE IF NOT EXISTS `dev_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

--
-- Дамп данных таблицы `dev_settings`
--

INSERT INTO `dev_settings` (`id`, `option_name`, `option_value`) VALUES
(1, 'siteurl', 'http://yii-dev.loc'),
(2, 'sitename', 'Название сайта'),
(129, 'company_name', 'Моя компания'),
(5, 'admin_email', 'admin@admin'),
(18, 'default_comment_status', 'open'),
(19, 'default_ping_status', 'open'),
(20, 'default_pingback_flag', '1'),
(132, 'slogan', 'Текст слогана'),
(133, 'social_text', 'Текст для заголовка в социальных кнопках'),
(31, 'gzipcompression', '0'),
(32, 'hack_file', '0'),
(33, 'blog_charset', 'UTF-8'),
(34, 'moderation_keys', ''),
(35, 'active_plugins', 'a:0:{}'),
(36, 'home', 'http://example.com'),
(37, 'category_base', ''),
(38, 'ping_sites', 'http://rpc.pingomatic.com/'),
(39, 'advanced_edit', '0'),
(40, 'comment_max_links', '2'),
(41, 'gmt_offset', '4'),
(42, 'default_email_category', '1'),
(43, 'recently_edited', ''),
(44, 'template', 'bootstrap'),
(45, 'stylesheet', 'bootstrap'),
(46, 'comment_whitelist', '1'),
(47, 'blacklist_keys', ''),
(48, 'comment_registration', '0'),
(49, 'html_type', 'text/html'),
(50, 'use_trackback', '0'),
(51, 'default_role', 'subscriber'),
(52, 'db_version', '22441'),
(53, 'uploads_use_yearmonth_folders', '1'),
(54, 'upload_path', ''),
(55, 'blog_public', '1'),
(56, 'default_link_category', '2'),
(57, 'show_on_front', 'posts'),
(58, 'tag_base', ''),
(59, 'show_avatars', '1'),
(60, 'avatar_rating', 'G'),
(61, 'upload_url_path', ''),
(62, 'thumbnail_size_w', '150'),
(63, 'thumbnail_size_h', '150'),
(64, 'thumbnail_crop', '1'),
(65, 'medium_size_w', '300'),
(66, 'medium_size_h', '300'),
(67, 'avatar_default', 'mystery'),
(68, 'large_size_w', '1024'),
(69, 'large_size_h', '1024'),
(70, 'image_default_link_type', 'file'),
(71, 'image_default_size', ''),
(72, 'image_default_align', ''),
(73, 'close_comments_for_old_posts', '0'),
(74, 'close_comments_days_old', '14'),
(75, 'thread_comments', '1'),
(76, 'thread_comments_depth', '5'),
(77, 'page_comments', '0'),
(78, 'comments_per_page', '50'),
(79, 'default_comments_page', 'newest'),
(80, 'comment_order', 'asc'),
(130, 'add_to_title', 'Дополнение в заголовок'),
(131, 'charset', 'utf-8');

-- --------------------------------------------------------

--
-- Структура таблицы `dev_statistic`
--

CREATE TABLE IF NOT EXISTS `dev_statistic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` text CHARACTER SET utf8,
  `date` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `dev_user`
--

CREATE TABLE IF NOT EXISTS `dev_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` int(11) NOT NULL,
  `ban` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `dev_user`
--

INSERT INTO `dev_user` (`id`, `username`, `password`, `created`, `ban`, `role`) VALUES
(1, 'admin', '0c7540eb7e65b553ec1ba6b20de79608', 465645767, 0, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
