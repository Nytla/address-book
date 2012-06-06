-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Хост: localhost
-- Время создания: Сен 01 2011 г., 15:15
-- Версия сервера: 5.0.45
-- Версия PHP: 5.2.4
-- 
-- БД: `address_book`
-- 

-- --------------------------------------------------------

-- 
-- Структура таблицы `clients`
-- 

CREATE TABLE `clients` (
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

INSERT INTO `clients` VALUES (2, 'Serg ', 'Tviron', 'serg@mail.ru', 'Ukraine', 'Volun', 'Blasdasda', '');
INSERT INTO `clients` VALUES (3, 'Sylveena ', 'Dilan', 'syl@mail.ru', 'USA', 'Ayova', 'BLAASas', '');
INSERT INTO `clients` VALUES (4, 'Isabel ', 'Byron', 'Isabel@mail.ru', 'Russia', 'Sankt-Peterburg', 'Isabel good girl.', 'Santana.jpg');
INSERT INTO `clients` VALUES (5, 'Frank ', 'Dilan', 'frank@mail.ru', 'USA', 'Ayova', 'Test information.', '');
INSERT INTO `clients` VALUES (6, 'Simona ', 'Dilan', 'simona@mail.ru', 'Russia', 'Moskva', 'Fdsf', '');
INSERT INTO `clients` VALUES (7, 'Dilan ', 'Cotton', 'dilan@mail.ru', 'USA', 'Aydaho', 'Uuuu', '');
INSERT INTO `clients` VALUES (8, 'Irma ', 'Cruz', 'irma@mail.ru', 'Ukraine', 'Kirovograd', 'Dsadasd', '');
INSERT INTO `clients` VALUES (9, 'Jose ', 'Manuel ', 'jose@mail.ru', 'Russia', 'Novosibirsk', 'Jose like music.', 'cov.jpg');
INSERT INTO `clients` VALUES (10, 'Maritza', 'Santiago', 'martitza@mail.ru', 'Russia', 'Moskva', 'Yttt', '');
INSERT INTO `clients` VALUES (11, 'Don ', 'Daniels', 'don@mail.ru', 'USA', 'Aydaho', 'Gdreertert.', '');
INSERT INTO `clients` VALUES (55, 'Brina', 'Villey', 'bri@mail.ru', 'Ukraine', 'Volun', '', 'Santana.jpg');
INSERT INTO `clients` VALUES (44, 'Nino', 'Katamadze', 'nino@gmail.com', 'Russia', 'Moskva', 'Nino is a good artist.', 'Philips SHP2000.jpg');
INSERT INTO `clients` VALUES (45, 'Pritty', 'Girl', 'pri@mail.ru', 'USA', 'Ayova', 'Pritty like bed boy.', '');
INSERT INTO `clients` VALUES (46, 'Triniti', 'Lodino', 'triniri@mail.ru', 'Ukraine', 'Vinnica', 'Triniti like running.', '');
INSERT INTO `clients` VALUES (35, 'Olson ', 'Brue', 'olson@mail.ru', 'Russia', 'Sankt-Peterburg', 'Is a good man.', '');
INSERT INTO `clients` VALUES (36, 'Yonia', 'Bonia', 'yonia@mail.ru', 'Ukraine', 'Vinnica', 'It is good.', '');
INSERT INTO `clients` VALUES (12, 'Donald ', 'Lamar', 'donald@mail.ru', 'Ukraine', 'Kirovograd', 'Fwewqeqwe.', '');
INSERT INTO `clients` VALUES (50, 'Varve', 'Gazlina', 'varve@mail.ru', 'Russia', 'Novosibirsk', 'Varve ...', '');
INSERT INTO `clients` VALUES (13, 'Debbie ', 'Jean', 'debbie@mail.ru', 'Russia', 'Moskva', 'Tettewerrew', '');
INSERT INTO `clients` VALUES (32, 'Tip', 'Top', 'tip@mail.ru', 'Russia', 'Sankt-Peterburg', '', 'myspacetopbanner2008uu7.jpg');
INSERT INTO `clients` VALUES (14, 'Debra ', 'Fair', 'debra@mail.ru', 'USA', 'Ayova', 'Hrttrrte.', '');
INSERT INTO `clients` VALUES (15, 'Donna ', 'Willochell', 'donna@mail.ru', 'Russia', 'Moskva', 'Dsderwrwer.', '');
INSERT INTO `clients` VALUES (39, 'Leni', 'Cravets', 'leni@mail.ru', 'USA', 'Ayova', 'Leni is a pop-star', '');
INSERT INTO `clients` VALUES (16, 'David ', 'Coffill', 'david@mail.ru', 'Ukraine', 'Volun', 'Rewwerwerwe', '');
INSERT INTO `clients` VALUES (33, 'Yo', 'Mo', 'yo@mail.ru', 'Ukraine', 'Volun', 'asdasd', 'myspacetopbanner2008uu7.jpg');
INSERT INTO `clients` VALUES (17, 'Doeum ', 'Avery', 'doeum@mail.ru', 'USA', 'Aydaho', 'Yrretwerwer', '');
INSERT INTO `clients` VALUES (18, 'Gray ', 'Em', 'gray@mail.ru', 'Russia', 'Moskva', 'Fdsdfsfsdjkljlkjlk', '');
INSERT INTO `clients` VALUES (1, 'Louis', 'Armstrong', 'louis@mail.ru', 'Ukraine', 'Kirovograd', 'Louis is a jazz star.', 'Philips SHP2000.jpg');
INSERT INTO `clients` VALUES (30, 'Vorin', 'Gluber', 'voriv@mail.ru', 'USA', 'Aydaho', 'This is a test info.', '00 front.jpg');
INSERT INTO `clients` VALUES (19, 'Gig', 'Obstrong', 'gir@mail.ru', 'USA', 'Aydaho', 'Ttrrwerweroi', '');
INSERT INTO `clients` VALUES (43, 'Horry', 'Trinar', 'hor@mail.ru', 'USA', 'Aydaho', 'Horry is a good boy.', 'Santana.jpg');
INSERT INTO `clients` VALUES (20, 'Ilizabet', 'Horry', 'ill@mail.ru', 'Ukraine', 'Kirovograd', 'Rewwe', '');
INSERT INTO `clients` VALUES (21, 'Onry', 'Govry', 'onry@mail.ru', 'USA', 'Ayova', 'qweqwe', '');
INSERT INTO `clients` VALUES (22, 'Kill', 'Bill', 'kill@mail.ru', 'Russia', 'Moskva', 'WEwqeqeqe', '');
INSERT INTO `clients` VALUES (23, 'Yank', 'Oric', 'yank@mail.ru', 'Ukraine', 'Volun', 'Dsasdasdwq', '');
INSERT INTO `clients` VALUES (24, 'Doop', 'Milon', 'doop@mail.ru', 'Ukraine', 'Kirovograd', 'Dsadasd', '');
INSERT INTO `clients` VALUES (25, 'Dorati', 'Banerden', 'dorati@mail.ru', 'USA', 'Aydaho', 'Rreerew', '');
INSERT INTO `clients` VALUES (52, 'Qietari', 'Botom', 'qi@mail.ru', 'USA', 'Alabama', 'Qi ...', '');
INSERT INTO `clients` VALUES (53, 'Dirty', 'Frid', 'dir@mail.ru', 'Ukraine', 'Volun', '', '');
INSERT INTO `clients` VALUES (54, 'Vifiran', 'Donrilo', 'vifi@mail.ru', 'Ukraine', 'Kirovograd', '', '');
INSERT INTO `clients` VALUES (41, 'Joe', 'Cocker', 'joe@mail.ru', 'Russia', 'Moskva', 'Joe is a blus-star', '');
INSERT INTO `clients` VALUES (26, 'Tonni', 'Anderson', 'tonni@mail.ru', 'Russia', 'Moskva', '', '');
INSERT INTO `clients` VALUES (27, 'Tina', 'Robin', 'tina@mail.ru', 'USA', 'Aydaho', 'Tina live in USA.', 'myspacetopbanner2008uu7.jpg');
INSERT INTO `clients` VALUES (28, 'Oni', 'Uni', 'oni@mail.ru', 'Russia', 'Sankt-Peterburg', 'Her name is Oni.', 'Scan-090806-0006.jpg');
INSERT INTO `clients` VALUES (29, 'Lilu', 'Bulu', 'lilu@mail.ru', 'Ukraine', 'Kirovograd', 'Liluuu.', 'cdnt7.jpg');
INSERT INTO `clients` VALUES (51, 'Shut', 'Pon', 'shut@mail.ru', 'Ukraine', 'Volun', 'Shut ...', '');
INSERT INTO `clients` VALUES (47, 'Piano', 'Chocolate', 'piano@mail.ru', 'Russia', 'Sankt-Peterburg', '', '');
INSERT INTO `clients` VALUES (48, 'Kidz', 'Bob', 'kizd@mail.ru', 'USA', 'Alabama', 'Kidz is a choir.', '');
INSERT INTO `clients` VALUES (49, 'Lynda', 'Lassi', 'lyn@mail.ru', 'USA', 'Aydaho', 'Lynda is a ...', '');
INSERT INTO `clients` VALUES (42, 'Alex', 'Simart', 'alex@mail.ru', 'Ukraine', 'Kirovograd', 'Sasha is a good bissnesman.', 'suit.JPG');
INSERT INTO `clients` VALUES (40, 'Hiromi ', 'Sokira', 'hirami@mail.ru', 'Ukraine', 'Kirovograd', 'Hiromi is a jazz-star', '');
INSERT INTO `clients` VALUES (38, 'Goterder', 'Stables', 'got@mail.ru', 'Russia', 'Novosibirsk', 'Got is a good men.', '');
INSERT INTO `clients` VALUES (37, 'Vinni', 'Puh', 'vinni@mail.ru', 'USA', 'Alabama', 'Vinni is a puh.', '');
INSERT INTO `clients` VALUES (31, 'Gor', 'Toldi', 'gor@mail.ru', 'USA', 'Ayova', '32131654', '00 front.jpg');
INSERT INTO `clients` VALUES (34, 'Abi', 'Fabi', 'abi@mail.ru', 'USA', 'Aydaho', 'Abi is a good girl.', '');
INSERT INTO `clients` VALUES (56, 'Anabi', 'Vassabi', 'anabi@google.com', 'USA', 'Aydaho', 'Anabi is a good girl.', NULL);
INSERT INTO `clients` VALUES (57, 'Nora', 'Fried', 'nora@mail.ru', 'Ukraine', 'Volun', 'This is good girl.', 'Help-error.jpg');
INSERT INTO `clients` VALUES (58, 'Rita', 'Bor', 'rita@mail.ru', 'Ukraine', 'Kirovograd', 'Rita like big cats.', '');
INSERT INTO `clients` VALUES (59, 'Fred', 'Onielder', 'fred@mail.com', 'Ukraine', 'Kirovograd', 'fred@google.com', '');
INSERT INTO `clients` VALUES (60, 'Ven', 'Korcher', 'ven@mail.ru', 'Russia', 'Sankt-Peterburg', 'It is information about Ven.', '');
INSERT INTO `clients` VALUES (61, 'Acor', 'Donred', 'acor@mail.ru', 'Ukraine', 'Kirovograd', 'This is info.', '');
INSERT INTO `clients` VALUES (62, 'Suzi', 'Gobash', 'suzi@mail.com', 'USA', 'Ayova', 'This is suzi.', '');
INSERT INTO `clients` VALUES (63, 'Grin', 'Kamelton', 'grin@mail.com', 'Ukraine', 'Volun', 'Grin information.', '');
INSERT INTO `clients` VALUES (64, 'Etto', 'Rightom', 'etto@mail.ru', 'USA', 'Alabama', 'Information about Etto.', '');
INSERT INTO `clients` VALUES (65, 'Endry', 'Berimor', 'en@mail.ru', 'USA', 'Ayova', 'Blaaa.', 'Santana.jpg');
INSERT INTO `clients` VALUES (67, 'Nikol', 'Kidman', 'nikol@mail.ru', 'USA', 'Ayova', 'asdasd', '');
INSERT INTO `clients` VALUES (68, 'Viter', 'Oldin', 'viter@mail.ru', 'Russia', 'Moskva', 'werwer', '');
INSERT INTO `clients` VALUES (66, 'Mendi', 'Tailer', 'man@mail.ru', 'Ukraine', 'Vinnica', 'dfsdf', '');