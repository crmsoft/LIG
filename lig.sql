-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 09 2014 г., 16:31
-- Версия сервера: 5.5.38-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lig`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `p2`(IN `arg` INT UNSIGNED)
    DETERMINISTIC
    COMMENT 'A procedure'
BEGIN 
   DECLARE done INT DEFAULT FALSE; 
   DECLARE h, ou, s1, s2, igri,pobedi,porajenie,nichya,srednaya,balli INT;

   DECLARE cur1 CURSOR FOR SELECT home, home_score, out_score, outside from games 
	where week <= arg; 
    

	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

   UPDATE `puandurumu` SET `p`=0,`o`=arg,`g`=0,`b`=0,`m`=0,`av`=0, at=0, ye=0, tahmin=0 WHERE 1;

   OPEN cur1;
	
	read_loop: LOOP

    FETCH cur1 INTO h, s1, s2, ou;
	IF !done THEN
		update puandurumu set at=at+s1, ye=ye+s2 where team_id=h;
		update puandurumu set at=at+s2, ye=ye+s1 where team_id=ou;
		IF s1 > s2 THEN
	 	 update puandurumu set p=p+3,g=g+1 where team_id=h;
         update puandurumu set m=m+1 where team_id=ou;
		ELSEIF s1 < s2 THEN
	 	 update puandurumu set p=p+3,g=g+1 where team_id=ou;
         update puandurumu set m=m+1 where team_id=h;
		ELSE
	 	 update puandurumu set p=p+1, b=b+1 where team_id=h or team_id=ou;
		END IF;

	ELSE    
      LEAVE read_loop;
    END IF;

   END LOOP;
	update puandurumu set av=at-ye where 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `home` int(11) NOT NULL,
  `home_score` int(11) NOT NULL,
  `out_score` int(11) NOT NULL,
  `outside` int(11) NOT NULL,
  `week` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `home`, `home_score`, `out_score`, `outside`, `week`) VALUES
(1, 18, 1, 0, 3, 1),
(2, 2, 1, 3, 11, 1),
(3, 11, 3, 0, 18, 2),
(4, 3, 5, 0, 2, 2),
(5, 3, 1, 3, 18, 3),
(6, 11, 2, 0, 2, 3),
(7, 18, 5, 0, 11, 4),
(8, 2, 3, 1, 3, 4),
(9, 2, 1, 5, 18, 5),
(10, 3, 0, 3, 11, 5),
(11, 18, 4, 1, 2, 6),
(12, 11, 3, 1, 3, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `puandurumu`
--

CREATE TABLE IF NOT EXISTS `puandurumu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p` int(11) NOT NULL,
  `o` int(11) NOT NULL,
  `g` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  `av` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `at` int(11) NOT NULL,
  `ye` int(11) NOT NULL,
  `tahmin` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `puandurumu`
--

INSERT INTO `puandurumu` (`id`, `p`, `o`, `g`, `b`, `m`, `av`, `team_id`, `at`, `ye`, `tahmin`) VALUES
(1, 3, 6, 1, 0, 5, -5, 3, 8, 13, 0),
(2, 15, 6, 5, 0, 1, 7, 11, 14, 7, 0),
(3, 3, 6, 1, 0, 5, -14, 2, 6, 20, 0),
(4, 15, 6, 5, 0, 1, 12, 18, 18, 6, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `selected` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `teams`
--

INSERT INTO `teams` (`id`, `name`, `logo`, `selected`) VALUES
(1, 'Beşiktaş', 'bskts.gif', 0),
(2, 'Mersin İdmanyurdu', 'mrsn.png', 1),
(3, 'Galatasaray', 'gltsry.gif', 3),
(4, 'Fenerbahçe', 'fener.png', 0),
(5, 'Akhisar Belediyespor', 'ahskr.png', 0),
(6, 'Kasımpaşa', 'ksmp.png', 0),
(7, 'İstanbul Başakşehir', 'bski.png', 0),
(8, 'Gençlerbirliği', 'ankb.jpg', 0),
(9, 'Bursaspor', 'brsp.png', 0),
(10, 'Torku Konyaspor', 'trk.jpg', 0),
(11, 'Sivasspor', 'siv.jpg', 4),
(12, 'Gaziantepspor', 'gznan.png', 0),
(13, 'Çaykur Rizespor', 'rz.png', 0),
(14, 'Eskişehirspor', 'tat.png', 0),
(15, 'Karabükspor', 'krb.png', 0),
(16, 'Trabzonspor', 'trbz.png', 0),
(17, 'Kayseri Erciyesspor', 'kspor.png', 0),
(18, 'Balıkesirspor', 'blks.png', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
