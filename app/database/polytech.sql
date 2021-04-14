-- phpMyAdmin SQL Dump

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polytech`
--
CREATE DATABASE IF NOT EXISTS `polytech` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `polytech`;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
('163ca661-d7bb-4eaf-adb9-855663fa8bec', 'France'),
('d11276d8-c44c-4613-bd7e-0d668d91eb78', 'Etats-Unis'),
('29a3e3d9-33da-499a-b6ec-28b0e58af392', 'Maroc'),
('f6b61675-0952-450c-a476-572c489203c2', 'Australie'),
('ff503688-cf7b-4e02-9904-aff880cfcc31', 'Chine');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(50) NOT NULL,
  `country_id` varchar(50) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_country` (`country_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `country_id`, `first_name`, `last_name`) VALUES
('9bab9664-0040-4642-ba35-7c890933473e', '163ca661-d7bb-4eaf-adb9-855663fa8bec', 'Mamadou', 'Diallo'),
('a28c969b-dc0b-4bdd-882a-790696f0fecf', 'f6b61675-0952-450c-a476-572c489203c2', 'Jean', 'Dupon'),
('0c461930-7efb-4f6a-9a71-3b2f61ce529f', '29a3e3d9-33da-499a-b6ec-28b0e58af392', 'Julien', 'Falgas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
