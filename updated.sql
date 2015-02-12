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
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(12) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_billings_zipcodes1_idx` (`zipcode`),
  KEY `fk_billings_states1_idx` (`state`),
  KEY `fk_billings_cities1_idx` (`city`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billings`
--

LOCK TABLES `billings` WRITE;
/*!40000 ALTER TABLE `billings` DISABLE KEYS */;
INSERT INTO `billings` VALUES (12,'Jimmy','Jun','123 Dojo Way','Suite B','San Jose','CA','95112','2015-02-11 11:39:13',NULL),(13,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 12:42:38','2015-02-11 12:42:38'),(14,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 12:43:13','2015-02-11 12:43:13'),(15,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 12:43:27','2015-02-11 12:43:27'),(16,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 12:43:58','2015-02-11 12:43:58'),(17,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 12:44:10','2015-02-11 12:44:10'),(18,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 12:44:37','2015-02-11 12:44:37'),(19,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:03:16','2015-02-11 13:03:16'),(20,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:04:11','2015-02-11 13:04:11'),(21,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:06:21','2015-02-11 13:06:21'),(22,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:06:54','2015-02-11 13:06:54'),(23,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:07:06','2015-02-11 13:07:06'),(24,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:07:29','2015-02-11 13:07:29'),(25,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:12:39','2015-02-11 13:12:39'),(26,'Jimmy','Jun','193 Fairchild Drive','Suite A','Mountain View','California','94043','2015-02-11 13:39:21','2015-02-11 13:39:21');
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
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_carts_users1_idx` (`user_id`),
  CONSTRAINT `fk_carts_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (11,7,'2015-02-11 11:56:55','2015-02-11 11:56:55'),(12,8,'2015-02-11 12:19:53','2015-02-11 12:19:53'),(13,8,'2015-02-11 12:48:53','2015-02-11 12:19:53'),(14,9,'2015-02-11 13:04:02','2015-02-11 13:04:02'),(15,10,'2015-02-11 13:04:06','2015-02-11 13:04:06');
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
  `product_qty` int(11) DEFAULT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_carts_has_products_products1_idx` (`product_id`),
  KEY `fk_carts_has_products_carts1_idx` (`cart_id`),
  CONSTRAINT `fk_carts_has_products_carts1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_carts_has_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts_have_products`
--

LOCK TABLES `carts_have_products` WRITE;
/*!40000 ALTER TABLE `carts_have_products` DISABLE KEYS */;
INSERT INTO `carts_have_products` VALUES (66,1,12,2,NULL,NULL),(67,3,14,5,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Fashion',NULL,NULL),(2,'Music',NULL,NULL),(3,'Men\'s Interest',NULL,NULL),(4,'Sports',NULL,NULL),(5,'Entertainment',NULL,NULL),(6,'Health & Fitness',NULL,NULL),(7,'News',NULL,NULL),(8,'Business',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_types`
--

LOCK TABLES `image_types` WRITE;
/*!40000 ALTER TABLE `image_types` DISABLE KEYS */;
INSERT INTO `image_types` VALUES (1,'main',NULL,NULL),(2,'secondary',NULL,NULL);
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
  `product_id` int(11) NOT NULL,
  `image_type_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_products_idx` (`product_id`),
  KEY `fk_images_image_types1_idx` (`image_type_id`),
  CONSTRAINT `fk_images_image_types1` FOREIGN KEY (`image_type_id`) REFERENCES `image_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_images_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'https://s3-us-west-1.amazonaws.com/cdecommerce/soccer.png',5,1,'0000-00-00 00:00:00',NULL),(2,'https://s3-us-west-1.amazonaws.com/cdecommerce/vibe.png',2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'https://s3-us-west-1.amazonaws.com/cdecommerce/gq.png',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'https://s3-us-west-1.amazonaws.com/cdecommerce/mens_health.png',3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'https://s3-us-west-1.amazonaws.com/cdecommerce/bazaar.png',4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'https://s3-us-west-1.amazonaws.com/cdecommerce/sports_illus.png',15,1,NULL,NULL),(7,'https://s3-us-west-1.amazonaws.com/cdecommerce/elle.png',16,1,NULL,NULL),(8,'https://s3-us-west-1.amazonaws.com/cdecommerce/empire.png',19,1,NULL,NULL),(9,'https://s3-us-west-1.amazonaws.com/cdecommerce/flex.png',22,1,NULL,NULL),(10,'https://s3-us-west-1.amazonaws.com/cdecommerce/billboard.png',23,1,NULL,NULL),(11,'https://s3-us-west-1.amazonaws.com/cdecommerce/inside_fitness.png',24,1,NULL,NULL),(12,'https://s3-us-west-1.amazonaws.com/cdecommerce/time.png',25,1,NULL,NULL),(13,'https://s3-us-west-1.amazonaws.com/cdecommerce/source.png',26,1,NULL,NULL),(14,'https://s3-us-west-1.amazonaws.com/cdecommerce/rolling_stone.png',27,1,NULL,NULL),(15,'https://s3-us-west-1.amazonaws.com/cdecommerce/forbes.png',28,1,NULL,NULL),(16,'https://s3-us-west-1.amazonaws.com/cdecommerce/xxl.png',29,1,NULL,NULL),(17,'https://s3-us-west-1.amazonaws.com/cdecommerce/wwe.png',30,1,NULL,NULL),(18,'https://s3-us-west-1.amazonaws.com/cdecommerce/euro_soccer.png',31,1,NULL,NULL);
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
  `status` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_users1_idx` (`user_id`),
  KEY `fk_orders_shippings1_idx` (`shipping_id`),
  KEY `fk_orders_billings1_idx` (`billing_id`),
  CONSTRAINT `fk_orders_billings1` FOREIGN KEY (`billing_id`) REFERENCES `billings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_shippings1` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (21,32.97,'Order in process',8,14,13,'2015-02-11 12:42:38','2015-02-11 12:42:38'),(22,32.97,'Order in process',8,15,14,'2015-02-11 12:43:13','2015-02-11 12:43:13'),(23,32.97,'Order in process',8,16,15,'2015-02-11 12:43:27','2015-02-11 12:43:27'),(24,32.97,'Order in process',8,17,16,'2015-02-11 12:43:58','2015-02-11 12:43:58'),(25,32.97,'Order in process',8,18,17,'2015-02-11 12:44:10','2015-02-11 12:44:10'),(26,32.97,'Order in process',8,19,18,'2015-02-11 12:44:37','2015-02-11 12:44:37'),(27,11.99,'Order in process',8,20,19,'2015-02-11 13:03:16','2015-02-11 13:03:16'),(28,32.97,'Order in process',10,21,20,'2015-02-11 13:04:11','2015-02-11 13:04:11'),(29,10.99,'Order in process',10,22,21,'2015-02-11 13:06:21','2015-02-11 13:06:21'),(30,10.99,'Order in process',10,23,22,'2015-02-11 13:06:54','2015-02-11 13:06:54'),(31,11.99,'Cancelled',10,24,23,'2015-02-11 13:07:06','2015-02-11 13:21:05'),(32,10.99,'Shipped',10,25,24,'2015-02-11 13:07:29','2015-02-11 13:52:19'),(33,63.95,'Shipped',10,26,25,'2015-02-11 13:12:39','2015-02-11 13:48:20'),(34,98.93,'Shipped',7,27,26,'2015-02-11 13:39:21','2015-02-11 13:52:15'),(35,19.99,'Shipped',6,12,12,'2015-02-11 16:21:37',NULL);
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
  `product_qty` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_has_products_products1_idx` (`product_id`),
  KEY `fk_orders_has_products_orders1_idx` (`order_id`),
  CONSTRAINT `fk_orders_has_products_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_has_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_have_products`
--

LOCK TABLES `orders_have_products` WRITE;
/*!40000 ALTER TABLE `orders_have_products` DISABLE KEYS */;
INSERT INTO `orders_have_products` VALUES (11,3,26,5,'2015-02-11 12:44:37','2015-02-11 12:44:37'),(12,3,28,5,'2015-02-11 13:04:11','2015-02-11 13:04:11'),(13,1,29,5,'2015-02-11 13:06:21','2015-02-11 13:06:21'),(14,1,31,2,'2015-02-11 13:07:06','2015-02-11 13:07:06'),(15,1,32,5,'2015-02-11 13:07:29','2015-02-11 13:07:29'),(16,2,33,1,'2015-02-11 13:12:39','2015-02-11 13:12:39'),(17,3,33,2,'2015-02-11 13:12:39','2015-02-11 13:12:39'),(18,6,34,1,'2015-02-11 13:39:21','2015-02-11 13:39:21'),(19,1,34,3,'2015-02-11 13:39:21','2015-02-11 13:39:21');
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
  `inventory` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_categories1_idx1` (`category_id`),
  CONSTRAINT `fk_products_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'GQ','Gentlemen\'s Quarterly',13.99,55,1,NULL,NULL),(2,'Vibe','Vibe music magazine',11.99,67,2,NULL,NULL),(3,'Men\'s Health','Men\'s Health Magazine',14.99,14,3,NULL,NULL),(4,'Bazaar','Bazaar Fashion magazine',15.99,85,1,NULL,NULL),(5,'Soccer','Everything soccer',10.99,99,4,NULL,NULL),(15,'Sports Illustrated','Sports Illustrated',15.99,37,4,'2015-02-11 16:15:55',NULL),(16,'Elle','Fashion Magazine',16.99,46,1,'2015-02-11 16:17:48',NULL),(19,'Empire','Empire entertainment magazine',11.99,29,5,NULL,NULL),(22,'Flex','Flex Fitness Magazine',15.99,71,6,'2015-02-11 16:25:15',NULL),(23,'Billboard','Billboard Music Magazine',13.99,68,2,'2015-02-11 16:28:51',NULL),(24,'Inside Fitness','Inside Fitness Magazine',12.99,35,6,'2015-02-11 16:32:44',NULL),(25,'Time','Time Magazine',14.99,101,7,'2015-02-11 16:40:25',NULL),(26,'Source','Source Magazine',10.99,71,2,NULL,NULL),(27,'Rolling Stone','Rolling Stone',14.99,49,2,NULL,NULL),(28,'Forbes','Forbes Magazine',13.99,83,8,NULL,NULL),(29,'XXL','XXL Music Magazine',12.99,46,2,NULL,NULL),(30,'WWE','World Wrestling Entertainment Magazine',10.99,23,4,'2015-02-11 16:49:37',NULL),(31,'Euro Soccer','Everything about Europea Soccer',9.99,61,4,'2015-02-11 17:30:37',NULL);
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
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(12) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shippings`
--

LOCK TABLES `shippings` WRITE;
/*!40000 ALTER TABLE `shippings` DISABLE KEYS */;
INSERT INTO `shippings` VALUES (12,'Jimmy','Jun','123 Dojo Way','Suite B','San Jose','CA','95112','2015-02-11 11:38:53',NULL),(13,'Jimmy','Jun','123 Dojo Way',NULL,'San Jose','CA','95112','2015-02-11 11:54:15',NULL),(14,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 12:42:38','2015-02-11 12:42:38'),(15,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 12:43:13','2015-02-11 12:43:13'),(16,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 12:43:27','2015-02-11 12:43:27'),(17,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 12:43:58','2015-02-11 12:43:58'),(18,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 12:44:10','2015-02-11 12:44:10'),(19,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 12:44:37','2015-02-11 12:44:37'),(20,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:03:16','2015-02-11 13:03:16'),(21,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:04:11','2015-02-11 13:04:11'),(22,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:06:21','2015-02-11 13:06:21'),(23,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:06:54','2015-02-11 13:06:54'),(24,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:07:06','2015-02-11 13:07:06'),(25,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:07:29','2015-02-11 13:07:29'),(26,'Matt','Rutledge','1631 Mercy St','Unit A','Mountain View','CA','94041','2015-02-11 13:12:39','2015-02-11 13:12:39'),(27,'Jimmy','Jun','193 Fairchild Drive','Suite A','Mountain View','California','94043','2015-02-11 13:39:21','2015-02-11 13:39:21');
/*!40000 ALTER TABLE `shippings` ENABLE KEYS */;
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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_privileges`
--

LOCK TABLES `user_privileges` WRITE;
/*!40000 ALTER TABLE `user_privileges` DISABLE KEYS */;
INSERT INTO `user_privileges` VALUES (1,'admin',NULL,NULL);
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
  `password` varchar(255) DEFAULT NULL,
  `user_privilege_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_user_privileges1_idx` (`user_privilege_id`),
  CONSTRAINT `fk_users_user_privileges1` FOREIGN KEY (`user_privilege_id`) REFERENCES `user_privileges` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'Jimmy','Jun','jimmy@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99',1,NULL,NULL),(7,NULL,NULL,NULL,NULL,NULL,'2015-02-11 11:56:55','2015-02-11 11:56:55'),(8,NULL,NULL,NULL,NULL,NULL,'2015-02-11 12:19:53','2015-02-11 12:19:53'),(9,NULL,NULL,NULL,NULL,NULL,'2015-02-11 13:04:02','2015-02-11 13:04:02'),(10,NULL,NULL,NULL,NULL,NULL,'2015-02-11 13:04:06','2015-02-11 13:04:06');
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

-- Dump completed on 2015-02-12  7:37:42
