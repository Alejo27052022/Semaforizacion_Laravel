-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 09-02-2023 a las 03:11:17
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistentes`
--

CREATE TABLE `asistentes` (
  `cod_asistente` bigint(20) UNSIGNED NOT NULL,
  `cod_caso` bigint(20) UNSIGNED NOT NULL,
  `nom_asistente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_asistente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `asistentes`
--

INSERT INTO `asistentes` (`cod_asistente`, `cod_caso`, `nom_asistente`, `last_asistente`, `cargo`, `email`, `pass`, `created_at`, `updated_at`) VALUES
(15, 1, 'Edison', 'Flores', 'Psicologo', 'edison1234@gmail.com', 'edison123', '2023-02-07 00:33:50', '2023-02-07 05:15:09'),
(17, 4, 'Patricio', 'Espinoza', 'Administrador', 'patricio123@gmail.com', 'patricio213', '2023-02-07 05:13:44', '2023-02-07 05:13:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Codigo Amarillo - Primer Nivel', 'Violencia Leve, agresiones verbales no graves, empujones, bofetadas, patadas que no sean en sitios graves y que no causen demasiado daño, agresiones físicas leves', '2023-01-21 10:43:37', '2023-01-21 10:43:37'),
(2, 'Codigo Verde - Segundo Nivel', 'Agresiones verbales descalificadoras que afecten de manera considerable la autoestima de la persona, ofensas graves, palabras de grueso calibre; golpes que causen hematomas, en cara, o cuerpo, huellas visibles de maltrato que se visualicen fácilmente', '2023-01-21 10:47:28', '2023-01-21 10:47:28'),
(3, 'Codigo Rosa - Tercer Nivel', 'Agresiones verbales recurrentes que han causado daño en el autoestima y efectos como depresión primero y segundo grado, lesiones que necesitan atención médica, suturas, reposo de hasta tres días.', '2023-01-21 10:48:44', '2023-01-21 10:48:44'),
(4, 'Codigo Naranja - Cuarto Nivel', 'Depresion aguda y pone familiar la denuncia porque no tiene voluntad propia por la afectacion de la violencia recurrente de manera fisica con armas de fuego y armas blancas.', '2023-01-21 10:55:51', '2023-01-21 10:55:51'),
(5, 'Codigo Rojo - Quinto Nivel', 'Intento de asesinato o intento de femicidio, violencia sexual o abuso sexual agravado contagio de enfermedades graves como el sida, consumo de alcohol y drogas, amenazas con quitarse o quitar la vida, agresiones bajo efectos de alcohol y drogas', '2023-01-21 10:57:31', '2023-01-21 10:57:31'),
(6, 'Codigo Violeta - Sexto Nivel', 'Femicidio', '2023-01-21 10:58:08', '2023-01-21 10:58:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncia`
--

CREATE TABLE `denuncia` (
  `cod_denuncia` bigint(20) UNSIGNED NOT NULL,
  `ced_denunciante` int(10) DEFAULT NULL,
  `casos_id` bigint(20) UNSIGNED NOT NULL,
  `codigo_user` bigint(20) UNSIGNED DEFAULT NULL,
  `Rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `victima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `victimario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_contacto` bigint(20) NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitud` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitud` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `denuncia`
--

INSERT INTO `denuncia` (`cod_denuncia`, `ced_denunciante`, `casos_id`, `codigo_user`, `Rol`, `victima`, `victimario`, `email_contacto`, `num_contacto`, `direccion`, `latitud`, `longitud`, `estatus`, `created_at`, `updated_at`) VALUES
(26, 953911526, 2, NULL, 'Victima', 'Pedro', 'Patricio', 'kerly123@gmail.com', 9996585216, 'Macas, Ecuador', '-2.3074378', '-78.1202307', NULL, '2023-02-06 13:16:12', '2023-02-06 13:16:12'),
(27, 953911526, 2, NULL, 'Denunciante', 'Pedro', 'Patricio', 'kerly123@gmail.com', 999649650, 'Sucúa, Ecuador', '-2.4566285', '-78.1678439', NULL, '2023-02-07 03:39:30', '2023-02-07 03:39:30'),
(32, 953911526, 2, NULL, 'Victima', 'Kimberly', 'Juan', 'kerly123@gmail.com', 999649650, 'Puyo, Ecuador', '-1.4928811', '-77.99980339999999', NULL, '2023-02-08 00:03:05', '2023-02-08 00:03:05'),
(33, 953911526, 4, NULL, 'Victima', 'Kimberly', 'Pedro', 'pedro123@gmail.com', 9996585216, 'Gualaquiza, Ecuador', '-3.4063492', '-78.5717631', NULL, '2023-02-08 00:20:41', '2023-02-08 00:20:41'),
(36, 1401039894, 3, NULL, 'Denunciante', 'Kerly', 'Patricio', 'stalinalejandrp19@outlok.es', 999649650, 'Gualaquiza, Ecuador', '-3.4063492', '-78.5717631', NULL, '2023-02-08 00:58:13', '2023-02-08 00:58:13'),
(37, 1400679021, 5, NULL, 'Denunciante', 'Pablo Ramones', 'Kerly Wachapa', 'pablo123@gmail.com', 9991452661, 'Amazonas & Quito, Macas, Ecuador', '-2.2985354', '-78.1194689', NULL, '2023-02-08 01:01:45', '2023-02-08 01:01:45'),
(38, 602119885, 1, NULL, 'Victima', 'juan', 'Pablo', 'pedro123@gmail.com', 9996585216, 'Amazonas & Quito, Macas, Ecuador', '-2.2985354', '-78.1194689', NULL, '2023-02-08 01:29:48', '2023-02-08 01:29:48'),
(39, 1401315922, 1, NULL, 'Victima', 'juan pedro', 'Pablo andres', 'pedro123@gmail.com', 9996585216, 'Guayaquil, Ecuador', '-2.1894128', '-79.8890662', NULL, '2023-02-08 01:39:12', '2023-02-08 01:39:12');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(8, '2023_01_20_211436_asistente', 1),
(26, '2014_10_12_000000_create_users_table', 2),
(27, '2014_10_12_100000_create_password_resets_table', 2),
(28, '2019_08_19_000000_create_failed_jobs_table', 2),
(29, '2019_12_14_000001_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencias`
--

CREATE TABLE `sugerencias` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sugerencias`
--

INSERT INTO `sugerencias` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Juan Carlos', 'juancarlos123@hotmail.com', 'Asunto', 'La pagina está muy bien realizada. Saludos.'),
(3, 'Pedro Pablo', 'pedro123@hotmail.com', 'Asunto', 'Que bonita página, espero algún día hacer una como la suyas.'),
(5, 'Patricio', 'patricio123@gmail.com', 'Asunto', 'Buena pagina'),
(6, 'Stalin', 'edison1234@gmail.com', 'Asunto', 'Buena pagina');

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
(1, 'Stalin Alejandro', 'stalinalejandro19@outlook.es', NULL, '$2y$10$3jicsycYiEeV1HNAdMBSEOT2rvA9z0L6vGtm7UU6niusdC.7C6./O', NULL, '2023-02-06 23:56:31', '2023-02-06 23:56:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `ced_user` int(20) NOT NULL,
  `nom_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `ced_user`, `nom_user`, `last_user`, `direc`, `telefono`, `email`, `pass`, `created_at`, `updated_at`) VALUES
(1, 953911526, 'Alejandro', 'Consuegra', '', 999649650, 'stalinalejandro19@outlook.es', 'stalin1206', NULL, NULL),
(2, 815263641, 'Juan', 'Caceres', 'Macas - San Isidro', 999748512, 'juancaceres@hotmail.com', 'Juan123', '2031-01-23 05:00:00', NULL),
(3, 753615265, 'Carlos', 'Perez', 'Puyo', 998452361, 'carlosperez1234@outlook.es', 'carlos123', '2031-01-23 05:00:00', NULL),
(4, 741625265, 'Edison', 'Flores', '27 de Febrero', 998544522, 'edison1234@gmail.com', 'edison333', '2031-01-23 05:00:00', NULL),
(5, 998412021, 'Patricio', 'Espinoza', 'Huaquillas', 998144523, 'patricio123@gmail.com', 'pato123', '2031-01-23 05:00:00', NULL),
(9, 953911526, 'Pedro', 'Naranjo', 'Guayaquil', 999649650, 'pedro123@hotmail.com', 'pedro123', '2007-02-23 05:00:00', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  ADD PRIMARY KEY (`cod_asistente`),
  ADD KEY `asistentes_cod_caso_foreign` (`cod_caso`);

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`cod_denuncia`),
  ADD KEY `denuncia_casos_id_foreign` (`casos_id`),
  ADD KEY `denuncia_codigo_user_foreign` (`codigo_user`);

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
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `sugerencias`
--
ALTER TABLE `sugerencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  MODIFY `cod_asistente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  MODIFY `cod_denuncia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sugerencias`
--
ALTER TABLE `sugerencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistentes`
--
ALTER TABLE `asistentes`
  ADD CONSTRAINT `asistentes_cod_caso_foreign` FOREIGN KEY (`cod_caso`) REFERENCES `casos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD CONSTRAINT `denuncia_casos_id_foreign` FOREIGN KEY (`casos_id`) REFERENCES `casos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `denuncia_codigo_user_foreign` FOREIGN KEY (`codigo_user`) REFERENCES `usuarios` (`codigo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
