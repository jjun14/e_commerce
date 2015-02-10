CREATE DATABASE  IF NOT EXISTS `e_commerce` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e_commerce`;
-- MySQL dump 10.13  Distrib 5.5.24, for osx10.5 (i386)
--
-- Host: 127.0.0.1    Database: e_commerce
-- ------------------------------------------------------
-- Server version	5.5.38

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
-- Table structure for table `billings`
--

DROP TABLE IF EXISTS `billings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `zipcodes_id` int(11) NOT NULL,
  `states_id` int(11) NOT NULL,
  `cities_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_billings_zipcodes1_idx` (`zipcodes_id`),
  KEY `fk_billings_states1_idx` (`states_id`),
  KEY `fk_billings_cities1_idx` (`cities_id`),
  CONSTRAINT `fk_billings_zipcodes1` FOREIGN KEY (`zipcodes_id`) REFERENCES `zipcodes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_billings_states1` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_billings_cities1` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billings`
--

LOCK TABLES `billings` WRITE;
/*!40000 ALTER TABLE `billings` DISABLE KEYS */;
/*!40000 ALTER TABLE `billings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_carts_users1_idx` (`user_id`),
  CONSTRAINT `fk_carts_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts_have_products`
--

DROP TABLE IF EXISTS `carts_have_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts_have_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_carts_has_products_products1_idx` (`product_id`),
  KEY `fk_carts_has_products_carts1_idx` (`cart_id`),
  CONSTRAINT `fk_carts_has_products_carts1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_carts_has_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts_have_products`
--

LOCK TABLES `carts_have_products` WRITE;
/*!40000 ALTER TABLE `carts_have_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts_have_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Music','2015-02-09 00:00:00','0000-00-00 00:00:00'),(2,'Business','2015-02-09 00:00:00',NULL),(3,'Sports','2015-02-09 00:00:00',NULL),(4,'Fashion','2015-02-09 00:00:00',NULL),(5,'Men\'s Interest','2015-02-09 00:00:00',NULL),(6,'Women\'s Interest','2015-02-09 00:00:00',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_types`
--

DROP TABLE IF EXISTS `image_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_types`
--

LOCK TABLES `image_types` WRITE;
/*!40000 ALTER TABLE `image_types` DISABLE KEYS */;
INSERT INTO `image_types` VALUES (1,'main'),(2,'normal');
/*!40000 ALTER TABLE `image_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `image_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_products_idx` (`product_id`),
  KEY `fk_images_image_types1_idx` (`image_type_id`),
  CONSTRAINT `fk_images_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_images_image_types1` FOREIGN KEY (`image_type_id`) REFERENCES `image_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'https://s3-us-west-1.amazonaws.com/cdecommerce/soccer.png','2015-02-09 12:57:18','2015-02-09 12:57:18',1,1),(2,'https://s3-us-west-1.amazonaws.com/cdecommerce/soccer.png','2015-02-09 12:57:37','2015-02-09 12:57:37',8,1),(3,'https://s3-us-west-1.amazonaws.com/cdecommerce/soccer.png','2015-02-09 12:57:54','2015-02-09 12:57:54',13,1),(4,'https://s3-us-west-1.amazonaws.com/cdecommerce/soccer.png','2015-02-09 12:58:04','2015-02-09 12:58:04',18,1),(5,'https://s3-us-west-1.amazonaws.com/cdecommerce/soccer.png','2015-02-09 12:58:17','2015-02-09 12:58:17',23,1),(6,'https://s3-us-west-1.amazonaws.com/cdecommerce/soccer.png','2015-02-09 12:58:22','2015-02-09 12:58:22',28,1),(7,'https://s3-us-west-1.amazonaws.com/cdecommerce/soccer.png','2015-02-09 12:58:41','2015-02-09 12:58:41',38,1),(8,'https://s3-us-west-1.amazonaws.com/cdecommerce/euro_soccer.png','2015-02-09 13:00:00','2015-02-09 13:00:00',3,1),(9,'https://s3-us-west-1.amazonaws.com/cdecommerce/euro_soccer.png','2015-02-09 13:00:07','2015-02-09 13:00:07',9,1),(10,'https://s3-us-west-1.amazonaws.com/cdecommerce/euro_soccer.png','2015-02-09 13:00:13','2015-02-09 13:00:13',14,1),(11,'https://s3-us-west-1.amazonaws.com/cdecommerce/euro_soccer.png','2015-02-09 13:00:18','2015-02-09 13:00:18',19,1),(12,'https://s3-us-west-1.amazonaws.com/cdecommerce/euro_soccer.png','2015-02-09 13:00:24','2015-02-09 13:00:24',24,1),(13,'https://s3-us-west-1.amazonaws.com/cdecommerce/euro_soccer.png','2015-02-09 13:00:34','2015-02-09 13:00:34',29,1),(15,'https://s3-us-west-1.amazonaws.com/cdecommerce/euro_soccer.png','2015-02-09 13:00:51','2015-02-09 13:00:51',34,1),(17,'https://s3-us-west-1.amazonaws.com/cdecommerce/sport.png','2015-02-09 13:01:34','2015-02-09 13:01:34',10,1),(19,'https://s3-us-west-1.amazonaws.com/cdecommerce/sport.png','2015-02-09 13:01:48','2015-02-09 13:01:48',19,1),(20,'https://s3-us-west-1.amazonaws.com/cdecommerce/sport.png','2015-02-09 13:01:56','2015-02-09 13:01:56',24,1),(22,'https://s3-us-west-1.amazonaws.com/cdecommerce/sport.png','2015-02-09 13:02:09','2015-02-09 13:02:09',34,1),(24,'https://s3-us-west-1.amazonaws.com/cdecommerce/sports_illus.png','2015-02-09 13:03:01','2015-02-09 13:03:01',5,1),(25,'https://s3-us-west-1.amazonaws.com/cdecommerce/sports_illus.png','2015-02-09 13:03:06','2015-02-09 13:03:06',11,1),(26,'https://s3-us-west-1.amazonaws.com/cdecommerce/sports_illus.png','2015-02-09 13:03:12','2015-02-09 13:03:12',16,1),(27,'https://s3-us-west-1.amazonaws.com/cdecommerce/sports_illus.png','2015-02-09 13:03:21','2015-02-09 13:03:21',21,1),(28,'https://s3-us-west-1.amazonaws.com/cdecommerce/sports_illus.png','2015-02-09 13:03:33','2015-02-09 13:03:33',26,1),(29,'https://s3-us-west-1.amazonaws.com/cdecommerce/sports_illus.png','2015-02-09 13:03:40','2015-02-09 13:03:40',31,1),(30,'https://s3-us-west-1.amazonaws.com/cdecommerce/sports_illus.png','2015-02-09 13:03:48','2015-02-09 13:03:48',36,1),(31,'https://s3-us-west-1.amazonaws.com/cdecommerce/sports_illus.png','2015-02-09 13:03:50','2015-02-09 13:03:50',41,1),(32,'https://s3-us-west-1.amazonaws.com/cdecommerce/wwe.png','2015-02-09 13:04:23','2015-02-09 13:04:23',7,1),(33,'https://s3-us-west-1.amazonaws.com/cdecommerce/wwe.png','2015-02-09 13:04:33','2015-02-09 13:04:33',12,1),(34,'https://s3-us-west-1.amazonaws.com/cdecommerce/wwe.png','2015-02-09 13:04:37','2015-02-09 13:04:37',17,1),(35,'https://s3-us-west-1.amazonaws.com/cdecommerce/wwe.png','2015-02-09 13:04:41','2015-02-09 13:04:41',22,1),(36,'https://s3-us-west-1.amazonaws.com/cdecommerce/wwe.png','2015-02-09 13:04:46','2015-02-09 13:04:46',27,1),(37,'https://s3-us-west-1.amazonaws.com/cdecommerce/wwe.png','2015-02-09 13:04:51','2015-02-09 13:04:51',32,1),(38,'https://s3-us-west-1.amazonaws.com/cdecommerce/wwe.png','2015-02-09 13:04:55','2015-02-09 13:04:55',37,1),(39,'https://s3-us-west-1.amazonaws.com/cdecommerce/wwe.png','2015-02-09 13:05:01','2015-02-09 13:05:01',42,1),(40,'https://s3-us-west-1.amazonaws.com/cdecommerce/sport.png','2015-02-09 13:21:41','2015-02-09 13:21:41',15,1),(41,'https://s3-us-west-1.amazonaws.com/cdecommerce/sport.png','2015-02-09 13:21:48','2015-02-09 13:21:48',20,1),(42,'https://s3-us-west-1.amazonaws.com/cdecommerce/sport.png','2015-02-09 13:21:55','2015-02-09 13:21:55',25,1),(43,'https://s3-us-west-1.amazonaws.com/cdecommerce/sport.png','2015-02-09 13:21:57','2015-02-09 13:21:57',25,1),(44,'https://s3-us-west-1.amazonaws.com/cdecommerce/sport.png','2015-02-09 13:22:08','2015-02-09 13:22:08',30,1),(45,'https://s3-us-west-1.amazonaws.com/cdecommerce/sport.png','2015-02-09 13:22:14','2015-02-09 13:22:14',35,1),(46,'https://s3-us-west-1.amazonaws.com/cdecommerce/sport.png','2015-02-09 13:22:21','2015-02-09 13:22:21',40,1),(47,'https://s3-us-west-1.amazonaws.com/cdecommerce/sport.png','2015-02-09 13:43:26','2015-02-09 13:43:26',4,1),(48,'https://s3-us-west-1.amazonaws.com/cdecommerce/euro_soccer.png','2015-02-09 13:44:29','2015-02-09 13:44:29',39,1);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_users1_idx` (`user_id`),
  KEY `fk_orders_shippings1_idx` (`shipping_id`),
  KEY `fk_orders_billings1_idx` (`billing_id`),
  CONSTRAINT `fk_orders_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_shippings1` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_billings1` FOREIGN KEY (`billing_id`) REFERENCES `billings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_have_products`
--

DROP TABLE IF EXISTS `orders_have_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_have_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `product_qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_has_products_products1_idx` (`products_id`),
  KEY `fk_orders_has_products_orders1_idx` (`orders_id`),
  CONSTRAINT `fk_orders_has_products_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_has_products_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_have_products`
--

LOCK TABLES `orders_have_products` WRITE;
/*!40000 ALTER TABLE `orders_have_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_have_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `inventory` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_categories1_idx` (`categories_id`),
  CONSTRAINT `fk_products_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Soccer Magazine','A magazine that covers all things soccer!',9.99,'100','2015-02-09 12:45:12','2015-02-09 12:45:12',3),(3,'Euro Soccer','A magazine that covers all things about European soccer!',12.99,'150','2015-02-09 12:46:12','2015-02-09 12:46:12',3),(4,'Sport Magazin','An exciting sports magazine',13.99,'200','2015-02-09 12:47:05','2015-02-09 12:47:05',3),(5,'Sports Illustrated','Sports Illustrated\'s Monthly Magazine',21.99,'97','2015-02-09 12:49:35','2015-02-09 12:49:35',3),(7,'WWE','A wrestling magazine',6.99,'50','2015-02-09 12:51:06','2015-02-09 12:51:06',3),(8,'Soccer Magazine','A magazine that covers all things soccer!',9.99,'100','2015-02-09 12:45:12','2015-02-09 12:45:12',3),(9,'Euro Soccer','A magazine that covers all things about European soccer!',12.99,'150','2015-02-09 12:46:12','2015-02-09 12:46:12',3),(10,'Sport Magazin','An exciting sports magazine',13.99,'200','2015-02-09 12:47:05','2015-02-09 12:47:05',3),(11,'Sports Illustrated','Sports Illustrated\'s Monthly Magazine',21.99,'97','2015-02-09 12:49:35','2015-02-09 12:49:35',3),(12,'WWE','A wrestling magazine',6.99,'50','2015-02-09 12:51:06','2015-02-09 12:51:06',3),(13,'Soccer Magazine','A magazine that covers all things soccer!',9.99,'100','2015-02-09 12:45:12','2015-02-09 12:45:12',3),(14,'Euro Soccer','A magazine that covers all things about European soccer!',12.99,'150','2015-02-09 12:46:12','2015-02-09 12:46:12',3),(15,'Sport Magazin','An exciting sports magazine',13.99,'200','2015-02-09 12:47:05','2015-02-09 12:47:05',3),(16,'Sports Illustrated','Sports Illustrated\'s Monthly Magazine',21.99,'97','2015-02-09 12:49:35','2015-02-09 12:49:35',3),(17,'WWE','A wrestling magazine',6.99,'50','2015-02-09 12:51:06','2015-02-09 12:51:06',3),(18,'Soccer Magazine','A magazine that covers all things soccer!',9.99,'100','2015-02-09 12:45:12','2015-02-09 12:45:12',3),(19,'Euro Soccer','A magazine that covers all things about European soccer!',12.99,'150','2015-02-09 12:46:12','2015-02-09 12:46:12',3),(20,'Sport Magazin','An exciting sports magazine',13.99,'200','2015-02-09 12:47:05','2015-02-09 12:47:05',3),(21,'Sports Illustrated','Sports Illustrated\'s Monthly Magazine',21.99,'97','2015-02-09 12:49:35','2015-02-09 12:49:35',3),(22,'WWE','A wrestling magazine',6.99,'50','2015-02-09 12:51:06','2015-02-09 12:51:06',3),(23,'Soccer Magazine','A magazine that covers all things soccer!',9.99,'100','2015-02-09 12:45:12','2015-02-09 12:45:12',3),(24,'Euro Soccer','A magazine that covers all things about European soccer!',12.99,'150','2015-02-09 12:46:12','2015-02-09 12:46:12',3),(25,'Sport Magazin','An exciting sports magazine',13.99,'200','2015-02-09 12:47:05','2015-02-09 12:47:05',3),(26,'Sports Illustrated','Sports Illustrated\'s Monthly Magazine',21.99,'97','2015-02-09 12:49:35','2015-02-09 12:49:35',3),(27,'WWE','A wrestling magazine',6.99,'50','2015-02-09 12:51:06','2015-02-09 12:51:06',3),(28,'Soccer Magazine','A magazine that covers all things soccer!',9.99,'100','2015-02-09 12:45:12','2015-02-09 12:45:12',3),(29,'Euro Soccer','A magazine that covers all things about European soccer!',12.99,'150','2015-02-09 12:46:12','2015-02-09 12:46:12',3),(30,'Sport Magazin','An exciting sports magazine',13.99,'200','2015-02-09 12:47:05','2015-02-09 12:47:05',3),(31,'Sports Illustrated','Sports Illustrated\'s Monthly Magazine',21.99,'97','2015-02-09 12:49:35','2015-02-09 12:49:35',3),(32,'WWE','A wrestling magazine',6.99,'50','2015-02-09 12:51:06','2015-02-09 12:51:06',3),(34,'Euro Soccer','A magazine that covers all things about European soccer!',12.99,'150','2015-02-09 12:46:12','2015-02-09 12:46:12',3),(35,'Sport Magazin','An exciting sports magazine',13.99,'200','2015-02-09 12:47:05','2015-02-09 12:47:05',3),(36,'Sports Illustrated','Sports Illustrated\'s Monthly Magazine',21.99,'97','2015-02-09 12:49:35','2015-02-09 12:49:35',3),(37,'WWE','A wrestling magazine',6.99,'50','2015-02-09 12:51:06','2015-02-09 12:51:06',3),(38,'Soccer Magazine','A magazine that covers all things soccer!',9.99,'100','2015-02-09 12:45:12','2015-02-09 12:45:12',3),(39,'Euro Soccer','A magazine that covers all things about European soccer!',12.99,'150','2015-02-09 12:46:12','2015-02-09 12:46:12',3),(40,'Sport Magazin','An exciting sports magazine',13.99,'200','2015-02-09 12:47:05','2015-02-09 12:47:05',3),(41,'Sports Illustrated','Sports Illustrated\'s Monthly Magazine',21.99,'97','2015-02-09 12:49:35','2015-02-09 12:49:35',3),(42,'WWE','A wrestling magazine',6.99,'50','2015-02-09 12:51:06','2015-02-09 12:51:06',3);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shippings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `cities_id` int(11) NOT NULL,
  `states_id` int(11) NOT NULL,
  `zipcodes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shippings_cities1_idx` (`cities_id`),
  KEY `fk_shippings_states1_idx` (`states_id`),
  KEY `fk_shippings_zipcodes1_idx` (`zipcodes_id`),
  CONSTRAINT `fk_shippings_cities1` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_shippings_states1` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_shippings_zipcodes1` FOREIGN KEY (`zipcodes_id`) REFERENCES `zipcodes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shippings`
--

LOCK TABLES `shippings` WRITE;
/*!40000 ALTER TABLE `shippings` DISABLE KEYS */;
/*!40000 ALTER TABLE `shippings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_privileges`
--

DROP TABLE IF EXISTS `user_privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_privileges`
--

LOCK TABLES `user_privileges` WRITE;
/*!40000 ALTER TABLE `user_privileges` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_privilege_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_user_privileges1_idx` (`user_privilege_id`),
  CONSTRAINT `fk_users_user_privileges1` FOREIGN KEY (`user_privilege_id`) REFERENCES `user_privileges` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zipcodes`
--

DROP TABLE IF EXISTS `zipcodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zipcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zipcode` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zipcodes`
--

LOCK TABLES `zipcodes` WRITE;
/*!40000 ALTER TABLE `zipcodes` DISABLE KEYS */;
/*!40000 ALTER TABLE `zipcodes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-09 16:48:04
