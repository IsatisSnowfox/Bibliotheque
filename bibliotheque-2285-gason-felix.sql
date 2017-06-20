-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: bibliotheque
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `author_book`
--

DROP TABLE IF EXISTS `author_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author_book` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `fk_author_id` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  CONSTRAINT `fk_book_id` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author_book`
--

LOCK TABLES `author_book` WRITE;
/*!40000 ALTER TABLE `author_book` DISABLE KEYS */;
INSERT INTO `author_book` VALUES (27,8,42),(28,9,43),(29,9,44),(30,1,45),(31,1,46),(32,1,47),(33,2,48),(34,3,49),(35,4,50),(36,5,51),(37,6,52),(38,27,53),(39,32,54),(40,30,55),(42,28,57);
/*!40000 ALTER TABLE `author_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `datebirth` date NOT NULL,
  `datedeath` date DEFAULT NULL,
  `bio` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'J.K. Rowling',NULL,'1965-07-31',NULL,'Rowling was born to Peter James Rowling, a Rolls-Royce aircraft engineer, and Anne Rowling (née Volant), a science technician, on 31 July 1965 in Yate, Gloucestershire, England, 10 miles (16 km) northeast of Bristol. Her parents first met on a train departing from King\'s Cross Station bound for Arbroath in 1964. They married on 14 March 1965. One of her maternal great-grandfathers, Dugald Campbell, was Scottish, born in Lamlash on the Isle of Arran. Her mother\'s paternal grandfather, Louis Volant, was French, and was awarded the Croix de Guerre for exceptional bravery in defending the village of Courcelles-le-Comte during the First World War. Rowling originally believed he had won the Légion d\'honneur during the war, as she said when she received it herself in 2009. She later discovered the truth when featured in an episode of the UK genealogy series Who Do You Think You Are?, in which she found out it was a different Louis Volant who won the Legion of Honour. When she heard his story of bravery and discovered the croix de guerre was for \"ordinary\" soldiers like her grandfather, who had been a waiter, she stated the croix de guerre was \"better\" to her than the Legion of Honour.','2016-11-09 11:01:13','2017-05-18 08:36:48',NULL),(2,'John Green',NULL,'1977-08-24',NULL,'John Michael Green (born August 24, 1977) is an American author, vlogger, writer, producer, actor and editor. He won the 2006 Printz Award for his debut novel, Looking for Alaska, and his sixth novel, The Fault in Our Stars, debuted at number one on The New York Times Best Seller list in January 2012. The 2014 film adaptation opened at number one on the box office. In 2014, Green was included in Time magazine\'s list of The 100 Most Influential People in the World. Another film based on a Green novel, Paper Towns, was released on July 24, 2015.','2016-11-09 11:01:13','2017-05-18 08:36:48',NULL),(3,'George R.R. Martin',NULL,'1948-09-20',NULL,'George Raymond Richard Martin (born George Raymond Martin; September 20, 1948), often referred to as GRRM, is an American novelist and short-story writer in the fantasy, horror, and science fiction genres, a screenwriter, and television producer. He is best known for his international bestselling series of epic fantasy novels, A Song of Ice and Fire, which was later adapted into the HBO dramatic series Game of Thrones.','2016-11-09 11:01:13','2017-05-18 08:36:48',NULL),(4,'Isaac Asimov',NULL,'1920-01-02','1992-04-06','Born on January 2, 1920 in Russia, Isaac Asimov was an American writer specializing in the genre of science fiction. He is considered one of the three great masters of science fiction and remained a significant figure of science fiction for over five decades. Also a professor of biochemistry at Boston University, Isaac Asimov has over 500 published volumes in addition to 90,000 letters, postcards and other scientific books for laymen.','2016-11-09 11:01:13','2017-05-18 08:36:48',NULL),(5,'Dan Brown',NULL,'1964-06-22',NULL,'Daniel Gerhard \"Dan\" Brown (born June 22, 1964) is an American author of thriller fiction who is best known for the 2003 bestselling novel The Da Vinci Code. Brown\'s novels are treasure hunts set in a 24-hour period, and feature the recurring themes of cryptography, keys, symbols, codes, and conspiracy theories. His books have been translated into 52 languages, and as of 2012, sold over 200 million copies. Three of them, Angels & Demons (2000), The Da Vinci Code (2003), and Inferno (2013), have been adapted into films.','2016-11-09 11:08:28','2017-05-18 08:36:48',NULL),(6,'Terry Pratchett',NULL,'1948-04-28','2015-03-12','Sir Terence David John \"Terry\" Pratchett, OBE (28 April 1948 – 12 March 2015) was an English author of fantasy novels, especially comical works. He is best known for his Discworld series of 41 novels. Pratchett\'s first novel, The Carpet People, was published in 1971. The first Discworld novel, The Colour of Magic, was published in 1983, after which he wrote two books a year on average. His 2011 Discworld novel Snuff was at the time of its release the third-fastest-selling hardback adult-readership novel since records began in the UK, selling 55,000 copies in the first three days. His final Discworld novel, The Shepherd\'s Crown, was published in August 2015, five months after his death.','2016-11-09 11:08:28','2017-05-18 08:36:48',NULL),(8,'J.R.R. Tolkien',NULL,'1892-01-03','1973-09-02','During his life in retirement, from 1959 up to his death in 1973, Tolkien received steadily increasing public attention and literary fame. The sales of his books were so profitable that he regretted that he had not chosen early retirement. At first, he wrote enthusiastic answers to readers\' enquiries, but he became increasingly unhappy about the sudden popularity of his books with the 1960s counter-culture movement.[86] In a 1972 letter, he deplored having become a cult-figure, but admitted that \"even the nose of a very modest idol ... cannot remain entirely untickled by the sweet smell of incense!\"','2016-11-09 11:08:28','2017-05-18 08:36:48',NULL),(9,'Georges Orwell',NULL,'1903-06-25','1950-01-21','George Orwell, particularly known as a novelist was an avid follower of politics who voiced his intense dislike against totalitarianism through his most famed works Animal farm (1945) and 1984 (1949). These two novels are the main contributions to Orwell’s esteemed reputation as an exceptional writer. However, during the course of his career, Orwell was recognized for his remarkable journalism and essays that seem to be written for modern times years ago. The famously brilliant six rules for writers by George Orwell are used even today as a basic key to better writing by writers all over the world.','2016-11-09 11:12:34','2017-05-18 08:36:48',NULL),(27,'StÃ©phanie Cloutier',NULL,'1995-01-11',NULL,NULL,'2017-06-17 14:21:13',NULL,NULL),(28,'FÃ©lix Gason',NULL,'1994-11-29',NULL,NULL,'2017-06-17 14:22:21',NULL,NULL),(29,'Jacques',NULL,'2000-04-01',NULL,NULL,'2017-06-17 14:23:52',NULL,NULL),(30,'Anne-Claire Julemont',NULL,'1966-06-24',NULL,NULL,'2017-06-18 10:03:00',NULL,NULL),(31,'Jannie',NULL,'2012-12-12',NULL,'Elle est jolie','2017-06-18 13:52:36',NULL,NULL),(32,'Jeanne DeLespace',NULL,'1990-01-21','2010-01-21','Elle est morte Ã  20 ans.','2017-06-18 13:54:38',NULL,NULL),(34,'Le super cool',NULL,'2010-10-10',NULL,'Salut','2017-06-20 19:53:07',NULL,NULL),(35,'Je Suis un Concombre',NULL,'1515-12-15',NULL,NULL,'2017-06-20 20:07:54',NULL,NULL);
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `front_cover` varchar(255) DEFAULT NULL,
  `summary` text,
  `isbn` varchar(255) NOT NULL,
  `npages` int(11) DEFAULT NULL,
  `datepub` date DEFAULT NULL,
  `language_id` int(10) NOT NULL,
  `genre_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn` (`isbn`),
  KEY `language_id` (`language_id`),
  KEY `genre_id` (`genre_id`),
  CONSTRAINT `fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  CONSTRAINT `fk_language_id` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (42,'Le seigneur des anneaux',NULL,'C\'est un chouette film aussi','9037827934',900,NULL,1,11,'2017-06-20 15:42:31','2017-06-20 18:18:01',NULL),(43,'La Vache enragÃ©e',NULL,NULL,'2851841327',333,'1935-01-01',2,1,'2017-06-20 17:05:03','2017-06-20 18:28:09',NULL),(44,'Animal Farm',NULL,NULL,'2851841203',NULL,'1981-01-01',1,1,'2017-06-20 17:06:01',NULL,NULL),(45,'Harry Potter et la Coupe de Feu',NULL,'Harry Potter a quatorze ans et entre en quatriÃ¨me annÃ©e au collÃ¨ge de Poudlard. Une grande nouvelle attend Harry, Ron et Hermione Ã  leur arrivÃ©e : la tenue d\'un tournoi de magie exceptionnel entre les plus cÃ©lÃ¨bres Ã©coles de sorcellerie. DÃ©jÃ  les dÃ©lÃ©gations Ã©trangÃ¨res font leur entrÃ©e. Harry se rÃ©jouit... Trop vite. Il va se trouver plongÃ© au cÅ“ur des Ã©vÃ¨nements les plus dramatiques qu\'il ait jamais eu Ã  affronter. ','2070643050',784,NULL,1,11,'2017-06-20 17:07:06','2017-06-20 17:10:18',NULL),(46,'Harry Potter et l\'Ordre du PhÃ©nix',NULL,'Ã€ quinze ans, Harry entre en cinquiÃ¨me annÃ©e Ã  Poudlard mais il n\'a jamais Ã©tÃ© aussi anxieux. L\'adolescence, la perspective des examens et ces Ã©tranges cauchemars... Car Celui-Dont-On-Ne-Doit-Pas-Prononcer-Le-Nom est de retour. Le ministÃ¨re de la Magie ne semble pas prendre cette menace au sÃ©rieux, contrairement Ã  Dumbledore, le directeur du collÃ¨ge de Poudlard. La rÃ©sistance s\'organise alors autour de Harry qui va devoir compter sur le courage et la fidÃ©litÃ© de ses amis de toujours... ','9782070643066',1036,NULL,2,11,'2017-06-20 17:07:44',NULL,NULL),(47,'Harry Potter et le Prince de Sang-MÃªlÃ©',NULL,'Dans un monde de plus en plus inquiÃ©tant, Harry se prÃ©pare Ã  retrouver Ron et Hermione. BientÃ´t, ce sera la rentrÃ©e Ã  Poudlard, avec les autres Ã©tudiants de sixiÃ¨me annÃ©e. Mais pourquoi Dumbledore vient-il en personne chercher Harry chez les Dursley ? Dans quels extraordinaires voyages au cÅ“ur de la mÃ©moire va-t-il l\'entraÃ®ner ? ','9782070643073',756,NULL,1,11,'2017-06-20 17:08:29',NULL,NULL),(48,'Nos Ã©toiles contraires',NULL,'Hazel, 16 ans, est atteinte d\'un cancer. Son dernier traitement semble avoir arrÃªtÃ© l\'Ã©volution de la maladie, mais elle se sait condamnÃ©e. Bien qu\'elle s\'y ennuie passablement, elle intÃ¨gre un groupe de soutien, frÃ©quentÃ© par d\'autres jeunes malades. C\'est lÃ  qu\'elle rencontre Augustus, un garÃ§on en rÃ©mission, qui partage son humour et son goÃ»t de la littÃ©rature.\r\nEntre les deux adolescents, l\'attirance est immÃ©diate. Et malgrÃ© les rÃ©ticences d\'Hazel, qui a peur de s\'impliquer dans une relation dont le temps est comptÃ©, leur histoire d\'amour commence... les entraÃ®nant vite dans un projet un peu fou, ambitieux, drÃ´le et surtout plein de vie.\r\n.','2092543032',336,NULL,1,1,'2017-06-20 18:19:51',NULL,NULL),(49,'A Game of Thrones',NULL,NULL,'0553103547',NULL,NULL,1,11,'2017-06-20 18:21:24',NULL,NULL),(50,'Le cycle des robots I',NULL,NULL,'2290055956',NULL,NULL,2,1,'2017-06-20 18:22:14',NULL,NULL),(51,'Da Vinci Code',NULL,NULL,'2253001171',NULL,NULL,2,1,'2017-06-20 18:22:48',NULL,NULL),(52,'Les zinzins d\'Olive Oued',NULL,NULL,'2266111965',NULL,NULL,2,11,'2017-06-20 18:23:32',NULL,NULL),(53,'Rien du tout',NULL,'Non mais je n\'ai jamais Ã©crit de livre moi !','9378493820',NULL,NULL,2,1,'2017-06-20 18:24:14',NULL,NULL),(54,'Fluflu',NULL,NULL,'3238920138',NULL,NULL,2,4,'2017-06-20 18:24:56',NULL,NULL),(55,'Les petits chatons roses',NULL,NULL,'4930278847',NULL,NULL,2,3,'2017-06-20 18:25:16',NULL,NULL),(57,'Bonjour',NULL,'Il est nÃ©.','1234569870',39,NULL,2,1,'2017-06-20 19:39:11','2017-06-20 19:52:30',NULL);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'Fiction',NULL,'2016-11-09 10:48:31','2017-06-17 13:43:05',NULL),(2,'Comedy',NULL,'2016-11-09 10:48:31','2017-06-17 13:43:05',NULL),(3,'Drama',NULL,'2016-11-09 10:48:31','2017-06-17 13:43:05',NULL),(4,'Horror',NULL,'2016-11-09 10:48:31','2017-06-17 13:43:05',NULL),(5,'Non fiction',NULL,'2016-11-09 10:48:31','2017-06-17 13:43:05',NULL),(6,'Realistic fiction',NULL,'2016-11-09 10:48:31','2017-06-17 13:43:05',NULL),(7,'Romance',NULL,'2016-11-09 10:48:31','2017-06-17 13:43:05',NULL),(8,'Satire',NULL,'2016-11-09 10:48:31','2017-06-17 13:43:05',NULL),(9,'Tragedy',NULL,'2016-11-09 10:48:31','2017-06-17 13:43:05',NULL),(10,'Tragic comedy',NULL,'2016-11-09 10:48:31','2017-06-17 13:43:05',NULL),(11,'Fantasy',NULL,'2016-11-09 10:48:31','2017-06-17 13:43:05',NULL);
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'en','Anglais','2016-11-09 13:23:13','2017-06-20 13:03:52',NULL),(2,'fr','Français','2016-11-09 13:23:13','2017-06-17 14:26:59',NULL);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Cloutier','Stéphanie','stephclou4@gmail.com','0487204373','967520ae23e8ee14888bae72809031b98398ae4a636773e18fff917d77679334',1,'2016-11-09 10:44:19','2017-05-18 07:09:10',NULL),(2,'Gason','Félix','felix.gason@gmail.com',NULL,'9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08',0,'2016-11-09 10:44:19','2017-05-18 08:20:01',NULL),(3,'Marli','Marvin','marvin.marli@student.hepl.be',NULL,'',0,'2016-11-09 13:24:48',NULL,NULL),(4,'Müller','Cédric','cedric.muller@student.hepl.be',NULL,'',0,'2016-11-09 13:24:48',NULL,NULL),(5,'Admin','Admin','admin@admin.com',NULL,'8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918',0,'2017-06-20 16:50:07','2017-06-20 18:47:48',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-20 20:20:08
