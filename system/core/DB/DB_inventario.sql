-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2024 a las 21:09:44
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_flota`
--

CREATE TABLE `table_flota` (
  `id_flota` int(5) NOT NULL,
  `id_unidad` varchar(20) NOT NULL,
  `marca_unidad` varchar(20) NOT NULL,
  `modelo_unidad` varchar(20) NOT NULL,
  `vim_unidad` varchar(20) NOT NULL,
  `fecha_creacion` varchar(20) NOT NULL,
  `cap_pasajero` int(11) NOT NULL,
  `tipo_combustible` varchar(20) NOT NULL,
  `status_unidad` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `table_flota`
--

INSERT INTO `table_flota` (`id_flota`, `id_unidad`, `marca_unidad`, `modelo_unidad`, `vim_unidad`, `fecha_creacion`, `cap_pasajero`, `tipo_combustible`, `status_unidad`) VALUES
(1, 'BY-02', 'YUTONG', 'ZK6896HGA', 'LZYTDGD6XE1000716', '2014', 25, 'Diesel', 0),
(2, 'BY-06', 'YUTONG', 'ZK6896HGA', 'LZYTDGD64E1000551', '2014', 25, 'Diesel', 1),
(3, 'BY-08', 'YUTONG', 'ZK6896HGA', 'LZYTDGD63E1000735', '2014', 25, 'Diesel', 1),
(4, 'BY-10', 'YUTONG', 'ZK6896HGA', 'LZYTDGD65E1000770', '2014', 25, 'Diesel', 1),
(5, 'BY-11', 'YUTONG', 'ZK6118HGA', 'LZYTAGE67E1001510', '2014', 44, 'G.L.P', 0),
(6, 'BY-13', 'YUTONG', 'ZK6118HGA', 'LZYTAGE63E1001276', '2014', 44, 'G.L.P', 0),
(7, 'BY-14', 'YUTONG', 'ZK6118HGA', 'LZYTAGE69E1001489', '2014', 44, 'G.L.P', 1),
(8, 'BY-17', 'YUTONG', 'ZK6118HGA', 'LZYTAGE66E1001398', '2014', 44, 'G.L.P', 1),
(9, 'BY-18', 'YUTONG', 'ZK6118HGA', 'LZYTAGE64E1001514', '2014', 44, 'G.L.P', 0),
(10, 'BY-20', 'YUTONG', 'ZK6118HGA', 'LZYTAGE6XE1001226', '2014', 44, 'G.L.P', 1),
(11, 'BY-21', 'YUTONG', 'ZK6118HGA', 'LZYTAGE69E1001430', '2014', 44, 'G.L.P', 1),
(12, 'BY-22', 'YUTONG', 'ZK6118HGA', 'LZYTAGE63E1001312', '2014', 44, 'G.L.P', 1),
(13, 'BY-24', 'YUTONG', 'ZK6118HGA', 'LZYTAGE68E1001497', '2014', 44, 'G.L.P', 1),
(14, 'BY-25', 'YUTONG', 'ZK6118HGA', 'LZYTAGE65E1001506', '2014', 44, 'G.L.P', 1),
(15, 'BY-28', 'YUTONG', 'ZK6118HGA', 'LZYTAGE60E1004331', '2014', 44, 'G.L.P', 0),
(16, 'BY-29', 'YUTONG', 'ZK6118HGA', 'LZYTAGE6XE1004448', '2014', 44, 'G.L.P', 1),
(17, 'BY-30', 'YUTONG', 'ZK6118HGA', 'LZYTAGE65E1005104', '2014', 44, 'G.L.P', 1),
(18, 'BY-31', 'YUTONG', 'ZK6118HGA', 'LZYTAGE64E1004350', '2014', 44, 'G.L.P', 1),
(19, 'BY-32', 'YUTONG', 'ZK6118HGA', 'LZYTAGE60E1004345', '2014', 44, 'G.L.P', 1),
(20, 'BY-33', 'YUTONG', 'ZK6118HGA', 'LZYTAGE63E1004405', '2014', 44, 'G.L.P', 1),
(21, 'BY-34', 'YUTONG', 'ZK6118HGA', 'LZYTAGE63E1005120', '2014', 44, 'G.L.P', 1),
(22, 'BY-35', 'YUTONG', 'ZK6118HGA', 'LZYTAGE65E1005040', '2014', 44, 'G.L.P', 1),
(23, 'BY-37', 'YUTONG', 'ZK6118HGA', 'LZYTAGE68F1000643', '2015', 44, 'Diesel', 1),
(24, 'BY-38', 'YUTONG', 'ZK6118HGA', 'LZYTAGE6XF1000627', '2015', 44, 'Diesel', 1),
(25, 'BY-39', 'YUTONG', 'ZK6118HGA', 'LZYTAGE64F1000624', '2015', 44, 'Diesel', 1),
(26, 'BY-44', 'YUTONG', 'ZK6896HGA', 'LZYTDGD60F1001228', '2015', 25, 'Diesel', 0),
(27, 'BY-48', 'YUTONG', 'ZK6896HGA', 'LZYTDGD6XF1001091', '2015', 25, 'Diesel', 0),
(28, 'BY-49', 'YUTONG', 'ZK6896HGA', 'LZYTDGD67F1001193', '2015', 25, 'Diesel', 0),
(29, 'BY-50', 'YUTONG', 'ZK6896HGA', 'LZYTDGD69F1001244', '2015', 25, 'Diesel', 0),
(30, 'BY-51', 'YUTONG', 'ZK6896HGA', 'LZYTDGD66F1001069', '2015', 25, 'Diesel', 1),
(31, 'BY-52', 'YUTONG', 'ZK6896HGA', 'LZYTDGD6XF1000961', '2015', 25, 'Diesel', 1),
(32, 'BY-53', 'YUTONG', 'ZK6752D', 'LZYTETD22F1014887', '2016', 30, 'Diesel', 1),
(33, 'BY-54', 'YUTONG', 'ZK6752D', 'LZYTETD24F1014888', '2016', 30, 'Diesel', 1),
(34, 'BY-55', 'YUTONG', 'ZK6752D', 'LZYTETD23F1015157', '2016', 30, 'Diesel', 1),
(35, 'BY-57', 'YUTONG', 'ZK6752D', 'LZYTETD27F1014884', '2016', 30, 'Diesel', 0),
(36, 'BY-58', 'YUTONG', 'ZK6118HGA', 'LZYTAGE60G1000993', '2016', 44, 'Diesel', 1),
(37, 'BY-59', 'YUTONG', 'ZK6118HGA', 'LZYTAGE68G1001034', '2016', 44, 'Diesel', 1),
(38, 'BY-61', 'YUTONG', 'ZK6118HGA', 'LZYTAGE68G1000997', '2016', 44, 'Diesel', 1),
(39, 'BY-62', 'YUTONG', 'ZK6118HGA', 'LZYTAGE65G1000990', '2016', 44, 'Diesel', 0),
(40, 'BY-63', 'YUTONG', 'ZK6118HGA', 'LZYTAGE6XG1000967', '2016', 44, 'Diesel', 1),
(41, 'BY-64', 'YUTONG', 'ZK6118HGA', 'LZYTAGE61G1000954', '2016', 44, 'Diesel', 1),
(42, 'BY-65', 'YUTONG', 'ZK6118HGA', 'LZYTAGE69G1001009', '2016', 44, 'Diesel', 0),
(43, 'BY-66', 'YUTONG', 'ZK6118HGA', 'LZYTAGE69G1000989', '2016', 44, 'Diesel', 0),
(44, 'BY-67', 'YUTONG', 'ZK6118HGA', 'LZYTAGE66G1000965', '2016', 44, 'Diesel', 1),
(45, 'BY-68', 'YUTONG', 'ZK6118HGA', 'LZYTAGE65G1007311', '2016', 44, 'Diesel', 1),
(46, 'BY-69', 'YUTONG', 'ZK6118HGA', 'LZYTAGE64G1007333', '2016', 44, 'Diesel', 1),
(47, 'BY-70', 'YUTONG', 'ZK6118HGA', 'LZYTAGE65G1007292', '2016', 44, 'Diesel', 0),
(48, 'BY-71', 'YUTONG', 'ZK6118HGA', 'LZYTAGE67G1007312', '2016', 44, 'Diesel', 1),
(49, 'BY-72', 'YUTONG', 'ZK6118HGA', 'LZYTAGE67G1000988', '2016', 44, 'Diesel', 1),
(50, 'BY-73', 'YUTONG', 'ZK6896HGA', 'LZYTDGD60G1000615', '2015', 25, 'Diesel', 0),
(51, 'BY-74', 'YUTONG', 'ZK6896HGA', 'LZYTDGD66G1000599', '2015', 25, 'Diesel', 1),
(52, 'BY-75', 'YUTONG', 'ZK6896HGA', 'LZYTDGD63F1019772', '2015', 25, 'Diesel', 0),
(53, 'BY-76', 'YUTONG', 'ZK6896HGA', 'LZYTDGD62F1019794', '2015', 25, 'Diesel', 0),
(54, 'BY-77', 'YUTONG', 'ZK6896HGA', 'LZYTDGD64G1000598', '2015', 25, 'Diesel', 1),
(55, 'BY-78', 'YUTONG', 'ZK6896HGA', 'LZYTDGD68G1009353', '2015', 25, 'Diesel', 0),
(56, 'BY-80', 'YUTONG', 'ZK6896HGA', 'LZYTDGD66G1009402', '2015', 25, 'Diesel', 0),
(57, 'BY-81', 'YUTONG', 'ZK6896HGA', 'LZYTDGD69G1009328', '2015', 25, 'Diesel', 1),
(58, 'BY-82', 'YUTONG', 'ZK6896HGA', 'LZYTDGD65G1009343', '2015', 25, 'Diesel', 1),
(59, 'BY-83', 'YUTONG', 'ZK6896HGA', 'LZYTDGD6XG1009399', '2015', 25, 'Diesel', 1),
(60, 'BY-84', 'YUTONG', 'ZK6896HGA', 'LZYTDGD61G1009338', '2015', 25, 'Diesel', 1),
(61, 'BY-85', 'YUTONG', 'ZK6118HGA', 'LZYTAGE65G1007308', '2016', 44, 'Diesel', 1),
(62, 'BY-86', 'YUTONG', 'ZK6118HGA', 'LZYTAGE61G1007287', '2016', 44, 'Diesel', 1),
(63, 'BY-87', 'YUTONG', 'ZK6118HGA', 'LZYTAGE67G1007293', '2016', 44, 'Diesel', 1),
(64, 'BY-88', 'YUTONG', 'ZK6118HGA', 'LZYTAGE6XG1007336', '2016', 44, 'Diesel', 1),
(65, 'BY-89', 'YUTONG', 'ZK6118HGA', 'LZYTAGE63G1007257', '2016', 44, 'Diesel', 0),
(66, 'BY-90', 'YUTONG', 'ZK6118HGA', 'LZYTAGE64G1007350', '2016', 44, 'Diesel', 0),
(67, 'BY-91', 'YUTONG', 'ZK6118HGA', 'LZYTAGE68G1007318', '2016', 44, 'Diesel', 1),
(68, 'BY-92', 'YUTONG', 'ZK6118HGA', 'LZYTAGE66G1007284', '2016', 44, 'Diesel', 0),
(69, 'BY-94', 'YUTONG', 'ZK6118HGA', 'LZYTAGE64G1007316', '2016', 44, 'Diesel', 0),
(70, 'BY-95', 'YUTONG', 'ZK6118HGA', 'LZYTAGE68G1007352', '2016', 44, 'Diesel', 0),
(71, 'BY-96', 'YUTONG', 'ZK6118HGA', 'LZYTAGE60G1007264', '2016', 44, 'Diesel', 0),
(72, 'BY-97', 'YUTONG', 'ZK6118HGA', 'LZYTAGE61G1007290', '2016', 44, 'Diesel', 1),
(73, 'BY-98', 'YUTONG', 'ZK6118HGA', 'LZYTAGE60G1007295', '2016', 44, 'Diesel', 1),
(74, 'BY-99', 'YUTONG', 'ZK6118HGA', 'LZYTAGE63G1007260', '2016', 44, 'Diesel', 1),
(75, 'BY-100', 'YUTONG', 'ZK6118HGA', 'LZYTAGE63G1007355', '2016', 44, 'Diesel', 1),
(76, 'BY-101', 'YUTONG', 'ZK6118HGA', 'LZYTAGE63G1007310', '2016', 44, 'Diesel', 0),
(77, 'BY-102', 'YUTONG', 'ZK6118HGA', 'LZYTAGE67G1007276', '2016', 44, 'Diesel', 0),
(78, 'BY-103', 'YUTONG', 'ZK6118HGA', 'LZYTAGE68G1007271', '2016', 44, 'Diesel', 1),
(79, 'BY-104', 'YUTONG', 'ZK6118HGA', 'LZYTAGE64G1021992', '2016', 44, 'Diesel', 1),
(80, 'BY-105', 'YUTONG', 'ZK6118HGA', 'LZYTAGEF4C1009366', '2012', 44, 'G.L.P', 1),
(81, 'BY-106', 'YUTONG', 'ZK6729D2', 'LZYTETC29K1039605', '2019', 25, 'Diesel', 1),
(82, 'BY-107', 'YUTONG', 'ZK6729D2', 'LZYTETC22K1039607', '2019', 25, 'Diesel', 1),
(83, 'BY-108', 'YUTONG', 'ZK6729D2', 'LZYTETC22K1041583', '2019', 25, 'Diesel', 1),
(84, 'BY-109', 'YUTONG', 'ZK6729D2', 'LZYTETC2XK1040973', '2019', 25, 'Diesel', 1),
(85, 'BY-110', 'YUTONG', 'ZK6729D2', 'LZYTETC25K1040279', '2019', 25, 'Diesel', 1),
(86, 'BY-111', 'YUTONG', 'ZK6729D2', 'LZYTETC29K1041340', '2019', 25, 'Diesel', 1),
(87, 'BY-112', 'YUTONG', 'ZK6729D2', 'LZYTETC24K1040998', '2019', 25, 'Diesel', 1),
(88, 'BY-113', 'YUTONG', 'ZK6729D2', 'LZYTETC22K1039610', '2019', 25, 'Diesel', 1),
(89, 'BY-114', 'YUTONG', 'ZK6729D2', 'LZYTETC2XK1041587', '2019', 25, 'Diesel', 1),
(90, 'BY-115', 'YUTONG', 'ZK6729D2', 'LZYTETC22K1041339', '2019', 25, 'Diesel', 1),
(91, 'BY-116', 'YUTONG', 'ZK6852HG', 'LZYTDGD60K1040685', '2019', 25, 'Diesel', 1),
(92, 'BY-117', 'YUTONG', 'ZK6852HG', 'LZYTDGD60K1040802', '2019', 25, 'Diesel', 1),
(93, 'BY-118', 'YUTONG', 'ZK6852HG', 'LZYTDGD6XK1040709', '2019', 25, 'Diesel', 1),
(94, 'BY-119', 'YUTONG', 'ZK6852HG', 'LZYTDGD68K1040742', '2019', 25, 'Diesel', 1),
(95, 'BY-120', 'YUTONG', 'ZK6852HG', 'LZYTDGD69K1040622', '2019', 25, 'Diesel', 1),
(96, 'BY-121', 'YUTONG', 'ZK6852HG', 'LZYTDGD62K1040655', '2019', 25, 'Diesel', 1),
(97, 'BY-122', 'YUTONG', 'ZK6852HG', 'LZYTDGD65K1040701', '2019', 25, 'Diesel', 1),
(98, 'BY-123', 'YUTONG', 'ZK6852HG', 'LZYTDGD61K1040761', '2019', 25, 'Diesel', 1),
(99, 'BY-124', 'YUTONG', 'ZK6852HG', 'LZYTDGD68K1040675', '2019', 25, 'Diesel', 1),
(100, 'BY-125', 'YUTONG', 'ZK6852HG', 'LZYTDGD61K1040680', '2019', 25, 'Diesel', 1),
(101, 'BY-143', 'YUTONG', 'ZK6729D2', 'LZYTETC26K1039562', '2019', 25, 'Diesel', 1),
(102, 'BY-144', 'YUTONG', 'ZK6729D2', 'LZYTETC26K1038640', '2019', 25, 'Diesel', 1),
(103, 'BY-145', 'YUTONG', 'ZK6729D2', 'LZYTETC28K1039515', '2019', 25, 'Diesel', 1),
(104, 'BY-146', 'YUTONG', 'ZK6729D2', 'LZYTETC22K1038618', '2019', 25, 'Diesel', 1),
(105, 'BY-147', 'YUTONG', 'ZK6729D2', 'LZYTETC25K1038449', '2019', 25, 'Diesel', 1),
(106, 'BY-148', 'YUTONG', 'ZK6852HG', 'LZYTDGD60L1036329', '2020', 25, 'Diesel', 1),
(107, 'BY-149', 'YUTONG', 'ZK6852HG', 'LZYTDGD66L1036349', '2020', 25, 'Diesel', 1),
(108, 'BY-150', 'YUTONG', 'ZK6852HG', 'LZYTDGD64L1036303', '2020', 25, 'Diesel', 1),
(109, 'BY-151', 'YUTONG', 'ZK6852HG', 'LZYTDGD6XM1040437', '2021', 25, 'Diesel', 1),
(110, 'BY-152', 'YUTONG', 'ZK6852HG', 'LZYTDGD67L1036330', '2020', 25, 'Diesel', 1),
(111, 'BY-153', 'YUTONG', 'ZK6118HGA', 'LZYTAGE64M1012267', '2021', 44, 'Diesel', 1),
(112, 'BY-154', 'YUTONG', 'ZK6118HGA', 'LZYTAGE63M1012289', '2021', 44, 'Diesel', 1),
(113, 'BY-155', 'YUTONG', 'ZK6118HGA', 'LZYTAGE60M1012301', '2021', 44, 'Diesel', 1),
(114, 'BY-156', 'YUTONG', 'ZK6118HGA', 'LZYTAGE67M1012330', '2021', 44, 'Diesel', 1),
(115, 'BY-001', 'YUTONG', 'ZK6896HGA', 'LZYTDGD66G1009383', '2016', 25, 'Diesel', 1),
(116, 'BY-002', 'YUTONG', 'ZK6896HGA', 'LZYTDGD65G1009326', '2016', 25, 'Diesel', 1),
(117, 'BY-003', 'YUTONG', 'ZK6896HGA', 'LZYTDGD64G1009334', '2016', 25, 'Diesel', 1),
(118, 'T-31', 'YUTONG', 'ZK6118HGA', 'LZYTAGEF5C1009425', '2012', 44, 'G.L.P', 1),
(119, 'T-040', 'YUTONG', 'ZK6118HGA', 'LZYTAGEF4C1009108', '2012', 44, 'G.L.P', 1),
(120, 'S/I', 'YUTONG', 'GRUA YTZ5257TQZ40EN', 'LZZ5BLMJ6EN899588', '2015', 2, 'Diesel', 1),
(121, 'BY-126', 'INTERNATIONAL', '3800T-444E', '434179723789', '2000', 37, 'Diesel', 1),
(122, 'BY-127', 'INTERNATIONAL', '3800T-466E', '1HVBBAAN3YH313232', '2000', 37, 'Diesel', 1),
(123, 'BY-128', 'INTERNATIONAL', '3800T-444E', '1HVBBABN5VH454992', '2000', 37, 'Diesel', 1),
(124, 'BY-129', 'FREITHLINE', '3800T-444E', '4UZ6CJAC21CG86976', '2000', 37, 'Diesel', 1),
(125, 'BY-130', 'FREITHLINE', '3800T-444E', '4UZ6CJAA51CG83634', '2000', 37, 'Diesel', 1),
(126, 'BY-131', 'FREITHLINE', '3800T-444E', '4UZ6CJAA11CG83484', '2000', 37, 'Diesel', 1),
(127, 'BY-132', 'INTERNATIONAL', '3800T-444E', '1HVBBABN3TH382509', '2000', 37, 'Diesel', 1),
(128, 'BY-133', 'FREITHLINE', '3800T-444E', '4UZ6CJAA7YCG78493', '2000', 37, 'Diesel', 1),
(129, 'BY-134', 'INTERNATIONAL', '3800T-444E', '1HVBBABN1W517023', '2000', 37, 'Diesel', 1),
(130, 'BY-135', 'INTERNATIONAL', '3800T-444E', '1HVBBABNXWH517022', '2000', 37, 'Diesel', 1),
(131, 'BY-136', 'INTERNATIONAL', '3800T-444E', '1HVBDAAL1VH454840', '2000', 37, 'Diesel', 1),
(132, 'BY-137', 'INTERNATIONAL', '3800T-444E', '1HVBBABN4VH516947', '2000', 37, 'Diesel', 1),
(133, 'BY-138', 'INTERNATIONAL', '3800T-444E', '1HVBBABN9YH313198', '2000', 37, 'Diesel', 1),
(134, 'BY-139', 'INTERNATIONAL', '3800T-444E', '1HVBBAANXYH340413', '2000', 37, 'Diesel', 1),
(135, 'BY-140', 'INTERNATIONAL', '3800T-444E', '4UZAAWAK72CJ95838', '2000', 37, 'Diesel', 1),
(136, 'BY-141', 'INTERNATIONAL', '3800T-444E', '1HVBBAAN6YH261739', '2000', 37, 'Diesel', 1),
(137, 'BY-142', 'INTERNATIONAL', '3800T-444E', '1HVBDZRK5RH561986', '2000', 37, 'Diesel', 1),
(138, 'S/I', 'INTERNATIONAL', '3600', '1HVBDABN3TH383184', '2000', 37, 'Diesel', 1),
(139, 'BY-157', 'INTERNATIONAL', '3600', '1HVBBAABN6TH383539', '2000', 37, 'Diesel', 1),
(140, 'BY-158', 'INTERNATIONAL', '3600', '1HVBBAAN74H301224', '2000', 37, 'Diesel', 1),
(141, 'BY-160', 'YUTONG', 'ZK6860HGA', 'LZYTDTC24M1036472', '2022', 25, 'Diesel', 1),
(142, 'BY-161', 'YUTONG', 'ZK6118HGA', 'LZYTAGE66M1032181', '2021', 44, 'Diesel', 1),
(143, 'BY-162', 'YUTONG', 'ZK6118HGA', 'LZYTAGE63M1032185', '2021', 44, 'Diesel', 1),
(144, 'SS-002', 'ENCAVA', 'ENT610', '8XL6UMBG0DG000049', '2013', 30, 'Diesel', 1),
(145, 'T-044', 'ENCAVA', 'ENT610', '8XL6UMBG3DG000059', '2013', 30, 'Diesel', 1),
(146, 'T-050', 'ENCAVA', 'ENT610', '8XL6AMBG3DG000040', '2013', 30, 'Diesel', 1),
(147, 'sd', 'YUTONG', 'ZK6896HGA', 'ererwe', '2015', 23, 'disel', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_menu`
--

CREATE TABLE `table_menu` (
  `id_menu` int(11) NOT NULL,
  `nombre_menu` varchar(45) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `icono` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `page_menu_open` varchar(20) DEFAULT NULL,
  `page_link` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `table_menu`
--

INSERT INTO `table_menu` (`id_menu`, `nombre_menu`, `descripcion`, `icono`, `status`, `page_menu_open`, `page_link`) VALUES
(1, 'Usuario', NULL, 'far fa-user', 1, 'usuario', 'usuarios'),
(2, 'Menu', NULL, 'fas fa-list-ul', 1, 'menu', 'menus'),
(3, 'Timeline', NULL, 'far fa-clock', 1, 'timelines', 'times');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_menu_sub_menu`
--

CREATE TABLE `table_menu_sub_menu` (
  `id_menu_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `table_menu_sub_menu`
--

INSERT INTO `table_menu_sub_menu` (`id_menu_sub_menu`, `id_menu`, `id_sub_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 3, 5),
(15, 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_modelo`
--

CREATE TABLE `table_modelo` (
  `id_modelo` int(11) NOT NULL,
  `modelo_unidad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `table_modelo`
--

INSERT INTO `table_modelo` (`id_modelo`, `modelo_unidad`) VALUES
(1, 'ZK6896HGA'),
(2, 'ZK6752D'),
(3, 'ZK6118HGA'),
(4, 'ZK6729D2'),
(5, 'ZK6852HG'),
(6, '3800T-444E'),
(7, '3600'),
(8, 'ZK6860HGA'),
(9, 'ENT610');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_roles`
--

CREATE TABLE `table_roles` (
  `rol_id` int(11) NOT NULL,
  `rol_name` varchar(45) DEFAULT NULL,
  `rol_descripcion` text DEFAULT NULL,
  `rol_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `table_roles`
--

INSERT INTO `table_roles` (`rol_id`, `rol_name`, `rol_descripcion`, `rol_status`) VALUES
(1, 'Administrador', 'administrador', 1),
(2, 'Encargado', 'encargado del sistema', 1),
(3, 'Provicional', 'Provicional', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_roles_sub_menu`
--

CREATE TABLE `table_roles_sub_menu` (
  `id_rol_sub_menu` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `table_roles_sub_menu`
--

INSERT INTO `table_roles_sub_menu` (`id_rol_sub_menu`, `id_rol`, `id_sub_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(16, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_timeline`
--

CREATE TABLE `table_timeline` (
  `time_id` int(11) NOT NULL,
  `time_idUser` int(11) DEFAULT NULL,
  `time_codigo` varchar(45) DEFAULT NULL,
  `time_fecha` varchar(20) DEFAULT NULL,
  `time_inicio` varchar(20) DEFAULT NULL,
  `time_fin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `table_timeline`
--

INSERT INTO `table_timeline` (`time_id`, `time_idUser`, `time_codigo`, `time_fecha`, `time_inicio`, `time_fin`) VALUES
(1, 1, 'biCod-1-yLFG', '2024-03-04', '9:43 am', '9:43 am'),
(2, 1, 'biCod-1-MlbE', '2024-03-04', '2:18 pm', '4:18 pm'),
(3, 1, 'biCod-1-77lV', '2024-03-04', '4:37 pm', NULL),
(4, 1, 'biCod-1-jCvu', '2024-03-04', '4:38 pm', '4:44 pm'),
(5, 1, 'biCod-1-mYzf', '2024-03-04', '4:44 pm', NULL),
(6, 1, 'biCod-1-Ef3Q', '2024-03-05', '2:32 pm', '2:33 pm'),
(7, 1, 'biCod-1-PmNX', '2024-03-05', '2:33 pm', '2:54 pm'),
(8, 1, 'biCod-1-e7IO', '2024-03-05', '3:13 pm', '3:14 pm'),
(9, 1, 'biCod-1-2Nwa', '2024-03-05', '3:14 pm', NULL),
(10, 1, 'biCod-1-xOuG', '2024-03-05', '4:34 pm', '4:34 pm'),
(11, 1, 'biCod-1-VOwa', '2024-03-06', '2:05 pm', NULL),
(12, 1, 'biCod-1-1QTb', '2024-03-07', '2:05 pm', NULL),
(13, 1, 'biCod-1-1J7v', '2024-03-07', '3:51 pm', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_unidad_mantenimiento`
--

CREATE TABLE `table_unidad_mantenimiento` (
  `id_unidad_mantenimiento` int(11) NOT NULL,
  `id_flota` int(11) NOT NULL,
  `ruta_unidad` text NOT NULL,
  `operardor_unidad` varchar(20) NOT NULL,
  `nomb_mecanico` varchar(20) NOT NULL,
  `km_unidad` varchar(20) NOT NULL,
  `tipo_mantenimiento` char(1) NOT NULL,
  `diagnostico` text NOT NULL,
  `recomendacion` text NOT NULL,
  `fecha_entrada` varchar(25) NOT NULL,
  `fecha_salida` varchar(25) NOT NULL,
  `status_mantenimiento` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `table_unidad_mantenimiento`
--

INSERT INTO `table_unidad_mantenimiento` (`id_unidad_mantenimiento`, `id_flota`, `ruta_unidad`, `operardor_unidad`, `nomb_mecanico`, `km_unidad`, `tipo_mantenimiento`, `diagnostico`, `recomendacion`, `fecha_entrada`, `fecha_salida`, `status_mantenimiento`) VALUES
(2, 4, 'daewrf', 'esfes', 'fesf', 'sef', 'c', '2024-02-29', 'sefd', 'sdfsd', 'sfe', '1'),
(3, 28, 'reyhrt', 'thdth', 'hdfh', 'dfhfdhfg', 'c', '2024-03-22', 'fghfd', 'hfdgh', 'rdgdg', '1'),
(4, 3, 'dsfsd', 'gfdsgdg', 'dfgdf', 'dfhgdfh', 'c', '2024-03-26', 'gdfgbdf', 'dgf', 'fgdg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_user`
--

CREATE TABLE `table_user` (
  `user_id` int(11) NOT NULL,
  `user_ci` int(11) DEFAULT NULL,
  `user_nick` varchar(50) DEFAULT NULL,
  `user_pass` text DEFAULT NULL,
  `user_nombres` varchar(50) DEFAULT NULL,
  `user_apellidos` varchar(50) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_tlf` varchar(20) DEFAULT NULL,
  `user_rol` int(11) DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `user_img` text DEFAULT NULL,
  `user_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_ruta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `table_user`
--

INSERT INTO `table_user` (`user_id`, `user_ci`, `user_nick`, `user_pass`, `user_nombres`, `user_apellidos`, `user_email`, `user_tlf`, `user_rol`, `user_status`, `user_img`, `user_registro`, `user_ruta`) VALUES
(1, 2000000, 'ADMIN', 'ODEvZ0hkUFRKQkkyenppY2puNXFKQT09', 'Admin', 'Admin', 'admin@admin', '5555555555', 1, 1, 'default.png', '2024-03-05 18:33:02', 'system/app/Views/Docs/AUN-01/'),
(2, 15769775, 'YUN-02', 'OCs4Z1hFT083MklFOU15V1NpMS9jdz09', 'Ybet', NULL, 'ybet@gmail.com', NULL, 3, 1, 'default.png', '2024-03-02 00:26:03', 'system/app/Views/Docs/YUN-02/'),
(3, 14607920, 'WUN-03', 'OCs4Z1hFT083MklFOU15V1NpMS9jdz09', 'William', NULL, 'william21enrique@gmail.com', NULL, 1, 2, 'default.png', '2024-03-02 18:34:25', 'system/app/Views/Docs/WUN-03/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_user_rol`
--

CREATE TABLE `table_user_rol` (
  `id_usuario_rol` int(11) NOT NULL,
  `user_nick` varchar(45) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `table_user_rol`
--

INSERT INTO `table_user_rol` (`id_usuario_rol`, `user_nick`, `id_rol`) VALUES
(1, 'ADMIN', 1),
(2, 'YUN-02', 3),
(3, 'WUN-03', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `v_timeline`
--

CREATE TABLE `v_timeline` (
  `login` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `inicio` varchar(20) DEFAULT NULL,
  `fin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `table_flota`
--
ALTER TABLE `table_flota`
  ADD PRIMARY KEY (`id_flota`);

--
-- Indices de la tabla `table_modelo`
--
ALTER TABLE `table_modelo`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `table_timeline`
--
ALTER TABLE `table_timeline`
  ADD PRIMARY KEY (`time_id`);

--
-- Indices de la tabla `table_unidad_mantenimiento`
--
ALTER TABLE `table_unidad_mantenimiento`
  ADD PRIMARY KEY (`id_unidad_mantenimiento`);

--
-- Indices de la tabla `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `table_user_rol`
--
ALTER TABLE `table_user_rol`
  ADD PRIMARY KEY (`id_usuario_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `table_flota`
--
ALTER TABLE `table_flota`
  MODIFY `id_flota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de la tabla `table_timeline`
--
ALTER TABLE `table_timeline`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `table_unidad_mantenimiento`
--
ALTER TABLE `table_unidad_mantenimiento`
  MODIFY `id_unidad_mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `table_user`
--
ALTER TABLE `table_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `table_user_rol`
--
ALTER TABLE `table_user_rol`
  MODIFY `id_usuario_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
