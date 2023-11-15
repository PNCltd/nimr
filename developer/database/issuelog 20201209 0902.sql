-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.14-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema log_tracker
--

CREATE DATABASE IF NOT EXISTS log_tracker;
USE log_tracker;

--
-- Definition of table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `dept_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dept` varchar(45) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`dept_id`,`dept`,`date_added`,`time`) VALUES 
 (1,'Finance Management','2020-11-18 18:28:29','1606385059'),
 (5,'Electrical','2020-11-19 17:24:34','1606305059'),
 (45,'Security','2020-11-27 14:34:28','1606484068'),
 (46,'Health','2020-11-27 14:47:46','1606484866');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;


--
-- Definition of table `issue_alg`
--

DROP TABLE IF EXISTS `issue_alg`;
CREATE TABLE `issue_alg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastno` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_alg`
--

/*!40000 ALTER TABLE `issue_alg` DISABLE KEYS */;
INSERT INTO `issue_alg` (`id`,`lastno`) VALUES 
 (1,'26');
/*!40000 ALTER TABLE `issue_alg` ENABLE KEYS */;


--
-- Definition of table `issue_log`
--

DROP TABLE IF EXISTS `issue_log`;
CREATE TABLE `issue_log` (
  `id` varchar(20) NOT NULL,
  `staff_id` varchar(45) NOT NULL,
  `requester_name` varchar(45) DEFAULT NULL,
  `issue_type` varchar(45) DEFAULT NULL,
  `issue_detail` varchar(1000) DEFAULT NULL,
  `date_reported` timestamp NOT NULL DEFAULT current_timestamp(),
  `IT_staff_ass` varchar(45) DEFAULT 'Not Assigned',
  `reassigned` varchar(45) DEFAULT 'No',
  `reassigned_IT_staff` varchar(45) DEFAULT NULL,
  `date_assigned` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT 'Open',
  `date_closed` datetime DEFAULT NULL,
  `closed_by` varchar(45) DEFAULT NULL,
  `resolution` varchar(500) DEFAULT 'Not Yet Resolved',
  `date_reassigned` datetime DEFAULT NULL,
  `date_attended` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_log`
--

/*!40000 ALTER TABLE `issue_log` DISABLE KEYS */;
INSERT INTO `issue_log` (`id`,`staff_id`,`requester_name`,`issue_type`,`issue_detail`,`date_reported`,`IT_staff_ass`,`reassigned`,`reassigned_IT_staff`,`date_assigned`,`status`,`date_closed`,`closed_by`,`resolution`,`date_reassigned`,`date_attended`) VALUES 
 ('ISR10','Ch1','Me You Us','Request','j<b>mnrj</b>mnfr jurjmr jrjifr							','2020-11-23 21:52:58','Ch756','Yes','ch13','2020-12-04 10:09:46','Closed','2020-12-04 10:09:46','Me You Us','Problem solved','2020-12-04 11:45:25',NULL),
 ('ISR11','Ch1','Me You Us','Request','							rdsrt <sup>frdr </sup>dfr dsertrgv vcf <br>','2020-11-11 21:54:41','Ch1','No',NULL,'2020-12-04 10:15:54','Closed','2020-12-04 10:15:54','Me You Us','Issue/Request considered closed without resolution',NULL,'2020-12-02 13:25:30'),
 ('ISR13','Ch1','Me You Us','Issue','							vhnfg','2020-11-25 14:51:48','Ch1','No',NULL,'2020-12-04 10:15:38','Closed','2020-12-04 10:15:38','Me You Us','Not Yet Resolved',NULL,NULL),
 ('ISS14','CH12','John Ben Ochai','Issue','I ve got it<br>','2020-11-28 09:44:25','CH02','No',NULL,'2020-12-04 10:13:54','Open','2020-12-04 10:13:54',NULL,'Not Yet Resolved',NULL,NULL),
 ('ISS17','CH12','John Ben Ochai','Issue','							Any issue/request?<br>','2020-11-28 10:02:12','Ch756','No',NULL,'2020-12-04 10:16:30','Open','2020-12-04 10:16:30',NULL,'I am done with this Job',NULL,'2020-12-02 13:24:28'),
 ('ISS24','Ch756','New NewMiddle NewLast','Issue','							Try something<br>','2020-12-01 10:36:10','ch13','No',NULL,'2020-12-04 10:16:50','Closed','2020-12-04 10:16:50','New NewMiddle NewLast','Issue/Request considered closed without resolution',NULL,NULL),
 ('REQ12','Ch1','Me You Us','Request','							hk,hj&nbsp; zuif xcusx xsz jc df<br>','2020-11-25 14:51:09','Ch7','No',NULL,'2020-12-04 10:13:23','Open','2020-12-04 10:13:23',NULL,'Not Yet Resolved',NULL,NULL),
 ('REQ16','Ch1','Me You Us','Request','							Still checking how it works<br>','2020-11-28 10:00:18','ch13','No',NULL,'2020-12-04 10:15:05','Open','2020-12-04 10:15:05',NULL,'Not Yet Resolved',NULL,NULL),
 ('REQ18','Ch01','Trying something New','Request','							ft','2020-11-28 10:04:20','CH02','No',NULL,'2020-12-04 10:12:43','Closed','2020-12-04 10:12:43','Trying something New','Not Yet Resolved',NULL,NULL),
 ('REQ23','CH12','John Ben Ochai','Request','							I am waiting to be vetted <br>','2020-11-30 10:58:40','CH02','No','Ch756','2020-12-04 10:12:07','Open','2020-12-04 10:12:07',NULL,'Not Yet Resolved',NULL,NULL),
 ('REQ25','Ch01','Trying something New','Request','							xfz xc<br>','2020-12-01 15:51:08','','No',NULL,'2020-12-05 13:21:43','Open','2020-12-05 13:21:43',NULL,'Not Yet Resolved',NULL,NULL),
 ('REQ26','Ch756','New NewMiddle NewLast','Request','							I am at the office<br>','2020-12-02 10:36:55','Not Assigned','No',NULL,NULL,'Open',NULL,NULL,'Not Yet Resolved',NULL,NULL);
/*!40000 ALTER TABLE `issue_log` ENABLE KEYS */;


--
-- Definition of table `issue_type`
--

DROP TABLE IF EXISTS `issue_type`;
CREATE TABLE `issue_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `issue_type` varchar(45) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_type`
--

/*!40000 ALTER TABLE `issue_type` DISABLE KEYS */;
INSERT INTO `issue_type` (`id`,`issue_type`,`date_added`) VALUES 
 (1,'Issue','2020-11-20 08:40:24'),
 (2,'Request','2020-11-20 08:40:24');
/*!40000 ALTER TABLE `issue_type` ENABLE KEYS */;


--
-- Definition of table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `loc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(45) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `time` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`loc_id`,`location`,`date_added`,`time`) VALUES 
 (14,'Benin','2020-11-26 11:04:29','1606385059'),
 (16,'Lagos','2020-11-30 09:58:16','1606726690'),
 (17,'Nnewi','2020-11-30 13:34:44','1606739671');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2= users',
  `avatar` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `staff_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`firstname`,`lastname`,`middlename`,`contact`,`address`,`email`,`password`,`type`,`avatar`,`date_created`,`staff_id`) VALUES 
 (1,'Admin','Admin','','+12354654787','Sample','admin@admin.com','0192023a7bbd73250516f069df18b500',1,'','2020-11-11 15:35:19','CH12'),
 (2,'John','Smith','C','+14526-5455-44','Address','jsmith@sample.com','1254737c076cf867dc53d60a0364f38e',2,'1605080820_avatar.jpg','2020-11-11 09:24:40',NULL),
 (3,'John','Ochai','Ben','07039239230','Investment House, Marina','ochaijohnben@gmail.com','035c38b95750ab68cc7544f3f821e7f1',2,'1605257460_1.jpg','2020-11-13 09:51:18',NULL),
 (4,'Miracle','Ochai','Oge','12863347865','Lagos','miracle@miracle.com','d122d8ccb48c21175376e9dd9627bfe4',2,'1605700860_2019-03-05-22-32-08-875.jpg','2020-11-18 13:01:46',NULL),
 (6,'John','Ochai','Ben','232785654','Lagos','admin@pn.com','21232f297a57a5a743894a0e4a801fc3',1,'1605704700_2019-03-05-22-32-08-875.jpg','2020-11-18 14:05:15',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of table `users2`
--

DROP TABLE IF EXISTS `users2`;
CREATE TABLE `users2` (
  `staff_id` varchar(25) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `othername` varchar(45) DEFAULT NULL,
  `phoneno` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `dept` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `type` decimal(10,0) DEFAULT NULL COMMENT '1=Admin,2=users',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `avatar` text DEFAULT NULL,
  `manager` varchar(45) NOT NULL DEFAULT 'No',
  `my_manager` varchar(255) NOT NULL DEFAULT 'No Assigned',
  PRIMARY KEY (`id`,`staff_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users2`
--

/*!40000 ALTER TABLE `users2` DISABLE KEYS */;
INSERT INTO `users2` (`staff_id`,`surname`,`firstname`,`othername`,`phoneno`,`email`,`password`,`dept`,`location`,`date_added`,`type`,`id`,`avatar`,`manager`,`my_manager`) VALUES 
 ('CH12','Ochai','John','Ben','07039239230','admin@admin.com','21232f297a57a5a743894a0e4a801fc3','IT','Lagos','2020-11-19 16:34:39','1',1,'1605797640_2019-03-05-22-32-08-875.jpg','No','No Assigned'),
 ('ch13','Oge','Miracle','Mimi','0908799','pn@pn.com','9cf2e79086f401ce975ef2194cb91d58','4','Nnewi','2020-11-19 16:34:39','3',2,'1605797640_2019-03-05-22-32-08-875.jpg','No','No Assigned'),
 ('Ch1','Us','Me','You','2587446525','nanro@nanro.com','9cf2e79086f401ce975ef2194cb91d58','Management','Kaduna','2020-11-19 16:34:39','3',3,'1605800040_lennon.jpg','Yes','No Assigned'),
 ('CH02','Mike','Peter','Paul','2587446525','peter@peter.com','9cf2e79086f401ce975ef2194cb91d58','Security','Port Harcourt','2020-11-20 08:07:03','3',4,'1605856020_INEC Approved Pass 2.jpg','No','Ch756'),
 ('Ch01','New','Trying','something','2144544','user@user.com','ee11cbb19052e40b07aac0ca060c23ee','Finance Management','Lagos','2020-11-26 10:22:25','2',7,'1606382520_IMG_20190602_113412.jpg','No','No Assigned'),
 ('CH3','Justin','nathan','Oche','21554412','user2@user2.com','ee11cbb19052e40b07aac0ca060c23ee','Electrical','Benin','2020-11-27 18:36:28','2',8,'1606498560_1492873555671.jpg','No','No Assigned'),
 ('Ch7','Harvertz','Kai','Kai','3255665','kai@kai.com','e79fb748c3c8ab532a8fcf2da53ae54d','Health','Benin','2020-11-28 09:16:16','3',9,'1606551360_IMG_20190602_115213.jpg','No','No Assigned'),
 ('Chj21','Oche','Nathan','Justin','411562254','us@us.com','0b3b97fa66886c5688ee4ae80ec0c3c2','Finance Management','Benin','2020-11-28 10:06:35','2',10,'1606554360_jb edited pp.jpg','No','No Assigned'),
 ('Ch756','NewLast','New','NewMiddle','125747545','new@new.com','22af645d1859cb5ca6da0c484f1f37ea','Electrical','Lagos','2020-11-30 10:57:27','3',11,'1606730220_IMG_20190623_091732_6.jpg','Yes','CH02');
/*!40000 ALTER TABLE `users2` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
