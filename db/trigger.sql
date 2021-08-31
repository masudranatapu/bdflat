
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




DROP TRIGGER IF EXISTS `AFTERT_ACC_CUSTOMER_TRANSACTION_INSERT`;
DELIMITER $$
CREATE TRIGGER `AFTERT_ACC_CUSTOMER_TRANSACTION_INSERT` AFTER INSERT ON `ACC_CUSTOMER_TRANSACTION` FOR EACH ROW BEGIN

DECLARE VAR_AMOUNT FLOAT DEFAULT 0;

SELECT IFNULL(SUM(AMOUNT),0) INTO VAR_AMOUNT FROM ACC_CUSTOMER_TRANSACTION WHERE F_CUSTOMER_NO = NEW.F_CUSTOMER_NO;

UPDATE WEB_USER SET UNUSED_TOPUP = VAR_AMOUNT WHERE PK_NO = NEW.F_CUSTOMER_NO;

END
$$
DELIMITER ;




DROP TRIGGER IF EXISTS BEFORE_PRD_LISTINGS_INSERT;
DELIMITER $$
CREATE TRIGGER BEFORE_PRD_LISTINGS_INSERT BEFORE INSERT ON `PRD_LISTINGS` FOR EACH ROW BEGIN

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

SET NEW.CODE = VAR_CODE+1;

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



DROP TRIGGER IF EXISTS BEFORE_PRD_LISTING_ADDITIONAL_INFO_INSERT;
DELIMITER $$
CREATE TRIGGER BEFORE_PRD_LISTING_ADDITIONAL_INFO_INSERT BEFORE INSERT ON PRD_LISTING_ADDITIONAL_INFO FOR EACH ROW BEGIN
DECLARE VAR_FACING VARCHAR(50) DEFAULT NULL;

SELECT TITLE INTO VAR_FACING FROM PRD_PROPERTY_FACING WHERE PK_NO = NEW.F_FACING_NO;

SET NEW.FACING = VAR_FACING;

END
$$
DELIMITER ;


DROP TRIGGER IF EXISTS BEFORE_PRD_LISTING_ADDITIONAL_INFO_UPDATE;
DELIMITER $$
CREATE TRIGGER BEFORE_PRD_LISTING_ADDITIONAL_INFO_UPDATE BEFORE UPDATE ON PRD_LISTING_ADDITIONAL_INFO FOR EACH ROW BEGIN
DECLARE VAR_FACING VARCHAR(50) DEFAULT NULL;

SELECT TITLE INTO VAR_FACING FROM PRD_PROPERTY_FACING WHERE PK_NO = NEW.F_FACING_NO;

SET NEW.FACING = VAR_FACING;

END
$$
DELIMITER ;

