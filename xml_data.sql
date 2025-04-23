-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 01:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xml_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1 COMMENT '1-active,2-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `created_date`, `status`) VALUES
(1, 'Regagandhi C Chairma', '+919840284809', '2025-04-23 17:18:06', 0),
(2, 'Kökten Adal', '+90 333 8859342', '2025-04-23 17:18:28', 1),
(3, 'Hamma Abdurrezak', '+90 333 1563682', '2025-04-23 17:18:28', 1),
(4, 'Güleycan Şensal', '+90 333 2557114', '2025-04-23 17:18:28', 1),
(5, 'Suadiye Ratip', '+90 333 9163726', '2025-04-23 17:18:28', 1),
(6, 'Barik Nurşide', '+90 333 3323749', '2025-04-23 17:18:28', 1),
(7, 'Hanifi Emineeylem', '+90 333 2763531', '2025-04-23 17:18:28', 1),
(8, 'Nakiye Oğulkan', '+90 333 6168924', '2025-04-23 17:18:28', 1),
(9, 'Hamsiye Cerit', '+90 333 3544579', '2025-04-23 17:18:28', 1),
(10, 'Mahfi Hülâgü', '+90 333 8937773', '2025-04-23 17:18:28', 1),
(11, 'Esmeray Nurihayat', '+90 333 1688759', '2025-04-23 17:18:28', 1),
(12, 'Şennur Nazifer', '+90 333 5326326', '2025-04-23 17:18:28', 1),
(13, 'Çetinok Seden', '+90 333 1614182', '2025-04-23 17:18:28', 1),
(14, 'Vuslat Erimşah', '+90 333 9551194', '2025-04-23 17:18:28', 1),
(15, 'Şeküre Ruhiye', '+90 333 8792165', '2025-04-23 17:18:28', 1),
(16, 'İmran Ümmehan', '+90 333 6971156', '2025-04-23 17:18:28', 1),
(17, 'Yavuzbay Hiçsönmez', '+90 333 8839473', '2025-04-23 17:18:28', 1),
(18, 'Nevzete Abdulgafur', '+90 333 1453851', '2025-04-23 17:18:28', 1),
(19, 'Aksüyek Sal', '+90 333 2481491', '2025-04-23 17:18:28', 1),
(20, 'Ferhat Kılıçaslan', '+90 333 6861354', '2025-04-23 17:18:28', 1),
(21, 'Fereç Tomurcuk', '+90 333 4141534', '2025-04-23 17:18:28', 1),
(22, 'Balkız Alabegüm', '+90 333 8826359', '2025-04-23 17:18:28', 1),
(23, 'Adulle Nesim', '+90 333 5364556', '2025-04-23 17:18:28', 1),
(24, 'Sevdal Bilhan', '+90 333 8634743', '2025-04-23 17:18:28', 1),
(25, 'Hariz Budunal', '+90 333 1193335', '2025-04-23 17:18:28', 1),
(26, 'Alnıak Atız', '+90 333 5676454', '2025-04-23 17:18:28', 1),
(27, 'Haşmet Taşgan', '+90 333 6185991', '2025-04-23 17:18:28', 1),
(28, 'Salli Necife', '+90 333 6692117', '2025-04-23 17:18:28', 1),
(29, 'Türeli Selçen', '+90 333 5588146', '2025-04-23 17:18:28', 1),
(30, 'Boray Ümit', '+90 333 7741455', '2025-04-23 17:18:28', 1),
(31, 'Aktemür Akbora', '+90 333 4139141', '2025-04-23 17:18:28', 1),
(32, 'Yediveren Muhammetali', '+90 333 8483755', '2025-04-23 17:18:28', 1),
(33, 'Baltaş Tonguç', '+90 333 3724797', '2025-04-23 17:18:28', 1),
(34, 'Tepegöz Ferize', '+90 333 9528318', '2025-04-23 17:18:28', 1),
(35, 'Selen Arısal', '+90 333 9524786', '2025-04-23 17:18:28', 1),
(36, 'Abdulcabbar Mahizar', '+90 333 6782359', '2025-04-23 17:18:28', 1),
(37, 'İyem Emre', '+90 333 8238835', '2025-04-23 17:18:28', 1),
(38, 'Muazzam Lâmia', '+90 333 1348678', '2025-04-23 17:18:28', 1),
(39, 'İlten Eripek', '+90 333 3758172', '2025-04-23 17:18:28', 1),
(40, 'Zerrin Resul', '+90 333 9276424', '2025-04-23 17:18:28', 1),
(41, 'İlalan Telmize', '+90 333 3563723', '2025-04-23 17:18:28', 1),
(42, 'Hamise Sertan', '+90 333 8263265', '2025-04-23 17:18:28', 1),
(43, 'Zubeyde Berk', '+90 333 7281496', '2025-04-23 17:18:28', 1),
(44, 'Feda Balsarı', '+90 333 4969618', '2025-04-23 17:18:28', 1),
(45, 'Müsemme Civanşir', '+90 333 2556491', '2025-04-23 17:18:28', 1),
(46, 'Aydınyol Fitnet', '+90 333 7783478', '2025-04-23 17:18:28', 1),
(47, 'Çoğa Bigüm', '+90 333 4133666', '2025-04-23 17:18:28', 1),
(48, 'Şehrinaz Raşide', '+90 333 2677248', '2025-04-23 17:18:28', 1),
(49, 'Naif Rukhiya', '+90 333 8252766', '2025-04-23 17:18:28', 1),
(50, 'Azat Nilden', '+90 333 9324656', '2025-04-23 17:18:28', 1),
(51, 'Gamze Korday', '+90 333 9442367', '2025-04-23 17:18:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_file`
--

CREATE TABLE `user_file` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_file`
--

INSERT INTO `user_file` (`id`, `file_path`, `created_date`) VALUES
(1, 'uploads/contacts (2).xml', '2025-04-23 17:18:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_file`
--
ALTER TABLE `user_file`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_file`
--
ALTER TABLE `user_file`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
