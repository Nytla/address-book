-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 05 2012 г., 01:22
-- Версия сервера: 5.0.45
-- Версия PHP: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `address_book`
--

-- --------------------------------------------------------

--
-- Структура таблицы `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL auto_increment,
  `login` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`) VALUES
(1, 'Kabul', '1'),
(2, 'Kandagar', '1'),
(3, 'Gerat', '1'),
(4, 'Dzhelalabad', '1'),
(5, 'Kunduz', '1'),
(6, 'Tirana', '2'),
(7, 'Durres', '2'),
(8, 'Jel''basan', '2'),
(9, 'Shkoder', '2'),
(10, 'Andorra-la-V''eha', '3'),
(11, 'Jeskal''des', '3'),
(12, 'Bengela', '4'),
(13, 'Kalukembe', '4'),
(14, 'Kuito', '4'),
(15, 'Lobitu', '4'),
(16, 'Luanda', '4'),
(17, 'Lubango', '4'),
(18, 'Lujena', '4'),
(12, 'Bengela', '4'),
(13, 'Kalukembe', '4'),
(14, 'Kuito', '4'),
(15, 'Lobitu', '4'),
(16, 'Luanda', '4'),
(17, 'Lubango', '4'),
(18, 'Lujena', '4'),
(19, 'Abovjan', '5'),
(20, 'Berd', '5'),
(21, 'Vagarshapat', '5'),
(22, 'Dvin', '5'),
(23, 'Erevan', '5'),
(24, 'Kapan', '5'),
(25, 'Talin', '5'),
(26, 'Sidnej', '6'),
(27, 'Pert', '6'),
(28, 'Vollongong', '6'),
(29, 'Hobart', '6'),
(30, 'Darvin', '6'),
(31, 'Ajzenshtadt', '7'),
(32, 'Brand', '7'),
(33, 'Bregenc', '7'),
(34, 'Brukk', '7'),
(35, 'Vena', '7');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) character set utf8 default NULL,
  `last_name` varchar(32) character set utf8 default NULL,
  `email` varchar(32) character set utf8 default NULL,
  `country` varchar(32) character set utf8 default NULL,
  `city` varchar(32) character set utf8 default NULL,
  `notes` varchar(3200) character set utf8 default NULL,
  `photo` varchar(255) character set utf8 default NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `email`, `country`, `city`, `notes`, `photo`) VALUES
(2, 'Serg ', 'Tviron', 'serg@mail.ru', 'Ukraine', 'Volun', 'Blasdasda', 'wqeqweqwe.jpg'),
(3, 'Sylveena ', 'Dilan', 'syl@mail.ru', 'USA', 'Ayova', 'BLAASas', ''),
(4, 'Isabel ', 'Byron', 'Isabel@mail.ru', 'Russia', 'Sankt-Peterburg', 'Isabel good girl.', 'Santana.jpg'),
(5, 'Frank ', 'Dilan', 'frank@mail.ru', 'USA', 'Ayova', 'Test information.', ''),
(6, 'Simona ', 'Dilan', 'simona@mail.ru', 'Russia', 'Moskva', 'Fdsf', ''),
(7, 'Dilan ', 'Cotton', 'dilan@mail.ru', 'USA', 'Aydaho', 'Uuuu', ''),
(8, 'Irma ', 'Cruz', 'irma@mail.ru', 'Ukraine', 'Kirovograd', 'Dsadasd', ''),
(9, 'Jose ', 'Manuel ', 'jose@mail.ru', 'Russia', 'Novosibirsk', 'Jose like music.', 'cov.jpg'),
(10, 'Maritza', 'Santiago', 'martitza@mail.ru', 'Russia', 'Moskva', 'Yttt', ''),
(11, 'Don ', 'Daniels', 'don@mail.ru', 'USA', 'Aydaho', 'Gdreertert.', ''),
(55, 'Brina', 'Villey', 'bri@mail.ru', 'Ukraine', 'Volun', '', 'Santana.jpg'),
(44, 'Nino', 'Katamadze', 'nino@gmail.com', 'Russia', 'Moskva', 'Nino is a good artist.', 'Philips SHP2000.jpg'),
(45, 'Pritty', 'Girl', 'pri@mail.ru', 'USA', 'Ayova', 'Pritty like bed boy.', ''),
(46, 'Triniti', 'Lodino', 'triniri@mail.ru', 'Ukraine', 'Vinnica', 'Triniti like running.', ''),
(35, 'Olson ', 'Brue', 'olson@mail.ru', 'Russia', 'Sankt-Peterburg', 'Is a good man.', ''),
(36, 'Yonia', 'Bonia', 'yonia@mail.ru', 'Ukraine', 'Vinnica', 'It is good.', ''),
(12, 'Donald ', 'Lamar', 'donald@mail.ru', 'Ukraine', 'Kirovograd', 'Fwewqeqwe.', ''),
(50, 'Varve', 'Gazlina', 'varve@mail.ru', 'Russia', 'Novosibirsk', 'Varve ...', ''),
(13, 'Debbie ', 'Jean', 'debbie@mail.ru', 'Russia', 'Moskva', 'Tettewerrew', ''),
(32, 'Tip', 'Top', 'tip@mail.ru', 'Russia', 'Sankt-Peterburg', '', 'myspacetopbanner2008uu7.jpg'),
(14, 'Debra ', 'Fair', 'debra@mail.ru', 'USA', 'Ayova', 'Hrttrrte.', ''),
(15, 'Donna ', 'Willochell', 'donna@mail.ru', 'Russia', 'Moskva', 'Dsderwrwer.', ''),
(39, 'Leni', 'Cravets', 'leni@mail.ru', 'USA', 'Ayova', 'Leni is a pop-star', ''),
(16, 'David ', 'Coffill', 'david@mail.ru', 'Ukraine', 'Volun', 'Rewwerwerwe', ''),
(33, 'Yo', 'Mo', 'yo@mail.ru', 'Ukraine', 'Volun', 'asdasd', 'myspacetopbanner2008uu7.jpg'),
(17, 'Doeum ', 'Avery', 'doeum@mail.ru', 'USA', 'Aydaho', 'Yrretwerwer', ''),
(18, 'Gray ', 'Em', 'gray@mail.ru', 'Russia', 'Moskva', 'Fdsdfsfsdjkljlkjlk', ''),
(1, 'Louis', 'Armstrong', 'louis@mail.ru', 'Ukraine', 'Kirovograd', 'Louis is a jazz star.', 'Philips SHP2000.jpg'),
(30, 'Vorin', 'Gluber', 'voriv@mail.ru', 'USA', 'Aydaho', 'This is a test info.', '00 front.jpg'),
(19, 'Gig', 'Obstrong', 'gir@mail.ru', 'USA', 'Aydaho', 'Ttrrwerweroi', ''),
(43, 'Horry', 'Trinar', 'hor@mail.ru', 'USA', 'Aydaho', 'Horry is a good boy.', 'Santana.jpg'),
(20, 'Ilizabet', 'Horry', 'ill@mail.ru', 'Ukraine', 'Kirovograd', 'Rewwe', ''),
(21, 'Onry', 'Govry', 'onry@mail.ru', 'USA', 'Ayova', 'qweqwe', ''),
(22, 'Kill', 'Bill', 'kill@mail.ru', 'Russia', 'Moskva', 'WEwqeqeqe', ''),
(23, 'Yank', 'Oric', 'yank@mail.ru', 'Ukraine', 'Volun', 'Dsasdasdwq', ''),
(24, 'Doop', 'Milon', 'doop@mail.ru', 'Ukraine', 'Kirovograd', 'Dsadasd', ''),
(25, 'Dorati', 'Banerden', 'dorati@mail.ru', 'USA', 'Aydaho', 'Rreerew', ''),
(52, 'Qietari', 'Botom', 'qi@mail.ru', 'USA', 'Alabama', 'Qi ...', ''),
(53, 'Dirty', 'Frid', 'dir@mail.ru', 'Ukraine', 'Volun', '', ''),
(54, 'Vifiran', 'Donrilo', 'vifi@mail.ru', 'Ukraine', 'Kirovograd', '', ''),
(41, 'Joe', 'Cocker', 'joe@mail.ru', 'Russia', 'Moskva', 'Joe is a blus-star', ''),
(26, 'Tonni', 'Anderson', 'tonni@mail.ru', 'Russia', 'Moskva', '', ''),
(27, 'Tina', 'Robin', 'tina@mail.ru', 'USA', 'Aydaho', 'Tina live in USA.', 'myspacetopbanner2008uu7.jpg'),
(28, 'Oni', 'Uni', 'oni@mail.ru', 'Russia', 'Sankt-Peterburg', 'Her name is Oni.', 'Scan-090806-0006.jpg'),
(29, 'Lilu', 'Bulu', 'lilu@mail.ru', 'Ukraine', 'Kirovograd', 'Liluuu.', 'cdnt7.jpg'),
(51, 'Shut', 'Pon', 'shut@mail.ru', 'Ukraine', 'Volun', 'Shut ...', ''),
(47, 'Piano', 'Chocolate', 'piano@mail.ru', 'Russia', 'Sankt-Peterburg', '', ''),
(48, 'Kidz', 'Bob', 'kizd@mail.ru', 'USA', 'Alabama', 'Kidz is a choir.', ''),
(49, 'Lynda', 'Lassi', 'lyn@mail.ru', 'USA', 'Aydaho', 'Lynda is a ...', ''),
(42, 'Alex', 'Simart', 'alex@mail.ru', 'Ukraine', 'Kirovograd', 'Sasha is a good bissnesman.', 'suit.JPG'),
(40, 'Hiromi ', 'Sokira', 'hirami@mail.ru', 'Ukraine', 'Kirovograd', 'Hiromi is a jazz-star', ''),
(38, 'Goterder', 'Stables', 'got@mail.ru', 'Russia', 'Novosibirsk', 'Got is a good men.', ''),
(37, 'Vinni', 'Puh', 'vinni@mail.ru', 'USA', 'Alabama', 'Vinni is a puh.', ''),
(31, 'Gor', 'Toldi', 'gor@mail.ru', 'USA', 'Ayova', '32131654', '00 front.jpg'),
(34, 'Abi', 'Fabi', 'abi@mail.ru', 'USA', 'Aydaho', 'Abi is a good girl.', ''),
(56, 'Anabi', 'Vassabi', 'anabi@google.com', 'USA', 'Aydaho', 'Anabi is a good girl.', NULL),
(57, 'Nora', 'Fried', 'nora@mail.ru', 'Ukraine', 'Volun', 'This is good girl.', 'Help-error.jpg'),
(58, 'Rita', 'Bor', 'rita@mail.ru', 'Ukraine', 'Kirovograd', 'Rita like big cats.', ''),
(59, 'Fred', 'Onielder', 'fred@mail.com', 'Ukraine', 'Kirovograd', 'fred@google.com', ''),
(60, 'Ven', 'Korcher', 'ven@mail.ru', 'Russia', 'Sankt-Peterburg', 'It is information about Ven.', ''),
(61, 'Acor', 'Donred', 'acor@mail.ru', 'Ukraine', 'Kirovograd', 'This is info.', ''),
(62, 'Suzi', 'Gobash', 'suzi@mail.com', 'USA', 'Ayova', 'This is suzi.', ''),
(63, 'Grin', 'Kamelton', 'grin@mail.com', 'Ukraine', 'Volun', 'Grin information.', ''),
(64, 'Etto', 'Rightom', 'etto@mail.ru', 'USA', 'Alabama', 'Information about Etto.', ''),
(65, 'Endry', 'Berimor', 'en@mail.ru', 'USA', 'Ayova', 'Blaaa.', 'Santana.jpg'),
(67, 'Nikol', 'Kidman', 'nikol@mail.ru', 'USA', 'Ayova', 'asdasd', ''),
(68, 'Viter', 'Oldin', 'viter@mail.ru', 'Russia', 'Moskva', 'werwer', ''),
(66, 'Mendi', 'Tailer', 'man@mail.ru', 'Ukraine', 'Vinnica', 'dfsdf', '');

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Afganistan'),
(2, 'Albania'),
(7, 'Austria'),
(3, 'Andorra'),
(4, 'Angola'),
(5, 'Armenia'),
(6, 'Australia');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
