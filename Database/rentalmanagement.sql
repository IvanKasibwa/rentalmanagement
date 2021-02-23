-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 08:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(10) UNSIGNED NOT NULL,
  `house_number` varchar(40) NOT NULL,
  `features` text NOT NULL,
  `rent` int(40) NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Vacant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `house_number`, `features`, `rent`, `status`) VALUES
(2, 'A21', '3 bedroom,swimming pool,bathtub,hot water,kitchen', 25000, 'Occupied'),
(3, 'A22', 'bedsitter', 6000, 'Vacant'),
(14, 'A12 - Wise House', 'Two Bedroom with Master Living Room', 45000, 'Occupied'),
(15, 'A4 - Wise House', 'Two Bedroom', 7900, 'Occupied'),
(24, '4H', 'The main House Added', 3200, 'OCcupied'),
(25, 'A6 - Wise House', 'Two Bedroom', 87, 'Occupied'),
(32, 'Wakorino House b12', 'Has one big Bedroom and a master suite kitchem', 45000, 'Occupied'),
(33, 'ACUMENT FIG HOUSE', 'Master Suite, Self Contained House', 55000, 'Occupied');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `Invoice_Amount` int(11) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Date_Invoiced` date NOT NULL,
  `house` varchar(200) NOT NULL,
  `tenant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `Invoice_Amount`, `Description`, `Date_Invoiced`, `house`, `tenant`) VALUES
(1, 3200, 'Rent for February', '2021-02-23', '24', 4),
(2, 3200, 'Rent for February', '2021-02-23', '24', 4),
(3, 6000, 'Half Paid', '2021-02-23', '15', 5),
(4, 2000, 'Second commitment', '2021-02-23', '15', 5),
(5, 20000, 'Half Deposit', '2021-02-23', '32', 16),
(6, 5000, 'Brocken Glass', '2021-02-23', '32', 16),
(7, 14800, 'Filing for the child', '2021-02-23', '2', 15),
(8, 45000, 'Filing for the child 2', '2021-02-23', '25', 13),
(9, 23000, 'Filing for the child 2 4 with edits', '2021-02-23', '25', 13),
(10, 55000, 'First deposit', '2021-02-23', '33', 17);

-- --------------------------------------------------------

--
-- Stand-in structure for view `invoice_master`
-- (See below for the actual view)
--
CREATE TABLE `invoice_master` (
`tenant` int(11)
,`Total_Invoice` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `master_balance`
-- (See below for the actual view)
--
CREATE TABLE `master_balance` (
`tenant` int(11)
,`Total_Invoice` decimal(32,0)
,`Total_Payment` decimal(32,0)
,`Balance` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `master_payment`
-- (See below for the actual view)
--
CREATE TABLE `master_payment` (
`tenant` int(11)
,`Total_Payment` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `Payment_Amount` int(11) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Date_Paid` date NOT NULL,
  `house` varchar(200) NOT NULL,
  `tenant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `Payment_Amount`, `Description`, `Date_Paid`, `house`, `tenant`) VALUES
(1, 17000, 'Half Paid', '2021-02-23', '32', 16),
(2, 6000, 'Payment of Balance', '2021-02-23', '32', 16),
(3, 1300, 'Half Paid', '2021-02-23', '32', 16),
(4, 8900, 'Filing for the child', '2021-02-23', '2', 15),
(5, 26700, 'Half Paid', '2021-02-23', '25', 13),
(6, 23000, 'Half Paid', '2021-02-23', '33', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `national_id` varchar(40) NOT NULL,
  `phone_number` varchar(40) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `registration_date` date NOT NULL,
  `house` int(10) UNSIGNED NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Tenant in',
  `exit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `fullname`, `gender`, `national_id`, `phone_number`, `email`, `registration_date`, `house`, `status`, `exit_date`) VALUES
(1, 'anwar mohamed', 'male', '33516718291', '0712345678', 'anwarmoha@gmail.com', '2018-05-10', 1, 'Occupied', NULL),
(2, 'alijahuzi magu', 'male', '123456789098', '0798765432', 'ali@gmail.com', '2018-05-11', 2, 'Occupied', NULL),
(3, 'Ketray Munyasa', 'female', '22368128191', '0727817507', 'ketmunyasa@gmail.com', '2018-05-11', 3, 'Occupied', NULL),
(4, 'IVAN AGESA', 'M', '28014572', '0716692699', 'ivanagesa@gmail.com', '2021-02-22', 24, 'Occupied', NULL),
(7, 'MARY KAMAU', 'F', '5576778', '0716692699', 'ivanagesa@gmail.com', '2021-02-22', 25, 'Occupied', NULL),
(16, 'BENARD OCHIENG', 'M', '36344563', '0716692699', 'ivanagesa@gmail.com', '2021-02-23', 32, 'Tenant in', NULL),
(17, 'PAUL MAKUNA', 'M', '56547', '07234532523', 'paul@gmail.com', '2021-02-23', 33, 'Tenant in', NULL);

-- --------------------------------------------------------

--
-- Structure for view `invoice_master`
--
DROP TABLE IF EXISTS `invoice_master`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoice_master`  AS  select `invoices`.`tenant` AS `tenant`,sum(`invoices`.`Invoice_Amount`) AS `Total_Invoice` from `invoices` group by `invoices`.`tenant` ;

-- --------------------------------------------------------

--
-- Structure for view `master_balance`
--
DROP TABLE IF EXISTS `master_balance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `master_balance`  AS  select `invoice_master`.`tenant` AS `tenant`,`invoice_master`.`Total_Invoice` AS `Total_Invoice`,`master_payment`.`Total_Payment` AS `Total_Payment`,ifnull(`invoice_master`.`Total_Invoice`,0) - ifnull(`master_payment`.`Total_Payment`,0) AS `Balance` from (`invoice_master` left join `master_payment` on(`invoice_master`.`tenant` = `master_payment`.`tenant`)) ;

-- --------------------------------------------------------

--
-- Structure for view `master_payment`
--
DROP TABLE IF EXISTS `master_payment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `master_payment`  AS  select `payment`.`tenant` AS `tenant`,sum(`payment`.`Payment_Amount`) AS `Total_Payment` from `payment` group by `payment`.`tenant` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house` (`house`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
