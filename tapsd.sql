/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.24-MariaDB : Database - tapsd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tapsd` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `tapsd`;

/*Table structure for table `eventos` */

DROP TABLE IF EXISTS `eventos`;

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `inicio` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `final` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clase` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `eventos` */

insert  into `eventos`(`id`,`inicio`,`final`,`nombre`,`clase`,`url`) values 
(300,'1363155300000','1363302000000','Event 4','event-warning','https://www.marca.com/'),
(302,'1362870000000','1363302000000','Event 3','event-warning','https://www.marca.com/');

/*Table structure for table `mensajes` */

DROP TABLE IF EXISTS `mensajes`;

CREATE TABLE `mensajes` (
  `mensaje` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `id_autor` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_receptor` char(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`fecha`,`id_autor`,`id_receptor`),
  KEY `FK_mensajes_tecnicoAutor` (`id_autor`),
  KEY `FK_mensajes_tecnicoReceptor` (`id_receptor`),
  CONSTRAINT `FK_mensajes_tecnicoAutor` FOREIGN KEY (`id_autor`) REFERENCES `tecnico` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_mensajes_tecnicoReceptor` FOREIGN KEY (`id_receptor`) REFERENCES `tecnico` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `mensajes` */

/*Table structure for table `tecnico` */

DROP TABLE IF EXISTS `tecnico`;

CREATE TABLE `tecnico` (
  `email` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_1` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_2` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` char(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `token` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `token_date` datetime DEFAULT NULL,
  `primer_login` tinyint(1) DEFAULT 0,
  `admin` tinyint(1) DEFAULT 0,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `provincia` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `avatar` blob DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tecnico` */

insert  into `tecnico`(`email`,`pass`,`nombre`,`apellido_1`,`apellido_2`,`telefono`,`token`,`token_date`,`primer_login`,`admin`,`ciudad`,`provincia`,`avatar`) values 
('admin@admin','$2y$10$bo2NlHA8E5wAFZzq3.z.0uWGTxDh9QRdlcE6KOgA7JmNiTeaslcJi',NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL),
('tomas@prueba','$2y$10$w7H0v1iocAWP/rHEAOhNoenNai8ue2bs74UVU3Z/zpgW7W.m24wQy',NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_1` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_2` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `f_nacimiento` date DEFAULT NULL,
  `obervaciones` tinytext COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuario` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
