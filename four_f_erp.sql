-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 05, 2025 at 08:02 AM
-- Server version: 5.7.44
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `four_f_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` bigint(10) NOT NULL,
  `client_comp_id` bigint(10) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_shot_name` varchar(100) NOT NULL,
  `client_vender_code` varchar(100) NOT NULL,
  `client_contact_person` varchar(100) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_mobile` varchar(100) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `client_gst_no` varchar(100) NOT NULL,
  `client_t_n_c` text,
  `client_created_by` bigint(10) NOT NULL,
  `client_updated_by` bigint(10) NOT NULL,
  `client_created_on` datetime NOT NULL,
  `client_updated_on` datetime NOT NULL,
  `client_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_comp_id`, `client_name`, `client_shot_name`, `client_vender_code`, `client_contact_person`, `client_email`, `client_mobile`, `client_address`, `client_gst_no`, `client_t_n_c`, `client_created_by`, `client_updated_by`, `client_created_on`, `client_updated_on`, `client_status`) VALUES
(1, 1, 'client name', 'shot name', 'vc123', 'Mr abc', 'info@tarunishroff.com', '123', 'dd', 'gst21', NULL, 1, 1, '2025-03-27 19:33:18', '2025-03-27 19:33:18', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comp_id` bigint(10) NOT NULL,
  `comp_name` varchar(100) NOT NULL,
  `comp_contact_person` varchar(100) NOT NULL,
  `comp_contact_mobile` varchar(100) NOT NULL,
  `comp_contact_email` varchar(100) NOT NULL,
  `comp_mobile` varchar(100) NOT NULL,
  `comp_email` varchar(100) NOT NULL,
  `comp_start_date` datetime NOT NULL,
  `comp_end_date` datetime NOT NULL,
  `comp_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `comp_name`, `comp_contact_person`, `comp_contact_mobile`, `comp_contact_email`, `comp_mobile`, `comp_email`, `comp_start_date`, `comp_end_date`, `comp_status`) VALUES
(1, 'Four F Industries', 'Shivnath Padar', '9767999472', 'srpadar@fourfgroup.com', '9767999472', 'maintenance@fourfgroup.com', '2025-03-25 14:59:04', '2026-03-25 14:59:04', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `depts`
--

CREATE TABLE `depts` (
  `dept_id` bigint(10) NOT NULL,
  `dept_comp_id` bigint(10) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `dept_status` varchar(20) NOT NULL,
  `dept_created_on` datetime DEFAULT NULL,
  `dept_updated_on` datetime DEFAULT NULL,
  `dept_created_by` bigint(10) NOT NULL,
  `dept_updated_by` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `depts`
--

INSERT INTO `depts` (`dept_id`, `dept_comp_id`, `dept_name`, `dept_status`, `dept_created_on`, `dept_updated_on`, `dept_created_by`, `dept_updated_by`) VALUES
(1, 1, 'Accounts', 'ok', '2025-03-25 15:05:08', '2025-03-25 15:05:08', 0, 0),
(2, 1, 'Admin', 'ok', '2025-03-25 15:05:08', '2025-03-25 15:05:08', 0, 0),
(3, 1, 'Purchase', 'ok', '2025-03-25 15:05:35', '2025-03-25 15:05:35', 0, 0),
(4, 1, 'Sales', 'ok', '2025-03-25 15:05:35', '2025-03-27 07:44:19', 0, 0),
(5, 1, 'Security Gate', 'ok', '2025-03-25 15:06:07', '2025-03-27 07:43:32', 0, 0),
(6, 1, 'Store', 'ok', '2025-03-25 15:06:07', '2025-03-27 07:42:23', 0, 0),
(7, 1, 'Production', 'ok', '2025-03-25 15:06:55', '2025-03-27 07:40:54', 0, 0),
(8, 1, 'Quality', 'ok', '2025-03-25 15:06:55', '2025-03-27 07:37:00', 0, 0),
(9, 1, 'Assembly', 'ok', '2025-03-25 15:07:21', '2025-03-27 07:36:39', 0, 1),
(10, 1, 'test', 'deleted', '2025-03-27 07:28:15', '2025-03-27 07:46:46', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emps`
--

CREATE TABLE `emps` (
  `emp_id` bigint(10) NOT NULL,
  `emp_comp_id` bigint(10) NOT NULL,
  `emp_dept_id` bigint(10) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_code` varchar(100) NOT NULL,
  `emp_mobile` varchar(100) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_password` varchar(100) DEFAULT NULL,
  `emp_login_allowed` varchar(20) NOT NULL,
  `emp_last_login` datetime DEFAULT NULL,
  `emp_status` varchar(20) NOT NULL,
  `emp_created_on` datetime NOT NULL,
  `emp_updated_on` datetime NOT NULL,
  `emp_created_by` bigint(10) NOT NULL,
  `emp_updated_by` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emps`
--

INSERT INTO `emps` (`emp_id`, `emp_comp_id`, `emp_dept_id`, `emp_name`, `emp_code`, `emp_mobile`, `emp_email`, `emp_password`, `emp_login_allowed`, `emp_last_login`, `emp_status`, `emp_created_on`, `emp_updated_on`, `emp_created_by`, `emp_updated_by`) VALUES
(1, 1, 1, 'amit gadhiya', '001', '9766334477', 'amitgadhiya@gmail.com', '$2y$12$/5dk.O0Zkjq3jyuuhmeTCe04hcw2WkPKBXS5Lf7RrU1iXC1b/quXi', 'yes', '2025-04-05 13:03:42', 'ok', '2025-03-26 05:48:42', '2025-04-05 13:03:42', 0, 1),
(2, 1, 3, 'test', '123', '97663344771', 'test@gmail.com', '$2y$12$ERyeXf8RtfEI1FjQ3OkeCOLI2PrXOShHR.c9JhbSSY.b1kX910c9S', 'yes', '2025-03-27 11:55:56', 'deleted', '2025-03-27 11:35:32', '2025-03-27 12:08:30', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` bigint(10) NOT NULL,
  `item_comp_id` bigint(10) NOT NULL,
  `item_created_by` bigint(10) NOT NULL,
  `item_updated_by` bigint(10) NOT NULL,
  `item_created_on` datetime NOT NULL,
  `item_updated_on` datetime NOT NULL,
  `item_code` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_unit_id` bigint(10) NOT NULL,
  `item_tax_id` bigint(10) NOT NULL,
  `item_size` varchar(20) NOT NULL,
  `item_make` varchar(100) NOT NULL,
  `item_rate` decimal(10,0) NOT NULL,
  `item_stock` decimal(10,0) NOT NULL,
  `item_min_alert` decimal(10,0) NOT NULL,
  `item_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `mach_id` bigint(10) NOT NULL,
  `mach_comp_id` bigint(10) NOT NULL,
  `mach_name` varchar(100) NOT NULL,
  `mach_no` varchar(100) NOT NULL,
  `mach_install_date` date NOT NULL,
  `mach_make` varchar(100) NOT NULL,
  `mach_model` varchar(100) NOT NULL,
  `mach_spec` varchar(255) NOT NULL,
  `mach_setting` varchar(100) DEFAULT NULL,
  `mach_invoice` varchar(100) DEFAULT NULL,
  `mach_warranty` varchar(100) DEFAULT NULL,
  `mach_status` varchar(20) NOT NULL,
  `mach_created_by` bigint(10) NOT NULL,
  `mach_updated_by` bigint(10) NOT NULL,
  `mach_updated_on` datetime NOT NULL,
  `mach_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`mach_id`, `mach_comp_id`, `mach_name`, `mach_no`, `mach_install_date`, `mach_make`, `mach_model`, `mach_spec`, `mach_setting`, `mach_invoice`, `mach_warranty`, `mach_status`, `mach_created_by`, `mach_updated_by`, `mach_updated_on`, `mach_created_on`) VALUES
(1, 1, 'mahine name', 'mach112', '2025-03-27', 'bosh', 'model0012', 'ddd', NULL, NULL, NULL, 'ok', 1, 1, '2025-03-27 16:34:29', '2025-03-27 16:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Lmfb2jQ40kRvX5lr1H1SLir2p9CorD0RnQLL76l7', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV0ZKbzE3bXRJN2FrOTBpMUVkN1lyNEJya0VvVm9Jc3p6Y1ZrVm5vQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXN0ZXJzL2l0ZW0tbGlzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXN0ZXJzL2l0ZW0tbGlzdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1743830104),
('Pkcq2ZklyoU5nFyObvaCRCpRgCPQ5it7ehZq5hyv', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY3hSSlNNRFp0cHRXSThuc0h1RlRFVVRoQXNSTDJPaUYzYlZ3Tk1xQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXN0ZXJzL2l0ZW0tYWRkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1743655663),
('raGF3IDZ5MJ41qKvZtGzej9i0qwCeZNKaAxosGCJ', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN2poeEFBZWRSN1JndGJ3RE5Rbllrc2FMNjc5UlNXbGJTY0NxWUhYNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1743785807),
('yOrFctNWRcK3koWrHXKqwqrH9g7TMyV2PtKwd144', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTmtXeFNFOXpzOGRMeVhJMWZJV3Zhbk85alc5b1ZwN0Y4WFo3cTlnTCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21hc3RlcnMvaXRlbS1hZGQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21hc3RlcnMvaXRlbS1hZGQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1743838429);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `set_id` bigint(10) NOT NULL,
  `set_comp_id` bigint(10) NOT NULL,
  `set_enq_no` int(10) NOT NULL DEFAULT '0',
  `set_enq_pre` varchar(10) DEFAULT NULL,
  `set_item_no` int(10) NOT NULL DEFAULT '0',
  `set_item_pre` varchar(10) DEFAULT NULL,
  `set_quot_no` int(10) NOT NULL DEFAULT '0',
  `set_quot_pre` varchar(10) DEFAULT NULL,
  `set_created_on` datetime NOT NULL,
  `set_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`set_id`, `set_comp_id`, `set_enq_no`, `set_enq_pre`, `set_item_no`, `set_item_pre`, `set_quot_no`, `set_quot_pre`, `set_created_on`, `set_updated_on`) VALUES
(1, 1, 0, 'ENQ-', 0, 'IC-', 0, 'Q-', '2025-04-05 05:33:30', '2025-04-05 05:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `taxs`
--

CREATE TABLE `taxs` (
  `tax_id` bigint(10) NOT NULL,
  `tax_comp_id` bigint(10) NOT NULL,
  `tax_name` varchar(100) NOT NULL,
  `tax_percent` decimal(10,0) NOT NULL,
  `tax_creeated_by` bigint(10) NOT NULL,
  `tax_updated_by` bigint(10) NOT NULL,
  `tax_created_on` datetime NOT NULL,
  `tax_updated_on` datetime NOT NULL,
  `tax_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxs`
--

INSERT INTO `taxs` (`tax_id`, `tax_comp_id`, `tax_name`, `tax_percent`, `tax_creeated_by`, `tax_updated_by`, `tax_created_on`, `tax_updated_on`, `tax_status`) VALUES
(1, 1, 'GST 12%', 12, 1, 1, '2025-03-25 15:18:46', '2025-03-25 15:18:46', 'ok'),
(2, 1, 'GST 18%', 18, 1, 1, '2025-03-25 15:18:46', '2025-03-25 15:18:46', 'ok'),
(3, 1, 'GST 1%', 1, 1, 1, '2025-03-27 13:08:09', '2025-03-27 13:14:24', 'deleted'),
(4, 1, 'GST 5%', 5, 1, 1, '2025-03-27 13:08:59', '2025-03-27 13:08:59', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` bigint(10) NOT NULL,
  `unit_comp_id` bigint(10) NOT NULL,
  `unit_name` varchar(20) NOT NULL,
  `unit_created_by` bigint(10) NOT NULL,
  `unit_updated_by` bigint(10) NOT NULL,
  `unit_created_on` datetime NOT NULL,
  `unit_updated_on` datetime NOT NULL,
  `unit_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_comp_id`, `unit_name`, `unit_created_by`, `unit_updated_by`, `unit_created_on`, `unit_updated_on`, `unit_status`) VALUES
(1, 1, 'Nos', 1, 1, '2025-03-25 15:17:45', '2025-03-25 15:17:45', 'ok'),
(2, 1, 'kg', 1, 1, '2025-03-25 15:17:45', '2025-03-25 15:17:45', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `venders`
--

CREATE TABLE `venders` (
  `vender_id` bigint(10) NOT NULL,
  `vender_comp_id` bigint(10) NOT NULL,
  `vender_name` varchar(100) NOT NULL,
  `vender_shot_name` varchar(100) NOT NULL,
  `vender_mobile` varchar(100) NOT NULL,
  `vender_email` varchar(100) NOT NULL,
  `vender_contact_person` varchar(100) NOT NULL,
  `vender_address` varchar(255) NOT NULL,
  `vender_gst_no` varchar(100) NOT NULL,
  `vender_t_n_c` text,
  `vender_code` varchar(20) NOT NULL,
  `vender_status` varchar(20) NOT NULL,
  `vender_created_by` bigint(10) NOT NULL,
  `vender_updated_by` bigint(10) NOT NULL,
  `vender_created_on` datetime NOT NULL,
  `vender_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venders`
--

INSERT INTO `venders` (`vender_id`, `vender_comp_id`, `vender_name`, `vender_shot_name`, `vender_mobile`, `vender_email`, `vender_contact_person`, `vender_address`, `vender_gst_no`, `vender_t_n_c`, `vender_code`, `vender_status`, `vender_created_by`, `vender_updated_by`, `vender_created_on`, `vender_updated_on`) VALUES
(1, 1, 'vender name', 'shot name', '9766334477123', 'vender@gmail.com', 'Mr abc', 'aa', 'gst21', NULL, 'vc123', 'deleted', 1, 1, '2025-03-27 20:21:37', '2025-03-27 20:27:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `vender_code` (`client_comp_id`,`client_vender_code`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `depts`
--
ALTER TABLE `depts`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `dept_comp_id` (`dept_comp_id`);

--
-- Indexes for table `emps`
--
ALTER TABLE `emps`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emp_comp_id` (`emp_comp_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `items_ibfk_2` (`item_tax_id`),
  ADD KEY `item_unit_id` (`item_unit_id`),
  ADD KEY `items_ibfk_1` (`item_comp_id`);

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
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`mach_id`),
  ADD KEY `machines_ibfk_1` (`mach_comp_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`set_id`),
  ADD KEY `set_comp_id` (`set_comp_id`);

--
-- Indexes for table `taxs`
--
ALTER TABLE `taxs`
  ADD PRIMARY KEY (`tax_id`),
  ADD KEY `taxs_ibfk_1` (`tax_comp_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`),
  ADD KEY `units_ibfk_1` (`unit_comp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `venders`
--
ALTER TABLE `venders`
  ADD PRIMARY KEY (`vender_id`),
  ADD KEY `vender_comp_id` (`vender_comp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `comp_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `depts`
--
ALTER TABLE `depts`
  MODIFY `dept_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emps`
--
ALTER TABLE `emps`
  MODIFY `emp_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `mach_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `set_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taxs`
--
ALTER TABLE `taxs`
  MODIFY `tax_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venders`
--
ALTER TABLE `venders`
  MODIFY `vender_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`client_comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `depts`
--
ALTER TABLE `depts`
  ADD CONSTRAINT `depts_ibfk_1` FOREIGN KEY (`dept_comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `emps`
--
ALTER TABLE `emps`
  ADD CONSTRAINT `emps_ibfk_1` FOREIGN KEY (`emp_comp_id`) REFERENCES `company` (`comp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`item_comp_id`) REFERENCES `company` (`comp_id`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`item_tax_id`) REFERENCES `taxs` (`tax_id`),
  ADD CONSTRAINT `items_ibfk_3` FOREIGN KEY (`item_unit_id`) REFERENCES `units` (`unit_id`);

--
-- Constraints for table `machines`
--
ALTER TABLE `machines`
  ADD CONSTRAINT `machines_ibfk_1` FOREIGN KEY (`mach_comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`set_comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `taxs`
--
ALTER TABLE `taxs`
  ADD CONSTRAINT `taxs_ibfk_1` FOREIGN KEY (`tax_comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`unit_comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `venders`
--
ALTER TABLE `venders`
  ADD CONSTRAINT `venders_ibfk_1` FOREIGN KEY (`vender_comp_id`) REFERENCES `company` (`comp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
