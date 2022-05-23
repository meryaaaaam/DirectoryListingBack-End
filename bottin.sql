-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 23 mai 2022 à 14:15
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
(1, '60 Patterson Blvd SW', 'Calgary', 'T3H 2E1', 1, '2022-05-19 12:57:13', '2022-05-19 12:57:13'),
(2, '4307 rue Wellington', ' Verdun', ' QC H4G 1W3', 1, '2022-05-19 12:57:30', '2022-05-19 12:57:30'),
(3, '271, boul Churchill', ' Greenfield Park', ' QC J4V 2M8', 1, '2022-05-19 17:11:18', '2022-05-19 17:11:18'),
(4, '456, rue Sherbrooke O', 'Montréal ', 'QC H4A 1V9', 1, '2022-05-19 17:12:42', '2022-05-19 17:12:42'),
(5, 'adress', 'city', '1', 1, '2022-05-19 17:22:44', '2022-05-19 17:22:44'),
(6, 'aaaaaaaaaaa', 'aaaaaaaaaa', '12', 6, '2022-05-19 17:35:09', '2022-05-19 17:35:09');

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
(1, 'ASSURANCE ET IMMOBILIER', '2022-05-18 10:24:06', '2022-05-18 10:24:06'),
(2, 'AGRICULTURE, PÊCHE, FORESTERIE', '2022-05-19 11:03:55', '2022-05-19 11:03:55'),
(3, 'AUTOMOBILE', '2022-05-19 11:04:05', '2022-05-19 11:04:05'),
(4, 'CONSTRUCTION ET RÉNOVATION', '2022-05-19 11:04:15', '2022-05-19 11:04:15'),
(5, 'DIVERTISSEMENTS ET MÉDIA', '2022-05-19 11:04:26', '2022-05-19 11:04:26'),
(6, 'ÉDUCATION', '2022-05-19 11:04:37', '2022-05-19 11:04:37'),
(7, 'FAMILLE ET COMMUNAUTÉ', '2022-05-19 11:04:46', '2022-05-19 11:04:46'),
(8, 'FIANCANCES ET LÉGAL', '2022-05-19 11:04:59', '2022-05-19 11:04:59'),
(9, 'FOURNITURES-SERV. INDUSTRIELS', '2022-05-19 11:05:12', '2022-05-19 11:05:12'),
(10, 'INFORMATIQUE, COMM. ÉLECTRONIQU', '2022-05-19 11:05:28', '2022-05-19 11:05:28'),
(11, 'MAGASINAGE, MAGASINS SPÉCIALITÉ', '2022-05-19 11:05:38', '2022-05-19 11:05:38'),
(12, 'MAISON ET JARDINAGE', '2022-05-19 11:05:51', '2022-05-19 11:05:51'),
(13, 'NOURRITURE ET BOISSONS', '2022-05-19 11:06:01', '2022-05-19 11:06:01'),
(14, 'SERVICES PROFESSIONNELS', '2022-05-19 11:06:20', '2022-05-19 11:06:20'),
(15, 'SERVICES PUBLICS &ENVIRONNEMENT', '2022-05-19 11:06:30', '2022-05-19 11:06:30'),
(16, 'SOINS PERSONNELS', '2022-05-19 11:06:41', '2022-05-19 11:06:41'),
(17, 'SPORTS ET LOISIRS', '2022-05-19 11:06:51', '2022-05-19 11:06:51');

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
(6, '2022_05_17_081920_create_categories_table', 1),
(7, '2022_05_17_082003_create_sub_categories_table', 1),
(8, '2022_05_17_082124_create_services_table', 1),
(9, '2022_05_17_092124_create_user_services_table', 1),
(10, '2022_5_16_120000_create_users_table', 1),
(11, '2022_05_18_121804_user_service', 2),
(12, '2022_05_18_122004_user_service', 3),
(14, '2022_05_16_115410_create_provinces_table', 4),
(15, '2022_05_16_115427_create_adresses_table', 5);

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
(1, 'Alberta', '2022-05-19 11:25:56', '2022-05-19 11:25:56'),
(2, 'Colombie-Britannique', '2022-05-19 11:26:07', '2022-05-19 11:26:07'),
(3, 'Manitoba', '2022-05-19 11:26:20', '2022-05-19 11:26:20'),
(4, 'Nouveau-Brunswick', '2022-05-19 11:26:32', '2022-05-19 11:26:32'),
(5, 'Terre-Neuve-et-Labrador', '2022-05-19 11:26:49', '2022-05-19 11:26:49'),
(6, 'Nouvelle-Écosse', '2022-05-19 11:27:00', '2022-05-19 11:27:00'),
(7, 'Ontario', '2022-05-19 11:27:14', '2022-05-19 11:27:14');

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
(1, 'Tapis commerciaux', 1, '2022-05-18 10:24:36', '2022-05-18 10:24:36'),
(2, 'Ascenseurs et monte-charge: conseillers, vente, service, pièces et fournitures, réparation et entretien', 1, '2022-05-18 12:08:16', '2022-05-18 12:08:16'),
(3, 'Enseignes: fournitures, lettrages, entretient, pose et réparation', 1, '2022-05-18 12:08:20', '2022-05-18 12:08:20'),
(4, 'Escaliers et monte escaliers, plate-formes élévatrices', 1, '2022-05-18 12:08:33', '2022-05-18 12:08:33'),
(5, 'Gicleurs automatique d\'incendie', 1, '2022-05-18 12:08:44', '2022-05-18 12:08:44'),
(6, 'Acutuaires', 2, '2022-05-23 07:05:03', '2022-05-23 07:05:03'),
(7, 'Agent d\'assurance', 2, '2022-05-23 07:05:14', '2022-05-23 07:05:14'),
(8, 'Assurance agricole', 2, '2022-05-23 07:05:27', '2022-05-23 07:05:27'),
(9, 'Assurance auto et véhicule de loisir', 2, '2022-05-23 07:05:39', '2022-05-23 07:05:39'),
(10, 'Agents et courtiers immobilliers', 3, '2022-05-23 07:05:55', '2022-05-23 07:05:55'),
(11, 'Agence et conseillers immobilières', 3, '2022-05-23 07:06:05', '2022-05-23 07:06:05'),
(12, 'Concessionnaires de maison mobiles', 3, '2022-05-23 07:06:16', '2022-05-23 07:06:16'),
(13, 'Abattoirs', 5, '2022-05-23 07:09:17', '2022-05-23 07:09:17'),
(14, 'Accessoires et matériel acéricole', 5, '2022-05-23 07:09:27', '2022-05-23 07:09:27'),
(15, 'Bétail', 5, '2022-05-23 07:09:35', '2022-05-23 07:09:35'),
(16, 'Couvoirs', 5, '2022-05-23 07:09:45', '2022-05-23 07:09:45'),
(17, 'Élevage de bétail', 5, '2022-05-23 07:09:53', '2022-05-23 07:09:53'),
(18, 'Commerçants de chevaux', 6, '2022-05-23 08:36:00', '2022-05-23 08:36:00');

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
(1, 'Gestion de Batiment', 1, '2022-05-18 10:24:23', '2022-05-18 10:24:23'),
(2, 'Assurances', 1, '2022-05-18 10:47:26', '2022-05-18 10:47:26'),
(3, 'Immobillier', 1, '2022-05-18 10:48:02', '2022-05-18 10:48:02'),
(4, 'Assurances', 1, '2022-05-18 18:36:01', '2022-05-18 18:36:01'),
(5, 'Agriculture-Équipement et services', 2, '2022-05-23 07:07:46', '2022-05-23 07:07:46'),
(6, 'Chevaux', 2, '2022-05-23 07:07:58', '2022-05-23 07:07:58'),
(7, 'Forêts', 2, '2022-05-23 07:08:06', '2022-05-23 07:08:06');

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
  `isEmailActive` tinyint(1) DEFAULT NULL,
  `isAvailable` tinyint(1) DEFAULT NULL,
  `LinkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Line_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `companyname`, `email`, `email_verified_at`, `password`, `phone`, `adresse`, `website`, `bio`, `logo`, `CV`, `language`, `NEQ`, `role`, `isActive`, `isEmailActive`, `isAvailable`, `LinkedIn`, `Line_type`, `adress_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', NULL, 'admin@smartegy.ca', NULL, '$2y$10$KbldMSPAkF7KPbIn4ikCX.5/Af.5.GMegtSANqh1cyyn9Fqn8oNxG', '+214 4455 6521', '60 Patterson Blvd SW , Calgary , T3H 2E1 , Alberta', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', 1, NULL, NULL, NULL, NULL, 1, NULL, '2022-05-18 10:26:05', '2022-05-20 09:59:02'),
(2, 'smartegy', NULL, NULL, 'smartegy', 'contact@smartegy.ca', NULL, '$2y$10$b0nyT/hhGbm4wOL2CDf.tuVf8Hr8VIzGpMpM1wyI2JARQ/icxTzzO', '+214 4455 6521', '4307, rue Wellington, Verdun QC H4G 1W3', 'smartegy.ca', NULL, 'assets/img/logo/logo.png', NULL, NULL, NULL, 'Company', 1, NULL, NULL, NULL, 'Autre', 2, NULL, '2022-05-18 11:18:50', '2022-05-20 12:23:40'),
(3, 'mon', 'monica', 'geller', NULL, 'monicageller@smartegy.ca', NULL, '$2y$10$KLDLDhR5bmlJZANUic57xevt/c6oDBbO.39/whikiIkH/rD5u23Aa', '+214 4455 6521', '271, boul Churchill, Greenfield Park QC J4V 2M8', NULL, NULL, 'assets/img/Logo_e.jpg', NULL, NULL, NULL, 'Pro', 0, NULL, NULL, NULL, NULL, 3, NULL, '2022-05-18 11:20:31', '2022-05-20 12:23:48'),
(4, 'Barney', 'Barney', 'Stinson', NULL, 'barneystinson@smartegy.ca', NULL, '$2y$10$7QzIldcqLV06.QTLpgFvc.HkrwEfBHcct4FfQF6lmczgZLJvoVBJy', NULL, '8870 Rue Lajeunesse, Montréal QC H2M 1R6', NULL, NULL, NULL, NULL, NULL, NULL, 'Pro', 1, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-20 07:30:46', '2022-05-20 10:03:41'),
(5, 'Lily', NULL, 'Lily', 'Max', 'Lily@smartegy.ca', NULL, '$2y$10$upEqyNh7mVop.qDi4wd6IO7Ko57b2MPTCmKEanvFvQWonDFq/QlgG', NULL, '5456, rue Sherbrooke O, Montréal QC H4A 1V9', NULL, NULL, NULL, NULL, NULL, NULL, 'Pro', 1, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-20 07:31:59', '2022-05-20 10:03:50'),
(6, 'Botin3737', NULL, NULL, 'Bottin 3737', 'contact@botin3737.ca', NULL, '$2y$10$yLZSa2YNg.Ed.xeXPrtU.eCZH2zola385a2MKpaw6W8FpSkslF/UG', NULL, '5456, rue Sherbrooke O, Montréal QC H4A 1V9', NULL, NULL, 'assets/img /3737.png', NULL, NULL, NULL, 'Company', 1, NULL, NULL, NULL, NULL, 1, NULL, '2022-05-20 07:32:40', '2022-05-20 10:03:57');

-- --------------------------------------------------------

--
-- Structure de la table `user_services`
--

CREATE TABLE `user_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_services`
--

INSERT INTO `user_services` (`id`, `service_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-05-18 17:38:45', '2022-05-18 12:29:53'),
(2, 1, 2, '2022-05-18 12:21:50', '2022-05-18 12:21:50'),
(3, 2, 3, '2022-05-18 12:21:59', '2022-05-18 12:21:59'),
(4, 2, 4, '2022-05-18 12:22:03', '2022-05-18 12:22:03'),
(5, 6, 4, '2022-05-23 09:35:43', '2022-05-23 09:35:48'),
(6, 1, 6, '2022-05-23 09:35:54', '2022-05-23 09:35:57'),
(7, 7, 4, '2022-05-23 09:37:32', '2022-05-23 09:37:51'),
(8, 8, 6, '2022-05-23 09:37:42', '2022-05-23 09:37:38'),
(9, 9, 4, '2022-05-23 09:37:45', '2022-05-23 09:37:49');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user_services`
--
ALTER TABLE `user_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
