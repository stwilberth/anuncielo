-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para anuncielo
CREATE DATABASE IF NOT EXISTS `anuncielo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `anuncielo`;

-- Volcando estructura para tabla anuncielo.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla anuncielo.categories: ~18 rows (aproximadamente)
REPLACE INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Ropa', 'Categoría de tiendas de ropa y moda.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(2, 'Electrónica', 'Categoría de tiendas de electrónica y tecnología.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(3, 'Alimentación', 'Categoría de tiendas de alimentos y supermercados.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(4, 'Hogar y jardín', 'Categoría de tiendas de productos para el hogar y jardín.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(5, 'Juguetes', 'Categoría de tiendas de juguetes y juegos.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(6, 'Salud y belleza', 'Categoría de tiendas de productos de salud y belleza.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(7, 'Deportes y aire libre', 'Categoría de tiendas de artículos deportivos y actividades al aire libre.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(8, 'Automóviles y motocicletas', 'Categoría de tiendas de vehículos y accesorios.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(9, 'Libros y entretenimiento', 'Categoría de tiendas de libros y productos de entretenimiento.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(10, 'Tecnología', 'Categoría de tiendas de productos tecnológicos y electrónicos.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(11, 'Mascotas', 'Categoría de tiendas de productos para mascotas.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(12, 'Otros', 'Categoría de tiendas de otros productos.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(13, 'Servicios', 'Categoría de tiendas de servicios.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(14, 'Eventos', 'Categoría de tiendas de eventos.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(15, 'Cursos', 'Categoría de tiendas de cursos.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(16, 'Viajes', 'Categoría de tiendas de viajes.', '2023-12-13 02:08:16', '2023-12-13 02:08:16'),
	(17, 'Arte', 'Categoría de tiendas de arte.', '2023-12-13 02:08:16', '2023-12-13 02:08:16');

-- Volcando estructura para tabla anuncielo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla anuncielo.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla anuncielo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla anuncielo.migrations: ~0 rows (aproximadamente)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_12_13_021057_create_permission_tables', 1);

-- Volcando estructura para tabla anuncielo.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla anuncielo.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla anuncielo.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla anuncielo.model_has_roles: ~0 rows (aproximadamente)

-- Volcando estructura para tabla anuncielo.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla anuncielo.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla anuncielo.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla anuncielo.permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla anuncielo.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla anuncielo.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla anuncielo.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `store_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `published` bit(1) NOT NULL DEFAULT b'1',
  `stock` int unsigned NOT NULL DEFAULT '1',
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_store_url` (`store_id`,`url`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla anuncielo.products: ~19 rows (aproximadamente)
REPLACE INTO `products` (`id`, `url`, `name`, `description`, `price`, `store_id`, `category_id`, `published`, `stock`, `user_id`, `created_at`, `updated_at`) VALUES
	(4, 'producto-de-prueba-4', 'Producto de prueba 4', 'Descripción de producto de prueba 4', 4000.00, 1, 1, b'1', 1, 1, '2023-12-13 02:22:13', '2023-12-16 17:13:27'),
	(5, 'producto-de-prueba-5', 'Producto de prueba 5', 'Descripción de producto de prueba 5', 5000.00, 1, 1, b'1', 1, 1, '2023-12-13 02:22:13', '2023-12-16 17:13:27'),
	(6, 'producto-de-prueba-6', 'Producto de prueba 6', 'Descripción de producto de prueba 6', 6000.00, 1, 1, b'1', 1, 1, '2023-12-13 02:22:13', '2023-12-16 17:13:27'),
	(7, 'producto-de-prueba-7', 'Producto de prueba 7', 'Descripción de producto de prueba 7', 7000.00, 1, 1, b'1', 1, 1, '2023-12-13 02:22:13', '2023-12-16 17:13:27'),
	(8, 'producto-de-prueba-8', 'Producto de prueba 8', 'Descripción de producto de prueba 8', 8000.00, 1, 1, b'1', 1, 1, '2023-12-13 02:22:13', '2023-12-16 17:13:27'),
	(9, 'producto-de-prueba-9', 'Producto de prueba 9', 'Descripción de producto de prueba 9', 9000.00, 1, 1, b'1', 1, 1, '2023-12-13 02:22:13', '2023-12-16 17:13:27'),
	(10, 'producto-de-prueba-10', 'Producto de prueba 10', 'Descripción de producto de prueba 10', 10000.00, 1, 1, b'1', 1, 1, '2023-12-13 02:22:13', '2023-12-16 17:13:27'),
	(11, 'producto-de-prueba-11', 'Producto de prueba 11', 'Descripción de producto de prueba 11', 11000.00, 1, 1, b'1', 1, 1, '2023-12-13 02:22:13', '2023-12-16 17:13:27'),
	(12, 'producto-de-prueba-12', 'Producto de prueba 12', 'Descripción de producto de prueba 12', 12000.00, 1, 1, b'1', 1, 1, '2023-12-13 02:22:13', '2023-12-16 17:13:27'),
	(13, 'producto-de-prueba-13', 'Producto de prueba 13', 'Descripción de producto de prueba 13', 13000.00, 1, 1, b'1', 1, 1, '2023-12-13 02:22:13', '2023-12-16 17:13:27'),
	(15, 'producto-de-prueba-15', 'Producto de prueba 15', 'Descripción de producto de prueba 15', 15000.00, 1, 1, b'1', 1, 1, '2023-12-13 02:22:13', '2023-12-16 17:13:27'),
	(16, 'asdfas', 'asdfas', 'asdfasdf', 33.00, 1, 7, b'1', 1, 1, '2023-12-17 00:19:34', '2023-12-17 00:19:34'),
	(18, 'asdfas4', 'asdfas', 'asdfasdf', 33.00, 1, 4, b'1', 1, 1, '2023-12-17 00:20:00', '2023-12-17 00:20:00'),
	(20, 'asdfas43', 'asdfas', 'asdfasdf', 33.00, 1, 4, b'0', 1, 1, '2023-12-17 00:20:20', '2023-12-17 00:20:20'),
	(21, 'asdfas434', 'asdfas', 'asdfasdf', 33.00, 1, 4, b'1', 1, 1, '2023-12-17 00:20:40', '2023-12-22 06:55:51'),
	(22, 'asdasdfasdfd333', 'Wilberth Loría', 'asdfasdf', 3.00, 1, 2, b'1', 1, 1, '2023-12-17 00:21:30', '2023-12-17 00:21:30'),
	(39, 'uno-dos-tres2', 'uno dos tres', 'asdfasdf', 5.00, 3, 5, b'1', 1, 1, '2023-12-20 20:47:15', '2023-12-22 06:42:09'),
	(41, 'uno-dos-tres-2', 'uno dos tres - Tienda de prueba 1', 'segúrate de que el contenedor tenga una altura definida o esté contenido dentro de un elemento con una altura definida para que la alineación vertical sea visible.segúrate de que el contenedor tenga una altura definida o esté contenido dentro de un elemento con una altura definida para que la alineación vertical sea visible.segúrate de que el contenedor tenga una altura definida o esté contenido dentro de un elemento con una altura definida para que la alineación vertical sea visible.segúrate de que el contenedor tenga una altura definida o esté contenido dentro de un elemento con una altura definida para que la alineación vertical sea visible.', 5.00, 2, 6, b'1', 1, 1, '2023-12-20 21:20:24', '2023-12-30 23:54:20'),
	(43, 'uno-dos-tres', 'uno dos tres - Tienda de pruebasss', 'asdfasdf', 5.00, 3, 17, b'1', 1, 1, '2023-12-22 06:37:53', '2023-12-22 06:53:15');

-- Volcando estructura para tabla anuncielo.product_images
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` int NOT NULL DEFAULT '0',
  `aspect_ratio` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_product_image_url` (`product_id`,`url`),
  CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla anuncielo.product_images: ~2 rows (aproximadamente)
REPLACE INTO `product_images` (`id`, `name`, `product_id`, `url`, `type`, `aspect_ratio`, `created_at`, `updated_at`) VALUES
	(37, 'uno dos tres', 41, '3927dcb8-fdc1-48ff-a7e8-a996529887f7_1703959375.jpg', 1, 2, '2023-12-31 00:02:56', '2023-12-31 00:02:56'),
	(38, 'uno dos tres', 41, '8c799f8e-e561-42fd-80ab-4d20cb312a03_1703959389.webp', 1, 2, '2023-12-31 00:03:10', '2023-12-31 00:03:10');

-- Volcando estructura para tabla anuncielo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla anuncielo.roles: ~0 rows (aproximadamente)

-- Volcando estructura para tabla anuncielo.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla anuncielo.role_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla anuncielo.stores
CREATE TABLE IF NOT EXISTS `stores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `payment_methods` varchar(255) NOT NULL,
  `shipping_methods` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `country` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `physical` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `stores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla anuncielo.stores: ~3 rows (aproximadamente)
REPLACE INTO `stores` (`id`, `name`, `description`, `payment_methods`, `shipping_methods`, `url`, `user_id`, `phone`, `whatsapp`, `country`, `address`, `physical`, `email`, `facebook_url`, `instagram_url`, `created_at`, `updated_at`) VALUES
	(1, 'Tienda de prueba', 'descripcion', 'metodos de pago', 'metodos de envio', 'tienda-de-prueba', 1, '123456789', '123456789', 'CR', 'Calle 123', 1, 'stwilberth@gmail.com', 'https://facebook.com', 'https://instagram.com', '2023-12-13 02:20:59', '2023-12-13 02:20:59'),
	(2, 'Tienda de prueba 1', 'asdfasdfasdf', 'asdfasdfasdf', 'asdfasdfasd', 'tienda-de-pruebas', 1, '888888', '88888', 'Costa Rica', '200 Metros este del Super Lilo, Ciruelas de Alajuela.', 1, 'stwilberth@gmail.com', '', '', '2023-12-14 00:25:25', '2023-12-13 18:25:42'),
	(3, 'Tienda de pruebasss', 'asdfasdf', 'asdfasdfa', 'sdfasdf', 'tienda-de-pruebasss', 1, '23233223', '232323', 'caasd', '200 Metros este del Super Lilo, Ciruelas de Alajuela.', 0, 'stwilberth@gmail.com', '', '', '2023-12-14 01:11:28', '2023-12-14 01:11:28');

-- Volcando estructura para tabla anuncielo.store_images
CREATE TABLE IF NOT EXISTS `store_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `store_id` bigint unsigned NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` int NOT NULL DEFAULT '0',
  `aspect_ratio` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_store_image_url` (`store_id`,`url`),
  CONSTRAINT `store_images_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla anuncielo.store_images: ~0 rows (aproximadamente)
REPLACE INTO `store_images` (`id`, `name`, `store_id`, `url`, `type`, `aspect_ratio`, `created_at`, `updated_at`) VALUES
	(5, 'uno dos tres', 1, '583d3abb-1f43-4e49-814c-5b8c7c70ed2c_1703890912.jpg', 1, 5, '2023-12-30 05:01:53', '2023-12-30 05:01:53'),
	(6, 'asdasdf', 2, '02a5ed2b-90a5-4c62-8092-f3d76f82f860_1703957699.jpg', 1, 5, '2023-12-30 23:35:00', '2023-12-30 23:35:00');

-- Volcando estructura para tabla anuncielo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla anuncielo.users: ~1 rows (aproximadamente)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Wilberth Loría', 'stwilberth@gmail.com', NULL, '$2y$12$E7JamkPg0H4f4326Afrm1.hLZr0oqUeVmDFThZdSpH73pf9pZ4Pye', 'kPunyLLLFoD7w8vwf1nesYB51PJDxiym2xU0mkL2xtMd1sISlN7E3SS4m8ge', '2023-12-13 08:20:36', '2023-12-13 08:20:36');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
