-- MySQL dump 10.13  Distrib 5.5.62, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: tbrasil_site
-- ------------------------------------------------------
-- Server version	5.5.62-0+deb8u1

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
-- Table structure for table `associados`
--

DROP TABLE IF EXISTS `associados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `associados` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(150) NOT NULL,
  `CPF` char(11) NOT NULL,
  `TelefoneDDD` char(3) DEFAULT NULL,
  `Telefone` varchar(10) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `CelularDDD` char(3) DEFAULT NULL,
  `Celular` varchar(10) DEFAULT NULL,
  `Cidade` varchar(200) NOT NULL,
  `UF` char(2) NOT NULL,
  `TextoContraCorrupacao` varchar(4000) DEFAULT NULL,
  `CodigoComoConheceuTB` smallint(6) NOT NULL,
  `AceiteNovidades` int(11) DEFAULT NULL,
  `AceiteDeclaracaoNaoCondenado` bit(1) NOT NULL,
  `AceiteNormas` bit(1) NOT NULL,
  `AceiteObjetivos` bit(1) NOT NULL,
  `AceiteLembreteDoacao` int(11) DEFAULT NULL,
  `DataCadastro` datetime NOT NULL,
  `Ativo` int(11) DEFAULT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  `ExibeLista` int(11) DEFAULT NULL,
  `CodigoEscolaridadeTipo` smallint(6) NOT NULL,
  `Valor` decimal(10,2) NOT NULL,
  `TipoAssinatura` enum('anual','mensal') NOT NULL,
  `Endereco` varchar(500) DEFAULT NULL,
  `Profissao` varchar(200) DEFAULT NULL,
  `EntidadeEmpregadora` varchar(200) DEFAULT NULL,
  `Motivo` text,
  PRIMARY KEY (`Codigo`),
  KEY `fk_como_conheceu_tb` (`CodigoComoConheceuTB`),
  KEY `fk_escolaridade_tipo` (`CodigoEscolaridadeTipo`),
  CONSTRAINT `fk_como_conheceu_tb` FOREIGN KEY (`CodigoComoConheceuTB`) REFERENCES `associados_como_conheceu_tipo` (`Codigo`),
  CONSTRAINT `fk_escolaridade_tipo` FOREIGN KEY (`CodigoEscolaridadeTipo`) REFERENCES `associados_escolaridade_tipo` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associados`
--

LOCK TABLES `associados` WRITE;
/*!40000 ALTER TABLE `associados` DISABLE KEYS */;
INSERT INTO `associados` VALUES (3,'teste associado','22222211122','11','2312222','teste@teste.com','11','222333222','Santos','SP','Teste de texto',2,1,'\0','\0','\0',0,'2015-11-04 00:00:00',1,'2015-06-05 14:26:00',NULL,1,1,0.00,'anual',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `associados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `associados_como_conheceu_tipo`
--

DROP TABLE IF EXISTS `associados_como_conheceu_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `associados_como_conheceu_tipo` (
  `Codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  `Ativo` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associados_como_conheceu_tipo`
--

LOCK TABLES `associados_como_conheceu_tipo` WRITE;
/*!40000 ALTER TABLE `associados_como_conheceu_tipo` DISABLE KEYS */;
INSERT INTO `associados_como_conheceu_tipo` VALUES (1,'Anúncio na Internet','2015-06-05 09:22:28',NULL,0),(2,'Televisão','2015-06-05 09:22:28',NULL,0),(3,'E-mail ou mala direta','2015-06-05 09:22:28',NULL,0),(4,'Acesso direto','2015-06-05 09:22:28',NULL,0),(5,'Amigo(a)','2015-06-05 09:22:28',NULL,0),(6,'Reportagens da mídia','2019-02-21 20:40:56',NULL,1),(7,'Mídias sociais','2019-02-21 20:40:56',NULL,1),(8,'Amigos ou familiares','2019-02-21 20:40:56',NULL,1),(9,'Acesso direto','2019-02-21 20:40:56',NULL,1),(10,'Outros','2019-02-21 20:40:56',NULL,1),(17,'Teste','2019-02-21 22:06:13',NULL,0),(18,'Teste do campo outros','2019-02-21 22:07:54',NULL,0),(19,'EMAIL DA TRANSPARÊNCIA BRASIL','2019-05-04 19:30:02',NULL,0),(20,'trabalho na tb','2019-12-06 19:56:23',NULL,0),(21,'testeoutros','2020-05-12 14:41:42',NULL,0),(22,'Jornais impressos','2020-06-23 14:03:12',NULL,0);
/*!40000 ALTER TABLE `associados_como_conheceu_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `associados_doacao_historico`
--

DROP TABLE IF EXISTS `associados_doacao_historico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `associados_doacao_historico` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoAssociado` int(11) NOT NULL,
  `CodigoValor` smallint(6) NOT NULL,
  `Valor` decimal(10,2) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_associado` (`CodigoAssociado`),
  CONSTRAINT `fk_associado` FOREIGN KEY (`CodigoAssociado`) REFERENCES `associados` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associados_doacao_historico`
--

LOCK TABLES `associados_doacao_historico` WRITE;
/*!40000 ALTER TABLE `associados_doacao_historico` DISABLE KEYS */;
/*!40000 ALTER TABLE `associados_doacao_historico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `associados_escolaridade_tipo`
--

DROP TABLE IF EXISTS `associados_escolaridade_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `associados_escolaridade_tipo` (
  `Codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associados_escolaridade_tipo`
--

LOCK TABLES `associados_escolaridade_tipo` WRITE;
/*!40000 ALTER TABLE `associados_escolaridade_tipo` DISABLE KEYS */;
INSERT INTO `associados_escolaridade_tipo` VALUES (1,'Até ensino médio','2015-07-28 04:48:40'),(2,'Ensino superior','2015-07-28 04:48:40'),(3,'Pós-graduação (especialização)','2015-07-28 04:48:40'),(4,'Mestrado','2015-07-28 04:48:40'),(5,'Doutorado','2015-07-28 04:48:40');
/*!40000 ALTER TABLE `associados_escolaridade_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auditorias_contabilidade`
--

DROP TABLE IF EXISTS `auditorias_contabilidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditorias_contabilidade` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Ano` varchar(50) NOT NULL,
  `Documento` varchar(100) DEFAULT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditorias_contabilidade`
--

LOCK TABLES `auditorias_contabilidade` WRITE;
/*!40000 ALTER TABLE `auditorias_contabilidade` DISABLE KEYS */;
INSERT INTO `auditorias_contabilidade` VALUES (1,'2016','Balanço e Demonstração de Resultados',''),(2,'2016','Relatório dos auditores independentes sobre as demonstrações financeiras em 21 de dezembro de 2016','\0'),(3,'2016','Relatório dos auditores independentes sobre as demonstrações financeiras em 21 de dezembro de 2016','\0'),(4,'2019','Relatório','\0'),(5,'2016','Relatório dos auditores independentes sobre as demonstrações financeiras em 31 de dezembro de 2016',''),(6,'2017','Relatório dos auditores independentes sobre as demonstrações financeiras em 31 de dezembro de 2017',''),(7,'2017','Balanço Patrimonial','\0'),(8,'2017','Balanço e Demonstração de Resultados','\0'),(9,'2017','Balanço e Demonstração de Resultados','\0'),(10,'2017','Balanço e Demonstração de Resultados',''),(11,'2018','Balanço e Demonstração de Resultados',''),(12,'2018','Relatório dos auditores independentes sobre as demonstrações financeiras em 31 de dezembro de 2018',''),(13,'2019','Balanço e Demonstração de Resultados	',''),(14,'2019','Relatório dos auditores independentes sobre as demonstrações financeiras em 31 de dezembro de 2019','');
/*!40000 ALTER TABLE `auditorias_contabilidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auditorias_contabilidade_arquivos`
--

DROP TABLE IF EXISTS `auditorias_contabilidade_arquivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditorias_contabilidade_arquivos` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoAuditoriaContabilidade` int(11) NOT NULL,
  `Arquivo` varchar(100) NOT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  PRIMARY KEY (`Codigo`),
  KEY `fk_auditorias_contabilidade` (`CodigoAuditoriaContabilidade`),
  CONSTRAINT `fk_auditorias_contabilidade` FOREIGN KEY (`CodigoAuditoriaContabilidade`) REFERENCES `auditorias_contabilidade` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditorias_contabilidade_arquivos`
--

LOCK TABLES `auditorias_contabilidade_arquivos` WRITE;
/*!40000 ALTER TABLE `auditorias_contabilidade_arquivos` DISABLE KEYS */;
INSERT INTO `auditorias_contabilidade_arquivos` VALUES (1,1,'Balanco_2016.pdf',''),(2,1,'DRE.pdf',''),(3,2,'RAI 2016.pdf',''),(4,3,'RAI 2016.pdf',''),(5,4,'texto_310889368.pdf',''),(6,3,'RAI 2016 - Transparência Brasil.pdf',''),(7,5,'RAI_2016-Transparencia_Brasil.pdf',''),(8,6,'RAI 2017 - TB.pdf',''),(9,7,'Balanc?o Patrimonial - 2017.pdf',''),(10,9,'DRE 2017.pdf',''),(11,9,'Balanço 2017.pdf',''),(12,10,'Balanço-2017.pdf',''),(13,10,'DRE-2017.pdf',''),(14,11,'Balanço-2018.pdf',''),(15,11,'DRE-2018.pdf',''),(16,12,'RAI-2018.pdf',''),(17,13,'Balanço-2019.pdf',''),(18,13,'DRE-2019.pdf',''),(19,14,'RAI-2019.pdf','');
/*!40000 ALTER TABLE `auditorias_contabilidade_arquivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoBannerTipo` smallint(6) NOT NULL,
  `CodigoTargetTipo` smallint(6) NOT NULL,
  `Link` varchar(100) DEFAULT NULL,
  `Imagem` varchar(100) DEFAULT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Resumo` varchar(300) DEFAULT NULL,
  `Inicio` datetime DEFAULT NULL,
  `Termino` datetime DEFAULT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  `Ordem` int(11) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_tipo_banner` (`CodigoBannerTipo`),
  KEY `fk_tipo_target` (`CodigoTargetTipo`),
  CONSTRAINT `fk_tipo_banner` FOREIGN KEY (`CodigoBannerTipo`) REFERENCES `banners_tipo` (`Codigo`),
  CONSTRAINT `fk_tipo_target` FOREIGN KEY (`CodigoTargetTipo`) REFERENCES `targets_tipo` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (2,1,1,'http://www.uol.com.br','teste.jpg','Teste de banner 1','Teste de resumo 1','0000-00-00 00:00:00','0000-00-00 00:00:00','\0','2015-06-04 11:39:58',NULL,NULL),(3,2,1,'https://www.youtube.com/embed/5EPGM6W3lkA',NULL,'Vídeo reportagem do Fantástico','','2015-06-08 00:00:00','2015-06-16 00:00:00','\0','2015-06-05 00:02:18','2015-07-07 20:09:15',NULL),(4,1,1,'http://www.transparencia.org.br/quem-somos','banner_01_v05.jpg','Conheça a transparência','','2014-03-15 00:00:00',NULL,'\0','2015-06-15 14:37:00','2017-02-21 18:20:10',NULL),(5,1,2,'http://www.asclaras.org.br/@index.php','AsClarasNovo_1240x600.jpg','Às Claras','','2015-03-15 00:00:00',NULL,'\0','2015-07-07 18:50:08','2017-02-21 17:57:18',NULL),(6,1,1,'www.yahoo.com','farra 1240.psd','fantastico','',NULL,NULL,'\0','2015-07-08 01:51:29','2015-07-08 01:53:31',NULL),(7,1,2,'https://youtu.be/J4Yash6Xlkc','banner_03_V4.jpg','Destaque fantástico','',NULL,NULL,'\0','2015-07-08 21:17:08','2017-02-21 18:20:08',NULL),(8,1,1,'www.asclaras.org.br','download.jpg','teste','',NULL,NULL,'\0','2015-07-31 20:56:26','2015-07-31 20:57:43',NULL),(9,1,2,'https://desafiosocial.withgoogle.com/brazil2016/charity/transparencia-brasil','Cade2.jpg','Cadê Minha Escola','','2014-06-01 00:00:00',NULL,'\0','2016-06-01 14:29:15','2017-02-21 18:19:00',NULL),(10,1,2,'http://www.transparencia.org.br/quem-somos','banner_01.jpg','Conheça','','2016-06-01 00:00:00',NULL,'\0','2016-06-01 14:36:23','2017-02-21 17:57:03',NULL),(11,1,2,'http://www.asclaras.org.br','bannerAsClaras_1240x600.jpg','As Claras','','2016-06-01 00:00:00',NULL,'\0','2016-06-01 14:51:12','2017-02-21 18:18:55',NULL),(12,1,2,'https://desafiosocial.withgoogle.com/brazil2016/charity/transparencia-brasil','CadeMinhaEscola2.jpg','Cadê 2','','2016-06-01 00:00:00',NULL,'\0','2016-06-01 16:36:57','2016-06-01 16:37:52',NULL),(13,1,2,'http://www.transparencia.org.br/blog/post/aep','AeP_1240x600.jpg','Achados e Pedidos','','2010-03-15 00:00:00',NULL,'\0','2017-02-17 16:51:39','2017-02-21 17:59:33',NULL),(14,1,1,'http://www.transparencia.org.br/blog/post/aep','AeP_1240x600.jpg','Achados e Pedidos','','2000-03-15 00:00:00',NULL,'\0','2017-02-21 18:03:21','2017-02-21 18:18:53',NULL),(15,1,2,'http://www.transparencia.org.br/blog/post/aep','AeP_1240x600.jpg','Achados e Pedidos 2','','2000-03-15 00:00:00','2020-03-15 00:00:00','\0','2017-02-21 18:08:01','2017-02-21 18:18:51',NULL),(16,1,2,'http://www.transparencia.org.br/blog/post/aep','AeP_1240x600.jpg','Achados e pedidos 3','','1995-03-15 00:00:00','2019-03-15 00:00:00','\0','2017-02-21 18:09:30','2017-02-21 18:18:48',NULL),(17,1,1,'http://www.transparencia.org.br/blog/post/aep','AeP_1240x600.jpg','Achados e Pedidos','',NULL,'2020-03-15 00:00:00','\0','2017-02-21 18:20:04','2017-03-24 19:14:20',NULL),(18,1,2,'https://desafiosocial.withgoogle.com/brazil2016/charity/transparencia-brasil','banner_01_v05.jpg','Conheça a Transparência','',NULL,'2021-03-15 00:00:00','\0','2017-02-21 18:21:13','2017-05-24 16:24:13',NULL),(19,1,2,'https://desafiosocial.withgoogle.com/brazil2016/charity/transparencia-brasil','Cade2.jpg','Cadê Minha Escola','',NULL,'2022-03-15 00:00:00','\0','2017-02-21 18:22:10','2017-05-24 16:25:04',NULL),(20,1,2,'http://www.asclaras.org.br','bannerAsClaras_1240x600.jpg','Às Claras','',NULL,'2023-03-15 00:00:00','\0','2017-02-21 18:22:58','2017-05-24 16:25:26',NULL),(21,2,1,'https://youtu.be/J4Yash6Xlkc',NULL,'Destaque no Fantástico','',NULL,'2015-03-15 00:00:00','\0','2017-02-21 18:24:01','2017-05-24 16:25:50',NULL),(22,1,2,'http://achadosepedidos.org.br','AeP2low_1240x600.jpg','Achados e Pedidos','','2016-02-21 00:00:00','2023-01-01 00:00:00','\0','2017-04-06 12:36:46','2017-08-24 20:33:26',NULL),(23,1,2,'transparencia.org.br/projetos','banner_01_v05.jpg','Conheça a Transparência','',NULL,'2023-10-31 00:00:00','\0','2017-05-24 16:26:38','2017-08-24 20:33:57',NULL),(24,1,2,'https://desafiosocial.withgoogle.com/brazil2016/charity/transparencia-brasil','Cade2.jpg','Cadê minha escola?','',NULL,'2023-05-31 00:00:00','\0','2017-05-24 16:27:26','2017-08-24 14:51:17',NULL),(25,1,2,'https://www.transparencia.org.br/projetos/tadepe','bannerAsClaras_1240x600.jpg','Tá de Pé','',NULL,'2023-05-31 00:00:00','\0','2017-05-24 16:28:06','2017-08-24 14:53:01',NULL),(26,1,1,'https://youtu.be/J4Yash6Xlkc',NULL,'Destaque no Fantástico','',NULL,'2023-05-25 00:00:00','\0','2017-05-24 16:28:48','2017-05-24 16:29:08',NULL),(27,1,2,'https://www.transparencia.org.br/blog/post/obratransparente','ObraTransparente_1240x600.jpg','Obra Transparente','',NULL,'2025-03-16 00:00:00','\0','2017-06-01 16:39:39','2017-06-14 12:43:36',NULL),(28,1,2,'https://www.transparencia.org.br/blog/post/obratransparente','ObraTransparente_1240x600.jpg','Obra Transparente','','2017-06-14 00:00:00','2023-06-30 00:00:00','\0','2017-06-14 12:44:13','2017-08-24 20:34:21',NULL),(29,1,1,'https://www.transparencia.org.br/projetos/tadepe','tdp_color.png','Tá de Pé','Fiscalize obras de creches e escolas.','2017-08-24 00:00:00','2019-01-01 00:00:00','\0','2017-08-24 14:53:41','2017-08-24 14:57:37',NULL),(30,2,1,'https://www.youtube.com/watch?v=AGjglveOsKI','tdp_color.png','Vídeo Ta de Pé','','2017-08-24 00:00:00','2020-12-31 00:00:00','\0','2017-08-24 14:57:15','2017-08-24 15:00:01',NULL),(31,1,1,'https://www.transparencia.org.br/projetos/tadepe','tdp_color.png','Tá de Pé','','2017-08-24 00:00:00','2019-01-01 00:00:00','\0','2017-08-24 15:00:47','2017-08-24 15:06:37',NULL),(32,1,2,'https://www.transparencia.org.br/projetos/tadepe','1-TDP2_1240x600.jpg','Tá de Pé','','2011-08-24 00:00:00','2019-01-01 00:00:00','\0','2017-08-24 15:07:05','2020-03-05 20:58:28',5),(33,1,2,'http://achadosepedidos.org.br','2-2AeP2low_1240x600.jpg','Achados e Pedidos','','2017-08-24 00:00:00','2020-05-31 00:00:00','\0','2017-08-24 20:35:39','2021-01-26 20:38:03',12),(34,1,2,'https://www.transparencia.org.br/projetos/obratransparente','3-3ObraTransparente_1240x600.jpg','Obra Transparente','','2017-08-24 00:00:00','2021-03-31 00:00:00','\0','2017-08-24 20:36:39','2019-05-08 21:17:30',NULL),(35,1,2,'https://www.transparencia.org.br/projetos','4-banner_01_v05.jpg','Conheça a Transparência','','2017-08-24 00:00:00','2021-03-31 00:00:00','','2017-08-24 20:37:16','2020-12-17 22:17:01',13),(36,1,1,'https://www.transparencia.org.br/apoie','Dia de Doar - banner.png','Dia de Doar','','2018-11-26 00:00:00','2018-11-28 00:00:00','\0','2018-11-26 17:30:11','2018-12-06 16:48:37',NULL),(37,1,2,'https://www.transparencia.org.br/blog/obra-transparente-e-premiado-na-7a-edicao-do-premio-republica/','CadeMinhaEscola (1) (3).jpg','OT','','2019-05-17 00:00:00','2019-05-31 00:00:00','\0','2019-05-09 22:16:53','2019-05-17 18:12:26',NULL),(38,1,2,'https://www.transparencia.org.br/blog/cartaabertavetospl/','carta a presidencia.jpg','Carta aberta à presidência por vetos ao PL da Improbidade Partidária','','2019-10-02 00:00:00','2019-11-01 00:00:00','\0','2019-05-17 19:14:08','2019-10-03 19:53:08',2),(39,1,1,'https://www.transparencia.org.br/blog/9-medidas-para-reestruturar-o-programa-proinfancia-e-dar-mais-','carrossel manoel2019-02.jpg','Coluna Manoel ','','2019-06-26 00:00:00','2019-07-26 00:00:00','\0','2019-06-26 17:51:14','2019-06-26 17:51:39',NULL),(40,1,1,'https://www.transparencia.org.br/blog/9-medidas-para-reestruturar-o-programa-proinfancia-e-dar-mais-','carrossel manoel2019-02.jpg','Coluna Manoel ','','2019-06-26 00:00:00','2019-07-26 00:00:00','\0','2019-06-26 17:53:07','2019-06-26 17:53:20',NULL),(41,1,1,'https://www.transparencia.org.br/blog/9-medidas-para-reestruturar-o-programa-proinfancia-e-dar-mais-','2025-02.png','Coluna Manoel ','','2019-05-01 00:00:00','2019-06-01 00:00:00','\0','2019-06-26 17:58:50','2019-07-04 22:05:21',NULL),(42,1,1,'teste','carrossel ot8-02.jpg','teste','teste','2019-07-01 00:00:00','2019-09-30 00:00:00','\0','2019-07-12 21:03:28','2019-07-12 21:05:22',NULL),(43,1,2,'https://www.transparencia.org.br/newsletter','carrossel newsletter-07-07-07-07-07-07.jpg','Newsletter','','2019-07-12 00:00:00','2019-08-19 00:00:00','','2019-07-12 21:07:32','2020-12-17 22:17:01',11),(44,1,1,'https://www.transparencia.org.br/blog/colunas-da-semana-julho-de-2019/','aprovado 02.08-11.jpg','Coluna Manoel ','','2019-08-02 00:00:00','2019-09-02 00:00:00','\0','2019-08-02 22:27:43','2019-08-27 13:02:40',NULL),(45,1,1,'https://www.transparencia.org.br/blog/uso-de-transporte-privado-pela-prefeitura-de-sao-paulo-tem-fal','WhatsApp Image 2019-08-09 at 16.28.40.jpeg','Uso de transporte privado pela Prefeitura de São Paulo','','2019-08-12 00:00:00','2019-09-12 00:00:00','\0','2019-08-12 15:55:20','2019-10-02 15:58:36',1),(46,1,2,'https://www.atados.com.br/vaga/fiscalizando-contratos-de-merenda?fbclid=IwAR1ShCQ9OKOlVF13dzwjtwuycC','MERENDA NOVO-13.jpg','Merenda','','2019-08-28 00:00:00','2019-09-11 00:00:00','\0','2019-08-28 18:30:57','2019-08-28 18:31:23',NULL),(47,1,1,'https://www.transparencia.org.br/blog/de-olho-nos-contratos-de-merenda/','versão1543-13.jpg','Merenda','','2019-08-28 00:00:00','2019-08-29 00:00:00','\0','2019-08-28 18:42:11','2019-08-30 15:24:30',0),(48,1,1,'https://www.transparencia.org.br/blog/guias-para-controle-social-de-obras-publicas/','cover guias.jpg','Guias para controle social de obras públicas','Para estimular e facilitar o uso do manual, a Transparência Brasil preparou uma coleção de guias que vai orientar quem está começando a acompanhar o tema e agilizar a consulta de quem quer se aprofundar em especificidades do monitoramento.','2019-10-02 00:00:00','2019-11-01 00:00:00','','2019-10-02 15:50:30','2020-12-17 22:17:01',10),(49,1,1,'https://www.transparencia.org.br/blog/de-onde-veio-e-para-onde-vai-o-dinheiro-que-o-governo-federal-','Orcamento_Federal_Pandemia.png','Movimentações orçamentárias pandemia','','2020-04-16 00:00:00',NULL,'\0','2019-10-25 19:36:33','2020-06-22 18:47:25',0),(50,1,1,'https://www.transparencia.org.br/blog/carla-os-porto-alegre/','cover carla3.jpg','O trabalho de quem acompanha políticas públicas na ponta','Parceira da Transparência Brasil no projeto de monitoramento das merendas escolares, a coordenadora executiva do Observatório Social do Brasil - Porto Alegre, Carla Fátima Pereira da Silva, fala sobre a importância da construção de uma relação de cooperação com poder público e conselhos municipais p','2019-11-08 00:00:00','2019-11-28 00:00:00','\0','2019-11-07 15:18:42','2020-01-28 15:42:46',NULL),(51,1,1,'https://www.transparencia.org.br/blog/carta-a-ministra-rosa-weber/','cover tse.png','Carta aberta ao TSE pela prestação de contas mensal de partidos políticos','A Transparência Brasil, em conjunto com o Transparência Partidária e outros movimentos da sociedade civil, enviou uma carta aberta à ministra Rosa Weber, presidente do \r\nTribunal Superior Eleitoral, solicitando que a corte obrigue os partidos a prestar contas a cada mês.','2019-11-11 00:00:00','2019-11-22 00:00:00','\0','2019-11-07 15:32:24','2019-11-07 15:33:42',NULL),(52,1,1,'https://www.transparencia.org.br/blog/wp-content/uploads/2020/01/Relat%C3%B3rio-2019.pdf','banner rel 2019.jpg','Relatório de Atividades 2019','','2020-01-21 00:00:00','2020-03-31 00:00:00','\0','2020-01-21 18:10:59','2020-07-23 20:32:14',2),(53,1,1,'https://www.transparencia.org.br/blog/coluna-21-limites-da-autodeterminacao-informativa-na-era-da-ec','cover data protection day fb4.jpg','Dia Internacional da Proteção de Dados Pessoais.','','2020-01-28 00:00:00','2020-02-28 00:00:00','\0','2020-01-28 15:42:06','2020-03-05 20:59:02',NULL),(54,1,1,'https://www.transparencia.org.br/blog/nota-conjunta-so-venceremos-a-pandemia-com-transparencia/','1.png','LAI MP','','2020-03-24 00:00:00','2020-04-27 00:00:00','\0','2020-03-24 20:54:11','2020-04-16 16:48:50',1),(55,1,1,'https://www.transparencia.org.br/blog/carta-aberta-pela-participacao-social-no-processo-legislativo/','Carta_Aberta_Participacao_Processo_Legislativo.png','Carta aberta contra suspensão de prazos das MPs','','2020-04-16 00:00:00',NULL,'\0','2020-04-07 20:50:01','2020-06-02 17:46:22',1),(56,1,1,'https://www.transparencia.org.br/blog/tag/covid-19/','banner2covidPNG.png','COVID 19','','2020-04-27 00:00:00',NULL,'\0','2020-04-27 21:08:37','2020-04-27 21:11:49',NULL),(57,1,1,'https://www.transparencia.org.br/blog/tag/covid-19/','banner2covidPNG.png','covid','','2020-04-27 00:00:00',NULL,'\0','2020-04-27 21:12:27','2020-04-27 21:15:52',NULL),(58,1,1,'https://www.transparencia.org.br/blog/tag/covid-19/','bannerFINALcovidPNG.png','COVID 19','','2020-04-27 00:00:00',NULL,'','2020-04-27 21:16:22','2020-12-17 22:17:01',9),(59,1,1,'https://www.transparencia.org.br/blog/webinar-discute-desafios-do-cumprimento-da-lai-no-contexto-da-','banner-site--trasparencia-1280x746px.png','Lai em quarentena','','2020-05-15 00:00:00','2020-05-19 00:00:00','\0','2020-05-15 15:14:46','2020-05-26 15:02:04',NULL),(60,1,1,'https://www.transparencia.org.br/blog/nota-conjunta-votacao-do-pl-das-fake-news-poe-em-risco-liberda','PL_fake_news_home_site.png','Contra votação do PL Fake News','Pela retirada do PL da pauta do Senado.','2020-06-02 00:00:00','2020-06-10 00:00:00','\0','2020-06-02 17:49:06','2020-06-22 18:47:21',NULL),(61,1,1,'https://www.transparencia.org.br/blog/retrocessos-na-transparencia-publica-federal-no-governo-bolson','Retrocessos_Home.png','Retrocessos transparência federal','','2020-06-22 00:00:00',NULL,'\0','2020-06-22 18:48:06','2020-12-17 22:08:19',NULL),(62,1,1,'https://www.transparencia.org.br/blog/apenas-39-das-verbas-federais-para-combate-a-pandemia-entre-po','Banner_Noticia_Home.png','Gastos federais para combate à pandemia junto a povos indígenas','','2020-06-22 00:00:00',NULL,'\0','2020-06-23 22:31:35','2021-01-26 17:29:39',8),(63,1,1,'https://www.transparencia.org.br/blog/transparencia-brasil-lanca-plataforma-para-monitoramento-da-al','COMO ESTÁ A COMPRA DE MERENDA NA SUA CIDADE_ (2).png','Transparência Brasil lança plataforma para monitoramento da alimentação escolar','','2020-07-23 00:00:00',NULL,'\0','2020-07-23 20:01:11','2020-07-23 20:02:07',NULL),(64,1,1,'https://www.transparencia.org.br/blog/transparencia-brasil-lanca-plataforma-para-monitoramento-da-al','Banner_TdP_Merenda_Novo.png','Transparência Brasil lança plataforma para monitoramento da alimentação escolar','','2020-07-23 00:00:00',NULL,'','2020-07-23 20:07:32','2021-01-26 20:41:17',7),(65,1,1,'https://www.transparencia.org.br/blog/transparencia-brasil-lanca-plataforma-para-monitoramento-de-co','Banner_TdP_CE_Novo.png','Confira as compras de combate a Covid-19 do seu município','','2020-09-16 00:00:00',NULL,'','2020-09-16 23:00:59','2021-01-26 20:41:03',6),(66,1,1,'https://www.transparencia.org.br/blog/no-dia-internacional-do-acesso-a-informacao-organizacoes-promo','facebook_twitter.png','Organizações promovem campanha pela regulamentação da LAI','','2020-09-28 00:00:00',NULL,'\0','2020-09-28 19:46:17','2021-01-26 20:48:38',5),(67,1,1,'https://www.transparencia.org.br/blog/tse-aprova-por-unanimidade-pedido-da-transparencia-brasil-e-do','banner extratos partidos  (2).png','TSE aprova por unanimidade pedido da Transparência Brasil ','','2020-11-25 00:00:00',NULL,'\0','2020-11-25 16:33:44','2020-12-17 22:08:00',NULL),(68,1,1,'https://www.transparencia.org.br/blog/camaras-rmsp/','banner (3).png','Opacidade domina os portais de transparência dos maiores municípios dessas regiões metropolitanas','','2020-11-25 00:00:00',NULL,'\0','2020-11-25 16:47:55','2020-12-17 22:08:23',NULL),(69,1,1,'https://www.transparencia.org.br/blog/municipios-gauchos-fazem-compras-emergenciais-com-empresas-cri','banner compras emergenciais (1).png','As informações foram obtidas junto ao Tribunal de Contas do Estado do Rio Grande do Sul','','2020-11-25 00:00:00',NULL,'','2020-11-25 16:50:41','2020-12-17 22:17:01',4),(70,1,1,'https://twitter.com/trbrasil/status/1333850765274832896','Design sem nome (5).png','Confira as nossas ações durante o #DezembroTransparente','','2020-12-01 00:00:00','2021-12-31 00:00:00','\0','2020-12-01 19:30:29','2021-01-04 15:35:36',0),(71,1,1,'https://www.transparencia.org.br/blog/forum-de-direito-de-acesso-a-informacoes-publicas-denuncia-ret','nota técnica ministério da saúde.png','O texto identifica problemas em ao menos sete pontos da transparência do Ministério da Saúde','https://www.transparencia.org.br/blog/forum-de-direito-de-acesso-a-informacoes-publicas-denuncia-retrocesso-de-transparencia-do-ministerio-da-saude/','2020-12-17 00:00:00',NULL,'','2020-12-17 22:11:21','2020-12-17 22:17:01',1),(72,1,1,'https://www.transparencia.org.br/blog/mais-de-um-terco-dos-principais-orgaos-publicos-estaduais-desc','levantamento lai órgãos estaduais.png','As Assembleias Legislativas apresentam o pior cenário: 56% não responderam','','2020-12-17 00:00:00',NULL,'\0','2020-12-17 22:14:40','2021-01-26 20:48:31',3),(73,1,1,'https://www.transparencia.org.br/blog/nova-lei-de-licitacoes-tem-avancos-significativos-mas-tambem-r','Nova Lei Licitações.png','A medida também inclui avanços na transparência dos processos de compras públicas','','2020-12-17 00:00:00',NULL,'\0','2020-12-17 22:16:36','2021-01-27 23:01:58',2),(74,1,1,'http://transparencia.org.br','1.png','Teste nnova marca','','2021-01-26 00:00:00',NULL,'\0','2021-01-26 18:32:39','2021-01-26 18:33:07',NULL),(75,1,1,'https://www.transparencia.org.br/blog/transparencia-brasil-atualiza-logomarca/','Banner_Home_Nova_Marca.png','Nova Marca Transparência Brasil','','2021-01-27 00:00:00',NULL,'','2021-01-26 20:49:53','2021-01-27 23:01:35',NULL);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners_tipo`
--

DROP TABLE IF EXISTS `banners_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners_tipo` (
  `Codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners_tipo`
--

LOCK TABLES `banners_tipo` WRITE;
/*!40000 ALTER TABLE `banners_tipo` DISABLE KEYS */;
INSERT INTO `banners_tipo` VALUES (1,'Imagem com texto','2015-06-04 11:38:36',NULL),(2,'Vídeo','2015-06-04 11:39:11',NULL);
/*!40000 ALTER TABLE `banners_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoCategoria` smallint(6) DEFAULT NULL,
  `Nome` varchar(100) NOT NULL,
  `Titulo` varchar(300) NOT NULL,
  `Resumo` varchar(500) DEFAULT NULL,
  `HTML` text NOT NULL,
  `PalavrasChave` varchar(1000) DEFAULT NULL,
  `Publicacao` datetime DEFAULT NULL,
  `Autor` varchar(100) DEFAULT NULL,
  `Slug` varchar(300) NOT NULL,
  `Visivel` bit(1) DEFAULT b'0',
  `Ativo` bit(1) NOT NULL DEFAULT b'1',
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  `ImagemResumo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_codigo_categoria_blog` (`CodigoCategoria`),
  CONSTRAINT `fk_codigo_categoria_blog` FOREIGN KEY (`CodigoCategoria`) REFERENCES `blogs_categoria` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

--
-- Table structure for table `blogs_categoria`
--

DROP TABLE IF EXISTS `blogs_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs_categoria` (
  `Codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs_categoria`
--

LOCK TABLES `blogs_categoria` WRITE;
/*!40000 ALTER TABLE `blogs_categoria` DISABLE KEYS */;
INSERT INTO `blogs_categoria` VALUES (1,'Projeto Excelências','2015-06-08 11:28:22',NULL),(2,'Projeto Ás Claras','2015-06-24 04:28:03',NULL),(3,'Projeto Meritíssimos','2015-06-24 04:28:03',NULL),(4,'Financiamento eleitoral','2015-06-24 04:28:03',NULL),(5,'Licitações','2015-06-24 04:28:03',NULL),(6,'Estados e municípios','2015-06-24 04:28:03',NULL),(7,'Reforma política','2015-06-24 04:28:03',NULL),(8,'Ficha Limpa','2015-06-24 04:28:03',NULL),(9,'Acesso à informação','2015-06-24 04:28:03',NULL),(10,'Transparência','2015-06-24 04:28:03',NULL),(11,'Gastos públicos','2015-06-24 04:28:03',NULL),(12,'Legislativo','2015-06-24 04:28:03',NULL),(13,'Executivo','2015-06-24 04:28:03',NULL),(14,'Judiciário','2015-06-24 04:28:03',NULL),(15,'Ministério Público','2015-06-24 04:28:03',NULL),(16,'Tribunais de Contas','2015-06-24 04:28:03',NULL),(17,'Órgãos de controle','2015-06-24 04:28:03',NULL),(18,'Controle Social','2015-06-24 04:28:03',NULL),(19,'Cidadania','2015-06-24 04:28:03',NULL);
/*!40000 ALTER TABLE `blogs_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contatos`
--

DROP TABLE IF EXISTS `contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contatos` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `CodigoAssunto` smallint(6) NOT NULL,
  `Mensagem` varchar(1000) DEFAULT NULL,
  `Respondido` int(11) DEFAULT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4072 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatos`
--

LOCK TABLES `contatos` WRITE;
/*!40000 ALTER TABLE `contatos` DISABLE KEYS */;
INSERT INTO `contatos` VALUES (1,'Xis Campos',NULL,6,'Pergunta teste?\r\n',0,'2015-08-16 22:04:11');
/*!40000 ALTER TABLE `contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financiamentos`
--

DROP TABLE IF EXISTS `financiamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financiamentos` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `FonteDeFinanciamento` varchar(50) NOT NULL,
  `Valor` varchar(100) DEFAULT NULL,
  `Periodo` varchar(200) NOT NULL,
  `Tipo` varchar(100) DEFAULT NULL,
  `TipoLink` varchar(100) DEFAULT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financiamentos`
--

LOCK TABLES `financiamentos` WRITE;
/*!40000 ALTER TABLE `financiamentos` DISABLE KEYS */;
INSERT INTO `financiamentos` VALUES (1,'Google.org','R$ 1.500.000,00','jul/2016 - dez/2018','Projeto Tá de Pé','https://www.transparencia.org.br/projetos/tadepe',''),(2,'Ford Foundation','US$ 250.000 (dividido com ABRAJI)','jul/2016 - jun/2018','Projeto Achados e Pedidos','http://achadosepedidos.org.br/',''),(3,'UNDEF','US$ 220.000','mai/2017 - abr/2019','Projeto Obra Transparente','https://www.transparencia.org.br/projetos/obratransparente',''),(4,'OEA','US$ 15.000','4 meses','Projeto Minas de Dados','www.minas.com.br','\0'),(5,'Tinker Foundation','US$ 297.000','jan/2019 - jun/2021','Projeto Tá de Pé Educação','http://www;transparencia.org.br',''),(6,'OEA ','US$ 15.000','jan/2018 - abr/2018','Projeto Minas de Dados','https://www.transparencia.org.br/blog/minas-de-dados-um-programa-para-aumentar-a-diversidade-racial-',''),(7,'Ford Foundation','US$ 200.000 (dividido com ABRAJI)','nov/2019 - out/2021','Projeto Achados e Pedidos','http://achadosepedidos.org.br/',''),(8,'ICNL','US$ 20.000','jul/2020 - jan/2021','Projeto Transparência Algorítmica','https://www.transparencia.org.br/projetos/transparencia-algoritmica','');
/*!40000 ALTER TABLE `financiamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financiamentos_arquivos`
--

DROP TABLE IF EXISTS `financiamentos_arquivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financiamentos_arquivos` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoFinanciamento` int(11) NOT NULL,
  `Arquivo` varchar(100) NOT NULL,
  `Tipo` enum('relatorio','termo-de-doacao') NOT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  PRIMARY KEY (`Codigo`),
  KEY `fk_financiamento_arquivos` (`CodigoFinanciamento`),
  CONSTRAINT `fk_financiamento_arquivos` FOREIGN KEY (`CodigoFinanciamento`) REFERENCES `financiamentos` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financiamentos_arquivos`
--

LOCK TABLES `financiamentos_arquivos` WRITE;
/*!40000 ALTER TABLE `financiamentos_arquivos` DISABLE KEYS */;
INSERT INTO `financiamentos_arquivos` VALUES (2,1,'Semi-Annual Report Transparencia_jan2017.pdf','relatorio',''),(3,1,'Pagamento primeira parcela.pdf','termo-de-doacao',''),(6,1,'Orcamento aprovado.pdf','termo-de-doacao',''),(7,2,'Grant Letter.pdf','termo-de-doacao',''),(8,2,'Pedido de financiamento.pdf','termo-de-doacao',''),(9,2,'Relatorio parcial Achados e Pedidos.pdf','relatorio',''),(10,3,'Start letter.pdf','termo-de-doacao',''),(11,3,'Termo de doacao.pdf','termo-de-doacao',''),(13,4,'texto_312279444.pdf','relatorio',''),(14,4,'texto_310889368.pdf','termo-de-doacao',''),(15,5,'Award Letter.pdf','termo-de-doacao',''),(16,5,'Narrativa do Projeto.pdf','termo-de-doacao',''),(17,3,'Relatório Financeiro Final UNDEF.pdf','relatorio',''),(18,3,'Notas do relatório financeiro final UNDEF.pdf','relatorio',''),(19,3,'Relatório Narrativo Final UNDEF.pdf','relatorio',''),(21,1,'Segunda parcela do projeto.pdf','termo-de-doacao',''),(22,1,'Parcela final do projeto.pdf','termo-de-doacao',''),(23,1,'Relatório Financeiro final Google.pdf','relatorio',''),(24,6,'Grant Letter_.pdf','termo-de-doacao',''),(25,6,'Relatório Final do projeto.pdf','relatorio',''),(27,8,'Grant Letter_ICNL.pdf','termo-de-doacao','');
/*!40000 ALTER TABLE `financiamentos_arquivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imprensas`
--

DROP TABLE IF EXISTS `imprensas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imprensas` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoImprensaCategoria` smallint(6) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Titulo` varchar(300) NOT NULL,
  `Resumo` varchar(1000) DEFAULT NULL,
  `Link` varchar(500) NOT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  `Imagem` varchar(100) NOT NULL,
  `DataPublicacao` datetime DEFAULT NULL,
  `Veiculo` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_imprensa_categoria` (`CodigoImprensaCategoria`),
  CONSTRAINT `fk_imprensa_categoria` FOREIGN KEY (`CodigoImprensaCategoria`) REFERENCES `imprensas_categoria` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imprensas`
--

LOCK TABLES `imprensas` WRITE;
/*!40000 ALTER TABLE `imprensas` DISABLE KEYS */;
INSERT INTO `imprensas` VALUES (1,1,'Novo artigo','Título de artigo','Resumo do artigo','http://www.transparenciabrasil.org.br','\0','2015-06-16 17:55:43',NULL,'',NULL,NULL);
/*!40000 ALTER TABLE `imprensas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imprensas_categoria`
--

DROP TABLE IF EXISTS `imprensas_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imprensas_categoria` (
  `Codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imprensas_categoria`
--

LOCK TABLES `imprensas_categoria` WRITE;
/*!40000 ALTER TABLE `imprensas_categoria` DISABLE KEYS */;
INSERT INTO `imprensas_categoria` VALUES (1,'Artigo','2015-06-16 14:49:47',NULL),(2,'Reportagem','2015-06-16 14:49:47',NULL);
/*!40000 ALTER TABLE `imprensas_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs_erro`
--

DROP TABLE IF EXISTS `logs_erro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs_erro` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Pagina` varchar(100) DEFAULT NULL,
  `Browser` varchar(100) DEFAULT NULL,
  `Mensagem` varchar(100) DEFAULT NULL,
  `Stack` varchar(1000) DEFAULT NULL,
  `Variaveis` varchar(500) DEFAULT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=318 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs_erro`
--

LOCK TABLES `logs_erro` WRITE;
/*!40000 ALTER TABLE `logs_erro` DISABLE KEYS */;
INSERT INTO `logs_erro` VALUES (1,'transacao',NULL,NULL,NULL,'Notificação recebida. Código:  | Tipo:','2015-09-09 19:49:29');
/*!40000 ALTER TABLE `logs_erro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `midias`
--

DROP TABLE IF EXISTS `midias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `midias` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoMidiaTipo` smallint(6) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Titulo` varchar(200) DEFAULT NULL,
  `Arquivo` varchar(100) NOT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_midia_tipo` (`CodigoMidiaTipo`),
  CONSTRAINT `fk_midia_tipo` FOREIGN KEY (`CodigoMidiaTipo`) REFERENCES `midias_tipo` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `midias`
--

LOCK TABLES `midias` WRITE;
/*!40000 ALTER TABLE `midias` DISABLE KEYS */;
INSERT INTO `midias` VALUES (1,1,'Teste','Título','TesteLincon.aif','','2015-06-08 15:26:20',NULL);
/*!40000 ALTER TABLE `midias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `midias_tipo`
--

DROP TABLE IF EXISTS `midias_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `midias_tipo` (
  `Codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `midias_tipo`
--

LOCK TABLES `midias_tipo` WRITE;
/*!40000 ALTER TABLE `midias_tipo` DISABLE KEYS */;
INSERT INTO `midias_tipo` VALUES (1,'Videocast','2015-06-08 12:25:19',NULL),(2,'Podcast','2015-06-08 12:25:19',NULL);
/*!40000 ALTER TABLE `midias_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletters` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Apelido` varchar(100) DEFAULT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  `Optin_newsletter` tinyint(4) NOT NULL DEFAULT '0',
  `Optin_press` tinyint(4) NOT NULL DEFAULT '0',
  `Cidade` varchar(200) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL,
  `Veiculo` varchar(200) DEFAULT NULL,
  `Telefone` varchar(10) DEFAULT NULL,
  `DDD` varchar(3) DEFAULT NULL,
  `double_optin` tinyint(4) NOT NULL DEFAULT '0',
  `double_optin_token` varchar(250) DEFAULT NULL,
  `double_optin_date` datetime DEFAULT NULL,
  `Origem` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=4405 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletters`
--

LOCK TABLES `newsletters` WRITE;
/*!40000 ALTER TABLE `newsletters` DISABLE KEYS */;
INSERT INTO `newsletters` VALUES (1,'Ernesto Campos','tste@teste.com',NULL,'','2015-08-16 22:04:11','2015-08-16 22:04:11',1,0,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `newsletters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projetos`
--

DROP TABLE IF EXISTS `projetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projetos` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Descricao` varchar(1000) NOT NULL,
  `Imagem` varchar(100) DEFAULT NULL,
  `Link` varchar(500) DEFAULT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  `Ordem` int(11) DEFAULT NULL,
  `Imagem_logo` varchar(100) DEFAULT NULL,
  `Mouseover_cor` varchar(20) DEFAULT NULL,
  `Desativado` tinyint(4) DEFAULT NULL,
  `DesativadoPeriodoVigencia` varchar(50) DEFAULT NULL,
  `CaptacaoRecursos` tinyint(4) DEFAULT NULL,
  `LinkTarget` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projetos`
--

LOCK TABLES `projetos` WRITE;
/*!40000 ALTER TABLE `projetos` DISABLE KEYS */;
INSERT INTO `projetos` VALUES (1,'teste','2018-04-02 00:00:00','teste',NULL,'http://www.uol.com.br','\0','2018-04-24 16:04:36','2018-04-24 16:05:35',NULL,NULL,'#000000',1,'teste',0,0),(2,'teste 32','2018-04-02 00:00:00','tedasd',NULL,'das','\0','2018-04-24 16:04:50','2018-04-24 16:04:55',NULL,NULL,'#000000',0,'das',0,0),(3,'Tá de Pé','2017-10-05 00:00:00','Fiscalize e ajude a pressionar pela entrega de escolas e creches financiadas pelo Governo Federal.','bg-ta-de-pe.jpg','https://www.transparencia.org.br/projetos/tadepe','','2018-04-24 16:08:10','2020-09-28 19:54:23',4,'logo_logo-ta-de-pe.png','#05b59d',1,'',0,0),(4,'Achados e Pedidos','2017-03-01 00:00:00','Encontre uma informação pública no nosso repositório de pedidos da Lei de Acesso à Informação.','bg-achados-pedidos.jpg','http://achadosepedidos.org.br/','','2018-04-24 16:09:36','2020-09-28 19:54:23',5,'logo_logo-achados-pedidos.png','#75b343',1,'',0,1),(5,'Obra Transparente','2017-12-01 00:00:00','Monitoramento de licitações, contratos e obras de escolas em parceria com 22 Observatórios Sociais.','bg-obra-transparente.jpg','https://www.transparencia.org.br/projetos/obratransparente','','2018-04-24 16:11:15','2020-09-28 19:54:23',6,'logo_logo_obra-transparente_peq.png','#40b0ca',1,'',0,0),(6,'Projeto Meritíssimos','2997-01-01 00:00:00','Confira indicadores de desempenho de ministros do Supremo Tribunal Federal entre 1997 e 2015.','bg-meritissimos.jpg','http://www.meritissimos.org.br/','','2018-04-24 16:15:18','2020-09-28 19:54:23',7,'logo_logo-meritissimos.png','#f47325',1,'',0,1),(7,'Excelências','2001-01-01 00:00:00','Banco de dados online com informações de processos na Justiça e do desempenho parlamentar de membros do Congresso Nacional.','bg-excelencias.jpg','http://www.excelencias.org.br/','','2018-04-24 16:16:51','2020-09-29 19:13:36',NULL,'logo_logo-excelencias.png','#ffcb08',0,'2001-2017',1,1),(8,'Às Claras','2002-09-07 00:00:00','Banco de dados online com informações do financiamento eleitoral recebido por cada candidato entre 2002 e 2012.','bg-as-claras.jpg','http://www.asclaras.org.br/','','2018-04-24 16:18:34','2020-09-29 19:15:11',8,'logo_logo-as-claras.png','#f99d22',0,'',0,1),(9,'Deu no Jornal','2001-04-01 00:00:00','Banco de dados sobre noticiário da imprensa de todos os estados brasileiros sobre corrupção.',NULL,'','','2018-04-24 16:20:21','2018-04-24 16:20:21',NULL,NULL,'',0,'2004-2012',0,0),(10,'Assistente Interativo de Licitações','2001-04-01 00:00:00','Projeto em convênio com o TCE-SC que avaliava se licitações públicas estavam de acordo com a Lei de Licitações e fornecia respostas sobre dispositivos legais pertinentes ao assunto.',NULL,'','','2018-04-24 16:20:47','2018-04-24 16:21:12',NULL,NULL,'',0,'2001',1,0),(11,'Planeja-CGU','2006-04-01 00:00:00','Contribuição para o planejamento de estratégias e instrumentos de prevenção à corrupção da Controladoria-Geral da União.',NULL,'','','2018-04-24 16:21:47','2018-04-24 16:21:47',NULL,NULL,'',0,'2006',0,0),(12,'Programa de Anticorrupção nas Subprefeituras de São Paulo','2005-01-01 00:00:00','Elaboração de propostas visando melhorias institucionais para o combate à corrupção em Subprefeituras.',NULL,'','','2018-04-24 16:22:19','2018-04-24 16:22:19',NULL,NULL,'',0,'2005-2006',0,0),(13,'Tinker',NULL,'tesste',NULL,'','\0','2019-02-05 14:29:43','2019-02-05 14:30:29',NULL,NULL,'',1,'',0,0),(14,'Rango',NULL,'Chatbot de merenda escolar da Transparência Brasil.',NULL,'https://www.facebook.com/falecomRango/','\0','2019-10-09 13:45:13','2019-10-09 13:47:07',NULL,NULL,'',1,'',0,0),(15,'Rango (beta)','2019-08-01 00:00:00','Projeto (em fase beta) avalia a qualidade da merenda nas escolas públicas do país a partir de um chatbot que conversa com monitores nas redes sociais','cover projetos.jpg','https://www.facebook.com/messages/t/falecomRango','\0','2019-10-09 20:28:26','2019-10-09 20:31:41',NULL,'logo_logotipo rango.png','#80a997',1,'',0,0),(16,'Fórum de direito de acesso a informações púbilcas',NULL,'Coalizão de entidades da sociedade civil, organizações de mídia e pesquisadores dedicada a fazer o controle social da implementação da Lei de Acesso a Informação (LAI).','Materia - Malha Fina TCE.jpg','http://informacaopublica.org.br/','','2020-09-17 17:22:40','2020-09-28 19:54:23',2,'logo_Cópia de Sem nome.png','#dcf2ed',1,'',0,1),(17,'Transparência Algorítmica',NULL,'Iniciativa que monitora o uso de algoritmos pelo Governo Federal.','Design sem nome (1).png','https://www.transparencia.org.br/projetos/transparencia-algoritmica','','2020-09-24 19:00:44','2020-11-10 16:10:55',3,'logo_Cópia de Logo TA.png','#cb8e47',1,'',0,1),(18,'Tá de Pé Merenda','2020-08-03 00:00:00','Plataforma onde é possível acompanhar dados oficiais de licitações e contratos de alimentação das escolas públicas brasileiras.',NULL,'https://tadepemerenda.transparencia.org.br/home','','2020-09-28 19:50:49','2020-09-28 19:54:23',1,'logo_tdp merenda.PNG','#124c7d',1,'',0,1),(19,'Tá de Pé Compras Emergenciais','2020-09-21 00:00:00','Plataforma onde é possível acompanhar dados oficiais de licitações e contratos de combate ao COVID-19.',NULL,'http://comprasemergenciais.transparencia.org.br/','','2020-09-28 19:53:49','2020-10-27 16:10:33',0,'logo_tdp CE.PNG','#7d1611',1,'',0,1);
/*!40000 ALTER TABLE `projetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projetos_arquivo`
--

DROP TABLE IF EXISTS `projetos_arquivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projetos_arquivo` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoProjeto` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Arquivo` varchar(100) NOT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_codigo_projeto` (`CodigoProjeto`),
  CONSTRAINT `fk_codigo_projeto` FOREIGN KEY (`CodigoProjeto`) REFERENCES `projetos` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projetos_arquivo`
--

LOCK TABLES `projetos_arquivo` WRITE;
/*!40000 ALTER TABLE `projetos_arquivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `projetos_arquivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicacoes`
--

DROP TABLE IF EXISTS `publicacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicacoes` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoCategoria` smallint(6) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `DataPublicacao` datetime NOT NULL,
  `Descricao` varchar(1000) DEFAULT NULL,
  `Arquivo` varchar(100) DEFAULT NULL,
  `PalavrasChave` varchar(500) DEFAULT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  `Link` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_codigo_categoria` (`CodigoCategoria`),
  CONSTRAINT `fk_codigo_categoria` FOREIGN KEY (`CodigoCategoria`) REFERENCES `publicacoes_categoria` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicacoes`
--

LOCK TABLES `publicacoes` WRITE;
/*!40000 ALTER TABLE `publicacoes` DISABLE KEYS */;
INSERT INTO `publicacoes` VALUES (2,4,'Publicação 001','2015-05-27 00:00:00','lorem ipsum merin sin doroo lorem ipsum merin sin doroo lorem ipsum merin sin doroo ','Chrysanthemum.jpg','palavra','\0','2015-05-27 16:51:00','2015-08-09 13:44:53',NULL),(3,5,'Estados e municípios mais pobres gastam mais em verbas e auxílios parlamentares','2015-06-01 00:00:00','O que se revelou foi uma inversão lógica: segundo dados coletados, estados mais pobres gastam em média 20% mais do que os ricos; capitais mais pobres, 16% a mais.','','Legislativo, Assembleias, Câmaras, deputados, vereadores, gasto com legislativo','','2015-06-25 20:38:32','2020-10-21 21:47:54','https://www.transparencia.org.br/downloads/publicacoes/gastos_AL_CM2015.pdf'),(4,5,'Mesa Diretora e Presidência 2015-2016 da Câmara acumulam ocorrências','2015-03-01 00:00:00','Incluem compra de votos, lavagem de dinheiro, submissão de trabalhador a regime análogo à escravidão e fraudes em licitações.','Mesa diretora e Presidência recém-eleitas na Câmara.pdf','#Congresso #MesaDiretora #Câmara #Processos #Condenações #Corrupção','','2015-07-01 22:09:17','2020-11-23 17:25:29','https://www.transparencia.org.br/downloads/publicacoes/Mesa_Diretora_2015.pdf'),(5,5,'Clãs políticos seguem dominando Congresso na próxima legislatura','2014-12-01 00:00:00','Mapeamento aponta que 49% dos deputados federais eleitos em 2014 têm parentes políticos – número cinco pontos percentuais acima de levantamento anteriormente realizado. ','Clãs políticos seguem dominando Congresso na próxima legislatura.pdf','#parentes #clãs #Congresso #aristocracia #famíliaspolíticas #Legislativo #Excelências','','2015-07-01 22:10:57','2020-11-23 17:28:02','https://www.transparencia.org.br/downloads/publicacoes/parentes_%202015-2018%20vf.pdf'),(6,5,'No 2º turno, 19 dos 28 candidatos aos governos estaduais têm processos','2014-10-01 00:00:00','Dos 63 candidatos aos governos estaduais que sofriam algum processo na Justiça e nos Tribunais de Contas no início da campanha eleitoral, 6 já foram eleitos no primeiro turno.','No segundo turno, 19 dos 28 candidatos aos governos estaduais.pdf','#Eleições2014 #governadores #processos #condenações #corrupção #fichalimpa','','2015-07-06 22:26:42','2020-11-23 17:29:59','https://www.transparencia.org.br/downloads/publicacoes/governadores_turno2.pdf'),(7,5,'Candidatos submeteram trabalhadores a regime análogo à escravidão','2014-10-03 00:00:00','Candidatos que disputam as eleições deste ano são donos, eles próprios ou sua família, de empresas que submetem trabalhadores a condições análogas à escravidão.','Candidatos submeteram trabalhadores a regime.pdf','#Eleições2014 #escravagistas #candidatos #escravidão #financiamentoeleitoral #trabalhodegradante','','2015-07-07 17:23:21','2020-11-23 17:32:27','https://www.transparencia.org.br/downloads/publicacoes/escravos.pdf'),(8,5,'Grande doador ignora candidatos negros e mulheres','2014-09-01 00:00:00','Análise do padrão de financiamento das maiores doadoras nas eleições de 2014 segundo a distribuição por raça/cor e gênero.','Grande doador ignora candidatos negros e mulheres.pdf','#financiamentoeleitoral #Eleições2014 #doações #racismo #representaçãofeminina #minorias #Congresso','','2015-07-07 17:26:56','2020-11-23 17:33:17','https://www.transparencia.org.br/downloads/publicacoes/demografia.pdf'),(9,5,'As rotas das doações eleitorais','2014-09-13 00:00:00','Padrão de financiamento das maiores doadoras nas eleições 2014 e as rotas que o dinheiro percorre até o beneficiário.','As rotas das doações eleitorais.pdf','#financiamentoeleitoral #Eleições2014 #doações #representação #empresas','','2015-07-07 17:31:54','2020-11-23 17:36:10','https://www.transparencia.org.br/downloads/publicacoes/rotas.pdf'),(10,5,'Quatro em cada dez candidatos a governador têm ocorrências na Justiça','2014-07-01 00:00:00','Dos 165 candidatos aptos que disputam os governos estaduais nas eleições deste ano, 63 (38%) respondem a 327 processos na Justiça ou nos Tribunais de Contas.','Quatro em cada dez candidatos a governador.pdf','#Eleições2014 #governadores #candidatos #processos #condenações #corrupção #fichalimpa','','2015-07-07 17:32:59','2019-08-08 19:20:54',''),(11,5,'As mulheres no parlamento brasileiro','2014-06-01 00:00:00','As eleitas em 2010 correspondem a 9% na Câmara dos Deputados, 13% no Senado e 13% nas Assembleias Legislativas.','As mulheres no parlamento brasileiro.pdf','#mulheres #Congresso #subrepresentação #minorias #Legislativo #Excelências','','2015-07-07 17:33:46','2020-11-23 17:36:49','https://www.transparencia.org.br/downloads/publicacoes/Mulheres.pdf'),(12,5,'Os clãs políticos no Congresso Nacional','2014-06-01 00:00:00','Quase metade dos parlamentares têm parentes na política: 44% dos deputados e 64% dos senadores. ','Clas politicos no congresso nacional.pdf','#parentes #clãs #Congresso #aristocracia #famíliaspolíticas #Legislativo #Excelências','','2015-07-07 17:34:32','2020-11-23 17:37:42','https://www.transparencia.org.br/downloads/publicacoes/parentes.pdf'),(13,5,'Quem são os conselheiros dos Tribunais de Contas','2014-04-01 00:00:00','Encarregados de chefiar os órgãos que fiscalizam o uso dos recursos públicos, os conselheiros são, em sua maioria (62%), ex-políticos profissionais.','Quem são os conselheiros dos Tribunais de Contas.pdf','#TribunaisdeContas #conselheiros #apadrinhamento #nomeações #processos #condenações #reputaçãoilibada','','2015-07-07 17:48:48','2020-11-23 17:39:53','https://www.transparencia.org.br/downloads/publicacoes/tribunais_de_contas.pdf'),(14,5,'Os novos presidentes das comissões permanentes da Câmara ','2014-03-01 00:00:00','Dos 22 recém-indicados à presidência das comissões permanentes da Câmara, 14 não foram, na presente legislatura, titulares dos órgãos que coordenarão.','','#comissões #presidentes #Legislativo #Congresso #poder #Excelências #assiduidade','','2015-07-07 17:49:31','2020-10-21 21:56:51','https://www.transparencia.org.br/downloads/publicacoes/comissoes.pdf'),(15,5,'Lei da Ficha Limpa e o Congresso nas eleições de 2014','2014-02-01 00:00:00','Pelo menos 16 deputados e um senador correm o risco de ter suas possíveis candidaturas à reeleição barradas pela Justiça Eleitoral, por condenações em segunda instância.','','#Eleições2014 #FichaLimpa #Congresso #condenações #candidatos #Legislativo #Excelências','\0','2015-07-07 17:50:29','2016-08-04 00:58:19','https://www.transparencia.org.br/downloads/publicacoes/ficha_limpa.pdf'),(16,5,'Poder econômico e financiamento eleitoral no Brasil. Concentração','2014-02-01 00:00:00','O financiamento eleitoral reflete uma forte desigualdade entre empresas doadoras, o que leva algumas poucas a amealhar um poder desproporcional de influência sobre os eleitos.','Concentracao.pdf','#financiamentoeleitoral #empresas #desigualdade #influência #doações #concentração','','2015-07-07 17:51:35','2020-11-23 17:43:54','https://www.transparencia.org.br/downloads/publicacoes/financia_desigualdade.pdf'),(17,5,'Poder econômico e financiamento eleitoral no Brasil: Custo do voto','2014-02-01 00:00:00','Estudo revela irracionalidade na distribuição do custo do voto no Brasil em eleições recentes, sem apresentar correlação com o PIB e o PIB per capita de cada estado do país.','custo do voto.pdf','#financiamentoeleitoral #representação #custodovoto #dinheiro #poder','','2015-07-07 17:52:12','2020-11-23 17:44:36','https://www.transparencia.org.br/downloads/publicacoes/custo_do_voto.pdf'),(18,5,'Negros no Congresso','2013-11-01 00:00:00','Apesar de pretos e pardos representarem mais da metade da população brasileira, eles correspondem a apenas 9,8% dos deputados e senadores em exercício no Congresso Nacional. ','Negros no Congresso.pdf','#negros #racismo #Congresso #Legislativo #representação #minorias','','2015-07-07 17:52:56','2020-11-23 17:45:29','https://www.transparencia.org.br/downloads/publicacoes/Negros_no_Congresso.pdf'),(19,5,'Custos dos Congressos em 2013 ','2013-10-01 00:00:00','Em um grupo de 12 países, entre emergentes e desenvolvidos, o Brasil é o que gasta mais para manter seus congressistas. ','','#orçamento #Congresso #Legislativo #Excelências #gastospúblicos','','2015-07-07 17:53:39','2020-10-21 22:14:12','https://www.transparencia.org.br/downloads/publicacoes/custos%20do%20congresso%202013.pdf'),(20,5,'Os Condenados','2013-09-01 00:00:00','Mais de 3 em cada 10 congressistas em exercício já foram condenados na Justiça e nos Tribunais de Contas.','','#Congresso #processos #condenações #fichalimpa #Legislativo #Excelências','','2015-07-07 17:54:34','2019-08-09 17:24:57','https://www.transparencia.org.br/downloads/publicacoes/condenados.pdf'),(21,2,'A portrait of disparities - an analysis of Brazilian newspapers','2007-01-01 00:00:00','Brazil is a unequal country. As a result, all things that come with the economy are much more present in the richer states than in the poorest - including a functioning press.','','#imprensa #desiguldades #jornalismo #cobertura #corrupção #DeunoJornal','','2015-07-08 19:59:54','2019-08-01 18:37:19','http://transparencia.org.br/docs/disparities.pdf'),(22,2,'Percepções pantanosas (Claudio Weber Abramo, Revista Novos Estudos Cebrap)','2005-11-01 00:00:00','As percepções sobre corrupção devem ser tomadas com cautela, pois informam pouco sobre o fenômeno empírico da corrupção, vista a dificuldade em correlacionar as duas variáveis.','','#corrupção #pesquisadeopinião #percepção #crisepolítica #confiança','','2015-07-08 20:22:59','2019-08-01 18:37:12','http://transparencia.org.br/docs/a03n73.pdf'),(23,2,'How much do perceptions of corruption really tell us?','2006-10-01 00:00:00','Perceptions of corruption are often taken as reliable proxies for the actual phenomenon of corruption. This article builds criticism on this approach based on data from GCM.','','#corrupção #percepção #pesquisadeopinião #GCB','','2015-07-08 20:35:34','2019-08-01 18:37:06','http://transparencia.org.br/docs/HowMuch.pdf'),(24,2,'Still Lifes: Perceptions of Corruption vs. Other Indicators','2004-11-01 00:00:00','Uma análise do índice de percepção de corrupção e outros indicadores.','','#CPI #percepção #corrupção #indicadores #dadosquantitavos','','2015-07-13 18:28:07','2019-08-01 18:36:59','http://transparencia.org.br/docs/StillLifes.pdf'),(25,2,'What If? A Look at Integrity Pacts. (Claudio Weber Abramo, Economics WPA Working Paper Series)','2003-01-01 00:00:00','This note examines the Integrity Pact (IP) methodology proposed by Transparency International to confront the problem of corruption in public procurement. ','','#IntegryPact #TI #corruptção #methodology #regulation #control #Publicprocurement','','2015-07-14 15:55:11','2019-08-01 18:36:33','http://econwpa.repec.org/eps/pe/papers/0310/0310008.pdf'),(26,2,'Licitaciones y Contratos Públicos (Claudio Weber Abramo, Revista Nueva Sociedad)','2004-11-01 00:00:00','La capacidad de arbitrar depende de las normas legales de regulación. Donde esa capacidades grande, es muy poco probable que las licitaciones públicas sean eficientes.','','#corrupção #licitações #contratos #regulação #Legislativo','','2015-07-14 15:56:50','2019-08-01 18:36:24','http://transparencia.org.br/docs/nuevasociedad.pdf'),(27,2,'A short note on the prisoner\'s dilemma as applied to public procurement (Claudio Weber Abramo, Economics WPA Working Paper Series)','2003-01-01 00:00:00','Here it is argued that the prisoner’s dilemma does not correspond to an adequate metaphor for public tenders. Incidentally, it is also argued that the assumption that bribery financially harms participants, which stimulates the allusion to the prisoner’s dilemma in the first place, is arbitrary.','A short note on the prisoner’s dilemma as applied to public procurement.pdf','#Prisionersdillema #gametheory #bribery #publicprocurement','','2015-07-14 16:06:38','2017-05-10 19:26:06','http://econpapers.repec.org/paper/wpawuwppe/0310004.htm'),(28,2,'Prevention and detection in bribery-affected public procurement (Claudio Weber Abramo, Economics WPA Working Paper Series)','2003-01-01 00:00:00','In environments where regulations are lax and controls function badly, cleanly participating in tenders is irrational.','','#control #corruption #publicprocurement #bribery #regulation #equilibrium','','2015-07-14 16:07:50','2019-08-01 18:36:13','http://econpapers.repec.org/paper/wpawuwppe/0309001.htm'),(29,2,'A short note on concerns about procurement legislation in some Latin American anti-corruption programs (Claudio Weber Abramo, 10ª IACC)','2001-01-01 00:00:00','The answer is simple: corruption in procurement always springs from vulnerabilities affecting the legal framework.','','#publicprocurement #entrybarriers #legislation #corruption #anti-corruptionprograms','','2015-07-14 16:09:05','2019-08-01 18:35:31','http://transparencia.org.br/docs/CWAPraga1.pdf'),(30,2,'Citizen\'s participation in procurement: Some pitfalls (Claudio Weber Abramo, 10ª IACC)','2001-01-01 00:00:00','Citizen’s participation in procurement is one of the central strategies of Transparency International to curb corruption. ','','#citizenship #participation #engagement #IntegrityPact #NGO #corruption #transparência','','2015-07-14 16:12:11','2019-08-01 18:35:06','http://transparencia.org.br/docs/CWAPraga2.pdf'),(31,1,'Nota sobre a relação entre percepções de corrupção e liberdade de informação (Claudio Weber Abramo)','2001-01-01 00:00:00','Há uma possível relação existente entre o índice da RsF e o Índice de Percepções de Corrupção (CPI) da Transparency International. ','','#pecepçãodecorrupção #liberdadedeinformação #CPI #correlação','','2015-07-14 16:13:36','2019-08-01 18:24:08','http://transparencia.org.br/docs/RsF-Port.pdf'),(32,1,'A note on the relation between perception of corruption and freedom of the press.','2001-01-01 00:00:00','It is interesting to ascertain what correlation, if any, exists between the RsF index and the Corruption Perceptions Index (CPI) of Transparency International.','','#corruptionperception #freedomofspeech #CPI #correlation','','2015-07-14 16:15:45','2019-08-01 18:24:02','http://transparencia.org.br/docs/RsF.pdf'),(33,2,'Relações entre índices de percepção de corrupção e outros indicadores em onze países da América Latina (Claudio Weber Abramo, Cadernos Adenauer 10)','2000-01-01 00:00:00','Medir o grau de corrupção de uma sociedade qualquer não é tarefa simples. Como, por definição, atos de corrupção se processam fora do arcabouço legal, a medida de seus efeitos não é imediatamente evidente.','','#corrupção #índice #percepção #IPCorr #TI #indicadores #AméricaLatina','','2015-07-14 16:16:58','2019-08-01 18:34:02','http://transparencia.org.br/docs/onze.pdf'),(34,2,'A note on the relationship between TI Corruption Perceptions Index and KKZ \"Rule of Law\" (Claudio Weber Abramo)','2001-01-01 00:00:00','The World Bank Institute’s KKZ “rule of law” indicator is compared to Transparency International’s Corruption Perceptions Index for eleven Latin American countries. ','','#CPI #KKZ #TI #WorldBank #RuleofLaw #corruption','','2015-07-14 16:18:04','2019-08-01 18:33:55','http://transparencia.org.br/docs/cpixkkz.pdf'),(35,2,'Licitações e contratos: os negócios entre o setor público e o privado (Claudio Weber Abramo e Eduardo Ribeiro Capobianco, in: TI Source Book).','2000-01-01 00:00:00','Uma licitação coloca de um lado da mesa políticos e/ou funcionários públicos e, de outro, fornecedores que disputam entre si o direito de fornecer o bem ou serviço pretendido. ','','#licitação #propina #corrupção #regulação #instituições #fragilidade','','2015-07-14 16:20:21','2019-08-01 18:32:06','http://transparencia.org.br/docs/LicitCapobianco-Abramo.pdf'),(36,2,'O controle dos processos de licitação: uma análise de economia política (Marcos F. G. da Silva, Estudos Econômicos da Construção)','1997-01-01 00:00:00','O objetivo é mostrar que a escolha democrática abre espaço para a separação entre o público e o estatal. ','','#licitação #controle #economiapolítica #corrupção #escolhaspúblicas','','2015-07-14 16:21:45','2019-08-01 18:31:39','http://transparencia.org.br/docs/LicitMFernandes.pdf'),(37,2,'A economia política da corrupção (Marcos Fernandes Gonçalves da Silva, Estudos Econômicos da Construção)','1997-01-01 00:00:00','O objetivo deste trabalho é demonstrar que a corrupção deveria ser um assunto importante para análise econômica e economia moderna, tanto política como positiva. ','','#corrupção #racionalidade #rentseeking #instituições #incentivos','','2015-07-14 16:22:48','2019-08-01 18:29:33','http://transparencia.org.br/docs/MFernandes1.pdf'),(38,2,'O papel das instituições superiores de controle financeiro-patrimonial nos sistemas políticos modernos - pressupostos para uma análise dos Tribunais de Contas no Brasil (Bruno W. Speck, Conjuntura pol','2000-09-01 00:00:00','A preocupação com os sistemas de controle patrimonial-financeiro do poder público brasileiro tem crescido rapidamente nos últimos anos. Principalmente em conseqüência dos vários escândalos de corrup ção, a eficiência ou mesmo existência de um sistema de gerenciamento dos bens públicos tem sido questionados. Em contraste com esta crítica dura e severa, os conhecimentos sobre os processos centrais na alocação, o gerenciamento e a fiscalização dos recursos públicos ainda são limitados nas ciências sociais. ','O papel das instituições superiores de controle financeiro-patrimonial nos sistemas políticos modern','#corrupção #controle #ciênciassociais #administraçãopública #instituições #fiscalização','','2015-07-14 16:24:24','2017-05-10 19:11:48','http://transparencia.org.br/docs/BSpeck2.pdf'),(39,2,'The role and performance of supreme audit institutions in Brazil (Bruno W. Speck, 10ª IACC)','2001-01-01 00:00:00','Institutional reforms have attracted great attention of social scientists for the last two decades. This is a consequence of the radical transformation of political systems during the 3rd wave of democratization in the eighties and nineties. ','','#TribunaisdeContas #conselheiros #apadrinhamento #nomeações #reformas #instituições #SAI','','2015-07-14 16:25:47','2019-08-01 18:29:14','http://transparencia.org.br/docs/SpeckPraga.rtf'),(40,2,'Inovação e rotina no Tribunal de Contas da União. O papel da instituição superior de controle financeiro no sistema político-administrativo do Brasil (Bruno W. Speck, Cadernos Adenauer)','2000-01-01 00:00:00','Em várias regiões, existem experimentos de cálculo do grau de corrupção, do volume dos desvios, e do custo que o fenômeno tem para a credibilidade das instituições políticas. ','','#corrupção #percepção #riscosdeinvestimento #controle #reforma #instituições','','2015-07-14 16:26:39','2019-08-01 18:29:04','http://transparencia.org.br/docs/BSpeck4.pdf'),(41,2,'Public Procurement and the Court of Audit in Brazil (Bruno W. Speck, 9ª IACC)','2001-01-01 00:00:00','This paper intends to give some preliminary answers related to the TCU. ','','#corrupção #controle #TCU #fiscalização #escândalos','','2015-07-14 16:28:02','2019-08-01 18:27:35','http://transparencia.org.br/docs/BSpeck3.pdf'),(42,2,'Informação para a cidadania e o desenvolvimento sustentável (Ladislau Dowbor)','2003-01-01 00:00:00','Trata-se de identificar instrumentos concretos de informação para a cidadania, a ser sistematizada segundo as necessidades de participação dos diversos atores sociais. ','','#informação #tecnologia #cidadania #controlesocial #transparência','','2015-07-14 16:29:03','2019-08-01 18:26:56','http://transparencia.org.br/docs/ladis2003.pdf'),(43,2,'Habilitação em licitações públicas e defesa da concorrência (Luís Fernando Schuartz e Mario Luiz Possas, Estudos Econômicos da Construção)','1998-01-01 00:00:00','Análise do ponto de vista da ordem econômica constitucional e da Lei 8.884/94, das conseqüências decorrentes de uma dada interpretação do art. 30, II, da Lei 8.666/93. ','','#licitações #Lei8666 #competição #administraçãopública #concorrência','','2015-07-14 16:30:12','2019-08-01 18:26:34','http://transparencia.org.br/docs/LicitSchuartz-Possas.pdf'),(44,2,'As percepções e experiências com a corrupção no setor de obras rodoviárias no RS (Giácomo Balbinotto Neto e Ricardo Letizia Garcia)','2003-01-01 00:00:00','Busca avaliar a percepção da corrupção no setor de obras rodoviárias junto às empresas de engenharia rodoviária do Estado do Rio Grande do Sul no ano de 2002. ','','#corrupção #propinas #percepção #obras #servidorespúblicos #rent-seeking','','2015-07-14 16:32:32','2019-08-01 18:25:52','http://transparencia.org.br/docs/percep-rgs1.pdf'),(45,2,'A percepção da corrupção e suas implicações econômicas (Giácomo Balbinotto Neto e Ricardo Letizia Garcia)','2003-01-01 00:00:00','Analisa as implicações da percepção da corrupção no ambiente rodoviário e a organização institucional com a qual os agentes públicos se deparam na atividade rodoviária. ','','#corrupção #propinas #percepção #obras #servidorespúblicos #rent-seeking','','2015-07-14 16:33:51','2019-08-01 18:25:14','http://transparencia.org.br/docs/percep-rgs2.pdf'),(46,1,'Relações semânticas','2002-01-01 00:00:00','O combate à corrupção se faz pelo desenvolvimento de idéias e pelo convencimento de pessoas de que essas idéias fazem sentido. Desenvolver idéias significa, essencialmente, articular palavras num discurso verbal.','','#semântica #representaçõesvisuais #corrupção #significado #cores #imagens','','2015-07-14 18:45:00','2019-08-01 18:23:55','http://www1.folha.uol.com.br/fsp/dinheiro/fi0211200802.htm'),(47,1,'Medida provisoria nº 79 de 2002 e estatuto de defesa do torcedor','2003-01-01 00:00:00','O panorama revelado nas investigações realizadas pela CPI do Senado Federal evidenciou a existência de graves disfunções na organização do esporte mais popular do país.','','#CPIdoFutebol ##associações #desporto #corrupção #MP79 #crime #futebol','','2015-07-14 19:07:06','2019-08-01 18:23:48','http://transparencia.org.br/docs/mlfs-1.html'),(48,1,'O day after eleitoral','2003-01-01 00:00:00','O que mais se vê, contudo, é que, uma vez eleitos, os candidatos prontamente se esqueçam do que prometeram e nada façam para perseguir o objetivo eleitoral.','','#promessaseleitorais #combateàcorrupção #governabilidade #inação #cobrança #engajamento','','2015-07-14 19:08:03','2019-08-01 18:22:02','http://transparencia.org.br/docs/dayafter.html'),(49,1,'Cultural uma ova','2003-01-01 00:00:00','Há quem diga que a corrupção é fenômeno cultural. Só um traço arraigado nos costumes básicos das pessoas poderia explicar a presença disseminada da corrupção em nossa sociedade.','','#cultura #corrupção #combate #fraude #mapeamento','','2015-07-14 19:08:38','2019-08-01 18:19:14','http://transparencia.org.br/docs/cultural.html'),(50,1,'Ainda é tempo','2003-01-01 00:00:00','Caso ações e programas específicos não sejam desencadeados, não há possibilidade de se reduzir a ineficiência econômica por meio da punição a fatos consumados.','','#corrupção #combate #prevenção #eficiênciaadministrativa #controle','','2015-07-14 19:09:09','2019-08-01 18:18:02','http://transparencia.org.br/docs/ainda.html'),(51,1,'Pequeno grande irmão','2003-01-01 00:00:00','O “Em questão” é pago com dinheiro do Estado, e portanto não poderia ser usado como instrumento de propaganda de governo. Mascarar um produto publicitário na forma de boletim informativo é contrafação, destinada a mistificar o leitor desavisado. ','','#emquestão #publicidadeoficial #informação #propaganda #antijornalismo','','2015-07-14 19:10:40','2019-08-01 18:17:30','http://transparencia.org.br/docs/questao.html'),(52,1,'Moral e marketing','2003-01-01 00:00:00','Moral não é questão abstrata, não se referindo a valores. Moral é comportamento. Assim, o que importa não é o que as pessoas pensam no seu íntimo (e apregoam conforme a conveniência política ou econômica), mas o que efetivamente fazem. E o que as pessoas efetivamente fazem no espaço público depende da normatização do Estado, através das leis, e dos costumes, por sua vez aprendidos no dia-a-dia pela exposição ao meio ambiente. ','Moral e marketing.pdf','#moral #ética #combateàcorrupção #enforcement #impunidade','','2015-07-14 19:11:18','2017-05-11 13:33:22','http://transparencia.org.br/docs/Kroll3.html'),(53,1,'Palavras e ações','2003-01-01 00:00:00','Pode-se dizer que é impossível encontrar alguém que se declare publicamente a favor da corrupção. Políticos, em especial, sempre que podem declaram aversão pela corrupção, em geral adicionando adjetivos como “radicalmente”, “intransigentemente” etc.','','#inação #corrupção #marketingeleitoral #eficiência #controle #combateàcorrupção','','2015-07-14 19:11:55','2019-08-01 18:17:23','http://transparencia.org.br/docs/SwissCam.html'),(54,1,'Irresponsabilidade fiscal e corrupção','2004-01-01 00:00:00','As manifestações do governo frisam o papel que a iniciativa teria na retomada do desenvolvimento. ','','#PPP #licitações #controle #discricionariedade #resposabilidadefiscal #corrupção','','2015-07-14 19:24:19','2019-08-01 18:17:14','http://transparencia.org.br/docs/PPP-CWA-FSP.html'),(55,1,'Veto ininteligível','2004-01-01 00:00:00','Causou surpresa ato da prefeita Marta Suplicy ao vetar projeto de lei que obrigava a prefeitura a publicar informações sobre o orçamento da cidade.','','#transparência #orçamento #Abraji #PrefeituraSP #veto','','2015-07-14 19:25:09','2019-08-01 18:17:06','http://transparencia.org.br/docs/ininteligivel.html'),(56,1,'Sobre a reforma do financiamento eleitoral','2004-01-01 00:00:00','O financiamento de partidos e eleições é um assunto espinhoso nas democracias modernas. Apresento teses sobre a oportunidade da reforma do financiamento eleitoral.','','#financiamentoeleitoral #financiamentopúblico #reformapolítica #caixa2 #representatividade #partidos','','2015-07-14 19:26:32','2019-08-01 18:10:47','http://transparencia.org.br/docs/reforma-eleitoral.html'),(57,1,'Corrupção, prevenção e controle','2004-01-01 00:00:00','Corrupção está vinculada a valores sociais, à educação e à cultura. Mas a corrupção não é somente falha individual de pessoas que não resistiram à sedução do ganho fácil às custas da sociedade. No dia-a-dia a corrupção \"é mais um crime de cálculo do que de paixão\".','','#corrupção #prevenção #controle #fiscalização #prestaçãodecontas','','2015-07-14 19:27:16','2019-08-01 18:08:34','http://transparencia.org.br/docs/prev-controle.html'),(58,1,'Relações perigosas','2004-01-01 00:00:00','O processo de formulação e tramitação do Executivo que trata das parcerias público-privadas fornece um exemplo acabado de como se dá a captura do Estado por interesses privados.','','#projetoPPP #Legislativo #cooptação #Executivo #empresas #financiamentoeleitoral','','2015-07-14 19:27:48','2019-08-01 18:08:26','http://transparencia.org.br/docs/relacoes-perigosas.html'),(59,1,'Qual é, ministros?','2004-01-01 00:00:00','Quer dizer que, conforme o ministro, dirigir-se ao eleitor para que ele não vote em ladrão e para que resista a ofertas de compra de seu voto não teria caráter educativo ou de orientação. Pior: tais mensagens afetariam a igualdade de oportunidades entre candidatos.','','#votolimpo #campanha #conscientização #Eleições2004 #TSE #Radiobrás','','2015-07-14 19:28:44','2019-08-01 18:07:39','http://www1.folha.uol.com.br/fsp/opiniao/fz2309200410.htm'),(60,1,'Riscos, falhas e falsas promessas','2004-01-01 00:00:00','A proposta de financiamento público exclusivo de campanha envolve vários riscos e não leva em conta a experiência acumulada no Brasil e em outros países. ','','#financiamentoeleitoral #financiamentopúblico #empresas #caixa2 #representatividade #partidos','','2015-07-14 19:29:59','2019-08-01 18:07:07','http://www1.folha.uol.com.br/fsp/opiniao/fz0210200410.htm'),(61,1,'Acesso a informação e eficiência do Estado','2004-01-01 00:00:00','Informação é poder, e poder se disputa. Muitos movimentos da história definiram-se porque uma potência detinha mais informação do que outra sobre algum aspecto que fazia diferença. O mesmo ocorre dentro de cada sociedade, podendo-se mapear a distribuição do poder em termos do controle da informação.','Acesso a Informação e Eficiência do Estado..pdf','#informação #transparência #acessoàinformação #economia #escolhas #direitoshumanos #poder','','2015-07-14 19:31:47','2017-05-10 21:39:13','http://www.egov.ufsc.br/portal/sites/default/files/anexos/5894-5886-1-PB.pdf'),(62,1,'Negócios de confiança','2005-01-01 00:00:00','Caso a quantidade de cargos de livre nomeação fosse reduzida, isso traria enormes benefícios para a redução da corrupção.','','#loteamento  #livrenomeação #comissionados #Correios #corrupção','','2015-07-14 19:32:44','2017-05-10 21:37:00','http://www1.folha.uol.com.br/fsp/opiniao/fz0706200509.htm'),(63,1,'Mensalão oficial','2005-01-01 00:00:00','Está em curso uma tentativa de minimização da crise que se abateu sobre as instituições brasileiras a partir da divulgação da gravação de conversas de natureza criminal entre um funcionário dos Correios e arapongas movidos por interesses ainda obscuros.','','#CPMI #Correios #mensalão #caixa2 #financiamentoeleitoral #financiamentopúblico #livrenomeação #comissionados','','2015-07-14 19:35:08','2017-05-10 21:33:59','http://www.comciencia.br/reportagens/2005/07/11.shtml'),(64,1,'Estratégia oportunista','2005-01-01 00:00:00','A noção de que o financiamento público exclusivo de campanhas eleitorais acabaria com o caixa dois baseia-se em uma ficção ilógica e, neste momento, tem servido para sustentar a estratégia de limpar a barra dos culpados por administrar esquemas de corrupção. O oportunismo da estratégia destrói a possibilidade de esse tema tão importante ser discutido com a isenção que seria necessária.','','#financiamentoeleitoral #caixa2 #empresas #financiamentopúblico #corrupção','','2015-07-14 19:36:06','2017-05-10 21:30:33','http://www1.folha.uol.com.br/fsp/opiniao/fz2307200510.htm'),(65,1,'Adeus, ética','2005-01-01 00:00:00','Um dos benefícios que a crise do mensalão poderá trazer aos costumes brasileiros será a desmoralização do discurso pretensamente \"ético\".','','#ética #instituições #reformapolítica #corrupção #estruturas','','2015-07-14 19:36:42','2017-05-10 21:25:36','http://acervo.oglobo.globo.com/?service=compartilhamento&id=8T79cmIuXk9gCw%2FAXUkYvoDyQXK7hXH%2FRn7aLpykAJy%2BiYVSYdRV1s4%2Bv63k%2Bk0xVyCDpavqnaQ%3D&origem=amz'),(66,1,'Lavagem de gente','2005-01-01 00:00:00','A necessidade de uma reforma política tem sido apontada há anos por muitos observadores. O sistema político-eleitoral brasileiro inclui distorções que afetam gravemente a representação democrática. As camadas populares são sub-representadas e as oligarquias são super-representadas. Esse é o problema central. Qualquer debate que se trave em torno do assunto precisa centrar-se nesse tema e apenas subsidiariamente em outros. Debate de reforma política que não aborde o problema da representação não é debate de reforma política.','','#reformapolítica #Correios #Mensalão #caixa2 #financiamentoeleitoral #corrupção #lavagem','','2015-07-14 19:37:44','2017-05-10 21:13:16','http://www1.folha.uol.com.br/fsp/opiniao/fz0209200510.htm'),(67,1,'Lula e a corupção','2005-01-01 00:00:00','A crise do “mensalão” serviu, entre outras coisas, para iluminar uma característica do governo Lula e de seu partido que já havia se manifestado desde 2003 – a corrupção nunca foi um tema importante. ','Lula e a corrupção.pdf','#Lula #corrupção #anticorrupção #loteamento #orçamento #controle #Acessoàinformação','','2015-07-14 19:38:30','2017-05-10 21:02:46','http://transparencia.org.br/docs/astrojildo.pdf'),(68,1,'Candidatura acintosa','2005-01-01 00:00:00','Há entre as alegadas ambições do presidente do STF e sua função um conflito de interesses cuja persistência é intolerável.','','#3poderes #democracia #STF #Legislativo #Executivo #interferência #conflito','','2015-07-14 19:39:13','2017-05-10 20:47:49','http://www1.folha.uol.com.br/fsp/opiniao/fz0512200509.htm'),(69,1,'Acham que somos idiotas?','2006-01-01 00:00:00','Querem fazer crer que corrupção ocorre por criação miraculosa de dinheiro, sem prejuízo para os cofres públicos.','','#CPMI #Correios #corrupção #loteamento #cargos #comissionados #mensalão #caixa2 #licitações','','2015-07-14 19:40:05','2017-05-10 20:46:26','http://www1.folha.uol.com.br/fsp/opiniao/fz1702200610.htm'),(70,1,'Pizza monumental','2006-01-01 00:00:00','Entre as medidas estaria a imposição de uma norma a qual 99% dos cargos em comissão na esfera federal precisam ser ocupados por funcionários de carreira.','','#CPMI #Correios #corrupção #loteamento #cargos #comissionados #governabilidade','','2015-07-14 20:47:57','2019-08-01 18:06:43','http://www1.folha.uol.com.br/fsp/opiniao/fz2403200609.htm'),(71,1,'Por que não há justiça no Brasil ','2006-01-01 00:00:00','O fator predominante no resultado da aplicação da justiça no Brasil é o poder econômico das partes. Qualquer que seja o ângulo com que a questão seja analisada, o resultado é sempre um favorecimento brutal de quem tem mais dinheiro.','Por que não há justiça no Brasil.pdf','#Justiça #opacidade #transparência #desempenho #morosidade #recursosprotelatórios','','2015-07-14 20:48:29','2017-05-10 20:42:39','http://transparencia.org.br/docs/just-Brasil.pdf'),(72,1,'Um país de mentira','2006-01-01 00:00:00','A corrupção não acontece porque existem pessoas desonestas no mundo, mas porque o ambiente em que ocorre a interação entre os agentes públicos e privados dá oportunidades para conluios entre uns e outros. ','','#PactoEmpresarial #Ethos #corrupção #empresas #economia #moral','','2015-07-14 20:49:02','2019-08-01 18:02:54','http://www1.folha.uol.com.br/fsp/opiniao/fz2206200609.htm'),(73,1,'Pilhagem anunciada','2006-10-01 00:00:00','Sejam quais forem os números que as urnas produzirão no próximo\r\ndomingo (ou um mês depois, nos casos em que houver segundo turno),\r\nsabemos de antemão quais serão os resultados.','','#governabilidade #loteamento #cargos #comissionados #nomeação #corrupção','','2015-07-14 20:50:09','2019-08-01 18:02:49','http://transparencia.org.br/docs/pilhagem.pdf'),(74,1,'Para calibrar a perspectiva','2006-10-01 00:00:00','Na maioria dos Estados, faltam instrumentos elementares de acompanhamento da gestão orçamentária, informação ao público a respeito de contratações e execução de programas.   .','','#prevenção #anticorrupção #descentralização #propostas #candidatos #Eleições2006','','2015-07-14 20:51:00','2019-08-01 18:02:43','http://transparencia.org.br/docs/calibrar.pdf'),(75,1,'Toma, que o filho é teu','2006-11-01 00:00:00','Os comentários morais sobre o 1º turno são um moralismo temperado de desinformação, não sem grandes doses de hipocrisia.','','#mensalão #eleições2006 #caixa2 #corrupção #financiamentoeleitoral #moralismo','','2015-07-14 20:51:44','2019-08-01 18:02:35','http://www1.folha.uol.com.br/fsp/opiniao/fz0610200609.htm'),(76,1,'Voluntarismo e ação institucional','2007-01-01 00:00:00','O problema com o voluntarismo não está na disposição de fazer o bem, mas nas circunstâncias que o acompanham.','','#voluntarismo #cidadãos #hiperliberalismo #instituições','','2015-07-14 20:52:30','2019-08-01 18:00:13','http://www1.folha.uol.com.br/fsp/opiniao/fz0310200709.htm'),(77,1,'A responsabilidade do TSE','2007-02-01 00:00:00','A responsabilidade do TSE no combate à fraude eleitoral e à prática de compra de votos.','','#compradevotos #eleições #pesquisa #TSE #JustiçaEleitoral #fraude','','2015-07-14 20:53:10','2019-08-01 18:02:26','http://claudioabramo.ig.com.br/index.php/2007/02/21/a-responsabilidade-do-tse/'),(78,1,'Parlamento capturado','2007-03-01 00:00:00','O aumento salarial pleiteado pelos deputados federais é exemplo de um fenômeno que se agrava no Brasil: a captura de estruturas do Estado por interesses privados.','','#Legislativo #instituições #3poderes #gastos #Congresso #interessesprivados','','2015-07-14 20:54:12','2019-08-01 18:00:02','http://www1.folha.uol.com.br/fsp/opiniao/fz1204200708.htm'),(79,1,'Ditadura da burocracia','2007-04-01 00:00:00','A proposta do governo de diminuir o prazo para empresas concorrentes apresentarem recursos, piora a capacidade de fiscalizar os editais de licitação e o combate à corrupção.','','#licitações #Lei8666 #competição #administraçãopública #corrupção #ineficiência #empresas #prevenção','','2015-07-14 20:54:59','2019-08-01 17:59:51','http://transparencia.org.br/docs/prazos-pac.pdf'),(80,1,'Proibição fantasiosa','2007-05-01 00:00:00','A preocupação de nossos parlamentares não é com o interesse do eleitor, mas com o seu próprio interesse.','','#financiamentoeleitoral #caixa2 #doações #financiamentopúblico #mensalão','','2015-07-14 20:55:36','2019-08-01 17:59:44','http://www1.folha.uol.com.br/fsp/opiniao/fz1906200709.htm'),(81,1,'Quem são os Conselheiros dos Tribunais de Contas? (2016)','2016-03-16 00:00:00','Levantamento mostra quem comanda os Tribunais de Contas brasileiros. Em sua maioria, políticos de carreira (80%), muitos dos quais sofrem processo na Justiça e nos próprios TCs.','TBrasil - Tribunais de Contas 2016.pdf','Tribunais de Conta; corrupção','\0','2016-03-16 13:37:39','2016-03-17 19:53:43',''),(82,5,'Quem são os Conselheiros dos Tribunais de Contas? ','2016-03-16 00:00:00','Levantamento mostra quem comanda os Tribunais de Contas brasileiros. Em sua maioria, políticos de carreira (80%), muitos dos quais sofrem processo na Justiça e nos próprios TCs.','Quem são os conselheiros dos Tribunais de Contas.pdf','Tribunais de Contas; corrupção','','2016-03-17 19:54:30','2020-11-23 17:38:56',''),(83,1,'Teste','2017-08-13 00:00:00','teste teste teste','teste.pdf','democracia, transparência','\0','2017-08-14 02:40:48','2017-08-14 02:43:20',''),(84,5,'Teste relatorio','2017-08-13 00:00:00','Teste teste teste','teste.pdf','','\0','2017-08-14 02:44:08','2017-08-14 02:44:48',''),(85,5,'Quase metade das obras de creches e escolas públicas de programas do Governo Federal estão atrasadas ou paralisadas','2017-08-14 00:00:00','Relatório aponta que das 7.453 obras de escolas e creches públicas financiadas pelo Ministério da Educação, 46% encontram-se atrasadas ou paralisadas.','RelatorioTadePe140817.pdf','Educação; transparência; Governo Federal','\0','2017-08-14 16:21:15','2017-08-14 16:59:09',''),(86,5,'Quase metade das obras de creches e escolas públicas de programas do Governo Federal estão atrasadas ou paralisadas','2017-08-14 00:00:00','Relatório aponta que das 7.453 obras de escolas e creches públicas financiadas pelo Governo Federal, 46% encontram-se paralisadas ou atrasadas.','RelatorioTadePe140817.docx.pdf','Educação, transparência, Governo Federal','\0','2017-08-14 18:04:21','2017-08-15 12:49:36',''),(87,5,'46% das obras de creches e escolas estão atrasadas ou paralisadas ','2017-08-14 00:00:00','Após 10 anos, apenas 37% (4.830) das obras de creches e escolas públicas foram concluídas, 642 foram canceladas e restam ainda 7.453 obras para serem entregues.','','','','2017-08-15 12:50:22','2019-08-08 19:16:11','https://www.transparencia.org.br/downloads/publicacoes/RelatorioTadePe23082017.pdf'),(88,1,'Quase metade dos principais órgãos públicos brasileiros descumprem a Lei de Acesso à Informação','2017-09-19 00:00:00','A Transparência Brasil enviou pedidos de informação a 206 órgãos públicos de todos os poderes e esferas federativas. 46% deles sequer responderam.','Relatorio_LAI_180917.pdf','lei de acesso à informação; LAI; informações públicas; improbidade administrativa; transparência pública; executivo; legislativo; judiciário','\0','2017-09-19 15:05:26','2017-09-19 15:06:51',''),(89,5,'Quase metade dos principais órgãos públicos brasileiros descumprem a Lei de Acesso à Informação','2017-09-19 00:00:00','Enviamos pedidos de informação a 206 órgãos públicos de todas as esferas federativas. 45% deles sequer responderam.','','lei de acesso à informação; LAI; informações públicas; improbidade administrativa; transparência pública; executivo; legislativo; judiciário','','2017-09-19 15:05:51','2019-08-08 19:15:16','https://www.transparencia.org.br/downloads/publicacoes/Relat%C3%B3rio_LAI_16022018.pdf'),(90,5,'Monitoramento de obras de escolas e creches revela que, em um ano, apenas 12 de 135 obras foram concluídas','2018-09-25 00:00:00','Resultado após um ano de monitoramento in loco de 135 obras de escolas e creches em 21 municípios do projeto Obra Transparente em parceria com observatórios sociais.','18082018_relatorioOT (1).pdf','Fiscalização; obras; creches; escolas; educação.','','2018-09-25 20:52:19','2019-08-13 14:13:00',''),(91,5,'59% das obras de escolas e creches com recursos federais a entregar apresentam problemas','2018-12-20 00:00:00','Levantamento da Transparência Brasil encontrou evidências de\r\nproblemas em 3,2 mil obras do país.','','obras, educação, escolas, creches, atraso, FNDE, Governo Federal','','2018-12-20 13:45:03','2019-08-08 19:08:17','https://www.transparencia.org.br/blog/wp-content/uploads/2018/12/Relatorio_campanha-TdP_08112018.pdf'),(92,5,'O que a população quer saber do poder público?','2018-11-30 00:00:00','Uma análise de respostas a pedidos de acesso à informação\r\nde órgãos de todos os poderes e níveis federativos.','','LAI, lei de acesso à informação, linguagem clara, trabalho adicional, assuntos','','2018-12-20 13:55:21','2019-08-08 19:14:04','https://www.transparencia.org.br/downloads/publicacoes/RelatorioLAI_TransparenciaBrasil_2018_vf.pdf'),(93,5,'Diagnóstico de efetividade de pedidos via LAI e o impacto no controle social','2019-05-16 00:00:00','Relatório com base em 105 pedidos de acesso a informação feitos a 43 municípios brasileiros aponta que a implementação e efetividade da LAI continuam baixas.','','LAI, Lei de Acesso a Informação, Obra Transparente, Tá de Pé','','2019-05-21 22:30:45','2019-08-08 18:50:47','https://www.transparencia.org.br/blog/wp-content/uploads/2019/05/Diagnostico_TdP_OT_LAI_2019.pdf'),(94,1,'Proinfância ou Problema na Infância? Os desafios na construção de creches e escolas em municípios brasileiros','2019-06-11 00:00:00','Relatório apresenta resultados obtidos nos dois anos do Projeto Obra Transparente, com dados sobre os obstáculos em nível local para implementação do programa ProInfância','Obra Transparente 0706.pdf','','\0','2019-06-07 22:59:24','2019-06-07 23:01:29',''),(95,5,'Os desafios na construção de creches e escolas em municípios brasileiros','2019-06-11 00:00:00','Relatório apresenta resultados obtidos nos dois anos do Projeto Obra Transparente, com dados sobre os obstáculos em nível local para implementação do programa ProInfância.','','','','2019-06-07 23:00:31','2019-08-08 18:48:01','https://www.transparencia.org.br/downloads/publicacoes/Obra%20Transparente%200706.pdf'),(96,3,'Manual de Controle Social de Obras Públicas','2019-06-30 00:00:00','Instruções e orientações práticas para o monitoramento da contratação, execução e entrega de obras públicas.','Controle Social de Obras Publicas.pdf','obra transparente, controle social, obras públicas','','2019-07-18 19:06:09','2019-08-05 17:21:21',''),(97,3,'Material de Referência: Estudo Sobre Licitações ','2019-06-30 00:00:00','Material para consulta sobre os fundamentos legais detalhados das licitações públicas em suas diversas formas, modalidades e etapas.','Estudo Para Licitacoes - ONLINE.pdf','licitações, obra transparente, controle social','','2019-07-18 20:49:13','2019-08-05 17:19:38',''),(98,3,'Material de Referência: Estudo Sobre Contratos ','2019-06-30 00:00:00','Material para consulta sobre os fundamentos legais detalhados dos contratos públicos e seus componentes.','Estudo Para Contratos - ONLINE.pdf','','','2019-07-18 20:50:49','2019-08-05 17:18:11',''),(99,3,'Métodos de Detecção de Fraude e Corrupção em Contratações Públicas ','2019-06-30 00:00:00','Este material reúne conceitos e tipologias de fraudes em contratações públicas e apresenta indicadores de risco e técnicas de detecção destas irregularidades.','','Fraude, detecção, controle social, obras públicas, obra transparente','\0','2019-07-18 20:55:17','2019-07-18 20:55:45',''),(100,3,'Métodos de Detecção de Fraude e Corrupção em Contratações Públicas ','2019-06-30 00:00:00','Este material reúne conceitos e tipologias de fraudes em contratações públicas  e apresenta indicadores de risco e técnicas de detecção destas irregularidades.','Metodos Detecção de Fraude.pdf','Fraude, detecção, controle social, obras públicas, obra transparente','','2019-07-18 20:56:49','2019-09-05 21:08:33',''),(101,7,'Checklists para Controle Social de Obras Públicas','2019-06-30 00:00:00','Listas de verificação dos principais elementos para o acompanhamento de cada etapa da realização de uma obra pública.','Checklists controle social.pdf','controle social, obras públicas, obra transparente','','2019-07-18 21:02:58','2019-08-13 14:16:33',''),(102,7,'Checklists para Detecção de Fraudes em Licitações','2019-06-30 00:00:00','Listas de verificação com pontos relevantes para a identificação de fraudes em licitações públicas.','Checklists detecção fraudes.pdf','Fraude, detecção, controle social, obras públicas, obra transparente','','2019-07-18 21:03:53','2019-09-09 21:16:26',''),(103,6,'Araucária PR - Análises Técnicas do Projeto Obra Transparente ','2019-06-30 00:00:00','Análises realizadas pela Câmara Técnica do projeto Obra Transparente e pelos observatórios sociais para o monitoramento da contratação e execução de obras de escolas e creches.','Casos Obra Transparente - Araucária - completo.pdf','obra transparente, controle social, obras públicas','','2019-07-24 21:49:46','2019-08-08 20:03:38',''),(104,6,'Palhoça SC - Análises Técnicas do Projeto Obra Transparente ','2019-06-30 00:00:00','Análises realizadas pela Câmara Técnica do projeto Obra Transparente e pelos observatórios sociais para o monitoramento da contratação e execução de obras de escolas e creches.','Casos Obra Transparente - Palhoça - completo.pdf','controle social, obras públicas, obra transparente','','2019-07-24 21:50:54','2019-08-08 20:02:05',''),(105,6,'Pelotas RS - Análises Técnicas do Projeto Obra Transparente ','2019-06-30 00:00:00','Análises realizadas pela Câmara Técnica do projeto Obra Transparente e pelos observatórios sociais para o monitoramento da contratação e execução de obras de escolas e creches.','Casos Obra Transparente - Pelotas - completo.pdf','obra transparente, controle social, obras públicas','','2019-07-24 21:53:01','2019-08-08 20:01:40',''),(106,5,'Irregularidades no uso de app de transporte na Prefeitura de São Paulo','2019-08-09 00:00:00','Dados de utilização de app de transporte da Prefeitura de São Paulo indicam uso para traslado particular e revelam falta de prestação de contas e indícios de irregularidades.','relatorio_99_final.pdf','controle social, transparência, dados abertos','','2019-08-09 19:27:44','2019-08-09 20:02:31',''),(107,5,'Positive impact stories for qualitative assessment','2019-08-30 00:00:00','This report highlights successful stories of the project Obra Transparente, which provided means for evaluating the effectiveness and impact of the federal program ProInfância','Resultados positivos EN.pdf','controle social, obras públicas, obra transparente','','2019-08-30 21:29:13','2019-08-30 21:29:13',''),(108,4,'Guia 1 - Controle Social de Obras Públicas','2019-08-30 00:00:00','Baseado no Manual de Controle Social de Obras Públicas, o Guia 1 introduz o tema e traz orientações sobre onde encontrar informações para o monitoramento de obras','web Guia 1.pdf','controle social, obras públicas, obra transparente','','2019-08-30 21:39:09','2019-08-30 21:39:09',''),(109,4,'Guia 2 - Monitorando a contratação de uma obra','2019-08-30 00:00:00','Baseado no Manual de Controle Social de Obras Públicas, o Guia 2 apresenta fases da contratação de uma obra e ressalta a importância do planejamento para o sucesso da construção','web Guia 2.pdf','controle social, obras públicas, obra transparente','','2019-08-30 21:45:25','2019-08-30 21:45:25',''),(110,4,'Guia 3 - Pontos Críticos do Projeto','2019-08-30 00:00:00','Baseado no Manual de Controle Social de Obras Públicas, o Guia 3 aborda critérios para seleção do terreno em que uma obra será implantada e pontos do orçamento para verificação','web Guia 3.pdf','controle social, obras públicas, obra transparente','','2019-08-30 21:56:15','2019-08-30 21:56:15',''),(111,4,'Guia 4 - A execução da obra','2019-08-30 00:00:00','Baseado no Manual de Controle Social de Obras Públicas, o Guia 4 traz recomendações para acompanhamento de obras em execução e indica documentação relevante para análise','web Guia 4.pdf','controle social, obras públicas, obra transparente','','2019-08-30 21:59:40','2019-08-30 21:59:40',''),(112,4,'Guia 5 - Os custos da obra','2019-06-30 00:00:00','Baseado no Manual de Controle Social de Obras Públicas, o Guia 5 trata dos pontos de atenção para o monitoramento de pagamentos de uma obra e alerta para alterações contratuais','web Guia 5.pdf','controle social, obras públicas, obra transparente','','2019-08-30 22:02:02','2019-08-30 22:02:02',''),(113,4,'Guia 6 - Fiscalização da Obra','2019-06-30 00:00:00','Baseado no Manual de Controle Social de Obras Públicas, o Guia 6 ressalta os procedimentos que o poder público deve seguir para a fiscalização das obras públicas','web Guia 6.pdf','controle social, obras públicas, obra transparente','','2019-08-30 22:05:34','2019-08-30 22:07:45',''),(114,4,'Guia 7 - Recebimento da Obra','2019-06-30 00:00:00','Baseado no Manual de Controle Social de Obras Públicas, o Guia 7 lista os documentos e procedimentos a serem conferidos para o recebimento adequado de uma obra pública','web Guia 7.pdf','controle social, obras públicas, obra transparente','','2019-08-30 22:06:50','2019-08-30 22:07:25',''),(115,1,'Teste 2','2019-09-03 00:00:00','teste','the-david-bucknall-scholarship-2017-conditions-131177962637166299.pdf','','\0','2019-09-03 13:55:21','2019-09-03 14:04:55',''),(116,5,'Resultados positivos para avaliação qualitativa','2019-09-10 00:00:00','Este relatório destaca histórias de sucesso do projeto Obra Transparente, que ofereceu meios para a avaliação de efetividade e impacto do programa federal ProInfância','Resultados positivos PT.pdf','obra transparente, controle social, obras públicas','','2019-09-10 19:55:15','2019-09-10 19:55:55',''),(117,2,'What do Brazilian citizens use Freedom of Information Law for – a typology of FOIL requests.','2019-06-26 00:00:00','A proposed typology for Brazilian FOIL requests, developed using a hybrid classification method employing the Latent Dirichlet Allocation (LDA) algorithm.','What do Brazilian citizens use Freedom of Information Law for.pdf','','','2020-03-06 23:28:11','2020-03-06 23:28:11',''),(118,5,'Pendências Judiciais de congressistas da Comissão Mista de fiscalização de gastos da Covid-19','2020-04-07 00:00:00','Levantamento mostra que mais de 60% dos integrantes da Comissão Mista do Congresso Nacional para fiscalizar gastos federais com a pandemia têm pendências judiciais.','Relatorio_Comissao_Fiscalizacao_Covid19.pdf','deputado, senador, processos, covid-19','\0','2020-04-07 14:12:07','2020-04-07 14:13:18',''),(119,5,'Pendências Judiciais de congressistas da Comissão Mista de fiscalização de gastos da Covid-19','2020-04-07 00:00:00','Levantamento mostra que mais de 60% dos integrantes da Comissão Mista do Congresso Nacional para fiscalizar gastos federais com a pandemia têm pendências judiciais.','Relatorio_Comissao_Fiscalizacao_Covid19_.pdf','','','2020-04-07 19:26:30','2020-04-08 14:51:37',''),(120,5,'Alterações no atendimento a pedidos de informação e a MP 928','2020-05-04 00:00:00','Levantamento do Fórum de Direito de Acesso a Informações Públicas: mesmo após a suspensão da MP 928 pelo STF, pedidos deixaram de ser atendidos sob o pretexto da pandemia','Alteracoes_atendimento_pedidos_de_informacao_e_MP_928.pdf','','','2020-05-15 20:58:41','2020-05-15 20:58:41',''),(121,5,'Gastos federais para combate à Covid-19 junto a povos indígenas','2020-06-23 00:00:00','Levantamento mostra que apenas 39% dos empenhos realizados pela FUNAI na ação orçamentária para combater o Coronavírus foram liquidados.','Execucao_orçamento_Covid-19_acoes_indigenas.pdf','','','2020-06-23 01:23:50','2020-06-23 01:25:02',''),(122,5,'Violações ao Direito de Acesso à Informação e Transparência relacionados ao combate da pandemia do COVID-19 no Brasil','2020-06-24 00:00:00','Solicitação de Reunião Bilateral durante o 176. período de sessões da CIDH','reunião bilateral CIDH_revisado.pdf','COVID-19','','2020-07-20 20:19:51','2020-07-20 20:19:51',''),(123,5,'Negativas de acesso a informação pioram sob governo Bolsonaro','2020-08-03 00:00:00','Análise de dados do e-SIC do governo federal mostra aumento no uso de justificativas controversas para negar atendimento a pedidos de informação em 2019 e 2020.','Negativas_de_acesso_a_informacao_pioram_sob_governo_Bolsonaro.pdf','','','2020-08-03 20:26:00','2020-08-03 20:26:00',''),(124,5,'Transparência em Câmaras Municipais - Região Metropolitana do Rio de Janeiro','2020-11-04 00:00:00','Este relatório faz uma análise de elementos da transparência das Câmaras Municipais dos cinco municípios mais populosos da Região Metropolitana do Rio de Janeiro (RMRJ)','Relatório Câmaras Municipais RMRJ v2.pdf','Câmara, Legislativo, Rio de Janeiro','\0','2020-10-30 17:40:45','2020-10-30 17:42:39',''),(125,5,'Transparência em Câmaras Municipais - Região Metropolitana do Rio de Janeiro','2020-11-05 00:00:00','Análise de elementos da transparência das Câmaras Municipais dos cinco municípios mais populosos da  Região Metropolitana do Rio de Janeiro.',NULL,'Câmara, Legislativo, Rio de Janeiro','','2020-11-05 16:12:06','2020-11-05 16:12:45','https://www.transparencia.org.br/downloads/publicacoes/Relat%C3%B3rio%20C%C3%A2maras%20Municipais%20RMRJ%20v2.pdf'),(126,3,'Guia de Fiscalização Cidadã','2020-08-25 00:00:00','Guia com o objetivo de apoiar e informar todas as pessoas interessadas em fortalecer a transparência das ações governamentais e o bom uso dos recursos públicos.','GuiaDeFiscalização.pdf','Fiscalização Cidadã','','2020-11-05 21:14:31','2020-11-05 21:14:31',''),(127,5,'Transparência em Câmaras Municipais - Região Metropolitana de Belo Horizonte','2020-11-12 00:00:00','Análise de elementos da transparência das Câmaras Municipais dos cinco municípios mais populosos da Região Metropolitana de Belo Horizonte.','Relatório Câmaras RMBH.pdf','Câmara, Legislativo, Belo Horizonte','','2020-11-11 22:58:30','2020-11-12 18:25:50',''),(128,5,'Compras emergenciais no RS - opacidade e padrões','2020-11-12 00:00:00','Resultados da análise dos dados de compras emergenciais realizadas pelas prefeituras dos municípios gaúchos em razão da pandemia causada pela COVID-19.','Compras emergenciais no RS opacidade e padrões.pdf','Rio Grande do Sul, Compras Emergenciais, Tá de Pé','','2020-11-12 18:24:50','2020-11-12 18:26:42',''),(129,5,'Transparência em Câmaras Municipais - Região Metropolitana de São Paulo','2020-11-14 00:00:00','Análise da transparência das Câmaras Municipais dos cinco municípios mais populosos da Região Metropolitana de São Paulo.','CâmarasRMSP.pdf','Transparência; Legislativo; Câmara Municipal','','2020-11-14 15:11:00','2020-11-14 15:11:00',''),(130,5,'Transparência, controle social e corrupção nos programas eleitorais às prefeituras','2020-11-15 00:00:00','Análise de mais de 15 mil programas eleitorais de candidaturas a prefeituras municipais pelo país mostra que os temas são tratados de forma genérica','PropostasPrefeituras.pdf','Eleições; transparência; corrupção; controle social, propostas eleitorais','','2020-11-14 15:29:03','2020-11-14 15:31:18',''),(131,5,'A LAI em 2020:  Estados e Distrito Federal','2020-12-09 00:00:00','Atualização parcial do relatório de 2017 sobre o cumprimento da LAI por órgãos estaduais. Produzido como parte do projeto Achados e Pedidos.','Cumprimento_da_LAI_nos_Estados_2020.pdf','','','2020-12-09 01:48:30','2020-12-09 05:12:13',''),(132,5,'Nota Técnica: Opacidade do Ministério da Saúde na pandemia','2020-12-10 00:00:00','Nota Técnica produzida pelo Fórum de Direito de Acesso a Informações Públicas (coordenado pela TB) sobre falhas na divulgação de dados sobre a pandemia de Covid-19','NotaTecnica_Opacidade_no_Ministerio_da_Saude.pdf','','','2020-12-10 14:40:29','2020-12-10 14:40:29',''),(133,5,'Análise preliminar da nova Lei de Licitações','2020-12-15 00:00:00','Análise preliminar de alguns dos principais pontos da nova Lei de Licitações (PL 4.253/2020), aprovada pelo Senado em dezembro de 2020.','Analise_Preliminar_Nova_Lei _de_Licitacoes.pdf','','','2020-12-15 18:07:14','2020-12-15 18:07:14',''),(134,5,'Relatório de Atividades 2020','2021-01-20 00:00:00','Um resumo da atuação da Transparência Brasil em 2020 e de seus impactos.','Relatorio_Atividades_TB_2020.pdf','','','2021-01-19 22:28:25','2021-01-20 12:21:04',''),(135,2,'Caminhos da Transparência - TI Source Book (Bruno W. Speck, org.)','2002-01-01 00:00:00','Esta obra corresponde à adaptação, às condições brasileiras, do Source Book da Transparency International. Cobre os principais pilares do Sistema Nacional de Integridade.','Tbrasil SPECK ORG 2002.pdf','','','2021-01-27 22:21:46','2021-01-27 22:21:46','');
/*!40000 ALTER TABLE `publicacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicacoes_categoria`
--

DROP TABLE IF EXISTS `publicacoes_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicacoes_categoria` (
  `Codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicacoes_categoria`
--

LOCK TABLES `publicacoes_categoria` WRITE;
/*!40000 ALTER TABLE `publicacoes_categoria` DISABLE KEYS */;
INSERT INTO `publicacoes_categoria` VALUES (1,'Artigos','2015-05-27 15:20:49',NULL),(2,'Acadêmicos','2015-05-27 15:20:49',NULL),(3,'Manuais','2015-05-27 15:20:49',NULL),(4,'Cartilhas','2015-05-27 15:20:49',NULL),(5,'Relatórios','2015-05-27 15:20:49',NULL),(6,'Análise de licitações','2019-07-17 21:18:10','2019-07-17 21:18:10'),(7,'Checklists','2019-07-18 21:01:29','2019-07-18 21:01:29');
/*!40000 ALTER TABLE `publicacoes_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quem_somos`
--

DROP TABLE IF EXISTS `quem_somos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quem_somos` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoQuemSomosArea` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cargo` varchar(50) DEFAULT NULL,
  `Descricao` varchar(1000) NOT NULL,
  `Imagem` varchar(50) DEFAULT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  `Ordem` int(11) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_quem_somos` (`CodigoQuemSomosArea`),
  CONSTRAINT `fk_quem_somos` FOREIGN KEY (`CodigoQuemSomosArea`) REFERENCES `quem_somos_area` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quem_somos`
--

LOCK TABLES `quem_somos` WRITE;
/*!40000 ALTER TABLE `quem_somos` DISABLE KEYS */;
INSERT INTO `quem_somos` VALUES (1,2,'kaue','dev','sdadsasdasd','','\0',NULL);
/*!40000 ALTER TABLE `quem_somos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quem_somos_area`
--

DROP TABLE IF EXISTS `quem_somos_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quem_somos_area` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) NOT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quem_somos_area`
--

LOCK TABLES `quem_somos_area` WRITE;
/*!40000 ALTER TABLE `quem_somos_area` DISABLE KEYS */;
INSERT INTO `quem_somos_area` VALUES (1,'Conselho Deliberativo (2018-2021)',''),(2,'Conselho Fiscal (2019-2022)',''),(3,'Conselho de Ética',''),(4,'Equipe Executiva','');
/*!40000 ALTER TABLE `quem_somos_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relatorios_atividades`
--

DROP TABLE IF EXISTS `relatorios_atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relatorios_atividades` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Ano` varchar(50) NOT NULL,
  `Documento` varchar(100) DEFAULT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relatorios_atividades`
--

LOCK TABLES `relatorios_atividades` WRITE;
/*!40000 ALTER TABLE `relatorios_atividades` DISABLE KEYS */;
INSERT INTO `relatorios_atividades` VALUES (1,'2016','Relatório anual de atividades','\0'),(2,'2016','Relatório anual de atividades','\0'),(3,'2016','Relatório anual de atividades','\0'),(4,'2014','Report','\0'),(5,'2017','Relatório anual de atividades','\0'),(6,'2016','Relatório anual de atividades','\0'),(7,'2017','Relatório anual de atividades','\0'),(8,'2018','teste','\0'),(9,'2016','Relatório 2016',''),(10,'2017','Relatório 2017',''),(11,'2018','Relatório 2018','\0'),(12,'2018','Relatório 2018','\0'),(13,'2018','Relatório 2018',''),(14,'2019','Relatório 2019',''),(15,'1900','Relatório 1900','\0');
/*!40000 ALTER TABLE `relatorios_atividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relatorios_atividades_arquivos`
--

DROP TABLE IF EXISTS `relatorios_atividades_arquivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relatorios_atividades_arquivos` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoRelatorioAtividade` int(11) NOT NULL,
  `Arquivo` varchar(100) NOT NULL,
  `Ativo` bit(1) DEFAULT b'1',
  PRIMARY KEY (`Codigo`),
  KEY `fk_relatorios_atividades` (`CodigoRelatorioAtividade`),
  CONSTRAINT `fk_relatorios_atividades` FOREIGN KEY (`CodigoRelatorioAtividade`) REFERENCES `relatorios_atividades` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relatorios_atividades_arquivos`
--

LOCK TABLES `relatorios_atividades_arquivos` WRITE;
/*!40000 ALTER TABLE `relatorios_atividades_arquivos` DISABLE KEYS */;
INSERT INTO `relatorios_atividades_arquivos` VALUES (2,1,'Pedido de financiamento.pdf',''),(5,4,'texto_311614838.pdf',''),(6,5,'Relatório 2017.pdf',''),(10,6,'Relato?rio 2016.pdf',''),(12,9,'Relatorio 2016.pdf',''),(13,10,'Relatorio 2017.pdf',''),(16,11,'Relatório 2018.pdf',''),(21,12,'Relatorio 2018.pdf',''),(22,13,'Relatorio_2018.pdf',''),(25,15,'Relatório 1900.pdf',''),(27,14,'Relatório 2019.pdf','');
/*!40000 ALTER TABLE `relatorios_atividades_arquivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `targets_tipo`
--

DROP TABLE IF EXISTS `targets_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `targets_tipo` (
  `Codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `targets_tipo`
--

LOCK TABLES `targets_tipo` WRITE;
/*!40000 ALTER TABLE `targets_tipo` DISABLE KEYS */;
INSERT INTO `targets_tipo` VALUES (1,'Self','2015-06-04 11:38:50',NULL),(2,'Blank','2015-06-04 11:38:50',NULL);
/*!40000 ALTER TABLE `targets_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transacoes_doacao`
--

DROP TABLE IF EXISTS `transacoes_doacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transacoes_doacao` (
  `Codigo` bigint(20) NOT NULL AUTO_INCREMENT,
  `ValorDoado` decimal(10,2) DEFAULT NULL,
  `CodigoStatusTransacao` smallint(6) NOT NULL,
  `CodigoStatusTransacaoSP` smallint(6) NOT NULL,
  `DataPagamento` datetime DEFAULT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Codigo`),
  KEY `fk_transacao_status` (`CodigoStatusTransacao`),
  CONSTRAINT `fk_transacao_status` FOREIGN KEY (`CodigoStatusTransacao`) REFERENCES `transacoes_status` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacoes_doacao`
--

LOCK TABLES `transacoes_doacao` WRITE;
/*!40000 ALTER TABLE `transacoes_doacao` DISABLE KEYS */;
INSERT INTO `transacoes_doacao` VALUES (1,NULL,1,0,NULL,'2015-07-28 17:45:56');
/*!40000 ALTER TABLE `transacoes_doacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transacoes_status`
--

DROP TABLE IF EXISTS `transacoes_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transacoes_status` (
  `Codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacoes_status`
--

LOCK TABLES `transacoes_status` WRITE;
/*!40000 ALTER TABLE `transacoes_status` DISABLE KEYS */;
INSERT INTO `transacoes_status` VALUES (1,'Nova','2015-07-28 04:50:51'),(2,'Pendente de pagamento','2015-07-28 04:50:51'),(3,'Pagamento efetuado','2015-07-28 04:50:51'),(4,'Cancelada','2015-07-28 04:50:51'),(5,'Time out de pagamento','2015-07-28 04:50:51');
/*!40000 ALTER TABLE `transacoes_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transacoes_status_historico`
--

DROP TABLE IF EXISTS `transacoes_status_historico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transacoes_status_historico` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoTransacao` bigint(20) NOT NULL,
  `CodigoStatusTransacaoSP` smallint(6) DEFAULT NULL,
  `CodigoStatusTransacao` smallint(6) NOT NULL,
  `XMLRetorno` text,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Codigo`),
  KEY `fk_transacoes_status_hct` (`CodigoTransacao`),
  KEY `fk_transacoes_status_historico_cst` (`CodigoStatusTransacao`),
  CONSTRAINT `fk_transacoes_status_hct` FOREIGN KEY (`CodigoTransacao`) REFERENCES `transacoes_doacao` (`Codigo`),
  CONSTRAINT `fk_transacoes_status_historico_cst` FOREIGN KEY (`CodigoStatusTransacao`) REFERENCES `transacoes_status` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacoes_status_historico`
--

LOCK TABLES `transacoes_status_historico` WRITE;
/*!40000 ALTER TABLE `transacoes_status_historico` DISABLE KEYS */;
INSERT INTO `transacoes_status_historico` VALUES (1,2,0,1,'<?xml version=\"1.0\" encoding=\"ISO-8859-1\" standalone=\"yes\"?><errors><error><code>13003</code><message>invalid transactionCode value: notifications</message></error></errors>','2015-07-29 18:47:04');
/*!40000 ALTER TABLE `transacoes_status_historico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transacoes_usuario_dado`
--

DROP TABLE IF EXISTS `transacoes_usuario_dado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transacoes_usuario_dado` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoTransacao` bigint(20) NOT NULL,
  `CodigoAssociado` int(11) DEFAULT NULL,
  `CPF` char(11) DEFAULT NULL,
  `CNPJ` varchar(14) DEFAULT NULL,
  `CodigoTipoDoacao` smallint(6) DEFAULT NULL,
  `ValorDoacao` decimal(10,2) DEFAULT NULL,
  `CodigoEscolaridadeTipo` smallint(6) DEFAULT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL,
  `Cidade` varchar(100) DEFAULT NULL,
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_transacao_usuario_dado` (`CodigoTransacao`),
  KEY `fk_transacao_usuario_dado_associado` (`CodigoAssociado`),
  CONSTRAINT `fk_transacao_usuario_dado` FOREIGN KEY (`CodigoTransacao`) REFERENCES `transacoes_doacao` (`Codigo`),
  CONSTRAINT `fk_transacao_usuario_dado_associado` FOREIGN KEY (`CodigoAssociado`) REFERENCES `associados` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacoes_usuario_dado`
--

LOCK TABLES `transacoes_usuario_dado` WRITE;
/*!40000 ALTER TABLE `transacoes_usuario_dado` DISABLE KEYS */;
INSERT INTO `transacoes_usuario_dado` VALUES (1,1,3,'22211122233',NULL,6,10.00,2,'Teste Campos','teste@teste.com','SP','Osasco','2015-07-28 17:45:56',NULL);
/*!40000 ALTER TABLE `transacoes_usuario_dado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_admin`
--

DROP TABLE IF EXISTS `usuarios_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_admin` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Login` varchar(100) NOT NULL,
  `Senha` varchar(500) NOT NULL,
  `UltimoAcesso` datetime DEFAULT NULL,
  `ChaveTrocaSenha` varchar(100) DEFAULT NULL,
  `Bloqueado` bit(1) DEFAULT NULL,
  `Ativo` bit(1) NOT NULL DEFAULT b'1',
  `Criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_admin`
--

LOCK TABLES `usuarios_admin` WRITE;
/*!40000 ALTER TABLE `usuarios_admin` DISABLE KEYS */;
INSERT INTO `usuarios_admin` VALUES (16,'Usuário de teste Mota','teste','$2y$10$y5HQ0WuKhTfcXLrbmqyzCun7Glq5u89c.f12sn5XorCWNzIWo2e5y','2020-11-30 13:11:53',NULL,NULL,'','2018-04-17 19:33:12','2020-11-30 13:11:53');
/*!40000 ALTER TABLE `usuarios_admin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-04 17:13:52
