-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.20-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para boutique
CREATE DATABASE IF NOT EXISTS `boutique` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `boutique`;

-- Volcando estructura para tabla boutique.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla boutique.clientes: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `telefono`, `email`) VALUES
	(1abarroterauniversitaria1, 'Jesus', 'Garcia', '9194253232', 'asd@das'),
	(12, 'Deysi', 'Gomez', '1231231231', 'asd@das'),
	(13, 'Adrian', 'Morales', '+529191427', 'morach117@gmail.com'),
	(15, 'joahan', 'nosex2', '123213', 'asda@asdasd');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla boutique.detalleventas
CREATE TABLE IF NOT EXISTS `detalleventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProd` int(5) NOT NULL,
  `idVenta` int(5) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` double NOT NULL,
  `subTotal` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkIdProd` (`idProd`),
  KEY `kfIdVenta` (`idVenta`),
  CONSTRAINT `idProd` FOREIGN KEY (`idProd`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idVenta` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla boutique.detalleventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalleventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleventas` ENABLE KEYS */;

-- Volcando estructura para tabla boutique.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla boutique.empleados: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `direccion`, `telefono`, `email`) VALUES
	(2, 'jesus', 'perez', 'el centro', '9191447788', 'asdad@adasd'),
	(3, 'pedro', 'lopez', 'centro', '9194115555', 'asda@asdasd');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;

-- Volcando estructura para tabla boutique.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `precioCompra` varchar(10) DEFAULT NULL,
  `precioVenta` varchar(10) DEFAULT NULL,
  `categoria` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `existencia` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla boutique.productos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `nombre`, `precioCompra`, `precioVenta`, `categoria`, `existencia`) VALUES
	(2, 'asdasd', '10.00', '10.000', 'pantalones', '12');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla boutique.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla boutique.proveedores: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` (`id`, `empresa`, `direccion`, `cp`, `telefono`, `email`) VALUES
	(6, 'oggi', 'no se', '29959', '2131231', 'adasd'),
	(7, 'Polo', 'centro', '29950', '9194223333', 'nose@gmail.com');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;

-- Volcando estructura para tabla boutique.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla boutique.usuarios: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `nombre`) VALUES
	(6, 'adrian', '827ccb0eea8a706c4c34a16891f84e7b', '12345'),
	(7, 'deysi', '827ccb0eea8a706c4c34a16891f84e7b', 'deysi'),
	(8, 'jesus', '827ccb0eea8a706c4c34a16891f84e7b', 'jesus'),
	(10, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
	(11, 'a', '12345', 'oko');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla boutique.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCli` int(5) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkIdCli` (`idCli`),
  CONSTRAINT `idCli` FOREIGN KEY (`idCli`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla boutique.ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
boutique