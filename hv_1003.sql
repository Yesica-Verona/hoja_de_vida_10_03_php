-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3309
-- Tiempo de generación: 15-02-2026 a las 04:37:42
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hv_1003`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `id_usuario` int(11) NOT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `doc_identificacion` varchar(50) NOT NULL,
  `num_identificacion` int(20) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `pais_nacionalidad` varchar(250) NOT NULL,
  `libreta_militar` varchar(50) NOT NULL,
  `num_libreta` varchar(50) NOT NULL,
  `distrito` varchar(250) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pais_nacimiento` varchar(250) NOT NULL,
  `depto_nacimiento` varchar(250) NOT NULL,
  `muni_nacimiento` varchar(250) NOT NULL,
  `correspondencia` varchar(250) NOT NULL,
  `pais_correspondencia` varchar(250) NOT NULL,
  `depto_correspondencia` varchar(250) NOT NULL,
  `muni_correspondencia` varchar(250) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `entidad_receptora` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `educacion_basica`
--

CREATE TABLE `educacion_basica` (
  `id_educacion_basica` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo_obtenido` varchar(250) NOT NULL,
  `primaria` varchar(50) NOT NULL,
  `secundaria` varchar(50) NOT NULL,
  `media` varchar(50) NOT NULL,
  `fecha_grado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `educacion_superior`
--

CREATE TABLE `educacion_superior` (
  `id_educacion_superior` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `modalidad_academica` varchar(250) NOT NULL,
  `semestres_aprobados` varchar(50) NOT NULL,
  `graduado` varchar(50) NOT NULL,
  `estudios` varchar(250) NOT NULL,
  `fecha_terminacion` date NOT NULL,
  `tarjeta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_laboral`
--

CREATE TABLE `experiencia_laboral` (
  `id_experiencia_laboral` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `empresa` varchar(250) NOT NULL,
  `tipo_empresa` varchar(50) NOT NULL,
  `pais_empresa` varchar(250) NOT NULL,
  `depto_empresa` varchar(250) NOT NULL,
  `muni_empresa` varchar(250) NOT NULL,
  `email_empresa` varchar(250) NOT NULL,
  `telefono_empresa` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_retiro` date NOT NULL,
  `cargo` varchar(250) NOT NULL,
  `dependencia` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `firmas_observaciones`
--

CREATE TABLE `firmas_observaciones` (
  `id_firmas` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `causales` varchar(50) NOT NULL,
  `ciudad_fecha_diligenciamiento` varchar(250) NOT NULL,
  `observaciones` varchar(250) NOT NULL,
  `ciudad_fecha_contrato` varchar(250) NOT NULL,
  `firma1` longtext NOT NULL,
  `firma2` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id_idioma` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `idioma` varchar(250) NOT NULL,
  `habla` varchar(50) NOT NULL,
  `lee` varchar(50) NOT NULL,
  `escribe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `total_experiencia`
--

CREATE TABLE `total_experiencia` (
  `id_total_experiencia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `meses_servidor` varchar(50) NOT NULL,
  `años_servidor` varchar(50) NOT NULL,
  `meses_empleado` varchar(50) NOT NULL,
  `años_empleado` varchar(50) NOT NULL,
  `meses_independiente` varchar(50) NOT NULL,
  `años_independiente` varchar(50) NOT NULL,
  `meses_total_ex` varchar(50) NOT NULL,
  `años_total_ex` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `educacion_basica`
--
ALTER TABLE `educacion_basica`
  ADD PRIMARY KEY (`id_educacion_basica`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `educacion_superior`
--
ALTER TABLE `educacion_superior`
  ADD PRIMARY KEY (`id_educacion_superior`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD PRIMARY KEY (`id_experiencia_laboral`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `firmas_observaciones`
--
ALTER TABLE `firmas_observaciones`
  ADD PRIMARY KEY (`id_firmas`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id_idioma`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `total_experiencia`
--
ALTER TABLE `total_experiencia`
  ADD PRIMARY KEY (`id_total_experiencia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `educacion_basica`
--
ALTER TABLE `educacion_basica`
  MODIFY `id_educacion_basica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `educacion_superior`
--
ALTER TABLE `educacion_superior`
  MODIFY `id_educacion_superior` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  MODIFY `id_experiencia_laboral` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `firmas_observaciones`
--
ALTER TABLE `firmas_observaciones`
  MODIFY `id_firmas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id_idioma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `total_experiencia`
--
ALTER TABLE `total_experiencia`
  MODIFY `id_total_experiencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `educacion_basica`
--
ALTER TABLE `educacion_basica`
  ADD CONSTRAINT `educacion_basica_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `datos_personales` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `educacion_superior`
--
ALTER TABLE `educacion_superior`
  ADD CONSTRAINT `educacion_superior_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `datos_personales` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD CONSTRAINT `experiencia_laboral_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `datos_personales` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `firmas_observaciones`
--
ALTER TABLE `firmas_observaciones`
  ADD CONSTRAINT `firmas_observaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `datos_personales` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD CONSTRAINT `idiomas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `datos_personales` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `total_experiencia`
--
ALTER TABLE `total_experiencia`
  ADD CONSTRAINT `total_experiencia_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `datos_personales` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
