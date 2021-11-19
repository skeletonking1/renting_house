/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - cmsdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cmsdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `cmsdb`;

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contacts` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2021_10_08_180815_create_posts_table',1),
(5,'2021_10_08_235907_create_contacts_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`title`,`content`,`state`,`image_url`,`created_at`,`updated_at`) values 
(1,'dgfsdf','<p>sdfsdfsdf</p>','公開','/uploads/16338952601633895260.png','2021-10-10 19:47:40','2021-10-10 19:47:40'),
(2,'dgfsdf','<p>sdfsdfsdf</p>','非公開','/uploads/16338952661633895266.png','2021-10-10 19:47:46','2021-10-10 19:47:46'),
(5,'yuievfgwer','<p>hgfhfghfgh</p><p>nmhgjghjtyutyu</p>','非公開','/uploads/16338953041633895304.png','2021-10-10 19:48:24','2021-10-10 21:18:59'),
(6,'tyutryuru','<p>yuiyuiti</p>','公開','/uploads/16339005071633900507.jpg','2021-10-10 21:15:07','2021-10-10 21:15:07'),
(7,'tyutryuru','<p>yuiyuiti</p>','公開','/uploads/16339005151633900515.jpg','2021-10-10 21:15:15','2021-10-10 21:15:15'),
(11,'oidfgvbnvbnvbndffgdfgghjghjg','<p>xzcvzdfggfdbnbvnvbndfgdgdfgdgkjljkljljl</p>','公開','/uploads/16339005741633900574.jpg','2021-10-10 21:16:14','2021-10-10 21:16:14'),
(13,'sdfsfhfghfg','<p>htyrtyrtyryt</p>','公開','/uploads/16339448971633944897.jpg','2021-10-11 09:34:57','2021-10-11 09:34:57'),
(16,'ppyutrtyryrtytrty','<p>hjkhjltryrtyryryry</p>','公開','/uploads/16339449201633944920.jpg','2021-10-11 09:35:20','2021-10-11 09:35:20'),
(17,'rrerrererrrrrr','<p>jghjghjhgjh</p>','公開','/uploads/16339449261633944926.jpg','2021-10-11 09:35:26','2021-10-11 09:35:26'),
(19,'ghjghj','<p>etgfgdfgdfgdfgdgdg</p>','1','/uploads/16339563201633956320.jpg','2021-10-11 12:45:20','2021-10-11 12:45:20'),
(24,'gfhfgh','<p>fghfghfghfgh</p>','1','/uploads/16339696231633969623.jfif','2021-10-11 16:27:03','2021-10-11 16:27:03'),
(27,'sdfsdf','<p>sdfdsfsf</p>','1','/uploads/16339700131633970013.jpg','2021-10-11 16:33:33','2021-10-11 16:33:33'),
(39,'sdfsdfa','<p>dfsdfdsfdsdf</p>','1','/uploads/16340176041634017604.jpg','2021-10-12 05:46:44','2021-10-12 05:46:44');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
