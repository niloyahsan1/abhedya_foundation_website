-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: abhedya_foundation
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('abhedya-foundation-cache-tyro:user-3:roles','a:2:{i:0;s:5:\"admin\";i:1;s:4:\"user\";}',1793127244);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_updates`
--

DROP TABLE IF EXISTS `campaign_updates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_updates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_updates_campaign_id_foreign` (`campaign_id`),
  KEY `campaign_updates_published_at_index` (`published_at`),
  CONSTRAINT `campaign_updates_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_updates`
--

LOCK TABLES `campaign_updates` WRITE;
/*!40000 ALTER TABLE `campaign_updates` DISABLE KEYS */;
INSERT INTO `campaign_updates` VALUES (1,1,'First Batch of 400 Survival Food Packs Distributed in Sylhet','<p>Our volunteer volunteers reached 3 remote unions yesterday by boat, successfully delivering essential dry rations, clean drinking water cans, and water purification tablets directly to 400 families stranded at temporary flood shelters.</p>',NULL,'2026-10-07 11:22:02','2026-10-12 11:22:02','2026-10-24 05:51:10');
/*!40000 ALTER TABLE `campaign_updates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaigns`
--

DROP TABLE IF EXISTS `campaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaigns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_bn` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `short_description_bn` text DEFAULT NULL,
  `description` longtext NOT NULL,
  `description_bn` longtext DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `target_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `campaigns_slug_unique` (`slug`),
  KEY `campaigns_status_index` (`status`),
  KEY `campaigns_is_featured_index` (`is_featured`),
  KEY `campaigns_is_published_index` (`is_published`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaigns`
--

LOCK TABLES `campaigns` WRITE;
/*!40000 ALTER TABLE `campaigns` DISABLE KEYS */;
INSERT INTO `campaigns` VALUES (1,'Emergency Monsoon Flood Relief 2026','জরুরি বর্ষাকালীন বন্যা ত্রাণ ২০২৬','emergency-monsoon-flood-relief-2026','Providing life-saving dry food, drinking water purifiers, and emergency shelter kits to displaced flood survivors.','বন্যাকবলিত বাস্তুচ্যুত মানুষের মাঝে জরুরি শুকনো খাবার, পানি বিশুদ্ধকরণ কিট ও অস্থায়ী আশ্রয় সামগ্রী বিতরণ।','<p>Severe flooding in northeastern Bangladesh has inundated hundreds of homesteads, leaving thousands stranded without access to safe drinking water, dry rations, or sanitation. Abhedya Foundation rescue teams are deploying survival packs containing rice, lentils, oil, oral rehydration salts, water purification tablets, and emergency tarpaulins.</p>','<p>বাংলাদেশের উত্তর-পূর্বাঞ্চলে ভয়াবহ বন্যায় শত শত বসতবাড়ি প্লাবিত হয়েছে এবং হাজার হাজার মানুষ নিরাপদ খাবার পানি, শুকনো খাবার ও স্যানিটেশন ব্যবস্থা ছাড়াই পানিবন্দি অবস্থায় রয়েছে। অভেদ্য ফাউন্ডেশনের উদ্ধারকারী দল চাল, ডাল, তেল, খাবার স্যালাইন, পানি বিশুদ্ধকরণ ট্যাবলেট এবং জরুরি ত্রিপল সম্বলিত জীবনরক্ষাকারী ত্রাণ সামগ্রী বিতরণ করছে।</p>',NULL,10000.00,NULL,NULL,'active',1,1,'2026-10-12 11:22:02','2026-10-24 10:08:05'),(2,'Winter Warmth: Blankets & Thermal Clothing for Elders','শীতের উষ্ণতা: প্রবীণ ও শিশুদের জন্য কম্বল ও শীতবস্ত্র','winter-warmth-blankets-thermal-clothing-for-elders','Distributing heavy thermal blankets and woolens to vulnerable elderly villagers and infants in northern districts.','উত্তরাঞ্চলের অসহায় প্রবীণ ও শিশুদের মাঝে মানসম্মত ভারী কম্বল ও উলের শীতবস্ত্র বিতরণ।','During peak winter, cold waves severely threaten destitute families in northern rural areas. This campaign aims to distribute 2,500 heavy-grade thermal blankets and sweaters to elderly individuals and street children living below the poverty line.','তীব্র শীতে উত্তরাঞ্চলের গ্রামীণ জনপদে দরিদ্র পরিবারগুলো চরম দুর্ভোগে পড়ে। এই ক্যাম্পেইনের লক্ষ্য দারিদ্র্যসীমার নিচে বসবাসকারী প্রবীণ ব্যক্তি ও পথশিশুদের মাঝে ২,৫০০টি ভারী শীতবস্ত্র ও কম্বল বিতরণ করা।',NULL,350000.00,'2026-10-01','2027-01-31','active',1,1,'2026-10-12 11:22:02','2026-10-24 10:08:05'),(3,'Annual Secondary School Scholarship Fund','বার্ষিক মাধ্যমিক বিদ্যালয় শিক্ষাবৃত্তি তহবিল','annual-secondary-school-scholarship-fund','Funding tuition fees, books, and uniforms for 150 meritorious underprivileged secondary students.','১৫০ জন মেধাবী কিন্তু অসচ্ছল মাধ্যমিক শিক্ষার্থীর বেতন, বই ও স্কুল পোশাকের সম্পূর্ণ খরচ বহন।','<p>Financial distress forces countless bright pupils to drop out before completing their Secondary School Certificate. This scholarship fund covers annual tuition, uniforms, textbooks, and examination registrations, keeping dreams alive.</p>','<p>আর্থিক অনটনের কারণে অসংখ্য মেধাবী শিক্ষার্থী মাধ্যমিক শেষ করার আগেই ঝরে পড়তে বাধ্য হয়। এই বৃত্তি তহবিল বার্ষিক টিউশন ফি, ইউনিফর্ম, পাঠ্যবই এবং পরীক্ষার নিবন্ধন খরচ বহন করে তাদের স্বপ্নকে বাঁচিয়ে রাখে।</p>',NULL,995.00,NULL,NULL,'completed',1,1,'2026-10-12 11:22:02','2026-10-24 10:08:05');
/*!40000 ALTER TABLE `campaigns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Education & Literacy','education-literacy','Programs fostering child education, digital learning, and scholarship stipends.','2026-10-12 11:22:02','2026-10-12 11:22:02'),(2,'Community Healthcare','community-healthcare','Free medical camps, eye screening clinics, and medicine distributions.','2026-10-12 11:22:02','2026-10-12 11:22:02'),(3,'Emergency Relief','emergency-relief','Disaster response, winter clothing distribution, and flood assistance.','2026-10-12 11:22:02','2026-10-12 11:22:02'),(4,'Sustainable Livelihoods','sustainable-livelihoods','Vocational training, women empowerment, and small enterprise micro-grants.','2026-10-12 11:22:02','2026-10-12 11:22:02');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `replied_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_messages_is_read_index` (`is_read`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` bigint(20) unsigned DEFAULT NULL,
  `donor_name` varchar(255) NOT NULL,
  `donor_email` varchar(255) DEFAULT NULL,
  `donor_phone` varchar(255) DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `verified_by` bigint(20) unsigned DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donations_campaign_id_foreign` (`campaign_id`),
  KEY `donations_verified_by_foreign` (`verified_by`),
  KEY `donations_payment_method_index` (`payment_method`),
  KEY `donations_transaction_id_index` (`transaction_id`),
  KEY `donations_status_index` (`status`),
  CONSTRAINT `donations_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE SET NULL,
  CONSTRAINT `donations_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donations`
--

LOCK TABLES `donations` WRITE;
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
INSERT INTO `donations` VALUES (1,1,'Mohammad Rahat Hasan','rahat.hasan@example.com','01711223344',1000.00,'bkash','BKS9X84A12',NULL,'verified',1,'2026-10-09 11:22:02',NULL,'Verified with bKash statement matching reference.','2026-10-12 11:22:02','2026-10-24 05:44:32'),(2,1,'Farhana Akter','farhana.akter@example.com','01822334455',500.00,'nagad','NGD7736BB4',NULL,'verified',1,'2026-10-10 11:22:02',NULL,'Verified through Nagad merchant terminal.','2026-10-12 11:22:02','2026-10-24 05:44:53'),(3,1,'Anonymous Supporter',NULL,'01933445566',2000.00,'rocket','RCK4920811',NULL,'verified',NULL,NULL,NULL,'Verified with bKash statement matching reference.','2026-10-12 11:22:02','2026-10-24 05:47:28'),(4,2,'Syed Kamrul Islam','kamrul.islam@example.com','01655667788',50000.00,'bank_transfer','DBBL-TRF-98231',NULL,'verified',1,'2026-10-11 11:22:02',NULL,'Verified on bank account statement.','2026-10-12 11:22:02','2026-10-12 11:22:02'),(5,NULL,'Dr. Nusrat Jahan','nusrat.jahan@example.com','01799887766',10000.00,'bkash','BKS39102FF',NULL,'verified',1,'2026-10-11 23:22:02',NULL,'General charity donation confirmed.','2026-10-12 11:22:02','2026-10-12 11:22:02'),(6,3,'Niloy Ahsan','niloyahsan@gmail.com','01889997565',1000.00,'bank_transfer','TRXSL12PO',NULL,'verified',NULL,NULL,NULL,'Verified by the reference number.','2026-10-24 05:53:18','2026-10-24 05:53:18');
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_albums`
--

DROP TABLE IF EXISTS `gallery_albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_albums` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_bn` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gallery_albums_slug_unique` (`slug`),
  KEY `gallery_albums_is_published_index` (`is_published`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_albums`
--

LOCK TABLES `gallery_albums` WRITE;
/*!40000 ALTER TABLE `gallery_albums` DISABLE KEYS */;
INSERT INTO `gallery_albums` VALUES (1,'Rural Digital Classrooms in Action','মাঠপর্যায়ে গ্রামীণ ডিজিটাল ক্লাসরুম','rural-digital-classrooms','Joyful moments of children exploring interactive educational lessons across riverine schools.','চরাঞ্চলের স্কুলে ডিজিটাল শিক্ষায় শিশুদের স্বতঃস্ফূর্ত অংশগ্রহণের আনন্দঘন মুহূর্ত।',NULL,1,1,'2026-10-12 11:22:02','2026-10-24 10:08:05'),(2,'Flood Relief Distribution 2026','বন্যা ত্রাণ বিতরণ কার্যক্রম ২০২৬','flood-relief-distribution-2026','Emergency response volunteer teams distributing food and clean water in flooded communities.','বন্যাকবলিত এলাকায় স্বেচ্ছাসেবী দলের খাদ্য ও বিশুদ্ধ খাবার পানি বিতরণ।',NULL,2,1,'2026-10-12 11:22:02','2026-10-24 10:08:05');
/*!40000 ALTER TABLE `gallery_albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_album_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_bn` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `caption_bn` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_images_gallery_album_id_foreign` (`gallery_album_id`),
  KEY `gallery_images_is_published_index` (`is_published`),
  CONSTRAINT `gallery_images_gallery_album_id_foreign` FOREIGN KEY (`gallery_album_id`) REFERENCES `gallery_albums` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_images`
--

LOCK TABLES `gallery_images` WRITE;
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
INSERT INTO `gallery_images` VALUES (1,1,'Students Engaging with Digital Lessons','ডিজিটাল পাঠে শিক্ষার্থীদের উচ্ছ্বাস','https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1000&q=80','Primary students gathered around interactive tablet lessons in Kurigram.','কুড়িগ্রামের প্রাথমিক শিক্ষার্থীরা ট্যাবলেটে মিথস্ক্রিয় পাঠ গ্রহণে ব্যস্ত।',1,1,'2026-10-12 11:22:02','2026-10-24 10:08:03'),(2,1,'Solar Powered Class Setup','সৌরবিদ্যুৎচালিত শ্রেণিকক্ষ','https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1000&q=80','A refurbished classroom illuminated by sustainable solar energy.','সৌরবিদ্যুতের আলোয় আলোকিত একটি আধুনিক শ্রেণিকক্ষ।',2,1,'2026-10-12 11:22:02','2026-10-24 10:08:03'),(3,2,'Emergency Food Pack Distribution','জরুরি খাদ্য সামগ্রী বিতরণ','https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1000&q=80','Distributing essential food ration packets to families at high-ground relief centers.','উঁচু আশ্রয়কেন্দ্রে আশ্রয় নেওয়া পরিবারগুলোর মাঝে খাদ্যসামগ্রী বিতরণ।',1,1,'2026-10-12 11:22:02','2026-10-24 10:08:03'),(4,2,'Clean Water Canister Delivery','বিশুদ্ধ খাবার পানির ক্যানিস্টার সরবরাহ','https://images.unsplash.com/photo-1542810634-71277d95dcbb?auto=format&fit=crop&w=1000&q=80','Delivering potable water jugs and chlorine tablets via boat to stranded households.','নৌকায় করে পানিবন্দী পরিবারগুলোর কাছে সুপেয় পানি ও ক্লোরিন ট্যাবলেট পৌঁছে দেওয়া।',2,1,'2026-10-12 11:22:02','2026-10-24 10:08:03');
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invitation_links`
--

DROP TABLE IF EXISTS `invitation_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invitation_links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `hash` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invitation_links_hash_unique` (`hash`),
  KEY `invitation_links_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invitation_links`
--

LOCK TABLES `invitation_links` WRITE;
/*!40000 ALTER TABLE `invitation_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `invitation_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invitation_referrals`
--

DROP TABLE IF EXISTS `invitation_referrals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invitation_referrals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invitation_link_id` bigint(20) unsigned NOT NULL,
  `referred_user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invitation_referrals_invitation_link_id_index` (`invitation_link_id`),
  KEY `invitation_referrals_referred_user_id_index` (`referred_user_id`),
  CONSTRAINT `invitation_referrals_invitation_link_id_foreign` FOREIGN KEY (`invitation_link_id`) REFERENCES `invitation_links` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invitation_referrals`
--

LOCK TABLES `invitation_referrals` WRITE;
/*!40000 ALTER TABLE `invitation_referrals` DISABLE KEYS */;
/*!40000 ALTER TABLE `invitation_referrals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2022_05_17_181447_create_roles_table',1),(5,'2022_05_17_181456_create_user_roles_table',1),(6,'2024_01_01_000000_create_social_accounts_table',1),(7,'2024_01_01_000001_add_two_factor_columns_to_users_table',1),(8,'2024_01_01_000002_create_invitation_system_tables',1),(9,'2025_01_01_000001_create_media_table',1),(10,'2025_01_01_000001_create_privileges_table',1),(11,'2025_01_01_000002_create_privilege_role_table',1),(12,'2025_01_01_000002_create_starred_import_images_table',1),(13,'2025_01_01_000003_add_suspension_columns_to_users_table',1),(14,'2025_02_08_000000_add_profile_photo_to_users_table',1),(15,'2026_02_15_000000_create_tyro_audit_logs_table',1),(16,'2026_02_20_000000_create_smtp_presets_table',1),(17,'2026_03_01_000000_add_is_favorite_to_tyro_media_table',1),(18,'2026_03_26_000000_create_media_categories_tables',1),(19,'2026_10_12_171037_create_personal_access_tokens_table',2),(20,'2026_10_12_171747_create_categories_table',3),(21,'2026_10_12_171748_create_tags_table',3),(22,'2026_10_12_171749_create_posts_table',3),(23,'2026_10_12_171750_create_projects_table',3),(24,'2026_10_12_171751_create_campaigns_table',3),(25,'2026_10_12_171752_create_campaign_updates_table',3),(26,'2026_10_12_171753_create_gallery_albums_table',3),(27,'2026_10_12_171754_create_gallery_images_table',3),(28,'2026_10_12_171755_create_donations_table',3),(29,'2026_10_12_171756_create_contact_messages_table',3),(30,'2026_10_12_171757_create_site_settings_table',3),(31,'2026_10_12_171758_create_post_tag_table',3),(32,'2026_10_24_160408_add_bangla_fields_to_content_tables',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `tag_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_tag_post_id_tag_id_unique` (`post_id`,`tag_id`),
  KEY `post_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (3,2,1,NULL,NULL),(4,2,7,NULL,NULL),(5,3,1,NULL,NULL),(6,3,7,NULL,NULL);
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `title_bn` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `summary_bn` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `content_bn` longtext DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_user_id_foreign` (`user_id`),
  KEY `posts_category_id_foreign` (`category_id`),
  KEY `posts_is_published_index` (`is_published`),
  KEY `posts_is_featured_index` (`is_featured`),
  KEY `posts_published_at_index` (`published_at`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (2,1,3,'Responding to the Monsoon Crisis: Voices from the Frontlines','বর্ষার বন্যা মোকাবিলা: মাঠপর্যায়ের বাস্তব চিত্র','responding-to-the-monsoon-crisis-voices-from-the-frontlines','Field notes from our emergency disaster relief response team in flooded northeastern villages.','উত্তর-পূর্বাঞ্চলের বন্যাকবলিত প্রত্যন্ত গ্রামগুলো থেকে আমাদের জরুরি ত্রাণদলের মাঠপর্যায়ের অভিজ্ঞতা ও প্রত্যক্ষদর্শীর বিবরণ।','When heavy runoff overwhelmed the local embankment, over 14 villages woke up submerged under chest-high floodwater. Roads turned into rushing streams, cutting off local food reserves. \n\nOur field coordinators, equipped with community engine boats, worked 18-hour shifts packaging and delivering non-perishable food kits, baby essentials, and chlorine purification tablets. \n\nThanks to transparent community donations, every single taka raised translates directly into life-sustaining aid on the ground.','পাহাড়ি ঢলে বাঁধ ভেঙে ১৪টিরও বেশি গ্রাম মুহূর্তের মধ্যে কোমরপানিতে তলিয়ে যায়। সড়কগুলো তীব্র স্রোতে ডুবে যাওয়ায় খাদ্য সরবরাহ সম্পূর্ণ বিচ্ছিন্ন হয়ে পড়ে।\n\nআমাদের মাঠপর্যায়ের কর্মীরা ট্রলার ও ইঞ্জিনচালিত নৌকায় করে একটানা ১৮ ঘণ্টা কাজ করে শুকনো খাবার, শিশুদের প্রয়োজনীয় সামগ্রী এবং ক্লোরিন ট্যাবলেট ঘরে ঘরে পৌঁছে দিয়েছেন।\n\nঅনুদাতাদের স্বচ্ছ সহায়তায় সংগৃহীত প্রতিটি টাকাই সরাসরি মানুষের জীবন রক্ষায় ভূমিকা রেখেছে।',NULL,0,0,'2026-10-09 11:22:02','2026-10-12 11:22:02','2026-10-27 18:47:13'),(3,1,2,'Preventative Healthcare: Why Periodic Village Clinics Matter','প্রতিরোধমূলক স্বাস্থ্যসেবা: গ্রামীণ ভ্রাম্যমাণ ক্যাম্প কেন জরুরি','preventative-healthcare-why-periodic-village-clinics-matter','Preventing chronic ailments before they become life-threatening emergencies through mobile diagnostic camps.','ভ্রাম্যমাণ ডায়াগনস্টিক ক্যাম্পের মাধ্যমে দীর্ঘমেয়াদী জটিল রোগ প্রাণঘাতী হওয়ার আগেই তা সনাক্ত ও প্রতিরোধ করা।','<p>In remote regions, simple conditions like uncontrolled hypertension or undetected type-2 diabetes routinely evolve into debilitating strokes and kidney failure simply due to a lack of routine testing.\r\n\r\nOur Niramoy Mobile Clinics deliver point-of-care diagnostics, prescription medicine, and dietary health literacy directly to villagers\' doorsteps, proving that preventative primary healthcare saves both lives and catastrophic medical debt.</p>','<p>প্রত্যন্ত অঞ্চলে উচ্চ রক্তচাপ বা ডায়াবেটিসের মতো সাধারণ অসুখও নিয়মিত পরীক্ষার অভাবে পরবর্তীতে স্ট্রোক বা কিডনি বিকল হওয়ার মতো জটিলতায় রূপ নেয়।\r\n\r\nআমাদের নিরাময় ভ্রাম্যমাণ ক্লিনিক রোগীদের ঘরের কাছেই পরীক্ষা-নিরীক্ষা, প্রয়োজনীয় ওষুধ ও খাদ্যাভ্যাস বিষয়ক পরামর্শ প্রদান করে। এটি প্রমাণ করে যে প্রাথমিক প্রতিরোধমূলক সেবা জীবন বাঁচায় এবং পরিবারকে চিকিৎসার বিশাল ঋণের বোঝা থেকে রক্ষা করে।</p>',NULL,1,0,'2026-09-30 11:22:02','2026-10-12 11:22:02','2026-10-27 18:33:43');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privilege_role`
--

DROP TABLE IF EXISTS `privilege_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privilege_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `privilege_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `privilege_role_role_id_privilege_id_unique` (`role_id`,`privilege_id`),
  KEY `privilege_role_privilege_id_foreign` (`privilege_id`),
  CONSTRAINT `privilege_role_privilege_id_foreign` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`id`) ON DELETE CASCADE,
  CONSTRAINT `privilege_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privilege_role`
--

LOCK TABLES `privilege_role` WRITE;
/*!40000 ALTER TABLE `privilege_role` DISABLE KEYS */;
INSERT INTO `privilege_role` VALUES (1,1,1,'2026-10-12 11:10:37','2026-10-12 11:10:37'),(2,6,1,'2026-10-12 11:10:37','2026-10-12 11:10:37'),(3,1,2,'2026-10-12 11:10:37','2026-10-12 11:10:37'),(4,6,2,'2026-10-12 11:10:37','2026-10-12 11:10:37'),(5,6,3,'2026-10-12 11:10:37','2026-10-12 11:10:37'),(6,1,4,'2026-10-12 11:10:37','2026-10-12 11:10:37'),(7,2,4,'2026-10-12 11:10:37','2026-10-12 11:10:37'),(8,5,5,'2026-10-12 11:10:37','2026-10-12 11:10:37');
/*!40000 ALTER TABLE `privilege_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privileges`
--

DROP TABLE IF EXISTS `privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privileges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `privileges_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privileges`
--

LOCK TABLES `privileges` WRITE;
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT INTO `privileges` VALUES (1,'Generate Reports','report.generate','Allows generating system-wide reports.','2026-10-12 11:10:37','2026-10-12 11:10:37'),(2,'Manage Users','users.manage','Allows creating, editing, and deleting users.','2026-10-12 11:10:37','2026-10-12 11:10:37'),(3,'Manage Roles','roles.manage','Allows editing Tyro roles.','2026-10-12 11:10:37','2026-10-12 11:10:37'),(4,'View Billing','billing.view','Allows viewing billing statements.','2026-10-12 11:10:37','2026-10-12 11:10:37'),(5,'Wildcard','*','Grants every privilege.','2026-10-12 11:10:37','2026-10-12 11:10:37');
/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_bn` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `summary_bn` text DEFAULT NULL,
  `description` longtext NOT NULL,
  `description_bn` longtext DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ongoing',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `location_bn` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_slug_unique` (`slug`),
  KEY `projects_status_index` (`status`),
  KEY `projects_is_published_index` (`is_published`),
  KEY `projects_is_featured_index` (`is_featured`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Shiksha Alo: Digital Classrooms for Rural Schools','শিক্ষা আলো: প্রত্যন্ত স্কুলের জন্য ডিজিটাল ক্লাসরুম','shiksha-alo-digital-classrooms-for-rural-schools','Equipping primary schools in remote riverine islands with solar power, tablets, and interactive multimedia curricula.','চরাঞ্চলের প্রাথমিক বিদ্যালয়গুলোতে সৌরবিদ্যুৎ, ট্যাবলেট ও মিথস্ক্রিয় মাল্টিমিডিয়া পাঠ্যক্রম সরবরাহ।','The Shiksha Alo initiative transforms under-resourced rural schools by introducing solar-powered smart class kits, digital projectors, and curated Bangla digital learning content. Over the past academic year, the program has brought modern education to 1,200 students across 6 remote schools, bridging the digital divide.','শিক্ষা আলো উদ্যোগটি সৌরশক্তিচালিত স্মার্ট ক্লাস কিট, ডিজিটাল প্রজেক্টর ও মানসম্পন্ন বাংলা ডিজিটাল পাঠ্যসামগ্রী যুক্ত করে গ্রামীণ বিদ্যালয়গুলোর চেহারা বদলে দিয়েছে। বিগত শিক্ষাবর্ষে এই কর্মসূচির মাধ্যমে ৬টি দুর্গম চরের ১,২০০ শিক্ষার্থীর কাছে আধুনিক শিক্ষা পৌঁছে দিয়ে বৈষম্য দূর করা সম্ভব হয়েছে।',NULL,'ongoing','2024-03-01',NULL,'Kurigram & Gaibandha Districts','কুড়িগ্রাম ও গাইবান্ধা জেলা',1,1,'2026-10-12 11:22:02','2026-10-24 10:08:05'),(2,'Niramoy: Mobile Primary Health Clinics','নিরাময়: ভ্রাম্যমাণ প্রাথমিক স্বাস্থ্যসেবা ক্লিনিক','niramoy-mobile-primary-health-clinics','Delivering doorstep primary medical examinations, maternal healthcare, and free prescribed medicines.','দোরগোড়ায় প্রাথমিক স্বাস্থ্য পরীক্ষা, মাতৃত্বকালীন সেবা ও বিনামূল্যে প্রেসক্রিপশন অনুযায়ী ওষুধ বিতরণ।','Our medical team travels monthly across coastal and isolated villages where formal medical centres are hours away. Each clinic provides vital checkups, blood sugar & pressure diagnostics, child nutrition counseling, and maternal wellness kits.','আমাদের চিকিৎসাদল প্রতি মাসে উপকূলীয় ও বিচ্ছিন্ন গ্রামগুলোতে সেবা প্রদান করে, যেখান থেকে হাসপাতাল অনেক দূরে। প্রতিটি ক্যাম্পে প্রয়োজনীয় স্বাস্থ্য পরীক্ষা, রক্তে শর্করার পরিমাণ ও রক্তচাপ নির্ণয়, শিশুদের পুষ্টি পরামর্শ এবং মায়েদের স্বাস্থ্য সুরক্ষা কিট দেওয়া হয়।',NULL,'ongoing','2023-11-15',NULL,'Satkhira & Khulna Coastal Belt','সাতক্ষীরা ও খুলনা উপকূলীয় অঞ্চল',1,1,'2026-10-12 11:22:02','2026-10-24 10:08:05'),(3,'Clean Water Wells & Sanitation Hubs','নিরাপদ পানির নলকূপ ও স্যানিটেশন হাব','clean-water-wells-sanitation-hubs','Installing deep tubewells and hygienic sanitation blocks in arsenic-affected villages.','আর্সেনিক ও লবণাক্ততাপ্রবণ গ্রামগুলোতে গভীর নলকূপ ও স্বাস্থ্যসম্মত স্যানিটেশন ব্লক স্থাপন।','Safe drinking water remains an acute challenge in salinity and arsenic-prone regions. Abhedya Foundation constructed 24 deep arsenic-free tubewells and sanitary facilities serving over 6,000 villagers daily, drastically curbing waterborne diseases.','উপকূলীয় অঞ্চলে নিরাপদ খাবার পানি একটি মারাত্মক সংকট। অভেদ্য ফাউন্ডেশন ২৪টি আর্সেনিকমুক্ত গভীর নলকূপ ও স্বাস্থ্যসম্মত স্যানিটেশন সুবিধা তৈরি করেছে, যা প্রতিদিন ৬,০০০-এর বেশি মানুষকে সেবা দিচ্ছে এবং পানিবাহিত রোগ উল্লেখযোগ্য হারে কমিয়েছে।',NULL,'completed','2023-01-10','2024-02-28','Bagerhat & Chandpur','বাগেরহাট ও চাঁদপুর',1,0,'2026-10-12 11:22:02','2026-10-24 10:08:05'),(4,'Prerona: Vocational Tailoring & Micro-Grants for Widows','প্রেরণা: বিধবাদের জন্য সেলাই প্রশিক্ষণ ও ক্ষুদ্র অনুদান','prerona-vocational-tailoring-micro-grants-for-widows','Equipping marginalized women with sewing machines and entrepreneurial skills to ensure dignified income.','অসহায় নারীদের সেলাই মেশিন ও উদ্যোক্তা প্রশিক্ষণ প্রদান করে মর্যাদাপূর্ণ আয়ের ব্যবস্থা করা।','Through an intensive 6-week tailoring and financial literacy boot camp, 80 women received sewing machinery and startup fabric kits. Graduates now generate stable household income through local garment repairs and school uniform orders.','নিবিড় ৬ সপ্তাহের সেলাই ও আর্থিক ব্যবস্থাপনা প্রশিক্ষণের মাধ্যমে ৮০ জন নারীকে সেলাই মেশিন ও কাপড় তৈরির প্রাথমিক সামগ্রী দেওয়া হয়েছে। প্রশিক্ষণপ্রাপ্ত নারীরা এখন স্থানীয় পোশাক তৈরি ও স্কুলের ইউনিফর্ম সেলাই করে নিজেদের পরিবারে নিয়মিত আয় নিশ্চিত করছেন।',NULL,'completed','2023-06-01','2023-12-15','Bogura & Sirajganj','বগুড়া ও সিরাজগঞ্জ',1,0,'2026-10-12 11:22:02','2026-10-24 10:08:05');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator','admin','2026-10-12 11:10:37','2026-10-12 11:10:37'),(2,'User','user','2026-10-12 11:10:37','2026-10-12 11:10:37'),(3,'Customer','customer','2026-10-12 11:10:37','2026-10-12 11:10:37'),(4,'Editor','editor','2026-10-12 11:10:37','2026-10-12 11:10:37'),(5,'All','*','2026-10-12 11:10:37','2026-10-12 11:10:37'),(6,'Super Admin','super-admin','2026-10-12 11:10:37','2026-10-12 11:10:37');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('7Eip0vJFdYH0WC7GaKMnqJ1B3e3LNJLSfr67ZvT6',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.9711','eyJfdG9rZW4iOiJPM2NPYlhQZDl6NVc5bWZDdVR3NXFEaEl3MGFOakpwVnJBSnpzQkpWIiwidHlyby1sb2dpbiI6eyJjYXB0Y2hhIjp7ImxvZ2luIjo4fX0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvbG9naW4iLCJyb3V0ZSI6InR5cm8tbG9naW4ubG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1793123685),('8QAoSmyt5OuwGoMZlj2V9NbRi6UzaCSEuNTNxdVd',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJpQWV4d3Q4ZG5qdThlZmNKVGp4cng5ZXJIZ0dCcGc3eUtmblNCbWtCIiwidHlyby1sb2dpbiI6eyJjYXB0Y2hhIjp7ImxvZ2luIjoyfX0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMCIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1793125126),('aVazwolZrp88MJTlsNx169Od1OQETyjfY0LBUMX9',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.9711','eyJfdG9rZW4iOiJWcWQ0ckNLd2JiNlhLbzhvZjVSNnBsQ1h3OEo4c2thcUJXYmQ4NlRoIiwidHlyby1sb2dpbiI6eyJjYXB0Y2hhIjp7ImxvZ2luIjoyfX0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYWRtaW5cL2xvZ2luIiwicm91dGUiOiJhZG1pbi5sb2dpbiJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1793123949),('gNHxLUjvS9BXbjLPI1hOagYB9j0oT9FQq9Zxzygn',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0','eyJfdG9rZW4iOiI4bzFKaVBxN0pNSHljckQzR3NPb3hGU2dsOTBHZFN2bmJEc1VLd2tGIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1793124003),('ipGGhz6Y1BaWwPah6rQVKf3uLGgGjGt09YzQwqkm',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJqS2RsZ0ZlcElqNEdhQ3ZDa2hHT0FhV2J6VmJjeW15YjhCRGxSeFV4IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ0eXJvLWxvZ2luIjp7ImNhcHRjaGEiOnsibG9naW4iOjExfX0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC9wb3J0YWwubG9jYWxob3N0OjgwMDBcL2xvZ2luIiwicm91dGUiOiJ0eXJvLWxvZ2luLmxvZ2luIn19',1793127273),('k2BpZsvwGtqNCuGuYAv9QhRo8PL9k81JYnXOIArw',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0','eyJfdG9rZW4iOiJFR2U0anN4Zzl3S0c0dWE4eFNoeHlqazVCMnJybWxvN05JN1h3Ym1LIiwidHlyby1sb2dpbiI6eyJjYXB0Y2hhIjp7ImxvZ2luIjoyfX0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC9wb3J0YWwubG9jYWxob3N0OjgwMDBcL2xvZ2luIiwicm91dGUiOiJ0eXJvLWxvZ2luLmxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1793124006),('Pt0xwHLKVxdITbUDh3gI67oiD9wURqfzHqTgotbb',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.9711','eyJfdG9rZW4iOiJQSTBTNjFZNVl1N0hMcjYwY2toZ2paMXZUcmlNc0JUa2RockxMS2hlIiwidHlyby1sb2dpbiI6eyJjYXB0Y2hhIjp7ImxvZ2luIjoyfX0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvbG9naW4/YWRtaW49MSIsInJvdXRlIjoidHlyby1sb2dpbi5sb2dpbiJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1793123695),('vIDYkFQFiKwmOqZwnOeHnnsbp8m2UsXgAtQ7E5Gw',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJPR2dtUmd1aFpTMk5Ma3BIb1BxeFBObmw4SHM1MXEyNnVRTUR1MHJkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwidHlyby1sb2dpbiI6eyJjYXB0Y2hhIjp7ImxvZ2luIjo1fX0sImxvY2FsZSI6ImJuIn0=',1793126156);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_settings_key_unique` (`key`),
  KEY `site_settings_group_index` (`group`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES (1,'site_name','Site Name','Abhedya Foundation','text','general','2026-10-12 11:22:02','2026-10-12 11:22:02'),(2,'site_tagline','Tagline','Empowering Communities, Transforming Lives with Dignity and Hope','text','general','2026-10-12 11:22:02','2026-10-12 11:22:02'),(3,'about_short','Short Introduction','Abhedya Foundation is dedicated to driving sustainable humanitarian progress, educational upliftment, and community resilience across underserved regions.','textarea','general','2026-10-12 11:22:02','2026-10-12 11:22:02'),(4,'mission','Our Mission','To uplift marginalized communities by delivering high-impact educational initiatives, essential healthcare access, emergency relief, and sustainable livelihood opportunities.','textarea','general','2026-10-12 11:22:02','2026-10-12 11:22:02'),(5,'vision','Our Vision','A just, compassionate society where every individual has equal opportunities to thrive with self-reliance, security, and human dignity.','textarea','general','2026-10-12 11:22:02','2026-10-12 11:22:02'),(6,'stat_projects','Projects Completed','48','text','stats','2026-10-12 11:22:02','2026-10-12 11:22:02'),(7,'stat_beneficiaries','Lives Impacted','35,000+','text','stats','2026-10-12 11:22:02','2026-10-12 11:22:02'),(8,'stat_volunteers','Dedicated Volunteers','450+','text','stats','2026-10-12 11:22:02','2026-10-12 11:22:02'),(9,'stat_districts','Districts Covered','14','text','stats','2026-10-12 11:22:02','2026-10-12 11:22:02'),(10,'contact_email','Official Email','info@abhedyafoundation.org','text','contact','2026-10-12 11:22:02','2026-10-12 11:22:02'),(11,'contact_phone','Contact Telephone','+880 1518-913960','text','contact','2026-10-12 11:22:02','2026-10-23 14:28:14'),(12,'contact_address','Office Address','House 1, Road 3, Block C, Section 10, Mirpur, Dhaka-1216, Bangladesh','text','contact','2026-10-12 11:22:02','2026-10-24 10:53:04'),(13,'social_facebook','Facebook URL','https://facebook.com/abhedyafoundation','text','social','2026-10-12 11:22:02','2026-10-12 11:22:02'),(14,'social_twitter','Twitter/X URL','https://twitter.com/abhedya_bd','text','social','2026-10-12 11:22:02','2026-10-12 11:22:02'),(15,'social_linkedin','LinkedIn URL','https://linkedin.com/company/abhedyafoundation','text','social','2026-10-12 11:22:02','2026-10-12 11:22:02'),(16,'social_youtube','YouTube Channel','https://youtube.com/@abhedyafoundation','text','social','2026-10-12 11:22:02','2026-10-12 11:22:02'),(17,'donation_bkash_number','bKash Merchant/Personal Number','01518913960','text','donation','2026-10-12 11:22:02','2026-10-24 05:16:58'),(18,'donation_nagad_number','Nagad Number','01518913960','text','donation','2026-10-12 11:22:02','2026-10-24 05:17:11'),(19,'donation_rocket_number','Rocket Number','01518913960','text','donation','2026-10-12 11:22:02','2026-10-24 05:17:23'),(20,'donation_bank_details','Bank Transfer Details','Bank Name: BRAC Bank PLC\r\nAccount Name: ABHEDYA FOUNDATION\r\nAccount No: 1054859470001\r\nBranch: MOHAKHALI BRANCH\r\nRouting No: 060261384','textarea','donation','2026-10-12 11:22:02','2026-10-24 05:19:07'),(21,'donation_guidelines','Donor Instructions','After completing your transfer via bKash, Nagad, Rocket, or Bank, please submit your transaction details below. Our team verifies every record before marking donations as confirmed.','textarea','donation','2026-10-12 11:22:02','2026-10-24 05:19:23'),(22,'contact_address_bn','অফিসের ঠিকানা (বাংলা)','বাড়ি ১, রোড ৩, ব্লক সি, সেকশন ১০, মিরপুর, ঢাকা-১২১৬, বাংলাদেশ','text','contact','2026-10-24 10:08:05','2026-10-24 10:53:04'),(23,'donation_bank_details_bn','ব্যাংক হিসাবের বিবরণ (বাংলা)','ব্যাংকের নাম: ব্র্যাক ব্যাংক পিএলসি\r\nহিসাবের নাম: অভেদ্য ফাউন্ডেশন\r\nহিসাব নং: ১০৫৪৮৫৯৪৭০০০১\r\nশাখা: মহাখালী শাখা\r\nরাউটিং নং: ০৬০২৬১৩৮৪','text','donation','2026-10-24 10:08:05','2026-10-24 10:08:05'),(24,'donation_guidelines_bn','অনুদানের নিয়মাবলী (বাংলা)','বিকাশ, নগদ, রকেট বা ব্যাংকের মাধ্যমে আপনার অনুদান পাঠানোর পর, অনুগ্রহ করে নিচের ফর্মে আপনার ট্রানজ্যাকশন আইডি ও বিস্তারিত তথ্য জমা দিন। আমাদের টিম যাচাই-বাছাই করে আপনার অনুদান নিশ্চিত করবে।','text','donation','2026-10-24 10:08:05','2026-10-24 10:08:05');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_user_id` varchar(255) NOT NULL,
  `provider_email` varchar(255) DEFAULT NULL,
  `provider_avatar` varchar(255) DEFAULT NULL,
  `access_token` text DEFAULT NULL,
  `refresh_token` text DEFAULT NULL,
  `token_expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `social_accounts_provider_provider_user_id_unique` (`provider`,`provider_user_id`),
  KEY `social_accounts_provider_provider_user_id_index` (`provider`,`provider_user_id`),
  KEY `social_accounts_user_id_index` (`user_id`),
  CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_accounts`
--

LOCK TABLES `social_accounts` WRITE;
/*!40000 ALTER TABLE `social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Scholarship','scholarship','2026-10-12 11:22:02','2026-10-12 11:22:02'),(2,'Flood Relief','flood-relief','2026-10-12 11:22:02','2026-10-12 11:22:02'),(3,'Winter Drive','winter-drive','2026-10-12 11:22:02','2026-10-12 11:22:02'),(4,'Free Clinic','free-clinic','2026-10-12 11:22:02','2026-10-12 11:22:02'),(5,'Women in Tech','women-in-tech','2026-10-12 11:22:02','2026-10-12 11:22:02'),(6,'Clean Water','clean-water','2026-10-12 11:22:02','2026-10-12 11:22:02'),(7,'Child Welfare','child-welfare','2026-10-12 11:22:02','2026-10-12 11:22:02');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tyro_audit_logs`
--

DROP TABLE IF EXISTS `tyro_audit_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tyro_audit_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `event` varchar(255) NOT NULL,
  `auditable_type` varchar(255) DEFAULT NULL,
  `auditable_id` bigint(20) unsigned DEFAULT NULL,
  `old_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`old_values`)),
  `new_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`new_values`)),
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `tyro_audit_logs_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  KEY `tyro_audit_logs_user_id_index` (`user_id`),
  KEY `tyro_audit_logs_event_index` (`event`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tyro_audit_logs`
--

LOCK TABLES `tyro_audit_logs` WRITE;
/*!40000 ALTER TABLE `tyro_audit_logs` DISABLE KEYS */;
INSERT INTO `tyro_audit_logs` VALUES (1,NULL,'role.created','HasinHayder\\Tyro\\Models\\Role',1,NULL,'{\"slug\":\"admin\",\"name\":\"Administrator\",\"id\":1}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(2,NULL,'role.created','HasinHayder\\Tyro\\Models\\Role',2,NULL,'{\"slug\":\"user\",\"name\":\"User\",\"id\":2}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(3,NULL,'role.created','HasinHayder\\Tyro\\Models\\Role',3,NULL,'{\"slug\":\"customer\",\"name\":\"Customer\",\"id\":3}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(4,NULL,'role.created','HasinHayder\\Tyro\\Models\\Role',4,NULL,'{\"slug\":\"editor\",\"name\":\"Editor\",\"id\":4}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(5,NULL,'role.created','HasinHayder\\Tyro\\Models\\Role',5,NULL,'{\"slug\":\"*\",\"name\":\"All\",\"id\":5}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(6,NULL,'role.created','HasinHayder\\Tyro\\Models\\Role',6,NULL,'{\"slug\":\"super-admin\",\"name\":\"Super Admin\",\"id\":6}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(7,NULL,'system.seeded',NULL,NULL,NULL,'{\"type\":\"roles\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(8,NULL,'privilege.created','HasinHayder\\Tyro\\Models\\Privilege',1,NULL,'{\"slug\":\"report.generate\",\"name\":\"Generate Reports\",\"description\":\"Allows generating system-wide reports.\",\"id\":1}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(9,NULL,'privilege.created','HasinHayder\\Tyro\\Models\\Privilege',2,NULL,'{\"slug\":\"users.manage\",\"name\":\"Manage Users\",\"description\":\"Allows creating, editing, and deleting users.\",\"id\":2}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(10,NULL,'privilege.created','HasinHayder\\Tyro\\Models\\Privilege',3,NULL,'{\"slug\":\"roles.manage\",\"name\":\"Manage Roles\",\"description\":\"Allows editing Tyro roles.\",\"id\":3}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(11,NULL,'privilege.created','HasinHayder\\Tyro\\Models\\Privilege',4,NULL,'{\"slug\":\"billing.view\",\"name\":\"View Billing\",\"description\":\"Allows viewing billing statements.\",\"id\":4}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(12,NULL,'privilege.created','HasinHayder\\Tyro\\Models\\Privilege',5,NULL,'{\"slug\":\"*\",\"name\":\"Wildcard\",\"description\":\"Grants every privilege.\",\"id\":5}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(13,NULL,'system.seeded',NULL,NULL,NULL,'{\"type\":\"privileges\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(14,NULL,'system.installed',NULL,NULL,NULL,NULL,'{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:10:37'),(15,NULL,'system.seeded',NULL,NULL,NULL,'{\"type\":\"full\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-12 17:11:40'),(16,NULL,'role.attached','App\\Models\\User',2,NULL,'{\"role_id\":2,\"role_slug\":\"user\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 17:13:31'),(17,2,'user.login','App\\Models\\User',2,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 17:13:31'),(18,2,'user.logout','App\\Models\\User',2,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 17:14:49'),(19,2,'user.login','App\\Models\\User',2,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 17:14:56'),(20,2,'user.logout','App\\Models\\User',2,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 17:15:13'),(21,2,'user.login','App\\Models\\User',2,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 17:56:11'),(22,2,'user.logout','App\\Models\\User',2,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 18:07:20'),(23,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@tyro.project\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 18:18:37'),(24,1,'user.email_changed','App\\Models\\User',1,'{\"email\":\"admin@tyro.project\"}','{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 18:35:05'),(25,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 18:35:28'),(26,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 18:35:35'),(27,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 18:49:19'),(28,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 18:50:05'),(29,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 18:57:48'),(30,NULL,'role.attached','App\\Models\\User',3,NULL,'{\"role_id\":2,\"role_slug\":\"user\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 19:04:45'),(31,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 19:04:45'),(32,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 19:05:07'),(33,3,'user.logout','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 19:09:31'),(34,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 19:09:35'),(35,3,'user.logout','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 19:09:41'),(36,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 19:09:55'),(37,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 19:10:28'),(38,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/154.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-12 19:12:46'),(39,3,'user.logout','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/18.5 Mobile\\/15E148 Safari\\/604.1\",\"is_console\":false}','2026-10-12 19:27:55'),(40,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-14 17:50:58'),(41,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/155.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-14 17:52:01'),(42,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 11:15:23'),(43,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 11:20:47'),(44,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 11:21:31'),(45,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 11:22:57'),(46,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 11:27:23'),(47,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"103.124.249.230\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 10; K) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/145.0.0.0 Mobile Safari\\/537.36\",\"is_console\":false}','2026-10-24 11:31:54'),(48,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"103.124.249.230\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 10; K) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/145.0.0.0 Mobile Safari\\/537.36\",\"is_console\":false}','2026-10-24 11:33:27'),(49,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 15:41:59'),(50,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 15:42:16'),(51,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 16:01:09'),(52,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 16:28:18'),(53,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 16:57:22'),(54,3,'user.logout','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:00:02'),(55,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:12:10'),(56,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:12:27'),(57,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:15:30'),(58,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:15:40'),(59,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:15:45'),(60,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:15:53'),(61,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:18:34'),(62,3,'user.logout','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:20:19'),(63,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:20:26'),(64,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:21:03'),(65,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:23:16'),(66,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:27:41'),(67,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:28:36'),(68,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:28:50'),(69,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:28:50'),(70,3,'user.logout','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:29:16'),(71,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:49:43'),(72,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:52:02'),(73,3,'user.logout','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 17:56:26'),(74,1,'user.logout','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-24 18:02:34'),(75,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-25 07:14:49'),(76,3,'user.logout','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-25 07:15:02'),(77,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-25 11:37:30'),(78,3,'user.logout','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-25 11:37:56'),(79,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-27 17:33:15'),(80,3,'user.logout','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-27 17:57:29'),(81,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-27 18:33:04'),(82,3,'user.logout','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-27 18:34:09'),(83,3,'user.login','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-27 18:34:32'),(84,1,'user.login','App\\Models\\User',1,NULL,'{\"email\":\"admin@abhedya.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Symfony\",\"is_console\":true}','2026-10-27 18:47:12'),(85,3,'user.logout','App\\Models\\User',3,NULL,'{\"email\":\"niloyahsan.official@gmail.com\"}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/156.0.0.0 Safari\\/537.36\",\"is_console\":false}','2026-10-27 18:54:33');
/*!40000 ALTER TABLE `tyro_audit_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tyro_media`
--

DROP TABLE IF EXISTS `tyro_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tyro_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `webp_path` varchar(255) DEFAULT NULL,
  `thumbnail_path` varchar(255) DEFAULT NULL,
  `disk` varchar(50) NOT NULL DEFAULT 'public',
  `mime_type` varchar(100) NOT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `is_favorite` tinyint(1) NOT NULL DEFAULT 0,
  `source_url` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tyro_media_user_id_foreign` (`user_id`),
  KEY `tyro_media_is_favorite_index` (`is_favorite`),
  CONSTRAINT `tyro_media_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tyro_media`
--

LOCK TABLES `tyro_media` WRITE;
/*!40000 ALTER TABLE `tyro_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `tyro_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tyro_media_categories`
--

DROP TABLE IF EXISTS `tyro_media_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tyro_media_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(180) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tyro_media_categories_user_id_slug_index` (`user_id`,`slug`),
  CONSTRAINT `tyro_media_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tyro_media_categories`
--

LOCK TABLES `tyro_media_categories` WRITE;
/*!40000 ALTER TABLE `tyro_media_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `tyro_media_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tyro_media_category_media`
--

DROP TABLE IF EXISTS `tyro_media_category_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tyro_media_category_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `media_category_id` bigint(20) unsigned NOT NULL,
  `media_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_category_media_unique` (`media_category_id`,`media_id`),
  KEY `tyro_media_category_media_media_id_foreign` (`media_id`),
  CONSTRAINT `tyro_media_category_media_media_category_id_foreign` FOREIGN KEY (`media_category_id`) REFERENCES `tyro_media_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tyro_media_category_media_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `tyro_media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tyro_media_category_media`
--

LOCK TABLES `tyro_media_category_media` WRITE;
/*!40000 ALTER TABLE `tyro_media_category_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `tyro_media_category_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tyro_smtp_presets`
--

DROP TABLE IF EXISTS `tyro_smtp_presets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tyro_smtp_presets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mailer` varchar(255) NOT NULL DEFAULT 'smtp',
  `host` varchar(255) NOT NULL DEFAULT '',
  `port` smallint(5) unsigned NOT NULL DEFAULT 587,
  `encryption` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `from_address` varchar(255) DEFAULT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tyro_smtp_presets_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tyro_smtp_presets`
--

LOCK TABLES `tyro_smtp_presets` WRITE;
/*!40000 ALTER TABLE `tyro_smtp_presets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tyro_smtp_presets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tyro_starred_import_images`
--

DROP TABLE IF EXISTS `tyro_starred_import_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tyro_starred_import_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `star_key` varchar(64) NOT NULL,
  `provider` varchar(50) NOT NULL,
  `external_id` varchar(255) DEFAULT NULL,
  `alt` text DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `thumb_url` varchar(2048) DEFAULT NULL,
  `preview_url` varchar(2048) DEFAULT NULL,
  `download_url` varchar(2048) DEFAULT NULL,
  `download_location` varchar(2048) DEFAULT NULL,
  `source_url` varchar(2048) DEFAULT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`payload`)),
  `starred_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tyro_starred_import_images_user_id_star_key_unique` (`user_id`,`star_key`),
  KEY `tyro_starred_import_images_user_id_starred_at_index` (`user_id`,`starred_at`),
  CONSTRAINT `tyro_starred_import_images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tyro_starred_import_images`
--

LOCK TABLES `tyro_starred_import_images` WRITE;
/*!40000 ALTER TABLE `tyro_starred_import_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `tyro_starred_import_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_roles_user_id_role_id_unique` (`user_id`,`role_id`),
  KEY `user_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,1,1,'2026-10-12 11:11:40','2026-10-12 11:11:40'),(3,3,2,'2026-10-12 13:04:45','2026-10-12 13:04:45'),(4,3,1,NULL,NULL);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `suspension_reason` text DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `use_gravatar` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Abhedya Admin','admin@abhedya.com',NULL,'$2y$12$gwvHD/50wbj/y2sco2IRTu7IqGaZ0/JDwnqJwCSzxXj8q5N1FxNqy',NULL,NULL,NULL,'Li5yGC6xnWaTDdpK20NVwYRGDsvfCsj7JLpyFQYbZBcnpUYCKXgZKA1FUqi6','2026-10-12 11:11:40','2026-10-12 12:35:26',NULL,NULL,NULL,0),(3,'Niloy Ahsan','niloyahsan.official@gmail.com',NULL,'$2y$12$aGyQTA8LtaJaagevJDfy6uvfvYK0p039a7Q0E2BpWFgk2GTFQBnFq',NULL,NULL,NULL,'pBawI0wSOw2qsCFL5RxwP5ZogHz7fKrrty08gQTidFOcFzU3L1Z4S9hYo9VN','2026-10-12 13:04:45','2026-10-12 13:04:45',NULL,NULL,NULL,0);
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

-- Dump completed on 2026-10-28  0:56:43
