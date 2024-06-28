-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 04:49 PM
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
-- Database: `vclinic_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `service_id` int(11) NOT NULL,
  `category_id` int(3) NOT NULL,
  `service_category` varchar(255) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `service_description` text DEFAULT NULL,
  `service_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`service_id`, `category_id`, `service_category`, `service_name`, `service_description`, `service_price`) VALUES
(1, 1, 'Comprehensive Eye Exams', 'Adult Eye Examination', 'Comprehensive eye exam for adults', 250.00),
(2, 1, 'Comprehensive Eye Exams', 'Children\'s Eye Examination', 'Comprehensive eye exam for children', 150.00),
(3, 2, 'Vision Correction', 'Prescription Eyeglasses', 'Customized eyeglasses with various lens and frame options', 200.00),
(4, 2, 'Vision Correction', 'Contact Lenses', 'Disposable contact lenses per box', 100.00),
(5, 2, 'Vision Correction', 'Orthokeratology Lenses', 'Specialized lenses for overnight vision correction', 1500.00),
(6, 2, 'Vision Correction', 'Scleral Lenses', 'Large, gas-permeable lenses for specific eye conditions', 2000.00),
(7, 3, 'Surgical Services', 'Cataract Surgery', 'Surgical removal of cataracts per eye', 3000.00),
(8, 3, 'Surgical Services', 'LASIK Surgery', 'Laser-assisted vision correction surgery per eye', 4000.00),
(9, 3, 'Surgical Services', 'PRK Surgery', 'Photorefractive keratectomy surgery per eye', 3000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
