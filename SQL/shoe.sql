-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 02:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID_Item` int(20) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `Item_price` int(20) NOT NULL,
  `Item_amount` int(11) NOT NULL,
  `Item_model` varchar(50) NOT NULL,
  `Image_item` varchar(200) NOT NULL,
  `Type_item` varchar(200) NOT NULL,
  `Item_data` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID_Item`, `Item_name`, `Item_price`, `Item_amount`, `Item_model`, `Image_item`, `Type_item`, `Item_data`) VALUES
(1, 'Eraser staedtler', 10, 100, 'Eraser', 'eraser', 'Eraser', '{\"Brand\":\"Eraser\" , \"Item_name\": \"Eraser staedtler\" , \"Price\":\"10 ฿\"}'),
(2, 'Eraser mono', 20, 100, 'Eraser', 'eraser_mono', 'Eraser', '{\"Brand\":\"Eraser\" , \"Item_name\": \"Eraser mono\" , \"Price\":\"20฿\"}'),
(3, 'Eraser pentel', 15, 100, 'Eraser', 'eraser_pentel', 'Eraser', '{\"Brand\":\"Eraser\" , \"Item_name\": \"Eraser pentel\" , \"Price\":\"15 ฿\"}'),
(4, 'Highlight Pen Yellow Color', 20, 100, 'HighlightPen', 'penHighlight', 'HighlightPen', '{\"Brand\":\"penHighlight\" , \"Item_name\": \"Highlight Pen Yellow Color\" , \"Price\":\"20 ฿\"}'),
(5, 'Highlight Pen 6 Color Set', 20, 100, 'HighlightPen', 'Highlight_set', 'HighlightPen', '{\"Brand\":\"penHighlight\" , \"Item_name\": \"Highlight Pen  Color set\" , \"Price\":\"20 ฿\"}'),
(6, 'Mildliner Red Color', 45, 100, 'HighlightPen', 'Highlight_red', 'HighlightPen', '{\"Brand\":\"penHighlight\" , \"Item_name\": \"Mildliner Red Color\" , \"Price\":\"45฿\"}'),
(7, 'Faber Castell Green Color', 35, 100, 'HighlightPen', 'Highlight_green', 'HighlightPen', '{\"Brand\":\"penHighlight\" , \"Item_name\": \"Faber Castell Green Color\" , \"Price\":\"35฿\"}'),
(8, 'Faber Castell Blue Color', 25, 100, 'HighlightPen', 'Highlight_blue', 'HighlightPen', '{\"Brand\":\"penHighlight\" , \"Item_name\": \"Faber Castell Blue Color\" , \"Price\":\"25฿\"}'),
(9, 'Quantum Highlight 2 Color', 30, 100, 'HighlightPen', 'Highlight_2color', 'HighlightPen', '{\"Brand\":\"penHighlight\" , \"Item_name\": \"Quantum Highlight 2 Color\" , \"Price\":\"30฿\"}'),
(10, 'Notebook', 35, 100, 'Notebook', 'notebook', 'Notebook', '{\"Brand\":\"Notebook\" , \"Item_name\": \"Notebook\" , \"Price\":\"35฿\"}'),
(11, 'Notebook Cartoon', 30, 100, 'Notebook', 'notebook_cartoon', 'Notebook', '{\"Brand\":\"Notebook\" , \"Item_name\": \"Notebook Cartoon\" , \"Price\":\"30฿\"}'),
(12, 'Notebook DoubleA', 25, 100, 'Notebook', 'notebook_doubleA', 'Notebook', '{\"Brand\":\"Notebook\" , \"Item_name\": \"Notebook DoubleA\" , \"Price\":\"20฿\"}'),
(13, 'Pen FaBer-Castell', 10, 100, 'Pen', 'Pen', 'Pen', '{\"Brand\":\"Pen\" , \"Item_name\": \"Pen FaBer-Castell\" , \"Price\":\"10 ฿\"}'),
(14, 'Pen Energer black', 15, 100, 'Pen', 'pen_black', 'Pen', '{\"Brand\":\"Pen\" , \"Item_name\": \"pen_black\" , \"Price\":\"15 ฿\"}'),
(15, 'Pen Energer blue', 15, 100, 'Pen', 'pen_blue', 'Pen', '{\"Brand\":\"Pen\" , \"Item_name\": \"Pen Energer blue\" , \"Price\":\"15 ฿\"}'),
(16, 'Pen Energer red', 15, 100, 'Pen', 'pen_red', 'Pen', '{\"Brand\":\"Pen\" , \"Item_name\": \"Pen Energer red\" , \"Price\":\"15 ฿\"}'),
(17, 'pencilclick', 0, 100, 'pencilclick ', 'pencilclick', 'pencilclick', '{\"Brand\":\"penclick\" , \"Item_name\": \"pencilclick\" , \"Price\":\"20 ฿\"}'),
(18, 'pencilclick blue', 20, 100, 'pencilclick ', 'pencilclick_blue', 'pencilclick', '{\"Brand\":\"penclick\" , \"Item_name\": \"pencilclick_blue\" , \"Price\":\"20 ฿\"}'),
(19, 'pencilclick rotring', 20, 100, 'pencilclick ', 'pencilclick_rotring', 'pencilclick', '{\"Brand\":\"penclick\" , \"Item_name\": \"pencilclick_rotring\" , \"Price\":\"20 ฿\"}'),
(20, 'penclick', 20, 100, 'pencilclick ', 'pencilclick', 'pencilclick', '{\"Brand\":\"penclick\" , \"Item_name\": \"penclick\" , \"Price\":\"20 ฿\"}'),
(21, 'ruler aluminium', 20, 100, 'ruler ', 'ruler_aluminium', 'ruler ', '{\"Brand\":\"ruler aluminium\" , \"Item_name\": \"ruler_aluminium\" , \"Price\":\"20 ฿\"}'),
(22, 'ruler 2in1', 20, 100, 'ruler ', 'ruler12in', 'ruler ', '{\"Brand\":\"ruler 2in1\" , \"Item_name\": \"ruler12in\" , \"Price\":\"20฿\"}'),
(24, 'Pencil Nanmee HB', 12, 100, 'Pencil', 'Pencil Nanmee HB', 'Pencil', '{\"Brand\":\"Pencil\" , \"Item_name\": \"Pencil Nanmee HB\" , \"Price\":\"12 ฿\"}'),
(25, 'Pencil Staedtler 2B', 15, 100, 'Pencil', 'Pencil Staedtler 2B', 'Pencil', '{\"Brand\":\"Pencil\" , \"Item_name\": \"Pencil Staedtler 2B \" , \"Price\":\"15 ฿\"}'),
(26, 'Liquid_tape Pentel', 50, 100, 'Liquid-Paper', 'Liquid_tape Pentel', 'Liquid-Paper', '{\"Brand\":\"Liquid-Paper\" , \"Item_name\": \"Liquid_tape Pentel\" , \"Price\":\"50 ฿\"}'),
(27, 'Liquid Pentel slim', 70, 100, 'Liquid-Paper', 'Liquid Pentel slim', 'Liquid-Paper', '{\"Brand\":\"Liquid-Paper\" , \"Item_name\": \"Liquid Pentel slim\" , \"Price\":\"70 ฿\"}'),
(28, 'Liquid Pentel', 60, 100, 'Liquid-Paper', 'Liquid Pentel', 'Liquid-Paper', '{\"Brand\":\"Liquid-Paper\" , \"Item_name\": \"Liquid Pentel\" , \"Price\":\"60 ฿\"}'),
(29, 'NotebookA5', 25, 100, 'Notebook', 'notebookA5', 'Notebook', '{\"Brand\":\"Notebook\" , \"Item_name\": \"NotebookA5\" , \"Price\":\"25฿\"}'),
(30, 'Liquid Pentel', 40, 100, 'Liquid-Paper', 'Liquid_tape Tombo', 'Liquid-Paper', '{\"Brand\":\"Liquid-Paper\" , \"Item_name\": \"Liquid_tape Tombo\" , \"Price\":\"40 ฿\"}'),
(31, 'Liquid tape Elephant', 45, 100, 'Liquid-Paper', 'Liquid_tape Elephant', 'Liquid-Paper', '{\"Brand\":\"Liquid-Paper\" , \"Item_name\": \"Liquid_tape Elephant\" , \"Price\":\"45 ฿\"}'),
(32, 'PencilBox_Benten', 500, 100, 'Pencil-Box', 'PencilBox_Benten', 'Pencil-Box', '{\"Brand\":\"Pencil-Box\" , \"Item_name\": \"PencilBox_Benten\" , \"Price\":\"500 ฿\"}'),
(33, 'PencilBox_Dino', 500, 100, 'Pencil-Box', 'PencilBox_Dino', 'Pencil-Box', '{\"Brand\":\"Pencil-Box\" , \"Item_name\": \"PencilBox_Dino\" , \"Price\":\"500 ฿\"}'),
(34, 'PencilBox_Unicorn', 500, 100, 'Pencil-Box', 'PencilBox_Unicorn', 'Pencil-Box', '{\"Brand\":\"Pencil-Box\" , \"Item_name\": \"PencilBox_Unicorn\" , \"Price\":\"500 ฿\"}');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ID_Item` int(10) NOT NULL,
  `ID_Order` int(10) NOT NULL,
  `ID_User` int(255) NOT NULL,
  `Item_amount` int(255) NOT NULL,
  `Time` datetime NOT NULL DEFAULT current_timestamp(),
  `ID_Receipt` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ID_Item`, `ID_Order`, `ID_User`, `Item_amount`, `Time`, `ID_Receipt`) VALUES
(7, 213, 1, 4, '2022-12-05 14:33:35', 14),
(11, 214, 1, 6, '2022-12-05 14:34:12', 14),
(3, 215, 3, 1, '2022-12-05 14:40:53', 15),
(9, 216, 3, 1, '2022-12-05 14:40:56', 15),
(1, 217, 3, 1, '2022-12-05 14:41:00', 15),
(3, 218, 5, 8, '2022-12-05 15:03:02', 16),
(9, 219, 5, 2, '2022-12-05 15:03:04', 16),
(1, 220, 5, 4, '2022-12-05 15:03:05', 16),
(8, 221, 5, 1, '2022-12-05 15:04:18', 17),
(4, 222, 5, 2, '2022-12-05 15:04:22', 17),
(10, 223, 5, 3, '2022-12-05 15:04:25', 17),
(12, 226, 5, 1, '2022-12-05 15:07:28', 18),
(11, 227, 5, 2, '2022-12-05 15:07:43', 18),
(1, 228, 1, 4, '2022-12-05 15:09:37', 19),
(3, 229, 1, 1, '2022-12-05 15:09:39', 19),
(3, 230, 1, 1, '2022-12-05 15:23:36', 20),
(4, 231, 1, 1, '2022-12-05 15:23:39', 20),
(1, 232, 1, 1, '2022-12-05 15:23:41', 20),
(1, 233, 1, 1, '2022-12-05 15:23:46', 21),
(25, 240, 2, 5, '2023-09-30 21:48:54', 24),
(24, 246, 2, 1, '2023-09-30 22:13:45', 25),
(13, 247, 2, 1, '2023-09-30 22:13:48', 25),
(1, 248, 2, 1, '2023-09-30 22:13:51', 25),
(26, 249, 2, 1, '2023-09-30 22:13:55', 25),
(18, 250, 2, 1, '2023-09-30 22:13:59', 25),
(33, 251, 2, 1, '2023-09-30 22:14:03', 25),
(21, 252, 2, 1, '2023-09-30 22:14:10', 25),
(11, 253, 2, 1, '2023-09-30 22:14:20', 25),
(6, 254, 2, 1, '2023-09-30 22:14:27', 25),
(32, 255, 2, 1, '2023-09-30 22:14:47', 25),
(34, 256, 2, 6, '2023-09-30 22:15:01', 25),
(25, 257, 2, 1, '2023-10-01 14:22:08', 26),
(25, 258, 2, 1, '2023-10-01 14:22:25', 27),
(25, 259, 2, 1, '2023-10-01 14:27:47', 28);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `ID_Receipt` int(20) NOT NULL,
  `Total_price` int(255) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `ID_User` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`ID_Receipt`, `Total_price`, `Status`, `ID_User`) VALUES
(15, 0, 'order', 3),
(18, 0, 'order', 5),
(22, 0, 'order', 1),
(23, 15, 'confired', 2),
(24, 15, 'confired', 2),
(25, 4197, 'confired', 2),
(26, 15, 'confired', 2),
(27, 15, 'confired', 2),
(28, 15, 'confired', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_User` int(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Fullname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_User`, `Username`, `Password`, `email`, `Tel`, `Fullname`) VALUES
(1, 'Wichan', '111111', 't@hotmail.com', '0812345678', 'Tiktokza007'),
(2, 'Thongtong', '1234567', 'p@hotmail.com', '0912345678', 'Por'),
(3, 'Bobady', '1234567', 'b@hotmail.com', '0912345743', 'Bow'),
(4, 'zeakhinet', '123456', 'z@hotmail.com', '0846694215', 'Jump'),
(5, 'test1', '111111', 't22@hotmail.com', '0846694215', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID_Item`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID_Order`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`ID_Receipt`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID_Item` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `ID_Order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ID_Receipt` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
