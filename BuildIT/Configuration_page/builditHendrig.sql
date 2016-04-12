-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2016 at 10:31 PM
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
(1, 'Open the door', '  action:\r\n    entity_id: switch.door\r\n    service: switch.turn_on\r\n  '),
(2, 'Close the door', '  action:\r\n    entity_id: switch.door\r\n    service: switch.turn_off'),
(3, 'Turn on fan', '  action:\r\n    entity_id: switch.fan\r\n    service: switch.turn_on'),
(4, 'Turn off fan', '  action:\r\n    entity_id: switch.fan\r\n    service: switch.turn_off'),
(5, 'Turn Peltier on', '  action:\r\n    entity_id: switch.peltier\r\n    service: switch.turn_on'),
(6, 'Open the curtains', '  action:\r\n    entity_id: switch.curtain\r\n    service: switch.turn_on'),
(7, 'Turn Peltier off', '  action:\r\n    entity_id: switch.peltier\r\n    service: switch.turn_off'),
(8, 'Close the curtains', '  action:\r\n    entity_id: switch.curtain\r\n    service: switch.turn_off'),
(9, 'Turn bedroom LED off', '  action:\r\n    entity_id: switch.bedroom_led\r\n    service: switch.turn_off'),
(10, 'Turn bedroom LED on', '  action:\r\n    entity_id: switch.bedroom_led\r\n    service: switch.turn_on'),
(11, 'Turn corner LED on', '  action:\r\n    entity_id: switch.corner_led\r\n    service: switch.turn_on'),
(12, 'Turn corner LED off', '  action:\r\n    entity_id: switch.corner_led\r\n    service: switch.turn_off'),
(13, 'Turn kitchen LED on', '  action:\r\n    entity_id: switch.kitchen_led\r\n    service: switch.turn_on'),
(14, 'Turn kitchen LED off', '  action:\r\n    entity_id: switch.kitchen_led\r\n    service: switch.turn_off'),
(15, 'Turn outside LED on', '  action:\r\n    entity_id: switch.outside_led\r\n    service: switch.turn_on'),
(16, 'Turn outside LED off', '  action:\r\n    entity_id: switch.outside_led\r\n    service: switch.turn_off');

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
(1, 'Alias 1', 2, 4),
(2, 'Alias 2', 4, 5),
(3, 'Alias 3', 0, 0),
(4, 'Alias 4', 0, 0),
(5, 'Alias 5', 0, 0),
(6, 'Alias 6', 0, 0),
(7, 'Alias 7', 0, 0),
(8, 'Alias 8', 0, 0),
(9, 'Alias 9', 0, 0),
(10, 'Alias 10', 0, 0),
(11, 'Alias 11', 0, 0),
(12, 'Alias 12', 0, 0),
(13, 'Alias 13', 0, 0),
(14, 'Alias 14', 0, 0),
(15, 'Alias 15', 0, 0);

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
(1, 'PIR Lobby on', '  trigger:\r\n    platform: state\r\n    entity_id: binary_sensor.pir_lobby\r\n    # Optional\r\n    from: ''off''\r\n    to: ''on'''),
(2, 'PIR lobby off', '  trigger:\r\n    platform: state\r\n    entity_id: binary_sensor.pir_lobby\r\n    # Optional\r\n    from: ''on''\r\n    to: ''off'''),
(3, 'PIR kitchen on', '  trigger:\r\n    platform: state\r\n    entity_id: binary_sensor.pir_kitchen\r\n    from: ''off''\r\n    to: ''on'''),
(4, 'PIR kitchen off', '  trigger:\r\n    platform: state\r\n    entity_id: binary_sensor.pir_kitchen\r\n    from: ''on''\r\n    to: ''off'''),
(5, 'PIR corner on', '  trigger:\r\n    platform: state\r\n    entity_id: binary_sensor.pir_corner\r\n    from: ''off''\r\n    to: ''on'''),
(6, 'PIR corner off', '  trigger:\r\n    platform: state\r\n    entity_id: binary_sensor.pir_corner\r\n    from: ''on''\r\n    to: ''off'''),
(7, 'Temperature above 10C', '  trigger:\r\n    platform: numeric_state\r\n    entity_id: command_sensor.temperature\r\n    above: 10'),
(8, 'Temperature below 10C', '  trigger:\r\n    platform: numeric_state\r\n    entity_id: command_sensor.temperature\r\n    below: 10'),
(9, 'Temperature above 20C', '  trigger:\r\n    platform: numeric_state\r\n    entity_id: command_sensor.temperature\r\n    above: 20'),
(10, 'Temperature below 20C', '  trigger:\r\n    platform: numeric_state\r\n    entity_id: command_sensor.temperature\r\n    below: 20'),
(11, 'Humidity below 20%', '  trigger:\r\n    platform: numeric_state\r\n    entity_id: command_sensor.humidity\r\n    below: 20'),
(12, 'Humidity above 20%', '  trigger:\r\n    platform: numeric_state\r\n    entity_id: command_sensor.humidity\r\n    above: 20'),
(13, 'Humidity above 50%', '  trigger:\r\n    platform: numeric_state\r\n    entity_id: command_sensor.humidity\r\n    above: 50'),
(14, 'Humidity below 50%', '  trigger:\r\n    platform: numeric_state\r\n    entity_id: command_sensor.humidity\r\n    below: 50'),
(15, 'RFID positive', '  trigger:\r\n    platform: numeric_state\r\n    entity_id: command_sensor.RFID\r\n    above: 0');

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
