-- MySQL dump 10.13  Distrib 8.0.13, for macos10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: easytools
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `task_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_files_tasks1_idx` (`task_id`),
  KEY `fk_files_users1_idx` (`users_id`),
  CONSTRAINT `fk_files_tasks1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_files_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (5,'index exemplo.html','181556201811205bf46b7c43a28.html','2018-11-20 20:15:56.000000','2018-11-20 20:15:56.000000','html.png',3,4),(11,'trabalho.pdf','183725201811205bf4708534d1c.pdf','2018-11-20 20:37:25.000000','2018-11-20 20:37:25.000000','pdf.png',3,4),(12,'teste.xml','183756201811205bf470a487dbd.xml','2018-11-20 20:37:56.000000','2018-11-20 20:37:56.000000','xml.png',3,4),(13,'teste.xml','184539201811205bf47273bcb2f.xml','2018-11-20 20:45:39.000000','2018-11-20 20:45:39.000000','xml.png',3,4),(15,'etaease.txt','192053201811205bf47ab539b71.txt','2018-11-20 21:20:53.000000','2018-11-20 21:20:53.000000','txt.png',3,4),(16,'taesaeasei.png','195113201811205bf481d141822.png','2018-11-20 21:51:13.000000','2018-11-20 21:51:13.000000','png.png',3,4),(20,'ts.txt','223528201811215bf5f9d01b9f9.txt','2018-11-22 00:35:28.000000','2018-11-22 00:35:28.000000','txt.png',3,4),(21,'areasse.png','230919201811215bf601bf21a8b.png','2018-11-22 01:09:19.000000','2018-11-22 01:09:19.000000','png.png',3,4),(22,'teste.png','133125201811225bf6cbcd89535.png','2018-11-22 15:31:25.000000','2018-11-22 15:31:25.000000','png.png',4,4),(23,'teasdasd.xml','133148201811225bf6cbe4af552.xml','2018-11-22 15:31:48.000000','2018-11-22 15:31:48.000000','xml.png',4,4);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financials`
--

DROP TABLE IF EXISTS `financials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `financials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `value` decimal(13,2) NOT NULL,
  `date_ini` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financials`
--

LOCK TABLES `financials` WRITE;
/*!40000 ALTER TABLE `financials` DISABLE KEYS */;
INSERT INTO `financials` VALUES (3,8,600000.00,'2018-11-18 21:08:25','2018-12-01 00:00:00',NULL,NULL),(4,9,50000.00,'2018-11-22 00:36:07','2018-11-03 00:00:00',NULL,'2018-11-22 15:19:41');
/*!40000 ALTER TABLE `financials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `task_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notes_tasks1_idx` (`task_id`),
  KEY `fk_notes_users1_idx` (`users_id`),
  CONSTRAINT `fk_notes_tasks1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_notes_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (7,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit erat tortor, convallis sollicitudin purus dictum ac. Maecenas eu nibh metus. Morbi sodales vulputate vulputate. Nunc euismod lacus et tortor hendrerit, eu ornare ante eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse consequat lectus eu mauris placerat iaculis. Maecenas pulvinar lorem sed scelerisque varius. Suspendisse nec tortor ac urna volutpat blandit. Nulla aliquet tempor risus sit amet ultricies. Nam interdum eros augue, sed ultrices ante efficitur quis. Donec a posuere ligula.',3,4,'2018-11-20 21:55:43.000000','2018-11-20 21:55:43.000000'),(8,'Pellentesque mauris augue, viverra vel orci id, pulvinar vehicula mauris. Nullam porta dui vitae dolor condimentum congue. Sed elementum risus augue, vel cursus nunc gravida id. Proin sit amet sollicitudin nisl, non congue libero. Praesent pulvinar, velit eget ornare efficitur, lacus risus auctor eros, id ullamcorper libero purus ut lacus. Aliquam non diam egestas, scelerisque lorem a, fermentum dui. Nullam sagittis in tellus eu aliquam. Quisque tincidunt cursus sapien, in malesuada diam pulvinar vitae. Nunc faucibus quis urna a consequat. Proin ultrices nunc pulvinar nibh egestas, non venenatis arcu sodales. Fusce faucibus volutpat lorem eu vehicula. Donec in elit dui.',3,4,'2018-11-20 21:57:14.000000','2018-11-20 21:57:14.000000'),(11,'asiesuehiuahehasuehasuehausheuh suaesa\ns\n \nd\na',3,4,'2018-11-22 01:27:52.000000','2018-11-22 01:27:52.000000'),(14,'asueyusaheusaehusaehuasehuasheuashe',4,4,'2018-11-22 15:33:46.000000','2018-11-22 15:33:46.000000');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `password_resets` (
  `idpassword_resets` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_accounts`
--

DROP TABLE IF EXISTS `pay_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pay_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `cost_center` varchar(255) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `value` float DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_financials_projects1_idx` (`project_id`),
  CONSTRAINT `fk_financials_projects1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_accounts`
--

LOCK TABLES `pay_accounts` WRITE;
/*!40000 ALTER TABLE `pay_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `pay_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `estimate_date` date DEFAULT NULL,
  `estimate_time` time DEFAULT NULL,
  `project_price` float DEFAULT NULL,
  `status` enum('A','I') DEFAULT 'A',
  `project_type` enum('I','E') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (8,'Fabrique Biju','Ana Claudia da Silva','2018-12-01','40:00:00',600000,NULL,'I','2018-11-18 23:08:25','2018-11-18 23:08:25'),(9,'Projeto Entregar TCC','Bancada Fatec','2018-11-03','20:00:00',50000,'A','I','2018-11-22 02:36:07','2018-11-22 03:06:05');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects_has_users`
--

DROP TABLE IF EXISTS `projects_has_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `projects_has_users` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`project_id`,`user_id`),
  KEY `fk_projects_has_users_users1_idx` (`user_id`),
  KEY `fk_projects_has_users_projects1_idx` (`project_id`),
  CONSTRAINT `fk_projects_has_users_projects1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_projects_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_has_users`
--

LOCK TABLES `projects_has_users` WRITE;
/*!40000 ALTER TABLE `projects_has_users` DISABLE KEYS */;
INSERT INTO `projects_has_users` VALUES (8,4),(9,4);
/*!40000 ALTER TABLE `projects_has_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receive_accounts`
--

DROP TABLE IF EXISTS `receive_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `receive_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) DEFAULT NULL,
  `date_receive` date DEFAULT NULL,
  `value` float DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `receive_paymentscol` varchar(45) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_financials_projects1_idx` (`project_id`),
  CONSTRAINT `fk_financials_projects10` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receive_accounts`
--

LOCK TABLES `receive_accounts` WRITE;
/*!40000 ALTER TABLE `receive_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `receive_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `estimate_date` date DEFAULT NULL,
  `estimate_time` time DEFAULT NULL,
  `status` enum('C','I') DEFAULT NULL,
  `begin_date` date DEFAULT NULL,
  `final_date` date DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tasks_projects_idx` (`project_id`),
  CONSTRAINT `fk_tasks_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (3,'HTML e CSS','Realizar o desenvolvimento das paginas do site www.fabriquebiju.com.br utilizando as tecnologias de frontend de acordo com as normas da w3c e boas práticas tanto de front como quando for utilizar o backend','2018-12-08','10:00:00','I','2018-11-12','2018-11-23',8,'2018-11-18 23:09:57','2018-11-18 23:09:57'),(4,'Corrigir documentacao','ambos os colaboradores do projeto devem corrigir toda a documentação do sistema e entregar no prazo passado','2018-11-30','10:00:00','I','2018-11-21','2018-11-29',9,'2018-11-22 03:21:04','2018-11-22 21:15:15');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks_has_users`
--

DROP TABLE IF EXISTS `tasks_has_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tasks_has_users` (
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`task_id`,`user_id`),
  KEY `fk_tasks_has_users_users1_idx` (`user_id`),
  KEY `fk_tasks_has_users_tasks1_idx` (`task_id`),
  CONSTRAINT `fk_tasks_has_users_tasks1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tasks_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks_has_users`
--

LOCK TABLES `tasks_has_users` WRITE;
/*!40000 ALTER TABLE `tasks_has_users` DISABLE KEYS */;
INSERT INTO `tasks_has_users` VALUES (3,4),(4,4),(4,6);
/*!40000 ALTER TABLE `tasks_has_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `times`
--

DROP TABLE IF EXISTS `times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_value` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_stop` time DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `task_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_times_tasks1_idx` (`task_id`),
  KEY `fk_times_users1_idx` (`users_id`),
  CONSTRAINT `fk_times_tasks1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_times_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `times`
--

LOCK TABLES `times` WRITE;
/*!40000 ALTER TABLE `times` DISABLE KEYS */;
INSERT INTO `times` VALUES (17,'00:10:00','2018-11-28','10:20:00','10:30:00','2018-11-20 01:01:29.000000','2018-11-20 01:01:29.000000',3,4),(18,'00:10:00','2018-11-28','10:20:00','10:30:00','2018-11-20 01:02:10.000000','2018-11-20 01:02:10.000000',3,4),(26,'00:10:00','2018-09-11','15:20:00','15:30:00','2018-11-20 20:40:18.000000','2018-11-20 20:40:18.000000',3,4),(27,'00:10:00','2018-09-11','15:20:00','15:30:00','2018-11-20 20:45:46.000000','2018-11-20 20:45:46.000000',3,4),(28,'00:10:00','2018-01-11','12:10:00','12:20:00','2018-11-20 20:53:42.000000','2018-11-20 20:53:42.000000',3,4),(29,'00:01:03','2018-10-20','20:27:00','20:28:00','2018-11-20 22:28:22.000000','2018-11-20 22:28:22.000000',3,4),(30,'00:09:53','2018-10-20','21:33:00','21:33:00','2018-11-20 23:33:39.000000','2018-11-20 23:33:39.000000',3,4),(31,'00:10:47','2018-10-20','21:33:00','21:34:00','2018-11-20 23:34:42.000000','2018-11-20 23:34:42.000000',3,4),(32,'00:00:03','2018-10-20','21:35:00','21:35:00','2018-11-20 23:35:07.000000','2018-11-20 23:35:07.000000',3,4),(33,'00:10:00','2018-10-20','21:37:00','21:37:00','2018-11-20 23:37:24.000000','2018-11-20 23:37:24.000000',3,4),(34,'00:02:00','2018-10-20','21:45:00','21:47:00','2018-11-20 23:48:00.000000','2018-11-20 23:48:00.000000',3,4),(35,'00:02:00','2018-10-20','21:56:00','21:56:00','2018-11-20 23:56:36.000000','2018-11-20 23:56:36.000000',3,4),(36,'00:01:21','2018-10-21','22:32:00','22:34:00','2018-11-21 00:34:14.000000','2018-11-21 00:34:14.000000',3,4),(37,'00:01:00','2018-10-21','19:59:00','19:59:00','2018-11-21 21:59:26.000000','2018-11-21 21:59:26.000000',3,4),(39,'00:01:00','2018-10-22','22:30:00','22:30:00','2018-11-22 00:30:24.000000','2018-11-22 00:30:24.000000',3,4),(40,'00:01:00','2018-10-22','13:20:00','13:20:00','2018-11-22 15:20:23.000000','2018-11-22 15:20:23.000000',4,4),(41,'00:01:00','2018-10-22','13:31:00','13:31:00','2018-11-22 15:31:07.000000','2018-11-22 15:31:07.000000',4,4);
/*!40000 ALTER TABLE `times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('A','I') DEFAULT 'A',
  `permission` enum('A','C') DEFAULT 'A',
  `payment_by_hours` decimal(13,2) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `info` text,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Matheus Shirakawa','matheus_shirakawa@outlook.com','$2y$10$TMrC/0DJvGhbI2DzZnYDV.toCyFGmZTZFsnHzRcV.6MbGhyo3IOMa','Administrador','004413201811225bf617fd8f796.png','A','A',40.00,'(18) 99645-4946','Formado em Analise e Desenvolvimento de Sistemas na Fatec de Presidente Prudente, Trabalha na area de TI com especialização em web, com o conhecimento nas demais tecnologias como, html, css javascript, jQuery, magenta, Wordpress, php, mysql',NULL,'2018-11-18 23:02:48','2018-11-22 03:06:51'),(6,'Wellington Da Silva','welligton@gmail.com',NULL,'Programador','004332201811225bf617d44cccc.png','A','C',35.00,'(18) 99955-5555','Formado em Analise e Desenvolvimento de Sistemas na Fatec de Presidente Prudente, Trabalha na area de TI com especialização em web, com o conhecimento nas demais tecnologias como, html, css javascript, jQuery, magenta, Wordpress, php, mysql',NULL,'2018-11-22 02:43:32','2018-11-22 02:43:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-22 19:51:12
