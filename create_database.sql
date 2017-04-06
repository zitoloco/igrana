CREATE DATABASE  IF NOT EXISTS `igrana` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `igrana`;
-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: igrana
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `contas`
--

DROP TABLE IF EXISTS `contas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contas` (
  `idConta` int(11) NOT NULL AUTO_INCREMENT,
  `idPessoa` int(11) NOT NULL,
  `dataLancamento` date NOT NULL,
  `dataQuitacao` datetime DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  `historico` varchar(400) DEFAULT NULL,
  `valor` double NOT NULL,
  `valorPago` double DEFAULT '0',
  `documento` varchar(100) DEFAULT NULL,
  `dataVencimento` date NOT NULL,
  `ultimaAlteracao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idConta`,`idPessoa`),
  UNIQUE KEY `idConta` (`idConta`),
  KEY `Relationship2` (`idPessoa`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contas`
--

LOCK TABLES `contas` WRITE;
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `rg` varchar(9) DEFAULT NULL,
  `inscricao` varchar(12) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(25) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`idPessoa`),
  UNIQUE KEY `idPessoa` (`idPessoa`,`tipo`,`cpf`,`cnpj`,`rg`,`inscricao`,`nome`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_session_id` varchar(255) DEFAULT NULL,
  `user_permissions` longtext,
  `user_photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'rob','$2a$08$vWvXbTx1AUFfmqtypvBeU.lHAqVe.IYtPZStgDXBx5iNxhEUDN3x.','Robison Puglielli','r5d0nraa2b543chu90rd2mgg14','a:2:{i:0;s:13:\"user-register\";i:1;s:18:\"gerenciar-noticias\";}','perfilpng.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'igrana'
--

--
-- Dumping routines for database 'igrana'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-05 22:38:55
