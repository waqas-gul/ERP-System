-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 09:29 PM
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
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_payable`
--

CREATE TABLE `accounts_payable` (
  `id` int(11) UNSIGNED NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `invoice_amount` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts_payable`
--

INSERT INTO `accounts_payable` (`id`, `vendor`, `invoice_amount`) VALUES
(1, 'me', 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `accounts_receivable`
--

CREATE TABLE `accounts_receivable` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer` varchar(255) NOT NULL,
  `invoice_amount` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts_receivable`
--

INSERT INTO `accounts_receivable` (`id`, `customer`, `invoice_amount`) VALUES
(1, 'me', 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `budgeting_forecasting`
--

CREATE TABLE `budgeting_forecasting` (
  `id` int(11) UNSIGNED NOT NULL,
  `year` int(4) NOT NULL,
  `budget_amount` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budgeting_forecasting`
--

INSERT INTO `budgeting_forecasting` (`id`, `year`, `budget_amount`) VALUES
(1, 5, 0.03);

-- --------------------------------------------------------

--
-- Table structure for table `customer_database`
--

CREATE TABLE `customer_database` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_database`
--

INSERT INTO `customer_database` (`id`, `customer_name`, `customer_email`, `customer_phone`) VALUES
(1, 'waqas', 'waqas@gmail.com', '33333');

-- --------------------------------------------------------

--
-- Table structure for table `customer_support`
--

CREATE TABLE `customer_support` (
  `id` int(11) UNSIGNED NOT NULL,
  `support_request` text NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_support`
--

INSERT INTO `customer_support` (`id`, `support_request`, `request_date`) VALUES
(1, 'test', '2024-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `employee_records`
--

CREATE TABLE `employee_records` (
  `id` int(11) UNSIGNED NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_position` varchar(255) NOT NULL,
  `employee_department` varchar(255) NOT NULL,
  `employee_salary` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_records`
--

INSERT INTO `employee_records` (`id`, `employee_name`, `employee_position`, `employee_department`, `employee_salary`) VALUES
(1, 'waqas', 'test', 'test', 0.03);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_surveys`
--

CREATE TABLE `feedback_surveys` (
  `id` int(11) UNSIGNED NOT NULL,
  `feedback_text` text NOT NULL,
  `feedback_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_surveys`
--

INSERT INTO `feedback_surveys` (`id`, `feedback_text`, `feedback_date`) VALUES
(1, 'test', '2024-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `general_ledger`
--

CREATE TABLE `general_ledger` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `debit` decimal(15,2) DEFAULT 0.00,
  `credit` decimal(15,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `general_ledger`
--

INSERT INTO `general_ledger` (`id`, `date`, `description`, `debit`, `credit`) VALUES
(1, '2024-09-02', 'ee', 0.01, 0.02),
(2, '2024-09-03', 'test', 0.01, 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_management`
--

CREATE TABLE `inventory_management` (
  `id` int(11) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_management`
--

INSERT INTO `inventory_management` (`id`, `item_name`, `item_quantity`, `item_price`) VALUES
(1, 'test', 44, 44.00);

-- --------------------------------------------------------

--
-- Table structure for table `marketing_automation`
--

CREATE TABLE `marketing_automation` (
  `id` int(11) UNSIGNED NOT NULL,
  `campaign_name` varchar(255) NOT NULL,
  `campaign_start_date` date NOT NULL,
  `campaign_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marketing_automation`
--

INSERT INTO `marketing_automation` (`id`, `campaign_name`, `campaign_start_date`, `campaign_end_date`) VALUES
(1, 'test', '2024-09-20', '2024-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `order_management`
--

CREATE TABLE `order_management` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_item` varchar(255) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_management`
--

INSERT INTO `order_management` (`id`, `order_item`, `order_quantity`, `order_date`) VALUES
(1, 'test', 6, '2024-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_processing`
--

CREATE TABLE `payroll_processing` (
  `id` int(11) UNSIGNED NOT NULL,
  `employee_id` int(11) UNSIGNED NOT NULL,
  `payroll_month` varchar(50) NOT NULL,
  `salary_paid` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll_processing`
--

INSERT INTO `payroll_processing` (`id`, `employee_id`, `payroll_month`, `salary_paid`) VALUES
(4, 1, '44', 0.03),
(5, 1, '44', 0.03),
(6, 1, '44', 0.03),
(7, 1, '44', 0.03),
(8, 1, '44', 0.03);

-- --------------------------------------------------------

--
-- Table structure for table `performance_management`
--

CREATE TABLE `performance_management` (
  `id` int(11) UNSIGNED NOT NULL,
  `employee_id` int(11) UNSIGNED NOT NULL,
  `evaluation_period` varchar(50) NOT NULL,
  `performance_score` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance_management`
--

INSERT INTO `performance_management` (`id`, `employee_id`, `evaluation_period`, `performance_score`) VALUES
(1, 1, '1', 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE `procurement` (
  `id` int(11) UNSIGNED NOT NULL,
  `procurement_item` varchar(255) NOT NULL,
  `procurement_quantity` int(11) NOT NULL,
  `procurement_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `procurement`
--

INSERT INTO `procurement` (`id`, `procurement_item`, `procurement_quantity`, `procurement_date`) VALUES
(1, 'test', 3, '2024-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_onboarding`
--

CREATE TABLE `recruitment_onboarding` (
  `id` int(11) UNSIGNED NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recruitment_onboarding`
--

INSERT INTO `recruitment_onboarding` (`id`, `job_title`, `job_description`) VALUES
(1, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `sales_management`
--

CREATE TABLE `sales_management` (
  `id` int(11) UNSIGNED NOT NULL,
  `sales_opportunity` varchar(255) NOT NULL,
  `sales_amount` decimal(15,2) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_management`
--

INSERT INTO `sales_management` (`id`, `sales_opportunity`, `sales_amount`, `sales_date`) VALUES
(1, 'test', 4.00, '2024-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_management`
--

CREATE TABLE `supplier_management` (
  `id` int(11) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_management`
--

INSERT INTO `supplier_management` (`id`, `supplier_name`, `supplier_contact`) VALUES
(1, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `training_development`
--

CREATE TABLE `training_development` (
  `id` int(11) UNSIGNED NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `program_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_development`
--

INSERT INTO `training_development` (`id`, `program_name`, `program_description`) VALUES
(1, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_management`
--

CREATE TABLE `warehouse_management` (
  `id` int(11) UNSIGNED NOT NULL,
  `warehouse_location` varchar(255) NOT NULL,
  `warehouse_capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warehouse_management`
--

INSERT INTO `warehouse_management` (`id`, `warehouse_location`, `warehouse_capacity`) VALUES
(1, 'test', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_payable`
--
ALTER TABLE `accounts_payable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts_receivable`
--
ALTER TABLE `accounts_receivable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budgeting_forecasting`
--
ALTER TABLE `budgeting_forecasting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_database`
--
ALTER TABLE `customer_database`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_support`
--
ALTER TABLE `customer_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_records`
--
ALTER TABLE `employee_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_surveys`
--
ALTER TABLE `feedback_surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_ledger`
--
ALTER TABLE `general_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_management`
--
ALTER TABLE `inventory_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing_automation`
--
ALTER TABLE `marketing_automation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_management`
--
ALTER TABLE `order_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_processing`
--
ALTER TABLE `payroll_processing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `performance_management`
--
ALTER TABLE `performance_management`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `procurement`
--
ALTER TABLE `procurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitment_onboarding`
--
ALTER TABLE `recruitment_onboarding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_management`
--
ALTER TABLE `sales_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_management`
--
ALTER TABLE `supplier_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_development`
--
ALTER TABLE `training_development`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_management`
--
ALTER TABLE `warehouse_management`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_payable`
--
ALTER TABLE `accounts_payable`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accounts_receivable`
--
ALTER TABLE `accounts_receivable`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `budgeting_forecasting`
--
ALTER TABLE `budgeting_forecasting`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_database`
--
ALTER TABLE `customer_database`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_support`
--
ALTER TABLE `customer_support`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_records`
--
ALTER TABLE `employee_records`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback_surveys`
--
ALTER TABLE `feedback_surveys`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_ledger`
--
ALTER TABLE `general_ledger`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_management`
--
ALTER TABLE `inventory_management`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marketing_automation`
--
ALTER TABLE `marketing_automation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_management`
--
ALTER TABLE `order_management`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payroll_processing`
--
ALTER TABLE `payroll_processing`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `performance_management`
--
ALTER TABLE `performance_management`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `procurement`
--
ALTER TABLE `procurement`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recruitment_onboarding`
--
ALTER TABLE `recruitment_onboarding`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_management`
--
ALTER TABLE `sales_management`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_management`
--
ALTER TABLE `supplier_management`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `training_development`
--
ALTER TABLE `training_development`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouse_management`
--
ALTER TABLE `warehouse_management`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payroll_processing`
--
ALTER TABLE `payroll_processing`
  ADD CONSTRAINT `payroll_processing_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee_records` (`id`);

--
-- Constraints for table `performance_management`
--
ALTER TABLE `performance_management`
  ADD CONSTRAINT `performance_management_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee_records` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
