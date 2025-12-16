-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2025 at 05:40 PM
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
-- Database: `votesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'admin', '$2y$10$VNnh9v32Wt0.svL4LGnHPOPI3Q4LFxRaxCu6mwxabRsnTZMmeOExW', 'Sunny', 'Ajinkya', 'facebook-profile-image.jpeg', '2018-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `position_id`, `firstname`, `lastname`, `photo`, `platform`) VALUES
(1, 10, 'Amit', 'Verma', '', 'Development & Growth'),
(2, 11, 'Rohit', 'Singh', '', 'Youth Empowerment'),
(3, 12, 'Ankit', 'Gupta', '', 'Economic Reform'),
(4, 13, 'Vikas', 'Yadav', '', 'State Progress'),
(5, 14, 'Suresh', 'Meena', '', 'Public Welfare'),
(7, 16, 'Nitin', 'Sharma', '', 'National Development'),
(8, 17, 'Pankaj', 'Jain', '', 'Education Reform'),
(9, 18, 'Rahul', 'Chauhan', '', 'Urban Development');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `max_vote`, `priority`) VALUES
(10, 'President', 100, 1),
(11, 'Vice President', 100, 2),
(12, 'Prime Minister', 100, 3),
(13, 'Chief Minister', 100, 4),
(14, 'Governor', 100, 5),
(16, 'Member of Parliament (MP)', 100, 6),
(17, 'Member of Legislative Assembly (MLA)', 100, 7),
(18, 'Councillor / Corporator', 100, 8);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `voters_id` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `voters_id`, `password`, `firstname`, `lastname`, `photo`) VALUES
(1, 'MaqjrCVn2Gul14K', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Sunny', 'Sharma', ''),
(2, 'RdQWcTgzSBH4LAv', '$2y$10$la6URUdYxLOLtG20BEhTNuvDOQ.5u5qvWot1PrQWpuwAWVE7a2ltm', 'Ajinkya', 'Dewan', ''),
(4, 'A9KfL21QxP7MZt', '$2y$10$OQLXWncuU7gRn7ij0PkyiOpLHX8HdLOBMqJ2F74KecGTSTpDzhpza', 'Amit', 'Verma', ''),
(5, 'B7M2QZ9LxT1P4A', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Rohit', 'Singh', ''),
(6, 'C8T4ZQ1MPA9L7x', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Ankit', 'Gupta', ''),
(7, 'D1Z7QxP8T9M4LA', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Vikas', 'Yadav', ''),
(8, 'E4MZ1Q9P7TxLA8', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Suresh', 'Meena', ''),
(9, 'FZ8M9L1TQx7AP4', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Deepak', 'Kumar', ''),
(10, 'GQ7x4PZ9A1MLT8', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Nitin', 'Sharma', ''),
(11, 'H1Z8M4TxP9QAL7', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Pankaj', 'Jain', ''),
(12, 'I9QZx1TAP7L8M4', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Rahul', 'Chauhan', ''),
(13, 'JZ9P4M7T8xQ1LA', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Manish', 'Pandey', ''),
(14, 'K8Q1Z9M4Tx7PAL', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Sachin', 'Rawat', ''),
(15, 'LZ4M7Q9T1xPA8', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Aakash', 'Negi', ''),
(16, 'M7Q9ZxT4L1PA8', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Ravi', 'Joshi', ''),
(17, 'N8TQZ4Lx7P9MA1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Kunal', 'Bansal', ''),
(18, 'OZ9T8Qx1PML4A7', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Harshit', 'Agarwal', ''),
(19, 'P4ZQ8M7T9x1LA', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Aditya', 'Malik', ''),
(20, 'Q7Zx8M9L4T1PA', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Mohit', 'Saini', ''),
(21, 'R8M7TQZ9LxP1A4', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Yogesh', 'Rana', ''),
(22, 'S9L7Qx8Z4TPM1A', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Arjun', 'Kapoor', ''),
(23, 'T7Q8Z9xL4PMA1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Gaurav', 'Mishra', ''),
(24, 'U8ZQ7M4T9xPAL1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Sandeep', 'Tripathi', ''),
(25, 'VZ9T4Q7M8xL1PA', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Vivek', 'Dubey', ''),
(26, 'W7MZQ8x9T1PLA4', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Lokesh', 'Thakur', ''),
(27, 'X9TQZ4M8xP1LA7', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Rajeev', 'Saxena', ''),
(28, 'YQ9Z8x7M4TPL1A', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Pradeep', 'Goyal', ''),
(29, 'Z8Qx9T7L4PMA1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Naresh', 'Khatri', ''),
(30, 'AA9Q8T4M7xZL1P', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Bhavesh', 'Patel', ''),
(31, 'AB7MZ9x4Q1TP8L', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Jatin', 'Arora', ''),
(32, 'AC8TQZ7M9x4L1P', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Naveen', 'Bhardwaj', ''),
(33, 'AD9MZ8x7T4QL1P', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Karan', 'Sood', ''),
(34, 'AE7ZQ9xM8T4PL1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Aman', 'Bhardwaj', ''),
(35, 'AF8M9ZxTQ4PL17', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Tarun', 'Gill', ''),
(36, 'AG9Z7M4xTQPL18', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Ritesh', 'Bhatt', ''),
(37, 'AH8Q9Zx7M4TPL1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Sumit', 'Kaushik', ''),
(38, 'AI7Z8M9x4TPLQ1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Shubham', 'Tyagi', ''),
(39, 'AJ9Z7M8x4TQPL1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Anuj', 'Goswami', ''),
(40, 'AK8Z9x7M4TPLQ1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Hemant', 'Shukla', ''),
(41, 'AL9MZ7x8T4QPL1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Mayank', 'Dwivedi', ''),
(42, 'AM8Z9x7M4TPLQ1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Nikhil', 'Rastogi', ''),
(43, 'AN7Z8M9x4TPLQ1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Saurabh', 'Tiwari', ''),
(44, 'AO9Z7M8x4TPLQ1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Varun', 'Choudhary', ''),
(45, 'AP8Z9x7M4TPLQ1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Rakesh', 'Solanki', ''),
(46, 'AQ7Z8M9x4TPLQ1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Ajay', 'Pal', ''),
(47, 'AR9Z7M8x4TPLQ1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Dinesh', 'Bisht', ''),
(48, 'AS8Z9x7M4TPLQ1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Mukesh', 'Kashyap', ''),
(49, 'AT7Z8M9x4TPLQ1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Rohit', 'Nagar', ''),
(50, 'AU9Z7M8x4TPLQ1', '$2y$10$.nb1M/bd3u0VKQ9xiNSVYe4Iiy2FXb7vTX//8YMDCBIttUu8QgEMi', 'Vinay', 'Bhardwaj', ''),
(51, 'dVvLwh5knBgX8JK', '$2y$10$teY3jaSIPlNh4pYAf2tLmefEwre4bLS5xaxfyV2OObDaVF6VwNAaS', 'Kirti', 'Bhatia', '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voters_id` varchar(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voters_id`, `candidate_id`, `position_id`) VALUES
(0, '1', 8, 17),
(0, '2', 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
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
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
