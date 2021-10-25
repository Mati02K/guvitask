-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2021 at 06:16 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guvi`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_cno` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_dob` date NOT NULL,
  `u_addr` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `userpass` varchar(200) NOT NULL,
  `u_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `u_name`, `u_cno`, `u_email`, `u_dob`, `u_addr`, `username`, `userpass`, `u_token`) VALUES
(1, 'Mathesh', '7305588158', 'mati02official@gmail.com', '2000-08-02', 'No. 3/280, Andavar Flats\\\\n3rd Main Road, Raghava Nagar,Madipakkam,Chennai', 'Mathesh', 'bWF0aXNhdGk=', 'bWF0aTAyb2ZmaWNpYWxAZ21haWwuY29t'),
(4, 'Sathish', '9840905228', 'sathish@gmail.com', '2021-10-04', 'Lives in Chennai,Tamilnadu', 'Sathish', 'bWF0aXNhdGk=', 'c2F0aGlzaEBnbWFpbC5jb20=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `u_email` (`u_email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `u_token` (`u_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
