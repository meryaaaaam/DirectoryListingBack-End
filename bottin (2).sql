-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 juin 2022 à 13:39
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bottin`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `adresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adresses`
--

INSERT INTO `adresses` (`id`, `adress`, `city`, `code`, `province_id`, `created_at`, `updated_at`) VALUES
(1, '4710 St Catherine E', 'Montréal', 'H1V 1Z2', 9, '2022-06-03 10:13:27', '2022-06-17 12:21:39'),
(2, '4710 St Catherine E', 'Montréal', 'H1V 1Z2', 9, '2022-06-03 10:15:58', '2022-06-13 07:43:39'),
(3, '4710 St Catherine E', 'Montréal', 'H1V 1Z2', 9, '2022-06-13 06:47:56', '2022-06-13 06:47:56');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `label`, `created_at`, `updated_at`) VALUES
(1, '', NULL, NULL),
(2, 'ASSURANCE ET IMMOBILIER', NULL, NULL),
(3, 'AGRICULTURE, PÊCHE, FORESTERIE', NULL, NULL),
(4, 'AUTOMOBILE', NULL, NULL),
(5, 'CONSTRUCTION ET RÉNOVATION', NULL, NULL),
(6, 'DIVERTISSEMENTS ET MÉDIA', NULL, NULL),
(7, 'ÉDUCATION', NULL, NULL),
(8, 'FAMILLE ET COMMUNAUTÉ', NULL, NULL),
(9, 'FIANCANCES ET LÉGAL', NULL, NULL),
(10, 'SERVICES PROFESSIONNELS', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_05_16_115410_create_provinces_table', 1),
(5, '2022_05_16_115427_create_adresses_table', 1),
(7, '2022_05_17_081920_create_categories_table', 2),
(8, '2022_05_17_082003_create_sub_categories_table', 2),
(9, '2022_05_17_082124_create_services_table', 2),
(10, '2022_05_18_122004_user_service', 2),
(11, '2022_5_16_120000_create_users_table', 3),
(12, '2022_06_07_174711_add_terms_to_users', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Alberta', NULL, NULL),
(2, 'Colombie-Britannique', NULL, NULL),
(3, 'Manitoba', NULL, NULL),
(4, 'Nouveau-Brunswick', NULL, NULL),
(5, 'Terre-Neuve-et-Labrador', NULL, NULL),
(6, 'Nouvelle-Écosse', NULL, NULL),
(7, 'Ontario', NULL, NULL),
(8, 'Ile-du-Prince-Édouard', NULL, NULL),
(9, 'Québec', NULL, NULL),
(10, 'Saskatchewan)', NULL, NULL),
(11, 'Terriroires du Yukon', NULL, NULL),
(12, 'Nunavut', NULL, NULL),
(13, 'Territoires du Nord-Ouest', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `label`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 'Abattoirs', 1, NULL, NULL),
(2, 'Accessoires et matériel acéricole', 1, NULL, NULL),
(3, 'Organisations', 3, NULL, NULL),
(4, 'Associations', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `label`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Agriculture-Équipement et services', 3, NULL, NULL),
(2, 'Chevaux', 2, NULL, NULL),
(3, 'Associations et Organisations', 10, NULL, NULL),
(4, 'Barils, boîtes, bouteilles et canettes', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CV` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NEQ` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `status` enum('approuved','rejected','preding') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'preding',
  `isEmailActive` tinyint(1) DEFAULT NULL,
  `isAvailable` tinyint(1) DEFAULT NULL,
  `IACNC` tinyint(1) DEFAULT NULL,
  `LinkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Line_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isTermsAccepted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `companyname`, `email`, `email_verified_at`, `password`, `phone`, `adresse`, `website`, `bio`, `logo`, `CV`, `language`, `NEQ`, `role`, `isActive`, `status`, `isEmailActive`, `isAvailable`, `IACNC`, `LinkedIn`, `Line_type`, `note`, `adress_id`, `remember_token`, `created_at`, `updated_at`, `isTermsAccepted`) VALUES
(1, 'admin', NULL, NULL, NULL, 'admin@smartegy.ca', NULL, '$2y$10$.YDVyOLwUEgL5ipC6hFXseMJtzLMSn5SDG8wR/2H56w19RBMFOwMW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', 1, 'preding', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-17 05:57:46', '2022-06-17 05:57:46', 1),
(2, 'lily', 'Lily', 'Adrson', NULL, 'mariemchouaiti@gmail.com', NULL, '$2y$10$jpnwGY8vdcw9/uTuuVsrMexuKct/D3OyBU/TmKdseN8CkbdOphP.e', NULL, '4710 St Catherine E Montréal H1V 1Z2 Montréal Québec', NULL, NULL, NULL, NULL, NULL, NULL, 'Pro', 1, 'preding', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-06-17 05:58:06', '2022-06-17 12:29:45', 1),
(3, 'Ted', 'Ted', 'Mosbey', NULL, 'ted@smartegy.ca', NULL, '$2y$10$cljjCs8H0TB8ToSIteQoy.3TB1E1nZ.MEdR3kykVFDuC853T5eLna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pro', 0, 'preding', NULL, NULL, 1, NULL, NULL, NULL, 2, NULL, '2022-06-17 05:58:16', '2022-06-17 05:58:16', 1),
(4, 'Bottin', NULL, NULL, 'Bottin', 'contact@bottin.ca', NULL, '$2y$10$yaw7ciTUz.0nHCR2C8meTOH.uHd.LImW3FZne0jt3lQoCWrZ4rY2O', NULL, '4710 St Catherine E Montréal H1V 1Z2 Montréal Québec', NULL, NULL, 'assets/img/logo/3737.png', NULL, NULL, NULL, 'Company', 0, 'preding', NULL, NULL, 1, NULL, 'Résidence', NULL, 3, NULL, '2022-06-17 06:03:34', '2022-06-17 08:17:49', 1),
(5, 'Smartegy', NULL, NULL, 'Smartegy', 'contact@smartegy.ca', NULL, '$2y$10$REgR6XbiasO3cdTbWTnJLekgaGt7M4KxQmqHFvmoh/Qv44gXPPcUK', NULL, '4710 St Catherine E Montréal H1V 1Z2 Montréal Québec', NULL, NULL, 'assets/img/logo/smartegy.png', NULL, NULL, NULL, 'Company', 0, 'preding', NULL, NULL, 1, NULL, 'Cellulaire', NULL, 3, NULL, '2022-06-17 06:03:50', '2022-06-17 09:37:19', 1),
(6, 'Charme_Et_Sortilège', NULL, NULL, 'Charme Et Sortilège\n', 'contact@charm.ca', NULL, '$2y$10$UX3WZM9iD7ABob8B4SyNwOB5SJzLni1txU5ClKADfeBm.VbxiOGxi', NULL, NULL, NULL, NULL, 'assets/img/logo/Charme Et Sortilège.png', NULL, NULL, NULL, 'Company', 0, 'preding', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-06-17 06:05:59', '2022-06-17 06:05:59', 1),
(7, 'Pizza_Hut', NULL, NULL, 'Pizza Hut', 'contact@PizzaHut.ca', NULL, '$2y$10$0Xl6WlMhuC3z4zxi514IYuNyaHdjSIesniUEoseVlVqvU.F9GPnXy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Company', 0, 'preding', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-06-17 06:07:07', '2022-06-17 06:07:07', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_services`
--

CREATE TABLE `user_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_services`
--

INSERT INTO `user_services` (`id`, `service_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 4, NULL, NULL),
(2, 4, 4, NULL, NULL),
(3, 1, 5, NULL, NULL),
(4, 2, 5, NULL, NULL),
(5, 1, 6, NULL, NULL),
(6, 2, 6, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adresses_province_id_foreign` (`province_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_subcategory_id_foreign` (`subcategory_id`);

--
-- Index pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_adress_id_foreign` (`adress_id`);

--
-- Index pour la table `user_services`
--
ALTER TABLE `user_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_services_service_id_foreign` (`service_id`),
  ADD KEY `user_services_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user_services`
--
ALTER TABLE `user_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `adresses_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_adress_id_foreign` FOREIGN KEY (`adress_id`) REFERENCES `adresses` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_services`
--
ALTER TABLE `user_services`
  ADD CONSTRAINT `user_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
