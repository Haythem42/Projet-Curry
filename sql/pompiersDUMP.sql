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
-- Table structure for table `casernes`
--

DROP TABLE IF EXISTS `casernes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casernes` (
  `NumCaserne` int(11) NOT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  `Ville` varchar(255) DEFAULT NULL,
  `CodeTypeC` int(11) DEFAULT NULL,
  PRIMARY KEY (`NumCaserne`),
  KEY `FK_typeC` (`CodeTypeC`),
  CONSTRAINT `FK_typeC` FOREIGN KEY (`CodeTypeC`) REFERENCES `typecasernes` (`CodeTypeC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casernes`
--

LOCK TABLES `casernes` WRITE;
/*!40000 ALTER TABLE `casernes` DISABLE KEYS */;
INSERT INTO `casernes` VALUES (1,'Rue Bossuet','69005','Montpellier',1),(2,'Rue Gambetta','69006','Rennes',2),(3,'Rue Barreme','69008','Bordeaux',3),(4,'Rue Duguesclin','69005','Bordeaux',1),(5,'Rue Seize','69008','Grenoble',2),(6,'Rue Barreme','69009','Rennes',3),(7,'Rue Bellecombe','69003','Lyon',1),(8,'Rue Gambetta','69004','Rennes',2),(9,'Rue Seize','69004','Saint-Etienne',3),(10,'Rue Duguesclin','69000','Rennes',1),(11,'Rue Bellecombe','69000','Nancy',2),(12,'Rue Bossuet','69009','Nancy',3),(13,'Rue Duguesclin','69006','Marseille',1),(14,'Rue Bossuet','69002','Lille',2),(15,'Rue Bossuet','69007','Paris',3),(16,'Rue Bellecombe','69000','Rennes',1),(17,'Rue Seize','69007','Montpellier',2),(18,'Rue Gambetta','69007','Grenoble',3),(19,'Rue Gambetta','69001','Strasbourg',1),(20,'Rue Barreme','69008','Strasbourg',2),(21,'Rue Duguesclin','69002','Marseille',3),(22,'Rue Duguesclin','69004','Bordeaux',1),(23,'Rue Barreme','69006','Strasbourg',2),(24,'Rue Gambetta','69007','Nancy',3),(25,'Rue Barreme','69001','NIce',1),(26,'Rue Duguesclin','69002','Nancy',2),(27,'Rue Pierre Dupont','69003','Bordeaux',3),(28,'Rue Bellecombe','69007','Grenoble',1),(29,'Rue Bellecombe','69005','Nancy',2),(30,'Rue Boileau','69001','Angers',3),(31,'Rue Pierre Dupont','69009','Saint-Etienne',1),(32,'Rue Bellecombe','69005','Saint-Etienne',2),(33,'Rue Pierre Dupont','69008','Angers',3),(34,'Rue Barrier','69004','Bordeaux',1),(35,'Rue Gambetta','69006','Rennes',2),(36,'Rue Bellecombe','69007','Grenoble',3),(37,'Rue Bellecombe','69001','Dijon',1),(38,'Rue Bossuet','69003','Tours',2),(39,'Rue Barrier','69006','Tours',3),(40,'Rue Pierre Dupont','69001','Lille',1),(41,'Rue Barrier','69005','NIce',2),(42,'Rue Barrier','69001','Angers',3),(43,'Rue Duguesclin','69003','Tours',1),(44,'Rue Barrier','69008','Caen',2),(45,'Rue Bossuet','69008','Angers',3),(46,'Rue Boileau','69008','Marseille',1),(47,'Rue Pierre Dupont','69002','Lyon',2),(48,'Rue Seize','69002','Angers',3),(49,'Rue Pierre Dupont','69004','Nancy',1),(50,'Rue Bellecombe','69002','Tours',2),(51,'Rue Bellecombe','69005','Angers',3),(52,'Rue Bellecombe','69001','Marseille',1),(53,'Rue Barreme','69001','NIce',2),(54,'Rue Bellecombe','69007','Paris',3),(55,'Rue Bossuet','69004','Marseille',1),(56,'Rue Boileau','69005','Rennes',2),(57,'Rue Barrier','69005','Tours',3),(58,'Rue Boileau','69002','Caen',1),(59,'Rue Bossuet','69006','Bordeaux',2),(60,'Rue Barrier','69000','Rennes',3),(61,'Rue Barrier','69004','Lyon',1),(62,'Rue Duguesclin','69000','Tours',2),(63,'Rue Gambetta','69000','Lille',3),(64,'Rue Bellecombe','69003','Caen',1),(65,'Rue Barrier','69006','Nante',2),(66,'Rue Barrier','69002','Angers',3),(67,'Rue Gambetta','69001','NIce',1),(68,'Rue Bellecombe','69000','Bordeaux',2),(69,'Rue Duguesclin','69003','Tours',3),(70,'Rue Boileau','69004','Dijon',1),(71,'Rue Barrier','69001','Dijon',2),(72,'Rue Duguesclin','69003','Lyon',3),(73,'Rue Seize','69007','Montpellier',1),(74,'Rue Bellecombe','69000','Bordeaux',2),(75,'Rue Boileau','69001','Rennes',3),(76,'Rue Seize','69005','Marseille',1),(77,'Rue Bellecombe','69004','Nante',2),(78,'Rue Bellecombe','69003','Dijon',3),(79,'Rue Bossuet','69007','Rennes',1),(80,'Rue Bossuet','69009','Montpellier',2),(81,'Rue Barrier','69006','Lyon',3),(82,'Rue Seize','69003','Paris',1),(83,'Rue Boileau','69006','Angers',2),(84,'Rue Gambetta','69001','NIce',3),(85,'Rue Seize','69007','Nante',1),(86,'Rue Barreme','69008','Montpellier',2),(87,'Rue Boileau','69009','Nante',3),(88,'Rue Seize','69009','Nancy',1),(89,'Rue Duguesclin','69002','Caen',2),(90,'Rue Pierre Dupont','69004','Montpellier',3),(91,'Rue Bossuet','69001','Angers',1),(92,'Rue Pierre Dupont','69006','NIce',2),(93,'Rue Pierre Dupont','69005','NIce',3),(94,'Rue Seize','69000','Lyon',1),(95,'Rue Gambetta','69000','Lille',2),(96,'Rue Boileau','69002','Lille',3),(97,'Rue Barrier','69001','Saint-Etienne',1),(98,'Rue Seize','69004','Saint-Etienne',2),(99,'Rue Boileau','69001','Angers',3),(100,'Rue Duguesclin','69006','Montpellier',1);
/*!40000 ALTER TABLE `casernes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `CodeGrade` varchar(2) NOT NULL,
  `NomGrade` varchar(15) DEFAULT NULL,
  `CoefIndem` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodeGrade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES ('1C','1ere classe',6),('AC','Adjudent chef',8),('Ad','Adjudent',8),('Ca','Caporal',7),('CC','Capo. Chef',7),('Ct','Capitaine',10),('In','Infirmier',10),('Lt','Lieutenant',10),('Ma','Major',9),('SC','Sgt Chef',8),('Sg','Sergent',8),('SP','Sapeur',6);
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pompiers`
--

DROP TABLE IF EXISTS `pompiers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pompiers` (
  `Matricule` varchar(7) NOT NULL,
  `Prenom` varchar(10) DEFAULT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `ChefAgret` varchar(1) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `NumCaserne` int(11) DEFAULT NULL,
  `CodeGrade` varchar(2) DEFAULT NULL,
  `MatriculeResponsable` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`Matricule`),
  KEY `FK_Caserne1` (`NumCaserne`),
  KEY `FK_Grade1` (`CodeGrade`),
  CONSTRAINT `FK_Caserne1` FOREIGN KEY (`NumCaserne`) REFERENCES `casernes` (`NumCaserne`),
  CONSTRAINT `FK_Grade1` FOREIGN KEY (`CodeGrade`) REFERENCES `grades` (`CodeGrade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pompiers`
--

LOCK TABLES `pompiers` WRITE;
/*!40000 ALTER TABLE `pompiers` DISABLE KEYS */;
INSERT INTO `pompiers` VALUES ('Ma0001','Luc','Drevon','N','1996-03-21',64,'1C','Ma0099'),('Ma0002','Raphael','Lejariel','O','2000-03-14',82,'Ca','Ma0099'),('Ma0004','Romain','Bouvier','N','1999-01-10',54,'Ad','Ma0099'),('Ma0030','Luc','Murolo','O','1997-02-27',99,'AC','Ma0099'),('Ma0052','Pierre','Lechevalier','N','1999-05-14',60,'Sg','Ma0030'),('Ma0081','Marc','Ricque','O','2002-10-10',47,'Ma','Ma0001'),('Ma0089','Corentin','Drevon','N','1997-12-11',50,'Ct','Ma0002'),('Ma0099','Marc','Brenner','O','2001-11-24',67,'SP','Ma0004'),('Ma0148','Quentin','Murolo','O','2000-05-30',46,'Ca','Ma0004'),('Ma0169','Mathis','Drevon','O','2005-08-23',78,'Lt','Ma0004'),('Ma0273','Mathis','Moussa','N','2005-08-18',48,'Ct','Ma0002'),('Ma0374','William','Bouvier','O','1997-10-28',9,'Ct','Ma0002'),('Ma0398','Raphael','Moussa','N','1992-06-23',76,'Lt','Ma0004'),('Ma0410','Julien','Poyeton','N','1993-06-24',25,'Ca','Ma0004'),('Ma0459','Adam','Drevon','O','2000-04-28',34,'Ct','Ma0002'),('Ma0529','Luc','Ricque','O','1999-08-29',79,'Ca','Ma0004'),('Ma0625','Quentin','Ricque','O','1999-07-25',49,'Ca','Ma0004'),('Ma0813','Jean','Fabre','O','1995-02-17',62,'CC','Ma0001'),('Ma0848','Corentin','Jacquier','N','1991-06-25',16,'Ad','Ma0030'),('Ma0872','Adam','Chavet','O','1990-07-30',92,'Lt','Ma0004'),('Ma0903','Louis','Drevon','N','1991-08-09',6,'AC','Ma0002'),('Ma0939','Flavien','Drevon','N','1991-12-17',36,'Ct','Ma0002'),('Ma0941','Alexandre','Fabre','O','2002-01-17',95,'Ct','Ma0002'),('Ma0963','Julien','Cimolato','N','2001-11-29',22,'Lt','Ma0004'),('Ma0995','Adam','Ricque','N','2000-01-14',59,'Lt','Ma0004'),('Ma1028','Haythem','Murolo','O','1997-04-15',7,'In','Ma0030'),('Ma1073','Mathieu','Lejariel','O','1995-05-19',3,'Sg','Ma0030'),('Ma1115','Corentin','Chavet','N','2004-05-08',51,'1C','Ma0001'),('Ma1145','Romain','Bouvier','N','1992-01-17',97,'In','Ma0030'),('Ma1199','Haythem','Cimolato','O','2000-12-06',50,'Sg','Ma0030'),('Ma1223','Jean','Brenner','N','1996-04-15',17,'Ct','Ma0002'),('Ma1225','Alexandre','Drevon','N','1990-09-02',5,'Ca','Ma0004'),('Ma1266','Louis','Poyeton','N','2003-10-27',64,'SP','Ma0004'),('Ma1423','Mathieu','Jacquier','N','1995-06-23',68,'1C','Ma0001'),('Ma1450','Adrien','Dumas','O','1995-06-29',29,'Ma','Ma0001'),('Ma1507','Flavien','Lechevalier','O','1991-01-10',92,'Ca','Ma0004'),('Ma1678','William','Dumas','O','1998-11-15',8,'Ma','Ma0001'),('Ma1680','Adrien','Ricque','N','1994-06-27',70,'SC','Ma0002'),('Ma1921','Haythem','Moussa','O','2001-05-16',92,'Lt','Ma0004'),('Ma1941','Adam','Cimolato','O','1997-09-28',22,'1C','Ma0001'),('Ma1998','Haythem','Cimolato','O','2000-01-07',19,'Ma','Ma0001'),('Ma2001','Mathieu','Brenner','O','1994-09-11',73,'1C','Ma0001'),('Ma2015','Corentin','Brenner','N','2002-09-21',53,'Sg','Ma0030'),('Ma2049','Corentin','Lechevalier','N','2000-10-27',45,'Ct','Ma0002'),('Ma2054','William','Chavet','N','2003-04-15',93,'Sg','Ma0030'),('Ma2089','Alexandre','Lechevalier','N','1998-11-15',22,'Sg','Ma0030'),('Ma2143','Luc','Bouvier','O','1992-03-03',80,'Ca','Ma0004'),('Ma2215','Romain','Chavet','N','2001-05-17',22,'In','Ma0030'),('Ma2239','Raphael','Fabre','O','1999-12-05',67,'Ma','Ma0001'),('Ma2275','Adrien','Brenner','N','1996-09-30',72,'CC','Ma0001'),('Ma2283','Alexandre','Jacquier','N','1995-06-13',62,'CC','Ma0001'),('Ma2289','Adrien','Murolo','O','1999-03-02',96,'1C','Ma0001'),('Ma2367','Alexandre','Poyeton','O','2000-01-04',16,'Ct','Ma0002'),('Ma2379','Adrien','Chavet','O','1991-12-21',78,'SP','Ma0004'),('Ma2395','Haythem','Brenner','O','1995-04-02',54,'1C','Ma0001'),('Ma2402','Raphael','Moussa','O','1999-04-12',24,'AC','Ma0002'),('Ma2503','Pierre','Brenner','O','1997-12-26',21,'Ma','Ma0001'),('Ma2560','Raphael','Dumas','N','2002-09-19',79,'CC','Ma0001'),('Ma2601','Julien','Bouvier','N','1991-11-20',9,'CC','Ma0001'),('Ma2667','Corentin','Ricque','O','1995-11-17',92,'SP','Ma0004'),('Ma2695','Mathis','Moussa','N','2000-12-01',100,'Sg','Ma0030'),('Ma2717','Julien','Ricque','O','1992-03-12',77,'Lt','Ma0004'),('Ma2768','Adam','Chavet','N','1999-10-31',70,'In','Ma0030'),('Ma2779','William','Murolo','O','2001-10-19',74,'AC','Ma0002'),('Ma2827','Pierre','Jacquier','N','1999-03-08',93,'1C','Ma0001'),('Ma2858','Flavien','Drevon','O','1997-11-12',74,'SP','Ma0004'),('Ma2926','Flavien','Drevon','O','1990-04-23',2,'Ca','Ma0004'),('Ma2958','Louis','Lejariel','N','1999-09-01',86,'SP','Ma0004'),('Ma3064','Jean','Moussa','N','1995-11-23',69,'Sg','Ma0030'),('Ma3071','William','Moussa','O','1995-06-09',61,'SP','Ma0004'),('Ma3126','Romain','Lechevalier','O','2002-01-22',54,'AC','Ma0002'),('Ma3160','Alexandre','Fabre','O','1994-10-07',17,'AC','Ma0002'),('Ma3197','Mathis','Fabre','O','1997-02-21',94,'Sg','Ma0030'),('Ma3283','Haythem','Jacquier','O','1990-02-24',70,'Sg','Ma0030'),('Ma3284','Adam','Drevon','O','2002-06-25',7,'Ma','Ma0001'),('Ma3367','Marc','Jacquier','O','2004-05-11',99,'Ad','Ma0030'),('Ma3381','Adrien','Jacquier','N','2000-09-27',48,'In','Ma0030'),('Ma3421','Adrien','Lejariel','N','2001-08-14',38,'In','Ma0030'),('Ma3424','Mathieu','Bouvier','N','1990-06-23',12,'CC','Ma0001'),('Ma3444','Louis','Cimolato','O','1996-07-31',16,'Ad','Ma0030'),('Ma3462','Louis','Chavet','N','1992-05-30',25,'Ad','Ma0030'),('Ma3537','Marc','Ricque','O','1995-06-16',98,'Ad','Ma0030'),('Ma3632','Haythem','Lejariel','N','2005-12-11',91,'SC','Ma0002'),('Ma3682','Haythem','Dumas','O','1999-06-09',65,'Sg','Ma0030'),('Ma3721','Raphael','Bouvier','N','2003-01-23',64,'SC','Ma0002'),('Ma3904','Louis','Poyeton','O','1995-04-12',18,'AC','Ma0002'),('Ma3956','Mathieu','Moussa','O','1993-10-27',15,'SC','Ma0002'),('Ma3962','Alexandre','Bouvier','O','1990-09-11',79,'Lt','Ma0004'),('Ma4027','Mathis','Dumas','N','1990-05-01',74,'1C','Ma0001'),('Ma4057','Jean','Murolo','N','2003-06-27',6,'Lt','Ma0004'),('Ma4152','Quentin','Moussa','N','1998-06-14',97,'Ct','Ma0002'),('Ma4166','Flavien','Drevon','N','1995-05-05',48,'SC','Ma0002'),('Ma4366','Haythem','Bouvier','O','1993-11-23',73,'Sg','Ma0030'),('Ma4417','Luc','Murolo','O','2004-07-02',84,'Ma','Ma0001'),('Ma4426','Quentin','Lechevalier','O','2003-05-28',34,'In','Ma0030'),('Ma4438','William','Bouvier','N','2005-11-19',80,'Ct','Ma0002'),('Ma4506','Romain','Lejariel','N','2002-01-07',41,'AC','Ma0002'),('Ma4532','Mathieu','Murolo','O','2002-02-04',62,'1C','Ma0001'),('Ma4595','Romain','Ricque','N','2003-09-12',69,'SC','Ma0002'),('Ma4598','Raphael','Chavet','N','2001-12-25',27,'1C','Ma0001'),('Ma4620','Mathieu','Dumas','N','1990-12-20',46,'SP','Ma0004'),('Ma4638','Louis','Brenner','O','1996-04-11',22,'SP','Ma0004'),('Ma4641','Corentin','Cimolato','N','1998-07-01',22,'CC','Ma0001'),('Ma4722','Haythem','Bouvier','N','1992-01-26',98,'SP','Ma0004'),('Ma4778','Alexandre','Dumas','N','1998-03-04',91,'Ma','Ma0001'),('Ma4925','Mathieu','Ricque','O','2005-12-09',58,'Ca','Ma0004'),('Ma4949','Adam','Murolo','N','2003-10-06',6,'Ad','Ma0030'),('Ma4974','Adrien','Bouvier','N','1992-05-04',82,'Ma','Ma0001'),('Ma4996','Mathis','Chavet','N','2004-01-06',34,'AC','Ma0002'),('Ma5178','Pierre','Jacquier','N','2005-05-28',82,'Lt','Ma0004'),('Ma5186','Raphael','Poyeton','N','1997-08-27',3,'Ad','Ma0030'),('Ma5230','Luc','Lechevalier','O','2005-09-03',37,'1C','Ma0001'),('Ma5287','Flavien','Ricque','N','1994-02-21',30,'SP','Ma0004'),('Ma5315','Adrien','Poyeton','O','1999-07-21',40,'In','Ma0030'),('Ma5369','Mathieu','Poyeton','N','1994-03-30',16,'CC','Ma0001'),('Ma5392','Julien','Jacquier','N','2005-07-04',4,'CC','Ma0001'),('Ma5394','Quentin','Cimolato','O','1997-10-10',8,'In','Ma0030'),('Ma5423','Haythem','Jacquier','O','1997-07-04',5,'SC','Ma0002'),('Ma5457','Romain','Bouvier','O','1999-06-09',37,'AC','Ma0002'),('Ma5468','Julien','Lejariel','N','1993-04-13',61,'AC','Ma0002'),('Ma5471','Mathis','Drevon','N','1995-10-22',83,'Lt','Ma0004'),('Ma5540','William','Fabre','N','1996-05-19',70,'SP','Ma0004'),('Ma5571','Julien','Bouvier','O','1993-04-27',80,'In','Ma0030'),('Ma5620','Flavien','Jacquier','O','1997-12-12',13,'Sg','Ma0030'),('Ma5684','Corentin','Dumas','O','2000-11-18',83,'Ca','Ma0004'),('Ma5739','Mathis','Lechevalier','O','2004-06-07',22,'Ca','Ma0004'),('Ma5743','Julien','Ricque','N','1993-06-20',19,'AC','Ma0002'),('Ma5766','Haythem','Poyeton','N','1990-02-03',96,'Ct','Ma0002'),('Ma5882','Marc','Lechevalier','N','1998-03-21',53,'CC','Ma0001'),('Ma6024','Haythem','Poyeton','N','2001-03-03',55,'Ma','Ma0001'),('Ma6084','Julien','Chavet','N','1992-04-13',95,'AC','Ma0002'),('Ma6171','Julien','Fabre','N','1995-11-14',100,'Ad','Ma0030'),('Ma6173','Julien','Drevon','O','2000-08-17',45,'Ca','Ma0004'),('Ma6181','Marc','Brenner','N','1999-04-19',61,'Ca','Ma0004'),('Ma6206','Jean','Lechevalier','N','1998-02-01',47,'AC','Ma0002'),('Ma6322','Romain','Chavet','N','1990-09-20',80,'CC','Ma0001'),('Ma6342','Marc','Drevon','N','2001-11-06',89,'In','Ma0030'),('Ma6462','Romain','Lechevalier','N','1998-09-24',23,'CC','Ma0001'),('Ma6538','William','Murolo','O','1995-10-25',15,'Ad','Ma0030'),('Ma6591','Jean','Bouvier','N','2000-09-26',80,'SC','Ma0002'),('Ma6638','Louis','Poyeton','O','1998-03-05',39,'In','Ma0030'),('Ma6696','Pierre','Dumas','O','1993-09-05',94,'Ca','Ma0004'),('Ma6757','Alexandre','Poyeton','N','1999-05-23',39,'SC','Ma0002'),('Ma6770','Pierre','Ricque','O','1994-08-07',76,'Ct','Ma0002'),('Ma6851','Marc','Chavet','O','1993-10-14',66,'Sg','Ma0030'),('Ma6983','Adrien','Chavet','O','1993-08-25',79,'AC','Ma0002'),('Ma7006','Jean','Murolo','O','1993-06-14',48,'SC','Ma0002'),('Ma7045','Flavien','Poyeton','N','1995-04-05',93,'SP','Ma0004'),('Ma7059','Corentin','Cimolato','N','1997-03-29',69,'Lt','Ma0004'),('Ma7113','Haythem','Fabre','N','1994-11-05',31,'Ad','Ma0030'),('Ma7130','Pierre','Fabre','O','1995-12-16',42,'Lt','Ma0004'),('Ma7225','William','Lejariel','O','1991-08-05',15,'In','Ma0030'),('Ma7272','Louis','Poyeton','N','2003-12-15',70,'Ct','Ma0002'),('Ma7282','Louis','Poyeton','O','1999-06-24',56,'CC','Ma0001'),('Ma7302','Haythem','Murolo','N','2005-11-20',90,'CC','Ma0001'),('Ma7338','Raphael','Moussa','N','1990-05-01',47,'SC','Ma0002'),('Ma7442','Quentin','Fabre','O','2004-09-16',31,'Ma','Ma0001'),('Ma7550','Raphael','Moussa','O','2003-10-16',84,'Ct','Ma0002'),('Ma7603','Haythem','Lechevalier','O','1992-01-21',50,'SC','Ma0002'),('Ma7613','Raphael','Drevon','N','1996-07-09',28,'Ca','Ma0004'),('Ma7641','Louis','Chavet','N','1998-12-19',62,'Ca','Ma0004'),('Ma7725','Alexandre','Ricque','O','1996-10-26',82,'SC','Ma0002'),('Ma7728','Corentin','Lejariel','N','1993-12-01',9,'Ct','Ma0002'),('Ma7797','Julien','Ricque','N','1993-05-04',23,'SP','Ma0004'),('Ma7812','Adrien','Moussa','O','2000-08-08',69,'Ca','Ma0004'),('Ma7860','Raphael','Drevon','O','1996-10-20',3,'Lt','Ma0004'),('Ma7989','Louis','Poyeton','O','2001-09-20',62,'SP','Ma0004'),('Ma8000','Julien','Brenner','O','2005-06-17',24,'Lt','Ma0004'),('Ma8068','Pierre','Murolo','N','1995-12-03',14,'1C','Ma0001'),('Ma8152','Haythem','Jacquier','N','1999-11-16',32,'In','Ma0030'),('Ma8201','Louis','Brenner','N','1996-10-26',94,'Ad','Ma0030'),('Ma8211','Romain','Cimolato','O','1993-01-20',85,'1C','Ma0001'),('Ma8299','Raphael','Ricque','N','2003-09-19',79,'SC','Ma0002'),('Ma8429','Marc','Chavet','O','2005-01-19',95,'AC','Ma0002'),('Ma8547','Julien','Drevon','O','1999-11-06',20,'SC','Ma0002'),('Ma8571','Pierre','Drevon','N','2003-06-27',11,'In','Ma0030'),('Ma8607','Mathis','Jacquier','N','1990-11-13',80,'Sg','Ma0030'),('Ma8620','Pierre','Ricque','O','2003-10-11',12,'Ad','Ma0030'),('Ma8637','Alexandre','Lejariel','N','2000-10-30',42,'1C','Ma0001'),('Ma8691','Pierre','Lechevalier','N','2003-11-22',52,'In','Ma0030'),('Ma8708','Mathieu','Ricque','O','1994-01-04',67,'SP','Ma0004'),('Ma8717','Alexandre','Ricque','O','1997-10-24',11,'1C','Ma0001'),('Ma8878','Mathis','Moussa','O','2003-02-24',50,'Ad','Ma0030'),('Ma8899','Pierre','Murolo','N','1995-07-02',51,'AC','Ma0002'),('Ma8918','Adam','Lejariel','N','2004-07-01',21,'Ct','Ma0002'),('Ma8934','Pierre','Fabre','O','1993-03-08',58,'1C','Ma0001'),('Ma8967','Luc','Fabre','O','2000-10-11',14,'CC','Ma0001'),('Ma9040','Luc','Jacquier','O','1990-10-15',58,'Ad','Ma0030'),('Ma9092','Marc','Dumas','O','2002-10-23',30,'Ad','Ma0030'),('Ma9299','Louis','Chavet','N','2000-09-27',12,'Ma','Ma0001'),('Ma9422','Raphael','Bouvier','N','1998-10-30',99,'AC','Ma0002'),('Ma9428','Luc','Brenner','O','2000-03-17',18,'Ad','Ma0030'),('Ma9433','Jean','Poyeton','N','1999-09-26',65,'CC','Ma0001'),('Ma9442','Haythem','Poyeton','O','2004-01-12',69,'Ma','Ma0001'),('Ma9481','Marc','Drevon','O','2000-03-28',1,'Lt','Ma0004'),('Ma9624','Mathieu','Dumas','O','1997-09-26',73,'SC','Ma0002'),('Ma9641','Romain','Murolo','N','2001-11-29',14,'CC','Ma0001'),('Ma9681','Jean','Jacquier','N','1992-09-22',41,'In','Ma0030'),('Ma9693','Haythem','Ricque','O','1999-09-02',54,'Ma','Ma0001'),('Ma9792','Adrien','Fabre','N','1993-09-13',70,'1C','Ma0001'),('Ma9825','Mathieu','Cimolato','N','2004-08-31',57,'Lt','Ma0004'),('Ma9853','Louis','Lechevalier','N','2003-01-08',89,'Ma','Ma0001'),('Ma9967','Adrien','Fabre','N','2000-02-01',89,'Ad','Ma0030');
/*!40000 ALTER TABLE `pompiers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `permissions` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Admin',65535),(2,'Manager F',15),(3,'Manager B',240),(4,'Employee',17),(5,'Secretary',119),(6,'Manager U',3840),(7,'Manager R-P',61440),(8,'Director',4369);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typecasernes`
--

DROP TABLE IF EXISTS `typecasernes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typecasernes` (
  `CodeTypeC` int(11) NOT NULL,
  `NomType` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`CodeTypeC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typecasernes`
--

LOCK TABLES `typecasernes` WRITE;
/*!40000 ALTER TABLE `typecasernes` DISABLE KEYS */;
INSERT INTO `typecasernes` VALUES (1,'Pro'),(2,'Mixte'),(3,'Volontaires');
/*!40000 ALTER TABLE `typecasernes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `roleId` int(11) NOT NULL,
  PRIMARY KEY (`id`,`mail`,`password`),
  KEY `roleId` (`roleId`),
  CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (1,'q.chavet@orange.fr','$2y$10$.pAaexLEkoI4bgFwwRWdC.UpkxDwaOP5B3mn63.iTiwkKW7Q99DtG','Quentin','Chavet',1),(2,'h.belhadjmansour@orange.fr','$2y$10$Lv7pjr3yzQHLph3wbycXeOPCbDZAwl773edGqjucDUlKHwIi045Zi','Haythem','Belhadjmansour',1),(3,'a.lourenco@orange.fr','$2y$10$W145zN9ohUv6w2on0z2E..CKu3da67Y1kl6LESeQ0LPQShMV6Z5e.','Aurelio','Lourenco',1),(4,'p.parker@orange.fr','$2y$10$oUuw.L6xuRK.Nbgz43bBBOIYWMj8zutDhg00SRYAe4Jc6B3sII4Z.','Peter','Parker',2),(5,'r.crow@orange.fr','$2y$10$GTDYVHTYOg15zBiu3eiRQ.e2JQLNACZpi5yFUaBAPOhWOleBFvani','Russel','Crow',3),(6,'l.james@orange.fr','$2y$10$LRNKbV3cVFgu5ajiT8PjNe6Rx/zbnAcpXGm43vi6tDtM1Ir5Knm/6','Lebron','James',4),(7,'e.watson@orange.fr','$2y$10$Eyoab5J94nk8NMFHxtnYkuFwNn.jOlmLIkMSh0HatnMIdR2ciAQXC','Emma','Watson',5),(8,'d.lillard@orange.fr','$2y$10$rb09qbWJ67MLmWECL9dEOuZA8mgiXUE6.5pORLXQ4vk8/x3naV4LW','Damian','Lillard',6),(9,'j.morant@orange.fr','$2y$10$ivS/NTZ4oaAxQNxAVXQA9OJOEPJGcf4ZEUhy1sh7njm2B1Wvfg4K.','Ja','Morant',7),(10,'f.couder@orange.fr','$2y$10$uoOedJWsHcPLy4ps.BTUFevhw.gDGB6/VWFO/VG/Y/d6YftTIUzta','Fanny','Couder',8);
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-20 20:00:56
