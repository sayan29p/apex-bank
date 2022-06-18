-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 11:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apex bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `SNO` int(5) NOT NULL,
  `ACC_NO` int(11) NOT NULL,
  `ACC_BAL` int(23) NOT NULL,
  `ACC_TYPE` char(11) NOT NULL,
  `CUS_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`SNO`, `ACC_NO`, `ACC_BAL`, `ACC_TYPE`, `CUS_FK`) VALUES
(35, 2222, 0, 'SAVING', 2222),
(32, 11111, 0, 'SAVING', 123),
(33, 12333, 0, 'CURRENT', 154),
(34, 5897436, 0, 'CURRENT', 1254);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `SNO` int(5) NOT NULL,
  `ADMIN_ID` int(11) NOT NULL,
  `ADMIN_NAME` char(23) NOT NULL,
  `ADMIN_EMAIL` varchar(32) NOT NULL,
  `ADMIN_PASS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`SNO`, `ADMIN_ID`, `ADMIN_NAME`, `ADMIN_EMAIL`, `ADMIN_PASS`) VALUES
(1, 1234, 'admiin', 'asddddddddddddddddddd', 123);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CUS_ID` int(4) NOT NULL,
  `CUS_PASS` varchar(23) NOT NULL,
  `CUS_NAME` char(20) NOT NULL,
  `CUS_EMAIL` varchar(32) NOT NULL,
  `CUS_ADD` varchar(112) NOT NULL,
  `CUS_MOBILE` bigint(10) NOT NULL,
  `ACC_NO` int(12) NOT NULL,
  `DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `APPROVE` varchar(2) NOT NULL,
  `PAN_NO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CUS_ID`, `CUS_PASS`, `CUS_NAME`, `CUS_EMAIL`, `CUS_ADD`, `CUS_MOBILE`, `ACC_NO`, `DATE`, `APPROVE`, `PAN_NO`) VALUES
(123, '123', 'KINSUK PRADHAN', 'sayan29p@gmail.com', 'PARITOSH ABSAN FLAT-A/102, AMBIKA KUNDU BYE LANE ,RAMRAJATALA', 9433041174, 11111, '2022-06-11 21:32:59', 'Y', 123456789),
(154, '123', 'KINSUK PRADHANDDDDDD', 'sayan29p@gmail.com', 'PARITOSH ABSAN FLAT-A/102, AMBIKA KUNDU BYE LANE ,RAMRAJATALA', 9433041174, 12333, '2022-06-11 20:47:23', 'Y', 123456789),
(1234, '1234', 'SAYAN PRADHAN', 'saan29p@gmail.com', 'asdasdnflslfjbfjbjn', 8697480820, 1234, '2022-06-10 11:01:47', 'N', 123456780),
(1254, '123', 'Nimai Shee', 'nimaishee@gmail.com', 'ahsaffljcsknflnlflknnflhfhenflhewfweneofn', 2147483647, 5897436, '2022-06-11 18:16:33', 'Y', 0),
(2222, '123', 'ZUBIN', 'ZUBIN@GMAIL.COM', 'DSASDGHUISDFGB K JVNVS=', 2147483647, 2222, '2022-06-15 11:41:25', 'Y', 0),
(3455, '123', 'DSFSDF', 'SDFSDGHHH', 'SDFGDGDHDHS', 2147483647, 3442, '2022-06-14 01:59:13', 'N', 0),
(12344, '123', 'KINSUK PRADHAN', 'sayan29p@gmail.com', 'PARITOSH ABSAN FLAT-A/102, AMBIKA KUNDU BYE LANE ,RAMRAJATALA', 2147483647, 123, '2022-06-11 20:44:52', 'N', 0),
(12345, '123', 'asd', 'saan29p@gmail.com', 'sadffcsdsdggsdgdsag', 869748082, 222, '2022-06-11 15:12:45', 'N', 0),
(14563, '123', 'KINSUK PRADHANCBZXC', 'sayan29p@gmail.com', 'PARITOSH ABSAN FLAT-A/102, AMBIKA KUNDU BYE LANE ,RAMRAJATALA', 2147483647, 54658, '2022-06-11 21:16:40', 'N', 0),
(86977, '123', 'XZCZXCZX', 'XZCZXCXZ', 'ZXCZXCZXC', 2147483647, 1254, '2022-06-11 21:19:25', 'N', 0),
(123456, '123', 'KINSUK PRADHAN', 'sayan29p@gmail.com', 'PARITOSH ABSAN FLAT-A/102, AMBIKA KUNDU BYE LANE ,RAMRAJATALA', 2147483647, 1234567, '2022-06-11 15:17:53', 'N', 0),
(123484, '123', 'VCJVJJVGHVKHV', 'sayan29p@gmail.com', 'PARITOSH ABSAN FLAT-A/102, AMBIKA KUNDU BYE LANE ,RAMRAJATALA', 2147483647, 23165161, '2022-06-11 19:09:44', 'N', 0),
(316649, '123', 'DCDCMDMCK', 'SKNSLA@GMAIL.COM', '\r\nIJSDJSFNSFNSNFSBAASBS', 178888888, 155666, '2022-06-11 20:05:52', 'N', 0),
(484335, '123', 'MSNLNFLS', 'DSFSJSF', 'SDNFONLGNLNOGDNGNDNFGONADNGNORGNEERHGHNGIDAP', 2147483647, 2147483647, '2022-06-11 19:08:52', 'N', 0),
(696969, '69', 'rony shee', 'RONYSHEE@GMAIL.COM', 'kolkata college street', 2147483647, 56975, '2022-06-11 15:19:18', 'N', 0),
(2147483647, '123', 'KINSUK PRADHANTTTTTT', 'sayan29p@gmail.com', 'PARITOSH ABSAN FLAT-A/102, AMBIKA KUNDU BYE LANE ,RAMRAJATALA', 2147483647, 25846, '2022-06-11 21:31:34', 'N', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trantab`
--

CREATE TABLE `trantab` (
  `TRAN_ID` int(4) NOT NULL,
  `TRAN_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `ACC_NO` int(10) NOT NULL,
  `TO_ACC` int(5) NOT NULL,
  `CR_AMT` int(11) NOT NULL,
  `DB_AMT` int(11) NOT NULL,
  `TRANS_DETAILS` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trantab`
--

INSERT INTO `trantab` (`TRAN_ID`, `TRAN_DATE`, `ACC_NO`, `TO_ACC`, `CR_AMT`, `DB_AMT`, `TRANS_DETAILS`) VALUES
(2, '2022-06-15 15:07:31', 123, 123, 1000, 0, 'cash recived'),
(3, '2022-06-15 15:08:33', 123, 123, 1000, 0, 'cash recived'),
(5, '2022-06-15 17:46:11', 11111, 11111, 1000, 0, 'cash received'),
(7, '2022-06-15 19:28:53', 11111, 11111, 500, 0, 'cash revied'),
(8, '2022-06-16 00:17:26', 11111, 11111, 1000, 0, 'cash recived'),
(34, '2022-06-17 13:01:25', 12333, 12333, 1000, 0, 'cash revied'),
(37, '2022-06-17 13:05:26', 12333, 11111, 0, 10, 'Payment towards loan'),
(38, '2022-06-17 13:05:26', 11111, 12333, 10, 0, 'CREDIT'),
(39, '2022-06-17 13:08:50', 11111, 123, 0, 10, 'Deposit'),
(40, '2022-06-17 13:08:50', 123, 11111, 10, 0, 'CREDIT'),
(41, '2022-06-18 00:37:44', 12333, 11111, 0, 10, 'Payment towards loan'),
(42, '2022-06-18 00:37:44', 11111, 12333, 10, 0, 'CREDIT'),
(43, '2022-06-18 00:55:23', 11111, 11111, 10, 0, 'cash received'),
(44, '2022-06-18 01:03:31', 12333, 12333, 10, 0, 'cash received');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ACC_NO`),
  ADD UNIQUE KEY `CUS_FK` (`CUS_FK`),
  ADD KEY `SNO` (`SNO`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`),
  ADD UNIQUE KEY `SNO` (`SNO`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CUS_ID`),
  ADD UNIQUE KEY `CUS_ID` (`CUS_ID`),
  ADD UNIQUE KEY `ACC_NO` (`ACC_NO`);

--
-- Indexes for table `trantab`
--
ALTER TABLE `trantab`
  ADD PRIMARY KEY (`TRAN_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `SNO` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `SNO` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trantab`
--
ALTER TABLE `trantab`
  MODIFY `TRAN_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`CUS_FK`) REFERENCES `customers` (`CUS_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
