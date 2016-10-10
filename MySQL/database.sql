/*DROP DATABASE `bd_Travail3`;*/
CREATE DATABASE  IF NOT EXISTS `bd_Travail3` default CHARACTER SET utf8 COLLATE utf8_general_ci; 
USE `bd_Travail3`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: bd_mondial
-- ------------------------------------------------------
-- Server version	5.5.25

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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

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
-- Table structure for table `tbl_ville`
--

DROP TABLE IF EXISTS `tbl_Membre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_Membre` (
  `no_membre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_membre` varchar(35) DEFAULT NULL,
  `prenom_membre` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `pseudonyme` varchar(35) NOT NULL,
   `password_membre` varchar(35) NOT NULL,
  PRIMARY KEY (`no_membre`)
  ) ENGINE=InnoDB AUTO_INCREMENT=4096  DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_Membre`
--

LOCK TABLES `tbl_Membre` WRITE;
/*!40000 ALTER TABLE `tbl_Membre` DISABLE KEYS */;
INSERT INTO `tbl_Membre` ( `nom_membre`, `prenom_membre`, `email`, `pseudonyme`, `password_membre`)
 VALUES ('Veilleux','Alex','alex@hotmail.com', 'aveilleux','123'),
		('Harvey','Vincent','vincent@hotmail.com', 'vharvey','456'),
        ('Bob','Billy','bob@hotmail.com', 'bbob','123'),
        ('Harvey','Burger','harveyzburger@hotmail.com', 'HarveyzBurger','abcde');
 /*!40000 ALTER TABLE `tbl_Membre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pays`
--

DROP TABLE IF EXISTS `tbl_categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_categorie` (
  `no_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(35) NOT NULL,
  PRIMARY KEY (`no_categorie`)
  ) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categorie`
--

LOCK TABLES `tbl_categorie` WRITE;
/*!40000 ALTER TABLE `tbl_categorie` DISABLE KEYS */;
INSERT INTO `tbl_categorie` (`nom_categorie`)
 VALUES ('Sport'),
		('Game'),
        ('Montagne');
 /*!40000 ALTER TABLE `tbl_categorie` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `tbl_pays`
--

DROP TABLE IF EXISTS `tbl_pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pays` (
  `no_pays` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pays` varchar(35) NOT NULL,
  PRIMARY KEY (`no_pays`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Dumping data for table `tbl_pays`
--

LOCK TABLES `tbl_pays` WRITE;
/*!40000 ALTER TABLE `tbl_pays` DISABLE KEYS */;
INSERT INTO `tbl_pays` (`nom_pays`)
 VALUES ('Canada'),
		('Etat-Unis'),
        ('France');/*!40000 ALTER TABLE `tbl_pays` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `tbl_paysage`
--

DROP TABLE IF EXISTS `tbl_paysage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_paysage` (
  `no_paysage` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(35) NOT NULL,
  `image` varchar(35) NOT NULL,
  `no_membre` int(11) NOT NULL,
  `no_pays` int(11) NOT NULL,
  PRIMARY KEY (`no_paysage`),
  CONSTRAINT `fk_pays` FOREIGN KEY (`no_pays`) REFERENCES `tbl_pays` (`no_pays`), /*ON UPDATE CASCADE*/
  CONSTRAINT `fk_membrepaysage` FOREIGN KEY (`no_membre`) REFERENCES `tbl_membre` (`no_membre`) /*ON UPDATE CASCADE*/
  )ENGINE=InnoDB AUTO_INCREMENT=2048 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_paysage`
--

LOCK TABLES `tbl_paysage` WRITE;
/*!40000 ALTER TABLE `tbl_paysage` DISABLE KEYS */;
INSERT INTO `tbl_paysage` (`description`, `image`, `no_membre`,`no_pays`)
 VALUES ('Hockey','hockey.png','4096','1'),
		('Football','football.png','4097','2'),
        ('Mont-Orignal','orignal.png','4098','1'),
        ('Chat','chat.jpg','4099','1'),
        ('Chien','chien.jpg','4098','1'),
        ('Fond','fond.jpg','4097','1'),
        ('Pays','pays.jpg','4096','1'),
        ('Ville','ville.jpg','4099','1');
 /*!40000 ALTER TABLE `tbl_paysage` ENABLE KEYS */;
UNLOCK TABLES;






--
-- Table structure for table `tbl_categoriepaysage`
--

DROP TABLE IF EXISTS `tbl_like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_like` (
  `no_membre` int(11) NOT NULL ,
  `no_paysage` int(11) NOT NULL,
  PRIMARY KEY (`no_membre`,`no_paysage`),
  CONSTRAINT `fk_membrelike` FOREIGN KEY (`no_membre`) REFERENCES `tbl_Membre` (`no_membre`), /*ON UPDATE CASCADE*/
  CONSTRAINT `fk_paysagelike` FOREIGN KEY (`no_paysage`) REFERENCES `tbl_paysage` (`no_paysage`) /*ON UPDATE CASCADE*/
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Dumping data for table `tbl_categoriepaysage`
--

LOCK TABLES `tbl_like` WRITE;
/*!40000 ALTER TABLE `tbl_like` DISABLE KEYS */;
INSERT INTO `tbl_like` (`no_membre`,`no_paysage`)
 VALUES (4096,2048),
		(4097,2049),
        (4098,2050),
        (4096,2050),
        (4097,2050),
        (4096,2049),
        (4098,2048),
        (4098,2051),
        (4096,2052),
        (4097,2053),
        (4096,2054),
        (4098,2055);
        /*!40000 ALTER TABLE `tbl_like` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `tbl_categoriepaysage`
--

DROP TABLE IF EXISTS `tbl_categoriepaysage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_categoriepaysage` (
  `no_categorie` int(11) NOT NULL ,
  `no_paysage` int(11) NOT NULL,
  PRIMARY KEY (`no_categorie`,`no_paysage`),
  CONSTRAINT `fk_categorie` FOREIGN KEY (`no_categorie`) REFERENCES `tbl_categorie` (`no_categorie`) /*ON UPDATE CASCADE*/,
  CONSTRAINT `fk_paysage` FOREIGN KEY (`no_paysage`) REFERENCES `tbl_paysage` (`no_paysage`) /*ON UPDATE CASCADE*/
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Dumping data for table `tbl_categoriepaysage`
--

LOCK TABLES `tbl_categoriepaysage` WRITE;
/*!40000 ALTER TABLE `tbl_categoriepaysage` DISABLE KEYS */;
INSERT INTO `tbl_categoriepaysage` (`no_categorie`,`no_paysage`)
 VALUES (1,2048),
		(2,2049),
        (3,2050),
		(1,2051),
        (2,2052),
		(3,2053),
		(1,2054),
        (2,2055);
        /*!40000 ALTER TABLE `tbl_categoriepaysage` ENABLE KEYS */;
UNLOCK TABLES;

/*Procédures stockées*/

delimiter #
create procedure MostLike()
begin
select description, image, tbl_like.no_paysage, count(tbl_like.no_paysage) as nbreLiked 
from tbl_like
inner join tbl_paysage 
on tbl_like.no_paysage = tbl_paysage.no_paysage 
group by tbl_like.no_paysage 
order by nbreLiked DESC limit 10;
end #

delimiter #
create procedure AllPict(in Categorie int(5))
begin
select description, image, tbl_paysage.no_paysage, count(tbl_like.no_paysage) as nbreLiked 
from tbl_like
right outer join tbl_paysage 
on tbl_like.no_paysage = tbl_paysage.no_paysage 
inner join tbl_categoriepaysage
on tbl_paysage.no_paysage = tbl_categoriepaysage.no_paysage
where tbl_categoriepaysage.no_categorie = Categorie
group by tbl_paysage.no_paysage
order by nbreLiked DESC;
end #

delimiter #
create procedure Pictures()
begin
select description, image, tbl_paysage.no_paysage, count(tbl_like.no_paysage) as nbreLiked 
from tbl_like
right outer join tbl_paysage 
on tbl_like.no_paysage = tbl_paysage.no_paysage 
group by tbl_paysage.no_paysage
order by nbreLiked DESC;
end #

delimiter #
create procedure ButtonLike(in NoEmp int(5), in NoPict int(5))
begin
select no_membre from tbl_like where no_paysage = NoPict and no_membre = NoEmp;
end #

delimiter #
create procedure Liked(in NoEmp int(5), in NoPict int(5))
begin
delete from tbl_like where no_paysage = NoPict and no_membre = NoEmp;
end #

delimiter #
create procedure Dislike(in NoEmp int(5), in NoPict int(5))
begin
INSERT INTO `tbl_like` (`no_membre`, `no_paysage`)
value (NoEmp, NoPict);
end #

delimiter #
create procedure Last3Like(in NoEmp int(5))
begin 
select tbl_paysage.no_paysage, description, image, tbl_like.no_membre
from tbl_like
inner join tbl_paysage
on tbl_like.no_paysage = tbl_paysage.no_paysage
where tbl_like.no_membre = NoEmp
group by tbl_paysage.no_membre
order by tbl_paysage.no_paysage DESC limit 3;
end #

delimiter $$
CREATE PROCEDURE Add_Membre(Nom Varchar(35),Prenom Varchar(35),Email Varchar(35),Pseudo Varchar(35),Passe Varchar(35))
begin
INSERT INTO tbl_membre (`nom_membre`,`prenom_membre`,`email`,`pseudonyme`,`password_membre`)
values(Nom,Prenom,Email,Pseudo,Passe);
end $$


SET SQL_SAFE_UPDATES = 0;
delimiter ||
CREATE PROCEDURE Changer_Password(VEmail Varchar(35),Passe Varchar(35))
begin
UPDATE tbl_membre
set password_membre = Passe
where email = VEmail;
end ||


SET SQL_SAFE_UPDATES = 0;
delimiter ||
CREATE PROCEDURE Changer_Nom(VEmail Varchar(35), Nom varchar(35), Prenom varchar(35))
begin
UPDATE tbl_membre
set prenom_membre = Prenom, nom_membre = Nom
where email = VEmail;
end ||


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-06 17:39:02
