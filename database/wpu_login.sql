-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 06:43 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpu_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Arman Dwi Pangestu', 'armandwipangestu@gmail.com', 'default.jpg', '$2y$10$enu1ve.SGG8qY9/mZi70E.ZKdO/Xtvl6lU42N419Q.AqhlRmlnRNu', 1, 1, 1674703436),
(2, 'Sandhika Galih', 'sandhikagalih@unpas.ac.id', 'default.jpg', '$2y$10$kJCE8LM0RLRbPkWEFQy3IOhIcV6N.y07Mk7uduH/x/aP50ACEDHD2', 2, 1, 1674703524),
(3, 'Doddy Ferdiansyah', 'doddy@yahoo.com', 'default.jpg', '$2y$10$Z8BoXuC/R6Tum6H9fF7eRefxJfg45FArxVDLyvrJUcpT4IJZWBPEK', 2, 1, 1674703879),
(4, 'test', 'test@gmail.com', 'default.jpg', '$2y$10$9XbN41KmR.QPlNaBoeNHyeGzaJtumpvWqkL1WNwEKv6seY/Nrrwie', 2, 1, 1674703934),
(5, 'Linux', 'linux@linux.org', 'default.jpg', '$2y$10$VE66lL7IC37r8NYUGWetdedgDJ.GUQ2h7Pxw9r670juOIQBvHsDCS', 2, 1, 1674704296),
(6, 'windows', 'windows@windows.org', 'default.jpg', '$2y$10$cMTXxsKc4ZqqpynfbCh77e9vE6xioxP3ekVEfFK3GV8bgOrzHTTNy', 2, 1, 1674706169);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
