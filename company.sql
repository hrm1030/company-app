/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.19-MariaDB : Database - company
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`company` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `company`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pid` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`pid`,`created_at`,`updated_at`) values 
(1,'category1',0,'2021-07-02 09:47:55','2021-07-02 16:46:07'),
(2,'category2',0,'2021-07-02 11:00:21','2021-07-02 18:00:21'),
(3,'category3',0,'2021-07-02 17:39:26','2021-07-02 17:39:26'),
(4,'sub1',3,'2021-07-02 17:39:56','2021-07-02 17:39:56'),
(5,'sub1',1,'2021-07-02 17:40:07','2021-07-02 17:40:07'),
(6,'sub1',2,'2021-07-02 17:40:14','2021-07-02 17:40:14'),
(7,'sub2',3,'2021-07-02 17:40:21','2021-07-02 17:40:21'),
(8,'sub3',3,'2021-07-02 17:40:31','2021-07-02 17:40:31'),
(11,'sub2',2,'2021-07-02 17:40:53','2021-07-02 17:40:53'),
(12,'sub3',2,'2021-07-02 17:40:59','2021-07-02 17:40:59'),
(13,'sub4',2,'2021-07-02 17:41:03','2021-07-02 17:41:03'),
(14,'sub5',2,'2021-07-02 17:41:09','2021-07-02 17:41:09');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `categories` text DEFAULT NULL,
  `subcategories` text DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `int` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `items` */

insert  into `items`(`id`,`name`,`description`,`categories`,`subcategories`,`rate`,`created_at`,`updated_at`) values 
(3,'item1','sdfsadfsa','[{\"value\":\"category2\"},{\"value\":\"category1\"}]','[{\"value\":\"sub2\"},{\"value\":\"sub1\"},{\"value\":\"sub3\"}]',4,'2021-07-04 11:48:52','2021-07-04 18:48:52'),
(5,'item3','This is item3.\nplease review and rating.','[{\"value\":\"category2\"},{\"value\":\"category3\"},{\"value\":\"category1\"}]','[{\"value\":\"sub1\"},{\"value\":\"sub3\"},{\"value\":\"sub2\"},{\"value\":\"sub5\"}]',2,'2021-07-04 12:15:01','2021-07-04 19:15:01'),
(6,'item4','This is item4.\nplease check it.','[{\"value\":\"category1\"},{\"value\":\"category3\"},{\"value\":\"category2\"}]','[{\"value\":\"sub1\"},{\"value\":\"sub2\"},{\"value\":\"sub3\"},{\"value\":\"sub4\"},{\"value\":\"sub5\"}]',4,'2021-07-04 12:15:57','2021-07-04 19:15:57'),
(7,'asdf','sadfasdfsaf','[{\"value\":\"category2\"},{\"value\":\"category3\"}]','[{\"value\":\"sub1\"},{\"value\":\"sub2\"},{\"value\":\"sub3\"}]',1,'2021-07-04 12:14:24','2021-07-04 19:14:24'),
(8,'asdfas','sadfsdafas','[{\"value\":\"sdfdas\"},{\"value\":\"sdfsadfa\"}]','[{\"value\":\"sdfsda\"},{\"value\":\"sdfas\"}]',4,'2021-07-04 12:15:44','2021-07-04 19:15:44'),
(9,'sadfsa','sdfsdf','[{\"value\":\"sdfsadf\"}]','[{\"value\":\"sdfsfa\"},{\"value\":\"sdfsdafasf\"},{\"value\":\"dsfsadfs\"}]',2,'2021-07-04 12:15:36','2021-07-04 19:15:36'),
(10,'sdfasd','sdfsdfsadf','[{\"value\":\"sdfsdaf\"},{\"value\":\"category3\"}]','[{\"value\":\"sadfasasdf\"},{\"value\":\"as\"},{\"value\":\"sub2\"},{\"value\":\"sub4\"}]',5,'2021-07-04 12:15:50','2021-07-04 19:15:50');

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `pid` int(255) DEFAULT NULL,
  `order_num` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`url`,`pid`,`order_num`,`created_at`,`updated_at`,`icon`) values 
(1,'Dashboard','home',9,0,NULL,NULL,'bi bi-house fs-3'),
(2,'User Management','users',9,3,NULL,NULL,'bi bi-people fs-3'),
(3,'Category Management','category',9,1,NULL,NULL,'bi bi-layers fs-3'),
(6,'User list','list',2,0,'2021-07-02 04:05:26',NULL,NULL),
(7,'Create & Edit','edit',2,1,'2021-07-02 04:05:45',NULL,NULL),
(8,'Item Management','item',9,2,'2021-07-02 11:31:59',NULL,'bi bi-hr fs-3'),
(9,'Admin',NULL,0,0,'2021-07-04 12:43:05',NULL,NULL),
(10,'User',NULL,0,1,'2021-07-04 12:43:15',NULL,NULL),
(11,'Dashboard','home',10,0,'2021-07-04 12:43:41',NULL,'bi bi-house fs-3');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `item_id` int(255) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

/*Data for the table `reviews` */

insert  into `reviews`(`id`,`item_id`,`rating`,`description`,`created_at`,`updated_at`) values 
(1,3,4,'This is review of item1.\n\nI give 4 marks.','2021-07-04 18:34:58','2021-07-04 18:34:58'),
(2,5,5,'sdfsfsfsafadsf','2021-07-04 18:39:00','2021-07-04 18:39:00'),
(3,7,4,'sadfsafasdf','2021-07-04 18:39:29','2021-07-04 18:39:29'),
(4,3,5,'dsfasdfsad','2021-07-04 18:43:23','2021-07-04 18:43:23'),
(5,3,5,'dsfasdfsad','2021-07-04 18:43:59','2021-07-04 18:43:59'),
(6,3,3,'sdfsdfsfasd','2021-07-04 18:45:36','2021-07-04 18:45:36'),
(7,3,5,'sdfsdfsfasd','2021-07-04 18:46:43','2021-07-04 18:46:43'),
(8,3,5,'sdfsdfsfasd','2021-07-04 18:47:18','2021-07-04 18:47:18'),
(9,3,5,'sdfsdfsfasd','2021-07-04 18:47:31','2021-07-04 18:47:31'),
(10,3,5,'sdfsdfsfasd','2021-07-04 18:47:55','2021-07-04 18:47:55'),
(11,3,5,'sdfsdfsfasd','2021-07-04 18:48:36','2021-07-04 18:48:36'),
(12,3,5,'sdfsdfsfasd','2021-07-04 18:48:52','2021-07-04 18:48:52'),
(13,5,2,'dsfsadfa','2021-07-04 18:49:14','2021-07-04 18:49:14'),
(14,7,2,'dfafsdfsda','2021-07-04 18:49:38','2021-07-04 18:49:38'),
(15,7,2,'sdfasfsadf','2021-07-04 18:50:17','2021-07-04 18:50:17'),
(16,9,1,'sadfsdfasdf','2021-07-04 18:50:25','2021-07-04 18:50:25'),
(17,9,1,'safdsafas','2021-07-04 18:50:33','2021-07-04 18:50:33'),
(18,9,1,'asdfsadfasdf','2021-07-04 18:50:40','2021-07-04 18:50:40'),
(19,9,0,'sdfsdfsadf','2021-07-04 18:50:47','2021-07-04 18:50:47'),
(20,9,0,'asfafdsf','2021-07-04 18:50:53','2021-07-04 18:50:53'),
(21,9,0,'sdfsdfa','2021-07-04 18:56:10','2021-07-04 18:56:10'),
(22,7,0,'sdfsadfasfa','2021-07-04 18:56:26','2021-07-04 18:56:26'),
(23,7,0,'sdfasdf','2021-07-04 19:10:54','2021-07-04 19:10:54'),
(24,7,0,'sdfasdf','2021-07-04 19:11:39','2021-07-04 19:11:39'),
(25,7,0,'sdfasdf','2021-07-04 19:12:21','2021-07-04 19:12:21'),
(26,7,0,'sdfasdf','2021-07-04 19:13:00','2021-07-04 19:13:00'),
(27,7,0,'sdfasdf','2021-07-04 19:13:36','2021-07-04 19:13:36'),
(28,7,0,'sdfasdf','2021-07-04 19:13:48','2021-07-04 19:13:48'),
(29,7,0,'dsfasdf','2021-07-04 19:14:24','2021-07-04 19:14:24'),
(30,5,0,'sdfadfasdf','2021-07-04 19:15:01','2021-07-04 19:15:01'),
(31,9,0,'dsfafasf','2021-07-04 19:15:09','2021-07-04 19:15:09'),
(32,9,5,'sfasdfas','2021-07-04 19:15:19','2021-07-04 19:15:19'),
(33,9,4,'safdsafsdaf','2021-07-04 19:15:29','2021-07-04 19:15:29'),
(34,9,5,'sdfasdfas','2021-07-04 19:15:36','2021-07-04 19:15:36'),
(35,8,4,'sdfasdfs','2021-07-04 19:15:44','2021-07-04 19:15:44'),
(36,10,5,'sdfasdf','2021-07-04 19:15:50','2021-07-04 19:15:50'),
(37,6,4,'sdfsdfsad','2021-07-04 19:15:57','2021-07-04 19:15:57');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`lastname`,`email`,`email_verified_at`,`password`,`remember_token`,`permission`,`created_at`,`updated_at`) values 
(1,'HRM','hrm','hrm.2021@outlook.com',NULL,'$2y$10$bOrBK07uRGY.B2/amnCEw..7CvejxTcBN41U.5OY/WeIvaQqvAk4e',NULL,1,'2021-07-02 04:02:48','2021-07-02 04:02:48'),
(2,'Dmitriy','Lotov','d.lotov_7@mail.ru',NULL,'$2y$10$GOSNuTrz//JBy2YLbjKQIuyFabqSSaNh9Xvq7.Yi4ATL3ia2Tjmoq',NULL,0,'2021-07-02 14:56:38','2021-07-02 14:56:38'),
(3,'Maksim','Glazunov','maksim.glazunov2020@gmail.com',NULL,'$2y$10$yg5F2nwzjr6G32itcyIxneho1e18/PipVlXNcGiEVSM1G6VDGAZQ6',NULL,0,'2021-07-02 15:09:18','2021-07-02 15:09:18');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
