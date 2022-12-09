-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2022 a las 02:32:24
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `tienda`
--
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carretilla`
--

CREATE TABLE `carretilla` (
  `usercod` bigint(10) NOT NULL,
  `codprd` int(11) NOT NULL,
  `crrctd` int(5) NOT NULL,
  `crrprc` decimal(12,2) NOT NULL,
  `crrfching` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carretillaanon`
--

CREATE TABLE `carretillaanon` (
  `anoncod` varchar(128) NOT NULL,
  `codprd` int(11) NOT NULL,
  `crrctd` int(5) NOT NULL,
  `crrprc` decimal(12,2) NOT NULL,
  `crrfching` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `iddetallefactura` int(11) NOT NULL,
  `idfactura` bigint(20) NOT NULL,
  `codprd` bigint(20) NOT NULL,
  `nombreProducto` varchar(100) NOT NULL,
  `crrctd` int(5) NOT NULL,
  `crrprc` decimal(12,2) NOT NULL,
  `crrfching` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`iddetallefactura`, `idfactura`, `codprd`, `nombreProducto`, `crrctd`, `crrprc`, `crrfching`) VALUES
(27, 11, 4, 'ProductoPrueba', 1, '1234.00', '2022-12-08 05:28:51'),
(28, 11, 5, 'HP All in One', 1, '5600.00', '2022-12-08 05:28:51'),
(29, 12, 4, 'ProductoPrueba', 1, '1234.00', '2022-12-08 05:36:56'),
(30, 12, 6, 'Acer Nitro 1', 1, '4505.00', '2022-12-08 05:36:56'),
(31, 12, 7, 'Producto2', 1, '1356.00', '2022-12-08 05:36:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfactura` bigint(20) NOT NULL,
  `usercod` bigint(20) NOT NULL,
  `subtotal` float NOT NULL,
  `impuesto` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idfactura`, `usercod`, `subtotal`, `impuesto`, `total`) VALUES
(11, 17, 6834, 1025, 7859),
(12, 17, 7095, 1064, 8159);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `fncod` varchar(255) NOT NULL,
  `fndsc` varchar(45) DEFAULT NULL,
  `fnest` char(3) DEFAULT NULL,
  `fntyp` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`fncod`, `fndsc`, `fnest`, `fntyp`) VALUES
('447966E3-48C6-4', 'Ejemplo12323', 'INA', 'INA'),
('Controllers/Admin/Admin', 'Controllers\\\\Admin\\\\Admin', 'ACT', 'ACT'),
('ControllersMntUsuariosEdit', 'ControllersMntUsuariosEdit', 'ACT', 'CTR'),
('ControllersMntUsuariosNew', 'ControllersMntUsuariosNew', 'ACT', 'ACT'),
('Controllers\\Admin\\Admin', 'Controllers\\Admin\\Admin', 'ACT', 'CTR'),
('Controllers\\MntUsuarios\\Delete', 'Controllers\\MntUsuarios\\Delete', 'ACT', 'CTR'),
('Controllers\\Mnt\\Autor', 'Controllers\\Mnt\\Autor', 'ACT', 'CTR'),
('Controllers\\Mnt\\Autores', 'Controllers\\Mnt\\Autores', 'ACT', 'CTR'),
('Controllers\\Mnt\\Autores\\Delete', 'Controllers\\Mnt\\Autores\\Delete', 'ACT', 'CTR'),
('Controllers\\Mnt\\Autores\\Edit', 'Controllers\\Mnt\\Autores\\Edit', 'ACT', 'CTR'),
('Controllers\\Mnt\\Autores\\New', 'Controllers\\Mnt\\Autores\\New', 'ACT', 'CTR'),
('Controllers\\Mnt\\Categorias', 'Controllers\\Mnt\\Categorias', 'ACT', 'CTR'),
('Controllers\\Mnt\\Categorias\\Delete', 'Controllers\\Mnt\\Categorias\\Delete', 'ACT', 'CTR'),
('Controllers\\Mnt\\Categorias\\Edit', 'Controllers\\Mnt\\Categorias\\Edit', 'ACT', 'CTR'),
('Controllers\\Mnt\\Categorias\\New', 'Controllers\\Mnt\\Categorias\\New', 'ACT', 'CTR'),
('Controllers\\Mnt\\Funciones', 'Controllers\\Mnt\\Funciones', 'ACT', 'CTR'),
('Controllers\\Mnt\\Funcion_rol', 'Controllers\\Mnt\\Funcion_rol', 'ACT', 'CTR'),
('Controllers\\Mnt\\Libro', 'Controllers\\Mnt\\Libro', 'ACT', 'CTR'),
('Controllers\\Mnt\\LibroAutores', 'Controllers\\Mnt\\LibroAutores', 'ACT', 'CTR'),
('Controllers\\Mnt\\Libros', 'Controllers\\Mnt\\Libros', 'ACT', 'CTR'),
('Controllers\\Mnt\\Libros\\Delete', 'Controllers\\Mnt\\Libros\\Delete', 'ACT', 'CTR'),
('Controllers\\Mnt\\Libros\\Edit', 'Controllers\\Mnt\\Libros\\Edit', 'ACT', 'CTR'),
('Controllers\\Mnt\\Libros\\New', 'Controllers\\Mnt\\Libros\\New', 'ACT', 'CTR'),
('Controllers\\Mnt\\Libro\\Delete', 'Controllers\\Mnt\\Libro\\Delete', 'ACT', 'CTR'),
('Controllers\\Mnt\\Libro\\Edit', 'Controllers\\Mnt\\Libro\\Edit', 'ACT', 'CTR'),
('Controllers\\Mnt\\Libro\\New', 'Controllers\\Mnt\\Libros\\New', 'ACT', 'CTR'),
('Controllers\\Mnt\\Perfil', 'Controllers\\Mnt\\Perfil', 'ACT', 'CTR'),
('Controllers\\Mnt\\Rol', 'Controllers\\Mnt\\Rol', 'ACT', 'CTR'),
('Controllers\\Mnt\\Roles', 'Controllers\\Mnt\\Roles', 'ACT', 'CTR'),
('Controllers\\Mnt\\Usuario', 'Controllers\\Mnt\\Usuario', 'ACT', 'CTR'),
('Controllers\\Mnt\\Usuarios', 'Controllers\\Mnt\\Usuarios', 'ACT', 'CTR'),
('Controllers\\Mnt\\Usuarios\\Delete', 'Controllers\\Mnt\\Usuarios\\Delete', 'ACT', 'CTR'),
('Controllers\\Mnt\\Usuarios\\Edit', 'Controllers\\Mnt\\Usuarios\\Edit', 'ACT', 'CTR'),
('Controllers\\Mnt\\Usuarios\\New', 'Controllers\\Mnt\\Usuarios\\New', 'ACT', 'CTR'),
('Controllers\\Mnt\\Usuario\\Del', 'Controllers\\Mnt\\Usuario\\Del', 'ACT', 'CTR'),
('Controllers\\Mnt\\Usuario\\Dsp', 'Controllers\\Mnt\\Usuario\\Dsp', 'ACT', 'CTR'),
('Controllers\\Mnt\\Usuario\\New', 'Controllers\\Mnt\\Usuarios\\New', 'ACT', 'ACT'),
('Controllers\\Mnt\\Usuario\\Upd', 'Controllers\\Mnt\\Usuario\\Upd', 'ACT', 'CTR'),
('MntUsuarios', 'MntUsuarios', 'ACT', 'CTR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones_roles`
--

CREATE TABLE `funciones_roles` (
  `rolescod` varchar(15) NOT NULL,
  `fncod` varchar(255) NOT NULL,
  `fnrolest` char(3) DEFAULT NULL,
  `fnexp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `funciones_roles`
--

INSERT INTO `funciones_roles` (`rolescod`, `fncod`, `fnrolest`, `fnexp`) VALUES
('ADM', 'Controllers/Admin/Admin', 'ACT', '2023-12-08 17:46:01'),
('ADM', 'Controllers\\Admin\\Admin', 'ACT', '2030-08-01 00:00:00'),
('ADM', 'Controllers\\Mnt\\Autores', 'ACT', '2023-07-28 16:42:38'),
('ADM', 'Controllers\\Mnt\\Autores\\Delete', 'ACT', '2023-08-03 00:00:00'),
('ADM', 'Controllers\\Mnt\\Autores\\Edit', 'ACT', '2023-08-03 00:00:00'),
('ADM', 'Controllers\\Mnt\\Autores\\New', 'ACT', '2023-08-03 00:00:00'),
('ADM', 'Controllers\\Mnt\\Categorias', 'ACT', '2023-02-08 00:00:00'),
('ADM', 'Controllers\\Mnt\\Categorias\\Delete', 'ACT', '2023-02-08 00:00:00'),
('ADM', 'Controllers\\Mnt\\Categorias\\Edit', 'ACT', '2023-08-02 00:00:00'),
('ADM', 'Controllers\\Mnt\\Categorias\\New', 'ACT', '2023-08-02 00:00:00'),
('ADM', 'Controllers\\Mnt\\Funciones', 'ACT', '2023-07-02 19:26:52'),
('ADM', 'Controllers\\Mnt\\Funcion_rol', 'ACT', '2030-08-01 00:00:00'),
('ADM', 'Controllers\\Mnt\\LibroAutores', 'ACT', '2023-07-02 00:00:00'),
('ADM', 'Controllers\\Mnt\\Libros', 'ACT', '2023-07-28 16:42:42'),
('ADM', 'Controllers\\Mnt\\Libros\\Delete', 'ACT', '2023-07-02 00:00:00'),
('ADM', 'Controllers\\Mnt\\Libros\\Edit', 'ACT', '2023-07-02 00:00:00'),
('ADM', 'Controllers\\Mnt\\Libros\\New', 'ACT', '2023-08-02 00:00:00'),
('ADM', 'Controllers\\Mnt\\Libro\\Delete', 'ACT', '2023-02-08 00:00:00'),
('ADM', 'Controllers\\Mnt\\Libro\\Edit', 'ACT', '2023-02-08 00:00:00'),
('ADM', 'Controllers\\Mnt\\Libro\\New', 'ACT', '2023-02-08 00:00:00'),
('ADM', 'Controllers\\Mnt\\Perfil', 'ACT', '2023-07-02 00:00:00'),
('ADM', 'Controllers\\Mnt\\Rol', 'ACT', '2030-08-01 00:00:00'),
('ADM', 'Controllers\\Mnt\\Roles', 'ACT', '2030-08-01 00:00:00'),
('ADM', 'Controllers\\Mnt\\Usuario', 'ACT', '2023-08-02 00:00:00'),
('ADM', 'Controllers\\Mnt\\Usuarios', 'ACT', '2030-08-01 00:00:00'),
('ADM', 'Controllers\\Mnt\\Usuarios\\Delete', 'ACT', '2030-08-01 00:00:00'),
('ADM', 'Controllers\\Mnt\\Usuarios\\Edit', 'ACT', '2030-08-01 00:00:00'),
('ADM', 'Controllers\\Mnt\\Usuarios\\New', 'ACT', '2030-08-01 00:00:00'),
('ADM', 'Controllers\\Mnt\\Usuario\\Del', 'ACT', '2030-08-01 00:00:00'),
('ADM', 'Controllers\\Mnt\\Usuario\\Dsp', 'ACT', '2030-08-01 00:00:00'),
('ADM', 'Controllers\\Mnt\\Usuario\\New', 'ACT', '2030-08-01 00:00:00'),
('ADM', 'Controllers\\Mnt\\Usuario\\Upd', 'ACT', '2030-08-01 00:00:00'),
('ADM', 'MntUsuarios', 'ACT', '2023-07-02 19:27:01'),
('EMP', 'Controllers\\Admin\\Admin', 'ACT', '2023-07-02 18:36:53'),
('ORG', 'Controllers/Admin/Admin', 'ACT', '2023-07-02 19:17:45'),
('ORG', 'Controllers\\Admin\\Admin', 'ACT', '2023-07-02 19:17:50'),
('ORG', 'Controllers\\Mnt\\Usuario', 'ACT', '2023-07-02 19:23:09'),
('ORG', 'Controllers\\Mnt\\Usuarios', 'ACT', '2023-07-02 19:22:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codprd` int(11) NOT NULL,
  `nombreProducto` varchar(50) NOT NULL,
  `descripcionProducto` varchar(100) NOT NULL,
  `tipoProducto` char(3) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `stockProducto` int(11) NOT NULL,
  `estadoProducto` char(3) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codprd`, `nombreProducto`, `descripcionProducto`, `tipoProducto`, `precio`, `stockProducto`, `estadoProducto`, `imagen`) VALUES
(4, 'ProductoPrueba', 'Probando 1 2 3', 'ELE', '1234.00', 15, 'ACT', 'public/imgs/products/p1.jpg'),
(5, 'HP All in One', 'Computadora Hp de escritorio todo en uno', 'ELE', '5600.00', 11, 'ACT', 'public/imgs/products/dstkp1.jpeg'),
(6, 'Acer Nitro 1', 'Computadora de buena potencia', 'ELE', '4505.00', 9, 'ACT', 'public/imgs/products/p1.jpg'),
(7, 'Producto2', 'Computadora de buena potencia', 'ELE', '1356.00', 14, 'ACT', 'public/imgs/products/p1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rolescod` varchar(15) NOT NULL,
  `rolesdsc` varchar(45) DEFAULT NULL,
  `rolesest` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rolescod`, `rolesdsc`, `rolesest`) VALUES
('8635444A-37A0-4', 'Ejemplo', 'INA'),
('ADM', 'Administrador', 'ACT'),
('EMP', 'Empleado', 'ACT'),
('ORG', 'Organizador', 'ACT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuarios`
--

CREATE TABLE `roles_usuarios` (
  `usercod` bigint(20) NOT NULL,
  `rolescod` varchar(15) NOT NULL,
  `roleuserest` char(3) DEFAULT NULL,
  `roleuserfch` datetime DEFAULT NULL,
  `roleuserexp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles_usuarios`
--

INSERT INTO `roles_usuarios` (`usercod`, `rolescod`, `roleuserest`, `roleuserfch`, `roleuserexp`) VALUES
(16, '8635444A-37A0-4', 'ACT', '2022-12-08 17:50:03', '2022-12-08 17:50:03'),
(16, 'ORG', 'ACT', '2022-08-03 21:38:02', '2023-08-03 21:38:02'),
(17, 'ADM', 'ACT', '2022-07-02 17:35:00', '2023-10-02 17:35:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipospago`
--

CREATE TABLE `tipospago` (
  `idtipospago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usercod` bigint(20) NOT NULL,
  `useremail` varchar(80) DEFAULT NULL,
  `username` varchar(80) DEFAULT NULL,
  `userpswd` varchar(128) DEFAULT NULL,
  `userfching` datetime DEFAULT NULL,
  `userpswdest` char(3) DEFAULT NULL,
  `userpswdexp` datetime DEFAULT NULL,
  `userest` char(3) DEFAULT NULL,
  `useractcod` varchar(128) DEFAULT NULL,
  `userpswdchg` varchar(128) DEFAULT NULL,
  `usertipo` char(3) DEFAULT NULL COMMENT 'Tipo de Usuario, Normal, Consultor o Cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usercod`, `useremail`, `username`, `userpswd`, `userfching`, `userpswdest`, `userpswdexp`, `userest`, `useractcod`, `userpswdchg`, `usertipo`) VALUES
(16, 'usuariodeprueba@gmail.com', 'John Doe', '$2y$10$1u2W55Gxt7HFRjEJT0/AUuKWLAJlHuRMUy/gfyvky3Y7w0qm5p9QS', '2022-12-05 15:13:27', 'ACT', '2023-03-05 00:00:00', 'ACT', '3a19b620d74eed56fb27ffbeefe874f402616f189f9888607105d39978e35de7', '2022-12-05 15:13:27', 'PBL'),
(17, 'johanurborlando2217@gmail.com', 'johanu17', '$2y$10$WvNOFWR1yvj8yMLklQ/.X.jWwtFySCsYbnq.dZk5dPMhFwERk3oNa', '2022-12-05 15:59:50', 'ACT', '2023-03-05 00:00:00', 'ACT', '8dbeaf7e388de8b5e3e8d945ec64e0ebbd7372fbc136c3b7a7ec50a90cbad6fb', '2022-12-05 15:59:50', 'ADM'),
(18, 'otroprueba12@gmail.com', 'Juan', '$2y$10$m0uENX8LKwWzpb2GOG4PYOUdJl/Q8oIwE3qYjE5KAjXs9cq.9GdUa', '2022-12-08 00:00:00', 'ACT', '2023-11-08 00:00:00', 'ACT', '1234', '2022-12-05 15:59:50', 'ACT');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carretilla`
--
ALTER TABLE `carretilla`
  ADD PRIMARY KEY (`usercod`,`codprd`),
  ADD KEY `codprd` (`codprd`),
  ADD KEY `usercod` (`usercod`) USING BTREE;

--
-- Indices de la tabla `carretillaanon`
--
ALTER TABLE `carretillaanon`
  ADD UNIQUE KEY `FK_codprd_idx` (`codprd`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`iddetallefactura`),
  ADD KEY `FK_idFactura_idx` (`idfactura`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfactura`) USING BTREE,
  ADD KEY `FK_usercodIDX_idx` (`usercod`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`fncod`);

--
-- Indices de la tabla `funciones_roles`
--
ALTER TABLE `funciones_roles`
  ADD PRIMARY KEY (`rolescod`,`fncod`),
  ADD KEY `rol_funcion_key_idx` (`fncod`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codprd`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rolescod`);

--
-- Indices de la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  ADD PRIMARY KEY (`usercod`,`rolescod`),
  ADD KEY `rol_usuario_key_idx` (`rolescod`);

--
-- Indices de la tabla `tipospago`
--
ALTER TABLE `tipospago`
  ADD PRIMARY KEY (`idtipospago`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usercod`),
  ADD UNIQUE KEY `useremail_UNIQUE` (`useremail`),
  ADD KEY `usertipo` (`usertipo`,`useremail`,`usercod`,`userest`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `iddetallefactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfactura` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codprd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipospago`
--
ALTER TABLE `tipospago`
  MODIFY `idtipospago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usercod` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carretilla`
--
ALTER TABLE `carretilla`
  ADD CONSTRAINT `FK_usercod` FOREIGN KEY (`usercod`) REFERENCES `usuario` (`usercod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codprd` FOREIGN KEY (`codprd`) REFERENCES `productos` (`codprd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carretillaanon`
--
ALTER TABLE `carretillaanon`
  ADD CONSTRAINT `FK_codprd_2` FOREIGN KEY (`codprd`) REFERENCES `productos` (`codprd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `FK_idFactura` FOREIGN KEY (`idfactura`) REFERENCES `factura` (`idfactura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FK_usercodIDX` FOREIGN KEY (`usercod`) REFERENCES `usuario` (`usercod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `funciones_roles`
--
ALTER TABLE `funciones_roles`
  ADD CONSTRAINT `funcion_rol_key` FOREIGN KEY (`rolescod`) REFERENCES `roles` (`rolescod`),
  ADD CONSTRAINT `rol_funcion_key` FOREIGN KEY (`fncod`) REFERENCES `funciones` (`fncod`);

--
-- Filtros para la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  ADD CONSTRAINT `rol_usuario_key` FOREIGN KEY (`rolescod`) REFERENCES `roles` (`rolescod`),
  ADD CONSTRAINT `usuario_rol_key` FOREIGN KEY (`usercod`) REFERENCES `usuario` (`usercod`);
COMMIT;
