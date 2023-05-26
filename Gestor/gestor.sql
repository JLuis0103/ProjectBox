-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2023 a las 09:08:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `idequipo` int(11) NOT NULL,
  `nombreequipo` varchar(50) NOT NULL,
  `lider` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`idequipo`, `nombreequipo`, `lider`) VALUES
(3, 'Equipo Ingeniería de Software', '3'),
(5, 'Taller de Investigacion', '7'),
(7, 'Equipo Programación Web', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `idmiembro` int(11) NOT NULL,
  `idequipo` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`idmiembro`, `idequipo`, `idusuario`) VALUES
(1, 3, 5),
(2, 3, 7),
(7, 5, 3),
(8, 5, 4),
(9, 5, 5),
(10, 5, 6),
(15, 7, 4),
(16, 7, 5),
(17, 7, 6),
(18, 7, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `idproyecto` int(11) NOT NULL,
  `nombreproyecto` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `url` varchar(200) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `lider` int(11) NOT NULL,
  `equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`idproyecto`, `nombreproyecto`, `descripcion`, `url`, `fechainicio`, `fechafin`, `lider`, `equipo`) VALUES
(1, 'Sabor y Aroma', 'Este es un proyecto para la materia de ingeniería de software sobre una aplicación web para la gestión de una tienda de pan y productos de cafetería.', 'https://foodandtravel.mx/wp-content/uploads/2020/06/Panes-mexicanos-Por.jpg', '2023-03-06', '2023-05-19', 3, 3),
(2, 'ProjectBox', 'Proyecto realizado para la materia de programación web, donde se trata de llevar a cabo el desarrollo de una plataforma de gestión de proyectos.', 'https://th.bing.com/th/id/OIP.KrN8xi7S3Hw16w9wx9kMRgHaFX?pid=ImgDet&rs=1', '2023-04-20', '2023-06-02', 3, 7),
(3, 'QR Lab', 'Trabajo de investigación enfocado en la resolución de la problemática existente al momento de querer acceder el laboratorio de cómputo del Instituto Tecnológico de Orizaba.', 'https://th.bing.com/th/id/OIP.I7A0SV_KAOfkJ-NKtnrr5gHaFj?pid=ImgDet&rs=1', '2023-03-10', '2023-06-02', 7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `idtarea` int(11) NOT NULL,
  `nombretarea` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `archivo` text DEFAULT NULL,
  `completada` int(11) DEFAULT 0,
  `idproyecto` int(11) NOT NULL,
  `idmiembro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`idtarea`, `nombretarea`, `descripcion`, `archivo`, `completada`, `idproyecto`, `idmiembro`) VALUES
(1, 'Agenda PHP', 'Continuar con el código visto en clase y adaptarlo para utilizar una estructura basada en clases y darle un diseño propio.', NULL, 0, 2, 16),
(2, 'Ejemplo', 'Ejemplo a borrar', NULL, 0, 2, 15),
(3, 'Prototipo', 'Hacer el prototipo en base a lo trabajado con la investigación en clase, implementar la creación de QRs mediante PHP y documentar el procesos.', NULL, 0, 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tipousuario` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `apellidop`, `apellidom`, `usuario`, `contrasena`, `correo`, `tipousuario`) VALUES
(1, 'Jose Luis', 'Ramirez', 'Alfonso', 'jose.luis', 'Password1.', 'joseluisramirez@gmail.com', 0),
(3, 'Jose Luis', 'Ramirez', 'Alfonso', 'wicho', 'Password1.', 'joseluis@gmail.com', 0),
(4, 'Xochitl', 'Macuixtle', 'Hernández', 'xo.hernadez', 'Password1.', 'xochitl@gmail.com', 0),
(5, 'Zurely', 'Mendoza', 'Vázquez', 'zurely123', 'Password1.', 'zurely@gmail.com', 0),
(6, 'José Jair', 'Borbonio', 'Gonzales', 'borbi', 'Password1.', 'borbonio@gmail.com', 0),
(7, 'Israel', 'Hernández', 'Santiago', 'isra.h', 'Password1.', 'israel@gmail.com', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`idequipo`),
  ADD KEY `lider` (`lider`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`idmiembro`),
  ADD KEY `idequipo` (`idequipo`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`idproyecto`),
  ADD KEY `lider` (`lider`),
  ADD KEY `equipo` (`equipo`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`idtarea`),
  ADD KEY `idproyecto` (`idproyecto`),
  ADD KEY `idusuario` (`idmiembro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `idequipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `idmiembro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `idproyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `idtarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
