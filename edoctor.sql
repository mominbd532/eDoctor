-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2020 at 02:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edoctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `doctor_id`, `date`, `time`) VALUES
(80, 1, 4, '2020-02-24', '5:30 AM'),
(79, 1, 6, '2020-02-23', '5:30 AM'),
(78, 1, 0, '2020-02-22', '2:45 AM'),
(77, 1, 4, '2020-02-21', '2:30 AM');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_email` varchar(255) NOT NULL,
  `doctor_phone` varchar(255) NOT NULL,
  `doctor_password` varchar(255) NOT NULL,
  `doctor_photo` varchar(255) NOT NULL,
  `doctor_hospital` varchar(255) NOT NULL,
  `doctor_designation` varchar(255) NOT NULL,
  `doctor_qualification` varchar(255) NOT NULL,
  `doctor_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `doctor_name`, `doctor_email`, `doctor_phone`, `doctor_password`, `doctor_photo`, `doctor_hospital`, `doctor_designation`, `doctor_qualification`, `doctor_status`) VALUES
(4, 'Doctor Name', 'doctor@auxinit.com', '017772123123', 'MTIzNDU2', 'sdfsd.PNG', 'Square Hospital', 'Senior Consultant', 'FCPS', 1),
(6, 'Daktar', 'daktar@gmail.com', '0177777666', 'MTIzNDU=', 'sdfsd.PNG', 'Green Hospital Ltd', 'Medicine Consultant', 'MBBS, FCPS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `payment_mode` varchar(10) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `invoice_title` varchar(100) NOT NULL,
  `invoice_amount` varchar(100) NOT NULL,
  `invoice_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `patient_id`, `doctor_id`, `payment_mode`, `payment_status`, `invoice_title`, `invoice_amount`, `invoice_date`) VALUES
(27, 1, 6, 'Cash', 'Paid', '[\"aa\",\"ss\"]', '[\"11\",\"22\"]', '2020-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicine_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicine_id`, `name`) VALUES
(1, 'Napa');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `add` varchar(50) NOT NULL,
  `height` varchar(5) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `b_group` varchar(10) DEFAULT NULL,
  `b_pressure` int(11) DEFAULT NULL,
  `pulse` int(11) DEFAULT NULL,
  `respiration` int(11) DEFAULT NULL,
  `allergy` varchar(50) DEFAULT NULL,
  `diet` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `p_name`, `email`, `password`, `profile_photo`, `age`, `gender`, `phone`, `add`, `height`, `weight`, `b_group`, `b_pressure`, `pulse`, `respiration`, `allergy`, `diet`) VALUES
(1, 'Patient', 'patient@gmail.com', 'MTIzNDU2', 'logo-jpg.jpg', 23, 'male', '01811111110', '75/1, Shukrabad, Dhaka - 1207', '5.76', 55, 'A+', 123, 88, 12, 'dfsd sfdg', 'fdgdf'),
(5, 'Patient 1', 'patient1@gmail.com', 'MTIzNDU2', '', 23, 'male', '01811111111', 'Address', '', NULL, '', NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `prescription_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `symptoms` varchar(100) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `medicine` varchar(100) NOT NULL,
  `m_note` varchar(100) NOT NULL,
  `m_dose` varchar(255) DEFAULT NULL,
  `test` varchar(100) NOT NULL,
  `t_note` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`prescription_id`, `patient_id`, `doctor_id`, `symptoms`, `diagnosis`, `medicine`, `m_note`, `m_dose`, `test`, `t_note`, `date`) VALUES
(37, 1, 6, 'dfgd', 'fdg', '[\"dfgd\",\"dfgdf\"]', '[\"dfg\",\"gdfg\"]', NULL, '[\"dfg\",\"jhgj\"]', '[\"dfg\",\"sdf\"]', '2020-02-22'),
(38, 1, 6, 'dfhfg', 'hfgh', '[\"gfhfg\",\"fghfg\"]', '[\"fgh\",\"gfhf\"]', '[\"fhfgh\",\"fdgdfg\"]', '[\"fghf\"]', '[\"hfgh\"]', '2020-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL DEFAULT 'logo1.png',
  `favicon` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT 'eDoctor',
  `profile_photo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `user_phone`, `address`, `password`, `logo`, `favicon`, `title`, `profile_photo`) VALUES
(1, 'Asif Rahman Shibli', 'admin@example.com', '01777695276', '75/1, Shukrabad, Dhaka', 'MTIzNDU2', 'logo.png', 'favicon.ico', 'eDoctor', 'male_avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
