-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 12:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotify_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `sort_path` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `name`, `sort_path`) VALUES
(1, 'Arijit Singh', 'album1.jpg'),
(2, 'Nachiketa', 'album2.jpg'),
(3, 'School Love Songs', 'album3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `sort_path` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `sort_path`) VALUES
(1, 'Bengali', 'lang1.jpg'),
(2, 'Hindi', 'lang2.jpg'),
(3, 'English', 'lang3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `lang` int(11) NOT NULL,
  `album` int(11) DEFAULT NULL,
  `audio` varchar(40) DEFAULT NULL,
  `image` varchar(40) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `lang`, `album`, `audio`, `image`, `time`) VALUES
(21, 'Ekla Cholte Hoy with lyrics | Nachiketa Chakraborty | Best Of Nachiketa | HD Song', 1, 2, '21.mp3', '21.jpg', '2022-08-02 21:21:37'),
(22, 'Ulto Rajar Deshe with lyrics | Nachiketa', 1, 2, '22.MP3', '22.JPG', '2022-08-02 21:39:31'),
(23, 'Rajashree | Best Of Nachiketa | Nachiket', 1, 2, '23.MP3', '23.JPG', '2022-08-02 21:39:47'),
(24, 'Pheriwala with lyrics | Nachiketa Chakra', 1, 2, '24.MP3', '24.JPG', '2022-08-02 21:40:08'),
(26, 'Qaafirana - Lyrical | Kedarnath | Sushant S Rajput | Sara Ali Khan | Arijit Singh & Nikhita| Amit T', 2, 1, '26.mp3', '26.jpg', '2022-08-02 21:28:24'),
(27, 'Chhod Diya | Arijit Singh, Kanika Kapoor | Baazaar | Saif Ali Khan, Rohan Mehra, Radhika, Chitrangda', 2, 1, '27.mp3', '27.jpg', '2022-08-02 21:27:36'),
(29, 'The Chainsmokers - Don.t Let Me Down (Official Video) ft. Daya', 3, 0, '29.mp3', '29.jpg', '2022-08-03 14:55:19'),
(30, 'Let Me Down Slowly x Main Dhoondne Ko Zamaane Mein (Gravero Mashup) | Full Version', 2, 0, '30.mp3', '30.jpg', '2022-08-03 16:10:02'),
(31, 'Le Gayi Le Gayi | Dil To Pagal Hai | Romantic Love Story | Ft. Ruhi & Kamoles | Team Raj Presents', 2, 3, '31.mp3', '31.jpg', '2022-08-06 10:59:43'),
(32, 'Mast Nazron Se | Rochak K ft Jubin Nautiyal, Nikita Dutta | Manoj M | Ashish P | Bhushan K', 2, 3, '32.mp3', '32.png', '2022-08-06 11:05:57'),
(33, 'Lut Gaye (Full Song) Emraan Hashmi, Yukti | Jubin N, Tanishk B, Manoj M | Bhushan K | Radhika-Vinay', 2, 3, '33.mp3', '33.jpg', '2022-08-06 11:09:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
