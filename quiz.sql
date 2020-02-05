-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 10:53 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `answer1` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `answer2` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `answer3` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `answer4` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `correct` int(2) NOT NULL,
  `type` varchar(10) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct`, `type`) VALUES
(1, 'Which ocean lies on the east coast of the United States?', 'Atlantic', 'Pacific', 'Indian', 'Eastern', 2, 'geo'),
(2, 'Which is the world\'s highest mountain?', 'K2', 'Kilimanjaro', 'Mount Everest', 'Makalu', 4, 'geo'),
(3, 'How many Great Lakes are there?', '5', '6', '7', '3', 2, 'geo'),
(4, 'Which is the longest river in the U.S.?', 'Yukon River', 'Colorado River', 'Mississipy River', 'Missoury River', 5, 'geo'),
(5, 'The United Kingdom is comprised of how many countries?', '6', '5', '4', '8', 4, 'geo'),
(6, 'Which is the largest city in the world?', 'New York', 'Mexico City', 'Bejing', 'Tokio', 3, 'geo'),
(7, 'How many stars on the USA flag are there?', '50', '49', '52', '51', 2, 'geo'),
(8, 'Two triangles with equal sides are considered _____________.', 'Similar', 'Congruent', 'Isosceles', 'Equilateral', 3, 'math'),
(9, 'Two angles whose measures have a sum of 180 degrees are called ___________.', 'Supplimentary', 'Acute', 'Right', 'Complimentary', 2, 'math'),
(10, 'A triangle has a total of how many degrees?', '90', '180', '360', '540', 3, 'math'),
(11, 'What\'s the next number in the squence?\r\n2,4,9,11,16...', '18', '21', '23', '19', 2, 'math'),
(12, 'What was the first country to give women the vote in 1893?', 'America', 'Australia', 'New Zealand', 'Iceland', 4, 'history'),
(13, 'What year did the Berlin Wall fall?', '1988', '1994', '1991', '1989', 5, 'history'),
(14, 'Who was Garibaldi?', 'A famous Italian painter', 'A famous Italian soldier', 'A famous Italian chef', 'A famous Italian monk', 3, 'history'),
(15, 'Who was said to be so beautiful that her face launched a thousand ships?', 'Helen', 'Cleopatra', 'Nefertiti', 'Salome', 2, 'history'),
(16, 'Which British monarch popularized the Homgburg which came from the German town of the same name?', 'Louis XIV', 'Edward VII', 'Edward V', 'Winston Churchill', 3, 'history'),
(17, 'In which country was the Angel of the North erected in 1998?', 'Italy', 'France', 'England', 'Finland', 4, 'history'),
(18, 'Which football player won the most Ballon d\'Or', 'Cristiano Ronaldo', 'Ronaldinho', 'Lionel Messi', 'Sasa Ilic', 4, 'sport'),
(19, 'Which is the highest-paid athletes of modern times with 1.85 billion dollars?', 'Michael Schumacher', 'David Beckham', 'Tiger Woods', 'Michael Jordan', 5, 'sport'),
(20, 'As of january 2020, who is the world no. 1 tennis player?', 'Viktor Troicki', 'Novak Djokovic', 'Rafael Nadal', 'Roger Federer', 4, 'sport'),
(21, 'Which country does Milos Raonic represent in tennis?', 'Serbia', 'Montenegro', 'USA', 'Canada', 5, 'sport'),
(22, 'How many olympic medals did Usain Bolt win?', '4', '7', '8', '12', 4, 'sport'),
(23, 'How many olympic medals did Michael Phelps win?', '22', '28', '31', '25', 3, 'sport'),
(24, 'In which year did Maradona score a goal with his hand?', '1986', '1990', '1982', '1978', 2, 'sport'),
(25, 'In which city will the 2020 Olypmics be held?', 'Los Angeles', 'Barcelona', 'Belgrade', 'Tokyo', 5, 'sport'),
(26, 'In which country were the first Olympic Games held?', 'Greece', 'Serbia', 'Angola', 'England', 2, 'sport'),
(27, 'How many players has a hockey team got on the ice?', '5', '6', '4', '8', 3, 'sport'),
(28, 'What\'s the well known name for a painting on a freshly plastered wall?', 'Watercolor', 'Aquarelle', 'Fresco', 'Pastel', 3, 'art'),
(29, 'Which artist painted the Poppy Field in 1873?', 'Paul Cezanne ', 'Jan Vermeer ', 'Raphael ', 'Claude Monet', 5, 'art'),
(30, 'What is the meaning of the art term impasto?', 'Oily paint', 'Thickly applied paint', 'Watery paint', 'Transparent paint', 3, 'art'),
(31, 'What are the three drooping objects in The Persistence of Memory by Salvador Dalí?', 'Shoes', 'Telephones', 'Clocks', 'Ants', 4, 'art'),
(32, 'Which arts\' movement was founded by Pablo Picasso and Georges Braque?', 'Cubism', 'Surrealism', 'Impressionism', 'Art Nouveau', 2, 'art'),
(33, 'Complete the Van Gogh painting title: \'Starry Night Over the ...\'?', 'Sky', 'Rhone', 'Month', 'Winter', 3, 'art'),
(34, 'When did the Chetnobyl nuclear catastrophe occur?', '1963', '1986', '1982', '1974', 3, 'history'),
(35, 'What river runs through Baghdad?', 'Karun', 'Jordan', 'Euphrates', 'Tigris', 5, 'geo'),
(36, 'What percentage of the River Nile is located in Egypt?', '83%', '22%', '100%', '5%', 3, 'geo'),
(37, 'What is the largest country on the Arabian Peninsula?', 'Jordan', 'Yemen', 'Saudi Arabia', 'United Arab Emirates', 4, 'geo'),
(38, 'What city is the capital of Australia?', 'Meblbourne', 'Sydney', 'Perth', 'Canberra', 5, 'geo'),
(39, 'Riyadh is the capital of what Middle-Eastern country?', 'Saudi Arabia', 'Syria', 'Yemen', 'Iraq', 2, 'geo'),
(40, 'Which two countries are currently fighting in the so called \'Middle East Cold War\'?', 'Iran and Syria', 'Iran and Saudi Arabia', 'Israel and Palestine', 'Lebanon and Jordan', 3, 'geo'),
(41, 'How tall is Avala mountain?', '634', '576', '480', '511', 5, 'geo'),
(42, 'Who is credited as the designer of the many statues which decorated the Parthenon?', 'Phidias', 'Praxiteles', 'Scopas', 'Hesiod', 2, 'art'),
(43, 'Which artist started painting at 27 and died at 37?', 'Pablo Picasso', 'Van Gogh', 'Da Vinci', 'Rembrant', 3, 'art'),
(44, 'Which one of the following pieces belongs to Marina Abramovic?', 'The Artist Is Present', 'The Scream', 'The Artist is Still', 'The Torture Room', 2, 'art'),
(45, 'How many paintings did Vincent Van Gogh sell during his lifetime?', '842', '27', '193', '1', 5, 'art'),
(46, 'Which of the following paintings were most expensively sold? ', 'Salvator Mundi', 'Interchange', 'Vase with Fifteen Sunflowers', 'The Anatomy Lesson of Dr. Nicolaes Tulp', 2, 'art'),
(47, 'How many versions of The Scream did Edvard Munch create?', '1', '3', '5', '7', 4, 'art');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `score_general` int(10) NOT NULL,
  `score_geo` int(10) NOT NULL,
  `score_math` int(11) NOT NULL,
  `score_history` int(11) NOT NULL,
  `score_art` int(11) NOT NULL,
  `score_sport` int(11) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `score_general`, `score_geo`, `score_math`, `score_history`, `score_art`, `score_sport`, `admin`) VALUES
(1, 'lalkec98', '32d191af04ae51cd439393c6e0b105ea', 'lalkec@gmail.com', 0, 0, 0, 0, 0, 0, 0),
(2, 'milanb', '4782be09056c6dc8abd5361645df5ed8', 'milan.brkic1998@gmail.com', 0, 0, 0, 0, 0, 0, 1),
(3, 'coma', 'b6468988dd7409dc15950491b1fef37c', 'comacomic@gmail.com', 0, 0, 0, 0, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
