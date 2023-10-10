-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2023 at 08:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Fees` float NOT NULL,
  `Subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `Name`, `Description`, `Fees`, `Subject_id`) VALUES
(1, '1A', 'ldhfkjdhk', 123456, 35);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Salary` float NOT NULL,
  `Join_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `User_id`, `Salary`, `Join_date`) VALUES
(15, 14, 123, '2023-10-08 21:28:16'),
(16, 9, 123564, '2023-10-08 21:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_courses`
--

CREATE TABLE `enrolled_courses` (
  `ID` int(11) NOT NULL,
  `Enrolled_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `Student_id` int(11) NOT NULL,
  `Course_id` int(11) NOT NULL,
  `Employee_id` int(11) NOT NULL,
  `Grade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `ID` int(11) NOT NULL,
  `Presentation` float NOT NULL,
  `Participation` float NOT NULL,
  `Homework` float NOT NULL,
  `Attendance` float NOT NULL,
  `Story` float NOT NULL,
  `Quiz1` float NOT NULL,
  `Quiz2` float NOT NULL,
  `Final_exam` float NOT NULL,
  `Sum` float NOT NULL,
  `Average` float NOT NULL,
  `Student_id` int(11) NOT NULL,
  `Course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID`, `Name`, `Create_at`) VALUES
(1, 'Admin', '2023-09-19 09:39:41'),
(2, 'User', '2023-09-19 09:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `Name` varchar(70) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Registration Date` date NOT NULL,
  `Gender` binary(10) NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

CREATE TABLE `studies` (
  `ID` int(11) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `Enrolled_course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Shortcut` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `Name`, `Shortcut`) VALUES
(35, 'En', 'E'),
(38, 'Sjkdlhksjdsdd', 'Ksdnjk');

-- --------------------------------------------------------

--
-- Table structure for table `text book`
--

CREATE TABLE `text book` (
  `ISBN` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Edition` int(11) NOT NULL,
  `price` float NOT NULL,
  `Subject_id` int(11) NOT NULL,
  `Course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(30) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` tinyint(4) NOT NULL,
  `Is_active` tinyint(1) NOT NULL DEFAULT 1,
  `Role_id` int(11) NOT NULL DEFAULT 2,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Username`, `Email`, `Phone`, `Password`, `Gender`, `Is_active`, `Role_id`, `Created_at`) VALUES
(9, 'Brhoome Hetari', 'brhoom', 'q@q.com', '123456789', '$2y$10$Wtmp/OVB/hajCFpP3L876OOqo9aheOdb4qhmBbM7I9HwetwAajdaW', 1, 1, 1, '2023-10-05 19:41:09'),
(14, 'Mohammed Tala', 'Brho', 'k@k.com', '77777777', '$2y$10$x88D0jh24PANqsN8xU7k0ewkeJLwEu8rq09P1pibuLVTTwj1vejZq', 1, 1, 2, '2023-10-06 12:42:05'),
(15, 'Ashraf Tala', 'Brhoos', 's@s.com', '77777777', '$2y$10$J.ouDhm1MxKZ/6/dDNzudO5mveAw6Z7q/gNAsqUdx9XZGcmNj948O', 1, 1, 2, '2023-10-06 12:51:07'),
(17, 'A Hhhh', 'qwer', 'qq@qq.com', '123456789', '$2y$10$aPKUq5ubWR9cExb5e.dgOuOM/ARxlGVLylelqkbwi2AyaXLC0mN0G', 1, 1, 1, '2023-10-06 13:25:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Subject_id` (`Subject_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Student_id` (`Student_id`),
  ADD KEY `Course_id` (`Course_id`),
  ADD KEY `Employee_id` (`Employee_id`),
  ADD KEY `Grade_id` (`Grade_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Student_id` (`Student_id`),
  ADD KEY `Course_id` (`Course_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `studies`
--
ALTER TABLE `studies`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Enrolled_course_id` (`Enrolled_course_id`),
  ADD KEY `Student_id` (`Student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `text book`
--
ALTER TABLE `text book`
  ADD PRIMARY KEY (`ISBN`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `Course_id` (`Course_id`),
  ADD KEY `Subject_id` (`Subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`Email`),
  ADD UNIQUE KEY `username` (`Username`),
  ADD KEY `role_id` (`Role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studies`
--
ALTER TABLE `studies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`ID`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD CONSTRAINT `enrolled_courses_ibfk_1` FOREIGN KEY (`Course_id`) REFERENCES `courses` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolled_courses_ibfk_2` FOREIGN KEY (`Employee_id`) REFERENCES `employees` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolled_courses_ibfk_3` FOREIGN KEY (`Grade_id`) REFERENCES `grades` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolled_courses_ibfk_4` FOREIGN KEY (`Student_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student` (`ID`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`Course_id`) REFERENCES `courses` (`ID`);

--
-- Constraints for table `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `studies_ibfk_1` FOREIGN KEY (`Enrolled_course_id`) REFERENCES `enrolled_courses` (`ID`),
  ADD CONSTRAINT `studies_ibfk_2` FOREIGN KEY (`Student_id`) REFERENCES `student` (`ID`);

--
-- Constraints for table `text book`
--
ALTER TABLE `text book`
  ADD CONSTRAINT `text book_ibfk_1` FOREIGN KEY (`Course_id`) REFERENCES `courses` (`ID`),
  ADD CONSTRAINT `text book_ibfk_2` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Role_id`) REFERENCES `roles` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
