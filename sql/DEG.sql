-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para dev_desayunosgourmet
CREATE DATABASE IF NOT EXISTS `dev_desayunosgourmet` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dev_desayunosgourmet`;

-- Volcando estructura para tabla dev_desayunosgourmet.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dev_desayunosgourmet.categorias: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nombre`) VALUES
	(1, 'Para Ellas'),
	(2, 'Para Él'),
	(3, 'Cumpleaños'),
	(4, 'Nacimientos'),
	(5, 'Día del Padre'),
	(6, 'Día de la Madre'),
	(7, 'San Valentin'),
	(8, 'Arma tu Pedido'),
	(9, 'Promociones');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla dev_desayunosgourmet.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagen` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  `detalle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dev_desayunosgourmet.producto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id`, `nombre`, `precio`, `stock`, `fecha_creacion`, `imagen`, `categoria`, `detalle`) VALUES
	(4, 'Saludable', 8000, 10, '2019-03-08 10:50:28', '3.jpg', 9, '- Yogur\n- Leche\n- Granola\n- Frutas\n- Jugo'),
	(6, 'media luna', 1212, 12, '2019-03-14 01:22:44', 'cart3.jpg', 1, 'asad'),
	(7, 'donnut', 1, 1, '2019-03-14 01:23:11', 'cart2.jpg', 5, '1'),
	(8, 'sebastian', 200000, 12, '2019-03-16 20:56:45', '8.jpg', 1, 'asdasdasd');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla dev_desayunosgourmet.transacciones
CREATE TABLE IF NOT EXISTS `transacciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaccion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_productos` int(11) NOT NULL,
  `monto_compra` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `correo_usuario` varchar(255) NOT NULL,
  `medio_pago` varchar(255) NOT NULL,
  `fecha_transaccion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dev_desayunosgourmet.transacciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `transacciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `transacciones` ENABLE KEYS */;

-- Volcando estructura para tabla dev_desayunosgourmet.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `clave` varchar(1000) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dev_desayunosgourmet.usuario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nombre`, `clave`, `fecha_registro`) VALUES
	(1, 'admin', 'admin2019', '2019-03-02 17:08:49');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
