-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2026 at 07:42 AM
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
-- Database: `real_estate_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `security_answer` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`, `phone`, `security_answer`) VALUES
('a-001', 'Super Admin', '1234', '01700000001', 'boss'),
('a-002', 'System Manager', '1234', '01700000002', 'city'),
('a-003', 'Database Admin', '1234', '01700000003', 'code'),
('a-004', 'Support Lead', '1234', '01700000004', 'help'),
('a-005', 'HR Admin', '1234', '01700000005', 'team');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `prop_id` varchar(50) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `booking_date` datetime DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'Pending',
  `staff_id` varchar(15) DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  `visit_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `prop_id`, `user_id`, `booking_date`, `status`, `staff_id`, `visit_date`, `visit_time`) VALUES
(1, 'p-1001', 'u-101', '2026-01-10 09:00:00', 'Rejected', NULL, NULL, NULL),
(2, 'p-1002', 'u-101', '2026-01-12 10:30:00', 'In Progress', 's-101', '2026-02-01', '10:00:00'),
(3, 'p-1003', 'u-102', '2026-01-14 14:00:00', 'Completed', 's-101', '2026-01-18', '11:00:00'),
(4, 'p-1005', 'u-103', '2026-01-15 16:00:00', 'Pending', NULL, NULL, NULL),
(5, 'p-1006', 'u-104', '2026-01-16 08:45:00', 'In Progress', 's-102', '2026-02-05', '14:30:00'),
(6, 'p-1001', 'u-105', '2026-01-17 12:00:00', 'Completed', NULL, NULL, NULL),
(7, 'p-1008', 'u-102', '2026-01-18 11:20:00', 'Completed', 's-103', '2026-01-20', '09:00:00'),
(8, 'p-1009', 'u-101', '2026-01-19 13:10:00', 'In Progress', 's-104', '2026-02-02', '16:00:00'),
(9, 'p-1010', 'u-103', '2026-01-20 15:50:00', 'Pending', NULL, NULL, NULL),
(10, 'p-1002', 'u-104', '2026-01-21 17:00:00', 'Pending', NULL, NULL, NULL),
(12, 'p-1002', 'u-102', '2026-01-22 12:28:49', 'Pending', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_info`
--

CREATE TABLE `property_info` (
  `property_id` varchar(50) NOT NULL,
  `property_name` varchar(15) NOT NULL,
  `property_price` varchar(15) NOT NULL,
  `owner_id` varchar(15) NOT NULL,
  `buyer_name` varchar(15) NOT NULL,
  `buyer_phone` varchar(15) NOT NULL,
  `location` varchar(100) DEFAULT 'Dhaka',
  `status` varchar(20) DEFAULT 'Available',
  `description` text DEFAULT NULL,
  `property_image` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_info`
--

INSERT INTO `property_info` (`property_id`, `property_name`, `property_price`, `owner_id`, `buyer_name`, `buyer_phone`, `location`, `status`, `description`, `property_image`) VALUES
('p-1001', 'Luxury Villa', '50000000', 'po-101', '', '', 'Banani', 'Available', '5 Katha land with duplex villa, south facing.', 'default.jpg'),
('p-1002', 'Cozy Apartment', '8500000', 'po-101', '', '', 'Uttara', 'Available', '1200 sqft apartment, 3 bedrooms, near park.', 'default.jpg'),
('p-1003', 'Commercial Spac', '12000000', 'po-102', '', '', 'Gulshan', 'Available', 'Open floor plan for office, 2000 sqft.', 'default.jpg'),
('p-1004', 'Studio Flat', '3500000', 'po-102', '', '', 'Bashundhara', 'Sold', 'Small studio for students, fully furnished.', 'default.jpg'),
('p-1005', 'Riverside Plot', '7500000', 'po-103', '', '', 'Purbachal', 'Available', 'Ready plot for construction, 3 Katha.', 'default.jpg'),
('p-1006', 'Penthouse Suite', '25000000', 'po-101', '', '', 'Dhanmondi', 'Available', 'Top floor luxury suite with rooftop garden.', 'default.jpg'),
('p-1007', 'Shared Office', '5000000', 'po-104', '', '', 'Motijheel', 'Available', 'Co-working space share, 500 sqft.', 'default.jpg'),
('p-1008', 'Family Home', '9500000', 'po-105', '', '', 'Mirpur', 'Available', '3 Bedroom family apartment, 2nd floor.', 'default.jpg'),
('p-1009', 'Budget Flat', '4500000', 'po-105', '', '', 'Mohammadpur', 'Available', 'Affordable 2 bedroom flat, gas connection.', 'default.jpg'),
('p-1010', 'Lake View Apt', '11000000', 'po-102', '', '', 'Hatirjheel', 'Available', 'Lake view apartment, 1500 sqft.', 'default.jpg'),
('p-3546', 'Rooftop Flat', '15000000', 'po-101', '', '', 'Uttara', 'Available', 'A place to relax.', '6971c42260506.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `property_owner`
--

CREATE TABLE `property_owner` (
  `property_owner_id` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `security_answer` varchar(15) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_owner`
--

INSERT INTO `property_owner` (`property_owner_id`, `name`, `password`, `phone`, `security_answer`, `profile_pic`) VALUES
('po-101', 'Mr. Landlord', '1234', '01733333331', 'money', 'owner1.jpg'),
('po-102', 'Mrs. Host', '1234', '01733333332', 'house', 'owner2.jpg'),
('po-103', 'Real Estate Ltd', '1234', '01733333333', 'corp', NULL),
('po-104', 'Sheikh Properti', '1234', '01733333334', 'land', NULL),
('po-105', 'Modern Living', '1234', '01733333335', 'flat', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `security_answer` varchar(15) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `password`, `phone`, `security_answer`, `profile_pic`) VALUES
('s-101', 'Rahim Inspector', '1234', '01722222221', 'bike', 'staff1.jpg'),
('s-102', 'Karim Field', '1234', '01722222222', 'car', 'staff2.jpg'),
('s-103', 'Alice Agent', '1234', '01722222223', 'sky', NULL),
('s-104', 'Bob Surveyor', '1234', '01722222224', 'blue', NULL),
('s-105', 'Charlie Fixer', '1234', '01722222225', 'tool', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `security_answer` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `password`, `phone`, `security_answer`) VALUES
('u-101', 'John Tenant', '1234', '01711111111', 'max'),
('u-102', 'Sarah Buyer', '1234', '01711111112', 'dog'),
('u-103', 'Michael Smith', '1234', '01711111113', 'fish'),
('u-104', 'Emily Rose', '1234', '01711111114', 'bird'),
('u-105', 'David Miller', '1234', '01711111115', 'lion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
