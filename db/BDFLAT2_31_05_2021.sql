-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2021 at 08:33 PM
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
  `CUSTOMER_CELL` varchar(40) DEFAULT NULL,
  `F_PAYMENT_CURRENCY_NO` int(11) DEFAULT NULL,
  `CURRENCY_NAME` varchar(10) DEFAULT NULL,
  `CONVERSION_RATE_TO_MR` float DEFAULT '0',
  `AMOUNT` float DEFAULT '0',
  `F_ACC_PAYMENT_BANK_NO` int(10) DEFAULT NULL,
  `PAYMENT_BANK_NAME` varchar(40) DEFAULT NULL,
  `PAYMENT_ACCOUNT_NAME` varchar(40) DEFAULT NULL,
  `PAYMENT_BANK_ACC_NO` varchar(40) DEFAULT NULL,
  `PAYMENT_CONFIRMED_STATUS` int(11) DEFAULT NULL,
  `ATTACHMENT_PATH` varchar(200) DEFAULT NULL,
  `PAYMENT_NOTE` varchar(200) DEFAULT NULL,
  `PAID_BY` varchar(40) DEFAULT NULL,
  `SLIP_NUMBER` varchar(40) DEFAULT NULL,
  `PAYMENT_DATE` date DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `F_SS_CREATED_BY` int(4) DEFAULT NULL,
  `SS_CREATED_ON` datetime DEFAULT NULL,
  `F_SS_MODIFIED_BY` int(4) DEFAULT NULL,
  `SS_MODIFIED_ON` datetime DEFAULT NULL,
  `F_SS_COMPANY_NO` int(4) DEFAULT NULL,
  `IS_COD` int(1) DEFAULT '0',
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `U_ACC_CUSTOMER_PAYMENTS` (`SLIP_NUMBER`),
  KEY `FK_ACC_CUSTOMER_PAYMENTS_SS_CURRENCY` (`F_PAYMENT_CURRENCY_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

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
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `U_ACC_PAYMENT_BANK_ACC` (`BANK_NAME`,`BANK_ACC_NAME`,`BANK_ACC_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ACC_PAYMENT_BANK_ACC`
--

INSERT INTO `ACC_PAYMENT_BANK_ACC` (`PK_NO`, `CODE`, `BANK_NAME`, `BANK_ACC_NAME`, `BANK_ACC_NO`, `BALANCE_ACTUAL`, `BALACNE_BUFFER`, `COMMENTS`, `IS_ACTIVE`, `F_SS_CREATED_BY`, `F_USER_NO`, `IS_COD`, `SS_CREATED_ON`, `F_SS_MODIFIED_BY`, `SS_MODIFIED_ON`, `F_SS_COMPANY_NO`) VALUES
(1, 101, 'DBBL', 'Dalal Account 01', '778899', 0, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(2, 101, 'IBBL', 'Dalal Account 02', '11778899', 0, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(3, NULL, 'NRB', 'Admin', '122211', 0, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL);

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
  PRIMARY KEY (`PK_NO`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_FLOOR_LIST`
--

INSERT INTO `PRD_FLOOR_LIST` (`PK_NO`, `NAME`, `IS_ACTIVE`) VALUES
(1, 'Ground Floor', 1),
(2, '1 Storied', 1),
(3, '2 Storied', 1),
(4, '3 Storied', 1),
(5, '4 Storied', 1),
(6, '5 Storied', 1);

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
  `F_CITY_NO` int(2) DEFAULT NULL,
  `CITY_NAME` varchar(50) DEFAULT NULL,
  `F_AREA_NO` int(10) DEFAULT NULL,
  `AREA_NAME` varchar(50) DEFAULT NULL,
  `F_USER_NO` int(10) DEFAULT NULL,
  `USER_TYPE` int(1) DEFAULT '2' COMMENT '2=owner,3=builder,4=agency',
  `IS_EXPAIRED` int(1) NOT NULL DEFAULT '0' COMMENT '1=EXPAIRED, 0 = NOT EXPAIRED',
  `EXPAIRED_AT` datetime DEFAULT NULL,
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
  `IS_FEATURE` int(1) DEFAULT '0',
  `IS_DELETE` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTINGS`
--

INSERT INTO `PRD_LISTINGS` (`PK_NO`, `CODE`, `PROPERTY_FOR`, `F_PROPERTY_TYPE_NO`, `PROPERTY_TYPE`, `ADDRESS`, `PROPERTY_CONDITION`, `F_PROPERTY_CONDITION`, `PROPERTY_SIZE`, `BEDROOM`, `BATHROOM`, `TOTAL_PRICE`, `PRICE_TYPE`, `TITLE`, `URL_SLUG`, `F_CITY_NO`, `CITY_NAME`, `F_AREA_NO`, `AREA_NAME`, `F_USER_NO`, `USER_TYPE`, `IS_EXPAIRED`, `EXPAIRED_AT`, `CONTACT_PERSON1`, `CONTACT_PERSON2`, `MOBILE1`, `MOBILE2`, `F_LISTING_TYPE`, `LISTING_TYPE`, `F_PREP_TENANT_NO`, `PREP_TENANT`, `AVAILABLE_FROM`, `GENDER`, `IS_VERIFIED`, `VERIFIED_BY`, `VERIFIED_AT`, `CREATED_AT`, `CREATED_BY`, `MODIFIED_AT`, `MODIFIED_BY`, `TOTAL_FLOORS`, `FLOORS_AVAIABLE`, `IS_FEATURE`, `IS_DELETE`) VALUES
(1, 1, 'rent', 2, 'Office ', 'Uttara', 'Ready', 1, '0', 0, 0, '0', 1, 'Test', NULL, 2, 'Chittagong', 4, 'GOC', NULL, 2, 0, NULL, 'hk anik', NULL, '0123456789', NULL, 2, 'Feature LIsting for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-05-08 20:47:59', NULL, '2021-05-28 19:23:16', 13, 3, '[\"1\",\"2\",\"3\"]', 0, 0),
(2, NULL, 'sell', 1, 'Apartment', 'dhaka', 'Semi Ready', 2, '0', 0, 0, '0', 1, 'test', NULL, 1, 'Dhaka', 2, 'Banani', NULL, 2, 0, NULL, 'New Person 2', NULL, '016819444126', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-05-10 15:40:53', NULL, '2021-05-11 21:08:49', 13, 6, '[\"3\",\"5\"]', 0, 0),
(3, 1001, 'sell', 1, 'Apartment', 'dhaka, banani', 'Semi Ready', 2, '0', 0, 0, '0', 1, 'Good apartment', NULL, 2, 'Chittagong', 4, 'GOC', NULL, 2, 0, NULL, 'Jamela Begom', NULL, '6768194412', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-05-24 20:46:36', 13, '2021-05-24 20:55:17', 13, 3, '[\"2\"]', 0, 0);

--
-- Triggers `PRD_LISTINGS`
--
DROP TRIGGER IF EXISTS `BEFORE_PRD_LISTINGS_INSERT`;
DELIMITER $$
CREATE TRIGGER `BEFORE_PRD_LISTINGS_INSERT` BEFORE INSERT ON `PRD_LISTINGS` FOR EACH ROW BEGIN

DECLARE VAR_CODE INT(40) DEFAULT 0;
DECLARE VAR_CITY_NAME VARCHAR(40) DEFAULT NULL;
DECLARE VAR_AREA_NAME VARCHAR(40) DEFAULT NULL;
DECLARE VAR_PROPERTY_TYPE VARCHAR(40) DEFAULT NULL;
DECLARE VAR_PROPERTY_CONDITION VARCHAR(40) DEFAULT NULL;
DECLARE VAR_LISTING_TYPE VARCHAR(40) DEFAULT NULL;


SELECT IFNULL(MAX(CODE),1000) INTO VAR_CODE FROM PRD_LISTINGS;
SELECT CITY_NAME INTO VAR_CITY_NAME FROM SS_CITY WHERE PK_NO = NEW.F_CITY_NO;
SELECT AREA_NAME INTO VAR_AREA_NAME FROM SS_AREA WHERE PK_NO = NEW.F_AREA_NO;
SELECT 	PROPERTY_TYPE INTO VAR_PROPERTY_TYPE FROM PRD_PROPERTY_TYPE WHERE PK_NO = NEW.F_PROPERTY_TYPE_NO;
SELECT PROD_CONDITION INTO VAR_PROPERTY_CONDITION FROM PRD_PROPERTY_CONDITION WHERE PK_NO = NEW.F_PROPERTY_CONDITION;
SELECT NAME INTO VAR_LISTING_TYPE FROM PRD_LISTING_TYPE WHERE PK_NO = NEW.F_LISTING_TYPE;

IF VAR_CODE < 1000 THEN
	SET NEW.CODE = 1000+1;
ELSE 
	SET NEW.CODE = VAR_CODE+1;
END IF;

SET NEW.CITY_NAME = VAR_CITY_NAME;
SET NEW.AREA_NAME = VAR_AREA_NAME;
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
DECLARE VAR_PROPERTY_TYPE VARCHAR(40) DEFAULT NULL;
DECLARE VAR_PROPERTY_CONDITION VARCHAR(40) DEFAULT NULL;
DECLARE VAR_LISTING_TYPE VARCHAR(40) DEFAULT NULL;

SELECT CITY_NAME INTO VAR_CITY_NAME FROM SS_CITY WHERE PK_NO = NEW.F_CITY_NO;
SELECT AREA_NAME INTO VAR_AREA_NAME FROM SS_AREA WHERE PK_NO = NEW.F_AREA_NO;

SELECT 	PROPERTY_TYPE INTO VAR_PROPERTY_TYPE FROM PRD_PROPERTY_TYPE WHERE PK_NO = NEW.F_PROPERTY_TYPE_NO;
SELECT PROD_CONDITION INTO VAR_PROPERTY_CONDITION FROM PRD_PROPERTY_CONDITION WHERE PK_NO = NEW.F_PROPERTY_CONDITION;
SELECT NAME INTO VAR_LISTING_TYPE FROM PRD_LISTING_TYPE WHERE PK_NO = NEW.F_LISTING_TYPE;

SET NEW.CITY_NAME = VAR_CITY_NAME;
SET NEW.AREA_NAME = VAR_AREA_NAME;
SET NEW.PROPERTY_TYPE = VAR_PROPERTY_TYPE;
SET NEW.PROPERTY_CONDITION = VAR_PROPERTY_CONDITION;
SET NEW.LISTING_TYPE = VAR_LISTING_TYPE;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `PRD_LISTING_ADDITIONAL_INFO`
--

DROP TABLE IF EXISTS `PRD_LISTING_ADDITIONAL_INFO`;
CREATE TABLE IF NOT EXISTS `PRD_LISTING_ADDITIONAL_INFO` (
  `PK_NO` bigint(20) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTING_ADDITIONAL_INFO`
--

INSERT INTO `PRD_LISTING_ADDITIONAL_INFO` (`PK_NO`, `F_LISTING_NO`, `FACING`, `HANDOVER_DATE`, `DESCRIPTION`, `F_FEATURE_NOS`, `FEATURES`, `F_NEARBY_NOS`, `NEARBY`, `LOCATION_MAP`, `VIDEO_CODE`) VALUES
(1, 1, '1', '2021-05-08 00:00:00', 'Test Description', '[\"1\",\"2\"]', NULL, '[\"1\",\"2\",\"3\"]', NULL, 'https://www.google.com/maps/place/Uttara+House+Building/@23.8710489,90.4062432,15z/data=!4m5!3m4!1s0x3755c43bb6228489:0xeeba9aedb454ee7f!8m2!3d23.874278!4d90.400369', 'https://www.youtube.com/watch?v=OGI0fNvr4fo'),
(2, 1, '1', '2021-05-08 00:00:00', 'Test Description', '[\"1\",\"2\",\"4\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, 'https://www.google.com/maps/place/Uttara+House+Building/@23.8710489,90.4062432,15z/data=!4m5!3m4!1s0x3755c43bb6228489:0xeeba9aedb454ee7f!8m2!3d23.874278!4d90.400369', 'https://www.youtube.com/watch?v=OGI0fNvr4fo'),
(3, 2, NULL, '2021-05-10 00:00:00', 'মিউকরমাইকোসিস একটি বিরল সংক্রমণ। মিউকর নামে একটি ছত্রাকের সংস্পর্শে এলে এই সংক্রমণ হয়। সাধারণত মাটি, গাছপালা, পচনশীল ফল ও শাকসবজিতে এই ছত্রাক দেখা যায়। ডা. নায়ের বলেন, এই ছত্রাক সব জায়গায় থাকে। মাটি, বাতাস, এমনকি স্বাস্থ্যবান লোকের নাক ও শ্লেষ্মায়ও এটা পাওয়া যায়।', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(4, 3, '1', '2021-05-29 00:00:00', 'tttt', '[\"1\",\"2\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTING_IMAGES`
--

INSERT INTO `PRD_LISTING_IMAGES` (`PK_NO`, `F_LISTING_NO`, `IMAGE_PATH`, `IMAGE`, `THUMB_PATH`, `THUMB`, `IS_DEFAULT`) VALUES
(28, 2, '/uploads/listings/2/6099597e40a92.jpg', '6099597e40a92.jpg', NULL, NULL, 1),
(29, 2, '/uploads/listings/2/6099597e416a7.jpg', '6099597e416a7.jpg', NULL, NULL, 0),
(30, 3, '/uploads/listings/3/60ac10ac9616b.jpg', '60ac10ac9616b.jpg', '/uploads/listings/3/thumb/60ac10ac96184.jpg', '60ac10ac96184.jpg', 1);

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
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTING_TYPE`
--

INSERT INTO `PRD_LISTING_TYPE` (`PK_NO`, `NAME`, `IS_ACTIVE`, `ORDER_ID`) VALUES
(1, 'General Listing for 30 days', 1, 1),
(2, 'Feature LIsting for 30 days', 1, 2),
(3, 'General Listing with daily auto update for 30 days', 1, 3),
(4, 'Feature Listing with daily auto update for 30 days', 1, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_LISTING_VARIANTS`
--

INSERT INTO `PRD_LISTING_VARIANTS` (`PK_NO`, `F_LISTING_NO`, `PROPERTY_SIZE`, `BEDROOM`, `BATHROOM`, `TOTAL_PRICE`, `IS_DEFAULT`) VALUES
(44, 2, '5000', 4, 4, 8000000, 1),
(47, 3, '1000', 2, 2, 500000, 1),
(48, 3, '1500', 3, 2, 700000, 0),
(49, 1, '123', 1, 2, 456, 0),
(50, 1, '789', 4, 4, 789, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_PROPERTY_CONDITION`
--

INSERT INTO `PRD_PROPERTY_CONDITION` (`PK_NO`, `PROD_CONDITION`, `URL_SLUG`, `IS_ACTIVE`, `ORDER_ID`) VALUES
(1, 'Ready', 'ready', 1, 1),
(2, 'Semi Ready', 'semi-ready', 1, 2),
(3, 'Ongoing', 'ongoing', 1, 3),
(4, 'Used', 'used', 1, 4);

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
  PRIMARY KEY (`PK_NO`),
  UNIQUE KEY `u_url_slug` (`URL_SLUG`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_PROPERTY_TYPE`
--

INSERT INTO `PRD_PROPERTY_TYPE` (`PK_NO`, `PROPERTY_TYPE`, `URL_SLUG`, `IS_ACTIVE`, `ORDER_ID`, `TYPE`) VALUES
(1, 'Apartment', 'apartment', 1, 1, 'A'),
(2, 'Office ', 'office ', 1, 2, 'B'),
(3, 'Shop', 'shop', 1, 3, 'B'),
(4, 'Warehouse', 'warehouse', 1, 4, 'B'),
(5, 'Industrial space', 'industrial-space', 1, 5, 'B'),
(6, 'Garage', 'garage', 1, 6, 'B'),
(7, 'Land', 'land', 1, 7, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `PRD_REQUIREMENTS`
--

DROP TABLE IF EXISTS `PRD_REQUIREMENTS`;
CREATE TABLE IF NOT EXISTS `PRD_REQUIREMENTS` (
  `PK_NO` int(10) NOT NULL AUTO_INCREMENT,
  `F_CITY_NO` int(10) DEFAULT NULL,
  `F_AREAS` varchar(100) DEFAULT NULL COMMENT 'AREA ID''S BY COMMA SEPARETED',
  `CITY_NAME` varchar(50) DEFAULT NULL,
  `AREA_NAMES` varchar(200) DEFAULT NULL COMMENT 'AREA NAME BY COMMA SEPARETED',
  `PROPERTY_FOR` varchar(20) DEFAULT NULL COMMENT 'RENT OR BUY',
  `F_PROPERTY_TYPE_NO` int(2) DEFAULT NULL,
  `PROPERTY_TYPE` varchar(50) DEFAULT NULL,
  `MIN_SIZE` int(5) DEFAULT '0',
  `MAX_SIZE` int(5) DEFAULT '0',
  `MIN_BUDGET` float DEFAULT '0',
  `MAX_BUDGET` float DEFAULT '0',
  `BEDROOM` varchar(20) DEFAULT NULL,
  `PROPERTY_CONDITION` varchar(50) DEFAULT NULL,
  `REQUIREMENT_DETAILS` text,
  `PREP_CONT_TIME` time DEFAULT NULL COMMENT 'Preferred time to contact',
  `EMAIL_ALERT` varchar(50) NOT NULL DEFAULT 'WEEKLY' COMMENT 'Daily, Weekly, Monthly',
  `CREATED_AT` datetime DEFAULT NULL,
  `CREATED_BY` int(10) DEFAULT NULL,
  `MODIFYED_AT` datetime DEFAULT NULL,
  `MODIFYED_BY` int(10) DEFAULT NULL,
  `IS_VERIFIED` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=VERIFIED, 0= NOT ',
  `IS_ACTIVE` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=ACTIVE,0=INACTIVE',
  `F_VERIFIED_BY` int(10) DEFAULT NULL,
  `VERIFIED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PRD_REQUIREMENTS`
--

INSERT INTO `PRD_REQUIREMENTS` (`PK_NO`, `F_CITY_NO`, `F_AREAS`, `CITY_NAME`, `AREA_NAMES`, `PROPERTY_FOR`, `F_PROPERTY_TYPE_NO`, `PROPERTY_TYPE`, `MIN_SIZE`, `MAX_SIZE`, `MIN_BUDGET`, `MAX_BUDGET`, `BEDROOM`, `PROPERTY_CONDITION`, `REQUIREMENT_DETAILS`, `PREP_CONT_TIME`, `EMAIL_ALERT`, `CREATED_AT`, `CREATED_BY`, `MODIFYED_AT`, `MODIFYED_BY`, `IS_VERIFIED`, `IS_ACTIVE`, `F_VERIFIED_BY`, `VERIFIED_AT`) VALUES
(1, 1, '1', NULL, NULL, 'buy', 1, NULL, 10, 100, 100000, 100000, '[\"1bed\",\"2bed\"]', '[\"ready\",\"semi\"]', 'test', '22:39:00', 'weekly', '2021-05-24 16:11:09', 14, '2021-05-24 16:11:09', 14, 0, 1, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_USER`
--

INSERT INTO `SA_USER` (`PK_NO`, `CODE`, `USERNAME`, `FIRST_NAME`, `LAST_NAME`, `DESIGNATION`, `EMAIL`, `MOBILE_NO`, `PASSWORD`, `GENDER`, `DOB`, `FACEBOOK_ID`, `GOOGLE_ID`, `PROFILE_PIC`, `PROFILE_PIC_URL`, `PIC_MIME_TYPE`, `ACTIVATION_CODE`, `ACTIVATION_CODE_EXPIRE`, `IS_FIRST_LOGIN`, `USER_TYPE`, `CAN_LOGIN`, `REMEMBER_TOKEN`, `STATUS`, `F_AGENT_NO`, `F_PARENT_USER_ID`, `F_USER_GROUP_NO`, `USR_CUSTOM_PERMISSION`, `IS_SECONDARY_USER`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `IS_EMAIL_VERIFIED`, `IS_MOBILE_VERIFIED`, `EMAIL_VERIFY_CODE`, `EMAIL_VERIFY_EXPIRE`, `MOBILE_VERITY_CODE`, `MOBILE_VERIFY_EXPIRE`) VALUES
(1, NULL, 'Sharif', 'Super', 'Admin', 'Super', 'sharif@gmail.com', '01983798502', '$2y$10$aAANKQzyqfRinNTVZ1tlfesvIGYHWa4.Hg5IER24IiykshzpqhZeC', 1, NULL, NULL, NULL, 'profile_22032021_1616364686.jpeg', 'https://admin.azuramart.com/media/images/profile/profile_22032021_1616364686.jpeg', NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, NULL, '2021-03-22 06:11:40', 0, 0, NULL, NULL, NULL, NULL),
(2, NULL, 'admin', 'Admin', 'General', 'General Admin', 'admin@admin.com', '01716824758', '$2y$10$aAANKQzyqfRinNTVZ1tlfesvIGYHWa4.Hg5IER24IiykshzpqhZeC', 1, NULL, NULL, NULL, 'profile_04102020_1601816795.jpg', 'http://www.boilerplate-admin.local/media/images/profile/profile_04102020_1601816795.jpg', NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, '2020-10-05 05:06:35', '2021-02-11 13:21:03', 0, 0, NULL, NULL, NULL, NULL),
(16, NULL, 'Sales', 'Sale', 'Manager', 'Sales', 'sales@gmail.com', '01716824760', '$2y$10$pgUbaikD7i6KRxghQ6DQH.GrgzvY26BC7nC00tVTHz5rcWxt/i242', 0, NULL, NULL, NULL, 'profile_10102020_1602327568.jpg', 'http://www.boilerplate-admin.local/media/images/profile/profile_10102020_1602327568.jpg', NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, '2020-10-11 02:59:28', '2021-02-11 13:24:47', 0, 0, NULL, NULL, NULL, NULL),
(17, NULL, 'Farah', 'Farah', 'Akhter', 'Manager', 'farah@gmail.com', '01700000002', '$2y$10$Ti8XSgLUDGZep0x5dP6dNuv8WPaq03d3XSYIJ09WGlmEvnVIXfGeO', 0, NULL, NULL, NULL, 'computer-icons-user-profile-clip-art.png', NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, NULL, '2021-02-11 13:32:06', 0, 0, NULL, NULL, NULL, NULL),
(18, NULL, 'uk.logistic', 'uk.logistic', 'UK', 'User', 'uk.logistics1@gmail.com', '01711111111', '$2y$10$pgUbaikD7i6KRxghQ6DQH.GrgzvY26BC7nC00tVTHz5rcWxt/i242', 1, NULL, NULL, NULL, 'computer-icons-user-profile-clip-art.png', NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, NULL, '2021-02-07 12:29:08', 0, 0, NULL, NULL, NULL, NULL),
(19, NULL, 'my.logistic', 'my.logistic', 'MY', 'User', 'my.logistics1@gmail.com', '01711111112', '$2y$10$pgUbaikD7i6KRxghQ6DQH.GrgzvY26BC7nC00tVTHz5rcWxt/i242', 1, NULL, NULL, NULL, 'computer-icons-user-profile-clip-art.png', NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, NULL, '2021-02-07 12:29:13', 0, 0, NULL, NULL, NULL, NULL),
(47, NULL, 's.sifat', 'sifats', 'rahman', 'logistic', 'sifat@gmail.com', '01716825214', '$2y$10$SbohKOR1hjx2oJ0XwkLEYO/0/EJaZsoD3HVhzuKIuXHEiycPuwm3O', 0, NULL, NULL, NULL, 'computer-icons-user-profile-clip-art.png', 'http://192.168.203.247/media/images/profile/profile_17122020_1608182835.jpg', NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, '2020-12-16 05:11:20', '2020-12-18 05:08:35', 0, 0, NULL, NULL, NULL, NULL),
(49, NULL, 'Azura.Admin', 'Azura', 'Azmi', 'logistic', 'az@dalalprime.com', '017012345789', '$2y$10$exWPF8Pj8RrM1r1.sTAKMezAGFOGWMWPlPB8UMuMSrMNNEdJy8FBm', 0, NULL, NULL, NULL, 'computer-icons-user-profile-clip-art.png', NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, '2020-12-21 10:18:30', '2021-02-11 13:23:13', 0, 0, NULL, NULL, NULL, NULL),
(54, NULL, 'Ezar', 'Ezar', 'Ezar', 'logistic', 'ezar@dalalprime.com', '01700000000', '$2y$10$S/wVBRMMUvNKx80QAr5j/.129PZLx6bW6mMOSkYsjyMuktGAWVp92', 1, NULL, NULL, NULL, 'computer-icons-user-profile-clip-art.png', NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, '2021-02-01 14:31:50', '2021-02-01 14:31:50', 0, 0, NULL, NULL, NULL, NULL),
(55, NULL, 'Aysha', 'Aysha', 'Aysha', 'logistic', 'aysha@dalalprime.com', '01700000001', '$2y$10$pgUbaikD7i6KRxghQ6DQH.GrgzvY26BC7nC00tVTHz5rcWxt/i242', 0, NULL, NULL, NULL, 'computer-icons-user-profile-clip-art.png', NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, '2021-02-01 14:34:58', '2021-02-01 14:34:58', 0, 0, NULL, NULL, NULL, NULL),
(57, NULL, 'HUDA', 'HUDA', 'huda', 'Agent', 'huda@dalalprime.com', '01700000058', '$2y$10$oTmiqZx.oeP.qyAfNcLvceh4q.VOBzhOaQfZVOLiEl8xnU.jUiHAu', 1, NULL, NULL, NULL, 'computer-icons-user-profile-clip-art.png', 'http://192.168.203.21/ukshop_beta/public/media/images/profile/computer-icons-user-profile-clip-art.jpg', NULL, NULL, NULL, 1, 0, 1, NULL, 1, 8, 0, 0, NULL, 0, 0, 0, '2021-02-05 12:08:20', '2021-02-07 12:53:18', 0, 0, NULL, NULL, NULL, NULL),
(59, NULL, 'AZURA', 'AZURA', NULL, NULL, 'azura@dalalprime.com', '1234567789', '$2y$10$z1SALWuHMkUarWA40IX6duR/mM6od7XJAbwaumacaQEGhQSZ6GZrW', 1, NULL, NULL, NULL, 'computer-icons-user-profile-clip-art.png', 'http://192.168.203.21/ukshop_beta/public/media/images/profile/computer-icons-user-profile-clip-art.jpg', NULL, NULL, NULL, 1, 0, 1, NULL, 1, 7, 0, 0, NULL, 0, 0, 0, '2021-02-05 12:14:23', '2021-02-07 12:29:31', 0, 0, NULL, NULL, NULL, NULL),
(60, NULL, 'Mira', 'Mira', NULL, 'Agent', 'mira@dalalprime.com', '1123456789', '$2y$10$ToScHSJWMUKNssP4lfmnUOMYgt1WeHe2vbsq8BlSSeVUpLfXhoihm', 1, NULL, NULL, NULL, 'computer-icons-user-profile-clip-art.png', 'http://192.168.203.21/ukshop_beta/public/media/images/profile/computer-icons-user-profile-clip-art.jpg', NULL, NULL, NULL, 1, 0, 1, NULL, 1, 9, 0, 0, NULL, 0, 0, 0, '2021-02-05 12:15:40', '2021-02-07 12:30:20', 0, 0, NULL, NULL, NULL, NULL),
(61, NULL, 'Syarifah', 'Syarifah', 'Syarifah', 'Agent', 'syarifah@dalalprime.com', '01716825219', '$2y$10$j26OHMh42k5d43TqroD4C..VBe4hSyVm..25QOlZqOqXuypcQ.iq2', 1, NULL, NULL, NULL, 'computer-icons-user-profile-clip-art.png', 'http://192.168.203.21/ukshop_beta/public/media/images/profile/computer-icons-user-profile-clip-art.jpg', NULL, NULL, NULL, 1, 0, 1, NULL, 1, 10, 0, 0, NULL, 0, 0, 0, '2021-02-05 12:17:31', '2021-02-08 09:06:46', 0, 0, NULL, NULL, NULL, NULL),
(62, NULL, 'Angela', 'Angela', 'Angela', 'User', 'angela@dalalprime.com', '01700000023', '$2y$10$LKiN6mEgmwHi5iFbXT0hjueahttlm9365m8Ljh6mnQGZ39Mc/KPXq', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, '2021-02-08 09:06:31', '2021-03-18 00:37:25', 0, 0, NULL, NULL, NULL, NULL),
(63, NULL, 'farah cod', 'Huda', 'COD', 'App User', 'farahcod@dalalprime.com', '01700000052', '$2y$10$nz2HuTn/qMVgQJCuTreShenSs3GuVYjYXMOGhnCkUOtSmKX.Blr2m', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 17, 0, NULL, 1, 0, 0, '2021-03-02 01:40:40', '2021-03-02 01:48:02', 0, 0, NULL, NULL, NULL, NULL),
(64, NULL, 'huda cod', 'Farah', 'COD', 'App User', 'hudacod@dalalprime.com', '01700000012', '$2y$10$Pv6TiBbkj.Swak4uALxDset/urJSbQWxN2vb9YTFu6e0k/mvZXpsC', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 57, 0, NULL, 1, 0, 0, '2021-03-02 01:41:30', '2021-03-02 01:48:12', 0, 0, NULL, NULL, NULL, NULL),
(65, NULL, 'mama cod', 'Mama', 'COD', 'App User', 'mamacod@dalalprime.com', '01711111498', '$2y$10$wegC3lw3hredPxKxXgsYte6eZIQftSLDnbJm7Q2HM9e/W1FPh2N.q', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 66, 0, NULL, 1, 0, 0, '2021-03-02 01:49:31', '2021-03-02 01:49:31', 0, 0, NULL, NULL, NULL, NULL),
(66, NULL, 'mama', 'Mama', 'Azuramart', 'Agent', 'mama@dalalprime.com', '01716825256', '$2y$10$gfqlFaKK4c50QjcEAyJf0.9nloDzBbRO8qii2zIH7efEGjn/mEZg.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, '2021-03-04 22:01:07', '2021-03-04 22:01:07', 0, 0, NULL, NULL, NULL, NULL),
(67, NULL, 'loi', 'Loi', 'Azuramart', 'logistic', 'loi@dalalprime.com', '01716826333', '$2y$10$1VUDsAqCfoysxuZwdn3k9OXJI.FABvfYkRbXLwDUBP/.DqW3/dzCO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, '2021-03-09 23:36:32', '2021-03-09 23:36:32', 0, 0, NULL, NULL, NULL, NULL),
(68, NULL, 'sharif.uk@azuramart.com', 'Sharif', 'Rahman', 'UKSHOP', 'sharif.uk@dalalprime.com', '07983798502', '$2y$10$g7w1npbEcQyiyhufRk96p.DmCeovUeeOaXNRfDXLE/ZWLJnecUUNq', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, 1, 0, 0, 0, NULL, 0, 0, 0, '2021-03-19 01:00:59', '2021-03-19 01:00:59', 0, 0, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_USER_GROUP`
--

INSERT INTO `SA_USER_GROUP` (`PK_NO`, `CODE`, `GROUP_NAME`, `STATUS`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, NULL, 'Super User', 1, 0, 0, NULL, '2020-10-10 17:45:46', NULL),
(3, NULL, 'General Admin Group', 1, 0, 0, '2020-10-10 17:33:26', '2020-10-10 17:45:57', NULL),
(4, NULL, 'Sales Manger Group', 1, 0, 0, '2020-10-10 17:34:06', '2020-10-10 17:46:01', NULL),
(5, NULL, 'User', 1, 0, 0, NULL, '2021-03-17 00:58:40', NULL),
(6, NULL, 'App User', 1, 0, 0, '2020-12-16 05:22:14', '2020-12-16 05:22:14', NULL),
(7, NULL, 'Sales Agent', 1, 0, 0, '2021-02-05 12:07:36', '2021-02-10 03:44:33', NULL),
(8, NULL, 'Purchase Manager', 1, 0, 0, '2021-02-08 10:38:53', '2021-02-08 10:38:53', NULL),
(9, NULL, 'Logistic User', 1, 0, 0, '2021-02-16 03:03:03', '2021-02-16 03:03:03', NULL),
(10, NULL, 'COD Dispatcher', 1, 0, 0, '2021-03-02 01:40:07', '2021-03-02 01:40:07', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_USER_GROUP_ROLE`
--

INSERT INTO `SA_USER_GROUP_ROLE` (`PK_NO`, `CODE`, `F_USER_GROUP_NO`, `F_ROLE_NO`, `GRP_CUSTOM_PERMISSION`, `STATUS`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(11, NULL, 1, 1, NULL, 1, 0, 0, NULL, '2020-10-10 17:45:46', NULL),
(12, NULL, 3, 8, NULL, 1, 0, 0, '2020-10-10 17:33:26', '2020-10-10 17:45:57', NULL),
(13, NULL, 4, 12, NULL, 1, 0, 0, '2020-10-10 17:34:06', '2020-10-10 17:46:01', NULL),
(14, NULL, 5, 19, NULL, 1, 0, 0, NULL, '2021-03-17 00:58:40', NULL),
(15, NULL, 6, 16, NULL, 1, 0, 0, '2020-12-16 05:22:14', '2020-12-16 05:22:14', NULL),
(16, NULL, 7, 17, NULL, 1, 0, 0, '2021-02-05 12:07:36', '2021-02-10 03:44:33', NULL),
(17, NULL, 8, 19, NULL, 1, 0, 0, '2021-02-08 10:38:53', '2021-02-08 10:38:53', NULL),
(18, NULL, 9, 20, NULL, 1, 0, 0, '2021-02-16 03:03:03', '2021-02-16 03:03:03', NULL),
(19, NULL, 10, 21, NULL, 1, 0, 0, '2021-03-02 01:40:07', '2021-03-02 01:40:07', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SA_USER_GROUP_USERS`
--

INSERT INTO `SA_USER_GROUP_USERS` (`PK_NO`, `CODE`, `F_GROUP_NO`, `F_USER_NO`, `STATUS`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(22, NULL, 1, 2, 1, 0, 0, '2020-10-04 22:06:35', '2020-10-10 19:31:06', NULL),
(23, NULL, 4, 16, 1, 0, 0, '2020-10-10 19:59:28', '2021-02-11 13:22:10', NULL),
(24, NULL, 1, 1, 1, 0, 0, NULL, NULL, NULL),
(25, NULL, 4, 17, 1, 0, 0, '2020-10-04 22:06:35', '2020-10-10 19:31:06', NULL),
(26, NULL, 9, 18, 1, 0, 0, '2020-10-04 22:06:35', '2021-02-16 03:03:19', NULL),
(27, NULL, 9, 19, 1, 0, 0, '2020-10-04 22:06:35', '2021-02-16 03:04:13', NULL),
(28, NULL, 5, 44, 1, 0, 0, '2020-12-16 03:45:49', '2020-12-16 03:46:29', NULL),
(29, NULL, 1, 47, 1, 0, 0, '2020-12-16 05:11:20', '2020-12-18 05:01:41', NULL),
(30, NULL, 1, 49, 1, 0, 0, '2020-12-21 10:18:30', '2020-12-21 10:18:30', NULL),
(31, NULL, 9, 54, 1, 0, 0, '2021-02-01 14:31:50', '2021-02-16 10:47:40', NULL),
(32, NULL, 9, 55, 1, 0, 0, '2021-02-01 14:34:58', '2021-02-16 10:47:43', NULL),
(33, NULL, 7, 57, 1, 0, 0, '2021-02-05 12:08:20', '2021-02-05 12:08:20', NULL),
(34, NULL, 7, 59, 1, 0, 0, '2021-02-05 12:14:23', '2021-02-05 12:14:23', NULL),
(35, NULL, 7, 60, 1, 0, 0, '2021-02-05 12:15:40', '2021-02-05 12:15:40', NULL),
(36, NULL, 7, 61, 1, 0, 0, '2021-02-05 12:17:31', '2021-02-05 12:17:31', NULL),
(37, NULL, 8, 62, 1, 0, 0, '2021-02-08 09:06:31', '2021-02-08 10:39:01', NULL),
(38, NULL, 10, 63, 1, 0, 0, '2021-03-02 01:40:40', '2021-03-02 01:40:40', NULL),
(39, NULL, 10, 64, 1, 0, 0, '2021-03-02 01:41:30', '2021-03-02 01:41:30', NULL),
(40, NULL, 10, 65, 1, 0, 0, '2021-03-02 01:49:31', '2021-03-02 01:49:31', NULL),
(41, NULL, 7, 66, 1, 0, 0, '2021-03-04 22:01:07', '2021-03-04 22:01:07', NULL),
(42, NULL, 9, 67, 1, 0, 0, '2021-03-09 23:36:32', '2021-03-09 23:36:32', NULL),
(43, NULL, 8, 68, 1, 0, 0, '2021-03-19 01:00:59', '2021-03-19 01:00:59', NULL);

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
  `IS_ACTIVE` int(1) DEFAULT NULL,
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
  `URL_SLUG` varchar(50) COLLATE utf8_estonian_ci DEFAULT NULL,
  `F_CITY_NO` int(10) DEFAULT NULL,
  `CITY_NAME` varchar(50) COLLATE utf8_estonian_ci DEFAULT NULL,
  `IS_ACTIVE` int(1) DEFAULT '1',
  `ORDER_ID` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`PK_NO`),
  KEY `FK_SS_AREA_CITY` (`F_CITY_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `SS_AREA`
--

INSERT INTO `SS_AREA` (`PK_NO`, `AREA_NAME`, `URL_SLUG`, `F_CITY_NO`, `CITY_NAME`, `IS_ACTIVE`, `ORDER_ID`) VALUES
(1, 'Mirpur', 'mirpur', 1, 'Dhaka', 1, 1),
(2, 'Banani', 'banani', 1, 'Dhaka', 1, 2),
(3, 'Mohakhali', 'mohakhali', 1, 'Dhaka', 1, 3),
(4, 'GOC', 'goc', 2, 'Chittagong', 1, 1),
(5, 'Mogbazar', 'mogbazar', 1, 'Dhaka', 1, 4),
(6, 'Mohammadpur', 'mohammadpur', 1, 'Dhaka', 1, 5);

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
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `SS_CITY`
--

INSERT INTO `SS_CITY` (`PK_NO`, `CITY_NAME`, `URL_SLUG`, `F_COUNTRY_NO`, `IS_ACTIVE`, `ORDER_ID`) VALUES
(1, 'Dhaka', 'dhaka', 1, 1, 1),
(2, 'Chittagong', 'chittagong', 1, 1, 2);

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
  `USER_TYPE` int(1) NOT NULL DEFAULT '1' COMMENT '1=seeker,2=owner,3=builder,4=agency',
  `CAN_LOGIN` int(11) NOT NULL DEFAULT '1',
  `REMEMBER_TOKEN` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
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
  `UNUSED_TOPUP` float NOT NULL DEFAULT '0' COMMENT 'ONLY UNUSED',
  `BONUS_TOPUP` float NOT NULL DEFAULT '0' COMMENT 'BY BDFLAT',
  PRIMARY KEY (`PK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `WEB_USER`
--

INSERT INTO `WEB_USER` (`PK_NO`, `CODE`, `NAME`, `DESIGNATION`, `EMAIL`, `MOBILE_NO`, `PASSWORD`, `GENDER`, `DOB`, `FACEBOOK_ID`, `GOOGLE_ID`, `PROFILE_PIC`, `PROFILE_PIC_URL`, `ACTIVATION_CODE`, `ACTIVATION_CODE_EXPIRE`, `IS_FIRST_LOGIN`, `USER_TYPE`, `CAN_LOGIN`, `REMEMBER_TOKEN`, `STATUS`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`, `IS_EMAIL_VERIFIED`, `IS_MOBILE_VERIFIED`, `EMAIL_VERIFY_CODE`, `EMAIL_VERIFY_EXPIRE`, `MOBILE_VERITY_CODE`, `MOBILE_VERIFY_EXPIRE`, `CONTACT_PER_NAME`, `ADDRESS`, `ACTUAL_TOPUP`, `PENDING_TOPUP`, `UNUSED_TOPUP`, `BONUS_TOPUP`) VALUES
(13, 1000, 'maidul', NULL, 'owner@gmail.com', '123456', '$2y$10$YAKwYROomLtmzVzTnihjiev7ryYkwPOimv/9w/Kdf9YVySqbMfWKu', 1, NULL, NULL, NULL, '60b13784f3288.jpg', '/uploads/user/13/60b13784f3288.jpg', NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-04-11 20:33:09', '2021-05-28 18:33:40', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(14, 1001, 'Maidul Islam Babu', NULL, 'seeker@gmail.com', '01681944126', '$2y$10$WAp/98uhcPn2e06RQCf3KuCX9wFSwds/Oz/yJklaiStsYB5R882b.', 1, NULL, NULL, NULL, '60b11641916e1.jpg', '/uploads/user/14/60b11641916e1.jpg', NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-04-14 10:00:54', '2021-05-28 16:16:40', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1000, 1000),
(15, 1002, 'Maidul Islam Babu', NULL, 'developer@gmail.com', '01681944127', '$2y$10$WAp/98uhcPn2e06RQCf3KuCX9wFSwds/Oz/yJklaiStsYB5R882b.', 1, NULL, NULL, NULL, '60b11641916e1.jpg', '/uploads/user/14/60b11641916e1.jpg', NULL, NULL, 1, 3, 1, NULL, 1, 0, 0, '2021-04-14 10:00:54', '2021-05-28 16:16:40', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1000, 1000);

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
