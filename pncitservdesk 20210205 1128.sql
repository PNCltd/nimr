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
-- Definition of table `chart_data`
--

DROP TABLE IF EXISTS `chart_data`;
CREATE TABLE `chart_data` (
  `language` varchar(12) NOT NULL,
  `nos` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chart_data`
--

/*!40000 ALTER TABLE `chart_data` DISABLE KEYS */;
INSERT INTO `chart_data` (`language`,`nos`) VALUES 
 ('PHP',300),
 ('JavaScript',200),
 ('MySQL',100),
 ('JQuery',200),
 ('HTML',200),
 ('ASP',100);
/*!40000 ALTER TABLE `chart_data` ENABLE KEYS */;


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
 (1,'35');
/*!40000 ALTER TABLE `issue_alg` ENABLE KEYS */;


--
-- Definition of table `issue_category`
--

DROP TABLE IF EXISTS `issue_category`;
CREATE TABLE `issue_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `issue_catg` varchar(45) NOT NULL DEFAULT 'Unassigned',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_category`
--

/*!40000 ALTER TABLE `issue_category` DISABLE KEYS */;
INSERT INTO `issue_category` (`id`,`issue_catg`) VALUES 
 (1,'Network'),
 (2,'Hardware'),
 (3,'Operating System'),
 (4,'Email'),
 (5,'Application'),
 (6,'Others');
/*!40000 ALTER TABLE `issue_category` ENABLE KEYS */;


--
-- Definition of table `issue_log`
--

DROP TABLE IF EXISTS `issue_log`;
CREATE TABLE `issue_log` (
  `id` varchar(20) NOT NULL DEFAULT '',
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
  `issue_catg` varchar(45) NOT NULL DEFAULT 'Unassigned',
  `location` varchar(45) NOT NULL DEFAULT '',
  `escalate1` varchar(10) NOT NULL DEFAULT 'No',
  `escalate2` varchar(10) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_log`
--

/*!40000 ALTER TABLE `issue_log` DISABLE KEYS */;
INSERT INTO `issue_log` (`id`,`staff_id`,`requester_name`,`issue_type`,`issue_detail`,`date_reported`,`IT_staff_ass`,`reassigned`,`reassigned_IT_staff`,`date_assigned`,`status`,`date_closed`,`closed_by`,`resolution`,`date_reassigned`,`date_attended`,`issue_catg`,`location`,`escalate1`,`escalate2`) VALUES 
 ('ISR10','Ch1','Me You Us','Request','j<b>mnrj</b>mnfr jurjmr jrjifr							','2020-11-23 21:52:58','Ch756','Yes','ch13','2020-12-04 10:09:46','Closed','2020-12-04 10:09:46','Me You Us','Problem solved','2020-12-04 11:45:25',NULL,'Hardware','Nnewi','No','No'),
 ('ISR11','Ch1','Me You Us','Request','							rdsrt <sup>frdr </sup>dfr dsertrgv vcf <br>','2020-11-11 21:54:41','Ch1','No',NULL,'2020-12-04 10:15:54','Closed','2020-12-04 10:15:54','Me You Us','Issue/Request considered closed without resolution',NULL,'2020-12-02 13:25:30','Application','Nnewi','No','No'),
 ('ISR13','Ch1','Me You Us','Issue','							vhnfg','2020-11-25 14:51:48','CH02','No',NULL,'2020-12-21 09:32:41','Closed','2020-12-21 09:32:41','Me You Us','Not Yet Resolved',NULL,NULL,'Email','Benin','No','No'),
 ('ISS14','CH12','John Ben Ochai','Issue','I ve got it<br>','2020-11-28 09:44:25','CH02','No',NULL,'2020-12-04 10:13:54','Closed','2020-12-14 22:21:54','John Ben Ochai','Not Yet Resolved',NULL,NULL,'Operating System','Lagos','No','No'),
 ('ISS17','CH12','John Ben Ochai','Issue','							Any issue/request?<br>','2020-11-28 10:02:12','Ch7','No',NULL,'2020-12-26 13:44:52','Open','2020-12-26 13:44:52',NULL,'I am done with this Job',NULL,'2020-12-02 13:24:28','Application','Lagos','No','No'),
 ('ISS24','Ch756','New NewMiddle NewLast','Issue','							Try something<br>','2020-12-01 10:36:10','Ch7','No',NULL,'2020-12-21 09:35:24','Closed','2020-12-21 09:35:24','New NewMiddle NewLast','Issue/Request considered closed without resolution',NULL,NULL,'Network','Benin','No','No'),
 ('ISS27','CH12','John Ben Ochai','Issue','I am trying to include location.','2020-12-15 11:34:57','Ch7','No',NULL,'2020-12-21 13:35:44','Open','2020-12-21 13:35:44',NULL,'Not Yet Resolved',NULL,NULL,'Hardware','Lagos','No','No'),
 ('ISS28','CH12','John Ben Ochai','','I am trying to include location.							','2020-12-15 11:39:22','Ch7','No',NULL,'2020-12-21 14:11:59','Open','2020-12-21 14:11:59',NULL,'Not Yet Resolved',NULL,NULL,'Request','Benin','No','No'),
 ('ISS29','CH12','John Ben Ochai','Issue','I am trying to include location.							','2020-12-15 11:39:32','Ch7','Yes','CH02','2020-12-21 08:43:46','Open','2020-12-21 08:43:46',NULL,'Not Yet Resolved','2020-12-18 18:49:45',NULL,'Network','Lagos','No','No'),
 ('ISS30','CH12','John Ben Ochai','Issue','Sdfghghm','2020-12-15 11:41:05','Not Assigned','No',NULL,'2020-12-21 09:12:19','Open','2020-12-21 09:12:19',NULL,'Not Yet Resolved',NULL,NULL,'Hardware','Benin','No','No'),
 ('ISS31','CH12','John Ben Ochai','','I am trying something here anew1','2020-12-15 11:47:40','ch13','No',NULL,'2020-12-21 08:32:09','Open','2020-12-21 08:32:09',NULL,'Not Yet Resolved',NULL,NULL,'Request','Benin','Yes','Yes'),
 ('ISS32','CH12','John Ben Ochai','Issue','I am trying something here anew							','2020-12-15 11:51:59','Ch756','No',NULL,'2020-12-21 09:19:50','Open','2020-12-21 09:19:50',NULL,'I am trying to implement chat',NULL,'2020-12-24 16:12:58','Hardware','Lagos','Yes','Yes'),
 ('ISS33','CH12','John Ben Ochai','Issue','Again','2020-12-15 13:52:25','Ch7','No',NULL,'2020-12-21 14:31:40','Open','2020-12-21 14:31:40',NULL,'Not Yet Resolved',NULL,NULL,'','Lagos','No','No'),
 ('ISS34','CH12','John Ben Ochai','Issue','hjzsdgkbfrsz gfbj hkdazbd bjszdfa mszcjh','2020-12-15 13:54:25','Ch7','No',NULL,'2020-12-21 09:26:06','Open','2020-12-21 09:26:06',NULL,'Not Yet Resolved',NULL,NULL,'Hardware','Lagos','No','No'),
 ('REQ12','Ch1','Me You Us','Request','							hk,hj&nbsp; zuif xcusx xsz jc df<br>','2020-11-25 14:51:09','Ch1','No',NULL,'2020-12-18 12:37:45','Open','2020-12-18 12:37:45',NULL,'Not Yet Resolved',NULL,NULL,'Request','Lagos','No','No'),
 ('REQ16','Ch1','Me You Us','Request','							Still checking how it works<br>','2020-11-28 10:00:18','ch13','No',NULL,'2020-12-04 10:15:05','Open','2020-12-04 10:15:05',NULL,'Not Yet Resolved',NULL,NULL,'Application','Nnewi','Yes','Yes'),
 ('REQ18','Ch01','Trying something New','Request','							ft','2020-11-28 10:04:20','Not Assigned','No',NULL,'2020-12-04 10:12:43','Open','2020-12-04 10:12:43','Trying something New','Not Yet Resolved',NULL,NULL,'Network','Lagos','No','No'),
 ('REQ23','CH12','John Ben Ochai','Request','							I am waiting to be vetted <br>','2020-11-30 10:58:40','CH02','No','Ch756','2020-12-04 10:12:07','Open','2020-12-04 10:12:07',NULL,'Not Yet Resolved',NULL,NULL,'Email','Nnewi','Yes','Yes'),
 ('REQ25','Ch01','Trying something New','Request','							xfz xc<br>','2020-12-01 15:51:08','Ch756','No',NULL,'2020-12-25 21:20:16','Open','2020-12-25 21:20:16',NULL,'Not Yet Resolved',NULL,NULL,'Request','Nnewi','Yes','Yes'),
 ('REQ26','Ch756','New NewMiddle NewLast','Request','							I am at the office<br>','2020-12-02 10:36:55','Ch7','No',NULL,'2020-12-21 12:40:52','Open','2020-12-21 12:40:52',NULL,'Not Yet Resolved',NULL,NULL,'Request','','No','No'),
 ('REQ35','Ch01','Trying something New','Request','Are you done with the chat implementation?','2020-12-25 22:50:08','Ch756','No',NULL,'2020-12-25 22:50:46','Open','2020-12-25 22:50:46',NULL,'Not Yet Resolved',NULL,NULL,'Request','Lagos','Yes','Yes');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`loc_id`,`location`,`date_added`,`time`) VALUES 
 (14,'Benin','2020-11-26 11:04:29','1606385059'),
 (16,'Lagos','2020-11-30 09:58:16','1606726690'),
 (17,'Nnewi','2020-11-30 13:34:44','1606739671'),
 (18,'Asaba','2020-12-17 15:59:38','1608217171');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;


--
-- Definition of table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `convo_id` varchar(20) DEFAULT NULL,
  `user_id` varchar(25) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unread , 1= read',
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`,`convo_id`,`user_id`,`message`,`status`,`date_created`,`time`) VALUES 
 (61,'REQ23','Ch756,CH12','jjj',0,'2020-12-25 14:01:44','1608901304'),
 (62,'REQ23','Ch756,CH12','Jerry Agada',0,'2020-12-25 14:35:37','1608903337'),
 (76,'REQ23','Ch756,CH12','hi',0,'2020-12-25 20:39:15','1608925155'),
 (77,'REQ25','Ch01,Ch01','hi\n',0,'2020-12-25 20:39:33','1608925173'),
 (78,'REQ25','Ch01,Ch01','hi',0,'2020-12-25 21:15:06','1608927306'),
 (79,'REQ25','Ch01,Ch01','hi',0,'2020-12-25 21:15:19','1608927319'),
 (80,'REQ23','Ch756,CH12','hi',0,'2020-12-25 21:17:50','1608927470'),
 (81,'REQ25','Ch01,Not Assigned','ko',0,'2020-12-25 21:18:10','1608927490'),
 (82,'REQ25','Ch01,Ch756','ji',0,'2020-12-25 21:21:13','1608927673'),
 (83,'REQ25','Ch756,Ch01','jk',0,'2020-12-25 21:21:54','1608927714'),
 (84,'REQ25','Ch01,Ch756','j',0,'2020-12-25 21:22:03','1608927723'),
 (85,'REQ25','Ch756,Ch01','kkk',0,'2020-12-25 21:22:37','1608927757'),
 (86,'REQ25','Ch01,Ch756','how far',0,'2020-12-25 21:32:04','1608928324'),
 (87,'REQ25','Ch01,Ch756','Explain the problem once more',0,'2020-12-25 21:33:44','1608928424'),
 (88,'REQ25','Ch756,Ch01','What?',0,'2020-12-25 21:34:38','1608928478'),
 (89,'REQ25','Ch01,Ch756','explain',0,'2020-12-25 21:39:16','1608928756'),
 (90,'REQ25','Ch756,Ch01','fkkf',0,'2020-12-25 21:45:50','1608929150'),
 (91,'REQ25','Ch01,Ch756','jj',0,'2020-12-25 22:35:17','1608932117'),
 (92,'ISS32','Ch756,CH12','hi',0,'2020-12-25 22:43:51','1608932631'),
 (93,'ISS32','Ch756,CH12','This is an issue',0,'2020-12-25 22:44:03','1608932643'),
 (94,'REQ35','Ch01,Ch756','hi',0,'2020-12-25 23:01:10','1608933670'),
 (95,'REQ35','Ch01,Ch756','m',0,'2020-12-25 23:01:20','1608933680'),
 (96,'REQ35','Ch756,Ch01','I am here',0,'2020-12-25 23:01:33','1608933693'),
 (97,'REQ35','Ch01,Ch756','Attend to my issue',0,'2020-12-25 23:07:21','1608934041'),
 (98,'REQ35','Ch756,Ch01','rgrg',0,'2020-12-27 18:36:16','1609090576'),
 (99,'REQ35','Ch756,Ch01','qerty kgytfrsedv srgfddfv',0,'2020-12-27 18:36:27','1609090587'),
 (100,'REQ35','Ch756,Ch01','fdgh',0,'2020-12-27 18:51:11','1609091471'),
 (101,'REQ35','Ch756,Ch01','Hi',0,'2020-12-27 20:52:49','1609098769'),
 (102,'REQ35','Ch01,Ch756','I am available\n',0,'2020-12-27 21:47:04','1609102024'),
 (103,'REQ35','Ch756,Ch01','Sure?',0,'2020-12-27 21:48:34','1609102114'),
 (104,'REQ35','Ch756,Ch01','Sure?',0,'2020-12-27 21:48:34','1609102114'),
 (105,'REQ35','Ch756,Ch01','Sure?',0,'2020-12-27 21:48:55','1609102135'),
 (106,'REQ35','Ch756,Ch01','ok',0,'2020-12-27 21:51:24','1609102284'),
 (107,'REQ35','Ch01,Ch756','y',0,'2020-12-27 21:51:37','1609102297'),
 (108,'REQ25','Ch756,Ch01','hi',0,'2020-12-28 21:01:39','1609185699'),
 (109,'REQ25','Ch01,Ch756','helo',0,'2020-12-28 21:01:54','1609185714'),
 (110,'REQ25','Ch756,Ch01','nnnn',0,'2020-12-28 21:03:25','1609185805'),
 (111,'REQ25','Ch01,Ch756','nnnm',0,'2020-12-28 21:03:52','1609185832'),
 (112,'REQ25','Ch756,Ch01','kl',0,'2020-12-28 21:04:05','1609185845'),
 (113,'REQ25','Ch756,Ch01','k',0,'2020-12-28 21:05:09','1609185909'),
 (114,'REQ25','Ch01,Ch756','op',0,'2020-12-28 21:07:20','1609186040'),
 (115,'REQ25','Ch756,Ch01','o',0,'2020-12-28 21:08:54','1609186134'),
 (116,'REQ25','Ch01,Ch756','m',0,'2020-12-28 21:09:16','1609186156'),
 (117,'REQ25','Ch756,Ch01','lk',0,'2020-12-28 21:12:45','1609186365'),
 (118,'REQ25','Ch01,Ch756','mnn',0,'2020-12-28 21:22:42','1609186962'),
 (119,'REQ25','Ch756,Ch01','mmmlkkk',0,'2020-12-28 21:23:03','1609186983'),
 (120,'REQ25','Ch01,Ch756','h',0,'2020-12-28 21:26:01','1609187161'),
 (121,'REQ25','Ch01,Ch756','n',0,'2020-12-28 21:26:22','1609187182'),
 (122,'REQ25','Ch756,Ch01','jk',0,'2020-12-28 21:27:52','1609187272'),
 (123,'REQ25','Ch01,Ch756','m',0,'2020-12-28 21:28:06','1609187286'),
 (124,'REQ25','Ch756,Ch01','op',0,'2020-12-28 22:13:39','1609190019'),
 (125,'REQ25','Ch01,Ch756','p\n',0,'2020-12-28 22:15:44','1609190144'),
 (126,'REQ25','Ch01,Ch756','o\n',0,'2020-12-28 23:41:14','1609195274'),
 (127,'REQ25','Ch756,Ch01','po',0,'2020-12-29 00:01:54','1609196514'),
 (128,'REQ25','Ch01,Ch756','op',0,'2020-12-29 00:02:08','1609196528'),
 (129,'ISS31','ch13,CH12','hi',0,'2021-01-03 15:32:41','1609684361'),
 (130,'REQ25','Ch01,Ch756','k',0,'2021-01-04 14:13:37','1609766017'),
 (131,'REQ25','Ch01,Ch756','',0,'2021-01-04 14:13:38','1609766018'),
 (132,'REQ23','CH12,CH02','helo\n',0,'2021-01-04 14:24:52','1609766692'),
 (133,'REQ35','Ch01,Ch756','Can you view this?',0,'2021-01-04 14:27:55','1609766875'),
 (134,'REQ35','Ch756,Ch01','Yes!  I can view it.',0,'2021-01-04 14:28:38','1609766918'),
 (135,'REQ35','Ch756,Ch01','helo\n',0,'2021-01-12 10:01:03','1610442063'),
 (136,'REQ35','Ch01,Ch756','hi',0,'2021-01-12 10:02:20','1610442140'),
 (137,'REQ35','Ch756,Ch01','hoooooo',0,'2021-01-12 10:02:40','1610442160'),
 (138,'REQ35','Ch01,Ch756','hi',0,'2021-01-12 10:11:42','1610442702'),
 (139,'REQ35','Ch756,Ch01','ji',0,'2021-01-12 10:15:16','1610442916'),
 (140,'REQ35','Ch01,Ch756','ko',0,'2021-01-12 10:16:58','1610443018'),
 (141,'REQ35','Ch756,Ch01','ko',0,'2021-01-12 10:19:20','1610443160'),
 (142,'REQ35','Ch01,Ch756','hi',0,'2021-01-12 10:23:52','1610443432'),
 (143,'REQ35','Ch756,Ch01','done',0,'2021-01-12 10:24:50','1610443490'),
 (144,'REQ35','Ch01,Ch756','are you sure?',0,'2021-01-12 10:27:52','1610443672'),
 (145,'REQ35','Ch756,Ch01','it seems interesting now than before',0,'2021-01-12 10:28:35','1610443715'),
 (146,'REQ35','Ch01,Ch756','yes',0,'2021-01-12 10:29:21','1610443761'),
 (147,'REQ35','Ch01,Ch756','Yeah! I am making a headway by God grace',0,'2021-01-12 10:30:53','1610443853'),
 (148,'REQ35','Ch756,Ch01','What is happening?',0,'2021-01-12 10:32:10','1610443930'),
 (149,'REQ35','Ch01,Ch756','dont know',0,'2021-01-12 10:32:21','1610443941'),
 (150,'REQ35','Ch756,Ch01','',0,'2021-01-12 10:33:45','1610444025'),
 (151,'REQ35','Ch756,Ch01','.,',0,'2021-01-12 10:38:22','1610444302'),
 (152,'REQ35','Ch756,Ch01','12347',0,'2021-01-12 10:38:28','1610444308'),
 (153,'REQ35','Ch01,Ch756','-',0,'2021-01-12 10:38:39','1610444319'),
 (154,'REQ35','Ch01,Ch756','m',0,'2021-01-12 10:38:58','1610444338'),
 (155,'REQ35','Ch01,Ch756','ok',0,'2021-01-12 10:40:24','1610444424'),
 (156,'REQ35','Ch756,Ch01','How far',0,'2021-01-12 10:40:33','1610444433'),
 (157,'REQ35','Ch756,Ch01','fyn',0,'2021-01-12 10:41:31','1610444491'),
 (158,'REQ35','Ch01,Ch756','fyn',0,'2021-01-12 10:41:55','1610444515'),
 (159,'REQ35','Ch01,Ch756','#',0,'2021-01-12 10:42:34','1610444554'),
 (160,'REQ35','Ch01,Ch756','$',0,'2021-01-12 10:42:40','1610444560'),
 (161,'REQ35','Ch01,Ch756','&',0,'2021-01-12 10:42:46','1610444566'),
 (162,'REQ35','Ch01,Ch756','@',0,'2021-01-12 10:42:56','1610444576'),
 (163,'REQ35','Ch01,Ch756','\"',0,'2021-01-12 10:43:04','1610444584'),
 (164,'REQ35','Ch756,Ch01','.,',0,'2021-01-12 10:43:28','1610444608'),
 (165,'REQ35','Ch01,Ch756','?',0,'2021-01-12 10:43:50','1610444630'),
 (166,'REQ35','Ch01,Ch756','n\"',0,'2021-01-12 10:44:34','1610444674'),
 (167,'REQ35','Ch756,Ch01','_',0,'2021-01-12 10:44:55','1610444695'),
 (168,'REQ35','Ch756,Ch01','-=',0,'2021-01-12 10:45:02','1610444702'),
 (169,'REQ35','Ch756,Ch01','*',0,'2021-01-12 10:45:13','1610444713'),
 (170,'REQ35','Ch756,Ch01','',0,'2021-01-12 10:45:20','1610444720'),
 (171,'REQ35','Ch01,Ch756','hmmmmmmmm',0,'2021-01-12 10:50:54','1610445054'),
 (172,'REQ35','Ch01,Ch756','jb',0,'2021-01-12 10:56:30','1610445390'),
 (173,'REQ35','Ch756,Ch01','how far',0,'2021-01-12 10:56:41','1610445401'),
 (174,'REQ35','Ch01,Ch756','er',0,'2021-01-12 11:47:51','1610448471'),
 (175,'REQ35','Ch756,Ch01','Am back',0,'2021-01-12 19:36:38','1610476598'),
 (176,'REQ35','Ch01,Ch756','Welcome',0,'2021-01-12 19:36:51','1610476611'),
 (177,'REQ35','Ch01,Ch756','whats up',0,'2021-01-12 19:38:43','1610476723'),
 (178,'REQ35','Ch01,Ch756','hi',0,'2021-01-14 13:10:52','1610626252'),
 (179,'REQ35','Ch756,Ch01','how',0,'2021-01-14 13:11:11','1610626271');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;


--
-- Definition of table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE `theme` (
  `color` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theme`
--

/*!40000 ALTER TABLE `theme` DISABLE KEYS */;
INSERT INTO `theme` (`color`,`status`,`id`,`link`) VALUES 
 ('Red','0',1,'  <link rel=\"stylesheet\" href=\"assets/dist/css/adminlte.min.css\">\r\n'),
 ('Blue','1',2,'  <link rel=\"stylesheet\" href=\"assets/dist/css/adminlte.min2.css\">\r\n'),
 ('Green','0',4,'ewr');
/*!40000 ALTER TABLE `theme` ENABLE KEYS */;


--
-- Definition of table `thread`
--

DROP TABLE IF EXISTS `thread`;
CREATE TABLE `thread` (
  `id` int(100) NOT NULL DEFAULT 0,
  `user_ids` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

/*!40000 ALTER TABLE `thread` DISABLE KEYS */;
INSERT INTO `thread` (`id`,`user_ids`) VALUES 
 (1,'Ch756,CH12'),
 (2,'CH12,Ch756');
/*!40000 ALTER TABLE `thread` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`firstname`,`lastname`,`middlename`,`contact`,`address`,`email`,`password`,`type`,`avatar`,`date_created`,`staff_id`) VALUES 
 (1,'Admin','Admin','','+12354654787','Sample','admin@admin.com','0192023a7bbd73250516f069df18b500',1,'','2020-11-11 15:35:19','CH12'),
 (2,'John','Smith','C','+14526-5455-44','Address','jsmith@sample.com','1254737c076cf867dc53d60a0364f38e',2,'1605080820_avatar.jpg','2020-11-11 09:24:40',NULL),
 (3,'John','Ben','Ben','07039239230','Investment House, Marina','ochaijohnben@gmail.com','035c38b95750ab68cc7544f3f821e7f1',2,'1605257460_1.jpg','2020-11-13 09:51:18',NULL),
 (4,'Miracle','Ochai','Oge','12863347865','Lagos','miracle@miracle.com','d122d8ccb48c21175376e9dd9627bfe4',2,'1605700860_2019-03-05-22-32-08-875.jpg','2020-11-18 13:01:46',NULL),
 (6,'John','mmm','Ben','232785654','Lagos','admin@pn.com','21232f297a57a5a743894a0e4a801fc3',1,'1605704700_2019-03-05-22-32-08-875.jpg','2020-11-18 14:05:15',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of table `users2`
--

DROP TABLE IF EXISTS `users2`;
CREATE TABLE `users2` (
  `staff_id` varchar(25) NOT NULL DEFAULT '',
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
  `my_admin` varchar(45) NOT NULL DEFAULT 'Not Assigned',
  PRIMARY KEY (`id`,`staff_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users2`
--

/*!40000 ALTER TABLE `users2` DISABLE KEYS */;
INSERT INTO `users2` (`staff_id`,`surname`,`firstname`,`othername`,`phoneno`,`email`,`password`,`dept`,`location`,`date_added`,`type`,`id`,`avatar`,`manager`,`my_manager`,`my_admin`) VALUES 
 ('CH12','Ochai','John','Ben','07039239230','admin@admin.com','21232f297a57a5a743894a0e4a801fc3','IT','Lagos','2020-11-19 16:34:39','1',1,'1605797640_2019-03-05-22-32-08-875.jpg','No','No Assigned',''),
 ('ch13','Oge','Miracle','Mimi','0908799','pn@pn.com','ded0804cf804b6d26e37953dc2dbc505','4','Nnewi','2020-11-19 16:34:39','3',2,'1605797640_2019-03-05-22-32-08-875.jpg','No','Ch7',''),
 ('Ch1','Us','Me','You','2587446525','nanro@nanro.com','9cf2e79086f401ce975ef2194cb91d58','Management','Kaduna','2020-11-19 16:34:39','3',3,'1605800040_lennon.jpg','Yes','No Assigned',''),
 ('CH02','Mike','Peter','Paul','2587446525','peter@peter.com','9cf2e79086f401ce975ef2194cb91d58','Security','Port Harcourt','2020-11-20 08:07:03','3',4,'1605856020_INEC Approved Pass 2.jpg','No','Ch756',''),
 ('Ch01','New','Trying','something','2144544','user@user.com','ee11cbb19052e40b07aac0ca060c23ee','Finance Management','Lagos','2020-11-26 10:22:25','2',7,'1606382520_IMG_20190602_113412.jpg','No','No Assigned',''),
 ('CH3','Justin','nathan','Oche','21554412','user2@user2.com','ee11cbb19052e40b07aac0ca060c23ee','Electrical','Benin','2020-11-27 18:36:28','2',8,'1606498560_1492873555671.jpg','No','No Assigned',''),
 ('Ch7','Harvertz','Kai','Kai','3255665','john.ochai@nanrotechnology.ng','e79fb748c3c8ab532a8fcf2da53ae54d','Health','Benin','2020-11-28 09:16:16','3',9,'1606551360_IMG_20190602_115213.jpg','Yes','No Assigned',''),
 ('Chj21','Oche','Nathan','Justin','411562254','us@us.com','0b3b97fa66886c5688ee4ae80ec0c3c2','Finance Management','Benin','2020-11-28 10:06:35','2',10,'1606554360_jb edited pp.jpg','No','No Assigned',''),
 ('Ch756','NewLast','New','NewMiddle','125747545','new@new.com','22af645d1859cb5ca6da0c484f1f37ea','Electrical','Lagos','2020-11-30 10:57:27','3',11,'1606730220_IMG_20190623_091732_6.jpg','Yes','CH02','');
/*!40000 ALTER TABLE `users2` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
