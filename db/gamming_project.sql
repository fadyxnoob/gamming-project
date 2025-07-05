-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 07:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gammingproject-31353925d2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `post_id`, `product_id`, `comment`, `date`, `user_id`, `status`) VALUES
(153, 'Ahmed', 75, 0, 'nice post', '2023-11-06', 50, 'seen'),
(155, 'Ahmed', 76, 0, 'how to join this match', '2023-11-06', 50, 'seen'),
(157, 'Ahmed', 82, 0, 'nice information', '2023-11-07', 50, 'seen'),
(158, 'Ahmed', 82, 0, 'i want to join', '2023-11-07', 50, 'seen'),
(159, 'Ismail', 0, 71, 'a good product', '2023-11-07', 57, 'seen'),
(160, 'Ismail', 0, 71, 'love this item', '2023-11-07', 57, 'seen'),
(161, 'Ismail', 75, 0, 'nice', '2023-11-07', 57, 'seen'),
(162, 'Ismail', 75, 0, 'osm', '2023-11-07', 57, 'seen'),
(163, 'Ismail', 75, 0, 'apki awaz boht achi hai', '2023-11-07', 57, 'seen'),
(164, 'Ismail', 76, 0, 'alway my fev team', '2023-11-07', 57, 'seen'),
(165, 'Hamza', 0, 68, 'bohyt mehnga hai', '2023-11-08', 55, 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `final_winners`
--

CREATE TABLE `final_winners` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `scores` varchar(255) NOT NULL,
  `opponent` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `final_winners`
--

INSERT INTO `final_winners` (`id`, `uname`, `scores`, `opponent`, `date`) VALUES
(1, 'uestHunter24', '25 / 22', 'levelU2', '2023-11-07 05:15:07'),
(2, 'amir123', '15/14', 'gamemasterX7', '2023-11-08 06:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `last_result`
--

CREATE TABLE `last_result` (
  `id` int(11) NOT NULL,
  `winner` varchar(255) NOT NULL,
  `loser` varchar(255) NOT NULL,
  `w_scores` varchar(255) NOT NULL,
  `l_scores` varchar(255) NOT NULL,
  `final` varchar(255) NOT NULL,
  `match_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `last_result`
--

INSERT INTO `last_result` (`id`, `winner`, `loser`, `w_scores`, `l_scores`, `final`, `match_id`, `date`) VALUES
(26, 'gamemasterX7', 'pixelwarrior99', '35', '30', 'No', 30, '2023-11-03 15:14:12'),
(28, 'cosmicgamerX6', 'mobamastermind24', '25', '22', 'No', 31, '2023-11-05 18:00:33'),
(29, 'levelU2', 'uestHunter24', '25', '22', 'Yes', 32, '2023-11-07 05:13:27'),
(30, 'consoleKing5', 'controllerchamp8', '33', '31', 'No', 33, '2023-11-07 08:20:45'),
(31, 'amir123', 'gamemasterX7', '15', '14', 'Yes', 34, '2023-11-08 06:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `manage-players`
--

CREATE TABLE `manage_players` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `con_pass` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage-players`
--

INSERT INTO `manage-players` (`id`, `name`, `uname`, `mail`, `pass`, `con_pass`, `profile`, `status`, `date`, `facebook`, `instagram`, `youtube`, `twitter`) VALUES
(35, 'Ali Ahmed Ali', 'ali123', 'ali12@gmail.com', '1b0b53eab41e51fe9ad66a1abe3382dd', 'Ali@1234', 'blog3-1.jpg', 'unblock', '2023-11-01 17:41:21', 'https://web.facebook.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'https://twitter.com/'),
(49, 'Amir', 'amir123', 'amir@gmail.com', 'adee9ca6e88c74654706c4da1c89d45a', 'Amir@123', 'blog3-2.jpg', 'unblock', '2023-11-02 15:57:54', 'https://web.facebook.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'https://twitter.com/'),
(50, 'Ahmed', 'gamemasterX7', 'ahmed@gmail.com', '02f776e80c2805b287207944b5f290d4', 'Ahmed!23', 'Candi1.jpg', 'unblock', '2023-11-03 10:16:44', 'https:', 'https:', 'https:', 'https:'),
(51, 'Usman', 'pixelwarrior99', 'ali@gmail.com', '00055861f1a80d2dfe1d7b2258723215', 'Ali12#78', 'Candi3.jpg', 'unblock', '2023-11-03 10:19:16', 'https://web.facebook.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'https://twitter.com/'),
(52, 'Yasin', 'mobamastermind24', 'yasin@gmail.com', 'c36c58fcc9e7b79825e5ebfcc3509555', 'Yasin@123', 'Candi19.jpg', 'unblock', '2023-11-05 17:51:12', 'https://web.facebook.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'https://twitter.com/'),
(53, 'Zayd', 'cosmicgamerX6', 'zayd@gmail.com', 'd6b95c9045b12edb5f64cb1bc7fbbf71', 'Zayd@123', 'Candi18.jpg', 'unblock', '2023-11-05 17:54:13', 'https://web.facebook.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'https://twitter.com/'),
(54, 'Bilal', 'levelU2', 'bilal@gmail.com', '49beade4a467e1a58d6168f23495c46d', 'Bil@l123', 'Candi18.jpg', 'unblock', '2023-11-06 18:49:52', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.youtube.com', 'https://www.twitter.com'),
(55, 'Hamza II', 'consoleKing5', 'hamza@gmail.com', '87cc0cf60d13f166639b3373e8e997c4', 'H@mza123', 'Candi15.jpg', 'unblock', '2023-11-06 18:51:32', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.youtube.com', 'https://www.twitter.com'),
(56, 'Ibrahim', 'uestHunter24', 'ibrahim@gmail.com', '6b9b00eb329d6279d8e5e787a8f769a7', 'Ibrahim@123', 'Candi14.jpg', 'unblock', '2023-11-06 18:53:08', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.youtube.com', 'https://www.twitter.com'),
(57, 'Ismail', 'controllerchamp8', 'ismail@gmail.com', '3bb2c7cbb6bc1da234443bfb18ad45f3', 'Ismail@123', 'Candi12.jpg', 'block', '2023-11-06 18:55:07', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.youtube.com', 'https://www.twitter.com'),
(58, 'Umer', 'umer1122', 'umer@gmail.com', 'bba834d2c756dada22a298a9ab8c506e', 'Umer@123', 'Candi11.jpg', 'unblock', '2023-11-07 08:11:20', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.youtube.com', 'https://www.twitter.com'),
(59, 'Yaxir', 'yaxir', 'yaxir@gmail.com', '4572aa6e3b3e45e8de00c7c71f918f75', 'Y@xir123', '0716400d78cf4afb41b4bad8bd8c1059.png', 'block', '2024-03-02 17:20:43', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.youtube.com', 'https://www.twitter.com');

-- --------------------------------------------------------

--
-- Table structure for table `manage-user-guide`
--

CREATE TABLE `manage-user-guide` (
  `id` int(11) NOT NULL,
  `disc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage-user-guide`
--

INSERT INTO `manage-user-guide` (`id`, `disc`) VALUES
(1, '                                    <p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><span style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><b>Eldritch PUBG Tournament User Guidelines</b></span></p><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\">Welcome to Eldritch, the ultimate platform for PUBG TDM and Solo tournaments. Before you get started, please take a moment to review these user guidelines to make your experience on our website enjoyable and fair for everyone.</p><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><span style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><b>1. Registration:</b></span></p><ul style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-position: initial; list-style-image: initial; margin: 1.25em 0px; padding: 0px; display: flex; flex-direction: column;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">To participate in tournaments, you must create an account on Eldritch.</li><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">Ensure your username and contact information are accurate.</li></ul><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><span style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><b>2. Tournament Rules:</b></span></p><ul style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-position: initial; list-style-image: initial; margin: 1.25em 0px; padding: 0px; display: flex; flex-direction: column;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">Familiarize yourself with the specific rules for each tournament before registering.</li><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">Respect the tournament\'s format, including maps, gameplay settings, and prize details.</li></ul><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><span style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><b>3. Fair Play:</b></span></p><ul style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-position: initial; list-style-image: initial; margin: 1.25em 0px; padding: 0px; display: flex; flex-direction: column;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">We value fair play and sportsmanship. Cheating or exploiting game mechanics is strictly prohibited.</li><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">Respect your fellow players and competitors. Any form of harassment will not be tolerated.</li></ul><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><span style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><b>4. Prizes:</b></span></p><ul style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-position: initial; list-style-image: initial; margin: 1.25em 0px; padding: 0px; display: flex; flex-direction: column;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">Eligibility for prizes is based on tournament rules and your performance.</li><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">Prizes may vary from tournament to tournament.</li></ul><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><span style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><b>5. Reporting Issues:</b></span></p><ul style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-position: initial; list-style-image: initial; margin: 1.25em 0px; padding: 0px; display: flex; flex-direction: column;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">If you encounter any issues during a tournament, please contact our support team for assistance.</li></ul><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><span style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><b>6. Communication:</b></span></p><ul style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-position: initial; list-style-image: initial; margin: 1.25em 0px; padding: 0px; display: flex; flex-direction: column;\" segoe=\"\" ui\",=\"\" roboto,=\"\" ubuntu,=\"\" cantarell,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(247,=\"\" 247,=\"\" 248);\"=\"\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">Keep communication with fellow participants and organizers civil and respectful.</li></ul>                                    ');

-- --------------------------------------------------------

--
-- Table structure for table `manage_about`
--

CREATE TABLE `manage_about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title2` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_about`
--

INSERT INTO `manage_about` (`id`, `title`, `title2`, `data`, `img`) VALUES
(2, 'About', 'Our Team', '                                                                                                                                                                                                                                                                                                                                                                        <p style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; text-align: var(--bs-body-text-align);\">Welcome to <span style=\"margin: 0px; padding: 0px;\">ELDRITCH</span><span style=\"margin: 0px; padding: 0px;\">, the premier platform for passionate PUBG players who thrive on the thrill of TDM solo battles. We\'re more than just a website; we\'re a community built by gamers, for gamers.</span></span></p><div style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\"><b>Our Mission</b></span></div><div style=\"margin: 0px; padding: 0px;\">At ELDRITCH, our mission is to provide PUBG enthusiasts with a dynamic and competitive arena to test their skills in solo TDM matches. We believe in the power of friendly competition and the joy of victory. We are committed to fostering a vibrant gaming community where players can come together, compete, and form connections that transcend the digital realm.</div><div style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\"><b>What Sets Us Apart</b></span></div><div style=\"margin: 0px; padding: 0px;\">Dedicated to Solo TDM: We specialize in organizing solo TDM tournaments, creating an intense and fair battleground for individual players to shine.</div><ul style=\"margin-right: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px;\"><li style=\"margin: 0px; padding: 0px; list-style: none;\"><span style=\"margin: 0px; padding: 0px;\">Fair Play: </span>We uphold the principles of fair play and sportsmanship, ensuring a level playing field for all participants.</li><li style=\"margin: 0px; padding: 0px; list-style: none;\"><span style=\"margin: 0px; padding: 0px;\">Community Spirit:</span> We\'re more than just a tournament platform. We encourage our members to connect, share strategies, and grow together as gamers.</li><li style=\"margin: 0px; padding: 0px; list-style: none;\"><span style=\"margin: 0px; padding: 0px;\">Prizes and Recognition:</span> Compete not only for glory but for exciting prizes and the chance to be recognized as one of the top PUBG solo TDM players.</li></ul><div style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\"><b>Join Us Today</b></span></div><div style=\"margin: 0px; padding: 0px;\">Whether you\'re an aspiring esports pro, a casual player looking for some fun, or anything in between, [Your Website Name] is the place for you. Sign up now, test your skills, and become part of a community that shares your passion for PUBG and solo TDM action.</div><div style=\"margin: 0px; padding: 0px;\">Thank you for being a part of our growing community, and we look forward to seeing you on the battlefield.</div>                                                                                                                                                                                                                                                                                                                                                                        ', 'dgthh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manage_candidate`
--

CREATE TABLE `manage_candidate` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `ign_name` varchar(255) NOT NULL,
  `ig_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_candidate`
--

INSERT INTO `manage_candidate` (`id`, `uname`, `ign_name`, `ig_id`, `status`, `date`, `p_id`) VALUES
(45, 'ali123', 'Legend007', '12121212121', 'Out', '2023-11-02 15:27:05', 35),
(46, 'amir123', 'amir02', '23232323232', 'Final Won', '2023-11-02 16:05:56', 49),
(47, 'gamemasterX7', 'GameMasterX7_ID', '12121212121', 'Final Loss', '2023-11-03 10:18:09', 50),
(48, 'pixelwarrior99', 'NinjaWarrior99', '23232323232', 'Out', '2023-11-03 10:19:50', 51),
(49, 'mobamastermind24', 'GalaxyGameOn7', '98765432109', 'Out', '2023-11-05 17:53:13', 52),
(50, 'cosmicgamerX6', 'LaserGamerX', '12345678901', 'Winner', '2023-11-05 17:54:47', 53),
(51, 'levelU2', 'ConsoleKing42', '45454545454', 'Final Loss', '2023-11-06 18:50:40', 54),
(52, 'consoleKing5', 'QuestHunter24Hero', '56565656565', 'Match', '2023-11-06 18:52:28', 55),
(53, 'uestHunter24', 'ControllerChamp8X', '67676767676', 'Final Won', '2023-11-06 18:53:42', 56),
(54, 'controllerchamp8', 'EpicGamingGeek13Player', '78787878787', 'Out', '2023-11-06 18:59:27', 57),
(55, 'umer1122', 'Umer1v4', '11995647', 'Match', '2023-11-07 08:12:26', 58);

-- --------------------------------------------------------

--
-- Table structure for table `manage_categories`
--

CREATE TABLE `manage_categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_categories`
--

INSERT INTO `manage_categories` (`id`, `cat_name`, `type`) VALUES
(54, 'Headphones', 'Product'),
(55, 'Results', 'Post'),
(56, 'Death Match', 'Post'),
(61, 'Tournament', 'Post'),
(62, 'Mobiles', 'Product'),
(63, 'Cooling Fan', 'Product'),
(64, 'Team Work', 'Post');

-- --------------------------------------------------------

--
-- Table structure for table `manage_contact_us`
--

CREATE TABLE `manage_contact_us` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `disc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_contact_us`
--

INSERT INTO `manage_contact_us` (`id`, `heading`, `disc`) VALUES
(1, 'HAVE A QUESTION? SHOOT AWAY!', '                                    Our \"Contact Us\" form is designed to provide you with a convenient way to reach out to us for various reasons. Whether you have questions, feedback, need assistance, or if you\'ve encountered issues such as being blocked from a tournament or match, or suspect cheating in a game, we\'re here to listen and assist you. We value your input and are committed to providing support in a timely and helpful manner.                                    ');

-- --------------------------------------------------------

--
-- Table structure for table `manage_counter`
--

CREATE TABLE `manage_counter` (
  `event_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_h` varchar(20) NOT NULL,
  `event_m` varchar(20) NOT NULL,
  `event_s` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_counter`
--

INSERT INTO `manage_counter` (`event_id`, `heading`, `event_date`, `event_h`, `event_m`, `event_s`) VALUES
(1, '  Tournament Start', '2024-01-05', '10', '13', '21');

-- --------------------------------------------------------

--
-- Table structure for table `manage_faqs`
--

CREATE TABLE `manage_faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_faqs`
--

INSERT INTO `manage_faqs` (`id`, `question`, `answer`) VALUES
(1, 'What is the Abbrevation of PUBG?', 'Players Unknown Battle Ground.'),
(2, 'How Do I Register for a Tournament?', 'First, you need to identify the tournament you want to participate in.This could be a sports tournament, gaming competition, chess tournament, or any other type of organized competition. You can usually find information about upcoming tournaments on website'),
(3, 'what is the Abbervation of tdm?', 'Team Death Match');

-- --------------------------------------------------------

--
-- Table structure for table `manage_match`
--

CREATE TABLE `manage_match` (
  `id` int(11) NOT NULL,
  `player1` varchar(255) NOT NULL,
  `player2` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_match`
--

INSERT INTO `manage_match` (`id`, `player1`, `player2`, `status`, `date`) VALUES
(29, 'amir123', 'ali123', 'Clear', '2023-11-02 16:39:34'),
(30, 'gamemasterX7', 'pixelwarrior99', 'Clear', '2023-11-03 10:22:31'),
(31, 'cosmicgamerX6', 'mobamastermind24', 'Clear', '2023-11-05 17:55:26'),
(32, 'levelU2', 'uestHunter24', 'Clear', '2023-11-06 19:00:32'),
(33, 'consoleKing5', 'controllerchamp8', 'Clear', '2023-11-06 19:13:22'),
(34, 'amir123', 'gamemasterX7', 'Clear', '2023-11-06 19:13:30'),
(35, 'umer1122', 'cosmicgamerX6', 'Played', '2023-11-07 08:13:09'),
(36, 'gamemasterX7', 'consoleKing5', 'Pending', '2023-11-07 08:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `manage_match_types`
--

CREATE TABLE `manage_match_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `match_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manage_order`
--

CREATE TABLE `manage_order` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_order`
--

INSERT INTO `manage_order` (`id`, `name`, `email`, `phone`, `postal`, `address`, `date`) VALUES
(16, 'Amir', 'bilal@gmail.com', '03017985942', '569352', 'khanewal', '2023-10-31 07:11:47'),
(17, 'Amir', 'amir@gmail.com', '03017985942', '569352', 'khanewal', '2023-11-03 16:15:00'),
(18, 'Amir', 'ahmed@gmail.com', '03017985942', '', 'khanewal', '2023-11-03 17:13:24'),
(19, 'Amir', 'ahmed@gmail.com', '03017985942', '', 'khanewal', '2023-11-06 15:04:10'),
(20, 'Amir', 'ahmed@gmail.com', '', '', '', '2023-11-06 15:05:34'),
(21, 'Khalid', 'ahmed@gmail.com', '03017985942', '569352', 'khanewal', '2023-11-07 08:28:10'),
(22, 'Khalid', 'ahmed@gmail.com', '03017985942', '569352', 'khanewal', '2023-11-07 08:28:39'),
(23, 'Ismail', 'ismail@gmail.com', '03401755316', '569352', 'khanewal', '2023-11-07 08:32:20'),
(24, 'Khalid', 'ahmed@gmail.com', '', '569352', 'khanewal', '2023-11-08 08:40:45'),
(25, 'adfnqe', 'bilal@gmail.com', '05229+026055', '569352', 'khanewal', '2023-11-13 13:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `manage_our_team`
--

CREATE TABLE `manage_our_team` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_our_team`
--

INSERT INTO `manage_our_team` (`id`, `Name`, `about`, `type`, `profile`) VALUES
(28, 'Usmaan', '100 World Top Ranker', 'Content Creator', 'member2.jpg'),
(31, 'Deadpool', '95 All Time Conqueror', 'Content Creator', 'HD-wallpaper-deadpool-hero-man.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manage_posts`
--

CREATE TABLE `manage_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `popular` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `posted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_posts`
--

INSERT INTO `manage_posts` (`id`, `title`, `description`, `cate`, `status`, `popular`, `image`, `image2`, `image3`, `image4`, `date`, `posted_by`) VALUES
(72, 'Get Ready for Gaming Glory: Announcing the Next Tournament', '                                                                                                                                                                                    <div><div>Are you ready for the ultimate gaming showdown? We\'re thrilled to unveil the most electrifying gaming event of the year: the [Tournament Name]! Whether you\'re a seasoned eSports pro or a casual gamer looking for some intense competition, this tournament promises to be an unforgettable gaming experience.</div><div><br></div><div>In our blog, we\'ll dive into all the thrilling details of the [Tournament Name], including the games, the rules, and the epic prizes up for grabs. Get ready to embark on a gaming adventure like no other.</div></div>                                                                                                            ', '55', 'Published', 'popular', 'p1m.jpg', 'gal3.jpg', 'gal2.jpg', 'gal1.jpg', '2023-10-29 14:18:38', 1),
(74, 'Recapping the Thrills and Spills: [Your Blog Name] Tournament Results Unveiled', '<p>Prepare to relive the excitement and adrenaline of the most recent gaming tournament with our comprehensive blog post, where we break down all the remarkable moments, unexpected twists, and, of course, the victorious champions. The [Your Blog Name] brings you an in-depth analysis of the tournament results that had gamers on the edge of their seats.<br></p>', '55', 'Published', 'unpopular', 'HD-wallpaper-pubg-mobile-15.jpg', 'sub1.jpg', 'sub2.jpg', 'sub3.jpg', '2023-10-29 19:38:14', 1),
(75, 'Mastering the Battlegrounds: Your Ultimate PUBG Blog.', '<p>Welcome to the ultimate hub for all things PUBG! Our PUBG blog is your one-stop destination for everything you need to become a battle royale champion. Whether you\'re a seasoned veteran or a newbie to the intense world of PlayerUnknown\'s Battlegrounds, our blog is packed with tips, tricks, strategies, and the latest updates to help you dominate the battlegrounds.</p><p>Explore in-depth guides on weapon selection, map knowledge, and squad tactics that will give you the edge over your opponents. Stay up to date with the latest patch notes and game updates, and uncover hidden secrets and easter eggs scattered throughout the game\'s vast and immersive world.</p><p>We also bring you the latest news and insights from the competitive PUBG scene, covering eSports events, top players, and thrilling matches that keep the adrenaline pumping.</p><p>Our passionate team of PUBG enthusiasts is dedicated to providing you with quality content that enhances your gaming experience. So, grab your frying pan, hop into the plane, and drop into the battlefield with confidence, armed with the knowledge and skills you\'ll gain from our PUBG blog. Get ready to conquer, survive, and claim the chicken dinner that\'s rightfully yours.</p>', '61', 'Published', 'unpopular', 'blog3.jpg', 'blog3-1.jpg', 'blog3-2.jpg', 'blog3-3.jpg', '2023-10-31 00:35:55', 4),
(76, 'Teamwork Unleashed: Your Guide to Cooperative Gaming.', '<p>Step into the world of collaborative gaming with our blog, \"Teamwork Unleashed.\" If you\'re an avid gamer who thrives on the thrill of playing alongside friends or fellow gamers, this is your ultimate resource for all things team-based gameplay.</p><p>Discover strategies, tips, and tactics that will transform you and your squad into a well-oiled gaming machine. Whether you\'re into cooperative shooter games, MMOs, MOBAs, or any other genre that requires coordinated efforts, we\'ve got you covered. From character synergy to role assignments and communication skills, we delve deep into what it takes to become a top-tier gaming team.</p><p>Stay in the know about the latest multiplayer games, updates, and releases that are perfect for group play. Our blog also provides reviews and recommendations for team-oriented games, ensuring you\'re always on the pulse of the gaming community.</p><p>Our dedicated team of gamers and experts is passionate about helping you and your friends or teammates reach your full gaming potential. So grab your headset, invite your friends, and get ready to embark on epic gaming adventures together. \"Teamwork Unleashed\" is your key to achieving victory as a cohesive gaming unit, forging unforgettable memories, and most importantly, having a blast while you\'re at it!</p>', '64', 'Published', 'popular', 'blog4.jpg', 'blog4-1.jpg', 'blog4-2.jpg', 'blog4-3.jpg', '2023-10-31 00:44:30', 4),
(82, 'From Casual to Champion: A Deep Dive into the Competitive Gaming Tournament Scene', '                                    <p>Join us as we embark on an exciting journey into the heart-pounding realm of competitive gaming tournaments. In \'Level Up: Navigating the Thrilling World of Gaming Tournaments,\' we\'ll explore the high-stakes world of esports and the passion that drives players to reach the pinnacle of gaming excellence. From the thrill of victory to the agony of defeat, we\'ll dive into the stories, strategies, and spectacles that make gaming tournaments a must-watch event for both gamers and enthusiasts. Whether you\'re a seasoned pro or a curious newcomer, our blog will provide you with insights, tips, and behind-the-scenes glimpses into the gaming tournament universe. Stay tuned for exclusive interviews, analysis, and much more, all right here in the exciting world of competitive gaming.<br></p>                                    ', '61', 'Published', 'unpopular', 'p7-img-main.jpg', 'p7-img3.jpg', 'p7-img2.jpg', 'p7-img1.jpg', '2023-11-06 06:35:39', 1);
INSERT INTO `manage_posts` (`id`, `title`, `description`, `cate`, `status`, `popular`, `image`, `image2`, `image3`, `image4`, `date`, `posted_by`) VALUES
(83, 'my post', '<p><img src=\"data:image/jpeg;base64,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', '56', 'Draft', 'unpopular', '3d-portfolio.jpg', '', '', '', '2024-02-02 11:29:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manage_products`
--

CREATE TABLE `manage_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cate` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pop_status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_products`
--

INSERT INTO `manage_products` (`id`, `name`, `cate`, `price`, `disc`, `status`, `pop_status`, `image`, `image2`, `image3`, `image4`, `author`) VALUES
(66, 'Introducing the CoolPro X: Redefining Comfort and Cooling', '63', '500', '                                                                        <p>When the heat is on, and you need instant relief, there\'s one name you can trust: the CoolPro X, your ultimate cooling fan solution. Designed to keep you cool and comfortable, this', 'Active', 'popular', 'product3.1.jpg', 'product3.2.jpg', 'product3.3.jpg', 'product3.jpg', 1),
(67, 'Elevate Your Gaming Experience with OurGamming Headphones', '54', '15000', 'Unleash the full potential of your gaming adventures with our high-performance gaming headphones. At [Your Gaming Headphones Brand], we understand that every click, every step, and every explosion matters in the gaming world. That\'s why we\'ve crafted the ', 'Active', 'popular', 'product1.jpg', 'product1.3.jpg', 'product1.2.jpg', 'product1.1.jpg', 1),
(68, 'I Phone 13 Pro Max', '62', '120000', 'When it comes to cutting-edge technology and iconic design, Apple has always set the bar high. With the [Your iPhone Product Name], we\'re taking innovation to a whole new level. This extraordinary device is a masterpiece of craftsmanship, power, and sophi', 'Active', 'popular', 'product2.jpg', 'product2.1.jpg', 'product2.2.jpg', 'product2.3.jpg', 4),
(71, 'K8A Magnatic Cooling Fan For Mobile & Ipad – CM Shop', '63', '2500', '<p>The K8A Magnetic Cooling Fan is your ideal companion for keeping your mobile devices, including smartphones and iPads, running smoothly and cool during extended use. This compact and innovative cooling fan attaches effortlessly to your device thanks to', 'Active', 'Popular', 'p4-img-main.jpg', 'p4-img-1.jpg', 'p4-img-2.jpg', 'p4-img-3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manage_reports`
--

CREATE TABLE `manage_reports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_reports`
--

INSERT INTO `manage_reports` (`id`, `name`, `email`, `message`, `date`, `status`, `user_id`) VALUES
(29, 'Humaiz', 'humaiz@gmail.com', 'why why blocked me why', '2023-10-27 18:41:54', 'Checked', 23),
(30, 'Ismail', 'ismail@gmail.com', 'why you block me?', '2023-11-07 08:31:12', 'Checked', 57),
(31, 'Amir', 'ahmed@gmail.com', 'why block be', '2023-11-08 05:23:43', 'Pending', 55),
(32, 'Khalid', 'khalid@gmail.com', 'why block me?', '2023-11-08 08:40:26', 'Pending', 55);

-- --------------------------------------------------------

--
-- Table structure for table `manage_single_match`
--

CREATE TABLE `manage_single_match` (
  `id` int(11) NOT NULL,
  `player1` varchar(255) NOT NULL,
  `player2` varchar(255) NOT NULL,
  `winner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manage_site_socials`
--

CREATE TABLE `manage_site_socials` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkd` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_site_socials`
--

INSERT INTO `manage_site_socials` (`id`, `facebook`, `twitter`, `linkd`, `insta`) VALUES
(1, 'https://www.facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'https://www.instagram.com/');

-- --------------------------------------------------------

--
-- Table structure for table `manage_slider`
--

CREATE TABLE `manage_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `slider_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_slider`
--

INSERT INTO `manage_slider` (`id`, `title`, `img`, `slider_status`) VALUES
(29, 'Game On: Exploring the Pinnacle of Esports and Gaming Competitions', 'carousel3.jpg', 'Active'),
(30, 'Join Our New Tournament', 'blog4.jpg', 'Active'),
(31, '', 'gal2.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `manage_sub_categories`
--

CREATE TABLE `manage_sub_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_sub_categories`
--

INSERT INTO `manage_sub_categories` (`id`, `category`, `sub_cat_name`) VALUES
(50, '54', 'international');

-- --------------------------------------------------------

--
-- Table structure for table `manage_website`
--

CREATE TABLE `manage_website` (
  `id` int(11) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_address` varchar(255) NOT NULL,
  `site_description` varchar(255) NOT NULL,
  `site_phone` varchar(255) NOT NULL,
  `site_currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_website`
--

INSERT INTO `manage_website` (`id`, `site_title`, `site_name`, `site_logo`, `site_email`, `site_address`, `site_description`, `site_phone`, `site_currency`) VALUES
(6, 'ELDRITCH', 'bank', 'html5-logo-31813.png', 'email@gmail.com', '       multan khanewal ', '                      It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lo', '+96 4557891238', 'RS:');

-- --------------------------------------------------------

--
-- Table structure for table `mange_event`
--

CREATE TABLE `mange_event` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mange_event`
--

INSERT INTO `mange_event` (`id`, `link`, `thumb`, `status`) VALUES
(1, 'https://www.youtube.com/watch?v=NtaM3Sj-zow', 'blog3-1.jpg', 'De-Active');

-- --------------------------------------------------------

--
-- Table structure for table `match_candidates`
--

CREATE TABLE `match_candidates` (
  `id` int(11) NOT NULL,
  `player1` varchar(255) NOT NULL,
  `player2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `match_rsults`
--

CREATE TABLE `match_rsults` (
  `id` int(11) NOT NULL,
  `player1` varchar(255) NOT NULL,
  `player2` int(255) NOT NULL,
  `match_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mnage_upcomming_matches`
--

CREATE TABLE `mnage_upcomming_matches` (
  `id` int(11) NOT NULL,
  `players` varchar(255) NOT NULL,
  `avtar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `data`, `img`) VALUES
(2, 'cbuifwefghgfhfdrfrsdtsrtsrstsrzsdta', 'main.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `disc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `disc`) VALUES
(1, '                                    <h1 class=\"title text-center mb-3\" style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 0px;\">Introduction</h1><p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 0px;\">Welcome to Eldritch Gaming Tournaments. At Eldritch Gaming Tournaments, we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your personal information when you visit our website, participate in gaming tournaments, or interact with our services. By accessing or using the Eldritch Gaming Tournaments website and our services, you agree to the terms and practices described in this Privacy Policy. If you do not agree with the terms of this Privacy Policy, please refrain from using our services.</p><h2 class=\"policy-title mb-3\" style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\">Information We Collect</h2><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\">Your name Contact information, such as email address Username or gamer tag Payment information, if you make purchases through our platform Age or date of birth (to verify eligibility for certain tournaments)</p><h3 class=\"policy-title mb-3\" style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\">Log Data</h3><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\">We collect information that your browser sends whenever you visit our Site. This may include your IP address, browser type, browser version, pages of our Site that you visit, the time and date of your visit, the time spent on those pages, and other statistics.<br></p><h3 class=\"mb-3 policy-title\" style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\">Cookies and Tracking Technologies</h3><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\">We use cookies and similar tracking technologies to collect information about your interactions with our Site. This allows us to enhance your user experience, analyze trends, and improve our services. You can control the use of cookies through your browser settings.<br></p><h3 class=\"mb-3 policy-title\" style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\">How We Use Your Information</h3><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\">We use the information collected for the following purposes:</p><h4 class=\"policy-sub-danger px-5 mb-2\" style=\"margin-right: 0px; margin-left: 0px; padding-top: 0px; padding-bottom: 0px;\">To Provide Services</h4><p class=\"policy-disc p-3\" style=\"margin-right: 0px; margin-left: 0px;\">We use your personal information to provide gaming tournaments, process payments, and communicate with you regarding tournament updates and important information.</p><h4 class=\"policy-sub-danger px-5 mb-2\" style=\"margin-right: 0px; margin-left: 0px; padding-top: 0px; padding-bottom: 0px;\">To Improve Services</h4><p class=\"policy-disc p-3\" style=\"margin-right: 0px; margin-left: 0px;\">We use data to analyze and enhance the performance of our gaming tournaments and the user experience on our Site.</p><h4 class=\"policy-sub-danger px-5 mb-2\" style=\"margin-right: 0px; margin-left: 0px; padding-top: 0px; padding-bottom: 0px;\">Marketing and Promotions</h4><p class=\"policy-disc p-3\" style=\"margin-right: 0px; margin-left: 0px;\">With your consent, we may use your information to send promotional materials, newsletters, and updates about our tournaments and services.</p><h4 class=\"policy-sub-danger px-5 mb-2\" style=\"margin-right: 0px; margin-left: 0px; padding-top: 0px; padding-bottom: 0px;\">Compliance and Security</h4><p class=\"policy-disc p-3\" style=\"margin-right: 0px; margin-left: 0px;\">We may use your information to comply with legal obligations and to ensure the security and integrity of our services.</p><h4 class=\"policy-title mb-3\" style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\">Sharing Your Information</h4><p class=\"policy-disc p-3\" style=\"margin-right: 0px; margin-left: 0px;\">We do not sell, rent, or trade your personal information to third parties. However, we may share your information in the following circumstances:</p>                                    ');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `con_pass` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `posts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `fname`, `email`, `uname`, `password`, `con_pass`, `profile`, `posts`) VALUES
(1, 'yasir', 'mehboob', 'yasir@gmail.com', 'admin123', 'Admin12#', 'Admin12#', 'main.jpg', 11),
(4, 'hamad', 'Talab', 'hammad@gmail.com', 'Hammad12', 'Hammad!23', 'Hammad!23', 'gal1.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` int(11) NOT NULL,
  `disc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `disc`) VALUES
(1, '                                                                                                                                                                                    <h2 class=\"policy-title mb-3\" style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\"><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space-collapse: preserve; background-color: rgb(247, 247, 248);\"><span style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">1. Acceptance of Terms:</span></p><ul style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-position: initial; list-style-image: initial; margin: 1.25em 0px; padding: 0px; display: flex; flex-direction: column; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space-collapse: preserve; background-color: rgb(247, 247, 248);\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">By using Eldritch (hereinafter referred to as \"the Website\" or \"Eldritch\"), you agree to comply with and be bound by these Terms and Conditions. If you do not agree, please refrain from using our services.</li></ul><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space-collapse: preserve; background-color: rgb(247, 247, 248);\"><span style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">2. User Accounts:</span></p><ul style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-position: initial; list-style-image: initial; margin: 1.25em 0px; padding: 0px; display: flex; flex-direction: column; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space-collapse: preserve; background-color: rgb(247, 247, 248);\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">To access certain features, you must create an account with accurate and up-to-date information.</li><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">You are responsible for maintaining the confidentiality of your account credentials.</li></ul><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space-collapse: preserve; background-color: rgb(247, 247, 248);\"><span style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">3. Eligibility:</span></p><ul style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-position: initial; list-style-image: initial; margin: 1.25em 0px; padding: 0px; display: flex; flex-direction: column; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space-collapse: preserve; background-color: rgb(247, 247, 248);\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">Users must be of legal age in their jurisdiction to participate in tournaments or provide parental consent.</li><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">You are responsible for verifying the legality of participating in tournaments in your location.</li></ul><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space-collapse: preserve; background-color: rgb(247, 247, 248);\"><span style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600; color: var(--tw-prose-bold);\">4. Tournament Rules:</span></p><ul style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-position: initial; list-style-image: initial; margin: 1.25em 0px; padding: 0px; display: flex; flex-direction: column; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space-collapse: preserve; background-color: rgb(247, 247, 248);\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 0px; padding-left: 0.375em; display: block; min-height: 28px;\">Participants must adhere to the specific rules and regulations for each tournament, which may vary.</li></ul></h2>');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `uname`, `review`) VALUES
(1, 'admin', 'Your Review...sca'),
(2, 'admin', 'Your Review...sca'),
(3, 'admin', 'Your Review...sca'),
(4, 'admin', 'Your Review...sca'),
(5, 'admin', 'Your Review...sca');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `item_name`, `price`, `quantity`, `status`, `pd_id`, `user_id`) VALUES
(16, 'I Phone 13 Pro Max', 120000, 1, 'Completed', 68, 33),
(17, 'I Phone 13 Pro Max', 120000, 1, 'Completed', 68, 35),
(18, 'I Phone 13 Pro Max', 120000, 1, 'Completed', 68, 35),
(19, 'I Phone 13 Pro Max', 120000, 1, 'Completed', 68, 50),
(20, 'I Phone 13 Pro Max', 120000, 1, 'Pending', 68, 50),
(21, 'K8A Magnatic Cooling Fan For Mobile & Ipad – CM Shop', 2500, 4, 'Pending', 71, 58),
(22, 'I Phone 13 Pro Max', 120000, 3, 'Pending', 68, 58),
(23, 'K8A Magnatic Cooling Fan For Mobile & Ipad – CM Shop', 2500, 1, 'Pending', 71, 57),
(24, 'K8A Magnatic Cooling Fan For Mobile & Ipad – CM Shop', 2500, 1, 'Pending', 71, 55),
(25, 'I Phone 13 Pro Max', 120000, 4, 'Pending', 68, 55);

-- --------------------------------------------------------

--
-- Table structure for table `user_social`
--

CREATE TABLE `user_social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_social`
--

INSERT INTO `user_social` (`id`, `facebook`, `instagram`, `youtube`, `twitter`) VALUES
(1, 'https://web.facebook.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'https://twitter.com/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_winners`
--
ALTER TABLE `final_winners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_result`
--
ALTER TABLE `last_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage-players`
--
ALTER TABLE `manage-players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage-user-guide`
--
ALTER TABLE `manage-user-guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_about`
--
ALTER TABLE `manage_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_candidate`
--
ALTER TABLE `manage_candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_categories`
--
ALTER TABLE `manage_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_contact_us`
--
ALTER TABLE `manage_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_counter`
--
ALTER TABLE `manage_counter`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `manage_faqs`
--
ALTER TABLE `manage_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_match`
--
ALTER TABLE `manage_match`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_match_types`
--
ALTER TABLE `manage_match_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_order`
--
ALTER TABLE `manage_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_our_team`
--
ALTER TABLE `manage_our_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_posts`
--
ALTER TABLE `manage_posts`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `manage_posts` ADD FULLTEXT KEY `title` (`title`,`description`);
ALTER TABLE `manage_posts` ADD FULLTEXT KEY `title_2` (`title`);
ALTER TABLE `manage_posts` ADD FULLTEXT KEY `title_3` (`title`);

--
-- Indexes for table `manage_products`
--
ALTER TABLE `manage_products`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `manage_products` ADD FULLTEXT KEY `name` (`name`,`disc`);
ALTER TABLE `manage_products` ADD FULLTEXT KEY `name_2` (`name`);

--
-- Indexes for table `manage_reports`
--
ALTER TABLE `manage_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_single_match`
--
ALTER TABLE `manage_single_match`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_site_socials`
--
ALTER TABLE `manage_site_socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_slider`
--
ALTER TABLE `manage_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_sub_categories`
--
ALTER TABLE `manage_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_website`
--
ALTER TABLE `manage_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mange_event`
--
ALTER TABLE `mange_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_candidates`
--
ALTER TABLE `match_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_rsults`
--
ALTER TABLE `match_rsults`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_social`
--
ALTER TABLE `user_social`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `final_winners`
--
ALTER TABLE `final_winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `last_result`
--
ALTER TABLE `last_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `manage-players`
--
ALTER TABLE `manage-players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `manage-user-guide`
--
ALTER TABLE `manage-user-guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_about`
--
ALTER TABLE `manage_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manage_candidate`
--
ALTER TABLE `manage_candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `manage_categories`
--
ALTER TABLE `manage_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `manage_contact_us`
--
ALTER TABLE `manage_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_counter`
--
ALTER TABLE `manage_counter`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_faqs`
--
ALTER TABLE `manage_faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manage_match`
--
ALTER TABLE `manage_match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `manage_match_types`
--
ALTER TABLE `manage_match_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_order`
--
ALTER TABLE `manage_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `manage_our_team`
--
ALTER TABLE `manage_our_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `manage_posts`
--
ALTER TABLE `manage_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `manage_products`
--
ALTER TABLE `manage_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `manage_reports`
--
ALTER TABLE `manage_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `manage_single_match`
--
ALTER TABLE `manage_single_match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_site_socials`
--
ALTER TABLE `manage_site_socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_slider`
--
ALTER TABLE `manage_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `manage_sub_categories`
--
ALTER TABLE `manage_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `manage_website`
--
ALTER TABLE `manage_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mange_event`
--
ALTER TABLE `mange_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `match_candidates`
--
ALTER TABLE `match_candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `match_rsults`
--
ALTER TABLE `match_rsults`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_social`
--
ALTER TABLE `user_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
