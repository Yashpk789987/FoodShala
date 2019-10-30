-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.33-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema foodorder
--

CREATE DATABASE IF NOT EXISTS unaux_24703572_foodshala;
USE unaux_24703572_foodshala;

--
-- Definition of table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `foodid` int(10) unsigned NOT NULL auto_increment,
  `rid` varchar(45) NOT NULL,
  `foodname` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY  (`foodid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` (`foodid`,`rid`,`foodname`,`price`,`type`) VALUES 
 (16,'9','Biryani','150','NONVEG'),
 (17,'9','Chana Masala','150','VEG'),
 (19,'7','Paneer masala','130','VEG'),
 (20,'7','Dal Fry','90','VEG'),
 (22,'10','Biryani','2000','NONVEG'),
 (23,'10','Paneer masala','1500','VEG'),
 (25,'11','Chana Masala','200','VEG'),
 (27,'11','Chicken (Roasted)','500','NONVEG');
/*!40000 ALTER TABLE `food` ENABLE KEYS */;


--
-- Definition of table `food_order`
--

DROP TABLE IF EXISTS `food_order`;
CREATE TABLE `food_order` (
  `_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` varchar(45) NOT NULL,
  `rid` varchar(45) NOT NULL,
  `total_price` varchar(45) NOT NULL,
  `food_ids` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `time` varchar(45) NOT NULL,
  PRIMARY KEY  (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_order`
--

/*!40000 ALTER TABLE `food_order` DISABLE KEYS */;
INSERT INTO `food_order` (`_id`,`user_id`,`rid`,`total_price`,`food_ids`,`date`,`time`) VALUES 
 (14,'16','7','220','(20,19)','',''),
 (15,'16','7','220','(20,19)','',''),
 (16,'16','7','220','(19,20)','',''),
 (17,'16','7','90','(20)','29-Oct-2019','11:18 am'),
 (18,'16','7','130','(19)','29-Oct-2019','04:50 pm'),
 (19,'16','7','220','(19,20)','29-Oct-2019','04:52 pm'),
 (20,'16','10','3500','(23,22)','29-Oct-2019','05:07 pm'),
 (21,'16','10','3500','(23,22)','29-Oct-2019','05:08 pm'),
 (22,'16','10','3500','(23,22)','29-Oct-2019','05:17 pm'),
 (23,'16','9','300','(16,17)','29-Oct-2019','05:32 pm'),
 (24,'16','9','300','(16,17)','29-Oct-2019','05:32 pm'),
 (25,'16','9','300','(16,17)','29-Oct-2019','05:35 pm'),
 (26,'16','9','300','(16,17)','29-Oct-2019','05:36 pm'),
 (27,'16','11','700','(25,27)','29-Oct-2019','06:32 pm');
/*!40000 ALTER TABLE `food_order` ENABLE KEYS */;


--
-- Definition of table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE `restaurants` (
  `rid` int(10) unsigned NOT NULL auto_increment,
  `rname` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY  (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

/*!40000 ALTER TABLE `restaurants` DISABLE KEYS */;
INSERT INTO `restaurants` (`rid`,`rname`,`address`,`phone`,`email`,`password`) VALUES 
 (7,'Natraj Hotel','gole ka mandir gwalior','09644046303','yashpk2128@gmail.com','12345'),
 (8,'Natraj Hotel','gole ka mandir gwalior','09644046303','yashpk2128@gmail.com','12345'),
 (9,'Ashoka Hotel','gole ka mandir gwalior','09644046303','shshagarwal05@gmail.com','123'),
 (10,'Taj Hotel','goregao','09644046303','saurab@gmail.com','12345'),
 (11,'madras hotel','gole ka mandir gwalior','09644046303','shshagarwal05@gmail.com','12345');
/*!40000 ALTER TABLE `restaurants` ENABLE KEYS */;


--
-- Definition of table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `_id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) default NULL,
  `mobile` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY  (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`_id`,`name`,`email`,`mobile`,`password`) VALUES 
 (16,'Pawan kushwah','saurabhrathorepk@gmail.com','09644046303','123');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
