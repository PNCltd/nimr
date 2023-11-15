DROP TABLE IF EXISTS department;

CREATE TABLE `department` (
  `dept_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dept` varchar(45) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

INSERT INTO department VALUES("47","Operations Department","2021-02-09 12:09:18","1612872558"),
("48","Credit Department","2021-02-09 12:09:52","1612872592"),
("49","IT Department","2021-02-09 12:10:12","1612872612"),
("50","Marketers","2021-02-09 12:10:27","1612872627"),
("51"," FinCon (Finance department)","2021-02-09 12:10:52","1612872652"),
("52","Internal Control","2021-02-09 12:11:10","1612872670"),
("53","Audit","2021-02-09 12:11:46","1612872706"),
("54","HR/Admin","2021-02-16 07:34:44","1613460884"),
("55","Recovery Department","2021-02-16 07:41:58","1613461318");



DROP TABLE IF EXISTS issue_alg;

CREATE TABLE `issue_alg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastno` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO issue_alg VALUES("1","2");



DROP TABLE IF EXISTS issue_category;

CREATE TABLE `issue_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `issue_catg` varchar(45) NOT NULL DEFAULT 'Unassigned',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO issue_category VALUES("1","Network"),
("2","Hardware"),
("3","Operating System"),
("4","Email"),
("5","Application"),
("6","Others");



DROP TABLE IF EXISTS issue_log;

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

INSERT INTO issue_log VALUES("ISS1","PTMFB 001","Raymond  Olusoga","Issue","<p>1. The office on my system needed to be updated so i can execute and excel ATM and cheque book request of customers.</p><p>2. The Internet connection on my system is not stable.</p>","2021-02-16 10:54:09","PTMFB 009","No","","2121-02-17 11:57:43","Closed","2121-02-18 11:05:09","John Ben Ochai","Not Yet Resolved","","","Operating System","Head Office, Surulere","No","No"),
("ISS2","PTMFB 006","Omoweroh  Adebayo","Issue","<p>Good afternoon.</p><p>My customer, Silas Abiodun Sola-<span style=\"font-weight: bold; font-size: 1rem;\">1100239104 </span><span style=\"font-size: 1rem;\">is unable to transact via his mobile app. He also tried buying airtime but was unsuccessful.&nbsp;</span></p><p><span style=\"font-size: 1rem;\">Kindly help look into it, resolve and revert ASAP.</span></p><p>Regards.</p><label for=\"ContentPlaceHolder1_ucAccountSummary_lblNUBAN\" style=\"width:150px;;\" class=\"x-form-item-label \" id=\"ext-gen493\"></label>","2021-02-16 13:44:26","PTMFB 008","No","","2121-02-17 11:58:20","Closed","2121-02-18 11:05:52","John Ben Ochai","Not Yet Resolved","","","Application","Head Office, Surulere","No","No");



DROP TABLE IF EXISTS issue_type;

CREATE TABLE `issue_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `issue_type` varchar(45) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO issue_type VALUES("1","Issue","2020-11-20 08:40:24"),
("2","Request","2020-11-20 08:40:24");



DROP TABLE IF EXISTS location;

CREATE TABLE `location` (
  `loc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(45) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `time` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

INSERT INTO location VALUES("19","Bariga Branch","2021-02-09 12:10:10","1612872583"),
("20","Tejuosho Branch","2021-02-09 12:10:46","1612872629"),
("21","Sandgrouse Branch","2021-02-09 12:11:06","1612872652"),
("22","Head Office, Surulere","2021-02-09 12:11:39","1612872673");



DROP TABLE IF EXISTS messages;

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




DROP TABLE IF EXISTS theme;

CREATE TABLE `theme` (
  `color` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO theme VALUES("Red","0","1","  <link rel=\"stylesheet\" href=\"assets/dist/css/adminlte.min.css\">\n"),
("Blue","1","2","  <link rel=\"stylesheet\" href=\"assets/dist/css/adminlte.min2.css\">\n"),
("Green","0","4","ewr");



DROP TABLE IF EXISTS thread;

CREATE TABLE `thread` (
  `id` int(100) NOT NULL DEFAULT 0,
  `user_ids` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS users2;

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

INSERT INTO users2 VALUES("CH12","Ochai","John","Ben","07039239230","admin@admin.com","21232f297a57a5a743894a0e4a801fc3","IT Department","Lagos","2020-11-19 16:34:39","1","1","1605797640_2019-03-05-22-32-08-875.jpg","No","No Assigned",""),
("PTMFB 001","Olusoga","Raymond","","08180966848","raymond.olusoga@personaltrustmfb.com","7609f2616dfd91f44e4ba802af764586","Operations Department","Head Office, Surulere","2021-02-09 13:01:01","2","12","","No","No Assigned","Not Assigned"),
("PTMFB 002","Adizua","Blessing","","08074614355","blessing.adizua@personaltrustmfb.com","931bb5d88cef537139d851d8da8aa2f1","Markerters","Bariga Branch","2021-02-09 13:03:45","2","13","","No","No Assigned","Not Assigned"),
("PTMFB 003","Ighodalo","Patricia","","09033729509","patricia.ighodalo@personaltrustmfb.com","b281cad50a19ba95420219d483391278","Operations Department","Bariga Branch","2021-02-09 13:06:20","2","14","","No","No Assigned","Not Assigned"),
("PTMFB 004","Lawal","Yetunde","","08062060034","yetunde.lawal@personaltrustmfb.com","a5f8682f61816aa553a3e6288c572a8d","Markerters","Bariga Branch","2021-02-09 13:09:01","2","15","","No","No Assigned","Not Assigned"),
("PTMFB 005","Oluwayemisi","Kamsi","","08145252110","oluwayemisi.kamson@personaltrustmfb.com","a13a140ad5228540cd22de61022ac048","Markerters","Sandgrouse Branch","2021-02-09 13:12:03","2","16","","No","No Assigned","Not Assigned"),
("PTMFB 006","Adebayo","Omoweroh","","08038375558","omoweroh.adebayo@personaltrustmfb.com","c9a61ddd7e29183de1573761a942378a","Markerters","Head Office, Surulere","2021-02-09 13:14:45","2","17","","No","No Assigned","Not Assigned"),
("PTMFB 007","Olanrewaju","Latifat","","08136123034","latifat.olanrewaju@personaltrustmfb.com","3cbef3d6b0bf14155d0167f906d20186","Markerters","Tejuosho Branch","2021-02-09 13:17:07","2","18","","No","No Assigned","Not Assigned"),
("PTMFBADMIN","Admin","Admin","Admin","0000111222","admin@ptmfb.pncitservdesk.com","640dcd5bd9452ed824942098d74a2d70","IT Department","Head Office, Surulere","2021-02-09 14:56:25","1","19","","No","No Assigned","Not Assigned"),
("PTMFB 008","Ayodele","Wasiu","","08023715411","wasiu.ayodele@personaltrustmfb.com","b690508ee68cd93b1b51cf2132ef568b","IT Department","Head Office, Surulere","2021-02-09 16:04:12","1","20","","Yes","No Assigned","Not Assigned"),
("PTMFB 009","Ijede","Peter","","08169332742","peter.ijede@pnconsultingltd.com","6d81688ddaae740b77c83843f890eb9e","IT Department","Head Office, Surulere","2021-02-09 16:07:29","1","21","","No","PTMFB 008","Not Assigned"),
("PTMFB 010","Ogbe","Osememen","","07080475424","osememen.ogbe@pnconsultingltd.com","3952b066e472a94bfe2ad28c53f7bba3","IT Department","Head Office, Surulere","2021-02-10 13:09:23","3","22","","No","No Assigned","Not Assigned"),
("PTMFB 011","Noah","James","","08135947755","james.noah@pnconsultingltd.com","9affc774a59d67a6d6aa257d20ebf72e","IT Department","Head Office, Surulere","2021-02-10 13:13:01","3","23","","No","No Assigned","Not Assigned"),
("PTMFB 012","Omoroseghe","Dennis","","09035070731","dennis.omoroseghe@pnconsultingltd.com","14846779c1b1c206d1da9f9b4fb0aa0e","IT Department","Head Office, Surulere","2021-02-10 13:19:20","1","24","","No","No Assigned","Not Assigned"),
("PTMFB 013","Uko","Inem","","09090055662","inem.uko@pnconsultingltd.com","0413a4ee3217b6850d977d41d08eb2da","IT Department","Head Office, Surulere","2021-02-10 13:21:50","3","25","","No","No Assigned","Not Assigned"),
("PTMFB 014","Ochai","John","Ben","07039239230","john.ochai@nanrotechnology.ng","a948326d81e37b96fac162cbb75dc2b2","IT Department","Head Office, Surulere","2021-02-10 13:31:46","3","26","","No","No Assigned","Not Assigned"),
("PTMFB 016","Ikuewan","Lucky ","","09098023516","lucky.ikuewan@personaltrustmfb.com","ffa4f67a4014291e119aacea3759c072","Audit","Head Office, Surulere","2021-02-15 15:31:59","2","27","","No","No Assigned","Not Assigned"),
("PTMFB 017","Okonkwo","Alex","","08094294865","alex.okonkwo@personaltrustmfb.com","6356e627ce1c7d71cf4c7067c0c30e9c","Marketers","Head Office, Surulere","2021-02-15 15:36:33","2","28","","No","No Assigned","Not Assigned"),
("PTMFB O18","Amaefule","Roseline","","08037409573","roseline.amaefule@personaltrustmfb.com","4a609a05cab6c365c53ad5708fa5338e","Operations Department","Head Office, Surulere","2021-02-15 15:38:27","2","29","","No","No Assigned","Not Assigned"),
("PTMFB 028","Adesite","David","","07082649691","david.adesite@personaltrustmfb.com","41acb0d0d2a38e77f132fbcf6d83bdc3","Marketers","Sandgrouse Branch","2021-02-15 15:40:27","2","30","","No","No Assigned","Not Assigned"),
("PTMFB 019","Nwanegwo","Emmanuel","","08060180995","emmanuel.nwanegwo@personaltrustmfb.com","b45ac8238a536d79130141b0c1e02118","HR/Admin","Head Office, Surulere","2021-02-15 16:36:53","2","31","","No","No Assigned","Not Assigned"),
("PTMFB 015","Nwankwo","Chika","","07034464255","chika.nwankwo@personaltrustmfb.com","6e9115f1bc8a0825aaa43e94de67b4af"," FinCon (Finance department)","Head Office, Surulere","2021-02-15 16:39:07","2","32","","No","No Assigned","Not Assigned"),
("PTMFB 020","Akinsanya","Oluwole","","08055120809","oluwole.akinsanya@personaltrustmfb.com","1ab8e6f4248738a082cb6550c0d1635f","Recovery Department","Head Office, Surulere","2021-02-15 16:41:28","2","33","","No","No Assigned","Not Assigned"),
("PTMFB 022","Agbasale","Obafemi","","08069274474","obafemi.agbasale@personaltrustmfb.com","68fe6f041eadc1b0b6019ee56a06f887","Credit Department","Head Office, Surulere","2021-02-15 16:43:53","2","34","","No","No Assigned","Not Assigned"),
("PTMFB 023","Olowookere","Adunola","","08028592505","adunola.olowookere@personaltrustmfb.com","84e61eff85f3245d7f1af8bffd8bdc61","Credit Department","Head Office, Surulere","2021-02-15 16:46:13","2","35","","No","No Assigned","Not Assigned"),
("PTMFB 024","Ojo","Adekunle","","08038377017","adekunle.ojo@personaltrustmfb.com","50b281a72fd8e3b98b6e8bbc9d4a5e31","Credit Department","Head Office, Surulere","2021-02-15 16:48:35","2","36","","No","No Assigned","Not Assigned"),
("PTMFB 026","Egbochie","Charles","","08064905435","charles.egbochie@personaltrustmfb.com","1beb00099cda5e1dbcc344d619bd6bf3","Operations Department","Head Office, Surulere","2021-02-15 16:50:44","2","37","","No","No Assigned","Not Assigned"),
("PTMFB 027","Edeki","Bakare","","08032479840","bakare.edeki@personaltrustmfb.com","4500188adbaeb3cbf75b8d332074761c"," FinCon (Finance department)","Head Office, Surulere","2021-02-15 17:06:11","2","38","","No","No Assigned","Not Assigned"),
("PTMFB 029","Adeola","Oluwaseun","","08033120166","oluwaseun.adeola@personaltrustmfb.com","87ea308c1c92af7d5ce2e17d80b480de","Operations Department","Sandgrouse Branch","2021-02-15 17:08:45","2","39","","No","No Assigned","Not Assigned"),
("PTMFB 030","Dingwoke","Chinasa","","08138021748","chinasa.dingwoke@personaltrustmfb.com","45deb2a13fdb043017c68c95cb0aee54","Operations Department","Tejuosho Branch","2021-02-15 17:12:04","2","40","","No","No Assigned","Not Assigned"),
("PTMFB 031","Nkereuwem","Uche","","08099455070","uche.nkereuwem@personaltrustmfb.com","05098ecdd4dc2dccdef66e941b138591","Marketers","Head Office, Surulere","2021-02-15 17:13:54","2","41","","No","No Assigned","Not Assigned"),
("PTMFB 032","Francis","Damilola","","08124848979","damilola.francis@personaltrustmfb.com","926d287f31c011561ee0385cf6e43748","Operations Department","Head Office, Surulere","2021-02-16 07:12:10","2","42","","No","No Assigned","Not Assigned"),
("PTMFB 033","Judechuks","Peace","","08060494012","peace.judechuks@personaltrustmfb.com","215ce0c9a4e6a535a3c78564b9487592","HR/Admin","Head Office, Surulere","2021-02-16 07:15:32","2","43","","No","No Assigned","Not Assigned"),
("PTMFB 034","Abayomi","Ganiu","","07032438263","ganiu.abayomi@personaltrustmfb.com","a07e7c6486eb5023ed4a92f228af5b31","Internal Control","Head Office, Surulere","2021-02-16 07:18:24","2","44","","No","No Assigned","Not Assigned"),
("PTMFB 035","Imoru","Olabode","","08039224709","olabode.imoru@personaltrustmfb.com","9c13f2523248b4891a6f029f103c7c8d","Internal Control","Head Office, Surulere","2021-02-16 07:21:14","2","45","","No","No Assigned","Not Assigned"),
("PTMFB 036","Makinde","Yemisi","","08086105636","yemisi.makinde@personaltrustmfb.com","ebdddb6381ce3445b2eac58204bda531","Operations Department","Tejuosho Branch","2021-02-16 07:24:09","2","46","","No","No Assigned","Not Assigned"),
("PTMFB 037","Obazu","Tosin","","09031371855","tosin.obazu@personaltrustmfb.com","b3e0ca9102988d3fdf169f5221d711db","HR/Admin","Head Office, Surulere","2021-02-16 07:36:55","2","47","","No","No Assigned","Not Assigned"),
("PTMFB 021","Atobajaye","Samson","","08189363357","samson.atobajaye@personaltrustmfb.com","98ab8c43ae6b77eed65f5ffca44cf65f","Recovery Department","Head Office, Surulere","2021-02-16 07:54:24","2","48","","No","No Assigned","Not Assigned"),
("PTMFB 025","Wilson","Temidoyin","","08084636733","wilson.temidoyin@personaltrustmfb.com","6bf1ca11f3ca4b2aa11078048f65d853","Marketers","Head Office, Surulere","2021-02-16 07:57:09","2","49","","No","No Assigned","Not Assigned");



