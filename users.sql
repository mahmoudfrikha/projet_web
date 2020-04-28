-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 28, 2020 at 05:00 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(10) NOT NULL DEFAULT 'client',
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `passwordresetstring` varchar(255) NOT NULL,
  `passwordresettimestamp` datetime NOT NULL,
  `phone_number` varchar(8) NOT NULL,
  `home_adress` varchar(300) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role`, `email`, `username`, `password`, `passwordresetstring`, `passwordresettimestamp`, `phone_number`, `home_adress`) VALUES
(6, 'client', 'mahmoud.frikha@hotmail.com', 'client', '$2y$10$Qu7rADKx4dOPLT0h.ZTF4O.YMBfu6tu/a9kHBDAhcYgx/H88eGiqy', '', '0000-00-00 00:00:00', '27410942', 'home'),
(10, 'client', 'mahmoud.frikha@esprit.tn', 'mahmoudfrikha', '$2y$10$W4Qul0Ft6Q0DwNv/TWWa4.0dNMi9ODqyfpbLSGoAXqGpyVHE.jFb2', '', '0000-00-00 00:00:00', '27410942', 'home'),
(9, 'admin', 'benna.resto@gmail.com', 'benna', '$2y$10$GdrqChpW2Z.hcK5o8iidhuEEP3e5JyTZRs9psUQQq06fpJLhH0Dne', '', '0000-00-00 00:00:00', '27410942', 'home');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
