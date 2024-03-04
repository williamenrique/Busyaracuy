CREATE DATABASE  IF NOT EXISTS `db_dashboard` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `db_dashboard`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: db_dashboard
-- ------------------------------------------------------
-- Server version	5.7.29-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `table_cargo`
--

DROP TABLE IF EXISTS `table_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_cargo` (
  `cargo_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  PRIMARY KEY (`cargo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_cargo`
--

LOCK TABLES `table_cargo` WRITE;
/*!40000 ALTER TABLE `table_cargo` DISABLE KEYS */;
INSERT INTO `table_cargo` VALUES (1,'Administrador','Administrador del sistema',1,NULL),(2,'Encargado','Personal asistente',1,NULL),(3,'Cliente','Persona ajena al sistema',1,NULL);
/*!40000 ALTER TABLE `table_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_log`
--

DROP TABLE IF EXISTS `table_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_idUser` int(11) DEFAULT NULL,
  `log_descripcion` text CHARACTER SET utf8,
  `log_comando` text CHARACTER SET utf8,
  `log_fecha` date DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `log_idUser_idx` (`log_idUser`),
  CONSTRAINT `log_idUser` FOREIGN KEY (`log_idUser`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_log`
--

LOCK TABLES `table_log` WRITE;
/*!40000 ALTER TABLE `table_log` DISABLE KEYS */;
INSERT INTO `table_log` VALUES (1,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 20',NULL),(2,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 19',NULL),(3,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 21',NULL),(4,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 18',NULL),(5,1,'/index.php1','UPDATE table_user SET user_status = ? WHERE user_id = 16',NULL),(6,1,'/index.php22','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(7,1,'/index.php23','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL),(8,1,'/index.php24','INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)',NULL);
/*!40000 ALTER TABLE `table_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_menu`
--

DROP TABLE IF EXISTS `table_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_menu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `icono` text COLLATE utf8_spanish_ci,
  `status` int(11) DEFAULT NULL,
  `page_menu_open` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `page_link` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_menu`
--

LOCK TABLES `table_menu` WRITE;
/*!40000 ALTER TABLE `table_menu` DISABLE KEYS */;
INSERT INTO `table_menu` VALUES (1,'Usuario',NULL,'far fa-user',1,'usuario','usuarios'),(2,'Menu',NULL,'fas fa-list-ul',1,'menu','menus'),(3,'Timeline',NULL,'far fa-clock',1,'time','times'),(4,NULL,NULL,'',NULL,NULL,NULL);
/*!40000 ALTER TABLE `table_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_menu_sub_menu`
--

DROP TABLE IF EXISTS `table_menu_sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_menu_sub_menu` (
  `id_menu_sub_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu_sub_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_menu_sub_menu`
--

LOCK TABLES `table_menu_sub_menu` WRITE;
/*!40000 ALTER TABLE `table_menu_sub_menu` DISABLE KEYS */;
INSERT INTO `table_menu_sub_menu` VALUES (1,1,1),(2,1,2),(3,1,3),(4,2,4),(5,3,5),(15,2,8);
/*!40000 ALTER TABLE `table_menu_sub_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_roles`
--

DROP TABLE IF EXISTS `table_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol_descripcion` text COLLATE utf8_spanish_ci,
  `rol_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_roles`
--

LOCK TABLES `table_roles` WRITE;
/*!40000 ALTER TABLE `table_roles` DISABLE KEYS */;
INSERT INTO `table_roles` VALUES (1,'Administrador','administrador',1),(2,'Encargado','encargado del sistema',1),(3,'Secretaria','encargada de las citas',1);
/*!40000 ALTER TABLE `table_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_roles_sub_menu`
--

DROP TABLE IF EXISTS `table_roles_sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_roles_sub_menu` (
  `id_rol_sub_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rol_sub_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_roles_sub_menu`
--

LOCK TABLES `table_roles_sub_menu` WRITE;
/*!40000 ALTER TABLE `table_roles_sub_menu` DISABLE KEYS */;
INSERT INTO `table_roles_sub_menu` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(16,1,8),(17,2,2),(18,2,3),(19,2,8),(20,2,5),(21,3,2),(22,3,8),(23,3,5);
/*!40000 ALTER TABLE `table_roles_sub_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_sub_menu`
--

DROP TABLE IF EXISTS `table_sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_sub_menu` (
  `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sub_menu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `url` text COLLATE utf8_spanish_ci,
  `status` int(11) DEFAULT NULL,
  `page_link_activo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_sub_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_sub_menu`
--

LOCK TABLES `table_sub_menu` WRITE;
/*!40000 ALTER TABLE `table_sub_menu` DISABLE KEYS */;
INSERT INTO `table_sub_menu` VALUES (1,'Roles',NULL,'roles',1,'roles'),(2,'Lista de Usuarios',NULL,'usuarios',1,'user'),(3,'Usuarios de Alta',NULL,'Usuarios/alta',1,'alta'),(4,'Asignar menu',NULL,'menu',1,'menu'),(5,'Timeline',NULL,'timeline',1,'time'),(8,'Lista menu',NULL,'Menu/lista',1,'lista');
/*!40000 ALTER TABLE `table_sub_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_timeline`
--

DROP TABLE IF EXISTS `table_timeline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_timeline` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_idUser` int(11) DEFAULT NULL,
  `time_codigo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `time_fecha` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `time_inicio` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `time_fin` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_timeline`
--

LOCK TABLES `table_timeline` WRITE;
/*!40000 ALTER TABLE `table_timeline` DISABLE KEYS */;
INSERT INTO `table_timeline` VALUES (2,1,'biCod-1-0r7u','2020-10-19','04:15:58','0'),(3,2,'biCod-2-cMg5','2020-10-19','05:23:01','05:25:13'),(4,1,'biCod-1-wrZY','2020-10-19','05:25:25',NULL),(5,1,'biCod-1-P5MK','2020-10-21','02:54:09',NULL);
/*!40000 ALTER TABLE `table_timeline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_user`
--

DROP TABLE IF EXISTS `table_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ci` int(11) DEFAULT NULL,
  `user_nick` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_pass` text COLLATE utf8_spanish_ci,
  `user_nombres` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_apellidos` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_tlf` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_rol` int(11) DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `user_img` text COLLATE utf8_spanish_ci,
  `user_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_ruta` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_user`
--

LOCK TABLES `table_user` WRITE;
/*!40000 ALTER TABLE `table_user` DISABLE KEYS */;
INSERT INTO `table_user` VALUES (1,14607920,'we21','SWRrSEFnUHpvYm1kRVg4bVBjTEZKQT09','William Enrique','Infante Parra','william@gmail.com','4125181629',1,1,NULL,'2020-10-08 22:11:07',NULL),(2,15769775,'ybet','SWRrSEFnUHpvYm1kRVg4bVBjTEZKQT09','Ybet Nacari','Acosta','ybet.naca@gmail.com','4120586489',3,1,NULL,'2020-10-08 22:14:15',NULL),(3,12345,'migue','SWRrSEFnUHpvYm1kRVg4bVBjTEZKQT09','Miguel Jose','Romero','romero@hotmail.com','12345678',2,1,NULL,'2020-10-18 20:11:13',NULL),(14,157697755,'YA-014','SWRrSEFnUHpvYm1kRVg4bVBjTEZKQT09','Ybet','Acosta','acosta@hotmail.com','345678',1,1,NULL,'2020-10-18 20:12:31',NULL),(15,123456,'JR-015','SWRrSEFnUHpvYm1kRVg4bVBjTEZKQT09','Jose Gregorio','Rengel','rengel@gmail.com','2345678',2,1,'default.png','2020-10-18 20:11:13',NULL),(16,34567,'HU-016','bnp4T0JTMDM2UmxETlllb2RGZmVLdz09','Hgygbyug','Uugug','gg@j.com','3456789',1,0,'default.png','2020-10-17 22:53:32',NULL),(17,34567545,'HU-017','YWpDOG9sL3M4aitFWHIzK1FRdTROUT09','Hgygbyug','Uugug','g4g@j.com','3456789',1,0,'default.png','2020-10-17 17:24:36',NULL),(18,9999999,'JB-018','OEJJc1hTVmRQd1l3ZWM4eFB4YVVVdz09','Jbhjbhjb','Bbub','h@jk.com','56789',1,0,'default.png','2020-10-17 22:53:28',NULL),(19,0,'UY-019','UmsyU3hkWnE4KzJLeWZyY0FjNW9VQT09','Ugyy','Ygyg','g@g.com','4567890',1,0,'default.png','2020-10-17 18:04:02',NULL),(20,111111,'BH-020','U1hueUswZ2dmZUQyc3Q0aTdqa2NNdz09','Bhb','Hvhv','hhhhhhh@q.com','456789',1,0,'default.png','2020-10-17 18:03:55',NULL),(21,798778,'KJ-021','QmNVTSt2TjhNUnE4UXNmSlRablBkQT09','Knjb','Jbhjbhb','r@h.com','465',1,0,'default.png','2020-10-17 22:53:24',NULL),(22,67898,'JG-022','UVBma093WEdZeEFtU2l5S1ZTT0Q1dz09','Jesus Enrique','Gilberto','gil@gmail.com','876545678',3,1,'default.png','2020-10-18 00:12:15',NULL),(23,6765544,'OH-023','ZWVoMXZqVkp6dm5QRFhHVFZnUHdtUT09','Oihiuhiuh Nihihi','Hhiuh','ghghg@hotmail.com','45678',2,1,'default.png','2020-10-18 00:14:47',NULL),(24,787878,'QK-024','N1lRZHc0bU45TlR5UVh6ZVFoMElydz09','Qqqq','Kkk','qk@hotmail.com','76575756',1,1,'default.png','2020-10-18 00:15:47',NULL);
/*!40000 ALTER TABLE `table_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_user_rol`
--

DROP TABLE IF EXISTS `table_user_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_user_rol` (
  `id_usuario_rol` int(11) NOT NULL AUTO_INCREMENT,
  `user_nick` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_user_rol`
--

LOCK TABLES `table_user_rol` WRITE;
/*!40000 ALTER TABLE `table_user_rol` DISABLE KEYS */;
INSERT INTO `table_user_rol` VALUES (1,'we21',1),(2,'migue',2),(3,'ybet1',3),(4,'ybet',3);
/*!40000 ALTER TABLE `table_user_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_carga_menu`
--

DROP TABLE IF EXISTS `v_carga_menu`;
/*!50001 DROP VIEW IF EXISTS `v_carga_menu`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_carga_menu` AS SELECT 
 1 AS `login`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `rol_id`,
 1 AS `rol_name`,
 1 AS `id_menu`,
 1 AS `nombre_menu`,
 1 AS `icono`,
 1 AS `page_menu_open`,
 1 AS `page_link`,
 1 AS `id_sub_menu`,
 1 AS `nombre_sub_menu`,
 1 AS `url`,
 1 AS `page_link_activo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_submenu`
--

DROP TABLE IF EXISTS `v_submenu`;
/*!50001 DROP VIEW IF EXISTS `v_submenu`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_submenu` AS SELECT 
 1 AS `id_menu`,
 1 AS `id_sub_menu`,
 1 AS `nombre_sub_menu`,
 1 AS `url`,
 1 AS `page_link_activo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_timeline`
--

DROP TABLE IF EXISTS `v_timeline`;
/*!50001 DROP VIEW IF EXISTS `v_timeline`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_timeline` AS SELECT 
 1 AS `login`,
 1 AS `nombres`,
 1 AS `apellidos`,
 1 AS `rol`,
 1 AS `id`,
 1 AS `codigo`,
 1 AS `fecha`,
 1 AS `inicio`,
 1 AS `fin`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_carga_menu`
--

/*!50001 DROP VIEW IF EXISTS `v_carga_menu`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_carga_menu` AS (select `a`.`user_nick` AS `login`,`a`.`user_nombres` AS `nombres`,`a`.`user_apellidos` AS `apellidos`,`f`.`rol_id` AS `rol_id`,`f`.`rol_name` AS `rol_name`,`e`.`id_menu` AS `id_menu`,`e`.`nombre_menu` AS `nombre_menu`,`e`.`icono` AS `icono`,`e`.`page_menu_open` AS `page_menu_open`,`e`.`page_link` AS `page_link`,`g`.`id_sub_menu` AS `id_sub_menu`,`g`.`nombre_sub_menu` AS `nombre_sub_menu`,`g`.`url` AS `url`,`g`.`page_link_activo` AS `page_link_activo` from ((((((`table_user` `a` join `table_user_rol` `b`) join `table_roles_sub_menu` `c`) join `table_menu_sub_menu` `d`) join `table_menu` `e`) join `table_roles` `f`) join `table_sub_menu` `g`) where ((`a`.`user_nick` = `b`.`user_nick`) and (`b`.`id_rol` = `f`.`rol_id`) and (`f`.`rol_id` = `c`.`id_rol`) and (`c`.`id_sub_menu` = `g`.`id_sub_menu`) and (`g`.`id_sub_menu` = `d`.`id_sub_menu`) and (`e`.`id_menu` = `d`.`id_menu`) and (`e`.`status` = 1))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_submenu`
--

/*!50001 DROP VIEW IF EXISTS `v_submenu`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_submenu` AS select `e`.`id_menu` AS `id_menu`,`g`.`id_sub_menu` AS `id_sub_menu`,`g`.`nombre_sub_menu` AS `nombre_sub_menu`,`g`.`url` AS `url`,`g`.`page_link_activo` AS `page_link_activo` from ((`table_menu_sub_menu` `d` join `table_menu` `e`) join `table_sub_menu` `g`) where ((`g`.`id_sub_menu` = `d`.`id_sub_menu`) and (`e`.`id_menu` = `d`.`id_menu`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_timeline`
--

/*!50001 DROP VIEW IF EXISTS `v_timeline`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_timeline` AS (select `a`.`user_nick` AS `login`,`a`.`user_nombres` AS `nombres`,`a`.`user_apellidos` AS `apellidos`,`b`.`rol_name` AS `rol`,`c`.`time_id` AS `id`,`c`.`time_codigo` AS `codigo`,`c`.`time_fecha` AS `fecha`,`c`.`time_inicio` AS `inicio`,`c`.`time_fin` AS `fin` from ((`table_user` `a` join `table_roles` `b`) join `table_timeline` `c`) where ((`a`.`user_rol` = `b`.`rol_id`) and (`a`.`user_id` = `c`.`time_idUser`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-22 16:25:08
