-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 01:17 PM
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
-- Database: `dairy_farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cows`
--

CREATE TABLE `cows` (
  `cow_id` tinyint(10) UNSIGNED NOT NULL,
  `serial_no_name` char(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `breed_type` varchar(20) NOT NULL,
  `year_of_birth` date NOT NULL,
  `cow_photo` varchar(200) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cow_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cows`
--

INSERT INTO `cows` (`cow_id`, `serial_no_name`, `gender`, `breed_type`, `year_of_birth`, `cow_photo`, `registration_date`, `cow_status`) VALUES
(23, '1234', 'Male', 'American', '2020-05-10', 'd3.webp', '2022-10-23 19:51:44', 'available'),
(25, 'Eldoret', 'female', 'Fresian', '2020-05-12', 'd78.jfif', '2022-10-23 19:52:58', 'available'),
(35, 'Saramek', 'male', 'Arshier', '2018-05-10', '317733417_144596531669802_8245982430262355591_n.jpg', '2022-12-20 07:12:36', 'sold');

-- --------------------------------------------------------

--
-- Table structure for table `family_members`
--

CREATE TABLE `family_members` (
  `member_id` int(50) UNSIGNED NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `gender` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(60) NOT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `profile_photo` varchar(300) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family_members`
--

INSERT INTO `family_members` (`member_id`, `first_name`, `last_name`, `gender`, `email`, `password`, `relationship`, `profile_photo`, `registration_date`, `user_level`) VALUES
(109, 'Emmanuel ', 'Magut', 'male', 'ekiplimo38@gmail.com', '$2y$10$q23wSv.zaQN98HW1.FoLn.1wPIJxZHNYCCPrkacnfeGf.G8M5xFbK', 'family', '', '2022-10-13 22:19:02', 3),
(115, 'Aurelia', 'Jepngetich', 'female', 'ajepngetich@gmail.com', '$2y$10$Puyvs8YTSjh1ervNvNwU1eyToRoR1DM21Bg.9AJtpq4uqAI/qF4fG', 'family', '', '2022-10-24 19:16:27', 2),
(157, 'Emmanuel Kiplimo', 'kimani', 'Male', 'ekipchirchirr@gmail.com', '$2y$10$pJEkAfzrU736CQnwstDSiutJdJ2/6k.OnZrMp6DI8aqR3BsONwpqm', 'Friend', NULL, '2022-12-02 10:05:13', 1),
(169, 'Dhavil', '', '', 'dcheruiyot@gmail.com', '$2y$10$ytrwOKlK15zFYj82BLZCUupGB6x2Ce/kVnhbe8seh2ISt7cESS5IK', NULL, NULL, '2022-12-21 08:39:19', 1),
(170, 'Kiplimo Magut', '', '', 'mlimoo@gmail.com', '$2y$10$8u6mDBZOlu.Evs7VflF2jOg.j895924dcnNuysQcgBtJasIxOV1nS', NULL, NULL, '2022-12-22 11:51:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `insemination`
--

CREATE TABLE `insemination` (
  `insemination_id` tinyint(10) UNSIGNED NOT NULL,
  `date_inseminated` timestamp NOT NULL DEFAULT current_timestamp(),
  `insemination_summary` text NOT NULL,
  `cow_id` tinyint(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insemination`
--

INSERT INTO `insemination` (`insemination_id`, `date_inseminated`, `insemination_summary`, `cow_id`) VALUES
(43, '2022-12-22 12:10:02', 'This cow was inseminated today with Artificial inteligence... By Doctor Khan. Expected delivery is around june 2023', 25);

-- --------------------------------------------------------

--
-- Table structure for table `milk_production`
--

CREATE TABLE `milk_production` (
  `production_id` tinyint(10) UNSIGNED NOT NULL,
  `date_produced` timestamp NOT NULL DEFAULT current_timestamp(),
  `litres_produced` char(60) NOT NULL,
  `litres_sold` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milk_production`
--

INSERT INTO `milk_production` (`production_id`, `date_produced`, `litres_produced`, `litres_sold`) VALUES
(26, '2022-11-19 19:09:35', '100', '97'),
(27, '2022-11-25 10:01:06', '48', '45'),
(28, '2022-12-01 17:29:52', '450', '440'),
(29, '2022-12-03 19:24:19', '57', '45'),
(30, '2022-12-05 08:08:05', '57', '50'),
(31, '2022-12-05 08:55:10', '57', '50'),
(33, '2022-12-05 08:59:56', '57', '97'),
(34, '2022-12-05 09:00:52', '46', '40'),
(35, '2022-12-20 07:17:52', '100', '95'),
(36, '2022-12-20 07:19:25', '46', '36');

-- --------------------------------------------------------

--
-- Table structure for table `personal_notes`
--

CREATE TABLE `personal_notes` (
  `notes_id` tinyint(30) UNSIGNED NOT NULL,
  `date_written` date NOT NULL,
  `title` varchar(40) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_notes`
--

INSERT INTO `personal_notes` (`notes_id`, `date_written`, `title`, `content`) VALUES
(10, '2022-11-09', 'Gratitude', 'This is the day that the Lord has made. Let us be glad and rejoice in it.'),
(13, '2022-12-04', 'Great', 'Keep Pushing!'),
(15, '2022-12-20', 'Hosting', 'Am about to host my website very soon! Am in the final parts and touches then i will be done with it.');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE `vaccination` (
  `vaccine_id` tinyint(10) UNSIGNED NOT NULL,
  `vaccine_name` varchar(50) NOT NULL,
  `date_administered` timestamp NOT NULL DEFAULT current_timestamp(),
  `vaccination_description` text NOT NULL,
  `cow_id` tinyint(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccination`
--

INSERT INTO `vaccination` (`vaccine_id`, `vaccine_name`, `date_administered`, `vaccination_description`, `cow_id`) VALUES
(62, 'Livercling', '2022-12-20 07:15:29', 'I vaccinated Saramek today against liver flukes and worms. Next vacccination is after 2weeks. Milk should not be consumed until 14th feb.', 35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cows`
--
ALTER TABLE `cows`
  ADD PRIMARY KEY (`cow_id`);

--
-- Indexes for table `family_members`
--
ALTER TABLE `family_members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `insemination`
--
ALTER TABLE `insemination`
  ADD PRIMARY KEY (`insemination_id`),
  ADD KEY `cow_id` (`cow_id`);

--
-- Indexes for table `milk_production`
--
ALTER TABLE `milk_production`
  ADD PRIMARY KEY (`production_id`);

--
-- Indexes for table `personal_notes`
--
ALTER TABLE `personal_notes`
  ADD PRIMARY KEY (`notes_id`);

--
-- Indexes for table `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`vaccine_id`),
  ADD KEY `cow_id` (`cow_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cows`
--
ALTER TABLE `cows`
  MODIFY `cow_id` tinyint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `family_members`
--
ALTER TABLE `family_members`
  MODIFY `member_id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `insemination`
--
ALTER TABLE `insemination`
  MODIFY `insemination_id` tinyint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `milk_production`
--
ALTER TABLE `milk_production`
  MODIFY `production_id` tinyint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_notes`
--
ALTER TABLE `personal_notes`
  MODIFY `notes_id` tinyint(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `vaccine_id` tinyint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `insemination`
--
ALTER TABLE `insemination`
  ADD CONSTRAINT `insemination_ibfk_1` FOREIGN KEY (`cow_id`) REFERENCES `cows` (`cow_id`);

--
-- Constraints for table `vaccination`
--
ALTER TABLE `vaccination`
  ADD CONSTRAINT `vaccination_ibfk_1` FOREIGN KEY (`cow_id`) REFERENCES `cows` (`cow_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
