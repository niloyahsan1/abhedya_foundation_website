-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2026 at 10:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abhedya_foundation`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('abhedya-foundation-cache-tyro_dashboard_heartbeat_3', 'i:1795555161;', 1795555761),
('abhedya-foundation-cache-tyro:user-3:roles', 'a:2:{i:0;s:5:\"admin\";i:1;s:4:\"user\";}', 1795555558),
('abhedya-foundation-cache-tyro:user-5:roles', 'a:2:{i:0;s:5:\"admin\";i:1;s:4:\"user\";}', 1795555323);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `title`, `title_bn`, `slug`, `short_description`, `short_description_bn`, `description`, `description_bn`, `featured_image`, `target_amount`, `start_date`, `end_date`, `status`, `is_featured`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'Hearing Support for All', 'সবার জন্য শ্রবণ সহায়তা', 'hearing-support', 'Supporting individuals with hearing difficulties through accessible hearing screening, hearing aids, and essential hearing support services to improve communication, independence, and social inclusion.', 'শ্রবণসমস্যায় থাকা মানুষের জন্য বিনামূল্যে হিয়ারিং স্ক্রিনিং, শ্রবণসহায়ক যন্ত্র এবং প্রয়োজনীয় শ্রবণসহায়তা নিশ্চিত করার মাধ্যমে যোগাযোগ, স্বনির্ভরতা ও সামাজিক অন্তর্ভুক্তির সুযোগ সম্প্রসারণে কাজ করা।', '<p>Access to hearing healthcare and assistive technology is essential for communication, education, and meaningful participation in society. However, many individuals, particularly those from economically disadvantaged communities, face financial and social barriers to accessing hearing screening services and hearing aids.</p><p>Through the Hearing Support for All campaign, <strong>Abhedya Foundation</strong> aims to make essential hearing support services more accessible to individuals who need them. The campaign focuses on facilitating free hearing screening, providing hearing aid assistance, promoting hearing health awareness, and connecting individuals with appropriate hearing healthcare services.</p><p>We believe that access to hearing support can create meaningful opportunities for individuals to communicate more effectively, participate in education and employment, and lead more independent lives.</p><p><br></p><p><strong>Objectives</strong></p><ol><li>Improve access to hearing screening and essential hearing support services.</li><li>Facilitate hearing aid assistance for individuals in need.</li><li>Promote awareness of hearing health and early identification of hearing difficulties.</li><li>Reduce financial barriers to hearing support services.</li><li>Encourage communication accessibility and social inclusion.</li></ol><p><strong>Key Activities</strong></p><ul><li>Free community-based hearing screening camps.</li><li>Distribution of hearing aids to eligible beneficiaries.</li><li>Hearing health awareness programmes.</li><li>Referral and linkage with hearing healthcare professionals.</li><li>Follow-up support and guidance for hearing aid users.</li></ul><p><strong>Expected Impact</strong></p><ul><li>Improved access to hearing support services.</li><li>Increased opportunities for communication and social participation.</li><li>Reduced barriers to hearing healthcare.</li><li>Improved awareness of hearing health within communities.</li><li>Greater independence and inclusion for individuals with hearing difficulties.</li></ul>', '<p>যোগাযোগ, শিক্ষা এবং সমাজের বিভিন্ন ক্ষেত্রে অর্থবহ অংশগ্রহণের জন্য শ্রবণস্বাস্থ্যসেবা ও সহায়ক প্রযুক্তির প্রাপ্যতা অত্যন্ত গুরুত্বপূর্ণ। কিন্তু আর্থিক সীমাবদ্ধতা, সচেতনতার অভাব এবং প্রয়োজনীয় সেবার অপ্রতুলতার কারণে অনেক মানুষ, বিশেষ করে সুবিধাবঞ্চিত জনগোষ্ঠী, প্রয়োজনীয় হিয়ারিং স্ক্রিনিং ও শ্রবণসহায়ক যন্ত্র গ্রহণের সুযোগ থেকে বঞ্চিত হন।</p><p>এই বাস<strong>অভেদ্য ফাউন্ডেশন</strong> পরিচালনা করছে <strong>Hearing Support for All </strong>ক্যাম্পেইন। এর মাধ্যমে শ্রবণসমস্যায় থাকা মানুষের জন্য বিনামূল্যে হিয়ারিং স্ক্রিনিং, শ্রবণসহায়ক যন্ত্র প্রদানে সহায়তা, শ্রবণস্বাস্থ্য বিষয়ে সচেতনতা এবং প্রয়োজনীয় স্বাস্থ্যসেবার সঙ্গে সংযোগ স্থাপনের উদ্যোগ নেওয়া হয়।</p><p>আমরা বিশ্বাস করি, যথাযথ শ্রবণসহায়তা একজন মানুষের যোগাযোগের সক্ষমতা বৃদ্ধি, শিক্ষা ও কর্মক্ষেত্রে অংশগ্রহণ এবং অধিকতর স্বাধীন জীবনযাপনের সুযোগ সুযোগ তৈরি করত</p><p><br></p><p><strong>প্রধান উদ্দেশ্যসমূহ</strong></p><ul><li>হিয়ারিং স্ক্রিনিং ও প্রয়োজনীয় শ্রবণসহায়তা।</li><li>প্রয়োজন অনুযায়ী শ্রবণসহায়ক যন্ত্র প্রদানে সহযোগিতা করা।</li><li>শ্রবণস্বাস্থ্য ও প্রাথমিক শনাক্তকরণ বিষয়ে সচেতনতা বৃদ্ধি।</li><li>শ্রবণস্বাস্থ্যসেবা গ্রহণের আর্থিক প্রতিবন্ধকতা হ্রাস।</li><li>যোগাযোগের প্রবেশগম্যতা ও সামাজিক অন্তর্ভুক্তি</li></ul><p><strong>প্রধান কার্যক্রম</strong></p><ul><li>বিনামূল্যে হিয়ারিং স্ক্রিনিং ক্যাম্প আয়োজন।</li><li>উপযুক্ত উপকারভোগীদের শ্রবণসহায়ক যন্ত্র প্রদান।</li><li>শ্রবণস্বাস্থ্য বিষয়ক সচেতনতামূলক কার্যক্রম।</li><li>শ্রবণস্বাস্থ্য পেশাজীবীদের সঙ্গে সংযোগ স্থাপন।</li><li>হিয়ারিং এইড ব্যবহারকারীদের প্রয়োজনীয় পরামর্শ ও ফল</li></ul><p><strong>প্রত্যাশিত প্রভাব</strong></p><ul><li>শ্রবণসহায়তা সেবায় প্রবেশাধিকার বৃদ্ধি।</li><li>যোগাযোগ ও সামাজিক অংশগ্রহণের সুযোগ সম্প্রসারণ।</li><li>শ্রবণস্বাস্থ্যসেবা গ্রহণের প্রতিবন্ধকতা হ্রাস।</li><li>কমিউনিটি পর্যায়ে শ্রবণস্বাস্থ্য বিষয়ে সচেতনতা বৃদ্ধি।</li></ul><p><br></p><p><br></p>', NULL, 200000.00, NULL, NULL, 'active', 1, 1, '2026-10-12 11:22:02', '2026-11-24 21:03:04'),
(2, 'Inclusive Education for Every Child', 'প্রতিটি শিশুর জন্য অন্তর্ভুক্তিমূলক শিক্ষা', 'education-inclusion-all', 'Promoting equal access to quality education for every child by supporting inclusive learning environments, reducing educational barriers, and ensuring meaningful participation of children with disabilities.', 'প্রতিবন্ধী শিশুদের শিক্ষায় সমান সুযোগ নিশ্চিত করা, শিক্ষাগত প্রতিবন্ধকতা হ্রাস করা এবং অন্তর্ভুক্তিমূলক শিক্ষার পরিবেশ গড়ে তোলার মাধ্যমে প্রতিটি শিশুর অর্থবহ শিক্ষায় অংশগ্রহণের সুযোগ সম্প্রসারণ।', '<p>Every child deserves the opportunity to learn, grow, and reach their full potential, regardless of disability, background, or individual learning needs. Yet, many children with disabilities continue to face barriers to accessing quality education due to inaccessible learning environments, inadequate educational support, and social stigma.</p><p>Through the Inclusive Education for Every Child campaign, <strong>Abhedya Foundation</strong> seeks to promote educational equity by supporting inclusive learning opportunities for children with disabilities.</p><p>The campaign emphasizes awareness-building, inclusive educational practices, teacher and caregiver sensitization, accessible learning resources, and appropriate educational support. We aim to encourage schools, families, and communities to recognize the diverse learning needs of children and create environments where every child can participate and learn with dignity.</p><p><strong>Objectives</strong></p><ol><li>Promote equal educational opportunities for children with disabilities.</li><li>Encourage inclusive teaching and learning practices.</li><li>Increase awareness among teachers, parents, and communities.</li><li>Support access to appropriate learning materials and educational resources.</li><li>Reduce discrimination and barriers to educational participation.</li></ol><p><strong>Key Activities</strong></p><ul><li>Inclusive education awareness programmes.</li><li>Teacher and caregiver orientation.</li><li>Educational support and learning material assistance.</li><li>Promotion of accessible and inclusive classrooms.</li><li>Community engagement to encourage school participation.</li></ul><p><strong>Expected Impact</strong></p><ul><li>Increased educational participation of children with disabilities.</li><li>Greater awareness of inclusive education.</li><li>Improved understanding of diverse learning needs.</li><li>More supportive and accessible learning environments.</li><li>Reduced educational exclusion and discrimination.</li></ul>', '<p>প্রতিটি শিশুরই শিক্ষা গ্রহণ, বিকাশ এবং নিজের পূর্ণ সম্ভাবনা অর্জনের অধিকার রয়েছে। শিশুর প্রতিবন্ধিতা, সামাজিক অবস্থান কিংবা ব্যক্তিগত শিক্ষাগত চাহিদা কোনোভাবেই তার শিক্ষার সুযোগ সীমিত করার কারণ হতে পারে না। কিন্তু এখনো অনেক প্রতিবন্ধী শিশু প্রবেশগম্যতাহীন শিক্ষার পরিবেশ, প্রয়োজনীয় শিক্ষাসহায়তার অভাব এবং সামাজিক নেতিবাচক দৃষ্টিভঙ্গির কারণে মানসম্মত শিক্ষা গ্রহণে বাধার সম্মুখীন হয়।</p><p>এই বাস্ত<strong>অভেদ্য ফাউন্ডেশন</strong> পরিচালনা করছে Inclusive Education for Every Child ক্যাম্পেইন। এর মাধ্যমে প্রতিবন্ধী শিশুদের জন্য সমান শিক্ষার সুযোগ সম্প্রসারণ এবং অন্তর্ভুক্তিমূলক শিক্ষাব্যবস্থার প্রসারে কাজ করা হয়।</p><p>এই উদ্যোগে শিক্ষক ও অভিভাবকদের সচেতনতা বৃদ্ধি, অন্তর্ভুক্তিমূলক শিক্ষাচর্চার প্রসার, উপযোগী শিক্ষা উপকরণ ও শিক্ষাসহায়তা এবং প্রবেশগম্য শিক্ষার পরিবেশ তৈরির ওপর গুরুত্ব দেওয়া হয়।</p><p>আমাদের লক্ষ্য এমন একটি শিক্ষাব্যবস্থা গড়ে তোলা, যেখানে প্রতিটি শিশু তার নিজস্ব সক্ষমতা ও প্রয়োজন অনুযায়ী শিখতে এবং মর্যাদার সঙ্গে অংশগ্রহণ কবিতরণ করা।</p><p><br></p><p><strong>প্রধান উদ্দেশ্যসমূহ</strong></p><ul><li>প্রতিবন্ধী শিশুদের জন্য সমান শিক্ষার সুযোগ নিশ্চিতকরণে কাজ করা।</li><li>অন্তর্ভুক্তিমূলক শিক্ষাদান ও শিখন পদ্ধতির প্রসার।</li><li>শিক্ষক, অভিভাবক ও কমিউনিটির সচেতনতা বৃদ্ধি।</li><li>উপযোগী শিক্ষা উপকরণ ও শিক্ষাসহায়তার সুযোগ সম্প্রসারণ।</li><li>শিক্ষাক্ষেত্রে বৈষম্য ও অংশগ্রহণের প্রতিবন্ধকতা হ্রাস।</li></ul><p><strong>প্রধান কার্যক্রম</strong></p><ul><li>অন্তর্ভুক্তিমূলক শিক্ষা বিষয়ক সচেতনতামূলক কার্যক্রম।</li><li>শিক্ষক ও অভিভাবকদের প্রশিক্ষণ ও ওরিয়েন্টেশন।</li><li>শিক্ষা উপকরণ ও শিক্ষাসহায়ক সামগ্রী প্রদানে সহযোগিতা।</li><li>প্রবেশগম্য ও অন্তর্ভুক্তিমূলক শ্রেণিকক্ষ গঠনে উৎসাহ প্রদান।</li><li>শিশুদের শিক্ষায় অংশগ্রহণ বৃদ্ধিতে কমিউনিটির সম্পৃক্ততা</li></ul><p><strong>প্রত্যাশিত প্রভাব</strong></p><ul><li>প্রতিবন্ধী শিশুদের শিক্ষায় অংশগ্রহণ বৃদ্ধি।</li><li>অন্তর্ভুক্তিমূলক শিক্ষা বিষয়ে সচেতনতা বৃদ্ধি।</li><li>শিশুদের ভিন্ন ভিন্ন শিক্ষাগত চাহিদা সম্পর্কে ধারণা উন্নয়ন।</li><li>অধিকতর সহায়ক ও প্রবেশগম্য শিক্ষার পরিবেশ তৈরি।</li><li>শিক্ষাক্ষেত্রে বৈষম্য হ্রাস।</li></ul><p><br></p>', NULL, 100000.00, NULL, NULL, 'active', 1, 1, '2026-10-12 11:22:02', '2026-11-24 21:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_updates`
--

CREATE TABLE `campaign_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Education & Literacy', 'education-literacy', 'Programs fostering child education, digital learning, and scholarship stipends.', '2026-10-12 11:22:02', '2026-10-12 11:22:02'),
(2, 'Community Healthcare', 'community-healthcare', 'Free medical camps, eye screening clinics, and medicine distributions.', '2026-10-12 11:22:02', '2026-10-12 11:22:02'),
(3, 'Emergency Relief', 'emergency-relief', 'Disaster response, winter clothing distribution, and flood assistance.', '2026-10-12 11:22:02', '2026-10-12 11:22:02'),
(4, 'Sustainable Livelihoods', 'sustainable-livelihoods', 'Vocational training, women empowerment, and small enterprise micro-grants.', '2026-10-12 11:22:02', '2026-10-12 11:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `replied_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `is_read`, `replied_at`, `ip_address`, `created_at`, `updated_at`) VALUES
(6, 'Meherun', 'meherun@gmail.com', NULL, 'তিষান এতো লুইচ্ছা কেনো', 'মেয়ে দেখলেই লালসার চোখে তাকিয়ে থাকে কেনো তোমাদের স্যার!! দ্রুত তাকে বিবাহ দাও', 0, NULL, NULL, '2026-11-24 20:25:04', '2026-11-24 20:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED DEFAULT NULL,
  `donor_name` varchar(255) NOT NULL,
  `donor_email` varchar(255) DEFAULT NULL,
  `donor_phone` varchar(255) DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `verified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_albums`
--

CREATE TABLE `gallery_albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_bn` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_albums`
--

INSERT INTO `gallery_albums` (`id`, `title`, `title_bn`, `slug`, `description`, `description_bn`, `cover_image`, `order`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'Rural Digital Classrooms in Action', 'মাঠপর্যায়ে গ্রামীণ ডিজিটাল ক্লাসরুম', 'rural-digital-classrooms', 'Joyful moments of children exploring interactive educational lessons across riverine schools.', 'চরাঞ্চলের স্কুলে ডিজিটাল শিক্ষায় শিশুদের স্বতঃস্ফূর্ত অংশগ্রহণের আনন্দঘন মুহূর্ত।', NULL, 1, 1, '2026-10-12 11:22:02', '2026-10-24 10:08:05'),
(2, 'Flood Relief Distribution 2026', 'বন্যা ত্রাণ বিতরণ কার্যক্রম ২০২৬', 'flood-relief-distribution-2026', 'Emergency response volunteer teams distributing food and clean water in flooded communities.', 'বন্যাকবলিত এলাকায় স্বেচ্ছাসেবী দলের খাদ্য ও বিশুদ্ধ খাবার পানি বিতরণ।', NULL, 2, 1, '2026-10-12 11:22:02', '2026-10-24 10:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_album_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_bn` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `caption_bn` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_album_id`, `title`, `title_bn`, `image`, `caption`, `caption_bn`, `order`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 1, 'Students Engaging with Digital Lessons', 'ডিজিটাল পাঠে শিক্ষার্থীদের উচ্ছ্বাস', 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1000&q=80', 'Primary students gathered around interactive tablet lessons in Kurigram.', 'কুড়িগ্রামের প্রাথমিক শিক্ষার্থীরা ট্যাবলেটে মিথস্ক্রিয় পাঠ গ্রহণে ব্যস্ত।', 1, 1, '2026-10-12 11:22:02', '2026-10-24 10:08:03'),
(2, 1, 'Solar Powered Class Setup', 'সৌরবিদ্যুৎচালিত শ্রেণিকক্ষ', 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1000&q=80', 'A refurbished classroom illuminated by sustainable solar energy.', 'সৌরবিদ্যুতের আলোয় আলোকিত একটি আধুনিক শ্রেণিকক্ষ।', 2, 1, '2026-10-12 11:22:02', '2026-10-24 10:08:03'),
(3, 2, 'Emergency Food Pack Distribution', 'জরুরি খাদ্য সামগ্রী বিতরণ', 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1000&q=80', 'Distributing essential food ration packets to families at high-ground relief centers.', 'উঁচু আশ্রয়কেন্দ্রে আশ্রয় নেওয়া পরিবারগুলোর মাঝে খাদ্যসামগ্রী বিতরণ।', 1, 1, '2026-10-12 11:22:02', '2026-10-24 10:08:03'),
(4, 2, 'Clean Water Canister Delivery', 'বিশুদ্ধ খাবার পানির ক্যানিস্টার সরবরাহ', 'https://images.unsplash.com/photo-1542810634-71277d95dcbb?auto=format&fit=crop&w=1000&q=80', 'Delivering potable water jugs and chlorine tablets via boat to stranded households.', 'নৌকায় করে পানিবন্দী পরিবারগুলোর কাছে সুপেয় পানি ও ক্লোরিন ট্যাবলেট পৌঁছে দেওয়া।', 2, 1, '2026-10-12 11:22:02', '2026-10-24 10:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `invitation_links`
--

CREATE TABLE `invitation_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hash` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invitation_referrals`
--

CREATE TABLE `invitation_referrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invitation_link_id` bigint(20) UNSIGNED NOT NULL,
  `referred_user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

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
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2022_05_17_181447_create_roles_table', 1),
(5, '2022_05_17_181456_create_user_roles_table', 1),
(6, '2024_01_01_000000_create_social_accounts_table', 1),
(7, '2024_01_01_000001_add_two_factor_columns_to_users_table', 1),
(8, '2024_01_01_000002_create_invitation_system_tables', 1),
(9, '2025_01_01_000001_create_media_table', 1),
(10, '2025_01_01_000001_create_privileges_table', 1),
(11, '2025_01_01_000002_create_privilege_role_table', 1),
(12, '2025_01_01_000002_create_starred_import_images_table', 1),
(13, '2025_01_01_000003_add_suspension_columns_to_users_table', 1),
(14, '2025_02_08_000000_add_profile_photo_to_users_table', 1),
(15, '2026_02_15_000000_create_tyro_audit_logs_table', 1),
(16, '2026_02_20_000000_create_smtp_presets_table', 1),
(17, '2026_03_01_000000_add_is_favorite_to_tyro_media_table', 1),
(18, '2026_03_26_000000_create_media_categories_tables', 1),
(19, '2026_10_12_171037_create_personal_access_tokens_table', 2),
(20, '2026_10_12_171747_create_categories_table', 3),
(21, '2026_10_12_171748_create_tags_table', 3),
(22, '2026_10_12_171749_create_posts_table', 3),
(23, '2026_10_12_171750_create_projects_table', 3),
(24, '2026_10_12_171751_create_campaigns_table', 3),
(25, '2026_10_12_171752_create_campaign_updates_table', 3),
(26, '2026_10_12_171753_create_gallery_albums_table', 3),
(27, '2026_10_12_171754_create_gallery_images_table', 3),
(28, '2026_10_12_171755_create_donations_table', 3),
(29, '2026_10_12_171756_create_contact_messages_table', 3),
(30, '2026_10_12_171757_create_site_settings_table', 3),
(31, '2026_10_12_171758_create_post_tag_table', 3),
(32, '2026_10_24_160408_add_bangla_fields_to_content_tables', 4),
(33, '2026_11_13_200800_add_missing_bangla_site_settings', 5),
(34, '2026_11_13_213500_add_value_bn_to_site_settings', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `title_bn`, `slug`, `summary`, `summary_bn`, `content`, `content_bn`, `featured_image`, `is_published`, `is_featured`, `published_at`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 'Abhedya Foundation Organizes Inclusive Skill Development, Hearing Support & Hearing Screening Programme in Noakhali', 'নোয়াখালীতে অন্তর্ভুক্তিমূলক শিক্ষা,দক্ষতা উন্নয়ন, শ্রবণসহায়তা ও হিয়ারিং স্ক্রিনিং কার্যক্রম আয়োজন করল অভেদ্য ফাউন্ডেশন', 'noakhali-inclusive-seminar', 'Abhedya Foundation successfully organized the Inclusive Skill Development, Hearing Support & Hearing Screening programme in Noakhali on 6 November 2026. The initiative focused on promoting disability inclusion, improving access to hearing support services, and expanding equal opportunities for persons with disabilities and underserved communities. The programme featured community engagement, hearing screening activities, and participation from distinguished guests.', 'অভেদ্য ফাউন্ডেশন ৬ নভেম্বর ২০২৬ তারিখে নোয়াখালীতে Inclusive Skill Development, Hearing Support & Hearing Screening শীর্ষক আয়োজন সফলভাবে সম্পন্ন করেছে। প্রতিবন্ধী ব্যক্তি ও সুবিধাবঞ্চিত জনগোষ্ঠীর অন্তর্ভুক্তি, শ্রবণসহায়তা সেবায় প্রবেশাধিকার এবং সমান সুযোগ সম্প্রসারণ ছিল এই আয়োজনের মূল লক্ষ্য। অনুষ্ঠানে হিয়ারিং স্ক্রিনিং কার্যক্রম, কমিউনিটির সম্পৃক্ততা এবং বিশিষ্ট অতিথিদের অংশগ্রহণের মাধ্যমে অন্তর্ভুক্তিমূলক সমাজ গঠনের গুরুত্ব তুলে ধরা হয়।', '<h3><strong>Promoting Inclusion, Accessibility and Equal Opportunities</strong></h3><p><strong>Abhedya Foundation</strong> successfully organized an inclusive community-based programme titled <em>“Inclusive Education, Skill Development, Hearing Support &amp; Hearing Screening”</em> on <strong>6 November 2026 at Shilpakala Academy, Noakhali.</strong></p><p>The initiative was designed to promote disability inclusion, improve access to hearing support services, and encourage equal opportunities for individuals with disabilities and underserved communities.</p><p>The programme brought together distinguished guests, community representatives, participants, and relevant stakeholders to highlight the importance of accessible services, inclusive development, and meaningful community participation.</p><p>The event featured the participation of the Honourable Chief Guest, who addressed the gathering and highlighted the importance of ensuring equal opportunities and support for persons with disabilities. During the programme, the Chief Guest also interacted with participants, exchanged views with beneficiaries, and visited the hearing screening activities.</p><p>The programme also provided an opportunity to highlight the importance of early identification of hearing difficulties, access to appropriate hearing support, and inclusive skill development initiatives.</p><p>Through this initiative, Abhedya Foundation reaffirmed its commitment to building an equitable and inclusive society where every individual can access essential support, develop their abilities, and participate with dignity.</p>', '<h3><strong>অন্তর্ভুক্তিমূলক শিক্ষা,প্রবেশগম্যতা ও সমান সুযোগ নিশ্চিতে অভেদ্য ফাউন্ডেশনের উদ্যোগ</strong></h3><p><br></p><p><strong>অভেদ্য ফাউন্ডেশন ৬ নভেম্বর ২০২৬ তারিখে নোয়াখালী জেলা শিল্পকলা একাডেমিতে</strong><em>“Inclusive Education, Skill Development, Hearing Support &amp; Hearing Screening”</em> শীর্ষক একটি অন্তর্ভুক্তিমূলক কমিউনিটিভিত্তিক আয়োজন সফলভাবে সম্পন্ন করেছে।</p><p>প্রতিবন্ধী ব্যক্তি ও সুবিধাবঞ্চিত জনগোষ্ঠীর অন্তর্ভুক্তি, প্রয়োজনীয় শ্রবণসহায়তা সেবায় প্রবেশাধিকার এবং সমান সুযোগ সম্প্রসারণের লক্ষ্যকে সামনে রেখে এই আয়োজন পরিচালিত হয়।</p><p>অনুষ্ঠানে বিশিষ্ট অতিথিবৃন্দ, স্থানীয় প্রতিনিধিবৃন্দ, অংশগ্রহণকারী এবং সংশ্লিষ্ট অংশীজনদের উপস্থিতিতে প্রতিবন্ধী ব্যক্তিদের জন্য প্রবেশগম্য সেবা, অন্তর্ভুক্তিমূলক উন্নয়ন এবং সামাজিক অংশগ্রহণের গুরুত্ব তুলে ধরা হয়।</p><p>অনুষ্ঠানের প্রধান অতিথি তাঁর বক্তব্যে প্রতিবন্ধী ব্যক্তিদের অধিকার, মর্যাদা এবং সমান সুযোগ নিশ্চিত করার গুরুত্ব তুলে ধরেন। পাশাপাশি তিনি অংশগ্রহণকারীদের সঙ্গে কুশল বিনিময় করেন, তাদের অভিজ্ঞতা ও অনুভূতি সম্পর্কে জানতে চান এবং আয়োজিত হিয়ারিং স্ক্রিনিং কার্যক্রম পরিদর্শন করেন। তিনি নিজেও হিয়ারিং স্ক্রিনিং পরীক্ষায় অংশগ্রহণ করেন।</p><p>এই আয়োজনের মাধ্যমে শ্রবণসমস্যার প্রাথমিক শনাক্তকরণ, প্রয়োজনীয় শ্রবণসহায়তা গ্রহণ এবং অন্তর্ভুক্তিমূলক দক্ষতা উন্নয়ন কার্যক্রমের গুরুত্বও তুলে ধরা হয়।</p><p>অভেদ্য ফাউন্ডেশন বিশ্বাস করে, প্রতিবন্ধী ও অপ্রতিবন্ধী প্রত্যেক মানুষের জন্য সমান সুযোগ, প্রয়োজনীয় সহায়তা এবং মর্যাদাপূর্ণ অংশগ্রহণ নিশ্চিত করার মাধ্যমেই একটি অন্তর্ভুক্তিমূলক সমাজ গড়ে তোলা সম্ভব। এই আয়োজন সেই লক্ষ্য বাস্তবায়নে আমাদের চলমান মানুষের জীবন রক্ষায় ভূমিকা রেখেছে।</p>', 'uploads/c1OY6Dxokc4C48zXKGcwpvDL5sD0hkoPZdelwppr.jpg', 1, 1, '2026-11-09 18:00:00', '2026-10-12 11:22:02', '2026-11-24 20:05:10'),
(3, 1, 4, 'Abhedya Foundation Begins a New Journey in Noakhali to Promote Equality and Inclusion', 'সমতা ও অন্তর্ভুক্তি প্রসারে নোয়াখালীতে নতুন যাত্রা শুরু করল অভেদ্য ফাউন্ডেশন।', 'noakhali-equality-inclusion', 'Abhedya Foundation is set to launch its next initiative in Noakhali on November 6, 2026, advancing its mission to build an inclusive and equitable society.', 'একটি অন্তর্ভুক্তিমূলক ও সমতাপূর্ণ সমাজ গড়ার লক্ষ্যে অভেদ্য ফাউন্ডেশন আগামী ৬ নভেম্বর, ২০২৬ তারিখে নোয়াখালীতে তার পরবর্তী উদ্যোগ চালু করতে চলেছে।', '<p><strong>A new journey begins: Abhedya Foundation in Noakhali!</strong></p><p><br></p><p>ABHEDYA FOUNDATION has announced its next activities in Noakhali on <strong>November 6, 2026</strong>, to help establish an inclusive and egalitarian society.</p><p><br></p><p>Through this initiative, the organization wants to further advance its commitment to ensuring equal opportunities, rights, dignity, and social participation for all.</p><p><br></p><p>Abhedya Foundation believes that ensuring the opportunity to develop the potential of every individual is essential to building a humane and just society. Creating equal opportunities and ensuring social inclusion, especially for children, people with disabilities, and disadvantaged groups in society, is an important part of sustainable development.</p><p><br></p><p>This new initiative centered on Noakhali is a new step forward for Abhedya Foundation in its goal of equality, humanity, and inclusion. The organization is committed to working to build a society where no one is deprived of opportunities and participation due to disability, social status, or other characteristics.</p><p><br></p><p>The long-term goal of the Abhedya Foundation is to contribute to establishing a participatory and dignified society through education, disability inclusion, accessibility, awareness, empowerment, research, and community development.</p>', '<p><strong>একটি নতুন যাত্রার সূচনা: নোয়াখালীতে অভেদ্য ফাউন্ডেশন!</strong></p><p><br></p><p>অন্তর্ভুক্তিমূলক ও সমতাভিত্তিক সমাজ প্রতিষ্ঠার লক্ষ্যে নোয়াখালীতে আগামী <strong>০৬ই নভেম্বর,২০২৬ ইং</strong> তারিখে পরবর্তী কার্যক্রম গ্রহণের ঘোষণা দিয়েছে অভেদ্য ফাউন্ডেশন।</p><p><br></p><p>এই উদ্যোগের মাধ্যমে সবার জন্য সমান সুযোগ, অধিকার, মর্যাদা ও সামাজিক অংশগ্রহণ নিশ্চিত করার প্রত্যয়কে আরও এগিয়ে নিতে চায় প্রতিষ্ঠানটি।</p><p><br></p><p>অভেদ্য ফাউন্ডেশন বিশ্বাস করে, একটি মানবিক ও ন্যায়ভিত্তিক সমাজ গড়ে তুলতে প্রত্যেক ব্যক্তির সম্ভাবনা বিকাশের সুযোগ নিশ্চিত করা অপরিহার্য। বিশেষ করে শিশু, প্রতিবন্ধী ব্যক্তি এবং সমাজের সুবিধাবঞ্চিত জনগোষ্ঠীর জন্য সমান সুযোগ সৃষ্টি ও সামাজিক অন্তর্ভুক্তি নিশ্চিত করা টেকসই উন্নয়নের গুরুত্বপূর্ণ অংশ।&nbsp;</p><p><br></p><p>নোয়াখালীকে কেন্দ্র করে এই নতুন উদ্যোগ অভেদ্য ফাউন্ডেশনের সমতা, মানবিকতা ও অন্তর্ভুক্তির লক্ষ্যে এগিয়ে যাওয়ার একটি নতুন পদক্ষেপ। প্রতিষ্ঠানটি এমন একটি সমাজ গঠনে কাজ করতে প্রতিশ্রুতিবদ্ধ, যেখানে প্রতিবন্ধিতা, সামাজিক অবস্থান কিংবা অন্যান্য বৈশিষ্ট্যের কারণে কেউ সুযোগ ও অংশগ্রহণ থেকে বঞ্চিত হবে না।&nbsp;</p><p><br></p><p>অভেদ্য ফাউন্ডেশনের দীর্ঘমেয়াদি লক্ষ্য হলো শিক্ষা, প্রতিবন্ধী অন্তর্ভুক্তি, প্রবেশগম্যতা (Accessibility), সচেতনতা, ক্ষমতায়ন, গবেষণা এবং কমিউনিটি উন্নয়নের মাধ্যমে একটি অংশগ্রহণমূলক ও মর্যাদাপূর্ণ সমাজ প্রতিষ্ঠায় অবদান রাখা।ক্ষা করে।</p>', 'uploads/qLkgQJ5NbrdGf9b0Hp0USLGKvmckm6UolTanTb7T.jpg', 1, 1, '2026-10-28 14:26:00', '2026-10-12 11:22:02', '2026-11-24 20:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(3, 2, 1, NULL, NULL),
(4, 2, 7, NULL, NULL),
(5, 3, 1, NULL, NULL),
(6, 3, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Generate Reports', 'report.generate', 'Allows generating system-wide reports.', '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(2, 'Manage Users', 'users.manage', 'Allows creating, editing, and deleting users.', '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(3, 'Manage Roles', 'roles.manage', 'Allows editing Tyro roles.', '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(4, 'View Billing', 'billing.view', 'Allows viewing billing statements.', '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(5, 'Wildcard', '*', 'Grants every privilege.', '2026-10-12 11:10:37', '2026-10-12 11:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `privilege_role`
--

CREATE TABLE `privilege_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `privilege_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privilege_role`
--

INSERT INTO `privilege_role` (`id`, `role_id`, `privilege_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(2, 6, 1, '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(3, 1, 2, '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(4, 6, 2, '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(5, 6, 3, '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(6, 1, 4, '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(7, 2, 4, '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(8, 5, 5, '2026-10-12 11:10:37', '2026-10-12 11:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `title_bn`, `slug`, `summary`, `summary_bn`, `description`, `description_bn`, `featured_image`, `status`, `start_date`, `end_date`, `location`, `location_bn`, `is_published`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Inclusive Education & Disability Awareness', 'অন্তর্ভুক্তিমূলক শিক্ষা ও প্রতিবন্ধিতা বিষয়ক সচেতনতা', 'inclusive-Education-disability-awareness', 'Our initiative aims to ensure equal educational opportunities for children with disabilities, raise awareness about inclusive education, and foster disability-friendly environments within educational institutions.', 'প্রতিবন্ধী শিশুদের শিক্ষায় সমান সুযোগ নিশ্চিত করা, অন্তর্ভুক্তিমূলক শিক্ষাব্যবস্থা সম্পর্কে সচেতনতা বৃদ্ধি এবং শিক্ষা প্রতিষ্ঠানে প্রতিবন্ধীবান্ধব পরিবেশ গড়ে তোলার লক্ষ্যে আমাদের উদ্যোগ।', '<p>Education is a fundamental right of every child. However, children with disabilities continue to face various barriers in accessing quality education, participating in learning activities, and experiencing equal opportunities. Social stigma, limited awareness, inaccessible learning environments, and inadequate educational support often prevent them from achieving their full potential.</p><p>Recognizing these challenges, <strong>Abhedya Foundation</strong> is committed to promoting inclusive education and strengthening disability awareness across communities. We believe that every child, regardless of their abilities or individual learning needs, deserves equal access to education, dignity, and opportunities for development.</p><p>Through this initiative, we work to create greater awareness among educational institutions, teachers, parents, students, and community members about disability inclusion, inclusive learning practices, and the rights of persons with disabilities.</p><p>Our efforts focus on encouraging inclusive educational environments, promoting positive attitudes towards disability, reducing discrimination, and ensuring that children with disabilities have opportunities to participate meaningfully in educational, social, and cultural activities.</p><p><br></p><p><strong><u>Key Areas of Intervention</u></strong></p><p><strong>1. Inclusive Education Awareness</strong></p><p>Promoting awareness of inclusive education, equal learning opportunities, and the importance of ensuring the participation of children with disabilities in educational settings.</p><p><strong>2. Disability Awareness Campaigns</strong></p><p>Conducting awareness initiatives to promote understanding of disability, disability rights, abilities, and the importance of social inclusion while addressing stigma and misconceptions.</p><p><strong>3. Teacher &amp; Caregiver Awareness</strong></p><p>Supporting teachers, parents, and caregivers in understanding the diverse learning needs of children with disabilities and adopting inclusive and supportive approaches.</p><p><strong>4. Inclusive Learning Environment</strong></p><p>Advocating for accessible, safe, supportive, and inclusive learning environments that enable children with diverse abilities to learn and participate together.</p><p><strong>5. Community Engagement</strong></p><p>Engaging local communities to challenge negative perceptions, reduce discrimination, and encourage the acceptance and inclusion of persons with disabilities.</p><p><strong>6. Participation &amp; Empowerment</strong></p><p>Creating opportunities for children with disabilities to participate in educational, social, and cultural activities while encouraging their confidence, independence, and self-expression.</p><p><strong><u>Our Goal</u></strong></p><p>To contribute to a more inclusive and equitable society where every child, with or without disabilities, can access education, exercise their rights, participate meaningfully, and grow with dignity.</p><p>We believe that inclusion is not a privilege; it is a fundamental right.</p>', '<p>শিক্ষা প্রতিটি শিশুর মৌলিক অধিকার। কিন্তু প্রতিবন্ধী শিশুরা এখনো মানসম্মত শিক্ষা গ্রহণ, শিক্ষামূলক কার্যক্রমে অংশগ্রহণ এবং সমান সুযোগ লাভের ক্ষেত্রে বিভিন্ন প্রতিবন্ধকতার সম্মুখীন হয়। সামাজিক নেতিবাচক দৃষ্টিভঙ্গি, সচেতনতার অভাব, প্রবেশগম্যতাহীন শিক্ষার পরিবেশ এবং প্রয়োজনীয় শিক্ষাসহায়তার সীমাবদ্ধতা তাদের সম্ভাবনার পূর্ণ বিকাশকে বাধাগ্রস্ত করে।</p><p>এই চ্যালেঞ্জগুলো বিবেচনায় র<strong>অভেদ্য ফাউন্ডেশন</strong>অন্তর্ভুক্তিমূলক শিক্ষার প্রসার এবং সমাজে প্রতিবন্ধিতা বিষয়ে সচেতনতা বৃদ্ধিতে প্রতিশ্রুতিবদ্ধ। আমরা বিশ্বাস করি, প্রতিটি শিশু তার সক্ষমতা, বৈশিষ্ট্য কিংবা ব্যক্তিগত শিক্ষাগত চাহিদা যা-ই হোক না কেন, সমানভাবে শিক্ষা, মর্যাদা এবং বিকাশের সুযোগ পাওয়ার অধিকার রাখে।</p><p>এই উদ্যোগের মাধ্যমে শিক্ষা প্রতিষ্ঠান, শিক্ষক, অভিভাবক, শিক্ষার্থী এবং স্থানীয় জনগোষ্ঠীর মধ্যে প্রতিবন্ধিতা, অন্তর্ভুক্তিমূলক শিক্ষাচর্চা এবং প্রতিবন্ধী ব্যক্তিদের অধিকার সম্পর্কে সচেতনতা তৈরিতে কাজ করা হয়।</p><p>আমাদের কার্যক্রমের মূল লক্ষ্য হলো অন্তর্ভুক্তিমূলক শিক্ষার পরিবেশ গড়ে তোলা, প্রতিবন্ধিতা সম্পর্কে ইতিবাচক দৃষ্টিভঙ্গি তৈরি করা, বৈষম্য হ্রাস করা এবং প্রতিবন্ধী শিশুদের শিক্ষামূলক, সামাজিক ও সাংস্কৃতিক কার্যক্রমে অর্থবহ অংশগ্রহণের সুযোগ সম্প্রসারণ</p><p><br></p><p><strong><u>আমাদের কার্যক্রমের প্রধান ক্ষেত্রসমূহ</u></strong></p><p><strong>১. অন্তর্ভুক্তিমূলক শিক্ষা বিষয়ক সচেতনতা</strong></p><p>অন্তর্ভুক্তিমূলক শিক্ষা, সমান শিক্ষার সুযোগ এবং শিক্ষা প্রতিষ্ঠানে প্রতিবন্ধী শিশুদের অংশগ্রহণের গুরুত্ব সম্পর্কে সচেতনতা বৃদ্ধি।</p><p><strong>২. প্রতিবন্ধিতা বিষয়ক সচেতনতামূলক কার্যক্রম</strong></p><p>প্রতিবন্ধিতা, প্রতিবন্ধী ব্যক্তিদের অধিকার ও সক্ষমতা এবং সামাজিক অন্তর্ভুক্তির গুরুত্ব সম্পর্কে সচেতনতা তৈরি করা। পাশাপাশি প্রচলিত নেতিবাচক ধারণা ও কুসংস্কার দূর করতে কাজ করা।</p><p><strong>৩. শিক্ষক ও অভিভাবকদের সচেতনতা বৃদ্ধি</strong></p><p>প্রতিবন্ধী শিশুদের ভিন্ন ভিন্ন শিক্ষাগত চাহিদা সম্পর্কে শিক্ষক, অভিভাবক ও পরিচর্যাকারীদের ধারণা প্রদান এবং সহায়ক ও অন্তর্ভুক্তিমূলক দৃষ্টিভঙ্গি গড়ে তুলতে সহযোগিতা করা</p><p><strong>৪. অন্তর্ভুক্তিমূলক শিক্ষার পরিবেশ তৈরি</strong></p><p>এমন একটি নিরাপদ, প্রবেশগম্য, সহায়ক ও অন্তর্ভুক্তিমূলক শিক্ষার পরিবেশ গড়ে তুলতে কাজ করা, যেখানে ভিন্ন সক্ষমতার শিশুরা একসঙ্গে শিখতে ও অংশগ্রহণ করতে পারে</p><p><strong>৫. কমিউনিটির সম্পৃক্ততা</strong></p><p>প্রতিবন্ধিতা বিষয়ে নেতিবাচক দৃষ্টিভঙ্গি পরিবর্তন, বৈষম্য হ্রাস এবং প্রতিবন্ধী ব্যক্তিদের সামাজিক গ্রহণযোগ্যতা ও অন্তর্ভুক্তি নিশ্চিত করতে স্থানীয় জনগোষ্ঠীকে সম্পৃক্ত করা</p><p><strong>৬. অংশগ্রহণ ও ক্ষমতায়ন</strong></p><p>প্রতিবন্ধী শিশুদের শিক্ষামূলক, সামাজিক ও সাংস্কৃতিক কার্যক্রমে অংশগ্রহণের সুযোগ তৈরি করার পাশাপাশি তাদের আত্মবিশ্বাস, স্বনির্ভরতা ও আত্মপ্রকাশে উৎসাহিত করা।</p><p><strong><u>আমাদের লক্ষ্য</u></strong></p><p>এমন একটি অন্তর্ভুক্তিমূলক ও সমতাভিত্তিক সমাজ গড়ে তুলতে অবদান রাখা, যেখানে প্রতিবন্ধী ও অপ্রতিবন্ধী প্রতিটি শিশু সমানভাবে শিক্ষা গ্রহণ, অধিকার চর্চা, অর্থবহ অংশগ্রহণ এবং মর্যাদার সঙ্গে বেড়ে ওঠার সুযোগ পাবে।আমরা বিশ্বাস করি, অন্তর্ভুক্তি কোনো বিশেষ সুযোগ নয়; এটি প্রতিটি মানুষের মৌলিক অধিকার।রা সম্ভব হয়েছে।</p>', 'uploads/Q9b89vS80WdXzEPQropkuNpNkFitSqaFwOA8ioIt.jpg', 'ongoing', NULL, NULL, 'Bangladesh', 'বাংলাদেশ', 1, 1, '2026-10-12 11:22:02', '2026-11-24 20:10:57'),
(2, 'Hearing Support & Accessibility Initiative', 'শ্রবণসহায়তা ও প্রবেশগম্যতা উদ্যোগ', 'hearing-support-accessibility-health', 'Our initiative aims to raise awareness about hearing health, provide necessary support, and expand access to hearing aids for individuals who are deaf or hard of hearing.', 'শ্রবণপ্রতিবন্ধী শিশু,ব্যক্তি ও শ্রবণসমস্যায় থাকা মানুষের জন্য শ্রবণস্বাস্থ্য বিষয়ে সচেতনতা, প্রয়োজনীয় সহায়তা এবং শ্রবণসহায়ক যন্ত্র প্রাপ্তির সুযোগ সম্প্রসারণে আমাদের এই উদ্যোগ।', '<p>Hearing is essential for communication, learning, social interaction, and meaningful participation in everyday life. However, individuals with hearing difficulties and hearing disabilities often face significant challenges due to limited access to hearing screening services, the high cost of hearing aids, lack of awareness, and inadequate support systems.</p><p>Recognizing these challenges,<strong> Abhedya Foundation</strong> has undertaken the Hearing Support &amp; Accessibility Initiative to improve access to essential hearing support services and promote greater inclusion of individuals with hearing-related needs.</p><p>Through this initiative, we organize free hearing screening programmes and facilitate access to hearing support services, including hearing aid assistance for individuals who need them. We also work to raise awareness about hearing health, the importance of early identification of hearing difficulties, and the role of appropriate hearing support in improving communication and quality of life.</p><p>Our approach emphasizes not only providing assistive devices but also addressing the broader barriers faced by individuals with hearing disabilities. By engaging communities, collaborating with relevant professionals and service providers, and promoting accessible support systems, we aim to create opportunities for individuals to communicate, learn, and participate more actively in society.</p><h3><strong><u>Key Areas of Intervention</u></strong></h3><p><strong>1. Free Hearing Screening</strong></p><p>Organizing free hearing screening camps to identify potential hearing difficulties and help individuals access appropriate hearing support services.</p><p><strong>2. Hearing Aid Support</strong></p><p>Facilitating access to hearing aids and providing free hearing aid support to individuals from underserved and economically disadvantaged communities who require assistance.</p><p><strong>3. Hearing Health Awareness</strong></p><p>Conducting awareness activities on hearing health, hearing difficulties, preventive measures, early identification, and the importance of timely intervention.</p><p><strong>4. Referral &amp; Professional Support</strong></p><p>Facilitating connections between individuals with hearing difficulties and relevant hearing healthcare professionals and service providers for further assessment and appropriate support.</p><p><strong>5. Community Outreach &amp; Engagement</strong></p><p>Reaching underserved communities through outreach programmes, community-based initiatives, and awareness campaigns to improve access to hearing support services.</p><p><strong>6. Accessibility &amp; Social Inclusion</strong></p><p>Promoting communication accessibility, equal participation, and social inclusion for individuals with hearing disabilities by addressing barriers in educational, social, and community environments.</p><h3><strong><u>Our Goal</u></strong></h3><p>To build a more accessible and inclusive society where individuals with hearing difficulties can access appropriate hearing support, communicate with greater confidence, and participate equally in education, employment, and community life.</p><p><br></p><p>We believe that access to hearing support is not merely a healthcare need; it is an essential part of ensuring dignity, equal opportunity, and social inclusion.</p>', '<p>যোগাযোগ, শিক্ষা, সামাজিক মিথস্ক্রিয়া এবং দৈনন্দিন জীবনে সক্রিয় অংশগ্রহণের জন্য শ্রবণক্ষমতা অত্যন্ত গুরুত্বপূর্ণ। কিন্তু শ্রবণসমস্যায় থাকা ব্যক্তি ও শ্রবণপ্রতিবন্ধী মানুষ এখনো প্রয়োজনীয় শ্রবণস্বাস্থ্যসেবা গ্রহণ, শ্রবণসহায়ক যন্ত্রের উচ্চমূল্য, সচেতনতার অভাব এবং পর্যাপ্ত সহায়তা ব্যবস্থার সীমাবদ্ধতার কারণে নানা চ্যালেঞ্জের সম্মুখীন হন।</p><p>এই বাস্তবতাকে বিবেচনা<strong>অভেদ্য ফাউন্ডেশন</strong> শ্রবণসমস্যায় থাকা মানুষের জন্য প্রয়োজনীয় সহায়তা সহজলভ্য করা এবং তাদের সামাজিক অন্তর্ভুক্তি নিশ্চিত করার লক্ষ্যে Hearing Support &amp; Accessibility Initiative পরিচালনা করছে।</p><p>এই উদ্যোগের আওতায় বিনামূল্যে হিয়ারিং স্ক্রিনিং ক্যাম্প আয়োজন এবং প্রয়োজন অনুযায়ী শ্রবণসহায়ক সেবা গ্রহণের সুযোগ তৈরি করা হয়। পাশাপাশি যেসব ব্যক্তির শ্রবণসহায়ক যন্ত্র প্রয়োজন, তাদের জন্য বিনামূল্যে হিয়ারিং এইড সহায়তা প্রদানের উদ্যোগ নেওয়া হয়। শ্রবণস্বাস্থ্য, শ্রবণসমস্যার প্রাথমিক শনাক্তকরণ এবং যথাসময়ে প্রয়োজনীয় সহায়তা গ্রহণের গুরুত্ব সম্পর্কেও সচেতনতা তৈরি করা হয়।</p><p>আমাদের উদ্যোগ শুধু শ্রবণসহায়ক যন্ত্র বিতরণের মধ্যেই সীমাবদ্ধ নয়; বরং শ্রবণপ্রতিবন্ধী ব্যক্তিদের দৈনন্দিন যোগাযোগ, শিক্ষা এবং সামাজিক অংশগ্রহণের পথে বিদ্যমান প্রতিবন্ধকতা দূর করার বিষয়টিকেও গুরুত্ব দেয়। এ লক্ষ্যে কমিউনিটির সম্পৃক্ততা, সংশ্লিষ্ট পেশাজীবী ও সেবাদানকারী প্রতিষ্ঠানের সঙ্গে সহযোগিতা এবং প্রয়োজনীয় সহায়তা ব্যবস্থার প্রসারে কাজ করা হয়।</p><p>আমরা বিশ্বাস করি, যথাযথ শ্রবণসহায়তা একজন মানুষের যোগাযোগের সক্ষমতা, আত্মবিশ্বাস, স্বাধীনতা এবং জীবনযাত্রার মান উন্নয়নে গুরুত্বপূর্ণ ভূমিকা রাখতে পারে।</p><p><br></p><p><strong><u>আমাদের কার্যক্রমের প্রধান ক্ষেত্রসমূহ</u></strong></p><p><strong>১. বিনামূল্যে হিয়ারিং স্ক্রিনিং</strong></p><p>বিভিন্ন এলাকায় বিনামূল্যে হিয়ারিং স্ক্রিনিং ক্যাম্প আয়োজনের মাধ্যমে সম্ভাব্য শ্রবণসমস্যা শনাক্তকরণ এবং প্রয়োজনীয় শ্রবণস্বাস্থ্যসেবা গ্রহণের সুযোগ তৈরি</p><p><strong>২. শ্রবণসহায়ক যন্ত্র প্রদান</strong></p><p>শ্রবণসহায়ক যন্ত্র প্রয়োজন এমন ব্যক্তি, বিশেষ করে সুবিধাবঞ্চিত ও আর্থিকভাবে অসচ্ছল জনগোষ্ঠীর মানুষের জন্য বিনামূল্যে হিয়ারিং এইড সহায়তা নিশ্চিত করতে কাজ </p><p><strong>৩. শ্রবণস্বাস্থ্য বিষয়ক সচেতনতা</strong></p><p>শ্রবণস্বাস্থ্য, শ্রবণসমস্যা, প্রতিরোধমূলক ব্যবস্থা, প্রাথমিক শনাক্তকরণ এবং সময়মতো প্রয়োজনীয় সহায়তা গ্রহণের গুরুত্ব সম্পর্কে সচেতনতামূলক কার্যক্রম পরিচা</p><p><strong>৪. রেফারেল ও পেশাগত সহায়তা</strong></p><p>শ্রবণসমস্যায় থাকা ব্যক্তিদের প্রয়োজন অনুযায়ী পরবর্তী মূল্যায়ন, পরামর্শ এবং উপযুক্ত সহায়তা গ্রহণের জন্য সংশ্লিষ্ট শ্রবণস্বাস্থ্য পেশাজীবী ও সেবাদানকারী প্রতিষ্ঠানের সঙ্গে সংযোগ স্থাপনে সহযোগিতা<strong>৫. কমিউনিটি পর্যায়ে কার্যক্রম ও সম্পৃক্ততা</strong></p><p>সুবিধাবঞ্চিত ও প্রত্যন্ত জনগোষ্ঠীর কাছে শ্রবণসহায়তা পৌঁছে দিতে মাঠপর্যায়ে কার্যক্রম, কমিউনিটিভিত্তিক উদ্যোগ এবং সচেতনতামূলক প্রচারণা পরিচালন</p><p><strong>৬. প্রবেশগম্যতা ও সামাজিক অন্তর্ভুক্তি</strong></p><p>শ্রবণপ্রতিবন্ধী ব্যক্তিদের যোগাযোগের সুযোগ বৃদ্ধি, সমান অংশগ্রহণ নিশ্চিতকরণ এবং শিক্ষা, সামাজিক ও কমিউনিটি পর্যায়ে বিদ্যমান প্রতিবন্ধকতা হ্রাসে কাজ করা।</p><p><strong><u>আমাদের লক্ষ্য</u></strong></p><p>এমন একটি প্রবেশগম্য ও অন্তর্ভুক্তিমূলক সমাজ গড়ে তোলা, যেখানে শ্রবণসমস্যায় থাকা প্রতিটি মানুষ প্রয়োজনীয় শ্রবণসহায়তা গ্রহণ, আত্মবিশ্বাসের সঙ্গে যোগাযোগ এবং শিক্ষা, কর্মসংস্থান ও সামাজিক জীবনে সমানভাবে অংশগ্রহণের সুযোগ পাবে।</p><p><br></p><p>আমরা বিশ্বাস করি, শ্রবণসহায়তা কেবল স্বাস্থ্যসেবার বিষয় নয়; এটি মানুষের মর্যাদা, সমান সুযোগ এবং সামাজিক অন্তর্ভুক্তি নিশ্চিত করার একটি গুরুত্বপূর্ণ অংশ। এবং মায়েদের স্বাস্থ্য সুরক্ষা কিট দেওয়া হয়।</p>', 'uploads/smOvfMTpDqIXVeuHRfUp12tOJ0kt82rQUz8OMp9l.jpg', 'ongoing', NULL, NULL, 'Bangladesh', 'বাংলাদেশ', 1, 1, '2026-10-12 11:22:02', '2026-11-24 20:10:43'),
(3, 'Community-Based Disability Inclusion', 'কমিউনিটিভিত্তিক প্রতিবন্ধিতা অন্তর্ভুক্তি', 'community-inclusion', 'Working towards building a more inclusive society by raising awareness among the local population regarding the rights, dignity, social participation, and equal opportunities of persons with disabilities.', 'স্থানীয় জনগোষ্ঠীর মধ্যে প্রতিবন্ধী ব্যক্তিদের অধিকার, মর্যাদা, সামাজিক অংশগ্রহণ ও সমান সুযোগ সম্পর্কে সচেতনতা বৃদ্ধির মাধ্যমে আরও অন্তর্ভুক্তিমূলক সমাজ গঠনে কাজ করা।', '<p>Persons with disabilities continue to experience various forms of social exclusion, discrimination, and limited participation in community life. Negative social attitudes, lack of awareness, inaccessible environments, and limited opportunities often prevent them from exercising their rights and participating equally in society.</p><p>Recognizing that meaningful inclusion begins within communities, <strong>Abhedya Foundation</strong> promotes community-based approaches to disability inclusion. We believe that building an inclusive society requires collective efforts involving individuals, families, community leaders, local institutions, and relevant stakeholders.</p><p>Through this initiative, we aim to strengthen community awareness about disability rights, human dignity, accessibility, equality, and social participation. We encourage positive attitudes towards disability and promote the active involvement of persons with disabilities in community activities, decision-making processes, and social development initiatives.</p><p>Our approach focuses on empowering communities to recognize and address the barriers faced by persons with disabilities while creating supportive environments where everyone can participate with dignity and equal opportunities.</p><p><br></p><h3><strong><u>Key Areas of Intervention</u></strong></h3><p><strong>1. Community Awareness &amp; Sensitization</strong></p><p>Organizing awareness activities to improve community understanding of disability, inclusion, equality, and the rights of persons with disabilities.</p><p><strong>2. Disability Rights &amp; Advocacy</strong></p><p>Promoting the rights and dignity of persons with disabilities through advocacy, awareness initiatives, and engagement with local stakeholders.</p><p><strong>3. Community Engagement &amp; Participation</strong></p><p>Encouraging the active participation of persons with disabilities in community events, social activities, and local development initiatives.</p><p><strong>4. Challenging Stigma &amp; Discrimination</strong></p><p>Addressing negative perceptions, misconceptions, and discriminatory practices through community dialogue and awareness-building activities.</p><p><strong>5. Family &amp; Community Support</strong></p><p>Engaging families, caregivers, community leaders, and local organizations to strengthen support systems for persons with disabilities.</p><p><strong>6. Accessible &amp; Inclusive Communities</strong></p><p>Encouraging accessible environments, equal opportunities, and inclusive community practices that enable persons with disabilities to participate independently and meaningfully.</p><h3><strong><u>Our Goal</u></strong></h3><p>To foster inclusive, accessible, and equitable communities where persons with disabilities enjoy equal rights, dignity, opportunities, and meaningful participation in social life.</p><p><br></p><p>We believe that disability inclusion is a shared responsibility, and meaningful social change begins within the community.</p>', '<p>প্রতিবন্ধী ব্যক্তিরা এখনো সমাজের বিভিন্ন ক্ষেত্রে সামাজিক বঞ্চনা, বৈষম্য এবং অংশগ্রহণের সীমাবদ্ধতার সম্মুখীন হন। নেতিবাচক সামাজিক দৃষ্টিভঙ্গি, সচেতনতার অভাব, প্রবেশগম্য পরিবেশের সীমাবদ্ধতা এবং পর্যাপ্ত সুযোগের অভাব তাদের অধিকার চর্চা ও সমাজের মূলধারায় সমানভাবে অংশগ্রহণের পথে বাধা সৃষ্টি করে।</p><p><br></p><p><br></p><p>আমরা বিশ্বাস করি, প্রকৃত সামাজিক অন্তর্ভুক্তির সূচনা হয় কমিউনিটি থেকেই। একটি অন্তর্ভুক্তিমূলক সমাজ গড়ে তুলতে ব্যক্তি, পরিবার, স্থানীয় নেতৃত্ব, শিক্ষা ও সামাজিক প্রতিষ্ঠান এবং সংশ্লিষ্ট অংশীজনদের সম্মিলিত প্রচেষ্টা প্রয়োজন।</p><p>এই লক্ষ্যকে সামনে র<strong>অভেদ্য ফাউন্ডেশন</strong> কমিউনিটিভিত্তিক প্রতিবন্ধিতা অন্তর্ভুক্তির প্রসারে কাজ করে যাচ্ছে। আমাদের এই উদ্যোগের মাধ্যমে প্রতিবন্ধী ব্যক্তিদের অধিকার, মানবিক মর্যাদা, প্রবেশগম্যতা, সমতা এবং সামাজিক অংশগ্রহণ সম্পর্কে স্থানীয় জনগোষ্ঠীর মধ্যে সচেতনতা বৃদ্ধির ওপর গুরুত্ব দেওয়া হয়।</p><p>পাশাপাশি প্রতিবন্ধী ব্যক্তিদের সামাজিক কার্যক্রম, স্থানীয় উন্নয়ন উদ্যোগ এবং সিদ্ধান্ত গ্রহণ প্রক্রিয়ায় সক্রিয় অংশগ্রহণে উৎসাহিত করা হয়। সামাজিক নেতিবাচক দৃষ্টিভঙ্গি ও বৈষম্য দূর করে এমন একটি সহায়ক পরিবেশ তৈরিতে আমরা কাজ করি, যেখানে প্রত্যেকে মর্যাদা ও সমান সুযোগ নিয়ে সমাজে অংশগ্রহণ করতে পারেন।</p><p><br></p><p><strong><u>আমাদের কার্যক্রমের প্রধান ক্ষেত্রসমূহ</u></strong></p><p><strong>১. কমিউনিটি সচেতনতা ও সংবেদনশীলতা বৃদ্ধি</strong></p><p>প্রতিবন্ধিতা, অন্তর্ভুক্তি, সমতা এবং প্রতিবন্ধী ব্যক্তিদের অধিকার সম্পর্কে স্থানীয় জনগোষ্ঠীর মধ্যে সচেতনতা তৈরির জন্য বিভিন্ন কার্যক্রম পরিচালনা।</p><p><strong>২. প্রতিবন্ধী ব্যক্তিদের অধিকার ও অ্যাডভোকেসি</strong></p><p>সচেতনতামূলক কার্যক্রম, অধিকারভিত্তিক প্রচারণা এবং স্থানীয় অংশীজনদের সম্পৃক্ততার মাধ্যমে প্রতিবন্ধী ব্যক্তিদের অধিকার ও মর্যাদা প্রতিষ্ঠায় কাজ করা।</p><p><strong>৩. কমিউনিটির সম্পৃক্ততা ও অংশগ্রহণ</strong></p><p>সামাজিক অনুষ্ঠান, কমিউনিটিভিত্তিক কার্যক্রম এবং স্থানীয় উন্নয়ন উদ্যোগে প্রতিবন্ধী ব্যক্তিদের সক্রিয় অংশগ্রহণের সুযোগ তৈরি করা।  </p><p><strong>৪. সামাজিক নেতিবাচক দৃষ্টিভঙ্গি ও বৈষম্য দূরীকরণ</strong></p><p>সামাজিক সংলাপ, সচেতনতামূলক কার্যক্রম এবং প্রচারণার মাধ্যমে প্রতিবন্ধিতা বিষয়ে প্রচলিত ভুল ধারণা, কুসংস্কার ও বৈষম্যমূলক আচরণ পরিবর্তনে কাজ করা।</p><p><strong>৫. পরিবার ও কমিউনিটি পর্যায়ে সহযোগিতা</strong></p><p>প্রতিবন্ধী ব্যক্তিদের জন্য সহায়ক পরিবেশ ও সহযোগিতামূলক ব্যবস্থা গড়ে তুলতে পরিবার, অভিভাবক, পরিচর্যাকারী, স্থানীয় নেতৃত্ব এবং বিভিন্ন সংগঠনকে সম্পৃক্ত করা।</p><p>প্রতিবন্ধী ব্যক্তিদের জন্য সহায়ক পরিবেশ ও সহযোগিতামূলক ব্যবস্থা গড়ে তুলতে পরিবার, অভিভাবক, পরিচর্যাকারী, স্থানীয় নেতৃত্ব এবং বিভিন্ন সংগঠনকে সম্পৃক্ত করা।</p><p><strong>৬. প্রবেশগম্য ও অন্তর্ভুক্তিমূলক কমিউনিটি </strong></p><p>এমন একটি পরিবেশ গড়ে তুলতে উৎসাহিত করা, যেখানে প্রতিবন্ধী ব্যক্তিরা স্বাধীনভাবে, নিরাপদে এবং সমান মর্যাদায় সামাজিক জীবনে অংশগ্রহণ করতে পারেন</p><p><br></p><p><strong><u>আমাদের লক্ষ্য</u></strong></p><p>এমন একটি অন্তর্ভুক্তিমূলক, প্রবেশগম্য ও সমতাভিত্তিক কমিউনিটি গড়ে তোলা, যেখানে প্রতিবন্ধী ব্যক্তিরা সমান অধিকার, মর্যাদা, সুযোগ এবং সামাজিক অংশগ্রহণ নিশ্চিত করতে পারবেন।</p><p><br></p><p><br></p><p>আমরা বিশ্বাস করি, প্রতিবন্ধিতা অন্তর্ভুক্তি কোনো একক ব্যক্তি বা প্রতিষ্ঠানের দায়িত্ব নয়; এটি একটি সম্মিলিত সামাজিক দায়িত্ব। আর প্রকৃত সামাজিক পরিবর্তনের সূচনা হয় নিজস্ব কমিউনিটি থাহিত রোগ উল্লেখযোগ্য হারে কমিয়েছে।রা।</p><p><br></p>', 'uploads/b6uyOhvbuYjqXBz82vsY6TeEKofLmb8q3EY8LbPW.jpg', 'ongoing', NULL, NULL, 'Bangladesh', 'বাংলাদেশ', 1, 1, '2026-10-12 11:22:02', '2026-11-24 20:13:31'),
(4, 'Inclusive Skills Development & Empowerment', 'অন্তর্ভুক্তিমূলক দক্ষতা উন্নয়ন ও ক্ষমতায়ন', 'inclusive-vocational-skill-development-empowerment', 'To support the skill development and capacity building of persons with disabilities and disadvantaged groups, and to expand their opportunities for employment and participation in livelihoods.', 'প্রতিবন্ধী ব্যক্তি এবং সুবিধাবঞ্চিত গোষ্ঠীর দক্ষতা উন্নয়ন এবং সক্ষমতা বৃদ্ধিতে সহায়তা করা এবং কর্মসংস্থান এবং জীবিকা নির্বাহে তাদের অংশগ্রহণের সুযোগ বৃদ্ধি করা।', '<p>Access to skills development, employment, and economic opportunities is essential for achieving independence, dignity, and meaningful participation in society. However, persons with disabilities and individuals from underserved communities often face significant barriers in accessing vocational training, skill development programmes, employment opportunities, and sustainable livelihood options.</p><p><strong>Abhedya Foundation</strong> recognizes that empowerment goes beyond providing assistance; it involves creating opportunities for individuals to develop their abilities, build confidence, and become active contributors to their families, communities, and society.</p><p>Through the Inclusive Skills Development &amp; Empowerment initiative, we work to promote equitable access to practical skills development, capacity-building opportunities, and livelihood-oriented support for persons with disabilities and underserved populations.</p><p>Our approach emphasizes ability-based learning, hands-on training, inclusive participation, and opportunities for economic engagement. We aim to support individuals in developing practical competencies, exploring livelihood opportunities, strengthening self-confidence, and moving towards greater financial and social independence.</p><p>We also encourage inclusive livelihood initiatives and community-based economic activities that recognize the potential of individuals who are often excluded from mainstream opportunities.</p><h3><strong><u>Key Areas of Intervention</u></strong></h3><p><strong>1. Inclusive Skills Development</strong></p><p>Creating opportunities for persons with disabilities and underserved individuals to acquire practical, vocational, and livelihood-related skills based on their abilities and interests.</p><p><strong>2. Vocational &amp; Practical Training</strong></p><p>Facilitating hands-on training and practical learning opportunities to develop skills that can contribute to employment, entrepreneurship, and independent living.</p><p><strong>3. Capacity Building &amp; Personal Development</strong></p><p>Strengthening individual capabilities through confidence-building, communication, problem-solving, teamwork, and other essential life skills.</p><p><strong>4. Livelihood Development &amp; Economic Participation</strong></p><p>Promoting income-generating opportunities, livelihood initiatives, and economic participation for persons with disabilities and vulnerable communities.</p><p><strong>5. Entrepreneurship &amp; Self-Reliance</strong></p><p>Encouraging entrepreneurial initiatives, small-scale production, and self-employment opportunities to support financial independence and sustainable livelihoods.</p><p><strong>6. Inclusive Employment &amp; Empowerment</strong></p><p>Promoting equal access to employment, productive engagement, and economic opportunities while encouraging workplaces and livelihood systems that recognize diverse abilities.</p><h3><strong><u>Our Goal</u></strong></h3><p>To empower persons with disabilities and underserved communities through inclusive skills development, meaningful economic opportunities, and sustainable livelihood pathways.</p><p><br></p><p>We believe that every individual has the potential to contribute to society when provided with the right opportunities, support, and an inclusive environment.</p>', '<p>দক্ষতা উন্নয়ন, কর্মসংস্থান এবং অর্থনৈতিক কর্মকাণ্ডে অংশগ্রহণ একজন মানুষের আত্মনির্ভরশীলতা, মর্যাদা ও সামাজিক অংশগ্রহণ নিশ্চিত করার জন্য অত্যন্ত গুরুত্বপূর্ণ। কিন্তু প্রতিবন্ধী ব্যক্তি এবং সুবিধাবঞ্চিত জনগোষ্ঠীর অনেকেই কারিগরি প্রশিক্ষণ, দক্ষতা উন্নয়ন, কর্মসংস্থান এবং টেকসই জীবিকার সুযোগ গ্রহণের ক্ষেত্রে বিভিন্ন প্রতিবন্ধকতার সম্মুখীন হন<strong>অভেদ্য ফাউন্ডেশন</strong> বিশ্বাস করে, ক্ষমতায়ন কেবল সহায়তা প্রদানের মধ্যে সীমাবদ্ধ নয়; বরং ব্যক্তির নিজস্ব সক্ষমতা বিকাশ, আত্মবিশ্বাস তৈরি এবং পরিবার, কমিউনিটি ও সমাজে সক্রিয় অবদান রাখার সুযোগ সৃষ্টির মধ্যেই প্রকৃত ক্ষমতায়নের বাস্তবায়ন ঘটে।</p><p>এই লক্ষ্যকে সামনে রেখে অভেদ্য ফাউন্ডেশন প্রতিবন্ধী ব্যক্তি ও সুবিধাবঞ্চিত জনগোষ্ঠীর জন্য অন্তর্ভুক্তিমূলক দক্ষতা উন্নয়ন, ব্যবহারিক প্রশিক্ষণ, সক্ষমতা বৃদ্ধি এবং জীবিকাভিত্তিক সহায়তার সুযোগ সম্প্রসারণে কাজ করছে।</p><p>আমাদের কার্যক্রমে ব্যক্তির সক্ষমতা, আগ্রহ ও প্রয়োজনের ভিত্তিতে দক্ষতা অর্জন, হাতে-কলমে প্রশিক্ষণ, সৃজনশীলতা বিকাশ এবং অর্থনৈতিক কর্মকাণ্ডে অংশগ্রহণের ওপর গুরুত্ব দেওয়া হয়। এর মাধ্যমে ব্যক্তির আত্মবিশ্বাস, কর্মদক্ষতা ও স্বনির্ভরতা বৃদ্ধির পাশাপাশি টেকসই জীবিকা অর্জনের পথ তৈরি করতে আমরা কাজ করি।</p><p>বিশেষ করে যারা প্রচলিত কর্মসংস্থান ও অর্থনৈতিক সুযোগ থেকে পিছিয়ে রয়েছেন, তাদের জন্য অন্তর্ভুক্তিমূলক জীবিকায়ন উদ্যোগ এবং কমিউনিটিভিত্তিক উৎপাদনমূলক কার্যক্রমের সুযোগ সৃষ্টিতে আমরা গুরুত্ব দিই।</p><p><br></p><p><strong><u>আমাদের কার্যক্রমের প্রধান ক্ষেত্রসমূহ</u></strong></p><p><strong>১. অন্তর্ভুক্তিমূলক দক্ষতা উন্নয়ন</strong></p><p>প্রতিবন্ধী ব্যক্তি ও সুবিধাবঞ্চিত জনগোষ্ঠীর সক্ষমতা, আগ্রহ ও প্রয়োজন অনুযায়ী ব্যবহারিক, কারিগরি এবং জীবিকাভিত্তিক দক্ষতা অর্জনের সুযোগ তৈরি করা। </p><p><strong>২. কারিগরি ও ব্যবহারিক প্রশিক্ষণ</strong></p><p>কর্মসংস্থান, উদ্যোক্তা কার্যক্রম এবং স্বাধীন জীবনযাপনে সহায়ক দক্ষতা অর্জনের জন্য হাতে-কলমে প্রশিক্ষণ ও ব্যবহারিক শিক্ষার সুযোগ সৃষ্টি করা।</p><p><strong>৩. সক্ষমতা বৃদ্ধি ও ব্যক্তিগত উন্নয়ন</strong></p><p>আত্মবিশ্বাস, যোগাযোগ দক্ষতা, সমস্যা সমাধান, দলগত কাজ এবং দৈনন্দিন জীবন পরিচালনার প্রয়োজনীয় দক্ষতা বিকাশে সহযোগিতা করা। </p><p><strong>৪. জীবিকায়ন ও অর্থনৈতিক অংশগ্রহণ</strong></p><p>প্রতিবন্ধী ব্যক্তি ও সুবিধাবঞ্চিত জনগোষ্ঠীর জন্য আয়বর্ধক কার্যক্রম, জীবিকাভিত্তিক উদ্যোগ এবং অর্থনৈতিক কর্মকাণ্ডে অংশগ্রহণের সুযোগ সম্প্রসারণ করা। </p><p><strong>৫. উদ্যোক্তা উন্নয়ন ও স্বনির্ভরতা</strong></p><p>আর্থিক স্বনির্ভরতা ও টেকসই জীবিকা নিশ্চিত করার লক্ষ্যে ক্ষুদ্র উদ্যোগ, উদ্যোক্তা কার্যক্রম এবং স্ব-কর্মসংস্থানে উৎসাহিত করা।<strong>৬. অন্তর্ভুক্তিমূলক কর্মসংস্থান ও ক্ষমতায়ন</strong></p><p>প্রতিবন্ধী ব্যক্তি ও সুবিধাবঞ্চিত জনগোষ্ঠীর জন্য সমান কর্মসংস্থান ও উৎপাদনশীল কর্মকাণ্ডে অংশগ্রহণের সুযোগ তৈরি এবং সক্ষমতাভিত্তিক কর্মপরিবেশ গড়ে তুলতে কাজ করা।</p><p><br></p><p><strong><u>আমাদের লক্ষ্য</u></strong></p><p>অন্তর্ভুক্তিমূলক দক্ষতা উন্নয়ন, অর্থনৈতিক অংশগ্রহণ এবং টেকসই জীবিকার সুযোগ সৃষ্টির মাধ্যমে প্রতিবন্ধী ব্যক্তি ও সুবিধাবঞ্চিত জনগোষ্ঠীকে আত্মনির্ভরশীল ও ক্ষমতায়িত করে তোলা।</p><p><br></p><p><br></p><p>আমরা বিশ্বাস করি, যথাযথ সুযোগ, প্রয়োজনীয় সহযোগিতা এবং অন্তর্ভুক্তিমূলক পরিবেশ পেলে প্রত্যেক ব্যক্তিই নিজের সক্ষমতা অনুযায়ী সমাজে গুরুত্বপূর্ণ অবদান রাখতে পারে পরিবারে নিয়মিত আয় নিশ্চিত করছেে নিয়মিত আয় নিশ্চিত করছেন।</p>', NULL, 'ongoing', NULL, NULL, 'Bangladesh', 'বাংলাদেশ', 1, 1, '2026-10-12 11:22:02', '2026-11-24 20:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(2, 'User', 'user', '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(3, 'Customer', 'customer', '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(4, 'Editor', 'editor', '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(5, 'All', '*', '2026-10-12 11:10:37', '2026-10-12 11:10:37'),
(6, 'Super Admin', 'super-admin', '2026-10-12 11:10:37', '2026-10-12 11:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('A0GlPPRF1qPlQBXnCritr155nR90iwpVfqvXtVux', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/158.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJiNXI5eU1VTmNHSGtHOGtuMnNTdXdkQ3NCUzdCMDlZM1VKNTN5MFNpIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1795550565),
('TDRb9T4NyY92ZZtjsUnsqzHDQdrj3h1whxqaExvU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/158.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJBWWQ1WW4wSHJjSzlBV3ltdFh1VnN1d1Bsc2VZNHBBNHROM1VqcFZaIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1795550614),
('yI3Q7OiRLWblGpbhperVTfNJ6ajbqWH3dojizfpH', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/158.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJhYWxQWGtUQlc2ZDVaa0VFNVVRSUtCbTFPUDZVVWNOMUdBeEFVT09YIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ0eXJvLWxvZ2luIjp7ImNhcHRjaGEiOnsibG9naW4iOjZ9fSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BvcnRhbC5sb2NhbGhvc3Q6ODAwMFwvZGFzaGJvYXJkXC9yb2xlcyIsInJvdXRlIjoidHlyby1kYXNoYm9hcmQucm9sZXMuaW5kZXgifSwibG9jYWxlIjoiYm4iLCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MywicGFzc3dvcmRfaGFzaF93ZWIiOiI4MDhjNDA5M2Q1MTYyMGU0NTg3MWMxYjczZWY0MDA4Njc0YzAyYjRiMjcwZDI3ZmM5Y2NlODFlYmMyNTRmNGIxIn0=', 1795555258);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `value_bn` longtext DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `label`, `value`, `value_bn`, `type`, `group`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Site Name', 'Abhedya Foundation', 'অভেদ্য ফাউন্ডেশন', 'text', 'general', '2026-10-12 11:22:02', '2026-11-13 16:11:26'),
(4, 'mission', 'Our Mission', 'To empower communities through education and healthcare', 'শিক্ষা এবং স্বাস্থ্যসেবার মাধ্যমে কমিউনিটিগুলিকে শক্তিশালী করা', 'textarea', 'general', '2026-10-12 11:22:02', '2026-11-13 16:07:56'),
(5, 'vision', 'Our Vision', 'A just, compassionate society where every individual has equal opportunities to thrive with self-reliance, security, and human dignity.', 'একটি ন্যায়পরায়ণ ও সহানুভূতিশীল সমাজ, যেখানে প্রতিটি মানুষের স্বাবলম্বিতা, নিরাপত্তা ও মর্যাদার সাথে বাঁচার সমান সুযোগ থাকবে।', 'textarea', 'general', '2026-10-12 11:22:02', '2026-11-13 16:16:45'),
(10, 'contact_email', 'Official Email', 'info@abhedyafoundation.org', 'info@abhedyafoundation.org', 'text', 'contact', '2026-10-12 11:22:02', '2026-11-13 16:17:37'),
(11, 'contact_phone', 'Contact Telephone', '+880 1518-913960', '+৮৮০ ১৫১৮-৯১৩৯৬০', 'text', 'contact', '2026-10-12 11:22:02', '2026-11-13 16:17:43'),
(12, 'contact_address', 'Office Address', '1053/2/A, Mirpur-2, Dhaka-1216, Bangladesh', '১০৫৩/২/এ, মিরপুর-২, ঢাকা-১২১৬, বাংলাদেশ', 'text', 'contact', '2026-10-12 11:22:02', '2026-11-24 20:26:46'),
(13, 'social_facebook', 'Facebook URL', 'https://www.facebook.com/share/1KN5emEZuC/', 'https://www.facebook.com/share/1KN5emEZuC/', 'text', 'social', '2026-10-12 11:22:02', '2026-11-24 20:57:36'),
(14, 'social_twitter', 'Twitter/X URL', 'https://twitter.com/abhedya_bd', 'https://twitter.com/abhedya_bd', 'text', 'social', '2026-10-12 11:22:02', '2026-11-13 16:18:16'),
(15, 'social_linkedin', 'LinkedIn URL', 'https://linkedin.com/company/abhedyafoundation', 'https://linkedin.com/company/abhedyafoundation', 'text', 'social', '2026-10-12 11:22:02', '2026-11-13 16:18:34'),
(16, 'social_youtube', 'YouTube Channel', 'https://youtube.com/@abhedyafoundation', 'https://youtube.com/@abhedyafoundation', 'text', 'social', '2026-10-12 11:22:02', '2026-11-13 16:18:49'),
(17, 'donation_bkash_number', 'bKash Merchant/Personal Number', '01518913960', '০১৫১৮৯১৩৯৬০', 'text', 'donation', '2026-10-12 11:22:02', '2026-11-13 16:21:07'),
(18, 'donation_nagad_number', 'Nagad Number', '01518913960', '০১৫১৮৯১৩৯৬০', 'text', 'donation', '2026-10-12 11:22:02', '2026-11-13 16:21:17'),
(19, 'donation_rocket_number', 'Rocket Number', '01518913960', '০১৫১৮৯১৩৯৬০', 'text', 'donation', '2026-10-12 11:22:02', '2026-11-13 16:20:07'),
(20, 'donation_bank_details', 'Bank Transfer Details', 'Bank Name: BRAC Bank PLC\r\nAccount Name: Abedya Foundation\r\nAccount No: 1054859470001\r\nBranch: Mohakhali Branch\r\nRouting No: 060261384', 'ব্যাংকের নাম: ব্র্যাক ব্যাংক পিএলসি\r\nঅ্যাকাউন্টের নাম: অভেদ্য ফাউন্ডেশন\r\nঅ্যাকাউন্ট নম্বর: ১০৫৪৮৫৯৪৭০০০১\r\nশাখাঃ মহাখালী শাখা\r\nরাউটিং নম্বর: 060261384', 'textarea', 'donation', '2026-10-12 11:22:02', '2026-11-24 20:55:36'),
(21, 'donation_guidelines', 'Donor Instructions', 'After completing your transfer via bKash, Nagad, Rocket, or Bank, please submit your transaction details below. Our team verifies every record before confirming donations.', 'বিকাশ, নগদ, রকেট বা ব্যাংকের মাধ্যমে আপনার ট্রান্সফার সম্পন্ন করার পরে, অনুগ্রহ করে নিচে আপনার লেনদেনের বিবরণ জমা দিন। দান নিশ্চিত করার আগে আমাদের টিম প্রতিটি রেকর্ড যাচাই করে।', 'textarea', 'donation', '2026-10-12 11:22:02', '2026-11-24 21:00:02'),
(43, 'hero_description', 'Home Hero Subtitle / Description', 'Abhedya Foundation builds long-term community resilience through digital classrooms for remote schools, mobile medical camps, emergency flood response, and women-led vocational empowerment.', 'অভেদ্য ফাউন্ডেশন দুর্গম অঞ্চলে ডিজিটাল ক্লাসরুম, ভ্রাম্যমাণ স্বাস্থ্যসেবা ক্যাম্প, জরুরি বন্যা মোকাবিলা এবং নারীদের বৃত্তিমূলক প্রশিক্ষণের মাধ্যমে সমাজে দীর্ঘমেয়াদী স্বাবলম্বিতা গড়ে তোলে।', 'textarea', 'general', '2026-11-13 16:47:05', '2026-11-13 16:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_user_id` varchar(255) NOT NULL,
  `provider_email` varchar(255) DEFAULT NULL,
  `provider_avatar` varchar(255) DEFAULT NULL,
  `access_token` text DEFAULT NULL,
  `refresh_token` text DEFAULT NULL,
  `token_expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Scholarship', 'scholarship', '2026-10-12 11:22:02', '2026-10-12 11:22:02'),
(2, 'Flood Relief', 'flood-relief', '2026-10-12 11:22:02', '2026-10-12 11:22:02'),
(3, 'Winter Drive', 'winter-drive', '2026-10-12 11:22:02', '2026-10-12 11:22:02'),
(4, 'Free Clinic', 'free-clinic', '2026-10-12 11:22:02', '2026-10-12 11:22:02'),
(5, 'Women in Tech', 'women-in-tech', '2026-10-12 11:22:02', '2026-10-12 11:22:02'),
(6, 'Clean Water', 'clean-water', '2026-10-12 11:22:02', '2026-10-12 11:22:02'),
(7, 'Child Welfare', 'child-welfare', '2026-10-12 11:22:02', '2026-10-12 11:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `tyro_audit_logs`
--

CREATE TABLE `tyro_audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(255) NOT NULL,
  `auditable_type` varchar(255) DEFAULT NULL,
  `auditable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`old_values`)),
  `new_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`new_values`)),
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tyro_audit_logs`
--

INSERT INTO `tyro_audit_logs` (`id`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `metadata`, `created_at`) VALUES
(140, 3, 'invitation.created', 'HasinHayder\\TyroLogin\\Models\\InvitationLink', 2, NULL, '{\"id\":2,\"user_id\":1,\"hash\":\"o17c6bG2iYD8VWm0WbOAXMVMFdKEuXk0\"}', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/158.0.0.0 Safari\\/537.36\",\"is_console\":false}', '2026-11-24 21:15:01'),
(141, 3, 'user.logout', 'App\\Models\\User', 3, NULL, '{\"email\":\"niloyahsan.official@gmail.com\"}', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/158.0.0.0 Safari\\/537.36\",\"is_console\":false}', '2026-11-24 21:15:20'),
(142, NULL, 'role.attached', 'App\\Models\\User', 5, NULL, '{\"role_id\":2,\"role_slug\":\"user\"}', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/158.0.0.0 Safari\\/537.36\",\"is_console\":false}', '2026-11-24 21:15:44'),
(143, 5, 'user.login', 'App\\Models\\User', 5, NULL, '{\"email\":\"niaz@gmail.com\"}', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/158.0.0.0 Safari\\/537.36\",\"is_console\":false}', '2026-11-24 21:15:45'),
(144, 5, 'user.logout', 'App\\Models\\User', 5, NULL, '{\"email\":\"niaz@gmail.com\"}', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/158.0.0.0 Safari\\/537.36\",\"is_console\":false}', '2026-11-24 21:16:18'),
(145, 3, 'user.login', 'App\\Models\\User', 3, NULL, '{\"email\":\"niloyahsan.official@gmail.com\"}', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/158.0.0.0 Safari\\/537.36\",\"is_console\":false}', '2026-11-24 21:16:23'),
(146, 3, 'role.assigned', 'App\\Models\\User', 5, NULL, '{\"role_id\":1,\"role_slug\":\"admin\"}', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/158.0.0.0 Safari\\/537.36\",\"is_console\":false}', '2026-11-24 21:16:33'),
(147, 3, 'user.logout', 'App\\Models\\User', 3, NULL, '{\"email\":\"niloyahsan.official@gmail.com\"}', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/158.0.0.0 Safari\\/537.36\",\"is_console\":false}', '2026-11-24 21:16:50'),
(148, 5, 'user.login', 'App\\Models\\User', 5, NULL, '{\"email\":\"niaz@gmail.com\"}', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/158.0.0.0 Safari\\/537.36\",\"is_console\":false}', '2026-11-24 21:17:03'),
(149, 5, 'user.logout', 'App\\Models\\User', 5, NULL, '{\"email\":\"niaz@gmail.com\"}', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/158.0.0.0 Safari\\/537.36\",\"is_console\":false}', '2026-11-24 21:17:08'),
(150, 3, 'user.login', 'App\\Models\\User', 3, NULL, '{\"email\":\"niloyahsan.official@gmail.com\"}', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/158.0.0.0 Safari\\/537.36\",\"is_console\":false}', '2026-11-24 21:17:17'),
(151, 3, 'invitation.deleted', NULL, NULL, '{\"id\":2,\"user_id\":1,\"hash\":\"o17c6bG2iYD8VWm0WbOAXMVMFdKEuXk0\",\"referrals_count\":1}', NULL, '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/158.0.0.0 Safari\\/537.36\",\"is_console\":false}', '2026-11-24 21:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `tyro_media`
--

CREATE TABLE `tyro_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `webp_path` varchar(255) DEFAULT NULL,
  `thumbnail_path` varchar(255) DEFAULT NULL,
  `disk` varchar(50) NOT NULL DEFAULT 'public',
  `mime_type` varchar(100) NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `is_favorite` tinyint(1) NOT NULL DEFAULT 0,
  `source_url` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tyro_media`
--

INSERT INTO `tyro_media` (`id`, `user_id`, `filename`, `path`, `webp_path`, `thumbnail_path`, `disk`, `mime_type`, `size`, `alt_text`, `is_favorite`, `source_url`, `created_at`, `updated_at`) VALUES
(2, 3, 'image.png', 'media/a5772df75a067ce5c82f2cbeb3df7856.png', 'media/a5772df75a067ce5c82f2cbeb3df7856.webp', 'media/a5772df75a067ce5c82f2cbeb3df7856_thumb.webp', 'public', 'image/png', 126681, NULL, 0, NULL, '2026-11-13 16:22:01', '2026-11-13 16:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `tyro_media_categories`
--

CREATE TABLE `tyro_media_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(180) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tyro_media_category_media`
--

CREATE TABLE `tyro_media_category_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media_category_id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tyro_smtp_presets`
--

CREATE TABLE `tyro_smtp_presets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mailer` varchar(255) NOT NULL DEFAULT 'smtp',
  `host` varchar(255) NOT NULL DEFAULT '',
  `port` smallint(5) UNSIGNED NOT NULL DEFAULT 587,
  `encryption` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `from_address` varchar(255) DEFAULT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tyro_starred_import_images`
--

CREATE TABLE `tyro_starred_import_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `use_gravatar` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `suspended_at`, `suspension_reason`, `profile_photo_path`, `use_gravatar`) VALUES
(1, 'Abhedya Admin', 'admin@abhedya.com', NULL, '$2y$12$gwvHD/50wbj/y2sco2IRTu7IqGaZ0/JDwnqJwCSzxXj8q5N1FxNqy', NULL, NULL, NULL, 'm2kFOcJ6w2GDnbag4L5MDs3aNGOTWMeYtiOo5n03wGFHbVTuZzeByOTiPEXN', '2026-10-12 11:11:40', '2026-10-27 19:18:46', NULL, NULL, NULL, 0),
(3, 'Niloy Ahsan', 'niloyahsan.official@gmail.com', NULL, '$2y$12$aGyQTA8LtaJaagevJDfy6uvfvYK0p039a7Q0E2BpWFgk2GTFQBnFq', NULL, NULL, NULL, 'yu1ra3g27jOkSntMKr0EZ1nsiyva8aZ3JojdfCWkXSSzE8ZUzzd57OvN5bRQ', '2026-10-12 13:04:45', '2026-10-27 19:49:02', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-10-12 11:11:40', '2026-10-12 11:11:40'),
(3, 3, 2, '2026-10-12 13:04:45', '2026-10-12 13:04:45'),
(4, 3, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `campaigns_slug_unique` (`slug`),
  ADD KEY `campaigns_status_index` (`status`),
  ADD KEY `campaigns_is_featured_index` (`is_featured`),
  ADD KEY `campaigns_is_published_index` (`is_published`);

--
-- Indexes for table `campaign_updates`
--
ALTER TABLE `campaign_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaign_updates_campaign_id_foreign` (`campaign_id`),
  ADD KEY `campaign_updates_published_at_index` (`published_at`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_messages_is_read_index` (`is_read`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_campaign_id_foreign` (`campaign_id`),
  ADD KEY `donations_verified_by_foreign` (`verified_by`),
  ADD KEY `donations_payment_method_index` (`payment_method`),
  ADD KEY `donations_transaction_id_index` (`transaction_id`),
  ADD KEY `donations_status_index` (`status`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `gallery_albums`
--
ALTER TABLE `gallery_albums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gallery_albums_slug_unique` (`slug`),
  ADD KEY `gallery_albums_is_published_index` (`is_published`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_gallery_album_id_foreign` (`gallery_album_id`),
  ADD KEY `gallery_images_is_published_index` (`is_published`);

--
-- Indexes for table `invitation_links`
--
ALTER TABLE `invitation_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invitation_links_hash_unique` (`hash`),
  ADD KEY `invitation_links_user_id_index` (`user_id`);

--
-- Indexes for table `invitation_referrals`
--
ALTER TABLE `invitation_referrals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invitation_referrals_invitation_link_id_index` (`invitation_link_id`),
  ADD KEY `invitation_referrals_referred_user_id_index` (`referred_user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_is_published_index` (`is_published`),
  ADD KEY `posts_is_featured_index` (`is_featured`),
  ADD KEY `posts_published_at_index` (`published_at`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_tag_post_id_tag_id_unique` (`post_id`,`tag_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `privileges_slug_unique` (`slug`);

--
-- Indexes for table `privilege_role`
--
ALTER TABLE `privilege_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `privilege_role_role_id_privilege_id_unique` (`role_id`,`privilege_id`),
  ADD KEY `privilege_role_privilege_id_foreign` (`privilege_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`),
  ADD KEY `projects_status_index` (`status`),
  ADD KEY `projects_is_published_index` (`is_published`),
  ADD KEY `projects_is_featured_index` (`is_featured`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_slug_index` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_settings_key_unique` (`key`),
  ADD KEY `site_settings_group_index` (`group`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_accounts_provider_provider_user_id_unique` (`provider`,`provider_user_id`),
  ADD KEY `social_accounts_provider_provider_user_id_index` (`provider`,`provider_user_id`),
  ADD KEY `social_accounts_user_id_index` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `tyro_audit_logs`
--
ALTER TABLE `tyro_audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tyro_audit_logs_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  ADD KEY `tyro_audit_logs_user_id_index` (`user_id`),
  ADD KEY `tyro_audit_logs_event_index` (`event`);

--
-- Indexes for table `tyro_media`
--
ALTER TABLE `tyro_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tyro_media_user_id_foreign` (`user_id`),
  ADD KEY `tyro_media_is_favorite_index` (`is_favorite`);

--
-- Indexes for table `tyro_media_categories`
--
ALTER TABLE `tyro_media_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tyro_media_categories_user_id_slug_index` (`user_id`,`slug`);

--
-- Indexes for table `tyro_media_category_media`
--
ALTER TABLE `tyro_media_category_media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_category_media_unique` (`media_category_id`,`media_id`),
  ADD KEY `tyro_media_category_media_media_id_foreign` (`media_id`);

--
-- Indexes for table `tyro_smtp_presets`
--
ALTER TABLE `tyro_smtp_presets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tyro_smtp_presets_name_unique` (`name`);

--
-- Indexes for table `tyro_starred_import_images`
--
ALTER TABLE `tyro_starred_import_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tyro_starred_import_images_user_id_star_key_unique` (`user_id`,`star_key`),
  ADD KEY `tyro_starred_import_images_user_id_starred_at_index` (`user_id`,`starred_at`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_roles_user_id_role_id_unique` (`user_id`,`role_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campaign_updates`
--
ALTER TABLE `campaign_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_albums`
--
ALTER TABLE `gallery_albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invitation_links`
--
ALTER TABLE `invitation_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invitation_referrals`
--
ALTER TABLE `invitation_referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `privilege_role`
--
ALTER TABLE `privilege_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tyro_audit_logs`
--
ALTER TABLE `tyro_audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `tyro_media`
--
ALTER TABLE `tyro_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tyro_media_categories`
--
ALTER TABLE `tyro_media_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tyro_media_category_media`
--
ALTER TABLE `tyro_media_category_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tyro_smtp_presets`
--
ALTER TABLE `tyro_smtp_presets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tyro_starred_import_images`
--
ALTER TABLE `tyro_starred_import_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaign_updates`
--
ALTER TABLE `campaign_updates`
  ADD CONSTRAINT `campaign_updates_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `donations_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_gallery_album_id_foreign` FOREIGN KEY (`gallery_album_id`) REFERENCES `gallery_albums` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `invitation_referrals`
--
ALTER TABLE `invitation_referrals`
  ADD CONSTRAINT `invitation_referrals_invitation_link_id_foreign` FOREIGN KEY (`invitation_link_id`) REFERENCES `invitation_links` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `privilege_role`
--
ALTER TABLE `privilege_role`
  ADD CONSTRAINT `privilege_role_privilege_id_foreign` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `privilege_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tyro_media`
--
ALTER TABLE `tyro_media`
  ADD CONSTRAINT `tyro_media_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tyro_media_categories`
--
ALTER TABLE `tyro_media_categories`
  ADD CONSTRAINT `tyro_media_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tyro_media_category_media`
--
ALTER TABLE `tyro_media_category_media`
  ADD CONSTRAINT `tyro_media_category_media_media_category_id_foreign` FOREIGN KEY (`media_category_id`) REFERENCES `tyro_media_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tyro_media_category_media_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `tyro_media` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tyro_starred_import_images`
--
ALTER TABLE `tyro_starred_import_images`
  ADD CONSTRAINT `tyro_starred_import_images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
