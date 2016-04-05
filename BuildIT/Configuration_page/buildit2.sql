-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2016 at 04:06 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buildit2`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `data` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `name`, `data`) VALUES
(1, 'turn lobby led on', '  action:\r\n    entity_id: switch.lobby_led\r\n    service: switch.turn_on');

-- --------------------------------------------------------

--
-- Table structure for table `alias`
--

CREATE TABLE `alias` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `triger_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alias`
--

INSERT INTO `alias` (`id`, `name`, `triger_id`, `action_id`) VALUES
(1, 'Turn on lobby LED', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `triger`
--

CREATE TABLE `triger` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `data` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `triger`
--

INSERT INTO `triger` (`id`, `name`, `data`) VALUES
(1, 'PIR Lobby on', 'trigger:\r\n    platform: state\r\n    entity_id: binary_sensor.pir_lobby\r\n    # Optional\r\n    from: ''off''\r\n    to: ''on''');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alias`
--
ALTER TABLE `alias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `triger`
--
ALTER TABLE `triger`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
