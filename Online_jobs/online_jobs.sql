-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2017 at 06:57 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_code` int(11) NOT NULL,
  `phone_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `name`, `email`, `phone_code`, `phone_num`) VALUES
(1, 'Abdullah Tarek', 'abdullah.tarek@gmail.com', 20, 1013642801),
(2, 'Ali Medhat', 'ali.medhat@gmail.com', 20, 1000248659),
(3, 'Omar Gamal', 'omar.gamal59@gmail.com', 20, 1153184037),
(4, 'AbdElfatah Ramadan', 'tteha42@gmail.com', 20, 1141336724),
(5, 'Abdullah Mohammed', 'abdullah.mohammed@gmail.com', 20, 1110195639);

-- --------------------------------------------------------

--
-- Table structure for table `advice`
--

CREATE TABLE `advice` (
  `advice_id` int(11) NOT NULL,
  `advice_cont` text NOT NULL,
  `advisor` int(11) NOT NULL,
  `advice_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advice`
--

INSERT INTO `advice` (`advice_id`, `advice_cont`, `advisor`, `advice_time`) VALUES
(1, 'hi it is just advice', 2, '2017-05-08 16:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `apply_job`
--

CREATE TABLE `apply_job` (
  `job_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apply_job`
--

INSERT INTO `apply_job` (`job_id`, `com_id`, `employee_id`) VALUES
(10, 5, 4),
(12, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `approve`
--

CREATE TABLE `approve` (
  `app_emp` int(11) NOT NULL,
  `app_job` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `action` varchar(6) NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_cont` varchar(255) NOT NULL,
  `commenter` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `advice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_cont`, `commenter`, `time`, `advice_id`) VALUES
(1, 'hi it is just comment\r\n', 2, '2017-05-08 16:42:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favorite_jobs`
--

CREATE TABLE `favorite_jobs` (
  `emp_id` int(11) NOT NULL,
  `fav_job` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorite_jobs`
--

INSERT INTO `favorite_jobs` (`emp_id`, `fav_job`) VALUES
(4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`cat_id`, `cat_name`) VALUES
(1, '.NET Developers'),
(2, '3D Animators'),
(5, 'Academic Writers'),
(6, 'Accounting Assistants'),
(7, 'Accounts Payable Specialists'),
(8, 'Accounts Receivable Specialists'),
(9, 'Administrative Support Assistants'),
(10, 'Advertising Consultants'),
(11, 'Ajax Developers'),
(12, 'Android Developers'),
(13, 'Animators'),
(3, 'API Developers'),
(14, 'Appointment Setters'),
(15, 'Article Submission Contractors'),
(16, 'Article Writers'),
(4, 'ASP.NET Developers'),
(17, 'B2B Marketers'),
(19, 'Basecamp Specialists'),
(20, 'Blog Writers'),
(21, 'Bookkeeping Assistants'),
(22, 'Bootstrap Designers'),
(18, 'BPO Call Center Agents'),
(23, 'Brand Strategists'),
(24, 'Budgeting & Forecasting Contractors'),
(25, 'Business Analysts'),
(26, 'Business Coaches'),
(27, 'Business Development Analysts'),
(28, 'Business Planning Analysts'),
(29, 'Business Writers'),
(30, 'C# Developers'),
(33, 'Calendar Management Assistants'),
(34, 'Chat Support Agents'),
(35, 'Cold Callers'),
(36, 'Computer Skills Freelancers'),
(37, 'Content Writers'),
(38, 'Copy Editors'),
(39, 'Copywriters'),
(40, 'Creative Writers'),
(31, 'CRM Consultants'),
(32, 'CSS Developers'),
(41, 'Customer Service Agents'),
(42, 'Data Entry Specialists'),
(43, 'Data Miners'),
(44, 'Direct Marketers'),
(135, 'Doctor'),
(45, 'Editors'),
(46, 'Email Handlers'),
(47, 'Email Marketing Consultants'),
(48, 'Email Tech Support Agents'),
(49, 'English Writers & Translators'),
(50, 'Enterprise Resource Planners'),
(51, 'Excel Experts'),
(52, 'Facebook API Developers'),
(53, 'Financial Forecasters & Modelers'),
(54, 'Financial Reporting Analysts'),
(55, 'French Writers & Translators'),
(56, 'German Writers & Translators\r\n'),
(57, 'Ghostwriters\r\n'),
(58, 'Google AdWords Experts\r\n'),
(59, 'Google Analytics Consultants\r\n'),
(60, 'Google Docs Experts\r\n'),
(61, 'Google Search Agents\r\n'),
(62, 'Google Sheets Experts\r\n'),
(63, 'Google Website Optimizer Consultants\r\n'),
(64, 'Graphic Designers\r\n'),
(67, 'Helpdesk Support Contractors\r\n'),
(65, 'HTML Developers\r\n'),
(66, 'HTML5 Developers\r\n'),
(68, 'Human Resource Managers\r\n'),
(69, 'Internet Marketing Consultants\r\n'),
(70, 'Internet Researchers\r\n'),
(132, 'iOS Developers\r\n'),
(71, 'Italian Writers & Translators\r\n'),
(72, 'Java Developers\r\n'),
(73, 'JavaScript Developers\r\n'),
(74, 'Journalists\r\n'),
(133, 'jQuery Developers'),
(75, 'Lead Generation Specialists\r\n'),
(76, 'Link Builders\r\n'),
(77, 'LinkedIn Recruiters\r\n'),
(78, 'Logo Designers\r\n'),
(79, 'Magento Developers\r\n'),
(80, 'Market Researchers\r\n'),
(81, 'Marketing Strategists\r\n'),
(82, 'Microsoft Word Experts\r\n'),
(83, 'MySQL Developers\r\n'),
(84, 'Negotiation Specialists\r\n'),
(85, 'Objective-C Developers\r\n'),
(86, 'On-Page Optimization Experts\r\n'),
(87, 'Outbound Sales Consultants\r\n'),
(88, 'PDF Conversion Experts\r\n'),
(91, 'Photo Editors\r\n'),
(89, 'PHP Developers\r\n'),
(92, 'PowerPoint Producers\r\n'),
(90, 'PPC Specialists\r\n'),
(93, 'Press Release Writers\r\n'),
(94, 'Project Management Analysts\r\n'),
(95, 'Proofreaders\r\n'),
(96, 'Python Developers\r\n'),
(97, 'QuickBooks Contractors\r\n'),
(98, 'Recruiting Assistants\r\n'),
(99, 'Research Assistants\r\n'),
(100, 'Ruby on Rails Developers\r\n'),
(101, 'Russian Writers & Translators\r\n'),
(106, 'Sales Consultants\r\n'),
(107, 'Sales Writers\r\n'),
(108, 'Screenwriters\r\n'),
(109, 'Scrum Assistants\r\n'),
(102, 'SEM Specialists\r\n'),
(103, 'SEO Experts\r\n'),
(110, 'Skype Assistants\r\n'),
(111, 'Social Media Consultants\r\n'),
(112, 'Spanish Writers & Translators\r\n'),
(113, 'Spreadsheet Experts\r\n'),
(104, 'SQL Programmers\r\n'),
(105, 'SQL Server Developers\r\n'),
(114, 'Statistics Analysts\r\n'),
(115, 'Tax Preparation Specialist\r\n'),
(134, 'Teacher'),
(116, 'Technical Support Agents\r\n'),
(117, 'Technical Writers\r\n'),
(118, 'Telemarketers\r\n'),
(119, 'Transcriptionists\r\n'),
(120, 'Translators\r\n'),
(121, 'Twitter API Developers\r\n'),
(122, 'Twitter Bootstrap Developers\r\n'),
(123, 'Typing Agents\r\n'),
(124, 'UI Designers\r\n'),
(125, 'Virtual Assistants\r\n'),
(126, 'Web Content Managers\r\n'),
(127, 'Web Designers\r\n'),
(128, 'Wordpress Developers\r\n'),
(129, 'Writers\r\n'),
(130, 'Xero Contractors\r\n'),
(131, 'Zendesk Freelancers\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `job_info`
--

CREATE TABLE `job_info` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `job_field` int(11) DEFAULT NULL,
  `job_salary` int(11) NOT NULL,
  `job_free_places` int(11) NOT NULL,
  `job_description` text NOT NULL,
  `job_date` datetime NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_exp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_info`
--

INSERT INTO `job_info` (`job_id`, `job_name`, `job_field`, `job_salary`, `job_free_places`, `job_description`, `job_date`, `company_id`, `job_exp`) VALUES
(6, 'English Teacher', 134, 3000, 3, 'We need a good English Teacher\r\nWe need a good English Teacher\r\nWe need a good English Teacher\r\nWe need a good English Teacher\r\nWe need a good English Teacher\r\nWe need a good English Teacher\r\n', '2017-05-09 06:14:00', 5, 6),
(8, '.NET Developer', 1, 4500, 5, 'We need a good  Developer\r\nWe need a good  Developer\r\nWe need a good  Developer\r\nWe need a good  Developer\r\nWe need a good  Developer\r\nWe need a good  Developer\r\n', '2017-05-09 06:15:32', 5, 2),
(10, '3D Animator', 2, 7000, 5, 'We need a good  3D Animator\r\nWe need a good  3D Animator\r\nWe need a good  3D Animator\r\nWe need a good  3D Animator\r\nWe need a good  3D Animator\r\n\r\n', '2017-05-09 06:17:02', 5, 1),
(12, 'Accountant ', 6, 3000, 19, 'We need a professional Accountant\r\nWe need a professional Accountant\r\nWe need a professional Accountant\r\nWe need a professional Accountant\r\nWe need a professional Accountant\r\n', '2017-05-09 06:20:48', 5, 100);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` tinyint(4) NOT NULL,
  `role_type` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_type`) VALUES
(1, 'admin'),
(3, 'company'),
(2, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` char(6) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `phone_code` varchar(5) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT '../Resources/Images/uploads/facebook-avatar.jpg',
  `cv` varchar(255) NOT NULL,
  `user_type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `first_name`, `last_name`, `password`, `country`, `town`, `birthday`, `gender`, `phone_num`, `phone_code`, `answer`, `profile_pic`, `cv`, `user_type`) VALUES
(1, 'abdallah@gmail.com', 'abdallah', 'tarek', '1234', 'Egypt', 'Al Qahirah', '1997-06-26', 'Male', '0154851635', '20', 'meat', '../Resources/Images/uploads/5268_08-05-2017_451603.jpg', 'later', 2),
(2, 'tarek@gmail.com', 'abdallah', 'tarek', '1234', 'Egypt', 'Al Qahirah', '1997-06-26', 'Male', '01154851635', '20', 'meat', '../Resources/Images/uploads/9789_08-05-2017_Capture.PNG', 'later', 3),
(3, 'admin@g.com', 'abdallah', 'tarek', 'admin', 'egypt', 'cairo', '1997-06-26', 'male', '01154851635', '20', 'meat', '../Resources/Images/uploads/facebook-avatar.jpg', '', 1),
(4, 'employee@gmail.com', 'teha', 'abdo', '01141336724', 'Egypt', 'Asyut', '1996-11-28', 'Male', '01110195639', '20', 'meat', '../Resources/Images/uploads/4118_08-05-2017_B612-2016-05-15-06-04-45.jpg', '../Resources/Images/uploads/PDFS/45392.pdf', 2),
(5, 'company@gmail.com', 'abdo', 'teha', '0123456789', 'Egypt', 'Aswan', '1996-11-28', 'Male', '01141336724', '20', 'meat', '../Resources/Images/uploads/6610_08-05-2017_Capture.PNG', 'later', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advice`
--
ALTER TABLE `advice`
  ADD PRIMARY KEY (`advice_id`),
  ADD KEY `ad_user_fk` (`advisor`);

--
-- Indexes for table `apply_job`
--
ALTER TABLE `apply_job`
  ADD KEY `apply_job` (`job_id`),
  ADD KEY `com_user_fk` (`com_id`),
  ADD KEY `employee_user_fk` (`employee_id`);

--
-- Indexes for table `approve`
--
ALTER TABLE `approve`
  ADD KEY `app_emp_fk` (`app_emp`),
  ADD KEY `app_job_fk` (`app_job`),
  ADD KEY `company_fk` (`company`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `advice_id_fk` (`advice_id`),
  ADD KEY `commenter_id_fk` (`commenter`);

--
-- Indexes for table `favorite_jobs`
--
ALTER TABLE `favorite_jobs`
  ADD KEY `emp_user_fk` (`emp_id`),
  ADD KEY `favorite_job_fk` (`fav_job`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `job_info`
--
ALTER TABLE `job_info`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `category` (`job_field`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_type` (`role_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `type` (`user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `advice`
--
ALTER TABLE `advice`
  MODIFY `advice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `job_info`
--
ALTER TABLE `job_info`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `advice`
--
ALTER TABLE `advice`
  ADD CONSTRAINT `ad_user_fk` FOREIGN KEY (`advisor`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apply_job`
--
ALTER TABLE `apply_job`
  ADD CONSTRAINT `apply_job` FOREIGN KEY (`job_id`) REFERENCES `job_info` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `com_user_fk` FOREIGN KEY (`com_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_user_fk` FOREIGN KEY (`employee_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `approve`
--
ALTER TABLE `approve`
  ADD CONSTRAINT `app_emp_fk` FOREIGN KEY (`app_emp`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `app_job_fk` FOREIGN KEY (`app_job`) REFERENCES `job_info` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_fk` FOREIGN KEY (`company`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `advice_id_fk` FOREIGN KEY (`advice_id`) REFERENCES `advice` (`advice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_id_fk` FOREIGN KEY (`commenter`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite_jobs`
--
ALTER TABLE `favorite_jobs`
  ADD CONSTRAINT `emp_user_fk` FOREIGN KEY (`emp_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_job_fk` FOREIGN KEY (`fav_job`) REFERENCES `job_info` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_info`
--
ALTER TABLE `job_info`
  ADD CONSTRAINT `categories` FOREIGN KEY (`job_field`) REFERENCES `job_categories` (`cat_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `company_id` FOREIGN KEY (`company_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `type` FOREIGN KEY (`user_type`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
