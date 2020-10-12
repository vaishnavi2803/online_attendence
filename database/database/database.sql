-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 06:48 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `mobile_no`) VALUES
(1, 'Rishabh Agrawal', '8010801080');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `attendance` int(2) NOT NULL,
  `date` date NOT NULL,
  `semester` varchar(10) NOT NULL,
  `department` varchar(10) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `userId`, `attendance`, `date`, `semester`, `department`, `createdAt`, `updatedAt`) VALUES
(2, 4, 1, '2020-07-08', '2', 'b.tech', '2020-07-09 21:06:48', NULL),
(3, 1, 1, '2020-07-08', '2', 'b.tech', '2020-07-09 21:06:48', NULL),
(6, 2, 1, '2020-07-09', '1', 'm.tech', '2020-07-09 21:09:26', NULL),
(7, 2, 1, '2020-07-08', '1', 'm.tech', '2020-07-09 21:10:24', NULL),
(8, 2, 1, '2020-07-07', '1', 'm.tech', '2020-07-09 21:10:41', NULL),
(9, 5, 1, '2020-07-08', '7', 'bca', '2020-07-09 21:14:43', NULL),
(10, 5, 1, '2020-07-05', '7', 'bca', '2020-07-09 21:16:18', NULL),
(11, 5, 1, '2020-07-02', '7', 'bca', '2020-07-09 21:17:14', NULL),
(14, 5, 1, '2020-07-01', '7', 'bca', '2020-07-09 21:19:19', NULL),
(15, 5, 1, '2020-07-22', '7', 'bca', '2020-07-09 21:20:05', NULL),
(16, 5, 1, '2020-07-09', '7', 'bca', '2020-07-09 21:20:30', NULL),
(17, 5, 1, '2020-07-07', '7', 'bca', '2020-07-09 21:20:53', NULL),
(18, 5, 1, '2020-07-04', '7', 'bca', '2020-07-09 21:21:31', NULL),
(19, 5, 1, '2020-06-25', '7', 'bca', '2020-07-09 21:26:59', NULL),
(25, 4, 1, '2020-07-09', '2', 'b.tech', '2020-07-10 09:52:46', NULL),
(26, 1, 1, '2020-07-09', '2', 'b.tech', '2020-07-10 09:52:46', NULL),
(27, 4, 1, '2020-07-10', '2', 'b.tech', '2020-07-10 09:53:27', NULL),
(28, 2, 1, '2020-07-10', '2', 'b.tech', '2020-07-10 09:53:27', NULL),
(29, 1, 1, '2020-07-10', '2', 'b.tech', '2020-07-10 09:53:27', NULL),
(33, 4, 1, '2020-07-02', '2', 'b.tech', '2020-07-13 01:39:33', NULL),
(34, 2, 1, '2020-07-02', '2', 'b.tech', '2020-07-13 01:39:37', NULL),
(35, 1, 1, '2020-07-02', '2', 'b.tech', '2020-07-13 01:39:37', NULL),
(43, 4, 1, '2020-08-07', '2', 'b.tech', '2020-07-14 14:11:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `department` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `doj` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `fullName`, `emailAddress`, `mobileNo`, `gender`, `department`, `subject`, `dob`, `doj`, `address`, `createdAt`, `updatedAt`) VALUES
(1, 'Mayank Agrawal', 'mayank@gmail.com', '8090909080', 'male', 'b.tech', 'DBMS', '2020-02-06', '2020-06-30', 'Dlf Phase 4', '2020-07-09 15:49:36', '2020-07-14 21:07:12'),
(3, 'parul kundra', 'parul24@abes.ac.in', '9852634517', 'male', 'm.tech', 'data structure', '1981-09-05', '2004-05-01', 'flat no .234,indirapuram', '2020-07-12 04:55:22', '2020-07-14 21:07:01'),
(6, 'devendra kumar arya', 'devendra27@abes.ac.in', '9845212547', 'male', 'mca', 'cyber security, enterpreneur', '1978-01-31', '2009-04-05', 'saketnagar,model town,aligarh', '2020-07-14 22:02:56', '2020-07-14 22:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `department` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `doj` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`id`, `fullName`, `emailAddress`, `mobileNo`, `gender`, `department`, `dob`, `doj`, `address`, `createdAt`, `updatedAt`) VALUES
(1, 'Rishabh Agrawal', 'therishabhagrawal@gmail.com', '8010979311', 'male', 'm.tech', '1990-04-19', '2020-07-09', 'House No B-369, Second Floor, Maidan Ghari Road, Chattarpur Enclave phase 2, Chattarpur, New Delhi', '2020-07-09 07:02:28', '2020-07-14 16:07:37'),
(4, 'anand kr srivastava', 'anand12@abes.ac.in', '8010985426', 'male', 'b.tech', '1985-01-05', '2005-08-01', '234,gaur city\r\nnear greater noida', '2020-07-12 04:52:59', NULL),
(6, 'dharmendra roy', 'dharmendra14@gmail.com', '9399826500', 'male', 'mca', '1975-12-14', '2019-07-01', '234,shikho nagar ,raourkhela\r\nnh-24,milesstone near bypass', '2020-07-14 13:49:22', '2020-07-14 16:07:46'),
(7, 'sakshii gupta', 'sakshi23@gmail.com', '7856152545', 'female', 'bca', '1988-07-08', '2018-04-05', 'saketpur gali no 4,lucknow', '2020-07-14 21:57:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin@gmail.com', '698d51a19d8a121ce581499d7b701668', 'admin', '2020-07-09 07:01:43', NULL),
(10, 1, 'therishabhagrawal@gmail.com', '698d51a19d8a121ce581499d7b701668', 'hod', '2020-07-09 07:02:28', NULL),
(11, 2, 'aman@gmail.com', '698d51a19d8a121ce581499d7b701668', 'hod', '2020-07-09 07:04:45', NULL),
(12, 1, 'mayank@gmail.com', '698d51a19d8a121ce581499d7b701668', 'faculty', '2020-07-09 15:49:36', NULL),
(13, 2, 'pankaj@gmail.com', '698d51a19d8a121ce581499d7b701668', 'faculty', '2020-07-09 15:50:35', NULL),
(14, 1, 'rishabh019@gmail.coom', '698d51a19d8a121ce581499d7b701668', 'student', '2020-07-09 17:52:56', NULL),
(15, 2, 'payal@gmail.com', '698d51a19d8a121ce581499d7b701668', 'student', '2020-07-09 17:54:17', NULL),
(16, 3, 'therishabhagrawal@gmail.com', '698d51a19d8a121ce581499d7b701668', 'student', '2020-07-09 17:55:40', NULL),
(17, 4, 'asdf@gamil.com', '698d51a19d8a121ce581499d7b701668', 'student', '2020-07-09 17:57:33', NULL),
(18, 5, 'lorem@gmial.com', '698d51a19d8a121ce581499d7b701668', 'student', '2020-07-09 18:05:16', NULL),
(19, 3, 'dharmendra14@gmail.com', '698d51a19d8a121ce581499d7b701668', 'hod', '2020-07-12 04:51:36', NULL),
(20, 4, 'anand12@abes.ac.in', '698d51a19d8a121ce581499d7b701668', 'hod', '2020-07-12 04:52:59', NULL),
(21, 3, 'parul24@abes.ac.in', '698d51a19d8a121ce581499d7b701668', 'faculty', '2020-07-12 04:55:22', NULL),
(22, 4, 'shurbhi24@abes.ac.in', '698d51a19d8a121ce581499d7b701668', 'faculty', '2020-07-12 04:56:35', NULL),
(23, 5, 'pankaj27@abes.ac.in', '698d51a19d8a121ce581499d7b701668', 'hod', '2020-07-14 13:32:51', NULL),
(24, 6, 'dharmendra14@gmail.com', '698d51a19d8a121ce581499d7b701668', 'hod', '2020-07-14 13:49:23', NULL),
(26, 7, 'kalyani.19m141001@abes.ac.in', '698d51a19d8a121ce581499d7b701668', 'student', '2020-07-14 20:12:12', NULL),
(28, 8, 'samiksha14@gmail.com', '698d51a19d8a121ce581499d7b701668', 'student', '2020-07-14 21:35:29', NULL),
(29, 9, 'nitin007@abes.ac.in', '698d51a19d8a121ce581499d7b701668', 'student', '2020-07-14 21:37:52', NULL),
(30, 7, 'sakshi23@gmail.com', '698d51a19d8a121ce581499d7b701668', 'hod', '2020-07-14 21:57:53', NULL),
(31, 6, 'devendra27@abes.ac.in', '698d51a19d8a121ce581499d7b701668', 'faculty', '2020-07-14 22:02:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` varchar(5) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `doj` varchar(10) NOT NULL,
  `fatherName` varchar(50) NOT NULL,
  `fatherMobile` varchar(20) NOT NULL,
  `motherName` varchar(50) NOT NULL,
  `motherMobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullName`, `emailAddress`, `mobileNo`, `gender`, `department`, `year`, `semester`, `dob`, `doj`, `fatherName`, `fatherMobile`, `motherName`, `motherMobile`, `address`, `city`, `pincode`, `state`, `createdAt`, `updatedAt`) VALUES
(1, 'Rishabh', 'rishabh019@gmail.coom', '8080909090', 'male', 'b.tech', '1', '2', '2009-02-03', '2020-07-01', 'Rakesh', '8978787867', 'Urmila', '8978786767', 'House No 369, Second Floor, Maidan Ghari Road, Chattarpur Enclave phase 2, Chattarpur, New Delhi', 'New Delhi', '110074', '', '2020-07-09 17:52:56', NULL),
(3, 'AMan Bansal', 'therishabhagrawal@gmail.com', '07300904025', 'male', 'bca', '1', '4', '2020-07-04', '2020-07-14', 'a', '3948398', '44', '394893849', 'New Panchwati Colony', 'Ghaziabad', '201009', '', '2020-07-09 17:55:40', '2020-07-14 19:07:38'),
(4, 'Aman Agrawal', 'asdf@gamil.com', '9347894893', 'female', 'b.tech', '1', '2', '2020-07-02', '2020-07-15', 'asdf', '98765478', 'asdfg', '6578909', 'Flat No 418, Block C, Himsagar Apartment\r\nPocket 4, Phase 2', 'GREATER NOIDA', '201306', '', '2020-07-09 17:57:33', '2020-07-14 15:07:03'),
(7, 'kalyani chodhuary', 'kalyani.19m141001@abes.ac.in', '9876543210', 'female', 'mca', '1', '2', '1997-11-27', '2019-08-01', 'santosh pratap', '9810917403', 'gayatri pratap', '9654837403', 'f-52,new vijay nagar colony sector-9', 'ghaziabad', '201009', '', '2020-07-14 20:12:12', NULL),
(8, 'samiksha patel', 'samiksha14@gmail.com', '8545653652', 'female', 'bca', '2', '3', '1999-09-25', '2018-08-01', 'rudra patel', '9874563215', 'sakshi patel', '8060546541', 'shastri nagar flat no 8', 'Noida', '201009', '', '2020-07-14 21:35:29', NULL),
(9, 'nitin kumar', 'nitin007@abes.ac.in', '9855263215', 'male', 'mca', '2', '4', '1998-10-08', '2018-07-22', 'rakesh kumar', '7865453625', 'rakhi kumar', '7060561254', '23,gali no.4,govindpuram\r\nsaket nagar ,meerut road', 'lucknow', '201009', '', '2020-07-14 21:37:52', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
