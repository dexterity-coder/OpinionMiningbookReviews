-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 11:22 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carreview`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` varchar(15) NOT NULL,
  `bookname` varchar(340) NOT NULL,
  `bookauthor` varchar(100) NOT NULL,
  `bookdesc` varchar(1000) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `bookname`, `bookauthor`, `bookdesc`, `img`) VALUES
('BK-08222311', 'Toyota 4Runner', 'Toyota', 'The 2021 Toyota 4Runner is a decade old, and its pickup-based, body-on-frame architecture is a relic of past SUVs. And yet, its rugged, off-road-ready persona has more appeal than ever, standing in contrast to the car-like crossovers flooding today&rsquo;s market. Granted, those newer vehicles &mdash; including Toyota&rsquo;s own Highlander as well as the Honda Passport and Chevrolet Blazer &mdash; ride and handle better and get far better gas mileage. In comparison, the 4Runner is slow and thirsty. Its off-road capability, though, far exceeds the norm, and rivals that of the Jeep Grand Cherokee. The 4Runner&rsquo;s versatile interior can squeeze in a third-row seat, but it&rsquo;s better utilized in two-row form with an expansive cargo hold. The liftgate power window is unique in the field and allows long objects (like surfboards) to stick out the back, and the optional sliding cargo floor is handy for tailgating or loading heavy objects.\r\n\r\nFor 2021, the 4Runner gains a new Trail Edi', 'img_08232022230825.png'),
('BK-12222311', 'Ford Fiesta', 'Ford', 'The Ford Fiesta has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1498 cc while the Petrol engine is 1499 cc . It is available with Manual transmission. Depending upon the variant and fuel type the Fiesta has a mileage of 17.0 to 25.01 kmpl and Ground clearance of Fiesta is 153mm. The Fiesta is a 5 seater 4 cylinder car and has length of 4320mm, width of 1764mm and a wheelbase of 2489mm.\r\nThe Ford Fiesta is a supermini marketed by Ford since 1976 over seven generations. Over the years, the Fiesta has mainly been developed and manufactured by Ford\'s European operations, and has been positioned below the Escort (later the Focus).\r\n\r\nIn 2008, the sixth generation Fiesta (Mark VI) was introduced worldwide, making it the first Fiesta model to be sold in the United States since the Fiesta Mark I was discontinued at the end of 1980.', 'img_08232022231246.jpg'),
('BK-15222311', ' BMW X1', 'BMW', 'The BMW X1 is a line of subcompact luxury crossovers produced by BMW. Debuted in 2009, the first-generation X1 has been based on the E90 3 Series and offers rear-wheel drive layout as standard.\r\n\r\nThe BMW X1 has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1995 cc while the Petrol engine is 1998 cc . It is available with Automatic transmission. Depending upon the variant and fuel type the X1 has a mileage of 14.82 to 19.62 kmpl . The X1 is a 5 seater 4 cylinder car and has length of 4447mm, width of 2060mm and a wheelbase of 2670mm.', 'img_08232022231551.jpg'),
('BK-39222310', 'Mercedes-Benz E-Class', 'Mercedes-Benz', 'The Mercedes-Benz E-Class is a range of executive cars manufactured by German automaker Mercedes-Benz in various engine and body configurations. Produced since 1953, the E-Class falls midrange in the Mercedes line-up, and has been marketed worldwide across five generations.\r\n\r\nThe Mercedes-Benz E-Class has 2 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1950 cc and 2925 cc while the Petrol engine is 1991 cc . It is available with Automatic transmission.Depending upon the variant and fuel type the E-Class has a mileage of . The E-Class is a 5 seater 6 cylinder car and has length of 5075mm, width of 2065mm and a wheelbase of 3079mm.\r\n\r\nE-Class Infotainment, Bluetooth, and Navigation\r\nThere are multiple ways to access the infotainment system in the E-Class, including using the touch screen, touchpad controller, voice commands, and physical controls. Overall, using the MBUX (Mercedes-Benz User Experience) system is user-friendly. However, the steering wheel&rsquo;s touch', 'img_08232022223903.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cm_id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `bookid` varchar(15) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cm_id`, `user_id`, `bookid`, `comment`, `status`, `date`) VALUES
(96, 'USER_200643102901', 'BK-39222310', ' the specification of this car is awesome, it last for a very long period and the tires are best suitable for African roads', 'positive', '2022-08-23 22:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `title` varchar(500) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `sn` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `status` varchar(10) NOT NULL,
  `contact_id` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email`, `password`, `role`) VALUES
('admin', 'admin@admin.com', '1234', 'admin'),
('USER_200643102901', 'johndoe@gmail.com', '1234', 'user'),
('USER_200644042901', 'rose@gmail.com', '1234', 'user'),
('USER_200924520105', 'a@gmail.com', '1234', 'user'),
('USER_211132051211', 'roseike@gmail.com', '1234', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(40) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `oname` varchar(30) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `sname`, `oname`, `gender`, `email`) VALUES
('USER_200643102901', 'John', 'Doe', 'peters', 'male', 'johndoe@gmail.com'),
('USER_200644042901', 'Jonathan', 'Rose', 'peters', 'female', 'rose@gmail.com'),
('USER_200924520105', 'Johns', 'Jonathan David', 'peters', 'male', 'a@gmail.com'),
('USER_211132051211', 'Rose ', 'John ', 'Ikenna', 'female', 'roseike@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
