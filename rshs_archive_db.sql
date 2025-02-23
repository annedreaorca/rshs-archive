-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2025 at 08:33 PM
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
-- Database: `rshs_archive_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowed_admins`
--

CREATE TABLE `allowed_admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allowed_admins`
--

INSERT INTO `allowed_admins` (`id`, `email`) VALUES
(11, '202110045@gordoncollege.edu.ph'),
(10, '202110064@gordoncollege.edu.ph'),
(12, '202110209@gordoncollege.edu.ph'),
(4, 'aguilarlyorhick@gmail.com'),
(3, 'andradejp182@gmail.com'),
(7, 'austinjames.dilioc20@gmail.com'),
(9, 'balmoresxander@gmail.com'),
(2, 'chrissuyom235@gmail.com'),
(8, 'fpsmallari@gmail.com'),
(6, 'jrucho.19@gmail.com'),
(5, 'kresiadeyabastillas@gmail.com'),
(1, 'nuhjnalrobanal@gmail.com ');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_items`
--

CREATE TABLE `borrowed_items` (
  `b_item_id` int(11) NOT NULL,
  `lrn_or_email` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date_borrowed` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `approval_date` datetime DEFAULT NULL,
  `denied_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_equipments`
--

CREATE TABLE `lab_equipments` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `file_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `temp_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `item_status` varchar(255) NOT NULL,
  `total_available` int(11) NOT NULL,
  `is_archived` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_equipments`
--

INSERT INTO `lab_equipments` (`item_id`, `item_name`, `item_description`, `uploader`, `file_name`, `temp_name`, `item_status`, `total_available`, `is_archived`) VALUES
(1, 'AC/DC Adapter', 'A device that converts alternating curent from a wall outlet into direct current.', 'Admin', 'AC_DC Adapter.jpg', 'AC_DC Adapter.jpg', 'Available', 14, 0),
(2, 'Acceleration Recording Timer', 'Demonstrates increase in velocity and precisely calculate acceleration, drag and friction by measuring the interval between a series of dots. ', 'Admin', 'Acceleration Recording Timer.jpg', 'Acceleration Recording Timer.jpg', 'Available', 12, 0),
(3, 'Acetate Film Projector', 'A device that projects an enlarged image onto a screen.', 'Admin', '', '', 'Available', 2, 0),
(4, 'Acid Burette ', 'A long glass tube with markings on it for accurate measurement and dispense liquid.', 'Admin', 'Acid Burette.avif', 'Acid Burette.avif', 'Available', 8, 0),
(5, 'Acrylic Contianer', 'Clear and durable storage boxes that are used for storage and displays.', 'Admin', 'Acrilyc Container.webp', 'Acrilyc Container.webp', 'Available', 1, 0),
(6, 'Advanced Electromagnetism Kit', 'A kit designed to introduce and educate users about the principles of electromagnetism.', 'Admin', 'ADVANCED ELECTROMAGNETIX KIT.JPG', 'ADVANCED ELECTROMAGNETIX KIT.JPG', 'Available', 7, 0),
(7, 'Airflow Box', '', 'Admin', 'Airflow Box.webp', 'Airflow Box.webp', 'Available', 2, 0),
(8, 'Alcohol Lamp', 'Used for heating, sterilization, and combustion that uses alchool as fuel.', 'Admin', 'Alcohol Lamp.jpg', 'Alcohol Lamp.jpg', 'Available', 8, 0),
(9, 'Aluminum (Different Volumes)', 'Demonstrating different densities of aluminum.', 'Admin', 'Aluminum (Different Volumes).webp', 'Aluminum (Different Volumes).webp', 'Available', 12, 0),
(10, 'Aluminum Foil', 'Used in the laboratory for covering equipments such as bottles and tubes', 'Admin', 'Aluminum Foil.jpg', 'Aluminum Foil.jpg', 'Available', 2, 0),
(11, 'Aluminum Rod', 'Used as sample holders, reaction vessels, or support structures.', 'Admin', 'Aluminum Rod.jpg', 'Aluminum Rod.jpg', 'Available', 4, 0),
(12, 'Analog Multimeter (Model YX-1000A)', 'Has an analog display that uses the deflection of a pointer on the scale to indicate the level of measurement of such like voltage, current, and resistance', 'Admin', 'Analog Multimeter (Model YX-1000A).jpg', 'Analog Multimeter (Model YX-1000A).jpg', 'Available', 8, 0),
(13, 'Anemometer Logger Sensor', 'A device that measues the wind speed.', 'Admin', 'Anemometer Logger Sensor.webp', 'Anemometer Logger Sensor.webp', 'Available', 1, 0),
(14, 'Aneroid Barometer', 'A weather instrument that measures air pressure using a sealed metal chambled that expands and contracts', 'Admin', 'Aneroid Barometer.jpg', 'Aneroid Barometer.jpg', 'Available', 4, 0),
(15, 'Aneroid Barometer (Wall type)', 'Also a weather instrument that measures air pressure but is a wall type', 'Admin', 'Aneroid Barometer (Wall Type).webp', 'Aneroid Barometer (Wall Type).webp', 'Available', 1, 0),
(16, 'Archimedes Set-up', 'A container with water, spring balance, and a solid object for calculati ng the volume of an object with irregular shape.', 'Admin', 'Archimedes Set-up.jpg', 'Archimedes Set-up.jpg', 'Available', 1, 0),
(17, 'Balance Balls', 'Swinging balls that collide with each other that demonstrates the conservation of momentum and energy.', 'Admin', 'Balance Balls.jpg', 'Balance Balls.jpg', 'Available', 6, 0),
(18, 'Bar Magnet', 'Ferromagnetic object that attracts material like iron and certain steel.', 'Admin', 'Bar Magnet.jpg', 'Bar Magnet.jpg', 'Available', 5, 0),
(19, 'Bar Magnet (Mini)', 'Ferromagnetic object that attracts material like iron and certain steel.', 'Admin', 'Bar Magnet (Mini).avif', 'Bar Magnet (Mini).avif', 'Available', 1, 0),
(20, 'Bar Magnet (Mini, Thick)', 'Ferromagnetic object that attracts material like iron and certain steel.', 'Admin', 'Bar Magnet (Mini,Thick).webp', 'Bar Magnet (Mini,Thick).webp', 'Available', 1, 0),
(21, 'Barometer Logger Sensor', 'Device that can measure the atmospheric pressure and record the data.', 'Admin', 'barometer logger sensor.JPG', 'barometer logger sensor.JPG', 'Available', 1, 0),
(22, 'Basic Electronics Kit', 'A collection of electrical parts that can be used to build electronic devices.', 'Admin', 'Basic Electronics Kit.webp', 'Basic Electronics Kit.webp', 'Available', 8, 0),
(23, 'Battery Holder', 'Keeps cells securely fixed in place while providing power for an application.', 'Admin', 'Battery Holder(1).jpg', 'Battery Holder(1).jpg', 'Available', 20, 0),
(24, 'Battery Module', 'A combination of multiple battery cells that provide higher voltage and capacity', 'Admin', 'Battery Module.avif', 'Battery Module.avif', 'Available', 1, 0),
(25, 'Batteries (AA)', 'A device that stores chemical energy and converts it to electrical energy.', 'Admin', '', '', 'Available', 3, 0),
(26, 'Battery Holder (with Selector)', 'A device for holding and managing batteries with a selector switch to control the power source for experiments', 'Admin', '', '', 'Available', 22, 0),
(27, 'Beaker (Plastic, 500 mL)', 'A 500 mL plastic container used to hold liquids in lab experiments.', 'Admin', '', '', 'Available', 4, 0),
(28, 'Beaker (Pyrex, 100 mL) ', 'A 100 mL heat-resistant glass beaker for precise measurements of liquids in chemical experiments.', 'Admin', 'Beaker (Pyrex, 100 mL).webp', 'Beaker (Pyrex, 100 mL).webp', 'Available', 13, 0),
(29, 'Beaker (Pyrex, 1000 mL)', 'A 1000 mL glass beaker, often used for mixing larger volumes of substances in lab setups.', 'Admin', 'Beaker (Pyrex, 1000 mL).webp', 'Beaker (Pyrex, 1000 mL).webp', 'Available', 1, 0),
(30, 'Beaker (Pyrex, 200 mL)', 'A 200 mL glass beaker, perfect for smaller liquid quantities in chemical tests.', 'Admin', 'Beaker (Pyrex, 200 mL).webp', 'Beaker (Pyrex, 200 mL).webp', 'Available', 1, 0),
(31, 'Beaker (Pyrex, 400 mL)', 'A 400 mL Pyrex glass beaker for holding and mixing liquids with moderate volumes.', 'Admin', 'Beaker (Pyrex, 400 mL).webp', 'Beaker (Pyrex, 400 mL).webp', 'Available', 1, 0),
(32, 'Beaker (Pyrex, 500 mL)', 'A 500 mL glass beaker, commonly used for holding and heating liquids in chemical labs.', 'Admin', 'Beaker (Pyrex, 500 mL).jpg', 'Beaker (Pyrex, 500 mL).jpg', 'Available', 13, 0),
(33, 'Blank Paper Discs (6 mm)', 'Small, 6 mm paper discs used in filtration or other scientific tests.', 'Admin', '', '', 'Available', 1, 0),
(34, 'Boiling flask (1000 mL)', 'A 1000 mL round-bottom flask used for boiling liquids in laboratory distillation or heating processes.', 'Admin', 'Boiling Flask (1000 mL).jpg', 'Boiling Flask (1000 mL).jpg', 'Available', 1, 0),
(35, 'Boiling flask (250 mL)', 'A smaller 250 mL round-bottom flask for heating or boiling smaller amounts of liquids.', 'Admin', 'Boiling Flask (250 mL).jpg', 'Boiling Flask (250 mL).jpg', 'Available', 10, 0),
(36, 'Boiling flask (500 mL)', 'A 500 mL round-bottom flask ideal for medium-sized boiling or distillation procedures.', 'Admin', 'Boiling Flask (500 mL).jpg', 'Boiling Flask (500 mL).jpg', 'Available', 4, 0),
(37, 'Bong (2h)', 'An apparatus used in chemical processes involving vaporization or filtration.', 'Admin', 'Bong (2h).HEIC', 'Bong (2h).HEIC', 'Available', 1, 0),
(38, 'Bong (3h)', 'An apparatus used in chemical processes involving vaporization or filtration of larger volume.', 'Admin', 'Bong (3h).HEIC', 'Bong (3h).HEIC', 'Available', 1, 0),
(39, 'Borosilicate Glass (10 mL)', 'A 10 mL glass container made from borosilicate material, used for precise measurements and resistant to thermal shock.', 'Admin', '', '', 'Available', 67, 0),
(40, 'Borosilicate Glass (100 mL)', 'A 100 mL borosilicate glass container used for chemical mixing or measurement.', 'Admin', '', '', 'Available', 29, 0),
(41, 'Bulbous Glass Apparatus ', 'A glass device with a bulbous shape, typically used in distillation or other chemical processes.', 'Admin', 'Bulbous Apparatus.HEIC', 'Bulbous Apparatus.HEIC', 'Available', 1, 0),
(42, 'Bunsen Burner', 'A laboratory burner used to create a controlled flame for heating or sterilizing substances.', 'Admin', 'Bunsen Burner.webp', 'Bunsen Burner.webp', 'Available', 8, 0),
(43, 'Burette Glass with Rotaflow Stopclock (Class B)', 'A precision glass burette with a rotating stopcock, used for titration and controlled liquid dispensing.', 'Admin', 'Burette Glass with Rotaflow Stopclock (Class B).webp', 'Burette Glass with Rotaflow Stopclock (Class B).webp', 'Available', 16, 0),
(44, 'Calorimeter (Big)', 'A large device used to measure the heat of chemical reactions, typically in combustion or thermodynamics experiments.', 'Admin', 'Calorimeter (Big).JPG', 'Calorimeter (Big).JPG', 'Available', 16, 0),
(45, 'Calorimeter (Small)', 'A smaller version of a calorimeter, designed for more contained and smaller-scale reactions.', 'Admin', 'Calorimeter (Small).JPG', 'Calorimeter (Small).JPG', 'Available', 12, 0),
(46, 'Candles', 'Used for lighting or generating heat in experiments.', 'Admin', 'Candle.webp', 'Candle.webp', 'Available', 2, 0),
(47, 'Cap', 'A covering or stopper used for sealing containers, such as beakers or flasks, during experiments.', 'Admin', 'CAP.HEIC', 'CAP.HEIC', 'Available', 1, 0),
(48, 'Celestron Travel Scope', 'A portable telescope for observing distant objects, often used in astronomy-related experiments.', 'Admin', 'Celestron Travel Scope.webp', 'Celestron Travel Scope.webp', 'Available', 1, 0),
(49, 'Chemistry Lecture Demonstration Series B', 'A series of chemistry demonstrations or educational tools for lectures and experiments.', 'Admin', 'Chemistry lecture demonstration series C.JPG', 'Chemistry lecture demonstration series C.JPG', 'Available', 1, 0),
(50, 'Chemistry Lecture Demonstration Series C', 'Another series of demonstrations for teaching chemistry concepts in a lab or classroom setting.', 'Admin', 'chemistry lecture demonstrations series B.JPG', 'chemistry lecture demonstrations series B.JPG', 'Available', 1, 0),
(51, 'Co2 Logger Sensor', 'A sensor used to monitor and log carbon dioxide levels in an environment.', 'Admin', 'co2 logger sensor.PNG', 'co2 logger sensor.PNG', 'Available', 1, 0),
(52, 'Compact Telescope', 'A smaller, portable telescope used for observation, often in astronomy or outdoor settings.', 'Admin', 'Compact Telescope.webp', 'Compact Telescope.webp', 'Available', 2, 0),
(53, 'Compass', 'A device used for navigation or measuring direction in experiments requiring orientation.', 'Admin', 'Compass.JPG', 'Compass.JPG', 'Available', 6, 0),
(54, 'Condenser', 'A laboratory apparatus used to cool and condense vapors back into liquids, often used in distillation.', 'Admin', 'Condenser.webp', 'Condenser.webp', 'Available', 9, 0),
(55, 'Conductivity Logger Sensor', 'A sensor that measures the electrical conductivity of a solution, used in various chemistry and environmental tests.', 'Admin', 'conductivity logger sensor.png', 'conductivity logger sensor.png', 'Available', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `lrn_or_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `is_archived` int(11) NOT NULL,
  `access_level` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowed_admins`
--
ALTER TABLE `allowed_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `borrowed_items`
--
ALTER TABLE `borrowed_items`
  ADD PRIMARY KEY (`b_item_id`);

--
-- Indexes for table `lab_equipments`
--
ALTER TABLE `lab_equipments`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `student_id` (`lrn_or_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowed_admins`
--
ALTER TABLE `allowed_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `borrowed_items`
--
ALTER TABLE `borrowed_items`
  MODIFY `b_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_equipments`
--
ALTER TABLE `lab_equipments`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
