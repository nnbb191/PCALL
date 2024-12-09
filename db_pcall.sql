-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4307
-- Generation Time: Nov 29, 2024 at 02:09 PM
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
-- Database: `db_pcall`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`) VALUES
(14, 5, 9, 2),
(13, 5, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Gaming PCs'),
(2, 'Laptops'),
(3, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `name`, `email`, `address`, `city`, `phone`, `created_at`) VALUES
(5, 2, 'Nuwan', 'jncm@gmail.com', '054', 'Kandy', '0777077755', '2024-11-29 02:53:23'),
(4, 2, 'Nuwan', 'jncm@gmail.com', '054', 'Kandy', '0780780780', '2024-11-29 02:52:40'),
(3, 2, 'Nuwan', 'jncm@gmail.com', '31', 'Colombo', '0770774465', '2024-11-29 02:36:36'),
(6, 5, 'Mubarak Muflih Alhajri', 'mubarak@gmail.com', 'Yanbu', 'yanbu', '0557782040', '2024-11-29 07:52:24'),
(7, 5, 'Mubarak Muflih Alhajri', 'mubarak@gmail.com', 'Yanbu', 'yanbu', '0557782040', '2024-11-29 08:03:58'),
(8, 1, 'Admin', 'admin@gmail.com', 'Yanbu', 'Jubail industrial', '0557782040', '2024-11-29 08:07:43'),
(9, 5, 'Mubarak Muflih Alhajri', 'mubarak@gmail.com', 'Yanbu', 'yanbu', '0557782040', '2024-11-29 08:18:08'),
(10, 6, 'basel ahmed alhajri', 'basel@gmail.com', '123', '123', '123', '2024-11-29 09:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 3, 3, 2, 1250.00),
(2, 4, 3, 2, 1250.00),
(3, 4, 3, 2, 1250.00),
(4, 4, 1, 1, 1350.00),
(5, 4, 1, 1, 1350.00),
(6, 5, 3, 2, 1250.00),
(7, 5, 1, 1, 1350.00),
(8, 6, 3, 2, 1250.00),
(9, 6, 1, 1, 1350.00),
(10, 7, 1, 1, 1350.00),
(11, 7, 3, 2, 1250.00),
(12, 8, 1, 1, 1350.00),
(13, 9, 1, 2, 1350.00),
(14, 9, 4, 1, 2000.00),
(15, 9, 3, 1, 1250.00),
(16, 10, 1, 1, 1350.00),
(17, 10, 5, 1, 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `category` tinyint(1) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `stock`, `category`, `image_url`) VALUES
(1, 'Razer Blade 15 Gaming Laptop: NVIDIA GeForce RTX 3070 Ti - 12th Gen Intel 14-Core i7 CPU - 15.6” FHD 360Hz - 16GB DDR5 RAM - 1TB PCIe SSD - Windows 11 - CNC Aluminum - Chroma RGB - Thunderbolt 4', ' About this item\r\n\r\n    NVIDIA GeForce RTX 3070 Ti GPU: The new GeForce RTX 3070 Ti is up to 70% faster than RTX 2070 SUPER laptops and can deliver 100 frames per second at 1440p resolution\r\n    12th Gen Intel Core i7 14-Core CPU: Experience cutting-edge power with the newly released Intel Core i7-12800H processor with up to 4.8GHz of Turbo Boost for unrivalled performance to take on the most demanding gaming and creative tasks\r\n    FHD 360Hz Display: Compete at the highest level with maximum frames and the fastest refresh rate available to gain the unfair advantage\r\n    DDR5 4800MHz Memory: 50% faster than the previous genertion, enjoy a quicker, smoother experience when loading applications, running games, and performing other everyday PC tasks\r\n    Next-Gen Vapor Chamber Cooling: Upgraded with more exhaust fins, quiter fans, and a larger liquid capacity, the new Blade 15 performs cooler and quieter than ever before\r\n    Advanced Connectivity: Connect, play, and share effortlessly thanks to the built-in HDMI 2.1 port, Thunderbolt 4 USB-C port, and UHS-III SD card slot plus Bluetooth 5.2 connectivity\r\n', 1350.00, 5, 2, 'uploads/71kBeFDgCkL._AC_SL1500_.jpg'),
(3, 'ASUS TUF FX505DT Gaming Laptop- 15.6\", 120Hz Full HD, AMD Ryzen 5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB', 'ASUS TUF FX505DT Gaming Laptop- 15.6\", 120Hz Full HD, AMD Ryzen 5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB', 1250.00, 10, 2, 'uploads/81gK08T6tYL._AC_SL1500_.jpg'),
(7, 'INFINIARC CUBE GAMING PC (Intel Core i5-12400F-RTX4060 -H610M WIFI-16GB DDR5 -M.2 1TB) Black', 'INFINIARC CUBE GAMING PC (Intel Core i5-12400F-RTX4060 -H610M WIFI-16GB DDR5 -M.2 1TB) Black H610M WIFI-ARGB DDR5 Socket Intel I Core i5-12400F Processor I GeForce 8GB GDDR6 RTX 4060 OC I RGB DDR5 MEMORY 16GB I NV2 1TB M.2 2280 I DeepCool AG400 DIGITAL ARGB Black air cooler INFINIARC Edition I DEEPCOOL PK650D BRONZE 650W 80 Plus BRONZE Power Supply', 1000.00, 10, 1, 'uploads/7105zylTxCL._AC_SX679_.jpg'),
(6, 'SUPER GAMING PC 1000!!!!', 'ADFADFFDADFADF', 2000.00, 10, 1, 'uploads/71LMiD9i+ML.jpg'),
(8, 'Sony WH-CH520 Wireless Bluetooth On-Ear with Mic for Phone Call, Black', 'With up to 50-hour battery life and quick charging, you’ll have enough power for multi-day road trips and long festival weekends.Control Type:Media', 100.00, 10, 3, 'uploads/41lArSiD5hL._AC_SX679_.jpg'),
(9, 'Logitech M171 Wireless Mouse for PC, Mac, Laptop, 2.4 GHz with USB Mini Receiver, Optical Tracking, 12-Months Battery Life, Ambidextrous - Black', 'Plug-and-Play Connection: Connect in 3 seconds (1) to your computer via a strong, reliable USB receiver that plugs into your computer’s USB port', 50.00, 10, 3, 'uploads/51-zoOALWBL._AC_SX679_.jpg'),
(10, 'Redragon K552 Mechanical Gaming Keyboard RGB LED Backlit Wired with Anti-Dust Proof Switches for Windows PC (Black, 87 Key Red Switches)', 'Tenkeyless compact mechanical gaming keyboard Redragon k552 tkl small compact with dust proof mechanical switches cherry mx red equivalent Linear switches quiet click sound fast action with minimal resistance without a tactile bump feel', 99.00, 10, 3, 'uploads/71lQnVCMmXL.__AC_SX300_SY300_QL70_ML2_.jpg'),
(11, 'MSI Cyborg 15 Gaming Laptop, Intel Core i7-13620H, 15.6\" FHD (1920 x 1080) Display, 144Hz, 1TB NVMe PCIe SSD, 16GB DDR5 RAM, RTX 4060, 8GB GDDR6 Graphics, Win 11, Backlit Gaming Keyboard', 'Cyborg 15 A13VF SSD, 16GB DDR5 RAM, RTX 4060, 8GB GDDR6 Graphics, Win 11, Backlit Gaming Keyboard', 3999.00, 10, 2, 'uploads/71IOI+LF5fL._AC_SY300_SX300_.jpg'),
(12, 'Gaming Computer with Intel i5 12400F CPU, Nvidia RTX 4060ti GPU, 16GB RAM, 1TB SSD and RGB Lighting Remote Control, Windows 11', 'POWERFUL PERFORMANCE: Featuring the powerful Intel i5 12400F processor and NVIDIA GeForce RTX 4060ti graphics card, this PC delivers smooth gameplay and graphics.\r\nAMPLE MEMORY AND STORAGE: 16GB of RAM and a speedy 1TB M.2 NVMe SSD provide plenty of memory and fast storage for your games and files.\r\nPRE-LOADED OPERATING SYSTEM: Windows 11 comes pre-installed, ready to use right out of the box.\r\nVISUALLY STUNNING: RGB case lighting adds a vibrant aesthetic to complement your gaming experience.\r\nREADY TO GAME: This fully-built gaming desktop is ready to play your favorite titles with high-quality visuals and smooth frame rates.', 4000.00, 10, 1, 'uploads/714+QqQi8cL._AC_SY300_SX300_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `role` tinyint(4) DEFAULT 2
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`, `address`, `city`, `role`) VALUES
(6, 'basel ahmed alhajri', 'basel@gmail.com', '$2y$10$xbfl49fVr0hrgFq4iNRX1ucIXv/jMF0.SmWfDzaCAxpXEZPC8ssKe', '055576232', '123', '123', 1),
(1, 'Admin', 'admin@gmail.com', '$2y$10$SIBDsv9VOwgRjrcBAXnzp.qJmmGQFY.RszrNfue/0XLRr7nPxUFMG', '', NULL, NULL, 1),
(5, 'Mubarak Muflih Alhajri', 'mubarak@gmail.com', '$2y$10$i3q51y4HIjmfVwVLL1Frz.yY1R6Trrf0HehzWNk9D/1bIWw03s0Xm', '0557782040', 'Yanbu', 'yanbu', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
