-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2019 at 01:09 PM
-- Server version: 5.6.44-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbdi`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id_file` int(16) NOT NULL,
  `id_project` int(16) NOT NULL,
  `name_file` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL,
  `date_uploaded` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `date_to_delete` int(11) NOT NULL,
  `compliance` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inactive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id_file`, `id_project`, `name_file`, `uploaded_by`, `date_uploaded`, `date_deleted`, `date_to_delete`, `compliance`, `inactive`) VALUES
(8, 64, 'MRI_001.csv', 7, '1567987200', NULL, 0, 'TEST', NULL),
(9, 64, 'MRI_002.csv', 7, '1564255206', NULL, 0, '', NULL),
(10, 64, 'MRI_003.csv', 7, '1570215032', NULL, 0, '', NULL),
(11, 62, 'WISBCD_001.csv', 7, '1570115032', NULL, 0, '', NULL),
(14, 65, 'GTMRS2020_001.sql', 7, '1564287760', NULL, 0, '', NULL),
(15, 66, 'antiemetics01.sql', 7, '1570218461', NULL, 0, '', NULL),
(17, 66, 'antiemetics03_copy.sql', 7, '1544572800', NULL, 0, '', NULL),
(18, 66, 'antiemetics04.sql', 7, '1564288626', NULL, 0, '', NULL),
(24, 62, 'WISBCD_003.csv', 7, '1567987200', NULL, 0, '', NULL),
(25, 62, 'MRI_002.csv', 7, '1570125032', NULL, 0, '', NULL),
(26, 62, 'WISBCD_002.csv', 7, '1564340293', NULL, 0, '', NULL),
(27, 66, 'antiemetics03_copy_2.sql', 7, '1493942400', NULL, 0, '', NULL),
(28, 62, 'WIS_001.txt', 7, '1569888000', NULL, 0, '', NULL),
(29, 62, 'WIS02.txt', 7, '1564374671', NULL, 0, '', NULL),
(30, 62, 'WIS03.txt', 7, '1564375033', NULL, 0, 'HIPAA', NULL),
(31, 62, 'WIS04.txt', 7, '1564375115', NULL, 0, '', NULL),
(32, 62, 'WIS05.txt', 7, '1564375447', NULL, 0, '', NULL),
(33, 62, 'WIS06.txt', 7, '1564375637', NULL, 0, '', NULL),
(34, 62, 'WIS07.txt', 7, '1564376019', NULL, 0, '', NULL),
(35, 62, 'WIS08.txt', 7, '1564376385', NULL, 0, 'NIH', NULL),
(36, 62, 'WIS09.txt', 7, '1564376509', NULL, 0, '', NULL),
(37, 62, 'lab01.txt', 7, '1564377171', NULL, 0, '', NULL),
(39, 62, '10810730.2017.1324539.pdf', 7, '1564451193', NULL, 0, '', NULL),
(41, 66, '9b5e6213c455c1c5a515b2e281a3b051b3afe1ab2467072177b7b903a2431910', 9, '1564589322', NULL, 0, '', NULL),
(42, 66, '10810730.2010.522693.pdf', 9, '1564589743', NULL, 0, '', NULL),
(43, 62, '10810730.2010.522693.pdf', 7, '1564591177', NULL, 0, '', NULL),
(44, 66, '9b5e6213c455c1c5a515b2e281a3b051b3afe1ab2467072177b7b903a2431910', 12, '1564595154', NULL, 0, '', NULL),
(45, 66, '10810730.2010.522693.pdf', 12, '1564595720', NULL, 0, '', NULL),
(46, 66, 'slurm.conf.txt', 12, '1564595746', NULL, 0, '', NULL),
(47, 66, 'zotero-storage-scanner-5.0.8.xpi', 12, '1564595769', NULL, 0, '', NULL),
(48, 66, 'AR_health_behavior.pdf', 7, '1564599942', NULL, 0, '', NULL),
(49, 62, 'zotero-storage-scanner-5.0.8.xpi', 7, '1564600855', NULL, 0, '', NULL),
(50, 62, 'zotero-storage-scanner-5.0.8.zip', 7, '1564601097', NULL, 0, '', NULL),
(51, 62, 'cpub-Blend-Labs-CmsRdsh.rdp', 7, '1564603115', NULL, 0, '', NULL),
(57, 65, 'TCGA_CS_4941_19960909_4_mask.tif', 7, '1557014400', NULL, 0, '', NULL),
(58, 65, 'TCGA_CS_4941_19960909_3_mask.tif', 7, '1570119032', NULL, 0, '', NULL),
(59, 65, 'TCGA_CS_4941_19960909_2_mask.tif', 7, '1564687553', NULL, 0, '', NULL),
(60, 65, 'TCGA_CS_4941_19960909_1_mask.tif', 7, '1567987200', NULL, 0, '', NULL),
(61, 66, '10810730.2017.1324539.pdf', 7, '1564762809', NULL, 0, '', NULL),
(62, 66, 'j.jomh.2009.05.004.pdf', 7, '1564763014', NULL, 0, '', NULL),
(63, 66, 'Solutions-to-Problem-set-Vector-Operations-and-Linear-Combinatio', 7, '1564763081', NULL, 0, '', NULL),
(64, 66, 'Problem-Set-Determinants.pdf', 7, '1564763138', NULL, 0, '', NULL),
(65, 66, 'ScienceDirect_citations_1563290912340.ris', 7, '1564763600', NULL, 0, '', NULL),
(66, 66, 'cpub-SshClient__1_-Labs-CmsRdsh.rdp', 7, '1564763771', NULL, 0, '', NULL),
(67, 66, 'ScienceDirect_citations_1563290965349.ris', 7, '1564764286', NULL, 0, '', NULL),
(68, 66, 'h10.zip', 7, '1564764450', NULL, 0, 'TTT', NULL),
(70, 65, '10810730.2017.1324539.pdf', 7, '1564764869', NULL, 0, 'HIPAA; human_subject; protected', NULL),
(71, 65, 'j.jbtep.2014.04.003.pdf', 7, '1564766354', NULL, 0, 'HIPAA', NULL),
(72, 65, 'j.socec.2011.10.009.pdf', 7, '1564766392', NULL, 0, 'HIPAA; human_subject; protected', NULL),
(73, 65, 'PUBLISHEDMANUSCRIPT.pdf', 7, '1564766423', NULL, 0, 'HIPAA; human_subject; protected; FDA-part11; private', NULL),
(74, 65, '1-s2.0-S0306460317304963.pdf', 7, '1564774639', NULL, 0, 'HIPAA; human_subject', NULL),
(75, 62, '2.gif', 7, '1565017669', NULL, 0, 'HIPAA; human_subject; protected', NULL),
(76, 64, 'MRI_image_2.gif', 7, '1565030063', NULL, 0, 'HIPAA; human_subject', NULL),
(77, 64, 'MRI_image_2.tar', 7, '1557014400', NULL, 0, 'FDA-part11', NULL),
(78, 64, 'ellisferrerklein--DKJHC.pdf', 7, '1565030157', NULL, 0, 'public', NULL),
(85, 66, 'Uncertainty.docx', 7, '1569792464', NULL, 0, '', NULL),
(86, 66, 'IBM-modeler.png', 7, '1569796873', NULL, 0, '', NULL),
(87, 66, 'IBM_modeler.png', 7, '1569797119', NULL, 0, '', NULL),
(88, 66, 'IBM_modeler3.png', 7, '1569797250', NULL, 0, '', NULL),
(89, 66, 'Umegaki & Kimura 2012.docx', 7, '1569797860', NULL, 0, '', NULL),
(90, 66, 'hbdi_project-3.2.sql', 7, '1569799557', NULL, 0, '', NULL),
(91, 65, 'hbdi_project-3.7.sql', 7, '1569960199', NULL, 0, '', NULL),
(92, 65, 'hbdi_project-3.8.sql', 7, '1569960360', NULL, 0, '', NULL),
(93, 65, 'hbdi_project-3.9.sql', 7, '1569960494', NULL, 0, '', NULL),
(94, 62, 'hbdi.sql', 7, '1570125823', NULL, 0, '', NULL),
(95, 62, 'hbdi-02.sql', 7, '1570125852', NULL, 0, '', NULL),
(96, 65, 'hbdi-02.sql', 7, '1570221112', NULL, 0, '', NULL),
(97, 65, 'hbdi-03.sql', 7, '1570222266', NULL, 0, '', NULL),
(98, 62, '55098.pdf', 7, '1570460515', NULL, 0, '', NULL),
(99, 108, 'DIssertationResearchGuide.pdf', 7, '1570802957', NULL, 0, '', NULL),
(100, 108, 'Three-Paper Dissertation.docx', 7, '1570803010', NULL, 0, '', NULL),
(101, 115, 'DIssertationResearchGuide.pdf', 7, '1570804909', NULL, 0, '', NULL),
(102, 119, 'DIssertationResearchGuide.pdf', 7, '1570817439', NULL, 0, '', NULL),
(103, 119, 'hbdi-03.sql', 7, '1570817511', NULL, 0, '', NULL),
(104, 123, '55098.pdf', 7, '1570820663', NULL, 0, '', NULL),
(105, 126, 'hbdi.sql', 7, '1570824319', NULL, 0, '', NULL),
(106, 126, 'hbdi-03.sql', 7, '1570825194', NULL, 0, '', NULL),
(107, 124, 'hbdi.sql', 7, '2019-10-11 ', NULL, 0, '', NULL),
(108, 124, 'hbdi-03.sql', 7, '1570826842', NULL, 0, '', NULL),
(109, 126, 'Health and the Information Nonseeker A Profile.pdf', 7, '1570827408', NULL, 0, '', NULL),
(110, 62, '0010-0285(92)90002-j.pdf', 7, '1571085039', NULL, 0, '', NULL),
(111, 62, 'hbdi-04.sql', 7, '1571085079', NULL, 0, '', NULL),
(112, 62, 'PsycNET_Export.ris', 7, '1571085377', NULL, 0, '', NULL),
(113, 62, 'savedrecs.txt', 7, '1571414777', NULL, 0, '', NULL),
(114, 66, 'savedrecs.txt', 7, '1571416524', NULL, 0, '', NULL),
(115, 64, 'savedrecs.txt', 7, '1571421884', NULL, 0, '', NULL),
(116, 64, 'savedrecs (1).txt', 7, '1571422240', NULL, 0, '', NULL),
(117, 64, 'savedrecs (2).txt', 7, '1571422275', NULL, 0, '', NULL),
(118, 64, 'MRI_log0001.txt', 7, '1571423632', NULL, 0, '', NULL),
(119, 64, 'MRI_log_0002.txt', 7, '1571423880', NULL, 0, '', NULL),
(120, 64, 'MRI_log_0003.txt', 7, '1571424058', NULL, 0, '', NULL),
(121, 64, 'MRI_log_0004.txt', 7, '1571424429', NULL, 0, '', NULL),
(122, 62, 'Breast_Cancer_process_log_0001.txt', 7, '1571424548', NULL, 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id_project_membership` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `administrator` int(1) DEFAULT NULL,
  `collaborator` int(1) DEFAULT NULL,
  `assistant` int(1) DEFAULT NULL,
  `observer` int(1) DEFAULT NULL,
  `PI` tinyint(1) DEFAULT NULL,
  `co-PI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id_project_membership`, `id_project`, `id_user`, `created_by`, `administrator`, `collaborator`, `assistant`, `observer`, `PI`, `co-PI`) VALUES
(1, 62, 7, 0, 1, 0, 0, 0, NULL, NULL),
(3, 64, 7, 7, 1, NULL, NULL, NULL, NULL, NULL),
(4, 65, 7, 7, 1, NULL, NULL, NULL, NULL, NULL),
(5, 66, 7, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(6, 67, 7, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(8, 70, 9, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 71, 7, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(10, 72, 7, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(11, 75, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 82, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 83, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 62, 10, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(15, 64, 10, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(16, 62, 0, NULL, NULL, 12, NULL, NULL, NULL, NULL),
(17, 62, 12, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(18, 64, 12, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(19, 64, 12, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(20, 64, 12, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(21, 72, 12, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(22, 70, 10, NULL, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `source` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metadata_store`
--

CREATE TABLE `metadata_store` (
  `id_metadata_store` int(11) NOT NULL,
  `id_entity` int(11) DEFAULT NULL,
  `time_creation` timestamp NULL DEFAULT NULL,
  `time_update` timestamp NULL DEFAULT NULL,
  `time_to_delete` timestamp NULL DEFAULT NULL,
  `time_deleted` timestamp NULL DEFAULT NULL,
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  `id_task` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id_permission` int(16) NOT NULL,
  `HIPAA` tinyint(1) DEFAULT NULL,
  `NIH` tinyint(1) DEFAULT NULL,
  `protected` tinyint(1) DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `FDA-Part-11` tinyint(1) DEFAULT NULL,
  `private` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id_permission`, `HIPAA`, `NIH`, `protected`, `public`, `FDA-Part-11`, `private`) VALUES
(4, 1, NULL, NULL, NULL, NULL, NULL),
(5, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_store`
--

CREATE TABLE `permission_store` (
  `id_permission_store` int(32) NOT NULL,
  `id_project` int(16) NOT NULL,
  `id_user` int(16) NOT NULL,
  `id_file` int(32) NOT NULL,
  `id_permission` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_interview_questions`
--

CREATE TABLE `php_interview_questions` (
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(8) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `row_order` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `php_interview_questions`
--

INSERT INTO `php_interview_questions` (`answer`, `id`, `question`, `row_order`) VALUES
('is_array(), in_array(), array_keys(),array_values()', 1, 'PHP array functions example', 3),
('Using header() function', 2, 'How to redirect using PHP', 4),
('Same. But count() is preferable.', 3, 'Differentiate PHP size() and count():', 1),
('A server side scripting language.', 4, 'What is PHP?', 0),
('PHP configuration file.', 5, 'What is php.ini?', 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id_project` int(16) NOT NULL,
  `id_creator` int(16) NOT NULL,
  `title_project` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_project_short` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_created` int(16) NOT NULL,
  `date_begin` int(16) NOT NULL,
  `date_complete` int(16) NOT NULL,
  `granted_by` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grant_number` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_description` varchar(4096) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compliance` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `type_project` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wiki` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id_project`, `id_creator`, `title_project`, `title_project_short`, `time_created`, `date_begin`, `date_complete`, `granted_by`, `grant_number`, `project_description`, `compliance`, `deleted`, `type_project`, `wiki`, `open`) VALUES
(62, 7, 'Analysis of the Wisconsin Breast Cancer Dataset and Machine Learning for Breast Cancer Detection\n', 'Cancer_Wisc', 1111111111, 1111111111, 1111111111, 'a', '1', 'This newest description is generated by an inline editing function.  This works.', 'a', 0, 'a', 'Wiki content.  Inline editing feature works.  Need to use the Content Table format of wikipedia.org.  Is this working, stilssl?   ss', NULL),
(64, 7, 'Magnetic Resonance Imaging Comparisons of Demented and Nondemented Adults', 'MRI_comparison', 1111111111, 1111111111, 1111111111, 'a', '1', '[Updated] The Open Access Series of Imaging Studies (OASIS) is a project aimed at making MRI data sets of the brain freely available to the scientific community. By compiling and freely distributing MRI data sets, we hope to facilitate future discoveries in basic and clinical neuroscience. OASIS is made available by the Washington University Alzheimer’s Disease Research Center, Dr. Randy Buckner at the Howard Hughes Medical Institute (HHMI)( at Harvard University, the Neuroinformatics Research Group (NRG) at Washington University School of Medicine, and the Biomedical Informatics Research Network (BIRN). Okay??? Okay! God.', 'a', 0, 'a', 'MRI Wiki. Updating.  Okay, this is working as a simple field editor.', NULL),
(65, 7, 'A grounded theory methodology for research synthesis', 'GTMRS2020', 1111111111, 1111111111, 1111111111, 'a', '1', 'The purpose of this investigation was twofold: 1) in conducting a research synthesis of distance education research studies using grounded theory methodology, this investigation derived a grounded theory from the distance education literature synthesized; and 2) in order to apply grounded theory for research synthesis, a procedure to coalesce grounded theory and research synthesis methods was developed. Research synthesis, as a family of research methods with diverse theoretical and procedural inclinations, is the analysis of analyses. Research synthesis serves various purposes; one of them being synthesizing primary research studies into more general and theoretical conclusions. With the attempts in creating approaches for research synthesis, however, there is no well-recognized method for including both qualitative and quantitative research studies in one research synthesis effort. Yin (1991) suggested that grounded theory can be used to conduct the research synthesis of multivocal literature. This investigation aimed for realizing that proposal and used the field of distance education literature as the target of synthesis. Resulted from this investigation were 1) a substantive grounded theory for distance education as a field; and 2) a procedure for applying grounded theory for purpose of research synthesis. With much of the endeavor putting into synergizing grounded theory and research synthesis, this investigation has been more a journey on methodological discovery than on distance education research.', 'a', 0, 'a', '', NULL),
(66, 7, 'ANTIEMETICS: NEUROTRANSMITTER RECEPTOR BINDING PREDICTS THERAPEUTIC ACTIONS', 'Neuro_Transmitter', 1111111111, 1111111111, 1111111111, 'a', '1', 'Neurotransmitter receptor binding studies indicate that effective antiemetic drugs potently block histamine H1, muscarinic cholinergic, or dopamine D2 receptors. Drug combinations affecting more than one of these receptors appear more clinically efficacious. Designing individual drugs or combinations that influence these three receptors may provide improved emesis control.\n\n', 'a', 0, 'a', NULL, NULL),
(104, 7, 'Test Project 09', 'TP09', 0, 0, 0, '', '', 'This is a project description of Test Project 09.  You can click on the text to edit this description. ', '', 0, '', NULL, NULL),
(129, 22, 'Test Project 01', 'TP01', 1571063532, 0, 0, '', '', 'aa', '', 0, '', NULL, NULL),
(130, 22, 'Test Project 03', 'TP03', 1571063732, 0, 0, '', '', 'Project description can be edited here.  File upload is still not working.  Why?', '', 0, '', NULL, NULL),
(131, 22, 'Test Project 72', 'TP72', 1571087337, 0, 0, '', '', 'aa', '', 0, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_keyword`
--

CREATE TABLE `project_keyword` (
  `id_project_keyword` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `keyword` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_keyword`
--

INSERT INTO `project_keyword` (`id_project_keyword`, `id_project`, `keyword`) VALUES
(1, 62, 'Lorem ipsum'),
(2, 62, 'dolor sit amet'),
(3, 62, 'consectetur adipiscing elit'),
(4, 62, 'dolor sit amet'),
(5, 62, 'sed do eiusmod'),
(6, 64, 'tempor incididunt'),
(8, 64, ' ut labore'),
(9, 64, ' et dolore'),
(10, 64, ' ut labore'),
(11, 64, ' et dolore'),
(12, 65, 'magna aliqua'),
(13, 66, 'keyword01'),
(14, 66, 'keyword02'),
(15, 65, 'keyword03'),
(16, 65, 'keyword04'),
(17, 104, 'keyword05'),
(18, 104, 'keyword06'),
(19, 104, 'keyword07');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `id_project_user` int(16) NOT NULL,
  `id_project` int(16) NOT NULL,
  `lead` int(16) DEFAULT NULL,
  `member` int(16) DEFAULT NULL,
  `guest` int(16) DEFAULT NULL,
  `time_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`id_project_user`, `id_project`, `lead`, `member`, `guest`, `time_created`) VALUES
(1, 62, 7, NULL, NULL, NULL),
(2, 64, NULL, 7, NULL, NULL),
(3, 65, NULL, 7, NULL, NULL),
(4, 66, NULL, 12, NULL, NULL),
(5, 66, 10, NULL, NULL, NULL),
(6, 66, NULL, 7, NULL, NULL),
(7, 62, NULL, 11, NULL, NULL),
(8, 104, 7, NULL, NULL, NULL),
(9, 104, NULL, 10, NULL, NULL),
(10, 62, NULL, 9, NULL, NULL),
(11, 62, NULL, 10, NULL, NULL),
(12, 65, 9, NULL, NULL, NULL),
(13, 65, NULL, 10, NULL, NULL),
(22, 123, 7, NULL, NULL, NULL),
(23, 124, 7, NULL, NULL, NULL),
(24, 125, 7, NULL, NULL, NULL),
(25, 126, 7, NULL, NULL, NULL),
(26, 127, 7, NULL, NULL, NULL),
(27, 128, 7, NULL, NULL, NULL),
(28, 107, 22, NULL, NULL, NULL),
(29, 130, 22, NULL, NULL, NULL),
(30, 131, 22, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` int(32) NOT NULL,
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
  `id_project` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `created_by`, `title_task`, `taskDescription`, `assigned_to`, `date_assigned`, `date_acknowledged`, `date_due`, `date_begin`, `date_complete_expected`, `date_completed`, `complete_check`, `resource`, `remark`, `id_project`) VALUES
(2, 7, 'Review Intro paragraph 2~4', 'Test Task 01 Description', 11, NULL, NULL, 1570099175, 0, 0, NULL, NULL, 11, 'Test Task 01 Remark', 64),
(15, 7, 'Enhance Abstract', 'Test Task 01 Description', 7, NULL, NULL, 1579045175, 0, 0, NULL, NULL, 11, 'Test Task 02 Remark', 62),
(18, 7, 'Data analysis iteration 3', 'Test Task 03 Description', 12, NULL, NULL, 1570947175, 0, 0, NULL, NULL, 10001, 'Test Task 03 Remark', 65),
(19, 7, 'Test interface functionalities', 'a', 7, NULL, NULL, 1570054588, NULL, NULL, NULL, NULL, 0, 'a', 65),
(21, 7, 'Data cleasing: Set 01', 'Describing the task.', 11, NULL, NULL, 1111111111, NULL, NULL, NULL, NULL, 0, 'No remarks.', 62),
(22, 7, 'Data cleasing: Set 02', 'Describing the task.', 11, NULL, NULL, 1111111111, NULL, NULL, NULL, NULL, 0, 'Test Task 04 Remark', 64),
(23, 7, 'Hypothesis 3-5: Elaborate on comments', 'Test Task 05 Description', 7, NULL, NULL, 1111111111, NULL, NULL, NULL, NULL, 0, 'Test Task 05 Remark', 66),
(24, 7, 'Contact Dr. Peter Shultz for comments on citation', 'Test Task 06 Description', 12, NULL, NULL, 1111111111, NULL, NULL, NULL, NULL, 0, 'Test Task 06 Remark', 66),
(25, 7, 'Verify with Lau and Coiera on confirmation bias', 'Test Task 06 Description', 12, NULL, NULL, 1111111111, NULL, NULL, NULL, NULL, 0, 'Test Task 06 Remark', 104),
(28, 7, 'Respond to reviewer #2', 'Test Task 09 Description', 11, NULL, NULL, 1570195032, NULL, NULL, NULL, NULL, 0, 'Test Task 09 Remark', 65),
(31, 22, 'Fix the mailing error in interface', '1', 7, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 'Test Task 01 Remark', 131);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id_test` int(11) DEFAULT NULL,
  `prjDescription` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(16) NOT NULL,
  `id_affiliation` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_last` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_first` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliation` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fsu` int(11) NOT NULL,
  `team` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_verify_token` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_affiliation`, `name_last`, `name_first`, `email`, `username`, `password`, `affiliation`, `id_fsu`, `team`, `account_verify_token`, `activated`) VALUES
(7, '', 'Chen', 'TY', 'tychen742@gmail.com', 'tychen', '$2y$10$gxmsvGleba4qw//mPEAQj.20nauPWrbhgzRdbvM1.VrOVYmttyhIe', 'FSU', 0, '', '$2y$10$dNuW7DUHLkP96ZLyc7FcWejEYqhVM99i1zFafC1iayPLWLhKZ9Os6', 1),
(9, '', 'MacDonnell', 'Grant', 'macg@com.fsu.edu', 'macg', '$2y$10$rB6hbnDbmiJDgfww1mRkr.SGX5g9XHXqL49/trCrxgnT9ulpOGTYK', 'FSU', 0, '', '', 1),
(10, '', 'Stephensen', 'Mary', 'marys@fsu.edu', 'marys', '$2y$10$AX.CFIj3an5TOMSqSN9ZDu4CKhz0KsZnRC2v9ZHWaNHkid3lr38EG', 'FSU', 0, '', '', 1),
(11, '', 'Doe', 'Jane', 'test03@test.com', 'TestUser03', '$2y$10$5gbO2sJqEKVbpg.kfe170.dVea7FHqHqETWrUonjLWA/9pEPbo0am', 'FSU', 0, '', '', 1),
(12, '', 'Doe', 'John', 'jdoe@fsu.edu', 'jdoe', '$2y$10$mk3EUrij7yZbxq5RhnIFF.LzgAiK0i0fp6tNrLnK2qHgRCmdnW.LO', 'FSU', 0, '', '', 1),
(22, '', 'Chen', 'Tsangyao', 'tc16k@my.fsu.edu', 'tc16k', '$2y$10$lPGkUrTUnnS3VOqM3cwgnO9/9EAy88ZgjTfOGG3NtYKXw3NgCMW1q', 'FSU', 0, '', 'g9ed55bb9af175c3e089801037b5d2e9', 1),
(33, '', 'Chen', 'Tsangyao', 'evergreenterrace744@gmail.com', 'tc16k', '$2y$10$nWSzH.Ppk4LYkgtZqx8H4.KMayp59ryp4roQF2UXctATwKdvkVmZi', 'FSU', 0, '', 'r14ba68fc5685f68a2ee2c9b4f29a6d8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `id_user_activities` int(16) DEFAULT NULL,
  `id_user` int(16) DEFAULT NULL,
  `id_file` int(16) DEFAULT NULL,
  `id_project` int(16) DEFAULT NULL,
  `time_user_login` int(11) DEFAULT NULL,
  `time_user_created` int(11) DEFAULT NULL,
  `time_project_created` int(11) DEFAULT NULL,
  `time_file_uploaded` int(11) DEFAULT NULL,
  `time_file_deleted` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `first_name`, `last_name`, `city`) VALUES
(1, 'TT', 'K', 'Tally'),
(2, 'Facebookssss', 'Inc', 'California'),
(3, 'MacDonnell', 'Blog', 'Chennai, India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `title_project` (`id_project`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `uploaded_by` (`uploaded_by`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_project_membership`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `metadata_store`
--
ALTER TABLE `metadata_store`
  ADD PRIMARY KEY (`id_metadata_store`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_permission`);

--
-- Indexes for table `permission_store`
--
ALTER TABLE `permission_store`
  ADD PRIMARY KEY (`id_permission_store`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_file` (`id_file`),
  ADD KEY `id_permission` (`id_permission`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_creator` (`id_creator`);

--
-- Indexes for table `project_keyword`
--
ALTER TABLE `project_keyword`
  ADD PRIMARY KEY (`id_project_keyword`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`id_project_user`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `lead` (`lead`),
  ADD KEY `member` (`member`),
  ADD KEY `guest` (`guest`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `assign_to` (`assigned_to`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id_file` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id_project_membership` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `metadata_store`
--
ALTER TABLE `metadata_store`
  MODIFY `id_metadata_store` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_permission` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permission_store`
--
ALTER TABLE `permission_store`
  MODIFY `id_permission_store` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id_project` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `project_keyword`
--
ALTER TABLE `project_keyword`
  MODIFY `id_project_keyword` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id_project_user` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`uploaded_by`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Constraints for table `permission_store`
--
ALTER TABLE `permission_store`
  ADD CONSTRAINT `permission_store_ibfk_1` FOREIGN KEY (`id_permission`) REFERENCES `permissions` (`id_permission`),
  ADD CONSTRAINT `permission_store_ibfk_2` FOREIGN KEY (`id_file`) REFERENCES `files` (`id_file`),
  ADD CONSTRAINT `permission_store_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `permission_store_ibfk_4` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`);

--
-- Constraints for table `project_keyword`
--
ALTER TABLE `project_keyword`
  ADD CONSTRAINT `project_keyword_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`);

--
-- Constraints for table `project_user`
--
ALTER TABLE `project_user`
  ADD CONSTRAINT `project_user_ibfk_4` FOREIGN KEY (`lead`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `project_user_ibfk_5` FOREIGN KEY (`member`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `project_user_ibfk_6` FOREIGN KEY (`guest`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_id_project` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`),
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`assigned_to`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
