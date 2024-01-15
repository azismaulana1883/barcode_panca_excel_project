-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 10:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panbrothrers`
--

-- --------------------------------------------------------

--
-- Table structure for table `label_master`
--

CREATE TABLE `label_master` (
  `id` int(11) NOT NULL,
  `model_description` varchar(255) NOT NULL,
  `model_number` varchar(255) NOT NULL,
  `sap_code` varchar(255) NOT NULL,
  `upc_code` varchar(20) NOT NULL,
  `sku_number` varchar(255) NOT NULL,
  `size_description` varchar(255) NOT NULL,
  `colour_description` varchar(255) NOT NULL,
  `colour_code` int(100) NOT NULL,
  `msrp_cad` varchar(255) NOT NULL,
  `qr_caption` varchar(255) NOT NULL,
  `qr_data` varchar(255) NOT NULL,
  `pono` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `label_master`
--

INSERT INTO `label_master` (`id`, `model_description`, `model_number`, `sap_code`, `upc_code`, `sku_number`, `size_description`, `colour_description`, `colour_code`, `msrp_cad`, `qr_caption`, `qr_data`, `pono`) VALUES
(1, 'Arro Pant Men''s', 'X000006018', 'L07744600', '686487702783', 'X000006018001', '32" Waist-Short', 'Black', 2291, '', 'Scan for info m.arcteryx.com', 'http://m.arcteryx.com/qr/X000006018', '6300091814'),
(2, 'Arro Pant Men''s', 'X000006018', 'L07744600', '686487702769', 'X000006018004', '30" Waist-Short', 'Black', 2291, '', 'Scan for info m.arcteryx.com', 'http://m.arcteryx.com/qr/X000006018', '6300091814'),
(3, 'Arro Pant Men''s', 'X000006018', 'L07744600', '686487702783', 'X000006018007', '36" Waist-Short', 'Black', 2291, '', 'Scan for info m.arcteryx.com', 'http://m.arcteryx.com/qr/X000006018', '6300091814'),
(4, 'Arro Pant Men''s', 'X000006018', 'L07744600', '686487702769', 'X000006018010', '30" Waist-Short', 'Black', 2291, '', 'Scan for info m.arcteryx.com', 'http://m.arcteryx.com/qr/X000006018', '6300091814'),
(5, 'Arro Pant Men''s', 'X000006018', 'L07744600', '686487702738', 'X000006018006', '28" Waist-Regular', 'Black', 2291, '', 'Scan for info m.arcteryx.com', 'http://m.arcteryx.com/qr/X000006018', '6300091814'),
(6, 'Arro Pant Men''s', 'X000006018', 'L07744600', '686487702752', 'X000006018002', '30" Waist-Regular', 'Black', 2291, '', 'Scan for info m.arcteryx.com', 'http://m.arcteryx.com/qr/X000006018', '6300091814'),
(7, 'Arro Pant Men''s', 'X000006018', 'L07744600', '686487702783', 'X000006018001', '32" Waist-Short', 'Black', 2291, '', 'Scan for info m.arcteryx.com', 'http://m.arcteryx.com/qr/X000006018', '6300091814'),
(8, 'Arro Pant Men''s', 'X000006018', 'L07744600', '686487702769', 'X000006018004', '30" Waist-Short', 'Black', 2291, '', 'Scan for info m.arcteryx.com', 'http://m.arcteryx.com/qr/X000006018', '6300091814'),
(9, 'Arro Pant Men''s', 'X000006018', 'L07744600', '686487702806', 'X000006018010', '34" Waist-Short', 'Black', 2291, '', 'Scan for info m.arcteryx.com', 'http://m.arcteryx.com/qr/X000006018', '6300091814'),
(10, 'Arro Pant Men''s', 'X000006018', 'L07744600', '686487702806', 'X000006018010', '34" Waist-Short', 'Black', 2291, '', 'Scan for info m.arcteryx.com', 'http://m.arcteryx.com/qr/X000006018', '6300091814'),
(11, 'Arro Pant Men''s', 'X000006018', 'L07744600', '686487702820', 'X000006018007', '36" Waist-Short', 'Black', 2291, '', 'Scan for info m.arcteryx.com', 'http://m.arcteryx.com/qr/X000006018', '6300091814'),
(12, 'Arro Pant Men''s', 'X000006018', 'L07744600', '686487702806', 'X000006018010', '34" Waist-Short', 'Black', 2291, '', 'Scan for info m.arcteryx.com', 'http://m.arcteryx.com/qr/X000006018', '6300091814');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `label_master`
--
ALTER TABLE `label_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `label_master`
--
ALTER TABLE `label_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
