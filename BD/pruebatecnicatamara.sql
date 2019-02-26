-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-02-2019 a las 15:19:14
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebatecnicatamara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL,
  `Fecha_registro` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `password`, `Fecha_registro`) VALUES
(1, 'admin@admin.jkt', 'clave', '2019-02-25'),
(2, 'admin2@admin.jkt', 'clave', '2019-02-25'),
(3, 'tamara@tamara.com', 'tamara', '2019-02-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `admin_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_codigo` (`codigo`),
  UNIQUE KEY `uq_nombre` (`nombre`),
  KEY `fk_categoria_admin` (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `codigo`, `nombre`, `descripcion`, `activo`, `admin_id`) VALUES
(1, '1pd1', 'categoriay', 'Este es el p5656', 1, 1),
(2, '2pd2', 'categotiaa', 'Este es el 2', 0, 2),
(4, '3ct3', 'Categoria3', 'Esta es la categoria 3', 1, 3),
(7, 'yuuyuy', 'yuuyuyuyuyuy', 'uyuyuyuyuy', 1, 3),
(8, '34gfh', 'Categoria4', 'Otra categoria', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `categoria_id` int(10) NOT NULL,
  `precio` float(20,2) NOT NULL,
  `admin_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_codigo` (`codigo`),
  UNIQUE KEY `uq_nombre` (`nombre`),
  KEY `fk_producto_categoria` (`categoria_id`),
  KEY `fk_producto_admin` (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `codigo`, `nombre`, `descripcion`, `marca`, `categoria_id`, `precio`, `admin_id`) VALUES
(13, '5665', '56656', '56565656788', '56563', 1, 34.00, 3),
(19, '53434', '454523gfg', '4545vby 655656', 'gh45', 1, 67677.00, 3),
(20, '54d3', 'productozz', 'Este es otro producto', 'ProductoT', 1, 2333.00, 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_categoria_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
