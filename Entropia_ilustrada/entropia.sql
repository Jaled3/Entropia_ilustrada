-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2025 a las 21:11:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `entropia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `Id` bigint(20) NOT NULL,
  `texto` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `Idusuario` bigint(20) NOT NULL,
  `Idpublicacion` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`Id`, `texto`, `fecha`, `Idusuario`, `Idpublicacion`) VALUES
(1, 'Hola\r\n', '2025-05-17', 3, 41),
(2, 'me', '2025-05-16', 3, 41),
(3, 'gusta', '2025-05-15', 3, 41),
(4, 'mucho', '2025-05-14', 3, 41),
(5, 'tu', '2025-05-13', 3, 41),
(6, 'comic', '2025-05-12', 3, 41),
(7, 'para', '2025-05-11', 3, 41),
(8, 'cuando', '2025-05-10', 3, 41),
(9, 'el', '2025-05-09', 3, 41),
(10, 'siguiente', '2025-05-08', 3, 41),
(11, 'número', '2025-05-07', 3, 41),
(12, 'responde', '2025-05-18', 3, 41),
(13, 'holaaa', '2025-05-19', 3, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`categoria`) VALUES
('aventura'),
('Ciencia.Fic'),
('digital'),
('manga'),
('moderno'),
('suspense'),
('terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `Id` bigint(20) NOT NULL,
  `Idusuario` bigint(20) NOT NULL,
  `Idpublicacion` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`Id`, `Idusuario`, `Idpublicacion`) VALUES
(1, 6, 24),
(2, 6, 43),
(3, 6, 12),
(4, 6, 2),
(5, 6, 9),
(6, 6, 4),
(7, 6, 44),
(8, 6, 28),
(9, 6, 30),
(10, 3, 41),
(11, 8, 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `Id` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `Idusuario` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `visualizacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`Id`, `nombre`, `descripcion`, `foto`, `tipo`, `categoria`, `Idusuario`, `fecha`, `visualizacion`) VALUES
(1, 'Hilda y el troll pt1', 'comic edición Nº1 de Hilda', '../img/2/6825bd90a03d2.hilda1-005.png', 'terminado', 'aventura', 2, '2025-05-15', 'mostrar'),
(2, 'Hilda y el troll pt2', 'comic edición Nº1 de Hilda', '../img/2/6825c199e5302.hilda1-006.png', 'terminado', 'aventura', 2, '2025-05-15', 'mostrar'),
(3, 'Hilda y el troll pt3', 'comic edición Nº1 de Hilda', '../img/2/6825c1e322919.hilda1-007.png', 'terminado', 'aventura', 2, '2025-05-15', 'mostrar'),
(4, 'Hilda y el troll pt4', 'comic edición Nº1 de Hilda', '../img/2/6825c20045924.hilda1-008.png', 'terminado', 'aventura', 2, '2025-05-15', 'mostrar'),
(5, 'Hilda y el troll pt5', 'comic edición Nº1 de Hilda', '../img/2/6825c2146825b.hilda1-009.png', 'terminado', 'aventura', 2, '2025-05-15', 'mostrar'),
(6, 'Hilda y el troll pt6', 'comic edición Nº1 de Hilda', '../img/2/6825c228887f2.hilda1-010.png', 'terminado', 'aventura', 2, '2025-05-15', 'mostrar'),
(7, 'Hilda y el troll pt7', 'comic edición Nº1 de Hilda', '../img/2/6825c24357c5a.hilda1-011.png', 'terminado', 'aventura', 2, '2025-05-15', 'mostrar'),
(8, 'Hilda y el troll pt8', 'comic edición Nº1 de Hilda', '../img/2/6825c260bb1b9.hilda1-012.png', 'terminado', 'aventura', 2, '2025-05-15', 'mostrar'),
(9, 'Hilda y el troll pt9', 'comic edición Nº1 de Hilda', '../img/2/6825c276dda90.hilda1-013.png', 'terminado', 'aventura', 2, '2025-05-15', 'mostrar'),
(10, 'Hilda y el troll pt10', 'comic edición Nº1 de Hilda', '../img/2/6825c2a027c97.hilda1-014.png', 'terminado', 'aventura', 2, '2025-05-15', 'mostrar'),
(11, 'Ring of Fired pt1', 'comic de tf2', '../img/4/6825c4f46d621.005.png', 'terminado', 'digital', 4, '2025-05-15', 'mostrar'),
(12, 'Ring of Fired pt2', 'comic de tf2', '../img/4/6825c5489cf46.006.png', 'terminado', 'digital', 4, '2025-05-15', 'mostrar'),
(13, 'Ring of Fired pt3', 'comic de tf2', '../img/4/6825c57f5b763.007.png', 'terminado', 'digital', 4, '2025-05-15', 'mostrar'),
(14, 'Ring of Fired pt4', 'comic de tf2', '../img/4/6825c58d28dd1.011.png', 'terminado', 'digital', 4, '2025-05-15', 'mostrar'),
(15, 'Ring of Fired pt5', 'comic de tf2', '../img/4/6825c5ab2762f.015.png', 'terminado', 'digital', 4, '2025-05-15', 'mostrar'),
(16, 'Ring of Fired pt6', 'comic de tf2', '../img/4/6825c5d8ee5dd.016.png', 'terminado', 'digital', 4, '2025-05-15', 'mostrar'),
(17, 'Ring of Fired pt7', 'comic de tf2', '../img/4/6825c5e853244.023.png', 'terminado', 'digital', 4, '2025-05-15', 'mostrar'),
(18, 'Ring of Fired pt8', 'comic de tf2', '../img/4/6825c5fb98102.024.png', 'terminado', 'digital', 4, '2025-05-15', 'mostrar'),
(19, 'Ring of Fired pt9', 'comic de tf2', '../img/4/6825c60776d17.025.png', 'terminado', 'digital', 4, '2025-05-15', 'mostrar'),
(20, 'Ring of Fired pt10', 'comic de tf2', '../img/4/6825c6173f941.054.png', 'terminado', 'digital', 4, '2025-05-15', 'mostrar'),
(21, 'The sacrifice pt1', 'comic de left4 dead', '../img/3/6825c74f0b635.L4dpg169.png', 'terminado', 'moderno', 3, '2025-05-15', 'mostrar'),
(22, 'The sacrifice pt2', 'comic de left4 dead', '../img/3/6825c77043a64.L4dpg170.png', 'terminado', 'moderno', 3, '2025-05-15', 'mostrar'),
(23, 'The sacrifice pt3', 'comic de left4 dead', '../img/3/6825c7827e078.L4dpg171.png', 'terminado', 'moderno', 3, '2025-05-15', 'mostrar'),
(24, 'The sacrifice pt4', 'comic de left4 dead', '../img/3/6825c78d1189c.L4dpg172.png', 'terminado', 'moderno', 3, '2025-05-15', 'mostrar'),
(25, 'The sacrifice pt5', 'comic de left4 dead', '../img/3/6825c79bcd960.L4dpg173.png', 'terminado', 'moderno', 3, '2025-05-15', 'mostrar'),
(26, 'The sacrifice pt6', 'comic de left4 dead', '../img/3/6825c7a8b8133.L4dpg174.png', 'terminado', 'moderno', 3, '2025-05-15', 'mostrar'),
(27, 'The sacrifice pt7', 'comic de left4 dead', '../img/3/6825c7bdaaee2.L4dpg175.png', 'terminado', 'moderno', 3, '2025-05-15', 'mostrar'),
(28, 'The sacrifice pt8', 'comic de left4 dead', '../img/3/6825c7ce01c17.L4dpg176.png', 'terminado', 'moderno', 3, '2025-05-15', 'mostrar'),
(29, 'The sacrifice pt9', 'comic de left4 dead', '../img/3/6825c7da7291a.L4dpg177.png', 'terminado', 'moderno', 3, '2025-05-15', 'mostrar'),
(30, 'The sacrifice pt10', 'comic de left4 dead', '../img/3/6825c7ebce433.L4dpg178.png', 'terminado', 'moderno', 3, '2025-05-15', 'mostrar'),
(31, 'Lab rat pt1', 'comic de portal', '../img/5/6825c9c466d8c.p01 (1).png', 'terminado', 'suspense', 5, '2025-05-15', 'mostrar'),
(32, 'Lab rat pt2', 'comic de portal', '../img/5/6825c9d6484fa.p02 (1).png', 'terminado', 'suspense', 5, '2025-05-15', 'mostrar'),
(33, 'Lab rat pt3', 'comic de portal', '../img/5/6825c9e2aa448.p03 (1).png', 'terminado', 'suspense', 5, '2025-05-15', 'mostrar'),
(34, 'Lab rat pt4', 'comic de portal', '../img/5/6825c9f1ed17b.p04.png', 'terminado', 'suspense', 5, '2025-05-15', 'mostrar'),
(35, 'Lab rat pt5', 'comic de portal', '../img/5/6825ca0335086.p05.png', 'terminado', 'suspense', 5, '2025-05-15', 'mostrar'),
(36, 'Lab rat pt6', 'comic de portal', '../img/5/6825ca146a5a3.p06.png', 'terminado', 'suspense', 5, '2025-05-15', 'mostrar'),
(37, 'Lab rat pt7', 'comic de portal', '../img/5/6825ca2402603.p07.png', 'terminado', 'suspense', 5, '2025-05-15', 'mostrar'),
(38, 'Lab rat pt8', 'comic de portal', '../img/5/6825ca36a581a.p08.png', 'terminado', 'suspense', 5, '2025-05-15', 'mostrar'),
(39, 'Lab rat pt9', 'comic de portal', '../img/5/6825ca439e1ed.p09.png', 'terminado', 'suspense', 5, '2025-05-15', 'mostrar'),
(40, 'Lab rat pt10', 'comic de portal', '../img/5/6825ca5300613.p10.png', 'terminado', 'suspense', 5, '2025-05-15', 'mostrar'),
(41, 'Cayde\'s Six pt1', 'comic de Destiny2', '../img/7/6825ce79a2f40.pt1.png', 'terminado', 'Ciencia.Fic', 7, '2025-05-15', 'mostrar'),
(42, 'Cayde\'s Six pt2', 'comic de Destiny2', '../img/7/6825ceca19ea7.pt2.png', 'terminado', 'Ciencia.Fic', 7, '2025-05-15', 'mostrar'),
(43, 'Cayde\'s Six pt3', 'comic de Destiny2', '../img/7/6825cef65c812.pt3.png', 'terminado', 'Ciencia.Fic', 7, '2025-05-15', 'mostrar'),
(44, 'Cayde\'s Six pt4', 'comic de Destiny2', '../img/7/6825cf14ebf44.pt4.png', 'terminado', 'Ciencia.Fic', 7, '2025-05-15', 'mostrar'),
(45, 'Cayde\'s Six pt5', 'comic de Destiny2', '../img/7/6825cf210a3ab.pt5.png', 'terminado', 'Ciencia.Fic', 7, '2025-05-15', 'mostrar'),
(46, 'Cayde\'s Six pt6', 'comic de Destiny2', '../img/7/6825cf333aaf5.pt6.png', 'terminado', 'Ciencia.Fic', 7, '2025-05-15', 'mostrar'),
(47, 'Cayde\'s Six pt7', 'comic de Destiny2', '../img/7/6825cf3fa051c.pt7.png', 'terminado', 'Ciencia.Fic', 7, '2025-05-15', 'mostrar'),
(48, 'Fall of Osiris pt1', 'comic de Destiny2', '../img/7/6825d0289df33.osirispt1.png', 'terminado', 'Ciencia.Fic', 7, '2025-05-15', 'mostrar'),
(49, 'Fall of Osiris pt2', 'comic de Destiny2', '../img/7/6825d036cebc0.osirispt2.png', 'terminado', 'Ciencia.Fic', 7, '2025-05-15', 'mostrar'),
(50, 'Fall of Osiris pt3', 'comic de Destiny2', '../img/7/6825d041a5e90.osirispt3.png', 'terminado', 'Ciencia.Fic', 7, '2025-05-15', 'mostrar'),
(51, 'Mi comic', 'c', '../img/3/682710d15ca87.hilda2-011.png', 'boceto', 'aventura', 3, '2025-05-16', 'mostrar'),
(52, 'El Dios caído pt1', 'comic de god of war', '../img/6/6829074a4a5d5.God of War - Fallen God 001 (2021) (digital) (Son of Ultron-Empire)-000.png', 'terminado', 'moderno', 6, '2025-05-18', 'mostrar'),
(53, 'El Dios caído pt2', 'comic de god of war', '../img/6/6829075e1161e.God of War - Fallen God 001 (2021) (digital) (Son of Ultron-Empire)-002.png', 'terminado', 'moderno', 6, '2025-05-18', 'mostrar'),
(54, 'El Dios caído pt3', 'comic de god of war', '../img/6/682907687dac6.God of War - Fallen God 001 (2021) (digital) (Son of Ultron-Empire)-003.png', 'terminado', 'moderno', 6, '2025-05-18', 'mostrar'),
(55, 'El Dios caído pt4', 'comic de god of war', '../img/6/682907780c497.God of War - Fallen God 001 (2021) (digital) (Son of Ultron-Empire)-004.png', 'terminado', 'moderno', 6, '2025-05-18', 'mostrar'),
(56, 'El Dios caído pt5', 'comic de god of war', '../img/6/682907834d1ca.God of War - Fallen God 001 (2021) (digital) (Son of Ultron-Empire)-005.png', 'terminado', 'moderno', 6, '2025-05-18', 'mostrar'),
(57, 'El Dios caído pt6', 'comic de god of war', '../img/6/6829078cd76ab.God of War - Fallen God 001 (2021) (digital) (Son of Ultron-Empire)-006.png', 'terminado', 'moderno', 6, '2025-05-18', 'mostrar'),
(58, 'El Dios caído pt7', 'comic de god of war', '../img/6/68290797f0fdd.God of War - Fallen God 001 (2021) (digital) (Son of Ultron-Empire)-007.png', 'terminado', 'moderno', 6, '2025-05-18', 'mostrar'),
(59, 'El Dios caído pt8', 'comic de god of war', '../img/6/682907a2c8d7d.God of War - Fallen God 001 (2021) (digital) (Son of Ultron-Empire)-008.png', 'terminado', 'moderno', 6, '2025-05-18', 'mostrar'),
(60, 'El Dios caído pt9', 'comic de god of war', '../img/6/682907f8e38aa.God of War - Fallen God 001 (2021) (digital) (Son of Ultron-Empire)-009.png', 'terminado', 'moderno', 6, '2025-05-18', 'mostrar'),
(61, 'El Dios caído pt10', 'comic de god of war', '../img/6/6829080346a0b.God of War - Fallen God 001 (2021) (digital) (Son of Ultron-Empire)-010.png', 'terminado', 'moderno', 6, '2025-05-18', 'mostrar'),
(62, 'MGRR Raiden', 'Estoy trabajando en un nuevo comic del Metal gear rising Revengeance', '../img/3/682a1e8d383da.comicRaiden.png', 'boceto', 'Ciencia.Fic', 3, '2025-05-18', 'mostrar'),
(63, 'El movimiento de la tierra pt1', 'Manga sobre el heliocentrismo', '../img/8/682acc6438105.1.png', 'terminado', 'manga', 8, '2025-05-19', 'mostrar'),
(64, 'El movimiento de la tierra pt2', 'Manga sobre el heliocentrismo', '../img/8/682acc7b99a56.2.png', 'terminado', 'manga', 8, '2025-05-19', 'mostrar'),
(65, 'El movimiento de la tierra pt3', 'Manga sobre el heliocentrismo', '../img/8/682acc894cb94.3.png', 'terminado', 'manga', 8, '2025-05-19', 'mostrar'),
(66, 'El movimiento de la tierra pt4', 'Manga sobre el heliocentrismo', '../img/8/682acc953a930.4.png', 'terminado', 'manga', 8, '2025-05-19', 'mostrar'),
(67, 'El movimiento de la tierra pt5', 'Manga sobre el heliocentrismo', '../img/8/682acc9f4b801.5.png', 'terminado', 'manga', 8, '2025-05-19', 'mostrar'),
(68, 'El movimiento de la tierra pt6', 'Manga sobre el heliocentrismo', '../img/8/682accab0c51a.6.png', 'terminado', 'manga', 8, '2025-05-19', 'mostrar'),
(69, 'El movimiento de la tierra pt7', 'Manga sobre el heliocentrismo', '../img/8/682accb93e3e0.7.png', 'terminado', 'manga', 8, '2025-05-19', 'mostrar'),
(70, 'El movimiento de la tierra pt8', 'Manga sobre el heliocentrismo', '../img/8/682accc57af13.8.png', 'terminado', 'manga', 8, '2025-05-19', 'mostrar'),
(71, 'El movimiento de la tierra pt9', 'Manga sobre el heliocentrismo', '../img/8/682acccfd931a.9.png', 'terminado', 'manga', 8, '2025-05-19', 'mostrar'),
(72, 'El movimiento de la tierra pt10', 'Manga sobre el heliocentrismo', '../img/8/682accdabdd6b.10.png', 'terminado', 'manga', 8, '2025-05-19', 'mostrar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `Id` bigint(20) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `Idusuario` bigint(20) NOT NULL,
  `Idpublicacion` bigint(20) DEFAULT NULL,
  `Idreportado` bigint(20) NOT NULL,
  `respuesta` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`Id`, `titulo`, `descripcion`, `estado`, `fecha`, `Idusuario`, `Idpublicacion`, `Idreportado`, `respuesta`) VALUES
(1, 'Robo de arte', 'El contenido publicado, ha sido robado de otra página', 'activo', '2025-05-19', 8, 53, 6, 'Parece ser que te has equivocado el contenido es 100% original, no hagas reportes falsos por favor. Que tenga un buen día y piense 2 veces antes de hacer un reporte'),
(2, 'Robo de arte', 'Es un robo\r\n', 'activo', '2025-05-19', 8, 60, 6, NULL),
(3, 'Nombre ofensivo', 'El nombre es ofensivo', 'activo', '2025-05-19', 8, NULL, 6, NULL),
(4, 'Robo de arte', 'Contenido robado de valve', 'activo', '2025-05-19', 8, 32, 5, NULL),
(5, 'Robo de arte', 'Contenido robado de Bungie', 'activo', '2025-05-19', 8, 42, 7, NULL),
(6, 'Robo de arte', 'Contenido robado de valve', 'activo', '2025-05-19', 8, 15, 4, NULL),
(7, 'Robo de arte', 'Es contenido robado de santa Monica', 'activo', '2025-05-19', 3, 55, 6, NULL),
(8, 'Robo de arte', 'Es contenido robado de santa Monica', 'activo', '2025-05-19', 3, 53, 6, NULL),
(9, 'Robo de arte', 'Es contenido robado de santa Monica', 'activo', '2025-05-19', 3, 56, 6, NULL),
(10, 'Robo de arte', 'El contenido ha sido robado de una página la cual no me se su nombre', 'activo', '2025-05-23', 3, 70, 8, NULL),
(11, 'Robo de arte', 'Contenido robado de Santa Mónica se puede ver en el perfil que la marca de agua no coincide con la del autor', 'activo', '2025-05-23', 8, 56, 6, NULL),
(12, 'Robo de arte', 'Contenido robado de Santa Mónica se puede ver en el perfil que la marca de agua no coincide con la del autorContenido robado de Santa Mónica se puede ver en el perfil que la marca de agua no coincide con la del autorContenido robado de Santa Mónica s', 'activo', '2025-05-23', 8, 61, 6, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` bigint(20) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `contrasenia` varchar(60) NOT NULL,
  `tipo` varchar(13) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `biografia` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `nombre`, `contrasenia`, `tipo`, `foto`, `biografia`, `fecha`, `correo`) VALUES
(1, 'administrador', '$2y$10$gZcv8jibguuk.zajkZqnq.sG3EVCmqoaa8UKBMKHRH39GwU6tY5vy', 'administrador', '../ServidorImg/predefinido.png', 'Sobre mi', '2025-04-13', 'administrador@barakaldo.com'),
(2, 'Jaled', '$2y$10$ZwzwqIM4i4q5UOl/T5eWYe7lMU5HWGknXKmZ/mo9NL.buds/iFMM2', 'registrado', '../img/2/6825c35924d48.mifoto.png', 'sobre mi', '2025-05-15', 'jaled@gmail.com'),
(3, 'Alex', '$2y$10$Cg3i6qVNFqkboqDn58m5HOs9TCf/QEPP1fr7WWsO5DtNTVlHaWNIa', 'registrado', '../img/3/6825c67503c05.samuel.png', 'sobre mi', '2025-05-15', 'alex@gmail.com'),
(4, 'Angel', '$2y$10$ZwDgwnpopr9hnlaiuTyhau6FaqxGn6sHA8ti7ZdlEKcj/.XR4Yxl.', 'registrado', '../img/4/6825c3ea2e33a.raidencillo.png', 'sobre mi', '2025-05-15', 'angel@gmail.com'),
(5, 'Leonardo', '$2y$10$IWxJK8P/gvhtq60qWWCaW.yCaXe6xIyoewbi8Ms/WgQGh/idJuu5O', 'registrado', '../img/5/6825c97f041bd.blendernuevo.png', 'sobre mi', '2025-05-15', 'leonardo@gmail.com'),
(6, 'Laura', '$2y$10$wPKmka9BAzt2WFVW4.kOn.Ubz0I3y9mbdbJpE4XGpnT2rYA6WSPCi', 'registrado', '../img/6/6825d1fbaa8e5.Eternal Warriors WP 11.png', 'sobre mi', '2025-05-15', 'laura@gmail.com'),
(7, 'John', '$2y$10$O5l2xW587xJOnve/0aa2F.laVi7b9KXCf2vG6kaHA7QDfGeHLD166', 'registrado', '../img/7/6825cd45dc192.El golpe perfecto.png', 'sobre mi', '2025-05-15', 'john@gmail.com'),
(8, 'Roxas', '$2y$10$WbAE4HhONG.Uj8L9uiCVUeVo71dUzqQ217gBP6lQ3gfjmtdb5n2x6', 'registrado', '../img/8/6825d1f57d641.Eternal Warriors WP 10.png', 'sobre mi', '2025-05-15', 'roxas@gmail.com'),
(9, 'Madara', '$2y$10$bnrA83bzVzhCuN3yHtC5UOScgLRM2hpY4OJr7XN2QVHqF3oqk..Si', 'registrado', '../img/9/6825d1ed641a3.Eternal Warriors WP 07.png', 'sobre mi', '2025-05-15', 'madara@gmail.com'),
(10, 'Kompact', '$2y$10$X86ZOhxlQ.3cpIDip18i0.mEs/WkYy.5cpVm4br56fcH8LMivFEwS', 'registrado', '../img/10/6825d1e4594f2.Eternal Warriors WP 15.png', 'sobre mi', '2025-05-15', 'kompact@gmail.com'),
(11, 'Prolu', '$2y$10$3CdndatTdKEL00knNKJl1uE2NVQcSlGOaPgCsVu68uLZhMCu8t0CG', 'registrado', '../img/11/6825d1ddb8103.Eternal Warriors WP 08.png', 'sobre mi', '2025-05-15', 'prolu@gmail.com'),
(12, 'David', '$2y$10$hAR0gUMXh.9Kx.PUWmU6oewXEUiCkdV1m/mpDMSmgo5CuHfiuWIHi', 'registrado', '../img/12/6825d1d73f594.Eternal Warriors WP 12.png', 'sobre mi', '2025-05-15', 'david@gmail.com'),
(13, 'Dimitri', '$2y$10$tteoPPRNVAULuvHZ4kxqvuTDcGhS/74sPykDesxYp6ywtb/C4rQk6', 'registrado', '../img/13/6825d1cf32444.Eternal Warriors WP 01.png', 'sobre mi', '2025-05-15', 'dimitri@gmail.com'),
(14, 'Omar', '$2y$10$cjmlaPEmAwDnYdVlwgr5xecg6kKICd/gCkBorNKvqkzGPtIAOQi0W', 'administrador', '../ServidorImg/predefinido.png', 'sobre mi', '2025-05-19', 'omar@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_com_idu` (`Idusuario`),
  ADD KEY `fk_com_pub` (`Idpublicacion`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`categoria`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_lik_pub` (`Idpublicacion`),
  ADD KEY `fk_lik_idu` (`Idusuario`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_pub_cat` (`categoria`),
  ADD KEY `fk_pub_idu` (`Idusuario`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_rep_idu` (`Idusuario`),
  ADD KEY `fk_rep_pub` (`Idpublicacion`),
  ADD KEY `fk_rep_irep` (`Idreportado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_com_idu` FOREIGN KEY (`Idusuario`) REFERENCES `usuarios` (`Id`),
  ADD CONSTRAINT `fk_com_pub` FOREIGN KEY (`Idpublicacion`) REFERENCES `publicacion` (`Id`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_lik_idu` FOREIGN KEY (`Idusuario`) REFERENCES `usuarios` (`Id`),
  ADD CONSTRAINT `fk_lik_pub` FOREIGN KEY (`Idpublicacion`) REFERENCES `publicacion` (`Id`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `fk_pub_cat` FOREIGN KEY (`categoria`) REFERENCES `etiquetas` (`categoria`),
  ADD CONSTRAINT `fk_pub_idu` FOREIGN KEY (`Idusuario`) REFERENCES `usuarios` (`Id`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `fk_rep_idu` FOREIGN KEY (`Idusuario`) REFERENCES `usuarios` (`Id`),
  ADD CONSTRAINT `fk_rep_irep` FOREIGN KEY (`Idreportado`) REFERENCES `usuarios` (`Id`),
  ADD CONSTRAINT `fk_rep_pub` FOREIGN KEY (`Idpublicacion`) REFERENCES `publicacion` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
