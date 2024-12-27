-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-12-2024 a las 00:25:46
-- Versión del servidor: 5.7.23-23
-- Versión de PHP: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apren173_anuncielo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Ropa', 'Categoría de tiendas de ropa y moda.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(2, 'Electrónica', 'Categoría de tiendas de electrónica y tecnología.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(3, 'Alimentación', 'Categoría de tiendas de alimentos y supermercados.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(4, 'Hogar y jardín', 'Categoría de tiendas de productos para el hogar y jardín.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(5, 'Juguetes', 'Categoría de tiendas de juguetes y juegos.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(6, 'Salud y belleza', 'Categoría de tiendas de productos de salud y belleza.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(7, 'Deportes y aire libre', 'Categoría de tiendas de artículos deportivos y actividades al aire libre.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(8, 'Automóviles y motocicletas', 'Categoría de tiendas de vehículos y accesorios.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(9, 'Libros y entretenimiento', 'Categoría de tiendas de libros y productos de entretenimiento.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(10, 'Tecnología', 'Categoría de tiendas de productos tecnológicos y electrónicos.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(11, 'Mascotas', 'Categoría de tiendas de productos para mascotas.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(12, 'Otros', 'Categoría de tiendas de otros productos.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(13, 'Servicios', 'Categoría de tiendas de servicios.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(14, 'Eventos', 'Categoría de tiendas de eventos.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(15, 'Cursos', 'Categoría de tiendas de cursos.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(16, 'Viajes', 'Categoría de tiendas de viajes.', '2023-12-31 21:07:34', '2023-12-31 21:07:34'),
(17, 'Arte', 'Categoría de tiendas de arte.', '2023-12-31 21:07:34', '2023-12-31 21:07:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_13_021057_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `public` bit(1) NOT NULL DEFAULT b'1',
  `published` bit(1) NOT NULL DEFAULT b'1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `url`, `name`, `description`, `price`, `store_id`, `category_id`, `public`, `published`, `created_at`, `updated_at`, `stock`, `user_id`) VALUES
(3, 'camiseta-escolar', 'Camiseta Escolar', 'Hay disponibles desde la talla 6 y hasta la talla 16.\nLa camiseta escolar cuello polo se fabrica en tela deportiva Jik 100% polyester. Escríbenos para coordinar sublimación de escudo y/o nombre.\nTambién puede ser utilizada con el fin que usted desee.', 6000.00, 2, 1, b'1', b'1', '2024-01-22 01:16:39', '2024-01-22 01:16:39', 100, 4),
(4, 'mermeladas', 'Mermeladas Sukia', '100% natural, 35% azúcar 65% fruta natural.\nPresentación: frasco de 250 gramos .', 3500.00, 3, 3, b'1', b'1', '2024-02-23 18:42:33', '2024-02-23 18:47:47', 100, 5),
(5, 'camisetas-futbol', 'Camisetas Futbol', 'Camisetas todas las tallas de todos los equipos con nombre personalizado', 10000.00, 1, 1, b'1', b'1', '2024-03-23 07:56:24', '2024-05-30 09:22:12', 100, 1),
(6, 'tumblers-20-onzas-', 'Tumblers 20 onzas ', 'Se personaliza el vaso a su gusto,\n con el diseño que desees', 12000.00, 4, 13, b'1', b'1', '2024-04-24 23:45:02', '2024-04-25 00:47:50', 99, 6),
(7, 'tumbler-de-30-onzas', 'Tumbler de 30 onzas', 'Se personaliza el vaso a su gusto,\n con el diseño que desees', 15000.00, 4, 13, b'1', b'1', '2024-04-25 00:08:47', '2024-04-25 00:48:59', 99, 6),
(8, 'tumbler-de-40-onzas', 'Tumbler de 40 onzas', 'Se personaliza el vaso a sus gusto con el diseño que desees', 17000.00, 4, 13, b'1', b'1', '2024-04-25 00:14:20', '2024-04-25 00:14:20', 99, 6),
(11, 'botella-de-acero-inoxidable', 'botella de acero inoxidable', 'Se personaliza la botella a su gusto, con el diseño que desees', 20000.00, 4, 13, b'1', b'1', '2024-04-25 01:19:05', '2024-04-25 01:19:05', 99, 6),
(13, 'ramo-surtido', 'Ramo Surtido', 'Ramo surtido primaveral', 17000.00, 6, 4, b'1', b'1', '2024-04-26 02:17:25', '2024-04-26 02:17:25', 100, 8),
(15, 'pantuflas-de-animales-', 'Pantuflas de animales ', 'Pantufla de cerdito o vaquita  \nDe la talla 36 al 41.', 8000.00, 7, 1, b'1', b'1', '2024-05-28 09:28:47', '2024-05-28 09:29:51', 5, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `aspect_ratio` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `product_images`
--

INSERT INTO `product_images` (`id`, `name`, `product_id`, `url`, `type`, `aspect_ratio`, `created_at`, `updated_at`) VALUES
(5, 'Camiseta escolar', 3, '8ee8b440-6723-484e-bbbe-b8c05e826752_1705864699.png', 1, 1, '2024-01-22 01:18:21', '2024-01-22 01:18:21'),
(6, 'Mermelada mango y habanero', 4, 'e55eef06-ebef-4dab-b408-fa66110116ee_1708692300.jpg', 1, 3, '2024-02-23 18:45:00', '2024-02-23 18:45:00'),
(7, 'Camiseta mujer', 5, '18e3015a-6a11-496c-9048-bd40772b7472_1711159079.jpg', 1, 1, '2024-03-23 07:57:59', '2024-03-23 07:57:59'),
(8, 'Camiseta hombre', 5, '73c1e044-3d6c-4425-98a4-d05814efc377_1711159122.jpg', 1, 1, '2024-03-23 07:58:42', '2024-03-23 07:58:42'),
(9, 'IMG_20240409_210518[1].jpg', 7, '62ee23e4-68b1-4320-ba79-0e979710df95_1713982266.jpg', 1, 1, '2024-04-25 00:11:08', '2024-04-25 00:11:08'),
(14, 'Tumbler de 40 onzas', 8, 'dd12e2eb-8c1b-435a-a75a-7600e22f7df9_1713984695.jpg', 1, 1, '2024-04-25 00:51:38', '2024-04-25 00:51:38'),
(15, 'Tumblers 20 onzas', 6, '27b0417c-2617-4715-80ba-b1322ada9496_1713984760.jpg', 1, 1, '2024-04-25 00:52:41', '2024-04-25 00:52:41'),
(16, 'Tumblers 20 onzas', 6, '178a023d-9089-4e8c-8bc3-770be7d2db3c_1713985141.jpg', 1, 1, '2024-04-25 00:59:03', '2024-04-25 00:59:03'),
(17, 'Tumblers 20 onzas', 6, 'de667df9-6fff-4765-86f1-5a19b4e7ad4b_1713985266.jpg', 1, 1, '2024-04-25 01:01:07', '2024-04-25 01:01:07'),
(18, 'Tumbler de 30 onzas', 7, '6c0aab47-2eeb-4502-9aaa-3bb185438bef_1713985440.jpg', 1, 1, '2024-04-25 01:04:03', '2024-04-25 01:04:03'),
(19, 'Tumbler de 30 onzas', 7, '8b600bd4-8ed4-4a51-85ca-b55128ef222e_1713985725.jpg', 1, 1, '2024-04-25 01:08:47', '2024-04-25 01:08:47'),
(20, 'Tumblers 20 onzas', 6, '55e3a83e-a4f0-439f-bb26-638c4591d8e2_1713985934.jpg', 1, 1, '2024-04-25 01:12:15', '2024-04-25 01:12:15'),
(21, 'Tumbler de 30 onzas', 7, 'bf7068b0-0ca4-4707-bb89-6782bee0fb28_1713986111.jpg', 1, 1, '2024-04-25 01:15:12', '2024-04-25 01:15:12'),
(22, 'botella de acero inoxidable 800 ml', 11, 'b2028f66-1fac-47e6-9151-50d4bf528e89_1713987215.jpg', 1, 1, '2024-04-25 01:33:37', '2024-04-25 01:33:37'),
(62, 'Pantuflas de animales  - 1', 15, 'cabdf7d5-e316-4d07-bdde-28c855c77394_1716867123.jpg', 1, 3, '2024-05-28 09:32:04', '2024-05-28 09:32:04'),
(63, 'Pantuflas de animales  - 2', 15, '1be10df6-c329-401a-8a52-7a371b88ec37_1716867254.jpg', 1, 3, '2024-05-28 09:34:15', '2024-05-28 09:34:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `payment_methods` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_methods` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `physical` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `stores`
--

INSERT INTO `stores` (`id`, `name`, `description`, `payment_methods`, `shipping_methods`, `url`, `user_id`, `phone`, `whatsapp`, `country`, `address`, `physical`, `email`, `facebook_url`, `instagram_url`, `created_at`, `updated_at`) VALUES
(1, 'Relojes Wilberth', 'Tienda de Relojes Online', 'El método de pago puede ser sinpe, transferencia o efectivo en el momento de la entrega', 'Los envios actualmente son en Alajuela Centro y entrego personalmente', 'wilberth', 1, '85008393', '85008393', 'Costa Rica', 'San Rafael de Alajuela', 0, 'stwilberth@gmail.com', 'https://www.facebook.com/stwilberth', '', '2024-01-17 22:53:57', '2024-06-02 13:55:41'),
(2, 'Tienda Jala ', 'Arte, sublimación, colonias y diferentes productos, también puedes ingresar a www.tiendajala.com', 'Sinpe movil al 87063602 a nombre de Jefry Bautista Loría Villalobos, recuerda enviarnos el comprobante de pago.', 'Correos de Costa Rica, costo ₡3000', 'tienda-jala-', 4, '87063602', '87063602 ', 'CR', 'Buenos Aires ', 0, 'consultas@tiendajala.com', '', '', '2024-01-22 01:05:59', '2024-01-22 01:14:01'),
(3, 'Reparación de Zapatos Montes', 'Reparación de Zapatos ', 'Sinpe y Efectivo ', 'Correos de Costa Rica ', 'reparacion-de-zapatos-montes', 5, '63953076', '63953076', 'CR', 'Bambú, Puerto Jiménez ', 0, 'montesguissell2@gmail.com', 'https://www.facebook.com/profile.php?id=100057345974851', '', '2024-02-22 05:48:34', '2024-02-22 05:48:34'),
(4, 'Creativo_DYH_', 'Tumblers personalizados con grabado láser ', 'Sinpe, tranferencia, efectivo ', 'Mensajero, correos ', 'creativo_dyh_', 6, '84148304', '84148304', 'Costa Rica', '100 metros este de cinta azul, frente a Bimbo CR', 0, 'dcastillo102212@gmail.com', '', 'https://www.instagram.com/creativo_dyh_?igsh=MTlsdG9iMHpkbm40Ng==', '2024-04-24 23:36:00', '2024-04-25 00:44:14'),
(5, 'FCA STONE ', 'Fachaleta en piedra natural ', 'Transferencia o bien efectivo ', 'Transporte ', 'fca-stone-', 7, '', '84773729', 'Costa ', 'Cartago ', 1, 'fcastone0@gmail.com', 'https://www.facebook.com/Fachaletasartesanalescr?mibextid=ZbWKwL', 'https://www.instagram.com/fachaletaartesanales?utm_source=qr&igsh=MWtsaXV4cWF6NWxmbA==', '2024-04-25 22:42:12', '2024-04-25 21:39:09'),
(6, 'Floristeria Co Arreglos ', 'Somos tienda  física \n Estamos en San Rafael de Alajuela 200 metros este del McDonald\'s San Rafael. \n', 'Sinpe móvil \nEfectivo ', 'Tenemos  envíos por uber flash \nY Envio con mensajero', 'floristeria-co-arreglos', 8, '72052979', '72052979', 'Costa Rica', 'Alajuela', 1, 'jessicacorderovillalobos35@gmail.com', 'https://www.facebook.com/profile.php?id=100040931093612&mibextid=ZbWKwL', 'https://www.instagram.com/co_arreglos', '2024-04-26 02:05:11', '2024-04-25 21:39:15'),
(7, 'Tienda ali', 'Tienda de ropa, perfumes, zapatos y más ', 'Simpe móvil  o en efectivo ', 'Personal o por correo ', 'tienda-ali', 9, '61206850', '61206850', 'CostaRica ', 'Detrás del aeropuerto calle belen ', 1, 'ligianarvaezcardoza7@gmail.com', '', '', '2024-05-28 09:24:11', '2024-05-28 09:24:11'),
(8, 'Fitmastercr ', 'Tienda online y física ', 'Efectivo \nSinpe \nTransferencia \nTarjeta \nMinicuotas BAC\nCompra click BAC', 'Mensajería \nCorreos\nEncomienda ', 'fitmastercr-', 11, '85402444', '85402444', 'Costa Rica', 'San Pedro Montes de Oca ', 1, 'comprasmmaequipamientos@gmail.com', '', '', '2024-08-06 02:18:12', '2024-08-06 02:18:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `store_images`
--

CREATE TABLE `store_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `aspect_ratio` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `store_images`
--

INSERT INTO `store_images` (`id`, `name`, `store_id`, `url`, `type`, `aspect_ratio`, `created_at`, `updated_at`) VALUES
(2, 'Camiseta Escolar', 2, 'f7badb14-b458-483c-b6e2-d17af298de2b_1705864021.png', 1, 5, '2024-01-22 01:07:02', '2024-01-22 01:07:02'),
(3, 'Portada', 3, '044b3259-7055-4665-abfb-ef681df84b75_1708559378.jpg', 1, 5, '2024-02-22 05:49:38', '2024-02-22 05:49:38'),
(4, 'Logo dyh', 4, '79762980-3ec4-4558-ba91-8ccd9b86d7f2_1713980454.jpg', 1, 5, '2024-04-24 23:40:55', '2024-04-24 23:40:55'),
(5, 'Portada co Arreglos', 6, 'bdd85a5c-008b-41de-8dcb-258e7498ad99_1714076052.jpg', 1, 5, '2024-04-26 02:14:13', '2024-04-26 02:14:13'),
(6, 'relojes wil', 1, 'e8bd119e-0551-4793-924d-f2b0f78a6b8d_1714080500.png', 1, 5, '2024-04-26 03:28:21', '2024-04-26 03:28:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
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

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wilberth', 'stwilberth@gmail.com', NULL, '$2y$12$sdCFM.g9gj.g6Dq6v2.UYOr72n4ZdgA.6W/LPgrzh.jzEX0/1NX.O', '56so7Yk3BHCheDQhsUyG8RPW4OOkrZo3XxW7JTSG3Cx4ffTBuT18q8NQDH7o', '2024-01-05 02:10:19', '2024-01-05 02:10:19'),
(2, 'Greivin Vega', 'rastavega10@gmail.com', NULL, '$2y$12$qIPHljJu3PBiccSophWKCuA/4Ur2QGrRJ6NYGquXUpMAhlxwKZPMK', NULL, '2024-01-01 22:54:15', '2024-01-01 22:54:15'),
(4, 'Tienda Jala', 'consultas@tiendajala.com', NULL, '$2y$12$ZdlsPOMnYOCGvj1UNF1dR.9jmudLb2x5Y94leUrn.yklDNvwBNJH2', 'gKP2is440glz1mlNJKiWXsMBk3gEUU5GtIerhobRI69MhyJPif6jiN1lug6v', '2024-01-22 01:02:55', '2024-01-22 01:02:55'),
(5, 'Guissell Montes', 'montesguissell2@gmail.com', NULL, '$2y$12$uaCNwk3T/hYlo0nvv13oVe0qDOKMwmPdTeFZ9sqWEHKqN4hJ4CTMG', 'eJtNb39tDb1rOowpRH5atImTh4b3SsXoEfOoFWVnfhN6drNUVq6FQy8wFjgi', '2024-02-22 05:44:33', '2024-02-22 05:44:33'),
(6, 'Creativo_DYH_', 'dcastillo102212@gmail.com', NULL, '$2y$12$Y4U8bDBv4jBifSbYArTO3.D/5dL0TOv4u6rbU6cuyxE5efXV3oBJO', 'OD4jffrOHS1iaES4SGGbLkicxDBvRN9sHb71tknWurdjUQVU0OeCf9ggh8Bx', '2024-04-24 23:29:44', '2024-04-24 23:29:44'),
(7, 'FCA STONE', 'fcastone0@gmail.com', NULL, '$2y$12$yEF62kpacspA9I7b83D6le7cKSCDwjeLB5/EYN2IsQD60WUnqKwYy', NULL, '2024-04-25 22:37:48', '2024-04-25 22:37:48'),
(8, 'Jessica', 'jessicacorderovillalobos35@gmail.com', NULL, '$2y$12$oqBbkHSG/vU.UTJ/cYbuAuse.8LVuEu3mhnU3EVgqEfT0sJgJQU.u', NULL, '2024-04-26 01:49:01', '2024-04-26 01:49:01'),
(9, 'Tienda ali', 'ligianarvaezcardoza7@gmail.com', NULL, '$2y$12$V1T5UbHtTu3i8Q/D7ztM.ugqGxnivXOUokR0Try2f9CUep7ifGds2', NULL, '2024-05-28 09:18:03', '2024-05-28 09:18:03'),
(10, 'Chrsitian peraza', 'chrisperazapes@gmail.com', NULL, '$2y$12$i67q9UJbC/8vpZ6Peoa2oubnWcGf1ii46QqJH53u2aacVXUovj2re', NULL, '2024-06-08 06:48:38', '2024-06-08 06:48:38'),
(11, 'Beberlyn Morales', 'comprasmmaequipamientos@gmail.com', NULL, '$2y$12$xi8.dTJY.etxAYzIE1f94.PcrMeSGk6hzQTwFIGRN/BJ.aqCpbwSK', NULL, '2024-08-06 02:14:38', '2024-08-06 02:14:38'),
(12, 'Test', 'test@test.com', NULL, '$2y$12$VYJ49x.T1He3VoRH12kQgurmB3S2dqc3zYXLLwiHZCVvulZavO/Qa', NULL, '2024-09-29 07:38:46', '2024-09-29 07:38:46'),
(13, 'Jorge', 'skatelanks@gmail.com', NULL, '$2y$12$Yr0TV1hJcAjKNpC/e/fTxuES4AsfQw5Se5UBWQSvn9FQ4dZfvQ1jq', NULL, '2024-09-29 08:45:23', '2024-09-29 08:45:23'),
(14, 'Andreina', 'haciendaverdetropical@gmail.com', NULL, '$2y$12$ixnNJDrthNoIfRTDko96T.Liyl1RUX.HlB/ivLjHbQmBHrh4E7eo6', NULL, '2024-09-29 09:37:43', '2024-09-29 09:37:43'),
(15, 'Alvaro Alvarado', 'ajalvarados0474@gmail.com', NULL, '$2y$12$rX8JTPuZzDPtPxeg7DBV8eb/CG/BYK301Jo/24/KixAhBRL3fAPly', NULL, '2024-10-16 23:02:53', '2024-10-16 23:02:53'),
(16, 'María José Nora Rodriguez', 'zimrijahdai77@gmail.com', NULL, '$2y$12$vLp6B0geMPhu5nMlr2i.LuhYyi8z0K3RjIEIBih.90YgKidAP5k.q', NULL, '2024-12-23 04:20:23', '2024-12-23 04:20:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_store_url` (`store_id`,`url`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_product_image_url` (`product_id`,`url`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `store_images`
--
ALTER TABLE `store_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_store_image_url` (`store_id`,`url`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `store_images`
--
ALTER TABLE `store_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `store_images`
--
ALTER TABLE `store_images`
  ADD CONSTRAINT `store_images_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
