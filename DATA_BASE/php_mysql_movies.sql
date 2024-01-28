CREATE DATABASE  IF NOT EXISTS `php_mysql` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `php_mysql`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: php_mysql
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(555) DEFAULT NULL,
  `description` varchar(550) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `image` varchar(555) DEFAULT NULL,
  `url` varchar(555) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'Rio 2','Blu, Perla y sus tres hijos son unas perfectas \"aves de ciudad\" que viven tranquilamente en su casa de las afueras de Río de Janeiro. Sin embargo, Perla cree que los niños deberían aprender cómo viven las auténticas aves en el Amazonas. Por eso, toda la familia se aventura a viajar a la selva.',2022,'Animacion','https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcS8yEl8xpdrkOPXpEOeKMfknAo6GKzyBOjrZ7iOnnxW8WSYEf48','https://www.youtube-nocookie.com/embed/E8KNgMvV4dc?si=aYP_n2mLyo5a8rry'),(2,'Ice Age: The Meltdown','La era de hielo 2 en Hispanoamérica y Ice Age 2: El deshielo en España) es una película estadounidense de animación de 2006. Es la secuela de la película de 2002 Ice Age. Fue producida por Blue Sky Studios y distribuida por 20th Century Fox. ',2006,'Animacion','https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTX0pHrpCI6U7gbEdRYpDaUgL8q7uwx0gDxcQC6qDmLnyHhbKgK','https://www.youtube-nocookie.com/embed/7MPsPfUiMBY?si=v7Ca_-gAvMM7FVrR&amp;controls=0'),(3,'La Era De Hielo 1','Ice Age is a 2002 American animated adventure comedy film produced by Blue Sky Studios and distributed by 20th Century Fox. The film was directed by Chris Wedge (in his feature directorial debut) and co-directed by Carlos Saldanha from a screenplay by Michael Berg, Michael J. Wilson, and Peter Ackerman, based on a story by Wilson.',2002,NULL,'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQ6ArKtB4gSWn2IkhdUWMGp3fJ_fUECfeAYXM_yQNQb23cbJMrL','https://www.youtube-nocookie.com/embed/D64N7zXw3uA?si=Y3p9omec_URgBhjF'),(4,'Ice Age: Dawn of the Dinosaurs','Ice Age: Dawn of the Dinosaurs is a 2009 American animated adventure comedy film produced by Blue Sky Studios and distributed by 20th Century Fox. It is the sequel to Ice Age: The Meltdown (2006) and the third installment in the Ice Age film series.',2006,NULL,'https://images2.alphacoders.com/477/477881.jpg','https://www.youtube-nocookie.com/embed/Hn4YwEXWiC8?si=apl5NkP4a8QiNHX1'),(5,'Ratatouille','Ratatouille is a 2007 American animated comedy-drama film produced by Pixar Animation Studios for Walt Disney Pictures. The eighth film produced by Pixar, it was written and directed by Brad Bird and produced by Brad Lewis, from an original idea by Jan Pinkava, who was credited for conceiving the film\'s story with Bird and Jim Capobianco. The film stars the voices of Patton Oswalt, Lou Romano, Ian Holm, Janeane Garofalo, Peter O\'Toole, Brian Dennehy, Peter Sohn and Brad Garrett.',2007,NULL,'https://images.moviesanywhere.com/26ef082242bcfa6a24c5f34c616c23c7/0b34ab43-61bc-40e2-97cb-97edc50b1186.webp?h=375&resize=fit&w=250','https://www.youtube-nocookie.com/embed/q2cSseNsKDs?si=_JZA6M1tgnx-R3TS');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-14 17:20:21
