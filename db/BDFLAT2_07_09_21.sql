-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2021 at 05:03 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BDFLAT2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ACC_BANK_TXN`
--

DROP TABLE IF EXISTS `ACC_BANK_TXN`;
CREATE TABLE IF NOT EXISTS `ACC_BANK_TXN` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `TXN_REF` varchar(200) DEFAULT NULL,
  `TXN_TYPE_IN_OUT` int(11) DEFAULT NULL,
  `TXN_DATE` date DEFAULT NULL,
  `AMOUNT_ACTUAL` float DEFAULT '0',
  `AMOUNT_BUFFER` float DEFAULT '0',
  `TXN_TYPE` int(11) DEFAULT NULL COMMENT '1=SEEKER, \r\n2=OWNER,\r\n3=AGENT,\r\n4=BANKSTATEMENT',
  `F_ACC_PAYMENT_BANK_NO` int(11) DEFAULT NULL,
  `F_CUSTOMER_NO` int(11) DEFAULT NULL,
  `F_BANK_RECONCILATION_NO` int(11) DEFAULT NULL,
  `F_CUSTOMER_PAYMENT_NO` int(11) DEFAULT NULL,
  `IS_MATCHED` tinyint(4) DEFAULT '0',
  `MATCHED_ON` datetime DEFAULT NULL,
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  `F_SS_COMPANY_NO` int(4) DEFAULT NULL,
  `IS_COD` int(1) DEFAULT '0',
  `PAYMENT_TYPE` int(1) DEFAULT '1' COMMENT '1=PAYMENT,2=REFUND',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ACC_CUSTOMER_PAYMENTS`
--

DROP TABLE IF EXISTS `ACC_CUSTOMER_PAYMENTS`;
CREATE TABLE IF NOT EXISTS `ACC_CUSTOMER_PAYMENTS` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `F_CUSTOMER_NO` int(11) DEFAULT NULL,
  `CUSTOMER_NO` int(11) DEFAULT NULL,
  `CUSTOMER_NAME` varchar(200) DEFAULT NULL,
  `AMOUNT` float DEFAULT '0',
  `F_ACC_PAYMENT_BANK_NO` int(10) DEFAULT NULL,
  `PAYMENT_BANK_NAME` varchar(40) DEFAULT NULL,
  `PAYMENT_ACCOUNT_NAME` varchar(40) DEFAULT NULL,
  `PAYMENT_BANK_ACC_NO` varchar(40) DEFAULT NULL,
  `PAYMENT_CONFIRMED_STATUS` int(11) DEFAULT NULL,
  `ATTACHMENT_PATH` varchar(200) DEFAULT NULL,
  `PAYMENT_NOTE` varchar(200) DEFAULT NULL,
  `SLIP_NUMBER` varchar(40) DEFAULT NULL,
  `PAYMENT_DATE` date DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `IS_COD` int(1) DEFAULT '0',
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  `F_SS_COMPANY_NO` int(4) DEFAULT NULL,
  `PAYMENT_TYPE` int(11) NOT NULL DEFAULT '1' COMMENT '1 = CUSTOMER PAYMENT, 2 = BONUS PAYMENT BY BDFLAT',
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `U_ACC_CUSTOMER_PAYMENTS` (`SLIP_NUMBER`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ACC_CUSTOMER_PAYMENTS`
--

INSERT INTO `ACC_CUSTOMER_PAYMENTS` (`PK_NO`, `CODE`, `F_CUSTOMER_NO`, `CUSTOMER_NO`, `CUSTOMER_NAME`, `AMOUNT`, `F_ACC_PAYMENT_BANK_NO`, `PAYMENT_BANK_NAME`, `PAYMENT_ACCOUNT_NAME`, `PAYMENT_BANK_ACC_NO`, `PAYMENT_CONFIRMED_STATUS`, `ATTACHMENT_PATH`, `PAYMENT_NOTE`, `SLIP_NUMBER`, `PAYMENT_DATE`, `IS_ACTIVE`, `IS_COD`, `F_SS_CREATED_BY`, `SS_CREATED_ON`, `F_SS_MODIFIED_BY`, `SS_MODIFIED_ON`, `F_SS_COMPANY_NO`, `PAYMENT_TYPE`) VALUES
(18, 1014, 14, 1001, 'Maidul Islam Babu', 100, 1, 'SSL', 'SSL', '101', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1),
(19, 1015, 14, 1001, 'Maidul Islam Babu', 120, 1, 'SSL', 'SSL', '101', NULL, NULL, 'test', '7854555', '2021-08-15', 1, 0, NULL, NULL, NULL, NULL, NULL, 1),
(20, 1016, 18, 1005, 'Maidul Islam', 15, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, '1233', '2021-08-18', 1, 0, 2, '2021-08-18 00:42:31', NULL, '2021-08-18 00:42:31', NULL, 2),
(21, 1017, 19, 1006, 'Anawar Landmark', 500, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, 'test', '789456', '2021-08-20', 1, 0, 2, '2021-08-20 01:03:29', NULL, '2021-08-20 01:03:29', NULL, 2),
(22, 1018, 19, 1006, 'Anawar Landmark', 50, 3, 'NRB', 'Admin', '122211', 1, 'uploads/attachments/19/611eabb59203b.jpg', 'test', '7899455', '2021-08-20', 1, 0, 2, '2021-08-20 01:06:29', NULL, '2021-08-20 01:06:29', NULL, 1),
(23, 1019, 19, 1006, 'Anawar Landmark', 10, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2021-08-20', 1, 0, 2, '2021-08-20 01:14:25', NULL, '2021-08-20 01:14:25', NULL, 2),
(24, 1020, 15, 1002, 'Maidul Islam Babu', 500, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2021-08-20', 1, 0, 2, '2021-08-20 01:16:17', NULL, '2021-08-20 01:16:17', NULL, 2),
(25, 1021, 40, 1027, 'M.S. Rana', 50, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, 'test', '123456', '2029-08-20', 1, 0, 2, '2021-08-29 01:48:26', NULL, '2021-08-29 01:48:26', NULL, 2),
(26, 1022, 40, 1027, 'M.S. Rana', 100, 2, 'CASH- Admin', 'CASH', '102', 1, 'uploads/attachments/40/612e850689f18.jpg', 'TEST', 'TEST', '2001-09-20', 1, 0, 2, '2021-09-01 01:37:42', NULL, '2021-09-01 01:37:42', NULL, 1),
(27, 1023, 13, 1000, 'maidul1', 100, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, 'TEST', '78945', '2001-09-20', 1, 0, 2, '2021-09-01 01:57:28', NULL, '2021-09-01 01:57:28', NULL, 2),
(29, 1024, 39, 1026, 'Dr. Fazle Rabbi', 500, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2001-09-20', 1, 0, 2, '2021-09-01 23:41:50', NULL, '2021-09-01 23:41:50', NULL, 2);

--
-- Triggers `ACC_CUSTOMER_PAYMENTS`
--
DROP TRIGGER IF EXISTS `AFTERT_ACC_CUSTOMER_PAYMENTS_INSERT`;
DELIMITER $$
CREATE TRIGGER `AFTERT_ACC_CUSTOMER_PAYMENTS_INSERT` AFTER INSERT ON `ACC_CUSTOMER_PAYMENTS` FOR EACH ROW BEGIN

DECLARE VAR_CODE INT(10) DEFAULT NULL;
DECLARE VAR_AMOUNT FLOAT DEFAULT 0;

SELECT IFNULL(MAX(CODE),1000) INTO VAR_CODE FROM ACC_CUSTOMER_TRANSACTION;

SET VAR_CODE = VAR_CODE+1;

SELECT IFNULL(SUM(AMOUNT),0) INTO VAR_AMOUNT FROM ACC_CUSTOMER_PAYMENTS WHERE F_CUSTOMER_NO = NEW.F_CUSTOMER_NO;

UPDATE WEB_USER SET ACTUAL_TOPUP = VAR_AMOUNT WHERE PK_NO = NEW.F_CUSTOMER_NO;

INSERT INTO ACC_CUSTOMER_TRANSACTION 
(CODE, F_CUSTOMER_NO, F_CUSTOMER_PAYMENT_NO, AMOUNT, TRANSACTION_DATE, TRANSACTION_TYPE, IN_OUT, F_SS_CREATED_BY, SS_CREATED_ON, F_SS_MODIFIED_BY, SS_MODIFIED_ON) 
VALUES (VAR_CODE, NEW.F_CUSTOMER_NO, NEW.PK_NO, NEW.AMOUNT, NEW.PAYMENT_DATE, '1', '1', NEW.F_SS_CREATED_BY, NOW(), NEW.F_SS_MODIFIED_BY, NOW());


END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `BEFORE_ACC_CUSTOMER_PAYMENTS_INSERT`;
DELIMITER $$
CREATE TRIGGER `BEFORE_ACC_CUSTOMER_PAYMENTS_INSERT` BEFORE INSERT ON `ACC_CUSTOMER_PAYMENTS` FOR EACH ROW BEGIN



DECLARE VAR_CODE INT(10) DEFAULT NULL;
DECLARE VAR_CUSTOMER_NO VARCHAR(40) DEFAULT NULL;
DECLARE VAR_CUSTOMER_NAME VARCHAR(40) DEFAULT NULL;
DECLARE VAR_PAYMENT_BANK_NAME VARCHAR(40) DEFAULT NULL;
DECLARE VAR_PAYMENT_ACCOUNT_NAME VARCHAR(40) DEFAULT NULL;
DECLARE VAR_PAYMENT_BANK_ACC_NO VARCHAR(40) DEFAULT NULL;

SELECT CODE, NAME INTO VAR_CUSTOMER_NO, VAR_CUSTOMER_NAME FROM WEB_USER WHERE PK_NO = NEW.F_CUSTOMER_NO;
SELECT BANK_NAME,BANK_ACC_NAME,BANK_ACC_NO INTO VAR_PAYMENT_BANK_NAME,VAR_PAYMENT_ACCOUNT_NAME,VAR_PAYMENT_BANK_ACC_NO FROM ACC_PAYMENT_BANK_ACC WHERE PK_NO = NEW.F_ACC_PAYMENT_BANK_NO;

SELECT IFNULL(MAX(CODE),1000) INTO VAR_CODE FROM ACC_CUSTOMER_PAYMENTS;

SET NEW.CODE = VAR_CODE+1;
SET NEW.CUSTOMER_NO = VAR_CUSTOMER_NO;
SET NEW.CUSTOMER_NAME = VAR_CUSTOMER_NAME;
SET NEW.PAYMENT_BANK_NAME = VAR_PAYMENT_BANK_NAME;
SET NEW.PAYMENT_ACCOUNT_NAME = VAR_PAYMENT_ACCOUNT_NAME;
SET NEW.PAYMENT_BANK_ACC_NO = VAR_PAYMENT_BANK_ACC_NO;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ACC_CUSTOMER_PAYMENT_USED`
--

DROP TABLE IF EXISTS `ACC_CUSTOMER_PAYMENT_USED`;
CREATE TABLE IF NOT EXISTS `ACC_CUSTOMER_PAYMENT_USED` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `F_CUSTOMER_PAYMENTS_NO` int(11) DEFAULT NULL,
  `F_CUSTOMER_NO` int(11) DEFAULT NULL COMMENT 'FROM WEB_USER',
  `F_LISTING_NO` int(11) DEFAULT NULL,
  `F_LEAD_SEND_NO` int(11) DEFAULT NULL,
  `AMOUNT` float NOT NULL DEFAULT '0',
  `START_DATE` date DEFAULT NULL,
  `END_DATE` date DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `CREATED_BY` int(11) DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ACC_CUSTOMER_PAYMENT_USED`
--

INSERT INTO `ACC_CUSTOMER_PAYMENT_USED` (`PK_NO`, `F_CUSTOMER_PAYMENTS_NO`, `F_CUSTOMER_NO`, `F_LISTING_NO`, `F_LEAD_SEND_NO`, `AMOUNT`, `START_DATE`, `END_DATE`, `CREATED_AT`, `UPDATED_AT`, `CREATED_BY`, `UPDATED_BY`) VALUES
(1, NULL, 16, 10, NULL, 40, '2021-08-04', '2021-09-03', '2021-08-04 17:04:10', '2021-08-04 17:04:10', 16, NULL),
(2, NULL, 16, 10, NULL, 40, '2021-08-04', '2021-09-03', '2021-08-04 17:04:50', '2021-08-04 17:04:50', 16, NULL),
(3, NULL, 16, 10, NULL, 40, '2021-08-04', '2021-09-03', '2021-08-04 17:05:12', '2021-08-04 17:05:12', 16, NULL),
(4, NULL, 16, 10, NULL, 40, '2021-08-04', '2021-09-03', '2021-08-04 17:05:33', '2021-08-04 17:05:33', 16, NULL),
(5, NULL, 16, 10, NULL, 40, '2021-08-04', '2021-09-03', '2021-08-04 17:05:58', '2021-08-04 17:05:58', 16, NULL),
(6, NULL, 15, 6, NULL, 50, '2021-08-04', '2021-09-03', '2021-08-04 17:55:29', '2021-08-04 17:55:29', 15, NULL),
(7, NULL, 15, 6, NULL, 50, '2021-08-04', '2021-09-03', '2021-08-04 17:55:34', '2021-08-04 17:55:34', 15, NULL),
(8, NULL, 15, 6, NULL, 50, '2021-08-04', '2021-09-03', '2021-08-04 17:56:09', '2021-08-04 17:56:09', 15, NULL),
(9, NULL, 15, 6, NULL, 50, '2021-08-04', '2021-09-03', '2021-08-04 18:29:15', '2021-08-04 18:29:15', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ACC_CUSTOMER_REFUND`
--

DROP TABLE IF EXISTS `ACC_CUSTOMER_REFUND`;
CREATE TABLE IF NOT EXISTS `ACC_CUSTOMER_REFUND` (
  `PK_NO` int(10) NOT NULL AUTO_INCREMENT,
  `F_USER_NO` int(10) DEFAULT NULL,
  `F_REQUEST_REASON_NO` int(10) DEFAULT NULL,
  `REQUEST_REASON` varchar(100) DEFAULT NULL,
  `REQUEST_AT` datetime DEFAULT NULL,
  `REQUEST_AMOUNT` float DEFAULT NULL,
  `COMMENT` varchar(200) DEFAULT NULL,
  `F_LISTING_NO` int(10) DEFAULT NULL,
  `STATUS` int(1) DEFAULT NULL COMMENT '1=pending,2=approved',
  `APPROVED_AT` datetime DEFAULT NULL,
  `APPROVED_BY` int(10) DEFAULT NULL,
  `APPROVED_AMOUNT` int(11) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `CREATED_BY` int(10) DEFAULT NULL,
  `MODIFIED_AT` datetime DEFAULT NULL,
  `MODIFIED_BY` int(10) DEFAULT NULL,
  `IS_DELETE` int(1) NOT NULL DEFAULT '0' COMMENT '1=delete',
  PRIMARY KEY (`PK_NO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ACC_CUSTOMER_TRANSACTION`
--

DROP TABLE IF EXISTS `ACC_CUSTOMER_TRANSACTION`;
CREATE TABLE IF NOT EXISTS `ACC_CUSTOMER_TRANSACTION` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `F_CUSTOMER_NO` int(11) DEFAULT NULL,
  `F_CUSTOMER_PAYMENT_NO` int(11) DEFAULT NULL,
  `F_LISTING_PAYMENT_NO` int(11) DEFAULT NULL,
  `AMOUNT` float DEFAULT '0',
  `TRANSACTION_DATE` date DEFAULT NULL,
  `TRANSACTION_TYPE` int(11) NOT NULL DEFAULT '1' COMMENT '1 = recharge,2 = property payment',
  `IN_OUT` int(1) NOT NULL DEFAULT '1' COMMENT '1 = IN, 2 = OUT PAYMENT BY BDFLAT',
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ACC_CUSTOMER_TRANSACTION`
--

INSERT INTO `ACC_CUSTOMER_TRANSACTION` (`PK_NO`, `CODE`, `F_CUSTOMER_NO`, `F_CUSTOMER_PAYMENT_NO`, `F_LISTING_PAYMENT_NO`, `AMOUNT`, `TRANSACTION_DATE`, `TRANSACTION_TYPE`, `IN_OUT`, `F_SS_CREATED_BY`, `SS_CREATED_ON`, `F_SS_MODIFIED_BY`, `SS_MODIFIED_ON`) VALUES
(2, 1001, 14, 18, NULL, 100, '2021-08-03', 1, 1, NULL, '2021-08-12 02:38:16', NULL, '2021-08-12 02:38:16'),
(3, 1002, 14, 19, NULL, 120, '2021-08-15', 1, 1, NULL, '2021-08-15 00:46:09', NULL, '2021-08-15 00:46:09'),
(4, 1003, 18, 20, NULL, 15, '2021-08-18', 1, 1, 2, '2021-08-18 00:42:31', NULL, '2021-08-18 00:42:31'),
(5, 1004, 19, 21, NULL, 500, '2021-08-20', 1, 1, 2, '2021-08-20 01:03:29', NULL, '2021-08-20 01:03:29'),
(6, 1005, 19, 22, NULL, 50, '2021-08-20', 1, 1, 2, '2021-08-20 01:06:29', NULL, '2021-08-20 01:06:29'),
(7, 1006, 19, 23, NULL, 10, '2021-08-20', 1, 1, 2, '2021-08-20 01:14:25', NULL, '2021-08-20 01:14:25'),
(8, 1007, 15, 24, NULL, 500, '2021-08-20', 1, 1, 2, '2021-08-20 01:16:17', NULL, '2021-08-20 01:16:17'),
(9, 1008, 40, 25, NULL, 50, '2029-08-20', 1, 1, 2, '2021-08-29 01:48:26', NULL, '2021-08-29 01:48:26'),
(10, 1009, 40, 26, NULL, 100, '2001-09-20', 1, 1, 2, '2021-09-01 01:37:42', NULL, '2021-09-01 01:37:42'),
(11, 1010, 13, 27, NULL, 100, '2001-09-20', 1, 1, 2, '2021-09-01 01:57:28', NULL, '2021-09-01 01:57:28'),
(12, 1011, 13, NULL, 3, -30, '2021-09-01', 2, 2, 2, '2021-09-01 01:59:38', NULL, '2021-09-01 01:59:38'),
(13, 1012, 39, 29, NULL, 500, '2001-09-20', 1, 1, 2, '2021-09-01 23:41:50', NULL, '2021-09-01 23:41:50'),
(14, 1013, 39, NULL, 4, -50, '2021-09-01', 2, 2, 2, '2021-09-01 23:44:34', NULL, '2021-09-01 23:44:34');

--
-- Triggers `ACC_CUSTOMER_TRANSACTION`
--
DROP TRIGGER IF EXISTS `AFTERT_ACC_CUSTOMER_TRANSACTION_INSERT`;
DELIMITER $$
CREATE TRIGGER `AFTERT_ACC_CUSTOMER_TRANSACTION_INSERT` AFTER INSERT ON `ACC_CUSTOMER_TRANSACTION` FOR EACH ROW BEGIN

DECLARE VAR_AMOUNT FLOAT DEFAULT 0;

SELECT IFNULL(SUM(AMOUNT),0) INTO VAR_AMOUNT FROM ACC_CUSTOMER_TRANSACTION WHERE F_CUSTOMER_NO = NEW.F_CUSTOMER_NO;

UPDATE WEB_USER SET UNUSED_TOPUP = VAR_AMOUNT WHERE PK_NO = NEW.F_CUSTOMER_NO;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ACC_LISTING_LEAD_PAYMENTS`
--

DROP TABLE IF EXISTS `ACC_LISTING_LEAD_PAYMENTS`;
CREATE TABLE IF NOT EXISTS `ACC_LISTING_LEAD_PAYMENTS` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `F_LISTING_NO` int(11) DEFAULT NULL,
  `F_USER_NO` int(11) DEFAULT NULL,
  `AMOUNT` float DEFAULT NULL,
  `PURCHASE_DATE` date DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `MODIFIED_AT` datetime DEFAULT NULL,
  `CREATED_BY` int(11) DEFAULT NULL,
  `MODIFIED_BY` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `U_LISTING_NO_USER_NO` (`PK_NO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ACC_LISTING_PAYMENTS`
--

DROP TABLE IF EXISTS `ACC_LISTING_PAYMENTS`;
CREATE TABLE IF NOT EXISTS `ACC_LISTING_PAYMENTS` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `F_LISTING_NO` int(11) DEFAULT NULL,
  `F_USER_NO` int(11) DEFAULT NULL,
  `AMOUNT` float DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `END_DATE` date DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `MODIFIED_AT` datetime DEFAULT NULL,
  `CREATED_BY` int(11) DEFAULT NULL,
  `MODIFIED_BY` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ACC_LISTING_PAYMENTS`
--

INSERT INTO `ACC_LISTING_PAYMENTS` (`PK_NO`, `F_LISTING_NO`, `F_USER_NO`, `AMOUNT`, `START_DATE`, `END_DATE`, `CREATE_AT`, `MODIFIED_AT`, `CREATED_BY`, `MODIFIED_BY`) VALUES
(1, 59, 40, 30, '2021-09-01', '2021-10-01', '2021-09-01 01:11:29', '2021-09-01 01:11:29', 2, NULL),
(2, 15, 13, 30, '2021-09-01', '2021-10-01', '2021-09-01 01:58:21', '2021-09-01 01:58:21', 2, NULL),
(3, 15, 13, 30, '2021-09-01', '2021-10-01', '2021-09-01 01:59:38', '2021-09-01 01:59:38', 2, NULL),
(4, 58, 39, 50, '2021-09-01', '2021-10-01', '2021-09-01 23:44:34', '2021-09-01 23:44:34', 2, NULL);

--
-- Triggers `ACC_LISTING_PAYMENTS`
--
DROP TRIGGER IF EXISTS `AFTERT_ACC_LISTING_PAYMENTS_INSERT`;
DELIMITER $$
CREATE TRIGGER `AFTERT_ACC_LISTING_PAYMENTS_INSERT` AFTER INSERT ON `ACC_LISTING_PAYMENTS` FOR EACH ROW BEGIN

DECLARE VAR_CODE INT(10) DEFAULT NULL;
DECLARE VAR_AMOUNT FLOAT DEFAULT 0;

SELECT IFNULL(MAX(CODE),1000) INTO VAR_CODE FROM ACC_CUSTOMER_TRANSACTION;

SET VAR_CODE = VAR_CODE+1;


INSERT INTO ACC_CUSTOMER_TRANSACTION 
(CODE, F_CUSTOMER_NO,F_LISTING_PAYMENT_NO, AMOUNT, TRANSACTION_DATE, TRANSACTION_TYPE, IN_OUT, F_SS_CREATED_BY, SS_CREATED_ON, F_SS_MODIFIED_BY, SS_MODIFIED_ON) 
VALUES (VAR_CODE, NEW.F_USER_NO, NEW.PK_NO, -NEW.AMOUNT, date(NEW.CREATE_AT), '2', '2', NEW.CREATED_BY, NOW(), NEW.MODIFIED_BY, NOW());


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ACC_PAYMENT_BANK_ACC`
--

DROP TABLE IF EXISTS `ACC_PAYMENT_BANK_ACC`;
CREATE TABLE IF NOT EXISTS `ACC_PAYMENT_BANK_ACC` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `BANK_NAME` varchar(40) DEFAULT NULL,
  `BANK_ACC_NAME` varchar(40) DEFAULT NULL,
  `BANK_ACC_NO` varchar(40) DEFAULT NULL,
  `BALANCE_ACTUAL` float DEFAULT '0',
  `BALACNE_BUFFER` float DEFAULT '0',
  `COMMENTS` varchar(200) DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `F_USER_NO` int(4) DEFAULT NULL,
  `IS_COD` int(1) DEFAULT '0',
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  `F_SS_COMPANY_NO` int(4) DEFAULT NULL,
  `F_PAYMENT_METHOD_NO` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `U_ACC_PAYMENT_BANK_ACC` (`BANK_NAME`,`BANK_ACC_NAME`,`BANK_ACC_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ACC_PAYMENT_BANK_ACC`
--

INSERT INTO `ACC_PAYMENT_BANK_ACC` (`PK_NO`, `CODE`, `BANK_NAME`, `BANK_ACC_NAME`, `BANK_ACC_NO`, `BALANCE_ACTUAL`, `BALACNE_BUFFER`, `COMMENTS`, `IS_ACTIVE`, `F_SS_CREATED_BY`, `F_USER_NO`, `IS_COD`, `SS_CREATED_ON`, `F_SS_MODIFIED_BY`, `SS_MODIFIED_ON`, `F_SS_COMPANY_NO`, `F_PAYMENT_METHOD_NO`) VALUES
(1, 101, 'SSL', 'SSL', '101', 0, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1),
(2, 102, 'CASH- Admin', 'CASH', '102', 0, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, 6),
(3, 103, 'NRB', 'Admin', '122211', 0, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, 4),
(4, 104, 'Bonus', 'BDF Bnous', 'BDF Bnous', 0, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `ACC_PAYMENT_METHODS`
--

DROP TABLE IF EXISTS `ACC_PAYMENT_METHODS`;
CREATE TABLE IF NOT EXISTS `ACC_PAYMENT_METHODS` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(4) DEFAULT NULL,
  `NAME` varchar(200) DEFAULT NULL,
  `IS_ACTIVE` int(11) DEFAULT NULL COMMENT '1=ACTIVE, 0=INACTIVE',
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `U_ACC_PAYMENT_METHODS` (`NAME`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ACC_PAYMENT_METHODS`
--

INSERT INTO `ACC_PAYMENT_METHODS` (`PK_NO`, `CODE`, `NAME`, `IS_ACTIVE`) VALUES
(1, 101, 'SSL Payment', 1),
(2, 102, 'Bkash', 1),
(3, 103, 'Roket', 1),
(4, 104, 'Bank', 1),
(5, 105, 'Surja Payment', 1),
(6, 106, 'CASH', 1),
(7, 107, 'BONUS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_ADS`
--

DROP TABLE IF EXISTS `PRD_ADS`;
CREATE TABLE IF NOT EXISTS `PRD_ADS` (
  `PK_NO` bigint(20) NOT NULL AUTO_INCREMENT,
  `F_AD_POSITION_NO` int(11) DEFAULT NULL,
  `CODE` bigint(20) DEFAULT NULL,
  `URL_SLUG` varchar(300) DEFAULT NULL,
  `AVAILABLE_TO` datetime DEFAULT NULL,
  `AVAILABLE_FROM` date DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `CREATED_BY` int(10) DEFAULT NULL,
  `MODIFIED_AT` datetime DEFAULT NULL,
  `MODIFIED_BY` int(10) DEFAULT NULL,
  `STATUS` int(1) NOT NULL DEFAULT '0' COMMENT '0= PENDING,1=PUBLISHED',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_ADS`
--

INSERT INTO `PRD_ADS` (`PK_NO`, `F_AD_POSITION_NO`, `CODE`, `URL_SLUG`, `AVAILABLE_TO`, `AVAILABLE_FROM`, `CREATED_AT`, `CREATED_BY`, `MODIFIED_AT`, `MODIFIED_BY`, `STATUS`) VALUES
(1, 10, NULL, NULL, '2021-09-23 00:00:00', '2020-08-20', '2021-08-08 01:16:22', 2, '2021-08-24 02:32:44', 2, 1),
(2, 102, NULL, NULL, '2021-08-23 00:00:00', '2020-09-01', '2021-08-21 23:33:49', 2, '2021-08-27 21:40:21', 2, 1),
(3, 101, NULL, NULL, '2021-08-31 00:00:00', '2021-08-20', '2021-08-21 23:44:06', 2, '2021-08-21 23:44:06', NULL, 1),
(4, 200, NULL, NULL, '2021-10-06 00:00:00', '2021-08-23', '2021-08-24 22:47:30', 2, '2021-08-24 22:47:30', NULL, 1),
(5, 300, NULL, NULL, '2021-09-11 00:00:00', '2021-08-25', '2021-08-26 20:58:47', 2, '2021-08-26 20:58:47', NULL, 1),
(6, 301, NULL, NULL, '2021-09-11 00:00:00', '2021-08-26', '2021-08-26 20:58:59', 2, '2021-08-26 20:58:59', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_ADS_IMAGES`
--

DROP TABLE IF EXISTS `PRD_ADS_IMAGES`;
CREATE TABLE IF NOT EXISTS `PRD_ADS_IMAGES` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `F_ADS_NO` bigint(20) DEFAULT NULL,
  `IMAGE_PATH` varchar(100) DEFAULT NULL,
  `IMAGE` varchar(50) DEFAULT NULL,
  `ORDER_ID` int(11) NOT NULL,
  `URL` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_ADS_IMAGES`
--

INSERT INTO `PRD_ADS_IMAGES` (`PK_NO`, `F_ADS_NO`, `IMAGE_PATH`, `IMAGE`, `ORDER_ID`, `URL`) VALUES
(1, 1, '/uploads/ads/1/612138ddd9945.png', NULL, 101, NULL),
(2, 1, '/uploads/ads/1/612139b0a32be.png', NULL, 102, NULL),
(3, 2, '/uploads/ads/2/61213a3b35fe4.png', NULL, 102, NULL),
(4, 3, '/uploads/ads/3/61213b702be70.jpg', NULL, 101, NULL),
(5, 4, '/uploads/ads/4/612522bfc612c.jpg', NULL, 100, NULL),
(6, 5, '/uploads/ads/5/6127ac4c051ab.jpg', NULL, 100, NULL),
(7, 6, '/uploads/ads/6/6127ac5f24535.jpg', NULL, 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_AD_POSITION`
--

DROP TABLE IF EXISTS `PRD_AD_POSITION`;
CREATE TABLE IF NOT EXISTS `PRD_AD_POSITION` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `POSITION_ID` int(11) DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `CREATED_BY` int(11) DEFAULT NULL,
  `MODIFIED_BY` int(11) DEFAULT NULL,
  `MODIFIED_AT` datetime DEFAULT NULL,
  `IS_ACTIVE` int(11) NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive',
  PRIMARY KEY (`PK_NO`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_AD_POSITION`
--

INSERT INTO `PRD_AD_POSITION` (`PK_NO`, `POSITION_ID`, `NAME`, `CREATED_AT`, `CREATED_BY`, `MODIFIED_BY`, `MODIFIED_AT`, `IS_ACTIVE`) VALUES
(1, 10, 'Home Category Left', '2021-08-08 01:11:48', 2, 2, '2021-08-21 23:24:27', 1),
(2, 102, 'Home Category Right', '2021-08-08 01:14:28', 2, 2, '2021-08-21 23:24:35', 1),
(3, 101, 'Home Category Bottom', '2021-08-21 23:24:52', 2, NULL, '2021-08-21 23:24:52', 1),
(4, 200, 'Property Details Page Right Side', '2021-08-24 22:47:12', 2, NULL, '2021-08-24 22:47:12', 1),
(5, 300, 'Properties Right Side', '2021-08-26 20:57:50', 2, NULL, '2021-08-26 20:57:50', 1),
(6, 301, 'Properties Bottom', '2021-08-26 20:58:30', 2, NULL, '2021-08-26 20:58:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_BROWSING_HISTORY`
--

DROP TABLE IF EXISTS `PRD_BROWSING_HISTORY`;
CREATE TABLE IF NOT EXISTS `PRD_BROWSING_HISTORY` (
  `PK_NO` bigint(20) NOT NULL AUTO_INCREMENT,
  `F_USER_NO` int(10) DEFAULT NULL,
  `F_LISTING_NO` int(10) DEFAULT NULL,
  `COUNTER` int(10) NOT NULL DEFAULT '1',
  `LAST_BROWES_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `PRD_FLOOR_LIST`
--

DROP TABLE IF EXISTS `PRD_FLOOR_LIST`;
CREATE TABLE IF NOT EXISTS `PRD_FLOOR_LIST` (
  `PK_NO` int(2) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(30) DEFAULT NULL,
  `IS_ACTIVE` int(1) NOT NULL DEFAULT '1',
  `ORDER_ID` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PK_NO`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_FLOOR_LIST`
--

INSERT INTO `PRD_FLOOR_LIST` (`PK_NO`, `NAME`, `IS_ACTIVE`, `ORDER_ID`) VALUES
(1, 'Ground Floor', 1, 0),
(2, '1 Storied', 1, 0),
(3, '2 Storied', 1, 0),
(4, '3 Storied', 1, 0),
(5, '4 Storied', 1, 1),
(6, '5 Storied', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_LISTINGS`
--

DROP TABLE IF EXISTS `PRD_LISTINGS`;
CREATE TABLE IF NOT EXISTS `PRD_LISTINGS` (
  `PK_NO` bigint(20) NOT NULL AUTO_INCREMENT,
  `CODE` bigint(20) DEFAULT NULL,
  `PROPERTY_FOR` varchar(20) DEFAULT NULL COMMENT 'RENT OR BUY OR ROOMMATE',
  `F_PROPERTY_TYPE_NO` int(10) DEFAULT NULL,
  `PROPERTY_TYPE` varchar(50) DEFAULT NULL,
  `ADDRESS` varchar(200) DEFAULT NULL,
  `PROPERTY_CONDITION` varchar(200) DEFAULT NULL,
  `F_PROPERTY_CONDITION` int(2) DEFAULT NULL,
  `PROPERTY_SIZE` decimal(10,0) DEFAULT '0',
  `BEDROOM` int(2) DEFAULT '0',
  `BATHROOM` int(2) DEFAULT '0',
  `TOTAL_PRICE` decimal(10,0) DEFAULT '0',
  `PRICE_TYPE` int(1) NOT NULL DEFAULT '1' COMMENT '1=Fixed, 2=Nagotiable',
  `TITLE` varchar(250) DEFAULT NULL,
  `URL_SLUG` varchar(300) DEFAULT NULL,
  `URL_SLUG_LOCKED` int(1) NOT NULL DEFAULT '0',
  `F_CITY_NO` int(2) DEFAULT NULL,
  `CITY_NAME` varchar(50) DEFAULT NULL,
  `F_AREA_NO` int(10) DEFAULT NULL,
  `AREA_NAME` varchar(50) DEFAULT NULL,
  `F_SUBAREA_NO` int(11) DEFAULT NULL,
  `SUBAREA_NAME` varchar(50) DEFAULT NULL,
  `F_USER_NO` int(10) DEFAULT NULL,
  `USER_TYPE` int(1) DEFAULT '2' COMMENT '2=owner,3=builder,4=agency, 5=agent',
  `CONTACT_PERSON1` varchar(50) DEFAULT NULL,
  `CONTACT_PERSON2` varchar(50) DEFAULT NULL,
  `MOBILE1` varchar(15) NOT NULL,
  `MOBILE2` varchar(15) DEFAULT NULL,
  `F_LISTING_TYPE` int(2) DEFAULT NULL,
  `LISTING_TYPE` varchar(50) DEFAULT NULL,
  `F_PREP_TENANT_NO` int(2) DEFAULT NULL,
  `PREP_TENANT` varchar(50) DEFAULT NULL,
  `AVAILABLE_FROM` date DEFAULT NULL,
  `GENDER` varchar(20) DEFAULT NULL,
  `IS_VERIFIED` tinyint(1) NOT NULL DEFAULT '0',
  `VERIFIED_BY` int(2) DEFAULT NULL,
  `VERIFIED_AT` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `CREATED_BY` int(10) DEFAULT NULL,
  `MODIFIED_AT` datetime DEFAULT NULL,
  `MODIFIED_BY` int(10) DEFAULT NULL,
  `TOTAL_FLOORS` int(2) DEFAULT NULL,
  `FLOORS_AVAIABLE` varchar(100) DEFAULT NULL COMMENT 'COMMA SEPERATED VALUES',
  `EXPAIRED_AT` date DEFAULT NULL,
  `STATUS` int(2) NOT NULL DEFAULT '0' COMMENT '0 = pending, 10=published,20=unpublished, 30=Rejected, 40= Expaired,50=deleted',
  `PAYMENT_STATUS` int(1) NOT NULL DEFAULT '0' COMMENT '0=NOT PAID,1=PAID',
  `CI_PAYMENT` int(11) NOT NULL DEFAULT '0' COMMENT 'payment for Contact View 0 = No need, 1 = Need payment ',
  `IS_TOP` int(1) NOT NULL DEFAULT '0',
  `PAYMENT_AUTO_RENEW` int(1) NOT NULL DEFAULT '1' COMMENT 'when STATUS = 10(published) but PAYMENT_STATUS = 0 , the listing will update payment_status = 1 if enough balance in account   ',
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `U_CODE` (`CODE`),
  UNIQUE KEY `U_URL_SLUG` (`URL_SLUG`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTINGS`
--

INSERT INTO `PRD_LISTINGS` (`PK_NO`, `CODE`, `PROPERTY_FOR`, `F_PROPERTY_TYPE_NO`, `PROPERTY_TYPE`, `ADDRESS`, `PROPERTY_CONDITION`, `F_PROPERTY_CONDITION`, `PROPERTY_SIZE`, `BEDROOM`, `BATHROOM`, `TOTAL_PRICE`, `PRICE_TYPE`, `TITLE`, `URL_SLUG`, `URL_SLUG_LOCKED`, `F_CITY_NO`, `CITY_NAME`, `F_AREA_NO`, `AREA_NAME`, `F_SUBAREA_NO`, `SUBAREA_NAME`, `F_USER_NO`, `USER_TYPE`, `CONTACT_PERSON1`, `CONTACT_PERSON2`, `MOBILE1`, `MOBILE2`, `F_LISTING_TYPE`, `LISTING_TYPE`, `F_PREP_TENANT_NO`, `PREP_TENANT`, `AVAILABLE_FROM`, `GENDER`, `IS_VERIFIED`, `VERIFIED_BY`, `VERIFIED_AT`, `CREATED_AT`, `CREATED_BY`, `MODIFIED_AT`, `MODIFIED_BY`, `TOTAL_FLOORS`, `FLOORS_AVAIABLE`, `EXPAIRED_AT`, `STATUS`, `PAYMENT_STATUS`, `CI_PAYMENT`, `IS_TOP`, `PAYMENT_AUTO_RENEW`) VALUES
(5, 1001, 'sale', 1, 'Apartment', 'Banasree, Dhaka', 'Ongoing', 3, '0', 0, 0, '0', 1, '1690 sqft, 3 Beds Under Construction Apartment/Flats for Sale at Banasree', '1690-sqft-3-beds-under-construction', 0, 1, 'Dhaka', 7, ' Banasree', NULL, NULL, 15, 3, 'Hyperion Design & Development Ltd.', 'Hyperion Design & Development Ltd.', '01817158000', '01817158000', 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-03 20:35:32', 15, '2021-09-02 22:11:30', 15, 6, '[\"2\",\"3\",\"4\",\"5\",\"6\"]', NULL, 0, 0, 0, 1, 1),
(6, 1002, 'sale', 1, 'Apartment', 'Eskaton, Dhaka', 'Ongoing', 3, '0', 0, 0, '0', 1, '1478 sqft, 3 Beds Under Construction Apartment/Flats for Sale at Eskaton', '1478-sqft-3-beds-under-construction', 1, 1, 'Dhaka', 8, 'Eskaton', NULL, NULL, 15, 3, 'Runner Properties Ltd.', 'Runner Properties Ltd.', '01730406', '01730406', 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-03 20:49:12', 15, '2021-09-02 22:11:30', 15, 6, '[\"2\",\"3\",\"4\",\"5\",\"6\"]', NULL, 0, 0, 1, 0, 1),
(7, 1003, 'sale', 2, 'Office', 'Uttara, Dhaka', 'Ongoing', 3, '0', 0, 0, '0', 1, '2500 sqft, Under Construction Office Space for Sale at Uttara', '2500-sqft-under-construction', 0, 1, 'Dhaka', 9, 'Uttara', NULL, NULL, 13, 2, 'Ark Builders Ltd', 'Ark Builders Ltd', '01926993000', '01926993000', 3, 'General Listing with daily auto update f', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-03 21:02:31', 13, '2021-08-20 23:21:38', 2, 6, '[\"2\",\"3\",\"4\",\"5\",\"6\"]', NULL, 0, 0, 0, 0, 1),
(8, 1004, 'rent', 1, 'Apartment', 'Rampura, Dhaka', 'Ready', 1, '0', 0, 0, '0', 1, '1800 sqft, 3 Beds Apartment/Flats for Rent at Rampura', '1800-sqft-under-construction', 0, 1, 'Dhaka', 10, 'Rampura', NULL, NULL, 13, 2, 'Rayyan Properties', 'Rayyan Properties', '01300773000', '01300773000', 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-03 21:07:11', 13, '2021-08-20 23:21:38', 2, 6, '[\"6\"]', NULL, 0, 0, 0, 0, 1),
(9, 1005, 'rent', 2, 'Office', 'Hyperion Tower, House - 02, Block - A, Road - 04, Section - 10Mirpur, Dhaka-1216', 'Ready', 1, '0', 0, 0, '0', 1, '3500 sqft, Office Space for Rent at Mirpur 10', '3500-sqft-office-space', 0, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, 16, 4, 'Arafatul Alam', 'Arafatul Alam', '01817158000', '01817158000', 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-04 15:34:14', 16, '2021-08-20 23:21:38', 2, 6, '[\"2\",\"3\"]', NULL, 0, 0, 0, 0, 1),
(10, 1006, 'rent', 1, 'Apartment', 'Mirbag, Dhaka', 'Ready', 1, '0', 0, 0, '0', 1, '16000 sqft, 6 Beds Duplex Home for Rent at Mirbag', '16000-sqft-6-beds-duplex-home', 0, 1, 'Dhaka', 11, 'Mirbag', NULL, NULL, 16, 4, 'Tallal Ziad', 'Tallal Ziad', '20100139292', '20100139292', 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-04 15:41:35', 16, '2021-08-20 23:21:38', 2, 3, '[\"2\",\"3\"]', NULL, 0, 0, 0, 0, 1),
(11, 1007, 'rent', 1, 'Apartment', 'BLOCK C, ROAD 2, HOUSE 1F', 'Ready', 1, '0', 0, 0, '0', 1, '400 sqft, 2 Beds Studio Apartment for Rent at Bashundhara R/A', '400-sqft-2-beds-studio-apartment', 0, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, 16, 4, 'MUSFAQUE RAIHAN MUSA', 'MUSFAQUE RAIHAN MUSA', '01712503000', '01712503000', 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-04 18:59:39', 16, '2021-08-20 23:21:38', 2, 6, '[\"6\"]', NULL, 0, 0, 0, 0, 1),
(12, 1008, 'rent', 1, 'Apartment', 'Shewrapara', 'Ready', 1, '0', 0, 0, '0', 1, '500 sqft, 1 Bed Sublet/Room for Rent at Shewrapara', '500-sqft-2-beds-studio-apartment', 0, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, 16, 4, 'Shahid Sajjad Huq', 'Shahid Sajjad Huq', '01977149000', '01977149000', 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-04 19:03:12', 16, '2021-08-20 23:21:38', 2, 1, '[\"1\"]', NULL, 0, 0, 0, 0, 1),
(13, 1009, 'roommate', 1, 'Apartment', 'house : 22. road : 3. block : E. section : 12. Pallabi. Mirpur', 'Ready', 1, '0', 0, 0, '0', 1, 'sublet Female for a Roommates at Mirpur 12', 'sublet-female-roommate', 0, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, 17, 5, 'Effat ara', 'Effat ara', '01739252000', '01739252000', 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-04 19:37:05', 17, '2021-08-20 23:21:38', 2, 6, '[\"3\"]', NULL, 0, 0, 0, 0, 1),
(14, 1010, 'roommate', 1, 'Apartment', 'Aftab Nagar', 'Ready', 1, '0', 0, 0, '0', 1, 'Hostel Male for a Roommates/Paying Guest at Aftab Nagar', 'hostel-male-roommate', 1, 1, 'Dhaka', 10, 'Rampura', NULL, NULL, 17, 5, 'Super Hostel BD', 'Super Hostel BD', '016784038820', '1678403884', 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-04 19:48:22', 17, '2021-08-20 23:21:38', 2, 6, NULL, NULL, 0, 0, 0, 0, 1),
(15, 1011, 'sale', 1, 'Apartment', 'Cantonment, Dhaka', 'Ready', 1, '0', 0, 0, '0', 2, '1125 sqft, 3 Beds Ready Studio Apartment for Sale at Cantonment', '1125-sqft-3-beds-ready-studio-apartment-for-sale-at-cantonment', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, 13, 2, 'Rafath', NULL, '01717164000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 16:09:00', 13, '2021-09-01 01:59:38', 2, 6, '[\"2\",\"3\",\"4\",\"5\",\"6\"]', NULL, 10, 1, 0, 0, 1),
(16, 1012, 'sale', 1, 'Apartment', 'Bashundhara R/A, Dhaka', 'Ready', 1, '0', 0, 0, '0', 2, '2300 sqft, 3 Beds Ready Flats for Sale at Bashundhara R/A', '2300-sqft-3-beds-ready-flats-for-sale-at-bashundhara-ra', 0, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, 13, 2, 'IMAGINE PROPERTIES LTD.', NULL, '01939919000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 16:16:04', 13, '2021-08-26 16:16:04', NULL, 6, '[\"2\",\"3\",\"4\",\"5\",\"6\"]', NULL, 0, 0, 0, 0, 1),
(17, 1013, 'rent', 2, 'Office', '61, Bijoy nagar, Dhaka', 'Ready', 1, '0', 0, 0, '0', 1, '2000 sqft, Office Space for Rent at Naya Paltan', '2000-sqft-office-space-for-rent-at-naya-paltan', 0, 1, 'Dhaka', 13, 'Naya Paltan', NULL, NULL, 21, 2, 'IMAGINE PROPERTIES LTD', NULL, '01939919000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 16:27:30', 21, '2021-08-26 16:27:30', NULL, 6, '[\"2\"]', NULL, 0, 0, 0, 0, 1),
(18, 1014, 'sale', 1, 'Apartment', 'Basundhara R/A, Dhaka', 'Ready', 1, '0', 0, 0, '0', 2, '2935 sqft, 4 Beds Ready Flats for Sale at Bashundhara R/A', '2935-sqft-4-beds-ready-flats-for-sale-at-bashundhara-ra', 0, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, 21, 2, 'IMAGINE PROPERTIES LTD.', NULL, '01939919000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 16:54:10', 21, '2021-08-26 16:54:10', NULL, 6, '[\"2\"]', NULL, 0, 0, 0, 0, 1),
(19, 1015, 'sale', 1, 'Apartment', '2300 sqft, 3 Beds Ready Flats for Sale at Bashundhara R/A  SALE', 'Ready', 1, '0', 0, 0, '0', 1, '2300 sqft, 3 Beds Ready Flats for Sale at Bashundhara R/A', '2300-sqft-3-beds-ready-flats-for-sale-at-bashundhara-ra-1015', 0, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, 21, 2, 'IMAGINE PROPERTIES LTD', NULL, '01939919000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 17:03:37', 21, '2021-08-26 17:03:37', NULL, 6, '[\"6\"]', NULL, 0, 0, 0, 0, 1),
(20, 1016, 'sale', 1, 'Apartment', 'Bashundhara R/A , Dhaka', 'Ready', 1, '0', 0, 0, '0', 2, '2300 sqft, 3 Beds Ready Flats for Sale at Bashundhara R/A', '2300-sqft-3-beds-ready-flats-for-sale-at-bashundhara-ra-1016', 0, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, 21, 2, 'IMAGINE PROPERTIES LTD.', NULL, '01939919000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 17:13:38', 21, '2021-08-26 17:13:38', NULL, 6, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', NULL, 0, 0, 0, 0, 1),
(21, 1017, 'sale', 1, 'Apartment', 'Adabor , Dhaka', 'Ongoing', 3, '0', 0, 0, '0', 2, '1600 sqft, 4 Beds Under Construction Apartment/Flats for Sale at Adabor', '1600-sqft-4-beds-under-construction-apartmentflats-for-sale-at-adabor', 0, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 17:36:25', 22, '2021-08-26 17:36:25', NULL, 6, '[\"3\",\"4\",\"6\"]', NULL, 0, 0, 0, 0, 1),
(22, 1018, 'rent', 3, 'Shop', 'House#13-23,Road #01 Janata Co-Operative Housing Society Ltd. Ring Road,Adabor,Dhaka-1207', 'Ready', 1, '0', 0, 0, '0', 1, '125 sqft, Showroom/Shop/Restaurant for Rent at Adabor', '125-sqft-showroomshoprestaurant-for-rent-at-adabor', 0, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 17:44:48', 22, '2021-08-26 17:44:48', NULL, 4, '[\"1\",\"2\"]', NULL, 0, 0, 0, 0, 1),
(23, 1019, 'rent', 2, 'Office', 'SHAHABUDDIN PLAZA,House:13-23,Road#01,Janata Co-Operative Housing Society Ltd.Ring Road,Adabor Dhaka-1207', 'Ready', 1, '0', 0, 0, '0', 2, '1100 sqft, Office Space for Rent at Adabor', '1100-sqft-office-space-for-rent-at-adabor', 0, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 17:58:41', 22, '2021-08-26 17:58:41', NULL, 6, '[\"5\"]', NULL, 0, 0, 0, 0, 1),
(24, 1020, 'sale', 1, 'Apartment', 'Adabor, Dhaka', 'Ongoing', 3, '0', 0, 0, '0', 2, '1438 sqft, 3 Beds Under Construction Apartment/Flats for Sale at Adabor', '1438-sqft-3-beds-under-construction-apartmentflats-for-sale-at-adabor', 0, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 18:43:18', 22, '2021-08-26 18:43:18', NULL, 6, '[\"3\"]', NULL, 0, 0, 0, 0, 1),
(25, 1021, 'sale', 1, 'Apartment', 'Adabor, Dhaka', 'Ongoing', 3, '0', 0, 0, '0', 1, '1912 sqft, 4 Beds Under Construction Apartment/Flats for Sale at Adabor', '1912-sqft-4-beds-under-construction-apartmentflats-for-sale-at-adabor', 0, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 19:32:05', 22, '2021-08-26 19:32:05', NULL, 6, '[\"2\",\"5\",\"6\"]', NULL, 0, 0, 0, 0, 1),
(26, 1022, 'rent', 2, 'Office', 'Adabor, Dhaka', 'Ongoing', 3, '0', 0, 0, '0', 2, '700 sqft, Office Space for Rent at Adabor', '700-sqft-office-space-for-rent-at-adabor', 0, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 19:40:15', 22, '2021-08-26 19:40:15', NULL, 6, '[\"5\"]', NULL, 0, 0, 0, 0, 1),
(27, 1023, 'rent', 3, 'Shop', 'Adabor, Dhaka', 'Ready', 1, '0', 0, 0, '0', 1, '264 sqft, Shop for Rent at Adabor', '264-sqft-shop-for-rent-at-adabor', 0, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 19:48:02', 22, '2021-08-26 19:48:02', NULL, 6, '[\"1\",\"2\"]', NULL, 0, 0, 0, 0, 1),
(28, 1024, 'sale', 1, 'Apartment', 'Mirpur 14, Dhaka', 'Ongoing', 3, '0', 0, 0, '0', 2, '1980 sqft, 3 Beds Under Construction Flats for Sale at Mirpur 14', '1980-sqft-3-beds-under-construction-flats-for-sale-at-mirpur-14', 0, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 19:56:52', 22, '2021-08-26 19:56:52', NULL, 6, '[\"3\",\"5\"]', NULL, 0, 0, 0, 0, 1),
(29, 1025, 'rent', 3, 'Shop', 'Adabor', 'Ready', 1, '0', 0, 0, '0', 1, '1000 sqft, Shop for Rent at Adabor  RENT', '1000-sqft-shop-for-rent-at-adabor-rent', 0, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 20:41:20', 22, '2021-08-26 20:41:20', NULL, 4, '[\"2\",\"3\"]', NULL, 0, 0, 0, 0, 1),
(30, 1026, 'rent', 2, 'Office', 'Narayangonj Sadar , Narayanganj', 'Ready', 1, '0', 0, 0, '0', 1, 'Commercial Space for Rent at Bangabandhu Road, Narayangonj.', 'commercial-space-for-rent-at-bangabandhu-road-narayangonj', 0, 4, 'Narayanganj', 15, 'Narayanganj Sadar', NULL, NULL, 23, 2, 'Rafiqul Islam Ratul', NULL, '01709659000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 20:50:13', 23, '2021-08-26 20:50:13', NULL, 5, '[\"1\"]', NULL, 0, 0, 0, 0, 1),
(31, 1027, 'sale', 1, 'Apartment', 'Malibag, Dhaka', 'Ready', 1, '0', 0, 0, '0', 2, '1290 sqft, 3 Beds Ready Apartment/Flats for Sale at Malibag', '1290-sqft-3-beds-ready-apartmentflats-for-sale-at-malibag', 0, 1, 'Dhaka', 16, 'Malibag', NULL, NULL, 24, 2, 'RAYYAN PROPERTIES', NULL, '01300773000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 20:55:54', 24, '2021-08-26 20:55:54', NULL, 6, '[\"3\"]', NULL, 0, 0, 0, 0, 1),
(32, 1028, 'sale', 1, 'Apartment', 'Basundhara R/A, Dhaka', 'Ongoing', 3, '0', 0, 0, '0', 2, 'সুলভ মূল্যে জমির অংশ কিনুন এবং বসুন্ধরা আ/এ-তে নির্মাণ ব্যয়ে আপনার অ্যাপার্টমেন্ট তৈরি করুন', '', 0, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, 24, 2, 'RAYYAN PROPERTIES', NULL, '01300773000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 20:58:29', 24, '2021-08-26 20:58:29', NULL, 6, '[\"2\",\"3\"]', NULL, 0, 0, 0, 0, 1),
(33, 1029, 'sale', 1, 'Apartment', 'Mirpur 6', 'Ongoing', 3, '0', 0, 0, '0', 1, '1590 sqft, 3 Beds Under Construction Flats for Sale at Mirpur 6', '1590-sqft-3-beds-under-construction-flats-for-sale-at-mirpur-6', 0, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, 24, 2, 'RAYYAN PROPERTIES', NULL, '01300773000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 21:00:30', 24, '2021-08-26 21:00:30', NULL, 6, '[\"6\"]', NULL, 0, 0, 0, 0, 1),
(34, 1030, 'sale', 1, 'Apartment', 'Baridhara', 'Ready', 1, '0', 0, 0, '0', 2, '2480 sqft, 4 Beds Ready Apartment/Flats for Sale at Baridhara', '2480-sqft-4-beds-ready-apartmentflats-for-sale-at-baridhara', 0, 1, 'Dhaka', 17, 'Baridhara', NULL, NULL, 24, 2, 'RAYYAN PROPERTIES', NULL, '01300773000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-26 21:03:04', 24, '2021-08-26 21:03:04', NULL, 6, '[\"3\",\"6\"]', NULL, 0, 0, 0, 0, 1),
(35, 1031, 'sale', 7, 'Land', 'Purbachal', 'Ready', 1, '0', 0, 0, '0', 2, '3 katha,Residential Plot for Sale at Purbachal', '3-katharesidential-plot-for-sale-at-purbachal', 0, 1, 'Dhaka', 18, 'Purbachal', NULL, NULL, 25, 2, 'Purbachal Marine City', NULL, '01345217032', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 18:05:48', 25, '2021-08-27 18:05:48', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(36, 1032, 'rent', 7, 'Land', 'Purbachal', 'Ready', 1, '0', 0, 0, '0', 1, '5 katha, Ready Residential Plot for Sale at Purbachal', '5-katha-ready-residential-plot-for-sale-at-purbachal', 0, 1, 'Dhaka', 18, 'Purbachal', NULL, NULL, 25, 2, 'Purbachal Marine City', NULL, '01345217032', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 18:47:15', 25, '2021-08-27 18:47:15', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(37, 1033, 'rent', 7, 'Land', 'Purbachal', 'Ready', 1, '0', 0, 0, '0', 1, 'Rare plot at Vip sector_17, 3 katha, Ready Residential Plot for Sale at Purbachal', 'rare-plot-at-vip-sector-17-3-katha-ready-residential-plot-for-sale-at-purbachal', 0, 1, 'Dhaka', 18, 'Purbachal', NULL, NULL, 25, 2, 'Purbachal Marine City', NULL, '01345217032', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 19:10:10', 25, '2021-08-27 19:10:10', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(38, 1034, 'sale', 7, 'Land', 'Savar', 'Semi Ready', 2, '0', 0, 0, '0', 1, '5 katha, Almost Ready Residential Plot for Sale at Savar', '5-katha-almost-ready-residential-plot-for-sale-at-savar', 0, 1, 'Dhaka', 19, 'Savar', NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 19:21:35', 26, '2021-08-27 19:21:35', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(39, 1035, 'sale', 7, 'Land', 'Hemayetpur', 'Ready', 1, '0', 0, 0, '0', 1, '5 katha, Ready Residential Plot for Sale at Hemayetpur', '5-katha-ready-residential-plot-for-sale-at-hemayetpur', 0, 1, 'Dhaka', 19, 'Savar', NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 19:30:02', 26, '2021-08-27 19:30:02', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(40, 1036, 'sale', 7, 'Land', 'Hemayetpur', 'Ready', 1, '0', 0, 0, '0', 1, '10 katha, Ready Residential Plot for Sale at Hemayetpur', '10-katha-ready-residential-plot-for-sale-at-hemayetpur', 0, 1, 'Dhaka', 19, 'Savar', NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 19:34:17', 26, '2021-08-27 19:34:17', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(41, 1037, 'sale', 7, 'Land', 'Hemayetpur', 'Ready', 1, '0', 0, 0, '0', 1, '5 katha, Almost Ready Residential Plot for Sale at Savar', '5-katha-almost-ready-residential-plot-for-sale-at-savar-1037', 0, 1, 'Dhaka', 19, 'Savar', NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 19:38:37', 26, '2021-08-27 19:38:37', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(42, 1038, 'sale', 7, 'Land', 'Savar', 'Ready', 1, '0', 0, 0, '0', 1, '10 katha, Under Development Residential Plot for Sale at Savar', '10-katha-under-development-residential-plot-for-sale-at-savar', 0, 1, 'Dhaka', 19, 'Savar', NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 19:42:08', 26, '2021-08-27 19:42:08', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(43, 1039, 'sale', 7, 'Land', 'Savar', 'Ready', 1, '0', 0, 0, '0', 1, '3 katha, Under Development Residential Plot for Sale at Savar', '3-katha-under-development-residential-plot-for-sale-at-savar', 0, 1, 'Dhaka', 19, 'Savar', NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 19:44:58', 26, '2021-08-27 19:44:58', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(44, 1040, 'sale', 7, 'Land', 'savar', 'Ready', 1, '0', 0, 0, '0', 1, '3 katha, Under Development Residential Plot for Sale at Savar', '3-katha-under-development-residential-plot-for-sale-at-savar-1040', 0, 1, 'Dhaka', 19, 'Savar', NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 19:48:16', 26, '2021-08-27 19:48:37', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(45, 1041, 'sale', 7, 'Land', 'Narayangonj Sadar, Narayanganj', 'Ready', 1, '0', 0, 0, '0', 1, '4 katha, Under Development Residential Plot for Sale at Narayangonj Sadar', '4-katha-under-development-residential-plot-for-sale-at-narayangonj-sadar', 0, 4, 'Narayanganj', 15, 'Narayanganj Sadar', NULL, NULL, 27, 2, 'Tarikul Islam', NULL, '01484773892', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 19:59:18', 27, '2021-08-27 19:59:18', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(46, 1042, 'sale', 1, 'Apartment', 'Basundhara', 'Ongoing', 3, '0', 0, 0, '0', 1, '1675 sqft, 3 Beds Under Construction Apartment/Flats for Sale at Bashundhara R/A', '1675-sqft-3-beds-under-construction-apartmentflats-for-sale-at-bashundhara-ra', 0, 1, 'Dhaka', 1, 'Mirpur', 26, 'Mirpur 1 Panirtanki', 27, 2, 'Tarikul Islam', NULL, '01484773892', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 20:06:11', 27, '2021-09-05 19:20:40', 27, 6, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', NULL, 0, 0, 0, 0, 1),
(47, 1043, 'rent', 7, 'Land', 'Badda', 'Ongoing', 3, '0', 0, 0, '0', 1, '3-10 katha, Rajuk Approved Ready Residential Plot for Sale at Satarkul, Badda.', '3-10-katha-rajuk-approved-ready-residential-plot-for-sale-at-satarkul-badda', 0, 1, 'Dhaka', 20, 'Badda', NULL, NULL, 28, 2, 'ismail munna', NULL, '01708042445', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 20:21:31', 28, '2021-08-27 20:21:31', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(48, 1044, 'sale', 7, 'Land', 'Basundhara', 'Ready', 1, '0', 0, 0, '0', 1, '4 katha, Ready Residential Plot for Sale at Bashundhara R/A', '4-katha-ready-residential-plot-for-sale-at-bashundhara-ra', 0, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, 29, 2, 'anur mia', NULL, '01928374854', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 20:28:41', 29, '2021-08-27 20:28:41', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(49, 1045, 'sale', 7, 'Land', 'Aftab nagar', 'Ready', 1, '0', 0, 0, '0', 1, '3 katha, Ready Residential Plot for Sale at Aftab Nagar', '3-katha-ready-residential-plot-for-sale-at-aftab-nagar', 0, 1, 'Dhaka', 21, 'Aftab Nagar', NULL, NULL, 30, 2, 'Shah', NULL, '01982737464', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 20:38:26', 30, '2021-08-27 20:38:26', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1),
(50, 1046, 'roommate', 1, 'Apartment', 'Mirpur 12', 'Ready', 1, '0', 0, 0, '0', 1, 'sublet Female for a Roommates at Mirpur 12', 'sublet-female-for-a-roommates-at-mirpur-12', 0, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, 31, 2, 'Effat ara', NULL, '01675463792', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 20:53:28', 31, '2021-08-27 20:53:28', NULL, 4, '[\"2\"]', NULL, 0, 0, 0, 0, 1),
(51, 1047, 'roommate', 1, 'Apartment', 'mirpur 1', 'Ready', 1, '0', 0, 0, '0', 1, 'Independent Mess Male for a Roommates at Mirpur 1', 'independent-mess-male-for-a-roommates-at-mirpur-1', 0, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, 32, 2, 'minhaz', NULL, '01787658769', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 20:59:33', 32, '2021-08-27 20:59:33', NULL, 3, '[\"2\",\"3\"]', NULL, 0, 0, 0, 0, 1),
(52, 1048, 'rent', 2, 'Office', 'mirpur 1', 'Ready', 1, '0', 0, 0, '0', 1, 'সুদৃশ্য ডেকোরেশনসহ একটি আউটলেট অফিস ভাড়া দেওয়া হবে।', '-1048', 0, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, 33, 2, 'Kh Nazmul', NULL, '01523647392', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-27 21:10:15', 33, '2021-08-27 21:10:15', NULL, 3, 'null', NULL, 0, 0, 0, 0, 1),
(53, 1049, 'rent', 3, 'Shop', 'Mirpur 2', 'Used', 4, '0', 0, 0, '0', 1, '1000 sqft, Showroom/Shop/Restaurant for Rent at Mirpur 2', '1000-sqft-showroomshoprestaurant-for-rent-at-mirpur-2', 0, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, 34, 2, 'Md. Nurul Islam', NULL, '01978541254', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-28 04:45:25', 34, '2021-08-28 04:45:25', NULL, 1, '[\"1\"]', NULL, 0, 0, 0, 0, 1),
(54, 1050, 'rent', 1, 'Apartment', 'rampura', 'Used', 4, '0', 0, 0, '0', 1, '1800 sqft, 3 Beds Apartment/Flats for Rent at Rampura', '1800-sqft-3-beds-apartmentflats-for-rent-at-rampura', 0, 1, 'Dhaka', 10, 'Rampura', NULL, NULL, 35, 2, 'Rayyan Properties', NULL, '01821547896', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-28 04:55:31', 35, '2021-08-28 04:55:31', NULL, 6, '[\"4\"]', NULL, 0, 0, 0, 0, 1),
(55, 1051, 'rent', 1, 'Apartment', 'uttara', 'Ready', 1, '0', 0, 0, '0', 1, '1654 sqft, 3 Beds Apartment/Flats for Rent at Uttara', '1654-sqft-3-beds-apartmentflats-for-rent-at-uttara', 0, 1, 'Dhaka', 9, 'Uttara', NULL, NULL, 36, 2, 'Md. Riazul Islam', NULL, '01865239874', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-28 05:09:01', 36, '2021-08-28 05:09:01', NULL, 6, '[\"4\"]', NULL, 0, 0, 0, 0, 1),
(56, 1052, 'rent', 1, 'Apartment', 'Mirpur', 'Used', 4, '0', 0, 0, '0', 1, '1300 sqft, 3 Beds Apartment/Flats for Rent at Mirpur 12', '1300-sqft-3-beds-apartmentflats-for-rent-at-mirpur-12', 0, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, 37, 2, 'Md. Abu Zahid', NULL, '071785421365', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-28 05:31:29', 37, '2021-08-28 05:31:29', NULL, 6, '[\"4\"]', NULL, 0, 0, 0, 0, 1),
(57, 1053, 'rent', 1, 'Apartment', 'Basundhara', 'Ready', 1, '0', 0, 0, '0', 1, '2250 sqft, 4 Beds Flats for Rent at Bashundhara R/A', '2250-sqft-4-beds-flats-for-rent-at-bashundhara-ra', 0, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, 38, 2, 'kazi salimuddin', NULL, '01698547993', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-28 05:46:00', 38, '2021-09-05 23:48:59', NULL, 5, '[\"5\"]', NULL, 0, 0, 0, 0, 1),
(58, 1054, 'rent', 1, 'Apartment', 'Kathalbagan', 'Ready', 1, '0', 0, 0, '0', 1, '1250 sqft, 2 Beds Flats for Rent at Kathalbagan', '1250-sqft-2-beds-flats-for-rent-at-kathalbagan', 1, 1, 'Dhaka', 22, 'Kathalbagan', NULL, NULL, 39, 2, 'Dr. Fazle Rabbi', NULL, '01987541254', NULL, 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-28 05:52:44', 39, '2021-09-01 23:45:09', 2, 6, '[\"2\"]', NULL, 10, 1, 1, 0, 1),
(59, 1055, 'sale', 5, 'Industrial space', 'Gazipur Sadar', 'Ready', 1, '0', 0, 0, '0', 2, '20000 sqft, Ready Industrial Space for Sale at Gazipur Sadar', '20000-sqft-ready-industrial-space-for-sale-at-gazipur-sadar', 1, 5, 'Gazipur', 24, 'Gazipur Sadar', NULL, NULL, 40, 2, 'M.S. Rana', NULL, '01558745698', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-28 06:00:35', 40, '2021-09-01 01:11:29', 2, 2, '[\"1\"]', NULL, 10, 1, 1, 0, 1);

--
-- Triggers `PRD_LISTINGS`
--
DROP TRIGGER IF EXISTS `AFTER_PRD_LISTINGS_INSERT`;
DELIMITER $$
CREATE TRIGGER `AFTER_PRD_LISTINGS_INSERT` AFTER INSERT ON `PRD_LISTINGS` FOR EACH ROW BEGIN

DECLARE VAR_TOTAL_LISTING INT(10) DEFAULT 0;
DECLARE VAR_TOTAL_TYPE_LISTING INT(10) DEFAULT 0;
DECLARE VAR_TOTAL_LISTING_CITY INT(10) DEFAULT 0;

SELECT COUNT(*) INTO VAR_TOTAL_LISTING FROM PRD_LISTINGS WHERE F_USER_NO = NEW.F_USER_NO AND STATUS <> 50 ;
SELECT COUNT(*) INTO VAR_TOTAL_TYPE_LISTING FROM PRD_LISTINGS WHERE F_PROPERTY_TYPE_NO = NEW.F_PROPERTY_TYPE_NO AND STATUS <> 50 ;
SELECT COUNT(*) INTO VAR_TOTAL_LISTING_CITY FROM PRD_LISTINGS WHERE F_CITY_NO = NEW.F_CITY_NO AND STATUS <> 50 ;

UPDATE WEB_USER SET TOTAL_LISTING =  VAR_TOTAL_LISTING WHERE PK_NO = NEW.F_USER_NO;
UPDATE PRD_PROPERTY_TYPE SET TOTAL_LISTING =  VAR_TOTAL_TYPE_LISTING WHERE PK_NO = NEW.F_PROPERTY_TYPE_NO;
UPDATE SS_CITY SET TOTAL_LISTING =  VAR_TOTAL_LISTING_CITY WHERE PK_NO = NEW.F_CITY_NO;

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `AFTER_PRD_LISTINGS_UPDATE`;
DELIMITER $$
CREATE TRIGGER `AFTER_PRD_LISTINGS_UPDATE` AFTER UPDATE ON `PRD_LISTINGS` FOR EACH ROW BEGIN

DECLARE VAR_TOTAL_LISTING INT(10) DEFAULT 0;
DECLARE VAR_TOTAL_TYPE_LISTING INT(10) DEFAULT 0;
DECLARE VAR_TOTAL_LISTING_CITY INT(10) DEFAULT 0;

SELECT COUNT(*) INTO VAR_TOTAL_LISTING FROM PRD_LISTINGS WHERE F_USER_NO = NEW.F_USER_NO AND STATUS <> 50 ;
SELECT COUNT(*) INTO VAR_TOTAL_TYPE_LISTING FROM PRD_LISTINGS WHERE F_PROPERTY_TYPE_NO = NEW.F_PROPERTY_TYPE_NO AND STATUS <> 50 ;
SELECT COUNT(*) INTO VAR_TOTAL_LISTING_CITY FROM PRD_LISTINGS WHERE F_CITY_NO = NEW.F_CITY_NO AND STATUS <> 50 ;

UPDATE WEB_USER SET TOTAL_LISTING =  VAR_TOTAL_LISTING WHERE PK_NO = NEW.F_USER_NO;
UPDATE PRD_PROPERTY_TYPE SET TOTAL_LISTING =  VAR_TOTAL_TYPE_LISTING WHERE PK_NO = NEW.F_PROPERTY_TYPE_NO;
UPDATE SS_CITY SET TOTAL_LISTING =  VAR_TOTAL_LISTING_CITY WHERE PK_NO = NEW.F_CITY_NO;


END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `BEFORE_PRD_LISTINGS_INSERT`;
DELIMITER $$
CREATE TRIGGER `BEFORE_PRD_LISTINGS_INSERT` BEFORE INSERT ON `PRD_LISTINGS` FOR EACH ROW BEGIN

DECLARE VAR_CODE INT(40) DEFAULT 0;
DECLARE VAR_CITY_NAME VARCHAR(40) DEFAULT NULL;
DECLARE VAR_AREA_NAME VARCHAR(40) DEFAULT NULL;
DECLARE VAR_SUBAREA_NAME VARCHAR(40) DEFAULT NULL;
DECLARE VAR_PROPERTY_TYPE VARCHAR(40) DEFAULT NULL;
DECLARE VAR_PROPERTY_CONDITION VARCHAR(40) DEFAULT NULL;
DECLARE VAR_LISTING_TYPE VARCHAR(40) DEFAULT NULL;


SELECT IFNULL(MAX(CODE),1000) INTO VAR_CODE FROM PRD_LISTINGS;
SELECT CITY_NAME INTO VAR_CITY_NAME FROM SS_CITY WHERE PK_NO = NEW.F_CITY_NO;
SELECT AREA_NAME INTO VAR_AREA_NAME FROM SS_AREA WHERE PK_NO = NEW.F_AREA_NO;
SELECT AREA_NAME INTO VAR_SUBAREA_NAME FROM SS_AREA WHERE PK_NO = NEW.F_SUBAREA_NO;
SELECT 	PROPERTY_TYPE INTO VAR_PROPERTY_TYPE FROM PRD_PROPERTY_TYPE WHERE PK_NO = NEW.F_PROPERTY_TYPE_NO;
SELECT PROD_CONDITION INTO VAR_PROPERTY_CONDITION FROM PRD_PROPERTY_CONDITION WHERE PK_NO = NEW.F_PROPERTY_CONDITION;
SELECT NAME INTO VAR_LISTING_TYPE FROM PRD_LISTING_TYPE WHERE PK_NO = NEW.F_LISTING_TYPE;

SET NEW.CODE = VAR_CODE+1;

SET NEW.CITY_NAME = VAR_CITY_NAME;
SET NEW.AREA_NAME = VAR_AREA_NAME;
SET NEW.SUBAREA_NAME = VAR_SUBAREA_NAME;
SET NEW.PROPERTY_TYPE = VAR_PROPERTY_TYPE;
SET NEW.PROPERTY_CONDITION = VAR_PROPERTY_CONDITION;
SET NEW.LISTING_TYPE = VAR_LISTING_TYPE;

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `BEFORE_PRD_LISTINGS_UPDATE`;
DELIMITER $$
CREATE TRIGGER `BEFORE_PRD_LISTINGS_UPDATE` BEFORE UPDATE ON `PRD_LISTINGS` FOR EACH ROW BEGIN

DECLARE VAR_CITY_NAME VARCHAR(40) DEFAULT NULL;
DECLARE VAR_AREA_NAME VARCHAR(40) DEFAULT NULL;
DECLARE VAR_SUBAREA_NAME VARCHAR(40) DEFAULT NULL;
DECLARE VAR_PROPERTY_TYPE VARCHAR(40) DEFAULT NULL;
DECLARE VAR_PROPERTY_CONDITION VARCHAR(40) DEFAULT NULL;
DECLARE VAR_LISTING_TYPE VARCHAR(40) DEFAULT NULL;

SELECT CITY_NAME INTO VAR_CITY_NAME FROM SS_CITY WHERE PK_NO = NEW.F_CITY_NO;
SELECT AREA_NAME INTO VAR_AREA_NAME FROM SS_AREA WHERE PK_NO = NEW.F_AREA_NO;
SELECT AREA_NAME INTO VAR_SUBAREA_NAME FROM SS_AREA WHERE PK_NO = NEW.F_SUBAREA_NO;
SELECT PROPERTY_TYPE INTO VAR_PROPERTY_TYPE FROM PRD_PROPERTY_TYPE WHERE PK_NO = NEW.F_PROPERTY_TYPE_NO;
SELECT PROD_CONDITION INTO VAR_PROPERTY_CONDITION FROM PRD_PROPERTY_CONDITION WHERE PK_NO = NEW.F_PROPERTY_CONDITION;
SELECT NAME INTO VAR_LISTING_TYPE FROM PRD_LISTING_TYPE WHERE PK_NO = NEW.F_LISTING_TYPE;

SET NEW.CITY_NAME = VAR_CITY_NAME;
SET NEW.AREA_NAME = VAR_AREA_NAME;
SET NEW.SUBAREA_NAME = VAR_SUBAREA_NAME;
SET NEW.PROPERTY_TYPE = VAR_PROPERTY_TYPE;
SET NEW.PROPERTY_CONDITION = VAR_PROPERTY_CONDITION;
SET NEW.LISTING_TYPE = VAR_LISTING_TYPE;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `PRD_LISTINGS_SEO`
--

DROP TABLE IF EXISTS `PRD_LISTINGS_SEO`;
CREATE TABLE IF NOT EXISTS `PRD_LISTINGS_SEO` (
  `PK_NO` int(10) NOT NULL AUTO_INCREMENT,
  `F_LISTING_NO` int(10) DEFAULT NULL,
  `META_TITLE` varchar(100) DEFAULT NULL,
  `META_DESCRIPTION` varchar(300) DEFAULT NULL,
  `META_URL` varchar(100) DEFAULT NULL,
  `OG_IMAGE_PATH` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTINGS_SEO`
--

INSERT INTO `PRD_LISTINGS_SEO` (`PK_NO`, `F_LISTING_NO`, `META_TITLE`, `META_DESCRIPTION`, `META_URL`, `OG_IMAGE_PATH`) VALUES
(1, 14, NULL, NULL, NULL, NULL),
(2, 6, 'test', NULL, NULL, NULL),
(3, 59, NULL, NULL, '20000-sqft-ready-industrial-space-for-sale-at-gazipur-sadar', NULL),
(4, 15, NULL, NULL, '1125-sqft-3-beds-ready-studio-apartment-for-sale-at-cantonment', NULL),
(5, 58, NULL, NULL, '1250-sqft-2-beds-flats-for-rent-at-kathalbagan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_LISTING_ADDITIONAL_INFO`
--

DROP TABLE IF EXISTS `PRD_LISTING_ADDITIONAL_INFO`;
CREATE TABLE IF NOT EXISTS `PRD_LISTING_ADDITIONAL_INFO` (
  `PK_NO` bigint(20) NOT NULL AUTO_INCREMENT,
  `F_FACING_NO` int(2) DEFAULT NULL,
  `F_LISTING_NO` bigint(20) NOT NULL,
  `FACING` varchar(50) DEFAULT NULL,
  `HANDOVER_DATE` datetime DEFAULT NULL,
  `DESCRIPTION` text,
  `F_FEATURE_NOS` varchar(50) DEFAULT NULL COMMENT 'COMMA SEPARATED VALUES',
  `FEATURES` varchar(500) DEFAULT NULL COMMENT 'INSERT BY COMMA SEPERATED',
  `F_NEARBY_NOS` varchar(50) DEFAULT NULL COMMENT 'COMMA SEPARATED VALUES',
  `NEARBY` varchar(500) DEFAULT NULL COMMENT 'INSERT BY COMMA SEPERATED',
  `LOCATION_MAP` varchar(500) DEFAULT NULL,
  `VIDEO_CODE` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTING_ADDITIONAL_INFO`
--

INSERT INTO `PRD_LISTING_ADDITIONAL_INFO` (`PK_NO`, `F_FACING_NO`, `F_LISTING_NO`, `FACING`, `HANDOVER_DATE`, `DESCRIPTION`, `F_FEATURE_NOS`, `FEATURES`, `F_NEARBY_NOS`, `NEARBY`, `LOCATION_MAP`, `VIDEO_CODE`) VALUES
(1, NULL, 1, '1', '2021-05-08 00:00:00', 'Test Description', '[\"1\",\"2\"]', NULL, '[\"1\",\"2\",\"3\"]', NULL, 'https://www.google.com/maps/place/Uttara+House+Building/@23.8710489,90.4062432,15z/data=!4m5!3m4!1s0x3755c43bb6228489:0xeeba9aedb454ee7f!8m2!3d23.874278!4d90.400369', 'https://www.youtube.com/watch?v=OGI0fNvr4fo'),
(2, NULL, 1, '1', '2021-05-08 00:00:00', 'Test Description', '[\"1\",\"2\",\"4\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, 'https://www.google.com/maps/place/Uttara+House+Building/@23.8710489,90.4062432,15z/data=!4m5!3m4!1s0x3755c43bb6228489:0xeeba9aedb454ee7f!8m2!3d23.874278!4d90.400369', 'https://www.youtube.com/watch?v=OGI0fNvr4fo'),
(3, NULL, 2, NULL, '2021-05-10 00:00:00', 'মিউকরমাইকোসিস একটি বিরল সংক্রমণ। মিউকর নামে একটি ছত্রাকের সংস্পর্শে এলে এই সংক্রমণ হয়। সাধারণত মাটি, গাছপালা, পচনশীল ফল ও শাকসবজিতে এই ছত্রাক দেখা যায়। ডা. নায়ের বলেন, এই ছত্রাক সব জায়গায় থাকে। মাটি, বাতাস, এমনকি স্বাস্থ্যবান লোকের নাক ও শ্লেষ্মায়ও এটা পাওয়া যায়।', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(4, NULL, 3, '1', '2021-05-29 00:00:00', 'tttt', '[\"1\",\"2\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(5, NULL, 4, '1', '2021-09-11 00:00:00', '<p>This is New Under construction Apartment.Just few minutes walking distance from kollanpur bus stop. There are 3beds, 3toiets, Drawing, dunning, 3 verandha, kitchen with all ulitilites and parking available. I will suggest to visit the apartment. Thanks</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(6, 2, 5, 'North Facing', '2022-12-31 00:00:00', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Hyperion Park View</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Banasree , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1690 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;5th Floor, 9th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;4</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;13</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;57.5 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;December 31, 2022</li>\r\n</ul>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, 'https://www.google.com/maps?ll=23.757667,90.429444&z=16&t=m&hl=en&gl=BD&mapclient=embed', NULL),
(7, 1, 6, 'South Facing', '2022-09-30 00:00:00', '<p>Project Name: Runner Sheikh Khairuddin Palace.</p>\r\n\r\n<p>Address: 344, Dilu Road. New Eskaton.</p>\r\n\r\n<p>Storied: B+G+9</p>\r\n\r\n<p>Facing: West.</p>\r\n\r\n<p>Apt. Size: 1350-1480 sft.</p>\r\n\r\n<p>Handover Time: 36 month.</p>\r\n\r\n<p>For desing &amp; more details plz feel free to call.</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(8, NULL, 7, '1', '2021-11-25 00:00:00', '<p>Project Name: Zk Tower</p>\r\n\r\n<p>Loaction: 58 Gausal Azam Avenue, Sector-13, Uttara, Dhaka-1230.</p>\r\n\r\n<p>Land Area: 5 Katha</p>\r\n\r\n<p>Floor Size: +/-2500 sft.</p>\r\n\r\n<p>N.B: (+/- 1000 sft) usable space in ground floor with duplex nature.&nbsp;</p>\r\n\r\n<p>Exclusive Commercial Project on the Gausal Azam Avenue, Uttara,</p>\r\n\r\n<p>Available Open Space for Office, Showroom (Space are Open, You can design as your own Imagine)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>24 Hours Generator Backup and Car-parking, Lift with other Facilities</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Work Condition: Under Construction (Just Start the Construction), Already plan approved from Rajuk.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Installment Facility: You will pay the installment up to Handover date.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hand Over: Dec 2022</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Home Loan: IDLC,DBH , Brac Bank,City Bank. (We support you by provide Document to approved the loan from other Financial Institution.)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Exclusive Double Unit Apartment with attractive Price.......</p>', '[\"1\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\"]', NULL, NULL, NULL),
(9, NULL, 8, '1', '2021-08-07 00:00:00', '<p>This description update</p>', '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(10, NULL, 9, '1', '2021-08-31 00:00:00', '<p>Office Rent in Mirpur original 10 main road, opposite Mirpur -6 Popular Diagnostic, Hyperion Tower. 1st floor and 2nd floor, each floor 3500 sft,</p>\r\n\r\n<p><strong>Bank, Bima, Corporate Office preferable.</strong></p>\r\n\r\n<p>Contact:</p>\r\n\r\n<p>Attn. Arafatul Alam</p>\r\n\r\n<p>Hyperion Design &amp; Development Ltd.</p>\r\n\r\n<p>House # 02, Block # A, Road # 04, Section # 10<br />\r\nMirpur, Dhaka-1216, Bangladesh.</p>', '[\"1\",\"4\"]', NULL, '[\"1\",\"3\"]', NULL, NULL, NULL),
(11, NULL, 10, '1', '2021-08-28 00:00:00', NULL, '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(12, NULL, 11, '1', '2021-08-04 18:59:39', '<p>FULLY FURNISHED, ONE MASTER BED, ONE LIVING ROOM WITH SOFA CUM BED, TWO AIR CONDITIONER, GEYSER, 42 INCH TV, FRIDGE, WIFI, MICROWAVE OVEN, COFFEE MAKER.</p>', '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(13, NULL, 12, '1', '2021-08-05 00:00:00', '<p>Rent will be from 1st April 2020. In 1 flat 2 bedrooms with 2 bathrooms. I&#39;m staying in one room.&nbsp; another bedroom wants to give rent. Separate Bathrooms. Flat on the 1st floor. Job holder single person needs.</p>', '[\"2\",\"3\"]', NULL, '[\"2\"]', NULL, NULL, NULL),
(14, NULL, 13, '2', '2021-08-05 00:00:00', '<ul>\r\n	<li>Property Name:&nbsp;মেয়ে রুমমেট আবশ্যক-জুলাই/আগস্ট</li>\r\n	<li>&nbsp;Property Type &nbsp;:&nbsp;Independent Mess</li>\r\n	<li>&nbsp;Property For &nbsp;:&nbsp;Roommates/Paying Guest</li>\r\n	<li>&nbsp;Location &nbsp;:&nbsp;Mirpur 12 , Dhaka</li>\r\n	<li>&nbsp;Address &nbsp;:&nbsp;house : 22. road : 3. block : E. section : 12. Pallabi. Mirpur</li>\r\n	<li>&nbsp;&nbsp;Residence Type &nbsp;:&nbsp;Independent Mess</li>\r\n	<li>&nbsp;&nbsp;Gender &nbsp;:&nbsp;Female</li>\r\n	<li>&nbsp;&nbsp;Room Type &nbsp;:&nbsp;3 person in one Room</li>\r\n	<li>&nbsp;&nbsp;Bathroom &nbsp;:&nbsp;&nbsp;Attach</li>\r\n	<li>&nbsp;&nbsp;Balconies &nbsp;:&nbsp;&nbsp;No</li>\r\n	<li>&nbsp;&nbsp;Deposit Amount &nbsp;:&nbsp;&nbsp;2,500</li>\r\n	<li>&nbsp;&nbsp;Floor Number &nbsp;:&nbsp;&nbsp;1st Floor,</li>\r\n	<li>&nbsp;&nbsp;Total Number&nbsp;:&nbsp;&nbsp;7</li>\r\n	<li>&nbsp;&nbsp;Facing :South Facing</li>\r\n	<li>&nbsp;&nbsp;Available From:&nbsp;July 08, 2020</li>\r\n</ul>', '[\"2\",\"3\"]', NULL, '[\"1\",\"2\",\"3\"]', NULL, NULL, NULL),
(15, NULL, 14, '1', '2021-08-05 00:00:00', '<p>(SUPER HOSTEL BD)<br />\r\nAddress: Aftabnagar (near EWU) and Uttara (Near House building/north tower)<br />\r\nWe are offering hostel seat for bachelor, Male only.<br />\r\ntwo unit in this building with every floor.<br />\r\nwe are providing: multi functional bed, where you can stay and use like a room or cabinet process locker, reading table, wardrobe withdrwaer and so on. Its totally new in Bangladesh.<br />\r\nfacilities:<br />\r\n-3 time proper set manue and fixed meal<br />\r\n-generator, elevator,Air conditioner,<br />\r\n-washing machine, reading room, theatre common room,<br />\r\n-fiber pillow and cover, mattress and cover, personal locker, wight machine, RO system, 24 hour security, fire security,&nbsp;<br />\r\n-Hair dryer, electric shaver, cleaning service, auto shoe polisher and box, rechargeable desk lamp and so on with other 10 more facilties.<br />\r\nat first please visit our office and see your desire room than fix it for your next living way. contact us : 01678403882 / 01678403884</p>', '[\"2\",\"3\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(16, 2, 15, 'North Facing', '2021-06-25 00:00:00', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Kingdom Habil Complex</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Studio Apartment</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Cantonment , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1125 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;1st Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;2</li>\r\n	<li>&nbsp;Garages:&nbsp;No Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Furnished</li>\r\n	<li>&nbsp;Facing:&nbsp;East Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;10 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;June 25, 2021</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(17, 1, 16, 'South Facing', '2021-03-30 00:00:00', '<ul>\r\n	<li>\r\n	<p>Safety &amp; Security:&nbsp;<br />\r\n	Common areas surveillance under CCTV;<br />\r\n	Firefighting equipment available in common area;<br />\r\n	Lighting of common area supported by solar energy &amp; generator;</p>\r\n\r\n	<p>Key Features :<br />\r\n	Lavish community hall;<br />\r\n	Marble on staircase and lift lobby;<br />\r\n	Cross ventilation facility in all rooms;<br />\r\n	Granite finished lift wall;<br />\r\n	Gardens on suitable location;<br />\r\n	Spaces lobby and driveway; Our main feature is handover on time with other commitment. We count every minutes; &nbsp;<br />\r\n	&nbsp;1 (one) apartment each floor and excellent floor layout;<br />\r\n	&nbsp;CC camera in front of main gate and lift lobby of typical floor;<br />\r\n	&nbsp;Marble on staircase and lift lobby;<br />\r\n	&nbsp;Full height windows on front side;<br />\r\n	&nbsp;Cross Ventilation facility in all rooms;<br />\r\n	&nbsp;1 Lift manufactured by ThyssenKrupp (Germany);<br />\r\n	&nbsp;16 unit&rsquo;s generator backup in every apartment;<br />\r\n	&nbsp;High capacity Generator manufactured by Parkins, UK (Supplier and maintenance by Energy pack);<br />\r\n	&nbsp;Ground floor &amp; Roof top gardens.</p>\r\n\r\n	<p>Feature List in Apartment:&nbsp;<br />\r\n	3 Bedrooms<br />\r\n	&nbsp;4 Large Veranda<br />\r\n	2 individual Living Rooms<br />\r\n	4 Bathrooms&nbsp;<br />\r\n	1 Dressing Area<br />\r\n	Cabinet Provision in all beds<br />\r\n	6 A/C Provision&nbsp;<br />\r\n	&nbsp;2 Fridge Provision<br />\r\n	1 Washing Machine Provision<br />\r\n	Maid Rooms &amp; Bathrooms<br />\r\n	1 Car parking space for each unit</p>\r\n	</li>\r\n</ul>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(18, 1, 17, 'South Facing', '2021-08-26 00:00:00', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Furnished office for rent</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Office Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Naya Paltan , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;61, Bijoy nagar, Dhaka</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;2000 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;1.80 Lac</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Furnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;14th Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;17</li>\r\n	<li>&nbsp;Available From :&nbsp;June 23, 2021</li>\r\n</ul>', '[\"1\",\"3\",\"4\"]', NULL, '[\"1\",\"3\"]', NULL, NULL, NULL),
(19, 1, 18, 'South Facing', '2023-12-30 00:00:00', '<p>Project Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; IMAGINE EASTWOOD</p>\r\n\r\n<p>Address &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Plot- 208, Road- 03, Block- B, Bashundhara R/A.</p>\r\n\r\n<p>Size &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2935 SFT,</p>\r\n\r\n<p>Land &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 7.5 Katha</p>\r\n\r\n<p>Facing &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; west</p>\r\n\r\n<p>Building Height &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; G+9</p>\r\n\r\n<p>Total Units &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 9 no&rsquo;s</p>\r\n\r\n<p>Parking &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 16 no&rsquo;s</p>\r\n\r\n<p>Handover &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; December 2023</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Apartment inside: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>4 Bedrooms;</p>\r\n\r\n<p>2 Living Rooms;</p>\r\n\r\n<p>5 Bathrooms;</p>\r\n\r\n<p>Dressing Area;</p>\r\n\r\n<p>6 A/C Provision;</p>\r\n\r\n<p>2 Fridge Provision;</p>\r\n\r\n<p>1 Car parking spaces;</p>\r\n\r\n<p>Water purification device in kitchen;</p>\r\n\r\n<p>Washing Machine Provision;</p>\r\n\r\n<p>Maid Rooms &amp; Bathrooms;</p>\r\n\r\n<p>19 unit&rsquo;s emergency generator backup.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Safety &amp; Security:</p>\r\n\r\n<p>&uuml; &nbsp;Common areas surveillance under CCTV.</p>\r\n\r\n<p>&uuml; &nbsp;Firefighting equipment available in common area.</p>\r\n\r\n<p>&uuml; &nbsp;Lighting of common area supported by solar energy &amp; generator.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Common Key Features:</p>\r\n\r\n<p>&uuml; &nbsp;50% open space.</p>\r\n\r\n<p>&uuml; &nbsp;Lavish community hall.</p>\r\n\r\n<p>&uuml; &nbsp;GYM;</p>\r\n\r\n<p>&uuml; &nbsp;Indoor playing room.</p>\r\n\r\n<p>&uuml; &nbsp;Decorative guest room and all common area.</p>\r\n\r\n<p>&uuml; &nbsp;Gardens on suitable location.</p>\r\n\r\n<p>&uuml; &nbsp;Water fountain in ground floor.</p>\r\n\r\n<p>&uuml; &nbsp;Spaces lobby and driveway.</p>\r\n\r\n<p>&uuml; &nbsp;Driver&rsquo;s waiting room with other facility.</p>\r\n\r\n<p>&uuml; &nbsp;1 Lifts&nbsp;</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(20, 1, 19, 'South Facing', '2021-05-04 00:00:00', '<p>Project Detail&nbsp;<br />\r\nPlot Area&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5 Katha&nbsp;<br />\r\nNumber of Apt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7 Nos. (Single Unit each floor)&nbsp;<br />\r\nApartment Size&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2300 sft (7th&nbsp;floor)<br />\r\nNumber of Parking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;08 Cars&nbsp;<br />\r\nBuilding Height&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7 Storied&nbsp;<br />\r\nHandover&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;March 2021</p>\r\n\r\n<p>Safety &amp; Security:&nbsp;<br />\r\nCommon areas surveillance under CCTV;<br />\r\nFirefighting equipment available in common area;<br />\r\nLighting of common area supported by solar energy &amp; generator;</p>\r\n\r\n<p>Key Features :<br />\r\nLavish community hall;<br />\r\nMarble on staircase and lift lobby;<br />\r\nCross ventilation facility in all rooms;<br />\r\nGranite finished lift wall;<br />\r\nGardens on suitable location;<br />\r\nSpaces lobby and driveway; Our main feature is handover on time with other commitment. We count every minutes; &nbsp;<br />\r\n&nbsp;1 (one) apartment each floor and excellent floor layout;<br />\r\n&nbsp;CC camera in front of main gate and lift lobby of typical floor;<br />\r\n&nbsp;Marble on staircase and lift lobby;<br />\r\n&nbsp;Full height windows on front side;<br />\r\n&nbsp;Cross Ventilation facility in all rooms;<br />\r\n&nbsp;1 Lift manufactured by ThyssenKrupp (Germany);<br />\r\n&nbsp;16 unit&rsquo;s generator backup in every apartment;<br />\r\n&nbsp;High capacity Generator manufactured by Parkins, UK (Supplier and maintenance by Energy pack);<br />\r\n&nbsp;Ground floor &amp; Roof top gardens.</p>\r\n\r\n<p>Feature List in Apartment:&nbsp;<br />\r\n3 Bedrooms<br />\r\n&nbsp;4 Large Veranda<br />\r\n2 individual Living Rooms<br />\r\n4 Bathrooms&nbsp;<br />\r\n1 Dressing Area<br />\r\nCabinet Provision in all beds<br />\r\n6 A/C Provision&nbsp;<br />\r\n&nbsp;2 Fridge Provision<br />\r\n1 Washing Machine Provision<br />\r\nMaid Rooms &amp; Bathrooms<br />\r\n1 Car parking space for each unit</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(21, 1, 20, 'South Facing', '2021-03-21 00:00:00', '<p>Safety &amp; Security:&nbsp;<br />\r\nCommon areas surveillance under CCTV;<br />\r\nFirefighting equipment available in common area;<br />\r\nLighting of common area supported by solar energy &amp; generator;</p>\r\n\r\n<p>Key Features :<br />\r\nLavish community hall;<br />\r\nMarble on staircase and lift lobby;<br />\r\nCross ventilation facility in all rooms;<br />\r\nGranite finished lift wall;<br />\r\nGardens on suitable location;<br />\r\nSpaces lobby and driveway; Our main feature is handover on time with other commitment. We count every minutes; &nbsp;<br />\r\n&nbsp;1 (one) apartment each floor and excellent floor layout;<br />\r\n&nbsp;CC camera in front of main gate and lift lobby of typical floor;<br />\r\n&nbsp;Marble on staircase and lift lobby;<br />\r\n&nbsp;Full height windows on front side;<br />\r\n&nbsp;Cross Ventilation facility in all rooms;<br />\r\n&nbsp;1 Lift manufactured by ThyssenKrupp (Germany);<br />\r\n&nbsp;16 unit&rsquo;s generator backup in every apartment;<br />\r\n&nbsp;High capacity Generator manufactured by Parkins, UK (Supplier and maintenance by Energy pack);<br />\r\n&nbsp;Ground floor &amp; Roof top gardens.</p>\r\n\r\n<p>Feature List in Apartment:&nbsp;<br />\r\n3 Bedrooms<br />\r\n&nbsp;4 Large Veranda<br />\r\n2 individual Living Rooms<br />\r\n4 Bathrooms&nbsp;<br />\r\n1 Dressing Area<br />\r\nCabinet Provision in all beds<br />\r\n6 A/C Provision&nbsp;<br />\r\n&nbsp;2 Fridge Provision<br />\r\n1 Washing Machine Provision<br />\r\nMaid Rooms &amp; Bathrooms<br />\r\n1 Car parking space for each unit</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"3\",\"4\"]', NULL, NULL, NULL),
(22, 1, 21, 'South Facing', '2022-12-30 00:00:00', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;LUCKY ROWSHAN</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1600 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 5th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;04</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;No Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;N/A</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;N/A</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;December 30, 2022</li>\r\n</ul>', '[\"2\",\"3\",\"4\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(23, 1, 22, 'South Facing', '2021-05-23 00:00:00', '<p>SHAHABUDDIN PLAZA&nbsp;</p>\r\n\r\n<p>HOUSE#13-23,ROAD#01,JANATA CO-OPERATIVE HOUSING SOCIETY LTD.</p>\r\n\r\n<p>RING ROAD,ADABOR,DHAKA-1207,BANGLADESH</p>', '[\"3\",\"4\"]', NULL, '[\"2\"]', NULL, NULL, NULL),
(24, 1, 23, 'South Facing', '2021-03-03 00:00:00', '<ul>\r\n	<li>roperty Name&nbsp;:&nbsp;&nbsp;SHAHABUDDIN PLAZA</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Office Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;SHAHABUDDIN PLAZA,House:13-23,Road#01,Janata Co-Operative Housing Society Ltd.Ring Road,Adabor Dhaka-1207</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;1100 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;0</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Furnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;4th Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;15</li>\r\n	<li>&nbsp;Available From :&nbsp;March 03, 2021</li>\r\n</ul>', '[\"1\",\"3\",\"4\"]', NULL, '[\"1\",\"3\"]', NULL, NULL, NULL),
(25, 1, 24, 'South Facing', '2021-05-02 00:00:00', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;Lucky Rowshan</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1438 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 6th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;3</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Semi-Furnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;10 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;March 02, 2021</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\",\"3\"]', NULL, NULL, NULL),
(26, 1, 25, 'South Facing', '2022-12-30 00:00:00', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;LUCKY ROWSHAN</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1912 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 8th Floor, 9th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;04</li>\r\n	<li>&nbsp;Baths :&nbsp;04</li>\r\n	<li>&nbsp;Balconies:&nbsp;4</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;15</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Furnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;10 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;December 30, 2022</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(27, 1, 26, 'South Facing', '2021-03-02 00:00:00', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Shahabuddin Plaza</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Office Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;SHAHABUDDIN PLAZA (3rd FLOOR), House: 13-23, Road # 1, Janata Co-operative Housing society ltd, Ring Road, Adabor, Dhaka- 1207</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;700 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;0</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;4th Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;15</li>\r\n	<li>&nbsp;Available From :&nbsp;March 02, 2021</li>\r\n</ul>', '[\"2\",\"3\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(28, 1, 27, 'South Facing', '2021-03-03 00:00:00', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Shahabuddin Plaza</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Showroom/Shop/Restaurant</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;SHAHABUDDIN PLAZA (3rd FLOOR), House: 13-23, Road # 1, Janata Co-operative Housing society ltd, Ring Road, Adabor, Dhaka- 1207</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;264 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;0</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;Ground Floor, 1st Floor, 2nd Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;15</li>\r\n	<li>&nbsp;Available From :&nbsp;March 02, 2021</li>\r\n</ul>', '[\"3\"]', NULL, '[\"2\"]', NULL, NULL, NULL),
(29, 2, 28, 'North Facing', '2020-12-01 00:00:00', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Lucky Light House</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Mirpur 14 , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1980 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 4th Floor, 6th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;No Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;7</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;West Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;3 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;December 01, 2020</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(30, 1, 29, 'South Facing', '2021-02-21 00:00:00', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;SHAHABUDDIN PLAZA</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Showroom/Shop/Restaurant</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;SHAHABUDDIN PLAZA,House:13-23,Road#01,Janata Co-Operative Housing Society Ltd.Ring Road,Adabor Dhaka-1207</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;1000 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;50.00 Lac</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Semi-Furnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;1st Floor, 2nd Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;3</li>\r\n	<li>&nbsp;Available From :&nbsp;February 14, 2021</li>\r\n</ul>', '[\"1\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(31, 1, 30, 'South Facing', '2021-08-27 00:00:00', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;Agrani Bank, Bangabandhu Road Corporate Branch, Narayanganj</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Office Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Narayangonj Sadar , Narayanganj</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;Ground Floor of 32/1, Bangabandhu Road, Narayanganj</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;3200 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;5.00 Lac</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Semi-Furnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;Ground Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;4</li>\r\n	<li>&nbsp;Available From :&nbsp;February 12, 2020</li>\r\n</ul>', '[\"1\",\"3\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(32, 1, 31, 'South Facing', '2021-12-22 00:00:00', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;NP House</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Malibag , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1290 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;2</li>\r\n	<li>&nbsp;Garages:&nbsp;No Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;19 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;December 22, 2021</li>\r\n</ul>', '[\"2\",\"3\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(33, 1, 32, 'South Facing', '2021-06-30 00:00:00', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;Mustaha Mansion.</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Bashundhara R/A , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1300 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;Resale</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;1st Floor, 2nd Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;2</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;6 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;June 30, 2021</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(34, 1, 33, 'South Facing', '2023-12-29 00:00:00', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;RP House</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Mirpur 6 , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1590 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;8th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;2</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;North Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;7.5 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;December 29, 2023</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(35, 1, 34, 'South Facing', '2021-08-03 00:00:00', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;Mohananda Maloti</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Baridhara , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;2583 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;Resale</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 5th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;04</li>\r\n	<li>&nbsp;Baths :&nbsp;05</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;5</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;N/A katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;July 11, 2020</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\",\"3\"]', NULL, NULL, NULL),
(36, 1, 35, 'South Facing', '2022-09-28 00:00:00', '<p>Project Name : Purbachal Marine City</p>\r\n\r\n<p>Developer : Atlantic Properties &amp; Development Ltd</p>\r\n\r\n<p>Project Size : 1,338 Bigha</p>\r\n\r\n<p>Number Of Plots : 4000 (approx)</p>\r\n\r\n<p>Blocks : A, B and C</p>\r\n\r\n<p>Plot Sizes : 3, 5, 10</p>\r\n\r\n<p>Road Sizes : 100 ft. Main Avenue Road,</p>\r\n\r\n<p>60 ft. &amp; 40 ft. and 25 ft. Inner Roads</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(37, 1, 36, 'South Facing', '2020-09-28 00:00:00', '<p>Project Name : Purbachal Marine City</p>\r\n\r\n<p>Developers : Atlantic Properties and development ltd</p>\r\n\r\n<p>Project Sizes : 1,338 Bigha</p>\r\n\r\n<p>Number Of Plots : 4000 approx</p>\r\n\r\n<p>Blocks : A, B, C</p>\r\n\r\n<p>Plot Sizes : 3,5,10</p>\r\n\r\n<p>Road Sizes : 100 ft Main Avenue Road, 60 ft. &amp; 40 ft and 25 ft Inner road</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(38, 1, 37, 'South Facing', '2021-08-20 00:00:00', NULL, '[\"2\",\"3\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(39, 1, 38, 'South Facing', '2021-12-16 00:00:00', '<p>একটি সনামধন্য গ্রুপ অফ কোম্পানির উদ্যোগে -&nbsp;</p>\r\n\r\n<p>Gandhariya, Boliyarpur, hemayetpur.</p>\r\n\r\n<p>সরকার অনুমোদিত মেট্রোরেল MRT-5 ডিপো এর সন্নিকটে প্রস্তাবিত ৮০&#39; ও ৬০&#39; রোডের সাথেই&nbsp; হেমায়েতপুর, ব্যাংক কলোনি, সাভার, বিরুলিয়া, উত্তরা, ইপিজেড ও আশুলিয়ার সংযোগ পয়েন্ট এ প্রকৃতিগতভাবে উঁচু জমিতে ৩, ৫, ১০,২০ কাঠার প্লট বিক্রয় চলছে। এটি কোন প্রজেক্ট নয়, একটি &quot;মিনি রেসিডেন্স কমিউনিটি প্লান&quot;। ভবিষ্যতের একটি নিরাপদ ও লাভজনক বিনিয়োগের একটি সুবর্ণ সুযোগ। বিভিন্ন করপোরেট ও একক বিনিয়োগকারীদের ঘুরে দেখে যাওয়ার আমন্ত্রণ রইলো।।।</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(40, 1, 39, 'South Facing', '2021-02-08 00:00:00', '<p>Sand filling work is Running. বালি ভরাটের কাজ চলছে। ছবিতে দেখুন।</p>\r\n\r\n<p>MRT Mettro rail line 5 work is running. মেট্টোরেলের কাজ শুরু হয়েছে। ছবিতে দেখুন।&nbsp;</p>\r\n\r\n<p>আগামী ২ বছরে মুল্য ৩ গুণ হওয়ার নিশ্চয়তা।</p>\r\n\r\n<p>একটি সনামধন্য গ্রুপ অফ কোম্পানির উদ্যোগে -&nbsp;</p>\r\n\r\n<p>Gandhariya, Boliyarpur, hemayetpur.</p>\r\n\r\n<p>সরকার অনুমোদিত মেট্রোরেল MRT-5 ডিপো এর সন্নিকটে প্রস্তাবিত ৮০&#39; ও ৬০&#39; রোডের সাথেই&nbsp; হেমায়েতপুর, ব্যাংক কলোনি, সাভার, বিরুলিয়া, উত্তরা, ইপিজেড ও আশুলিয়ার সংযোগ পয়েন্ট এ প্রকৃতিগতভাবে উঁচু জমিতে ৩, ৫, ১০,২০ কাঠার প্লট বিক্রয় চলছে। এটি কোন প্রজেক্ট নয়, একটি &quot;মিনি রেসিডেন্স কমিউনিটি প্লান&quot;। ভবিষ্যতের একটি নিরাপদ ও লাভজনক বিনিয়োগের একটি সুবর্ণ সুযোগ। বিভিন্ন করপোরেট ও একক বিনিয়োগকারীদের ঘুরে দেখে যাওয়ার আমন্ত্রণ রইলো।।।</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(41, 2, 40, 'North Facing', '2021-02-10 00:00:00', '<p>একটি সনামধন্য গ্রুপ অফ কোম্পানির উদ্যোগে -&nbsp;</p>\r\n\r\n<p>Gandhariya, Boliyarpur, hemayetpur.</p>\r\n\r\n<p>সরকার অনুমোদিত মেট্রোরেল MRT-5 ডিপো এর সন্নিকটে প্রস্তাবিত ৮০&#39; ও ৬০&#39; রোডের সাথেই&nbsp; হেমায়েতপুর, ব্যাংক কলোনি, সাভার, বিরুলিয়া, উত্তরা, ইপিজেড ও আশুলিয়ার সংযোগ পয়েন্ট এ প্রকৃতিগতভাবে উঁচু জমিতে ৩, ৫, ১০,২০ কাঠার প্লট বিক্রয় চলছে। এটি কোন প্রজেক্ট নয়, একটি &quot;মিনি রেসিডেন্স কমিউনিটি প্লান&quot;। ভবিষ্যতের একটি নিরাপদ ও লাভজনক বিনিয়োগের একটি সুবর্ণ সুযোগ। বিভিন্ন করপোরেট ও একক বিনিয়োগকারীদের ঘুরে দেখে যাওয়ার আমন্ত্রণ রইলো।।।</p>', 'null', NULL, 'null', NULL, NULL, NULL),
(42, 1, 41, 'South Facing', '2021-12-16 00:00:00', '<p>একটি সনামধন্য গ্রুপ অফ কোম্পানির উদ্যোগে -&nbsp;</p>\r\n\r\n<p>Gandhariya, Boliyarpur, hemayetpur.</p>\r\n\r\n<p>সরকার অনুমোদিত মেট্রোরেল MRT-5 ডিপো এর সন্নিকটে প্রস্তাবিত ৮০&#39; ও ৬০&#39; রোডের সাথেই&nbsp; হেমায়েতপুর, ব্যাংক কলোনি, সাভার, বিরুলিয়া, উত্তরা, ইপিজেড ও আশুলিয়ার সংযোগ পয়েন্ট এ প্রকৃতিগতভাবে উঁচু জমিতে ৩, ৫, ১০,২০ কাঠার প্লট বিক্রয় চলছে। এটি কোন প্রজেক্ট নয়, একটি &quot;মিনি রেসিডেন্স কমিউনিটি প্লান&quot;। ভবিষ্যতের একটি নিরাপদ ও লাভজনক বিনিয়োগের একটি সুবর্ণ সুযোগ। বিভিন্ন করপোরেট ও একক বিনিয়োগকারীদের ঘুরে দেখে যাওয়ার আমন্ত্রণ রইলো।।।</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(43, 1, 42, 'South Facing', '2021-12-30 00:00:00', '<p>&sect;&nbsp; Project Location: 15 km from National Sangsad Bhaban, just by the way of Gabtoli, Amin Bazar and 2.8 Km from Dhaka Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Project Type: Residential &amp; Commercial.</p>\r\n\r\n<p>&sect;&nbsp; Dhanshiri Residence Land Area: 35 Bigha (1300 Katha/ 936000 Sft/ 2146.78 Decimal.)</p>\r\n\r\n<p>&sect;&nbsp; Total Plot: 131 No&rsquo;s (Approx.)</p>\r\n\r\n<p>&sect;&nbsp; Plot Size: 3, 4.5, 5, 6, 10Katha.</p>\r\n\r\n<p>&sect;&nbsp; Proposed Road: 170&#39; Asian Highway Road, 60&#39; attached Road with Asian Highway and 80&#39; Road attached with Dhaka-Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Project Road: 25 Feet inner Road and 40 Feet wide main Road.</p>\r\n\r\n<p>&sect;&nbsp; Type: North, North Corner, South, South Corner, Lake View, River View.</p>\r\n\r\n<p>&sect;&nbsp; Location: 15 km from National Sangsad Bhaban, just by the road of Gabtoli, Amin Bazar and 2.8 Km from Dhaka Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Connecting Roads.It is more effective location in the Geographical point of view. Boliyarpur Bazar Road, 300&rsquo; Feet Dhaka-Aricha Bypass Road and 60&#39; attached road, 80&rsquo; Feet Connecting road opposite of Hemayetpur Bazar. Surrounded by Gabtoli, Hemayetpur, Savar, EPZ, Chondra, Birulia and Ashulia.</p>\r\n\r\n<p>Advantages: (Why invest here)</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Very Near to MRT-5 central landing station (Metro Rail)</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Complete gated community.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Beside Kornomoti River.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; No need to pile.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Short Term/Quick Development.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Out of flood flow zone.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Under DAP (Detail Area Plan).</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Organized by Renowned Group of Company.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Standard Community maintain by Co-Operative Society.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; High land with natural greeneries &amp; ecofriendly environment.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Reasonable Price &amp; Conditions.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Easy Installment system.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Quick Registration and handover on at a time payment.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Secure investment and Double cash after 3 years.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; The Company is ensuring after sales services.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Only ten minutes far from Gabtoli Bus Terminal.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Circular city &amp; far away from traffic jam.</p>\r\n\r\n<p>&nbsp;And Many More....</p>\r\n\r\n<p>Finally, to make your dreams come true we &ldquo;Runner Land Development Ltd (RLDL).&rdquo; are waiting to serve you an absolute Residential &amp; commercial Land through all possible manners. So, definitely your proposal will get the top priority and as a business friend to extend the relationship with you, it is our commitment that, we will provide our best service ever.</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(44, 1, 43, 'South Facing', '2021-10-13 00:00:00', '<p>&sect;&nbsp; Project Location: 15 km from National Sangsad Bhaban, just by the way of Gabtoli, Amin Bazar and 2.8 Km from Dhaka Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Project Type: Residential &amp; Commercial.</p>\r\n\r\n<p>&sect;&nbsp; Dhanshiri Residence Land Area: 35 Bigha (1300 Katha/ 936000 Sft/ 2146.78 Decimal.)</p>\r\n\r\n<p>&sect;&nbsp; Total Plot: 131 No&rsquo;s (Approx.)</p>\r\n\r\n<p>&sect;&nbsp; Plot Size: 3, 4.5, 5, 6, 10Katha.</p>\r\n\r\n<p>&sect;&nbsp; Proposed Road: 170&#39; Asian Highway Road, 60&#39; attached Road with Asian Highway and 80&#39; Road attached with Dhaka-Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Project Road: 25 Feet inner Road and 40 Feet wide main Road.</p>\r\n\r\n<p>&sect;&nbsp; Type: North, North Corner, South, South Corner, Lake View, River View.</p>\r\n\r\n<p>&sect;&nbsp; Location: 15 km from National Sangsad Bhaban, just by the road of Gabtoli, Amin Bazar and 2.8 Km from Dhaka Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Connecting Roads.It is more effective location in the Geographical point of view. Boliyarpur Bazar Road, 300&rsquo; Feet Dhaka-Aricha Bypass Road and 60&#39; attached road, 80&rsquo; Feet Connecting road opposite of Hemayetpur Bazar. Surrounded by Gabtoli, Hemayetpur, Savar, EPZ, Chondra, Birulia and Ashulia.</p>\r\n\r\n<p>Advantages: (Why invest here)</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Very Near to MRT-5 central landing station (Metro Rail)</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Complete gated community.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Beside Kornomoti River.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; No need to pile.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Short Term/Quick Development.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Out of flood flow zone.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Under DAP (Detail Area Plan).</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Organized by Renowned Group of Company.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Standard Community maintain by Co-Operative Society.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; High land with natural greeneries &amp; ecofriendly environment.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Reasonable Price &amp; Conditions.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Easy Installment system.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Quick Registration and handover on at a time payment.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Secure investment and Double cash after 3 years.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; The Company is ensuring after sales services.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Only ten minutes far from Gabtoli Bus Terminal.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Circular city &amp; far away from traffic jam.</p>\r\n\r\n<p>&nbsp;And Many More....</p>\r\n\r\n<p>Finally, to make your dreams come true we &ldquo;Runner Land Development Ltd (RLDL).&rdquo; are waiting to serve you an absolute Residential &amp; commercial Land through all possible manners. So, definitely your proposal will get the top priority and as a business friend to extend the relationship with you, it is our commitment that, we will provide our best service ever.</p>', 'null', NULL, 'null', NULL, NULL, NULL),
(45, 1, 44, 'South Facing', '2021-10-23 00:00:00', '<p>&sect;&nbsp; Project Location: 15 km from National Sangsad Bhaban, just by the way of Gabtoli, Amin Bazar and 2.8 Km from Dhaka Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Project Type: Residential &amp; Commercial.</p>\r\n\r\n<p>&sect;&nbsp; Dhanshiri Residence Land Area: 35 Bigha (1300 Katha/ 936000 Sft/ 2146.78 Decimal.)</p>\r\n\r\n<p>&sect;&nbsp; Total Plot: 131 No&rsquo;s (Approx.)</p>\r\n\r\n<p>&sect;&nbsp; Plot Size: 3, 4.5, 5, 6, 10Katha.</p>\r\n\r\n<p>&sect;&nbsp; Proposed Road: 170&#39; Asian Highway Road, 60&#39; attached Road with Asian Highway and 80&#39; Road attached with Dhaka-Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Project Road: 25 Feet inner Road and 40 Feet wide main Road.</p>\r\n\r\n<p>&sect;&nbsp; Type: North, North Corner, South, South Corner, Lake View, River View.</p>\r\n\r\n<p>&sect;&nbsp; Location: 15 km from National Sangsad Bhaban, just by the road of Gabtoli, Amin Bazar and 2.8 Km from Dhaka Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Connecting Roads.It is more effective location in the Geographical point of view. Boliyarpur Bazar Road, 300&rsquo; Feet Dhaka-Aricha Bypass Road and 60&#39; attached road, 80&rsquo; Feet Connecting road opposite of Hemayetpur Bazar. Surrounded by Gabtoli, Hemayetpur, Savar, EPZ, Chondra, Birulia and Ashulia.</p>\r\n\r\n<p>Advantages: (Why invest here)</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Very Near to MRT-5 central landing station (Metro Rail)</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Complete gated community.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Beside Kornomoti River.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; No need to pile.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Short Term/Quick Development.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Out of flood flow zone.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Under DAP (Detail Area Plan).</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Organized by Renowned Group of Company.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Standard Community maintain by Co-Operative Society.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; High land with natural greeneries &amp; ecofriendly environment.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Reasonable Price &amp; Conditions.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Easy Installment system.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Quick Registration and handover on at a time payment.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Secure investment and Double cash after 3 years.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; The Company is ensuring after sales services.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Only ten minutes far from Gabtoli Bus Terminal.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Circular city &amp; far away from traffic jam.</p>\r\n\r\n<p>&nbsp;And Many More....</p>\r\n\r\n<p>Finally, to make your dreams come true we &ldquo;Runner Land Development Ltd (RLDL).&rdquo; are waiting to serve you an absolute Residential &amp; commercial Land through all possible manners. So, definitely your proposal will get the top priority and as a business friend to extend the relationship with you, it is our commitment that, we will provide our best service ever.</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"3\",\"4\"]', NULL, NULL, NULL),
(46, 1, 45, 'South Facing', '2021-09-16 00:00:00', NULL, '[\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(47, 1, 46, 'South Facing', '2022-12-30 00:00:00', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(48, 1, 47, 'South Facing', '2019-03-06 00:00:00', '<p><strong>We are highly glad to inform you that&nbsp;&nbsp;&ldquo;Swadesh Properties Limited &ldquo; is one of the largest and credible land development company&nbsp;&nbsp;in Dhaka City. Since 2004 we are developing this business with fame and fulfillment of customer&rsquo;s demand and satisfaction. We have two different project in north city corporation &amp; both the projects are under rajuk approval.</strong></p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(49, 1, 48, 'South Facing', '2017-02-15 00:00:00', '<p><em><strong>Bashundhara P block 4 Katha North facing Plot @15,00,000tk.</strong></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Basic Plot Information:</p>\r\n\r\n<p>Block : P</p>\r\n\r\n<p>Plot no: 4***</p>\r\n\r\n<p>Plot Size : 4</p>\r\n\r\n<p>Face : North</p>\r\n\r\n<p>Front Road Size: 25&#39;ft</p>\r\n\r\n<p>Registration:</p>\r\n\r\n<p>Mutation:</p>\r\n\r\n<p>Demarcation :Ok</p>\r\n\r\n<p>Gat Pass :</p>\r\n\r\n<p>Rajuk Approval :ok</p>\r\n\r\n<p>Sand Filling:Ok</p>\r\n\r\n<p>Name transfer: Ok</p>\r\n\r\n<p>Ready for building construction After Few time</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(50, 1, 49, 'South Facing', '2021-11-12 00:00:00', '<p>Aftabnagar 3.5 Katha.</p>\r\n\r\n<p>50 lakh per Katha.</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(51, 1, 50, 'South Facing', '2021-09-23 00:00:00', NULL, '[\"2\",\"3\"]', NULL, 'null', NULL, NULL, NULL),
(52, 1, 51, 'South Facing', '2021-09-01 00:00:00', NULL, '[\"2\",\"3\"]', NULL, 'null', NULL, NULL, NULL),
(53, 1, 52, 'South Facing', '2021-09-05 00:00:00', NULL, '[\"1\",\"2\"]', NULL, 'null', NULL, NULL, NULL),
(54, 1, 53, 'South Facing', '2021-10-04 00:00:00', '<p>100-1000sft shop &amp; commercial space are available at new 60 feet road of Mirpur 2 behind Grammen Bank to Agargaon, Already, running Fast Food Restaurant, Burber shop, Fruit shop, ATM booth, Doctor Chamber, Pharmacy and many more ...Only 3 shops available in ground floor and will be are rented based on 1st come 1st serve basis ...Genuine and interested businessman are encourage to call</p>', 'null', NULL, 'null', NULL, NULL, NULL),
(55, 2, 54, 'North Facing', '2021-09-10 00:00:00', NULL, 'null', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(56, 1, 55, 'South Facing', '2021-10-09 00:00:00', '<p>1654 sqf, flat no. 305, building no. 3C, RAJUK UTTARA APARTMENT PROJECT, UTTARA SECTOR 18.</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, 'null', NULL, NULL, NULL),
(57, 1, 56, 'South Facing', '2021-09-01 00:00:00', '<p>Flat is on the 4th Floor, South Side, 3 Bed Rooms, 3 Toilets, Drawing cum Dinning, Kitchen, 1300 sft. Rent: Tk.20,000 (negotiable) per month and Service Charge: Tk.4,000</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Floor and Bathrooms are fully having with tiles, good quality fittings at the toilets, AC and IPS options are available, good security with extra collapsible gate in the main door, good location, well maintained and ready flat, garage is not available, all time water and gas supply, electricity bill of the flat should pay by the tenant. the building is located at a prime place of B Block, Mirpur-12, all facilities such as bazar, shopping malls, education institutions, bus stand are nearby.</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(58, 2, 57, 'North Facing', '2021-09-09 00:00:00', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(59, 2, 58, 'North Facing', '2021-10-07 00:00:00', '<p>Flat for rent at Kathalbagan</p>\r\n\r\n<p>Address :&nbsp;&nbsp;64/1, Free School Street, Kathalbagan, Dhaka.</p>\r\n\r\n<p>At 1st &amp; 4th&nbsp;&nbsp;floor</p>\r\n\r\n<p>Flat size : 1250 sq feet</p>\r\n\r\n<p>2 bed,</p>\r\n\r\n<p>Drawing, dining,</p>\r\n\r\n<p>3 bath,</p>\r\n\r\n<p>3 balconi</p>\r\n\r\n<p>Car parking : 1</p>\r\n\r\n<p>Rent : 22000 BDT ( 4th floor) &amp; 23000 BDT ( 1st floor)</p>\r\n\r\n<p>Service charge &amp; others: 3000 BDT ( including water, gas &amp; sewerage bill)</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL);
INSERT INTO `PRD_LISTING_ADDITIONAL_INFO` (`PK_NO`, `F_FACING_NO`, `F_LISTING_NO`, `FACING`, `HANDOVER_DATE`, `DESCRIPTION`, `F_FEATURE_NOS`, `FEATURES`, `F_NEARBY_NOS`, `NEARBY`, `LOCATION_MAP`, `VIDEO_CODE`) VALUES
(60, 1, 59, 'South Facing', '2021-10-21 00:00:00', NULL, 'null', NULL, 'null', NULL, NULL, NULL);

--
-- Triggers `PRD_LISTING_ADDITIONAL_INFO`
--
DROP TRIGGER IF EXISTS `BEFORE_PRD_LISTING_ADDITIONAL_INFO_INSERT`;
DELIMITER $$
CREATE TRIGGER `BEFORE_PRD_LISTING_ADDITIONAL_INFO_INSERT` BEFORE INSERT ON `PRD_LISTING_ADDITIONAL_INFO` FOR EACH ROW BEGIN
DECLARE VAR_FACING VARCHAR(50) DEFAULT NULL;

SELECT TITLE INTO VAR_FACING FROM PRD_PROPERTY_FACING WHERE PK_NO = NEW.F_FACING_NO;

SET NEW.FACING = VAR_FACING;

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `BEFORE_PRD_LISTING_ADDITIONAL_INFO_UPDATE`;
DELIMITER $$
CREATE TRIGGER `BEFORE_PRD_LISTING_ADDITIONAL_INFO_UPDATE` BEFORE UPDATE ON `PRD_LISTING_ADDITIONAL_INFO` FOR EACH ROW BEGIN
DECLARE VAR_FACING VARCHAR(50) DEFAULT NULL;

SELECT TITLE INTO VAR_FACING FROM PRD_PROPERTY_FACING WHERE PK_NO = NEW.F_FACING_NO;

SET NEW.FACING = VAR_FACING;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `PRD_LISTING_FEATURES`
--

DROP TABLE IF EXISTS `PRD_LISTING_FEATURES`;
CREATE TABLE IF NOT EXISTS `PRD_LISTING_FEATURES` (
  `PK_NO` int(2) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(50) DEFAULT NULL,
  `URL_SLUG` varchar(50) DEFAULT NULL,
  `IS_ACTIVE` int(2) NOT NULL DEFAULT '1',
  `ORDER_ID` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `u_url_slug` (`URL_SLUG`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTING_FEATURES`
--

INSERT INTO `PRD_LISTING_FEATURES` (`PK_NO`, `TITLE`, `URL_SLUG`, `IS_ACTIVE`, `ORDER_ID`) VALUES
(1, 'Parking', 'parking', 1, 1),
(2, 'Gas', 'gas', 1, 2),
(3, 'Water', 'water', 1, 3),
(4, 'Generator', 'generator', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_LISTING_IMAGES`
--

DROP TABLE IF EXISTS `PRD_LISTING_IMAGES`;
CREATE TABLE IF NOT EXISTS `PRD_LISTING_IMAGES` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `F_LISTING_NO` bigint(20) DEFAULT NULL,
  `IMAGE_PATH` varchar(100) DEFAULT NULL,
  `IMAGE` varchar(50) DEFAULT NULL,
  `THUMB_PATH` varchar(100) DEFAULT NULL,
  `THUMB` varchar(100) DEFAULT NULL,
  `IS_DEFAULT` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTING_IMAGES`
--

INSERT INTO `PRD_LISTING_IMAGES` (`PK_NO`, `F_LISTING_NO`, `IMAGE_PATH`, `IMAGE`, `THUMB_PATH`, `THUMB`, `IS_DEFAULT`) VALUES
(28, 2, '/uploads/listings/2/6099597e40a92.jpg', '6099597e40a92.jpg', NULL, NULL, 1),
(29, 2, '/uploads/listings/2/6099597e416a7.jpg', '6099597e416a7.jpg', NULL, NULL, 0),
(30, 3, '/uploads/listings/3/60ac10ac9616b.jpg', '60ac10ac9616b.jpg', '/uploads/listings/3/thumb/60ac10ac96184.jpg', '60ac10ac96184.jpg', 1),
(31, 4, '/uploads/listings/4/6109911f5a117.webp', '6109911f5a117.webp', '/uploads/listings/4/thumb/6109911f5a120.webp', '6109911f5a120.webp', 1),
(32, 4, '/uploads/listings/4/6109911fae1be.jpg', '6109911fae1be.jpg', '/uploads/listings/4/thumb/6109911fae1c7.jpg', '6109911fae1c7.jpg', 0),
(33, 5, '/uploads/listings/5/6109a894b0cf0.jpg', '6109a894b0cf0.jpg', '/uploads/listings/5/thumb/6109a894b0cf9.jpg', '6109a894b0cf9.jpg', 1),
(34, 7, '/uploads/listings/7/6109aee7c6413.jpg', '6109aee7c6413.jpg', '/uploads/listings/7/thumb/6109aee7c641b.jpg', '6109aee7c641b.jpg', 1),
(35, 8, '/uploads/listings/8/6109afff619de.jpg', '6109afff619de.jpg', '/uploads/listings/8/thumb/6109afff619f2.jpg', '6109afff619f2.jpg', 1),
(36, 8, '/uploads/listings/8/6109afffbe76d.jpg', '6109afffbe76d.jpg', '/uploads/listings/8/thumb/6109afffbe775.jpg', '6109afffbe775.jpg', 0),
(37, 9, '/uploads/listings/9/610ab376ebbf1.jpg', '610ab376ebbf1.jpg', '/uploads/listings/9/thumb/610ab376ebbfc.jpg', '610ab376ebbfc.jpg', 1),
(38, 10, '/uploads/listings/10/610ab52fc0fd0.jpg', '610ab52fc0fd0.jpg', '/uploads/listings/10/thumb/610ab52fc0fd9.jpg', '610ab52fc0fd9.jpg', 1),
(39, 10, '/uploads/listings/10/610ab52fd3582.jpg', '610ab52fd3582.jpg', '/uploads/listings/10/thumb/610ab52fd358a.jpg', '610ab52fd358a.jpg', 0),
(40, 11, '/uploads/listings/11/610ae39b54a0f.jpg', '610ae39b54a0f.jpg', '/uploads/listings/11/thumb/610ae39b54a19.jpg', '610ae39b54a19.jpg', 1),
(41, 12, '/uploads/listings/12/610ae470d102f.jpg', '610ae470d102f.jpg', '/uploads/listings/12/thumb/610ae470d103b.jpg', '610ae470d103b.jpg', 1),
(42, 13, '/uploads/listings/13/610aec6154264.jpg', '610aec6154264.jpg', '/uploads/listings/13/thumb/610aec6154271.jpg', '610aec6154271.jpg', 1),
(43, 15, '/uploads/listings/15/6127bc9ca72e5.jpg', '6127bc9ca72e5.jpg', '/uploads/listings/15/thumb/6127bc9ca72f1.jpg', '6127bc9ca72f1.jpg', 1),
(44, 15, '/uploads/listings/15/6127bc9e97463.jpg', '6127bc9e97463.jpg', '/uploads/listings/15/thumb/6127bc9e9746d.jpg', '6127bc9e9746d.jpg', 0),
(45, 16, '/uploads/listings/16/6127be44f1e85.jpg', '6127be44f1e85.jpg', '/uploads/listings/16/thumb/6127be44f1e90.jpg', '6127be44f1e90.jpg', 1),
(46, 16, '/uploads/listings/16/6127be453699b.jpg', '6127be453699b.jpg', '/uploads/listings/16/thumb/6127be45369aa.jpg', '6127be45369aa.jpg', 0),
(47, 17, '/uploads/listings/17/6127c0f2347a2.jpeg', '6127c0f2347a2.jpeg', '/uploads/listings/17/thumb/6127c0f2347b4.jpeg', '6127c0f2347b4.jpeg', 1),
(48, 17, '/uploads/listings/17/6127c0f24e968.jpeg', '6127c0f24e968.jpeg', '/uploads/listings/17/thumb/6127c0f24e977.jpeg', '6127c0f24e977.jpeg', 0),
(49, 18, '/uploads/listings/18/6127c73271f44.jpg', '6127c73271f44.jpg', '/uploads/listings/18/thumb/6127c73271f52.jpg', '6127c73271f52.jpg', 1),
(50, 18, '/uploads/listings/18/6127c732b1d94.jpeg', '6127c732b1d94.jpeg', '/uploads/listings/18/thumb/6127c732b1da5.jpeg', '6127c732b1da5.jpeg', 0),
(51, 19, '/uploads/listings/19/6127c969c7b66.jpg', '6127c969c7b66.jpg', '/uploads/listings/19/thumb/6127c969c7b72.jpg', '6127c969c7b72.jpg', 1),
(52, 19, '/uploads/listings/19/6127c96a0c72f.jpg', '6127c96a0c72f.jpg', '/uploads/listings/19/thumb/6127c96a0c739.jpg', '6127c96a0c739.jpg', 0),
(53, 20, '/uploads/listings/20/6127cbc225b78.jpg', '6127cbc225b78.jpg', '/uploads/listings/20/thumb/6127cbc225b83.jpg', '6127cbc225b83.jpg', 1),
(54, 21, '/uploads/listings/21/6127d119db3c4.jpg', '6127d119db3c4.jpg', '/uploads/listings/21/thumb/6127d119db3db.jpg', '6127d119db3db.jpg', 1),
(55, 22, '/uploads/listings/22/6127d310094ef.jpeg', '6127d310094ef.jpeg', '/uploads/listings/22/thumb/6127d310094ff.jpeg', '6127d310094ff.jpeg', 1),
(56, 22, '/uploads/listings/22/6127d3102ec79.jpeg', '6127d3102ec79.jpeg', '/uploads/listings/22/thumb/6127d3102ec84.jpeg', '6127d3102ec84.jpeg', 0),
(57, 23, '/uploads/listings/23/6127d6517c725.jpg', '6127d6517c725.jpg', '/uploads/listings/23/thumb/6127d6517c733.jpg', '6127d6517c733.jpg', 1),
(58, 23, '/uploads/listings/23/6127d651a1446.jpg', '6127d651a1446.jpg', '/uploads/listings/23/thumb/6127d651a1450.jpg', '6127d651a1450.jpg', 0),
(59, 24, '/uploads/listings/24/6127e0c62b6fa.jpg', '6127e0c62b6fa.jpg', '/uploads/listings/24/thumb/6127e0c62b706.jpg', '6127e0c62b706.jpg', 1),
(60, 24, '/uploads/listings/24/6127e0c64cd7a.jpg', '6127e0c64cd7a.jpg', '/uploads/listings/24/thumb/6127e0c64cd85.jpg', '6127e0c64cd85.jpg', 0),
(61, 25, '/uploads/listings/25/6127ec3530f37.jpg', '6127ec3530f37.jpg', '/uploads/listings/25/thumb/6127ec3530f47.jpg', '6127ec3530f47.jpg', 1),
(62, 26, '/uploads/listings/26/6127ee1f67c66.jpg', '6127ee1f67c66.jpg', '/uploads/listings/26/thumb/6127ee1f67c74.jpg', '6127ee1f67c74.jpg', 1),
(63, 26, '/uploads/listings/26/6127ee1f8b947.jpg', '6127ee1f8b947.jpg', '/uploads/listings/26/thumb/6127ee1f8b952.jpg', '6127ee1f8b952.jpg', 0),
(64, 27, '/uploads/listings/27/6127eff2d03bc.jpeg', '6127eff2d03bc.jpeg', '/uploads/listings/27/thumb/6127eff2d03cb.jpeg', '6127eff2d03cb.jpeg', 1),
(65, 28, '/uploads/listings/28/6127f2047a823.jpg', '6127f2047a823.jpg', '/uploads/listings/28/thumb/6127f2047a83b.jpg', '6127f2047a83b.jpg', 1),
(66, 29, '/uploads/listings/29/6127fc7081d32.jpeg', '6127fc7081d32.jpeg', '/uploads/listings/29/thumb/6127fc7081d3f.jpeg', '6127fc7081d3f.jpeg', 1),
(67, 30, '/uploads/listings/30/6127fe85d8a19.jpg', '6127fe85d8a19.jpg', '/uploads/listings/30/thumb/6127fe85d8a2c.jpg', '6127fe85d8a2c.jpg', 1),
(68, 31, '/uploads/listings/31/6127ffda6db27.png', '6127ffda6db27.png', '/uploads/listings/31/thumb/6127ffda6db33.png', '6127ffda6db33.png', 1),
(69, 32, '/uploads/listings/32/61280075b9e6f.jpg', '61280075b9e6f.jpg', '/uploads/listings/32/thumb/61280075b9e7c.jpg', '61280075b9e7c.jpg', 1),
(70, 33, '/uploads/listings/33/612800ef338ac.jpg', '612800ef338ac.jpg', '/uploads/listings/33/thumb/612800ef338b7.jpg', '612800ef338b7.jpg', 1),
(71, 34, '/uploads/listings/34/612801883aa8a.jpeg', '612801883aa8a.jpeg', '/uploads/listings/34/thumb/612801883aa96.jpeg', '612801883aa96.jpeg', 1),
(72, 34, '/uploads/listings/34/612801885b9a6.jpeg', '612801885b9a6.jpeg', '/uploads/listings/34/thumb/612801885b9b0.jpeg', '612801885b9b0.jpeg', 0),
(73, 35, '/uploads/listings/35/6129297cb16a1.jpg', '6129297cb16a1.jpg', '/uploads/listings/35/thumb/6129297cb16b1.jpg', '6129297cb16b1.jpg', 1),
(74, 35, '/uploads/listings/35/6129297cec7be.jpg', '6129297cec7be.jpg', '/uploads/listings/35/thumb/6129297cec7c6.jpg', '6129297cec7c6.jpg', 0),
(75, 35, '/uploads/listings/35/6129297d27561.jpg', '6129297d27561.jpg', '/uploads/listings/35/thumb/6129297d2756a.jpg', '6129297d2756a.jpg', 0),
(76, 36, '/uploads/listings/36/61293333d95c4.jpg', '61293333d95c4.jpg', '/uploads/listings/36/thumb/61293333d95d2.jpg', '61293333d95d2.jpg', 1),
(77, 36, '/uploads/listings/36/6129333447282.jpg', '6129333447282.jpg', '/uploads/listings/36/thumb/612933344728d.jpg', '612933344728d.jpg', 0),
(78, 36, '/uploads/listings/36/612933346b0dd.jpg', '612933346b0dd.jpg', '/uploads/listings/36/thumb/612933346b0e8.jpg', '612933346b0e8.jpg', 0),
(79, 37, '/uploads/listings/37/61293892c0112.jpeg', '61293892c0112.jpeg', '/uploads/listings/37/thumb/61293892c0120.jpeg', '61293892c0120.jpeg', 1),
(80, 37, '/uploads/listings/37/61293892e0c37.jpeg', '61293892e0c37.jpeg', '/uploads/listings/37/thumb/61293892e0c49.jpeg', '61293892e0c49.jpeg', 0),
(81, 38, '/uploads/listings/38/61293b3f77852.jpg', '61293b3f77852.jpg', '/uploads/listings/38/thumb/61293b3f77860.jpg', '61293b3f77860.jpg', 1),
(82, 38, '/uploads/listings/38/61293b3fb3e8e.jpg', '61293b3fb3e8e.jpg', '/uploads/listings/38/thumb/61293b3fb3ea1.jpg', '61293b3fb3ea1.jpg', 0),
(83, 39, '/uploads/listings/39/61293d3ac72fb.jpeg', '61293d3ac72fb.jpeg', '/uploads/listings/39/thumb/61293d3ac7309.jpeg', '61293d3ac7309.jpeg', 1),
(84, 39, '/uploads/listings/39/61293d3aef1a6.jpg', '61293d3aef1a6.jpg', '/uploads/listings/39/thumb/61293d3aef1b1.jpg', '61293d3aef1b1.jpg', 0),
(85, 40, '/uploads/listings/40/61293e39588dc.jpg', '61293e39588dc.jpg', '/uploads/listings/40/thumb/61293e39588ec.jpg', '61293e39588ec.jpg', 1),
(86, 40, '/uploads/listings/40/61293e399bb04.jpg', '61293e399bb04.jpg', '/uploads/listings/40/thumb/61293e399bb0f.jpg', '61293e399bb0f.jpg', 0),
(87, 40, '/uploads/listings/40/61293e39c3ec9.jpg', '61293e39c3ec9.jpg', '/uploads/listings/40/thumb/61293e39c3ede.jpg', '61293e39c3ede.jpg', 0),
(88, 41, '/uploads/listings/41/61293f3d444f2.jpg', '61293f3d444f2.jpg', '/uploads/listings/41/thumb/61293f3d444fe.jpg', '61293f3d444fe.jpg', 1),
(89, 41, '/uploads/listings/41/61293f3d81f45.jpg', '61293f3d81f45.jpg', '/uploads/listings/41/thumb/61293f3d81f4f.jpg', '61293f3d81f4f.jpg', 0),
(90, 42, '/uploads/listings/42/61294010abd24.jpg', '61294010abd24.jpg', '/uploads/listings/42/thumb/61294010abd31.jpg', '61294010abd31.jpg', 1),
(91, 42, '/uploads/listings/42/61294010db5cb.jpg', '61294010db5cb.jpg', '/uploads/listings/42/thumb/61294010db5dd.jpg', '61294010db5dd.jpg', 0),
(92, 43, '/uploads/listings/43/612940bac5063.jpg', '612940bac5063.jpg', '/uploads/listings/43/thumb/612940bac5070.jpg', '612940bac5070.jpg', 1),
(93, 43, '/uploads/listings/43/612940bb20fb9.jpg', '612940bb20fb9.jpg', '/uploads/listings/43/thumb/612940bb20fcd.jpg', '612940bb20fcd.jpg', 0),
(94, 44, '/uploads/listings/44/6129418044b1b.jpg', '6129418044b1b.jpg', '/uploads/listings/44/thumb/6129418044b27.jpg', '6129418044b27.jpg', 1),
(95, 44, '/uploads/listings/44/61294180873f5.jpg', '61294180873f5.jpg', '/uploads/listings/44/thumb/6129418087408.jpg', '6129418087408.jpg', 0),
(96, 45, '/uploads/listings/45/6129441668e59.jpg', '6129441668e59.jpg', '/uploads/listings/45/thumb/6129441668e66.jpg', '6129441668e66.jpg', 1),
(97, 45, '/uploads/listings/45/61294416a2f73.jpg', '61294416a2f73.jpg', '/uploads/listings/45/thumb/61294416a2f7e.jpg', '61294416a2f7e.jpg', 0),
(98, 45, '/uploads/listings/45/61294416d05e9.jpg', '61294416d05e9.jpg', '/uploads/listings/45/thumb/61294416d05f5.jpg', '61294416d05f5.jpg', 0),
(99, 46, '/uploads/listings/46/612945b33e3e3.jpg', '612945b33e3e3.jpg', '/uploads/listings/46/thumb/612945b33e3f8.jpg', '612945b33e3f8.jpg', 1),
(100, 46, '/uploads/listings/46/612945b374689.jpg', '612945b374689.jpg', '/uploads/listings/46/thumb/612945b37469b.jpg', '612945b37469b.jpg', 0),
(101, 46, '/uploads/listings/46/612945b39bb18.jpg', '612945b39bb18.jpg', '/uploads/listings/46/thumb/612945b39bb23.jpg', '612945b39bb23.jpg', 0),
(102, 46, '/uploads/listings/46/612945b3c9911.jpg', '612945b3c9911.jpg', '/uploads/listings/46/thumb/612945b3c991c.jpg', '612945b3c991c.jpg', 0),
(103, 47, '/uploads/listings/47/6129494bd77e1.jpg', '6129494bd77e1.jpg', '/uploads/listings/47/thumb/6129494bd77ef.jpg', '6129494bd77ef.jpg', 1),
(104, 47, '/uploads/listings/47/6129494c1171b.jpg', '6129494c1171b.jpg', '/uploads/listings/47/thumb/6129494c11727.jpg', '6129494c11727.jpg', 0),
(105, 48, '/uploads/listings/48/61294af9c3f9a.jpg', '61294af9c3f9a.jpg', '/uploads/listings/48/thumb/61294af9c3faf.jpg', '61294af9c3faf.jpg', 1),
(106, 49, '/uploads/listings/49/61294d424980d.jpg', '61294d424980d.jpg', '/uploads/listings/49/thumb/61294d424981b.jpg', '61294d424981b.jpg', 1),
(107, 49, '/uploads/listings/49/61294d425b26b.jpg', '61294d425b26b.jpg', '/uploads/listings/49/thumb/61294d425b275.jpg', '61294d425b275.jpg', 0),
(108, 50, '/uploads/listings/50/612950c8f0bbf.jpg', '612950c8f0bbf.jpg', '/uploads/listings/50/thumb/612950c8f0bcf.jpg', '612950c8f0bcf.jpg', 1),
(109, 51, '/uploads/listings/51/61295235d8e65.jpg', '61295235d8e65.jpg', '/uploads/listings/51/thumb/61295235d8e73.jpg', '61295235d8e73.jpg', 1),
(110, 52, '/uploads/listings/52/612954b7351c1.jpeg', '612954b7351c1.jpeg', '/uploads/listings/52/thumb/612954b7351cf.jpeg', '612954b7351cf.jpeg', 1),
(111, 52, '/uploads/listings/52/612954b757418.jpeg', '612954b757418.jpeg', '/uploads/listings/52/thumb/612954b757423.jpeg', '612954b757423.jpeg', 0),
(112, 53, '/uploads/listings/53/6129bf6587f69.jpg', '6129bf6587f69.jpg', '/uploads/listings/53/thumb/6129bf6587f79.jpg', '6129bf6587f79.jpg', 1),
(113, 53, '/uploads/listings/53/6129bf65aa1f8.jpg', '6129bf65aa1f8.jpg', '/uploads/listings/53/thumb/6129bf65aa204.jpg', '6129bf65aa204.jpg', 0),
(114, 54, '/uploads/listings/54/6129c1c3dcff0.jpg', '6129c1c3dcff0.jpg', '/uploads/listings/54/thumb/6129c1c3dcffd.jpg', '6129c1c3dcffd.jpg', 1),
(115, 54, '/uploads/listings/54/6129c1c441ba3.jpg', '6129c1c441ba3.jpg', '/uploads/listings/54/thumb/6129c1c441baf.jpg', '6129c1c441baf.jpg', 0),
(116, 55, '/uploads/listings/55/6129c4edf32f8.jpg', '6129c4edf32f8.jpg', '/uploads/listings/55/thumb/6129c4edf3305.jpg', '6129c4edf3305.jpg', 1),
(117, 56, '/uploads/listings/56/6129ca3142028.jpg', '6129ca3142028.jpg', '/uploads/listings/56/thumb/6129ca3142042.jpg', '6129ca3142042.jpg', 1),
(118, 56, '/uploads/listings/56/6129ca3161c44.jpg', '6129ca3161c44.jpg', '/uploads/listings/56/thumb/6129ca3161c4f.jpg', '6129ca3161c4f.jpg', 0),
(119, 57, '/uploads/listings/57/6129cd98e087d.jpg', '6129cd98e087d.jpg', '/uploads/listings/57/thumb/6129cd98e088b.jpg', '6129cd98e088b.jpg', 1),
(120, 57, '/uploads/listings/57/6129cd9939343.jpg', '6129cd9939343.jpg', '/uploads/listings/57/thumb/6129cd993934d.jpg', '6129cd993934d.jpg', 0),
(121, 58, '/uploads/listings/58/6129cf2c38748.jpg', '6129cf2c38748.jpg', '/uploads/listings/58/thumb/6129cf2c38755.jpg', '6129cf2c38755.jpg', 1),
(122, 58, '/uploads/listings/58/6129cf2c74691.jpg', '6129cf2c74691.jpg', '/uploads/listings/58/thumb/6129cf2c746a5.jpg', '6129cf2c746a5.jpg', 0),
(123, 59, '/uploads/listings/59/6129d1035d6c4.jpg', '6129d1035d6c4.jpg', '/uploads/listings/59/thumb/6129d1035d6da.jpg', '6129d1035d6da.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_LISTING_TYPE`
--

DROP TABLE IF EXISTS `PRD_LISTING_TYPE`;
CREATE TABLE IF NOT EXISTS `PRD_LISTING_TYPE` (
  `PK_NO` int(2) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) DEFAULT NULL,
  `IS_ACTIVE` int(1) NOT NULL DEFAULT '1',
  `ORDER_ID` int(2) NOT NULL DEFAULT '1',
  `DURATION` int(3) DEFAULT '0',
  `SHORT_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTING_TYPE`
--

INSERT INTO `PRD_LISTING_TYPE` (`PK_NO`, `NAME`, `IS_ACTIVE`, `ORDER_ID`, `DURATION`, `SHORT_NAME`) VALUES
(1, 'General Listing for 30 days', 1, 1, 30, 'General'),
(2, 'Feature Listing for 30 days', 1, 2, 30, 'Feature'),
(3, 'General Listing with daily auto update for 30 days', 1, 3, 30, 'General'),
(4, 'Feature Listing with daily auto update for 30 days', 1, 4, 30, 'Feature');

-- --------------------------------------------------------

--
-- Table structure for table `PRD_LISTING_VARIANTS`
--

DROP TABLE IF EXISTS `PRD_LISTING_VARIANTS`;
CREATE TABLE IF NOT EXISTS `PRD_LISTING_VARIANTS` (
  `PK_NO` int(10) NOT NULL AUTO_INCREMENT,
  `F_LISTING_NO` int(10) DEFAULT NULL,
  `PROPERTY_SIZE` decimal(10,0) NOT NULL DEFAULT '0',
  `BEDROOM` int(2) DEFAULT '0',
  `BATHROOM` int(2) DEFAULT '0',
  `TOTAL_PRICE` float NOT NULL DEFAULT '0',
  `IS_DEFAULT` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTING_VARIANTS`
--

INSERT INTO `PRD_LISTING_VARIANTS` (`PK_NO`, `F_LISTING_NO`, `PROPERTY_SIZE`, `BEDROOM`, `BATHROOM`, `TOTAL_PRICE`, `IS_DEFAULT`) VALUES
(44, 2, '5000', 4, 4, 8000000, 1),
(47, 3, '1000', 2, 2, 500000, 1),
(48, 3, '1500', 3, 2, 700000, 0),
(49, 1, '123', 1, 2, 456, 0),
(50, 1, '789', 4, 4, 789, 0),
(54, 4, '12000', 3, 3, 15000000, 0),
(57, 7, '2500', 0, 0, 50000, 1),
(58, 8, '1800', 3, 3, 30000, 1),
(61, 9, '3500', NULL, NULL, 105, 0),
(67, 10, '16000', 4, 3, 9000, 0),
(71, 11, '400', 2, 1, 30000, 1),
(72, 12, '500', 1, 1, 6500, 1),
(75, 13, '250', 1, NULL, 2500, 0),
(77, 14, '250', 1, 1, 4999, 0),
(81, 6, '1478', 3, 3, 3000, 0),
(82, 5, '1690', 3, 3, 3700, 0),
(84, 16, '2300', 3, 3, 19200000, 1),
(85, 17, '2000', 0, 0, 180000, 1),
(86, 18, '2935', 4, 4, 0, 1),
(87, 19, '2300', 3, 4, 0, 1),
(88, 20, '2300', 3, 4, 19200000, 1),
(89, 21, '1600', 4, 3, 9680000, 1),
(90, 22, '125', 0, 0, 12500, 1),
(91, 23, '1100', 0, 0, 0, 1),
(92, 24, '1438', 3, 3, 9428000, 1),
(93, 25, '1912', 4, 4, 12300000, 1),
(94, 26, '700', 0, 0, 0, 1),
(95, 27, '264', 0, 0, 0, 1),
(96, 28, '1980', 3, 2, 0, 1),
(97, 29, '1000', 0, 0, 200, 1),
(98, 30, '3200', 0, 0, 100000, 1),
(99, 31, '1290', 3, 3, 0, 1),
(100, 32, '1300', 3, 3, 0, 1),
(101, 33, '1590', 3, 3, 0, 1),
(102, 34, '2480', 4, 4, 0, 1),
(103, 35, '3', 0, 0, 650000, 1),
(104, 36, '5', 0, 0, 1400000, 1),
(105, 37, '3', 0, 0, 10000000, 1),
(106, 38, '5', 0, 0, 9000000, 1),
(107, 39, '5', 0, 0, 600000, 1),
(108, 40, '10', 0, 0, 13000000, 1),
(109, 41, '3', 0, 0, 550000, 1),
(110, 42, '10', 0, 0, 5500000, 1),
(111, 43, '3', 0, 0, 6500000, 1),
(112, 44, '3', 0, 0, 6400000, 1),
(113, 45, '4', 0, 0, 10000000, 1),
(115, 47, '3', 0, 0, 700000, 1),
(116, 48, '4', 0, 0, 1500000, 1),
(117, 49, '3', 0, 0, 6700000, 1),
(118, 50, '1200', 1, 1, 2500, 1),
(119, 51, '1436', 1, 1, 2500, 1),
(120, 52, '800', 0, 0, 15000, 1),
(121, 53, '1000', 0, 0, 55000, 1),
(122, 54, '1800', 3, 3, 30000, 1),
(123, 55, '1654', 3, 3, 25000, 1),
(124, 56, '1300', 3, 3, 20000, 1),
(125, 57, '22550', 4, 3, 27000, 1),
(128, 59, '20000', NULL, NULL, 5000000, 1),
(129, 15, '1125', 3, 3, 6650000, 1),
(131, 58, '1250', 2, 2, 22000, 1),
(132, 46, '1675', 3, 3, 1340000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_LISTING_VIEW`
--

DROP TABLE IF EXISTS `PRD_LISTING_VIEW`;
CREATE TABLE IF NOT EXISTS `PRD_LISTING_VIEW` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `F_PRD_LISTING_NO` int(11) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `COUNTER` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PK_NO`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTING_VIEW`
--

INSERT INTO `PRD_LISTING_VIEW` (`PK_NO`, `F_PRD_LISTING_NO`, `DATE`, `COUNTER`) VALUES
(1, 5, '2021-08-10', 10),
(2, 6, '2021-08-11', 10),
(3, 14, '2021-08-11', 5),
(4, 14, '2021-08-10', 15),
(5, 15, '2021-09-01', 1),
(6, 15, '2021-09-01', 1),
(7, 15, '2021-09-02', 4),
(8, 15, '2021-09-02', 1),
(9, 15, '2021-09-02', 1),
(10, 15, '2021-09-02', 1),
(11, 15, '2021-09-02', 1),
(12, 58, '2021-09-02', 1),
(13, 58, '2021-09-02', 1),
(14, 58, '2021-09-02', 1),
(15, 15, '2021-09-02', 1),
(16, 15, '2021-09-04', 1),
(17, 58, '2021-09-04', 1),
(18, 58, '2021-09-05', 3),
(19, 15, '2021-09-05', 6),
(20, 15, '2021-09-05', 1),
(21, 15, '2021-09-05', 1),
(22, 59, '2021-09-05', 1),
(23, 59, '2021-09-05', 1),
(24, 59, '2021-09-05', 1),
(25, 59, '2021-09-05', 1),
(26, 59, '2021-09-05', 1),
(27, 59, '2021-09-05', 1),
(28, 59, '2021-09-05', 1),
(29, 59, '2021-09-05', 1),
(30, 59, '2021-09-05', 1),
(31, 59, '2021-09-05', 1),
(32, 15, '2021-09-05', 1),
(33, 15, '2021-09-05', 1),
(34, 15, '2021-09-05', 1),
(35, 15, '2021-09-05', 1),
(36, 15, '2021-09-05', 1),
(37, 15, '2021-09-05', 1),
(38, 15, '2021-09-05', 1),
(39, 15, '2021-09-05', 1),
(40, 15, '2021-09-05', 1),
(41, 15, '2021-09-05', 1),
(42, 15, '2021-09-05', 1),
(43, 15, '2021-09-05', 1),
(44, 59, '2021-09-05', 1),
(45, 15, '2021-09-05', 1),
(46, 15, '2021-09-05', 1),
(47, 15, '2021-09-05', 1),
(48, 15, '2021-09-05', 1),
(49, 15, '2021-09-05', 1),
(50, 15, '2021-09-05', 1),
(51, 15, '2021-09-05', 1),
(52, 15, '2021-09-05', 1),
(53, 59, '2021-09-05', 1),
(54, 59, '2021-09-05', 1),
(55, 59, '2021-09-05', 1),
(56, 59, '2021-09-05', 1),
(57, 59, '2021-09-05', 1),
(58, 59, '2021-09-05', 1),
(59, 59, '2021-09-05', 1),
(60, 59, '2021-09-05', 1),
(61, 59, '2021-09-05', 1),
(62, 59, '2021-09-05', 1),
(63, 59, '2021-09-05', 1),
(64, 59, '2021-09-05', 1),
(65, 15, '2021-09-06', 3),
(66, 59, '2021-09-06', 4),
(67, 59, '2021-09-06', 1),
(68, 15, '2021-09-06', 1),
(69, 15, '2021-09-06', 1),
(70, 59, '2021-09-06', 1),
(71, 59, '2021-09-06', 1),
(72, 59, '2021-09-06', 1),
(73, 59, '2021-09-06', 1),
(74, 59, '2021-09-06', 1),
(75, 59, '2021-09-06', 1),
(76, 59, '2021-09-06', 1),
(77, 59, '2021-09-06', 1),
(78, 59, '2021-09-06', 1),
(79, 59, '2021-09-06', 1),
(80, 59, '2021-09-06', 1),
(81, 59, '2021-09-06', 1),
(82, 59, '2021-09-06', 1),
(83, 15, '2021-09-06', 1),
(84, 59, '2021-09-06', 1),
(85, 59, '2021-09-06', 1),
(86, 59, '2021-09-06', 1),
(87, 59, '2021-09-06', 1),
(88, 59, '2021-09-06', 1),
(89, 59, '2021-09-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_NEARBY`
--

DROP TABLE IF EXISTS `PRD_NEARBY`;
CREATE TABLE IF NOT EXISTS `PRD_NEARBY` (
  `PK_NO` int(2) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(50) DEFAULT NULL,
  `URL_SLUG` varchar(50) DEFAULT NULL,
  `IS_ACTIVE` int(2) NOT NULL DEFAULT '1',
  `ORDER_ID` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `u_url_slug` (`URL_SLUG`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_NEARBY`
--

INSERT INTO `PRD_NEARBY` (`PK_NO`, `TITLE`, `URL_SLUG`, `IS_ACTIVE`, `ORDER_ID`) VALUES
(1, 'Bus Stand', 'bus-stand', 1, 1),
(2, 'Super Shop', 'super-shop', 1, 2),
(3, 'Hospital', 'hospital', 1, 3),
(4, 'School', 'school', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_PROPERTY_CONDITION`
--

DROP TABLE IF EXISTS `PRD_PROPERTY_CONDITION`;
CREATE TABLE IF NOT EXISTS `PRD_PROPERTY_CONDITION` (
  `PK_NO` int(2) NOT NULL AUTO_INCREMENT,
  `PROD_CONDITION` varchar(50) DEFAULT NULL,
  `URL_SLUG` varchar(50) DEFAULT NULL,
  `IS_ACTIVE` tinyint(1) NOT NULL DEFAULT '1',
  `ORDER_ID` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `u_url_slug` (`URL_SLUG`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_PROPERTY_CONDITION`
--

INSERT INTO `PRD_PROPERTY_CONDITION` (`PK_NO`, `PROD_CONDITION`, `URL_SLUG`, `IS_ACTIVE`, `ORDER_ID`) VALUES
(1, 'Ready', 'ready', 1, 1),
(2, 'Semi Ready', 'semi-ready', 1, 2),
(3, 'Ongoing', 'ongoing', 1, 3),
(4, 'Used', 'used', 1, 4),
(5, 'nn', 'nn', 1, 1010);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_PROPERTY_FACING`
--

DROP TABLE IF EXISTS `PRD_PROPERTY_FACING`;
CREATE TABLE IF NOT EXISTS `PRD_PROPERTY_FACING` (
  `PK_NO` int(2) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(50) NOT NULL,
  `URL_SLUG` varchar(50) DEFAULT NULL,
  `IS_ACTIVE` int(2) NOT NULL DEFAULT '1',
  `ORDER_ID` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `u_url_slug` (`URL_SLUG`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_PROPERTY_FACING`
--

INSERT INTO `PRD_PROPERTY_FACING` (`PK_NO`, `TITLE`, `URL_SLUG`, `IS_ACTIVE`, `ORDER_ID`) VALUES
(1, 'South Facing', 'south-facing', 1, 1),
(2, 'North Facing', 'north-facing', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_PROPERTY_TYPE`
--

DROP TABLE IF EXISTS `PRD_PROPERTY_TYPE`;
CREATE TABLE IF NOT EXISTS `PRD_PROPERTY_TYPE` (
  `PK_NO` int(10) NOT NULL AUTO_INCREMENT,
  `PROPERTY_TYPE` varchar(50) DEFAULT NULL,
  `URL_SLUG` varchar(50) DEFAULT NULL,
  `IS_ACTIVE` int(1) NOT NULL DEFAULT '1',
  `ORDER_ID` int(3) NOT NULL DEFAULT '1',
  `TYPE` varchar(10) DEFAULT NULL,
  `META_TITLE` varchar(255) DEFAULT NULL,
  `META_DESC` text,
  `BODY_DESC` text,
  `CATEGORY_URL` varchar(255) DEFAULT NULL,
  `IMG_PATH` varchar(255) DEFAULT NULL,
  `ICON_PATH` varchar(255) DEFAULT NULL,
  `CREATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `CREATED_BY` int(11) DEFAULT NULL,
  `MODIFIED_BY` int(11) DEFAULT NULL,
  `MODIFIED_AT` datetime DEFAULT NULL,
  `TOTAL_LISTING` int(5) NOT NULL DEFAULT '0' COMMENT 'total listing in the category',
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `u_url_slug` (`URL_SLUG`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_PROPERTY_TYPE`
--

INSERT INTO `PRD_PROPERTY_TYPE` (`PK_NO`, `PROPERTY_TYPE`, `URL_SLUG`, `IS_ACTIVE`, `ORDER_ID`, `TYPE`, `META_TITLE`, `META_DESC`, `BODY_DESC`, `CATEGORY_URL`, `IMG_PATH`, `ICON_PATH`, `CREATED_AT`, `CREATED_BY`, `MODIFIED_BY`, `MODIFIED_AT`, `TOTAL_LISTING`) VALUES
(1, 'Apartment', 'apartment', 1, 1, 'A', 'Apartment', 'Apartment', NULL, NULL, NULL, '/media/images/property-category/img_21082021_6121388ceb546.png', '2021-06-01 19:28:13', NULL, 2, '2021-08-21 23:31:56', 29),
(2, 'Office', 'office', 1, 2, 'B', 'Office', 'Office', NULL, NULL, NULL, '/media/images/property-category/img_21082021_6121389b5438e.png', '2021-06-01 19:28:13', NULL, 2, '2021-08-21 23:32:11', 7),
(3, 'Shop', 'shop', 1, 3, 'B', 'Shop', 'Shop', NULL, NULL, NULL, '/media/images/property-category/img_21082021_6121387ee018b.png', '2021-06-01 19:28:13', NULL, 2, '2021-08-21 23:31:42', 4),
(4, 'Warehouse', 'warehouse', 1, 4, 'B', 'Warehouse', 'Warehouse', NULL, NULL, NULL, '/media/images/property-category/img_21082021_612138b6b1f2f.png', '2021-06-01 19:28:13', NULL, 2, '2021-08-21 23:32:38', 0),
(5, 'Industrial space', 'industrial-space', 1, 5, 'B', 'Industrial space', 'Industrial space', NULL, NULL, NULL, '/media/images/property-category/img_21082021_612138657e22e.png', '2021-06-01 19:28:13', NULL, 2, '2021-08-21 23:31:17', 1),
(6, 'Garage', 'garage', 1, 6, 'B', 'Garage', 'Garage', 'Garage', NULL, NULL, '/media/images/property-category/img_20082021_611eb90a87e97.png', '2021-06-01 19:28:13', NULL, 2, '2021-08-20 02:03:22', 0),
(7, 'Land', 'land', 1, 7, 'C', 'Land', 'Land', NULL, NULL, '/media/images/property-category/img_20082021_611eb8e5e1f1e.jpg', '/media/images/property-category/img_21082021_6121380b69140.png', '2021-06-01 19:28:13', NULL, 2, '2021-08-21 23:29:47', 14),
(8, 'Flats', 'flats', 1, 101, NULL, 'Flats', 'Flats available.', NULL, NULL, '/media/images/property-category/img_21082021_61213840b541b.png', '/media/images/property-category/img_21082021_61213840b5cc7.png', '2021-08-21 17:30:40', 2, NULL, '2021-08-21 23:30:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `PRD_REQUIREMENTS`
--

DROP TABLE IF EXISTS `PRD_REQUIREMENTS`;
CREATE TABLE IF NOT EXISTS `PRD_REQUIREMENTS` (
  `PK_NO` int(10) NOT NULL AUTO_INCREMENT,
  `F_USER_NO` int(11) DEFAULT NULL,
  `F_CITY_NO` int(10) DEFAULT NULL,
  `CITY_NAME` varchar(50) DEFAULT NULL,
  `F_AREAS` varchar(100) DEFAULT NULL COMMENT 'AREA ID''S BY COMMA SEPARETED',
  `AREA_NAMES` varchar(200) DEFAULT NULL COMMENT 'AREA NAME BY COMMA SEPARETED',
  `PROPERTY_FOR` varchar(20) DEFAULT NULL COMMENT 'RENT OR BUY',
  `F_PROPERTY_TYPE_NO` int(2) DEFAULT NULL,
  `PROPERTY_TYPE` varchar(50) DEFAULT NULL,
  `MIN_SIZE` int(5) DEFAULT '0',
  `MAX_SIZE` int(5) DEFAULT '0',
  `MIN_BUDGET` float DEFAULT '0',
  `MAX_BUDGET` float DEFAULT '0',
  `BEDROOM` varchar(200) DEFAULT NULL,
  `PROPERTY_CONDITION` varchar(50) DEFAULT NULL,
  `REQUIREMENT_DETAILS` text,
  `PREP_CONT_TIME` time DEFAULT NULL COMMENT 'Preferred time to contact',
  `EMAIL_ALERT` varchar(50) NOT NULL DEFAULT 'WEEKLY' COMMENT 'Daily, Weekly, Monthly',
  `CREATED_AT` datetime DEFAULT NULL,
  `CREATED_BY` int(10) DEFAULT NULL,
  `MODIFYED_AT` datetime DEFAULT NULL,
  `MODIFYED_BY` int(10) DEFAULT NULL,
  `IS_VERIFIED` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=Valid,0=pending,2=Invalid',
  `IS_ACTIVE` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=ACTIVE,0=INACTIVE(it will be old data)',
  `F_VERIFIED_BY` int(10) DEFAULT NULL,
  `VERIFIED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_REQUIREMENTS`
--

INSERT INTO `PRD_REQUIREMENTS` (`PK_NO`, `F_USER_NO`, `F_CITY_NO`, `CITY_NAME`, `F_AREAS`, `AREA_NAMES`, `PROPERTY_FOR`, `F_PROPERTY_TYPE_NO`, `PROPERTY_TYPE`, `MIN_SIZE`, `MAX_SIZE`, `MIN_BUDGET`, `MAX_BUDGET`, `BEDROOM`, `PROPERTY_CONDITION`, `REQUIREMENT_DETAILS`, `PREP_CONT_TIME`, `EMAIL_ALERT`, `CREATED_AT`, `CREATED_BY`, `MODIFYED_AT`, `MODIFYED_BY`, `IS_VERIFIED`, `IS_ACTIVE`, `F_VERIFIED_BY`, `VERIFIED_AT`) VALUES
(7, 20, 1, NULL, '[\"2\",\"3\",\"5\"]', NULL, 'buy', 2, NULL, 800, 1800, 2000000, 3000000, '[\"any\"]', '[\"ready\"]', '<p>I need a perfect property&nbsp;</p>', '01:00:00', 'daily', NULL, 20, NULL, 20, 0, 1, NULL, NULL),
(8, NULL, 1, NULL, '[\"2\",\"3\",\"5\"]', NULL, 'buy', 2, NULL, 800, 1800, 2000000, 3000000, '[\"any\"]', '[\"ready\"]', '<p>I need a perfect property&nbsp;</p>', '01:00:00', 'daily', NULL, 20, NULL, 20, 0, 1, NULL, NULL),
(9, 20, 1, NULL, '[\"5\",\"3\",\"2\"]', NULL, 'buy', 2, NULL, 800, 1800, 2000000, 3000000, '[\"any\"]', '[\"ready\"]', '<p>I need a perfect property&nbsp;</p>', '01:00:00', 'daily', NULL, 20, NULL, 20, 0, 1, NULL, NULL),
(10, 41, 1, NULL, '[\"1\"]', NULL, 'buy', 2, NULL, 100, 1000, 10, 100, '[\"1bed\",\"2bed\"]', '[\"ready\",\"semi\"]', '<p>test</p>', '16:10:00', 'daily', NULL, 41, NULL, 41, 0, 1, NULL, NULL),
(11, NULL, 1, NULL, '[\"2\",\"3\"]', NULL, 'buy', 2, NULL, 1000, 2000, 500000, 1000000, '[\"any\"]', '[\"ready\",\"semi\"]', '<p>Sed ut perspiciatis unde omnis uste natus error sit volupteatem<br />\r\nAccusantium doloremque laudantium</p>', '00:28:00', 'daily', '2021-09-03 00:28:47', 2, '2021-09-03 00:28:47', 42, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SA_PERMISSION_GROUP`
--

DROP TABLE IF EXISTS `SA_PERMISSION_GROUP`;
CREATE TABLE IF NOT EXISTS `SA_PERMISSION_GROUP` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `NAME` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `STATUS` tinyint(4) NOT NULL DEFAULT '0',
  `CREATED_BY` int(11) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL DEFAULT '0',
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_PERMISSION_GROUP`
--

INSERT INTO `SA_PERMISSION_GROUP` (`PK_NO`, `CODE`, `NAME`, `STATUS`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(7, NULL, 'Dashboard', 1, 0, 0, '2020-10-08 15:22:11', '2020-10-08 15:22:11', NULL),
(8, NULL, 'User role', 1, 0, 0, '2020-10-08 15:22:35', '2020-10-08 15:22:35', NULL),
(9, NULL, 'Admin User', 1, 0, 0, '2020-10-08 15:23:50', '2020-10-08 15:23:50', NULL),
(10, NULL, 'Role-Menu', 1, 0, 0, '2020-10-08 17:36:05', '2020-12-18 03:12:48', NULL),
(11, NULL, 'Role-Action', 1, 0, 0, '2020-10-08 18:15:36', '2020-12-18 03:12:56', NULL),
(12, NULL, 'Assign Access', 1, 0, 0, '2020-10-10 20:51:17', '2020-10-10 20:51:17', NULL),
(13, NULL, 'Api Access', 1, 0, 0, '2020-12-16 07:06:02', '2020-12-16 07:06:02', NULL),
(14, NULL, 'Product Master', 1, 0, 0, '2020-12-20 03:52:59', '2020-12-20 03:52:59', NULL),
(15, NULL, 'Product Variant', 1, 0, 0, '2020-12-20 04:19:00', '2020-12-20 04:19:00', NULL),
(16, NULL, 'Product Model', 1, 0, 0, '2020-12-20 04:20:27', '2020-12-20 04:20:27', NULL),
(17, NULL, 'Product Color', 1, 0, 0, '2020-12-20 04:23:05', '2020-12-20 04:23:05', NULL),
(18, NULL, 'Product Size', 1, 0, 0, '2020-12-20 04:24:48', '2020-12-20 04:24:48', NULL),
(20, NULL, 'product Brand', 1, 0, 0, '2020-12-20 04:30:05', '2020-12-20 04:30:05', NULL),
(21, NULL, 'Product HS Code', 1, 0, 0, '2020-12-20 04:46:49', '2020-12-20 04:46:49', NULL),
(22, NULL, 'Product Sub Category', 1, 0, 0, '2020-12-20 04:56:14', '2020-12-20 04:56:14', NULL),
(23, NULL, 'Product Category', 1, 0, 0, '2020-12-20 05:08:20', '2020-12-20 05:08:20', NULL),
(24, NULL, 'Payment Source', 1, 0, 0, '2020-12-20 05:26:56', '2020-12-20 05:33:48', NULL),
(25, NULL, 'Account Name', 1, 0, 0, '2020-12-20 05:29:54', '2020-12-20 05:29:54', NULL),
(26, NULL, 'Payment Method', 1, 0, 0, '2020-12-20 05:33:31', '2020-12-20 05:33:31', NULL),
(27, NULL, 'Agent', 1, 0, 0, '2020-12-20 06:53:09', '2020-12-20 06:53:09', NULL),
(28, NULL, 'Reseller', 1, 0, 0, '2020-12-20 07:06:40', '2020-12-20 07:06:40', NULL),
(29, NULL, 'Vendor', 1, 0, 0, '2020-12-20 07:22:44', '2020-12-20 07:22:44', NULL),
(30, NULL, 'Invoice', 1, 0, 0, '2020-12-20 07:28:48', '2020-12-20 07:28:48', NULL),
(31, NULL, 'Invoice Details', 1, 0, 0, '2020-12-20 07:35:57', '2020-12-20 07:35:57', NULL),
(32, NULL, 'Stock Processing', 1, 0, 0, '2020-12-20 07:39:48', '2021-02-08 10:51:24', NULL),
(33, NULL, 'Vat Processing', 1, 0, 0, '2020-12-20 07:45:24', '2020-12-20 07:45:24', NULL),
(34, NULL, 'Order', 1, 0, 0, '2020-12-20 07:48:15', '2020-12-20 07:48:15', NULL),
(35, NULL, 'Customer', 1, 0, 0, '2020-12-20 07:53:06', '2020-12-20 07:53:06', NULL),
(36, NULL, 'Customer Address', 1, 0, 0, '2020-12-20 07:53:16', '2020-12-20 07:53:16', NULL),
(37, NULL, 'Address Type', 1, 0, 0, '2020-12-20 09:08:38', '2020-12-20 09:08:38', NULL),
(38, NULL, 'Booking', 1, 0, 0, '2020-12-20 09:42:44', '2020-12-20 09:42:44', NULL),
(39, NULL, 'Payment', 1, 0, 0, '2020-12-20 09:47:08', '2020-12-20 09:47:20', NULL),
(41, NULL, 'Box', 1, 0, 0, '2020-12-20 10:08:36', '2020-12-20 10:08:36', NULL),
(42, NULL, 'Shipment Processing', 1, 0, 0, '2020-12-20 10:10:47', '2020-12-20 10:10:47', NULL),
(43, NULL, 'Bank Statement', 1, 0, 0, '2021-01-22 11:05:52', '2021-01-22 11:05:52', NULL),
(46, NULL, 'Dispatch', 1, 0, 0, '2021-02-05 12:09:48', '2021-02-05 12:09:48', NULL),
(47, NULL, 'Dispatched', 1, 0, 0, '2021-02-05 12:09:52', '2021-02-05 12:09:52', NULL),
(48, NULL, 'Product List', 1, 0, 0, '2021-02-07 11:44:18', '2021-02-07 11:44:18', NULL),
(49, NULL, 'User', 1, 0, 0, '2021-02-07 12:38:50', '2021-02-07 12:38:50', NULL),
(50, NULL, 'Payment Processing', 1, 0, 0, '2021-02-08 10:57:09', '2021-02-08 10:57:09', NULL),
(51, NULL, 'System Settings', 1, 0, 0, '2021-02-08 11:33:47', '2021-02-08 11:33:47', NULL),
(52, NULL, 'Currency', 1, 0, 0, '2021-02-08 11:34:16', '2021-02-08 11:34:16', NULL),
(53, NULL, 'City List', 1, 0, 0, '2021-02-08 11:39:18', '2021-02-08 11:39:18', NULL),
(54, NULL, 'Postage List', 1, 0, 0, '2021-02-08 11:39:28', '2021-02-08 11:39:28', NULL),
(55, NULL, 'Payment Section', 1, 0, 0, '2021-02-10 04:03:22', '2021-02-10 04:03:22', NULL),
(56, NULL, 'Warehouse Operation', 1, 0, 0, '2021-02-10 04:16:04', '2021-02-11 13:29:57', NULL),
(57, NULL, 'Warehouse Stock', 1, 0, 0, '2021-02-10 04:17:11', '2021-02-10 04:17:11', NULL),
(58, NULL, 'Warehouse Shelve', 1, 0, 0, '2021-02-10 04:25:19', '2021-02-10 04:25:19', NULL),
(59, NULL, 'Warehouse Unshelved', 1, 0, 0, '2021-02-10 04:28:57', '2021-02-10 04:28:57', NULL),
(60, NULL, 'Not Boxed', 1, 0, 0, '2021-02-10 04:36:26', '2021-02-10 04:36:26', NULL),
(61, NULL, 'Purchace Price', 1, 0, 0, '2021-02-10 07:02:48', '2021-02-10 07:02:48', NULL),
(62, NULL, 'Customer Management', 1, 0, 0, '2021-02-11 09:46:16', '2021-02-11 09:48:27', NULL),
(63, NULL, 'Notification SMS', 1, 0, 0, '2021-02-11 10:37:23', '2021-02-11 10:37:23', NULL),
(64, NULL, 'Report Section', 1, 0, 0, '2021-02-12 12:43:45', '2021-02-12 12:43:45', NULL),
(65, NULL, 'Sales Comission Report', 1, 0, 0, '2021-02-12 12:44:10', '2021-02-12 12:44:10', NULL),
(66, NULL, 'Order Management', 1, 0, 0, '2021-02-15 03:58:37', '2021-02-15 03:58:37', NULL),
(67, NULL, 'Dispatch Management', 1, 0, 0, '2021-02-15 03:58:59', '2021-02-15 03:58:59', NULL),
(68, NULL, 'Search & Book', 1, 0, 0, '2021-02-24 12:19:54', '2021-02-24 12:19:54', NULL),
(69, NULL, 'VIew RTS Collect Button', 1, 0, 0, '2021-03-02 04:06:04', '2021-03-02 04:06:04', NULL),
(70, NULL, 'COD Payment Position', 1, 0, 0, '2021-03-07 21:04:05', '2021-03-07 21:04:05', NULL),
(71, NULL, 'Batch List', 1, 0, 0, '2021-03-10 00:56:27', '2021-03-10 00:56:27', NULL),
(72, NULL, 'App Pending', 1, 0, 0, '2021-03-10 01:01:36', '2021-03-10 01:01:36', NULL),
(73, NULL, 'Shipment Section', 1, 0, 0, '2021-03-18 14:23:49', '2021-03-18 14:23:49', NULL),
(74, NULL, 'Shipping List', 1, 0, 0, '2021-03-18 14:31:42', '2021-03-18 14:31:42', NULL),
(75, NULL, 'Shipping Address', 1, 0, 0, '2021-03-18 15:19:37', '2021-03-18 15:19:37', NULL),
(76, NULL, 'Shipment Signature', 1, 0, 0, '2021-03-18 15:21:50', '2021-03-18 15:21:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SA_PERMISSION_GROUP_DTL`
--

DROP TABLE IF EXISTS `SA_PERMISSION_GROUP_DTL`;
CREATE TABLE IF NOT EXISTS `SA_PERMISSION_GROUP_DTL` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `NAME` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `DISPLAY_NAME` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `F_PERMISSION_GROUP_NO` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '0',
  `CREATED_BY` int(11) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL DEFAULT '0',
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_PERMISSION_GROUP_DTL`
--

INSERT INTO `SA_PERMISSION_GROUP_DTL` (`PK_NO`, `CODE`, `NAME`, `DISPLAY_NAME`, `F_PERMISSION_GROUP_NO`, `STATUS`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(10, NULL, 'view_dashboard', 'View', 7, 1, 0, 0, '2020-10-08 15:25:12', '2020-10-08 15:25:12', NULL),
(11, NULL, 'view_admin_user', 'View', 9, 1, 0, 0, '2020-10-08 15:27:01', '2020-10-08 15:27:01', NULL),
(12, NULL, 'add_admin_user', 'Add', 9, 1, 0, 0, '2020-10-08 15:27:23', '2020-10-08 15:27:23', NULL),
(13, NULL, 'edit_admin_user', 'Edit', 9, 1, 0, 0, '2020-10-08 15:27:38', '2020-10-08 15:27:38', NULL),
(14, NULL, 'delete_admin_user', 'Delete', 9, 1, 0, 0, '2020-10-08 15:27:57', '2020-10-08 15:27:57', NULL),
(15, NULL, 'execute_admin_user', 'Execute', 9, 1, 0, 0, '2020-10-08 15:28:13', '2020-10-08 15:28:13', NULL),
(16, NULL, 'view_role', 'View', 8, 1, 0, 0, '2020-10-08 15:30:09', '2020-10-08 15:30:09', NULL),
(17, NULL, 'add_role', 'Add', 8, 1, 0, 0, '2020-10-08 15:30:20', '2020-10-08 15:30:20', NULL),
(18, NULL, 'edit_role', 'Edit', 8, 1, 0, 0, '2020-10-08 15:30:30', '2020-10-08 15:30:30', NULL),
(19, NULL, 'delete_role', 'Delete', 8, 1, 0, 0, '2020-10-08 15:30:43', '2020-10-08 15:30:43', NULL),
(20, NULL, 'execute_role', 'Execute', 8, 1, 0, 0, '2020-10-08 15:30:53', '2020-10-08 15:30:53', NULL),
(21, NULL, 'view_menu', 'View', 10, 1, 0, 0, '2020-10-08 17:46:54', '2020-10-08 18:17:16', NULL),
(22, NULL, 'new_menu', 'Add', 10, 1, 0, 0, '2020-10-08 17:47:09', '2020-10-08 18:17:26', NULL),
(23, NULL, 'edit_menu', 'Edit', 10, 1, 0, 0, '2020-10-08 17:47:30', '2020-10-08 18:17:34', NULL),
(24, NULL, 'delete_menu', 'Delete', 10, 1, 0, 0, '2020-10-08 17:48:04', '2020-10-08 18:17:48', NULL),
(25, NULL, 'view_action', 'View', 11, 1, 0, 0, '2020-10-08 18:18:47', '2020-10-08 18:18:47', NULL),
(26, NULL, 'new_action', 'Add', 11, 1, 0, 0, '2020-10-08 18:19:23', '2020-10-08 18:19:23', NULL),
(27, NULL, 'edit_action', 'Edit', 11, 1, 0, 0, '2020-10-08 18:19:43', '2020-10-08 18:19:43', NULL),
(28, NULL, 'delete_action', 'Delete', 11, 1, 0, 0, '2020-10-08 18:19:52', '2020-10-08 18:19:52', NULL),
(29, NULL, 'assign_user_access', 'Can Assign User Access', 12, 1, 0, 0, '2020-10-10 20:51:48', '2020-10-10 20:51:48', NULL),
(30, NULL, 'view_product', 'View', 14, 1, 0, 0, '2020-10-18 02:48:56', '2020-12-20 03:53:15', NULL),
(31, NULL, 'new_product', 'New', 14, 1, 0, 0, '2020-10-18 02:51:32', '2020-12-20 04:04:16', NULL),
(32, NULL, 'api_execute', 'Execute', 13, 1, 0, 0, '2020-12-16 07:10:10', '2020-12-16 07:10:10', NULL),
(34, NULL, 'edit_product', 'Edit', 14, 1, 0, 0, '2020-12-20 03:54:09', '2020-12-20 03:54:09', NULL),
(35, NULL, 'delete_product', 'Delete', 14, 1, 0, 0, '2020-12-20 04:03:50', '2020-12-20 04:03:50', NULL),
(36, NULL, 'new_product_variant', 'Add', 15, 1, 0, 0, '2020-12-20 04:19:21', '2020-12-20 04:19:21', NULL),
(37, NULL, 'edit_product_variant', 'Edit', 15, 1, 0, 0, '2020-12-20 04:19:40', '2020-12-20 04:19:40', NULL),
(38, NULL, 'delete_product_variant', 'Delete', 15, 1, 0, 0, '2020-12-20 04:19:54', '2020-12-20 04:19:54', NULL),
(39, NULL, 'new_model', 'Add', 16, 1, 0, 0, '2020-12-20 04:20:50', '2020-12-20 04:22:10', NULL),
(40, NULL, 'view_model', 'View', 16, 1, 0, 0, '2020-12-20 04:21:16', '2020-12-20 04:21:16', NULL),
(41, NULL, 'edit_model', 'Edit', 16, 1, 0, 0, '2020-12-20 04:22:28', '2020-12-20 04:22:28', NULL),
(42, NULL, 'delete_model', 'Delete', 16, 1, 0, 0, '2020-12-20 04:22:39', '2020-12-20 04:22:39', NULL),
(43, NULL, 'view_color', 'View', 17, 1, 0, 0, '2020-12-20 04:23:19', '2020-12-20 04:23:19', NULL),
(44, NULL, 'new_color', 'Add', 17, 1, 0, 0, '2020-12-20 04:23:31', '2020-12-20 04:23:31', NULL),
(45, NULL, 'edit_color', 'Edit', 17, 1, 0, 0, '2020-12-20 04:23:45', '2020-12-20 04:23:45', NULL),
(46, NULL, 'delete_color', 'Delete', 17, 1, 0, 0, '2020-12-20 04:23:57', '2020-12-20 04:23:57', NULL),
(47, NULL, 'view_size', 'View', 18, 1, 0, 0, '2020-12-20 04:24:57', '2020-12-20 04:24:57', NULL),
(48, NULL, 'new_size', 'Add', 18, 1, 0, 0, '2020-12-20 04:25:10', '2020-12-20 04:25:10', NULL),
(49, NULL, 'edit_size', 'Edit', 18, 1, 0, 0, '2020-12-20 04:25:24', '2020-12-20 04:25:24', NULL),
(50, NULL, 'delete_size', 'Delete', 18, 1, 0, 0, '2020-12-20 04:25:35', '2020-12-20 04:25:35', NULL),
(55, NULL, 'view_brand', 'View', 20, 1, 0, 0, '2020-12-20 04:30:15', '2020-12-20 04:30:15', NULL),
(56, NULL, 'new_brand', 'Add', 20, 1, 0, 0, '2020-12-20 04:30:27', '2020-12-20 04:30:27', NULL),
(57, NULL, 'edit_brand', 'Edit', 20, 1, 0, 0, '2020-12-20 04:30:41', '2020-12-20 04:30:41', NULL),
(58, NULL, 'delete_brand', 'Delete', 20, 1, 0, 0, '2020-12-20 04:30:54', '2020-12-20 04:30:54', NULL),
(59, NULL, 'view_hscode', 'View', 21, 1, 0, 0, '2020-12-20 04:47:05', '2020-12-20 04:47:05', NULL),
(60, NULL, 'new_hscode', 'Add', 21, 1, 0, 0, '2020-12-20 04:47:17', '2020-12-20 04:47:17', NULL),
(61, NULL, 'edit_hscode', 'Edit', 21, 1, 0, 0, '2020-12-20 04:47:33', '2020-12-20 04:47:33', NULL),
(62, NULL, 'delete_hscode', 'Delete', 21, 1, 0, 0, '2020-12-20 04:47:44', '2020-12-20 04:47:44', NULL),
(63, NULL, 'view_sub_category', 'View', 22, 1, 0, 0, '2020-12-20 04:56:26', '2020-12-20 04:56:26', NULL),
(64, NULL, 'new_sub_category', 'Add', 22, 1, 0, 0, '2020-12-20 04:56:36', '2020-12-20 04:56:36', NULL),
(65, NULL, 'edit_sub_category', 'Edit', 22, 1, 0, 0, '2020-12-20 04:56:48', '2020-12-20 04:56:48', NULL),
(66, NULL, 'delete_sub_category', 'Delete', 22, 1, 0, 0, '2020-12-20 04:56:58', '2020-12-20 04:56:58', NULL),
(67, NULL, 'view_category', 'View', 23, 1, 0, 0, '2020-12-20 05:08:36', '2020-12-20 05:08:36', NULL),
(68, NULL, 'new_category', 'Add', 23, 1, 0, 0, '2020-12-20 05:08:49', '2020-12-20 05:08:49', NULL),
(69, NULL, 'edit_category', 'Edit', 23, 1, 0, 0, '2020-12-20 05:09:04', '2020-12-20 05:09:04', NULL),
(70, NULL, 'delete_category', 'Delete', 23, 1, 0, 0, '2020-12-20 05:09:15', '2020-12-20 05:09:15', NULL),
(71, NULL, 'view_account_source', 'View', 24, 1, 0, 0, '2020-12-20 05:27:37', '2020-12-20 05:27:37', NULL),
(72, NULL, 'new_account_source', 'Add', 24, 1, 0, 0, '2020-12-20 05:28:07', '2020-12-20 05:28:07', NULL),
(73, NULL, 'delete_account_source', 'Delete', 24, 1, 0, 0, '2020-12-20 05:28:28', '2020-12-20 05:28:28', NULL),
(74, NULL, 'edit_account_source', 'Edit', 24, 1, 0, 0, '2020-12-20 05:28:42', '2020-12-20 05:31:27', NULL),
(75, NULL, 'view_account_name', 'View', 25, 1, 0, 0, '2020-12-20 05:30:08', '2020-12-20 05:30:08', NULL),
(76, NULL, 'new_account_name', 'Add', 25, 1, 0, 0, '2020-12-20 05:30:34', '2020-12-20 05:30:34', NULL),
(77, NULL, 'edit_account_name', 'Edit', 25, 1, 0, 0, '2020-12-20 05:32:06', '2020-12-20 05:32:06', NULL),
(78, NULL, 'delete_account_name', 'Delete', 25, 1, 0, 0, '2020-12-20 05:32:23', '2020-12-20 05:32:23', NULL),
(79, NULL, 'edit_payment_method', 'Edit', 26, 1, 0, 0, '2020-12-20 05:35:07', '2020-12-20 05:35:07', NULL),
(80, NULL, 'delete_payment_method', 'Delete', 26, 1, 0, 0, '2020-12-20 05:35:26', '2020-12-20 05:35:26', NULL),
(81, NULL, 'new_payment_method', 'Add', 26, 1, 0, 0, '2020-12-20 05:35:52', '2020-12-20 05:35:52', NULL),
(82, NULL, 'view_agent', 'View', 27, 1, 0, 0, '2020-12-20 06:53:30', '2020-12-20 06:53:30', NULL),
(83, NULL, 'new_agent', 'Add', 27, 1, 0, 0, '2020-12-20 06:53:44', '2020-12-20 06:53:44', NULL),
(84, NULL, 'edit_agent', 'Edit', 27, 1, 0, 0, '2020-12-20 06:53:57', '2020-12-20 06:53:57', NULL),
(85, NULL, 'delete_agent', 'Delete', 27, 1, 0, 0, '2020-12-20 06:54:12', '2020-12-20 06:54:12', NULL),
(86, NULL, 'new_reseller', 'Add', 28, 1, 0, 0, '2020-12-20 07:06:55', '2020-12-20 07:06:55', NULL),
(87, NULL, 'view_reseller', 'View', 28, 1, 0, 0, '2020-12-20 07:12:14', '2020-12-20 07:12:14', NULL),
(88, NULL, 'edit_reseller', 'Edit', 28, 1, 0, 0, '2020-12-20 07:12:24', '2020-12-20 07:12:24', NULL),
(89, NULL, 'delete_reseller', 'Delete', 28, 1, 0, 0, '2020-12-20 07:12:36', '2020-12-20 07:12:36', NULL),
(90, NULL, 'view_vendor', 'View', 29, 1, 0, 0, '2020-12-20 07:26:05', '2020-12-20 07:26:05', NULL),
(91, NULL, 'new_vendor', 'Add', 29, 1, 0, 0, '2020-12-20 07:26:17', '2020-12-20 07:26:17', NULL),
(92, NULL, 'edit_vendor', 'Edit', 29, 1, 0, 0, '2020-12-20 07:26:28', '2020-12-20 07:26:28', NULL),
(93, NULL, 'delete_vendor', 'Delete', 29, 1, 0, 0, '2020-12-20 07:26:40', '2020-12-20 07:26:40', NULL),
(94, NULL, 'view_invoice', 'View', 30, 1, 0, 0, '2020-12-20 07:29:06', '2020-12-20 07:29:06', NULL),
(95, NULL, 'new_invoice', 'Add', 30, 1, 0, 0, '2020-12-20 07:29:18', '2020-12-20 07:29:18', NULL),
(96, NULL, 'edit_invoice', 'Edit', 30, 1, 0, 0, '2020-12-20 07:29:58', '2020-12-20 07:29:58', NULL),
(97, NULL, 'delete_invoice', 'Delete', 30, 1, 0, 0, '2020-12-20 07:30:08', '2020-12-20 07:30:08', NULL),
(98, NULL, 'view_invoice_details', 'View', 31, 1, 0, 0, '2020-12-20 07:36:09', '2020-12-20 07:36:09', NULL),
(99, NULL, 'new_invoice_details', 'Add', 31, 1, 0, 0, '2020-12-20 07:36:24', '2020-12-20 07:36:24', NULL),
(100, NULL, 'delete_invoice_details', 'Delete', 31, 1, 0, 0, '2020-12-20 07:36:39', '2020-12-20 07:36:39', NULL),
(101, NULL, 'view_vat_processing', 'View', 33, 1, 0, 0, '2020-12-20 07:45:32', '2020-12-20 07:45:32', NULL),
(102, NULL, 'view_order', 'View', 34, 1, 0, 0, '2020-12-20 07:48:31', '2020-12-20 07:48:31', NULL),
(103, NULL, 'new_order', 'Add', 34, 1, 0, 0, '2020-12-20 07:48:43', '2020-12-20 07:48:43', NULL),
(104, NULL, 'edit_order', 'Edit', 34, 1, 0, 0, '2020-12-20 07:48:54', '2020-12-20 07:48:54', NULL),
(105, NULL, 'delete_order', 'Delete', 34, 1, 0, 0, '2020-12-20 07:51:04', '2020-12-20 07:51:04', NULL),
(106, NULL, 'view_customer', 'View', 35, 1, 0, 0, '2020-12-20 07:54:29', '2020-12-20 07:54:29', NULL),
(107, NULL, 'new_customer', 'Add', 35, 1, 0, 0, '2020-12-20 07:54:41', '2020-12-20 07:54:41', NULL),
(108, NULL, 'edit_customer', 'Edit', 35, 1, 0, 0, '2020-12-20 07:54:52', '2020-12-20 07:54:52', NULL),
(109, NULL, 'delete_customer', 'Delete', 35, 1, 0, 0, '2020-12-20 07:55:04', '2020-12-20 07:55:04', NULL),
(110, NULL, 'view_customer_address', 'View', 36, 1, 0, 0, '2020-12-20 09:02:10', '2020-12-20 09:02:10', NULL),
(111, NULL, 'new_customer_address', 'Add', 36, 1, 0, 0, '2020-12-20 09:02:24', '2020-12-20 09:02:24', NULL),
(112, NULL, 'edit_customer_address', 'Edit', 36, 1, 0, 0, '2020-12-20 09:02:35', '2020-12-20 09:02:35', NULL),
(113, NULL, 'delete_customer_address', 'Delete', 36, 1, 0, 0, '2020-12-20 09:02:47', '2020-12-20 09:02:47', NULL),
(114, NULL, 'view_address_type', 'View', 37, 1, 0, 0, '2020-12-20 09:09:16', '2020-12-20 09:09:16', NULL),
(115, NULL, 'new_address_type', 'Add', 37, 1, 0, 0, '2020-12-20 09:09:27', '2020-12-20 09:09:27', NULL),
(116, NULL, 'edit_address_type', 'Edit', 37, 1, 0, 0, '2020-12-20 09:09:41', '2020-12-20 09:09:41', NULL),
(117, NULL, 'delete_address_type', 'Delete', 37, 1, 0, 0, '2020-12-20 09:09:51', '2020-12-20 09:09:51', NULL),
(118, NULL, 'new_booking', 'Add', 38, 1, 0, 0, '2020-12-20 09:43:19', '2020-12-20 09:43:19', NULL),
(119, NULL, 'view_booking', 'View', 38, 1, 0, 0, '2020-12-20 09:43:31', '2020-12-20 09:43:31', NULL),
(120, NULL, 'edit_booking', 'Edit', 38, 1, 0, 0, '2020-12-20 09:43:43', '2020-12-20 09:43:43', NULL),
(121, NULL, 'delete_booking', 'Delete', 38, 1, 0, 0, '2020-12-20 09:43:54', '2020-12-20 09:43:54', NULL),
(122, NULL, 'invoice_payment_processing', 'View', 30, 1, 0, 0, '2020-12-20 09:49:12', '2020-12-20 09:49:12', NULL),
(123, NULL, 'view_payment', 'View', 39, 1, 0, 0, '2020-12-20 09:49:50', '2020-12-20 09:49:50', NULL),
(124, NULL, 'new_payment', 'Add', 39, 1, 0, 0, '2020-12-20 09:50:02', '2020-12-20 09:50:02', NULL),
(125, NULL, 'edit_payment', 'Edit', 39, 1, 0, 0, '2020-12-20 09:50:14', '2020-12-20 09:50:14', NULL),
(126, NULL, 'delete_payment', 'Delete', 39, 1, 0, 0, '2020-12-20 09:50:24', '2020-12-20 09:50:24', NULL),
(131, NULL, 'new_shipment_box', 'Add Box', 74, 1, 0, 0, '2020-12-20 10:09:09', '2021-03-18 14:37:33', NULL),
(133, NULL, 'view_shipment_processing', 'View', 42, 1, 0, 0, '2020-12-20 10:11:00', '2020-12-20 10:11:00', NULL),
(134, NULL, 'edit_shipment_processing', 'Edit', 42, 1, 0, 0, '2020-12-20 10:11:11', '2020-12-20 10:11:11', NULL),
(135, NULL, 'view_box', 'View Box', 74, 1, 0, 0, '2020-12-20 10:18:28', '2021-03-18 14:57:09', NULL),
(136, NULL, 'delete_box', 'Delete', 41, 1, 0, 0, '2020-12-20 10:18:38', '2020-12-20 10:18:38', NULL),
(137, NULL, 'edit_box_label', 'Edit', 41, 1, 0, 0, '2020-12-21 09:45:24', '2020-12-21 09:45:24', NULL),
(138, NULL, 'new_bank_state', 'Add', 43, 1, 0, 0, '2021-01-22 11:06:27', '2021-01-22 11:06:27', NULL),
(139, NULL, 'view_bank_state', 'View', 43, 1, 0, 0, '2021-01-22 11:06:41', '2021-01-22 11:06:58', NULL),
(140, NULL, 'edit_bank_state', 'Edit', 43, 1, 0, 0, '2021-01-22 11:07:11', '2021-01-22 11:07:11', NULL),
(141, NULL, 'delete_bank_state', 'Delete', 43, 1, 0, 0, '2021-01-22 11:07:22', '2021-01-22 11:07:22', NULL),
(142, NULL, 'view_dispatch', 'View', 46, 1, 0, 0, '2021-02-05 12:10:10', '2021-02-05 12:10:10', NULL),
(143, NULL, 'view_dispatched', 'View', 47, 1, 0, 0, '2021-02-05 12:10:18', '2021-02-05 12:10:18', NULL),
(144, NULL, 'edit_dispatch', 'Edit', 47, 1, 0, 0, '2021-02-05 12:10:30', '2021-02-05 12:10:30', NULL),
(145, NULL, 'view_product_list', 'View', 48, 1, 0, 0, '2021-02-07 11:45:51', '2021-02-07 11:45:51', NULL),
(146, NULL, 'edit_product_list', 'Edit', 48, 1, 0, 0, '2021-02-07 11:46:47', '2021-02-07 11:46:47', NULL),
(147, NULL, 'edit_user', 'Edit', 49, 1, 0, 0, '2021-02-07 12:39:28', '2021-02-07 12:39:28', NULL),
(148, NULL, 'view_invoice_processing', 'View', 32, 1, 0, 0, '2021-02-08 10:54:04', '2021-02-08 10:54:04', NULL),
(149, NULL, 'delete_invoice_processing', 'Delete', 32, 1, 0, 0, '2021-02-08 10:54:20', '2021-02-08 10:54:20', NULL),
(150, NULL, 'new_invoice_processing', 'Add', 32, 1, 0, 0, '2021-02-08 10:54:35', '2021-02-08 10:54:35', NULL),
(151, NULL, 'view_payment_processing', 'View', 50, 1, 0, 0, '2021-02-08 11:01:13', '2021-02-08 11:01:13', NULL),
(152, NULL, 'view_system_settings', 'View', 51, 1, 0, 0, '2021-02-08 11:34:02', '2021-02-08 11:34:02', NULL),
(153, NULL, 'view_currency', 'View', 52, 1, 0, 0, '2021-02-08 11:34:33', '2021-02-08 11:34:33', NULL),
(154, NULL, 'edit_currency', 'Edit', 52, 1, 0, 0, '2021-02-08 11:34:45', '2021-02-08 11:34:45', NULL),
(155, NULL, 'delete_currency', 'Delete', 52, 1, 0, 0, '2021-02-08 11:34:55', '2021-02-08 11:34:55', NULL),
(156, NULL, 'view_city_list', 'View', 53, 1, 0, 0, '2021-02-08 11:39:42', '2021-02-08 11:39:42', NULL),
(157, NULL, 'view_postage_list', 'View', 54, 1, 0, 0, '2021-02-08 11:39:55', '2021-02-08 11:39:55', NULL),
(158, NULL, 'edit_postage_list', 'Edit', 54, 1, 0, 0, '2021-02-08 11:40:06', '2021-02-08 11:40:06', NULL),
(159, NULL, 'edit_city_list', 'Edit', 53, 1, 0, 0, '2021-02-08 11:40:16', '2021-02-08 11:40:16', NULL),
(160, NULL, 'view_payment_section', 'View', 55, 1, 0, 0, '2021-02-10 04:03:31', '2021-02-10 04:03:31', NULL),
(161, NULL, 'view_warehouse_section', 'View', 56, 1, 0, 0, '2021-02-10 04:16:14', '2021-02-10 04:16:14', NULL),
(162, NULL, 'view_warehouse_stock', 'View', 57, 1, 0, 0, '2021-02-10 04:17:19', '2021-02-10 04:17:19', NULL),
(163, NULL, 'add_shelve', 'Add', 58, 1, 0, 0, '2021-02-10 04:25:29', '2021-02-10 04:25:29', NULL),
(164, NULL, 'view_warehouse_shelved', 'View', 58, 1, 0, 0, '2021-02-10 04:27:47', '2021-02-10 04:27:47', NULL),
(165, NULL, 'view_warehouse_unshelved', 'View', 59, 1, 0, 0, '2021-02-10 04:29:06', '2021-02-10 04:29:06', NULL),
(166, NULL, 'view_not_boxed', 'View', 60, 1, 0, 0, '2021-02-10 04:36:36', '2021-02-10 04:36:36', NULL),
(167, NULL, 'view_purchace_price', 'View', 61, 1, 0, 0, '2021-02-10 07:02:58', '2021-02-10 07:02:58', NULL),
(168, NULL, 'view_warehouse_stock_view', 'View Product Details', 57, 1, 0, 0, '2021-02-10 10:07:28', '2021-02-10 10:07:28', NULL),
(169, NULL, 'view_customer_section', 'View', 62, 1, 0, 0, '2021-02-11 09:46:45', '2021-02-11 09:46:45', NULL),
(170, NULL, 'view_notify_sms', 'View', 63, 1, 0, 0, '2021-02-11 10:37:43', '2021-02-11 13:33:39', NULL),
(171, NULL, 'send_notify_sms', 'Send Notification', 63, 1, 0, 0, '2021-02-11 13:36:08', '2021-02-11 13:36:08', NULL),
(172, NULL, 'view_sales_report_section', 'View', 64, 1, 0, 0, '2021-02-12 12:44:40', '2021-02-12 12:45:35', NULL),
(173, NULL, 'view_sales_report', 'View', 65, 1, 0, 0, '2021-02-12 12:45:04', '2021-02-12 12:45:04', NULL),
(174, NULL, 'view_dispatch_management', 'View', 67, 1, 0, 0, '2021-02-15 03:59:28', '2021-02-15 03:59:28', NULL),
(175, NULL, 'new_search_booking', 'View', 68, 1, 0, 0, '2021-02-24 12:20:05', '2021-02-24 12:20:05', NULL),
(176, NULL, 'view_rts_collect_btn', 'View', 69, 1, 0, 0, '2021-03-02 04:07:42', '2021-03-02 04:07:42', NULL),
(177, NULL, 'view_collection_list', 'View Payment', 70, 1, 0, 0, '2021-03-07 21:05:05', '2021-03-07 21:05:05', NULL),
(178, NULL, 'view_collection_list_breakdown', 'View Payment Breakdowns', 70, 1, 0, 0, '2021-03-07 21:05:52', '2021-03-07 21:05:52', NULL),
(179, NULL, 'view_cod_user_stock_list', 'View Stock Items', 70, 1, 0, 0, '2021-03-07 21:06:26', '2021-03-07 21:06:26', NULL),
(180, NULL, 'view_batch_collected', 'View', 71, 1, 0, 0, '2021-03-10 00:56:43', '2021-03-10 00:56:43', NULL),
(181, NULL, 'view_item_collected', 'View Batch Items', 71, 1, 0, 0, '2021-03-10 00:58:31', '2021-03-10 00:58:31', NULL),
(182, NULL, 'view_order_collect', 'View Order', 71, 1, 0, 0, '2021-03-10 00:59:26', '2021-03-10 00:59:26', NULL),
(183, NULL, 'assign_item_collect', 'Assign User', 71, 1, 0, 0, '2021-03-10 01:00:39', '2021-03-10 01:00:39', NULL),
(184, NULL, 'view_pending_app_dispach', 'View App Pending List', 72, 1, 0, 0, '2021-03-10 01:01:56', '2021-03-10 01:01:56', NULL),
(185, NULL, 'view_dashboard_cards_sales_agent', 'View Cards(Sales Agent)', 7, 1, 0, 0, '2021-03-14 01:51:51', '2021-03-14 02:07:01', NULL),
(186, NULL, 'view_dashboard_cards_my_manager', 'View Cards(MY Manager)', 7, 1, 0, 0, '2021-03-14 02:08:06', '2021-03-14 02:08:06', NULL),
(187, NULL, 'view_dashboard_cards_uk_manager', 'View Cards(UK Manager)', 7, 1, 0, 0, '2021-03-14 02:08:40', '2021-03-14 02:08:40', NULL),
(188, NULL, 'view_shipment_section', 'View Section', 73, 1, 0, 0, '2021-03-18 14:29:49', '2021-03-18 14:29:49', NULL),
(189, NULL, 'new_shipment', 'Add/Edit Shipment', 74, 1, 0, 0, '2021-03-18 14:31:09', '2021-03-18 14:34:54', NULL),
(190, NULL, 'view_shipment', 'View', 74, 1, 0, 0, '2021-03-18 14:35:27', '2021-03-18 14:35:27', NULL),
(191, NULL, 'delete_shipment_box', 'Delete Box', 74, 1, 0, 0, '2021-03-18 15:00:50', '2021-03-18 15:00:50', NULL),
(192, NULL, 'view_faulty', 'Mark Faulty', 74, 1, 0, 0, '2021-03-18 15:01:38', '2021-03-18 15:12:51', NULL),
(193, NULL, 'add_packaging', 'Add Packing', 42, 1, 0, 0, '2021-03-18 15:11:26', '2021-03-18 15:11:26', NULL),
(194, NULL, 'edit_packaging', 'Edit Packing', 42, 1, 0, 0, '2021-03-18 15:12:25', '2021-03-18 15:12:25', NULL),
(195, NULL, 'view_shipping_address', 'View', 75, 1, 0, 0, '2021-03-18 15:22:31', '2021-03-18 15:22:31', NULL),
(196, NULL, 'new_shipping_address', 'Add', 75, 1, 0, 0, '2021-03-18 15:22:48', '2021-03-18 15:22:48', NULL),
(197, NULL, 'edit_shipping_address', 'Edit', 75, 1, 0, 0, '2021-03-18 15:23:26', '2021-03-18 15:23:26', NULL),
(198, NULL, 'delete_shipping_address', 'Delete', 75, 1, 0, 0, '2021-03-18 15:23:51', '2021-03-18 15:23:51', NULL),
(199, NULL, 'view_shipment_signature', 'View', 76, 1, 0, 0, '2021-03-18 15:24:47', '2021-03-18 15:24:47', NULL),
(200, NULL, 'new_shipment_signature', 'Add', 76, 1, 0, 0, '2021-03-18 15:25:16', '2021-03-18 15:25:16', NULL),
(201, NULL, 'edit_shipment_signature', 'Edit', 76, 1, 0, 0, '2021-03-18 15:25:48', '2021-03-18 15:25:48', NULL),
(202, NULL, 'delete_shipment_signature', 'Delete', 76, 1, 0, 0, '2021-03-18 15:26:08', '2021-03-18 15:26:08', NULL),
(203, NULL, 'new_stock', 'Generate Stock', 32, 1, 0, 0, '2021-03-20 15:48:31', '2021-03-20 15:48:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SA_ROLE`
--

DROP TABLE IF EXISTS `SA_ROLE`;
CREATE TABLE IF NOT EXISTS `SA_ROLE` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `NAME` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '0',
  `CREATED_BY` int(11) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL DEFAULT '0',
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_ROLE`
--

INSERT INTO `SA_ROLE` (`PK_NO`, `CODE`, `NAME`, `STATUS`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, NULL, 'Super admin', 1, 0, 0, '2020-03-04 22:42:11', '2017-03-13 07:42:11', NULL),
(8, NULL, 'Admin', 1, 0, 0, '2020-03-04 22:42:11', NULL, NULL),
(12, NULL, 'Manager (MY)', 1, 0, 0, '2020-10-07 20:02:37', '2021-02-19 12:21:13', NULL),
(13, NULL, 'User', 1, 0, 0, '2020-03-04 22:42:11', '2021-02-08 09:09:03', NULL),
(16, NULL, 'App User', 1, 0, 0, '2020-12-16 05:15:32', '2020-12-16 07:00:25', NULL),
(17, NULL, 'Sales Agent', 1, 0, 0, '2021-02-05 12:02:48', '2021-02-10 03:44:21', NULL),
(19, NULL, 'Manager (UK)', 1, 0, 0, '2021-02-08 10:36:51', '2021-02-19 12:22:20', NULL),
(20, NULL, 'Logistics (MY)', 1, 0, 0, '2021-02-16 02:59:51', '2021-02-19 12:21:57', NULL),
(21, NULL, 'COD Dispatcher', 1, 0, 0, '2021-03-02 01:36:22', '2021-03-02 01:37:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SA_ROLE_DTL`
--

DROP TABLE IF EXISTS `SA_ROLE_DTL`;
CREATE TABLE IF NOT EXISTS `SA_ROLE_DTL` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `PERMISSIONS` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `F_ROLE_NO` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL DEFAULT '0',
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_ROLE_DTL`
--

INSERT INTO `SA_ROLE_DTL` (`PK_NO`, `CODE`, `PERMISSIONS`, `F_ROLE_NO`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, NULL, ',view_dashboard,', 1, 0, 0, NULL, NULL, NULL),
(2, NULL, ',view_pending_app_dispach,view_batch_collected,view_item_collected,view_order_collect,assign_item_collect,new_booking,view_booking,edit_booking,delete_booking,view_customer,new_customer,edit_customer,delete_customer,view_customer_address,new_customer_address,edit_customer_address,delete_customer_address,view_customer_section,view_dashboard,view_dashboard_cards_my_manager,view_dispatch,view_dispatch_management,view_dispatched,edit_dispatch,view_notify_sms,send_notify_sms,view_order,new_order,edit_order,delete_order,view_payment,new_payment,edit_payment,delete_payment,view_payment_section,view_product_list,view_product,new_reseller,view_reseller,edit_reseller,delete_reseller,new_search_booking,edit_user,view_rts_collect_btn,view_warehouse_section,view_warehouse_stock,view_warehouse_stock_view,', 12, 0, 0, '2020-10-07 20:02:37', '2021-03-14 02:10:44', NULL),
(3, NULL, ',view_dashboard,add_user_report,execute_dashboard,view_role,', 8, 0, 0, NULL, NULL, NULL),
(4, NULL, ',view_dashboard,edit_user,view_role,', 13, 0, 0, NULL, '2021-02-08 09:09:03', NULL),
(5, NULL, ',view_admin_user,api_execute,view_dashboard,edit_user,', 16, 0, 0, '2020-12-16 05:15:32', '2021-02-08 09:09:07', NULL),
(6, NULL, ',new_booking,view_booking,edit_booking,delete_booking,view_collection_list,view_collection_list_breakdown,view_cod_user_stock_list,view_customer,new_customer,edit_customer,view_customer_address,new_customer_address,edit_customer_address,view_customer_section,view_dashboard,view_dashboard_cards_sales_agent,view_dispatch,view_dispatch_management,view_dispatched,edit_dispatch,view_order,edit_order,delete_order,view_payment,new_payment,edit_payment,view_payment_section,view_sales_report_section,view_sales_report,new_search_booking,edit_user,view_warehouse_section,view_warehouse_stock,', 17, 0, 0, '2021-02-05 12:02:48', '2021-03-17 00:15:38', NULL),
(7, NULL, ',new_booking,view_booking,edit_booking,delete_booking,delete_shipment_box,delete_box,edit_box_label,view_dashboard,view_dashboard_cards_uk_manager,view_invoice,new_invoice,edit_invoice,delete_invoice,invoice_payment_processing,view_invoice_details,new_invoice_details,delete_invoice_details,view_not_boxed,view_account_source,new_account_source,view_brand,view_category,view_hscode,view_product_list,view_purchace_price,view_shipment_processing,edit_shipment_processing,add_packaging,edit_packaging,view_shipment_section,view_shipment_signature,new_shipment_signature,edit_shipment_signature,delete_shipment_signature,view_shipping_address,new_shipping_address,edit_shipping_address,delete_shipping_address,new_shipment_box,view_box,new_shipment,view_shipment,delete_shipment_box,view_faulty,view_invoice_processing,delete_invoice_processing,new_invoice_processing,new_stock,edit_user,view_vat_processing,view_vendor,new_vendor,edit_vendor,delete_vendor,view_warehouse_section,view_warehouse_stock,view_warehouse_stock_view,', 19, 0, 0, '2021-02-08 10:36:51', '2021-03-20 15:49:04', NULL),
(8, NULL, ',view_dashboard,', 20, 0, 0, '2021-02-16 02:59:51', '2021-02-16 02:59:51', NULL),
(9, NULL, ',api_execute,edit_user,', 21, 0, 0, '2021-03-02 01:36:22', '2021-03-02 01:37:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SA_TOKEN`
--

DROP TABLE IF EXISTS `SA_TOKEN`;
CREATE TABLE IF NOT EXISTS `SA_TOKEN` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `F_USER_NO` int(11) NOT NULL,
  `TOKEN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CLIENT` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `IP_ADDRESS` varchar(20) DEFAULT NULL,
  `IS_EXPIRE` int(11) NOT NULL DEFAULT '0',
  `STARTED_AT` datetime NOT NULL,
  `EXPIRE_AT` datetime NOT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_TOKEN`
--

INSERT INTO `SA_TOKEN` (`PK_NO`, `CODE`, `F_USER_NO`, `TOKEN`, `CLIENT`, `IP_ADDRESS`, `IS_EXPIRE`, `STARTED_AT`, `EXPIRE_AT`) VALUES
(2, NULL, 54, '3bad48d417c012b7af2eaa43aa97a50d4ae8e496688fbe89282cd4cca6784cd1', 'okhttp/3.8.0', NULL, 1, '2021-04-02 07:13:01', '2022-04-02 07:13:01'),
(3, NULL, 67, 'e35f048b4d038de19cfb5610ae5b19255206e8649ab2c58793e4f76761fc2375', 'okhttp/3.8.0', NULL, 1, '2021-04-02 07:15:41', '2022-04-02 07:15:41'),
(4, NULL, 17, 'a1941bd66393010af191f4732078b45ad74104a4d6911abc17faff0453f37471', 'okhttp/3.8.0', NULL, 1, '2021-04-02 08:54:04', '2022-04-02 08:54:04'),
(5, NULL, 67, '0fc80015a1759c893d21363fa322a29bcc08eefcb3ef3eec6c590cbbd1104ace', 'okhttp/3.8.0', NULL, 0, '2021-04-02 08:57:36', '2022-04-02 08:57:36'),
(6, NULL, 17, 'e96ef92b54c898d5f80af757f2a3ab6ac10d94ba44f54537a1aa122ac0719f06', 'okhttp/3.8.0', NULL, 0, '2021-04-02 08:59:40', '2022-04-02 08:59:40'),
(7, NULL, 54, 'c2787dd3246a52e4a602d693814f24f4a733007562cc60b8da2d356971029d85', 'okhttp/3.8.0', NULL, 0, '2021-04-02 08:59:56', '2022-04-02 08:59:56'),
(8, NULL, 1, '1f865f987ba5d9a4401dc5463f2a74ea49de3397d1ce14d9def723da8cb85a14', 'okhttp/3.8.0', NULL, 0, '2021-04-03 04:27:51', '2022-04-03 04:27:51'),
(9, NULL, 62, 'a8bc36575b8227eac54f3c0b9f2949bb1a13ddc382f65fc92b7f3fd7e0919d08', 'okhttp/3.8.0', NULL, 0, '2021-04-03 22:09:59', '2022-04-03 22:09:59'),
(10, NULL, 18, '1da4c8180f0f1fea298ea4ce2db13d80474109a84e294e734665127149120431', 'PostmanRuntime/7.26.8', NULL, 0, '2021-04-04 15:20:05', '2022-04-04 15:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `SA_USER`
--

DROP TABLE IF EXISTS `SA_USER`;
CREATE TABLE IF NOT EXISTS `SA_USER` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `USERNAME` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FIRST_NAME` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `LAST_NAME` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DESIGNATION` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MOBILE_NO` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASSWORD` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `GENDER` int(11) DEFAULT '1',
  `DOB` date DEFAULT NULL,
  `FACEBOOK_ID` int(20) DEFAULT NULL,
  `GOOGLE_ID` int(20) DEFAULT NULL,
  `PROFILE_PIC` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROFILE_PIC_URL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PIC_MIME_TYPE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ACTIVATION_CODE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ACTIVATION_CODE_EXPIRE` datetime DEFAULT NULL,
  `IS_FIRST_LOGIN` int(11) NOT NULL DEFAULT '1',
  `USER_TYPE` int(11) NOT NULL DEFAULT '0',
  `CAN_LOGIN` int(11) NOT NULL DEFAULT '1',
  `REMEMBER_TOKEN` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
  `F_AGENT_NO` int(11) DEFAULT '0',
  `F_PARENT_USER_ID` int(11) DEFAULT '0',
  `F_USER_GROUP_NO` int(11) NOT NULL,
  `USR_CUSTOM_PERMISSION` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `IS_SECONDARY_USER` int(11) DEFAULT '0',
  `CREATED_BY` int(11) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL DEFAULT '0',
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `IS_EMAIL_VERIFIED` int(11) DEFAULT '0',
  `IS_MOBILE_VERIFIED` int(11) DEFAULT '0',
  `EMAIL_VERIFY_CODE` varchar(50) DEFAULT NULL,
  `EMAIL_VERIFY_EXPIRE` datetime DEFAULT NULL,
  `MOBILE_VERITY_CODE` varchar(50) DEFAULT NULL,
  `MOBILE_VERIFY_EXPIRE` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_USER`
--

INSERT INTO `SA_USER` (`PK_NO`, `CODE`, `USERNAME`, `FIRST_NAME`, `LAST_NAME`, `DESIGNATION`, `EMAIL`, `MOBILE_NO`, `PASSWORD`, `GENDER`, `DOB`, `FACEBOOK_ID`, `GOOGLE_ID`, `PROFILE_PIC`, `PROFILE_PIC_URL`, `PIC_MIME_TYPE`, `ACTIVATION_CODE`, `ACTIVATION_CODE_EXPIRE`, `IS_FIRST_LOGIN`, `USER_TYPE`, `CAN_LOGIN`, `REMEMBER_TOKEN`, `STATUS`, `F_AGENT_NO`, `F_PARENT_USER_ID`, `F_USER_GROUP_NO`, `USR_CUSTOM_PERMISSION`, `IS_SECONDARY_USER`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `IS_EMAIL_VERIFIED`, `IS_MOBILE_VERIFIED`, `EMAIL_VERIFY_CODE`, `EMAIL_VERIFY_EXPIRE`, `MOBILE_VERITY_CODE`, `MOBILE_VERIFY_EXPIRE`) VALUES
(1, NULL, 'Sharif', 'Super', 'Admin', 'Super', 'sharif@gmail.com', '01983798502', '$2y$10$aAANKQzyqfRinNTVZ1tlfesvIGYHWa4.Hg5IER24IiykshzpqhZeC', 1, NULL, NULL, NULL, 'profile_22032021_1616364686.jpeg', 'https://admin.azuramart.com/media/images/profile/profile_22032021_1616364686.jpeg', NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, NULL, '2021-03-22 06:11:40', 0, 0, NULL, NULL, NULL, NULL),
(2, NULL, 'admin', 'Admin', 'General', 'General Admin', 'admin@admin.com', '01716824758', '$2y$10$aAANKQzyqfRinNTVZ1tlfesvIGYHWa4.Hg5IER24IiykshzpqhZeC', 1, NULL, NULL, NULL, 'profile_10082021_1628616332.jpg', 'http://localhost/test/bdflat/panel/public/media/images/profile/profile_10082021_1628616332.jpg', NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, '2020-10-05 05:06:35', '2021-08-10 23:25:32', 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SA_USER_GROUP`
--

DROP TABLE IF EXISTS `SA_USER_GROUP`;
CREATE TABLE IF NOT EXISTS `SA_USER_GROUP` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `GROUP_NAME` varchar(255) CHARACTER SET utf8 NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '0',
  `CREATED_BY` int(11) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL DEFAULT '0',
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_USER_GROUP`
--

INSERT INTO `SA_USER_GROUP` (`PK_NO`, `CODE`, `GROUP_NAME`, `STATUS`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, NULL, 'Super User', 1, 0, 0, NULL, '2020-10-10 17:45:46', NULL),
(3, NULL, 'General Admin Group', 1, 0, 0, '2020-10-10 17:33:26', '2020-10-10 17:45:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SA_USER_GROUP_ROLE`
--

DROP TABLE IF EXISTS `SA_USER_GROUP_ROLE`;
CREATE TABLE IF NOT EXISTS `SA_USER_GROUP_ROLE` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `F_USER_GROUP_NO` int(11) NOT NULL,
  `F_ROLE_NO` int(11) NOT NULL,
  `GRP_CUSTOM_PERMISSION` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `STATUS` int(11) NOT NULL DEFAULT '0',
  `CREATED_BY` int(11) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL DEFAULT '0',
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_USER_GROUP_ROLE`
--

INSERT INTO `SA_USER_GROUP_ROLE` (`PK_NO`, `CODE`, `F_USER_GROUP_NO`, `F_ROLE_NO`, `GRP_CUSTOM_PERMISSION`, `STATUS`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(11, NULL, 1, 1, NULL, 1, 0, 0, NULL, '2020-10-10 17:45:46', NULL),
(12, NULL, 3, 8, NULL, 1, 0, 0, '2020-10-10 17:33:26', '2020-10-10 17:45:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SA_USER_GROUP_USERS`
--

DROP TABLE IF EXISTS `SA_USER_GROUP_USERS`;
CREATE TABLE IF NOT EXISTS `SA_USER_GROUP_USERS` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `F_GROUP_NO` int(11) DEFAULT '0',
  `F_USER_NO` int(11) DEFAULT '0',
  `STATUS` int(11) NOT NULL DEFAULT '0',
  `CREATED_BY` int(11) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL DEFAULT '0',
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_USER_GROUP_USERS`
--

INSERT INTO `SA_USER_GROUP_USERS` (`PK_NO`, `CODE`, `F_GROUP_NO`, `F_USER_NO`, `STATUS`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(22, NULL, 1, 2, 1, 0, 0, '2020-10-04 22:06:35', '2021-08-10 23:25:32', NULL),
(24, NULL, 1, 1, 1, 0, 0, NULL, NULL, NULL),
(28, NULL, 5, 44, 1, 0, 0, '2020-12-16 03:45:49', '2020-12-16 03:46:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SLS_AGENTS`
--

DROP TABLE IF EXISTS `SLS_AGENTS`;
CREATE TABLE IF NOT EXISTS `SLS_AGENTS` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `NAME` varchar(200) DEFAULT NULL,
  `MOBILE_NO` varchar(20) DEFAULT NULL,
  `ALTERNATE_NO` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(200) DEFAULT NULL,
  `FB_ID` varchar(200) DEFAULT NULL,
  `IG_ID` varchar(200) DEFAULT NULL,
  `UKSHOP_ID` varchar(50) DEFAULT NULL,
  `UKSHOP_PASS` varchar(255) DEFAULT NULL,
  `IS_ACTIVE` int(11) DEFAULT NULL,
  `CUM_ORDERS_QTY` int(50) DEFAULT NULL,
  `CUM_ORDERS_VAL` float DEFAULT NULL,
  `CUM_BALANCE` float DEFAULT NULL,
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `u_sls_agents` (`CODE`),
  UNIQUE KEY `u_sls_agents_id` (`UKSHOP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SLS_AGENTS`
--

INSERT INTO `SLS_AGENTS` (`PK_NO`, `CODE`, `NAME`, `MOBILE_NO`, `ALTERNATE_NO`, `EMAIL`, `FB_ID`, `IG_ID`, `UKSHOP_ID`, `UKSHOP_PASS`, `IS_ACTIVE`, `CUM_ORDERS_QTY`, `CUM_ORDERS_VAL`, `CUM_BALANCE`) VALUES
(1, 28, 'DEMO', '123456789', NULL, 'demo@gmail.com', NULL, NULL, NULL, '$2y$10$MzzdBBJ2tE0.TDPO17DMpuHrt1cuEXVahB/Lubk3wsrOpQpXc6FrS', 0, NULL, NULL, NULL),
(7, 17, 'Azura', '07983283981', NULL, 'azura@azuramart.com', NULL, NULL, NULL, '$2y$10$L8.MgwGa3SF8lXXHx6cXQ.nBvHS9sgCo7FjiLuhA66Al7F3rBOwWm', 1, NULL, NULL, NULL),
(8, 18, 'Huda', '0186687939', NULL, 'huda@azuramart.com', NULL, NULL, NULL, '$2y$10$AQISO8evFdYKpKMKR2jL4u/NNBtdRxc7whxPzdQKav1oWWw7VWZx6', 1, NULL, NULL, NULL),
(9, 19, 'Mira', '01129055377', NULL, 'mira@azuramart.com', NULL, NULL, NULL, '$2y$10$lHFqK4SPnfs5sNnWp/cC1OxB2xapfZ5ZDBb/2qbnyV6PXUGgvnaqq', 1, NULL, NULL, NULL),
(10, 20, 'Syarifah', '0104054788', NULL, 'syarifah@azuramart.com', NULL, NULL, NULL, '$2y$10$sv9Togusf/79smPg8MfaK.spRBtZdlB.5kHAOUwR7dFE75U9qHSVi', 1, NULL, NULL, NULL),
(11, 21, 'Farah', '0177966041', NULL, 'farah@azuramart.com', NULL, NULL, NULL, '$2y$10$wIMCmrg03N/qkt88YO9gEOuGialjvwD//k7gj3vmnAOx76MG8xG0C', 0, NULL, NULL, NULL),
(13, 23, 'HUDA', '123456789', NULL, 'huda@azuramart.com', NULL, NULL, NULL, '$2y$10$xLiX2Xz.jubgQBiuPt675.3ImVMxfkjTVcqlHDXI54zzuHVB2gh9K', 0, NULL, NULL, NULL),
(15, 25, 'AZURA', '1234567789', NULL, 'azura@azuramart.com', NULL, NULL, NULL, '$2y$10$w/6KysEadtfINCyag5s.S.La6HfLQBvnXBF9F4AK5ycri3bswBsAK', 0, NULL, NULL, NULL),
(16, 26, 'Mira', '1123456789', NULL, 'mira@azuramart.com', NULL, NULL, NULL, '$2y$10$N5n9epNgq6hc1lWyfZzkP.oDJm3.czTa4ESmLFb/.kEhy2V35AdWK', 0, NULL, NULL, NULL),
(17, 27, 'Syarifah', '1233456789', NULL, 'syarifah@azuramart.com', NULL, NULL, NULL, '$2y$10$MzzdBBJ2tE0.TDPO17DMpuHrt1cuEXVahB/Lubk3wsrOpQpXc6FrS', 0, NULL, NULL, NULL);

--
-- Triggers `SLS_AGENTS`
--
DROP TRIGGER IF EXISTS `BEFORE_SLS_AGENTS_INSERT`;
DELIMITER $$
CREATE TRIGGER `BEFORE_SLS_AGENTS_INSERT` BEFORE INSERT ON `SLS_AGENTS` FOR EACH ROW BEGIN
declare PKCODE int(2) default 0;



select auto_increment into PKCODE
from information_schema.tables
where table_name = 'SLS_AGENTS'
and table_schema = database();
    SET NEW.CODE = PKCODE+10 ;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `SLS_LEAD_MANAGEMENTS`
--

DROP TABLE IF EXISTS `SLS_LEAD_MANAGEMENTS`;
CREATE TABLE IF NOT EXISTS `SLS_LEAD_MANAGEMENTS` (
  `PK_NO` int(1) NOT NULL AUTO_INCREMENT,
  `START_DATE` date DEFAULT NULL,
  `END_DATE` date DEFAULT NULL,
  `COMMITED_LEAD_PER_SPAN` int(11) NOT NULL DEFAULT '0',
  `MEMBER_SPAN_ID` int(11) NOT NULL DEFAULT '1',
  `LEAD_SENT_COUNT` int(11) NOT NULL DEFAULT '0',
  `BOOKING_LEAD_COUNT` int(11) NOT NULL DEFAULT '0',
  `PROJECT_LEAD_COUNT` int(11) NOT NULL DEFAULT '0',
  `AREA_LEAD_COUNT` int(11) NOT NULL DEFAULT '0',
  `FORCE_LEAD_COUNT` int(11) DEFAULT NULL,
  `PAYMENT_SUPPOSED` float(11,2) DEFAULT NULL,
  `PAYMENT_RECIVED` float(11,2) DEFAULT NULL,
  `PAYMENT_RECIVED_DATE` date DEFAULT NULL,
  `PAKAGE_ID` int(11) NOT NULL DEFAULT '1',
  `CUSTOMER_ID` int(16) DEFAULT NULL,
  `IS_DELETE` int(1) DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT NULL,
  `ORDERBY` int(16) DEFAULT NULL,
  `CREATED_BY` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `MODIFIED_BY` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `CREATED_AT` datetime DEFAULT NULL,
  `MODIFIED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `SLS_LEAD_MASTER`
--

DROP TABLE IF EXISTS `SLS_LEAD_MASTER`;
CREATE TABLE IF NOT EXISTS `SLS_LEAD_MASTER` (
  `PK_NO` int(1) NOT NULL AUTO_INCREMENT,
  `BUY_SALE_ROMMATE` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROPERTY_CATEGORIES` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROPERTY_TYPE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MOBILE` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MESSAGE` varchar(510) CHARACTER SET utf8 DEFAULT NULL,
  `ACT_MODE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `COUNTRY` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CITY` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AREA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PREFER_AREA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ADDRESS` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `ROOMMATE_RESIDENCE_TYPE` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ROOMMATE_GENDER` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROPERTY_SIZE` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROPERTY_SIZE_MIN` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROPERTY_SIZE_MAX` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BEDROOM` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BATHROOM` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BATHROOM2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SALE_RESI_PREFERRED_TENANT` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MONTHLY_RENT` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ROOM_TYPE` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CONSTRUCTION_STATUS` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LAND_TYPE` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SIZE_KATHA` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SALEMIN` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SALEMAX` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RENTMIN` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RENTMAX` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LANDMIN` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LANDMAX` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BUGETMIN` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BUGETMAX` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TERMS` tinyint(1) NOT NULL DEFAULT '1',
  `VERIFICATION` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `COMMENTS` varchar(510) CHARACTER SET utf8 DEFAULT NULL,
  `IP_ADDRESS` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SEND_MESSAGE_ALERT` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `CUSTOMER_ID` int(16) DEFAULT NULL,
  `LISTING_ID` int(16) DEFAULT NULL,
  `INQURIE_ID` int(16) DEFAULT NULL,
  `REQUIREMENTS_ID` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `REQUIREMENTS_STATUS` int(1) NOT NULL DEFAULT '0' COMMENT 'STATUS VALUE 1 IS POST',
  `HOW_MANY` int(11) DEFAULT NULL,
  `IS_DELETE` int(1) DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT NULL,
  `CREATED_BY` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MODIFIED_BY` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `MODIFIED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `SLS_LEAD_SEND`
--

DROP TABLE IF EXISTS `SLS_LEAD_SEND`;
CREATE TABLE IF NOT EXISTS `SLS_LEAD_SEND` (
  `PK_NO` int(1) NOT NULL AUTO_INCREMENT,
  `SEND_DATE` date DEFAULT NULL,
  `LEAD_TYPE` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'BOOKING = IT COME FROM PHONE NUMBER VIEW OR INQUERY BY MESSAGE, AREA = SEND BY BDHOUSING DEPENDS ON AREA, FORCE = SEND BY BDHOUSING FORCEFULLY ',
  `LEAD_STATUS` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NEXT_ACT_DATE` date DEFAULT NULL,
  `NXT_ACT_BY` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ACT_MODE` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `COMMENTS` longtext CHARACTER SET utf8,
  `EMAIL` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `MOBILE` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `LEAD_MANAGEMENT_ID` int(16) DEFAULT NULL,
  `REQUIREMENT_ID` int(16) DEFAULT NULL,
  `LISTING_ID` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUSTOMER_ID` int(16) DEFAULT NULL,
  `VISITED` int(1) DEFAULT '0',
  `IS_DELETE` int(1) DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT NULL,
  `ORDERBY` int(16) DEFAULT NULL,
  `CREATED_BY` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MODIFIED_BY` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `MODIFIED_AT` datetime DEFAULT NULL,
  `LEAD_SOURCE` int(2) NOT NULL DEFAULT '1' COMMENT '1 = BDHOUSING',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `SLS_POSTREQUIREMENTS`
--

DROP TABLE IF EXISTS `SLS_POSTREQUIREMENTS`;
CREATE TABLE IF NOT EXISTS `SLS_POSTREQUIREMENTS` (
  `PK_NO` int(16) NOT NULL AUTO_INCREMENT,
  `BUY_SALE_ROMMATE` varchar(30) DEFAULT NULL,
  `PROPERTY_CATEGORIES` varchar(100) DEFAULT NULL,
  `PROPERTY_TYPE` varchar(255) DEFAULT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(70) DEFAULT NULL,
  `MOBILE` varchar(16) DEFAULT NULL,
  `COUNTRY_NAME` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `DIAL_CODE` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `COUNTRY` varchar(100) DEFAULT NULL,
  `CITY` varchar(50) DEFAULT NULL,
  `AREA` varchar(255) DEFAULT NULL,
  `ROOMMATE_RESIDENCE_TYPE` varchar(100) DEFAULT NULL,
  `ROOMMATE_GENDER` varchar(100) DEFAULT NULL,
  `PROPERTY_SIZE` varchar(100) DEFAULT NULL,
  `BEDROOM` varchar(30) DEFAULT NULL,
  `BATHROOM` varchar(30) DEFAULT NULL,
  `BATHROOM2` varchar(50) DEFAULT NULL,
  `SALE_RESI_PREFERRED_TENANT` varchar(30) DEFAULT NULL,
  `MONTHLY_RENT` varchar(100) DEFAULT NULL,
  `ROOM_TYPE` varchar(30) DEFAULT NULL,
  `CONSTRUCTION_STATUS` varchar(50) DEFAULT NULL,
  `LAND_TYPE` varchar(50) DEFAULT NULL,
  `SIZE_KATHA` varchar(30) DEFAULT NULL,
  `SALEMIN` varchar(100) DEFAULT NULL,
  `SALEMAX` varchar(100) DEFAULT NULL,
  `RENTMIN` varchar(100) DEFAULT NULL,
  `RENTMAX` varchar(100) DEFAULT NULL,
  `LANDMIN` varchar(100) DEFAULT NULL,
  `LANDMAX` varchar(100) DEFAULT NULL,
  `TERMS` tinyint(1) NOT NULL DEFAULT '1',
  `SEND_MESSAGE_ALERT` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `CUSTOMER_ID` int(16) DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT NULL COMMENT '1=active,0=inactive',
  `IS_DELETE` int(1) DEFAULT NULL,
  `DAILY_M` date DEFAULT NULL,
  `MONTHS` date DEFAULT NULL,
  `WEEKS` date DEFAULT NULL,
  `CREATED_BY` varchar(255) DEFAULT NULL,
  `MODIFIED_BY` varchar(255) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `MODIFIED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SS_AREA`
--

DROP TABLE IF EXISTS `SS_AREA`;
CREATE TABLE IF NOT EXISTS `SS_AREA` (
  `PK_NO` int(10) NOT NULL AUTO_INCREMENT,
  `AREA_NAME` varchar(50) COLLATE utf8_estonian_ci DEFAULT NULL,
  `F_PARENT_AREA_NO` int(11) DEFAULT NULL,
  `IS_PARENT` int(1) NOT NULL DEFAULT '1',
  `URL_SLUG` varchar(50) COLLATE utf8_estonian_ci DEFAULT NULL,
  `F_CITY_NO` int(10) DEFAULT NULL,
  `CITY_NAME` varchar(50) COLLATE utf8_estonian_ci DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `ORDER_ID` int(10) NOT NULL DEFAULT '1',
  `LAT` varchar(100) COLLATE utf8_estonian_ci DEFAULT NULL,
  `LON` varchar(100) COLLATE utf8_estonian_ci DEFAULT NULL,
  PRIMARY KEY (`PK_NO`),
  KEY `FK_SS_AREA_CITY` (`F_CITY_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `SS_AREA`
--

INSERT INTO `SS_AREA` (`PK_NO`, `AREA_NAME`, `F_PARENT_AREA_NO`, `IS_PARENT`, `URL_SLUG`, `F_CITY_NO`, `CITY_NAME`, `IS_ACTIVE`, `ORDER_ID`, `LAT`, `LON`) VALUES
(1, 'Mirpur', NULL, 1, 'mirpur', 1, 'Dhaka', 1, 1, NULL, NULL),
(2, 'Banani', NULL, 1, 'banani', 1, 'Dhaka', 1, 50, NULL, NULL),
(3, 'Mohakhali', NULL, 1, 'mohakhali', 1, 'Dhaka', 1, 3, NULL, NULL),
(4, 'GOC', NULL, 1, 'goc', 2, 'Chittagong', 1, 1, NULL, NULL),
(5, 'Mogbazar', NULL, 1, 'mogbazar', 1, 'Dhaka', 1, 4, NULL, NULL),
(6, 'Mohammadpur', NULL, 1, 'mohammadpur', 1, 'Dhaka', 1, 5, NULL, NULL),
(7, ' Banasree', NULL, 1, 'banasree', 1, 'Dhaka', 1, 6, NULL, NULL),
(8, 'Eskaton', NULL, 1, 'eskaton', 1, 'Dhaka', 1, 7, NULL, NULL),
(9, 'Uttara', NULL, 1, 'uttara', 1, 'Dhaka', 1, 8, NULL, NULL),
(10, 'Rampura', NULL, 1, 'rampura', 1, 'Dhaka', 1, 9, NULL, NULL),
(11, 'Mirbag', NULL, 1, 'mirbag', 1, 'Dhaka', 1, 10, NULL, NULL),
(12, 'Basundhara', NULL, 1, 'basundhara', 1, 'Dhaka', 1, 11, NULL, NULL),
(13, 'Naya Paltan', NULL, 1, 'naya-paltan', 1, 'Dhaka', 1, 12, NULL, NULL),
(14, 'Adabor', NULL, 1, 'adabor', 1, 'Dhaka', 1, 13, NULL, NULL),
(15, 'Narayanganj Sadar', NULL, 1, 'narayanganj-sadar', 4, 'Narayanganj', 1, 1, NULL, NULL),
(16, 'Malibag', NULL, 1, 'malibag', 1, 'Dhaka', 1, 14, NULL, NULL),
(17, 'Baridhara', NULL, 1, 'baridhara', 1, 'Dhaka', 1, 15, NULL, NULL),
(18, 'Purbachal', NULL, 1, 'purbachal', 1, 'Dhaka', 1, 16, NULL, NULL),
(19, 'Savar', NULL, 1, 'savar', 1, 'Dhaka', 1, 17, NULL, NULL),
(20, 'Badda', NULL, 1, 'badda', 1, 'Dhaka', 1, 18, NULL, NULL),
(21, 'Aftab Nagar', NULL, 1, 'aftab-nagar', 1, 'Dhaka', 1, 19, NULL, NULL),
(22, 'Kathalbagan', NULL, 1, 'kathalbagan', 1, 'Dhaka', 1, 20, NULL, NULL),
(23, 'Kathalbagan', NULL, 1, 'kathalbagan', 1, 'Dhaka', 1, 21, NULL, NULL),
(24, 'Gazipur Sadar', NULL, 1, 'gazipur-sadar', 5, 'Gazipur', 1, 1, NULL, NULL),
(25, 'Banani ( #6 to #10 Road) ', 2, 0, NULL, 1, 'Dhaka', 1, 22, NULL, NULL),
(26, 'Mirpur 1 Panirtanki', 1, 0, NULL, 1, 'Dhaka', 1, 23, NULL, NULL),
(27, 'Banani ( #1 to #5 Road) ', 2, 0, NULL, 1, 'Dhaka', 1, 24, NULL, NULL),
(28, 'Banani ( #6 to #10 Road) ', 2, 0, NULL, 1, 'Dhaka', 1, 25, NULL, NULL),
(29, 'Basundhara (1-10)', 12, 0, 'basundhara-1-10', 1, 'Dhaka', 1, 51, '48.45555', '48.45555');

--
-- Triggers `SS_AREA`
--
DROP TRIGGER IF EXISTS `BEFORE_SS_AREA_INSERT`;
DELIMITER $$
CREATE TRIGGER `BEFORE_SS_AREA_INSERT` BEFORE INSERT ON `SS_AREA` FOR EACH ROW BEGIN
DECLARE VAR_CITY_NAME VARCHAR(50) DEFAULT NULL;
DECLARE VAR_ORDER_ID INT(10) DEFAULT 0;

SELECT IFNULL(MAX(ORDER_ID),0) INTO VAR_ORDER_ID FROM SS_AREA WHERE F_CITY_NO =  NEW.F_CITY_NO;

SELECT CITY_NAME INTO VAR_CITY_NAME FROM SS_CITY WHERE PK_NO = NEW.F_CITY_NO;

SET NEW.CITY_NAME = VAR_CITY_NAME ;
SET NEW.ORDER_ID = VAR_ORDER_ID+1 ;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `SS_CITY`
--

DROP TABLE IF EXISTS `SS_CITY`;
CREATE TABLE IF NOT EXISTS `SS_CITY` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CITY_NAME` varchar(50) DEFAULT NULL,
  `URL_SLUG` varchar(50) DEFAULT NULL,
  `F_COUNTRY_NO` int(4) DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `ORDER_ID` int(2) NOT NULL DEFAULT '1',
  `LAT` varchar(100) DEFAULT NULL,
  `LON` varchar(100) DEFAULT NULL,
  `IS_POPULATED` int(1) NOT NULL DEFAULT '1',
  `TOTAL_LISTING` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SS_CITY`
--

INSERT INTO `SS_CITY` (`PK_NO`, `CITY_NAME`, `URL_SLUG`, `F_COUNTRY_NO`, `IS_ACTIVE`, `ORDER_ID`, `LAT`, `LON`, `IS_POPULATED`, `TOTAL_LISTING`) VALUES
(1, 'Dhaka', 'dhaka', 1, 1, 19, NULL, NULL, 1, 52),
(2, 'Chittagong', 'chittagong', 1, 1, 2, NULL, NULL, 1, 0),
(3, 'Bhola', 'bhola', NULL, 1, 15, '48.45555', '48.45555', 1, 0),
(4, 'Narayanganj', 'narayanganj', NULL, 1, 101, NULL, NULL, 0, 2),
(5, 'Gazipur', 'gazipur', NULL, 1, 8, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `SS_CURRENCY`
--

DROP TABLE IF EXISTS `SS_CURRENCY`;
CREATE TABLE IF NOT EXISTS `SS_CURRENCY` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` varchar(4) DEFAULT NULL,
  `NAME` varchar(10) DEFAULT NULL,
  `EXCHANGE_RATE_GB` float DEFAULT NULL,
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `U_SS_CURRENCY` (`CODE`),
  UNIQUE KEY `U_SS_CURRENCY_N` (`NAME`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SS_CURRENCY`
--

INSERT INTO `SS_CURRENCY` (`PK_NO`, `CODE`, `NAME`, `EXCHANGE_RATE_GB`) VALUES
(1, '101', 'BDT', 116);

-- --------------------------------------------------------

--
-- Table structure for table `SS_LEAD_PRICE`
--

DROP TABLE IF EXISTS `SS_LEAD_PRICE`;
CREATE TABLE IF NOT EXISTS `SS_LEAD_PRICE` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `AGENT_PROP_VIEW_SALES_PRICE` float DEFAULT NULL,
  `AGENT_PROP_VIEW_RENT_PRICE` float DEFAULT NULL,
  `AGENT_PROP_VIEW_ROOMMATE_PRICE` float DEFAULT NULL,
  `AGENT_COMM_SALES_PRICE` float DEFAULT NULL,
  `AGENT_COMM_RENT_PRICE` float DEFAULT NULL,
  `AGENT_COMM_ROOMMATE_PRICE` float DEFAULT NULL,
  `LEAD_VIEW_SALES_PRICE` float DEFAULT NULL,
  `LEAD_VIEW_RENT_PRICE` float DEFAULT NULL,
  `LEAD_VIEW_ROOMMATE_PRICE` float DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SS_LEAD_PRICE`
--

INSERT INTO `SS_LEAD_PRICE` (`PK_NO`, `AGENT_PROP_VIEW_SALES_PRICE`, `AGENT_PROP_VIEW_RENT_PRICE`, `AGENT_PROP_VIEW_ROOMMATE_PRICE`, `AGENT_COMM_SALES_PRICE`, `AGENT_COMM_RENT_PRICE`, `AGENT_COMM_ROOMMATE_PRICE`, `LEAD_VIEW_SALES_PRICE`, `LEAD_VIEW_RENT_PRICE`, `LEAD_VIEW_ROOMMATE_PRICE`) VALUES
(1, 10, 10, 10, 10, 10, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `SS_LISTING_PRICE`
--

DROP TABLE IF EXISTS `SS_LISTING_PRICE`;
CREATE TABLE IF NOT EXISTS `SS_LISTING_PRICE` (
  `PK_NO` int(5) NOT NULL AUTO_INCREMENT,
  `F_LISTING_TYPE_NO` int(5) DEFAULT NULL,
  `SELL_PRICE` float NOT NULL DEFAULT '0',
  `RENT_PRICE` float NOT NULL DEFAULT '0',
  `ROOMMAT_PRICE` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`PK_NO`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `SS_LISTING_PRICE`
--

INSERT INTO `SS_LISTING_PRICE` (`PK_NO`, `F_LISTING_TYPE_NO`, `SELL_PRICE`, `RENT_PRICE`, `ROOMMAT_PRICE`) VALUES
(1, 1, 30, 40, 40),
(2, 2, 50, 50, 50),
(3, 3, 70, 70, 0),
(4, 4, 100, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `SS_STICKY_NOTE`
--

DROP TABLE IF EXISTS `SS_STICKY_NOTE`;
CREATE TABLE IF NOT EXISTS `SS_STICKY_NOTE` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `NOTE` mediumtext,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `SS_USER_TYPE`
--

DROP TABLE IF EXISTS `SS_USER_TYPE`;
CREATE TABLE IF NOT EXISTS `SS_USER_TYPE` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(50) DEFAULT NULL,
  `TYPE_NO` int(11) DEFAULT NULL,
  `MODIFIED_AT` datetime DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `CREATED_BY` int(11) DEFAULT NULL,
  `MODIFIED_BY` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `SS_USER_TYPE`
--

INSERT INTO `SS_USER_TYPE` (`PK_NO`, `TITLE`, `TYPE_NO`, `MODIFIED_AT`, `CREATE_AT`, `CREATED_BY`, `MODIFIED_BY`) VALUES
(1, 'seeker', 1, NULL, NULL, NULL, NULL),
(2, 'owner', 2, NULL, NULL, NULL, NULL),
(3, 'builder', 3, NULL, NULL, NULL, NULL),
(4, 'agency', 4, NULL, NULL, NULL, NULL),
(5, 'Agent', 5, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `USERS_TOKEN`
--

DROP TABLE IF EXISTS `USERS_TOKEN`;
CREATE TABLE IF NOT EXISTS `USERS_TOKEN` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `F_USER_NO` int(11) NOT NULL,
  `TOKEN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CLIENT` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `IP_ADDRESS` varchar(20) DEFAULT NULL,
  `IS_EXPIRE` int(11) NOT NULL DEFAULT '0',
  `STARTED_AT` datetime NOT NULL,
  `EXPIRE_AT` datetime NOT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `USERS_TOKEN`
--

INSERT INTO `USERS_TOKEN` (`PK_NO`, `CODE`, `F_USER_NO`, `TOKEN`, `CLIENT`, `IP_ADDRESS`, `IS_EXPIRE`, `STARTED_AT`, `EXPIRE_AT`) VALUES
(15, NULL, 1282, 'a6092591d9a604fad9b7168217c27ff86e5c96af171066288c45c25dc6d3a1eb', 'WEB', NULL, 1, '2021-04-08 19:55:09', '2022-04-08 19:55:09'),
(16, NULL, 1282, '86f25ffbefda24fc54037d174ab8c8b505c6110324d3ffe4891395bf3c5acca0', 'PostmanRuntime/7.26.8', NULL, 1, '2021-04-08 19:55:19', '2022-04-08 19:55:19'),
(17, NULL, 1283, '508641a48dab9a29bf10221d58a59bbf7c623bc4810d5771b7a0175b2f836417', 'WEB', NULL, 1, '2021-04-08 19:58:33', '2022-04-08 19:58:33'),
(18, NULL, 1283, '68e8571e7cce06c7a19f5fd2cea20c7ad33677ca796e59aadf26ecd3f8292677', 'PostmanRuntime/7.26.8', NULL, 1, '2021-04-08 19:59:00', '2022-04-08 19:59:00'),
(19, NULL, 1283, '90ce2b4a8879f7f88803bb7b15d83d26e67423e6ff986a5ab2e8d20ac7da9e5a', 'PostmanRuntime/7.26.8', NULL, 1, '2021-04-08 23:46:47', '2022-04-08 23:46:47'),
(20, NULL, 1283, '9acda9d0d8f0d37a33e13130d1a80d994be7805ddbaf6dbdb956f0841094af32', 'Dart/2.13 (dart:io)', '103.159.186.192', 1, '2021-04-10 08:33:23', '2022-04-10 08:33:23'),
(21, NULL, 1283, 'eab733d7e3cc8568c87f7830701cfdf584f3d7efd48b693f37f77fb1bc20f87e', 'Dart/2.13 (dart:io)', '103.159.186.197', 1, '2021-04-10 08:35:19', '2022-04-10 08:35:19'),
(22, NULL, 1283, '9cadeedc7935ddb7579da21d61170c9805c93e2704cf3a38b9838efe4f17aebb', 'Dart/2.13 (dart:io)', '103.159.186.197', 1, '2021-04-10 08:45:40', '2022-04-10 08:45:40'),
(23, NULL, 1282, 'ef37c1d6a5334d3ca110ada3cf2689b8e685b69396f17d3e78179e07b0eaaf91', 'PostmanRuntime/7.26.8', NULL, 0, '2021-04-10 13:06:06', '2022-04-10 13:06:06'),
(24, NULL, 1283, '5df273cf7c429d99b6f7592b67f825599d787223ae13bde1e8017d94e54fe4c1', 'PostmanRuntime/7.26.10', NULL, 1, '2021-04-10 13:37:06', '2022-04-10 13:37:06'),
(25, NULL, 1283, 'deb9412dcfbe26606be884eb69847adc730b95963136816fa4fddd6570fc0005', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-10 14:00:18', '2022-04-10 14:00:18'),
(26, NULL, 1283, '664e5bf5664d08af08deb06dcf1b090805304a8178ba67188906f6d008e8c8ff', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-10 14:40:57', '2022-04-10 14:40:57'),
(27, NULL, 1283, '6ad741c531548fb4e2738560fefacb5b3f164026d7375e75e322ed32c09f943a', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-10 14:50:22', '2022-04-10 14:50:22'),
(28, NULL, 1283, '80c6a352dcb242a80d571bd15152d4c2777d65b03aea34f15f495cb57dbba26d', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-10 14:52:48', '2022-04-10 14:52:48'),
(29, NULL, 1283, '4f6a8bfe4bf4e986b0ff3a5545a07e837d572e16513d19a4d5e6067bee4a6502', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-10 20:03:05', '2022-04-10 20:03:05'),
(30, NULL, 1283, '122d771dea56656724850a18c62634f53e184ecfe260acbd103263a36a16debd', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-10 22:09:20', '2022-04-10 22:09:20'),
(31, NULL, 1283, '26f4e9b97a0a259b5963bfd661e3ba331ef32712a9d7327f879099337041127b', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-10 22:12:45', '2022-04-10 22:12:45'),
(32, NULL, 1283, '9e9adfd785f084e673b21aaf5f5f403b24b209a3ff9e3a289cf7f85b18904eb6', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-11 11:54:08', '2022-04-11 11:54:08'),
(33, NULL, 1283, 'c9e4832d8ed42e6b007fb47b919cff6bfde8e4cba9db7b94a459537e28501471', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-11 13:00:06', '2022-04-11 13:00:06'),
(34, NULL, 1283, '45943371ca6ea1c7c955d8dab77769a752fd692c5594ae9ae9a09a15ba72e341', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-11 13:30:17', '2022-04-11 13:30:17'),
(35, NULL, 1283, '69ac5719f16585e2e95b83fc43b39bc800cc7cabf47a5121028d606ce673ba81', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-11 13:35:09', '2022-04-11 13:35:09'),
(36, NULL, 1283, '6c5dfba0337bcb3f4c12c568c7090f1dcd6891b5a24456134c1259e542686c43', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-11 15:11:42', '2022-04-11 15:11:42'),
(37, NULL, 1283, '15428a43b37cd8e3bb2149f6861356813f7defabbfa9f31fd02a8706cd312a35', 'Dart/2.13 (dart:io)', '118.179.179.232', 1, '2021-04-11 16:25:36', '2022-04-11 16:25:36'),
(38, NULL, 1283, '5981c4e332b3bd0dbba89d7bc86fc4ae762ea7f1f0d1f1aeda609c52fcdf0a53', 'Dart/2.13 (dart:io)', '118.179.179.232', 0, '2021-04-11 17:53:20', '2022-04-11 17:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `WEB_ABOUT`
--

DROP TABLE IF EXISTS `WEB_ABOUT`;
CREATE TABLE IF NOT EXISTS `WEB_ABOUT` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(200) DEFAULT NULL,
  `SUB_TITLE` varchar(255) DEFAULT NULL,
  `BANNER` varchar(255) DEFAULT NULL,
  `VISION_TITLE` varchar(255) DEFAULT NULL,
  `VISION_DESCRIPTION` text,
  `MISSION_TITLE` varchar(255) DEFAULT NULL,
  `MISSION_DESCRIPTION` text,
  `INTRO_TITLE` varchar(255) DEFAULT NULL,
  `INTRO_SUBTITLE` varchar(255) DEFAULT NULL,
  `INTRO_DESCRIPTION` text,
  `INTRO_IMG_1` varchar(255) DEFAULT NULL,
  `INTRO_IMG_2` varchar(255) DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_ABOUT`
--

INSERT INTO `WEB_ABOUT` (`PK_NO`, `TITLE`, `SUB_TITLE`, `BANNER`, `VISION_TITLE`, `VISION_DESCRIPTION`, `MISSION_TITLE`, `MISSION_DESCRIPTION`, `INTRO_TITLE`, `INTRO_SUBTITLE`, `INTRO_DESCRIPTION`, `INTRO_IMG_1`, `INTRO_IMG_2`, `IS_ACTIVE`, `SS_MODIFIED_ON`, `SS_CREATED_ON`, `F_SS_CREATED_BY`, `F_SS_MODIFIED_BY`) VALUES
(30, 'aab', 'saasb', 'uploads/2021/04/photos/1-608936a124c58.webp', 'asab', 'asab', 'asab', 'asab', 'asb', 'aasb', 'adb', 'uploads/2021/04/photos/uber-eats-608936a130d51.webp', 'uploads/2021/04/photos/doordash-logo-608936a1364ff.webp', 0, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `WEB_ARTICLE`
--

DROP TABLE IF EXISTS `WEB_ARTICLE`;
CREATE TABLE IF NOT EXISTS `WEB_ARTICLE` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(50) NOT NULL,
  `URL_SLUG` varchar(50) DEFAULT NULL,
  `FEATURE_IMAGE` varchar(255) DEFAULT NULL,
  `THUMBNAIL_IMAGE` varchar(255) DEFAULT NULL,
  `SUMMARY` text,
  `BODY` longtext,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `TAGS` varchar(255) DEFAULT NULL,
  `META_KEYWARDS` text,
  `META_DESCRIPTION` text,
  `ORDER_ID` int(5) DEFAULT NULL,
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  `IS_FEATURE` tinyint(1) DEFAULT '0',
  `ARTICLE_CATEGORY` int(5) DEFAULT NULL,
  `AUTHOR_NAME` varchar(100) DEFAULT NULL,
  `TOTAL_HIT` int(11) DEFAULT '1',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_ARTICLE`
--

INSERT INTO `WEB_ARTICLE` (`PK_NO`, `TITLE`, `URL_SLUG`, `FEATURE_IMAGE`, `THUMBNAIL_IMAGE`, `SUMMARY`, `BODY`, `IS_ACTIVE`, `TAGS`, `META_KEYWARDS`, `META_DESCRIPTION`, `ORDER_ID`, `F_SS_CREATED_BY`, `SS_CREATED_ON`, `F_SS_MODIFIED_BY`, `SS_MODIFIED_ON`, `IS_FEATURE`, `ARTICLE_CATEGORY`, `AUTHOR_NAME`, `TOTAL_HIT`) VALUES
(71, 'Lorem Impum Loraa Fisu', 'lorem-impum-loraa-fisu', 'uploads/2021/05/photos/pexels-photo-1571460-60af654b78c88.webp', 'uploads/2021/05/photos/thumb/pexels-photo-1571460-60af654b78c8a.webp', 'Mauris id enim id purus ornare tincidunt. Aenean vel consequat risus.Proin viverra nisi at nisl imperdiet auctor. Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 15px; font-family: Roboto, sans-serif; letter-spacing: normal; color: rgb(138, 145, 172);\">Misl imperdiet auctor. DoPlacerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornartincidunt placerat</p><ul class=\"ttm-list ttm-list-style-icon mb-15\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; list-style: none; padding: 0px; font-size: 15px; color: rgb(138, 145, 172); font-family: Roboto, sans-serif;\"><li style=\"position: relative; margin-bottom: 2.7rem; padding-bottom: 11px;\"><span class=\"fa fa-minus\" style=\"font-weight: normal; font-stretch: normal; font-size: 14px; line-height: 14px; font-family: FontAwesome; position: absolute; left: auto; top: 5px;\"></span><div class=\"ttm-list-li-content\" style=\"display: inline-block; padding-left: 20px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</div></li><li style=\"position: relative; margin-bottom: 2.7rem; padding-bottom: 11px;\"><span class=\"fa fa-minus\" style=\"font-weight: normal; font-stretch: normal; font-size: 14px; line-height: 14px; font-family: FontAwesome; position: absolute; left: auto; top: 5px;\"></span><div class=\"ttm-list-li-content\" style=\"display: inline-block; padding-left: 20px;\">Mliterature from 45 BC, making it over 2000 years old. Lorealintock The Extremes of Good and Eviyr.</div></li><li style=\"position: relative; margin-bottom: 2.7rem; padding-bottom: 11px;\"><span class=\"fa fa-minus\" style=\"font-weight: normal; font-stretch: normal; font-size: 14px; line-height: 14px; font-family: FontAwesome; position: absolute; left: auto; top: 5px;\"></span><div class=\"ttm-list-li-content\" style=\"display: inline-block; padding-left: 20px;\">The standard chunk of Lorem Ipsum used sfertyui ince the 1500s is reproduced below for those interested.</div></li><li style=\"position: relative; margin-bottom: 2.7rem; padding-bottom: 11px;\"><span class=\"fa fa-minus\" style=\"font-weight: normal; font-stretch: normal; font-size: 14px; line-height: 14px; font-family: FontAwesome; position: absolute; left: auto; top: 5px;\"></span><div class=\"ttm-list-li-content\" style=\"display: inline-block; padding-left: 20px;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dom, totam rem ape Donec</div></li><li style=\"position: relative; margin-bottom: 2.7rem; padding-bottom: 11px;\"><span class=\"fa fa-minus\" style=\"font-weight: normal; font-stretch: normal; font-size: 14px; line-height: 14px; font-family: FontAwesome; position: absolute; left: auto; top: 5px;\"></span><div class=\"ttm-list-li-content\" style=\"display: inline-block; padding-left: 20px;\">Purus ornare tincidunt. nisi at nisl imperdiet enim ad minima circumstances occur in which toil and pain vm,</div></li><li style=\"position: relative; margin-bottom: 2.7rem; padding-bottom: 0px;\"><span class=\"fa fa-minus\" style=\"font-weight: normal; font-stretch: normal; font-size: 14px; line-height: 14px; font-family: FontAwesome; position: absolute; left: auto; top: 5px;\"></span><div class=\"ttm-list-li-content\" style=\"display: inline-block; padding-left: 20px;\">onsequat risus.Proin viverra auris id standard chunk enim idnisi at nisl imper purus ornare tincidunt.</div></li></ul><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 15px; font-family: Roboto, sans-serif; letter-spacing: normal; color: rgb(138, 145, 172);\">Misl imperdiet auctor. DoPlacerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra auris id enim id purus ornare tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornartincidunt placerat</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 15px; font-family: Roboto, sans-serif; letter-spacing: normal; color: rgb(138, 145, 172);\">Seurus ornarMisl imperdiet auctor. DoPlacerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risus.Proin viverra auris id enim ie tincidunt. nisi at nisl imperdiet auctor. Donec ornare,ex nibh, eget vulputate ligula ornartin Misl imperdiet auctor. DoPlacerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulpuAenean vel consequat risuscidunt placerat</p>', 0, 'Tech', NULL, NULL, 1, 1, NULL, 1, '2021-08-01 02:39:47', 1, 69, 'Tech', 1),
(72, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', '/media/blog/2021/06/Login-banner2-60dc4a3993421.webp', '/media/blog/thumb/2021/06/Login-banner2-60dc4a3993423.webp', 'What is Lorem Ipsum?', '<p><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"></div></p><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>', 1, 'asas', NULL, NULL, 2, 1, '2021-06-30 04:40:57', NULL, NULL, 1, 68, 'asa', 1),
(73, 'article-title', 'article-title', '/media/images/blog//8511861-610665b219870.webp', '/media/images/blog/thumb//8511861-610665b219874.webp', 'article-summary', '<p>article-body</p><p><img src=\"http://127.0.0.1:8080/media/blog/8511861-6106651aefdd3.webp\" class=\"img-fluid\"><br></p>', 1, 'adad,sdsad', NULL, NULL, 3, 1, '2021-08-01 03:12:55', 1, '2021-08-01 03:13:20', 1, 68, 'asas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `WEB_ARTICLE_CATEGORY`
--

DROP TABLE IF EXISTS `WEB_ARTICLE_CATEGORY`;
CREATE TABLE IF NOT EXISTS `WEB_ARTICLE_CATEGORY` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL,
  `URL_SLUG` varchar(50) DEFAULT NULL,
  `BANNER` varchar(255) DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `META_KEYWARDS` text,
  `META_DESCRIPTION` text,
  `ORDER_ID` int(5) DEFAULT NULL,
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_ARTICLE_CATEGORY`
--

INSERT INTO `WEB_ARTICLE_CATEGORY` (`PK_NO`, `NAME`, `URL_SLUG`, `BANNER`, `IS_ACTIVE`, `META_KEYWARDS`, `META_DESCRIPTION`, `ORDER_ID`, `F_SS_CREATED_BY`, `SS_CREATED_ON`, `F_SS_MODIFIED_BY`, `SS_MODIFIED_ON`) VALUES
(68, 'abc', 'abc', '/media/images/blog/prod_01082021_6106624eec9bc.jpg', 1, NULL, NULL, 2, NULL, NULL, NULL, NULL),
(69, 'News', 'news', 'media/images/banner/prod_12042021_60741165113f2.jpg', 1, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(70, 'aaaaa', 'aaaaa', '/media/images/blog/prod_01082021_610662637b81e.jpg', 1, NULL, NULL, 3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `WEB_CART`
--

DROP TABLE IF EXISTS `WEB_CART`;
CREATE TABLE IF NOT EXISTS `WEB_CART` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `F_PRD_MASTER_NO` int(11) DEFAULT NULL,
  `F_PRD_VARIANT_NO` int(11) DEFAULT NULL,
  `F_CUSTOMER_NO` int(11) DEFAULT NULL,
  `F_WAREHOUSE_NO` int(2) DEFAULT NULL,
  `F_SHIPPMENT_NO` int(11) DEFAULT NULL,
  `SESSION_ID` varchar(255) NOT NULL,
  `TOTAL_ITEM_QTY` int(5) DEFAULT '0',
  `REGULAR_PRICE` float DEFAULT '0',
  `INSTALLMENT_PRICE` float DEFAULT NULL,
  `IS_BOOKING` int(5) DEFAULT '0',
  `IS_ACTIVE` int(1) DEFAULT '1',
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  `PAYMENT_PLAN` int(1) DEFAULT '1',
  `IS_RESELLER` int(1) DEFAULT '0',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=628 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_CART`
--

INSERT INTO `WEB_CART` (`PK_NO`, `F_PRD_MASTER_NO`, `F_PRD_VARIANT_NO`, `F_CUSTOMER_NO`, `F_WAREHOUSE_NO`, `F_SHIPPMENT_NO`, `SESSION_ID`, `TOTAL_ITEM_QTY`, `REGULAR_PRICE`, `INSTALLMENT_PRICE`, `IS_BOOKING`, `IS_ACTIVE`, `SS_MODIFIED_ON`, `SS_CREATED_ON`, `F_SS_CREATED_BY`, `F_SS_MODIFIED_BY`, `PAYMENT_PLAN`, `IS_RESELLER`) VALUES
(509, 101, 229, 1295, 2, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 3, 89, 99, 0, 1, '2021-07-14 12:05:26', '2021-07-14 10:41:37', NULL, NULL, NULL, 0),
(510, 101, 233, 1295, 2, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 5, 89, 99, 0, 1, '2021-07-14 11:08:07', '2021-07-14 10:42:29', NULL, NULL, NULL, 0),
(516, 101, 1843, 1295, 1, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 109, 129, 0, 1, '2021-07-14 11:09:53', '2021-07-14 11:09:53', NULL, NULL, NULL, 0),
(517, 101, 1844, 1295, 1, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 109, 129, 0, 1, '2021-07-14 11:10:05', '2021-07-14 11:10:05', NULL, NULL, NULL, 0),
(518, 101, 1845, 1295, 1, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 109, 129, 0, 1, '2021-07-14 11:10:10', '2021-07-14 11:10:10', NULL, NULL, NULL, 0),
(519, 101, 1846, 1295, 1, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 109, 129, 0, 1, '2021-07-14 11:10:24', '2021-07-14 11:10:24', NULL, NULL, NULL, 0),
(520, 101, 1850, 1295, 1, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 109, 129, 0, 1, '2021-07-14 11:10:45', '2021-07-14 11:10:45', NULL, NULL, NULL, 0),
(521, 101, 1851, 1295, 1, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 109, 129, 0, 1, '2021-07-14 11:10:51', '2021-07-14 11:10:51', NULL, NULL, NULL, 0),
(522, 101, 1852, 1295, 1, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 109, 129, 0, 1, '2021-07-14 11:10:56', '2021-07-14 11:10:56', NULL, NULL, NULL, 0),
(523, 101, 1856, 1295, 1, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 109, 129, 0, 1, '2021-07-14 11:12:11', '2021-07-14 11:12:11', NULL, NULL, NULL, 0),
(526, 375, 763, NULL, 2, 7, 'PzSOdXBs1tfR73DPq48dNbKm1f3azcYaVyxoTER0', 1, 79, 99, 0, 1, '2021-07-14 11:27:02', '2021-07-14 11:27:02', NULL, NULL, NULL, 0),
(527, 237, 792, NULL, 2, 7, 'PzSOdXBs1tfR73DPq48dNbKm1f3azcYaVyxoTER0', 1, 449, 499, 0, 1, '2021-07-14 11:31:34', '2021-07-14 11:31:34', NULL, NULL, NULL, 0),
(550, 3, 685, 1295, 1, 6, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 999, 1089, 0, 1, '2021-07-14 12:37:30', '2021-07-14 12:37:30', NULL, NULL, NULL, 0),
(556, 3, 3, 1295, 2, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 799, 899, 0, 1, '2021-07-14 12:42:10', '2021-07-14 12:42:10', NULL, NULL, NULL, 0),
(557, 3, 310, 1295, 2, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 799, 899, 0, 1, '2021-07-14 12:45:13', '2021-07-14 12:45:13', NULL, NULL, NULL, 0),
(558, 20, 56, 1295, 1, 3, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 119, 139, 0, 1, '2021-07-14 13:24:43', '2021-07-14 13:24:37', NULL, NULL, NULL, 0),
(559, 701, 1926, 1295, 2, NULL, 'GCz7WuLf8PTkJnriJjf5fQrMeHIOo3xsYu8Di9W8', 1, 189, 199, 0, 1, '2021-07-14 13:25:02', '2021-07-14 13:25:02', NULL, NULL, NULL, 0),
(564, 393, 838, 1295, 1, NULL, 'ePTNwHJj3zuqWzEcdOWIerrmvic0HVG6rsBg82wR', 90, 79, 99, 0, 1, '2021-07-17 14:29:03', '2021-07-17 09:32:32', NULL, NULL, NULL, 0),
(565, 393, 836, 1295, 1, NULL, 'ePTNwHJj3zuqWzEcdOWIerrmvic0HVG6rsBg82wR', 4, 79, 99, 0, 1, '2021-07-17 14:29:03', '2021-07-17 09:32:48', NULL, NULL, NULL, 0),
(566, 393, 1029, 1295, 1, 6, 'ePTNwHJj3zuqWzEcdOWIerrmvic0HVG6rsBg82wR', 2, 79, 99, 0, 1, '2021-07-17 14:29:03', '2021-07-17 09:33:21', NULL, NULL, NULL, 0),
(567, 17, 1827, 1295, 2, NULL, 'ePTNwHJj3zuqWzEcdOWIerrmvic0HVG6rsBg82wR', 1, 229, 259, 0, 1, '2021-07-17 14:29:03', '2021-07-17 10:50:08', NULL, NULL, NULL, 0),
(570, 3, 3, 1295, 1, 6, 'ePTNwHJj3zuqWzEcdOWIerrmvic0HVG6rsBg82wR', 1, 799, 899, 0, 1, '2021-07-17 14:29:03', '2021-07-17 12:06:15', NULL, NULL, NULL, 0),
(571, 3, 684, 1295, 1, 6, 'NcXzHwgLayvP07FftGK2coKx0L9zS3dR6mFLwAxv', 1, 799, 899, 1, 1, '2021-07-18 05:45:23', '2021-07-18 04:58:56', NULL, NULL, NULL, 0),
(572, 3, 3, 1295, 1, 8, 'NcXzHwgLayvP07FftGK2coKx0L9zS3dR6mFLwAxv', 1, 799, 899, 1, 1, '2021-07-18 05:45:23', '2021-07-18 04:59:09', NULL, NULL, NULL, 0),
(573, 3, 685, 1295, 1, 6, 'NcXzHwgLayvP07FftGK2coKx0L9zS3dR6mFLwAxv', 1, 999, 1089, 1, 1, '2021-07-18 05:45:23', '2021-07-18 04:59:20', NULL, NULL, NULL, 0),
(574, 375, 760, 7, 2, 4, '28EoLKy8jfaNc9mGBQH1Yb008uoNgwVsgYj6nl4h', 1, 79, 99, 0, 1, '2021-07-19 10:56:29', '2021-07-19 05:33:03', NULL, NULL, NULL, 0),
(575, 184, 361, NULL, 1, 6, 'zDaDN0AN1TRPaD15YJzWwd0elpMMgAeVeWcY1srv', 1, 89, 99, 0, 1, '2021-07-19 05:46:00', '2021-07-19 05:46:00', NULL, NULL, NULL, 0),
(576, 3, 3, NULL, 1, 6, 'TQJDjf2kB815PzOF5mQdcP4NrdGxqQdMBbzEzpxS', 1, 799, 899, 0, 1, '2021-07-25 04:32:13', '2021-07-25 04:32:13', NULL, NULL, NULL, 0),
(577, 3, 684, 7, 1, 6, 'iprwMGSfA5opz1xb2wJuLp4fpjM4AEJW6OI5MH5w', 1, 799, 899, 1, 1, '2021-07-29 19:07:29', '2021-07-29 19:03:48', NULL, NULL, NULL, 0),
(578, 3, 684, 14, 1, 6, 'Fs1X1aDwoOa5UvhMsaFaTKFUrP5U3VDx0g96Lwwm', 1, 799, 899, 1, 1, '2021-07-30 14:53:44', '2021-07-30 14:51:42', NULL, NULL, NULL, 0),
(579, 3, 3, 1323, 1, 6, 'tcgMnfsqgR87V1ABZjRAKCjKxOWtP4qDqBgIgbKh', 1, 799, 899, 0, 1, '2021-08-01 06:25:24', '2021-08-01 06:05:54', NULL, NULL, NULL, 0),
(580, 3, 3, NULL, 1, 6, '4aetQ0S25HebjUpONHhewMZw82UrxCRfTBYcU5A0', 1, 799, 899, 0, 1, '2021-08-01 06:07:05', '2021-08-01 06:07:05', NULL, NULL, NULL, 0),
(581, 200, 388, 1323, 2, 2, 'tcgMnfsqgR87V1ABZjRAKCjKxOWtP4qDqBgIgbKh', 1, 359, 399, 0, 1, '2021-08-01 06:25:24', '2021-08-01 06:10:20', NULL, NULL, NULL, 0),
(582, 3, 684, 7, 1, 6, '4TEYVDjPYsd7ANz1tAg4dVEEGAykpwHRliSv6zvC', 1, 799, 899, 1, 1, '2021-08-01 14:11:12', '2021-08-01 12:44:29', NULL, NULL, NULL, 0),
(583, 44, 156, NULL, 2, 2, 'd4pwuOoDC0RtY1rosIYXrG5RJ2fCpqtU92oBHJtn', 1, 1199, 1299, 0, 1, '2021-08-02 12:58:58', '2021-08-02 12:58:58', NULL, NULL, NULL, 0),
(584, 184, 362, 1295, 1, NULL, 'yWFoy5p91M3eP6LrveqaT3x26m9YCx25AqWFhG3F', 2, 89, 99, 1, 1, '2021-08-03 13:21:13', '2021-08-03 07:42:45', NULL, NULL, NULL, 0),
(585, 3, 684, 14, 1, 6, 'i6CbgfsOS98RVY86G34oR2UPZbHKCZXXNKXewyUS', 1, 799, 899, 0, 1, '2021-08-03 09:01:27', '2021-08-03 07:50:54', NULL, NULL, NULL, 0),
(597, 184, 361, 1295, 1, 6, 'yWFoy5p91M3eP6LrveqaT3x26m9YCx25AqWFhG3F', 1, 89, 99, 0, 1, '2021-08-03 13:21:13', '2021-08-03 12:00:23', NULL, NULL, NULL, 0),
(598, 375, 763, 1295, 2, 7, 'yWFoy5p91M3eP6LrveqaT3x26m9YCx25AqWFhG3F', 1, 79, 99, 0, 1, '2021-08-03 13:21:13', '2021-08-03 12:00:33', NULL, NULL, NULL, 0),
(611, 393, 835, 1295, 1, NULL, 'yWFoy5p91M3eP6LrveqaT3x26m9YCx25AqWFhG3F', 1, 79, 99, 0, 1, '2021-08-03 13:41:45', '2021-08-03 13:41:45', NULL, NULL, NULL, 0),
(612, 184, 361, 1339, 2, 2, 'mkLeis9U4bsJYsf7iR8vHb5ROrdl09CteTLOc42V', 1, 89, 99, 1, 1, '2021-08-04 12:22:27', '2021-08-03 13:43:12', NULL, NULL, NULL, 0),
(613, 375, 763, 1339, 2, 7, 'mkLeis9U4bsJYsf7iR8vHb5ROrdl09CteTLOc42V', 1, 79, 99, 1, 1, '2021-08-04 12:22:27', '2021-08-03 13:43:18', NULL, NULL, NULL, 0),
(614, 3, 3, 1339, 1, 6, 'mkLeis9U4bsJYsf7iR8vHb5ROrdl09CteTLOc42V', 1, 799, 899, 1, 1, '2021-08-04 12:22:29', '2021-08-03 15:01:59', NULL, NULL, NULL, 0),
(615, 3, 684, 14, 1, 6, 'qLQLZkkbCecvgUGWYkI4ospnxsHDllU0A3ZrtgEK', 1, 799, 899, 0, 1, '2021-08-04 06:19:31', '2021-08-04 06:18:57', NULL, NULL, NULL, 0),
(616, 184, 361, 1295, 2, 2, 'cfY3sS03huFse1IfjHVP0xqlYZHvX0qUhv8GYJXS', 1, 89, 99, 1, 1, '2021-08-04 09:21:15', '2021-08-04 06:51:09', NULL, NULL, NULL, 0),
(617, 3, 3, 1295, 1, NULL, 'cfY3sS03huFse1IfjHVP0xqlYZHvX0qUhv8GYJXS', 1, 799, 899, 0, 1, '2021-08-04 11:57:16', '2021-08-04 09:21:07', NULL, NULL, NULL, 0),
(618, 3, 684, 1295, 1, 6, 'cfY3sS03huFse1IfjHVP0xqlYZHvX0qUhv8GYJXS', 1, 799, 899, 0, 1, '2021-08-04 11:28:41', '2021-08-04 11:28:41', NULL, NULL, NULL, 0),
(619, 3, 310, 1295, 2, NULL, 'cfY3sS03huFse1IfjHVP0xqlYZHvX0qUhv8GYJXS', 1, 799, 899, 0, 1, '2021-08-04 11:28:51', '2021-08-04 11:28:51', NULL, NULL, NULL, 0),
(620, 3, 685, 1295, 1, 6, 'cfY3sS03huFse1IfjHVP0xqlYZHvX0qUhv8GYJXS', 1, 999, 1089, 0, 1, '2021-08-04 11:29:00', '2021-08-04 11:29:00', NULL, NULL, NULL, 0),
(621, 3, 1200, 1295, 1, 6, 'cfY3sS03huFse1IfjHVP0xqlYZHvX0qUhv8GYJXS', 1, 999, 1089, 0, 1, '2021-08-04 11:29:07', '2021-08-04 11:29:07', NULL, NULL, NULL, 0),
(626, 3, 3, 14, 1, 6, 'POp4JIPNSfjPzJU8kV0ahrlO4XYKQV1MRxYOFKS9', 2, 799, 899, 0, 1, '2021-08-04 16:48:13', '2021-08-04 16:23:41', NULL, NULL, NULL, 0),
(627, 184, 362, 14, 1, NULL, 'POp4JIPNSfjPzJU8kV0ahrlO4XYKQV1MRxYOFKS9', 2, 89, 99, 0, 1, '2021-08-04 17:04:26', '2021-08-04 17:04:26', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `WEB_COMPARE`
--

DROP TABLE IF EXISTS `WEB_COMPARE`;
CREATE TABLE IF NOT EXISTS `WEB_COMPARE` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `F_PRD_VARIANT_NO` int(11) DEFAULT NULL,
  `F_CUSTOMER_NO` int(11) DEFAULT NULL,
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `WEB_FAQ`
--

DROP TABLE IF EXISTS `WEB_FAQ`;
CREATE TABLE IF NOT EXISTS `WEB_FAQ` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `QUESTION` varchar(255) DEFAULT NULL,
  `ANSWER` text,
  `ORDER_ID` tinyint(4) DEFAULT NULL,
  `IS_ACTIVE` tinyint(1) DEFAULT '1',
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_FAQ`
--

INSERT INTO `WEB_FAQ` (`PK_NO`, `QUESTION`, `ANSWER`, `ORDER_ID`, `IS_ACTIVE`, `SS_MODIFIED_ON`, `SS_CREATED_ON`, `F_SS_CREATED_BY`, `F_SS_MODIFIED_BY`) VALUES
(30, 'Questiona', 'Answera', 1, 1, NULL, NULL, 1, 1),
(31, 'asasa', 'asas', 2, 1, NULL, NULL, 1, NULL),
(32, 'hh', 'hh', 3, 1, NULL, NULL, 1, NULL),
(33, 'Why has my ad been rejected ?', 'test', 4, 1, NULL, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `WEB_NEWSLETTER`
--

DROP TABLE IF EXISTS `WEB_NEWSLETTER`;
CREATE TABLE IF NOT EXISTS `WEB_NEWSLETTER` (
  `PK_NO` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(120) DEFAULT NULL,
  `CREATED_ON` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `WEB_NEWSLETTER`
--

INSERT INTO `WEB_NEWSLETTER` (`PK_NO`, `EMAIL`, `CREATED_ON`) VALUES
(2, 'maidul.tech1@gmail.com', '2021-08-23 18:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `WEB_NOTIFICATION`
--

DROP TABLE IF EXISTS `WEB_NOTIFICATION`;
CREATE TABLE IF NOT EXISTS `WEB_NOTIFICATION` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(200) DEFAULT NULL,
  `BODY` text,
  `IMAGE` varchar(200) DEFAULT NULL,
  `NOTIFICATION_TYPE` varchar(20) DEFAULT NULL,
  `MESSAGE_ID` varchar(255) DEFAULT NULL,
  `STATUS` tinyint(1) DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `CREATED_BY` int(4) DEFAULT NULL,
  `CREATED_ON` datetime DEFAULT NULL,
  `MODIFIED_BY` int(4) DEFAULT NULL,
  `MODIFIED_ON` datetime DEFAULT NULL,
  `TOTAL_SUCCESS` int(10) DEFAULT '0',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COMMENT='WEB_NOTIFICATION' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_NOTIFICATION`
--

INSERT INTO `WEB_NOTIFICATION` (`PK_NO`, `TITLE`, `BODY`, `IMAGE`, `NOTIFICATION_TYPE`, `MESSAGE_ID`, `STATUS`, `IS_ACTIVE`, `CREATED_BY`, `CREATED_ON`, `MODIFIED_BY`, `MODIFIED_ON`, `TOTAL_SUCCESS`) VALUES
(58, '4 x Staub Ceramic Petite Cocotte', '4 x Staub Ceramic Petite Cocotte', 'http://dev.ukshop.my/media/images/slider/Payment-card-Banner-60d6c93901741.webp', 'app', NULL, 1, 1, NULL, NULL, NULL, NULL, 0),
(59, '4 x Staub Ceramic Petite Cocotte', '4 x Staub Ceramic Petite Cocotte', 'http://dev.ukshop.my/media/images/products/24/prod_12112020_5fad924be4402.jpg', 'app', NULL, 1, 1, NULL, NULL, NULL, NULL, 0),
(64, 'LE CREUSET DINNER PLATE - COASTAL BLUE - 27CM', '4 x Le Creuset 400ml Mug', 'http://dev.ukshop.my/media/images/products/34/prod_14112020_5fb0524f8cc5b.jpg', 'app', '7999853639651909076', 1, 1, NULL, NULL, NULL, NULL, 0),
(65, 'LE CREUSET DINNER PLATE - CERISE - 27CM', 'LE CREUSET DINNER PLATE - CERISE - 27CM', 'http://dev.ukshop.my/media/images/products/34/prod_23122020_5fe26ca46fcb1.jpg', 'app', '7539343643098577806', 1, 1, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `WEB_NOTIFICATION_DEVICE`
--

DROP TABLE IF EXISTS `WEB_NOTIFICATION_DEVICE`;
CREATE TABLE IF NOT EXISTS `WEB_NOTIFICATION_DEVICE` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `DEVICE_KEY` varchar(200) DEFAULT NULL,
  `CUSTOMER_ID` int(11) DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `CREATED_BY` int(4) DEFAULT NULL,
  `CREATED_ON` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `DEVICE_KEY` (`DEVICE_KEY`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COMMENT='WEB_NOTIFICATION_DEVICE' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_NOTIFICATION_DEVICE`
--

INSERT INTO `WEB_NOTIFICATION_DEVICE` (`PK_NO`, `DEVICE_KEY`, `CUSTOMER_ID`, `IS_ACTIVE`, `CREATED_BY`, `CREATED_ON`) VALUES
(13, 'dzfmSDBdBB7QE8C2871-CA:APA91bE65_RIwCr8cRLldZxZ9SPCVw5TlEiQCkHHyQ1Mn-8ks2HI-TFQIhStiw4b9WF45ACtAIa3z3_b49CpB2Cs2YbUB7GDYSHv7euu6DpCOpkE7bubBcccob6lyasu2c6RR1_RFWu5', NULL, 1, NULL, NULL),
(16, 'dw9VsoA8gpqSP2g2iM1Lss:APA91bGkfhpI4zYPnDqsFZoYS4f2KT0prxvGZfEpMPmsUtZUb-tjqKUF4uRm9-4nzFsPwJzQ4nZwGyA2LazBNmVayUtcKA3mFLb5wDEQXkIpa5W0u00wFuDnyQzx0ibZw30-kBYMISrf', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `WEB_PAGES`
--

DROP TABLE IF EXISTS `WEB_PAGES`;
CREATE TABLE IF NOT EXISTS `WEB_PAGES` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(255) NOT NULL,
  `SUB_TITLE` varchar(255) DEFAULT NULL,
  `URL_SLUG` varchar(255) NOT NULL,
  `POSITION` varchar(10) DEFAULT NULL,
  `BODY` longtext,
  `FEATURE_IMAGE` varchar(255) DEFAULT NULL,
  `BANNER` varchar(255) DEFAULT NULL,
  `ORDER_ID` tinyint(5) DEFAULT NULL,
  `IS_ACTIVE` tinyint(1) DEFAULT '1',
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  `META_KEYWARDS` varchar(255) DEFAULT NULL,
  `META_DESCRIPTION` text,
  `FOR_APP` int(1) NOT NULL DEFAULT '0',
  `SECTION` int(1) NOT NULL DEFAULT '1' COMMENT '1=page_section, 2= customer service',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_PAGES`
--

INSERT INTO `WEB_PAGES` (`PK_NO`, `TITLE`, `SUB_TITLE`, `URL_SLUG`, `POSITION`, `BODY`, `FEATURE_IMAGE`, `BANNER`, `ORDER_ID`, `IS_ACTIVE`, `SS_MODIFIED_ON`, `SS_CREATED_ON`, `F_SS_CREATED_BY`, `F_SS_MODIFIED_BY`, `META_KEYWARDS`, `META_DESCRIPTION`, `FOR_APP`, `SECTION`) VALUES
(33, 'About us', 'About us', 'about-us', NULL, '<p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-weight: 700;\">PRIVACY POLICY</span></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">At EasyBazar.com  we respect the privacy of your personal information. We take privacy seriously and are committed to comply with ICT Act 2009  of Bangladesh.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">This Privacy Policy relates to personal information we collect and handle about you as our customers, visitors to our website, social media and other digital services and members of the public. Our personnel and job applicants can contact our human resources team for details about the privacy of their personal information.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-weight: 700;\">WHAT PERSONAL INFORMATION DO WE COLLECT?</span></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">The types of personal information we collect includes name, contact details, identification information, payment and transaction details/history, details regarding participation in any clubs and programs operated from time to time. We also collect records of your communications and interactions with us, details/history of preferences, interests and behavior relating to transactions, products, services and activity with our digital services.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-weight: 700;\">HOW WE COLLECT PERSONAL INFORMATION?</span></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">We may collect your personal information in relation to your interactions and transactions with us. This includes direct from an individual when that individual meets with; communicates with us by letter, telephone, email or fax; subscribes to our publications; making a purchase in store, making a non-cash payment; participating in a promotion, competition survey or submits information through our websites, blogs or other social media outlets. We may ask other people to analyse traffic on our websites, blogs and other social media outlets and they may use cookies to do so.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">We hold personal information electronically and in hard copy form, both at our own premises and with the assistance of our service providers. We implement a range of measures to protect the security of that personal information. We also take measures in respect of destroying or de-identifying personal information that is no longer needed for any lawful purpose.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-weight: 700;\"> </span></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-weight: 700;\">GENERAL USE AND DISCLOSURE</span></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">We use and disclose personal information for the primary purpose for which it was collected, related purposes and other purposes authorized. In general, we use and disclose personal information for the purposes set out above.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-weight: 700;\">HOW DO WE KEEP PERSONAL INFORMATION SECURE?</span></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">We take reasonable steps to protect the personal information we hold from misuse and loss and from unauthorized access, modification or disclosure. We store information in access-controlled premises, and electronic information on secure servers. We require all persons authorized to access electronic information to use logins and passwords to access such information.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">We disclose personal information or whom may have access to personal information we collect, to keep such personal information private and to protect such personal information from misuse and loss and from unauthorized access, modification or disclosure. Unless we are prevented to do so by the law, we de-identify or destroy securely all personal information we hold when no longer reasonably required by us.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-weight: 700;\">INTEGRITY OF PERSONAL INFORMATION</span></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">We take reasonable steps to ensure that the personal information we collect is accurate, up to date and complete and that the personal information we use or disclose is, having regard to the purpose of such use or disclosure, accurate, up to date, complete and relevant.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">To that end, we encourage you to contact us to update or correct any personal information we hold about you.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-weight: 700;\">ACCESSING YOUR PERSONAL INFORMATION</span></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">You may request access to personal information we hold about you. We may require you to verify your identity and to specify what information you require. We deal with all requests for access to personal information as required. We may charge a fee where we provide access and may refuse to provide access.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-weight: 700;\"> </span></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-weight: 700;\">CORRECTION OF PERSONAL INFORMATION</span></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">We take reasonable steps to correct all personal information we hold to ensure that, having regard to the purposes for which it is held, the information is accurate, up to date, complete, relevant and not misleading. You may request corrections to personal information we hold about you. We deal with all requests for correction to personal information as required. We may refuse to correct personal information.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-weight: 700;\">COMPLAINTS</span></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">If you wish to make a complaint about this Privacy Policy or our collection, use or disclosure of personal information, please contact us in the first instance. We will investigate your complaint and try to promptly resolve your complaint directly with you.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"><span style=\"font-weight: 700;\">CONTACT US</span></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\">To request access to or correction of personal information, to request not to receive marketing material or invitations from us, or to make a privacy complaint to us, please contact:</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; letter-spacing: normal; background-color: rgb(245, 245, 245);\"> </p>', 'uploads/2021/08/photos/2-61117ef073572.webp', 'uploads/2021/08/photos/3-61117ef082471.webp', 10, 0, NULL, NULL, 1, 2, NULL, NULL, 1, 1),
(34, 'sas', 'as', 'sas', NULL, '<p>as</p>', NULL, NULL, 5, 1, NULL, NULL, 1, 1, NULL, NULL, 1, 1),
(35, 'fgh', 'gfh', 'fgh', NULL, '<p>fghgf</p>', NULL, NULL, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, 0, 1),
(36, 'asas', 'asas', 'asas', NULL, '<p>asas</p><p><img src=\"http://127.0.0.1:8080/media/blog/7262455-61066726a8a90.webp\" class=\"img-fluid\"><br></p>', '/media/images/page/8511861-6106674b0b3d9.webp', '/media/images/page/8511860-6106674defd21.webp', 7, 1, NULL, NULL, 1, 1, NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `WEB_PAGE_CATEGORY`
--

DROP TABLE IF EXISTS `WEB_PAGE_CATEGORY`;
CREATE TABLE IF NOT EXISTS `WEB_PAGE_CATEGORY` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `META_KEYWARDS` text,
  `META_DESCRIPTION` text,
  `ORDER_ID` int(5) DEFAULT NULL,
  `F_CREATED_BY` int(4) DEFAULT NULL,
  `CREATED_ON` datetime DEFAULT NULL,
  `F_MODIFIED_BY` int(4) DEFAULT NULL,
  `MODIFIED_ON` datetime DEFAULT NULL,
  `PROPERTY_FOR` varchar(50) DEFAULT NULL COMMENT 'sell,rent,roommate',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_PAGE_CATEGORY`
--

INSERT INTO `WEB_PAGE_CATEGORY` (`PK_NO`, `NAME`, `IS_ACTIVE`, `META_KEYWARDS`, `META_DESCRIPTION`, `ORDER_ID`, `F_CREATED_BY`, `CREATED_ON`, `F_MODIFIED_BY`, `MODIFIED_ON`, `PROPERTY_FOR`) VALUES
(1, 'FLAT AND APARTMENT', 0, 'FLAT AND APARTMENT', 'FLAT AND APARTMENT', 100, 2, '2021-08-18 00:20:27', 2, '2021-08-23 23:38:31', 'sell'),
(2, 'LAND AND PLOAT', 1, 'LAND AND PLOAT', 'LAND AND PLOAT', 101, 2, '2021-08-23 21:21:59', NULL, '2021-08-23 21:21:59', 'sell'),
(3, 'OFFICE SPACE', 1, 'OFFICE SPACE', 'OFFICE SPACE', 102, 2, '2021-08-23 21:22:17', NULL, '2021-08-23 21:22:17', 'sell'),
(4, 'FLAT AND APARTMENT', 1, 'FLAT AND APARTMENT', 'FLAT AND APARTMENT', 103, 2, '2021-08-23 21:22:32', NULL, '2021-08-23 21:22:32', 'rent'),
(5, 'LAND AND PLOAT', 1, 'LAND AND PLOAT', 'LAND AND PLOAT', 104, 2, '2021-08-23 21:22:53', NULL, '2021-08-23 21:22:53', 'rent'),
(6, 'OFFICE SPACE', 1, 'OFFICE SPACE', 'OFFICE SPACE', 105, 2, '2021-08-23 21:23:09', 2, '2021-08-23 21:23:28', 'rent'),
(7, 'FLAT AND APARTMENT', 1, 'FLAT AND APARTMENT', 'FLAT AND APARTMENT', 100, 2, '2021-08-18 00:20:27', 2, '2021-08-23 21:23:19', 'roommate'),
(8, 'LAND AND PLOAT', 1, 'LAND AND PLOAT', 'LAND AND PLOAT', 101, 2, '2021-08-23 21:21:59', NULL, '2021-08-23 21:21:59', 'roommate'),
(9, 'OFFICE SPACE', 1, 'OFFICE SPACE', 'OFFICE SPACE', 102, 2, '2021-08-23 21:22:17', NULL, '2021-08-23 21:22:17', 'roommate');

-- --------------------------------------------------------

--
-- Table structure for table `WEB_PRD_REVIEWS`
--

DROP TABLE IF EXISTS `WEB_PRD_REVIEWS`;
CREATE TABLE IF NOT EXISTS `WEB_PRD_REVIEWS` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `F_PRD_MASTER_NO` int(11) DEFAULT NULL,
  `F_PRD_VARIANT_NO` int(11) DEFAULT NULL,
  `F_CUSTOMER_NO` int(11) DEFAULT NULL,
  `CUSTOMER_NAME` varchar(255) DEFAULT NULL,
  `RATING` int(4) DEFAULT NULL,
  `REVIEW_TEXT` text,
  `LANGUAGE_ID` int(1) DEFAULT '1',
  `IS_FEATURE` int(1) DEFAULT '0',
  `IS_ACTIVE` int(1) DEFAULT '1',
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_PRD_REVIEWS`
--

INSERT INTO `WEB_PRD_REVIEWS` (`PK_NO`, `F_PRD_MASTER_NO`, `F_PRD_VARIANT_NO`, `F_CUSTOMER_NO`, `CUSTOMER_NAME`, `RATING`, `REVIEW_TEXT`, `LANGUAGE_ID`, `IS_FEATURE`, `IS_ACTIVE`, `F_SS_CREATED_BY`, `SS_CREATED_ON`, `F_SS_MODIFIED_BY`, `SS_MODIFIED_ON`) VALUES
(29, 118, 262, 1282, 'sifat ecommerce', 5, 'good product', 1, 0, 0, NULL, '2021-04-11 07:19:40', NULL, '2021-04-11 07:19:40'),
(30, 132, 280, 1282, 'sifat ecommerce', 5, 'WOW', 1, 0, 0, NULL, '2021-04-13 12:07:57', NULL, '2021-04-13 12:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `WEB_SEARCH_PAGES`
--

DROP TABLE IF EXISTS `WEB_SEARCH_PAGES`;
CREATE TABLE IF NOT EXISTS `WEB_SEARCH_PAGES` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `F_PAGE_CATEGORY_NO` int(11) DEFAULT NULL,
  `TITLE` varchar(255) NOT NULL,
  `URL_SLUG` varchar(255) NOT NULL,
  `SEARCH_URL` varchar(200) DEFAULT NULL,
  `IMAGE_PATH` varchar(100) DEFAULT NULL,
  `IS_BOTTOM_VIEW` int(1) DEFAULT '1',
  `ORDER_ID` tinyint(5) DEFAULT NULL,
  `META_DESCRIPTION` text,
  `META_KEYWARDS` varchar(255) DEFAULT NULL,
  `IS_ACTIVE` tinyint(1) DEFAULT '1',
  `MODIFIED_AT` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `F_CREATED_BY` int(4) DEFAULT NULL,
  `F_MODIFIED_BY` int(4) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_SEARCH_PAGES`
--

INSERT INTO `WEB_SEARCH_PAGES` (`PK_NO`, `F_PAGE_CATEGORY_NO`, `TITLE`, `URL_SLUG`, `SEARCH_URL`, `IMAGE_PATH`, `IS_BOTTOM_VIEW`, `ORDER_ID`, `META_DESCRIPTION`, `META_KEYWARDS`, `IS_ACTIVE`, `MODIFIED_AT`, `CREATED_AT`, `F_CREATED_BY`, `F_MODIFIED_BY`) VALUES
(1, 1, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/123', 'http://bdflatpanel.local/page/123', '/uploads/pages/6123be54bb758.jpg', 1, 10, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 21:27:16', '2021-08-23 21:27:16', 2, NULL),
(2, 4, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(3, 5, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(4, 2, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(5, 3, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(6, 6, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(7, 7, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(8, 8, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(9, 9, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/123', 'http://bdflatpanel.local/page/123', '/uploads/pages/6123be54bb758.jpg', 1, 10, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 21:27:16', '2021-08-23 21:27:16', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `WEB_SETTINGS`
--

DROP TABLE IF EXISTS `WEB_SETTINGS`;
CREATE TABLE IF NOT EXISTS `WEB_SETTINGS` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(50) NOT NULL,
  `DESCRIPTION` text,
  `HEADER_LOGO` varchar(255) DEFAULT NULL,
  `FOOTER_LOGO` varchar(255) DEFAULT NULL,
  `APP_LOGO` varchar(255) DEFAULT NULL,
  `META_IMAGE` varchar(255) DEFAULT NULL,
  `FAVICON` varchar(200) DEFAULT NULL,
  `PHONE_1` varchar(15) DEFAULT NULL,
  `PHONE_2` varchar(15) DEFAULT NULL,
  `EMAIL_1` varchar(100) DEFAULT NULL,
  `EMAIL_2` varchar(100) DEFAULT NULL,
  `HQ_ADDRESS` text,
  `URL` varchar(255) DEFAULT NULL,
  `FACEBOOK_URL` varchar(150) DEFAULT NULL,
  `TWITTER_URL` varchar(150) DEFAULT NULL,
  `INSTAGRAM_URL` varchar(150) DEFAULT NULL,
  `YOUTUBE_URL` varchar(150) DEFAULT NULL,
  `PINTEREST_URL` varchar(150) DEFAULT NULL,
  `WHATS_APP` varchar(150) DEFAULT NULL,
  `FB_APP_ID` varchar(150) DEFAULT NULL,
  `FACEBOOK_SECRET_ID` varchar(150) DEFAULT NULL,
  `GOOGLE_MAP` text,
  `GOOGLE_APP_ID` varchar(100) DEFAULT NULL,
  `GOOGLE_CLIENT_ID` varchar(150) DEFAULT NULL,
  `GOOGLE_CLIENT_SECRET` varchar(150) DEFAULT NULL,
  `ANDROID_APP_LINK` varchar(255) DEFAULT NULL,
  `ANDROID_APP_VERSION` varchar(200) DEFAULT NULL,
  `META_TITLE` varchar(255) DEFAULT NULL,
  `META_KEYWARDS` text,
  `META_DESCRIPTION` text,
  `ANALYTIC_ID` varchar(50) DEFAULT NULL,
  `LANGUAGE_ID` tinyint(1) DEFAULT NULL,
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  `IPHONE_APP_LINK` varchar(200) DEFAULT NULL,
  `IPHONE_APP_VERSION` varchar(10) DEFAULT NULL,
  `COPYRIGHT_TEXT` varchar(255) DEFAULT NULL,
  `FEATURE_PROPERTY_LIMIT` int(11) DEFAULT '0',
  `VERIFIED_PROPERTY_LIMIT` int(11) DEFAULT '0',
  `SALE_PROPERTY_LIMIT` int(11) DEFAULT '0',
  `RENT_PROPERTY_LIMIT` int(11) DEFAULT '0',
  `ROOMMATE_PROPERTY_LIMIT` int(11) DEFAULT '0',
  `SIMILAR_PROPERTY_LIMIT` int(11) DEFAULT '0',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_SETTINGS`
--

INSERT INTO `WEB_SETTINGS` (`PK_NO`, `TITLE`, `DESCRIPTION`, `HEADER_LOGO`, `FOOTER_LOGO`, `APP_LOGO`, `META_IMAGE`, `FAVICON`, `PHONE_1`, `PHONE_2`, `EMAIL_1`, `EMAIL_2`, `HQ_ADDRESS`, `URL`, `FACEBOOK_URL`, `TWITTER_URL`, `INSTAGRAM_URL`, `YOUTUBE_URL`, `PINTEREST_URL`, `WHATS_APP`, `FB_APP_ID`, `FACEBOOK_SECRET_ID`, `GOOGLE_MAP`, `GOOGLE_APP_ID`, `GOOGLE_CLIENT_ID`, `GOOGLE_CLIENT_SECRET`, `ANDROID_APP_LINK`, `ANDROID_APP_VERSION`, `META_TITLE`, `META_KEYWARDS`, `META_DESCRIPTION`, `ANALYTIC_ID`, `LANGUAGE_ID`, `F_SS_CREATED_BY`, `SS_CREATED_ON`, `F_SS_MODIFIED_BY`, `SS_MODIFIED_ON`, `IPHONE_APP_LINK`, `IPHONE_APP_VERSION`, `COPYRIGHT_TEXT`, `FEATURE_PROPERTY_LIMIT`, `VERIFIED_PROPERTY_LIMIT`, `SALE_PROPERTY_LIMIT`, `RENT_PROPERTY_LIMIT`, `ROOMMATE_PROPERTY_LIMIT`, `SIMILAR_PROPERTY_LIMIT`) VALUES
(1, 'BDFLAT', 'Lorem ipsum dolor, sit, amet consectetur adipisicing elit. A quibusdam nisi corrupti minus architecto at impedit amet repudiandae voluptate sed.', NULL, NULL, NULL, NULL, NULL, '01918993427', NULL, 'info@bdflat.com', NULL, 'Unit 1A, House 01, Road 02, Block A Banani C/A, Dhaka 1213', 'https://bdflat.com', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'httsp://youtube.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bdflat', 5, 5, 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `WEB_SLIDER`
--

DROP TABLE IF EXISTS `WEB_SLIDER`;
CREATE TABLE IF NOT EXISTS `WEB_SLIDER` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(200) DEFAULT NULL,
  `SUBTITLE` varchar(20) DEFAULT NULL,
  `BANNER` varchar(200) DEFAULT NULL,
  `IMAGE_NAME` varchar(255) DEFAULT NULL,
  `URL_LINK` varchar(200) DEFAULT NULL,
  `ORDER_BY` int(11) DEFAULT NULL,
  `IS_FEATURE` int(1) DEFAULT '0',
  `IS_ACTIVE` int(1) DEFAULT '1',
  `CREATED_BY` int(4) DEFAULT NULL,
  `CREATED_ON` datetime DEFAULT NULL,
  `MODIFIED_BY` int(4) DEFAULT NULL,
  `MODIFIED_ON` datetime DEFAULT NULL,
  `POSITION` tinyint(2) DEFAULT '1',
  `MOBILE_BANNER` varchar(200) DEFAULT NULL,
  `MOBILE_IMAGE_NAME` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='WEB_WHATSAPP' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_SLIDER`
--

INSERT INTO `WEB_SLIDER` (`PK_NO`, `TITLE`, `SUBTITLE`, `BANNER`, `IMAGE_NAME`, `URL_LINK`, `ORDER_BY`, `IS_FEATURE`, `IS_ACTIVE`, `CREATED_BY`, `CREATED_ON`, `MODIFIED_BY`, `MODIFIED_ON`, `POSITION`, `MOBILE_BANNER`, `MOBILE_IMAGE_NAME`) VALUES
(2, 'Coming Soon', 'Coming Soon', '/media/images/banner/prod_20082021_611eb3c9433a1.jpg', 'prod_20082021_611eb3c9433a1.jpg', 'https://www.bdhousing.com/', 1, 1, 1, 2, '2021-08-20 01:40:57', NULL, NULL, 1, NULL, NULL),
(3, 'This bdhousing', 'This bdhousing', '/media/images/banner/prod_20082021_611eb6e466370.jpg', 'prod_20082021_611eb6e466370.jpg', 'https://www.bdhousing.com/', 2, 1, 1, 2, '2021-08-20 01:54:12', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `WEB_USER`
--

DROP TABLE IF EXISTS `WEB_USER`;
CREATE TABLE IF NOT EXISTS `WEB_USER` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` int(11) DEFAULT NULL,
  `NAME` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DESIGNATION` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MOBILE_NO` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PASSWORD` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `GENDER` int(11) DEFAULT '1',
  `DOB` date DEFAULT NULL,
  `FACEBOOK_ID` int(20) DEFAULT NULL,
  `GOOGLE_ID` int(20) DEFAULT NULL,
  `PROFILE_PIC` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROFILE_PIC_URL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ACTIVATION_CODE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ACTIVATION_CODE_EXPIRE` datetime DEFAULT NULL,
  `IS_FIRST_LOGIN` int(11) NOT NULL DEFAULT '1',
  `USER_TYPE` int(1) NOT NULL DEFAULT '1' COMMENT '1=seeker,2=owner,3=builder,4=agency, 5 =agent of bdflat',
  `CAN_LOGIN` int(11) NOT NULL DEFAULT '1',
  `REMEMBER_TOKEN` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1' COMMENT '1=active,0=pending,2=inactive,3=deleted',
  `CREATED_BY` int(11) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL DEFAULT '0',
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `IS_EMAIL_VERIFIED` int(11) DEFAULT '0',
  `IS_MOBILE_VERIFIED` int(11) DEFAULT '0',
  `EMAIL_VERIFY_CODE` varchar(50) DEFAULT NULL,
  `EMAIL_VERIFY_EXPIRE` datetime DEFAULT NULL,
  `MOBILE_VERITY_CODE` varchar(50) DEFAULT NULL,
  `MOBILE_VERIFY_EXPIRE` datetime DEFAULT NULL,
  `CONTACT_PER_NAME` varchar(50) DEFAULT NULL,
  `ADDRESS` varchar(200) DEFAULT NULL,
  `ACTUAL_TOPUP` float NOT NULL DEFAULT '0' COMMENT 'CUMULATIVE BALANCE',
  `PENDING_TOPUP` float NOT NULL DEFAULT '0' COMMENT 'ONLY PENDING',
  `USED_TOPUP` float NOT NULL DEFAULT '0',
  `UNUSED_TOPUP` float NOT NULL DEFAULT '0' COMMENT 'ONLY UNUSED',
  `TOTAL_LISTING` int(5) NOT NULL DEFAULT '0',
  `LISTING_LIMIT` int(5) NOT NULL DEFAULT '1',
  `TOTAL_LEAD` int(10) NOT NULL DEFAULT '0',
  `IS_FEATURE` int(1) NOT NULL DEFAULT '0',
  `PAYMENT_AUTO_RENEW` int(1) NOT NULL DEFAULT '1' COMMENT 'Listing when STATUS = 10(published) but PAYMENT_STATUS = 0 , the listing will update payment_status = 1 if enough balance in account',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_USER`
--

INSERT INTO `WEB_USER` (`PK_NO`, `CODE`, `NAME`, `DESIGNATION`, `EMAIL`, `MOBILE_NO`, `PASSWORD`, `GENDER`, `DOB`, `FACEBOOK_ID`, `GOOGLE_ID`, `PROFILE_PIC`, `PROFILE_PIC_URL`, `ACTIVATION_CODE`, `ACTIVATION_CODE_EXPIRE`, `IS_FIRST_LOGIN`, `USER_TYPE`, `CAN_LOGIN`, `REMEMBER_TOKEN`, `STATUS`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `IS_EMAIL_VERIFIED`, `IS_MOBILE_VERIFIED`, `EMAIL_VERIFY_CODE`, `EMAIL_VERIFY_EXPIRE`, `MOBILE_VERITY_CODE`, `MOBILE_VERIFY_EXPIRE`, `CONTACT_PER_NAME`, `ADDRESS`, `ACTUAL_TOPUP`, `PENDING_TOPUP`, `USED_TOPUP`, `UNUSED_TOPUP`, `TOTAL_LISTING`, `LISTING_LIMIT`, `TOTAL_LEAD`, `IS_FEATURE`, `PAYMENT_AUTO_RENEW`) VALUES
(13, 1000, 'maidul1', NULL, 'owner@gmail.com', '123456', '$2y$10$WAp/98uhcPn2e06RQCf3KuCX9wFSwds/Oz/yJklaiStsYB5R882b.', 1, NULL, NULL, NULL, '60b13784f3288.jpg', '/uploads/user/13/60b13784f3288.jpg', NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-04-11 20:33:09', '2021-07-28 18:01:15', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 100, 0, 0, 70, 4, 5, 0, 0, 1),
(14, 1001, 'Maidul Islam Babu', NULL, 'seeker@gmail.com', '01681944126', '$2y$10$uDfNvGFGnLQoltKrDaAuk.bipD33SYs.AWxvL3D2UyeahDBGwaCvy', 1, NULL, NULL, NULL, '60b11641916e1.jpg', '/uploads/user/14/60b11641916e1.jpg', NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-04-14 10:00:54', '2021-07-29 17:32:18', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1000, 0, 5, 0, 0, 1),
(15, 1002, 'Maidul Islam Babu', 'Data analyst', 'developer@gmail.com', '01681944127', '$2y$10$WAp/98uhcPn2e06RQCf3KuCX9wFSwds/Oz/yJklaiStsYB5R882b.', 1, NULL, NULL, NULL, '60b11641916e1.jpg', '/uploads/user/14/60b11641916e1.jpg', NULL, NULL, 1, 3, 1, NULL, 1, 0, 2, '2021-04-14 10:00:54', '2021-09-02 22:11:30', 0, 0, NULL, NULL, NULL, NULL, 'Maidul Islam Babu', 'mirur', 0, 0, 0, 1295, 2, 20, 0, 0, 1),
(16, 1003, 'Monowar Hossain Khan', 'Donno', 'agency@gmail.com', '01700000006', '$2y$10$uvycUE.pzSq/WKN/cxFdWeIwDrWlji8U.Sqs3gvWvygud3QNOGN76', 1, NULL, NULL, NULL, '610aace6e3724.jpeg', '/uploads/user/16/610aace6e3724.jpeg', NULL, NULL, 1, 4, 1, NULL, 1, 0, 2, '2021-08-04 07:22:48', '2021-08-26 01:07:46', 0, 0, NULL, NULL, NULL, NULL, 'Sazol Khan', 'Tongi', 0, 0, 0, 500, 4, 5, 0, 0, 1),
(17, 1004, 'Sazol Khan', 'Agent', 'agent@gmail.com', '01700000000', '$2y$10$MuWw/4agzfMUrr.2sqatCu77Dxv5F57kwjkPVPKGKOupjSj3zTgwi', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, 1, NULL, 1, 0, 0, '2021-08-04 19:15:24', '2021-08-04 19:15:24', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Janata Road', 0, 0, 0, 0, 2, 5, 0, 0, 1),
(18, 1005, 'Maidul Islam', NULL, 'maidul@gmail.com', NULL, '$2y$10$ecx6SE11Em32.OBM99BwdO7/iZIl0hwwjl0v/WkIuxJGLcH28i/eS', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-05 20:38:54', '2021-08-05 20:49:08', 0, 0, NULL, NULL, NULL, NULL, 'Anawar', NULL, 0, 0, 0, 100, 0, 5, 0, 0, 1),
(19, 1006, 'Anawar Landmark', 'CEO', 'anawar@gmail.com', '01681944126', '$2y$10$rwDftOAqpZ/HGlEj3GL9eetz9yh/gzc9jE.hkJszvjNb/.jLo1TA.', 1, NULL, NULL, NULL, '61118b935657a.jpg', '/uploads/user/19/61118b935657a.jpg', NULL, NULL, 1, 3, 1, NULL, 1, 0, 2, '2021-08-09 20:09:23', '2021-08-24 01:12:02', 0, 0, NULL, NULL, NULL, NULL, 'Anawar', 'Banani', 0, 0, 0, 795, 0, 10, 0, 1, 1),
(20, 1007, 'Md Monowar', NULL, 'monowar@gmail.com', '01681944128', '$2y$10$FW8ofpMXZSL6eetYq39LXeJrkF/W6tpab2Re3/vDaN1Fo3hL84vn6', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-17 18:56:16', '2021-08-17 18:56:16', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 5, 0, 0, 1),
(21, 1008, 'IMAGINE PROPERTIES LTD.', 'Builder', 'imaginep@gmail.com', '01939919000', '$2y$10$origRanuRU96nGVUMeyhuusu2uAul.M2EiKwvqoiEfdzwgDBKhefq', 1, NULL, NULL, NULL, '6127bf3da3586.jpg', '/uploads/user/21/6127bf3da3586.jpg', NULL, NULL, 1, 3, 1, NULL, 1, 0, 2, '2021-08-26 16:19:19', '2021-08-26 22:52:15', 0, 0, NULL, NULL, NULL, NULL, 'IMAGINE PROPERTIES LTD.', 'House 71, Road No.: 27, Gulshan - 1, Dhaka - 1212', 0, 0, 0, 0, 4, 10, 0, 0, 1),
(22, 1009, 'LUCKY ENGINEERING LIMITED', 'Builder', 'luckye@gmail.com', '01312131458', '$2y$10$B1/JDEWu/YmbhhUB3yHeR.fU/Z6S0FCjK5qgqDtxx9LW3vCEiZkzu', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 2, '2021-08-26 17:19:32', '2021-08-26 23:25:11', 0, 0, NULL, NULL, NULL, NULL, 'LUCKY ENGINEERING LIMITED', 'Dhaka', 0, 0, 0, 0, 9, 10, 0, 0, 1),
(23, 1010, 'Rafiqul Islam Ratul', NULL, 'rafiqul@gmail.com', '01709659000', '$2y$10$RMslr5bNLcBZcS50ciUGUejel7Ck9rF9NYZLFISkL21m8YNKwdTYC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-26 20:46:22', '2021-08-26 20:46:22', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 0, 0, 1),
(24, 1011, 'RAYYAN PROPERTIES', 'Buuilder', 'rayyan@gmail.com', '01300773000', '$2y$10$8Nq9Tu24MFjGGPoLJe3LLOw4jbSVVFVr25TmADp3KNg2NMwOzonMy', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 2, '2021-08-26 20:52:01', '2021-08-27 02:53:17', 0, 0, NULL, NULL, NULL, NULL, 'RAYYAN PROPERTIES', 'Basundhara', 0, 0, 0, 0, 4, 10, 0, 0, 1),
(25, 1012, 'Purbachal Marine City', NULL, 'purbachalmarinecity@gmail.com', '01345217032', '$2y$10$./A.yFT0s/6Ns3HMy1H.Q.TGKDRYUcro5AxROndPQaUitjIv9HLNm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 0, '2021-08-27 17:50:05', '2021-08-27 17:50:05', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 3, 10, 0, 0, 1),
(26, 1013, 'Dhanshiri Residence', 'Owner', 'dhanshiriresidensial@gmail.com', '01923847564', '$2y$10$MgKpU.PSuOiBAWE0EksIEOplUcDenCEOzQ7DUkvm982siBeqA8Ta.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 0, '2021-08-27 19:17:22', '2021-08-27 19:17:22', 0, 0, NULL, NULL, NULL, NULL, 'Rifat Al Islam', 'Savar, Dhaka', 0, 0, 0, 0, 7, 10, 0, 0, 1),
(27, 1014, 'Richmond Developers Ltd.', 'Manager', 'richmonddevltd@gmail.com', '01484773892', '$2y$10$CxGcTvpmiEy4Yj5MkfmWcOm/P4A4Pb2G.wxxb8fdi4Xzfu21ppaaG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 0, '2021-08-27 19:53:30', '2021-08-27 19:53:30', 0, 0, NULL, NULL, NULL, NULL, 'Tarikul Islam', 'Narayangonj Sadar, Narayanganj', 0, 0, 0, 0, 2, 10, 0, 0, 1),
(28, 1015, 'ismail munna', NULL, 'ismailmunna@gmail.com', '01708042445', '$2y$10$grZBJhpmvN0M2DIjnOySn.DvLplNgmBAA/xr73s2l8aM5PFGkxir.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-27 20:14:26', '2021-08-27 20:14:26', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 0, 0, 1),
(29, 1016, 'anur mia', NULL, 'anurmia@yahoo.com', '01928374854', '$2y$10$Pf24Y.7u7ETrHkuo.vbWFeVHkOTF1ZMicm3DWY79dyMdIVtFJyjfu', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-27 20:23:33', '2021-08-27 20:23:33', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 0, 0, 1),
(30, 1017, 'Shah', NULL, 'shahalam232@gmail.com', '01982737464', '$2y$10$ZGStQx0gfnJIjuAIgwxyteM9OrwkkuXVeOBxdgKweiABLsJHnpK9O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-27 20:34:32', '2021-08-27 20:34:32', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 0, 0, 1),
(31, 1018, 'Effat Ara', NULL, 'effat234ara@gmail.com', '01675463792', '$2y$10$iIafRkxMKHAaqfHuAtc2HO2DLrCaU9EqeN94/5LTk7UMFVUY0FRGK', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-27 20:47:11', '2021-08-27 20:47:11', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 0, 0, 1),
(32, 1019, 'Minhaz', NULL, 'minhaz67263@gmail.com', '01387654354', '$2y$10$xEhHC3NRuOfqUMVPHJjXm.9Xt8bJmzEUN1OoPPareq.B/rUOLdAQO', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-27 20:56:49', '2021-08-27 20:56:49', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 0, 0, 1),
(33, 1020, 'Kh Nazmul', NULL, 'khnazmul@gmail.com', '01523647392', '$2y$10$XxQ6.sMswGHOuXNBGZfSKuT.k9YWynhtIQMON2j9oIeKEcyZkg382', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-27 21:03:10', '2021-08-27 21:03:10', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 0, 0, 1),
(34, 1021, 'Md. Nurul Islam', NULL, 'nurulislam453@gmail.com', '01978541254', '$2y$10$w9RA4HLX0s77BXW9oNmDDOLcNPGU7BsxirGIj0sUGsAabHJHELdLG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-28 04:40:41', '2021-08-28 04:40:41', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 0, 0, 1),
(35, 1022, 'Rayyan Properties', NULL, 'rayyanprop@gmail.com', '01821547896', '$2y$10$7yOilca8cnBy5nq31PFXHuqBXns18dHMPrSdvS/mA8uSr1kj7ZnL6', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-28 04:50:22', '2021-08-28 04:50:22', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 0, 0, 1),
(36, 1023, 'Md. Riazul Islam', NULL, 'riazulislam@gmail.com', '01865239874', '$2y$10$/p9ThOdUVIMk.FyyW0iQsuDuCi7lv7bt.BE4.677hLN9to01hqSiu', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-28 05:05:35', '2021-08-28 05:05:35', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 0, 0, 1),
(37, 1024, 'Md. Abu Zahid', NULL, 'mdabuzahid902@gmail.com', '071785421365', '$2y$10$eMIci4Hct1KR9M8zMdCFZ.c8i3NItkhVsDGegQNqp2VFowphCs0Ne', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-28 05:21:47', '2021-08-28 05:21:47', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 0, 0, 1),
(38, 1025, 'kazi salimuddin', NULL, 'kazisalimuddin245@gmail.com', '01698547993', '$2y$10$RgF1/b31oSSj55/D5F3aK.LUNFrp/GuuiV51ZE693MU/H5R6jWlSC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-28 05:42:57', '2021-08-28 05:42:57', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 0, 0, 1),
(39, 1026, 'Dr. Fazle Rabbi', NULL, 'fazlerabbi34@yahoo.com', '01987541254', '$2y$10$yEGcHZKpYykom0CkWp0qZeLXDGJffbSyYqMINbt95ALaeNZ.i3HQe', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-28 05:47:45', '2021-08-28 05:47:45', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 500, 0, 0, 450, 1, 1, 0, 0, 1),
(40, 1027, 'M.S. Rana', NULL, 'ranams34@yahoo.com', '01558745698', '$2y$10$iDHPf2rjACWpSctKgMHIge7cNOpP1wPIYgNkpVdwc8kO8QMe4g9D.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-28 05:55:11', '2021-08-28 05:55:11', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 150, 0, 0, 150, 1, 1, 0, 0, 1),
(41, 1028, NULL, NULL, 'post1@gmail.com', NULL, '$2y$10$mO.bH9u5e0Jx66KweEtmZer8v07X4wbMiVfVvVaLn4BLQ1IQPBWEy', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-30 10:10:56', '2021-08-30 10:10:56', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1),
(42, 1029, 'Md Kamrul', NULL, 'kamrul@gmail.com', '01918993427', '$2y$10$wJWBBejkhC3YDgxzVtA9Du8faKIDeIf9nYqsBKID965ctzOx9SkM.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-02 18:18:32', '2021-09-02 18:18:32', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1),
(43, 1030, 'kamalbuilder', NULL, 'kamalbuilder@gmail.com', '01918993428', '$2y$10$AOQdMwVvlMDYRlIgqVwD3.7SGE3oq5i2odqVpVd0M8RZnN21Hm.8u', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 0, '2021-09-05 04:10:44', '2021-09-05 04:10:44', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1);

--
-- Triggers `WEB_USER`
--
DROP TRIGGER IF EXISTS `BEFORE_WEB_USER_INSERT`;
DELIMITER $$
CREATE TRIGGER `BEFORE_WEB_USER_INSERT` BEFORE INSERT ON `WEB_USER` FOR EACH ROW BEGIN
declare VAR_CODE INT DEFAULT 0;

SELECT IFNULL(MAX(CODE),1000) INTO VAR_CODE
FROM WEB_USER;
SET NEW.CODE = VAR_CODE+1 ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `WEB_USER_INFO`
--

DROP TABLE IF EXISTS `WEB_USER_INFO`;
CREATE TABLE IF NOT EXISTS `WEB_USER_INFO` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `F_USER_NO` int(11) DEFAULT NULL,
  `META_TITLE` varchar(200) DEFAULT NULL,
  `META_DESCRIPTION` text,
  `ABOUT_COMPANY` text,
  `SITE_URL` varchar(100) DEFAULT NULL,
  `LOGO` varchar(100) DEFAULT NULL,
  `BANNER` varchar(100) DEFAULT NULL,
  `SHOP_OPEN_TIME` varchar(100) DEFAULT NULL,
  `SHOP_CLOSE_TIME` varchar(100) DEFAULT NULL,
  `WORKING_DAYS` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `WEB_USER_INFO`
--

INSERT INTO `WEB_USER_INFO` (`PK_NO`, `F_USER_NO`, `META_TITLE`, `META_DESCRIPTION`, `ABOUT_COMPANY`, `SITE_URL`, `LOGO`, `BANNER`, `SHOP_OPEN_TIME`, `SHOP_CLOSE_TIME`, `WORKING_DAYS`) VALUES
(1, 19, 'Anawar Landmark', 'test', 'Anawar Landmark', 'https://www.prothomalo.com/', '/uploads/images/owner/19/img_10082021_6112bd1bec8f6.jpg', '/uploads/images/owner/19/img_10082021_6112bd1becca8.jpg', '08:00', '16:00', '[\"2\",\"3\"]'),
(2, 15, 'Apartment', 'ff', 'xcvcv', 'ff', NULL, NULL, '02:17', '02:18', '[\"0\",\"1\",\"2\",\"4\",\"5\"]'),
(3, 16, 'Company Name', 'Donno', 'Donno', 'http://company.com', NULL, NULL, '16:00', '04:00', '[\"1\",\"2\",\"3\"]'),
(4, 21, 'IMAGINE PROPERTIES LTD.', 'IMAGINE PROPERTIES LTD.', 'About', 'http://company.com', NULL, NULL, '10:00', '22:19', '[\"0\",\"1\",\"2\",\"3\",\"4\"]'),
(5, 22, 'LUCKY ENGINEERING LIMITED', 'It’s a company build with trust & Quality LUCKY ENGINEERING LTD. (LEL) since 1993 At Lalmatia. We did a lots of projects. Providing clients a complete product with no loose ends for years to come is our end goal. A powerful portfolio of the country’s most distinctive and selective developments, with an excellent reputation in the Real Estate market, and enviable relationships that give our clients exclusive access to the ultimate in luxury apartments and exquisite commercial spaces, all in prime locations of Dhaka city. It is the commitment to both impeccably high standards and attention to detail that drive us to our success.   Our existing customers are the brand ambassadors of our products. Whether it be a Landowner or a Buyer, focusing on customer service is our 100% priority. We always try to keep our promises. Finally, when clients experience our product, they refer it to their friends and families.', 'It’s a company build with trust & Quality LUCKY ENGINEERING LTD. (LEL) since 1993 At Lalmatia. We did a lots of projects. Providing clients a complete product with no loose ends for years to come is our end goal. A powerful portfolio of the country’s most distinctive and selective developments, with an excellent reputation in the Real Estate market, and enviable relationships that give our clients exclusive access to the ultimate in luxury apartments and exquisite commercial spaces, all in prime locations of Dhaka city. It is the commitment to both impeccably high standards and attention to detail that drive us to our success.   Our existing customers are the brand ambassadors of our products. Whether it be a Landowner or a Buyer, focusing on customer service is our 100% priority. We always try to keep our promises. Finally, when clients experience our product, they refer it to their friends and families.', 'http://company.com', '/uploads/images/owner/22/img_27082021_6127f5ee67ac7.jpg', NULL, '11:00', '16:25', '[\"0\",\"1\",\"2\",\"3\",\"4\"]'),
(6, 24, 'RAYYAN PROPERTIES', 'As a real estate owner our management team brings unmatched insights to property and leasing management that lead the market in increasing property value and decreasing operating expenses . Our unique , flexible strategies and our history of increasing the value of managed assets is proven. So you will get the most out of your building’s story now and for years to come.', 'As a real estate owner our management team brings unmatched insights to property and leasing management that lead the market in increasing property value and decreasing operating expenses . Our unique , flexible strategies and our history of increasing the value of managed assets is proven. So you will get the most out of your building’s story now and for years to come.', 'http://company.com', NULL, NULL, '03:52', '03:52', '[\"1\",\"2\",\"3\",\"4\"]'),
(7, 38, NULL, NULL, NULL, NULL, NULL, NULL, '11:48', '05:48', '[\"0\",\"1\",\"2\",\"3\",\"4\",\"5\"]');

-- --------------------------------------------------------

--
-- Table structure for table `WEB_WHATSAPP`
--

DROP TABLE IF EXISTS `WEB_WHATSAPP`;
CREATE TABLE IF NOT EXISTS `WEB_WHATSAPP` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(200) DEFAULT NULL,
  `PHONE_NUMBER` varchar(15) DEFAULT NULL,
  `DESIGNATION` varchar(50) DEFAULT NULL,
  `DEFAULT_MSG` varchar(255) DEFAULT NULL,
  `PHOTO` varchar(150) DEFAULT NULL,
  `ORDER_BY` int(11) DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `CREATED_BY` int(4) DEFAULT NULL,
  `CREATED_ON` datetime DEFAULT NULL,
  `MODIFIED_BY` int(4) DEFAULT NULL,
  `MODIFIED_ON` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_WHATSAPP`
--

INSERT INTO `WEB_WHATSAPP` (`PK_NO`, `NAME`, `PHONE_NUMBER`, `DESIGNATION`, `DEFAULT_MSG`, `PHOTO`, `ORDER_BY`, `IS_ACTIVE`, `CREATED_BY`, `CREATED_ON`, `MODIFIED_BY`, `MODIFIED_ON`) VALUES
(1, 'Huda', '+8801711103662', NULL, 'Hi, I have some questions about sales, can you please help me?', '/media/image/logo/avatar-60e06346f1790.webp', 1, 1, NULL, NULL, 1, '2021-07-03 07:16:55'),
(2, 'Mira', '+60 11-2905 337', NULL, 'Hi, I have some questions about sales, can you please help me?', NULL, 3, 1, NULL, NULL, NULL, NULL),
(3, 'SYARIFA', '+60 10-405 4788', NULL, 'Hi, I have some questions about sales, can you please help me?', '/media/image/logo/sharif-60e96d5b032a0.webp', 4, 1, NULL, NULL, 2, '2021-07-10 03:50:19'),
(4, 'azura', '+44 7983 283981', NULL, 'Hi, I have some questions about sales, can you please help me?', NULL, 2, 1, NULL, NULL, NULL, NULL),
(7, 'abc', '01710788656', 'adad', 'adad', '/media/images/profile/8601559-610667d96d80c.webp', 5, 1, 1, '2021-08-01 03:22:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `WEB_WISHLIST`
--

DROP TABLE IF EXISTS `WEB_WISHLIST`;
CREATE TABLE IF NOT EXISTS `WEB_WISHLIST` (
  `PK_NO` int(11) NOT NULL AUTO_INCREMENT,
  `F_PRD_MASTER_NO` int(11) DEFAULT NULL,
  `F_PRD_VARIANT_NO` int(11) DEFAULT NULL,
  `F_CUSTOMER_NO` int(11) DEFAULT NULL,
  `SESSION_ID` varchar(255) NOT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  `IS_RESELLER` int(1) DEFAULT '0',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_WISHLIST`
--

INSERT INTO `WEB_WISHLIST` (`PK_NO`, `F_PRD_MASTER_NO`, `F_PRD_VARIANT_NO`, `F_CUSTOMER_NO`, `SESSION_ID`, `IS_ACTIVE`, `SS_MODIFIED_ON`, `SS_CREATED_ON`, `F_SS_CREATED_BY`, `F_SS_MODIFIED_BY`, `IS_RESELLER`) VALUES
(48, 703, 1933, NULL, '3W1HNygI85VKjspn4K5UO38fkXNltgud6oeGaMni', 1, '2021-05-06 10:04:06', '2021-05-06 10:04:06', NULL, NULL, 0),
(49, 3, 3, NULL, '3W1HNygI85VKjspn4K5UO38fkXNltgud6oeGaMni', 1, '2021-05-06 10:05:30', '2021-05-06 10:05:30', NULL, NULL, 0),
(50, 6, 10, NULL, '3W1HNygI85VKjspn4K5UO38fkXNltgud6oeGaMni', 1, '2021-05-06 10:18:52', '2021-05-06 10:18:52', NULL, NULL, 0),
(52, 423, 907, NULL, 'xPn8fu7gJYthVLk68OCNcir0QU8fGlKuVR4z7C25', 1, '2021-05-08 04:36:43', '2021-05-08 04:36:43', NULL, NULL, 0),
(53, 154, 308, NULL, 'xPn8fu7gJYthVLk68OCNcir0QU8fGlKuVR4z7C25', 1, '2021-05-08 09:29:43', '2021-05-08 09:29:43', NULL, NULL, 0),
(54, 3, 3, NULL, 'xPn8fu7gJYthVLk68OCNcir0QU8fGlKuVR4z7C25', 1, '2021-05-08 10:38:04', '2021-05-08 10:38:04', NULL, NULL, 0),
(55, 1980, 1980, NULL, 'xPn8fu7gJYthVLk68OCNcir0QU8fGlKuVR4z7C25', 1, '2021-05-08 11:33:02', '2021-05-08 11:33:02', NULL, NULL, 0),
(56, 310, 310, NULL, 'xPn8fu7gJYthVLk68OCNcir0QU8fGlKuVR4z7C25', 1, '2021-05-08 11:34:40', '2021-05-08 11:34:40', NULL, NULL, 0),
(57, 1978, 1978, NULL, 'xPn8fu7gJYthVLk68OCNcir0QU8fGlKuVR4z7C25', 1, '2021-05-08 11:39:48', '2021-05-08 11:39:48', NULL, NULL, 0),
(58, 1986, 1986, NULL, '5r13g7nyjehqIwrzAOgyZ1kF9Mn6WBwxck7uSuPm', 1, '2021-05-11 08:45:28', '2021-05-11 08:45:28', NULL, NULL, 0),
(59, 695, 1891, 0, '56ceafc3-4f98-4eec-be30-476418e05902', 1, '2021-05-11 09:44:34', '2021-05-11 09:44:34', NULL, NULL, 0),
(70, 3, 3, NULL, 'Zqkbh48JKM1VxFhepWBGMuCEwBNtX2YU9hrDSu9C', 1, '2021-05-17 11:53:05', '2021-05-17 11:53:05', NULL, NULL, 0),
(71, 14, 14, NULL, 'Zqkbh48JKM1VxFhepWBGMuCEwBNtX2YU9hrDSu9C', 1, '2021-05-17 11:53:13', '2021-05-17 11:53:13', NULL, NULL, 0),
(72, 154, 154, NULL, 'Zqkbh48JKM1VxFhepWBGMuCEwBNtX2YU9hrDSu9C', 1, '2021-05-17 11:54:14', '2021-05-17 11:54:14', NULL, NULL, 0),
(73, 1970, 1970, NULL, 'Zqkbh48JKM1VxFhepWBGMuCEwBNtX2YU9hrDSu9C', 1, '2021-05-17 11:58:20', '2021-05-17 11:58:20', NULL, NULL, 0),
(74, 1927, 1927, NULL, 'Zqkbh48JKM1VxFhepWBGMuCEwBNtX2YU9hrDSu9C', 1, '2021-05-17 11:58:25', '2021-05-17 11:58:25', NULL, NULL, 0),
(75, 10, 10, NULL, 'CsBogINYHbCT3cMy1tXRGVwuOIptzcSYnj07pbxg', 1, '2021-05-18 06:19:36', '2021-05-18 06:19:36', NULL, NULL, 0),
(76, 3, 3, NULL, 'CsBogINYHbCT3cMy1tXRGVwuOIptzcSYnj07pbxg', 1, '2021-05-18 07:06:18', '2021-05-18 07:06:18', NULL, NULL, 0),
(79, 1927, 1927, NULL, 'CsBogINYHbCT3cMy1tXRGVwuOIptzcSYnj07pbxg', 1, '2021-05-18 09:19:35', '2021-05-18 09:19:35', NULL, NULL, 0),
(80, 3, 3, NULL, 'jRuGKgoM9kngenBuI8Sf3eGDzVdEwZiNpXTgllT4', 1, '2021-05-19 12:09:15', '2021-05-19 12:09:15', NULL, NULL, 0),
(81, 1941, 1941, NULL, 'jRuGKgoM9kngenBuI8Sf3eGDzVdEwZiNpXTgllT4', 1, '2021-05-19 12:29:26', '2021-05-19 12:29:26', NULL, NULL, 0),
(82, 1970, 1970, NULL, 'jRuGKgoM9kngenBuI8Sf3eGDzVdEwZiNpXTgllT4', 1, '2021-05-19 13:35:36', '2021-05-19 13:35:36', NULL, NULL, 0),
(83, 1967, 1967, NULL, '0LsJ6yXVz6Sj6XTjcX7ch1NGX2ZHUM5bbFv0reo9', 1, '2021-05-20 10:26:28', '2021-05-20 10:26:28', NULL, NULL, 0),
(84, 1933, 1933, NULL, '0LsJ6yXVz6Sj6XTjcX7ch1NGX2ZHUM5bbFv0reo9', 1, '2021-05-20 10:26:52', '2021-05-20 10:26:52', NULL, NULL, 0),
(85, 1878, 1878, NULL, '0LsJ6yXVz6Sj6XTjcX7ch1NGX2ZHUM5bbFv0reo9', 1, '2021-05-20 10:52:38', '2021-05-20 10:52:38', NULL, NULL, 0),
(86, 1941, 1941, NULL, '0LsJ6yXVz6Sj6XTjcX7ch1NGX2ZHUM5bbFv0reo9', 1, '2021-05-20 12:30:52', '2021-05-20 12:30:52', NULL, NULL, 0),
(87, 3, 3, NULL, '0LsJ6yXVz6Sj6XTjcX7ch1NGX2ZHUM5bbFv0reo9', 1, '2021-05-20 12:43:38', '2021-05-20 12:43:38', NULL, NULL, 0),
(88, 3, 3, NULL, 'EuhSCVPOUse5mf1vZgSQGsO0nzMfJA7ThFoBLA5m', 1, '2021-05-22 08:41:08', '2021-05-22 08:41:08', NULL, NULL, 0),
(89, 1941, 1941, 1290, 'kKDjDUPwtd8ZdZHZeSw3b2sF8QBlWybIG9F2ezww', 1, '2021-05-23 11:02:26', '2021-05-23 11:02:26', NULL, NULL, 0),
(90, 3, 3, 1290, 'kKDjDUPwtd8ZdZHZeSw3b2sF8QBlWybIG9F2ezww', 1, '2021-05-23 11:03:13', '2021-05-23 11:03:13', NULL, NULL, 0),
(91, 14, 14, 1290, 'kKDjDUPwtd8ZdZHZeSw3b2sF8QBlWybIG9F2ezww', 1, '2021-05-23 11:03:19', '2021-05-23 11:03:19', NULL, NULL, 0),
(92, 1966, 1966, NULL, 'IpKDhgyTTo1oF5ihRwyZB0xvmv9o6zCx5DpBzaOr', 1, '2021-05-24 06:29:31', '2021-05-24 06:29:31', NULL, NULL, 0),
(93, 1941, 1941, NULL, 'IpKDhgyTTo1oF5ihRwyZB0xvmv9o6zCx5DpBzaOr', 1, '2021-05-24 06:29:45', '2021-05-24 06:29:45', NULL, NULL, 0),
(94, 261, 261, NULL, 'IpKDhgyTTo1oF5ihRwyZB0xvmv9o6zCx5DpBzaOr', 1, '2021-05-24 09:09:18', '2021-05-24 09:09:18', NULL, NULL, 0),
(95, 10, 10, NULL, 'BZGUlpOuL1hqmfS6FGMW0rTydUwoTBNPlUwC0wm3', 1, '2021-05-27 06:26:42', '2021-05-27 06:26:42', NULL, NULL, 0),
(96, 36, 36, NULL, 'KjU2JgCZnsp0mAT3I4t8WvgBzHOUfnhjXvfNtaZS', 1, '2021-05-31 04:49:58', '2021-05-31 04:49:58', NULL, NULL, 0),
(97, 1697, 1697, NULL, 'KjU2JgCZnsp0mAT3I4t8WvgBzHOUfnhjXvfNtaZS', 1, '2021-05-31 07:08:42', '2021-05-31 07:08:42', NULL, NULL, 0),
(98, 1941, 1941, NULL, 'KjU2JgCZnsp0mAT3I4t8WvgBzHOUfnhjXvfNtaZS', 1, '2021-05-31 12:42:49', '2021-05-31 12:42:49', NULL, NULL, 0),
(99, 1942, 1942, NULL, 'KjU2JgCZnsp0mAT3I4t8WvgBzHOUfnhjXvfNtaZS', 1, '2021-05-31 12:55:03', '2021-05-31 12:55:03', NULL, NULL, 0),
(100, 15, 15, NULL, 'KjU2JgCZnsp0mAT3I4t8WvgBzHOUfnhjXvfNtaZS', 1, '2021-05-31 13:54:08', '2021-05-31 13:54:08', NULL, NULL, 0),
(101, 260, 260, NULL, 'y1LeTCn7mEOxxM7hmVutd70RAB6PY6FFcCW1JxO1', 1, '2021-06-01 07:40:47', '2021-06-01 07:40:47', NULL, NULL, 0),
(102, 263, 263, NULL, 'y1LeTCn7mEOxxM7hmVutd70RAB6PY6FFcCW1JxO1', 1, '2021-06-01 07:43:24', '2021-06-01 07:43:24', NULL, NULL, 0),
(103, 1, 1, NULL, 'y1LeTCn7mEOxxM7hmVutd70RAB6PY6FFcCW1JxO1', 1, '2021-06-01 07:52:49', '2021-06-01 07:52:49', NULL, NULL, 0),
(104, 1970, 1970, NULL, '0Hw6GjH7i6L9sXaohkzhWjkdxqhthGSNTXpPMdv4', 1, '2021-06-02 06:27:56', '2021-06-02 06:27:56', NULL, NULL, 0),
(105, 1943, 1943, NULL, '0Hw6GjH7i6L9sXaohkzhWjkdxqhthGSNTXpPMdv4', 1, '2021-06-02 10:02:28', '2021-06-02 10:02:28', NULL, NULL, 0),
(106, 1967, 1967, NULL, '0Hw6GjH7i6L9sXaohkzhWjkdxqhthGSNTXpPMdv4', 1, '2021-06-02 11:00:19', '2021-06-02 11:00:19', NULL, NULL, 0),
(107, 1966, 1966, NULL, '0Hw6GjH7i6L9sXaohkzhWjkdxqhthGSNTXpPMdv4', 1, '2021-06-02 13:53:47', '2021-06-02 13:53:47', NULL, NULL, 0),
(109, 3, 3, NULL, 'pbdKtxB9KlvXb6XtHrcILyiVkRRdcluELV4lOA39', 1, '2021-06-06 10:29:11', '2021-06-06 10:29:11', NULL, NULL, 0),
(110, 1970, 1970, NULL, 'Um7px5jYmfrtceEcq46o73rnIOmvgvEvrSlw2BnH', 1, '2021-06-07 08:10:50', '2021-06-07 08:10:50', NULL, NULL, 0),
(111, 3, 3, NULL, 'Um7px5jYmfrtceEcq46o73rnIOmvgvEvrSlw2BnH', 1, '2021-06-07 08:36:35', '2021-06-07 08:36:35', NULL, NULL, 0),
(112, 14, 14, 1295, 'o7b4Ymygb9uhJhdoaaQGKuXTQZpjCm5ifA55rinW', 1, '2021-06-08 10:22:37', '2021-06-08 10:22:37', NULL, NULL, 0),
(113, 127, 127, 1295, 'o7b4Ymygb9uhJhdoaaQGKuXTQZpjCm5ifA55rinW', 1, '2021-06-08 10:23:48', '2021-06-08 10:23:48', NULL, NULL, 0),
(114, 1966, 1966, NULL, 'JJIGyNkM99X0Q14NGcwxwO9CU2Xn2z8uUPfSQ5k2', 1, '2021-06-09 04:52:21', '2021-06-09 04:52:21', NULL, NULL, 0),
(115, 310, 310, NULL, 'EPWGNDaVOYJ0d2UnkAO3RjhQpFSuPojapf46abpL', 1, '2021-06-13 05:42:04', '2021-06-13 05:42:04', NULL, NULL, 0),
(116, 3, 3, NULL, 'EPWGNDaVOYJ0d2UnkAO3RjhQpFSuPojapf46abpL', 1, '2021-06-13 07:03:19', '2021-06-13 07:03:19', NULL, NULL, 0),
(117, 455, 455, NULL, 'EPWGNDaVOYJ0d2UnkAO3RjhQpFSuPojapf46abpL', 1, '2021-06-13 09:06:44', '2021-06-13 09:06:44', NULL, NULL, 0),
(118, 1990, 1990, 1295, 'QVyai4FMKcNIEKWYi9XHZM7A6U4xbfli8KXWoH2a', 1, '2021-06-13 10:17:18', '2021-06-13 10:17:18', NULL, NULL, 0),
(120, 1, 1, NULL, 'YMe46kIs7ylMIH8DiStrVOfz1grJS7rQwzZJ5FZP', 1, '2021-06-14 06:26:05', '2021-06-14 06:26:05', NULL, NULL, 0),
(121, 29, 29, NULL, 'YMe46kIs7ylMIH8DiStrVOfz1grJS7rQwzZJ5FZP', 1, '2021-06-14 14:28:07', '2021-06-14 14:28:07', NULL, NULL, 0),
(122, 173, 173, NULL, 'QnRdMEUeb7iKy2GpHc4hbuLST1P8HWAkjJjGh2ey', 1, '2021-06-15 09:42:31', '2021-06-15 09:42:31', NULL, NULL, 0),
(123, 1942, 1942, NULL, 'p1jrPlbQAhFzuDAgdUfbEVjqpYeVOAMjLTteMRap', 1, '2021-06-21 12:38:54', '2021-06-21 12:38:54', NULL, NULL, 0),
(125, 684, 684, NULL, 'G6gVsnygi9R0YpjkMvRKWzbXCSYCmMnL2SAsg46H', 1, '2021-06-22 12:43:11', '2021-06-22 12:43:11', NULL, NULL, 0),
(126, 1605, 1605, NULL, 'G6gVsnygi9R0YpjkMvRKWzbXCSYCmMnL2SAsg46H', 1, '2021-06-22 13:32:40', '2021-06-22 13:32:40', NULL, NULL, 0),
(127, 185, 185, NULL, 'CiJ4fh9cgaWaRyh98G7oRJccsK0BQf4eanIsSTTJ', 1, '2021-06-24 07:56:44', '2021-06-24 07:56:44', NULL, NULL, 0),
(128, 1990, 1990, NULL, 'VymieU5lJxHRBfizDFQQF28kghQ7woJsLS5p78CW', 1, '2021-07-06 05:58:41', '2021-07-06 05:58:41', NULL, NULL, 0),
(129, 1464, 1464, NULL, 'VymieU5lJxHRBfizDFQQF28kghQ7woJsLS5p78CW', 1, '2021-07-06 12:17:47', '2021-07-06 12:17:47', NULL, NULL, 0),
(130, 310, 310, NULL, 'IVhqP6dSlim7p20PygxuVE1sizfYeze3zC3dN0QL', 1, '2021-07-07 12:10:21', '2021-07-07 12:10:21', NULL, NULL, 0),
(131, 685, 685, NULL, 'UrBMMWitqFrhO7P1Ld7o2bykvru9kz7Zuuf6KLYg', 1, '2021-07-08 06:01:01', '2021-07-08 06:01:01', NULL, NULL, 0),
(132, 684, 684, NULL, 'UrBMMWitqFrhO7P1Ld7o2bykvru9kz7Zuuf6KLYg', 1, '2021-07-08 06:12:07', '2021-07-08 06:12:07', NULL, NULL, 0),
(133, 198, 198, NULL, 'UrBMMWitqFrhO7P1Ld7o2bykvru9kz7Zuuf6KLYg', 1, '2021-07-08 07:43:46', '2021-07-08 07:43:46', NULL, NULL, 0),
(134, 1846, 1846, NULL, 'UrBMMWitqFrhO7P1Ld7o2bykvru9kz7Zuuf6KLYg', 1, '2021-07-08 08:15:45', '2021-07-08 08:15:45', NULL, NULL, 0),
(135, 3, 3, NULL, 'UrBMMWitqFrhO7P1Ld7o2bykvru9kz7Zuuf6KLYg', 1, '2021-07-08 13:57:31', '2021-07-08 13:57:31', NULL, NULL, 0),
(136, 11, 11, NULL, 'snM4murN54tAAeL0yDLxU1cVbWzmiKMTjYTFWZu2', 1, '2021-07-11 07:42:00', '2021-07-11 07:42:00', NULL, NULL, 0),
(137, 310, 310, NULL, 'oE3nN5psXoL8wG3cT8o2cByMRdJW7LSj14HrPPS3', 1, '2021-07-12 08:42:57', '2021-07-12 08:42:57', NULL, NULL, 0),
(138, 683, 683, NULL, 'MH6uRPmU8PZb1bHYqEssMjIThVUE0vgSEmdSpvOJ', 1, '2021-07-13 10:58:14', '2021-07-13 10:58:14', NULL, NULL, 0),
(139, 684, 684, 1295, 'zUBnunnSfVUCy1S2EYjcSX832DvHIRR9v3htrpAR', 1, '2021-07-15 09:05:41', '2021-07-15 09:05:41', NULL, NULL, 0),
(140, 3, 3, 1295, 'zUBnunnSfVUCy1S2EYjcSX832DvHIRR9v3htrpAR', 1, '2021-07-15 09:06:36', '2021-07-15 09:06:36', NULL, NULL, 0),
(142, 75, 75, 7, 'YJl7mjRoyFikgwub3qiDwjR8x5v5ACyy76JbzsLA', 1, '2021-07-19 10:52:34', '2021-07-19 10:52:34', NULL, NULL, 0),
(143, 235, 235, 7, '28EoLKy8jfaNc9mGBQH1Yb008uoNgwVsgYj6nl4h', 1, '2021-07-19 10:56:29', '2021-07-19 10:55:39', NULL, NULL, 0),
(144, 684, 684, 14, 'qLQLZkkbCecvgUGWYkI4ospnxsHDllU0A3ZrtgEK', 1, '2021-08-04 06:47:59', '2021-08-04 06:47:59', NULL, NULL, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `SS_AREA`
--
ALTER TABLE `SS_AREA`
  ADD CONSTRAINT `FK_SS_AREA_CITY` FOREIGN KEY (`F_CITY_NO`) REFERENCES `SS_CITY` (`PK_NO`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
