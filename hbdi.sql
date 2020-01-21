-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: hbdi
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Current Database: `hbdi`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `hbdi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hbdi`;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id_file` int(16) NOT NULL AUTO_INCREMENT,
  `id_project` int(16) NOT NULL,
  `name_file` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL,
  `date_uploaded` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `date_to_delete` int(11) DEFAULT NULL,
  `compliance` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inactive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_file`),
  KEY `title_project` (`id_project`),
  KEY `id_project` (`id_project`),
  KEY `uploaded_by` (`uploaded_by`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (8,64,'MRI_001.csv',7,'1564252958',NULL,1664252958,'TEST',NULL),(9,64,'MRI_002.csv',7,'1564255206',NULL,1664252958,'',NULL),(10,64,'MRI_003.csv',7,'1564255470',NULL,1664252958,'',NULL),(11,62,'WISBCD_001.csv',7,'1564256697',NULL,1664252958,'',NULL),(14,65,'GTMRS2020_001.sql',7,'1564287760',NULL,1664252958,'',NULL),(15,66,'antiemetics01.sql',7,'1564288467',NULL,1664252958,'',NULL),(16,66,'antiemetics02.sql',7,'1564288558',NULL,1664252958,'',NULL),(17,66,'antiemetics03_copy.sql',7,'1564288584',NULL,1664252958,'',NULL),(18,66,'antiemetics04.sql',7,'1564288626',NULL,1664252958,'',NULL),(24,62,'WISBCD_003.csv',7,'1564339972',NULL,1664252958,'',NULL),(25,62,'MRI_002.csv',7,'1564340261',NULL,1664252958,'',NULL),(26,62,'WISBCD_002.csv',7,'1564340293',NULL,1664252958,'',NULL),(27,66,'antiemetics03_copy_2.sql',7,'1564347194',NULL,1664252958,'',NULL),(28,62,'WIS_001.txt',7,'1564373103',NULL,1664252958,'',NULL),(29,62,'WIS02.txt',7,'1564374671',NULL,1664252958,'',NULL),(30,62,'WIS03.txt',7,'1564375033',NULL,1664252958,'HIPAA',NULL),(31,62,'WIS04.txt',7,'1564375115',NULL,1664252958,'',NULL),(32,62,'WIS05.txt',7,'1564375447',NULL,1664252958,'',NULL),(33,62,'WIS06.txt',7,'1564375637',NULL,1664252958,'',NULL),(34,62,'WIS07.txt',7,'1564376019',NULL,1664252958,'',NULL),(35,62,'WIS08.txt',7,'1564376385',NULL,1664252958,'NIH',NULL),(36,62,'WIS09.txt',7,'1564376509',NULL,1664252958,'',NULL),(37,62,'lab01.txt',7,'1564377171',NULL,1664252958,'',NULL),(39,62,'10810730.2017.1324539.pdf',7,'1564451193',NULL,1664252958,'',NULL),(41,66,'9b5e6213c455c1c5a515b2e281a3b051b3afe1ab2467072177b7b903a2431910',9,'1564589322',NULL,1664252958,'',NULL),(42,66,'10810730.2010.522693.pdf',9,'1564589743',NULL,1664252958,'',NULL),(43,62,'10810730.2010.522693.pdf',7,'1564591177',NULL,1664252958,'',NULL),(44,66,'9b5e6213c455c1c5a515b2e281a3b051b3afe1ab2467072177b7b903a2431910',12,'1564595154',NULL,1664252958,'',NULL),(45,66,'10810730.2010.522693.pdf',12,'1564595720',NULL,1664252958,'',NULL),(46,66,'slurm.conf.txt',12,'1564595746',NULL,1664252958,'',NULL),(47,66,'zotero-storage-scanner-5.0.8.xpi',12,'1564595769',NULL,1664252958,'',NULL),(48,66,'AR_health_behavior.pdf',7,'1564599942',NULL,1664252958,'',NULL),(49,62,'zotero-storage-scanner-5.0.8.xpi',7,'1564600855',NULL,1664252958,'',NULL),(50,62,'zotero-storage-scanner-5.0.8.zip',7,'1564601097',NULL,1664252958,'',NULL),(51,62,'cpub-Blend-Labs-CmsRdsh.rdp',7,'1564603115',NULL,1664252958,'',NULL),(57,65,'TCGA_CS_4941_19960909_4_mask.tif',7,'1564687457',NULL,1664252958,'',NULL),(58,65,'TCGA_CS_4941_19960909_3_mask.tif',7,'1564687479',NULL,1664252958,'',NULL),(59,65,'TCGA_CS_4941_19960909_2_mask.tif',7,'1564687553',NULL,1664252958,'',NULL),(60,65,'TCGA_CS_4941_19960909_1_mask.tif',7,'1564687781',NULL,1664252958,'',NULL),(61,66,'10810730.2017.1324539.pdf',7,'1564762809',NULL,1664252958,'',NULL),(62,66,'j.jomh.2009.05.004.pdf',7,'1564763014',NULL,1664252958,'',NULL),(63,66,'Solutions-to-Problem-set-Vector-Operations-and-Linear-Combinatio',7,'1564763081',NULL,1664252958,'',NULL),(64,66,'Problem-Set-Determinants.pdf',7,'1564763138',NULL,1664252958,'',NULL),(65,66,'ScienceDirect_citations_1563290912340.ris',7,'1564763600',NULL,1664252958,'',NULL),(66,66,'cpub-SshClient__1_-Labs-CmsRdsh.rdp',7,'1564763771',NULL,1664252958,'',NULL),(67,66,'ScienceDirect_citations_1563290965349.ris',7,'1564764286',NULL,1664252958,'',NULL),(68,66,'h10.zip',7,'1564764450',NULL,1664252958,'TTT',NULL),(70,65,'10810730.2017.1324539.pdf',7,'1564764869',NULL,1664252958,'HIPAA; human_subject; protected',NULL),(71,65,'j.jbtep.2014.04.003.pdf',7,'1564766354',NULL,1664252958,'HIPAA',NULL),(72,65,'j.socec.2011.10.009.pdf',7,'1564766392',NULL,1664252958,'HIPAA; human_subject; protected',NULL),(73,65,'PUBLISHEDMANUSCRIPT.pdf',7,'1564766423',NULL,1664252958,'HIPAA; human_subject; protected; FDA-part11; private',NULL),(74,65,'1-s2.0-S0306460317304963.pdf',7,'1564774639',NULL,1664252958,'HIPAA; human_subject',NULL),(75,62,'2.gif',7,'1565017669',NULL,1664252958,'HIPAA; human_subject; protected',NULL),(76,64,'2.gif',7,'1565030063',NULL,1664252958,'HIPAA; human_subject',NULL),(77,64,'2.tar',7,'1565030116',NULL,1664252958,'FDA-part11',NULL),(78,64,'ellisferrerklein--DKJHC.pdf',7,'1565030157',NULL,1664252958,'public',NULL),(85,66,'Uncertainty.docx',7,'1569792464',NULL,1664252958,'',NULL),(86,66,'IBM-modeler.png',7,'1569796873',NULL,1664252958,'',NULL),(87,66,'IBM_modeler.png',7,'1569797119',NULL,1664252958,'',NULL),(88,66,'IBM_modeler3.png',7,'1569797250',NULL,1664252958,'',NULL),(89,66,'Umegaki & Kimura 2012.docx',7,'1569797860',NULL,1664252958,'',NULL),(90,66,'hbdi_project-3.2.sql',7,'1569799557',NULL,1664252958,'',NULL),(91,65,'hbdi_project-3.7.sql',7,'1569960199',NULL,1664252958,'',NULL),(92,65,'hbdi_project-3.8.sql',7,'1569960360',NULL,1664252958,'',NULL),(93,65,'hbdi_project-3.9.sql',7,'1569960494',NULL,0,'',NULL),(94,62,'hbdi-15.sql',7,'1576615115',NULL,NULL,'',NULL),(95,62,'hbdi_project-3.9.sql',7,'1576616933',NULL,NULL,'',NULL),(96,62,'Untitled.png',7,'1576617428',NULL,NULL,'',NULL),(97,66,'Untitled.png',7,'1576618626',NULL,NULL,'',NULL),(98,64,'hbdi-15.sql',7,'1576678255',NULL,NULL,'',NULL),(99,64,'hbdi.sql',7,'1576681623',NULL,NULL,'',NULL),(100,62,'hbdi.sql',7,'1576681924',NULL,NULL,'',NULL),(101,64,'Untitled.png',7,'1576683460',NULL,NULL,'',NULL),(102,62,'hbdi-15.sql',7,'1576686156',NULL,NULL,'',NULL),(103,64,'hbdi_project-3.9.sql',7,'1576687570',NULL,NULL,'',NULL),(104,62,'hbdi.sql',7,'1576695800',NULL,NULL,'',NULL),(105,65,'hbdi.sql',7,'1576703016',NULL,NULL,'HIPAA; human_subject; protected',NULL),(106,65,'hbdi-15.sql',7,'1576703416',NULL,NULL,'HIPAA; human_subject; protected',NULL),(107,65,'hbdi_project-3.09.sql',7,'1576703484',NULL,NULL,'HIPAA; human_subject; protected',NULL),(108,65,'hbdi_project-3.08.sql',7,'1576703525',NULL,NULL,'HIPAA; human_subject; protected',NULL),(109,65,'hbdi_project-3.07.sql',7,'1576703582',NULL,NULL,'HIPAA; human_subject; protected',NULL),(110,65,'hbdi_project-3.06.sql',7,'1576703731',NULL,NULL,'HIPAA; human_subject; protected',NULL),(111,65,'hbdi_project-3.05.sql',7,'1576704003',NULL,NULL,'HIPAA; human_subject; protected',NULL),(112,65,'hbdi_project-3.05.sql',7,'1576704442',NULL,NULL,'HIPAA; human_subject; protected',NULL),(113,65,'hbdi-15.sql',7,'1576704508',NULL,NULL,'HIPAA; human_subject; protected',NULL),(114,65,'hbdi.sql',7,'1576704642',NULL,NULL,'HIPAA; human_subject; protected',NULL),(115,65,'hbdi-15.sql',7,'1576704743',NULL,NULL,'HIPAA; human_subject; protected',NULL),(116,65,'hbdi.sql',7,'1576704776',NULL,NULL,'HIPAA; human_subject; protected',NULL),(117,65,'flE gjv90]6.pdf',7,'1576705453',NULL,NULL,'HIPAA; human_subject; protected',NULL),(118,65,'Screen Shot 2019-11-04 at 11.07.16.png',7,'1576706212',NULL,NULL,'HIPAA; human_subject; protected',NULL),(119,65,'Screen Shot 2019-10-23 at 11.22.55.png',7,'1576706430',NULL,NULL,'HIPAA; human_subject; protected',NULL),(120,65,'Untitled.png',7,'1576706927',NULL,NULL,'HIPAA; human_subject; protected',NULL),(121,65,'hbdi-15.sql',7,'1576707375',NULL,NULL,'HIPAA; human_subject; protected',NULL),(122,65,'hbdi.sql',7,'1576707392',NULL,NULL,'HIPAA; human_subject; protected',NULL),(123,65,'hbdi.sql',7,'1576769797',NULL,NULL,'HIPAA; human_subject; protected',NULL),(124,65,'hbdi-15.sql',7,'1576770042',NULL,NULL,'HIPAA; human_subject; protected',NULL),(125,65,'hbdi-15.sql',7,'1576770650',NULL,NULL,'HIPAA; human_subject; protected',NULL),(126,65,'Screen Shot 2019-11-04 at 11.07.16.png',7,'1576771133',NULL,NULL,'HIPAA; human_subject; protected',NULL),(127,65,'flE gjv90]6.pdf',7,'1576771529',NULL,NULL,'HIPAA; human_subject; protected',NULL),(128,65,'先验显著性对个体信息认知处理的影响研究：基于争议性话题的实证.pdf',7,'1576772382',NULL,NULL,'HIPAA; human_subject; protected',NULL),(129,65,'先验显著性对个体信息认知处理的影响研究：基于争议性话题的实证.pdf',7,'1576772981',NULL,NULL,'HIPAA; human_subject; protected',NULL),(130,65,'IBM_modeler3.png',7,'1576776517',NULL,NULL,'HIPAA; human_subject; protected',NULL),(131,66,'hbdi_project-3.05.sql',7,'1576786106',NULL,NULL,'',NULL),(132,122,'support.php',7,'1576801621',NULL,NULL,'',NULL),(133,122,'tasks.php',7,'1576801977',NULL,NULL,'',NULL),(134,122,'index.php',7,'1576802017',NULL,NULL,'',NULL),(135,122,'teams.php',7,'1576802298',NULL,NULL,'',NULL),(136,122,'documents.php',7,'1576802402',NULL,NULL,'',NULL),(137,62,'upload.php',7,'1576857474',NULL,NULL,'',NULL),(138,62,'teams.php',7,'1576859359',NULL,NULL,'',NULL),(139,62,'tasks.php',7,'1576859849',NULL,NULL,'',NULL),(140,62,'invite.ics',7,'1578942829',NULL,NULL,'',NULL);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id_project_membership` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `administrator` int(1) DEFAULT NULL,
  `collaborator` int(1) DEFAULT NULL,
  `assistant` int(1) DEFAULT NULL,
  `observer` int(1) DEFAULT NULL,
  `PI` tinyint(1) DEFAULT NULL,
  `co-PI` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_project_membership`),
  KEY `id_project` (`id_project`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,62,7,0,1,0,0,0,NULL,NULL),(3,64,7,7,1,NULL,NULL,NULL,NULL,NULL),(4,65,7,7,1,NULL,NULL,NULL,NULL,NULL),(5,66,7,NULL,1,NULL,NULL,NULL,NULL,NULL),(6,67,7,NULL,1,NULL,NULL,NULL,NULL,NULL),(8,70,9,1,NULL,NULL,NULL,NULL,NULL,NULL),(9,71,7,NULL,1,NULL,NULL,NULL,NULL,NULL),(10,72,7,NULL,1,NULL,NULL,NULL,NULL,NULL),(11,75,12,1,NULL,NULL,NULL,NULL,NULL,NULL),(12,82,12,1,NULL,NULL,NULL,NULL,NULL,NULL),(13,83,12,1,NULL,NULL,NULL,NULL,NULL,NULL),(14,62,10,NULL,1,NULL,NULL,NULL,NULL,NULL),(15,64,10,NULL,1,NULL,NULL,NULL,NULL,NULL),(16,62,0,NULL,NULL,12,NULL,NULL,NULL,NULL),(17,62,12,NULL,NULL,1,NULL,NULL,NULL,NULL),(18,64,12,NULL,NULL,1,NULL,NULL,NULL,NULL),(19,64,12,NULL,NULL,1,NULL,NULL,NULL,NULL),(20,64,12,NULL,NULL,1,NULL,NULL,NULL,NULL),(21,72,12,NULL,NULL,1,NULL,NULL,NULL,NULL),(22,70,10,NULL,1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `source` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_store`
--

DROP TABLE IF EXISTS `permission_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_store` (
  `id_permission_store` int(32) NOT NULL AUTO_INCREMENT,
  `id_project` int(16) NOT NULL,
  `id_user` int(16) NOT NULL,
  `id_file` int(32) NOT NULL,
  `id_permission` int(16) NOT NULL,
  PRIMARY KEY (`id_permission_store`),
  KEY `id_project` (`id_project`),
  KEY `id_user` (`id_user`),
  KEY `id_file` (`id_file`),
  KEY `id_permission` (`id_permission`),
  CONSTRAINT `permission_store_ibfk_1` FOREIGN KEY (`id_permission`) REFERENCES `permissions` (`id_permission`),
  CONSTRAINT `permission_store_ibfk_2` FOREIGN KEY (`id_file`) REFERENCES `files` (`id_file`),
  CONSTRAINT `permission_store_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `permission_store_ibfk_4` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_store`
--

LOCK TABLES `permission_store` WRITE;
/*!40000 ALTER TABLE `permission_store` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id_permission` int(16) NOT NULL AUTO_INCREMENT,
  `HIPAA` tinyint(1) DEFAULT NULL,
  `NIH` tinyint(1) DEFAULT NULL,
  `protected` tinyint(1) DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `FDA-Part-11` tinyint(1) DEFAULT NULL,
  `private` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_permission`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (4,1,NULL,NULL,NULL,NULL,NULL),(5,0,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_keyword`
--

DROP TABLE IF EXISTS `project_keyword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_keyword` (
  `id_project_keyword` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) NOT NULL,
  `keyword` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_project_keyword`),
  KEY `id_project` (`id_project`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_keyword`
--

LOCK TABLES `project_keyword` WRITE;
/*!40000 ALTER TABLE `project_keyword` DISABLE KEYS */;
INSERT INTO `project_keyword` VALUES (1,62,'Lorem ipsum'),(2,62,'dolor sit amet'),(3,62,'consectetur adipiscing elit'),(4,62,'dolor sit amet'),(5,62,'sed do eiusmod'),(6,64,'tempor incididunt'),(8,64,' ut labore'),(9,64,' et dolore'),(10,64,' ut labore'),(11,64,' et dolore'),(12,65,'magna aliqua');
/*!40000 ALTER TABLE `project_keyword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_user`
--

DROP TABLE IF EXISTS `project_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_user` (
  `id_project_user` int(16) NOT NULL AUTO_INCREMENT,
  `id_project` int(16) NOT NULL,
  `lead` int(16) DEFAULT NULL,
  `member` int(16) DEFAULT NULL,
  `guest` int(16) DEFAULT NULL,
  PRIMARY KEY (`id_project_user`),
  KEY `id_project` (`id_project`),
  KEY `lead` (`lead`),
  KEY `member` (`member`),
  KEY `guest` (`guest`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_user`
--

LOCK TABLES `project_user` WRITE;
/*!40000 ALTER TABLE `project_user` DISABLE KEYS */;
INSERT INTO `project_user` VALUES (1,62,7,NULL,NULL),(2,64,NULL,7,NULL),(3,65,NULL,7,NULL),(4,66,NULL,11,NULL),(5,66,11,NULL,12),(6,66,NULL,NULL,NULL),(7,108,7,NULL,NULL),(8,109,7,NULL,NULL),(9,110,7,NULL,NULL),(10,109,9,NULL,NULL),(11,112,9,NULL,NULL),(12,113,9,NULL,NULL),(13,114,9,NULL,NULL),(14,115,7,NULL,NULL),(15,116,7,NULL,NULL),(16,117,7,NULL,NULL),(17,120,7,NULL,NULL),(18,122,7,NULL,NULL);
/*!40000 ALTER TABLE `project_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id_project` int(16) NOT NULL AUTO_INCREMENT,
  `id_creator` int(16) NOT NULL,
  `title_project` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_project_short` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_created` int(16) NOT NULL,
  `date_begin` int(16) NOT NULL,
  `date_to_complete` int(16) DEFAULT NULL,
  `date_complete` int(16) DEFAULT NULL,
  `granted_by` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grant_number` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_description` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compliance` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `type_project` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wiki` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_project`),
  KEY `id_creator` (`id_creator`),
  CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_creator`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (62,7,'Analysis of the Wisconsin Breast Cancer Dataset and Machine Learning for Breast Cancer Detection\n','WISBCD',1111111111,1111111111,0,1111111111,'a','1','Two machine learning techniques are compared in this paper. These methods are used to create two classifiers that must discriminate benign from malignant breast lumps. To create the classifier, the WBCD (Wisconsin Breast Cancer Diagnosis) dataset is employed. This dataset is widely utilized for this kind of application because it has a large number of instances (699), is virtually noise-free and has just a few missing values. Before performing the tests, a large fraction of this work will be dedicated for pre-processing the data in order to optimize the classifier. The first part of this work is to present the database, what it contains, when and how it was created, if it is noisy, if it has missing values. This section is important to understand what are the issues that will need to be processed while preparing the data to create the classifier. The next step is to propose methods and algorithms to optimize the training set. How to deal with missing values? How to avoid overfitting the classifier? All these questions are discussed and different solutions are proposed. The results are presented in tables, which contains the accuracy of the classifier, the rate of false-negatives and the rate of false-positives 1. All the tests were conducted using the software Weka 3.6, an open-source collection of machine learning techniques capable of performing pre-processing, classification, regression, clustering and association rules. The best accuracy in this paper was achieved by the Bayesian Networks algorithm, wich had, in its best configuration, 97.80% of accuracy. The second algorithm tested was the J48, which had 96.05% of accuracy. 1 Throughout this paper, the expression \" False-Negative \" is used to name the instances that were classified as Benign but in reality are malignant, and \" False-Positive \" is for the instances misclassified as Malignant','a',0,'a',NULL),(64,7,'Magnetic Resonance Imaging Comparisons of Demented and Nondemented Adults','MRIAMR',1111111111,1111111111,0,1111111111,'a','1','The Open Access Series of Imaging Studies (OASIS) is a project aimed at making MRI data sets of the brain freely available to the scientific community. By compiling and freely distributing MRI data sets, we hope to facilitate future discoveries in basic and clinical neuroscience. OASIS is made available by the Washington University Alzheimer’s Disease Research Center, Dr. Randy Buckner at the Howard Hughes Medical Institute (HHMI)( at Harvard University, the Neuroinformatics Research Group (NRG) at Washington University School of Medicine, and the Biomedical Informatics Research Network (BIRN).','a',0,'a','MRI Wiki'),(65,7,'A grounded theory methodology for research synthesis','GTMRS2020',1111111111,1111111111,0,1111111111,'a','1','The purpose of this investigation was twofold: 1) in conducting a research synthesis of distance education research studies using grounded theory methodology, this investigation derived a grounded theory from the distance education literature synthesized; and 2) in order to apply grounded theory for research synthesis, a procedure to coalesce grounded theory and research synthesis methods was developed.\n\nResearch synthesis, as a family of research methods with diverse theoretical and procedural inclinations, is the analysis of analyses. Research synthesis serves various purposes; one of them being synthesizing primary research studies into more general and theoretical conclusions. With the attempts in creating approaches for research synthesis, however, there is no well-recognized method for including both qualitative and quantitative research studies in one research synthesis effort. Yin (1991) suggested that grounded theory can be used to conduct the research synthesis of multivocal literature. This investigation aimed for realizing that proposal and used the field of distance education literature as the target of synthesis.\n\nResulted from this investigation were 1) a substantive grounded theory for distance education as a field; and 2) a procedure for applying grounded theory for purpose of research synthesis. With much of the endeavor putting into synergizing grounded theory and research synthesis, this investigation has been more a journey on methodological discovery than on distance education research.','a',0,'a',NULL),(66,7,'ANTIEMETICS: NEUROTRANSMITTER RECEPTOR BINDING PREDICTS THERAPEUTIC ACTIONS','Antiemetics',1111111111,1111111111,0,1111111111,'a','1','Neurotransmitter receptor binding studies indicate that effective antiemetic drugs potently block histamine H1, muscarinic cholinergic, or dopamine D2 receptors. Drug combinations affecting more than one of these receptors appear more clinically efficacious. Designing individual drugs or combinations that influence these three receptors may provide improved emesis control.\n\n','a',0,'a',NULL),(120,7,'Magnetic Resonance Imaging Comparisons of Demented and Nondemented Adults','TP01',1111111111,1111111111,0,1111111111,'a','1','The Open Access Series of Imaging Studies (OASIS) is a project aimed at making MRI data sets of the brain freely available to the scientific community. By compiling and freely distributing MRI data sets, we hope to facilitate future discoveries in basic and clinical neuroscience. OASIS is made available by the Washington University Alzheimer’s Disease Research Center, Dr. Randy Buckner at the Howard Hughes Medical Institute (HHMI)( at Harvard University, the Neuroinformatics Research Group (NRG) at Washington University School of Medicine, and the Biomedical Informatics Research Network (BIRN).','a',0,'a','MRI Wiki'),(122,7,'TP02','TP02',1576800040,1546300800,1575158400,NULL,NULL,NULL,'a',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task` (
  `id_task` int(32) NOT NULL AUTO_INCREMENT,
  `created_by` int(16) DEFAULT NULL,
  `title_task` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taskDescription` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_to` int(16) DEFAULT NULL,
  `date_assigned` int(11) DEFAULT NULL,
  `date_acknowledged` tinyint(1) DEFAULT NULL,
  `date_due` int(11) DEFAULT NULL,
  `date_begin` int(11) DEFAULT NULL,
  `date_complete_expected` int(11) DEFAULT NULL,
  `date_completed` int(11) DEFAULT NULL,
  `complete_check` tinyint(1) DEFAULT NULL,
  `resource` int(11) DEFAULT NULL,
  `remark` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_project` int(16) DEFAULT NULL,
  PRIMARY KEY (`id_task`),
  KEY `created_by` (`created_by`),
  KEY `assign_to` (`assigned_to`),
  KEY `id_project` (`id_project`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (2,7,'Test Task 01','Test Task 01 Description',11,NULL,NULL,1570099175,0,0,NULL,NULL,11,'Test Task 01 Remark',64),(15,7,'Test Task 02','Test Task 01 Description',7,NULL,NULL,1579045175,0,0,NULL,NULL,11,'Test Task 02 Remark',62),(18,7,'Test Task 03','Test Task 03 Description',12,NULL,NULL,1570947175,0,0,NULL,NULL,10001,'Test Task 03 Remark',65),(19,7,'a','a',7,NULL,NULL,1570054588,NULL,NULL,NULL,NULL,0,'a',65),(21,7,'Test Task 04','Describing the task.',11,NULL,NULL,1111111111,NULL,NULL,NULL,NULL,0,'No remarks.',62),(22,7,'Test Task 04','Describing the task.',11,NULL,NULL,1111111111,NULL,NULL,NULL,NULL,0,'Test Task 04 Remark',64),(23,7,'Test Task 05','Test Task 05 Description',7,NULL,NULL,1111111111,NULL,NULL,NULL,NULL,0,'Test Task 05 Remark',66),(24,7,'Test Task 06','Test Task 06 Description',12,NULL,NULL,1111111111,NULL,NULL,NULL,NULL,0,'Test Task 06 Remark',66),(25,7,'Test Task 06','Test Task 06 Description',12,NULL,NULL,1111111111,NULL,NULL,NULL,NULL,0,'Test Task 06 Remark',104),(26,7,'Test Task 07','Test Task 07 Description',7,NULL,NULL,1570119032,NULL,NULL,NULL,NULL,0,'Test Task 07 Remark',104),(27,7,'Test Task 08','Test Task 08 Description',7,NULL,NULL,1570129032,NULL,NULL,NULL,NULL,0,'Test Task 08 Remark',62),(28,7,'Test Task 09','Test Task 09 Description',11,NULL,NULL,1570195032,NULL,NULL,NULL,NULL,0,'Test Task 09 Remark',65);
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(16) NOT NULL AUTO_INCREMENT,
  `id_affiliation` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_last` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_first` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliation` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fsu` int(11) DEFAULT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `account_verify_token` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (7,'','Chen','TY','tychen742@gmail.com','tychen','$2y$10$HUrTDQs/wIbrsNjdMhgD..KMxqOUJxoW5zqMik/jCITveJXciNIPW','FSU',0,1,'$2y$10$eeXgJDTKpTJoPqiofNJv4O5iJCuCterOtKoStTodKIR0TCsXs/x1C'),(9,'','MacDonnell','Grant','macg@com.fsu.edu','macg','$2y$10$rB6hbnDbmiJDgfww1mRkr.SGX5g9XHXqL49/trCrxgnT9ulpOGTYK','FSU',0,1,NULL),(10,'','Stephensen','Mary','marys@fsu.edu','marys','$2y$10$AX.CFIj3an5TOMSqSN9ZDu4CKhz0KsZnRC2v9ZHWaNHkid3lr38EG','FSU',0,1,NULL),(11,'','Doe','Jane','test03@test.com','TestUser03','$2y$10$5gbO2sJqEKVbpg.kfe170.dVea7FHqHqETWrUonjLWA/9pEPbo0am','FSU',0,1,NULL),(12,'','Doe','John','jdoe@fsu.edu','jdoe','$2y$10$mk3EUrij7yZbxq5RhnIFF.LzgAiK0i0fp6tNrLnK2qHgRCmdnW.LO','FSU',0,1,NULL),(14,'','Chen','Tsangyao','tc16k@my.fsu.edu','tc16k','$2y$10$IvT08f/cHpyPePyYKbzV0u1Mg2NrIDOSeIiNkVzW/CjQv9qxRB/fe','FSU',0,1,NULL),(15,'','','','evergreenterrace744@gmail.com','evergreenterrace744','$2y$10$fNSzqpYKXgMUoBHWm02Xv.GwAZSjz0w4gTg4mXDE35HT5AMtYZfxm','FSU',0,1,NULL),(16,NULL,'Chen','Tsangyao','tc16k@fsu.edu','tc16k','$2y$10$W3WCyC4jkB2oxNPHPLqBv.di05trAFevroTOgJo9QLCEEMVzjkKXm','aaa',NULL,0,'s1ef052dbed64e526d422db08fff20c4');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-21  0:01:02
