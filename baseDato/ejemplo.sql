-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2020 a las 19:09:47
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejemplo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analitico`
--

CREATE TABLE `analitico` (
  `idAnalitico` int(11) NOT NULL,
  `idPlan` text NOT NULL,
  `idAsig` text NOT NULL,
  `idAlumno` text NOT NULL,
  `nota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `analitico`
--

INSERT INTO `analitico` (`idAnalitico`, `idPlan`, `idAsig`, `idAlumno`, `nota`) VALUES
(47, '23', '45', '36', ''),
(48, '23', '49', '36', ''),
(49, '23', '50', '36', ''),
(50, '23', '52', '36', ''),
(51, '23', '53', '36', ''),
(53, '23', '45', '21', ''),
(54, '23', '49', '21', ''),
(55, '23', '50', '21', ''),
(56, '23', '52', '21', ''),
(57, '23', '53', '21', ''),
(59, '23', '45', '20', '1'),
(60, '23', '49', '20', '2'),
(61, '23', '50', '20', '3'),
(62, '23', '52', '20', '4'),
(63, '23', '53', '20', '5'),
(65, '23', '45', '17', ''),
(66, '23', '49', '17', ''),
(67, '23', '50', '17', ''),
(68, '23', '52', '17', ''),
(69, '23', '53', '17', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `circular`
--

CREATE TABLE `circular` (
  `id_circular` int(11) NOT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `circular`
--

INSERT INTO `circular` (`id_circular`, `numero`, `url`, `type`) VALUES
(43, '2', '2_Acta VOLANTE PROFE Gerometta- Conexion.pdf', 'pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `idPlan` text NOT NULL,
  `ciclo` text NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `idPlan`, `ciclo`, `nombre`) VALUES
(3, '25', '1° AÑO (1° AÑO B.C.)', '1ro 3da'),
(6, '23', '1° AÑO (1° AÑO B.C.)', '2do 1ra'),
(7, '25', '1° AÑO (1° AÑO B.C.)', '1ro 3da'),
(13, '23', '1° AÑO (1° AÑO B.C.)', '2do 1ra'),
(14, '23', '4° AÑO (2° AÑO S.C.)', '4ro 1da'),
(15, '25', '6° AÑO (4° AÑO S.C.)', '4ro 1da'),
(16, '23', '3° AÑO (1° AÑO S.C.)', '3RO 1RA'),
(17, '23', '2° AÑO (2° AÑO B.C.)', '2do 1ra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosalumnos`
--

CREATE TABLE `datosalumnos` (
  `idAlumnos` int(11) NOT NULL,
  `nombreAlumnos` text DEFAULT NULL,
  `dniAlumnos` text DEFAULT NULL,
  `cuilAlumnos` text DEFAULT NULL,
  `domicilioAlumnos` text DEFAULT NULL,
  `emailAlumnos` text DEFAULT NULL,
  `telefonoAlumnos` text DEFAULT NULL,
  `discapasidadAlumnos` text DEFAULT NULL,
  `nombreTutor` text NOT NULL,
  `dniTutor` text NOT NULL,
  `TelefonoTutor` text NOT NULL,
  `idPlanEstudio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datosalumnos`
--

INSERT INTO `datosalumnos` (`idAlumnos`, `nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor`, `idPlanEstudio`) VALUES
(17, 'Gerometta Kiewczun, Mathias', '32729125', '20327291255', 'Padre Cerqueira 685', 'geromettamatias@gmail.com', '03624653591', 'nada', 'Edgar Antoño Gerometta', '325225545', '03624653595', '23'),
(20, 'Sosa Mathias', '2', '3', 'Padre Cerqueira 685', 'epgs2sistema@gmail.com', '03624653591', 'Nada', 'Edgar Gerometta', '32251245', '03624653591', '23'),
(21, 'Abiga', '4', '5', 'Padre Cerqueira 685', 'geromettamatias@gmail.com', '03624653591', 'Nada', '--', '--', '--', '23'),
(36, '33333', '333', '3', '3', '3', '3', '3', '3', '3', '3', '23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_docentes`
--

CREATE TABLE `datos_docentes` (
  `idDocente` int(11) NOT NULL,
  `dni` text NOT NULL,
  `nombre` text NOT NULL,
  `domicilio` text NOT NULL,
  `email` text NOT NULL,
  `telefono` text NOT NULL,
  `titulo` text NOT NULL,
  `nregistro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_docentes`
--

INSERT INTO `datos_docentes` (`idDocente`, `dni`, `nombre`, `domicilio`, `email`, `telefono`, `titulo`, `nregistro`) VALUES
(1, '1', 'Sosa Maria', 'Padre Cerqueira 685ttt', 'sosaluz@gmail.comttt', '03624653591ttt', 'Profesor de Informaticattt', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscrip_curso_alumno`
--

CREATE TABLE `inscrip_curso_alumno` (
  `idIns` int(11) NOT NULL,
  `idCurso` text NOT NULL,
  `idAlumno` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscrip_curso_alumno`
--

INSERT INTO `inscrip_curso_alumno` (`idIns`, `idCurso`, `idAlumno`) VALUES
(470, '6', '17'),
(473, '6', '20'),
(474, '6', '21'),
(475, '6', '36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_datos`
--

CREATE TABLE `institucion_datos` (
  `idInstitucion` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `cue` text NOT NULL,
  `domicilio` text NOT NULL,
  `tel` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `institucion_datos`
--

INSERT INTO `institucion_datos` (`idInstitucion`, `nombre`, `cue`, `domicilio`, `tel`, `email`) VALUES
(34, 'EET', 'W', 'D', 'D', 'D'),
(35, 'EET 16', 'dsa', 'dsa', 'dsa', 'dsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libreta_digital`
--

CREATE TABLE `libreta_digital` (
  `id_libreta` int(11) NOT NULL,
  `idIns` text NOT NULL,
  `idAsig` text NOT NULL,
  `nota1` text NOT NULL,
  `nota2` text NOT NULL,
  `nota3` text NOT NULL,
  `integrador` text NOT NULL,
  `diciembre` text NOT NULL,
  `marzo` text NOT NULL,
  `nota_final` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libreta_digital`
--

INSERT INTO `libreta_digital` (`id_libreta`, `idIns`, `idAsig`, `nota1`, `nota2`, `nota3`, `integrador`, `diciembre`, `marzo`, `nota_final`) VALUES
(470, '470', '45', '66', '366', '466', '566', '666', '76', '866'),
(471, '470', '49', '', '', '', '', '', '', ''),
(472, '470', '52', '', '', '', '', '', '', ''),
(481, '473', '45', '', '', '', '', '', '', ''),
(482, '473', '49', '', '', '', '', '', '', ''),
(483, '473', '52', '', '', '', '', '', '', ''),
(484, '474', '45', '', '', '', '', '', '', ''),
(485, '474', '49', '', '', '', '', '', '', ''),
(486, '474', '52', '', '', '', '', '', '', ''),
(487, '475', '45', '', '', '', '', '', '', ''),
(488, '475', '49', '', '', '', '', '', '', ''),
(489, '475', '52', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `id_usuario` text NOT NULL,
  `fecha` text NOT NULL,
  `mensaje` text NOT NULL,
  `datos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajesdocente`
--

CREATE TABLE `mensajesdocente` (
  `id_mensaje` int(11) NOT NULL,
  `id_usuario` text NOT NULL,
  `usuarioDocente` text NOT NULL,
  `fecha` text NOT NULL,
  `mensaje` text NOT NULL,
  `datos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajesdocente`
--

INSERT INTO `mensajesdocente` (`id_mensaje`, `id_usuario`, `usuarioDocente`, `fecha`, `mensaje`, `datos`) VALUES
(4, '20', '1', '30/11/2020', 'ddddeee11111111', '111111dddddd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_admin`
--

CREATE TABLE `mensajes_admin` (
  `id_mensaje` int(11) NOT NULL,
  `id_usuario` text NOT NULL,
  `fecha` text NOT NULL,
  `mensaje` text NOT NULL,
  `datos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes_admin`
--

INSERT INTO `mensajes_admin` (`id_mensaje`, `id_usuario`, `fecha`, `mensaje`, `datos`) VALUES
(10, '1', '1/12/2020', '22222222', '15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_datos`
--

CREATE TABLE `plan_datos` (
  `idPlan` int(11) NOT NULL,
  `idInstitucion` text NOT NULL,
  `nombre` text NOT NULL,
  `numero` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plan_datos`
--

INSERT INTO `plan_datos` (`idPlan`, `idInstitucion`, `nombre`, `numero`) VALUES
(23, '34', 'Informatica', '854/16'),
(25, '34', 'Electromecanica', '487/16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_datos_asignaturas`
--

CREATE TABLE `plan_datos_asignaturas` (
  `idAsig` int(11) NOT NULL,
  `idPlan` text NOT NULL,
  `nombre` text NOT NULL,
  `ciclo` text NOT NULL,
  `idDocente` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plan_datos_asignaturas`
--

INSERT INTO `plan_datos_asignaturas` (`idAsig`, `idPlan`, `nombre`, `ciclo`, `idDocente`) VALUES
(45, '23', 'Matematicas I', '1° AÑO (1° AÑO B.C.)', '1'),
(48, '25', 'Historia', '1° AÑO (1° AÑO B.C.)', '1'),
(49, '23', 'lengua', '1° AÑO (1° AÑO B.C.)', '1'),
(50, '23', 'Matematicas II', '2° AÑO (2° AÑO B.C.)', '1'),
(52, '23', 'Lopes', '1° AÑO (1° AÑO B.C.)', '1'),
(53, '23', 'Matematicas III', '3° AÑO (1° AÑO S.C.)', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_administrador`
--

CREATE TABLE `usuario_administrador` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_administrador`
--

INSERT INTO `usuario_administrador` (`id`, `usuario`, `password`) VALUES
(1, 'admin', 'MQ==');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analitico`
--
ALTER TABLE `analitico`
  ADD PRIMARY KEY (`idAnalitico`);

--
-- Indices de la tabla `circular`
--
ALTER TABLE `circular`
  ADD PRIMARY KEY (`id_circular`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indices de la tabla `datosalumnos`
--
ALTER TABLE `datosalumnos`
  ADD PRIMARY KEY (`idAlumnos`);

--
-- Indices de la tabla `datos_docentes`
--
ALTER TABLE `datos_docentes`
  ADD PRIMARY KEY (`idDocente`);

--
-- Indices de la tabla `inscrip_curso_alumno`
--
ALTER TABLE `inscrip_curso_alumno`
  ADD PRIMARY KEY (`idIns`);

--
-- Indices de la tabla `institucion_datos`
--
ALTER TABLE `institucion_datos`
  ADD PRIMARY KEY (`idInstitucion`);

--
-- Indices de la tabla `libreta_digital`
--
ALTER TABLE `libreta_digital`
  ADD PRIMARY KEY (`id_libreta`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `mensajesdocente`
--
ALTER TABLE `mensajesdocente`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `mensajes_admin`
--
ALTER TABLE `mensajes_admin`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plan_datos`
--
ALTER TABLE `plan_datos`
  ADD PRIMARY KEY (`idPlan`);

--
-- Indices de la tabla `plan_datos_asignaturas`
--
ALTER TABLE `plan_datos_asignaturas`
  ADD PRIMARY KEY (`idAsig`);

--
-- Indices de la tabla `usuario_administrador`
--
ALTER TABLE `usuario_administrador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analitico`
--
ALTER TABLE `analitico`
  MODIFY `idAnalitico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `circular`
--
ALTER TABLE `circular`
  MODIFY `id_circular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `datosalumnos`
--
ALTER TABLE `datosalumnos`
  MODIFY `idAlumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `datos_docentes`
--
ALTER TABLE `datos_docentes`
  MODIFY `idDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inscrip_curso_alumno`
--
ALTER TABLE `inscrip_curso_alumno`
  MODIFY `idIns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=476;

--
-- AUTO_INCREMENT de la tabla `institucion_datos`
--
ALTER TABLE `institucion_datos`
  MODIFY `idInstitucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `libreta_digital`
--
ALTER TABLE `libreta_digital`
  MODIFY `id_libreta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `mensajesdocente`
--
ALTER TABLE `mensajesdocente`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mensajes_admin`
--
ALTER TABLE `mensajes_admin`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plan_datos`
--
ALTER TABLE `plan_datos`
  MODIFY `idPlan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `plan_datos_asignaturas`
--
ALTER TABLE `plan_datos_asignaturas`
  MODIFY `idAsig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `usuario_administrador`
--
ALTER TABLE `usuario_administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
