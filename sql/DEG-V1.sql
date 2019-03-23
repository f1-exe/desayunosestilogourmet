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

-- Volcando datos para la tabla dev_desayunosgourmet.categorias: ~8 rows (aproximadamente)
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

-- Volcando estructura para tabla dev_desayunosgourmet.comercio_transacciones
CREATE TABLE IF NOT EXISTS `comercio_transacciones` (
  `id` int(11) NOT NULL,
  `orden_compra` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `id_comuna_delivery` int(11) NOT NULL,
  `fecha_delivery` date NOT NULL,
  `monto_compra` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `correo_usuario` varchar(255) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `fecha_transaccion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dev_desayunosgourmet.comercio_transacciones: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `comercio_transacciones` DISABLE KEYS */;
INSERT INTO `comercio_transacciones` (`id`, `orden_compra`, `estado`, `direccion`, `id_comuna_delivery`, `fecha_delivery`, `monto_compra`, `nombre_usuario`, `correo_usuario`, `mensaje`, `fecha_transaccion`) VALUES
	(1, 'DEG-1', 99, '1', 1, '2019-03-29', 20000, 'miguel marquez', 'mikemreyes.mm@gmail.com', 'mensaje test', '2019-03-22 23:12:26'),
	(2, 'DEG-2', 99, '1', 1, '2019-03-28', 20000, 'miguel marquez', 'mikemreyes.mm@gmail.com', 'mensaje test', '2019-03-22 23:15:51'),
	(3, 'DEG-3', 0, '1', 1, '2019-03-27', 20000, 'miguel marquez', 'no.efects@hotmail.com', 'mensaje test', '2019-03-22 23:17:52'),
	(4, 'DEG-4', 0, '1', 18, '2019-03-28', 20000, 'asd', 'asddddd', 'mensaje test', '2019-03-22 23:19:55'),
	(5, 'DEG-5', 0, '1', 34, '2019-03-28', 20000, 'asdasd', 'asddddd', 'mensaje test', '2019-03-22 23:21:33'),
	(6, 'DEG-6', 0, '1', 2, '2019-03-29', 20000, 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'mensaje test', '2019-03-22 23:23:27'),
	(7, 'DEG-7', 0, '1', 3, '2019-03-29', 20000, 'avvvvvvvvvvvvv', 'qqqqqqqqqqqqqqqqqq', 'mensaje test', '2019-03-22 23:25:21'),
	(8, 'DEG-8', 99, '1', 1, '2019-03-29', 20000, 'q111', '222', 'mensaje test', '2019-03-22 23:31:31'),
	(9, 'DEG-9', 0, '1', 1, '2019-03-28', 20000, '123', 'fd3f33f', 'mensaje test', '2019-03-22 23:34:25'),
	(10, 'DEG-10', 99, '1', 3, '2019-03-26', 20000, 'gggg', '4444', 'mensaje test', '2019-03-22 23:36:47'),
	(11, 'DEG-11', 0, '1', 1, '2019-03-26', 20000, 'miguel marquez', 'mikemreyes.mm@gmail.com', 'mensaje test', '2019-03-23 00:49:30'),
	(12, 'DEG-12', 0, '1', 3, '2019-03-26', 20000, 'miguel marquez', 'hola@hola.cl', 'mensaje test', '2019-03-23 00:51:51'),
	(13, 'DEG-13', 0, '1', 1, '2019-03-27', 20000, 'sebastian vasquez', 'svasquez.music@gmail.com', 'mensaje test', '2019-03-23 00:53:09'),
	(14, 'DEG-14', 0, '1', 4, '2019-03-28', 20000, 'maria juana pincheirea', 'mjp@gmail.com', 'mensaje test', '2019-03-23 00:54:49'),
	(15, 'DEG-15', 0, '1', 1, '2019-03-28', 20000, 'roberto manfinfla', 'rm@gmail.com', 'mensaje test', '2019-03-23 00:57:52'),
	(16, 'DEG-16', 0, '1', 3, '2019-03-28', 20000, 'miguel marquez ', 'mikemreyes.mm@gmail.com', 'bla bla', '2019-03-23 03:20:40'),
	(17, 'DEG-17', 99, '1', 4, '2019-03-30', 20000, 'miguel marquez', 'mikemreyes.mm@gmail.com', 'asdasdasd', '2019-03-23 03:23:25'),
	(18, 'DEG-18', 0, '1', 3, '2019-03-31', 20000, 'miguel marquez', 'mike@gmail.com', 'asdasda sd', '2019-03-23 03:23:46'),
	(19, 'DEG-19', -3, '1', 1, '2019-03-29', 20000, 'maria julia hernandez', 'maria_julia@gmail.com', 'asd asd asd ', '2019-03-23 03:26:57');
/*!40000 ALTER TABLE `comercio_transacciones` ENABLE KEYS */;

-- Volcando estructura para tabla dev_desayunosgourmet.comunas
CREATE TABLE IF NOT EXISTS `comunas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dev_desayunosgourmet.comunas: ~34 rows (aproximadamente)
/*!40000 ALTER TABLE `comunas` DISABLE KEYS */;
INSERT INTO `comunas` (`id`, `nombre`, `valor`) VALUES
	(1, 'Estación Central', 5000),
	(2, 'Huechuraba', 5000),
	(3, 'Independencia', 5000),
	(4, 'La Cisterna', 5000),
	(5, 'La Florida', 5000),
	(6, 'La Granja', 5000),
	(7, 'La Reina', 5000),
	(8, 'Las Condes', 5000),
	(9, 'Lo Barnechea', 5000),
	(10, 'Lo Espejo', 5000),
	(11, 'Lo Prado', 5000),
	(12, 'Macul', 5000),
	(13, 'Maipú', 5000),
	(14, 'Nuñoa', 5000),
	(15, 'Padre Hurtado', 5000),
	(16, 'Pedro aguirre cerda', 5000),
	(17, 'Peñalolen', 5000),
	(18, 'Providencia', 5000),
	(19, 'Pudahuel', 5000),
	(20, 'Puente Alto', 5000),
	(21, 'Quilicura', 5000),
	(22, 'Quinta Normal', 5000),
	(23, 'Recoleta', 5000),
	(24, 'Renca', 5000),
	(25, 'San Bernardo', 5000),
	(26, 'San Joaquin', 5000),
	(27, 'San Miguel', 5000),
	(28, 'San Ramon', 5000),
	(29, 'Santiago', 5000),
	(30, 'Vitacura', 5000),
	(31, 'Buin', 5000),
	(32, 'Calera de Tango', 5000),
	(33, 'Cerrillos', 5000),
	(34, 'Cerro Navia', 5000);
/*!40000 ALTER TABLE `comunas` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dev_desayunosgourmet.producto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id`, `nombre`, `precio`, `stock`, `fecha_creacion`, `imagen`, `categoria`, `detalle`) VALUES
	(4, 'Saludable', 8000, 10, '2019-03-08 10:50:28', 'cart3.jpg', 9, '- Yogur\n- Leche\n- Granola\n- Frutas\n- Jugo\n- Paso\n- Caca\n- Pichi\n- Poto\n- Teta\n- Pico\n- Coco'),
	(6, 'media luna', 1212, 12, '2019-03-14 01:22:44', 'cart3.jpg', 1, 'asad'),
	(7, 'donnut', 1, 1, '2019-03-14 01:23:11', 'cart2.jpg', 5, '1'),
	(8, 'sebastian', 200000, 12, '2019-03-16 20:56:45', '8.jpg', 1, 'asdasdasd'),
	(9, 'canasta', 25000, 3, '2019-03-22 22:49:21', '5.jpg', 4, '- Muchas cosas lindas para los bebes');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla dev_desayunosgourmet.productos_compras
CREATE TABLE IF NOT EXISTS `productos_compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orden_compra` varchar(50) NOT NULL DEFAULT '0',
  `id_producto` int(11) NOT NULL DEFAULT '0',
  `cantidad_producto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dev_desayunosgourmet.productos_compras: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productos_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos_compras` ENABLE KEYS */;

-- Volcando estructura para tabla dev_desayunosgourmet.tbk_transacciones
CREATE TABLE IF NOT EXISTS `tbk_transacciones` (
  `id` int(11) NOT NULL,
  `orden_compra` varchar(255) NOT NULL,
  `tbk_token_transaccion` varchar(255) NOT NULL,
  `codigo_tipo_pago` varchar(255) NOT NULL,
  `numero_tarjeta` varchar(255) NOT NULL,
  `fecha_expiracion_tarjeta` varchar(255) NOT NULL,
  `tbk_codigo_autorizacion` int(11) NOT NULL,
  `tbk_codigo_transaccion` int(11) NOT NULL,
  `codigo_comercio` int(11) NOT NULL,
  `monto_compra` int(11) NOT NULL,
  `tbk_url_retorno` varchar(255) NOT NULL,
  `tbk_vci` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dev_desayunosgourmet.tbk_transacciones: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `tbk_transacciones` DISABLE KEYS */;
INSERT INTO `tbk_transacciones` (`id`, `orden_compra`, `tbk_token_transaccion`, `codigo_tipo_pago`, `numero_tarjeta`, `fecha_expiracion_tarjeta`, `tbk_codigo_autorizacion`, `tbk_codigo_transaccion`, `codigo_comercio`, `monto_compra`, `tbk_url_retorno`, `tbk_vci`, `fecha_registro`) VALUES
	(1, 'DEG-1', 'eae25a78f1f927dd023ea055437a7ba56251d1f9d93c417957258786e58cd4fa', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-22 20:12:27'),
	(2, 'DEG-2', 'e169e60c942cd7cc9c643bc1d48bf0132275e81b60bfbd63f73c1cb742b5785b', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-22 20:15:52'),
	(3, 'DEG-3', 'e4d2fb425bfd50a217c6b6cdc61034c42a80eea764bad8e4f95fe0bf23bd0eb9', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-22 20:17:52'),
	(4, 'DEG-4', 'e28c5fa0a244ba479c1c8984eec47bd7ed62001ca1cae9d700e9030fd639372d', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-22 20:19:56'),
	(5, 'DEG-5', 'efbf85b03df0ac70c63ff09cc08754b26d3ec66372b2a2e4694cb579c56775cb', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-22 20:21:34'),
	(6, 'DEG-6', 'e6817aac255c945b7dbbf95fe527dec98491b1d9f78df0764de7496da3f28ac1', 'VD', '1', '', 159483, 0, 2147483647, 20000, 'https://localhost/Proyectos/desayunosestilogourmet/boucher_final.php', 'TSY', '2019-03-22 20:23:28'),
	(7, 'DEG-7', 'e8121c28b36b605987fa5734ed915f01fcf23ba91bd80c5e70518a47b25cdc20', 'VD', '1', '', 253113, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-22 20:25:21'),
	(8, 'DEG-8', 'ed1c3889e237240cfacb67cf078a722e23417014ec7b2702f259cec53bdff083', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-22 20:31:32'),
	(9, 'DEG-9', 'e350102b8ac6a44ab2d778122371c1b850a27479c7f9c4884bb9567bdf01a24f', 'VD', '6623', '', 1213, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-22 20:34:26'),
	(10, 'DEG-10', 'e001df7a2db5aa4e8bb27d4c9fcaff964301deed85f04d7a38037dc1df96cada', 'SI', '0568', '', 0, -3, 2147483647, 20000, 'https://localhost/Proyectos/desayunosestilogourmet/boucher_final.php', 'TSY', '2019-03-22 20:36:47'),
	(11, 'DEG-11', 'e095706267f720cd12a4e7668be651a9a889b52d1abf6ab27025c0d646751a17', 'VD', '1', '', 186564, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-22 21:49:30'),
	(12, 'DEG-12', 'e3642d994d02041042342117153f44489cc312e25b56c16cc2c8552578e34205', 'VD', '1', '', 179755, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-22 21:51:51'),
	(13, 'DEG-13', 'e290eb970bd7bdb24a62c0844a8ee7fff3354bd384a44cca7daa74ed61798ef7', 'VD', '1', '', 167784, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-22 21:53:10'),
	(14, 'DEG-14', 'e0404f7ae1392b7cc2a8324f7450d9ec6637accababf040bee57d606a9d69be9', 'S2', '6623', '', 1213, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-22 21:54:50'),
	(15, 'DEG-15', 'ebb0a28183172696f769efd4b5363663da7595a3ff1310d244dd57f42d3ba918', 'SI', '6623', '', 1213, 0, 2147483647, 20000, 'https://localhost/Proyectos/desayunosestilogourmet/boucher_final.php', 'TSY', '2019-03-22 21:57:52'),
	(16, 'DEG-16', 'ed434bc8d42448e2928143edf89a9e893426bf67bb89481247e2a445bbc39ffb', 'VD', '1', '', 115325, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-23 00:18:26'),
	(17, 'DEG-16', 'ec9aed56c5c65ac04bcd976b7788af3e0692367f4f95fa4e88ef9731efa51ed0', 'VD', '1', '', 115325, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-23 00:20:41'),
	(18, 'DEG-17', 'e7659ddfb16367a81d495a3f891cbff8534be7108b4aac46f1c40b5ae014e50d', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-23 00:23:26'),
	(19, 'DEG-18', 'e74a13fbb8227622604dae6366209801cb94ed424bf878f0f56d643996bb930d', 'VD', '1', '', 113050, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-23 00:23:46'),
	(20, 'DEG-19', 'e42719ed94210c4848f8cf023ec790ff04be5f93b20cb3b6574ad937f77bb226', 'S2', '0568', '', 0, -3, 2147483647, 20000, 'https://localhost/Proyectos/desayunosestilogourmet/boucher_final.php', 'TSY', '2019-03-23 00:26:58');
/*!40000 ALTER TABLE `tbk_transacciones` ENABLE KEYS */;

-- Volcando estructura para tabla dev_desayunosgourmet.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `clave` varchar(1000) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dev_desayunosgourmet.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nombre`, `clave`, `fecha_registro`) VALUES
	(1, 'admin', 'admin2019', '2019-03-02 17:08:49');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
