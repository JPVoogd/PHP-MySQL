# ************************************************************
# Sequel Ace SQL dump
# Version 20064
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 8.3.0)
# Database: eindopdracht
# Generation Time: 2024-03-28 08:44:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table account
# ------------------------------------------------------------

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `account_id` int NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;

INSERT INTO `account` (`account_id`, `email`, `password`, `role`)
VALUES
	(1,'user1@gmail.com','password','user'),
	(2,'user2@gmail.com','password','user'),
	(3,'user3@gmail.com','password','user'),
	(4,'user4@gmail.com','password','user'),
	(5,'user5@gmail.com','password','user'),
	(6,'user6@gmail.com','password','user'),
	(7,'admin1@gmail.com','password','admin');

/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table discount
# ------------------------------------------------------------

DROP TABLE IF EXISTS `discount`;

CREATE TABLE `discount` (
  `discount_id` int NOT NULL,
  `membership` varchar(255) DEFAULT NULL,
  `discount` int DEFAULT NULL,
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `discount` WRITE;
/*!40000 ALTER TABLE `discount` DISABLE KEYS */;

INSERT INTO `discount` (`discount_id`, `membership`, `discount`)
VALUES
	(1,'Youth',50),
	(2,'Aspirant',40),
	(3,'Junior',25),
	(4,'Senior',0),
	(5,'mature',45);

/*!40000 ALTER TABLE `discount` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table family
# ------------------------------------------------------------

DROP TABLE IF EXISTS `family`;

CREATE TABLE `family` (
  `family_id` int NOT NULL,
  `family_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`family_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `family` WRITE;
/*!40000 ALTER TABLE `family` DISABLE KEYS */;

INSERT INTO `family` (`family_id`, `family_name`, `address`)
VALUES
	(1,'Family1','Adress 1, 1111AA, Amsterdam'),
	(2,'Family2','Adress 2, 2222AA, Amsterdam'),
	(3,'Family3','Adress 3, 3333AA, Amsterdam');

/*!40000 ALTER TABLE `family` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table family_member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `family_member`;

CREATE TABLE `family_member` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `family_id` int DEFAULT NULL,
  `member` int DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `account_id` int DEFAULT NULL,
  `payments` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `family_id` (`family_id`),
  KEY `member` (`member`),
  KEY `discount` (`discount`),
  KEY `account_id` (`account_id`),
  KEY `payments` (`payments`),
  CONSTRAINT `family_member_ibfk_1` FOREIGN KEY (`family_id`) REFERENCES `family` (`family_id`),
  CONSTRAINT `family_member_ibfk_2` FOREIGN KEY (`member`) REFERENCES `member` (`member_id`),
  CONSTRAINT `family_member_ibfk_3` FOREIGN KEY (`discount`) REFERENCES `discount` (`discount_id`),
  CONSTRAINT `family_member_ibfk_4` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  CONSTRAINT `family_member_ibfk_5` FOREIGN KEY (`payments`) REFERENCES `payments` (`payments_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `family_member` WRITE;
/*!40000 ALTER TABLE `family_member` DISABLE KEYS */;

INSERT INTO `family_member` (`id`, `name`, `birthday`, `family_id`, `member`, `discount`, `account_id`, `payments`)
VALUES
	(1,'User1','1994-02-09',1,1,1,1,1),
	(2,'User2','1996-05-11',1,2,2,2,1),
	(3,'User3','1997-02-10',2,3,3,3,1),
	(4,'User4','1983-12-24',2,1,4,4,1),
	(5,'User5','2004-06-05',3,2,1,5,1),
	(6,'User6','2013-09-28',3,3,5,6,1);

/*!40000 ALTER TABLE `family_member` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table financial_year
# ------------------------------------------------------------

DROP TABLE IF EXISTS `financial_year`;

CREATE TABLE `financial_year` (
  `financial_id` int NOT NULL,
  `year` int DEFAULT NULL,
  PRIMARY KEY (`financial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `financial_year` WRITE;
/*!40000 ALTER TABLE `financial_year` DISABLE KEYS */;

INSERT INTO `financial_year` (`financial_id`, `year`)
VALUES
	(1,2024),
	(2,2023),
	(3,2022),
	(4,2021),
	(5,2020);

/*!40000 ALTER TABLE `financial_year` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `member_id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;

INSERT INTO `member` (`member_id`, `description`)
VALUES
	(1,'Regular member'),
	(2,'Honor member'),
	(3,'Student member');

/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `payments_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `financial_year` int DEFAULT NULL,
  PRIMARY KEY (`payments_id`),
  KEY `financial_year` (`financial_year`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`financial_year`) REFERENCES `financial_year` (`financial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;

INSERT INTO `payments` (`payments_id`, `user_id`, `amount`, `financial_year`)
VALUES
	(1,1,100,1),
	(2,1,100,2),
	(3,1,100,3),
	(4,1,100,4),
	(5,1,100,5),
	(6,2,100,2),
	(7,2,100,3),
	(8,2,100,4),
	(9,2,100,5);

/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
