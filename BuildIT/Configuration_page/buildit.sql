-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2016 at 11:43 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buildit`
--

-- --------------------------------------------------------

--
-- Table structure for table `aliases`
--

CREATE TABLE `aliases` (
  `alias_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `automation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `automations`
--

CREATE TABLE `automations` (
  `automation_id` int(11) NOT NULL,
  `specific_conditions_id` int(11) NOT NULL,
  `triger_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `device_id` int(10) NOT NULL,
  `device_name` varchar(300) NOT NULL,
  `device_entity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`device_id`, `device_name`, `device_entity`) VALUES
(1, 'temperature', 'entity_id: sensor.temperature_sensor'),
(2, 'movement corner', 'entity_id: binary_sensor.pir_corner'),
(3, 'LED corner', 'entity_id: switch.corner_led'),
(4, 'LED bedroom', ' entity_id: switch.bedroom_LED'),
(5, 'peltier', ' entity_id: switch.peltier_control'),
(6, 'light sensor', ' entity_id: sensor.photoresistor '),
(7, 'window curtain', ' entity_id: switch.curtain'),
(8, 'movement lobby', ' entity_id: binary_sensor.pir_lobby'),
(9, 'movement kitchen', ' entity_id: binary_sensor.pir_kitchen'),
(10, 'LED lobby', ' entity_id: switch.lobby_LED'),
(11, 'LED kithcen', ' entity_id: switch.kitchen_LED'),
(12, 'fan', ' entity_id: switch.fan'),
(13, 'door', ' entity_id: switch.door'),
(14, 'humidity', 'entity_id: sensor.humidity_sensor');

-- --------------------------------------------------------

--
-- Table structure for table `specific_conditions`
--

CREATE TABLE `specific_conditions` (
  `specific_conditions_id` int(11) NOT NULL,
  `condition_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aliases`
--
ALTER TABLE `aliases`
  ADD PRIMARY KEY (`alias_id`);

--
-- Indexes for table `automations`
--
ALTER TABLE `automations`
  ADD PRIMARY KEY (`automation_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `specific_conditions`
--
ALTER TABLE `specific_conditions`
  ADD PRIMARY KEY (`specific_conditions_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aliases`
--
ALTER TABLE `aliases`
  MODIFY `alias_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `automations`
--
ALTER TABLE `automations`
  MODIFY `automation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `specific_conditions`
--
ALTER TABLE `specific_conditions`
  MODIFY `specific_conditions_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
