-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 09:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `bedrooms`
--

CREATE TABLE `bedrooms` (
  `id` int(11) NOT NULL,
  `bedroom` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bedrooms`
--

INSERT INTO `bedrooms` (`id`, `bedroom`, `status`, `created_at`) VALUES
(1, '1', 'A', '2022-06-15 06:46:14'),
(2, '2', 'A', '2022-06-15 06:46:17'),
(3, '3', 'A', '2022-06-15 06:46:20'),
(4, '4', 'A', '2022-06-15 06:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `district_id` varchar(5) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `city_img` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `facility` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `facility`, `status`, `created_at`) VALUES
(1, '24*7 Water Supply', 'A', '2022-05-27 19:35:47'),
(2, 'Children Play Area', 'A', '2022-05-27 19:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `property_id` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `our_clients`
--

CREATE TABLE `our_clients` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `our_clients`
--

INSERT INTO `our_clients` (`id`, `title`, `name`, `image`, `short_desc`, `created_at`) VALUES
(1, 'Amazing home for me', 'Diane Smith', 'testimonial_1.jpg', 'Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.', '2022-06-12 19:30:12'),
(2, 'Friendly Realtors', 'Michael Duncan', 'testimonial_2.jpg', 'Nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Pellentesque sit amet tellus blandit.', '2022-06-12 19:30:12'),
(3, 'Very good communication', 'Shawn Gaines', 'testimonial_3.jpg', 'Retiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.', '2022-06-12 19:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `gallery` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `property_for` varchar(5) NOT NULL,
  `type` varchar(30) NOT NULL,
  `district` varchar(5) NOT NULL,
  `city` varchar(5) NOT NULL,
  `bedroom` varchar(10) NOT NULL,
  `bathroom` varchar(5) NOT NULL,
  `area` varchar(10) NOT NULL,
  `facility` varchar(255) NOT NULL,
  `map` text NOT NULL,
  `content` text NOT NULL,
  `folder` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `header_mobile1` varchar(15) NOT NULL,
  `header_mobile2` varchar(15) NOT NULL,
  `footer_mobile` varchar(15) NOT NULL,
  `footer_desc` varchar(255) NOT NULL,
  `contact_page_email` varchar(15) NOT NULL,
  `contact_page_mobile1` varchar(15) NOT NULL,
  `contact_page_mobile2` varchar(15) NOT NULL,
  `contact_page_addr` varchar(255) NOT NULL,
  `contact_page_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `header_mobile1`, `header_mobile2`, `footer_mobile`, `footer_desc`, `contact_page_email`, `contact_page_mobile1`, `contact_page_mobile2`, `contact_page_addr`, `contact_page_desc`) VALUES
(1, '9878654312', '8765434510', '6578893764', 'Footer Description', 'ompatel@domian.mail', '9878654312', '9878654312', 'Address', 'contact us');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `ftsq` varchar(10) NOT NULL,
  `bedroom` tinyint(4) NOT NULL,
  `bathroom` tinyint(4) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `ftsq`, `bedroom`, `bathroom`, `image`, `price`, `created_at`) VALUES
(1, 'Villa with sea view', '650', 1, 2, 'home_slider_1.jpg', '1244559999', '2022-06-13 03:20:55'),
(2, 'Villa with sea view', '650', 2, 3, 'home_slider_1.jpg', '1244559999', '2022-06-13 03:20:55'),
(3, 'Villa with sea view', '650', 3, 4, 'home_slider_1.jpg', '1244559999', '2022-06-13 03:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`, `status`, `created_at`) VALUES
(1, '3BHK Flat', 'A', '2022-05-27 19:32:46'),
(2, '1 BHK Flat', 'A', '2022-05-27 19:32:58'),
(3, '2 BHK Flat', 'A', '2022-05-27 19:33:16'),
(4, '3 BHK Bungalows', 'A', '2022-05-27 19:33:57'),
(5, '3 BHK Individual Bungalows', 'A', '2022-05-27 19:34:21'),
(6, '3 BHK Villa', 'A', '2022-05-27 19:34:32'),
(7, '4 BHK Villa', 'A', '2022-05-27 19:34:41'),
(8, '2 BHK Raw House', 'A', '2022-05-27 19:34:54'),
(9, 'Farm House', 'A', '2022-05-27 19:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `mobile`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'Admin', '', '', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'A', '2022-02-25 07:25:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bedrooms`
--
ALTER TABLE `bedrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_clients`
--
ALTER TABLE `our_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bedrooms`
--
ALTER TABLE `bedrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `our_clients`
--
ALTER TABLE `our_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
