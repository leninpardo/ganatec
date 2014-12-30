/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : ganatec

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2014-12-23 08:34:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `actividades`
-- ----------------------------
DROP TABLE IF EXISTS `actividades`;
CREATE TABLE `actividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_actividad` int(11) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `fecha_actividad` text,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `descripcion` text,
  `tipo` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `ganado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of actividades
-- ----------------------------
INSERT INTO `actividades` VALUES ('1', '1', '2.00', '90.00', '2014-12-24', '1', '2014-12-23 05:09:06', '2014-12-23 05:26:27', 'bbb', null, null, null);
INSERT INTO `actividades` VALUES ('2', '3', '2.00', '23.00', '2014-12-16', '1', '2014-12-23 05:16:46', '2014-12-23 05:26:10', 'kkks', null, null, null);
INSERT INTO `actividades` VALUES ('3', '2', '1.00', '60.00', '2014-12-23', '1', '2014-12-23 08:05:30', '2014-12-23 08:05:30', 'apliacion de vitaminas', '2', '61.00', '2');
INSERT INTO `actividades` VALUES ('4', '1', '2.00', '20.00', '12/23/2014', '1', '2014-12-23 13:22:30', '2014-12-23 13:22:30', 'aplicacion de anabolicos', '2', '22.00', '1');

-- ----------------------------
-- Table structure for `detalle_salidas`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_salidas`;
CREATE TABLE `detalle_salidas` (
  `id_ganado` int(11) DEFAULT NULL,
  `id_salida` int(11) DEFAULT NULL,
  `precio_venta` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `peso_salida` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detalle_salidas
-- ----------------------------
INSERT INTO `detalle_salidas` VALUES ('2', '1', '230', '2014-12-23 13:30:20', '2014-12-23 13:30:20', '900.00');

-- ----------------------------
-- Table structure for `entradas`
-- ----------------------------
DROP TABLE IF EXISTS `entradas`;
CREATE TABLE `entradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_ganado` text,
  `nombre_ganado` text,
  `fecha_ingreso` text,
  `procedencia` text,
  `idproveedor` int(11) DEFAULT NULL,
  `sexo` text,
  `edad` int(11) DEFAULT NULL,
  `idraza` int(11) DEFAULT NULL,
  `peso_ingreso` decimal(10,2) DEFAULT NULL,
  `precio_compra` decimal(10,2) DEFAULT NULL,
  `costo_transporte` decimal(10,2) DEFAULT NULL,
  `costo_vaquero` decimal(10,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `caracteristicas` text,
  `observaciones` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` text,
  PRIMARY KEY (`id`),
  KEY `fk_raza` (`idraza`),
  KEY `fk_proveedor` (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of entradas
-- ----------------------------
INSERT INTO `entradas` VALUES ('1', '0022', 'l', '2014-12-22', 'q', '1', 'Macho', '1', '1', '120.00', '500.00', '12.00', '30.00', '1', 'dddd', 'ffff', null, '2014-12-23 07:10:36', 'mm');
INSERT INTO `entradas` VALUES ('2', '01-234', 'rayco', '2014-12-23', 'moyobamba', '1', 'Hembra', '1', '10', '200.00', '800.00', '30.00', '30.00', '1', 'cuernudo', 'es ultra cernudo', '2014-12-23 06:49:54', '2014-12-23 07:10:00', 'negro');
INSERT INTO `entradas` VALUES ('3', '666', 'semental rayco', '12/16/2014', 'chiclayo', '1', 'Macho', '22', '9', '70.00', '1700.00', '30.00', '20.00', '1', 'semental ', 'mm', '2014-12-23 13:24:19', '2014-12-23 13:24:19', 'gris');

-- ----------------------------
-- Table structure for `modulos`
-- ----------------------------
DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpadre` int(10) unsigned NOT NULL,
  `descripcion` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `icono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modulos_idpadre_foreign` (`idpadre`),
  CONSTRAINT `modulos_idpadre_foreign` FOREIGN KEY (`idpadre`) REFERENCES `modulos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of modulos
-- ----------------------------
INSERT INTO `modulos` VALUES ('1', '1', 'Modulo Padre', '#', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `modulos` VALUES ('2', '1', 'Seguridad', '#', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'fa-lock');
INSERT INTO `modulos` VALUES ('3', '2', 'Modulos', 'modulos', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `modulos` VALUES ('4', '5', 'potreros', 'parcelas', '0', '0000-00-00 00:00:00', '2014-12-22 22:11:30', '');
INSERT INTO `modulos` VALUES ('5', '1', 'Actividades ganaderas', '#', '1', '0000-00-00 00:00:00', '2014-06-20 17:13:24', 'fa-book');
INSERT INTO `modulos` VALUES ('6', '1', 'Reportes', '#', '1', '0000-00-00 00:00:00', '2014-06-20 17:11:56', 'fa-list');
INSERT INTO `modulos` VALUES ('7', '6', 'Reporte Listado de ganado', 'reporte_lista_ganado', '1', '0000-00-00 00:00:00', '2014-12-23 07:51:46', '');
INSERT INTO `modulos` VALUES ('8', '2', 'Tipo Empleado', 'perfiles', '1', '0000-00-00 00:00:00', '2014-07-03 17:10:55', '');
INSERT INTO `modulos` VALUES ('9', '2', 'Empleado', 'empleados', '1', '2014-05-16 09:31:32', '2014-07-03 17:57:54', '');
INSERT INTO `modulos` VALUES ('10', '2', 'Permisos', 'permisos', '1', '2014-06-19 21:33:31', '2014-06-19 21:33:31', '');
INSERT INTO `modulos` VALUES ('11', '17', 'Razas', 'razas', '1', '2014-06-20 17:43:50', '2014-06-20 17:43:50', '');
INSERT INTO `modulos` VALUES ('12', '5', 'Lotes', 'lotes', '0', '2014-06-20 17:44:07', '2014-06-20 17:44:07', '');
INSERT INTO `modulos` VALUES ('13', '1', 'Produccion', '#', '0', '2014-07-03 05:29:11', '2014-07-03 23:21:15', 'fa-play');
INSERT INTO `modulos` VALUES ('14', '13', 'Producciones', 'producciones', '0', '2014-07-03 05:30:06', '2014-07-03 05:30:06', '');
INSERT INTO `modulos` VALUES ('15', '5', 'Tipo Actividades', 'sub_actividad', '1', '2014-07-03 17:01:43', '2014-07-03 17:02:39', '');
INSERT INTO `modulos` VALUES ('16', '5', 'Actividades', 'actividades', '1', '2014-07-03 17:09:13', '2014-07-03 17:09:13', '');
INSERT INTO `modulos` VALUES ('17', '1', 'Control Ganado', '#', '1', '2014-07-03 23:38:34', '2014-07-03 23:38:34', 'fa-stop');
INSERT INTO `modulos` VALUES ('18', '17', 'entradas de ganado', 'entradas', '1', '2014-07-03 23:39:46', '2014-12-22 22:09:17', '');
INSERT INTO `modulos` VALUES ('19', '5', 'Etapas', 'categorias', '0', '2014-07-03 23:50:54', '2014-07-06 16:42:20', '');
INSERT INTO `modulos` VALUES ('20', '5', 'linea de ganado', 'especies', '0', '2014-07-03 23:51:16', '2014-12-22 22:14:41', '');
INSERT INTO `modulos` VALUES ('21', '5', 'Etapas', 'etapas', '0', '2014-07-03 23:51:30', '2014-07-03 23:51:30', '');
INSERT INTO `modulos` VALUES ('22', '17', 'Estados', 'estados', '0', '2014-07-04 04:00:11', '2014-07-04 04:00:11', '');
INSERT INTO `modulos` VALUES ('23', '17', 'salidas', 'salidas', '1', '2014-07-04 05:32:42', '2014-12-22 22:56:29', '');
INSERT INTO `modulos` VALUES ('24', '17', 'proveedor', 'proveedor', '1', '2014-07-09 03:57:34', '2014-12-23 00:10:32', '');
INSERT INTO `modulos` VALUES ('25', '6', 'Reporte Listado de actividades', 'reporte_listado_actividades', '1', '2014-07-09 05:32:53', '2014-12-23 07:56:45', '');
INSERT INTO `modulos` VALUES ('26', '6', 'Reporte Salidas', 'reporte_listado_salidas', '1', '2014-07-09 05:47:40', '2014-12-23 07:52:38', '');
INSERT INTO `modulos` VALUES ('27', '6', 'Reporte Bajas por Fecha', 'reporte_bajas_fecha', '1', '2014-07-10 04:50:48', '2014-07-10 04:50:48', '');
INSERT INTO `modulos` VALUES ('28', '17', 'Control Materno', 'lactancias', '0', '2014-07-11 14:31:13', '2014-07-11 14:43:22', '');
INSERT INTO `modulos` VALUES ('29', '6', 'Reporte Animales por parir', 'reporte_animales_parir', '1', '2014-07-11 17:08:46', '2014-07-11 17:08:46', '');

-- ----------------------------
-- Table structure for `perfils`
-- ----------------------------
DROP TABLE IF EXISTS `perfils`;
CREATE TABLE `perfils` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of perfils
-- ----------------------------
INSERT INTO `perfils` VALUES ('1', 'Administrador', '1', '0000-00-00 00:00:00', '2014-06-19 05:08:09');
INSERT INTO `perfils` VALUES ('2', 'Vaquero', '1', '2014-05-15 23:19:58', '2014-12-23 06:09:00');
INSERT INTO `perfils` VALUES ('3', 'Veterinario', '1', '2014-05-15 23:23:07', '2014-12-23 06:08:52');
INSERT INTO `perfils` VALUES ('4', 'otro', '0', '2014-05-15 23:42:08', '2014-06-19 05:15:53');
INSERT INTO `perfils` VALUES ('5', 'nuevpoop', '0', '2014-05-16 12:15:57', '2014-06-19 05:15:51');
INSERT INTO `perfils` VALUES ('6', 'ultimo', '0', '2014-06-19 05:12:34', '2014-06-19 05:15:54');

-- ----------------------------
-- Table structure for `permisos`
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
  `idperfil` int(10) unsigned NOT NULL,
  `idmodulo` int(10) unsigned NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idperfil`,`idmodulo`),
  KEY `permisos_idperfil_foreign` (`idperfil`),
  KEY `permisos_idmodulo_foreign` (`idmodulo`),
  CONSTRAINT `permisos_idmodulo_foreign` FOREIGN KEY (`idmodulo`) REFERENCES `modulos` (`id`),
  CONSTRAINT `permisos_idperfil_foreign` FOREIGN KEY (`idperfil`) REFERENCES `perfils` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permisos
-- ----------------------------
INSERT INTO `permisos` VALUES ('1', '3', '1');
INSERT INTO `permisos` VALUES ('1', '4', '0');
INSERT INTO `permisos` VALUES ('1', '7', '1');
INSERT INTO `permisos` VALUES ('1', '8', '1');
INSERT INTO `permisos` VALUES ('1', '9', '1');
INSERT INTO `permisos` VALUES ('1', '10', '1');
INSERT INTO `permisos` VALUES ('1', '11', '1');
INSERT INTO `permisos` VALUES ('1', '12', '0');
INSERT INTO `permisos` VALUES ('1', '14', '0');
INSERT INTO `permisos` VALUES ('1', '15', '1');
INSERT INTO `permisos` VALUES ('1', '16', '1');
INSERT INTO `permisos` VALUES ('1', '18', '1');
INSERT INTO `permisos` VALUES ('1', '19', '0');
INSERT INTO `permisos` VALUES ('1', '20', '0');
INSERT INTO `permisos` VALUES ('1', '21', '0');
INSERT INTO `permisos` VALUES ('1', '22', '0');
INSERT INTO `permisos` VALUES ('1', '23', '1');
INSERT INTO `permisos` VALUES ('1', '24', '1');
INSERT INTO `permisos` VALUES ('1', '25', '1');
INSERT INTO `permisos` VALUES ('1', '26', '1');
INSERT INTO `permisos` VALUES ('1', '27', '0');
INSERT INTO `permisos` VALUES ('1', '28', '0');
INSERT INTO `permisos` VALUES ('1', '29', '0');

-- ----------------------------
-- Table structure for `proveedores`
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `razon_social` text,
  `ruc` text,
  `direccion` text,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idproveedor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of proveedores
-- ----------------------------
INSERT INTO `proveedores` VALUES ('1', 'lenin', 'lenin', '10469017551', 'll', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `proveedores` VALUES ('2', 'kko', 'llo', '20788', 'opp', '0', '2014-12-23 05:55:49', '2014-12-23 05:57:34');

-- ----------------------------
-- Table structure for `razas`
-- ----------------------------
DROP TABLE IF EXISTS `razas`;
CREATE TABLE `razas` (
  `id` int(10) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of razas
-- ----------------------------
INSERT INTO `razas` VALUES ('1', 'Brouwn', '1', '2014-06-20 17:45:37', '2014-07-06 16:07:18');
INSERT INTO `razas` VALUES ('2', 'Holstein', '1', '2014-07-06 16:11:15', '2014-07-06 16:11:15');
INSERT INTO `razas` VALUES ('3', 'Suiza', '1', '2014-07-06 16:11:35', '2014-07-06 16:11:35');
INSERT INTO `razas` VALUES ('4', 'Jersey', '1', '2014-07-06 16:12:56', '2014-07-06 16:12:56');
INSERT INTO `razas` VALUES ('5', 'Celta', '1', '2014-07-06 16:13:55', '2014-07-06 16:13:55');
INSERT INTO `razas` VALUES ('6', 'Landrace', '1', '2014-07-06 16:14:21', '2014-07-06 16:14:21');
INSERT INTO `razas` VALUES ('7', 'Pietrain', '1', '2014-07-06 16:14:42', '2014-07-06 16:14:42');
INSERT INTO `razas` VALUES ('8', 'Alter Real', '1', '2014-07-06 16:16:19', '2014-07-06 16:16:19');
INSERT INTO `razas` VALUES ('9', 'Azteca', '1', '2014-07-06 16:16:29', '2014-07-06 16:16:29');
INSERT INTO `razas` VALUES ('10', 'Frizón', '1', '2014-07-06 16:16:43', '2014-07-06 16:16:43');

-- ----------------------------
-- Table structure for `salidas`
-- ----------------------------
DROP TABLE IF EXISTS `salidas`;
CREATE TABLE `salidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_salida` int(11) DEFAULT NULL,
  `tipo_salida` int(11) DEFAULT NULL,
  `total_venta` decimal(10,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `descripcion` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_peso` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salidas
-- ----------------------------
INSERT INTO `salidas` VALUES ('1', '12', '1', '0.00', '1', 'gdgdgd', '2014-12-23 13:30:20', '2014-12-23 13:30:20', null);

-- ----------------------------
-- Table structure for `subactividades`
-- ----------------------------
DROP TABLE IF EXISTS `subactividades`;
CREATE TABLE `subactividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subactividades
-- ----------------------------
INSERT INTO `subactividades` VALUES ('1', 'Anabólico', '1', '2014-12-23 04:18:03', '2014-12-23 06:40:24');
INSERT INTO `subactividades` VALUES ('2', 'Vitaminas', '1', '2014-12-23 04:19:05', '2014-12-23 06:39:57');
INSERT INTO `subactividades` VALUES ('3', 'Desparacitación interna', '1', '2014-12-23 04:19:11', '2014-12-23 06:39:40');
INSERT INTO `subactividades` VALUES ('4', 'jjj', '0', '2014-12-23 04:30:30', '2014-12-23 04:41:06');
INSERT INTO `subactividades` VALUES ('5', 'Desparacitación externa', '1', '2014-12-23 05:06:31', '2014-12-23 06:39:06');
INSERT INTO `subactividades` VALUES ('6', 'Pesaje', '1', '2014-12-23 06:40:42', '2014-12-23 06:40:42');

-- ----------------------------
-- Table structure for `tipo_salida`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_salida`;
CREATE TABLE `tipo_salida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_salida` text,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_salida
-- ----------------------------
INSERT INTO `tipo_salida` VALUES ('1', 'venta', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `tipo_salida` VALUES ('2', 'muerte', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `tipo_salida` VALUES ('3', 'robo', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `tipo_salida` VALUES ('4', 'enfermedad', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idperfil` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `direccion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `users_idperfil_foreign` (`idperfil`),
  CONSTRAINT `users_idperfil_foreign` FOREIGN KEY (`idperfil`) REFERENCES `perfils` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', '1', 'Usuario', 'admin', 'user@gmail.com', '$2y$10$/hSdrp4zOJ25Cm/6q85upOxuPnqCOZ0qQyLnN515R0mg0zoAE4cOG', 'NvPXU0gfHbvEDyg2VNmb8xlTipuxukpL68XsYxQ1jfzpFgEydEwjwvCbF1Rr', '2014-05-09 16:55:56', '2014-12-23 12:41:48', 'Calle 123', '987654321', '1');
INSERT INTO `users` VALUES ('3', '2', 'Otro', 'otro', 'otro@gmail.com', '$2y$10$XM5C3SO08/dhkUysgPfgHue4r1revburSb1sF3blxU0nNY7GSK03u', 'huyruRY1pGzqeuXSQt7Nm1hUGDJ1PzgMIKtfChbQU3AycbiGpZufutPplUFq', '2014-07-03 23:35:24', '2014-07-03 23:35:43', 'direccion 123', '987654321', '1');

-- ----------------------------
-- View structure for `vista_actividades_reporte`
-- ----------------------------
DROP VIEW IF EXISTS `vista_actividades_reporte`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_actividades_reporte` AS select `actividades`.`id` AS `id`,`actividades`.`fecha_actividad` AS `fecha_actividad`,`subactividades`.`descripcion` AS `sub_actividad`,`actividades`.`descripcion` AS `descripcion`,`actividades`.`cantidad` AS `cantidad`,`actividades`.`precio` AS `precio`,`actividades`.`total` AS `total`,(case `actividades`.`tipo` when 1 then 'ingresos' when 2 then 'gastos' end) AS `tipo` from (`actividades` join `subactividades` on((`actividades`.`sub_actividad` = `subactividades`.`id`))) where (`actividades`.`estado` = 1) ;

-- ----------------------------
-- View structure for `vista_ganado`
-- ----------------------------
DROP VIEW IF EXISTS `vista_ganado`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_ganado` AS select `entradas`.`id` AS `id`,`entradas`.`nombre_ganado` AS `nombre_ganado`,`entradas`.`peso_ingreso` AS `peso_ingreso`,((`entradas`.`precio_compra` + `entradas`.`costo_transporte`) + `entradas`.`costo_vaquero`) AS `costo_compra` from `entradas` where (`entradas`.`estado` = 1) ;

-- ----------------------------
-- View structure for `vista_ganado_reporte`
-- ----------------------------
DROP VIEW IF EXISTS `vista_ganado_reporte`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_ganado_reporte` AS select `actividades`.`id` AS `id`,`actividades`.`fecha_actividad` AS `fecha_actividad`,`subactividades`.`descripcion` AS `sub_actividad`,`actividades`.`descripcion` AS `descripcion`,`actividades`.`cantidad` AS `cantidad`,`actividades`.`precio` AS `precio`,`actividades`.`total` AS `total`,(case `actividades`.`tipo` when 1 then 'ingresos' when 2 then 'gastos' end) AS `tipo` from (`actividades` join `subactividades` on((`actividades`.`sub_actividad` = `subactividades`.`id`))) where (`actividades`.`estado` = 1) ;

-- ----------------------------
-- View structure for `vista_salidas_reportes`
-- ----------------------------
DROP VIEW IF EXISTS `vista_salidas_reportes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_salidas_reportes` AS select `salidas`.`id` AS `id`,`entradas`.`codigo_ganado` AS `codigo_ganado`,`salidas`.`fecha_salida` AS `fecha_salida`,`detalle_salidas`.`precio_venta` AS `precio_venta`,`detalle_salidas`.`peso_salida` AS `peso_salida`,`tipo_salida`.`tipo_salida` AS `tipo_salida` from (((`entradas` join `detalle_salidas` on((`detalle_salidas`.`id_ganado` = `entradas`.`id`))) join `salidas` on((`salidas`.`id` = `detalle_salidas`.`id_salida`))) join `tipo_salida` on((`tipo_salida`.`id` = `salidas`.`tipo_salida`))) ;
