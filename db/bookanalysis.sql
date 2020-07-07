-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 02:44 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookanalysis`
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
('BK-10200101', 'Deep Work', 'Cal Newpork', 'One of the most valuable skills in our economy is becoming increasingly rare. If you master this skill, you\'ll achieve extraordinary results.\r\n\r\nDeep work is the ability to focus without distraction on a cognitively demanding task. It\'s a skill that allows you to quickly master complicated information and produce better results in less time. Deep work will make you better at what you do and provide the sense of true fulfillment that comes from craftsmanship. In short, deep work is like a super power in our increasingly competitive twenty-first century economy. And yet, most people have lost the ability to go deep-spending their days instead in a frantic blur of e-mail and social media, not even realizing there\'s a better way.\r\n\r\nIn DEEP WORK, author and professor Cal Newport flips the narrative on impact in a connected age. Instead of arguing distraction is bad, he instead celebrates the power of its opposite. Dividing this book into two parts, he first makes the case that in almost an', 'img_07012020011046.png'),
('BK-23200101', 'So Good They Can\'t Ignore You', 'Cal Newpork', 'In an unorthodox approach, Georgetown University professor Cal Newport debunks the long-held belief that &quot;follow your passion&quot; is good advice, and sets out on a quest to discover the reality of how people end up loving their careers.&lt;br&gt;\r\n\r\nNot only are pre-existing passions rare and have little to do with how most people end up loving their work, but a focus on passion over skill can be dangerous, leading to anxiety and chronic job hopping. Spending time with organic farmers, venture capitalists, screenwriters, freelance computer programmers, and others who admitted to deriving great satisfaction from their work, Newport uncovers the strategies they used and the pitfalls they avoided in developing their compelling careers.&lt;br&gt;\r\n\r\nCal reveals that matching your job to a pre-existing passion does not matter. Passion comes after you put in the hard work to become excellent at something valuable, not before. In other words, what you do for a living is much less impor', 'img_07012020012304.jpg'),
('BK-26200101', 'Hands-On Machine Learning with Scikit-Learn and Tensor Flow', 'AurÃˆlien GÃˆron ', 'Through a series of recent breakthroughs, deep learning has boosted the entire field of machine learning. Now, even programmers who know close to nothing about this technology can use simple, efficient tools to implement programs capable of learning from data. This practical book shows you how. By using concrete examples, minimal theory and two production-ready Python frameworks&oacute;scikit-learn and TensorFlow&oacute;author Aur&Egrave;lien G&Egrave;ron helps you gain an intuitive understanding of the concepts and tools for building intelligent systems. You&iacute;ll learn a range of techniques, starting with simple linear regression and progressing to deep neural networks. with exercises in each chapter to help you apply what you&iacute;ve learned, all you need is programming experience to get started.\r\nExplore the machine learning landscape, particularly neural nets Use scikit-learn to track an example machine-learning project end-to-end\r\n\r\nExplore several training models, includin', 'img_07012020012628.jpg'),
('BK-28200102', 'DATA STRUCTURES AND ALGORITHMS', 'Rudolph Russell ', 'This book is meant for anyone who  wants to learn how to write efficient programs and use the proper data structures and algorithm. In this book, you\'ll learn the basics of the C++ programming language and object-oriented design concepts. After that, you\'ll learn about the most important data structures, including linked lists, arrays, queues, and stacks. You will learn also learn about searching and sorting algorithms.&lt;br&gt;&lt;br&gt;\r\n\r\n\r\nThis book contains some illustrations and step-by-step explanations with bullet points and exercises for easy and enjoyable learning&lt;br&gt;\r\n\r\n\r\nBenefits of reading this book that you\'re not going to find anywhere else:&lt;br&gt;&lt;br&gt;\r\n\r\n\r\n\r\nIntroduction to C++&lt;br&gt;&lt;br&gt;\r\n\r\nC++ Data Types&lt;br&gt;\r\nControl Flow&lt;br&gt;\r\nFunctions&lt;br&gt;\r\nOverloading and Inlining&lt;br&gt;\r\nClasses&lt;br&gt;\r\nAccess Control&lt;br&gt;\r\nConstructors and Destructors&lt;br&gt;\r\nClasses and Memory Allocation&lt;br&gt;\r\nClass Friends and Class M', 'img_07012020142811.jpg'),
('BK-32200101', 'Introduction to Data Mining Paperback', 'Pang-Ning Tan, Michael Steinbach,  Vipin Kumar ', 'Introduction to Data Mining presents fundamental concepts and algorithms for those learning data mining for the first time. Each concept is explored thoroughly and supported with numerous examples.\r\nEach major topic is organized into two chapters, beginning with basic concepts that provide necessary background for understanding each data mining technique, followed by more advanced concepts and algorithms.&lt;br&gt;\r\n\r\nFeatures:\r\n1. Provides both theoretical and practical coverage of all data mining topics\r\n2. Includes extensive number of integrated examples and figures\r\n3. Offers instructor resources including solutions for exercises and complete set of lecture slides\r\n4. Assumes only a modest statistics or mathematics background without any requirement of database knowledge\r\n5. Important topics such as predictive modeling, association analysis, clustering, anomaly detection, visualization covered&lt;br&gt;\r\n\r\nContents:\r\nChapter 1 Introduction\r\nChapter 2 Data\r\nChapter 3 Exploring Data\r', 'img_07012020013255.jpg'),
('BK-40200101', 'Unlimited Memory', 'Kevin Horsley ', 'Kevin Horsley Broke a World Memory Record in 2013...&lt;br&gt;\r\n\r\nAnd You\'re About to Learn How to Use His Memory Strategies to Learn Faster, Be More Productive and Achieve More Success&lt;br&gt;\r\n\r\nWith over 300,000 copies sold, Unlimited Memory is a Wall Street Journal Best Seller and has been the #1 memory book on Amazon for more than two years. It has been translated into more than a dozen languages including French, Chinese, Russian, Korean, Ukrainian, and Lithuanian.&lt;br&gt;\r\n\r\nMost people never tap into 10% of their potential for memory.&lt;br&gt;\r\n\r\nIn this book, you\'re about to learn:&lt;br&gt;\r\n\r\nHow the World\'s Top Memory Experts Concentrate and Remember Any Information at Will, and How You Can Too&lt;br&gt;\r\n\r\nDo you ever feel like you\'re too busy, too stressed or just too distracted to concentrate and get work done?&lt;br&gt;\r\n\r\nIn Unlimited Memory, you\'ll learn how the world\'s best memory masters get themselves to concentrate at will, anytime they want. When you can eas', 'img_07012020014009.jpg');

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
(55, 'USER_200643102901', 'web43202309', 'this site is great', 'positive', '2020-06-23 23:18:22'),
(56, 'USER_200643102901', 'web43202309', 'i love shopping there', 'positive', '2020-06-23 23:49:32'),
(57, 'USER_2006593423', 'web43202309', 'they have poor service delivery', 'negative', '2020-06-23 23:50:03'),
(58, 'USER_2006593423', 'web43202309', 'i remember them that year', 'neutral', '2020-06-23 23:51:44'),
(59, 'USER_2006593423', 'web50202311', 'ok', 'neutral', '2020-06-24 00:03:16'),
(60, 'USER_2006593423', 'web50202311', 'fine', 'positive', '2020-06-24 00:03:34'),
(61, 'USER_2006593423', 'web50202311', 'bad', 'negative', '2020-06-24 00:04:06'),
(62, 'USER_2006593423', 'web50202311', 'its unfortunate', 'negative', '2020-06-24 00:09:10'),
(63, '', 'web43202309', ' great move', 'neutral', '2020-07-01 00:10:05'),
(64, '', 'web43202309', ' hhh', 'neutral', '2020-07-01 00:32:05'),
(65, '', 'web43202309', ' hmmmm', 'neutral', '2020-07-01 00:32:35'),
(66, '', 'web43202309', ' bad', 'negative', '2020-07-01 00:32:51'),
(67, '', 'web43202309', ' bad book', 'negative', '2020-07-01 00:33:10'),
(68, '', 'web43202309', ' THE BOOK IS NOT INTERESTING', 'positive', '2020-07-01 00:50:50'),
(69, '', 'web43202309', ' this book is soo soo boring, the last time i read i just slept off', 'negative', '2020-07-01 00:51:58'),
(70, '', 'web50202311', ' ok oo', 'neutral', '2020-07-01 00:53:48'),
(71, '', 'web50202311', ' cool book', 'neutral', '2020-07-01 00:54:13'),
(72, '', 'web50202311', ' great book', 'positive', '2020-07-01 00:54:38'),
(73, '', 'web50202311', ' nice book', 'positive', '2020-07-01 00:55:00'),
(74, '', 'web50202311', ' bad book', 'negative', '2020-07-01 00:55:17'),
(75, '', 'web50202311', 'http://localhost/BookReviewAnalysis/bookanalysis?u=d2ViNTAyMDIzMTE=', 'neutral', '2020-07-01 00:55:59'),
(76, '', 'web50202311', ' good', 'positive', '2020-07-01 00:56:23'),
(77, '', 'BK-10200101', ' this is a great book', 'positive', '2020-07-01 01:12:10'),
(78, 'admin', 'BK-23200101', ' cool', 'neutral', '2020-07-07 13:20:41');

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

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `fullname`, `email`, `title`, `message`, `date`, `status`) VALUES
(113, 'Doe', 'josiahdassnj@gmail.com', 'Gods favour', 'kjhkjdskjds', '2020-06-23 14:36:31', 'NO');

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
('admin', 'admin@admin.com', 'admin', 'admin'),
('USER_200643102901', 'johndoe@gmail.com', '1234', 'user'),
('USER_200644042901', 'rose@gmail.com', '1234', 'user');

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
('USER_200644042901', 'Jonathan', 'Rose', 'peters', 'female', 'rose@gmail.com');

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
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
