-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 11:26 AM
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
-- Database: `krishi_nayak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `password`) VALUES
(123456, 'Admin@Pass');

-- --------------------------------------------------------

--
-- Table structure for table `blog_info`
--

CREATE TABLE `blog_info` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `url` varchar(500) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `tags` varchar(500) DEFAULT NULL,
  `language` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `farmer_id`, `text`, `comment_date`) VALUES
(1, 11, 8, 'This is my first comment', '2024-04-21 22:33:29'),
(6, 11, 8, 'My name is ', '2024-04-21 22:42:42'),
(7, 11, 8, 'This is comment', '2024-04-21 22:44:12'),
(15, 11, 8, 'THis is my second comment on the post and the post is working fine.', '2024-04-22 07:41:07'),
(16, 11, 8, 'This is my second comment on the post ', '2024-04-22 07:43:38'),
(17, 7, 8, 'Dadhi bahut badiya hai aapka ', '2024-04-22 07:49:38'),
(18, 8, 8, 'The cucumber is good for eating', '2024-04-22 07:52:11'),
(19, 8, 8, 'The cucumeber is good for eating in the morining', '2024-04-22 07:52:51'),
(20, 8, 8, 'Tomatos are good for healtg', '2024-04-22 07:56:02'),
(21, 8, 8, 'This is my comment on cucumber', '2024-04-22 07:56:47'),
(25, 7, 8, 'This will upadete comment count to two', '2024-04-22 08:13:03'),
(26, 11, 9, 'This is very good fruit. ', '2024-04-22 11:48:21'),
(27, 12, 7, 'Beautiful picture ', '2024-04-22 11:52:33'),
(28, 12, 7, 'This is a beautiful picture', '2024-04-22 11:57:01'),
(29, 11, 7, '565465', '2024-04-23 19:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `crop_info`
--

CREATE TABLE `crop_info` (
  `crop_id` int(11) NOT NULL,
  `plantation_date` date NOT NULL,
  `current_stage` char(4) NOT NULL,
  `land_id` int(11) NOT NULL,
  `seed_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crop_info`
--

INSERT INTO `crop_info` (`crop_id`, `plantation_date`, `current_stage`, `land_id`, `seed_id`, `farmer_id`) VALUES
(1, '2024-05-21', 'FLOW', 1, 11, 7),
(2, '2023-05-01', 'BPLN', 3, 3, 7),
(3, '2024-05-14', 'HARV', 1, 2, 7),
(4, '2024-05-08', 'FRUI', 1, 12, 7),
(5, '2024-05-15', 'FRUI', 3, 6, 7),
(6, '2024-05-01', 'HARV', 1, 12, 7),
(7, '2024-05-01', 'FRUI', 1, 9, 7),
(8, '2024-05-08', 'APLN', 9, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `farmer_info`
--

CREATE TABLE `farmer_info` (
  `farmer_id` int(11) NOT NULL COMMENT 'Id of the farmer',
  `username` varchar(25) NOT NULL,
  `name` varchar(30) NOT NULL COMMENT 'Name of the farmer',
  `phone_no` char(10) NOT NULL COMMENT 'Phone no for contact and account creation',
  `email` varchar(50) DEFAULT NULL COMMENT 'email address to contact, optional',
  `gender` char(1) NOT NULL,
  `state` varchar(3) NOT NULL COMMENT 'state where farmer live.',
  `district` varchar(50) NOT NULL COMMENT 'District where farmer live.',
  `block` varchar(50) NOT NULL COMMENT 'Block where farmer live.',
  `address` varchar(255) DEFAULT NULL COMMENT 'Street address of the farmer.',
  `pin` char(6) NOT NULL COMMENT 'Postal code ',
  `exprience` char(1) NOT NULL COMMENT 'How long he/she is a farmer',
  `profile_img` varchar(255) DEFAULT NULL,
  `join_date` date NOT NULL COMMENT 'Date of account creation.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Storing information about farmers.';

--
-- Dumping data for table `farmer_info`
--

INSERT INTO `farmer_info` (`farmer_id`, `username`, `name`, `phone_no`, `email`, `gender`, `state`, `district`, `block`, `address`, `pin`, `exprience`, `profile_img`, `join_date`) VALUES
(7, 'test1', 'Rohit Kumar', '1231231230', 'testmail@host.com', 'M', 'ASM', 'TestDistrict', 'Test Block', 'ShitalPur Kamalpur', '123460', '1', './res/profileimg/71715620454.jpg', '2024-04-07'),
(8, 'rohit1', 'Rohit ', '1234567890', 'rohit@gmail.com', 'M', 'BHR', 'Vaishali', 'Bidupur', 'Shitalpur', '844503', '1', './res/profileimg/71715526262.jpg', '2024-04-19'),
(9, 'ansh1', 'Ansh Raj', '1234567891', 'Anshu@gmail.com', 'M', 'CTG', 'Desro', 'Rajapakar', 'Maheshwarpur', '844101', '1', './res/profileimg/71715526262.jpg', '2024-04-19'),
(13, 'Raz8a37c685', 'Raz', '1234561234', 'raz@mail.com', '', 'CTG', 'Valishi', 'test block', 'panchayt test', '123456', '3', './res/profileimg/71715526262.jpg', '2024-05-11'),
(14, 'Vishale29ae4ce', 'Vishal', '3213213210', 'vishu@mail.com', 'M', 'BHR', 'asdf', 'asdf', 'afsd', '844501', '1', './res/profileimg/141716541622.jpg', '2024-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_issue`
--

CREATE TABLE `farmer_issue` (
  `issue_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `phone_no` int(10) DEFAULT NULL,
  `message` text NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to capture issue raised by farmers';

-- --------------------------------------------------------

--
-- Table structure for table `land_info`
--

CREATE TABLE `land_info` (
  `land_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `land_area` float NOT NULL,
  `land_stage` char(4) DEFAULT NULL,
  `crop_id` int(11) DEFAULT NULL,
  `name` varchar(25) NOT NULL,
  `soil_type` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `land_info`
--

INSERT INTO `land_info` (`land_id`, `farmer_id`, `land_area`, `land_stage`, `crop_id`, `name`, `soil_type`) VALUES
(1, 7, 10, 'BRAN', NULL, 'University', 'SLIT'),
(2, 7, 5, 'PLOD', NULL, 'Near scince college', 'CLAY'),
(3, 7, 5, 'PLOD', NULL, 'West pokhar', 'SLIT'),
(4, 7, 3, 'PLOD', NULL, 'West university', 'SLIT'),
(7, 7, 3, 'BRAN', NULL, 'My Land', 'SAND'),
(8, 7, 2, 'PLOD', NULL, 'My land 2', 'SAND'),
(9, 13, 10, 'PLOD', NULL, 'University', 'CLAY');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `farmer_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`farmer_id`, `post_id`) VALUES
(7, 7),
(8, 9),
(9, 9),
(9, 11),
(9, 12),
(14, 7),
(14, 8),
(14, 9),
(14, 11),
(14, 12);

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `farmer_id` int(11) NOT NULL,
  `phone_no` char(10) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='User login information';

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`farmer_id`, `phone_no`, `password`) VALUES
(7, '1231231230', 'Rohit'),
(8, '1234567890', 'MyPass'),
(9, '1234567891', 'MyPass'),
(13, '1234561234', 'Test'),
(14, '3213213210', 'rOHIT@911');

-- --------------------------------------------------------

--
-- Table structure for table `plant_info`
--

CREATE TABLE `plant_info` (
  `plant_id` int(11) NOT NULL,
  `plant_code` varchar(10) NOT NULL,
  `plant_name` varchar(50) NOT NULL,
  `scientific_name` varchar(100) NOT NULL,
  `other_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Plant name in english/hindi and scintific name';

--
-- Dumping data for table `plant_info`
--

INSERT INTO `plant_info` (`plant_id`, `plant_code`, `plant_name`, `scientific_name`, `other_name`) VALUES
(1, 'OKRA', 'Okra', 'Abelmoschus esculentus', 'Okra, Bhindi, lady’s finger, gumbo, bamia'),
(2, 'BRINJAL', 'Brinjal', 'Solanum memongena Linnaeus', 'Eggplant, Baingan, '),
(3, 'CORIANDER', 'Coriander', 'Coriandrum sativum', 'Dhaniya'),
(4, 'BTL_GRD', 'Bottle Gourd', 'Lagenaria siceraria', 'Kaddu, Lauki');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `farmer_id`, `text`, `image_url`, `post_date`) VALUES
(7, 7, 'This is my first post on the krishi nayak. ', './res/postimg/71713518528.jpg', '2024-04-19 00:00:00'),
(8, 7, 'Cucumber is the most nutrieset plant of the century. ', './res/postimg/71713518555.jpg', '2024-04-19 00:00:00'),
(9, 9, 'Hello every one do you know the site is working sucessfullt', './res/postimg/91713520420.jpg', '2024-04-19 00:00:00'),
(11, 9, 'This is a successful demonstration of the test that our post mechanism is fully working in the field', './res/postimg/91713521891.jpg', '2024-04-19 15:48:11'),
(12, 9, 'This is my first post. ', './res/postimg/91713766867.jpg', '2024-04-22 11:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `seed_info`
--

CREATE TABLE `seed_info` (
  `seed_id` int(11) NOT NULL,
  `seed_name` varchar(50) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `source` varchar(500) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `sowing_period` varchar(255) NOT NULL,
  `seed_rate` int(11) NOT NULL,
  `yeild_in_days` int(11) DEFAULT NULL,
  `yeild` int(11) NOT NULL,
  `strengths` text DEFAULT NULL,
  `seed_link` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seed_info`
--

INSERT INTO `seed_info` (`seed_id`, `seed_name`, `plant_id`, `source`, `summary`, `sowing_period`, `seed_rate`, `yeild_in_days`, `yeild`, `strengths`, `seed_link`) VALUES
(1, 'PB 67', 2, 'GBAUT, Pantnagar 2009', 'resistant to bacterial wilt and\r\nPhomopsis', 'Kharif', 450, 0, 410, '', ''),
(2, 'VNR 51 C', 2, 'VNR Seeds Pvt Ltd Raipur 2009', 'Small round hybrid', 'Kharif', 200, NULL, 475, NULL, NULL),
(3, 'Rasika', 2, 'Bejo Sheetal Seeds Pvt Ltd Jalana\r\n2009', 'Fruit length of 16 37 cm', 'Kharif', 200, NULL, 500, NULL, NULL),
(4, 'Shamli', 2, 'Seminis Seeds, 2009', 'Long fruited hybrid,', 'Kharif', 200, NULL, 500, NULL, NULL),
(5, 'NDBG 619', 4, 'NDUA and T, Faizabad 2009', 'Long cylindrical attractive fruits', 'Kharif and Spring\r\nsummer', 4500, NULL, 635, NULL, NULL),
(6, 'Santosh 20 (KBGH 20)', 4, 'Krishidhan Vegetable Seeds India Pvt Ltd\r\n2010', NULL, 'Tolerant to powdery mildew and downy mildew', 2500, NULL, 400, 'Tolerant to powdery mildew and downy mildew', NULL),
(7, 'PBOG-89', 4, 'GBPUAT, Pantnagar, 2010', 'Fruits are cylindrical and attractive', 'Kharif and Springsummer', 4500, NULL, 350, NULL, NULL),
(8, 'Anurag', 4, 'Nuziveedu Seeds Pvt. Ltd., 2013', 'Suitable for long distance transport', 'Kharif and Springsummer', 3000, NULL, 300, NULL, NULL),
(9, 'JOH 05 9', 1, 'JAU, Junagadh 2010', 'Flowering 50% in 39 days days after showing, bears 26-27 fruits/plant,\r\naverage fruit length 11 cm.', 'spring summer and rainy season', 10, NULL, 145, NULL, NULL),
(10, 'VRO 22 (Kashi Kranti', 1, 'ICAR IIVR, Varanasi 2011', 'Flowering 50% in 46 days after showing, Fruits are 8 10 cm long at\r\nmarketable stage, average 17 18 per plants.', 'spring summer and rainy season', 10, NULL, 130, 'Resistant to YVMV and OLCV.', NULL),
(11, 'JOL-2K-19 (GJO-3)', 1, 'JAU, Junagadh, 2011', 'Moderately resistant to Jassids, whitefly and pod borer\r\ndamage and field resistant to YVMV , Attractive green pods\r\nand good keeping quality', 'spring summer and rainy', 10, NULL, 200, 'resistant to Jassids, whitefly and pod borer and also resistance to YVMV', NULL),
(12, 'OH-597', 1, 'Syngenta India Limited, Pune; 2012', 'dark green leaves and produced tender green pods. It is\r\nresistant to YVMV disease', 'spring summer and rainy', 10, NULL, 130, 'resistant to YVMV disease', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seed_state_table`
--

CREATE TABLE `seed_state_table` (
  `seed_id` int(11) NOT NULL,
  `state_code` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seed_state_table`
--

INSERT INTO `seed_state_table` (`seed_id`, `state_code`) VALUES
(1, 'BHR'),
(1, 'JHK'),
(1, 'PUN'),
(1, 'UTP'),
(2, 'BHR'),
(2, 'JHK'),
(2, 'PUN'),
(2, 'UTP'),
(3, 'BHR'),
(3, 'JHK'),
(3, 'PUN'),
(3, 'UTP'),
(4, 'BHR'),
(4, 'JHK'),
(4, 'PUN'),
(4, 'UTP'),
(5, 'GOA'),
(5, 'MDP'),
(5, 'MHT'),
(6, 'BHR'),
(6, 'JHK'),
(6, 'PUN'),
(6, 'UTP'),
(7, 'BHR'),
(7, 'GOA'),
(7, 'HMP'),
(7, 'JHK'),
(7, 'JNK'),
(7, 'MDP'),
(7, 'MHT'),
(7, 'PUN'),
(7, 'UTK'),
(7, 'UTP'),
(8, 'BHR'),
(8, 'JHK'),
(8, 'PUN'),
(8, 'UTP'),
(9, 'ANP'),
(9, 'CTG'),
(9, 'DEL'),
(9, 'GOA'),
(9, 'GUJ'),
(9, 'HRN'),
(9, 'MDP'),
(9, 'MHT'),
(9, 'ODH'),
(9, 'RJT'),
(10, 'BHR'),
(10, 'JHK'),
(10, 'PUN'),
(10, 'UTP'),
(11, 'ANP'),
(11, 'CTG'),
(11, 'ODH'),
(12, 'GOA'),
(12, 'MDP'),
(12, 'MHT');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `state_code` char(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `name_hn` varchar(40) NOT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_code`, `name`, `name_hn`, `lat`, `lng`) VALUES
(1, 'ANP', 'Andhra Pradesh', 'आंध्र प्रदेश', NULL, NULL),
(2, 'AUP', 'Arunachal Pradesh', 'अरुणाचल प्रदेश', NULL, NULL),
(3, 'ASM', 'Assam', 'असम', NULL, NULL),
(4, 'BHR', 'Bihar', 'बिहार', NULL, NULL),
(5, 'CTG', 'Chhattisgarh', 'छत्तीसगढ़', NULL, NULL),
(6, 'GOA', 'goa', 'गोवा', NULL, NULL),
(7, 'GUJ', 'Gujarat', 'गुजरात', NULL, NULL),
(8, 'HRN', 'Haryana', 'हरियाणा', NULL, NULL),
(9, 'HMP', 'Himachal Pradesh', 'हिमाचल प्रदेश', NULL, NULL),
(10, 'JHK', 'Jharkhand', 'झारखंड', NULL, NULL),
(11, 'KNT', 'Karnataka', 'कर्नाटक', NULL, NULL),
(12, 'KRL', 'Kerala', 'केरल', NULL, NULL),
(13, 'MDP', 'Madhya Pradesh', 'मध्य प्रदेश', NULL, NULL),
(14, 'MHT', 'Maharashtra', 'महाराष्ट्र', NULL, NULL),
(15, 'MNP', 'Manipur', 'मणिपुर', NULL, NULL),
(16, 'MGH', 'Meghalaya', 'मेघालय', NULL, NULL),
(17, 'MZM', 'Mizoram', 'मिजोरम', NULL, NULL),
(18, 'NGL', 'Nagaland', 'नागालैंड', NULL, NULL),
(19, 'ODH', 'Odisha', '', NULL, NULL),
(20, 'PUN', 'Punjab', 'पंजाब', NULL, NULL),
(21, 'RJT', 'Rajasthan', 'राजस्थान', NULL, NULL),
(22, 'SKM', 'Sikkim', 'सिक्किम', NULL, NULL),
(23, 'TNU', 'Tamil Nadu', '', NULL, NULL),
(24, 'TEL', 'Telangana', 'तेलंगाना', NULL, NULL),
(25, 'TRI', 'Tripura', 'त्रिपुरा', NULL, NULL),
(26, 'UTP', 'Uttar Pradesh', 'उत्तर प्रदेश', NULL, NULL),
(27, 'UTK', 'Uttarakhand', 'उत्तराखंड', NULL, NULL),
(28, 'WEB', 'West Bengal', '', NULL, NULL),
(29, 'ANI', 'Andaman and Nicobar Islands', '', NULL, NULL),
(30, 'CHN', 'Chandigarh', '', NULL, NULL),
(31, 'DNH', 'Dadra and Nagar Haveli', '', NULL, NULL),
(32, 'DAU', 'Daman and Diu', '', NULL, NULL),
(33, 'DEL', 'Delhi', '', NULL, NULL),
(34, 'JNK', 'Jammu and Kashmir', '', NULL, NULL),
(35, 'LDK', 'Ladakh', '', NULL, NULL),
(36, 'LKD', 'Lakshadweep', '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_info`
--
ALTER TABLE `blog_info`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_ibfk_1` (`farmer_id`),
  ADD KEY `comments_ibfk_2` (`post_id`);

--
-- Indexes for table `crop_info`
--
ALTER TABLE `crop_info`
  ADD PRIMARY KEY (`crop_id`),
  ADD KEY `farmer_id` (`farmer_id`),
  ADD KEY `seed_id` (`seed_id`),
  ADD KEY `land_id` (`land_id`);

--
-- Indexes for table `farmer_info`
--
ALTER TABLE `farmer_info`
  ADD PRIMARY KEY (`farmer_id`),
  ADD UNIQUE KEY `Phone Number` (`phone_no`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `farmer_issue`
--
ALTER TABLE `farmer_issue`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `land_info`
--
ALTER TABLE `land_info`
  ADD PRIMARY KEY (`land_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`farmer_id`,`post_id`),
  ADD KEY `likes_ibfk_2` (`post_id`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD KEY `login_info_ibfk_1` (`farmer_id`),
  ADD KEY `login_info_ibfk_2` (`phone_no`);

--
-- Indexes for table `plant_info`
--
ALTER TABLE `plant_info`
  ADD PRIMARY KEY (`plant_id`),
  ADD UNIQUE KEY `PLANT_CODE` (`plant_code`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `seed_info`
--
ALTER TABLE `seed_info`
  ADD PRIMARY KEY (`seed_id`),
  ADD UNIQUE KEY `SEED_NAME` (`seed_name`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `seed_state_table`
--
ALTER TABLE `seed_state_table`
  ADD PRIMARY KEY (`seed_id`,`state_code`),
  ADD KEY `seed_state_table_ibfk_2` (`state_code`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`),
  ADD UNIQUE KEY `STATE_CODE` (`state_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_info`
--
ALTER TABLE `blog_info`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `crop_info`
--
ALTER TABLE `crop_info`
  MODIFY `crop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `farmer_info`
--
ALTER TABLE `farmer_info`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of the farmer', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `farmer_issue`
--
ALTER TABLE `farmer_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `land_info`
--
ALTER TABLE `land_info`
  MODIFY `land_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plant_info`
--
ALTER TABLE `plant_info`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `seed_info`
--
ALTER TABLE `seed_info`
  MODIFY `seed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer_info` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `crop_info`
--
ALTER TABLE `crop_info`
  ADD CONSTRAINT `crop_info_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer_info` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crop_info_ibfk_2` FOREIGN KEY (`seed_id`) REFERENCES `seed_info` (`seed_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crop_info_ibfk_3` FOREIGN KEY (`land_id`) REFERENCES `land_info` (`land_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer_info` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_info`
--
ALTER TABLE `login_info`
  ADD CONSTRAINT `login_info_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer_info` (`farmer_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `login_info_ibfk_2` FOREIGN KEY (`phone_no`) REFERENCES `farmer_info` (`phone_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer_info` (`farmer_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `seed_info`
--
ALTER TABLE `seed_info`
  ADD CONSTRAINT `seed_info_ibfk_1` FOREIGN KEY (`plant_id`) REFERENCES `plant_info` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seed_state_table`
--
ALTER TABLE `seed_state_table`
  ADD CONSTRAINT `seed_state_table_ibfk_1` FOREIGN KEY (`seed_id`) REFERENCES `seed_info` (`seed_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `seed_state_table_ibfk_2` FOREIGN KEY (`state_code`) REFERENCES `states` (`state_code`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
