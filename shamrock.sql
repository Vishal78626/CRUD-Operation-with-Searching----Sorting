-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2022 at 03:53 PM
-- Server version: 8.0.30-0ubuntu0.20.04.2
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shamrock`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `country` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL,
  `dob` date NOT NULL,
  `languages_known` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_no`, `country`, `status`, `dob`, `languages_known`, `comments`, `image`) VALUES
(1, 'admin', 'admin@example.com', '21232f297a57a5a743894a0e4a801fc3', '9876543210', 'IN', 1, '2000-02-16', 'html', 'I am admin', ''),
(9, 'abhi', 'abhi@gmail.com', 'admin', '8956451223', 'IN', 1, '1999-12-10', 'html,js', 'stduent', ''),
(11, 'rahul', 'rahul@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '7845122356', 'IN', 0, '1998-01-12', 'html', 'studwent', ''),
(19, 'mukesh', 'mukesh@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '8956457812', 'CA', 1, '2004-05-02', 'html', 'Student', ''),
(32, 'abc', 'abc@hotmail.com', 'ada', '8956451223', 'US', 1, '1996-02-16', 'html,js', 'studenth', 'ColumnEditor.gif'),
(38, 'demo', 'demo@demo.com', '63a9f0ea7bb98050796b649e85481845', '4578895612', 'IN', 0, '1995-05-12', 'html', 'student', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
