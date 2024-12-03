-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 02:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eyacdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
  `acc_username` varchar(50) DEFAULT NULL,
  `acc_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_username`, `acc_password`) VALUES
(1, 'admin', 'admin'),
(2, 'jah', '1234'),
(7, 'mamon', '12345'),
(8, 'john', '123'),
(9, 'brandon', '123'),
(10, 'mona', '123');

-- --------------------------------------------------------

--
-- Table structure for table `accountinfo`
--

CREATE TABLE `accountinfo` (
  `accinfo_id` int(11) NOT NULL,
  `accinfo_firstname` varchar(50) DEFAULT NULL,
  `accinfo_middlename` varchar(50) DEFAULT NULL,
  `accinfo_lastname` varchar(50) DEFAULT NULL,
  `accinfo_email` varchar(50) DEFAULT NULL,
  `accinfo_idno` int(11) DEFAULT NULL,
  `accinfo_year` varchar(20) DEFAULT NULL,
  `accinfo_age` int(11) DEFAULT NULL,
  `accinfo_gender` varchar(20) DEFAULT NULL,
  `accinfo_contact` varchar(20) DEFAULT NULL,
  `accinfo_address` varchar(100) DEFAULT NULL,
  `remain_ss` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accountinfo`
--

INSERT INTO `accountinfo` (`accinfo_id`, `accinfo_firstname`, `accinfo_middlename`, `accinfo_lastname`, `accinfo_email`, `accinfo_idno`, `accinfo_year`, `accinfo_age`, `accinfo_gender`, `accinfo_contact`, `accinfo_address`, `remain_ss`) VALUES
(2, 'jah', 'bella', 'ballesteros', 'jah@gmail.com', 215123123, '4', 21, 'Male', '0922123123', 'Pardo', 26),
(7, 'mamon', 'mamon', 'mamon', 'mamon@gmail.com', 21512, '4', 25, 'Male', '123456', 'Pardo', 30),
(8, 'john', 'par ', 'john', 'john@gmail.com', 215123, '4', 25, 'Female', '123456789', 'Bulacao', 29),
(9, 'brand', 'on', 'alc', 'brandon@gmail.com', 215123456, '4', 21, 'Male', '09227777777', 'Bulacao', 29),
(10, 'mona', 'jane', 'lopez', 'mona@gmail.com', 215456123, '4', 21, 'Male', '123456789', 'Duljo', 27);

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(200) DEFAULT NULL,
  `admin_lastname` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`admin_id`, `admin_name`, `admin_lastname`) VALUES
(1, 'ffej', 'oel');

-- --------------------------------------------------------

--
-- Table structure for table `admin_approvals`
--

CREATE TABLE `admin_approvals` (
  `approval_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `approval_status` enum('approved','disapproved') NOT NULL,
  `approval_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `announcement` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcement`, `created_at`) VALUES
(0, '', '2024-05-12 12:17:31'),
(1, 'Lab 542 is not available for sitin toms', '2024-05-10 23:47:56'),
(2, 'Hello sihrisirhsir', '2024-05-10 23:52:14'),
(3, 'hello guyssssss', '2024-05-10 23:55:06'),
(4, 'hell0o qwiej qowneioq wneoqnweoqinwe', '2024-05-10 23:56:08'),
(5, 'Hi sir bayot ka', '2024-05-11 00:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `feedback_text` text DEFAULT NULL,
  `feedback_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `student_id`, `admin_id`, `feedback_text`, `feedback_date`) VALUES
(1, NULL, NULL, 'I like you', '2024-05-11 01:03:52'),
(2, NULL, NULL, 'i like you', '2024-05-11 01:06:19'),
(3, NULL, NULL, 'i like you', '2024-05-11 01:07:57'),
(4, NULL, NULL, 'hello sirs', '2024-05-11 01:08:45'),
(5, NULL, NULL, 'ehehe', '2024-05-11 01:09:48'),
(10, NULL, NULL, 'heloooooooooooo', '2024-05-11 01:16:31'),
(11, NULL, NULL, 'heloooooooooooooooooooooooooooo', '2024-05-11 01:16:59'),
(12, NULL, NULL, 'hehehehehe', '2024-05-11 01:18:43'),
(13, NULL, NULL, 'qweqweqwe', '2024-05-11 01:18:54'),
(14, 2, NULL, 'qweqweqweqweqweqwe', '2024-05-11 01:19:29'),
(15, 7, NULL, 'Hi the Lab 542 was great and quiet, I had a great time. Thanks', '2024-05-11 01:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `status` enum('pending','approved','disapproved') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `student_id`, `date`, `time`, `purpose`, `status`, `created_at`, `updated_at`, `lab`) VALUES
(1, 2, '2024-05-27', '09:30:00', 'for da go', 'approved', '2024-05-26 11:31:26', '2024-05-26 11:43:48', ''),
(2, 2, '2024-05-27', '10:50:00', 'for da person', 'approved', '2024-05-26 11:50:30', '2024-05-26 11:52:57', ''),
(3, 2, '2024-05-27', '21:56:00', 'for da hilak huhuhuh', 'disapproved', '2024-05-26 11:57:04', '2024-05-26 11:58:45', 'Lab 528');

-- --------------------------------------------------------

--
-- Table structure for table `sitin`
--

CREATE TABLE `sitin` (
  `sitin_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `lab` varchar(100) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sitin`
--

INSERT INTO `sitin` (`sitin_id`, `student_id`, `purpose`, `lab`, `login_time`, `logout_time`) VALUES
(2, 2, 'javaprog', '528', '2024-03-24 18:54:24', '2024-03-26 10:28:40'),
(3, 7, 'javaprog', '526', '2024-03-26 10:16:31', '2024-04-15 12:03:37'),
(4, 8, 'pythonprog', '530', '2024-03-26 10:31:44', '2024-03-26 10:36:27'),
(5, 9, 'cprog', '528', '2024-03-26 11:10:32', '2024-03-26 11:10:42'),
(6, 10, 'javaprog', '528', '2024-03-26 11:40:29', '2024-04-15 11:59:35'),
(10, 7, 'cprog', '526', '2024-04-15 11:35:42', '2024-04-15 12:03:37'),
(11, 10, 'csharpprog', '526', '2024-04-15 11:36:20', '2024-04-15 11:59:35'),
(12, 10, 'javaprog', '528', '2024-04-15 11:59:28', '2024-04-15 11:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `student_reservations`
--

CREATE TABLE `student_reservations` (
  `reservation_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `sitin_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `status` enum('pending','approved','disapproved') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `acc_username` (`acc_username`);

--
-- Indexes for table `accountinfo`
--
ALTER TABLE `accountinfo`
  ADD PRIMARY KEY (`accinfo_id`),
  ADD UNIQUE KEY `accinfo_email` (`accinfo_email`);

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_approvals`
--
ALTER TABLE `admin_approvals`
  ADD PRIMARY KEY (`approval_id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitin`
--
ALTER TABLE `sitin`
  ADD PRIMARY KEY (`sitin_id`);

--
-- Indexes for table `student_reservations`
--
ALTER TABLE `student_reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `sitin_id` (`sitin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_approvals`
--
ALTER TABLE `admin_approvals`
  MODIFY `approval_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_reservations`
--
ALTER TABLE `student_reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD CONSTRAINT `fk_admin_account` FOREIGN KEY (`admin_id`) REFERENCES `account` (`acc_id`);

--
-- Constraints for table `admin_approvals`
--
ALTER TABLE `admin_approvals`
  ADD CONSTRAINT `admin_approvals_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `student_reservations` (`reservation_id`),
  ADD CONSTRAINT `admin_approvals_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admininfo` (`admin_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `accountinfo` (`accinfo_id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admininfo` (`admin_id`);

--
-- Constraints for table `student_reservations`
--
ALTER TABLE `student_reservations`
  ADD CONSTRAINT `student_reservations_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `accountinfo` (`accinfo_id`),
  ADD CONSTRAINT `student_reservations_ibfk_2` FOREIGN KEY (`sitin_id`) REFERENCES `sitin` (`sitin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
