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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (5,'index exemplo.html','181556201811205bf46b7c43a28.html','2018-11-20 20:15:56.000000','2018-11-20 20:15:56.000000','html.png',3,4),(11,'trabalho.pdf','183725201811205bf4708534d1c.pdf','2018-11-20 20:37:25.000000','2018-11-20 20:37:25.000000','pdf.png',3,4),(12,'teste.xml','183756201811205bf470a487dbd.xml','2018-11-20 20:37:56.000000','2018-11-20 20:37:56.000000','xml.png',3,4),(13,'teste.xml','184539201811205bf47273bcb2f.xml','2018-11-20 20:45:39.000000','2018-11-20 20:45:39.000000','xml.png',3,4),(15,'etaease.txt','192053201811205bf47ab539b71.txt','2018-11-20 21:20:53.000000','2018-11-20 21:20:53.000000','txt.png',3,4),(16,'taesaeasei.png','195113201811205bf481d141822.png','2018-11-20 21:51:13.000000','2018-11-20 21:51:13.000000','png.png',3,4),(20,'ts.txt','223528201811215bf5f9d01b9f9.txt','2018-11-22 00:35:28.000000','2018-11-22 00:35:28.000000','txt.png',3,4),(21,'areasse.png','230919201811215bf601bf21a8b.png','2018-11-22 01:09:19.000000','2018-11-22 01:09:19.000000','png.png',3,4),(33,'arquivo.png','212121201811265bfc7ff1e4311.png','2018-11-26 23:21:21.000000','2018-11-26 23:21:21.000000','png.png',9,4),(34,'documentacao.txt','201657201811305c01b6d983939.txt','2018-11-30 22:16:57.000000','2018-11-30 22:16:57.000000','txt.png',13,4),(35,'arquivo.txt','145211201812025c040dbbeea1a.txt','2018-12-02 16:52:12.000000','2018-12-02 16:52:12.000000','txt.png',12,4);
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
  `value` decimal(9,2) NOT NULL,
  `date_ini` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `additional_costs` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financials`
--

LOCK TABLES `financials` WRITE;
/*!40000 ALTER TABLE `financials` DISABLE KEYS */;
INSERT INTO `financials` VALUES (3,8,10000.00,'2018-11-18 21:08:25','2018-12-01 00:00:00',NULL,'2018-12-02 18:27:43',800.00),(4,9,18000.00,'2018-11-22 00:36:07','2018-12-28 00:00:00',NULL,'2018-11-30 20:35:32',NULL),(5,10,10000.00,'2018-11-30 20:11:25','2019-01-31 00:00:00',NULL,'2018-12-01 16:52:00',NULL),(6,11,20000.00,'2018-12-02 15:36:04','2018-12-03 00:00:00',NULL,'2018-12-02 17:36:21',NULL),(7,12,12000.00,'2018-12-02 16:21:34','2019-01-05 00:00:00',NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (7,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit erat tortor, convallis sollicitudin purus dictum ac. Maecenas eu nibh metus. Morbi sodales vulputate vulputate. Nunc euismod lacus et tortor hendrerit, eu ornare ante eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse consequat lectus eu mauris placerat iaculis. Maecenas pulvinar lorem sed scelerisque varius. Suspendisse nec tortor ac urna volutpat blandit. Nulla aliquet tempor risus sit amet ultricies. Nam interdum eros augue, sed ultrices ante efficitur quis. Donec a posuere ligula.',3,4,'2018-11-20 21:55:43.000000','2018-11-20 21:55:43.000000'),(8,'Pellentesque mauris augue, viverra vel orci id, pulvinar vehicula mauris. Nullam porta dui vitae dolor condimentum congue. Sed elementum risus augue, vel cursus nunc gravida id. Proin sit amet sollicitudin nisl, non congue libero. Praesent pulvinar, velit eget ornare efficitur, lacus risus auctor eros, id ullamcorper libero purus ut lacus. Aliquam non diam egestas, scelerisque lorem a, fermentum dui. Nullam sagittis in tellus eu aliquam. Quisque tincidunt cursus sapien, in malesuada diam pulvinar vitae. Nunc faucibus quis urna a consequat. Proin ultrices nunc pulvinar nibh egestas, non venenatis arcu sodales. Fusce faucibus volutpat lorem eu vehicula. Donec in elit dui.',3,4,'2018-11-20 21:57:14.000000','2018-11-20 21:57:14.000000'),(11,'ullamcorper libero purus ut lacus. Aliquam non diam egestas, scelerisque lorem a, fermentum dui. Nullam sagittis in tellus eu aliquam. Quisque tincidunt cursus sapien, in malesuada diam p',3,4,'2018-12-01 04:34:52.000000','2018-11-22 01:27:52.000000'),(18,'Sed vel turpis vel eros venenatis vehicula a at quam. Curabitur pulvinar eros quis eleifend semper. In sit amet ante vel nisl accumsan faucibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras non elit sed nisi mollis pulvinar sed non ipsum. Donec ut dapibus est. Phasellus efficitur vel lorem quis laoreet. Nullam imperdiet sapien vel blandit vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',9,4,'2018-12-01 05:12:12.000000','2018-11-25 21:08:14.000000'),(25,'o laboris nisi ut aliquip ex ea commodo\n    consequat. Duis aute irure dolor in reprehenderit in volupt',9,7,'2018-12-02 17:32:38.000000','2018-11-27 01:03:34.000000'),(26,'cididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n    consequat. Duis aute irure dolor i',9,7,'2018-12-02 17:32:46.000000','2018-11-27 01:31:07.000000'),(27,'teuayeyuahsiehauoehaoueha iashufohudfhaoduhfoaue',11,4,'2018-11-27 23:24:40.000000','2018-11-27 23:24:17.000000'),(29,'aejseuaseha dinheiros',11,4,'2018-11-27 23:24:48.000000','2018-11-27 23:24:30.000000'),(30,'os documentos estao em anexo',13,4,'2018-11-30 22:16:34.000000','2018-11-30 22:16:34.000000'),(31,'Anotacao teste',3,4,'2018-12-01 23:44:13.000000','2018-12-01 23:44:13.000000'),(32,'adicionando notacao teste',3,4,'2018-12-01 23:45:28.000000','2018-12-01 23:45:28.000000'),(33,'anotacao teste 1',12,4,'2018-12-02 17:20:14.000000','2018-12-02 17:13:12.000000');
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
  `project_price` decimal(9,2) DEFAULT NULL,
  `additional_costs` decimal(9,2) DEFAULT NULL,
  `status` enum('A','I') DEFAULT 'A',
  `project_type` enum('I','E') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (8,'Fabrique Biju','Ana Claudia da Silva','2018-12-01','40:00:00',10000.00,800.00,'A','I','2018-11-18 23:08:25','2018-12-02 18:27:43'),(9,'Projeto Entregar TCC','Bancada Fatec','2018-12-28','20:00:00',18000.00,NULL,'A','I','2018-11-22 02:36:07','2018-11-30 20:35:32'),(10,'Yeah Gaming','Camila mamacita do global','2019-01-31','20:00:00',10000.00,NULL,'A','E','2018-11-30 22:11:25','2018-12-01 16:52:00'),(11,'Novo Projeto','Fatec Prudente','2018-12-03','20:00:00',20000.00,NULL,'A','E','2018-12-02 17:36:04','2018-12-02 17:36:21'),(12,'New Project','Fatec Prudente SP','2019-01-05','80:00:00',12000.00,900.00,'A','I','2018-12-02 18:21:34','2018-12-02 18:21:34');
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
INSERT INTO `projects_has_users` VALUES (8,4),(9,4),(10,4),(11,4),(12,4),(8,6),(9,6),(8,7),(9,7),(11,7),(12,7),(8,8),(10,8),(11,10);
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (3,'HTML e CSS','Realizar o desenvolvimento das paginas do site www.fabriquebiju.com.br utilizando as tecnologias de frontend de acordo com as normas da w3c e boas práticas tanto de front como quando for utilizar o backend','10:00:00','C','2018-11-12','2018-11-23',8,'2018-11-18 23:09:57','2018-11-29 00:40:17'),(4,'Corrigir documentacao','ambos os colaboradores do projeto devem corrigir toda a documentação do sistema e entregar no prazo passado','10:00:00','I','2018-11-21','2018-11-29',9,'2018-11-22 03:21:04','2018-12-02 03:31:34'),(9,'Tarefa teste','teste','20:00:00','I','2018-11-13','2018-11-30',9,'2018-11-25 20:08:37','2018-12-02 17:27:15'),(10,'Tarefa teste paranaue','testando 123','06:00:00','C','2018-10-06','2018-11-29',9,'2018-11-27 23:17:40','2018-11-29 20:28:09'),(11,'tarefa teste final 2','essa é uma tarefa teste 2','20:00:00','C','2018-11-29','2018-12-04',9,'2018-11-27 23:19:29','2018-11-29 20:27:10'),(12,'Analise e criação do briefing de desenvolvimento','deve-se criar todos os documentos e anexar na tarefa','10:00:00','I','2018-11-30','2018-12-03',10,'2018-11-30 22:12:56','2018-12-02 16:47:21'),(13,'Divisao de tarefas','deve-se dividir todas as tarefas apontadas e documentar a mesma','05:00:00','C','2018-11-30','2018-12-06',10,'2018-11-30 22:15:19','2018-12-02 03:24:25'),(14,'Testar Site','os colaboradores devem testar o site, em prol de realizar a melhor entrega possivel','02:00:00','I','2018-12-15','2018-12-29',8,'2018-12-01 14:39:15','2018-12-01 16:59:51'),(15,'Nova Tarefa','teste da tarefa','50:00:00',NULL,'2018-12-02','2018-12-03',11,'2018-12-02 17:38:01','2018-12-02 17:38:01');
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
INSERT INTO `tasks_has_users` VALUES (3,4),(10,4),(11,4),(12,4),(14,4),(15,4),(14,6),(4,7),(9,7),(10,7),(14,7),(12,8),(13,8),(14,8),(15,10);
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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `times`
--

LOCK TABLES `times` WRITE;
/*!40000 ALTER TABLE `times` DISABLE KEYS */;
INSERT INTO `times` VALUES (17,'00:10:00','2018-11-28','10:20:00','10:30:00','2018-11-20 01:01:29.000000','2018-11-20 01:01:29.000000',3,4),(18,'00:10:00','2018-11-28','10:20:00','10:30:00','2018-11-20 01:02:10.000000','2018-11-20 01:02:10.000000',3,4),(26,'00:10:00','2018-09-11','15:20:00','15:30:00','2018-11-20 20:40:18.000000','2018-11-20 20:40:18.000000',3,4),(27,'00:10:00','2018-09-11','15:20:00','15:30:00','2018-11-20 20:45:46.000000','2018-11-20 20:45:46.000000',3,4),(28,'00:10:00','2018-01-11','12:10:00','12:20:00','2018-11-20 20:53:42.000000','2018-11-20 20:53:42.000000',3,4),(29,'00:01:03','2018-10-20','20:27:00','20:28:00','2018-11-20 22:28:22.000000','2018-11-20 22:28:22.000000',3,4),(30,'00:09:53','2018-10-20','21:33:00','21:33:00','2018-11-20 23:33:39.000000','2018-11-20 23:33:39.000000',3,4),(31,'00:10:47','2018-10-20','21:33:00','21:34:00','2018-11-20 23:34:42.000000','2018-11-20 23:34:42.000000',3,4),(32,'00:00:03','2018-10-20','21:35:00','21:35:00','2018-11-20 23:35:07.000000','2018-11-20 23:35:07.000000',3,4),(33,'00:10:00','2018-10-20','21:37:00','21:37:00','2018-11-20 23:37:24.000000','2018-11-20 23:37:24.000000',3,4),(34,'00:02:00','2018-10-20','21:45:00','21:47:00','2018-11-20 23:48:00.000000','2018-11-20 23:48:00.000000',3,4),(35,'00:02:00','2018-10-20','21:56:00','21:56:00','2018-11-20 23:56:36.000000','2018-11-20 23:56:36.000000',3,4),(36,'00:01:21','2018-10-21','22:32:00','22:34:00','2018-11-21 00:34:14.000000','2018-11-21 00:34:14.000000',3,4),(37,'00:01:00','2018-10-21','19:59:00','19:59:00','2018-11-21 21:59:26.000000','2018-11-21 21:59:26.000000',3,4),(39,'00:01:00','2018-10-22','22:30:00','22:30:00','2018-11-22 00:30:24.000000','2018-11-22 00:30:24.000000',3,4),(47,'00:20:00','2018-11-12','18:00:00','18:20:00','2018-11-27 02:30:59.000000','2018-11-25 20:09:12.000000',9,7),(48,'04:10:00','2018-11-25','12:30:00','16:40:00','2018-11-27 01:39:38.000000','2018-11-25 21:07:04.000000',9,7),(49,'02:19:00','2018-10-26','19:00:00','21:19:00','2018-11-26 23:19:46.000000','2018-11-26 23:19:46.000000',9,4),(50,'00:01:00','2018-10-27','23:41:00','23:41:00','2018-11-27 01:41:34.000000','2018-11-27 01:41:34.000000',9,7),(51,'00:01:00','2018-10-27','18:07:00','18:08:00','2018-11-27 20:08:51.000000','2018-11-27 19:47:35.000000',4,4),(52,'00:10:00','2018-11-27','15:20:00','15:30:00','2018-11-27 19:47:37.000000','2018-11-27 19:47:37.000000',4,4),(53,'00:10:00','2018-11-27','15:20:00','15:30:00','2018-11-27 19:48:35.000000','2018-11-27 19:48:35.000000',4,4),(54,'00:50:00','2018-11-27','15:50:00','16:40:00','2018-11-27 20:22:20.000000','2018-11-27 19:53:04.000000',4,4),(55,'00:30:00','2018-11-06','13:20:00','13:50:00','2018-11-27 20:22:35.000000','2018-11-27 20:22:35.000000',4,4),(56,'01:10:00','2018-11-27','13:00:00','14:10:00','2018-11-27 23:20:27.000000','2018-11-27 23:20:27.000000',11,4),(57,'00:20:00','2018-10-27','21:00:00','21:20:00','2018-11-27 23:24:10.000000','2018-11-27 23:20:35.000000',11,4),(58,'01:01:00','2018-10-29','17:05:00','18:06:00','2018-11-29 20:06:06.000000','2018-11-29 20:06:06.000000',9,4),(59,'00:01:00','2018-10-29','18:28:00','18:28:00','2018-11-29 20:28:19.000000','2018-11-29 20:28:19.000000',10,4),(60,'01:01:00','2018-10-30','11:58:00','12:59:00','2018-11-30 14:59:08.000000','2018-11-30 14:59:08.000000',9,4),(61,'00:01:00','2018-11-30','20:15:00','20:17:00','2018-11-30 22:18:44.000000','2018-11-30 22:18:44.000000',13,4),(62,'00:02:00','2018-11-30','20:19:00','20:21:00','2018-11-30 22:23:18.000000','2018-11-30 22:23:18.000000',13,4),(63,'01:50:00','2018-11-29','08:40:00','10:30:00','2018-11-30 22:27:35.000000','2018-11-30 22:27:35.000000',13,4),(64,'00:01:00','2018-10-30','20:30:00','20:30:00','2018-11-30 22:30:30.000000','2018-11-30 22:30:30.000000',12,8),(65,'00:01:00','2018-12-02','14:50:00','14:50:00','2018-12-02 16:50:34.000000','2018-11-30 23:05:34.000000',12,4),(66,'00:12:00','2018-11-01','03:21:00','03:21:00','2018-12-01 05:21:37.000000','2018-12-01 05:21:37.000000',9,4),(67,'03:10:00','2018-12-01','08:20:00','11:30:00','2018-12-01 14:42:46.000000','2018-12-01 14:42:46.000000',14,8),(68,'09:00:00','2018-11-30','08:50:00','17:50:00','2018-12-01 14:44:40.000000','2018-12-01 14:44:40.000000',14,8),(69,'09:00:00','2018-11-29','08:50:00','17:50:00','2018-12-01 14:44:53.000000','2018-12-01 14:44:41.000000',14,8),(71,'00:01:00','2018-11-02','01:24:00','01:25:00','2018-12-02 03:25:28.000000','2018-12-02 03:25:28.000000',13,4),(73,'00:01:00','2018-12-02','14:50:00','14:50:00','2018-12-02 16:50:53.000000','2018-12-02 16:50:53.000000',12,4),(74,'00:01:00','2018-12-02','14:51:00','14:51:00','2018-12-02 16:51:50.000000','2018-12-02 16:51:50.000000',12,4),(75,'00:01:00','2018-12-02','15:12:00','15:12:00','2018-12-02 17:12:48.000000','2018-12-02 17:12:48.000000',12,4),(76,'00:10:00','2018-12-02','15:20:00','15:30:00','2018-12-02 17:13:02.000000','2018-12-02 17:13:02.000000',12,4),(77,'00:01:00','2018-12-02','15:30:00','15:30:00','2018-12-02 17:30:24.000000','2018-12-02 17:30:24.000000',9,7),(78,'01:12:00','2018-12-24','10:05:00','11:17:00','2018-12-02 17:30:44.000000','2018-12-02 17:30:44.000000',9,7),(79,'00:01:00','2018-12-02','15:30:00','15:31:00','2018-12-02 17:31:15.000000','2018-12-02 17:31:15.000000',9,7);
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
  `payment_by_hours` decimal(9,2) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `info` text,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Matheus Shirakawa','matheus_shirakawa@outlook.com','$2y$10$TMrC/0DJvGhbI2DzZnYDV.toCyFGmZTZFsnHzRcV.6MbGhyo3IOMa','Administrador','004413201811225bf617fd8f796.png','A','A',40.00,'(18) 99645-4946','Formado em Analise e Desenvolvimento de Sistemas na Fatec de Presidente Prudente, Trabalha na area de TI com especialização em web, com o conhecimento nas demais tecnologias como, html, css javascript, jQuery, magenta, Wordpress, php, mysql','4Bk1yg2fsiUt13q1iGw3qlfegI9OqM6sL3Jv668TadJdjMb42sYaKZGDXbyk','2018-11-18 23:02:48','2018-11-22 03:06:51'),(6,'Wellington Da Silva','welligton@gmail.com',NULL,'Programador','004332201811225bf617d44cccc.png','A','C',35.00,'(18) 99955-5555','Formado em Analise e Desenvolvimento de Sistemas na Fatec de Presidente Prudente, Trabalha na area de TI com especialização em web, com o conhecimento nas demais tecnologias como, html, css javascript, jQuery, magenta, Wordpress, php, mysql',NULL,'2018-11-22 02:43:32','2018-11-22 02:43:32'),(7,'Marcos','marcos@hotmail.com','$2y$10$QgfNtpkNJQeraGHbezTHI./T.zfAAji2sJGLqzyb1ZqvNifejmpP2','Programador','131857201811255bfabd6121c6b.png','A','C',30.00,'(18) 99955-4444','Formado em Analise e Desenvolvimento de Sistemas na Fatec de Presidente Prudente, Trabalha na area de TI com especialização em web, com o conhecimento nas demais tecnologias como, html, css javascript, jQuery, magenta, Wordpress, php, mysql','0d9Zo7uccyS2s8M7ysRE7jyTwdtZLD2im79bz2s0YySeVcIEL1gsDbtIOTnv','2018-11-25 15:18:57','2018-12-01 04:28:08'),(8,'Daiane Piccolo','daiane@gmail.com','$2y$10$40nqLsDgehBE8G5jjiUsPOH5.AV/Gke7f/Wjg20/fNv4eGPNk6cEa','Gerente de Projetos','200837201811305c01b4e5d5714.png','A','C',20.00,'(11)34765-575','Mestre em ciencia da computacao','iuFvrpAq8IB3PTc3pqaEK7S0isX8OVDHl1kO9B74DcVEltGj6UeUzEmWxS7R','2018-11-30 22:06:31','2018-12-02 17:22:27'),(10,'Alberto','alberto@gmail.com','$2y$10$OU/9tNaOjAbosp36V73Kd.UioiYjxSlQSzrJVkTnOuoQe0sAarhIy','Programador',NULL,'A','C',20.00,'(18)99995-5555','formado em analise e desenvolvimento na fatec','h1vtGySyDK6GmjRFVVZeUj2jlT8qRa0m0gQroIxdJXcqJmQkegqoPEEXPN74','2018-12-02 03:47:38','2018-12-02 04:12:29');
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

-- Dump completed on 2018-12-02 19:56:35
