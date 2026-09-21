-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2026 at 12:47 AM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `today_tests` int(11) NOT NULL,
  `today_grandtest` int(11) NOT NULL,
  `today_exams` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `today_tests`, `today_grandtest`, `today_exams`, `class_id`) VALUES
(1, 2, 1, 0, 3),
(2, 3, 0, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `gender` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `contact`, `email`, `status`, `gender`) VALUES
(1, 'Akhtar Samaar', 485936323, 'aka@gmail.com', 'active', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `admissionf`
--

CREATE TABLE `admissionf` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `fathername` varchar(30) NOT NULL,
  `contact` int(11) NOT NULL,
  `class` varchar(20) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `photo` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admissionf`
--

INSERT INTO `admissionf` (`id`, `name`, `fathername`, `contact`, `class`, `gender`, `photo`) VALUES
(1, 'Farhan Sajid', 'Sajid Akram', 2147483647, '12th', 'male', '../admin/img/Farhan Sajid.jpg'),
(2, 'Zafar Ali', 'Ali Ahmed', 2147483647, '11', 'male', '../admin/img/Zafar Ali.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bcondition` varchar(25) NOT NULL,
  `measures` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `name`, `bcondition`, `measures`) VALUES
(1, 'library', 'good', 'none'),
(2, 'cafeteria', 'poor', 'insure good quality sitting area'),
(3, 'class 2', 'poor', 'insure proper cleaning of classroom'),
(4, 'Class 11', 'fair', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `total_sections` int(11) NOT NULL,
  `total_students` int(11) NOT NULL,
  `other_requirements` text DEFAULT NULL,
  `class_head` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `total_sections`, `total_students`, `other_requirements`, `class_head`) VALUES
(1, '1 Class', 2, 75, NULL, 4),
(2, '2nd Grade', 3, 85, NULL, 2),
(3, '3rd Class', 2, 75, NULL, 2),
(4, '4th Grade', 3, 85, NULL, 3),
(5, '5th Grade', 2, 60, NULL, 1),
(6, '6th Grade', 3, 85, NULL, 3),
(7, '7th Grade', 2, 60, NULL, 2),
(8, '8th Grade', 3, 85, NULL, 1),
(9, '9th', 2, 50, NULL, 1),
(10, '10th', 3, 75, NULL, 4),
(11, '11th grade', 2, 40, NULL, 3),
(12, '12th Grade', 3, 62, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cocurricular`
--

CREATE TABLE `cocurricular` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `studentname` varchar(25) NOT NULL,
  `class` int(11) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cocurricular`
--

INSERT INTO `cocurricular` (`id`, `name`, `studentname`, `class`, `date`) VALUES
(1, 'Painting', 'Abdullah Sami', 1, '11/7/2026');

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(150) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`id`, `name`, `email`, `message`, `phone`) VALUES
(1, 'Ariz Anwar', 'ariz@gmail.com', 'When will the admission open', 9754545),
(2, 'Farhan Ali', 'ff@gmail.com', 'whts the fee sketch?', 26812318);

-- --------------------------------------------------------

--
-- Table structure for table `co_partner`
--

CREATE TABLE `co_partner` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `photo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co_partner`
--

INSERT INTO `co_partner` (`id`, `name`, `email`, `gender`, `contact`, `photo`) VALUES
(1, 'Sania Akhtar', 'sss@gmail.com', 'Female', '09764246', 'img/Ahmed Sahil.jpg'),
(2, 'Wakhab Ali', 'wa@gmail.com', 'Male', '01749466483', 'img/4.jpg'),
(3, 'Khalid Qureshi', 'kk@gmail.com', 'Male', '04859363454', 'img/3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(150) NOT NULL,
  `class` varchar(20) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `class`, `photo`) VALUES
(1, 'Cultural fest', 'Students have gathered to represent the different cultures of the country', '10', 'img/Cultural fest.jpg'),
(2, 'Sports Day', 'Students gathered to play different sports to show their athelitic capabilities', '5', 'img/Sports Day.jpg'),
(3, 'Painting Day', 'Students gathered to paint different artistic designs considering the rising scope of arts and designs', '8', 'img/Painting Day.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `class` varchar(25) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `marks` int(11) NOT NULL,
  `gtime` varchar(11) NOT NULL,
  `stime` varchar(11) NOT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `class`, `subject`, `marks`, `gtime`, `stime`, `type`) VALUES
(1, '3', ' Computer', 100, '2 hours', '9:00 AM', '2nd term');

-- --------------------------------------------------------

--
-- Table structure for table `examresult`
--

CREATE TABLE `examresult` (
  `id` int(11) NOT NULL,
  `studentname` varchar(20) NOT NULL,
  `class` varchar(25) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `total_marks` varchar(20) NOT NULL,
  `obtained_marks` varchar(20) NOT NULL,
  `type` varchar(11) NOT NULL,
  `teacher` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examresult`
--

INSERT INTO `examresult` (`id`, `studentname`, `class`, `subject`, `total_marks`, `obtained_marks`, `type`, `teacher`) VALUES
(1, 'Maryam ', '3', ' Computer', '100', '80', '2nd term', 'Ahmed Sahil'),
(2, 'Maryam ', '3', 'Science', '100', '90', '2nd term', '0'),
(3, 'Hania ', '1', 'Urdu', '100', '30', '2nd term', '0'),
(4, 'Ali ', '5', 'Science', '100', '90', '2nd term', '0'),
(5, 'Hania ', '1', 'Maths', '100', '70', '2nd term', '0'),
(6, 'Ali ', '5', 'English', '100', '90', '2nd term', 'Sara Ali'),
(7, 'Abdullah', '1', 'Maths', '100', '75', '1stterm', '0'),
(8, 'Abdullah', '1', 'English', '100', '90', '1stterm', 'Sara Ali'),
(9, 'Ahmed', '12th', 'English', '100', '90', '1stterm', 'Sara Ali'),
(10, 'Ahmed', '12th', 'English', '100', '90', '1stterm', 'Sara Ali'),
(11, 'Simal', '7th', 'Science', '100', '90', '1stterm', '0'),
(12, 'Arfa', '9th', 'English', '100', '100', '2ndterm', 'Sara Ali'),
(13, 'Farukh', '12th', 'Urdu', '100', '30', '2ndterm', '0'),
(14, 'Ahmed', '12th', 'Chemistry', '100', '90', '2ndterm', '0'),
(15, 'Zafar', '11th', 'Physics', '100', '90', '2ndterm', '0'),
(16, 'Sana', '10th', 'Chemistry', '100', '80', '2ndterm', '0'),
(17, 'Farooq', '8th', 'Urdu', '100', '40', '2ndterm', '0'),
(18, 'Sanam', '4th', 'English', '100', '59', '2ndterm', 'Sara Ali'),
(19, 'Daniyal', '6th', 'English', '100', '80', '2ndterm', '0'),
(20, 'Eysha', '2', 'English', '100', '100', '2nd term', 'Sara Ali'),
(21, 'Maryam', '3rd', 'Science', '100', '60', '2ndterm', '0'),
(22, 'Abdullah', '1', 'Urdu', '100', '90', '1stterm', '0'),
(23, 'Abdullah', '1', 'Urdu', '100', '90', '1stterm', '0');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `salary_month` varchar(25) NOT NULL,
  `salary_date` datetime NOT NULL,
  `expense_type` text DEFAULT NULL,
  `expense_amount` int(11) DEFAULT NULL,
  `orignal_salary` int(11) NOT NULL,
  `amount_deducted` int(11) DEFAULT NULL,
  `salary` int(11) NOT NULL,
  `salary_advance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `staff_name`, `staff_id`, `salary_month`, `salary_date`, `expense_type`, `expense_amount`, `orignal_salary`, `amount_deducted`, `salary`, `salary_advance`) VALUES
(1, 'Ahmed Sahil', 1, 'July', '2026-07-16 18:26:54', NULL, NULL, 40000, NULL, 40000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `remaining_fee` int(11) DEFAULT NULL,
  `total_fee` int(11) NOT NULL,
  `due_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `student_id`, `remaining_fee`, `total_fee`, `due_date`) VALUES
(1, 3, NULL, 6000, '30th July'),
(2, 2, 1000, 5000, '30th July');

-- --------------------------------------------------------

--
-- Table structure for table `gtests`
--

CREATE TABLE `gtests` (
  `id` int(11) NOT NULL,
  `class` varchar(11) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `marks` int(3) NOT NULL,
  `gtime` varchar(20) NOT NULL,
  `stime` varchar(20) NOT NULL,
  `tmonth` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gtests`
--

INSERT INTO `gtests` (`id`, `class`, `subject`, `marks`, `gtime`, `stime`, `tmonth`) VALUES
(1, '3th', 'Maths', 60, '60 mins', '9:00 AM', 'July'),
(2, '4th', 'Science', 60, '60 mins', '9:00 AM', 'July'),
(3, '5th Grade', 'Urdu', 60, '60 mins', '9:00 AM', 'July');

-- --------------------------------------------------------

--
-- Table structure for table `managecom`
--

CREATE TABLE `managecom` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `desgnation` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `photo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managecom`
--

INSERT INTO `managecom` (`id`, `name`, `desgnation`, `email`, `qualification`, `photo`) VALUES
(1, 'Mr. Khurshid Kamal', 'Founder community Director', 'mkk@gmail.com', 'B.A., B.Ed.', 'img/10.jpg'),
(2, 'Laiba Danish', 'Co-ordinator', 'll@gmail.com', 'M.A.(English)', 'img/Sara Ali.jpg'),
(3, 'Khuram Ali', 'Vice Principal', 'aBkj@gmail.com', 'B.A., B.Ed.', 'img/10.jpg'),
(4, 'Tehreem Shah', 'Accountant', 'llkp@gmail.com', 'BA', 'img/Sara Ali.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `mcondition` varchar(30) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `required` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `name`, `type`, `mcondition`, `amount`, `required`) VALUES
(1, 'desk', 'furniture', 'good', '70', '10'),
(2, 'dusters', 'stationary', 'fair', '9', '5'),
(3, 'boards', 'furniture', 'poor', '12', '3'),
(5, 'chairs', 'furniture', 'good', '50', '8');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mid` int(11) NOT NULL,
  `message_detail` varchar(11) NOT NULL,
  `msg_date` date NOT NULL,
  `staff_id` int(11) NOT NULL,
  `fromtid` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mid`, `message_detail`, `msg_date`, `staff_id`, `fromtid`, `status`) VALUES
(1, 'hi', '2017-08-11', 1, 2, 'active'),
(2, 'snwjnws', '2017-09-24', 2, 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `details` varchar(10) NOT NULL,
  `by_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `by_name` varchar(25) NOT NULL,
  `to_name` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `details`, `by_id`, `to_id`, `by_name`, `to_name`, `date`, `status`) VALUES
(1, 'approval', 'approved', 1, 2, 'aisha', 'ali', '0000-00-00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  `school_name` varchar(25) NOT NULL,
  `status` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`id`, `name`, `contact`, `email`, `specialization`, `school_id`, `school_name`, `status`, `photo`) VALUES
(1, 'Abdullah Ali', 485936345, 'aB@gmail.com', 'Phd in biology', 1, 'ASB School system', 'active', 'img/20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `role`, `contact`, `email`, `gender`, `BirthDate`, `status`, `username`, `password`) VALUES
(1, 'Ahmed Sahil', 'teacher', 485936345, 'as@gmail.com', 'Male', '2016-07-09 21:47:42', 'active', 'ahmed', 'ahmed'),
(2, 'Sara Ali', 'principal', 485936345, 'sa@gmail.com', 'female', '1997-07-09 21:47:42', 'active', 'sara', 'sara');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `fathername` varchar(25) NOT NULL,
  `contact` int(20) DEFAULT NULL,
  `rollno` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_name` varchar(20) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `name`, `fathername`, `contact`, `rollno`, `class_id`, `section_name`, `gender`, `photo`) VALUES
(1, 'Maryam Sameen', 'Abdullah Qureshi', 1197913737, 1, 3, 'lotus', 'female', 'img/1.jpg'),
(2, 'Abdullah Samiii', 'Sami Ahmed', 485936345, 2, 1, 'lotus', 'female', 'img/20.jpg'),
(3, 'Hania Rashid', 'Akhtar Ali', 18389837, 3, 1, 'lotus', 'Female', 'img/3.jpg'),
(4, 'Ali Khan', 'Akhtar Ali', 1021938283, 4, 5, 'lotus', 'Male', 'img/4.jpg'),
(5, 'Simal Rehman', 'Abdul Rehman', 1197913737, 5, 7, 'lotus', 'Female', 'img/10.jpg'),
(6, 'Ayesha Hassan', 'Hasan Ali', 1197913737, 6, 2, 'BBC', 'Female', NULL),
(7, 'Sara Akhtar', 'Akhtar Ali', 1749466483, 7, 2, 'lotus', 'Female', NULL),
(8, 'Umer Akram', 'Akram Shaihzad', 930891231, 8, 4, 'lotus', 'Male', NULL),
(9, 'Daniyal Shah', 'Taimoor Shah', 29382842, 9, 6, 'lotus', 'Male', NULL),
(10, 'Sanam Chaudhary', 'Abdullah Chaudhary', 238284448, 10, 4, 'BBC', 'female', NULL),
(11, 'Farooq Qureshi', 'Ahmed Quershi', 20893823, 11, 8, 'lotus', 'male', NULL),
(12, 'Kainat Ali', 'Ali Khan', 928918321, 12, 9, 'BBC', 'Female', NULL),
(13, 'Sana Daniyal', 'Daniyal Ahmed', 283803774, 13, 10, 'Lotus', 'female', NULL),
(14, 'Zafar Ali', 'Shan Akhtar', 12345678, 14, 12, 'BBC', 'Male', NULL),
(15, 'Ahmed Mujtba', 'Mujtba Sadique', 96542234, 15, 13, 'Lotus', 'Male', NULL),
(16, 'Farukh Zamaan', 'Zamaan ishtiaq', 2382382, 16, 13, 'BBC', 'Male', NULL),
(17, 'Arfa Kamaal', 'Kamaal Ali', 38138437, 17, 9, 'lotus', 'female', NULL),
(25, 'Arsalan Shaheer', 'Shaheer Ali', 485936345, 18, 1, 'lotus', 'male', 'img/18.jpg'),
(26, 'Arsalan Shaheer', 'Shaheer Ali', 485936345, 0, 7, '', 'male', '../admin/img/Arsalan Shah'),
(27, 'Arsalan Shaheer', 'Shaheer Ali', 485936345, 0, 7, '', 'male', '../admin/img/Arsalan Shah');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `teachername` varchar(50) NOT NULL,
  `today_activity` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `teacher_id`, `teachername`, `today_activity`) VALUES
(1, 'English', 2, 'Sara Ali', 'active'),
(2, 'Computer', 1, 'Ahmed Sahil', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `specialization` text NOT NULL,
  `photo` varchar(25) DEFAULT NULL,
  `attendance` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `contact`, `email`, `gender`, `specialization`, `photo`, `attendance`) VALUES
(1, 'Ahmed Sahil', 18389837, 'as@gmail.com', 'Male', 'Masters in CSE', 'img/Ahmed Sahil.jpg', 'yes'),
(2, 'Sara Ali', 485936345, 'sa@gmail.com', 'Female', 'Masters in IT', 'img/Sara Ali.jpg', 'yes'),
(3, 'Aneesa Rajpoot', 485936345, 'aneesa@gmail.com', 'Female', 'Masters in English', 'img/Aneesa Rajpoot.jpg', 'no'),
(4, 'Daniyal Farhad', 2147483647, 'dani@gmail.com', 'male', 'Masters in English', 'img/Daniyal Farhad.jpg', ''),
(5, 'Aiza Khan', 1197913737, 'aa@gmail.com', 'Female', 'Masters in Social Science', 'img/Aiza Khan.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `teachertime`
--

CREATE TABLE `teachertime` (
  `id` int(11) NOT NULL,
  `teachername` varchar(20) NOT NULL,
  `time_of_arrival` varchar(20) NOT NULL,
  `time_od_departure` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachertime`
--

INSERT INTO `teachertime` (`id`, `teachername`, `time_of_arrival`, `time_od_departure`) VALUES
(1, 'Ahmed Sahil', '8:00 AM', '2:00 AM'),
(2, 'Sara Ali', '8:15 AM', '2:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tresult`
--

CREATE TABLE `tresult` (
  `id` int(11) NOT NULL,
  `class` varchar(25) NOT NULL,
  `student` varchar(25) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `obtained_marks` int(11) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tresult`
--

INSERT INTO `tresult` (`id`, `class`, `student`, `total_marks`, `obtained_marks`, `subject`, `type`, `date`) VALUES
(1, '3', 'Hania Akhtar', 30, 25, ' Computer', 'Week Test', '2026-07-01'),
(2, '1', 'Maryam Sameen', 30, 25, ' Computer', 'Week Test', '2026-07-06'),
(3, '2nd', 'Hania', 60, 40, 'Science', 'grandtest', '2026-07-22'),
(4, '4th', 'Maryam', 60, 45, 'English', 'grandtest', '2026-06-01'),
(5, '5th', 'Maryam', 30, 20, 'Science', 'weektest', '2026-07-11'),
(6, '6th', 'Maryam', 60, 55, 'Computer', 'grandtest', '2026-07-10'),
(7, '7th', 'Maryam', 30, 28, ' Maths', 'weektest', '2026-07-06'),
(8, '8th', 'Hania', 30, 30, 'Urdu', 'weektest', '2026-06-08'),
(9, '9th', 'Ali', 30, 27, 'Science', 'weektest', '2026-06-18'),
(10, '10th', 'Abdullah', 60, 30, 'English', 'weektest', '2026-07-05'),
(11, '11th', 'Hania', 30, 30, 'Geographia', 'weektest', '2026-07-27'),
(12, '12th', 'Maryam', 60, 58, 'Physics', 'grandtest', '2026-07-05'),
(13, '11th', 'Maryam', 60, 58, 'Chemistry', 'grandtest', '2026-07-05'),
(14, '7th', 'Simal', 60, 58, 'English', 'grandtest', '2026-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `wtests`
--

CREATE TABLE `wtests` (
  `id` int(11) NOT NULL,
  `Total_tests` int(11) NOT NULL,
  `class` varchar(25) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `marks` int(3) NOT NULL,
  `gtime` varchar(11) NOT NULL,
  `stime` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wtests`
--

INSERT INTO `wtests` (`id`, `Total_tests`, `class`, `subject`, `marks`, `gtime`, `stime`) VALUES
(1, 2, '3', 'English, Maths', 30, '50 min', '10:00 AM'),
(2, 3, '7th Grade', 'Science, Computer, M', 30, '30 mins', '12:00 AM'),
(3, 1, '5th Grade', ' Computer', 30, '30 mins', '12:00 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admissionf`
--
ALTER TABLE `admissionf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_head` (`class_head`);

--
-- Indexes for table `cocurricular`
--
ALTER TABLE `cocurricular`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co_partner`
--
ALTER TABLE `co_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examresult`
--
ALTER TABLE `examresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `gtests`
--
ALTER TABLE `gtests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managecom`
--
ALTER TABLE `managecom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachertime`
--
ALTER TABLE `teachertime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tresult`
--
ALTER TABLE `tresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wtests`
--
ALTER TABLE `wtests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admissionf`
--
ALTER TABLE `admissionf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cocurricular`
--
ALTER TABLE `cocurricular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `co_partner`
--
ALTER TABLE `co_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `examresult`
--
ALTER TABLE `examresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gtests`
--
ALTER TABLE `gtests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `managecom`
--
ALTER TABLE `managecom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachertime`
--
ALTER TABLE `teachertime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tresult`
--
ALTER TABLE `tresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wtests`
--
ALTER TABLE `wtests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_2` FOREIGN KEY (`class_head`) REFERENCES `students` (`sid`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `fee_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`sid`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
