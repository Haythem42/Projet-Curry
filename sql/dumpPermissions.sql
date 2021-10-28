-- MariaDB dump 10.19  Distrib 10.5.11-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: pompiers
-- ------------------------------------------------------
-- Server version	10.5.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `showUsers` tinyint(1) DEFAULT NULL,
  `createUsers` tinyint(1) DEFAULT NULL,
  `modifyUsers` tinyint(1) DEFAULT NULL,
  `deleteUsers` tinyint(1) DEFAULT NULL,
  `showPermissions` tinyint(1) DEFAULT NULL,
  `createPermissions` tinyint(1) DEFAULT NULL,
  `modifyPermissions` tinyint(1) DEFAULT NULL,
  `deletePermissions` tinyint(1) DEFAULT NULL,
  `showPompiers` tinyint(1) DEFAULT NULL,
  `createPompiers` tinyint(1) DEFAULT NULL,
  `modifyPompiers` tinyint(1) DEFAULT NULL,
  `deletePompiers` tinyint(1) DEFAULT NULL,
  `showCasernes` tinyint(1) DEFAULT NULL,
  `createCasernes` tinyint(1) DEFAULT NULL,
  `modifyCasernes` tinyint(1) DEFAULT NULL,
  `deleteCasernes` tinyint(1) DEFAULT NULL,
  `roleId` int(11) DEFAULT NULL,
  KEY `roleId` (`roleId`),
  CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),(0,0,0,0,0,0,0,0,1,1,1,1,0,0,0,0,2),(0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,3),(0,0,0,0,0,0,0,0,1,1,0,0,1,1,0,0,4);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-27 21:50:30
