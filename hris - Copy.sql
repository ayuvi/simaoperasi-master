/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50638
 Source Host           : localhost:3306
 Source Schema         : hris

 Target Server Type    : MySQL
 Target Server Version : 50638
 File Encoding         : 65001

 Date: 16/02/2019 14:40:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for langs
-- ----------------------------
DROP TABLE IF EXISTS `langs`;
CREATE TABLE `langs` (
  `lang_srl` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inkomaro` varchar(200) NOT NULL,
  `english` varchar(500) DEFAULT NULL,
  `indonesian` varchar(500) DEFAULT NULL,
  `korean` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`lang_srl`) USING BTREE,
  UNIQUE KEY `inkomaro_UNIQUE` (`inkomaro`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of langs
-- ----------------------------
BEGIN;
INSERT INTO `langs` VALUES (1, 'Approval', 'Approval', 'Persetujuan', NULL);
COMMIT;

-- ----------------------------
-- Table structure for ref_bu
-- ----------------------------
DROP TABLE IF EXISTS `ref_bu`;
CREATE TABLE `ref_bu` (
  `id_bu` int(11) NOT NULL AUTO_INCREMENT,
  `kd_bu` varchar(255) DEFAULT NULL,
  `id_divre` int(11) DEFAULT NULL,
  `nm_bu` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_bu
-- ----------------------------
BEGIN;
INSERT INTO `ref_bu` VALUES (1, 'D1.001', 1, 'Banda Aceh', 1, 77);
INSERT INTO `ref_bu` VALUES (2, 'D1.002', 1, 'Bandar Lampung', 1, 77);
INSERT INTO `ref_bu` VALUES (3, 'D1.003', 1, 'Bandara Soekarno Hatta', 1, 77);
INSERT INTO `ref_bu` VALUES (4, 'D1.004', 1, 'Bandung', 1, 77);
INSERT INTO `ref_bu` VALUES (5, 'D1.005', 1, 'Batam', 1, 77);
INSERT INTO `ref_bu` VALUES (6, 'D1.006', 1, 'Bengkulu', 1, 77);
INSERT INTO `ref_bu` VALUES (7, 'D1.007', 1, 'Bogor', 1, 77);
INSERT INTO `ref_bu` VALUES (8, 'D1.008', 1, 'Jakarta', 1, 77);
INSERT INTO `ref_bu` VALUES (9, 'D1.009', 1, 'Jambi', 1, 77);
INSERT INTO `ref_bu` VALUES (10, 'D1.010', 1, 'Medan', 1, 77);
INSERT INTO `ref_bu` VALUES (11, 'D1.011', 1, 'Padang', 1, 77);
INSERT INTO `ref_bu` VALUES (12, 'D1.012', 1, 'Palembang', 1, 77);
INSERT INTO `ref_bu` VALUES (13, 'D1.013', 1, 'Pangkal Pinang', 1, 77);
INSERT INTO `ref_bu` VALUES (14, 'D1.014', 1, 'Pekanbaru', 1, 77);
INSERT INTO `ref_bu` VALUES (15, 'D1.015', 1, 'Serang', 1, 77);
INSERT INTO `ref_bu` VALUES (16, 'D1.016', 1, 'Koridor 1 & 8', 1, 77);
INSERT INTO `ref_bu` VALUES (17, 'D1.017', 1, 'Logistik', 1, 77);
INSERT INTO `ref_bu` VALUES (18, 'D2.001', 2, 'Banjarmasin', 1, 77);
INSERT INTO `ref_bu` VALUES (19, 'D2.002', 2, 'Cilacap', 1, 77);
INSERT INTO `ref_bu` VALUES (20, 'D2.003', 2, 'Palangkaraya', 1, 77);
INSERT INTO `ref_bu` VALUES (21, 'D2.004', 2, 'Pontianak', 1, 77);
INSERT INTO `ref_bu` VALUES (22, 'D2.005', 2, 'Purwokerto', 1, 77);
INSERT INTO `ref_bu` VALUES (23, 'D2.006', 2, 'Purworejo', 1, 77);
INSERT INTO `ref_bu` VALUES (24, 'D2.007', 2, 'Samarinda', 1, 77);
INSERT INTO `ref_bu` VALUES (25, 'D2.008', 2, 'Semarang', 1, 77);
INSERT INTO `ref_bu` VALUES (26, 'D2.009', 2, 'Surakarta', 1, 77);
INSERT INTO `ref_bu` VALUES (27, 'D2.010', 2, 'Tanjung Selor', 1, 77);
INSERT INTO `ref_bu` VALUES (28, 'D2.011', 2, 'Yogyakarta', 1, 77);
INSERT INTO `ref_bu` VALUES (29, 'D3.001', 3, 'Banyuwangi', 1, 77);
INSERT INTO `ref_bu` VALUES (30, 'D3.002', 3, 'Denpasar', 1, 77);
INSERT INTO `ref_bu` VALUES (31, 'D3.003', 3, 'Ende', 1, 77);
INSERT INTO `ref_bu` VALUES (32, 'D3.004', 3, 'Jember', 1, 77);
INSERT INTO `ref_bu` VALUES (33, 'D3.005', 3, 'Kefamenanu', 1, 77);
INSERT INTO `ref_bu` VALUES (34, 'D3.006', 3, 'Kendari', 1, 77);
INSERT INTO `ref_bu` VALUES (35, 'D3.007', 3, 'Kupang', 1, 77);
INSERT INTO `ref_bu` VALUES (36, 'D3.008', 3, 'Makassar', 1, 77);
INSERT INTO `ref_bu` VALUES (37, 'D3.009', 3, 'Malang', 1, 77);
INSERT INTO `ref_bu` VALUES (38, 'D3.010', 3, 'Mamuju', 1, 77);
INSERT INTO `ref_bu` VALUES (39, 'D3.011', 3, 'Mataram', 1, 77);
INSERT INTO `ref_bu` VALUES (40, 'D3.012', 3, 'Palu', 1, 77);
INSERT INTO `ref_bu` VALUES (41, 'D3.013', 3, 'Pamekasan', 1, 77);
INSERT INTO `ref_bu` VALUES (42, 'D3.014', 3, 'Ponorogo', 1, 77);
INSERT INTO `ref_bu` VALUES (43, 'D3.015', 3, 'Surabaya', 1, 77);
INSERT INTO `ref_bu` VALUES (44, 'D3.016', 3, 'Waingapu', 1, 77);
INSERT INTO `ref_bu` VALUES (45, 'D4.001', 4, 'Ambon', 1, 77);
INSERT INTO `ref_bu` VALUES (46, 'D4.002', 4, 'Biak', 1, 77);
INSERT INTO `ref_bu` VALUES (47, 'D4.003', 4, 'Gorontalo', 1, 77);
INSERT INTO `ref_bu` VALUES (48, 'D4.004', 4, 'Halmahera', 1, 77);
INSERT INTO `ref_bu` VALUES (49, 'D4.005', 4, 'Jayapura', 1, 77);
INSERT INTO `ref_bu` VALUES (50, 'D4.006', 4, 'Manado', 1, 77);
INSERT INTO `ref_bu` VALUES (51, 'D4.007', 4, 'Manokwari', 1, 77);
INSERT INTO `ref_bu` VALUES (52, 'D4.008', 4, 'Merauke', 1, 77);
INSERT INTO `ref_bu` VALUES (53, 'D4.009', 4, 'Mimika', 1, 77);
INSERT INTO `ref_bu` VALUES (54, 'D4.010', 4, 'Nabire', 1, 77);
INSERT INTO `ref_bu` VALUES (55, 'D4.011', 4, 'Namlea', 1, 77);
INSERT INTO `ref_bu` VALUES (56, 'D4.012', 4, 'Sarmi', 1, 77);
INSERT INTO `ref_bu` VALUES (57, 'D4.013', 4, 'Serui', 1, 77);
INSERT INTO `ref_bu` VALUES (58, 'D4.014', 4, 'Sorong', 1, 77);
INSERT INTO `ref_bu` VALUES (59, 'D4.015', 4, 'Sorong Selatan', 1, 77);
INSERT INTO `ref_bu` VALUES (60, 'D0.001', 5, 'Kantor Pusat', 1, 77);
INSERT INTO `ref_bu` VALUES (61, 'D1', 1, 'Divre 1', 1, 77);
INSERT INTO `ref_bu` VALUES (62, 'D2', 2, 'Divre 2', 1, 77);
INSERT INTO `ref_bu` VALUES (63, 'D3', 3, 'Divre 3', 1, 77);
INSERT INTO `ref_bu` VALUES (64, 'D4', 4, 'Divre 4', 1, 77);
INSERT INTO `ref_bu` VALUES (65, 'D1.018', 1, 'Koridor 11', 1, 77);
COMMIT;

-- ----------------------------
-- Table structure for ref_bu_access
-- ----------------------------
DROP TABLE IF EXISTS `ref_bu_access`;
CREATE TABLE `ref_bu_access` (
  `id_bu_access` int(11) NOT NULL AUTO_INCREMENT,
  `id_bu` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `active` tinyint(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bu_access`) USING BTREE,
  UNIQUE KEY `uq_bu_access` (`id_bu`,`id_user`,`id_perusahaan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_bu_access
-- ----------------------------
BEGIN;
INSERT INTO `ref_bu_access` VALUES (1, 1, 1, 1, 77);
INSERT INTO `ref_bu_access` VALUES (2, 2, 1, 1, 77);
INSERT INTO `ref_bu_access` VALUES (3, 1, 5, 1, 77);
INSERT INTO `ref_bu_access` VALUES (4, 2, 3, 1, 77);
INSERT INTO `ref_bu_access` VALUES (5, 1, 6, 1, 77);
INSERT INTO `ref_bu_access` VALUES (6, 2, 7, 1, 77);
INSERT INTO `ref_bu_access` VALUES (7, 60, 1, 1, 77);
COMMIT;

-- ----------------------------
-- Table structure for ref_divre
-- ----------------------------
DROP TABLE IF EXISTS `ref_divre`;
CREATE TABLE `ref_divre` (
  `id_divre` int(11) NOT NULL AUTO_INCREMENT,
  `kd_divre` varchar(255) DEFAULT NULL,
  `nm_divre` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_divre`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_divre
-- ----------------------------
BEGIN;
INSERT INTO `ref_divre` VALUES (1, NULL, 'Divre I', 1, 77);
INSERT INTO `ref_divre` VALUES (2, NULL, 'Divre II', 1, 77);
INSERT INTO `ref_divre` VALUES (3, NULL, 'Divre III', 1, 77);
INSERT INTO `ref_divre` VALUES (4, NULL, 'Divre IV', 1, 77);
INSERT INTO `ref_divre` VALUES (5, NULL, 'PUSAT', 1, 77);
COMMIT;

-- ----------------------------
-- Table structure for ref_golongan
-- ----------------------------
DROP TABLE IF EXISTS `ref_golongan`;
CREATE TABLE `ref_golongan` (
  `id_golongan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_golongan` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_golongan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_golongan
-- ----------------------------
BEGIN;
INSERT INTO `ref_golongan` VALUES (1, 'PKP', 1, 77);
INSERT INTO `ref_golongan` VALUES (2, 'I/A', 1, 77);
INSERT INTO `ref_golongan` VALUES (3, 'I/B', 1, 77);
INSERT INTO `ref_golongan` VALUES (4, 'I/C', 1, 77);
INSERT INTO `ref_golongan` VALUES (5, 'I/D', 1, 77);
INSERT INTO `ref_golongan` VALUES (6, 'II/A', 1, 77);
INSERT INTO `ref_golongan` VALUES (7, 'II/B', 1, 77);
INSERT INTO `ref_golongan` VALUES (8, 'II/C', 1, 77);
INSERT INTO `ref_golongan` VALUES (9, 'II/D', 1, 77);
INSERT INTO `ref_golongan` VALUES (10, 'III/A', 1, 77);
INSERT INTO `ref_golongan` VALUES (11, 'III/B', 1, 77);
INSERT INTO `ref_golongan` VALUES (12, 'III/C', 1, 77);
INSERT INTO `ref_golongan` VALUES (13, 'III/D', 1, 77);
INSERT INTO `ref_golongan` VALUES (14, 'IV/A', 1, 77);
INSERT INTO `ref_golongan` VALUES (15, 'IV/B', 1, 77);
INSERT INTO `ref_golongan` VALUES (16, 'IV/C', 1, 77);
INSERT INTO `ref_golongan` VALUES (17, 'IV/D', 1, 77);
COMMIT;

-- ----------------------------
-- Table structure for ref_indikator
-- ----------------------------
DROP TABLE IF EXISTS `ref_indikator`;
CREATE TABLE `ref_indikator` (
  `id_indikator` int(11) NOT NULL AUTO_INCREMENT,
  `nm_indikator` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_indikator`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_indikator
-- ----------------------------
BEGIN;
INSERT INTO `ref_indikator` VALUES (9, 'KEPUASAN KERJA TERHADAP LINGKUP PEKERJAAN', 1, 77);
INSERT INTO `ref_indikator` VALUES (10, 'KEPUASAN KERJA TERHADAP IMBALAN KERJA', 1, 77);
INSERT INTO `ref_indikator` VALUES (11, 'KEPUASAN KERJA TERHADAP SUPERVISI ATASAN', 1, 77);
INSERT INTO `ref_indikator` VALUES (12, 'KEPUASAN KERJA TERHADAP REKAN KERJA', 1, 77);
INSERT INTO `ref_indikator` VALUES (13, 'KEPUASAN KERJA TERHADAP PROMOSI', 1, 77);
COMMIT;

-- ----------------------------
-- Table structure for ref_keluarga
-- ----------------------------
DROP TABLE IF EXISTS `ref_keluarga`;
CREATE TABLE `ref_keluarga` (
  `id_keluarga` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `ktp_keluarga` varchar(255) DEFAULT NULL,
  `nm_keluarga` varchar(255) DEFAULT NULL,
  `jk_keluarga` varchar(1) DEFAULT NULL,
  `tmp_lahir_keluarga` varchar(255) DEFAULT NULL,
  `tgl_lahir_keluarga` date DEFAULT NULL,
  `status_keluarga` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_keluarga`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_keluarga
-- ----------------------------
BEGIN;
INSERT INTO `ref_keluarga` VALUES (4, 158, '78970', 'Keiko Alodia Noenda', 'P', 'Purworejo', '2019-02-07', 'ANAK', 1, '2019-02-07 16:54:13', 1, 77);
COMMIT;

-- ----------------------------
-- Table structure for ref_level
-- ----------------------------
DROP TABLE IF EXISTS `ref_level`;
CREATE TABLE `ref_level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nm_level` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1.active\n2.deactive',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT '0',
  PRIMARY KEY (`id_level`) USING BTREE,
  KEY `fk_id_user_ref_level_idx` (`cuser`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_level
-- ----------------------------
BEGIN;
INSERT INTO `ref_level` VALUES (1, 'Super Admin', 1, '2018-09-17 13:29:04', 1, 77);
INSERT INTO `ref_level` VALUES (2, 'User', 1, '2018-12-19 23:22:36', 2, 77);
COMMIT;

-- ----------------------------
-- Table structure for ref_menu_details
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu_details`;
CREATE TABLE `ref_menu_details` (
  `id_menu_details` int(11) NOT NULL AUTO_INCREMENT,
  `kd_menu_details` varchar(10) DEFAULT NULL,
  `nm_menu_details` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. active\n2. deactive\n',
  `position` tinyint(2) DEFAULT NULL,
  `id_menu_groups` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu_details`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_menu_details
-- ----------------------------
BEGIN;
INSERT INTO `ref_menu_details` VALUES (1, 'S01', 'Level', 'level', 1, 1, 1, '2016-03-13 19:38:05', NULL);
INSERT INTO `ref_menu_details` VALUES (2, 'S02', 'User', 'user', 1, 2, 1, '2016-03-13 19:38:05', NULL);
INSERT INTO `ref_menu_details` VALUES (3, 'S03', 'Cabang', 'bu', 1, 3, 1, '2018-09-17 13:45:40', NULL);
INSERT INTO `ref_menu_details` VALUES (6, 'S04', 'Divre', 'divre', 1, 4, 1, '2018-09-17 16:54:50', NULL);
INSERT INTO `ref_menu_details` VALUES (22, 'S10', 'Pegawai', 'pegawai', 1, 1, 2, '2019-02-06 08:33:46', NULL);
INSERT INTO `ref_menu_details` VALUES (23, 'S11', 'Absensi', 'absensi', 1, 1, 6, '2019-02-06 08:35:04', NULL);
INSERT INTO `ref_menu_details` VALUES (24, 'S05', 'Indikator', 'indikator', 1, 1, 7, '2019-02-15 06:41:41', NULL);
INSERT INTO `ref_menu_details` VALUES (25, 'S06', 'Template Indikator', 'indikator_template', 1, 2, 7, '2019-02-15 06:48:21', NULL);
COMMIT;

-- ----------------------------
-- Table structure for ref_menu_details_access
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu_details_access`;
CREATE TABLE `ref_menu_details_access` (
  `id_menu_details_access` int(11) NOT NULL AUTO_INCREMENT,
  `id_level` int(11) DEFAULT NULL,
  `id_menu_details` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. active\n2. deactive\n',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT '0',
  PRIMARY KEY (`id_menu_details_access`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_menu_details_access
-- ----------------------------
BEGIN;
INSERT INTO `ref_menu_details_access` VALUES (1, 1, 1, 1, '2018-09-17 13:29:04', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (2, 1, 2, 1, '2018-09-17 13:29:04', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (3, 1, 3, 1, '2018-09-17 13:45:40', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (6, 1, 6, 1, '2018-09-17 16:54:50', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (13, 2, 1, 0, '2018-12-19 23:22:36', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (14, 2, 2, 0, '2018-12-19 23:22:36', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (15, 2, 3, 0, '2018-12-19 23:22:36', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (18, 2, 6, 0, '2018-12-19 23:22:36', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (43, 1, 22, 1, '2019-02-06 08:33:46', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (44, 2, 22, 0, '2019-02-06 08:33:46', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (45, 1, 23, 1, '2019-02-06 08:35:04', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (46, 2, 23, 0, '2019-02-06 08:35:04', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (47, 1, 24, 1, '2019-02-15 06:41:41', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (48, 2, 24, 0, '2019-02-15 06:41:41', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (49, 1, 25, 1, '2019-02-15 06:48:21', NULL, 77);
INSERT INTO `ref_menu_details_access` VALUES (50, 2, 25, 0, '2019-02-15 06:48:21', NULL, 77);
COMMIT;

-- ----------------------------
-- Table structure for ref_menu_groups
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu_groups`;
CREATE TABLE `ref_menu_groups` (
  `id_menu_groups` int(11) NOT NULL AUTO_INCREMENT,
  `nm_menu_groups` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1.active\n2. deactive',
  `position` tinyint(2) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu_groups`) USING BTREE,
  KEY `fk_id_user_ref_menu_groups_idx` (`cuser`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_menu_groups
-- ----------------------------
BEGIN;
INSERT INTO `ref_menu_groups` VALUES (1, 'Settings', 'fa fa-wrench', 1, 4, '2016-03-13 19:38:05', 1);
INSERT INTO `ref_menu_groups` VALUES (2, 'Master', 'fa fa-database', 1, 2, '2016-03-13 19:38:05', 1);
INSERT INTO `ref_menu_groups` VALUES (3, 'Inspeksi', 'fa fa-calendar-check-o', 1, 5, '2018-01-25 09:55:34', 1);
INSERT INTO `ref_menu_groups` VALUES (4, 'Report', 'fa fa-steam', 1, 3, '2018-03-08 14:27:40', 1);
INSERT INTO `ref_menu_groups` VALUES (5, 'Pertanyaan', 'fa fa-calendar-check-o', 1, 1, '2018-12-17 14:09:01', 1);
INSERT INTO `ref_menu_groups` VALUES (6, 'Absensi', 'fa fa-users', 1, 6, '2019-02-06 08:34:55', 1);
INSERT INTO `ref_menu_groups` VALUES (7, 'KPI', 'fa fa-key', 1, 7, '2019-02-15 06:43:30', 1);
COMMIT;

-- ----------------------------
-- Table structure for ref_menu_groups_access
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu_groups_access`;
CREATE TABLE `ref_menu_groups_access` (
  `id_menu_groups_access` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_groups` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. Active\n2. Deactive',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT '0',
  PRIMARY KEY (`id_menu_groups_access`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_menu_groups_access
-- ----------------------------
BEGIN;
INSERT INTO `ref_menu_groups_access` VALUES (1, 1, 1, 1, '2018-09-17 13:29:04', 1, 77);
INSERT INTO `ref_menu_groups_access` VALUES (2, 2, 1, 1, '2018-09-17 13:29:04', 1, 77);
INSERT INTO `ref_menu_groups_access` VALUES (3, 3, 1, 0, '2018-09-17 13:29:04', 1, 77);
INSERT INTO `ref_menu_groups_access` VALUES (4, 4, 1, 0, '2018-09-17 13:29:04', 1, 77);
INSERT INTO `ref_menu_groups_access` VALUES (5, 5, 1, 0, '2018-12-17 14:09:01', 1, 77);
INSERT INTO `ref_menu_groups_access` VALUES (6, 1, 2, 0, '2018-12-19 23:22:36', NULL, 77);
INSERT INTO `ref_menu_groups_access` VALUES (7, 2, 2, 0, '2018-12-19 23:22:36', NULL, 77);
INSERT INTO `ref_menu_groups_access` VALUES (8, 3, 2, 0, '2018-12-19 23:22:36', NULL, 77);
INSERT INTO `ref_menu_groups_access` VALUES (9, 4, 2, 0, '2018-12-19 23:22:36', NULL, 77);
INSERT INTO `ref_menu_groups_access` VALUES (10, 5, 2, 1, '2018-12-19 23:22:36', NULL, 77);
INSERT INTO `ref_menu_groups_access` VALUES (11, 6, 1, 1, '2019-02-06 08:34:55', 1, 77);
INSERT INTO `ref_menu_groups_access` VALUES (12, 6, 2, 0, '2019-02-06 08:34:55', 1, 77);
INSERT INTO `ref_menu_groups_access` VALUES (13, 7, 1, 1, '2019-02-15 06:43:30', NULL, 77);
INSERT INTO `ref_menu_groups_access` VALUES (14, 7, 2, 0, '2019-02-15 06:43:30', NULL, 77);
INSERT INTO `ref_menu_groups_access` VALUES (15, 8, 1, 0, '2019-02-15 06:43:33', NULL, 77);
INSERT INTO `ref_menu_groups_access` VALUES (16, 8, 2, 0, '2019-02-15 06:43:33', NULL, 77);
COMMIT;

-- ----------------------------
-- Table structure for ref_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `ref_pegawai`;
CREATE TABLE `ref_pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nm_pegawai` varchar(255) DEFAULT NULL,
  `nik_pegawai` varchar(255) DEFAULT NULL,
  `ktp_pegawai` varchar(255) DEFAULT NULL,
  `jk_pegawai` varchar(2) DEFAULT NULL,
  `tmp_lahir_pegawai` varchar(255) DEFAULT NULL,
  `tgl_lahir_pegawai` date DEFAULT NULL,
  `tgl_masuk_pegawai` date DEFAULT NULL,
  `pendidikan_pegawai` varchar(255) DEFAULT NULL,
  `jurusan_pegawai` varchar(255) DEFAULT NULL,
  `alamat_pegawai` text,
  `agama_pegawai` varchar(255) DEFAULT NULL,
  `status_pegawai` varchar(255) DEFAULT NULL,
  `tlp_pegawai` varchar(255) DEFAULT NULL,
  `bpjs_kes_pegawai` varchar(255) DEFAULT NULL,
  `bpjs_tk_pegawai` varchar(255) DEFAULT NULL,
  `taspen_pegawai` varchar(255) DEFAULT NULL,
  `email_pegawai` varchar(255) DEFAULT NULL,
  `no_cp_pegawai` varchar(255) DEFAULT NULL,
  `tgl_cp_pegawai` date DEFAULT NULL,
  `no_pp_pegawai` varchar(255) DEFAULT NULL,
  `tgl_pp_pegawai` date DEFAULT NULL,
  `gol_pegawai` varchar(255) DEFAULT NULL,
  `status_golongan` varchar(255) DEFAULT NULL,
  `pasangan_pegawai` tinyint(2) DEFAULT '0',
  `anak_pegawai` tinyint(2) DEFAULT '0',
  `jabatan_pegawai` varchar(255) DEFAULT NULL,
  `tahun_pegawai` int(11) DEFAULT NULL,
  `bulan_pegawai` int(11) DEFAULT NULL,
  `gaji_pokok_pegawai` double DEFAULT NULL,
  `id_bu` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `no_mesin` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `cuser` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_pegawai
-- ----------------------------
BEGIN;
INSERT INTO `ref_pegawai` VALUES (1, 'JONI HENDRI, SH', '65925991', '3175030403650000', 'L', 'Kampung Tengah', '1965-03-04', '1992-12-01', 'S1', NULL, 'Jl. Otista I A No.2 RT 007/001, Bidara cina, Jakarta Timur.', 'ISLAM', 'pkwtt', '0', '0002217969742', '05J80166381', '\'F6592059910', 'jonihendri@yahoo.com', '310/KP.301/DAMRI-1992', '1992-12-08', '0', NULL, 'IV/D', 'PP', 1, 3, 'Kepala Divisi Komersial dan Pemasaran', 26, 1, 3706600, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (2, 'HUSNI HUSIN', '63854335', '1401050205630002', 'L', 'Ms. Tanjong Juli', '1963-05-02', '1985-03-01', 'S1', NULL, NULL, 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '81/KP.401/DAMRI-1988', '0000-00-00', '90/KP.401/DAMRI-1990', '0000-00-00', 'III/D', 'PP', 1, 2, 'MPP', 28, 10, 3416100, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (3, 'CAHYO EDY SULISTYO', '63854336', '954080404630448', 'L', 'Magetan', '1963-04-04', '1985-01-03', 'SMA', NULL, 'Cipinang Asem RT 001/002, Kebon pala, Makasar, Jakarta timur.', 'ISLAM', 'pkwtt', NULL, '0001128763315', '05J80148504', '\'F6385043360', NULL, '82/KP.401/DAMRI-1988', '1988-05-02', '32/KP.401/DAMRI-1990', '1990-02-15', 'III/D', 'PP', 0, 0, 'Kepala Divisi Akuntansi', 29, 1, 3253500, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (4, 'MUHDIDIN, SE, MM', '64834499', '1050100706640004', 'L', 'Bandung', '1964-06-07', '1983-11-10', 'S1', NULL, 'Cipicung I No 52/126F, Rt.006, Rw.002, Kel. Kebon Gedang, Kec. Batununggal, Bandung, Jawa Barat', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '229/KP.401-306/DAMRI-1988', '0000-00-00', '119/KP.301/DAMRI-1991', '0000-00-00', 'III/B', 'PP', 1, 1, 'Pemeriksa Bidang Operasi ', 30, 2, 3164400, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (5, 'KAMALI, SE, MM', '68936580', '3216062911680002', 'L', 'Tegal', '1968-09-12', '1993-10-01', 'S2', NULL, 'Villa Bekasi Indah 2 G.8/8, RT 005.011 Sumber Jaya, Tambun Selatan, Kab Bekasi.', 'ISLAM', 'pkwtt', NULL, '0001131235547', '05J80148942', '\'F6893065800', NULL, '546/KP.301/DAMRI-1993', '1993-10-01', '523/KP.301/DAMRI-1994', '1994-10-01', 'IV/A', 'PP', 0, 2, 'Kepala Divisi Pelayanan dan Keselamatan', 23, 3, 3078500, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (6, 'ERI UNTARI DEWI, SE', '68967858', '3174087103680001', 'P', 'Jakarta', '1968-03-31', '1996-01-01', 'S1', NULL, 'Benteng Garuda No.30, Rt.012, Rw.004, Kel. Kalibata, kec. Pancoran, Jakarta Selatan', 'ISLAM', 'pkwtt', NULL, NULL, '05J80148744', NULL, NULL, '823/KP.301/DAMRI-1995', '0000-00-00', '278/KP.301/DAMRI-1997', '0000-00-00', 'IV/A', 'PP', 1, 0, 'Pel. Adm. Renlitbang & TI', 23, 0, 3078500, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (7, 'SUBKI', '63854755', '3276110303630001', 'L', 'Jakarta', '1963-03-03', '1985-12-01', 'SMA', NULL, 'Jl. Gg Srikaya No. 15, RT 007/005 Utan kayu, Matraman, Jakarta Timur.', 'ISLAM', 'pkwtt', NULL, '0001128844642', '05J80149395', '\'F6385047550', NULL, '161/KP.301/DAMRI-1989', '1989-06-30', '08/KP.301/DAMRI-1992', '1992-01-09', 'III/B', 'PP', 1, 1, 'Kepala Subdivisi Tata Kelola Perusahaan dan Tata Usaha', 28, 1, 3070100, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (8, 'Drs. GIYARNO', '68885515', '3204051810680005', 'L', 'Gunung Kidul', '1968-10-18', '1988-01-10', 'S1', NULL, 'Komp. Polda Gunung Jati, RT 005/010 Cimekar, Cileunyi Bandung, Jawa barat.', 'ISLAM', 'pkwtt', NULL, '0001128792205', '05J80155699', '\'F6888055150', NULL, '282/KP.301/DAMRI-1991', '1991-10-08', '28/KP.301/DAMRI-1995', '1995-10-20', 'III/D', 'PP', 1, 1, 'Kepala Subdivisi Perawatan dan Pemeliharaan', 25, 3, 3047000, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (9, 'KRIS PERMONO, SE, MM', '63895294', '3175021203620006', 'L', 'Jakarta', '1963-03-12', '1989-03-01', 'S2', NULL, 'Jl. Sumur Batu No 7, Rt.007, Rw.005, Kel. Cempaka Baru, Kec. Kemayoran, Jakarta Pusat', 'ISLAM', 'pkwtt', NULL, '0001128786838', NULL, NULL, NULL, '299/KP.301/DAMRI-1990', '0000-00-00', '08/KP.301/DAMRI-2018', '0000-00-00', 'III/D', 'PP', 1, 2, 'MPP', 24, 10, 3047000, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (10, 'KANTI RUSNI', '65875397', '3175024704651001', 'P', 'Solo', '1965-04-07', '1987-11-06', 'S1', NULL, 'Jl. Pisangan Lama 3/32, Rt.005, Rw. 011, Kel. Pisangan, Jakarta Timur', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '51/KP.301-206/DAMRI-1991', '0000-00-00', '01/KP.301/DAMRI-1994', '0000-00-00', 'III/B', 'PP', 1, 0, 'Pemeriksa Bidang Operasi ', 26, 2, 2975600, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (11, 'HADI PURYANTO', '64885701', '0950031110640326', 'L', 'Surabaya', '1964-10-11', '1988-07-01', 'SMA', NULL, 'Rusun Dakota I A/303, Rt.001, Rw.011, Kel. Kebon Kosong, Kec. Kemayoran, Jakarta Pusat', 'ISLAM', '0', '', '', '', '', 'puryanto1064@yahoo.co.id', '09/KP.301-206/DAMRI-1992', '0000-00-00', '', '0000-00-00', 'III/B', 'PP', 1, 1, 'Pel. Adm. Teknik Pemeliharaan ', 30, 7, 2881300, 60, 77, 0, 1, 1, '2019-02-06 10:26:48');
INSERT INTO `ref_pegawai` VALUES (12, 'NARDI, SE.M.MTr', '70927706', '3302182601700001', 'L', 'Banyumas', '1970-01-26', '1992-01-01', 'S2', NULL, 'Kediri, RT 002/001 Kec. Karanglewas, Kab. Banyumas, Jawa Tengah.', 'ISLAM', 'pkwtt', NULL, '0001128810778', '05J80178451', '\'F7092077060', NULL, '21/KP.301/DAMRI-II/1995.PP', '1995-11-23', '16/KP.301/DAMRI-II/1998', '1998-09-03', 'III/C', 'PP', 1, 2, 'Kepala Divisi Perawatan dan Pemeliharaan', 22, 0, 2861300, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (13, 'SUMALI, SE,MM', '72947670', '3578042808700007', 'L', 'Magetan', '1972-08-28', '1994-01-03', 'S2', NULL, 'Ngagel Tirto 3/72, RT 005/003 Ngagelrejo, Wonokromo, Surabaya. ', 'ISLAM', 'pkwtt', NULL, '0001128869752', '05J80193732', '\'F7294076700', NULL, '116/KP.301/DAMRI-1995', '1995-09-28', '81/KP.301/DAMRI-1997', '1997-08-25', 'III/C', 'PP', 1, 2, 'Kepala Divisi Keuangan', 20, 0, 2840600, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (14, 'TARYONO, S.Pd, M.MTr', '71979300', '327', 'L', 'Boyolali', '1971-04-15', '1997-12-08', 'S2', NULL, 'Bekasi timur regency RT 008/015, Cimuning, Mustika jaya, Bekasi.', 'ISLAM', 'pkwtt', '0', '0001128791654', '05J80149619', '\'F7197093000', '0', '194/KP.301/DAMRI-1999', '1999-03-25', '2208/KP.3301/DAMRI-2000', '2000-07-01', 'III/D', 'PP', 0, 0, 'Kepala Divisi Audit Intern', 21, 1, 2840600, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (15, 'HERNANDO', '70906615', '3216021806700004', 'L', 'Makassar', '1970-06-18', '1990-01-01', 'S1', NULL, 'Vila Mutiara Gading 3 Blok D7 No.11, Rt.007, Rw.019, Kel. Kebalen, Kec. Babelan, Kab. Bekasi, Jawa Barat', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '523/KP.301/DAMRI-1993', '0000-00-00', '14/KP.301/DAMRI-1997', '0000-00-00', 'III/A', 'PP', 1, 3, 'Kepala Subdivisi pengadaan Bidang Teknologi Informasi', 24, 0, 2785700, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (16, 'MULYADI, S.Kom., MM', '75938232', '3275032311750011', 'L', 'Klaten', '1975-06-23', '1993-01-01', 'S2', NULL, 'Jl. Damai I No 28, Rt.003, Rw.020, Kel. Harapan Jaya, Kec. Bekasi Utara, Kota Bekasi', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '427/KP.301/DAMRI-1996', '0000-00-00', '1158/KP.301/DAMRI-1998', '0000-00-00', 'III/B', 'PP', 1, 3, 'Kepala Subdivisi Pemasaran', 21, 1, 2762600, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (17, 'YANTO HERYANTO, SH, MM', '71937829', '3175020711710008', 'L', 'Ciamis', '1971-11-07', '1993-07-01', 'S2', NULL, 'Kp.Sawah, RT 006/RW 01 Jatimurni, Pondok Melati, Bekasi, Jawa Barat. ', 'ISLAM', 'pkwtt', NULL, '0001128796176', '05J80149726', '\'F7193078290', NULL, '27/KP.301/DAMRI-1995.PP', '1995-12-15', '13/KP.301/DAMRI-II/2001', '2001-09-05', 'III/C', 'PP', 1, 1, 'Pengawas Intern Area IV', 20, 6, 2762600, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (18, 'ARDINI DEWI CIPTANTI, SE,M.MTr', '72999575', '3174045810720006', 'P', 'Jakarta', '1972-10-18', '1999-01-01', 'S2', NULL, 'Jl. Rawa bambu 1F, No.10 Rt 009/006, Pasar minggu, Jakarta selatan.', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '1587/KP.301/DAMRI-2000', '2000-06-05', '099/KP.301/DAMRI/2001', '2001-02-22', 'III/C', 'PP', 1, 2, 'Kepala Subdivisi Manajemen Aset', 18, 0, 2737400, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (19, 'AGUS SETIAWAN ', '72937676', '3276052708720001', 'L', 'Jakarta', '1972-08-27', '1993-07-08', 'S1', NULL, 'Burangrang 04/99, Rt.004, Rw. 008, Kel. Abadijaya, Kec. Sukmajaya, Kota Depok', 'ISLAM', 'pkwtt', '082113583788', NULL, NULL, NULL, NULL, '548/KP.301/DAMRI-1995', '0000-00-00', '220/KP.301/DAMRI-1997', '0000-00-00', 'III/B', 'PP', 1, 2, 'Kepala Subdivisi Adm. Keuangan dan Perbendaharaan', 20, 6, 2692500, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (20, 'AGUS SETIONO, SH, MH', '66959151', '3216061508660000', 'L', 'Klaten', '1966-08-15', '1995-06-01', 'S2', NULL, 'Bekasi timur permai F.4/11, RT 016/012, Setiamekar,Tambun Selatan, Kab Bekasi, Jawa Barat.', 'ISLAM', 'pkwtt', NULL, '0001131250972', '05J80148371', '\'F6695091510', NULL, '1280/KP.301/DAMRI-1998', '1998-08-05', NULL, NULL, 'III/C', 'PP', 1, 3, 'Kepala Divisi Umum', 18, 7, 2663800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (21, 'S. SUYANTO, SE', '71927042', '953053004717017', 'L', 'Kebumen', '1971-04-30', '1992-08-10', 'S1', NULL, 'Jl. Bungur Kampung Duku No. 20, RT 005/012, Kebayoran lama, Jakarta Selatan.', 'ISLAM', 'pkwtt', NULL, '0001128791441', '05J80149288', '\'F7192070420', NULL, '05/KP.301-206/DAMRI-1994', '1994-10-17', '01/KP.301/DAMRI-1996', '1996-01-17', 'III/A', 'PP', 1, 3, 'Kepala Divisi Operasi', 21, 5, 2609900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (22, 'YANI PRATIWI, SE', '71958498', '3176076601710021', 'P', 'Jakarta', '1971-01-15', '1995-08-01', 'S1', NULL, 'Kp. Kandang Sapi, Rt.008, Rw.004, Kel. Duren Sawit, Kec. Duren Sawit, Jakarta Timur', 'KATOLIK', 'pkwtt', NULL, NULL, NULL, NULL, 'veronikayani@gmail.com', '218/KP.301/DAMRI-1997', '0000-00-00', '2393/KP.301/DAMRI-1998', '0000-00-00', 'III/B', 'PP', 1, 1, 'Pemeriksa Bidang Keuangan', 18, 9, 2598200, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (23, 'ZULKIFLI MASLOMAN, SE', '71959005', '7171050709710021', 'L', 'Manado', '1971-09-07', '1995-05-05', 'S1', NULL, 'Mountain View Residence Blok B.2 No. 02 Lingk II, Rt.00, Rw.002,Kel. Paniki Bawah, Kec. Mapanget, Kota Manado, Sulawesi Utara', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '752/KP.301/DAMRI-1998', '0000-00-00', '064/KP.301/DAMRI-2001', '0000-00-00', 'III/B', 'PP', 1, 3, 'Kepala Subdivisi layanan pengadaan bidang alat produksi', 18, 8, 2598200, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (24, 'SETYO PRAYITNO, S.Pd', '729610201', '3175061506720016', 'L', 'Rejosari/Demak', '1972-06-15', '1996-05-01', 'S1', NULL, 'Komp TWP TNI AL. Blok D.30/3, Rt.008, Rw.020, Kec. Gunung Putri, Bogor, Jawa Barat', 'ISLAM', 'pkwtt', '085238012076', NULL, NULL, NULL, 'setyoprayitno972@gmail.com', '11/Kp.301-206/DAMRI-2001', '0000-00-00', '09/KP.301/DAMRI-2004', '0000-00-00', 'III/B', 'PP', 1, 3, 'Pel. Adm. Keselamatan & Manj.Resiko', 18, 8, 2598200, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (25, 'SOBRIYANTO, A.Md', '74948211', '3173050906740006', 'L', 'Ngunang', '1974-06-09', '1994-07-09', 'D3', NULL, 'Jl. Musyawarah No.21, Rt.005, Rw.002, Kel. Kebon Jeruk, Kec. Kebon Jeruk, Jakarta Barat', 'ISLAM', 'pkwtt', NULL, '0001128791529', NULL, 'D74948211', NULL, '477/KP.301/DAMRI-1996', '0000-00-00', '2093/KP.301/DAMRI-1998', '0000-00-00', 'III/B', 'PP', 1, 3, 'Pemeriksa Bidang Teknik SPI', 19, 6, 2598200, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (26, 'SUMARDI', '63969084', '3175060704630006', 'L', 'Purworejo', '1963-04-07', '1996-01-15', 'SMA', NULL, 'Kandang Besar, Rt.003, Rw.004, Kel. Ujung Menteng, Kec. Cakung, Jakarta', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '1150/KP.301/DAMRI-1998', '0000-00-00', '507/KP.301/DAMRI-1999', '0000-00-00', 'III/A', 'PP', 1, 2, 'Staf Adm Sekretariat Perusahaan', 18, 0, 2522000, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (27, 'SUDIHARTO, SE', '76969350', '3175041908720004', 'L', 'Magelang', '1972-08-19', '1996-12-02', 'S1', 'Ekonomi', 'Kp. Ciketing Asem Jaya No. 89 RT. 004 RW. 005, Mustika Jaya, Kota Bekasi ', 'ISLAM', 'pkwtt', '081298220500', NULL, NULL, NULL, NULL, '246/KP.301/DAMRI-1999', '1999-05-01', '2406/KP.301/DAMRI-2000', '2000-07-01', 'III/B', 'PP', 1, 3, 'Kepala Subdivisi Hubungan Karyawan', 17, 1, 2503800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (28, 'AHMAD SUKRI, SE', '75979292', '3275021706750034', 'L', 'Asahan', '1975-06-17', '1997-01-01', 'S1', NULL, 'Jl. Nangka 7 No. 4, Rt. 07, Rw. 05, Kel. Kota Baru, Kec. Bekasi Barat, Kota Bekasi', 'ISLAM', 'pkwtt', '081395660036', NULL, NULL, NULL, NULL, '194/KP.301/DAMRI-1999', '0000-00-00', '228/KP.301/DAMRI-2001', '0000-00-00', 'III/B', 'PP', 1, 3, 'Kepala Subdivisi Perllengkapan, Pemeliharaan Aset Umum dan PKBL', 17, 0, 2503800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (29, 'ARIE SUHARTINAH MULIA, A.MTrd', '73979235', '3171034304730003', 'P', 'Tulungagung', '1973-04-03', '1997-05-01', 'D4', NULL, 'Jl. Kran II No.51 D, RT.005, RW.006, Kel. Gunung Sahari Selatan, Kec. Kemayoran, Jakarta Pusat', 'ISLAM', 'pkwtt', NULL, '0001128870876', NULL, NULL, NULL, '2237/KP.301/DAMRI-1998', '0000-00-00', '1004/KP.301/DAMRI-2000', '0000-00-00', 'III/B', 'PP', 0, 0, 'Pel. Adm. Komersial', 16, 8, 2503800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (30, 'UMBAR INDRIYAWAN, S.Kom, M.MTr', '73969660', '1150130507730002', 'L', 'Semarang', '1973-07-05', '1996-07-01', 'S2', NULL, 'Jl. Lombok, No 89 Rt.002, Rw. 011, Kelurahan Gunung Simping, Kec. Cilacap Tengah, Kota Cilacap, Jawa Tengah', 'ISLAM', 'pkwtt', NULL, '0001310213891', NULL, NULL, NULL, '03/KP.301/DAMRI-II/2000.PP', '0000-00-00', '12/KP.301/DAMRI-II/2002', '0000-00-00', 'III/B', 'PP', 1, 2, 'Pemeriksa Bidang SDM & Administrasi Umum', 17, 6, 2503800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (31, 'Drs. DIKI ASHIDIKKI, S.Ag. M.Mtr', '71979939', '3273273008710001', 'L', 'Tasikmalaya', '1971-08-30', '1997-05-15', 'S2', NULL, 'Jl. Riung Arum Raya No. 73 RT 009/009 Cisaranteun Kidul, Gedebage, Kota Bandung, Jawa Barat', 'ISLAM', 'pkwtt', NULL, '0001141931079', '11026490703', '\'F7197099390', NULL, '02/KP.301-206/DAMRI-2001', '2001-03-16', NULL, NULL, 'III/B', 'PP', 1, 2, 'Pengawas Intern Area II', 16, 6, 2503800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (32, 'RUSLAN ROSYID', '70979229', '3171082205700002', 'L', 'Jakarta', '1970-05-22', '1997-01-02', 'SMA', NULL, 'Jl. Kawi-kawi Atas, Rt.015, Rw. 008, Kel. Johar Baru, Kec. Johar Baru, Jakarta Pusat', 'ISLAM', 'pkwtt', '081210096857', NULL, NULL, NULL, NULL, '1593/KP.301/DAMRI-1998', '0000-00-00', '303/KP.301/DAMRI-1999', '0000-00-00', 'III/A', 'PP', 1, 3, 'Pel. Adm. Umum', 17, 0, 2434200, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (33, 'WARJIONO', '65968785', '3671071012650005', 'L', 'Gunung Kidul', '1965-12-10', '1996-09-01', 'SMEA', NULL, 'Jl. Gurame V No. 62, Rt.00, Rw. 001, Kel. Karawaci Baru, Kec. Karawaci, Tangerang, Banten', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '79/KP.301/DAMRI-1998', '0000-00-00', '515/KP.301/DAMRI-1999', '0000-00-00', 'III/A', 'PP', 1, 1, 'Pel. Adm. Umum', 17, 4, 2434200, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (34, 'NUGROHO PRASETYO ADI', '66978794', '3374110407660001', 'L', 'Semarang', '1966-07-04', '1997-01-01', 'D3', NULL, 'Jl. Hanoman X/10-A, Rt.001, Rw. 009, Kel. Krapyak, Kec. Semarang Barat, Kota Semarang', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '41/KP.301/DAMRI-1998', '0000-00-00', '576/KP.301/DAMRI-1999', '0000-00-00', 'III/A', 'PP', 1, 2, 'Kepala Subdivisi Akuntansi Keuangan', 17, 0, 2434200, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (35, 'ENDANG SETYOWATI', '759910304', '3216066204750001', 'P', 'Klaten', '1975-04-22', '1999-03-01', 'SMA', NULL, 'Griya Asri 2 Blok G12, Rt.008, Rw. 026, Kel. Sumber Jaya, Kec. Tambun Selatan, Kota Bekasi', 'ISLAM', 'pkwtt', '081381941922', NULL, NULL, NULL, NULL, '04/KP.301/DAMRI-II/2002.PP', '0000-00-00', '03/KP.301/DAMRI-II/2005', '0000-00-00', 'II/D', 'PP', 1, 2, 'Sekretaris Direktur SDM &  Umum', 21, 4, 2398200, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (36, 'M. RAFIK', '69999576', '3175081909690011', 'L', 'Jakarta', '1969-09-19', '1999-01-01', 'STM', NULL, 'Cipinang Asem, Jl. Usman Harun RT 009/005, Kebon pala, Makasar, Jakarta timur.', 'ISLAM', 'pkwtt', '085692616644', '0001128786849', '05J80149015', '\'F6999095760', NULL, '1587/KP.301/DAMRI-2000', '2000-07-01', '215/KP.301/DAMRI-2001', '2001-01-01', 'III/A', 'PP', 1, 3, 'Pel. Adm. SDM', 15, 0, 2346300, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (37, 'HERRI SOMANTRI, SE', '820110391', '3273030806820006', 'L', 'Bandung', '1982-06-08', '2001-09-03', 'D3', NULL, NULL, 'ISLAM', 'pkwtt', NULL, NULL, NULL, 'F820110391', NULL, '631/KP.301/DAMRI-2002', '0000-00-00', '05/KP.301/DAMRI-2005', '0000-00-00', 'III/B', 'PP', 1, 0, 'Kepala Subdivisi Komersial', 12, 4, 2315000, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (38, 'RUSWANTO', '76968787', '3275091404760021', 'L', 'Banyumas', '1976-04-14', '1996-09-01', 'SMU', NULL, 'KP. Kebantenan, Rt.003, Rw. 012, Kel. Jatiasih, Kec. Jati asih, Kota Bekasi', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '79/KP.301/DAMRI-1998', '0000-00-00', '515/KP.301/DAMRI-1999', '0000-00-00', 'II/C', 'PP', 1, 3, 'Peng. Kend. Dinas Darma Wanita', 22, 4, 2311800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (39, 'SUSILO MARGONO', '79989555', '3275050503790034', 'L', 'Sukoharjo', '1979-03-05', '1998-04-01', 'SMU ', NULL, 'Kp. Rawa Roko, Rt. 006, Rw.005, Kel. Bojong Rawa Umbu, Bekasi, Jawa Barat', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '1094/KP.301/DAMRI-2000', '0000-00-00', '10/KP.301/DAMRI-2001', '0000-00-00', 'II/C', 'PP', 1, 0, 'Kepala Subdivisi Perawatan Armada dan Fasilitas', 20, 9, 2233000, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (40, 'TARTO HANDOKO', '730010330', '3171022504730006', 'L', 'PURWOREJO', '1973-04-25', '1998-10-01', 'SMA', NULL, 'Jl. A Gg A-V/16B Rt 006/007 Sawah Besar, Jakarta Pusat', 'ISLAM', 'pkwtt', '081315926000', NULL, NULL, NULL, 'hanstjokro@gmail.com', '284/KP.301/DAMRI-2002', '0000-00-00', '502/KP.301/DAMRI-2003', '0000-00-00', 'II/D', 'PP', 1, 2, 'Staf Komersil', 18, 3, 2229800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (41, 'MONISA DAMAYANTI KUSUMA SARI, SH', '871011367', '3374086508870001', 'P', 'Semarang', '1987-08-25', '2010-01-11', 'S1', NULL, 'Jl. Sriwijaya 67, RT 009/04, Candi, Candisari, Semarang, Jawa Tengah.', 'ISLAM', 'pkwtt', NULL, '0001123893718', '13000840382', '\'F8710113670', NULL, '28/KP.301/DAMRI-II/2012', '2012-05-01', '265/KP.301/DAMRI-2013', '2013-05-01', 'III/B', 'PP', 0, 0, 'Kepala Subdivisi Administrasi Personalia', 9, 0, 2126300, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (42, 'dr. EVA SITI ZULFA', '701011163', '0953075211707010', 'P', 'Jakarta', '1970-11-12', '2010-01-04', 'S1', 'Kedokteran', 'Jl. Cipayung II/12, Rt. 004, Rw. 007, Kel. Rawa Barat, Kec. Kebayoran Baru, Jakarta Selatan', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '527/KP.301/DAMRI-2010', '0000-00-00', '473/KP.301/DAMRI-2011', '0000-00-00', 'III/B', 'PP', 1, 2, 'Dokter Perusahaan', 9, 0, 2126300, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (43, 'DEFRIANTO, SE', '800510934', '3174072912800002', 'L', 'JAKARTA', '1980-12-29', '2015-01-10', 'S1', NULL, 'Jl. Pandan, Rt 002/009 Kramat Pela, Kebayoran baru, Jakarta Selatan', 'ISLAM', 'pkwtt', '082298001884', NULL, NULL, NULL, NULL, 'Sk.02/KP.301/DAMRI-2008', '0000-00-00', 'Sk.08/KP.301/DAMRI-2009', '0000-00-00', 'III/A', NULL, 1, 1, 'Pel. Adm. Akuntansi', 8, 3, 2082600, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (44, 'BIMIN, SE', '760511101', '3374152604760002', 'L', 'Wonosobo', '1976-04-26', '2005-02-14', 'S1', NULL, 'Jl. Bukit Beringin III/388, RT 003/007 Ngaliyan, Semarang, Jawa Tengah.', 'ISLAM', 'pkwtt', NULL, NULL, '10028282894', '\'F7605111010', NULL, '16/KP.301/DAMRI-II/2010', '2010-07-01', '63/KP.301-R/DAMRI-II/2012', '2012-07-01', 'III/A', 'PP', 1, 1, 'Pengawas Intern Area I', 8, 11, 2082600, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (45, 'AGUS PRIYO SUSILO', '790110913', '3275021610790009', 'L', 'Jakarta', '1979-10-16', '2001-03-01', 'SMK', NULL, 'Bintara Jaya No.41, RT 003/10, Bekasi Barat, Kota Bekasi', 'ISLAM', 'pkwtt', '081314032790', NULL, '08010158098', NULL, 'aguspriyosusilo79@gmail.com', 'Sk.01/KP.301/DAMRI-2008', '0000-00-00', 'Sk.03/KP.301/DAMRI-2010', '0000-00-00', 'II/B', 'PP', 1, 2, 'Staf Subdit SDM', 17, 10, 2080400, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (46, 'SETIA YUGO PUSPITO, ST', '861311442', '3276020301860005', 'L', 'Jakarta', '1986-01-03', '2013-01-01', 'S1', NULL, 'Jl. Manunggal Bahkti, RT 001/011, Kalisari, Pasar rebo, Jakarta Timur.', 'ISLAM', 'pkwtt', NULL, '0001123898477', '13000840507', '\'F8613114420', NULL, '03/KP.301/DAMRI-2013', '2013-01-02', '81/KP.301/DAMRI-2014', '2014-02-12', 'III/B', 'PP', 1, 2, 'Kepala Divisi Perencanaan dan Fasilitas Teknik', 6, 0, 2031900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (47, 'RAMDHANI AGUNG SUKIRNO, S.Kom', '861311443', '3276022005880003', 'L', 'Pacitan', '1986-05-20', '2013-01-01', 'S1', NULL, 'Kp. Rumbut, Rt.011, Rw.009, Kel. Pasir Gunung Selatan, Kec. Cimanggis, Kota Depok', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '03/KP.301/DAMRI-2013', '0000-00-00', '81/KP.301/DAMRI-2014', '0000-00-00', 'III/B', 'PP', 1, 1, 'Kepala Subidivisi Kajian Kelayakan Bisnis dan Investasi', 6, 0, 2031900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (48, 'RIZKI BUGI BUNJALI, SE', '851311436', '3275010906850014', 'L', 'Bekasi', '1985-06-09', '2013-01-01', 'S1', NULL, 'Jl. KH. Mas Mansyur No. 51, Rt.08, Rw. 03, Kel. Bekasi Jaya, Kec. Bekasi Timur, Kota Bekasi', 'ISLAM', 'pkwtt', '081310004765', NULL, NULL, NULL, NULL, '03/KP.301/DAMRI-2013', '0000-00-00', '81/KP.301/DAMRI-2014', '0000-00-00', 'III/B', 'PP', 1, 0, 'Kepala Subidivisi Perpajakan', 6, 0, 2031900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (49, 'SUSILAWATY PN. SIRINGORINGO, SH', '891311439', '1271044404890003', 'P', 'Medan', '1989-04-04', '2013-01-01', 'S1', NULL, 'Jl. Denai Gg Tengah No. 68, Tegal S, Mandala III, Medan Denai, Kota Medan, Sumatra Barat', 'Kristen  ', 'pkwtt', NULL, '0001123893753', '12000968615', '\'F8913114390', NULL, '03/KP.301/DAMRI-2013', '2013-01-02', NULL, NULL, 'III/B', 'PP', 0, 0, 'Kepala Subdivisi Hubungan Industrial', 6, 0, 2031900, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (50, 'NICO RAHADIHAN SAPUTRA, SE', '820711077', '3273200907820004', 'L', 'Bandung', '1982-07-09', '2007-05-01', 'S1', NULL, 'Jl. Kuningan 5 No.20, RT 001/013 Antapani Tengah, Antapami, Kota Bandung.', 'ISLAM', 'pkwtt', NULL, '0001136917776', '10007154445', '\'F8207110770', NULL, '03/KP.301/DAMRI-2010', '2010-03-26', '584/KP.301-R/DAMRI-2011', '2011-10-10', 'III/A', 'PP', 1, 0, 'Kepala Divisi Pengembangan Usaha', 6, 8, 1994800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (51, 'NURDIN NURDIAWAN, SE', '900611080', '3207191401900003', 'L', 'CIAMIS', '1990-01-14', '2006-11-01', 'S1', NULL, 'Kp Pasirarangan Rt 004/006, Desa Pangkalan, Kec Cikidang, Kab Sukabumi, Jawa barat', 'ISLAM', 'pkwtt', '81218282649', NULL, NULL, NULL, 'nurdiawan92@gmail.com', '04/KP.301-206/DAMRI-2010', '0000-00-00', '05/KP.301-R/DAMRI-2012', '0000-00-00', 'III/A', 'PP', 1, 2, 'Staf SDM', 7, 2, 1994800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (52, 'M. IWAN SUTOYO, SE', '83131200115', '3175031301830011', 'L', 'Jakarta', '1983-01-13', '2013-03-04', 'S1', NULL, 'Jl. Otista I A No.2 RT 007/001, Bidara cina, Kec. Jatinegara, Jakarta Timur.', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '379/KP.301/DAMRI-2016', '0000-00-00', '136/KP.301/DAMRI-2018', '0000-00-00', 'III/A', 'PP', 1, 2, 'Pel. Adm. Perbendaharaan', 6, 2, 1994800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (53, 'BAYU ANGGA HERMAWAN, S.Sos', '800611008', '3175041510800002', 'L', 'Jakarta', '1980-10-15', '2006-12-01', 'S1', NULL, 'Jl. Kran VI, Rt.009, Rw.006, Kel. Gunung Sahari Selatan, Kec. Kemayoran, Jakarta Pusat', 'ISLAM', 'pkwtt', NULL, '0001135764933', NULL, 'F800611008', NULL, '01/KP.301-206/DAMRI-2009', '0000-00-00', NULL, NULL, 'III/A', 'PP', 1, 2, 'Pel. Adm. Komersial', 7, 1, 1994800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (54, 'EKO ADE SUSANTO, SE', '870911345', '3172020610870001', 'L', 'Jakarta', '1987-10-06', '2009-11-05', 'S1', NULL, 'Jl. Ancol Selatan, Rt. 017, Rw. 001, Kel. Sunter Agung, Kec. Tanjung Priok, Jakarta Utara', 'ISLAM', 'pkwtt', '085692554631', NULL, NULL, NULL, NULL, '02/KP.301-206/DAMRI-2012', '0000-00-00', '10/KP.301/DAMRI-2013', '0000-00-00', 'III/B', 'PP', 0, 1, 'Kepala Subdivisi Keselamatan', 4, 2, 1937600, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (55, 'ISMIYANTO WIBOWO', '880811164', '320101120880022', 'L', 'Jakarta', '1988-01-12', '2008-10-13', 'S1', NULL, NULL, 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '527/KP.301/DAMRI-2010', '2010-08-31', '473/KP.301/DAMRI-2011', '2011-08-09', 'III/A', 'PP', 1, 1, 'Kepala Subidivisi Akuntansi Manajemen', 5, 3, 1906900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (56, 'EKA MURWANI, SE', '840911325', '3216066705840017', 'P', 'Jakarta', '1985-05-17', '2009-05-01', 'S1', NULL, 'Papan Mas Blok G.23 No. 33, Rt.001, Rw.007, Kel. Setia Mekar, Kec. Tambun Selatan, Kota Bekasi', 'ISLAM', 'pkwtt', NULL, NULL, '11041614964', NULL, NULL, '568/KP.301/DAMRI-2011', '0000-00-00', '04/KP.302/DAMRI-2013', '0000-00-00', 'III/A', 'PP', 1, 2, 'Pel. Adm. Akuntansi', 4, 8, 1906900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (57, 'ARI ARDIANTO, S.Pd', '911311933', '3306040901910001', 'L', 'Bekasi', '1991-01-09', '2013-01-05', 'S1', NULL, 'Karang Jambu, Rt.001, Rw.001, Kel. Dadirejo, Kec. Bagelen, Kab. Purworejo, Jawa Tengah', 'ISLAM', 'pkwtt', '085643619826', '0002051428026', NULL, NULL, 'ariardianto92@ymail.com', '06/KP.301-206/DAMRI-2015', '0000-00-00', '89/KP.301/DAMRI-2016', '0000-00-00', 'III/A', 'PP', 0, 0, 'Pel. Adm. Perbendaharaan', 5, 8, 1906900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (58, 'FREDY PRAMUDYA, SE', '811512009', '3302261408810008', 'L', 'Yogyakarta', '1981-08-14', '2015-01-05', 'S1', NULL, 'Citra Diwangsa Residence No.7, Jl. HR. Bunyamin, Gg. Gn. Merapi, Purwokerto, Jawa Tengah', 'ISLAM', 'pkwtt', '08999001144', NULL, NULL, NULL, 'fredy_pramuditya@yahoo.com', 'SK.35/KP.301/DAMRI-2017', '0000-00-00', 'SK.135/KP.302/DAMRI-2018', '0000-00-00', 'III/A', 'PP', 1, 0, 'Pel. Adm. Akuntansi', 4, 0, 1906900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (59, 'SUPRIYONO, S.Pd', '871411872', '1050091111870001', 'L', 'Wonogiri', '1987-11-11', '2014-08-02', 'S1', NULL, 'Lemah Hegar, Rt 009/004 Sukapura, Kiara Condong, Kota Bandung', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '342/KP.301/DAMRI-2017', '0000-00-00', '136/KP.301/DAMRI-2018', '0000-00-00', 'III/A', 'PP', 1, 1, 'Pel. Adm. Teknik Pemeliharaan', 4, 11, 1906900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (60, 'KRISHNAWATI, SH', '91131200116', '1871017105910003', 'P', 'Bandar Lampung', '1991-05-31', '2013-01-02', 'S1', NULL, 'Jl. H Abdullah III No. 32 LK. III, Rt.006/-, Kel. Kedaton, Kec. Kedaton, Kota Bandar lampung', 'ISLAM', 'pkwtt', NULL, '0001124647964', NULL, NULL, NULL, '379/KP.301/DAMRI-2016', '0000-00-00', '136/KP.302/DAMRI-2018', '0000-00-00', 'III/A', 'PP', 1, 0, 'Pel. Adm Sekretariat Perusahaan', 6, 0, 1906900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (61, 'NURDIANSYAH MARPAUNG, ST', '851311441', '3275041807850019', 'L', 'Bekasi', '1985-07-18', '2013-01-01', 'S1', NULL, 'Jl. Belut Raya No.141, Rt.006,Rw.006, Kel. Kayuringin jaya, Kec. Bekasi Selatan, Kota Bekasi', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '03/KP.301/DAMRI-2013', '0000-00-00', '81/KP.301/DAMRI-2014', '0000-00-00', 'III/B', 'PP', 1, 1, 'Kepala Subdivisi Perencanaan Teknik', 6, 0, 1906900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (62, 'EMAN SULAEMAN', '680110461', '0954010104680281', 'L', 'Jakarta', '1968-04-01', '2002-10-01', 'SMP', NULL, 'Jl. Pembina VI No.14, Rt.010, Rw.006, Kel. Pal Meriam, Kec. Matraman, Kota Jakarta Timur', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '224/KP.301/DAMRI-2004', '0000-00-00', '525/KP.301/DAMRI-2005', '0000-00-00', 'II/A', 'PP', 1, 3, 'Pel. Adm. Umum', 13, 3, 1902400, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (63, 'DESTI, SE, MM', '8616120135', '1901055202860001', 'P', 'Sungailiat', '1986-12-02', '2012-10-23', 'S2', NULL, 'Jl. Susilo Raya 2c, No.61 Grogol, Jakarta Barat', NULL, 'pkwtt', NULL, NULL, NULL, NULL, NULL, '348/KP.301/DAMRI-2017', '0000-00-00', '0', NULL, 'III/B', 'PP', 0, 0, 'Pel. Adm. Akuntansi', 2, 3, 1843100, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (64, 'ERIEND APRILIA, Amd', '830911662', '3275025304830018', 'P', 'Palembang', '1983-04-13', '2009-10-08', 'D3', NULL, 'Jl. Nangka 7 No. 11, Rt.007, Rw. 005, Kel. Kota Baru, Kec. Bekasi Barat, Jawa Barat', 'ISLAM', 'pkwtt', '081294427041', NULL, '14019156075', NULL, NULL, '02/KP.301-206/DAMRI-2014', '0000-00-00', '28/KP.301/DAMRI-2015', '0000-00-00', 'II/C', 'PP', 0, 0, 'Pel. Adm. SDM', 9, 3, 1839300, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (65, 'SYAIFUL RACHMAN, A.Md', '841311765', '3174012010840007', 'L', 'Jakarta', '1964-10-20', '2013-01-07', 'D3', NULL, 'Jl. Kebon Baru IV No. 17 RT.002, Rw. 009, Kel. Kebon Baru, Kec. Tebet, Jakarta Selatan', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '431/KP.301/DAMRI-2014', '0000-00-00', '48/KP.301/DAMRI-2016', '0000-00-00', 'II/A', 'PP', 1, 2, 'Sekretaris Direktur Keuangan', 11, 6, 1836100, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (66, 'LISHNA NURUL HIKMAH', '9416120137', '3326136212940023', 'P', 'Pekalongan', '1994-12-22', '2016-12-01', 'D4', NULL, 'Perum Kwayangan, Jl. Yudistira No. 88 Kwayangan, Rt.003, Rw.003, Kel. Kwayangan, Kec. Kedungwuni, Kota Pekalongan, Jawa Tengah', 'ISLAM', 'pkwtt', '081298035159', NULL, NULL, NULL, 'nalishnaa@gmail.com', '1306/KP.301/DAMRI-2017', '0000-00-00', '32/KP.301/DAMRI-2018', '0000-00-00', 'III/A', NULL, 1, 1, 'Sekretaris POKJA Bidang Bangunan, Tanah, Barang Umum dan Jasa Lainnya', 2, 0, 1818900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (67, 'RATNA NINGSIH, SE', '8715200121', '3175074711870001', 'P', 'Jakarta', '1987-11-07', '2015-08-03', 'S1', NULL, 'Jl. H. Naman Rt.04, Rw.02 No.1, Pondok Kelapa, Jakarta Timur', 'ISLAM', 'pkwtt', '085692979647', NULL, NULL, NULL, 'ratnaningsihmamu@gmail.com', '135/KP.302/DAMRI-2018', '0000-00-00', '35/KP.301/DAMRI-2017', '0000-00-00', 'III/A', 'PP', 0, 0, 'Pel. Adm. Akuntansi', 3, 5, 1818900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (68, 'RIKY DWI PUTRA RISMAYANTO, SE', '92151200122', '3273142502920004', 'L', 'Bandung', '1992-05-25', '2015-10-01', 'S1', NULL, 'Jln. Awibitung Gg Jember IV No.18, Rt.004, Rw.005, Cicadas, Bandung, Jawa Barat', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '35/KP.301/DAMRI-2018', '0000-00-00', '135/KP.302/DAMRI-2018', '0000-00-00', 'III/A', 'PP', 0, 0, 'Pel. Adm. Akuntansi', 3, 3, 1818900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (69, 'ANDI UNNI ASTRIANI, SE', '83151200123', '3172035006831001', 'P', 'Jakarta', '1983-06-10', '2015-10-26', 'S1', NULL, 'RGTC Blok Kamper Wangi 307 Rt.009, Rw. 010, Cakung Barat, Jakarta Timur', 'ISLAM', 'pkwtt', '081389605155', NULL, NULL, NULL, NULL, '35/KP.301/DAMRI-2017', '0000-00-00', '135/KP.302/DAMRI-2018', '0000-00-00', 'III/A', 'PP', 1, 3, 'Pemeriksa Bidang Keuangan SPI', 3, 2, 1818900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (70, 'I NYOMAN GEDE AGUSRANA, S. Ab', '820911130', '3275012211820018', 'L', 'Jakarta', '1982-11-22', '2009-05-01', 'S1', NULL, 'Jl. Ranjau D4 No.9, Rt.006, Rw.004, Kel. Aren Jaya, Kec. Bekasi Timur, Kota Bekasi, Jawa Barat', 'HINDU', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '01/KP.301/DAMRI-2010', '0000-00-00', '01/KP.301/DAMRI-2013', '0000-00-00', 'III/A', 'PP', 1, 1, 'Pemeriksa Bidang Keuangan SPI', 3, 8, 1818900, 60, 77, NULL, 1, NULL, '2019-01-29 08:44:50');
INSERT INTO `ref_pegawai` VALUES (71, 'M. ADZANI WAHYU WIBOWO, ST', '79151200120', '3208180201790009', 'L', 'Sidoarjo', '1979-01-02', '2015-11-30', 'S1', 'Teknik Elektro', 'Dsn. Puhun RT. 007 RW. 002 Keluarahan Nanggareng No. 75, Kecamatan Jalaksana, Kabupaten Kuningan, Jawa Barat', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '35/KP.301/DAMRI-2017', '2017-01-01', NULL, NULL, 'III/A', 'PP', 1, 3, 'Kepala Subdivisi Pengendalian Operasi', 3, 1, 1818900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (72, 'NARESWARI NUR ANINDITA, S.Psi', '91161200119', '3275044810910015', 'P', 'Surakarta', '1991-10-08', '2016-01-04', 'S1', NULL, 'Jl. Taman Cendana I Blok P I/21 A, RT 008/014, Jaka Setia, Bekasi selatan, Kota Bekasi, Jawa Barat', 'ISLAM', 'pkwtt', NULL, '0002049170938', '16048094342', NULL, NULL, '35/KP.301/DAMRI-2017', '2017-01-01', NULL, NULL, 'III/A', 'PP', 0, 0, 'Kepala Subdivisi Pengembangan Karyawan dan Organisasi', 3, 0, 1818900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (73, 'ELGA ESA GUMILANG', '850811448', '1050282403853002', 'L', 'Garut', '1985-03-24', '2008-03-01', 'SMU', NULL, 'Komp. Bumi Panyileukan blok G 17 no 5 Soekarno Hatta, Bandung 40614', 'ISLAM', 'pkwtt', '081809666232', NULL, NULL, NULL, NULL, '02/KP.301-206/DAMRI-2013', '0000-00-00', '10/KP.301/DAMRI-2014', '0000-00-00', 'II/B', 'PP', 1, 0, 'Pel. Adm. Umum', 10, 10, 1787300, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (74, 'IWA KARTIWA', '860811449', '3205090104880002', 'L', 'Garut', '1986-04-30', '2008-08-15', 'SMA', NULL, 'KP. Talun Rt.01, Rw.06, Desa Cangkuang, Kec. Leles, Kab. Garut, Jawa Barat', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '02/KP.301-206/DAMRI-2013', '0000-00-00', '10/KP.301/DAMRI-2014', '0000-00-00', 'II/B', 'PP', 1, 1, 'Pel. Adm. Pengembangan Usaha', 10, 3, 1787300, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (75, 'HERI AFFFANDI, A.Md', '891311425', '3276040804890007', 'L', 'Jakarta', '1989-04-08', '2013-01-01', 'D3', NULL, 'Jl. Tangkuban Perahu 3 No 30, Rt 003/011 Kayuringin Jaya, Bekasi selatan, Kota Bekasi', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'II/B', 'PP', 1, 1, 'Pel. Adm. Teknik Pemeliharaan', 9, 0, 1787300, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (76, 'TRIO RIADI', '791211641', '3171030409790003', 'L', 'Jakarta', '1979-09-04', '2012-07-02', 'SMK', NULL, 'Jl. Cempaka Wangi, Rt.002, Rw.009, Kel. Harapan Mulia, Kec. Kemayoran, Jakarta Pusat', 'ISLAM', 'pkwtt', NULL, '0001153253013', NULL, NULL, NULL, '677/KP.301/DAMRI-2013', '0000-00-00', '28/KP.301/DAMRI-2015', '0000-00-00', 'II/A', 'PP', 1, 3, 'Satpam', 9, 11, 1769800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (77, 'EDI DARMAWAN', '8509120133', '3201012701850008', 'L', 'Medan', '1985-01-27', '2009-05-01', 'SMU', NULL, 'Padurenan, Rt.006, Rw.009, Kel. Pabuaran, Kec. Cibinong, Bogor, Jawa Barat', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '347/KP.301/DAMRI-2017', '0000-00-00', '137/KP.301/DAMRI-2018', '0000-00-00', 'II/A', 'PP', 1, 3, 'Pengemudi', 9, 8, 1769800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (78, 'REZA MUNTHE', '860911327', '3275030601860018', 'L', 'MEDAN', '1986-01-06', '2009-11-02', 'SMU', NULL, 'Perum Rawa bambu, Rt 007/016, Harapan Jaya, Bekasi utara, Kota Bekasi', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, 'Sk.632/KP.301/DAMRI-2011', '0000-00-00', 'SK.406/KP.301/DAMRI-2013', '0000-00-00', 'II/A', 'PP', 1, 1, 'Pel. Adm. Pengembangan Usaha', 9, 2, 1769800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (79, 'ACHMAD ANDHIKA KHARISMA, S.S.T (TD)., M.MTr', '9218120295', '3316051103920001', 'L', 'Blora', '1992-03-11', '2018-05-01', 'S2', NULL, 'Jl. Diponegoro LR 7/12, Rt.004, Rw. 004, Kel. Cepu, Kec. Cepu, Kota Blora, Jawa Tengah', 'ISLAM', 'pkwtt', '082297790077', NULL, NULL, NULL, 'andhikaachmaddd@yahoo.com', '268/KP.301/DAMRI-2018', '0000-00-00', '408/KP.301/DAMRI-2018', '0000-00-00', 'III/B', 'PP', 1, 0, 'Kepala Subdivisi Pelayanan', 0, 8, 1748800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (80, 'UTAMA DIANDA SYAHPUTRA, S.ST (TD)', '9218120138', '2172023011920001', 'L', 'Batam', '1992-11-30', '2018-01-19', 'D4', NULL, 'Jl. Sri Andana GG. Kaswari Kp. Mekar Jaya, Rt.003, Rw.001, Kel. Batu IX, Kec. Tanjung Pinang Timur, Kepulauan Riau', 'ISLAM', 'pkwtt', '081298560112', NULL, NULL, NULL, 'tamadianda@gmail.com', '158/KP.301/DAMRI-2018', '0000-00-00', '315/KP.301/DAMRI-2018', '0000-00-00', 'III/A', NULL, 0, 0, 'Kepala Subdivisi Bisnis Transportasi dan Logistik', 0, 11, 1731100, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (81, 'CHRYSTIAN R. M. POHAN, S.Psi', '9018120210', '3175021903900001', 'L', 'Palembang', '1990-03-19', '2018-04-06', 'S1', NULL, 'Jl. Duyung II A, No. 9 Rawamangun RT 013/008 Jati, Pulogadung, Jakarta Timur.', 'Kristen  ', 'pkwtt', '081381355310', NULL, '12042990445', NULL, NULL, '229/KP.301/DAMRI-2018', '2018-04-11', '270/KP.301/DAMRI-2018', '2018-04-18', 'III/A', 'PP', 0, 0, 'Kepala Divisi Kapital Manusia', 0, 9, 1731100, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (82, 'KUSNADI', '901011606', '3271051206890002', 'L', 'BOGOR', '1990-06-12', '2010-06-01', 'SMK', NULL, 'Jl. Pemda Pangkalan 2, Rt. 002, Rw. 002, Kel. Kedung Halang, Kec. Bogor Utara, Kota Bogor', 'ISLAM', 'pkwtt', '081288788121', '0001153252967', '3271051206890002', NULL, 'kusnadiadi778@yahoo.co.id', 'Sk.18/KP.301-206/DAMRI-2013', '0000-00-00', 'SK.04/KP.301/DAMRI-2016', '0000-00-00', 'II/B', 'PP', 1, 2, 'Pel. Adm. SDM', 8, 7, 1714000, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (83, 'VEGY HARDHIANTO, A.Md', '86131200117', '3175072305860010', 'L', 'Jakarta', '1986-05-23', '2013-01-02', 'D3', NULL, 'Jl. Sunter Muara No.12, Rt.012, Rw.005, Kec. Tanjung Priok, Jakarta Utara', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '380/KP.301/DAMRI-2016', '0000-00-00', '137/KP.301/DAMRI-2018', '0000-00-00', 'II/C', 'PP', 1, 2, 'Pel. Adm. Perbendaharaan', 6, 0, 1681900, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (84, 'JOKO SIMA', '841211567', '3175021108840019', 'L', 'Tanjung Balai', '1984-08-11', '2012-07-26', 'S1', NULL, 'Jl. Cipinang Baru Bunder, Rt.004, Rw.018, Jakarta Timur', 'ISLAM', 'pkwtt', '087886142335', NULL, NULL, NULL, NULL, '344/KP.301/DAMRI-2013', '0000-00-00', '396/KP.301/DAMRI-2014', '0000-00-00', 'II/A', 'PP', 1, 2, 'Anggota Pokja Bidang IT', 6, 5, 1640800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (85, 'MUH. ARDIYANTO UTOMO', '9012120090', '3275011004900015', 'L', 'Bekasi', '1990-04-10', '2012-03-14', 'S1', NULL, 'Komplek kodim c/6, Rt.005, Rw.002, Kel. Bekasi Jaya, Kec. Bekasi Timur', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '09/KP.301-206/DAMRI-2015', '0000-00-00', '25/KP.301/DAMRI-2016', '0000-00-00', 'II/B', 'PP', 1, 1, 'Pel. Adm Pelayanan Jasa', 6, 10, 1640800, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (86, 'NUNIK UTARI', '811211817', '3275024408810026', 'P', 'Jakarta', '1981-08-04', '2012-09-21', 'SMU', NULL, 'Komp Bahagia permai blok B3, No.8 RT 5/17, Jaka sampurna, Bekasi barat, Kota Bekasi, Jawa Barat', 'ISLAM', 'pkwtt', NULL, '0001462333972', '15014671521', '0', 'nunikmeutia@gmail.com', '34/KP.301/DAMRI-2017', '2017-01-01', '137/KP.301/DAMRI-2018', '2018-03-01', 'II/A', 'PP', 0, 0, 'Staf Subdit SDM', 6, 3, 1637100, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (87, 'I PUTU JULI WIRAWAN', '91151200118', '3216020306900025', 'L', 'Titab', '1991-06-03', '2015-10-01', 'SMU', NULL, 'Jl. Merpati Bali No.35 A, Rt.011, Rw.009, Kel. Harapan Jaya, Kec. Bekasi Utara, Kota Bekasi, Jawa Barat', 'HINDU', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '34/KP.301/DAMRI-2017', '0000-00-00', '137/Kp.301/DAMRI-2018', '0000-00-00', 'II/A', 'PP', 1, 1, 'Pengemudi', 3, 2, 1570600, 60, 77, NULL, 1, NULL, '2019-01-29 08:44:52');
INSERT INTO `ref_pegawai` VALUES (88, 'SUGIANTO', '8215120134', '3217081405820006', 'L', 'Tasikmalaya', '1982-05-14', '2015-04-15', 'SMK', NULL, 'Perum Bina karya, Rt 005/018 Jayamekar, Ke Padalarang, Kab Bandung barat.', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '137/KP.301/DAMRI-2018', '0000-00-00', '347/KP.301/DAMRI-2017', '0000-00-00', 'II/A', 'PP', 1, 1, 'Pengemudi', 3, 9, 1570600, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (89, 'SANTA LINA NOVELINDA', '9013120139', '3216066411900010', 'P', 'JAKARTA', '1990-11-24', '2013-01-03', 'S1', NULL, NULL, NULL, 'pkwtt', NULL, NULL, NULL, NULL, NULL, 'SK.166/KP.301/DAMRI-2018', '0000-00-00', '0', NULL, 'III/A', 'CP', 1, 1, 'Pel. Adm. Pelayanan Jasa', 5, 10, 1525520, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (90, 'ILYAS AMIRUDIN, S. Pd', '90141200105', '3322031010900001', 'L', 'Semarang', '1990-10-10', '2014-12-01', 'S1', 'Teknik Mesin', 'Kaliwarak Kemetul RT. 005 RW. 001, Kemetul, Susukan, Ungaran, Kabupaten Semarang', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '342/KP.301/DAMRI-2017', '2017-07-01', '0', NULL, 'III/A', 'CP', 0, 0, 'Staf Teknik', 4, 1, 1525520, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (91, 'ATIKA ARIASTI, SE, MM', '8818120301', '3175075506880003', 'P', 'JAKARTA', '1988-06-15', '2018-06-01', 'S2', NULL, 'Kav. DKI Blok C 11/10, Rt.004, Rw.011, Kel. Malaka Jaya, Kec. Duren Sawit, Jakarta Timur', 'ISLAM', 'pkwtt', '085716628415', NULL, '3175075506880003', NULL, 'atikaariasti@gmail.com', 'SK.390/KP.301/DAMRI-2018', '0000-00-00', '0', NULL, 'III/B', 'CP', 1, 0, 'Kepala Subdivisi Evaluasi Karyawan dan Organisasi', 0, 7, 1399040, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (92, 'AGUS HARI SURVIJANTO, ST.,M.Kom', '6918120303', '3174073108720003', 'L', 'Surabaya', '1972-08-31', '2018-07-01', 'S2', NULL, 'Jl. Rimba Buntu No 53, Rt.007, Rw. 004, Kel. Cipete Utara, Kec. Kebayoran Baru, Jakarta Selatan', 'ISLAM', 'pkwtt', '0818142327', NULL, NULL, NULL, 'agushari@gmail.com', '411/KP.301/DAMRI-2018', '0000-00-00', NULL, NULL, 'III/B', 'CP', 1, 0, 'Kepala Divisi Teknologi Informasi', 0, 6, 1399040, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (93, 'N.G.A RESTITI, S.S', '6318120313', NULL, 'P', 'Bandung', '1963-07-25', '2018-07-01', 'S2', 'Komunikasi', NULL, 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, '489/KP.301/DAMRI-2018', '2018-07-01', NULL, NULL, 'III/B', 'PP', 0, 0, 'Pjs Kepala Divisi Sekretariat Perusahaan', 0, 6, 1399040, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (94, 'CHRISTOFORUS A BASANGGU', '6918120303', '327502220960014', 'L', 'Jakarta', '1969-09-22', '2018-07-01', 'S1', NULL, 'Komplek Depnakertrans No. D 86 Kel. Jakasampurna, Kec. Bekasi Barat, Kota Bekasi.', NULL, 'pkwtt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '410/KP.301/DAMRI-2011', '2018-07-02', 'III/A', 'CP', 1, 0, 'Kepala Divisi Layanan Pengadaan', 0, 6, 1384880, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (95, 'CORY DYAH FITRIANA', '9418120302', '3313095303940001', 'P', 'Karanganyar', '1994-03-13', '2018-06-01', 'D4', NULL, 'Ringin Asri Rt.01, Rw.12, Karanganyar, Surakarta, Jawa Tengah', 'ISLAM', 'pkwtt', '085811620783', NULL, NULL, NULL, 'corydyah38@gmail.com', '390/KP.301/DAMRI-2018', '0000-00-00', '0', NULL, 'III/A', 'CP', 1, 0, 'Sekretaris Direktur Utama', 0, 6, 1384880, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (96, 'SRIYANTO, SE', '8218120360', '3311052006820001', 'L', 'Sukoharjo', '1982-06-20', '2018-07-01', 'S1', NULL, 'Puri Depok Mas, Blok QD No. 8, Pancoran mas, Kota Depok', 'ISLAM', 'pkwtt', NULL, NULL, NULL, NULL, NULL, 'SK.457/KP.301/DAMRI-2018', '0000-00-00', '0', NULL, 'III/A', 'CP', 0, 0, 'Kepala Subdivisi Layanan Pengadaan Bidang Umum', 0, 6, 1384880, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (97, 'RIFAN SATYA LAZUARDI, S.ST (TD)', '9518120297', '1708042608950001', 'L', 'Bengkulu', '1995-08-26', '2018-02-12', 'D4', NULL, 'Jl. Kgs Hasan, Rt 003/007, Pasar ujung, Kepahiang, Bengkulu', 'ISLAM', 'pkwtt', '081382548832', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'III/A', 'CP', 0, 0, 'Anggota Pokja Bidang  Alat Produksi', 0, 11, 1384880, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (98, 'RATNA RIANI RAHAYU, S.ST (TD)', '9317120140', '3326136212940023', 'P', 'Bandung', '1993-07-18', '2017-12-18', 'D4', NULL, 'Komplek Bumi Asri Jl. Jati F 49, Bandung, Jawa Barat', 'ISLAM', 'pkwtt', '081280481412', NULL, NULL, NULL, 'ratnariani18@gmail.com', '166/KP.301/DAMRI-2018', '0000-00-00', NULL, NULL, 'III/A', 'CP', 0, 0, 'Kepala Subdivisi Komunikasi Pemasaran', 1, 0, 1384880, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (99, 'RISA MAULIA NURAINI', '9318120298', '3172034708950005', 'P', 'Bekasi', '1995-08-07', '2018-02-12', 'D4', NULL, 'Kp. Bendungan Melayu Rt.008, Rw.002, Kel. Rawa Badak Selatan, Kec. Koja, Jakarta Utara', 'ISLAM', 'pkwtt', '081317611757', NULL, NULL, NULL, NULL, '391/KP.301/DAMRI-2018', '0000-00-00', NULL, NULL, 'III/A', 'CP', 0, 0, 'Sekretaris Pokja Bidang IT', 0, 11, 1384880, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (100, 'FAHMY BRAMASTA', '9418120382', '3515141609940001', 'L', ' Bodowoso', '1994-09-16', '2018-10-01', 'D3', 'LLAJ', 'Pondok Mutiara Regency MEG-16, Banjarbendo, Sidoarjo', 'ISLAM', 'pkwtt', ' 081295005821', NULL, NULL, NULL, 'fahmybrmst@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (101, 'MUHAMAD ILHAM RAMDANI', '9518120400', '187102250190004', 'L', 'Bandung', '1995-01-25', '2018-10-01', 'D3', 'LLAJ', 'Asrama Satlog No.9 LK.III RT.10 RW.- Kec.WayHalim Kel. WayHalim Permai Kota Bandar Lampung', 'ISLAM', 'pkwtt', '081373123817', NULL, NULL, NULL, 'mhmd.ilhamramdani@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (102, 'AHMAD FAUZI ZULFIKAR UMASUGI', '9718120372', '3516112801950001', 'L', 'MOJOKERTO', '1995-01-28', '2018-10-01', 'D3', 'LLAJ', 'DUSUN KENANTEN RT 02 RW 01 KECAMATAN PURI KABUPATEN MOJOKERTO', 'ISLAM', 'pkwtt', ' 081333894728', NULL, NULL, NULL, 'zoelumasugi@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (103, 'AGUNG SAKTI ARIFANDI', '9518120371', '3577020703960002', 'L', 'Madiun', '1996-03-07', '2018-10-01', 'D3', 'LLAJ', ' jl lumbung hidup no 36 013/004 ngegong. Manguharjo.Madiun. jawa timur', 'ISLAM', 'pkwtt', ' 081381239481', NULL, NULL, NULL, 'agungsaktiarifandiasa@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (104, 'HAKAM FIKRI AMARULLAH', '9618120392', '3327030508960005', 'L', 'Pemalang', '1996-08-05', '2018-10-01', 'D3', 'LLAJ', 'KUTA RT 29 RW 06 KECAMATAN BELIK KABUPATEN PEMALANG', 'ISLAM', 'pkwtt', '085780302035', NULL, NULL, NULL, 'il21metronom@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (105, 'GUNTUR DICKIE PRABOWO', '9618120391', '3402092008960001', 'L', 'Bantul', '1996-08-20', '2018-10-01', 'D3', 'LLAJ', 'Gadungan Kepuh, Canden, Jetis, Bantul, Yogyakarta', 'ISLAM', 'pkwtt', ' 082137987601', NULL, NULL, NULL, 'dickieprabowo@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (106, 'RAHMAT ROFIKHUL JAMIL', '9618120405', '3524121709960002', 'L', 'lamongan', '1996-09-17', '2018-10-01', 'D3', 'LLAJ', 'rt03/rw05 dsn. Sugio. Ds. Sugio, kec. Sugio, kab. Lamongan', 'ISLAM', 'pkwtt', '081332656598', NULL, NULL, NULL, 'rahmatrofikhul1@yahoo.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (107, 'ADNAN WINARNO PUTRO', '9618120370', ' 3311071611960003', 'L', 'Sukoharjo', '1996-11-16', '2018-10-01', 'D3', 'LLAJ', 'Dk ngentak Rt01/01 ds godog kab sukoharjo', 'ISLAM', 'pkwtt', '085642674448', NULL, NULL, NULL, ' adnanwinarno2@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (108, 'MUHAMMAD ANIF FIRMANSYAH', '9718120401', '3375030501970000', 'L', 'PEKALONGAN', '1997-01-05', '2018-10-01', 'D3', 'LLAJ', 'JALAN TRUNTUM NO 26 KRAPYAK KIDUL PEKALONGAN', 'ISLAM', 'pkwtt', '081327347595', NULL, NULL, NULL, 'anif.firmansyah@yahoo.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (109, 'FAJRI AHMAD NURRAMDHANI', '9718120383', '3329092101970001', 'L', 'BREBES', '1997-01-21', '2018-10-01', 'D3', 'LLAJ', 'ALAN SETIABUDI 78 RT03/RW01 KELURAHAN BREBES, KEC. BREBES. KAB. BREBES', 'ISLAM', 'pkwtt', ' 0895342849334', NULL, NULL, NULL, 'fajridani97@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (110, 'IRFAN MAULANA IQBAL', '9718120394', '3374060402970005', 'L', ' SEMARANG', '1997-02-04', '2018-10-01', 'D3', 'LLAJ', 'SELO MULYO MUKTI BARAT V / 130 RT 005 RW 009 TLOGOMULYO PEDURUNGAN SEMARANG', 'ISLAM', 'pkwtt', '085374397939', NULL, NULL, NULL, 'irfanmaulana9999@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (111, 'DYAH AMALIA HAMIDAH', '9718120381', ' 3172044903970001', 'P', 'Purbalingga', '1997-03-09', '2018-10-01', 'D3', 'LLAJ', 'Komp BPP Blok S/3, Rt/Rw 03/008, Sukapura, Cilincing, Jakarta Utara', 'ISLAM', 'pkwtt', '081212691188', NULL, NULL, NULL, ' dyahamaliah@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (112, 'DIKY AFIF TIRTAMA', '9718120378', '3374062503970006', 'L', 'Semarang', '1997-03-25', '2018-10-01', 'D3', 'LLAJ', 'Pedurungan Lor RT 03 RW 05, KECAMATAN PEDURUNGAN KOTA SEMARANG', 'ISLAM', 'pkwtt', '089620197437', NULL, NULL, NULL, 'dikyafif97@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (113, 'WIDHAS NUGRAHA PUTRA', '9718120413', '3215290704970003', 'L', 'Karawang', '1997-04-07', '2018-10-01', 'D3', 'LLAJ', 'Griya panorama indah blok a4/12 desa purwasari, kecamatan purwasari, kabupaten karawang.', 'ISLAM', 'pkwtt', ' 085899499169', NULL, NULL, NULL, 'widhassttd@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (114, 'IRMA SUCI HARY AKBARANI', '9718120395', '3275014904970011', 'P', 'Cilacap', '1997-04-09', '2018-10-01', 'D3', 'LLAJ', ' Jl. Candi Kalasan Blok B No 239 RT/RW: 07/11 Duren Jaya Bekasi Timur Kota Bekasi 17111', 'ISLAM', 'pkwtt', ' 081807469901', NULL, NULL, NULL, ' irmasha9497@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (115, 'MUHAMMAD SYARIF RIZKY NAZAR', '9718120403', '3309050904979002', 'L', 'BOYOLALI', '1997-04-09', '2018-10-01', 'D3', 'LLAJ', 'BSP 2 BLOK O NO 11 RT/RW 02 /11, KARANGGENENG, BOYOLALI', 'ISLAM', 'pkwtt', ' 08586893854', NULL, NULL, NULL, 'NAZARSMANSA@GMAIL.COM', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (116, 'YUNIAR AHMAD ZAIN', '9718120415', '3318101904970006', 'L', 'PATI', '1997-04-19', '2018-10-01', 'D3', 'LLAJ', 'JL. P. DIPONEGORO GANG II NO. 3A RT 23/RW 01 DS. WINONG, KEC. PATI, KAB. PATI, JAWA TENGAH', 'ISLAM', 'pkwtt', ' 085786447729', NULL, NULL, NULL, 'yuniarahmadz@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (117, 'FARRAS ADAM', '9718120384', '3302242504970002', 'L', 'Banyumas', '1997-04-25', '2018-10-01', 'D3', 'LLAJ', 'JALAN GERILYA BARAT NOMOR 25A RT3/RW2, TANJUNG , PURWOKERTO SELATA', 'ISLAM', 'pkwtt', '082133320193', NULL, NULL, NULL, ' farras.adam@yahoo.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (118, 'TINO MEIRZAL HARTAWAN', '9718120411', '3374131005970000', 'L', 'PALANGKARAYA ', '1997-05-10', '2018-10-01', 'D3', 'LLAJ', 'JL BUKIT BERINGIN LESTARI V / B 154 RT 04 RW 14 KELURAHAN WONOSARI KECAMATAN NGALIYAN KOTA SEMARANG', 'ISLAM', 'pkwtt', '082133784415', NULL, NULL, NULL, 'tinomeirzal@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (119, 'SITI NURHIDAYAH', '9718120409', '3671125505970002', 'P', ' tangerang', '1997-05-15', '2018-10-01', 'D3', 'LLAJ', 'jalan raden saleh rt 005 rw 02 no.1 kelurahan karang mulya, kecamatan karang tengah, kota tangerang 15157', 'ISLAM', 'pkwtt', ' 085711341754', NULL, NULL, NULL, 'cityoflight15@yahoo.co.id', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (120, 'FINA FAUZIAH HANUM', '9718120389', ' 3173086105970003', 'P', ' Jakarta', '1997-05-21', '2018-10-01', 'D3', 'LLAJ', 'Jl Bambu II rt 03/06 No 51 Srengseng, Kembangan,  Jakarta Barat', 'ISLAM', 'pkwtt', '08772234745', NULL, NULL, NULL, 'finafauziah1997@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (121, 'MEIGY NUR HANDAYANI', '9718120398', '3276056205970005', 'P', 'Jakarta', '1997-05-22', '2018-10-01', 'D3', 'LLAJ', 'Kampung Sugutamu No 55 RT 004 RW 021 Kelurahan Mekarjaya Kecamatan Sukmajaya Kota Depok', 'ISLAM', 'pkwtt', '085691582264', NULL, NULL, NULL, 'meigyhandayani20@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (122, 'MIA TRISNAWATI', '9718120399', ' 3573037005970003', 'P', ' Cimahi', '1997-05-30', '2018-10-01', 'D3', 'LLAJ', 'Perum Puri Kartika Asri M-1 desa arjowinangun, kecamatan kedungkandang, kota malang.', 'ISLAM', 'pkwtt', '089646662152', NULL, NULL, NULL, 'miatrsnwt@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (123, 'ADITYA PRATAMA ISMED', '9718120369', ' 3329070406970005', 'L', 'BREBES', '1997-06-04', '2018-10-01', 'D3', 'LLAJ', ' PERUMAHAN JATIBARANG INDAH NO.13A RT.01/RW.11 DESA JATIBARANG KIDUL, KEC. JATIBARANG, KAB. BREBES', 'ISLAM', 'pkwtt', ' 082223629008', NULL, NULL, NULL, 'adityaismed@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (124, 'DIMAS AYU SAFITRI', '9718120379', '3519114906970001', 'L', 'Madiun', '1997-06-09', '2018-10-01', 'D3', 'LLAJ', 'Desa kaliabau rt 20 rw 05 kecamatan mejayan kabupaten madiun', 'ISLAM', 'pkwtt', '081230700437', NULL, NULL, NULL, 'dimasayusafitri@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (125, 'FAUZAN PRATAMA PUTRA', '9718120385', '3275110906970006', 'L', 'Bekasi', '1997-06-09', '2018-10-01', 'D3', 'LLAJ', 'Perum. Dukuh Zambrud, Blok S 12 No. 21, Padurenan, Mustikajaya, Kota Bekasi', 'ISLAM', 'pkwtt', ' 081288675378', NULL, NULL, NULL, 'profauzan@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (126, 'RHASIE BATARA PUTRA', '9718120407', '7316021806970001', 'L', 'BANDUNG', '1997-06-18', '2018-10-01', 'D3', 'LLAJ', 'ALAN BUTTU JUPPANDANG NO 95 ENREKANG SUL-SEL', 'ISLAM', 'pkwtt', '082395866962', NULL, NULL, NULL, ' rhasieocha@yahoo.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (127, 'SAVIRA RAMADHIANTI', '9718120408', '3275055607970014', 'P', ' JAKARTA', '1997-07-16', '2018-10-01', 'D3', 'LLAJ', 'TAMAN BEKASI ASRI JL.ASRI 11 BLOK:K/1 RT/RW:04/029 PENGASINAN, RAWALUMBU, BEKAS', 'ISLAM', 'pkwtt', ' 081295541969', NULL, NULL, NULL, ' sramadhianti@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (128, 'DWIVA RIZKY MAULANA', '9718120380', '3211181707970008', 'L', 'SUMEDANG', '1997-07-17', '2018-10-01', 'D3', 'LLAJ', 'LINGK MARGAJAYA RT 3/18 KEL.SITU KEC. SUMEDANG UTARA KAB. SUMEDANG', 'ISLAM', 'pkwtt', '081298809505', NULL, NULL, NULL, 'dwivamaulana@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (129, 'AKBAR SONA DOA', '9718120373', '3328142207970001', 'L', 'Tegal', '1997-07-22', '2018-10-01', 'D3', 'LLAJ', ' Jl. Wanabhakti no. 09 Desa Kalijambe Rt.02 / Rw. 01 Kec. Tarub Kab. Tegal', 'ISLAM', 'pkwtt', '085736699376', NULL, NULL, NULL, 'asd.jalanterus@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (130, 'YUDITHYA RINEFI PRATAMA', '9718120414', '2172020408970004', 'L', 'Tanjungpinang', '1997-08-04', '2018-10-01', 'D3', 'LLAJ', 'Perum Taman Harapan Indah blok c no.47 km 9 Kota Tanjungpinang', 'ISLAM', 'pkwtt', '082321447433', NULL, NULL, NULL, ' yudithya4@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (131, 'VOLTA MOHAMAD BRILIAN', '9718120412', '3374131209970003', 'L', 'Kendal', '1997-09-12', '2018-10-01', 'D3', 'LLAJ', ' Perum Gondoriyo Asri No 23 RT 05 RW 06 Bringin, Ngaliyan, Kota Semarang', 'ISLAM', 'pkwtt', '085694756085', NULL, NULL, NULL, 'voltabrilian12@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (132, 'MUHAMMAD HANIF ANNASSER', '9718120402', '3275022409970009', 'L', 'Jakarta', '1997-09-24', '2018-10-01', 'D3', 'LLAJ', ' Jalan Kampung Setu RT 03 RW 01 No. 59 Bintara Jaya, Bekasi Barat, Bekasi 17136', 'ISLAM', 'pkwtt', ' 081908052712', NULL, NULL, NULL, 'hanif.anas71@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (133, 'ALBERTUS RHIDY OKTAVISA', '9718120374', ' 3275030410970009', 'L', 'BEKASI', '1997-10-04', '2018-10-01', 'D3', 'LLAJ', 'KAVLING TEGAL PERINTIS B1/16 RT/RW 006/002 KEL. MARGAMULYA KEC. BEKASI UTARA KOTA BEKASI  JAWA BARAT 17142', 'ISLAM', 'pkwtt', '08889827726', NULL, NULL, NULL, 'abetoctavisa@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (134, 'FERRY RAHMATUL FAJRI', '9718120388', '1373021610970002', 'L', 'Jakarta', '1997-10-16', '2018-10-01', 'D3', 'LLAJ', 'Jl. Thalib Dusun Ladang Laweh Desa Talago gunung Kecamatan Barangin Kota Sawahlunto Prov.  Sumbar', 'ISLAM', 'pkwtt', '081277761213', NULL, NULL, NULL, 'ferryrfajri97@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (135, 'ALTHAFURRAHMAN', '9718120375', ' 3201292010970002', 'L', 'banda aceh', '1997-10-20', '2018-10-01', 'D3', 'LLAJ', 'bukit asri blok a10 no 38 ciomas, bogor', 'ISLAM', 'pkwtt', '089527501103', NULL, NULL, NULL, 'althafurrahman20@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (136, 'GUMILAR CAHYO EDY', '9718120390', '3315172009970003', 'L', 'Grobogan', '1997-10-20', '2018-10-01', 'D3', 'LLAJ', ' Jl Jati Peting no 56 Desa Rowosari Kecamatan Gubug Kabupaten Grobogan', 'ISLAM', 'pkwtt', '085600010160', NULL, NULL, NULL, 'gumilarcahyoedy@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (137, 'RAIDEDO VININDO SILALAHI', '9718120406', '1272031711970003', 'L', 'Pematangsiantar', '1997-11-17', '2018-10-01', 'D3', 'LLAJ', 'Jl.Kain Sungkit No 14 RT 003 RW 006 Kelurahan  Bane Kecamatan Siantar Utara Kota Pematangsiantar Sumatera Utara', 'KRISTEN ', 'pkwtt', ' 082113882701', NULL, NULL, NULL, 'vinindo76641@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (138, 'TANGGUH NOVINUGRAHA', '9718120410', '3173082611970000', 'L', ' jakarta', '1997-11-26', '2018-10-01', 'D3', 'LLAJ', 'kav hankam blok a 4 no 9', 'ISLAM', 'pkwtt', ' 089663236552', NULL, NULL, NULL, 'nugrahatnr@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (139, 'BENNY SAUT TARAPUL MARBUN', '9718120377', ' 6371012912970001', 'L', 'Banjarmasin', '1997-12-29', '2018-10-01', 'D3', 'LLAJ', 'Komplek Mantuil Raya Blok D No. 110 RT 18 RW 01 Banjarmasin Selatan, Banjarmasin', 'KRISTEN ', 'pkwtt', '081398409084', NULL, NULL, NULL, 'bennymarbun2912@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (140, 'MUHAMMAD FARHAN FUADY', '9818120404', '3513192901980002', 'L', 'MALANG', '1998-01-29', '2018-10-01', 'D3', 'LLAJ', 'PONDOK PABEAN INDAH BLOK K.7 KEC. DRINGU, KAB. PROBOLINGGO, PROV. JAWA TIMUR', 'ISLAM', 'pkwtt', ' 081295348664', NULL, NULL, NULL, 'farhanfued9@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (141, 'HASAN NUR HIDAYATULLAH', '9818120393', '32160931010006', 'L', 'Jakarta', '1998-01-31', '2018-10-01', 'D3', 'LLAJ', 'Kp. Pulo Kapuk RT 02 RW 05 Kecamatan Cikarang Utara Kabupaten Bekasi', 'ISLAM', 'pkwtt', '085219331346', NULL, NULL, NULL, 'hasan.nurhidayah31@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (142, 'ANIS SYAUQI', '9818120376', '3216081602980005', 'P', 'DEPOK', '1998-02-16', '2018-10-01', 'D3', 'LLAJ', 'PERUMAHAN TAMAN ASTER FD 3/5, RT 020 RW 007, DESA TELAGA ASIH, KECAMATAN CIKARANG BARAT, KABUPATEN BEKASI', 'ISLAM', 'pkwtt', ' 082113615489', NULL, NULL, NULL, ' syauqianis99@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (143, 'IZDIHAR MUHAMMAD JUFRI', '9818120396', '3216194604980002', 'L', ' Batam', '1998-04-06', '2018-10-01', 'D3', 'LLAJ', 'Villa Mutiara Cikarang Blok R3 No. 9, RT025/RW010, Kelurahan Ciantra, Kec. Cikarang Selatan, Kab. Bekasi', 'ISLAM', 'pkwtt', '082298098756', NULL, NULL, NULL, ' iis.izdihar40@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (144, 'FERIYAN CHANDRA MULYA UTAMA', '9818120387', '3314110505980001', 'L', 'Sragen', '1998-05-05', '2018-10-01', 'D3', 'LLAJ', ' pengan rt 28 rw 09, Purwosuman, sidoharjo, sragen', 'ISLAM', 'pkwtt', '085287274664', NULL, NULL, NULL, 'chandra05051998@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (145, 'FAZRI ZURACHMAN', '9818120386', '2172022706980004', 'L', 'tanjung pinang', '1998-06-27', '2018-10-01', 'D3', 'LLAJ', 'pondok bahar rt kel. pondok bahar. kec. karang tengah. tanggerang banten 005/rw 06 blok s nomer 14', 'ISLAM', 'pkwtt', '081287102268', NULL, NULL, NULL, 'fazri.tpi98@gmail.con', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (146, 'KARTIKO PUTRO WIJANARKO', '9818120397', '3311082407980003', 'L', 'Sukoharjo', '1998-07-24', '2018-10-01', 'D3', 'LLAJ', 'Winong Rt 02 Rw 02 Kragilan Mojolaban Sukoharjo', 'ISLAM', 'pkwtt', '08989216234', NULL, NULL, NULL, 'cesterfaraday@gmail.com', '664/KP.301/DAMRI-2018', '2018-10-02', '0', NULL, 'II/C', 'CP', 0, 0, 'Staf Usaha', 3, 3, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (147, 'ADITYA NUR KHAERULLAH', '9118120211', '3201011306910007', 'L', 'BOGOR', '1991-06-13', '2018-01-04', 'D3', NULL, 'Cibinong, Rt 002/008 Kab Bogor, Jawa barat.', 'ISLAM', 'pkwtt', '087874693591', NULL, NULL, NULL, 'aditya.nur.khaerullah@gmail.com', 'SK.239/KP.301/DAMRI-2018', '0000-00-00', '0', NULL, 'II/C', 'CP', 0, 0, 'Pel. Adm. Renlitbang & TI', 3, 9, 1282480, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (148, 'TEGUH ADITYA DHARMA, A.Md', '8618120305', '6112090606860012', 'L', 'Pontianak', '1986-06-06', '2016-11-01', 'D3', NULL, 'Jl. Wonoburu Gg. Wonodadi 3 Rt 002/003 Kel Kota baru, Kec Pontianak selatan Kota Pontianak', 'ISLAM', '0', '', '', '', '', '', 'SK.392/KP.301/DAMRI-2018', '0000-00-00', '0', '0000-00-00', 'II/C', 'CP', 1, 1, 'Pel. Adm. Renlitbang & TI', 2, 3, 1282480, 0, 77, 2, 1, NULL, '2019-02-02 19:16:08');
INSERT INTO `ref_pegawai` VALUES (149, 'YORIVINNA NOVITA', '891812036', '3175024611890001', 'P', 'Jakarta', '1989-11-06', '2018-07-01', 'D3', NULL, 'Komp. Pertamina Jl. Paus No 34, Rawamangun, Jakarta', 'Katolik', 'pkwtt', '087878942771', NULL, NULL, NULL, 'yorivina@yahoo.com', '417/KP.301/DAMRI-2018', '0000-00-00', NULL, NULL, 'II/C', 'CP', 0, 0, 'Sekretaris Direktur Utama', 3, 6, 1282480, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (150, 'SARAH APRILIZA HUTABARAT', '9018120308', '3275085104900022', 'P', 'Jakarta', '1990-04-11', '2018-07-01', 'D3', NULL, 'Jln, Taruna V No. 5A Rt.006, Rw.002, Jatiwaringin, Pondok Gede, Bekasi, Jawa Barat', 'Katolik', 'pkwtt', '081380093805', NULL, NULL, NULL, 'sarahapriliza90@gmail.com', '417/KP.301/DAMRI-2018', '0000-00-00', NULL, NULL, 'II/C', 'CP', 0, 0, 'Sekretaris Direktur Kom dan Pengemb Ush', 3, 6, 1282480, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (151, 'INTAN MARIANI SARMAULI', '9018120307', '3175026109900008', 'P', 'Jakarta', '1990-09-21', '1990-09-21', 'D3', NULL, 'Jl. Cilandak dalam I, Jakarta', 'Katolik', 'pkwtt', '087777368811', NULL, '14044639459', NULL, 'intanmaria21@gmail.com', '417/KP.301/DAMRI-2018', '0000-00-00', NULL, NULL, 'II/C', 'CP', 0, 0, 'Sekretaris Pokja Bidang Alat Produksi', 3, 6, 1282480, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (152, 'ARI SETIAWAN', '9515120296', '9105010902950006', 'L', 'KLATEN', '1995-02-09', '2018-01-06', 'SMA', 'Akuntasi', 'Jl. Palapa Rt 004/006 Serui Kota, Yapen selatan, Papua', 'KRISTEN', 'pkwtt', '8114810902', NULL, NULL, NULL, NULL, '346/KP.301/DAMRI-2018', '2018-01-06', '0', NULL, 'II/A', 'CP', 0, 0, 'Staf Subdit Komersial', 3, 10, 1256480, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (153, 'INDAH PURWAYANTI, SE', 'PKP04', '3271015401900000', 'P', 'Bogor', '1990-01-14', '2018-05-30', 'S1', NULL, 'Jl. Cipinang Gading, Gading Residence No. 11, Bogor Selatan', 'ISLAM', 'pkwt', '081318214678', NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, 'PKP', 'KTR', 0, 0, 'Pel. Adm Umum/Resepsionis', NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (154, 'AGUS FENDIYANTO', 'PKP03', '3528030108900001', 'L', 'Pamekasan', '1990-08-01', '2018-06-29', 'S1', NULL, 'Dusun Darma RT17/RW07 Desa Bulay Kec. Galis Kabupaten Pamekasan', 'ISLAM', '0', '085755912296', '', '', '', 'angoez.fendiyanto@gmail.com', '0', '0000-00-00', '0', '0000-00-00', 'PKP', 'KTR', 0, 0, 'Pel. Adm. Renlitbang & TI', 0, 7, 0, 0, 77, 3, 1, NULL, '2019-02-02 19:16:26');
INSERT INTO `ref_pegawai` VALUES (155, 'LYDIA LUPITA NAULI W', 'PKP05', '3216065807940014', 'P', 'Bekasi', '1994-07-18', '2018-07-03', 'S1', NULL, 'Taman Puri Cendana Blok A4 No. 2 Tambun Selatan', 'KRISTEN', 'pkwt', '087741502869', NULL, NULL, NULL, 'lydialupita.11@gmail.com', '0', NULL, '0', NULL, 'PKP', 'KTR', 0, 0, 'Staf Subdit SDM', NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (156, 'FAIZ ZAINOL LUTJI AFANDI', 'PKP08', '3520102203910000', 'L', 'Sumenep', '1991-03-22', '2018-07-11', 'S1', NULL, 'Dusun Talesek, RT. 005 RW. 002, Kel. Gapura Barat, Kec. Gapura, Sumenep, Jawa Timur', 'ISLAM', 'pkwt', '082292182444', NULL, NULL, NULL, 'faiz.informatics09@gmail.com', '0', NULL, '0', NULL, 'PKP', 'KTR', 0, 0, 'Pel. Adm. Renlitbang & TI', NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (157, 'I GEDE DIATMIKA', 'PKP10', '3275022606800020', 'L', 'Bali', '1980-06-26', '2018-09-07', 'SMK', NULL, 'Jl. Belimbing Blok AH3/11, RT.002/RW.004 Kel. Kota Baru, Kec. Bekasi Barat Kota Bekasi 17133', 'HINDU', 'pkwt', '87876564442', NULL, NULL, NULL, 'diatmikagde08@gmail.com', '0', NULL, '0', NULL, 'PKP', 'KTR', 0, 0, 'Pel. Adm Umum', NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-29 08:44:54');
INSERT INTO `ref_pegawai` VALUES (158, 'NOERACHMAN ADI PRATAMA', 'PKP11', '3273012001890000', 'L', 'BANDUNG', '1989-01-20', '2018-09-07', 'D3', NULL, 'Jl.Geger kalong lebak II No. 8, RT. 001/008, Desa Geger kalong, Kec. Sukasari, Kota Bandung', 'ISLAM', '0', '081110101404', '12345', '45678', '7890', 'noe.adipratama@gmail.com', '0', '2019-01-29', '0', '2019-01-30', 'PKP', 'KTR', 0, 1, 'Pel. Adm. Renlitbang & TI', 0, 4, 3500000, 60, 77, 56, 1, 1, '2019-02-07 16:54:13');
INSERT INTO `ref_pegawai` VALUES (159, 'KAKA ZAKARIA WISANGGENI', 'PKP01', '3306122808960000', 'L', 'Purworejo', '1996-08-28', '2018-10-10', 'S1', NULL, 'Krajan, RT. 001, RW. 003, Kel. Kemiri Kidul, Kec. Kemiri, Kab. Purworejo, Jawa Tengah', 'ISLAM', 'pkwt', '089667918720', NULL, NULL, NULL, 'kakazakariawisanggeni@gmail.com', '0', NULL, '0', NULL, 'PKP', 'KTR', 0, 0, 'Staf Sekertaris Perusahaan', NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (160, 'AGUS YULIARKO, ST', 'PKP13', '3520142708910001', 'L', 'Magetan', '1991-08-27', '2018-12-10', 'S1', 'Teknik Mesin', 'Jl. Sili No. 3-4 Perum Harapan Jaya, Bekas, Jawa Barat', 'ISLAM', 'pkwt', '085235984027', NULL, NULL, NULL, 'ayuliarko26@gmail.com', '0', NULL, '0', NULL, 'PKP', 'KTR', 0, 0, 'Staf Teknik', NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (161, 'DHEARA DUANDA PUTRI', 'PKP09', '3175066007971001', 'P', 'Palembang', '1997-07-20', '2018-08-13', 'SMK', NULL, 'Cakung Barat, Rt.005, Rw.001, Kel. Cakung Barat, Kec. Cakung, Jakarta Timur', 'ISLAM', 'pkwt', '081294454598', NULL, NULL, NULL, 'dheaduanda20@gmail.com', '0', NULL, '0', NULL, 'PKP', 'KTR', 0, 0, 'Pel. Adm Umum/Resepsionis', NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (162, 'OLGA FEBRIANI PURBA', 'PKP06', '1201035302940000', 'P', 'Sibolga', '1994-02-13', '2018-07-18', 'S1', NULL, 'Jalan Medis No. 46B Srengsengsawah, Lenteng Agung, Jakarta Selatan', 'KRISTEN', 'pkwt', '085275404155', NULL, NULL, NULL, 'olga13.feb@gmail.com', '0', NULL, '0', NULL, 'PKP', 'KTR', 0, 0, 'Staf Subdit SDM', NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-29 08:44:40');
INSERT INTO `ref_pegawai` VALUES (163, 'CHRISTANANDA RATNADY', 'PKP07', '3526010701930003', 'L', 'Bangkalan', '1993-07-01', '0000-00-00', '', NULL, 'Jl. Kapten Syafiri VI/20 Rt 005/001, Pejagan, Bangkalan Jawa timur', 'ISLAM', '0', '', '', '', '', 'nandaratnady@gmail.com', '0', '0000-00-00', '0', '0000-00-00', 'PKP', 'KTR', 0, 0, 'Pel. Adm. Renlitbang & TI', 0, 0, 0, 0, 77, 1, 1, NULL, '2019-02-02 19:13:11');
INSERT INTO `ref_pegawai` VALUES (164, 'VINSA NUR PRADANA SY', 'PKP12', '6372022306920004', 'L', 'Purwokerto', '1992-06-23', '2018-12-10', 'S1', 'Ekonomi', 'Perumnas Tlogosari Jl. Kawung Raya No. 49 RT. 09 RW. 14 Semarang', 'ISLAM', 'pkwt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PKP', 'KTR', 0, 0, 'Staf Subdit SDM', NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-29 08:43:44');
INSERT INTO `ref_pegawai` VALUES (165, 'DIPOWIRAWAN KURNAEN', 'PKP14', NULL, 'L', 'Banjarmasin', '1981-09-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kepala Unit Bisnis Asett  Management dan Property Development', NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (166, 'FANI NURSYAMSI', 'PKP16', NULL, 'L', 'Garut', '1989-11-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pjs Kepala Subdivisi Evaluasi Kinerja Operasi', NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (167, 'RIDWAN ALI RHOIS', 'PKP15', NULL, 'L', 'Cirebon', '1991-01-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pjs Kepala Subdivisi Perencanaan Operasi', NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (168, 'SUNARDI', 'PKP18', NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (169, 'PRYANDI GERALD L', 'PKP20', NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, 77, NULL, 1, NULL, '2019-01-23 10:31:25');
INSERT INTO `ref_pegawai` VALUES (170, '123', '123', '123', 'L', '123', '2019-01-29', '2019-01-29', 'S1', NULL, '123', 'ISLAM', '0', '123', '123', '123', '123', '123', '123', '2019-01-29', '123', '2019-01-29', '123', '123', 123, 123, '123', 123, 123, 123, 2, 77, 123, 2, NULL, '2019-02-06 09:33:14');
COMMIT;

-- ----------------------------
-- Table structure for ref_pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `ref_pendidikan`;
CREATE TABLE `ref_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `jenis_pendidikan` varchar(255) DEFAULT NULL,
  `nm_pendidikan` varchar(255) DEFAULT NULL,
  `level_pendidikan` varchar(255) DEFAULT NULL,
  `tahun_pendidikan` year(4) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `cuser` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pendidikan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_pendidikan
-- ----------------------------
BEGIN;
INSERT INTO `ref_pendidikan` VALUES (1, NULL, NULL, 'SD / Sederajat', NULL, NULL, 1, NULL, NULL, 77);
INSERT INTO `ref_pendidikan` VALUES (2, NULL, NULL, 'SMP / Sederajat', NULL, NULL, 1, NULL, NULL, 77);
INSERT INTO `ref_pendidikan` VALUES (3, NULL, NULL, 'SMA/SMK / Sederajat', NULL, NULL, 1, NULL, NULL, 77);
INSERT INTO `ref_pendidikan` VALUES (4, NULL, NULL, 'D1', NULL, NULL, 1, NULL, NULL, 77);
INSERT INTO `ref_pendidikan` VALUES (5, NULL, NULL, 'D2', NULL, NULL, 1, NULL, NULL, 77);
INSERT INTO `ref_pendidikan` VALUES (6, NULL, NULL, 'D3', NULL, NULL, 1, NULL, NULL, 77);
INSERT INTO `ref_pendidikan` VALUES (7, NULL, NULL, 'D4', NULL, NULL, 1, NULL, NULL, 77);
INSERT INTO `ref_pendidikan` VALUES (8, NULL, NULL, 'S1', NULL, NULL, 1, NULL, NULL, 77);
INSERT INTO `ref_pendidikan` VALUES (9, NULL, NULL, 'S2', NULL, NULL, 1, NULL, NULL, 77);
INSERT INTO `ref_pendidikan` VALUES (10, NULL, NULL, 'S3', NULL, NULL, 1, NULL, NULL, 77);
COMMIT;

-- ----------------------------
-- Table structure for ref_pengalaman
-- ----------------------------
DROP TABLE IF EXISTS `ref_pengalaman`;
CREATE TABLE `ref_pengalaman` (
  `id_pengalaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `nm_perusahaan` varchar(255) DEFAULT NULL,
  `tahun_pengalaman` year(4) DEFAULT NULL,
  `posisi_pengalaman` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `cuser` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pengalaman`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ref_perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `ref_perusahaan`;
CREATE TABLE `ref_perusahaan` (
  `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_perusahaan` varchar(45) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(15) DEFAULT NULL,
  `jenis` tinyint(1) DEFAULT NULL COMMENT '1. Pusat 2. Subcon',
  `active` tinyint(1) DEFAULT NULL COMMENT '1. Active\n2. Deactive',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `fifo` tinyint(1) DEFAULT '0' COMMENT '0. deactive 1.active',
  `fefo` tinyint(1) DEFAULT '0' COMMENT '0. deactive 1.active',
  `best` tinyint(1) DEFAULT '0' COMMENT '0. deactive 1.active',
  `alloc` varchar(1) DEFAULT 'F' COMMENT 'F FIFO E FEFO B Best Fit',
  `language` varchar(50) DEFAULT 'english' COMMENT 'english / indonesian',
  PRIMARY KEY (`id_perusahaan`) USING BTREE,
  KEY `fk_id_user_ref_perusahaan_idx` (`cuser`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_perusahaan
-- ----------------------------
BEGIN;
INSERT INTO `ref_perusahaan` VALUES (77, 'DAMRI', 'DKI Jakarta', '', 1, 1, '2017-07-13 06:51:28', 2, '32eaa902bd56712f93c0ee514b47b59c.png', 1, 1, 0, 'F', 'indonesian');
COMMIT;

-- ----------------------------
-- Table structure for ref_posisi
-- ----------------------------
DROP TABLE IF EXISTS `ref_posisi`;
CREATE TABLE `ref_posisi` (
  `id_posisi` int(11) NOT NULL AUTO_INCREMENT,
  `nm_posisi` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_posisi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_posisi
-- ----------------------------
BEGIN;
INSERT INTO `ref_posisi` VALUES (1, 'General Manager', 1, 77);
INSERT INTO `ref_posisi` VALUES (2, 'Deputi', 1, 77);
INSERT INTO `ref_posisi` VALUES (3, 'Asisten Deputi', 1, 77);
INSERT INTO `ref_posisi` VALUES (4, 'Manager', 1, 77);
INSERT INTO `ref_posisi` VALUES (5, 'Asisten Manager', 1, 77);
INSERT INTO `ref_posisi` VALUES (6, 'Kepala Divisi', 1, 77);
INSERT INTO `ref_posisi` VALUES (7, 'Kepala Sub Divisi', 1, 77);
INSERT INTO `ref_posisi` VALUES (8, 'Staff', 1, 77);
INSERT INTO `ref_posisi` VALUES (9, 'Kondektur', 1, 77);
INSERT INTO `ref_posisi` VALUES (10, 'Driver', 1, 77);
INSERT INTO `ref_posisi` VALUES (11, 'PPA', 1, 77);
INSERT INTO `ref_posisi` VALUES (12, 'Timer', 1, 77);
INSERT INTO `ref_posisi` VALUES (13, 'Mekanik', 1, 77);
INSERT INTO `ref_posisi` VALUES (14, 'Counter', 1, 77);
INSERT INTO `ref_posisi` VALUES (15, 'Lain lain', 1, 77);
COMMIT;

-- ----------------------------
-- Table structure for ref_user
-- ----------------------------
DROP TABLE IF EXISTS `ref_user`;
CREATE TABLE `ref_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nm_user` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT '0',
  `id_level` int(11) DEFAULT NULL,
  `id_atasan` int(11) DEFAULT NULL,
  `id_bu` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. Active\n2. Deactive\n',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `vendor` tinyint(1) DEFAULT '0',
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE KEY `fk_username` (`username`) USING BTREE,
  KEY `fk_id_perusahaan_ref_user_idx` (`id_perusahaan`) USING BTREE,
  KEY `fk_id_level_ref_level_idx` (`id_level`) USING BTREE,
  KEY `fk_id_user_ref_user` (`cuser`) USING BTREE,
  KEY `fk_id_atasan` (`id_atasan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_user
-- ----------------------------
BEGIN;
INSERT INTO `ref_user` VALUES (1, 'Pratama', 'noe.adipratama@gmail.com', '986c9baaf20157cbf32b21c0314b3e2a', 77, 1, 1, 1, 1, '2016-05-31 10:14:01', 1, 'noe.adipratama@gmail.com', 1, 1);
INSERT INTO `ref_user` VALUES (2, 'Cristananda Ratnady', 'nandaratnady@gmail.com', '1ac5836dc0a551b2c17c108894da53cc', 77, 1, NULL, 8, 1, '2018-12-18 15:00:33', 1, 'nandaratnady@gmail.com', 0, NULL);
INSERT INTO `ref_user` VALUES (3, 'Admin SDM', 'damrisdm', 'ef8e9a90ec034cb42ce2495377b6b6b2', 77, 1, NULL, 8, 1, '2018-12-20 06:51:06', 2, 'damrisdm', 0, NULL);
INSERT INTO `ref_user` VALUES (4, 'User Survei SDM', 'damri', '23110f0ac5101b068530196ec4089809', 77, 2, NULL, 60, 1, '2018-12-27 08:58:36', 2, 'damri', 0, NULL);
INSERT INTO `ref_user` VALUES (5, 'Teguh Aditya', 'teguh', '261a794363c16c2a9969c2ee093673d6', 77, 1, NULL, 60, 1, '2019-01-11 18:25:08', 1, 'teguh', 0, NULL);
COMMIT;

-- ----------------------------
-- Table structure for time_dimension
-- ----------------------------
DROP TABLE IF EXISTS `time_dimension`;
CREATE TABLE `time_dimension` (
  `id` int(11) NOT NULL,
  `db_date` date NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `quarter` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `day_name` varchar(9) NOT NULL,
  `month_name` varchar(9) NOT NULL,
  `holiday_flag` char(1) DEFAULT 'f',
  `weekend_flag` char(1) DEFAULT 'f',
  `event` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `td_ymd_idx` (`year`,`month`,`day`) USING BTREE,
  UNIQUE KEY `td_dbdate_idx` (`db_date`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of time_dimension
-- ----------------------------
BEGIN;
INSERT INTO `time_dimension` VALUES (20180101, '2018-01-01', 2018, 1, 1, 1, 1, 'Monday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180102, '2018-01-02', 2018, 1, 2, 1, 1, 'Tuesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180103, '2018-01-03', 2018, 1, 3, 1, 1, 'Wednesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180104, '2018-01-04', 2018, 1, 4, 1, 1, 'Thursday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180105, '2018-01-05', 2018, 1, 5, 1, 1, 'Friday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180106, '2018-01-06', 2018, 1, 6, 1, 1, 'Saturday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180107, '2018-01-07', 2018, 1, 7, 1, 1, 'Sunday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180108, '2018-01-08', 2018, 1, 8, 1, 2, 'Monday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180109, '2018-01-09', 2018, 1, 9, 1, 2, 'Tuesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180110, '2018-01-10', 2018, 1, 10, 1, 2, 'Wednesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180111, '2018-01-11', 2018, 1, 11, 1, 2, 'Thursday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180112, '2018-01-12', 2018, 1, 12, 1, 2, 'Friday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180113, '2018-01-13', 2018, 1, 13, 1, 2, 'Saturday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180114, '2018-01-14', 2018, 1, 14, 1, 2, 'Sunday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180115, '2018-01-15', 2018, 1, 15, 1, 3, 'Monday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180116, '2018-01-16', 2018, 1, 16, 1, 3, 'Tuesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180117, '2018-01-17', 2018, 1, 17, 1, 3, 'Wednesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180118, '2018-01-18', 2018, 1, 18, 1, 3, 'Thursday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180119, '2018-01-19', 2018, 1, 19, 1, 3, 'Friday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180120, '2018-01-20', 2018, 1, 20, 1, 3, 'Saturday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180121, '2018-01-21', 2018, 1, 21, 1, 3, 'Sunday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180122, '2018-01-22', 2018, 1, 22, 1, 4, 'Monday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180123, '2018-01-23', 2018, 1, 23, 1, 4, 'Tuesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180124, '2018-01-24', 2018, 1, 24, 1, 4, 'Wednesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180125, '2018-01-25', 2018, 1, 25, 1, 4, 'Thursday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180126, '2018-01-26', 2018, 1, 26, 1, 4, 'Friday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180127, '2018-01-27', 2018, 1, 27, 1, 4, 'Saturday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180128, '2018-01-28', 2018, 1, 28, 1, 4, 'Sunday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180129, '2018-01-29', 2018, 1, 29, 1, 5, 'Monday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180130, '2018-01-30', 2018, 1, 30, 1, 5, 'Tuesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180131, '2018-01-31', 2018, 1, 31, 1, 5, 'Wednesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180201, '2018-02-01', 2018, 2, 1, 1, 5, 'Thursday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180202, '2018-02-02', 2018, 2, 2, 1, 5, 'Friday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180203, '2018-02-03', 2018, 2, 3, 1, 5, 'Saturday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180204, '2018-02-04', 2018, 2, 4, 1, 5, 'Sunday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180205, '2018-02-05', 2018, 2, 5, 1, 6, 'Monday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180206, '2018-02-06', 2018, 2, 6, 1, 6, 'Tuesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180207, '2018-02-07', 2018, 2, 7, 1, 6, 'Wednesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180208, '2018-02-08', 2018, 2, 8, 1, 6, 'Thursday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180209, '2018-02-09', 2018, 2, 9, 1, 6, 'Friday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180210, '2018-02-10', 2018, 2, 10, 1, 6, 'Saturday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180211, '2018-02-11', 2018, 2, 11, 1, 6, 'Sunday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180212, '2018-02-12', 2018, 2, 12, 1, 7, 'Monday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180213, '2018-02-13', 2018, 2, 13, 1, 7, 'Tuesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180214, '2018-02-14', 2018, 2, 14, 1, 7, 'Wednesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180215, '2018-02-15', 2018, 2, 15, 1, 7, 'Thursday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180216, '2018-02-16', 2018, 2, 16, 1, 7, 'Friday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180217, '2018-02-17', 2018, 2, 17, 1, 7, 'Saturday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180218, '2018-02-18', 2018, 2, 18, 1, 7, 'Sunday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180219, '2018-02-19', 2018, 2, 19, 1, 8, 'Monday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180220, '2018-02-20', 2018, 2, 20, 1, 8, 'Tuesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180221, '2018-02-21', 2018, 2, 21, 1, 8, 'Wednesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180222, '2018-02-22', 2018, 2, 22, 1, 8, 'Thursday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180223, '2018-02-23', 2018, 2, 23, 1, 8, 'Friday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180224, '2018-02-24', 2018, 2, 24, 1, 8, 'Saturday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180225, '2018-02-25', 2018, 2, 25, 1, 8, 'Sunday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180226, '2018-02-26', 2018, 2, 26, 1, 9, 'Monday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180227, '2018-02-27', 2018, 2, 27, 1, 9, 'Tuesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180228, '2018-02-28', 2018, 2, 28, 1, 9, 'Wednesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180301, '2018-03-01', 2018, 3, 1, 1, 9, 'Thursday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180302, '2018-03-02', 2018, 3, 2, 1, 9, 'Friday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180303, '2018-03-03', 2018, 3, 3, 1, 9, 'Saturday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180304, '2018-03-04', 2018, 3, 4, 1, 9, 'Sunday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180305, '2018-03-05', 2018, 3, 5, 1, 10, 'Monday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180306, '2018-03-06', 2018, 3, 6, 1, 10, 'Tuesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180307, '2018-03-07', 2018, 3, 7, 1, 10, 'Wednesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180308, '2018-03-08', 2018, 3, 8, 1, 10, 'Thursday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180309, '2018-03-09', 2018, 3, 9, 1, 10, 'Friday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180310, '2018-03-10', 2018, 3, 10, 1, 10, 'Saturday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180311, '2018-03-11', 2018, 3, 11, 1, 10, 'Sunday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180312, '2018-03-12', 2018, 3, 12, 1, 11, 'Monday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180313, '2018-03-13', 2018, 3, 13, 1, 11, 'Tuesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180314, '2018-03-14', 2018, 3, 14, 1, 11, 'Wednesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180315, '2018-03-15', 2018, 3, 15, 1, 11, 'Thursday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180316, '2018-03-16', 2018, 3, 16, 1, 11, 'Friday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180317, '2018-03-17', 2018, 3, 17, 1, 11, 'Saturday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180318, '2018-03-18', 2018, 3, 18, 1, 11, 'Sunday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180319, '2018-03-19', 2018, 3, 19, 1, 12, 'Monday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180320, '2018-03-20', 2018, 3, 20, 1, 12, 'Tuesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180321, '2018-03-21', 2018, 3, 21, 1, 12, 'Wednesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180322, '2018-03-22', 2018, 3, 22, 1, 12, 'Thursday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180323, '2018-03-23', 2018, 3, 23, 1, 12, 'Friday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180324, '2018-03-24', 2018, 3, 24, 1, 12, 'Saturday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180325, '2018-03-25', 2018, 3, 25, 1, 12, 'Sunday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180326, '2018-03-26', 2018, 3, 26, 1, 13, 'Monday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180327, '2018-03-27', 2018, 3, 27, 1, 13, 'Tuesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180328, '2018-03-28', 2018, 3, 28, 1, 13, 'Wednesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180329, '2018-03-29', 2018, 3, 29, 1, 13, 'Thursday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180330, '2018-03-30', 2018, 3, 30, 1, 13, 'Friday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180331, '2018-03-31', 2018, 3, 31, 1, 13, 'Saturday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180401, '2018-04-01', 2018, 4, 1, 2, 13, 'Sunday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180402, '2018-04-02', 2018, 4, 2, 2, 14, 'Monday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180403, '2018-04-03', 2018, 4, 3, 2, 14, 'Tuesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180404, '2018-04-04', 2018, 4, 4, 2, 14, 'Wednesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180405, '2018-04-05', 2018, 4, 5, 2, 14, 'Thursday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180406, '2018-04-06', 2018, 4, 6, 2, 14, 'Friday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180407, '2018-04-07', 2018, 4, 7, 2, 14, 'Saturday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180408, '2018-04-08', 2018, 4, 8, 2, 14, 'Sunday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180409, '2018-04-09', 2018, 4, 9, 2, 15, 'Monday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180410, '2018-04-10', 2018, 4, 10, 2, 15, 'Tuesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180411, '2018-04-11', 2018, 4, 11, 2, 15, 'Wednesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180412, '2018-04-12', 2018, 4, 12, 2, 15, 'Thursday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180413, '2018-04-13', 2018, 4, 13, 2, 15, 'Friday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180414, '2018-04-14', 2018, 4, 14, 2, 15, 'Saturday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180415, '2018-04-15', 2018, 4, 15, 2, 15, 'Sunday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180416, '2018-04-16', 2018, 4, 16, 2, 16, 'Monday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180417, '2018-04-17', 2018, 4, 17, 2, 16, 'Tuesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180418, '2018-04-18', 2018, 4, 18, 2, 16, 'Wednesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180419, '2018-04-19', 2018, 4, 19, 2, 16, 'Thursday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180420, '2018-04-20', 2018, 4, 20, 2, 16, 'Friday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180421, '2018-04-21', 2018, 4, 21, 2, 16, 'Saturday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180422, '2018-04-22', 2018, 4, 22, 2, 16, 'Sunday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180423, '2018-04-23', 2018, 4, 23, 2, 17, 'Monday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180424, '2018-04-24', 2018, 4, 24, 2, 17, 'Tuesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180425, '2018-04-25', 2018, 4, 25, 2, 17, 'Wednesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180426, '2018-04-26', 2018, 4, 26, 2, 17, 'Thursday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180427, '2018-04-27', 2018, 4, 27, 2, 17, 'Friday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180428, '2018-04-28', 2018, 4, 28, 2, 17, 'Saturday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180429, '2018-04-29', 2018, 4, 29, 2, 17, 'Sunday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180430, '2018-04-30', 2018, 4, 30, 2, 18, 'Monday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180501, '2018-05-01', 2018, 5, 1, 2, 18, 'Tuesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180502, '2018-05-02', 2018, 5, 2, 2, 18, 'Wednesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180503, '2018-05-03', 2018, 5, 3, 2, 18, 'Thursday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180504, '2018-05-04', 2018, 5, 4, 2, 18, 'Friday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180505, '2018-05-05', 2018, 5, 5, 2, 18, 'Saturday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180506, '2018-05-06', 2018, 5, 6, 2, 18, 'Sunday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180507, '2018-05-07', 2018, 5, 7, 2, 19, 'Monday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180508, '2018-05-08', 2018, 5, 8, 2, 19, 'Tuesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180509, '2018-05-09', 2018, 5, 9, 2, 19, 'Wednesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180510, '2018-05-10', 2018, 5, 10, 2, 19, 'Thursday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180511, '2018-05-11', 2018, 5, 11, 2, 19, 'Friday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180512, '2018-05-12', 2018, 5, 12, 2, 19, 'Saturday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180513, '2018-05-13', 2018, 5, 13, 2, 19, 'Sunday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180514, '2018-05-14', 2018, 5, 14, 2, 20, 'Monday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180515, '2018-05-15', 2018, 5, 15, 2, 20, 'Tuesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180516, '2018-05-16', 2018, 5, 16, 2, 20, 'Wednesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180517, '2018-05-17', 2018, 5, 17, 2, 20, 'Thursday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180518, '2018-05-18', 2018, 5, 18, 2, 20, 'Friday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180519, '2018-05-19', 2018, 5, 19, 2, 20, 'Saturday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180520, '2018-05-20', 2018, 5, 20, 2, 20, 'Sunday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180521, '2018-05-21', 2018, 5, 21, 2, 21, 'Monday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180522, '2018-05-22', 2018, 5, 22, 2, 21, 'Tuesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180523, '2018-05-23', 2018, 5, 23, 2, 21, 'Wednesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180524, '2018-05-24', 2018, 5, 24, 2, 21, 'Thursday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180525, '2018-05-25', 2018, 5, 25, 2, 21, 'Friday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180526, '2018-05-26', 2018, 5, 26, 2, 21, 'Saturday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180527, '2018-05-27', 2018, 5, 27, 2, 21, 'Sunday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180528, '2018-05-28', 2018, 5, 28, 2, 22, 'Monday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180529, '2018-05-29', 2018, 5, 29, 2, 22, 'Tuesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180530, '2018-05-30', 2018, 5, 30, 2, 22, 'Wednesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180531, '2018-05-31', 2018, 5, 31, 2, 22, 'Thursday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180601, '2018-06-01', 2018, 6, 1, 2, 22, 'Friday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180602, '2018-06-02', 2018, 6, 2, 2, 22, 'Saturday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180603, '2018-06-03', 2018, 6, 3, 2, 22, 'Sunday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180604, '2018-06-04', 2018, 6, 4, 2, 23, 'Monday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180605, '2018-06-05', 2018, 6, 5, 2, 23, 'Tuesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180606, '2018-06-06', 2018, 6, 6, 2, 23, 'Wednesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180607, '2018-06-07', 2018, 6, 7, 2, 23, 'Thursday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180608, '2018-06-08', 2018, 6, 8, 2, 23, 'Friday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180609, '2018-06-09', 2018, 6, 9, 2, 23, 'Saturday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180610, '2018-06-10', 2018, 6, 10, 2, 23, 'Sunday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180611, '2018-06-11', 2018, 6, 11, 2, 24, 'Monday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180612, '2018-06-12', 2018, 6, 12, 2, 24, 'Tuesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180613, '2018-06-13', 2018, 6, 13, 2, 24, 'Wednesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180614, '2018-06-14', 2018, 6, 14, 2, 24, 'Thursday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180615, '2018-06-15', 2018, 6, 15, 2, 24, 'Friday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180616, '2018-06-16', 2018, 6, 16, 2, 24, 'Saturday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180617, '2018-06-17', 2018, 6, 17, 2, 24, 'Sunday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180618, '2018-06-18', 2018, 6, 18, 2, 25, 'Monday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180619, '2018-06-19', 2018, 6, 19, 2, 25, 'Tuesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180620, '2018-06-20', 2018, 6, 20, 2, 25, 'Wednesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180621, '2018-06-21', 2018, 6, 21, 2, 25, 'Thursday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180622, '2018-06-22', 2018, 6, 22, 2, 25, 'Friday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180623, '2018-06-23', 2018, 6, 23, 2, 25, 'Saturday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180624, '2018-06-24', 2018, 6, 24, 2, 25, 'Sunday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180625, '2018-06-25', 2018, 6, 25, 2, 26, 'Monday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180626, '2018-06-26', 2018, 6, 26, 2, 26, 'Tuesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180627, '2018-06-27', 2018, 6, 27, 2, 26, 'Wednesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180628, '2018-06-28', 2018, 6, 28, 2, 26, 'Thursday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180629, '2018-06-29', 2018, 6, 29, 2, 26, 'Friday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180630, '2018-06-30', 2018, 6, 30, 2, 26, 'Saturday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180701, '2018-07-01', 2018, 7, 1, 3, 26, 'Sunday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180702, '2018-07-02', 2018, 7, 2, 3, 27, 'Monday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180703, '2018-07-03', 2018, 7, 3, 3, 27, 'Tuesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180704, '2018-07-04', 2018, 7, 4, 3, 27, 'Wednesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180705, '2018-07-05', 2018, 7, 5, 3, 27, 'Thursday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180706, '2018-07-06', 2018, 7, 6, 3, 27, 'Friday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180707, '2018-07-07', 2018, 7, 7, 3, 27, 'Saturday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180708, '2018-07-08', 2018, 7, 8, 3, 27, 'Sunday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180709, '2018-07-09', 2018, 7, 9, 3, 28, 'Monday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180710, '2018-07-10', 2018, 7, 10, 3, 28, 'Tuesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180711, '2018-07-11', 2018, 7, 11, 3, 28, 'Wednesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180712, '2018-07-12', 2018, 7, 12, 3, 28, 'Thursday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180713, '2018-07-13', 2018, 7, 13, 3, 28, 'Friday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180714, '2018-07-14', 2018, 7, 14, 3, 28, 'Saturday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180715, '2018-07-15', 2018, 7, 15, 3, 28, 'Sunday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180716, '2018-07-16', 2018, 7, 16, 3, 29, 'Monday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180717, '2018-07-17', 2018, 7, 17, 3, 29, 'Tuesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180718, '2018-07-18', 2018, 7, 18, 3, 29, 'Wednesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180719, '2018-07-19', 2018, 7, 19, 3, 29, 'Thursday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180720, '2018-07-20', 2018, 7, 20, 3, 29, 'Friday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180721, '2018-07-21', 2018, 7, 21, 3, 29, 'Saturday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180722, '2018-07-22', 2018, 7, 22, 3, 29, 'Sunday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180723, '2018-07-23', 2018, 7, 23, 3, 30, 'Monday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180724, '2018-07-24', 2018, 7, 24, 3, 30, 'Tuesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180725, '2018-07-25', 2018, 7, 25, 3, 30, 'Wednesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180726, '2018-07-26', 2018, 7, 26, 3, 30, 'Thursday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180727, '2018-07-27', 2018, 7, 27, 3, 30, 'Friday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180728, '2018-07-28', 2018, 7, 28, 3, 30, 'Saturday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180729, '2018-07-29', 2018, 7, 29, 3, 30, 'Sunday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180730, '2018-07-30', 2018, 7, 30, 3, 31, 'Monday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180731, '2018-07-31', 2018, 7, 31, 3, 31, 'Tuesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180801, '2018-08-01', 2018, 8, 1, 3, 31, 'Wednesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180802, '2018-08-02', 2018, 8, 2, 3, 31, 'Thursday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180803, '2018-08-03', 2018, 8, 3, 3, 31, 'Friday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180804, '2018-08-04', 2018, 8, 4, 3, 31, 'Saturday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180805, '2018-08-05', 2018, 8, 5, 3, 31, 'Sunday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180806, '2018-08-06', 2018, 8, 6, 3, 32, 'Monday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180807, '2018-08-07', 2018, 8, 7, 3, 32, 'Tuesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180808, '2018-08-08', 2018, 8, 8, 3, 32, 'Wednesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180809, '2018-08-09', 2018, 8, 9, 3, 32, 'Thursday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180810, '2018-08-10', 2018, 8, 10, 3, 32, 'Friday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180811, '2018-08-11', 2018, 8, 11, 3, 32, 'Saturday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180812, '2018-08-12', 2018, 8, 12, 3, 32, 'Sunday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180813, '2018-08-13', 2018, 8, 13, 3, 33, 'Monday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180814, '2018-08-14', 2018, 8, 14, 3, 33, 'Tuesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180815, '2018-08-15', 2018, 8, 15, 3, 33, 'Wednesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180816, '2018-08-16', 2018, 8, 16, 3, 33, 'Thursday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180817, '2018-08-17', 2018, 8, 17, 3, 33, 'Friday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180818, '2018-08-18', 2018, 8, 18, 3, 33, 'Saturday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180819, '2018-08-19', 2018, 8, 19, 3, 33, 'Sunday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180820, '2018-08-20', 2018, 8, 20, 3, 34, 'Monday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180821, '2018-08-21', 2018, 8, 21, 3, 34, 'Tuesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180822, '2018-08-22', 2018, 8, 22, 3, 34, 'Wednesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180823, '2018-08-23', 2018, 8, 23, 3, 34, 'Thursday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180824, '2018-08-24', 2018, 8, 24, 3, 34, 'Friday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180825, '2018-08-25', 2018, 8, 25, 3, 34, 'Saturday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180826, '2018-08-26', 2018, 8, 26, 3, 34, 'Sunday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180827, '2018-08-27', 2018, 8, 27, 3, 35, 'Monday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180828, '2018-08-28', 2018, 8, 28, 3, 35, 'Tuesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180829, '2018-08-29', 2018, 8, 29, 3, 35, 'Wednesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180830, '2018-08-30', 2018, 8, 30, 3, 35, 'Thursday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180831, '2018-08-31', 2018, 8, 31, 3, 35, 'Friday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180901, '2018-09-01', 2018, 9, 1, 3, 35, 'Saturday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180902, '2018-09-02', 2018, 9, 2, 3, 35, 'Sunday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180903, '2018-09-03', 2018, 9, 3, 3, 36, 'Monday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180904, '2018-09-04', 2018, 9, 4, 3, 36, 'Tuesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180905, '2018-09-05', 2018, 9, 5, 3, 36, 'Wednesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180906, '2018-09-06', 2018, 9, 6, 3, 36, 'Thursday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180907, '2018-09-07', 2018, 9, 7, 3, 36, 'Friday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180908, '2018-09-08', 2018, 9, 8, 3, 36, 'Saturday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180909, '2018-09-09', 2018, 9, 9, 3, 36, 'Sunday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180910, '2018-09-10', 2018, 9, 10, 3, 37, 'Monday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180911, '2018-09-11', 2018, 9, 11, 3, 37, 'Tuesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180912, '2018-09-12', 2018, 9, 12, 3, 37, 'Wednesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180913, '2018-09-13', 2018, 9, 13, 3, 37, 'Thursday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180914, '2018-09-14', 2018, 9, 14, 3, 37, 'Friday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180915, '2018-09-15', 2018, 9, 15, 3, 37, 'Saturday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180916, '2018-09-16', 2018, 9, 16, 3, 37, 'Sunday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180917, '2018-09-17', 2018, 9, 17, 3, 38, 'Monday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180918, '2018-09-18', 2018, 9, 18, 3, 38, 'Tuesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180919, '2018-09-19', 2018, 9, 19, 3, 38, 'Wednesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180920, '2018-09-20', 2018, 9, 20, 3, 38, 'Thursday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180921, '2018-09-21', 2018, 9, 21, 3, 38, 'Friday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180922, '2018-09-22', 2018, 9, 22, 3, 38, 'Saturday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180923, '2018-09-23', 2018, 9, 23, 3, 38, 'Sunday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180924, '2018-09-24', 2018, 9, 24, 3, 39, 'Monday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180925, '2018-09-25', 2018, 9, 25, 3, 39, 'Tuesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180926, '2018-09-26', 2018, 9, 26, 3, 39, 'Wednesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180927, '2018-09-27', 2018, 9, 27, 3, 39, 'Thursday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180928, '2018-09-28', 2018, 9, 28, 3, 39, 'Friday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20180929, '2018-09-29', 2018, 9, 29, 3, 39, 'Saturday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20180930, '2018-09-30', 2018, 9, 30, 3, 39, 'Sunday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181001, '2018-10-01', 2018, 10, 1, 4, 40, 'Monday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181002, '2018-10-02', 2018, 10, 2, 4, 40, 'Tuesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181003, '2018-10-03', 2018, 10, 3, 4, 40, 'Wednesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181004, '2018-10-04', 2018, 10, 4, 4, 40, 'Thursday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181005, '2018-10-05', 2018, 10, 5, 4, 40, 'Friday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181006, '2018-10-06', 2018, 10, 6, 4, 40, 'Saturday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181007, '2018-10-07', 2018, 10, 7, 4, 40, 'Sunday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181008, '2018-10-08', 2018, 10, 8, 4, 41, 'Monday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181009, '2018-10-09', 2018, 10, 9, 4, 41, 'Tuesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181010, '2018-10-10', 2018, 10, 10, 4, 41, 'Wednesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181011, '2018-10-11', 2018, 10, 11, 4, 41, 'Thursday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181012, '2018-10-12', 2018, 10, 12, 4, 41, 'Friday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181013, '2018-10-13', 2018, 10, 13, 4, 41, 'Saturday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181014, '2018-10-14', 2018, 10, 14, 4, 41, 'Sunday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181015, '2018-10-15', 2018, 10, 15, 4, 42, 'Monday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181016, '2018-10-16', 2018, 10, 16, 4, 42, 'Tuesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181017, '2018-10-17', 2018, 10, 17, 4, 42, 'Wednesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181018, '2018-10-18', 2018, 10, 18, 4, 42, 'Thursday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181019, '2018-10-19', 2018, 10, 19, 4, 42, 'Friday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181020, '2018-10-20', 2018, 10, 20, 4, 42, 'Saturday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181021, '2018-10-21', 2018, 10, 21, 4, 42, 'Sunday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181022, '2018-10-22', 2018, 10, 22, 4, 43, 'Monday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181023, '2018-10-23', 2018, 10, 23, 4, 43, 'Tuesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181024, '2018-10-24', 2018, 10, 24, 4, 43, 'Wednesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181025, '2018-10-25', 2018, 10, 25, 4, 43, 'Thursday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181026, '2018-10-26', 2018, 10, 26, 4, 43, 'Friday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181027, '2018-10-27', 2018, 10, 27, 4, 43, 'Saturday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181028, '2018-10-28', 2018, 10, 28, 4, 43, 'Sunday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181029, '2018-10-29', 2018, 10, 29, 4, 44, 'Monday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181030, '2018-10-30', 2018, 10, 30, 4, 44, 'Tuesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181031, '2018-10-31', 2018, 10, 31, 4, 44, 'Wednesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181101, '2018-11-01', 2018, 11, 1, 4, 44, 'Thursday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181102, '2018-11-02', 2018, 11, 2, 4, 44, 'Friday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181103, '2018-11-03', 2018, 11, 3, 4, 44, 'Saturday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181104, '2018-11-04', 2018, 11, 4, 4, 44, 'Sunday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181105, '2018-11-05', 2018, 11, 5, 4, 45, 'Monday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181106, '2018-11-06', 2018, 11, 6, 4, 45, 'Tuesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181107, '2018-11-07', 2018, 11, 7, 4, 45, 'Wednesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181108, '2018-11-08', 2018, 11, 8, 4, 45, 'Thursday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181109, '2018-11-09', 2018, 11, 9, 4, 45, 'Friday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181110, '2018-11-10', 2018, 11, 10, 4, 45, 'Saturday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181111, '2018-11-11', 2018, 11, 11, 4, 45, 'Sunday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181112, '2018-11-12', 2018, 11, 12, 4, 46, 'Monday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181113, '2018-11-13', 2018, 11, 13, 4, 46, 'Tuesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181114, '2018-11-14', 2018, 11, 14, 4, 46, 'Wednesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181115, '2018-11-15', 2018, 11, 15, 4, 46, 'Thursday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181116, '2018-11-16', 2018, 11, 16, 4, 46, 'Friday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181117, '2018-11-17', 2018, 11, 17, 4, 46, 'Saturday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181118, '2018-11-18', 2018, 11, 18, 4, 46, 'Sunday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181119, '2018-11-19', 2018, 11, 19, 4, 47, 'Monday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181120, '2018-11-20', 2018, 11, 20, 4, 47, 'Tuesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181121, '2018-11-21', 2018, 11, 21, 4, 47, 'Wednesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181122, '2018-11-22', 2018, 11, 22, 4, 47, 'Thursday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181123, '2018-11-23', 2018, 11, 23, 4, 47, 'Friday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181124, '2018-11-24', 2018, 11, 24, 4, 47, 'Saturday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181125, '2018-11-25', 2018, 11, 25, 4, 47, 'Sunday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181126, '2018-11-26', 2018, 11, 26, 4, 48, 'Monday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181127, '2018-11-27', 2018, 11, 27, 4, 48, 'Tuesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181128, '2018-11-28', 2018, 11, 28, 4, 48, 'Wednesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181129, '2018-11-29', 2018, 11, 29, 4, 48, 'Thursday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181130, '2018-11-30', 2018, 11, 30, 4, 48, 'Friday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181201, '2018-12-01', 2018, 12, 1, 4, 48, 'Saturday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181202, '2018-12-02', 2018, 12, 2, 4, 48, 'Sunday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181203, '2018-12-03', 2018, 12, 3, 4, 49, 'Monday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181204, '2018-12-04', 2018, 12, 4, 4, 49, 'Tuesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181205, '2018-12-05', 2018, 12, 5, 4, 49, 'Wednesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181206, '2018-12-06', 2018, 12, 6, 4, 49, 'Thursday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181207, '2018-12-07', 2018, 12, 7, 4, 49, 'Friday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181208, '2018-12-08', 2018, 12, 8, 4, 49, 'Saturday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181209, '2018-12-09', 2018, 12, 9, 4, 49, 'Sunday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181210, '2018-12-10', 2018, 12, 10, 4, 50, 'Monday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181211, '2018-12-11', 2018, 12, 11, 4, 50, 'Tuesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181212, '2018-12-12', 2018, 12, 12, 4, 50, 'Wednesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181213, '2018-12-13', 2018, 12, 13, 4, 50, 'Thursday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181214, '2018-12-14', 2018, 12, 14, 4, 50, 'Friday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181215, '2018-12-15', 2018, 12, 15, 4, 50, 'Saturday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181216, '2018-12-16', 2018, 12, 16, 4, 50, 'Sunday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181217, '2018-12-17', 2018, 12, 17, 4, 51, 'Monday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181218, '2018-12-18', 2018, 12, 18, 4, 51, 'Tuesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181219, '2018-12-19', 2018, 12, 19, 4, 51, 'Wednesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181220, '2018-12-20', 2018, 12, 20, 4, 51, 'Thursday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181221, '2018-12-21', 2018, 12, 21, 4, 51, 'Friday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181222, '2018-12-22', 2018, 12, 22, 4, 51, 'Saturday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181223, '2018-12-23', 2018, 12, 23, 4, 51, 'Sunday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181224, '2018-12-24', 2018, 12, 24, 4, 52, 'Monday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181225, '2018-12-25', 2018, 12, 25, 4, 52, 'Tuesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181226, '2018-12-26', 2018, 12, 26, 4, 52, 'Wednesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181227, '2018-12-27', 2018, 12, 27, 4, 52, 'Thursday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181228, '2018-12-28', 2018, 12, 28, 4, 52, 'Friday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20181229, '2018-12-29', 2018, 12, 29, 4, 52, 'Saturday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181230, '2018-12-30', 2018, 12, 30, 4, 52, 'Sunday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20181231, '2018-12-31', 2018, 12, 31, 4, 1, 'Monday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190101, '2019-01-01', 2019, 1, 1, 1, 1, 'Tuesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190102, '2019-01-02', 2019, 1, 2, 1, 1, 'Wednesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190103, '2019-01-03', 2019, 1, 3, 1, 1, 'Thursday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190104, '2019-01-04', 2019, 1, 4, 1, 1, 'Friday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190105, '2019-01-05', 2019, 1, 5, 1, 1, 'Saturday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190106, '2019-01-06', 2019, 1, 6, 1, 1, 'Sunday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190107, '2019-01-07', 2019, 1, 7, 1, 2, 'Monday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190108, '2019-01-08', 2019, 1, 8, 1, 2, 'Tuesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190109, '2019-01-09', 2019, 1, 9, 1, 2, 'Wednesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190110, '2019-01-10', 2019, 1, 10, 1, 2, 'Thursday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190111, '2019-01-11', 2019, 1, 11, 1, 2, 'Friday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190112, '2019-01-12', 2019, 1, 12, 1, 2, 'Saturday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190113, '2019-01-13', 2019, 1, 13, 1, 2, 'Sunday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190114, '2019-01-14', 2019, 1, 14, 1, 3, 'Monday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190115, '2019-01-15', 2019, 1, 15, 1, 3, 'Tuesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190116, '2019-01-16', 2019, 1, 16, 1, 3, 'Wednesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190117, '2019-01-17', 2019, 1, 17, 1, 3, 'Thursday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190118, '2019-01-18', 2019, 1, 18, 1, 3, 'Friday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190119, '2019-01-19', 2019, 1, 19, 1, 3, 'Saturday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190120, '2019-01-20', 2019, 1, 20, 1, 3, 'Sunday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190121, '2019-01-21', 2019, 1, 21, 1, 4, 'Monday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190122, '2019-01-22', 2019, 1, 22, 1, 4, 'Tuesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190123, '2019-01-23', 2019, 1, 23, 1, 4, 'Wednesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190124, '2019-01-24', 2019, 1, 24, 1, 4, 'Thursday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190125, '2019-01-25', 2019, 1, 25, 1, 4, 'Friday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190126, '2019-01-26', 2019, 1, 26, 1, 4, 'Saturday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190127, '2019-01-27', 2019, 1, 27, 1, 4, 'Sunday', 'January', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190128, '2019-01-28', 2019, 1, 28, 1, 5, 'Monday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190129, '2019-01-29', 2019, 1, 29, 1, 5, 'Tuesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190130, '2019-01-30', 2019, 1, 30, 1, 5, 'Wednesday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190131, '2019-01-31', 2019, 1, 31, 1, 5, 'Thursday', 'January', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190201, '2019-02-01', 2019, 2, 1, 1, 5, 'Friday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190202, '2019-02-02', 2019, 2, 2, 1, 5, 'Saturday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190203, '2019-02-03', 2019, 2, 3, 1, 5, 'Sunday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190204, '2019-02-04', 2019, 2, 4, 1, 6, 'Monday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190205, '2019-02-05', 2019, 2, 5, 1, 6, 'Tuesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190206, '2019-02-06', 2019, 2, 6, 1, 6, 'Wednesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190207, '2019-02-07', 2019, 2, 7, 1, 6, 'Thursday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190208, '2019-02-08', 2019, 2, 8, 1, 6, 'Friday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190209, '2019-02-09', 2019, 2, 9, 1, 6, 'Saturday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190210, '2019-02-10', 2019, 2, 10, 1, 6, 'Sunday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190211, '2019-02-11', 2019, 2, 11, 1, 7, 'Monday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190212, '2019-02-12', 2019, 2, 12, 1, 7, 'Tuesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190213, '2019-02-13', 2019, 2, 13, 1, 7, 'Wednesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190214, '2019-02-14', 2019, 2, 14, 1, 7, 'Thursday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190215, '2019-02-15', 2019, 2, 15, 1, 7, 'Friday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190216, '2019-02-16', 2019, 2, 16, 1, 7, 'Saturday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190217, '2019-02-17', 2019, 2, 17, 1, 7, 'Sunday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190218, '2019-02-18', 2019, 2, 18, 1, 8, 'Monday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190219, '2019-02-19', 2019, 2, 19, 1, 8, 'Tuesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190220, '2019-02-20', 2019, 2, 20, 1, 8, 'Wednesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190221, '2019-02-21', 2019, 2, 21, 1, 8, 'Thursday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190222, '2019-02-22', 2019, 2, 22, 1, 8, 'Friday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190223, '2019-02-23', 2019, 2, 23, 1, 8, 'Saturday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190224, '2019-02-24', 2019, 2, 24, 1, 8, 'Sunday', 'February', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190225, '2019-02-25', 2019, 2, 25, 1, 9, 'Monday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190226, '2019-02-26', 2019, 2, 26, 1, 9, 'Tuesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190227, '2019-02-27', 2019, 2, 27, 1, 9, 'Wednesday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190228, '2019-02-28', 2019, 2, 28, 1, 9, 'Thursday', 'February', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190301, '2019-03-01', 2019, 3, 1, 1, 9, 'Friday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190302, '2019-03-02', 2019, 3, 2, 1, 9, 'Saturday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190303, '2019-03-03', 2019, 3, 3, 1, 9, 'Sunday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190304, '2019-03-04', 2019, 3, 4, 1, 10, 'Monday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190305, '2019-03-05', 2019, 3, 5, 1, 10, 'Tuesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190306, '2019-03-06', 2019, 3, 6, 1, 10, 'Wednesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190307, '2019-03-07', 2019, 3, 7, 1, 10, 'Thursday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190308, '2019-03-08', 2019, 3, 8, 1, 10, 'Friday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190309, '2019-03-09', 2019, 3, 9, 1, 10, 'Saturday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190310, '2019-03-10', 2019, 3, 10, 1, 10, 'Sunday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190311, '2019-03-11', 2019, 3, 11, 1, 11, 'Monday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190312, '2019-03-12', 2019, 3, 12, 1, 11, 'Tuesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190313, '2019-03-13', 2019, 3, 13, 1, 11, 'Wednesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190314, '2019-03-14', 2019, 3, 14, 1, 11, 'Thursday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190315, '2019-03-15', 2019, 3, 15, 1, 11, 'Friday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190316, '2019-03-16', 2019, 3, 16, 1, 11, 'Saturday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190317, '2019-03-17', 2019, 3, 17, 1, 11, 'Sunday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190318, '2019-03-18', 2019, 3, 18, 1, 12, 'Monday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190319, '2019-03-19', 2019, 3, 19, 1, 12, 'Tuesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190320, '2019-03-20', 2019, 3, 20, 1, 12, 'Wednesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190321, '2019-03-21', 2019, 3, 21, 1, 12, 'Thursday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190322, '2019-03-22', 2019, 3, 22, 1, 12, 'Friday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190323, '2019-03-23', 2019, 3, 23, 1, 12, 'Saturday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190324, '2019-03-24', 2019, 3, 24, 1, 12, 'Sunday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190325, '2019-03-25', 2019, 3, 25, 1, 13, 'Monday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190326, '2019-03-26', 2019, 3, 26, 1, 13, 'Tuesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190327, '2019-03-27', 2019, 3, 27, 1, 13, 'Wednesday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190328, '2019-03-28', 2019, 3, 28, 1, 13, 'Thursday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190329, '2019-03-29', 2019, 3, 29, 1, 13, 'Friday', 'March', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190330, '2019-03-30', 2019, 3, 30, 1, 13, 'Saturday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190331, '2019-03-31', 2019, 3, 31, 1, 13, 'Sunday', 'March', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190401, '2019-04-01', 2019, 4, 1, 2, 14, 'Monday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190402, '2019-04-02', 2019, 4, 2, 2, 14, 'Tuesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190403, '2019-04-03', 2019, 4, 3, 2, 14, 'Wednesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190404, '2019-04-04', 2019, 4, 4, 2, 14, 'Thursday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190405, '2019-04-05', 2019, 4, 5, 2, 14, 'Friday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190406, '2019-04-06', 2019, 4, 6, 2, 14, 'Saturday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190407, '2019-04-07', 2019, 4, 7, 2, 14, 'Sunday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190408, '2019-04-08', 2019, 4, 8, 2, 15, 'Monday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190409, '2019-04-09', 2019, 4, 9, 2, 15, 'Tuesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190410, '2019-04-10', 2019, 4, 10, 2, 15, 'Wednesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190411, '2019-04-11', 2019, 4, 11, 2, 15, 'Thursday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190412, '2019-04-12', 2019, 4, 12, 2, 15, 'Friday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190413, '2019-04-13', 2019, 4, 13, 2, 15, 'Saturday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190414, '2019-04-14', 2019, 4, 14, 2, 15, 'Sunday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190415, '2019-04-15', 2019, 4, 15, 2, 16, 'Monday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190416, '2019-04-16', 2019, 4, 16, 2, 16, 'Tuesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190417, '2019-04-17', 2019, 4, 17, 2, 16, 'Wednesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190418, '2019-04-18', 2019, 4, 18, 2, 16, 'Thursday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190419, '2019-04-19', 2019, 4, 19, 2, 16, 'Friday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190420, '2019-04-20', 2019, 4, 20, 2, 16, 'Saturday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190421, '2019-04-21', 2019, 4, 21, 2, 16, 'Sunday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190422, '2019-04-22', 2019, 4, 22, 2, 17, 'Monday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190423, '2019-04-23', 2019, 4, 23, 2, 17, 'Tuesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190424, '2019-04-24', 2019, 4, 24, 2, 17, 'Wednesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190425, '2019-04-25', 2019, 4, 25, 2, 17, 'Thursday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190426, '2019-04-26', 2019, 4, 26, 2, 17, 'Friday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190427, '2019-04-27', 2019, 4, 27, 2, 17, 'Saturday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190428, '2019-04-28', 2019, 4, 28, 2, 17, 'Sunday', 'April', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190429, '2019-04-29', 2019, 4, 29, 2, 18, 'Monday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190430, '2019-04-30', 2019, 4, 30, 2, 18, 'Tuesday', 'April', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190501, '2019-05-01', 2019, 5, 1, 2, 18, 'Wednesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190502, '2019-05-02', 2019, 5, 2, 2, 18, 'Thursday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190503, '2019-05-03', 2019, 5, 3, 2, 18, 'Friday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190504, '2019-05-04', 2019, 5, 4, 2, 18, 'Saturday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190505, '2019-05-05', 2019, 5, 5, 2, 18, 'Sunday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190506, '2019-05-06', 2019, 5, 6, 2, 19, 'Monday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190507, '2019-05-07', 2019, 5, 7, 2, 19, 'Tuesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190508, '2019-05-08', 2019, 5, 8, 2, 19, 'Wednesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190509, '2019-05-09', 2019, 5, 9, 2, 19, 'Thursday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190510, '2019-05-10', 2019, 5, 10, 2, 19, 'Friday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190511, '2019-05-11', 2019, 5, 11, 2, 19, 'Saturday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190512, '2019-05-12', 2019, 5, 12, 2, 19, 'Sunday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190513, '2019-05-13', 2019, 5, 13, 2, 20, 'Monday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190514, '2019-05-14', 2019, 5, 14, 2, 20, 'Tuesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190515, '2019-05-15', 2019, 5, 15, 2, 20, 'Wednesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190516, '2019-05-16', 2019, 5, 16, 2, 20, 'Thursday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190517, '2019-05-17', 2019, 5, 17, 2, 20, 'Friday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190518, '2019-05-18', 2019, 5, 18, 2, 20, 'Saturday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190519, '2019-05-19', 2019, 5, 19, 2, 20, 'Sunday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190520, '2019-05-20', 2019, 5, 20, 2, 21, 'Monday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190521, '2019-05-21', 2019, 5, 21, 2, 21, 'Tuesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190522, '2019-05-22', 2019, 5, 22, 2, 21, 'Wednesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190523, '2019-05-23', 2019, 5, 23, 2, 21, 'Thursday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190524, '2019-05-24', 2019, 5, 24, 2, 21, 'Friday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190525, '2019-05-25', 2019, 5, 25, 2, 21, 'Saturday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190526, '2019-05-26', 2019, 5, 26, 2, 21, 'Sunday', 'May', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190527, '2019-05-27', 2019, 5, 27, 2, 22, 'Monday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190528, '2019-05-28', 2019, 5, 28, 2, 22, 'Tuesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190529, '2019-05-29', 2019, 5, 29, 2, 22, 'Wednesday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190530, '2019-05-30', 2019, 5, 30, 2, 22, 'Thursday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190531, '2019-05-31', 2019, 5, 31, 2, 22, 'Friday', 'May', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190601, '2019-06-01', 2019, 6, 1, 2, 22, 'Saturday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190602, '2019-06-02', 2019, 6, 2, 2, 22, 'Sunday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190603, '2019-06-03', 2019, 6, 3, 2, 23, 'Monday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190604, '2019-06-04', 2019, 6, 4, 2, 23, 'Tuesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190605, '2019-06-05', 2019, 6, 5, 2, 23, 'Wednesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190606, '2019-06-06', 2019, 6, 6, 2, 23, 'Thursday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190607, '2019-06-07', 2019, 6, 7, 2, 23, 'Friday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190608, '2019-06-08', 2019, 6, 8, 2, 23, 'Saturday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190609, '2019-06-09', 2019, 6, 9, 2, 23, 'Sunday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190610, '2019-06-10', 2019, 6, 10, 2, 24, 'Monday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190611, '2019-06-11', 2019, 6, 11, 2, 24, 'Tuesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190612, '2019-06-12', 2019, 6, 12, 2, 24, 'Wednesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190613, '2019-06-13', 2019, 6, 13, 2, 24, 'Thursday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190614, '2019-06-14', 2019, 6, 14, 2, 24, 'Friday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190615, '2019-06-15', 2019, 6, 15, 2, 24, 'Saturday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190616, '2019-06-16', 2019, 6, 16, 2, 24, 'Sunday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190617, '2019-06-17', 2019, 6, 17, 2, 25, 'Monday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190618, '2019-06-18', 2019, 6, 18, 2, 25, 'Tuesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190619, '2019-06-19', 2019, 6, 19, 2, 25, 'Wednesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190620, '2019-06-20', 2019, 6, 20, 2, 25, 'Thursday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190621, '2019-06-21', 2019, 6, 21, 2, 25, 'Friday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190622, '2019-06-22', 2019, 6, 22, 2, 25, 'Saturday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190623, '2019-06-23', 2019, 6, 23, 2, 25, 'Sunday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190624, '2019-06-24', 2019, 6, 24, 2, 26, 'Monday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190625, '2019-06-25', 2019, 6, 25, 2, 26, 'Tuesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190626, '2019-06-26', 2019, 6, 26, 2, 26, 'Wednesday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190627, '2019-06-27', 2019, 6, 27, 2, 26, 'Thursday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190628, '2019-06-28', 2019, 6, 28, 2, 26, 'Friday', 'June', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190629, '2019-06-29', 2019, 6, 29, 2, 26, 'Saturday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190630, '2019-06-30', 2019, 6, 30, 2, 26, 'Sunday', 'June', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190701, '2019-07-01', 2019, 7, 1, 3, 27, 'Monday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190702, '2019-07-02', 2019, 7, 2, 3, 27, 'Tuesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190703, '2019-07-03', 2019, 7, 3, 3, 27, 'Wednesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190704, '2019-07-04', 2019, 7, 4, 3, 27, 'Thursday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190705, '2019-07-05', 2019, 7, 5, 3, 27, 'Friday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190706, '2019-07-06', 2019, 7, 6, 3, 27, 'Saturday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190707, '2019-07-07', 2019, 7, 7, 3, 27, 'Sunday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190708, '2019-07-08', 2019, 7, 8, 3, 28, 'Monday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190709, '2019-07-09', 2019, 7, 9, 3, 28, 'Tuesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190710, '2019-07-10', 2019, 7, 10, 3, 28, 'Wednesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190711, '2019-07-11', 2019, 7, 11, 3, 28, 'Thursday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190712, '2019-07-12', 2019, 7, 12, 3, 28, 'Friday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190713, '2019-07-13', 2019, 7, 13, 3, 28, 'Saturday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190714, '2019-07-14', 2019, 7, 14, 3, 28, 'Sunday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190715, '2019-07-15', 2019, 7, 15, 3, 29, 'Monday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190716, '2019-07-16', 2019, 7, 16, 3, 29, 'Tuesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190717, '2019-07-17', 2019, 7, 17, 3, 29, 'Wednesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190718, '2019-07-18', 2019, 7, 18, 3, 29, 'Thursday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190719, '2019-07-19', 2019, 7, 19, 3, 29, 'Friday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190720, '2019-07-20', 2019, 7, 20, 3, 29, 'Saturday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190721, '2019-07-21', 2019, 7, 21, 3, 29, 'Sunday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190722, '2019-07-22', 2019, 7, 22, 3, 30, 'Monday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190723, '2019-07-23', 2019, 7, 23, 3, 30, 'Tuesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190724, '2019-07-24', 2019, 7, 24, 3, 30, 'Wednesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190725, '2019-07-25', 2019, 7, 25, 3, 30, 'Thursday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190726, '2019-07-26', 2019, 7, 26, 3, 30, 'Friday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190727, '2019-07-27', 2019, 7, 27, 3, 30, 'Saturday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190728, '2019-07-28', 2019, 7, 28, 3, 30, 'Sunday', 'July', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190729, '2019-07-29', 2019, 7, 29, 3, 31, 'Monday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190730, '2019-07-30', 2019, 7, 30, 3, 31, 'Tuesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190731, '2019-07-31', 2019, 7, 31, 3, 31, 'Wednesday', 'July', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190801, '2019-08-01', 2019, 8, 1, 3, 31, 'Thursday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190802, '2019-08-02', 2019, 8, 2, 3, 31, 'Friday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190803, '2019-08-03', 2019, 8, 3, 3, 31, 'Saturday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190804, '2019-08-04', 2019, 8, 4, 3, 31, 'Sunday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190805, '2019-08-05', 2019, 8, 5, 3, 32, 'Monday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190806, '2019-08-06', 2019, 8, 6, 3, 32, 'Tuesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190807, '2019-08-07', 2019, 8, 7, 3, 32, 'Wednesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190808, '2019-08-08', 2019, 8, 8, 3, 32, 'Thursday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190809, '2019-08-09', 2019, 8, 9, 3, 32, 'Friday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190810, '2019-08-10', 2019, 8, 10, 3, 32, 'Saturday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190811, '2019-08-11', 2019, 8, 11, 3, 32, 'Sunday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190812, '2019-08-12', 2019, 8, 12, 3, 33, 'Monday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190813, '2019-08-13', 2019, 8, 13, 3, 33, 'Tuesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190814, '2019-08-14', 2019, 8, 14, 3, 33, 'Wednesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190815, '2019-08-15', 2019, 8, 15, 3, 33, 'Thursday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190816, '2019-08-16', 2019, 8, 16, 3, 33, 'Friday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190817, '2019-08-17', 2019, 8, 17, 3, 33, 'Saturday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190818, '2019-08-18', 2019, 8, 18, 3, 33, 'Sunday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190819, '2019-08-19', 2019, 8, 19, 3, 34, 'Monday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190820, '2019-08-20', 2019, 8, 20, 3, 34, 'Tuesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190821, '2019-08-21', 2019, 8, 21, 3, 34, 'Wednesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190822, '2019-08-22', 2019, 8, 22, 3, 34, 'Thursday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190823, '2019-08-23', 2019, 8, 23, 3, 34, 'Friday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190824, '2019-08-24', 2019, 8, 24, 3, 34, 'Saturday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190825, '2019-08-25', 2019, 8, 25, 3, 34, 'Sunday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190826, '2019-08-26', 2019, 8, 26, 3, 35, 'Monday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190827, '2019-08-27', 2019, 8, 27, 3, 35, 'Tuesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190828, '2019-08-28', 2019, 8, 28, 3, 35, 'Wednesday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190829, '2019-08-29', 2019, 8, 29, 3, 35, 'Thursday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190830, '2019-08-30', 2019, 8, 30, 3, 35, 'Friday', 'August', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190831, '2019-08-31', 2019, 8, 31, 3, 35, 'Saturday', 'August', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190901, '2019-09-01', 2019, 9, 1, 3, 35, 'Sunday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190902, '2019-09-02', 2019, 9, 2, 3, 36, 'Monday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190903, '2019-09-03', 2019, 9, 3, 3, 36, 'Tuesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190904, '2019-09-04', 2019, 9, 4, 3, 36, 'Wednesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190905, '2019-09-05', 2019, 9, 5, 3, 36, 'Thursday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190906, '2019-09-06', 2019, 9, 6, 3, 36, 'Friday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190907, '2019-09-07', 2019, 9, 7, 3, 36, 'Saturday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190908, '2019-09-08', 2019, 9, 8, 3, 36, 'Sunday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190909, '2019-09-09', 2019, 9, 9, 3, 37, 'Monday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190910, '2019-09-10', 2019, 9, 10, 3, 37, 'Tuesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190911, '2019-09-11', 2019, 9, 11, 3, 37, 'Wednesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190912, '2019-09-12', 2019, 9, 12, 3, 37, 'Thursday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190913, '2019-09-13', 2019, 9, 13, 3, 37, 'Friday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190914, '2019-09-14', 2019, 9, 14, 3, 37, 'Saturday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190915, '2019-09-15', 2019, 9, 15, 3, 37, 'Sunday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190916, '2019-09-16', 2019, 9, 16, 3, 38, 'Monday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190917, '2019-09-17', 2019, 9, 17, 3, 38, 'Tuesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190918, '2019-09-18', 2019, 9, 18, 3, 38, 'Wednesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190919, '2019-09-19', 2019, 9, 19, 3, 38, 'Thursday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190920, '2019-09-20', 2019, 9, 20, 3, 38, 'Friday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190921, '2019-09-21', 2019, 9, 21, 3, 38, 'Saturday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190922, '2019-09-22', 2019, 9, 22, 3, 38, 'Sunday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190923, '2019-09-23', 2019, 9, 23, 3, 39, 'Monday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190924, '2019-09-24', 2019, 9, 24, 3, 39, 'Tuesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190925, '2019-09-25', 2019, 9, 25, 3, 39, 'Wednesday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190926, '2019-09-26', 2019, 9, 26, 3, 39, 'Thursday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190927, '2019-09-27', 2019, 9, 27, 3, 39, 'Friday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20190928, '2019-09-28', 2019, 9, 28, 3, 39, 'Saturday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190929, '2019-09-29', 2019, 9, 29, 3, 39, 'Sunday', 'September', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20190930, '2019-09-30', 2019, 9, 30, 3, 40, 'Monday', 'September', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191001, '2019-10-01', 2019, 10, 1, 4, 40, 'Tuesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191002, '2019-10-02', 2019, 10, 2, 4, 40, 'Wednesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191003, '2019-10-03', 2019, 10, 3, 4, 40, 'Thursday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191004, '2019-10-04', 2019, 10, 4, 4, 40, 'Friday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191005, '2019-10-05', 2019, 10, 5, 4, 40, 'Saturday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191006, '2019-10-06', 2019, 10, 6, 4, 40, 'Sunday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191007, '2019-10-07', 2019, 10, 7, 4, 41, 'Monday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191008, '2019-10-08', 2019, 10, 8, 4, 41, 'Tuesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191009, '2019-10-09', 2019, 10, 9, 4, 41, 'Wednesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191010, '2019-10-10', 2019, 10, 10, 4, 41, 'Thursday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191011, '2019-10-11', 2019, 10, 11, 4, 41, 'Friday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191012, '2019-10-12', 2019, 10, 12, 4, 41, 'Saturday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191013, '2019-10-13', 2019, 10, 13, 4, 41, 'Sunday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191014, '2019-10-14', 2019, 10, 14, 4, 42, 'Monday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191015, '2019-10-15', 2019, 10, 15, 4, 42, 'Tuesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191016, '2019-10-16', 2019, 10, 16, 4, 42, 'Wednesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191017, '2019-10-17', 2019, 10, 17, 4, 42, 'Thursday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191018, '2019-10-18', 2019, 10, 18, 4, 42, 'Friday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191019, '2019-10-19', 2019, 10, 19, 4, 42, 'Saturday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191020, '2019-10-20', 2019, 10, 20, 4, 42, 'Sunday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191021, '2019-10-21', 2019, 10, 21, 4, 43, 'Monday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191022, '2019-10-22', 2019, 10, 22, 4, 43, 'Tuesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191023, '2019-10-23', 2019, 10, 23, 4, 43, 'Wednesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191024, '2019-10-24', 2019, 10, 24, 4, 43, 'Thursday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191025, '2019-10-25', 2019, 10, 25, 4, 43, 'Friday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191026, '2019-10-26', 2019, 10, 26, 4, 43, 'Saturday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191027, '2019-10-27', 2019, 10, 27, 4, 43, 'Sunday', 'October', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191028, '2019-10-28', 2019, 10, 28, 4, 44, 'Monday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191029, '2019-10-29', 2019, 10, 29, 4, 44, 'Tuesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191030, '2019-10-30', 2019, 10, 30, 4, 44, 'Wednesday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191031, '2019-10-31', 2019, 10, 31, 4, 44, 'Thursday', 'October', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191101, '2019-11-01', 2019, 11, 1, 4, 44, 'Friday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191102, '2019-11-02', 2019, 11, 2, 4, 44, 'Saturday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191103, '2019-11-03', 2019, 11, 3, 4, 44, 'Sunday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191104, '2019-11-04', 2019, 11, 4, 4, 45, 'Monday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191105, '2019-11-05', 2019, 11, 5, 4, 45, 'Tuesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191106, '2019-11-06', 2019, 11, 6, 4, 45, 'Wednesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191107, '2019-11-07', 2019, 11, 7, 4, 45, 'Thursday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191108, '2019-11-08', 2019, 11, 8, 4, 45, 'Friday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191109, '2019-11-09', 2019, 11, 9, 4, 45, 'Saturday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191110, '2019-11-10', 2019, 11, 10, 4, 45, 'Sunday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191111, '2019-11-11', 2019, 11, 11, 4, 46, 'Monday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191112, '2019-11-12', 2019, 11, 12, 4, 46, 'Tuesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191113, '2019-11-13', 2019, 11, 13, 4, 46, 'Wednesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191114, '2019-11-14', 2019, 11, 14, 4, 46, 'Thursday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191115, '2019-11-15', 2019, 11, 15, 4, 46, 'Friday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191116, '2019-11-16', 2019, 11, 16, 4, 46, 'Saturday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191117, '2019-11-17', 2019, 11, 17, 4, 46, 'Sunday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191118, '2019-11-18', 2019, 11, 18, 4, 47, 'Monday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191119, '2019-11-19', 2019, 11, 19, 4, 47, 'Tuesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191120, '2019-11-20', 2019, 11, 20, 4, 47, 'Wednesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191121, '2019-11-21', 2019, 11, 21, 4, 47, 'Thursday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191122, '2019-11-22', 2019, 11, 22, 4, 47, 'Friday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191123, '2019-11-23', 2019, 11, 23, 4, 47, 'Saturday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191124, '2019-11-24', 2019, 11, 24, 4, 47, 'Sunday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191125, '2019-11-25', 2019, 11, 25, 4, 48, 'Monday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191126, '2019-11-26', 2019, 11, 26, 4, 48, 'Tuesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191127, '2019-11-27', 2019, 11, 27, 4, 48, 'Wednesday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191128, '2019-11-28', 2019, 11, 28, 4, 48, 'Thursday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191129, '2019-11-29', 2019, 11, 29, 4, 48, 'Friday', 'November', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191130, '2019-11-30', 2019, 11, 30, 4, 48, 'Saturday', 'November', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191201, '2019-12-01', 2019, 12, 1, 4, 48, 'Sunday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191202, '2019-12-02', 2019, 12, 2, 4, 49, 'Monday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191203, '2019-12-03', 2019, 12, 3, 4, 49, 'Tuesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191204, '2019-12-04', 2019, 12, 4, 4, 49, 'Wednesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191205, '2019-12-05', 2019, 12, 5, 4, 49, 'Thursday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191206, '2019-12-06', 2019, 12, 6, 4, 49, 'Friday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191207, '2019-12-07', 2019, 12, 7, 4, 49, 'Saturday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191208, '2019-12-08', 2019, 12, 8, 4, 49, 'Sunday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191209, '2019-12-09', 2019, 12, 9, 4, 50, 'Monday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191210, '2019-12-10', 2019, 12, 10, 4, 50, 'Tuesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191211, '2019-12-11', 2019, 12, 11, 4, 50, 'Wednesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191212, '2019-12-12', 2019, 12, 12, 4, 50, 'Thursday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191213, '2019-12-13', 2019, 12, 13, 4, 50, 'Friday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191214, '2019-12-14', 2019, 12, 14, 4, 50, 'Saturday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191215, '2019-12-15', 2019, 12, 15, 4, 50, 'Sunday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191216, '2019-12-16', 2019, 12, 16, 4, 51, 'Monday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191217, '2019-12-17', 2019, 12, 17, 4, 51, 'Tuesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191218, '2019-12-18', 2019, 12, 18, 4, 51, 'Wednesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191219, '2019-12-19', 2019, 12, 19, 4, 51, 'Thursday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191220, '2019-12-20', 2019, 12, 20, 4, 51, 'Friday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191221, '2019-12-21', 2019, 12, 21, 4, 51, 'Saturday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191222, '2019-12-22', 2019, 12, 22, 4, 51, 'Sunday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191223, '2019-12-23', 2019, 12, 23, 4, 52, 'Monday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191224, '2019-12-24', 2019, 12, 24, 4, 52, 'Tuesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191225, '2019-12-25', 2019, 12, 25, 4, 52, 'Wednesday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191226, '2019-12-26', 2019, 12, 26, 4, 52, 'Thursday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191227, '2019-12-27', 2019, 12, 27, 4, 52, 'Friday', 'December', 'f', 'f', NULL);
INSERT INTO `time_dimension` VALUES (20191228, '2019-12-28', 2019, 12, 28, 4, 52, 'Saturday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191229, '2019-12-29', 2019, 12, 29, 4, 52, 'Sunday', 'December', 'f', 't', NULL);
INSERT INTO `time_dimension` VALUES (20191230, '2019-12-30', 2019, 12, 30, 4, 1, 'Monday', 'December', 'f', 'f', NULL);
COMMIT;

-- ----------------------------
-- Table structure for tr_absensi
-- ----------------------------
DROP TABLE IF EXISTS `tr_absensi`;
CREATE TABLE `tr_absensi` (
  `id_absensi` int(11) NOT NULL AUTO_INCREMENT,
  `no_mesin` int(11) DEFAULT NULL,
  `nm_pegawai` varchar(255) DEFAULT NULL,
  `tgl_absensi` datetime DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `type_absensi` tinyint(1) DEFAULT '1' COMMENT '1. upload 2. sakit 3.ijin 4. cuti 5. dinas',
  `ket_absensi` text,
  `active` tinyint(1) DEFAULT '1',
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_absensi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3598 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tr_absensi
-- ----------------------------
BEGIN;
INSERT INTO `tr_absensi` VALUES (1, 1, 'Cristananda', '2018-12-03 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2, 1, 'Cristananda', '2018-12-03 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3, 1, 'Cristananda', '2018-12-04 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (4, 1, 'Cristananda', '2018-12-04 22:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (5, 1, 'Cristananda', '2018-12-05 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (6, 1, 'Cristananda', '2018-12-06 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (7, 1, 'Cristananda', '2018-12-06 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (8, 1, 'Cristananda', '2018-12-06 22:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (9, 1, 'Cristananda', '2018-12-07 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (10, 1, 'Cristananda', '2018-12-07 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (11, 1, 'Cristananda', '2018-12-10 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (12, 1, 'Cristananda', '2018-12-10 16:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (13, 1, 'Cristananda', '2018-12-11 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (14, 1, 'Cristananda', '2018-12-11 22:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (15, 1, 'Cristananda', '2018-12-12 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (16, 1, 'Cristananda', '2018-12-12 22:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (17, 1, 'Cristananda', '2018-12-13 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (18, 1, 'Cristananda', '2018-12-13 23:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (19, 1, 'Cristananda', '2018-12-14 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (20, 1, 'Cristananda', '2018-12-14 21:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (21, 1, 'Cristananda', '2018-12-17 08:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (22, 1, 'Cristananda', '2018-12-17 22:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (23, 1, 'Cristananda', '2018-12-18 08:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (24, 1, 'Cristananda', '2018-12-18 23:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (25, 1, 'Cristananda', '2018-12-19 09:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (26, 1, 'Cristananda', '2018-12-19 20:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (27, 1, 'Cristananda', '2018-12-20 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (28, 1, 'Cristananda', '2018-12-20 22:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (29, 1, 'Cristananda', '2018-12-21 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (30, 1, 'Cristananda', '2018-12-26 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (31, 1, 'Cristananda', '2018-12-26 20:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (32, 1, 'Cristananda', '2018-12-27 08:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (33, 1, 'Cristananda', '2018-12-27 18:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (34, 1, 'Cristananda', '2018-12-28 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (35, 2, 'Teguh Aditya Dharma', '2018-12-03 06:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (36, 2, 'Teguh Aditya Dharma', '2018-12-03 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (37, 2, 'Teguh Aditya Dharma', '2018-12-03 18:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (38, 2, 'Teguh Aditya Dharma', '2018-12-04 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (39, 2, 'Teguh Aditya Dharma', '2018-12-04 19:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (40, 2, 'Teguh Aditya Dharma', '2018-12-04 22:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (41, 2, 'Teguh Aditya Dharma', '2018-12-05 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (42, 2, 'Teguh Aditya Dharma', '2018-12-05 17:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (43, 2, 'Teguh Aditya Dharma', '2018-12-06 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (44, 2, 'Teguh Aditya Dharma', '2018-12-06 21:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (45, 2, 'Teguh Aditya Dharma', '2018-12-07 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (46, 2, 'Teguh Aditya Dharma', '2018-12-07 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (47, 2, 'Teguh Aditya Dharma', '2018-12-07 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (48, 2, 'Teguh Aditya Dharma', '2018-12-07 17:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (49, 2, 'Teguh Aditya Dharma', '2018-12-07 17:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (50, 2, 'Teguh Aditya Dharma', '2018-12-07 17:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (51, 2, 'Teguh Aditya Dharma', '2018-12-07 17:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (52, 2, 'Teguh Aditya Dharma', '2018-12-07 17:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (53, 2, 'Teguh Aditya Dharma', '2018-12-10 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (54, 2, 'Teguh Aditya Dharma', '2018-12-10 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (55, 2, 'Teguh Aditya Dharma', '2018-12-10 17:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (56, 2, 'Teguh Aditya Dharma', '2018-12-15 03:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (57, 2, 'Teguh Aditya Dharma', '2018-12-15 03:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (58, 2, 'Teguh Aditya Dharma', '2018-12-17 22:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (59, 2, 'Teguh Aditya Dharma', '2018-12-18 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (60, 2, 'Teguh Aditya Dharma', '2018-12-18 20:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (61, 2, 'Teguh Aditya Dharma', '2018-12-26 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (62, 2, 'Teguh Aditya Dharma', '2018-12-26 08:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (63, 2, 'Teguh Aditya Dharma', '2018-12-27 06:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (64, 2, 'Teguh Aditya Dharma', '2018-12-27 18:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (65, 2, 'Teguh Aditya Dharma', '2018-12-28 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (66, 2, 'Teguh Aditya Dharma', '2018-12-28 20:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (67, 3, 'Agus Fendiyanto', '2018-12-03 06:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (68, 3, 'Agus Fendiyanto', '2018-12-03 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (69, 3, 'Agus Fendiyanto', '2018-12-03 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (70, 3, 'Agus Fendiyanto', '2018-12-04 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (71, 3, 'Agus Fendiyanto', '2018-12-04 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (72, 3, 'Agus Fendiyanto', '2018-12-05 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (73, 3, 'Agus Fendiyanto', '2018-12-05 16:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (74, 3, 'Agus Fendiyanto', '2018-12-06 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (75, 3, 'Agus Fendiyanto', '2018-12-06 22:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (76, 3, 'Agus Fendiyanto', '2018-12-07 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (77, 3, 'Agus Fendiyanto', '2018-12-07 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (78, 3, 'Agus Fendiyanto', '2018-12-07 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (79, 3, 'Agus Fendiyanto', '2018-12-10 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (80, 3, 'Agus Fendiyanto', '2018-12-10 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (81, 3, 'Agus Fendiyanto', '2018-12-10 16:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (82, 3, 'Agus Fendiyanto', '2018-12-11 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (83, 3, 'Agus Fendiyanto', '2018-12-11 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (84, 3, 'Agus Fendiyanto', '2018-12-12 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (85, 3, 'Agus Fendiyanto', '2018-12-12 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (86, 3, 'Agus Fendiyanto', '2018-12-13 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (87, 3, 'Agus Fendiyanto', '2018-12-13 18:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (88, 3, 'Agus Fendiyanto', '2018-12-13 23:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (89, 3, 'Agus Fendiyanto', '2018-12-14 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (90, 3, 'Agus Fendiyanto', '2018-12-14 18:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (91, 3, 'Agus Fendiyanto', '2018-12-26 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (92, 3, 'Agus Fendiyanto', '2018-12-26 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (93, 3, 'Agus Fendiyanto', '2018-12-26 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (94, 3, 'Agus Fendiyanto', '2018-12-27 06:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (95, 3, 'Agus Fendiyanto', '2018-12-27 16:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (96, 3, 'Agus Fendiyanto', '2018-12-28 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (97, 3, 'Agus Fendiyanto', '2018-12-28 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (98, 3, 'Agus Fendiyanto', '2018-12-28 17:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (99, 3, 'Agus Fendiyanto', '2018-12-28 20:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (100, 3, 'Agus Fendiyanto', '2018-12-31 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (101, 3, 'Agus Fendiyanto', '2018-12-31 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (102, 3, 'Agus Fendiyanto', '2018-12-31 15:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (103, 4, 'Aditya Nur Khaerullah', '2018-12-03 06:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (104, 4, 'Aditya Nur Khaerullah', '2018-12-04 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (105, 4, 'Aditya Nur Khaerullah', '2018-12-04 22:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (106, 4, 'Aditya Nur Khaerullah', '2018-12-05 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (107, 4, 'Aditya Nur Khaerullah', '2018-12-05 18:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (108, 4, 'Aditya Nur Khaerullah', '2018-12-06 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (109, 4, 'Aditya Nur Khaerullah', '2018-12-06 23:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (110, 4, 'Aditya Nur Khaerullah', '2018-12-07 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (111, 4, 'Aditya Nur Khaerullah', '2018-12-07 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (112, 4, 'Aditya Nur Khaerullah', '2018-12-07 17:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (113, 4, 'Aditya Nur Khaerullah', '2018-12-10 01:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (114, 4, 'Aditya Nur Khaerullah', '2018-12-10 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (115, 4, 'Aditya Nur Khaerullah', '2018-12-10 17:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (116, 4, 'Aditya Nur Khaerullah', '2018-12-10 20:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (117, 4, 'Aditya Nur Khaerullah', '2018-12-12 23:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (118, 4, 'Aditya Nur Khaerullah', '2018-12-13 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (119, 4, 'Aditya Nur Khaerullah', '2018-12-13 18:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (120, 4, 'Aditya Nur Khaerullah', '2018-12-13 18:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (121, 4, 'Aditya Nur Khaerullah', '2018-12-13 18:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (122, 4, 'Aditya Nur Khaerullah', '2018-12-14 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (123, 4, 'Aditya Nur Khaerullah', '2018-12-26 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (124, 4, 'Aditya Nur Khaerullah', '2018-12-26 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (125, 4, 'Aditya Nur Khaerullah', '2018-12-26 20:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (126, 4, 'Aditya Nur Khaerullah', '2018-12-27 06:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (127, 4, 'Aditya Nur Khaerullah', '2018-12-27 16:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (128, 4, 'Aditya Nur Khaerullah', '2018-12-28 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (129, 4, 'Aditya Nur Khaerullah', '2018-12-28 20:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (130, 4, 'Aditya Nur Khaerullah', '2018-12-31 07:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (131, 5, 'Elga Esa G', '2018-12-03 04:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (132, 5, 'Elga Esa G', '2018-12-03 04:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (133, 5, 'Elga Esa G', '2018-12-03 06:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (134, 5, 'Elga Esa G', '2018-12-03 17:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (135, 5, 'Elga Esa G', '2018-12-04 18:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (136, 5, 'Elga Esa G', '2018-12-05 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (137, 5, 'Elga Esa G', '2018-12-05 20:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (138, 5, 'Elga Esa G', '2018-12-05 20:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (139, 5, 'Elga Esa G', '2018-12-06 21:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (140, 5, 'Elga Esa G', '2018-12-07 04:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (141, 5, 'Elga Esa G', '2018-12-07 18:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (142, 5, 'Elga Esa G', '2018-12-10 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (143, 5, 'Elga Esa G', '2018-12-10 17:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (144, 5, 'Elga Esa G', '2018-12-10 20:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (145, 5, 'Elga Esa G', '2018-12-11 17:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (146, 5, 'Elga Esa G', '2018-12-11 18:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (147, 5, 'Elga Esa G', '2018-12-12 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (148, 5, 'Elga Esa G', '2018-12-12 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (149, 5, 'Elga Esa G', '2018-12-12 19:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (150, 5, 'Elga Esa G', '2018-12-12 19:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (151, 5, 'Elga Esa G', '2018-12-12 19:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (152, 5, 'Elga Esa G', '2018-12-12 19:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (153, 5, 'Elga Esa G', '2018-12-13 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (154, 5, 'Elga Esa G', '2018-12-13 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (155, 5, 'Elga Esa G', '2018-12-13 18:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (156, 5, 'Elga Esa G', '2018-12-14 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (157, 5, 'Elga Esa G', '2018-12-14 16:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (158, 5, 'Elga Esa G', '2018-12-14 16:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (159, 5, 'Elga Esa G', '2018-12-14 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (160, 5, 'Elga Esa G', '2018-12-17 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (161, 5, 'Elga Esa G', '2018-12-17 20:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (162, 5, 'Elga Esa G', '2018-12-18 07:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (163, 5, 'Elga Esa G', '2018-12-18 17:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (164, 5, 'Elga Esa G', '2018-12-18 17:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (165, 5, 'Elga Esa G', '2018-12-19 18:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (166, 5, 'Elga Esa G', '2018-12-19 18:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (167, 5, 'Elga Esa G', '2018-12-20 18:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (168, 5, 'Elga Esa G', '2018-12-20 18:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (169, 5, 'Elga Esa G', '2018-12-26 05:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (170, 5, 'Elga Esa G', '2018-12-26 05:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (171, 5, 'Elga Esa G', '2018-12-26 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (172, 5, 'Elga Esa G', '2018-12-27 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (173, 5, 'Elga Esa G', '2018-12-27 18:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (174, 5, 'Elga Esa G', '2018-12-27 18:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (175, 5, 'Elga Esa G', '2018-12-27 18:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (176, 5, 'Elga Esa G', '2018-12-28 06:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (177, 5, 'Elga Esa G', '2018-12-28 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (178, 5, 'Elga Esa G', '2018-12-28 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (179, 5, 'Elga Esa G', '2018-12-28 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (180, 5, 'Elga Esa G', '2018-12-28 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (181, 6, 'Warjiono', '2018-12-03 06:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (182, 6, 'Warjiono', '2018-12-03 17:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (183, 6, 'Warjiono', '2018-12-04 05:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (184, 6, 'Warjiono', '2018-12-04 19:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (185, 6, 'Warjiono', '2018-12-05 06:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (186, 6, 'Warjiono', '2018-12-05 19:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (187, 6, 'Warjiono', '2018-12-06 06:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (188, 6, 'Warjiono', '2018-12-06 18:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (189, 6, 'Warjiono', '2018-12-06 21:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (190, 6, 'Warjiono', '2018-12-07 06:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (191, 6, 'Warjiono', '2018-12-07 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (192, 6, 'Warjiono', '2018-12-10 06:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (193, 6, 'Warjiono', '2018-12-10 18:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (194, 6, 'Warjiono', '2018-12-11 06:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (195, 6, 'Warjiono', '2018-12-11 18:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (196, 6, 'Warjiono', '2018-12-12 06:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (197, 6, 'Warjiono', '2018-12-12 18:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (198, 6, 'Warjiono', '2018-12-12 21:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (199, 6, 'Warjiono', '2018-12-13 06:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (200, 6, 'Warjiono', '2018-12-13 06:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (201, 6, 'Warjiono', '2018-12-13 06:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (202, 6, 'Warjiono', '2018-12-13 18:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (203, 6, 'Warjiono', '2018-12-14 06:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (204, 6, 'Warjiono', '2018-12-14 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (205, 6, 'Warjiono', '2018-12-17 06:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (206, 6, 'Warjiono', '2018-12-17 17:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (207, 6, 'Warjiono', '2018-12-18 06:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (208, 6, 'Warjiono', '2018-12-18 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (209, 6, 'Warjiono', '2018-12-19 06:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (210, 6, 'Warjiono', '2018-12-19 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (211, 6, 'Warjiono', '2018-12-20 06:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (212, 6, 'Warjiono', '2018-12-20 19:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (213, 6, 'Warjiono', '2018-12-20 19:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (214, 6, 'Warjiono', '2018-12-21 06:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (215, 6, 'Warjiono', '2018-12-21 17:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (216, 7, 'Indah Purwayanti', '2018-12-03 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (217, 7, 'Indah Purwayanti', '2018-12-03 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (218, 7, 'Indah Purwayanti', '2018-12-04 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (219, 7, 'Indah Purwayanti', '2018-12-04 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (220, 7, 'Indah Purwayanti', '2018-12-04 17:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (221, 7, 'Indah Purwayanti', '2018-12-05 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (222, 7, 'Indah Purwayanti', '2018-12-05 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (223, 7, 'Indah Purwayanti', '2018-12-05 19:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (224, 7, 'Indah Purwayanti', '2018-12-05 19:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (225, 7, 'Indah Purwayanti', '2018-12-06 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (226, 7, 'Indah Purwayanti', '2018-12-07 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (227, 7, 'Indah Purwayanti', '2018-12-07 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (228, 7, 'Indah Purwayanti', '2018-12-07 17:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (229, 7, 'Indah Purwayanti', '2018-12-07 17:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (230, 7, 'Indah Purwayanti', '2018-12-10 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (231, 7, 'Indah Purwayanti', '2018-12-10 18:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (232, 7, 'Indah Purwayanti', '2018-12-10 18:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (233, 7, 'Indah Purwayanti', '2018-12-11 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (234, 7, 'Indah Purwayanti', '2018-12-11 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (235, 7, 'Indah Purwayanti', '2018-12-11 18:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (236, 7, 'Indah Purwayanti', '2018-12-12 07:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (237, 7, 'Indah Purwayanti', '2018-12-12 07:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (238, 7, 'Indah Purwayanti', '2018-12-12 18:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (239, 7, 'Indah Purwayanti', '2018-12-13 08:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (240, 7, 'Indah Purwayanti', '2018-12-14 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (241, 7, 'Indah Purwayanti', '2018-12-14 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (242, 7, 'Indah Purwayanti', '2018-12-17 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (243, 7, 'Indah Purwayanti', '2018-12-17 17:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (244, 7, 'Indah Purwayanti', '2018-12-18 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (245, 7, 'Indah Purwayanti', '2018-12-18 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (246, 7, 'Indah Purwayanti', '2018-12-18 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (247, 7, 'Indah Purwayanti', '2018-12-19 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (248, 7, 'Indah Purwayanti', '2018-12-19 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (249, 7, 'Indah Purwayanti', '2018-12-20 18:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (250, 7, 'Indah Purwayanti', '2018-12-20 18:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (251, 7, 'Indah Purwayanti', '2018-12-21 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (252, 7, 'Indah Purwayanti', '2018-12-21 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (253, 7, 'Indah Purwayanti', '2018-12-21 18:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (254, 7, 'Indah Purwayanti', '2018-12-21 18:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (255, 7, 'Indah Purwayanti', '2018-12-22 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (256, 7, 'Indah Purwayanti', '2018-12-22 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (257, 7, 'Indah Purwayanti', '2018-12-26 08:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (258, 7, 'Indah Purwayanti', '2018-12-26 17:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (259, 7, 'Indah Purwayanti', '2018-12-27 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (260, 7, 'Indah Purwayanti', '2018-12-27 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (261, 7, 'Indah Purwayanti', '2018-12-27 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (262, 7, 'Indah Purwayanti', '2018-12-27 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (263, 7, 'Indah Purwayanti', '2018-12-28 08:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (264, 7, 'Indah Purwayanti', '2018-12-28 18:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (265, 8, 'Ruslan Rasyid', '2018-12-03 08:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (266, 8, 'Ruslan Rasyid', '2018-12-03 16:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (267, 8, 'Ruslan Rasyid', '2018-12-04 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (268, 8, 'Ruslan Rasyid', '2018-12-05 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (269, 8, 'Ruslan Rasyid', '2018-12-05 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (270, 8, 'Ruslan Rasyid', '2018-12-06 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (271, 8, 'Ruslan Rasyid', '2018-12-06 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (272, 8, 'Ruslan Rasyid', '2018-12-07 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (273, 8, 'Ruslan Rasyid', '2018-12-07 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (274, 8, 'Ruslan Rasyid', '2018-12-10 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (275, 8, 'Ruslan Rasyid', '2018-12-10 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (276, 8, 'Ruslan Rasyid', '2018-12-11 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (277, 8, 'Ruslan Rasyid', '2018-12-12 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (278, 8, 'Ruslan Rasyid', '2018-12-12 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (279, 8, 'Ruslan Rasyid', '2018-12-13 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (280, 8, 'Ruslan Rasyid', '2018-12-13 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (281, 8, 'Ruslan Rasyid', '2018-12-14 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (282, 8, 'Ruslan Rasyid', '2018-12-14 16:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (283, 8, 'Ruslan Rasyid', '2018-12-14 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (284, 8, 'Ruslan Rasyid', '2018-12-17 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (285, 8, 'Ruslan Rasyid', '2018-12-17 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (286, 8, 'Ruslan Rasyid', '2018-12-17 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (287, 8, 'Ruslan Rasyid', '2018-12-18 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (288, 8, 'Ruslan Rasyid', '2018-12-18 17:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (289, 8, 'Ruslan Rasyid', '2018-12-19 09:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (290, 8, 'Ruslan Rasyid', '2018-12-20 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (291, 8, 'Ruslan Rasyid', '2018-12-20 16:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (292, 8, 'Ruslan Rasyid', '2018-12-20 17:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (293, 8, 'Ruslan Rasyid', '2018-12-21 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (294, 8, 'Ruslan Rasyid', '2018-12-26 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (295, 8, 'Ruslan Rasyid', '2018-12-26 17:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (296, 8, 'Ruslan Rasyid', '2018-12-27 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (297, 8, 'Ruslan Rasyid', '2018-12-27 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (298, 8, 'Ruslan Rasyid', '2018-12-28 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (299, 8, 'Ruslan Rasyid', '2018-12-28 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (300, 8, 'Ruslan Rasyid', '2018-12-31 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (301, 9, 'I Gede Diatmika', '2018-12-03 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (302, 9, 'I Gede Diatmika', '2018-12-03 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (303, 9, 'I Gede Diatmika', '2018-12-03 17:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (304, 9, 'I Gede Diatmika', '2018-12-03 17:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (305, 9, 'I Gede Diatmika', '2018-12-04 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (306, 9, 'I Gede Diatmika', '2018-12-04 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (307, 9, 'I Gede Diatmika', '2018-12-04 16:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (308, 9, 'I Gede Diatmika', '2018-12-04 16:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (309, 9, 'I Gede Diatmika', '2018-12-05 19:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (310, 9, 'I Gede Diatmika', '2018-12-05 19:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (311, 9, 'I Gede Diatmika', '2018-12-06 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (312, 9, 'I Gede Diatmika', '2018-12-06 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (313, 9, 'I Gede Diatmika', '2018-12-06 18:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (314, 9, 'I Gede Diatmika', '2018-12-06 18:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (315, 9, 'I Gede Diatmika', '2018-12-07 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (316, 9, 'I Gede Diatmika', '2018-12-07 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (317, 9, 'I Gede Diatmika', '2018-12-07 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (318, 9, 'I Gede Diatmika', '2018-12-07 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (319, 9, 'I Gede Diatmika', '2018-12-10 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (320, 9, 'I Gede Diatmika', '2018-12-10 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (321, 9, 'I Gede Diatmika', '2018-12-10 17:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (322, 9, 'I Gede Diatmika', '2018-12-10 17:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (323, 9, 'I Gede Diatmika', '2018-12-10 17:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (324, 9, 'I Gede Diatmika', '2018-12-11 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (325, 9, 'I Gede Diatmika', '2018-12-11 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (326, 9, 'I Gede Diatmika', '2018-12-11 18:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (327, 9, 'I Gede Diatmika', '2018-12-11 18:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (328, 9, 'I Gede Diatmika', '2018-12-12 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (329, 9, 'I Gede Diatmika', '2018-12-12 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (330, 9, 'I Gede Diatmika', '2018-12-12 18:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (331, 9, 'I Gede Diatmika', '2018-12-12 18:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (332, 9, 'I Gede Diatmika', '2018-12-13 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (333, 9, 'I Gede Diatmika', '2018-12-13 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (334, 9, 'I Gede Diatmika', '2018-12-13 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (335, 9, 'I Gede Diatmika', '2018-12-13 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (336, 9, 'I Gede Diatmika', '2018-12-13 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (337, 9, 'I Gede Diatmika', '2018-12-14 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (338, 9, 'I Gede Diatmika', '2018-12-14 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (339, 9, 'I Gede Diatmika', '2018-12-14 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (340, 9, 'I Gede Diatmika', '2018-12-14 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (341, 9, 'I Gede Diatmika', '2018-12-17 07:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (342, 9, 'I Gede Diatmika', '2018-12-17 07:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (343, 9, 'I Gede Diatmika', '2018-12-17 17:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (344, 9, 'I Gede Diatmika', '2018-12-17 17:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (345, 9, 'I Gede Diatmika', '2018-12-18 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (346, 9, 'I Gede Diatmika', '2018-12-18 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (347, 9, 'I Gede Diatmika', '2018-12-18 17:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (348, 9, 'I Gede Diatmika', '2018-12-18 17:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (349, 9, 'I Gede Diatmika', '2018-12-19 09:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (350, 9, 'I Gede Diatmika', '2018-12-19 09:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (351, 9, 'I Gede Diatmika', '2018-12-19 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (352, 9, 'I Gede Diatmika', '2018-12-19 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (353, 9, 'I Gede Diatmika', '2018-12-20 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (354, 9, 'I Gede Diatmika', '2018-12-20 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (355, 9, 'I Gede Diatmika', '2018-12-20 17:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (356, 9, 'I Gede Diatmika', '2018-12-20 17:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (357, 9, 'I Gede Diatmika', '2018-12-21 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (358, 9, 'I Gede Diatmika', '2018-12-21 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (359, 9, 'I Gede Diatmika', '2018-12-21 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (360, 9, 'I Gede Diatmika', '2018-12-21 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (361, 9, 'I Gede Diatmika', '2018-12-22 15:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (362, 9, 'I Gede Diatmika', '2018-12-27 07:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (363, 9, 'I Gede Diatmika', '2018-12-27 07:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (364, 9, 'I Gede Diatmika', '2018-12-27 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (365, 9, 'I Gede Diatmika', '2018-12-27 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (366, 9, 'I Gede Diatmika', '2018-12-28 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (367, 9, 'I Gede Diatmika', '2018-12-28 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (368, 9, 'I Gede Diatmika', '2018-12-28 18:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (369, 9, 'I Gede Diatmika', '2018-12-28 18:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (370, 9, 'I Gede Diatmika', '2018-12-31 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (371, 9, 'I Gede Diatmika', '2018-12-31 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (372, 9, 'I Gede Diatmika', '2018-12-31 18:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (373, 9, 'I Gede Diatmika', '2018-12-31 18:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (374, 10, 'Sukri', '2018-12-03 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (375, 10, 'Sukri', '2018-12-03 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (376, 10, 'Sukri', '2018-12-03 18:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (377, 10, 'Sukri', '2018-12-03 18:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (378, 10, 'Sukri', '2018-12-04 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (379, 10, 'Sukri', '2018-12-04 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (380, 10, 'Sukri', '2018-12-04 19:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (381, 10, 'Sukri', '2018-12-04 19:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (382, 10, 'Sukri', '2018-12-04 19:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (383, 10, 'Sukri', '2018-12-05 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (384, 10, 'Sukri', '2018-12-05 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (385, 10, 'Sukri', '2018-12-06 08:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (386, 10, 'Sukri', '2018-12-06 08:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (387, 10, 'Sukri', '2018-12-06 21:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (388, 10, 'Sukri', '2018-12-06 21:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (389, 10, 'Sukri', '2018-12-07 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (390, 10, 'Sukri', '2018-12-07 17:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (391, 10, 'Sukri', '2018-12-07 19:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (392, 10, 'Sukri', '2018-12-07 19:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (393, 10, 'Sukri', '2018-12-10 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (394, 10, 'Sukri', '2018-12-10 19:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (395, 10, 'Sukri', '2018-12-11 18:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (396, 10, 'Sukri', '2018-12-11 18:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (397, 10, 'Sukri', '2018-12-12 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (398, 10, 'Sukri', '2018-12-12 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (399, 10, 'Sukri', '2018-12-12 18:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (400, 10, 'Sukri', '2018-12-12 18:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (401, 10, 'Sukri', '2018-12-13 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (402, 10, 'Sukri', '2018-12-13 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (403, 10, 'Sukri', '2018-12-13 18:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (404, 10, 'Sukri', '2018-12-14 07:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (405, 10, 'Sukri', '2018-12-14 07:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (406, 10, 'Sukri', '2018-12-17 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (407, 10, 'Sukri', '2018-12-17 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (408, 10, 'Sukri', '2018-12-17 18:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (409, 10, 'Sukri', '2018-12-17 18:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (410, 10, 'Sukri', '2018-12-17 18:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (411, 10, 'Sukri', '2018-12-18 07:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (412, 10, 'Sukri', '2018-12-18 07:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (413, 10, 'Sukri', '2018-12-21 21:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (414, 10, 'Sukri', '2018-12-21 21:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (415, 10, 'Sukri', '2018-12-22 08:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (416, 10, 'Sukri', '2018-12-22 08:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (417, 10, 'Sukri', '2018-12-23 08:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (418, 10, 'Sukri', '2018-12-26 07:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (419, 10, 'Sukri', '2018-12-26 07:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (420, 10, 'Sukri', '2018-12-26 19:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (421, 10, 'Sukri', '2018-12-26 19:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (422, 10, 'Sukri', '2018-12-26 19:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (423, 10, 'Sukri', '2018-12-26 19:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (424, 10, 'Sukri', '2018-12-27 07:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (425, 10, 'Sukri', '2018-12-27 07:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (426, 10, 'Sukri', '2018-12-27 07:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (427, 10, 'Sukri', '2018-12-27 07:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (428, 10, 'Sukri', '2018-12-27 19:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (429, 10, 'Sukri', '2018-12-27 19:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (430, 10, 'Sukri', '2018-12-28 07:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (431, 10, 'Sukri', '2018-12-28 07:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (432, 10, 'Sukri', '2018-12-28 18:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (433, 10, 'Sukri', '2018-12-28 18:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (434, 10, 'Sukri', '2018-12-31 18:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (435, 10, 'Sukri', '2018-12-31 18:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (436, 11, 'Trio Riadi', '2018-12-03 07:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (437, 11, 'Trio Riadi', '2018-12-03 07:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (438, 11, 'Trio Riadi', '2018-12-03 18:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (439, 11, 'Trio Riadi', '2018-12-03 18:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (440, 11, 'Trio Riadi', '2018-12-03 18:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (441, 11, 'Trio Riadi', '2018-12-04 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (442, 11, 'Trio Riadi', '2018-12-04 19:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (443, 11, 'Trio Riadi', '2018-12-05 08:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (444, 11, 'Trio Riadi', '2018-12-05 20:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (445, 11, 'Trio Riadi', '2018-12-06 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (446, 11, 'Trio Riadi', '2018-12-10 17:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (447, 11, 'Trio Riadi', '2018-12-11 08:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (448, 11, 'Trio Riadi', '2018-12-11 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (449, 11, 'Trio Riadi', '2018-12-12 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (450, 11, 'Trio Riadi', '2018-12-12 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (451, 11, 'Trio Riadi', '2018-12-13 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (452, 11, 'Trio Riadi', '2018-12-13 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (453, 11, 'Trio Riadi', '2018-12-14 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (454, 11, 'Trio Riadi', '2018-12-14 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (455, 11, 'Trio Riadi', '2018-12-14 17:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (456, 11, 'Trio Riadi', '2018-12-17 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (457, 11, 'Trio Riadi', '2018-12-17 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (458, 11, 'Trio Riadi', '2018-12-17 18:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (459, 11, 'Trio Riadi', '2018-12-18 06:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (460, 11, 'Trio Riadi', '2018-12-18 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (461, 11, 'Trio Riadi', '2018-12-19 08:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (462, 11, 'Trio Riadi', '2018-12-19 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (463, 11, 'Trio Riadi', '2018-12-20 07:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (464, 11, 'Trio Riadi', '2018-12-20 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (465, 11, 'Trio Riadi', '2018-12-21 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (466, 11, 'Trio Riadi', '2018-12-21 16:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (467, 11, 'Trio Riadi', '2018-12-21 19:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (468, 11, 'Trio Riadi', '2018-12-26 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (469, 11, 'Trio Riadi', '2018-12-26 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (470, 11, 'Trio Riadi', '2018-12-26 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (471, 11, 'Trio Riadi', '2018-12-27 07:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (472, 11, 'Trio Riadi', '2018-12-27 18:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (473, 11, 'Trio Riadi', '2018-12-28 09:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (474, 11, 'Trio Riadi', '2018-12-28 16:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (475, 11, 'Trio Riadi', '2018-12-28 18:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (476, 12, 'Dheara D P', '2018-12-03 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (477, 12, 'Dheara D P', '2018-12-03 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (478, 12, 'Dheara D P', '2018-12-04 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (479, 12, 'Dheara D P', '2018-12-04 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (480, 12, 'Dheara D P', '2018-12-04 16:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (481, 12, 'Dheara D P', '2018-12-05 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (482, 12, 'Dheara D P', '2018-12-05 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (483, 12, 'Dheara D P', '2018-12-06 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (484, 12, 'Dheara D P', '2018-12-06 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (485, 12, 'Dheara D P', '2018-12-07 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (486, 12, 'Dheara D P', '2018-12-07 08:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (487, 12, 'Dheara D P', '2018-12-07 16:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (488, 12, 'Dheara D P', '2018-12-10 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (489, 12, 'Dheara D P', '2018-12-10 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (490, 12, 'Dheara D P', '2018-12-14 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (491, 12, 'Dheara D P', '2018-12-14 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (492, 12, 'Dheara D P', '2018-12-17 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (493, 12, 'Dheara D P', '2018-12-17 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (494, 12, 'Dheara D P', '2018-12-18 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (495, 12, 'Dheara D P', '2018-12-18 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (496, 12, 'Dheara D P', '2018-12-18 12:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (497, 12, 'Dheara D P', '2018-12-26 09:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (498, 12, 'Dheara D P', '2018-12-26 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (499, 12, 'Dheara D P', '2018-12-27 08:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (500, 12, 'Dheara D P', '2018-12-27 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (501, 12, 'Dheara D P', '2018-12-28 08:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (502, 12, 'Dheara D P', '2018-12-28 16:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (503, 12, 'Dheara D P', '2018-12-31 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (504, 12, 'Dheara D P', '2018-12-31 16:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (505, 12, 'Dheara D P', '2018-12-31 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (506, 14, 'Eri Untari Dewi', '2018-12-03 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (507, 14, 'Eri Untari Dewi', '2018-12-04 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (508, 14, 'Eri Untari Dewi', '2018-12-04 17:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (509, 14, 'Eri Untari Dewi', '2018-12-05 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (510, 14, 'Eri Untari Dewi', '2018-12-05 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (511, 14, 'Eri Untari Dewi', '2018-12-06 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (512, 14, 'Eri Untari Dewi', '2018-12-06 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (513, 14, 'Eri Untari Dewi', '2018-12-07 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (514, 14, 'Eri Untari Dewi', '2018-12-07 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (515, 14, 'Eri Untari Dewi', '2018-12-07 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (516, 14, 'Eri Untari Dewi', '2018-12-10 08:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (517, 14, 'Eri Untari Dewi', '2018-12-10 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (518, 14, 'Eri Untari Dewi', '2018-12-11 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (519, 14, 'Eri Untari Dewi', '2018-12-11 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (520, 14, 'Eri Untari Dewi', '2018-12-12 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (521, 14, 'Eri Untari Dewi', '2018-12-12 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (522, 14, 'Eri Untari Dewi', '2018-12-13 06:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (523, 14, 'Eri Untari Dewi', '2018-12-13 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (524, 14, 'Eri Untari Dewi', '2018-12-14 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (525, 14, 'Eri Untari Dewi', '2018-12-14 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (526, 14, 'Eri Untari Dewi', '2018-12-17 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (527, 14, 'Eri Untari Dewi', '2018-12-17 17:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (528, 14, 'Eri Untari Dewi', '2018-12-18 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (529, 14, 'Eri Untari Dewi', '2018-12-18 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (530, 14, 'Eri Untari Dewi', '2018-12-19 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (531, 14, 'Eri Untari Dewi', '2018-12-19 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (532, 14, 'Eri Untari Dewi', '2018-12-19 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (533, 14, 'Eri Untari Dewi', '2018-12-20 08:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (534, 14, 'Eri Untari Dewi', '2018-12-20 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (535, 14, 'Eri Untari Dewi', '2018-12-21 18:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (536, 14, 'Eri Untari Dewi', '2018-12-26 07:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (537, 14, 'Eri Untari Dewi', '2018-12-27 11:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (538, 14, 'Eri Untari Dewi', '2018-12-27 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (539, 14, 'Eri Untari Dewi', '2018-12-28 05:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (540, 14, 'Eri Untari Dewi', '2018-12-30 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (541, 14, 'Eri Untari Dewi', '2018-12-31 14:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (542, 14, 'Eri Untari Dewi', '2018-12-31 17:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (543, 15, 'Ardhi Ardi Utomo', '2018-12-05 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (544, 15, 'Ardhi Ardi Utomo', '2018-12-05 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (545, 15, 'Ardhi Ardi Utomo', '2018-12-05 17:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (546, 15, 'Ardhi Ardi Utomo', '2018-12-06 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (547, 15, 'Ardhi Ardi Utomo', '2018-12-06 19:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (548, 15, 'Ardhi Ardi Utomo', '2018-12-07 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (549, 15, 'Ardhi Ardi Utomo', '2018-12-07 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (550, 15, 'Ardhi Ardi Utomo', '2018-12-07 18:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (551, 15, 'Ardhi Ardi Utomo', '2018-12-10 06:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (552, 15, 'Ardhi Ardi Utomo', '2018-12-10 06:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (553, 15, 'Ardhi Ardi Utomo', '2018-12-10 18:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (554, 15, 'Ardhi Ardi Utomo', '2018-12-11 08:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (555, 15, 'Ardhi Ardi Utomo', '2018-12-11 19:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (556, 15, 'Ardhi Ardi Utomo', '2018-12-11 19:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (557, 15, 'Ardhi Ardi Utomo', '2018-12-12 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (558, 15, 'Ardhi Ardi Utomo', '2018-12-12 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (559, 15, 'Ardhi Ardi Utomo', '2018-12-12 20:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (560, 15, 'Ardhi Ardi Utomo', '2018-12-13 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (561, 15, 'Ardhi Ardi Utomo', '2018-12-13 18:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (562, 15, 'Ardhi Ardi Utomo', '2018-12-14 21:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (563, 15, 'Ardhi Ardi Utomo', '2018-12-17 07:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (564, 15, 'Ardhi Ardi Utomo', '2018-12-17 07:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (565, 15, 'Ardhi Ardi Utomo', '2018-12-17 21:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (566, 15, 'Ardhi Ardi Utomo', '2018-12-18 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (567, 15, 'Ardhi Ardi Utomo', '2018-12-18 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (568, 15, 'Ardhi Ardi Utomo', '2018-12-18 18:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (569, 15, 'Ardhi Ardi Utomo', '2018-12-26 07:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (570, 15, 'Ardhi Ardi Utomo', '2018-12-27 08:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (571, 15, 'Ardhi Ardi Utomo', '2018-12-27 08:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (572, 15, 'Ardhi Ardi Utomo', '2018-12-27 18:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (573, 15, 'Ardhi Ardi Utomo', '2018-12-27 18:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (574, 15, 'Ardhi Ardi Utomo', '2018-12-27 21:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (575, 15, 'Ardhi Ardi Utomo', '2018-12-31 20:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (576, 16, 'Umbar Indriyawan', '2018-12-03 08:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (577, 16, 'Umbar Indriyawan', '2018-12-03 20:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (578, 16, 'Umbar Indriyawan', '2018-12-04 18:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (579, 16, 'Umbar Indriyawan', '2018-12-05 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (580, 16, 'Umbar Indriyawan', '2018-12-05 21:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (581, 16, 'Umbar Indriyawan', '2018-12-06 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (582, 16, 'Umbar Indriyawan', '2018-12-06 19:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (583, 16, 'Umbar Indriyawan', '2018-12-07 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (584, 16, 'Umbar Indriyawan', '2018-12-07 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (585, 16, 'Umbar Indriyawan', '2018-12-10 05:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (586, 16, 'Umbar Indriyawan', '2018-12-10 21:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (587, 16, 'Umbar Indriyawan', '2018-12-11 05:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (588, 16, 'Umbar Indriyawan', '2018-12-11 21:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (589, 16, 'Umbar Indriyawan', '2018-12-12 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (590, 16, 'Umbar Indriyawan', '2018-12-12 19:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (591, 16, 'Umbar Indriyawan', '2018-12-13 05:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (592, 16, 'Umbar Indriyawan', '2018-12-13 21:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (593, 16, 'Umbar Indriyawan', '2018-12-14 07:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (594, 16, 'Umbar Indriyawan', '2018-12-14 17:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (595, 16, 'Umbar Indriyawan', '2018-12-17 07:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (596, 16, 'Umbar Indriyawan', '2018-12-17 21:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (597, 16, 'Umbar Indriyawan', '2018-12-18 05:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (598, 16, 'Umbar Indriyawan', '2018-12-18 21:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (599, 16, 'Umbar Indriyawan', '2018-12-19 06:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (600, 16, 'Umbar Indriyawan', '2018-12-19 22:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (601, 16, 'Umbar Indriyawan', '2018-12-20 05:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (602, 16, 'Umbar Indriyawan', '2018-12-20 21:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (603, 16, 'Umbar Indriyawan', '2018-12-21 05:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (604, 16, 'Umbar Indriyawan', '2018-12-21 17:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (605, 16, 'Umbar Indriyawan', '2018-12-26 04:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (606, 16, 'Umbar Indriyawan', '2018-12-26 17:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (607, 16, 'Umbar Indriyawan', '2018-12-27 06:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (608, 16, 'Umbar Indriyawan', '2018-12-27 21:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (609, 16, 'Umbar Indriyawan', '2018-12-28 06:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (610, 16, 'Umbar Indriyawan', '2018-12-28 17:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (611, 16, 'Umbar Indriyawan', '2018-12-31 04:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (612, 16, 'Umbar Indriyawan', '2018-12-31 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (613, 17, 'Santa Lina', '2018-12-03 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (614, 17, 'Santa Lina', '2018-12-03 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (615, 17, 'Santa Lina', '2018-12-03 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (616, 17, 'Santa Lina', '2018-12-03 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (617, 17, 'Santa Lina', '2018-12-04 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (618, 17, 'Santa Lina', '2018-12-04 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (619, 17, 'Santa Lina', '2018-12-04 17:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (620, 17, 'Santa Lina', '2018-12-04 17:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (621, 17, 'Santa Lina', '2018-12-05 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (622, 17, 'Santa Lina', '2018-12-05 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (623, 17, 'Santa Lina', '2018-12-05 17:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (624, 17, 'Santa Lina', '2018-12-05 17:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (625, 17, 'Santa Lina', '2018-12-06 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (626, 17, 'Santa Lina', '2018-12-06 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (627, 17, 'Santa Lina', '2018-12-06 17:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (628, 17, 'Santa Lina', '2018-12-06 17:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (629, 17, 'Santa Lina', '2018-12-07 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (630, 17, 'Santa Lina', '2018-12-07 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (631, 17, 'Santa Lina', '2018-12-07 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (632, 17, 'Santa Lina', '2018-12-07 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (633, 17, 'Santa Lina', '2018-12-10 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (634, 17, 'Santa Lina', '2018-12-10 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (635, 17, 'Santa Lina', '2018-12-10 17:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (636, 17, 'Santa Lina', '2018-12-10 17:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (637, 17, 'Santa Lina', '2018-12-11 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (638, 17, 'Santa Lina', '2018-12-11 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (639, 17, 'Santa Lina', '2018-12-11 17:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (640, 17, 'Santa Lina', '2018-12-11 17:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (641, 17, 'Santa Lina', '2018-12-12 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (642, 17, 'Santa Lina', '2018-12-12 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (643, 17, 'Santa Lina', '2018-12-12 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (644, 17, 'Santa Lina', '2018-12-12 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (645, 17, 'Santa Lina', '2018-12-13 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (646, 17, 'Santa Lina', '2018-12-13 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (647, 17, 'Santa Lina', '2018-12-13 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (648, 17, 'Santa Lina', '2018-12-13 16:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (649, 17, 'Santa Lina', '2018-12-14 09:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (650, 17, 'Santa Lina', '2018-12-14 09:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (651, 17, 'Santa Lina', '2018-12-14 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (652, 17, 'Santa Lina', '2018-12-17 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (653, 17, 'Santa Lina', '2018-12-17 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (654, 17, 'Santa Lina', '2018-12-17 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (655, 17, 'Santa Lina', '2018-12-17 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (656, 17, 'Santa Lina', '2018-12-18 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (657, 17, 'Santa Lina', '2018-12-18 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (658, 17, 'Santa Lina', '2018-12-18 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (659, 17, 'Santa Lina', '2018-12-18 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (660, 17, 'Santa Lina', '2018-12-20 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (661, 17, 'Santa Lina', '2018-12-20 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (662, 17, 'Santa Lina', '2018-12-20 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (663, 17, 'Santa Lina', '2018-12-20 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (664, 17, 'Santa Lina', '2018-12-21 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (665, 17, 'Santa Lina', '2018-12-21 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (666, 18, 'Eko Ade S', '2018-12-03 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (667, 18, 'Eko Ade S', '2018-12-03 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (668, 18, 'Eko Ade S', '2018-12-03 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (669, 18, 'Eko Ade S', '2018-12-04 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (670, 18, 'Eko Ade S', '2018-12-04 16:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (671, 18, 'Eko Ade S', '2018-12-04 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (672, 18, 'Eko Ade S', '2018-12-05 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (673, 18, 'Eko Ade S', '2018-12-05 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (674, 18, 'Eko Ade S', '2018-12-05 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (675, 18, 'Eko Ade S', '2018-12-05 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (676, 18, 'Eko Ade S', '2018-12-06 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (677, 18, 'Eko Ade S', '2018-12-06 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (678, 18, 'Eko Ade S', '2018-12-06 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (679, 18, 'Eko Ade S', '2018-12-06 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (680, 18, 'Eko Ade S', '2018-12-06 17:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (681, 18, 'Eko Ade S', '2018-12-07 07:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (682, 18, 'Eko Ade S', '2018-12-07 07:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (683, 18, 'Eko Ade S', '2018-12-07 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (684, 18, 'Eko Ade S', '2018-12-10 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (685, 18, 'Eko Ade S', '2018-12-10 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (686, 18, 'Eko Ade S', '2018-12-10 17:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (687, 18, 'Eko Ade S', '2018-12-11 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (688, 18, 'Eko Ade S', '2018-12-11 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (689, 18, 'Eko Ade S', '2018-12-11 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (690, 18, 'Eko Ade S', '2018-12-11 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (691, 18, 'Eko Ade S', '2018-12-11 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (692, 18, 'Eko Ade S', '2018-12-12 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (693, 18, 'Eko Ade S', '2018-12-12 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (694, 18, 'Eko Ade S', '2018-12-12 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (695, 18, 'Eko Ade S', '2018-12-12 16:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (696, 18, 'Eko Ade S', '2018-12-12 16:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (697, 18, 'Eko Ade S', '2018-12-13 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (698, 18, 'Eko Ade S', '2018-12-13 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (699, 18, 'Eko Ade S', '2018-12-13 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (700, 18, 'Eko Ade S', '2018-12-14 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (701, 18, 'Eko Ade S', '2018-12-14 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (702, 18, 'Eko Ade S', '2018-12-14 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (703, 18, 'Eko Ade S', '2018-12-14 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (704, 18, 'Eko Ade S', '2018-12-17 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (705, 18, 'Eko Ade S', '2018-12-17 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (706, 18, 'Eko Ade S', '2018-12-17 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (707, 18, 'Eko Ade S', '2018-12-17 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (708, 18, 'Eko Ade S', '2018-12-18 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (709, 18, 'Eko Ade S', '2018-12-18 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (710, 18, 'Eko Ade S', '2018-12-18 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (711, 18, 'Eko Ade S', '2018-12-19 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (712, 18, 'Eko Ade S', '2018-12-19 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (713, 18, 'Eko Ade S', '2018-12-19 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (714, 18, 'Eko Ade S', '2018-12-19 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (715, 18, 'Eko Ade S', '2018-12-20 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (716, 18, 'Eko Ade S', '2018-12-20 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (717, 18, 'Eko Ade S', '2018-12-20 17:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (718, 18, 'Eko Ade S', '2018-12-20 17:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (719, 18, 'Eko Ade S', '2018-12-26 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (720, 18, 'Eko Ade S', '2018-12-26 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (721, 18, 'Eko Ade S', '2018-12-26 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (722, 18, 'Eko Ade S', '2018-12-26 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (723, 18, 'Eko Ade S', '2018-12-26 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (724, 18, 'Eko Ade S', '2018-12-27 08:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (725, 18, 'Eko Ade S', '2018-12-28 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (726, 18, 'Eko Ade S', '2018-12-28 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (727, 18, 'Eko Ade S', '2018-12-28 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (728, 18, 'Eko Ade S', '2018-12-28 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (729, 19, 'Setyo Prayitno', '2018-12-03 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (730, 19, 'Setyo Prayitno', '2018-12-03 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (731, 19, 'Setyo Prayitno', '2018-12-04 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (732, 19, 'Setyo Prayitno', '2018-12-04 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (733, 19, 'Setyo Prayitno', '2018-12-05 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (734, 19, 'Setyo Prayitno', '2018-12-05 16:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (735, 19, 'Setyo Prayitno', '2018-12-06 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (736, 19, 'Setyo Prayitno', '2018-12-06 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (737, 19, 'Setyo Prayitno', '2018-12-07 07:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (738, 19, 'Setyo Prayitno', '2018-12-07 17:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (739, 19, 'Setyo Prayitno', '2018-12-10 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (740, 19, 'Setyo Prayitno', '2018-12-10 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (741, 19, 'Setyo Prayitno', '2018-12-10 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (742, 19, 'Setyo Prayitno', '2018-12-11 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (743, 19, 'Setyo Prayitno', '2018-12-11 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (744, 19, 'Setyo Prayitno', '2018-12-12 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (745, 19, 'Setyo Prayitno', '2018-12-12 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (746, 19, 'Setyo Prayitno', '2018-12-13 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (747, 19, 'Setyo Prayitno', '2018-12-13 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (748, 19, 'Setyo Prayitno', '2018-12-14 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (749, 19, 'Setyo Prayitno', '2018-12-14 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (750, 19, 'Setyo Prayitno', '2018-12-17 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (751, 19, 'Setyo Prayitno', '2018-12-17 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (752, 19, 'Setyo Prayitno', '2018-12-17 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (753, 19, 'Setyo Prayitno', '2018-12-18 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (754, 19, 'Setyo Prayitno', '2018-12-19 16:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (755, 19, 'Setyo Prayitno', '2018-12-20 06:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (756, 19, 'Setyo Prayitno', '2018-12-20 18:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (757, 19, 'Setyo Prayitno', '2018-12-21 06:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (758, 19, 'Setyo Prayitno', '2018-12-26 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (759, 19, 'Setyo Prayitno', '2018-12-26 17:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (760, 19, 'Setyo Prayitno', '2018-12-27 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (761, 19, 'Setyo Prayitno', '2018-12-27 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (762, 19, 'Setyo Prayitno', '2018-12-28 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (763, 19, 'Setyo Prayitno', '2018-12-28 18:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (764, 19, 'Setyo Prayitno', '2018-12-31 07:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (765, 20, 'Agung Ramdhani', '2018-12-03 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (766, 20, 'Agung Ramdhani', '2018-12-03 17:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (767, 20, 'Agung Ramdhani', '2018-12-04 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (768, 20, 'Agung Ramdhani', '2018-12-04 21:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (769, 20, 'Agung Ramdhani', '2018-12-07 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (770, 20, 'Agung Ramdhani', '2018-12-07 17:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (771, 20, 'Agung Ramdhani', '2018-12-07 17:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (772, 20, 'Agung Ramdhani', '2018-12-10 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (773, 20, 'Agung Ramdhani', '2018-12-10 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (774, 20, 'Agung Ramdhani', '2018-12-11 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (775, 20, 'Agung Ramdhani', '2018-12-11 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (776, 20, 'Agung Ramdhani', '2018-12-12 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (777, 20, 'Agung Ramdhani', '2018-12-12 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (778, 20, 'Agung Ramdhani', '2018-12-13 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (779, 20, 'Agung Ramdhani', '2018-12-13 18:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (780, 20, 'Agung Ramdhani', '2018-12-14 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (781, 20, 'Agung Ramdhani', '2018-12-14 16:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (782, 20, 'Agung Ramdhani', '2018-12-14 17:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (783, 20, 'Agung Ramdhani', '2018-12-17 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (784, 20, 'Agung Ramdhani', '2018-12-17 18:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (785, 20, 'Agung Ramdhani', '2018-12-18 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (786, 20, 'Agung Ramdhani', '2018-12-18 17:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (787, 20, 'Agung Ramdhani', '2018-12-26 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (788, 20, 'Agung Ramdhani', '2018-12-27 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (789, 20, 'Agung Ramdhani', '2018-12-27 17:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (790, 20, 'Agung Ramdhani', '2018-12-27 17:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (791, 20, 'Agung Ramdhani', '2018-12-28 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (792, 20, 'Agung Ramdhani', '2018-12-28 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (793, 21, 'Kusnadi', '2018-12-03 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (794, 21, 'Kusnadi', '2018-12-03 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (795, 21, 'Kusnadi', '2018-12-04 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (796, 21, 'Kusnadi', '2018-12-04 17:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (797, 21, 'Kusnadi', '2018-12-05 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (798, 21, 'Kusnadi', '2018-12-05 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (799, 21, 'Kusnadi', '2018-12-06 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (800, 21, 'Kusnadi', '2018-12-06 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (801, 21, 'Kusnadi', '2018-12-07 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (802, 21, 'Kusnadi', '2018-12-07 16:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (803, 21, 'Kusnadi', '2018-12-10 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (804, 21, 'Kusnadi', '2018-12-10 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (805, 21, 'Kusnadi', '2018-12-11 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (806, 21, 'Kusnadi', '2018-12-11 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (807, 21, 'Kusnadi', '2018-12-12 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (808, 21, 'Kusnadi', '2018-12-12 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (809, 21, 'Kusnadi', '2018-12-13 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (810, 21, 'Kusnadi', '2018-12-13 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (811, 21, 'Kusnadi', '2018-12-14 08:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (812, 21, 'Kusnadi', '2018-12-14 17:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (813, 21, 'Kusnadi', '2018-12-17 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (814, 21, 'Kusnadi', '2018-12-17 17:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (815, 21, 'Kusnadi', '2018-12-18 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (816, 21, 'Kusnadi', '2018-12-18 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (817, 21, 'Kusnadi', '2018-12-19 09:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (818, 21, 'Kusnadi', '2018-12-19 17:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (819, 21, 'Kusnadi', '2018-12-20 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (820, 21, 'Kusnadi', '2018-12-20 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (821, 21, 'Kusnadi', '2018-12-21 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (822, 21, 'Kusnadi', '2018-12-21 17:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (823, 21, 'Kusnadi', '2018-12-26 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (824, 21, 'Kusnadi', '2018-12-26 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (825, 21, 'Kusnadi', '2018-12-27 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (826, 21, 'Kusnadi', '2018-12-27 17:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (827, 21, 'Kusnadi', '2018-12-31 06:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (828, 21, 'Kusnadi', '2018-12-31 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (829, 22, 'Agus Prio S', '2018-12-03 07:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (830, 22, 'Agus Prio S', '2018-12-03 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (831, 22, 'Agus Prio S', '2018-12-04 07:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (832, 22, 'Agus Prio S', '2018-12-04 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (833, 22, 'Agus Prio S', '2018-12-05 07:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (834, 22, 'Agus Prio S', '2018-12-05 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (835, 22, 'Agus Prio S', '2018-12-06 07:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (836, 22, 'Agus Prio S', '2018-12-06 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (837, 22, 'Agus Prio S', '2018-12-07 06:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (838, 22, 'Agus Prio S', '2018-12-07 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (839, 22, 'Agus Prio S', '2018-12-07 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (840, 22, 'Agus Prio S', '2018-12-10 07:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (841, 22, 'Agus Prio S', '2018-12-10 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (842, 22, 'Agus Prio S', '2018-12-11 07:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (843, 22, 'Agus Prio S', '2018-12-11 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (844, 22, 'Agus Prio S', '2018-12-12 07:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (845, 22, 'Agus Prio S', '2018-12-12 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (846, 22, 'Agus Prio S', '2018-12-13 07:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (847, 22, 'Agus Prio S', '2018-12-13 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (848, 22, 'Agus Prio S', '2018-12-14 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (849, 22, 'Agus Prio S', '2018-12-14 17:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (850, 22, 'Agus Prio S', '2018-12-17 07:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (851, 22, 'Agus Prio S', '2018-12-17 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (852, 22, 'Agus Prio S', '2018-12-18 07:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (853, 22, 'Agus Prio S', '2018-12-18 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (854, 22, 'Agus Prio S', '2018-12-19 09:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (855, 22, 'Agus Prio S', '2018-12-19 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (856, 22, 'Agus Prio S', '2018-12-20 06:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (857, 22, 'Agus Prio S', '2018-12-20 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (858, 22, 'Agus Prio S', '2018-12-21 07:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (859, 22, 'Agus Prio S', '2018-12-21 17:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (860, 22, 'Agus Prio S', '2018-12-26 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (861, 22, 'Agus Prio S', '2018-12-26 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (862, 22, 'Agus Prio S', '2018-12-27 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (863, 22, 'Agus Prio S', '2018-12-27 17:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (864, 22, 'Agus Prio S', '2018-12-28 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (865, 22, 'Agus Prio S', '2018-12-28 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (866, 22, 'Agus Prio S', '2018-12-31 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (867, 22, 'Agus Prio S', '2018-12-31 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (868, 23, 'M Rafik', '2018-12-03 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (869, 23, 'M Rafik', '2018-12-03 18:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (870, 23, 'M Rafik', '2018-12-04 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (871, 23, 'M Rafik', '2018-12-04 18:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (872, 23, 'M Rafik', '2018-12-05 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (873, 23, 'M Rafik', '2018-12-05 18:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (874, 23, 'M Rafik', '2018-12-05 19:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (875, 23, 'M Rafik', '2018-12-06 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (876, 23, 'M Rafik', '2018-12-06 18:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (877, 23, 'M Rafik', '2018-12-07 08:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (878, 23, 'M Rafik', '2018-12-07 18:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (879, 23, 'M Rafik', '2018-12-10 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (880, 23, 'M Rafik', '2018-12-10 19:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (881, 23, 'M Rafik', '2018-12-11 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (882, 23, 'M Rafik', '2018-12-11 19:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (883, 23, 'M Rafik', '2018-12-12 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (884, 23, 'M Rafik', '2018-12-12 18:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (885, 23, 'M Rafik', '2018-12-13 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (886, 23, 'M Rafik', '2018-12-13 18:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (887, 23, 'M Rafik', '2018-12-14 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (888, 23, 'M Rafik', '2018-12-14 18:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (889, 23, 'M Rafik', '2018-12-17 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (890, 23, 'M Rafik', '2018-12-17 17:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (891, 23, 'M Rafik', '2018-12-18 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (892, 23, 'M Rafik', '2018-12-18 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (893, 23, 'M Rafik', '2018-12-19 08:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (894, 23, 'M Rafik', '2018-12-19 17:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (895, 23, 'M Rafik', '2018-12-20 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (896, 23, 'M Rafik', '2018-12-20 18:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (897, 23, 'M Rafik', '2018-12-21 09:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (898, 23, 'M Rafik', '2018-12-21 17:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (899, 23, 'M Rafik', '2018-12-26 09:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (900, 23, 'M Rafik', '2018-12-26 18:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (901, 23, 'M Rafik', '2018-12-27 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (902, 23, 'M Rafik', '2018-12-27 17:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (903, 23, 'M Rafik', '2018-12-28 08:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (904, 23, 'M Rafik', '2018-12-31 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (905, 23, 'M Rafik', '2018-12-31 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (906, 24, 'Lydia Lupita', '2018-12-03 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (907, 24, 'Lydia Lupita', '2018-12-03 18:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (908, 24, 'Lydia Lupita', '2018-12-04 07:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (909, 24, 'Lydia Lupita', '2018-12-04 17:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (910, 24, 'Lydia Lupita', '2018-12-05 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (911, 24, 'Lydia Lupita', '2018-12-05 17:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (912, 24, 'Lydia Lupita', '2018-12-06 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (913, 24, 'Lydia Lupita', '2018-12-06 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (914, 24, 'Lydia Lupita', '2018-12-06 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (915, 24, 'Lydia Lupita', '2018-12-06 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (916, 24, 'Lydia Lupita', '2018-12-06 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (917, 24, 'Lydia Lupita', '2018-12-07 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (918, 24, 'Lydia Lupita', '2018-12-07 20:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (919, 24, 'Lydia Lupita', '2018-12-10 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (920, 24, 'Lydia Lupita', '2018-12-10 18:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (921, 24, 'Lydia Lupita', '2018-12-11 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (922, 24, 'Lydia Lupita', '2018-12-11 18:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (923, 24, 'Lydia Lupita', '2018-12-12 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (924, 24, 'Lydia Lupita', '2018-12-12 19:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (925, 24, 'Lydia Lupita', '2018-12-13 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (926, 24, 'Lydia Lupita', '2018-12-13 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (927, 24, 'Lydia Lupita', '2018-12-17 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (928, 24, 'Lydia Lupita', '2018-12-17 19:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (929, 24, 'Lydia Lupita', '2018-12-18 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (930, 24, 'Lydia Lupita', '2018-12-18 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (931, 24, 'Lydia Lupita', '2018-12-20 09:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (932, 24, 'Lydia Lupita', '2018-12-20 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (933, 24, 'Lydia Lupita', '2018-12-21 07:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (934, 24, 'Lydia Lupita', '2018-12-21 18:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (935, 24, 'Lydia Lupita', '2018-12-26 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (936, 24, 'Lydia Lupita', '2018-12-26 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (937, 24, 'Lydia Lupita', '2018-12-27 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (938, 24, 'Lydia Lupita', '2018-12-27 17:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (939, 24, 'Lydia Lupita', '2018-12-28 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (940, 24, 'Lydia Lupita', '2018-12-28 20:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (941, 24, 'Lydia Lupita', '2018-12-31 07:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (942, 24, 'Lydia Lupita', '2018-12-31 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (943, 25, 'Olga Febriani', '2018-12-03 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (944, 25, 'Olga Febriani', '2018-12-03 18:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (945, 25, 'Olga Febriani', '2018-12-04 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (946, 25, 'Olga Febriani', '2018-12-04 20:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (947, 25, 'Olga Febriani', '2018-12-05 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (948, 25, 'Olga Febriani', '2018-12-05 17:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (949, 25, 'Olga Febriani', '2018-12-06 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (950, 25, 'Olga Febriani', '2018-12-06 19:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (951, 25, 'Olga Febriani', '2018-12-07 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (952, 25, 'Olga Febriani', '2018-12-07 18:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (953, 25, 'Olga Febriani', '2018-12-10 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (954, 25, 'Olga Febriani', '2018-12-10 18:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (955, 25, 'Olga Febriani', '2018-12-11 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (956, 25, 'Olga Febriani', '2018-12-11 18:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (957, 25, 'Olga Febriani', '2018-12-12 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (958, 25, 'Olga Febriani', '2018-12-12 18:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (959, 25, 'Olga Febriani', '2018-12-13 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (960, 25, 'Olga Febriani', '2018-12-13 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (961, 25, 'Olga Febriani', '2018-12-17 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (962, 25, 'Olga Febriani', '2018-12-17 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (963, 25, 'Olga Febriani', '2018-12-18 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (964, 25, 'Olga Febriani', '2018-12-18 17:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (965, 25, 'Olga Febriani', '2018-12-19 09:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (966, 25, 'Olga Febriani', '2018-12-20 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (967, 25, 'Olga Febriani', '2018-12-20 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (968, 25, 'Olga Febriani', '2018-12-21 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (969, 25, 'Olga Febriani', '2018-12-21 17:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (970, 26, 'Nareswari Nur Anindita', '2018-12-03 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (971, 26, 'Nareswari Nur Anindita', '2018-12-03 20:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (972, 26, 'Nareswari Nur Anindita', '2018-12-03 20:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (973, 26, 'Nareswari Nur Anindita', '2018-12-04 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (974, 26, 'Nareswari Nur Anindita', '2018-12-04 22:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (975, 26, 'Nareswari Nur Anindita', '2018-12-04 22:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (976, 26, 'Nareswari Nur Anindita', '2018-12-05 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (977, 26, 'Nareswari Nur Anindita', '2018-12-05 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (978, 26, 'Nareswari Nur Anindita', '2018-12-05 20:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (979, 26, 'Nareswari Nur Anindita', '2018-12-06 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (980, 26, 'Nareswari Nur Anindita', '2018-12-06 20:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (981, 26, 'Nareswari Nur Anindita', '2018-12-06 20:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (982, 26, 'Nareswari Nur Anindita', '2018-12-07 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (983, 26, 'Nareswari Nur Anindita', '2018-12-07 19:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (984, 26, 'Nareswari Nur Anindita', '2018-12-10 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (985, 26, 'Nareswari Nur Anindita', '2018-12-10 20:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (986, 26, 'Nareswari Nur Anindita', '2018-12-11 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (987, 26, 'Nareswari Nur Anindita', '2018-12-11 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (988, 26, 'Nareswari Nur Anindita', '2018-12-11 20:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (989, 26, 'Nareswari Nur Anindita', '2018-12-12 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (990, 26, 'Nareswari Nur Anindita', '2018-12-12 19:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (991, 26, 'Nareswari Nur Anindita', '2018-12-12 19:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (992, 26, 'Nareswari Nur Anindita', '2018-12-13 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (993, 26, 'Nareswari Nur Anindita', '2018-12-13 17:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (994, 26, 'Nareswari Nur Anindita', '2018-12-17 19:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (995, 26, 'Nareswari Nur Anindita', '2018-12-18 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (996, 26, 'Nareswari Nur Anindita', '2018-12-18 18:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (997, 26, 'Nareswari Nur Anindita', '2018-12-18 18:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (998, 26, 'Nareswari Nur Anindita', '2018-12-19 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (999, 26, 'Nareswari Nur Anindita', '2018-12-19 21:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1000, 26, 'Nareswari Nur Anindita', '2018-12-19 22:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1001, 26, 'Nareswari Nur Anindita', '2018-12-20 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1002, 26, 'Nareswari Nur Anindita', '2018-12-20 18:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1003, 26, 'Nareswari Nur Anindita', '2018-12-20 19:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1004, 26, 'Nareswari Nur Anindita', '2018-12-21 21:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1005, 26, 'Nareswari Nur Anindita', '2018-12-26 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1006, 26, 'Nareswari Nur Anindita', '2018-12-26 18:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1007, 26, 'Nareswari Nur Anindita', '2018-12-26 18:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1008, 26, 'Nareswari Nur Anindita', '2018-12-27 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1009, 26, 'Nareswari Nur Anindita', '2018-12-28 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1010, 26, 'Nareswari Nur Anindita', '2018-12-28 19:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1011, 26, 'Nareswari Nur Anindita', '2018-12-28 20:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1012, 27, 'Riky Dwi Putra', '2018-12-03 06:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1013, 27, 'Riky Dwi Putra', '2018-12-03 06:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1014, 27, 'Riky Dwi Putra', '2018-12-03 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1015, 27, 'Riky Dwi Putra', '2018-12-03 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1016, 27, 'Riky Dwi Putra', '2018-12-04 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1017, 27, 'Riky Dwi Putra', '2018-12-04 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1018, 27, 'Riky Dwi Putra', '2018-12-04 19:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1019, 27, 'Riky Dwi Putra', '2018-12-04 19:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1020, 27, 'Riky Dwi Putra', '2018-12-04 22:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1021, 27, 'Riky Dwi Putra', '2018-12-04 22:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1022, 27, 'Riky Dwi Putra', '2018-12-05 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1023, 27, 'Riky Dwi Putra', '2018-12-05 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1024, 27, 'Riky Dwi Putra', '2018-12-05 17:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1025, 27, 'Riky Dwi Putra', '2018-12-05 17:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1026, 27, 'Riky Dwi Putra', '2018-12-06 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1027, 27, 'Riky Dwi Putra', '2018-12-06 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1028, 27, 'Riky Dwi Putra', '2018-12-06 17:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1029, 27, 'Riky Dwi Putra', '2018-12-06 17:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1030, 27, 'Riky Dwi Putra', '2018-12-07 06:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1031, 27, 'Riky Dwi Putra', '2018-12-07 06:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1032, 27, 'Riky Dwi Putra', '2018-12-07 18:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1033, 27, 'Riky Dwi Putra', '2018-12-17 05:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1034, 27, 'Riky Dwi Putra', '2018-12-17 05:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1035, 27, 'Riky Dwi Putra', '2018-12-17 22:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1036, 27, 'Riky Dwi Putra', '2018-12-17 22:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1037, 27, 'Riky Dwi Putra', '2018-12-18 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1038, 27, 'Riky Dwi Putra', '2018-12-18 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1039, 27, 'Riky Dwi Putra', '2018-12-18 21:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1040, 27, 'Riky Dwi Putra', '2018-12-18 21:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1041, 27, 'Riky Dwi Putra', '2018-12-19 23:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1042, 27, 'Riky Dwi Putra', '2018-12-19 23:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1043, 27, 'Riky Dwi Putra', '2018-12-20 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1044, 27, 'Riky Dwi Putra', '2018-12-20 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1045, 27, 'Riky Dwi Putra', '2018-12-20 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1046, 27, 'Riky Dwi Putra', '2018-12-20 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1047, 27, 'Riky Dwi Putra', '2018-12-21 06:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1048, 27, 'Riky Dwi Putra', '2018-12-21 06:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1049, 27, 'Riky Dwi Putra', '2018-12-21 21:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1050, 27, 'Riky Dwi Putra', '2018-12-21 21:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1051, 27, 'Riky Dwi Putra', '2018-12-26 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1052, 27, 'Riky Dwi Putra', '2018-12-26 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1053, 27, 'Riky Dwi Putra', '2018-12-26 18:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1054, 27, 'Riky Dwi Putra', '2018-12-26 18:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1055, 27, 'Riky Dwi Putra', '2018-12-27 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1056, 27, 'Riky Dwi Putra', '2018-12-27 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1057, 27, 'Riky Dwi Putra', '2018-12-27 19:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1058, 27, 'Riky Dwi Putra', '2018-12-27 19:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1059, 27, 'Riky Dwi Putra', '2018-12-28 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1060, 27, 'Riky Dwi Putra', '2018-12-28 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1061, 27, 'Riky Dwi Putra', '2018-12-28 20:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1062, 27, 'Riky Dwi Putra', '2018-12-28 20:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1063, 27, 'Riky Dwi Putra', '2018-12-31 05:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1064, 27, 'Riky Dwi Putra', '2018-12-31 05:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1065, 27, 'Riky Dwi Putra', '2018-12-31 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1066, 27, 'Riky Dwi Putra', '2018-12-31 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1067, 27, 'Riky Dwi Putra', '2018-12-31 18:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1068, 27, 'Riky Dwi Putra', '2018-12-31 18:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1069, 28, 'Fredy Pramuditya', '2018-12-06 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1070, 28, 'Fredy Pramuditya', '2018-12-06 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1071, 28, 'Fredy Pramuditya', '2018-12-07 17:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1072, 28, 'Fredy Pramuditya', '2018-12-11 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1073, 28, 'Fredy Pramuditya', '2018-12-12 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1074, 28, 'Fredy Pramuditya', '2018-12-14 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1075, 28, 'Fredy Pramuditya', '2018-12-14 21:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1076, 28, 'Fredy Pramuditya', '2018-12-24 05:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1077, 28, 'Fredy Pramuditya', '2018-12-24 19:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1078, 28, 'Fredy Pramuditya', '2018-12-26 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1079, 28, 'Fredy Pramuditya', '2018-12-28 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1080, 28, 'Fredy Pramuditya', '2018-12-28 18:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1081, 29, 'Ismianto Wibowo', '2018-12-03 20:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1082, 29, 'Ismianto Wibowo', '2018-12-04 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1083, 29, 'Ismianto Wibowo', '2018-12-04 22:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1084, 29, 'Ismianto Wibowo', '2018-12-04 22:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1085, 29, 'Ismianto Wibowo', '2018-12-05 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1086, 29, 'Ismianto Wibowo', '2018-12-05 19:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1087, 29, 'Ismianto Wibowo', '2018-12-06 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1088, 29, 'Ismianto Wibowo', '2018-12-06 22:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1089, 29, 'Ismianto Wibowo', '2018-12-07 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1090, 29, 'Ismianto Wibowo', '2018-12-10 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1091, 29, 'Ismianto Wibowo', '2018-12-10 20:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1092, 29, 'Ismianto Wibowo', '2018-12-11 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1093, 29, 'Ismianto Wibowo', '2018-12-11 17:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1094, 29, 'Ismianto Wibowo', '2018-12-12 06:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1095, 29, 'Ismianto Wibowo', '2018-12-13 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1096, 29, 'Ismianto Wibowo', '2018-12-13 23:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1097, 29, 'Ismianto Wibowo', '2018-12-14 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1098, 29, 'Ismianto Wibowo', '2018-12-14 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1099, 29, 'Ismianto Wibowo', '2018-12-18 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1100, 29, 'Ismianto Wibowo', '2018-12-18 19:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1101, 29, 'Ismianto Wibowo', '2018-12-19 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1102, 29, 'Ismianto Wibowo', '2018-12-19 23:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1103, 29, 'Ismianto Wibowo', '2018-12-20 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1104, 29, 'Ismianto Wibowo', '2018-12-20 20:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1105, 29, 'Ismianto Wibowo', '2018-12-28 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1106, 29, 'Ismianto Wibowo', '2018-12-28 18:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1107, 30, 'Defrianto', '2018-12-04 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1108, 30, 'Defrianto', '2018-12-04 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1109, 30, 'Defrianto', '2018-12-04 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1110, 30, 'Defrianto', '2018-12-04 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1111, 30, 'Defrianto', '2018-12-05 04:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1112, 30, 'Defrianto', '2018-12-05 04:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1113, 30, 'Defrianto', '2018-12-05 04:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1114, 30, 'Defrianto', '2018-12-05 04:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1115, 30, 'Defrianto', '2018-12-05 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1116, 30, 'Defrianto', '2018-12-05 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1117, 30, 'Defrianto', '2018-12-06 07:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1118, 30, 'Defrianto', '2018-12-06 07:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1119, 30, 'Defrianto', '2018-12-06 17:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1120, 30, 'Defrianto', '2018-12-06 17:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1121, 30, 'Defrianto', '2018-12-07 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1122, 30, 'Defrianto', '2018-12-07 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1123, 30, 'Defrianto', '2018-12-07 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1124, 30, 'Defrianto', '2018-12-07 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1125, 30, 'Defrianto', '2018-12-07 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1126, 30, 'Defrianto', '2018-12-07 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1127, 30, 'Defrianto', '2018-12-07 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1128, 30, 'Defrianto', '2018-12-10 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1129, 30, 'Defrianto', '2018-12-10 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1130, 30, 'Defrianto', '2018-12-10 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1131, 30, 'Defrianto', '2018-12-10 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1132, 30, 'Defrianto', '2018-12-11 07:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1133, 30, 'Defrianto', '2018-12-11 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1134, 30, 'Defrianto', '2018-12-11 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1135, 30, 'Defrianto', '2018-12-11 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1136, 30, 'Defrianto', '2018-12-11 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1137, 30, 'Defrianto', '2018-12-12 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1138, 30, 'Defrianto', '2018-12-12 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1139, 30, 'Defrianto', '2018-12-12 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1140, 30, 'Defrianto', '2018-12-12 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1141, 30, 'Defrianto', '2018-12-13 07:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1142, 30, 'Defrianto', '2018-12-13 07:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1143, 30, 'Defrianto', '2018-12-13 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1144, 30, 'Defrianto', '2018-12-14 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1145, 30, 'Defrianto', '2018-12-14 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1146, 30, 'Defrianto', '2018-12-14 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1147, 30, 'Defrianto', '2018-12-14 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1148, 30, 'Defrianto', '2018-12-14 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1149, 30, 'Defrianto', '2018-12-17 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1150, 30, 'Defrianto', '2018-12-17 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1151, 30, 'Defrianto', '2018-12-17 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1152, 30, 'Defrianto', '2018-12-17 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1153, 30, 'Defrianto', '2018-12-17 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1154, 30, 'Defrianto', '2018-12-17 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1155, 30, 'Defrianto', '2018-12-18 07:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1156, 30, 'Defrianto', '2018-12-18 07:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1157, 30, 'Defrianto', '2018-12-18 07:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1158, 30, 'Defrianto', '2018-12-18 07:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1159, 30, 'Defrianto', '2018-12-18 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1160, 30, 'Defrianto', '2018-12-18 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1161, 30, 'Defrianto', '2018-12-19 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1162, 30, 'Defrianto', '2018-12-19 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1163, 30, 'Defrianto', '2018-12-19 18:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1164, 30, 'Defrianto', '2018-12-19 18:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1165, 30, 'Defrianto', '2018-12-20 07:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1166, 30, 'Defrianto', '2018-12-20 07:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1167, 30, 'Defrianto', '2018-12-31 06:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1168, 30, 'Defrianto', '2018-12-31 06:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1169, 30, 'Defrianto', '2018-12-31 06:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1170, 30, 'Defrianto', '2018-12-31 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1171, 30, 'Defrianto', '2018-12-31 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1172, 32, 'Eka Murwani', '2018-12-03 08:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1173, 32, 'Eka Murwani', '2018-12-03 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1174, 32, 'Eka Murwani', '2018-12-04 09:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1175, 32, 'Eka Murwani', '2018-12-04 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1176, 32, 'Eka Murwani', '2018-12-05 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1177, 32, 'Eka Murwani', '2018-12-07 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1178, 32, 'Eka Murwani', '2018-12-10 08:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1179, 32, 'Eka Murwani', '2018-12-10 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1180, 32, 'Eka Murwani', '2018-12-11 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1181, 32, 'Eka Murwani', '2018-12-11 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1182, 32, 'Eka Murwani', '2018-12-12 08:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1183, 32, 'Eka Murwani', '2018-12-13 08:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1184, 32, 'Eka Murwani', '2018-12-13 16:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1185, 32, 'Eka Murwani', '2018-12-17 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1186, 32, 'Eka Murwani', '2018-12-18 08:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1187, 32, 'Eka Murwani', '2018-12-18 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1188, 32, 'Eka Murwani', '2018-12-19 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1189, 32, 'Eka Murwani', '2018-12-20 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1190, 32, 'Eka Murwani', '2018-12-21 08:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1191, 32, 'Eka Murwani', '2018-12-21 17:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1192, 32, 'Eka Murwani', '2018-12-31 09:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1193, 33, 'Bugi Bunzali', '2018-12-03 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1194, 33, 'Bugi Bunzali', '2018-12-03 18:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1195, 33, 'Bugi Bunzali', '2018-12-04 08:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1196, 33, 'Bugi Bunzali', '2018-12-04 17:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1197, 33, 'Bugi Bunzali', '2018-12-05 08:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1198, 33, 'Bugi Bunzali', '2018-12-05 17:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1199, 33, 'Bugi Bunzali', '2018-12-06 08:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1200, 33, 'Bugi Bunzali', '2018-12-06 17:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1201, 33, 'Bugi Bunzali', '2018-12-07 08:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1202, 33, 'Bugi Bunzali', '2018-12-07 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1203, 33, 'Bugi Bunzali', '2018-12-10 08:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1204, 33, 'Bugi Bunzali', '2018-12-10 18:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1205, 33, 'Bugi Bunzali', '2018-12-11 08:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1206, 33, 'Bugi Bunzali', '2018-12-11 18:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1207, 33, 'Bugi Bunzali', '2018-12-12 08:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1208, 33, 'Bugi Bunzali', '2018-12-12 17:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1209, 33, 'Bugi Bunzali', '2018-12-13 08:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1210, 33, 'Bugi Bunzali', '2018-12-13 20:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1211, 33, 'Bugi Bunzali', '2018-12-14 08:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1212, 33, 'Bugi Bunzali', '2018-12-14 17:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1213, 33, 'Bugi Bunzali', '2018-12-17 08:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1214, 33, 'Bugi Bunzali', '2018-12-17 17:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1215, 33, 'Bugi Bunzali', '2018-12-18 08:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1216, 33, 'Bugi Bunzali', '2018-12-18 17:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1217, 33, 'Bugi Bunzali', '2018-12-26 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1218, 33, 'Bugi Bunzali', '2018-12-26 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1219, 33, 'Bugi Bunzali', '2018-12-26 17:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1220, 33, 'Bugi Bunzali', '2018-12-27 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1221, 33, 'Bugi Bunzali', '2018-12-27 17:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1222, 33, 'Bugi Bunzali', '2018-12-28 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1223, 33, 'Bugi Bunzali', '2018-12-28 20:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1224, 33, 'Bugi Bunzali', '2018-12-31 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1225, 33, 'Bugi Bunzali', '2018-12-31 16:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1226, 34, 'Handoko', '2018-12-03 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1227, 34, 'Handoko', '2018-12-03 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1228, 34, 'Handoko', '2018-12-04 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1229, 34, 'Handoko', '2018-12-04 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1230, 34, 'Handoko', '2018-12-04 17:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1231, 34, 'Handoko', '2018-12-04 17:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1232, 34, 'Handoko', '2018-12-05 07:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1233, 34, 'Handoko', '2018-12-05 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1234, 34, 'Handoko', '2018-12-06 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1235, 34, 'Handoko', '2018-12-06 17:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1236, 34, 'Handoko', '2018-12-07 07:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1237, 34, 'Handoko', '2018-12-07 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1238, 34, 'Handoko', '2018-12-10 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1239, 34, 'Handoko', '2018-12-10 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1240, 34, 'Handoko', '2018-12-10 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1241, 34, 'Handoko', '2018-12-11 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1242, 34, 'Handoko', '2018-12-11 16:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1243, 34, 'Handoko', '2018-12-12 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1244, 34, 'Handoko', '2018-12-12 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1245, 34, 'Handoko', '2018-12-13 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1246, 34, 'Handoko', '2018-12-13 19:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1247, 34, 'Handoko', '2018-12-13 19:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1248, 34, 'Handoko', '2018-12-14 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1249, 34, 'Handoko', '2018-12-14 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1250, 34, 'Handoko', '2018-12-14 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1251, 34, 'Handoko', '2018-12-17 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1252, 34, 'Handoko', '2018-12-17 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1253, 34, 'Handoko', '2018-12-18 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1254, 34, 'Handoko', '2018-12-18 20:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1255, 34, 'Handoko', '2018-12-26 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1256, 34, 'Handoko', '2018-12-26 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1257, 34, 'Handoko', '2018-12-27 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1258, 34, 'Handoko', '2018-12-27 16:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1259, 34, 'Handoko', '2018-12-28 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1260, 34, 'Handoko', '2018-12-28 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1261, 34, 'Handoko', '2018-12-31 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1262, 34, 'Handoko', '2018-12-31 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1263, 36, 'Bayu Angga', '2018-12-03 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1264, 36, 'Bayu Angga', '2018-12-03 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1265, 36, 'Bayu Angga', '2018-12-03 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1266, 36, 'Bayu Angga', '2018-12-03 18:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1267, 36, 'Bayu Angga', '2018-12-04 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1268, 36, 'Bayu Angga', '2018-12-04 17:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1269, 36, 'Bayu Angga', '2018-12-04 17:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1270, 36, 'Bayu Angga', '2018-12-05 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1271, 36, 'Bayu Angga', '2018-12-05 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1272, 36, 'Bayu Angga', '2018-12-05 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1273, 36, 'Bayu Angga', '2018-12-05 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1274, 36, 'Bayu Angga', '2018-12-05 17:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1275, 36, 'Bayu Angga', '2018-12-05 17:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1276, 36, 'Bayu Angga', '2018-12-06 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1277, 36, 'Bayu Angga', '2018-12-06 17:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1278, 36, 'Bayu Angga', '2018-12-07 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1279, 36, 'Bayu Angga', '2018-12-07 17:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1280, 36, 'Bayu Angga', '2018-12-10 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1281, 36, 'Bayu Angga', '2018-12-10 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1282, 36, 'Bayu Angga', '2018-12-10 19:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1283, 36, 'Bayu Angga', '2018-12-11 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1284, 36, 'Bayu Angga', '2018-12-11 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1285, 36, 'Bayu Angga', '2018-12-12 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1286, 36, 'Bayu Angga', '2018-12-12 17:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1287, 36, 'Bayu Angga', '2018-12-13 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1288, 36, 'Bayu Angga', '2018-12-13 19:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1289, 36, 'Bayu Angga', '2018-12-14 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1290, 36, 'Bayu Angga', '2018-12-14 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1291, 36, 'Bayu Angga', '2018-12-18 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1292, 36, 'Bayu Angga', '2018-12-18 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1293, 36, 'Bayu Angga', '2018-12-18 23:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1294, 36, 'Bayu Angga', '2018-12-19 18:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1295, 36, 'Bayu Angga', '2018-12-20 19:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1296, 36, 'Bayu Angga', '2018-12-21 08:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1297, 36, 'Bayu Angga', '2018-12-21 18:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1298, 36, 'Bayu Angga', '2018-12-26 08:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1299, 36, 'Bayu Angga', '2018-12-26 16:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1300, 36, 'Bayu Angga', '2018-12-27 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1301, 36, 'Bayu Angga', '2018-12-27 17:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1302, 36, 'Bayu Angga', '2018-12-27 17:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1303, 36, 'Bayu Angga', '2018-12-28 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1304, 36, 'Bayu Angga', '2018-12-28 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1305, 36, 'Bayu Angga', '2018-12-28 17:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1306, 36, 'Bayu Angga', '2018-12-31 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1307, 36, 'Bayu Angga', '2018-12-31 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1308, 37, 'Husni Husin', '2018-12-03 06:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1309, 37, 'Husni Husin', '2018-12-04 05:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1310, 37, 'Husni Husin', '2018-12-05 07:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1311, 37, 'Husni Husin', '2018-12-05 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1312, 37, 'Husni Husin', '2018-12-06 07:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1313, 37, 'Husni Husin', '2018-12-06 07:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1314, 37, 'Husni Husin', '2018-12-06 17:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1315, 37, 'Husni Husin', '2018-12-07 06:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1316, 37, 'Husni Husin', '2018-12-07 17:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1317, 37, 'Husni Husin', '2018-12-10 07:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1318, 37, 'Husni Husin', '2018-12-10 17:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1319, 37, 'Husni Husin', '2018-12-11 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1320, 37, 'Husni Husin', '2018-12-11 17:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1321, 37, 'Husni Husin', '2018-12-12 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1322, 37, 'Husni Husin', '2018-12-12 20:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1323, 37, 'Husni Husin', '2018-12-13 06:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1324, 37, 'Husni Husin', '2018-12-14 06:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1325, 37, 'Husni Husin', '2018-12-17 07:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1326, 38, 'Heri Somantri', '2018-12-03 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1327, 38, 'Heri Somantri', '2018-12-03 17:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1328, 38, 'Heri Somantri', '2018-12-04 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1329, 38, 'Heri Somantri', '2018-12-04 18:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1330, 38, 'Heri Somantri', '2018-12-05 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1331, 38, 'Heri Somantri', '2018-12-05 18:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1332, 38, 'Heri Somantri', '2018-12-06 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1333, 38, 'Heri Somantri', '2018-12-06 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1334, 38, 'Heri Somantri', '2018-12-07 08:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1335, 38, 'Heri Somantri', '2018-12-07 17:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1336, 38, 'Heri Somantri', '2018-12-07 17:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1337, 38, 'Heri Somantri', '2018-12-07 17:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1338, 38, 'Heri Somantri', '2018-12-10 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1339, 38, 'Heri Somantri', '2018-12-10 18:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1340, 38, 'Heri Somantri', '2018-12-11 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1341, 38, 'Heri Somantri', '2018-12-11 18:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1342, 38, 'Heri Somantri', '2018-12-12 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1343, 38, 'Heri Somantri', '2018-12-12 18:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1344, 38, 'Heri Somantri', '2018-12-13 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1345, 38, 'Heri Somantri', '2018-12-13 18:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1346, 38, 'Heri Somantri', '2018-12-14 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1347, 38, 'Heri Somantri', '2018-12-14 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1348, 38, 'Heri Somantri', '2018-12-17 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1349, 38, 'Heri Somantri', '2018-12-17 18:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1350, 38, 'Heri Somantri', '2018-12-18 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1351, 38, 'Heri Somantri', '2018-12-19 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1352, 38, 'Heri Somantri', '2018-12-19 18:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1353, 38, 'Heri Somantri', '2018-12-20 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1354, 38, 'Heri Somantri', '2018-12-20 19:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1355, 38, 'Heri Somantri', '2018-12-21 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1356, 38, 'Heri Somantri', '2018-12-21 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1357, 38, 'Heri Somantri', '2018-12-26 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1358, 38, 'Heri Somantri', '2018-12-26 18:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1359, 38, 'Heri Somantri', '2018-12-27 07:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1360, 38, 'Heri Somantri', '2018-12-27 17:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1361, 38, 'Heri Somantri', '2018-12-28 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1362, 38, 'Heri Somantri', '2018-12-28 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1363, 38, 'Heri Somantri', '2018-12-31 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1364, 38, 'Heri Somantri', '2018-12-31 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1365, 39, 'Sarah Hutabarat', '2018-12-03 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1366, 39, 'Sarah Hutabarat', '2018-12-03 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1367, 39, 'Sarah Hutabarat', '2018-12-04 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1368, 39, 'Sarah Hutabarat', '2018-12-04 17:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1369, 39, 'Sarah Hutabarat', '2018-12-05 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1370, 39, 'Sarah Hutabarat', '2018-12-05 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1371, 39, 'Sarah Hutabarat', '2018-12-06 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1372, 39, 'Sarah Hutabarat', '2018-12-06 17:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1373, 39, 'Sarah Hutabarat', '2018-12-07 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1374, 39, 'Sarah Hutabarat', '2018-12-07 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1375, 39, 'Sarah Hutabarat', '2018-12-10 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1376, 39, 'Sarah Hutabarat', '2018-12-10 17:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1377, 39, 'Sarah Hutabarat', '2018-12-11 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1378, 39, 'Sarah Hutabarat', '2018-12-11 16:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1379, 39, 'Sarah Hutabarat', '2018-12-12 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1380, 39, 'Sarah Hutabarat', '2018-12-12 16:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1381, 39, 'Sarah Hutabarat', '2018-12-13 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1382, 39, 'Sarah Hutabarat', '2018-12-14 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1383, 39, 'Sarah Hutabarat', '2018-12-14 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1384, 39, 'Sarah Hutabarat', '2018-12-17 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1385, 39, 'Sarah Hutabarat', '2018-12-17 17:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1386, 39, 'Sarah Hutabarat', '2018-12-18 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1387, 39, 'Sarah Hutabarat', '2018-12-18 15:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1388, 39, 'Sarah Hutabarat', '2018-12-21 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1389, 39, 'Sarah Hutabarat', '2018-12-21 15:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1390, 39, 'Sarah Hutabarat', '2018-12-27 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1391, 39, 'Sarah Hutabarat', '2018-12-27 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1392, 39, 'Sarah Hutabarat', '2018-12-28 08:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1393, 39, 'Sarah Hutabarat', '2018-12-28 16:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1394, 39, 'Sarah Hutabarat', '2018-12-31 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1395, 39, 'Sarah Hutabarat', '2018-12-31 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1396, 40, 'Sumardi', '2018-12-03 07:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1397, 40, 'Sumardi', '2018-12-03 07:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1398, 40, 'Sumardi', '2018-12-03 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1399, 40, 'Sumardi', '2018-12-03 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1400, 40, 'Sumardi', '2018-12-04 06:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1401, 40, 'Sumardi', '2018-12-04 06:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1402, 40, 'Sumardi', '2018-12-04 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1403, 40, 'Sumardi', '2018-12-04 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1404, 40, 'Sumardi', '2018-12-05 07:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1405, 40, 'Sumardi', '2018-12-05 07:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1406, 40, 'Sumardi', '2018-12-05 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1407, 40, 'Sumardi', '2018-12-05 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1408, 40, 'Sumardi', '2018-12-05 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1409, 40, 'Sumardi', '2018-12-06 06:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1410, 40, 'Sumardi', '2018-12-06 06:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1411, 40, 'Sumardi', '2018-12-06 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1412, 40, 'Sumardi', '2018-12-06 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1413, 40, 'Sumardi', '2018-12-07 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1414, 40, 'Sumardi', '2018-12-07 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1415, 40, 'Sumardi', '2018-12-07 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1416, 40, 'Sumardi', '2018-12-07 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1417, 40, 'Sumardi', '2018-12-10 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1418, 40, 'Sumardi', '2018-12-10 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1419, 40, 'Sumardi', '2018-12-10 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1420, 40, 'Sumardi', '2018-12-10 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1421, 40, 'Sumardi', '2018-12-10 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1422, 40, 'Sumardi', '2018-12-11 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1423, 40, 'Sumardi', '2018-12-11 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1424, 40, 'Sumardi', '2018-12-11 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1425, 40, 'Sumardi', '2018-12-11 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1426, 40, 'Sumardi', '2018-12-12 06:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1427, 40, 'Sumardi', '2018-12-12 06:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1428, 40, 'Sumardi', '2018-12-12 06:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1429, 40, 'Sumardi', '2018-12-12 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1430, 40, 'Sumardi', '2018-12-12 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1431, 40, 'Sumardi', '2018-12-13 06:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1432, 40, 'Sumardi', '2018-12-13 06:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1433, 40, 'Sumardi', '2018-12-13 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1434, 40, 'Sumardi', '2018-12-13 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1435, 40, 'Sumardi', '2018-12-13 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1436, 40, 'Sumardi', '2018-12-14 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1437, 40, 'Sumardi', '2018-12-14 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1438, 40, 'Sumardi', '2018-12-14 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1439, 40, 'Sumardi', '2018-12-14 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1440, 40, 'Sumardi', '2018-12-14 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1441, 40, 'Sumardi', '2018-12-17 06:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1442, 40, 'Sumardi', '2018-12-17 06:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1443, 40, 'Sumardi', '2018-12-17 06:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1444, 40, 'Sumardi', '2018-12-17 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1445, 40, 'Sumardi', '2018-12-17 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1446, 40, 'Sumardi', '2018-12-18 06:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1447, 40, 'Sumardi', '2018-12-18 06:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1448, 40, 'Sumardi', '2018-12-18 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1449, 40, 'Sumardi', '2018-12-18 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1450, 40, 'Sumardi', '2018-12-21 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1451, 40, 'Sumardi', '2018-12-21 15:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1452, 40, 'Sumardi', '2018-12-21 15:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1453, 40, 'Sumardi', '2018-12-26 09:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1454, 40, 'Sumardi', '2018-12-26 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1455, 40, 'Sumardi', '2018-12-27 06:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1456, 40, 'Sumardi', '2018-12-27 06:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1457, 40, 'Sumardi', '2018-12-27 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1458, 40, 'Sumardi', '2018-12-27 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1459, 40, 'Sumardi', '2018-12-28 06:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1460, 40, 'Sumardi', '2018-12-28 06:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1461, 40, 'Sumardi', '2018-12-28 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1462, 40, 'Sumardi', '2018-12-28 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1463, 40, 'Sumardi', '2018-12-31 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1464, 40, 'Sumardi', '2018-12-31 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1465, 40, 'Sumardi', '2018-12-31 16:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1466, 40, 'Sumardi', '2018-12-31 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1467, 41, 'Krisnawati Haryadi', '2018-12-03 06:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1468, 41, 'Krisnawati Haryadi', '2018-12-03 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1469, 41, 'Krisnawati Haryadi', '2018-12-04 07:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1470, 41, 'Krisnawati Haryadi', '2018-12-04 18:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1471, 41, 'Krisnawati Haryadi', '2018-12-05 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1472, 41, 'Krisnawati Haryadi', '2018-12-05 17:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1473, 41, 'Krisnawati Haryadi', '2018-12-06 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1474, 41, 'Krisnawati Haryadi', '2018-12-06 17:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1475, 41, 'Krisnawati Haryadi', '2018-12-07 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1476, 41, 'Krisnawati Haryadi', '2018-12-07 17:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1477, 44, 'Subki', '2018-12-03 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1478, 44, 'Subki', '2018-12-03 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1479, 44, 'Subki', '2018-12-04 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1480, 44, 'Subki', '2018-12-04 17:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1481, 44, 'Subki', '2018-12-05 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1482, 44, 'Subki', '2018-12-05 17:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1483, 44, 'Subki', '2018-12-06 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1484, 44, 'Subki', '2018-12-06 17:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1485, 44, 'Subki', '2018-12-07 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1486, 44, 'Subki', '2018-12-07 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1487, 44, 'Subki', '2018-12-10 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1488, 44, 'Subki', '2018-12-10 17:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1489, 44, 'Subki', '2018-12-11 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1490, 44, 'Subki', '2018-12-11 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1491, 44, 'Subki', '2018-12-12 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1492, 44, 'Subki', '2018-12-12 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1493, 44, 'Subki', '2018-12-13 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1494, 44, 'Subki', '2018-12-14 08:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1495, 44, 'Subki', '2018-12-17 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1496, 44, 'Subki', '2018-12-17 17:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1497, 44, 'Subki', '2018-12-18 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1498, 44, 'Subki', '2018-12-18 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1499, 44, 'Subki', '2018-12-19 07:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1500, 44, 'Subki', '2018-12-20 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1501, 44, 'Subki', '2018-12-20 17:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1502, 44, 'Subki', '2018-12-21 08:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1503, 44, 'Subki', '2018-12-21 17:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1504, 44, 'Subki', '2018-12-26 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1505, 44, 'Subki', '2018-12-26 17:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1506, 44, 'Subki', '2018-12-27 08:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1507, 44, 'Subki', '2018-12-27 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1508, 44, 'Subki', '2018-12-28 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1509, 44, 'Subki', '2018-12-28 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1510, 44, 'Subki', '2018-12-31 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1511, 44, 'Subki', '2018-12-31 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1512, 45, 'Lishna  N H', '2018-12-03 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1513, 45, 'Lishna  N H', '2018-12-04 07:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1514, 45, 'Lishna  N H', '2018-12-04 17:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1515, 45, 'Lishna  N H', '2018-12-05 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1516, 45, 'Lishna  N H', '2018-12-05 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1517, 45, 'Lishna  N H', '2018-12-07 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1518, 45, 'Lishna  N H', '2018-12-07 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1519, 45, 'Lishna  N H', '2018-12-10 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1520, 45, 'Lishna  N H', '2018-12-10 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1521, 45, 'Lishna  N H', '2018-12-11 07:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1522, 45, 'Lishna  N H', '2018-12-11 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1523, 45, 'Lishna  N H', '2018-12-12 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1524, 45, 'Lishna  N H', '2018-12-12 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1525, 45, 'Lishna  N H', '2018-12-13 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1526, 45, 'Lishna  N H', '2018-12-13 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1527, 45, 'Lishna  N H', '2018-12-14 08:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1528, 45, 'Lishna  N H', '2018-12-14 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1529, 45, 'Lishna  N H', '2018-12-17 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1530, 45, 'Lishna  N H', '2018-12-17 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1531, 45, 'Lishna  N H', '2018-12-18 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1532, 45, 'Lishna  N H', '2018-12-18 17:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1533, 45, 'Lishna  N H', '2018-12-19 16:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1534, 45, 'Lishna  N H', '2018-12-20 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1535, 45, 'Lishna  N H', '2018-12-20 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1536, 45, 'Lishna  N H', '2018-12-21 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1537, 45, 'Lishna  N H', '2018-12-21 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1538, 45, 'Lishna  N H', '2018-12-26 07:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1539, 45, 'Lishna  N H', '2018-12-26 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1540, 45, 'Lishna  N H', '2018-12-27 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1541, 45, 'Lishna  N H', '2018-12-27 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1542, 46, 'Risa M N', '2018-12-03 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1543, 46, 'Risa M N', '2018-12-03 17:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1544, 46, 'Risa M N', '2018-12-06 17:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1545, 46, 'Risa M N', '2018-12-07 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1546, 46, 'Risa M N', '2018-12-07 17:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1547, 46, 'Risa M N', '2018-12-10 06:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1548, 46, 'Risa M N', '2018-12-14 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1549, 46, 'Risa M N', '2018-12-14 18:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1550, 46, 'Risa M N', '2018-12-17 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1551, 46, 'Risa M N', '2018-12-17 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1552, 46, 'Risa M N', '2018-12-18 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1553, 46, 'Risa M N', '2018-12-18 17:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1554, 46, 'Risa M N', '2018-12-19 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1555, 46, 'Risa M N', '2018-12-20 07:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1556, 46, 'Risa M N', '2018-12-20 17:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1557, 46, 'Risa M N', '2018-12-21 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1558, 46, 'Risa M N', '2018-12-21 17:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1559, 46, 'Risa M N', '2018-12-26 06:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1560, 46, 'Risa M N', '2018-12-26 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1561, 46, 'Risa M N', '2018-12-27 07:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1562, 46, 'Risa M N', '2018-12-28 07:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1563, 46, 'Risa M N', '2018-12-31 07:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1564, 46, 'Risa M N', '2018-12-31 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1565, 47, 'Sri Yanto', '2018-12-03 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1566, 47, 'Sri Yanto', '2018-12-03 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1567, 47, 'Sri Yanto', '2018-12-04 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1568, 47, 'Sri Yanto', '2018-12-04 17:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1569, 47, 'Sri Yanto', '2018-12-05 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1570, 47, 'Sri Yanto', '2018-12-05 17:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1571, 47, 'Sri Yanto', '2018-12-06 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1572, 47, 'Sri Yanto', '2018-12-06 17:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1573, 47, 'Sri Yanto', '2018-12-07 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1574, 47, 'Sri Yanto', '2018-12-07 17:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1575, 47, 'Sri Yanto', '2018-12-10 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1576, 47, 'Sri Yanto', '2018-12-10 17:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1577, 47, 'Sri Yanto', '2018-12-11 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1578, 47, 'Sri Yanto', '2018-12-11 17:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1579, 47, 'Sri Yanto', '2018-12-12 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1580, 47, 'Sri Yanto', '2018-12-12 17:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1581, 47, 'Sri Yanto', '2018-12-13 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1582, 47, 'Sri Yanto', '2018-12-13 18:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1583, 47, 'Sri Yanto', '2018-12-14 08:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1584, 47, 'Sri Yanto', '2018-12-14 19:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1585, 47, 'Sri Yanto', '2018-12-18 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1586, 47, 'Sri Yanto', '2018-12-18 17:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1587, 47, 'Sri Yanto', '2018-12-19 08:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1588, 47, 'Sri Yanto', '2018-12-20 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1589, 47, 'Sri Yanto', '2018-12-20 17:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1590, 47, 'Sri Yanto', '2018-12-21 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1591, 47, 'Sri Yanto', '2018-12-21 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1592, 47, 'Sri Yanto', '2018-12-26 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1593, 47, 'Sri Yanto', '2018-12-26 17:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1594, 47, 'Sri Yanto', '2018-12-27 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1595, 47, 'Sri Yanto', '2018-12-27 17:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1596, 47, 'Sri Yanto', '2018-12-28 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1597, 47, 'Sri Yanto', '2018-12-28 18:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1598, 47, 'Sri Yanto', '2018-12-31 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1599, 47, 'Sri Yanto', '2018-12-31 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1600, 48, 'Hernando', '2018-12-03 06:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1601, 48, 'Hernando', '2018-12-03 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1602, 48, 'Hernando', '2018-12-04 06:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1603, 48, 'Hernando', '2018-12-04 17:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1604, 48, 'Hernando', '2018-12-05 06:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1605, 48, 'Hernando', '2018-12-05 18:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1606, 48, 'Hernando', '2018-12-06 06:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1607, 48, 'Hernando', '2018-12-06 17:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1608, 48, 'Hernando', '2018-12-07 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1609, 48, 'Hernando', '2018-12-10 06:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1610, 48, 'Hernando', '2018-12-10 17:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1611, 48, 'Hernando', '2018-12-11 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1612, 48, 'Hernando', '2018-12-12 06:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1613, 48, 'Hernando', '2018-12-12 17:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1614, 48, 'Hernando', '2018-12-13 07:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1615, 48, 'Hernando', '2018-12-13 17:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1616, 48, 'Hernando', '2018-12-14 06:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1617, 48, 'Hernando', '2018-12-14 18:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1618, 48, 'Hernando', '2018-12-17 06:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1619, 48, 'Hernando', '2018-12-17 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1620, 48, 'Hernando', '2018-12-18 06:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1621, 48, 'Hernando', '2018-12-18 17:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1622, 48, 'Hernando', '2018-12-19 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1623, 48, 'Hernando', '2018-12-20 06:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1624, 48, 'Hernando', '2018-12-20 17:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1625, 48, 'Hernando', '2018-12-21 06:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1626, 48, 'Hernando', '2018-12-21 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1627, 48, 'Hernando', '2018-12-28 04:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1628, 48, 'Hernando', '2018-12-28 06:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1629, 48, 'Hernando', '2018-12-28 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1630, 48, 'Hernando', '2018-12-31 06:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1631, 49, 'Iwa Kartiwa', '2018-12-03 06:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1632, 49, 'Iwa Kartiwa', '2018-12-03 17:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1633, 49, 'Iwa Kartiwa', '2018-12-07 04:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1634, 49, 'Iwa Kartiwa', '2018-12-07 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1635, 49, 'Iwa Kartiwa', '2018-12-10 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1636, 49, 'Iwa Kartiwa', '2018-12-10 17:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1637, 49, 'Iwa Kartiwa', '2018-12-11 06:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1638, 49, 'Iwa Kartiwa', '2018-12-11 18:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1639, 49, 'Iwa Kartiwa', '2018-12-12 06:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1640, 49, 'Iwa Kartiwa', '2018-12-12 17:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1641, 49, 'Iwa Kartiwa', '2018-12-12 17:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1642, 49, 'Iwa Kartiwa', '2018-12-13 06:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1643, 49, 'Iwa Kartiwa', '2018-12-13 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1644, 49, 'Iwa Kartiwa', '2018-12-14 06:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1645, 49, 'Iwa Kartiwa', '2018-12-17 05:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1646, 49, 'Iwa Kartiwa', '2018-12-17 20:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1647, 49, 'Iwa Kartiwa', '2018-12-18 07:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1648, 49, 'Iwa Kartiwa', '2018-12-18 17:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1649, 49, 'Iwa Kartiwa', '2018-12-19 07:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1650, 49, 'Iwa Kartiwa', '2018-12-19 18:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1651, 49, 'Iwa Kartiwa', '2018-12-26 02:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1652, 49, 'Iwa Kartiwa', '2018-12-26 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1653, 49, 'Iwa Kartiwa', '2018-12-26 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1654, 49, 'Iwa Kartiwa', '2018-12-26 19:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1655, 49, 'Iwa Kartiwa', '2018-12-27 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1656, 49, 'Iwa Kartiwa', '2018-12-27 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1657, 49, 'Iwa Kartiwa', '2018-12-27 18:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1658, 49, 'Iwa Kartiwa', '2018-12-28 06:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1659, 49, 'Iwa Kartiwa', '2018-12-28 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1660, 50, 'Dini Dewi C', '2018-12-03 07:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1661, 50, 'Dini Dewi C', '2018-12-03 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1662, 50, 'Dini Dewi C', '2018-12-04 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1663, 50, 'Dini Dewi C', '2018-12-04 18:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1664, 50, 'Dini Dewi C', '2018-12-05 07:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1665, 50, 'Dini Dewi C', '2018-12-05 17:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1666, 50, 'Dini Dewi C', '2018-12-06 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1667, 50, 'Dini Dewi C', '2018-12-06 18:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1668, 50, 'Dini Dewi C', '2018-12-07 07:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1669, 50, 'Dini Dewi C', '2018-12-07 18:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1670, 50, 'Dini Dewi C', '2018-12-10 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1671, 50, 'Dini Dewi C', '2018-12-10 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1672, 50, 'Dini Dewi C', '2018-12-11 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1673, 50, 'Dini Dewi C', '2018-12-11 18:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1674, 50, 'Dini Dewi C', '2018-12-12 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1675, 50, 'Dini Dewi C', '2018-12-12 18:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1676, 50, 'Dini Dewi C', '2018-12-17 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1677, 50, 'Dini Dewi C', '2018-12-17 19:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1678, 50, 'Dini Dewi C', '2018-12-18 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1679, 50, 'Dini Dewi C', '2018-12-18 17:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1680, 50, 'Dini Dewi C', '2018-12-19 08:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1681, 50, 'Dini Dewi C', '2018-12-19 18:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1682, 50, 'Dini Dewi C', '2018-12-20 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1683, 50, 'Dini Dewi C', '2018-12-21 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1684, 50, 'Dini Dewi C', '2018-12-26 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1685, 50, 'Dini Dewi C', '2018-12-26 18:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1686, 50, 'Dini Dewi C', '2018-12-27 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1687, 50, 'Dini Dewi C', '2018-12-27 18:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1688, 50, 'Dini Dewi C', '2018-12-28 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1689, 50, 'Dini Dewi C', '2018-12-28 18:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1690, 50, 'Dini Dewi C', '2018-12-31 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1691, 50, 'Dini Dewi C', '2018-12-31 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1692, 51, 'Utama Dianda', '2018-12-03 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1693, 51, 'Utama Dianda', '2018-12-03 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1694, 51, 'Utama Dianda', '2018-12-04 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1695, 51, 'Utama Dianda', '2018-12-04 17:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1696, 51, 'Utama Dianda', '2018-12-05 07:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1697, 51, 'Utama Dianda', '2018-12-05 18:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1698, 51, 'Utama Dianda', '2018-12-06 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1699, 51, 'Utama Dianda', '2018-12-07 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1700, 51, 'Utama Dianda', '2018-12-13 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1701, 51, 'Utama Dianda', '2018-12-13 17:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1702, 51, 'Utama Dianda', '2018-12-14 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1703, 51, 'Utama Dianda', '2018-12-14 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1704, 51, 'Utama Dianda', '2018-12-17 08:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1705, 51, 'Utama Dianda', '2018-12-17 08:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1706, 51, 'Utama Dianda', '2018-12-17 18:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1707, 51, 'Utama Dianda', '2018-12-18 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1708, 51, 'Utama Dianda', '2018-12-21 02:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1709, 51, 'Utama Dianda', '2018-12-26 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1710, 51, 'Utama Dianda', '2018-12-26 18:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1711, 51, 'Utama Dianda', '2018-12-27 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1712, 51, 'Utama Dianda', '2018-12-27 17:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1713, 51, 'Utama Dianda', '2018-12-28 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1714, 51, 'Utama Dianda', '2018-12-31 08:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1715, 51, 'Utama Dianda', '2018-12-31 08:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1716, 51, 'Utama Dianda', '2018-12-31 18:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1717, 52, 'Niko Rahadian', '2018-12-03 09:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1718, 52, 'Niko Rahadian', '2018-12-03 20:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1719, 52, 'Niko Rahadian', '2018-12-04 21:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1720, 52, 'Niko Rahadian', '2018-12-04 21:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1721, 52, 'Niko Rahadian', '2018-12-05 08:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1722, 52, 'Niko Rahadian', '2018-12-06 08:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1723, 52, 'Niko Rahadian', '2018-12-06 20:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1724, 52, 'Niko Rahadian', '2018-12-07 08:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1725, 52, 'Niko Rahadian', '2018-12-07 18:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1726, 52, 'Niko Rahadian', '2018-12-10 03:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1727, 52, 'Niko Rahadian', '2018-12-10 08:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1728, 52, 'Niko Rahadian', '2018-12-10 20:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1729, 52, 'Niko Rahadian', '2018-12-11 08:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1730, 52, 'Niko Rahadian', '2018-12-11 20:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1731, 52, 'Niko Rahadian', '2018-12-12 07:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1732, 52, 'Niko Rahadian', '2018-12-12 07:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1733, 52, 'Niko Rahadian', '2018-12-12 19:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1734, 52, 'Niko Rahadian', '2018-12-13 08:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1735, 52, 'Niko Rahadian', '2018-12-13 20:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1736, 52, 'Niko Rahadian', '2018-12-14 08:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1737, 52, 'Niko Rahadian', '2018-12-14 08:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1738, 52, 'Niko Rahadian', '2018-12-17 08:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1739, 52, 'Niko Rahadian', '2018-12-17 18:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1740, 52, 'Niko Rahadian', '2018-12-18 09:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1741, 52, 'Niko Rahadian', '2018-12-21 02:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1742, 52, 'Niko Rahadian', '2018-12-26 18:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1743, 52, 'Niko Rahadian', '2018-12-27 10:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1744, 52, 'Niko Rahadian', '2018-12-27 17:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1745, 53, 'Supriyono', '2018-12-03 04:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1746, 53, 'Supriyono', '2018-12-03 06:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1747, 53, 'Supriyono', '2018-12-03 19:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1748, 53, 'Supriyono', '2018-12-04 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1749, 53, 'Supriyono', '2018-12-04 20:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1750, 53, 'Supriyono', '2018-12-05 07:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1751, 53, 'Supriyono', '2018-12-05 18:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1752, 53, 'Supriyono', '2018-12-06 07:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1753, 53, 'Supriyono', '2018-12-06 18:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1754, 53, 'Supriyono', '2018-12-06 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1755, 53, 'Supriyono', '2018-12-07 05:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1756, 53, 'Supriyono', '2018-12-07 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1757, 53, 'Supriyono', '2018-12-10 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1758, 53, 'Supriyono', '2018-12-10 20:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1759, 53, 'Supriyono', '2018-12-11 06:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1760, 53, 'Supriyono', '2018-12-11 06:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1761, 53, 'Supriyono', '2018-12-11 18:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1762, 53, 'Supriyono', '2018-12-11 18:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1763, 53, 'Supriyono', '2018-12-12 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1764, 53, 'Supriyono', '2018-12-12 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1765, 53, 'Supriyono', '2018-12-12 18:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1766, 53, 'Supriyono', '2018-12-12 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1767, 53, 'Supriyono', '2018-12-13 06:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1768, 53, 'Supriyono', '2018-12-13 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1769, 53, 'Supriyono', '2018-12-13 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1770, 53, 'Supriyono', '2018-12-14 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1771, 53, 'Supriyono', '2018-12-14 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1772, 53, 'Supriyono', '2018-12-14 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1773, 53, 'Supriyono', '2018-12-17 02:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1774, 53, 'Supriyono', '2018-12-17 05:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1775, 53, 'Supriyono', '2018-12-17 20:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1776, 53, 'Supriyono', '2018-12-18 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1777, 53, 'Supriyono', '2018-12-18 18:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1778, 53, 'Supriyono', '2018-12-19 06:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1779, 53, 'Supriyono', '2018-12-19 06:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1780, 53, 'Supriyono', '2018-12-19 17:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1781, 53, 'Supriyono', '2018-12-19 17:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1782, 53, 'Supriyono', '2018-12-20 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1783, 53, 'Supriyono', '2018-12-20 20:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1784, 53, 'Supriyono', '2018-12-21 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1785, 53, 'Supriyono', '2018-12-21 20:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1786, 53, 'Supriyono', '2018-12-26 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1787, 53, 'Supriyono', '2018-12-26 22:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1788, 53, 'Supriyono', '2018-12-27 00:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1789, 53, 'Supriyono', '2018-12-27 06:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1790, 53, 'Supriyono', '2018-12-27 22:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1791, 53, 'Supriyono', '2018-12-28 06:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1792, 53, 'Supriyono', '2018-12-31 05:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1793, 53, 'Supriyono', '2018-12-31 07:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1794, 53, 'Supriyono', '2018-12-31 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1795, 53, 'Supriyono', '2018-12-31 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1796, 54, 'Hadi Puryanto', '2018-12-03 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1797, 54, 'Hadi Puryanto', '2018-12-03 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1798, 54, 'Hadi Puryanto', '2018-12-04 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1799, 54, 'Hadi Puryanto', '2018-12-04 17:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1800, 54, 'Hadi Puryanto', '2018-12-05 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1801, 54, 'Hadi Puryanto', '2018-12-05 17:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1802, 54, 'Hadi Puryanto', '2018-12-06 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1803, 54, 'Hadi Puryanto', '2018-12-06 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1804, 54, 'Hadi Puryanto', '2018-12-07 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1805, 54, 'Hadi Puryanto', '2018-12-07 16:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1806, 54, 'Hadi Puryanto', '2018-12-10 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1807, 54, 'Hadi Puryanto', '2018-12-10 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1808, 54, 'Hadi Puryanto', '2018-12-11 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1809, 54, 'Hadi Puryanto', '2018-12-11 17:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1810, 54, 'Hadi Puryanto', '2018-12-12 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1811, 54, 'Hadi Puryanto', '2018-12-12 17:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1812, 54, 'Hadi Puryanto', '2018-12-13 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1813, 54, 'Hadi Puryanto', '2018-12-13 17:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1814, 54, 'Hadi Puryanto', '2018-12-14 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1815, 54, 'Hadi Puryanto', '2018-12-14 17:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1816, 54, 'Hadi Puryanto', '2018-12-17 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1817, 54, 'Hadi Puryanto', '2018-12-17 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1818, 54, 'Hadi Puryanto', '2018-12-18 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1819, 54, 'Hadi Puryanto', '2018-12-19 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1820, 54, 'Hadi Puryanto', '2018-12-20 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1821, 54, 'Hadi Puryanto', '2018-12-21 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1822, 54, 'Hadi Puryanto', '2018-12-21 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1823, 55, 'Faiz Zainol L', '2018-12-03 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1824, 55, 'Faiz Zainol L', '2018-12-03 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1825, 55, 'Faiz Zainol L', '2018-12-03 21:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1826, 55, 'Faiz Zainol L', '2018-12-04 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1827, 55, 'Faiz Zainol L', '2018-12-04 22:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1828, 55, 'Faiz Zainol L', '2018-12-05 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1829, 55, 'Faiz Zainol L', '2018-12-05 16:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1830, 55, 'Faiz Zainol L', '2018-12-06 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1831, 55, 'Faiz Zainol L', '2018-12-06 23:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1832, 55, 'Faiz Zainol L', '2018-12-07 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1833, 55, 'Faiz Zainol L', '2018-12-07 22:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1834, 55, 'Faiz Zainol L', '2018-12-10 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1835, 55, 'Faiz Zainol L', '2018-12-10 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1836, 55, 'Faiz Zainol L', '2018-12-11 08:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1837, 55, 'Faiz Zainol L', '2018-12-11 22:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1838, 55, 'Faiz Zainol L', '2018-12-12 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1839, 55, 'Faiz Zainol L', '2018-12-12 22:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1840, 55, 'Faiz Zainol L', '2018-12-13 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1841, 55, 'Faiz Zainol L', '2018-12-13 18:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1842, 55, 'Faiz Zainol L', '2018-12-14 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1843, 55, 'Faiz Zainol L', '2018-12-14 21:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1844, 55, 'Faiz Zainol L', '2018-12-17 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1845, 55, 'Faiz Zainol L', '2018-12-17 22:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1846, 55, 'Faiz Zainol L', '2018-12-18 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1847, 55, 'Faiz Zainol L', '2018-12-18 20:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1848, 55, 'Faiz Zainol L', '2018-12-26 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1849, 55, 'Faiz Zainol L', '2018-12-26 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1850, 55, 'Faiz Zainol L', '2018-12-27 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1851, 55, 'Faiz Zainol L', '2018-12-27 18:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1852, 55, 'Faiz Zainol L', '2018-12-28 08:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1853, 55, 'Faiz Zainol L', '2018-12-28 22:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1854, 55, 'Faiz Zainol L', '2018-12-31 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1855, 55, 'Faiz Zainol L', '2018-12-31 16:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1856, 56, 'Adi P', '2018-12-03 08:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1857, 56, 'Adi P', '2018-12-03 19:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1858, 56, 'Adi P', '2018-12-04 08:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1859, 56, 'Adi P', '2018-12-04 18:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1860, 56, 'Adi P', '2018-12-05 08:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1861, 56, 'Adi P', '2018-12-05 20:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1862, 56, 'Adi P', '2018-12-06 10:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1863, 56, 'Adi P', '2018-12-06 20:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1864, 56, 'Adi P', '2018-12-07 09:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1865, 56, 'Adi P', '2018-12-07 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1866, 56, 'Adi P', '2018-12-07 17:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1867, 56, 'Adi P', '2018-12-07 17:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1868, 56, 'Adi P', '2018-12-10 08:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1869, 56, 'Adi P', '2018-12-10 16:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1870, 56, 'Adi P', '2018-12-11 08:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1871, 56, 'Adi P', '2018-12-11 22:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1872, 56, 'Adi P', '2018-12-12 08:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1873, 56, 'Adi P', '2018-12-12 22:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1874, 56, 'Adi P', '2018-12-13 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1875, 56, 'Adi P', '2018-12-13 23:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1876, 56, 'Adi P', '2018-12-14 10:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1877, 56, 'Adi P', '2018-12-14 20:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1878, 56, 'Adi P', '2018-12-17 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1879, 56, 'Adi P', '2018-12-17 22:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1880, 56, 'Adi P', '2018-12-18 20:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1881, 56, 'Adi P', '2018-12-18 23:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1882, 56, 'Adi P', '2018-12-26 10:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1883, 56, 'Adi P', '2018-12-26 20:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1884, 56, 'Adi P', '2018-12-27 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1885, 56, 'Adi P', '2018-12-27 19:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1886, 56, 'Adi P', '2018-12-28 08:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1887, 56, 'Adi P', '2018-12-28 17:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1888, 56, 'Adi P', '2018-12-30 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1889, 56, 'Adi P', '2018-12-30 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1890, 56, 'Adi P', '2018-12-30 17:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1891, 56, 'Adi P', '2018-12-30 17:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1892, 56, 'Adi P', '2018-12-31 08:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1893, 56, 'Adi P', '2018-12-31 16:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1894, 57, 'Intan Mariani', '2018-12-03 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1895, 57, 'Intan Mariani', '2018-12-03 17:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1896, 57, 'Intan Mariani', '2018-12-04 17:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1897, 57, 'Intan Mariani', '2018-12-05 08:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1898, 57, 'Intan Mariani', '2018-12-05 17:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1899, 57, 'Intan Mariani', '2018-12-06 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1900, 57, 'Intan Mariani', '2018-12-06 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1901, 57, 'Intan Mariani', '2018-12-07 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1902, 57, 'Intan Mariani', '2018-12-07 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1903, 57, 'Intan Mariani', '2018-12-10 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1904, 57, 'Intan Mariani', '2018-12-10 17:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1905, 57, 'Intan Mariani', '2018-12-11 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1906, 57, 'Intan Mariani', '2018-12-13 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1907, 57, 'Intan Mariani', '2018-12-13 17:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1908, 57, 'Intan Mariani', '2018-12-14 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1909, 57, 'Intan Mariani', '2018-12-14 17:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1910, 57, 'Intan Mariani', '2018-12-17 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1911, 57, 'Intan Mariani', '2018-12-17 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1912, 57, 'Intan Mariani', '2018-12-18 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1913, 57, 'Intan Mariani', '2018-12-18 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1914, 57, 'Intan Mariani', '2018-12-18 17:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1915, 57, 'Intan Mariani', '2018-12-20 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1916, 57, 'Intan Mariani', '2018-12-20 18:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1917, 57, 'Intan Mariani', '2018-12-21 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1918, 57, 'Intan Mariani', '2018-12-21 17:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1919, 57, 'Intan Mariani', '2018-12-26 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1920, 57, 'Intan Mariani', '2018-12-26 17:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1921, 57, 'Intan Mariani', '2018-12-27 17:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1922, 57, 'Intan Mariani', '2018-12-28 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1923, 57, 'Intan Mariani', '2018-12-28 17:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1924, 58, 'Andhika', '2018-12-03 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1925, 58, 'Andhika', '2018-12-03 18:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1926, 58, 'Andhika', '2018-12-04 08:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1927, 58, 'Andhika', '2018-12-04 17:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1928, 58, 'Andhika', '2018-12-04 17:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1929, 58, 'Andhika', '2018-12-05 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1930, 58, 'Andhika', '2018-12-05 18:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1931, 58, 'Andhika', '2018-12-06 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1932, 58, 'Andhika', '2018-12-06 18:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1933, 58, 'Andhika', '2018-12-07 08:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1934, 58, 'Andhika', '2018-12-07 18:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1935, 58, 'Andhika', '2018-12-07 18:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1936, 58, 'Andhika', '2018-12-10 06:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1937, 58, 'Andhika', '2018-12-10 20:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1938, 58, 'Andhika', '2018-12-11 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1939, 58, 'Andhika', '2018-12-11 18:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1940, 58, 'Andhika', '2018-12-11 18:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1941, 58, 'Andhika', '2018-12-12 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1942, 58, 'Andhika', '2018-12-12 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1943, 58, 'Andhika', '2018-12-12 20:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1944, 58, 'Andhika', '2018-12-12 20:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1945, 58, 'Andhika', '2018-12-13 18:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1946, 58, 'Andhika', '2018-12-13 18:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1947, 58, 'Andhika', '2018-12-14 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1948, 58, 'Andhika', '2018-12-14 17:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1949, 58, 'Andhika', '2018-12-14 17:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1950, 58, 'Andhika', '2018-12-17 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1951, 58, 'Andhika', '2018-12-17 17:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1952, 58, 'Andhika', '2018-12-18 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1953, 58, 'Andhika', '2018-12-18 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1954, 58, 'Andhika', '2018-12-19 07:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1955, 58, 'Andhika', '2018-12-19 18:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1956, 58, 'Andhika', '2018-12-20 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1957, 58, 'Andhika', '2018-12-20 20:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1958, 58, 'Andhika', '2018-12-21 08:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1959, 58, 'Andhika', '2018-12-21 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1960, 58, 'Andhika', '2018-12-23 00:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1961, 58, 'Andhika', '2018-12-24 14:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1962, 58, 'Andhika', '2018-12-24 14:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1963, 58, 'Andhika', '2018-12-26 08:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1964, 58, 'Andhika', '2018-12-26 18:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1965, 58, 'Andhika', '2018-12-27 08:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1966, 58, 'Andhika', '2018-12-27 18:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1967, 58, 'Andhika', '2018-12-27 18:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1968, 58, 'Andhika', '2018-12-28 08:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1969, 58, 'Andhika', '2018-12-28 17:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1970, 58, 'Andhika', '2018-12-31 18:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1971, 58, 'Andhika', '2018-12-31 18:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1972, 59, 'Endang Setyowati', '2018-12-03 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1973, 59, 'Endang Setyowati', '2018-12-03 18:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1974, 59, 'Endang Setyowati', '2018-12-04 07:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1975, 59, 'Endang Setyowati', '2018-12-04 07:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1976, 59, 'Endang Setyowati', '2018-12-04 18:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1977, 59, 'Endang Setyowati', '2018-12-04 18:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1978, 59, 'Endang Setyowati', '2018-12-05 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1979, 59, 'Endang Setyowati', '2018-12-05 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1980, 59, 'Endang Setyowati', '2018-12-05 17:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1981, 59, 'Endang Setyowati', '2018-12-05 17:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1982, 59, 'Endang Setyowati', '2018-12-06 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1983, 59, 'Endang Setyowati', '2018-12-06 18:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1984, 59, 'Endang Setyowati', '2018-12-06 18:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1985, 59, 'Endang Setyowati', '2018-12-07 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1986, 59, 'Endang Setyowati', '2018-12-07 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1987, 59, 'Endang Setyowati', '2018-12-10 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1988, 59, 'Endang Setyowati', '2018-12-10 18:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1989, 59, 'Endang Setyowati', '2018-12-11 07:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1990, 59, 'Endang Setyowati', '2018-12-11 18:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1991, 59, 'Endang Setyowati', '2018-12-12 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1992, 59, 'Endang Setyowati', '2018-12-12 18:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1993, 59, 'Endang Setyowati', '2018-12-13 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1994, 59, 'Endang Setyowati', '2018-12-13 18:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1995, 59, 'Endang Setyowati', '2018-12-14 17:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1996, 59, 'Endang Setyowati', '2018-12-17 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1997, 59, 'Endang Setyowati', '2018-12-17 17:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1998, 59, 'Endang Setyowati', '2018-12-18 07:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (1999, 59, 'Endang Setyowati', '2018-12-18 18:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2000, 59, 'Endang Setyowati', '2018-12-19 09:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2001, 59, 'Endang Setyowati', '2018-12-19 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2002, 59, 'Endang Setyowati', '2018-12-19 17:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2003, 59, 'Endang Setyowati', '2018-12-20 07:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2004, 59, 'Endang Setyowati', '2018-12-20 18:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2005, 59, 'Endang Setyowati', '2018-12-21 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2006, 59, 'Endang Setyowati', '2018-12-21 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2007, 59, 'Endang Setyowati', '2018-12-26 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2008, 59, 'Endang Setyowati', '2018-12-26 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2009, 59, 'Endang Setyowati', '2018-12-26 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2010, 59, 'Endang Setyowati', '2018-12-28 07:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2011, 59, 'Endang Setyowati', '2018-12-28 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2012, 59, 'Endang Setyowati', '2018-12-31 07:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2013, 59, 'Endang Setyowati', '2018-12-31 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2014, 60, 'Joko Sima', '2018-12-03 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2015, 60, 'Joko Sima', '2018-12-04 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2016, 60, 'Joko Sima', '2018-12-04 17:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2017, 60, 'Joko Sima', '2018-12-05 07:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2018, 60, 'Joko Sima', '2018-12-05 19:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2019, 60, 'Joko Sima', '2018-12-06 06:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2020, 60, 'Joko Sima', '2018-12-06 17:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2021, 60, 'Joko Sima', '2018-12-07 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2022, 60, 'Joko Sima', '2018-12-07 19:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2023, 60, 'Joko Sima', '2018-12-10 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2024, 60, 'Joko Sima', '2018-12-10 17:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2025, 60, 'Joko Sima', '2018-12-11 07:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2026, 60, 'Joko Sima', '2018-12-11 17:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2027, 60, 'Joko Sima', '2018-12-12 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2028, 60, 'Joko Sima', '2018-12-12 19:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2029, 60, 'Joko Sima', '2018-12-13 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2030, 60, 'Joko Sima', '2018-12-13 20:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2031, 60, 'Joko Sima', '2018-12-14 05:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2032, 60, 'Joko Sima', '2018-12-14 05:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2033, 60, 'Joko Sima', '2018-12-14 19:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2034, 60, 'Joko Sima', '2018-12-17 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2035, 60, 'Joko Sima', '2018-12-17 18:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2036, 60, 'Joko Sima', '2018-12-18 08:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2037, 60, 'Joko Sima', '2018-12-18 18:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2038, 60, 'Joko Sima', '2018-12-19 06:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2039, 60, 'Joko Sima', '2018-12-19 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2040, 60, 'Joko Sima', '2018-12-20 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2041, 60, 'Joko Sima', '2018-12-20 20:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2042, 60, 'Joko Sima', '2018-12-21 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2043, 60, 'Joko Sima', '2018-12-21 18:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2044, 61, 'Ari setiawan', '2018-12-03 08:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2045, 61, 'Ari setiawan', '2018-12-04 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2046, 61, 'Ari setiawan', '2018-12-05 08:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2047, 61, 'Ari setiawan', '2018-12-06 08:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2048, 61, 'Ari setiawan', '2018-12-06 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2049, 61, 'Ari setiawan', '2018-12-07 08:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2050, 61, 'Ari setiawan', '2018-12-07 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2051, 61, 'Ari setiawan', '2018-12-10 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2052, 61, 'Ari setiawan', '2018-12-10 17:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2053, 61, 'Ari setiawan', '2018-12-11 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2054, 61, 'Ari setiawan', '2018-12-11 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2055, 61, 'Ari setiawan', '2018-12-12 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2056, 61, 'Ari setiawan', '2018-12-12 17:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2057, 61, 'Ari setiawan', '2018-12-17 08:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2058, 61, 'Ari setiawan', '2018-12-18 17:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2059, 61, 'Ari setiawan', '2018-12-28 08:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2060, 62, 'Aryan Pradipta', '2018-12-03 07:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2061, 63, 'Yorivinna Novita', '2018-12-03 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2062, 63, 'Yorivinna Novita', '2018-12-03 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2063, 63, 'Yorivinna Novita', '2018-12-04 07:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2064, 63, 'Yorivinna Novita', '2018-12-04 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2065, 63, 'Yorivinna Novita', '2018-12-05 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2066, 63, 'Yorivinna Novita', '2018-12-06 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2067, 63, 'Yorivinna Novita', '2018-12-06 17:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2068, 63, 'Yorivinna Novita', '2018-12-07 08:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2069, 63, 'Yorivinna Novita', '2018-12-10 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2070, 63, 'Yorivinna Novita', '2018-12-12 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2071, 63, 'Yorivinna Novita', '2018-12-12 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2072, 63, 'Yorivinna Novita', '2018-12-13 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2073, 63, 'Yorivinna Novita', '2018-12-13 18:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2074, 63, 'Yorivinna Novita', '2018-12-14 07:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2075, 63, 'Yorivinna Novita', '2018-12-14 17:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2076, 63, 'Yorivinna Novita', '2018-12-21 08:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2077, 63, 'Yorivinna Novita', '2018-12-21 16:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2078, 63, 'Yorivinna Novita', '2018-12-26 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2079, 63, 'Yorivinna Novita', '2018-12-26 17:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2080, 63, 'Yorivinna Novita', '2018-12-28 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2081, 63, 'Yorivinna Novita', '2018-12-28 18:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2082, 63, 'Yorivinna Novita', '2018-12-31 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2083, 63, 'Yorivinna Novita', '2018-12-31 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2084, 64, 'Nunik', '2018-12-03 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2085, 64, 'Nunik', '2018-12-03 17:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2086, 64, 'Nunik', '2018-12-04 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2087, 64, 'Nunik', '2018-12-04 17:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2088, 64, 'Nunik', '2018-12-05 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2089, 64, 'Nunik', '2018-12-05 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2090, 64, 'Nunik', '2018-12-06 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2091, 64, 'Nunik', '2018-12-06 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2092, 64, 'Nunik', '2018-12-07 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2093, 64, 'Nunik', '2018-12-07 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2094, 64, 'Nunik', '2018-12-10 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2095, 64, 'Nunik', '2018-12-10 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2096, 64, 'Nunik', '2018-12-11 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2097, 64, 'Nunik', '2018-12-11 16:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2098, 64, 'Nunik', '2018-12-12 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2099, 64, 'Nunik', '2018-12-12 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2100, 64, 'Nunik', '2018-12-13 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2101, 64, 'Nunik', '2018-12-13 17:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2102, 64, 'Nunik', '2018-12-14 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2103, 64, 'Nunik', '2018-12-14 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2104, 64, 'Nunik', '2018-12-17 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2105, 64, 'Nunik', '2018-12-17 17:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2106, 64, 'Nunik', '2018-12-18 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2107, 64, 'Nunik', '2018-12-18 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2108, 64, 'Nunik', '2018-12-19 09:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2109, 64, 'Nunik', '2018-12-19 17:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2110, 64, 'Nunik', '2018-12-20 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2111, 64, 'Nunik', '2018-12-20 17:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2112, 64, 'Nunik', '2018-12-21 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2113, 64, 'Nunik', '2018-12-21 17:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2114, 64, 'Nunik', '2018-12-31 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2115, 64, 'Nunik', '2018-12-31 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2116, 65, 'Cory Dyah F', '2018-12-03 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2117, 65, 'Cory Dyah F', '2018-12-03 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2118, 65, 'Cory Dyah F', '2018-12-04 06:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2119, 65, 'Cory Dyah F', '2018-12-04 17:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2120, 65, 'Cory Dyah F', '2018-12-05 18:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2121, 65, 'Cory Dyah F', '2018-12-06 17:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2122, 65, 'Cory Dyah F', '2018-12-07 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2123, 65, 'Cory Dyah F', '2018-12-13 05:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2124, 65, 'Cory Dyah F', '2018-12-13 18:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2125, 65, 'Cory Dyah F', '2018-12-17 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2126, 65, 'Cory Dyah F', '2018-12-18 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2127, 65, 'Cory Dyah F', '2018-12-19 09:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2128, 65, 'Cory Dyah F', '2018-12-19 16:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2129, 65, 'Cory Dyah F', '2018-12-20 08:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2130, 65, 'Cory Dyah F', '2018-12-20 17:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2131, 65, 'Cory Dyah F', '2018-12-26 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2132, 65, 'Cory Dyah F', '2018-12-26 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2133, 65, 'Cory Dyah F', '2018-12-27 07:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2134, 65, 'Cory Dyah F', '2018-12-27 16:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2135, 65, 'Cory Dyah F', '2018-12-28 06:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2136, 65, 'Cory Dyah F', '2018-12-28 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2137, 66, 'Ratna CANTIKKK', '2018-12-03 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2138, 66, 'Ratna CANTIKKK', '2018-12-03 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2139, 66, 'Ratna CANTIKKK', '2018-12-03 16:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2140, 66, 'Ratna CANTIKKK', '2018-12-04 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2141, 66, 'Ratna CANTIKKK', '2018-12-04 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2142, 66, 'Ratna CANTIKKK', '2018-12-04 17:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2143, 66, 'Ratna CANTIKKK', '2018-12-05 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2144, 66, 'Ratna CANTIKKK', '2018-12-06 17:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2145, 66, 'Ratna CANTIKKK', '2018-12-06 17:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2146, 66, 'Ratna CANTIKKK', '2018-12-07 17:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2147, 66, 'Ratna CANTIKKK', '2018-12-07 17:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2148, 66, 'Ratna CANTIKKK', '2018-12-07 17:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2149, 66, 'Ratna CANTIKKK', '2018-12-07 17:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2150, 66, 'Ratna CANTIKKK', '2018-12-10 17:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2151, 66, 'Ratna CANTIKKK', '2018-12-10 17:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2152, 66, 'Ratna CANTIKKK', '2018-12-11 17:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2153, 66, 'Ratna CANTIKKK', '2018-12-19 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2154, 66, 'Ratna CANTIKKK', '2018-12-20 08:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2155, 66, 'Ratna CANTIKKK', '2018-12-26 17:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2156, 66, 'Ratna CANTIKKK', '2018-12-26 17:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2157, 66, 'Ratna CANTIKKK', '2018-12-27 17:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2158, 66, 'Ratna CANTIKKK', '2018-12-27 17:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2159, 67, 'Iputu juli', '2018-12-01 15:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2160, 67, 'Iputu juli', '2018-12-03 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2161, 67, 'Iputu juli', '2018-12-03 17:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2162, 67, 'Iputu juli', '2018-12-04 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2163, 67, 'Iputu juli', '2018-12-04 17:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2164, 67, 'Iputu juli', '2018-12-04 17:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2165, 67, 'Iputu juli', '2018-12-04 17:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2166, 67, 'Iputu juli', '2018-12-05 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2167, 67, 'Iputu juli', '2018-12-05 19:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2168, 67, 'Iputu juli', '2018-12-06 08:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2169, 67, 'Iputu juli', '2018-12-06 18:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2170, 67, 'Iputu juli', '2018-12-07 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2171, 67, 'Iputu juli', '2018-12-07 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2172, 67, 'Iputu juli', '2018-12-09 11:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2173, 67, 'Iputu juli', '2018-12-10 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2174, 67, 'Iputu juli', '2018-12-10 17:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2175, 67, 'Iputu juli', '2018-12-11 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2176, 67, 'Iputu juli', '2018-12-11 18:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2177, 67, 'Iputu juli', '2018-12-12 08:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2178, 67, 'Iputu juli', '2018-12-13 08:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2179, 67, 'Iputu juli', '2018-12-13 18:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2180, 67, 'Iputu juli', '2018-12-13 18:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2181, 67, 'Iputu juli', '2018-12-14 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2182, 67, 'Iputu juli', '2018-12-17 07:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2183, 67, 'Iputu juli', '2018-12-17 17:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2184, 67, 'Iputu juli', '2018-12-18 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2185, 67, 'Iputu juli', '2018-12-18 17:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2186, 67, 'Iputu juli', '2018-12-19 17:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2187, 67, 'Iputu juli', '2018-12-20 08:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2188, 67, 'Iputu juli', '2018-12-20 18:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2189, 67, 'Iputu juli', '2018-12-21 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2190, 67, 'Iputu juli', '2018-12-21 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2191, 67, 'Iputu juli', '2018-12-22 08:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2192, 67, 'Iputu juli', '2018-12-22 17:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2193, 67, 'Iputu juli', '2018-12-23 13:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2194, 67, 'Iputu juli', '2018-12-31 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2195, 67, 'Iputu juli', '2018-12-31 17:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2196, 69, 'Atika A', '2018-12-03 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2197, 69, 'Atika A', '2018-12-03 19:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2198, 69, 'Atika A', '2018-12-04 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2199, 69, 'Atika A', '2018-12-04 21:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2200, 69, 'Atika A', '2018-12-04 21:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2201, 69, 'Atika A', '2018-12-06 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2202, 69, 'Atika A', '2018-12-06 19:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2203, 69, 'Atika A', '2018-12-07 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2204, 69, 'Atika A', '2018-12-07 18:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2205, 69, 'Atika A', '2018-12-10 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2206, 69, 'Atika A', '2018-12-10 19:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2207, 69, 'Atika A', '2018-12-11 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2208, 69, 'Atika A', '2018-12-11 19:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2209, 69, 'Atika A', '2018-12-12 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2210, 69, 'Atika A', '2018-12-12 16:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2211, 69, 'Atika A', '2018-12-13 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2212, 69, 'Atika A', '2018-12-13 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2213, 69, 'Atika A', '2018-12-14 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2214, 69, 'Atika A', '2018-12-14 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2215, 69, 'Atika A', '2018-12-17 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2216, 69, 'Atika A', '2018-12-17 19:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2217, 69, 'Atika A', '2018-12-18 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2218, 69, 'Atika A', '2018-12-18 17:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2219, 69, 'Atika A', '2018-12-19 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2220, 69, 'Atika A', '2018-12-19 17:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2221, 69, 'Atika A', '2018-12-20 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2222, 69, 'Atika A', '2018-12-20 17:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2223, 69, 'Atika A', '2018-12-21 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2224, 69, 'Atika A', '2018-12-21 17:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2225, 69, 'Atika A', '2018-12-26 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2226, 69, 'Atika A', '2018-12-26 17:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2227, 69, 'Atika A', '2018-12-27 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2228, 69, 'Atika A', '2018-12-27 17:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2229, 69, 'Atika A', '2018-12-28 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2230, 69, 'Atika A', '2018-12-28 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2231, 69, 'Atika A', '2018-12-31 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2232, 70, 'Syaiful', '2018-12-03 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2233, 70, 'Syaiful', '2018-12-03 17:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2234, 70, 'Syaiful', '2018-12-04 08:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2235, 70, 'Syaiful', '2018-12-04 18:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2236, 70, 'Syaiful', '2018-12-05 08:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2237, 70, 'Syaiful', '2018-12-05 18:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2238, 70, 'Syaiful', '2018-12-06 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2239, 70, 'Syaiful', '2018-12-07 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2240, 70, 'Syaiful', '2018-12-10 08:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2241, 70, 'Syaiful', '2018-12-10 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2242, 70, 'Syaiful', '2018-12-11 17:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2243, 70, 'Syaiful', '2018-12-12 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2244, 70, 'Syaiful', '2018-12-13 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2245, 70, 'Syaiful', '2018-12-13 19:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2246, 70, 'Syaiful', '2018-12-14 08:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2247, 70, 'Syaiful', '2018-12-14 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2248, 70, 'Syaiful', '2018-12-17 19:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2249, 70, 'Syaiful', '2018-12-18 19:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2250, 70, 'Syaiful', '2018-12-20 20:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2251, 70, 'Syaiful', '2018-12-26 17:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2252, 70, 'Syaiful', '2018-12-27 17:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2253, 70, 'Syaiful', '2018-12-28 17:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2254, 70, 'Syaiful', '2018-12-31 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2255, 72, 'Sobri', '2018-12-03 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2256, 72, 'Sobri', '2018-12-03 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2257, 72, 'Sobri', '2018-12-04 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2258, 72, 'Sobri', '2018-12-04 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2259, 72, 'Sobri', '2018-12-05 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2260, 72, 'Sobri', '2018-12-05 16:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2261, 72, 'Sobri', '2018-12-06 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2262, 72, 'Sobri', '2018-12-06 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2263, 72, 'Sobri', '2018-12-07 17:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2264, 72, 'Sobri', '2018-12-10 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2265, 72, 'Sobri', '2018-12-10 19:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2266, 72, 'Sobri', '2018-12-11 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2267, 72, 'Sobri', '2018-12-11 18:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2268, 72, 'Sobri', '2018-12-12 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2269, 72, 'Sobri', '2018-12-12 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2270, 72, 'Sobri', '2018-12-13 18:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2271, 72, 'Sobri', '2018-12-14 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2272, 72, 'Sobri', '2018-12-14 18:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2273, 72, 'Sobri', '2018-12-17 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2274, 72, 'Sobri', '2018-12-17 17:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2275, 72, 'Sobri', '2018-12-18 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2276, 72, 'Sobri', '2018-12-18 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2277, 72, 'Sobri', '2018-12-19 18:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2278, 72, 'Sobri', '2018-12-20 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2279, 72, 'Sobri', '2018-12-20 18:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2280, 72, 'Sobri', '2018-12-21 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2281, 72, 'Sobri', '2018-12-21 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2282, 72, 'Sobri', '2018-12-26 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2283, 72, 'Sobri', '2018-12-26 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2284, 72, 'Sobri', '2018-12-27 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2285, 72, 'Sobri', '2018-12-27 18:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2286, 72, 'Sobri', '2018-12-28 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2287, 72, 'Sobri', '2018-12-28 18:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2288, 72, 'Sobri', '2018-12-31 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2289, 72, 'Sobri', '2018-12-31 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2290, 73, 'Sugianto', '2018-12-06 17:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2291, 74, 'Arie S Mulia', '2018-12-06 05:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2292, 74, 'Arie S Mulia', '2018-12-06 05:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2293, 74, 'Arie S Mulia', '2018-12-06 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2294, 74, 'Arie S Mulia', '2018-12-06 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2295, 74, 'Arie S Mulia', '2018-12-07 05:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2296, 74, 'Arie S Mulia', '2018-12-07 05:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2297, 74, 'Arie S Mulia', '2018-12-07 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2298, 74, 'Arie S Mulia', '2018-12-07 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2299, 74, 'Arie S Mulia', '2018-12-10 05:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2300, 74, 'Arie S Mulia', '2018-12-10 05:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2301, 74, 'Arie S Mulia', '2018-12-10 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2302, 74, 'Arie S Mulia', '2018-12-10 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2303, 74, 'Arie S Mulia', '2018-12-11 05:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2304, 74, 'Arie S Mulia', '2018-12-11 05:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2305, 74, 'Arie S Mulia', '2018-12-11 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2306, 74, 'Arie S Mulia', '2018-12-11 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2307, 74, 'Arie S Mulia', '2018-12-12 05:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2308, 74, 'Arie S Mulia', '2018-12-12 05:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2309, 74, 'Arie S Mulia', '2018-12-12 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2310, 74, 'Arie S Mulia', '2018-12-12 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2311, 74, 'Arie S Mulia', '2018-12-13 06:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2312, 74, 'Arie S Mulia', '2018-12-13 06:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2313, 74, 'Arie S Mulia', '2018-12-13 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2314, 74, 'Arie S Mulia', '2018-12-13 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2315, 74, 'Arie S Mulia', '2018-12-14 05:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2316, 74, 'Arie S Mulia', '2018-12-14 05:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2317, 74, 'Arie S Mulia', '2018-12-17 05:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2318, 74, 'Arie S Mulia', '2018-12-17 05:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2319, 74, 'Arie S Mulia', '2018-12-17 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2320, 74, 'Arie S Mulia', '2018-12-17 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2321, 74, 'Arie S Mulia', '2018-12-18 05:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2322, 74, 'Arie S Mulia', '2018-12-18 05:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2323, 74, 'Arie S Mulia', '2018-12-18 16:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2324, 74, 'Arie S Mulia', '2018-12-18 16:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2325, 74, 'Arie S Mulia', '2018-12-18 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2326, 74, 'Arie S Mulia', '2018-12-18 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2327, 74, 'Arie S Mulia', '2018-12-19 09:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2328, 74, 'Arie S Mulia', '2018-12-19 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2329, 74, 'Arie S Mulia', '2018-12-19 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2330, 74, 'Arie S Mulia', '2018-12-20 05:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2331, 74, 'Arie S Mulia', '2018-12-20 05:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2332, 74, 'Arie S Mulia', '2018-12-20 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2333, 74, 'Arie S Mulia', '2018-12-20 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2334, 74, 'Arie S Mulia', '2018-12-21 05:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2335, 74, 'Arie S Mulia', '2018-12-21 05:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2336, 74, 'Arie S Mulia', '2018-12-21 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2337, 74, 'Arie S Mulia', '2018-12-21 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2338, 74, 'Arie S Mulia', '2018-12-26 06:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2339, 74, 'Arie S Mulia', '2018-12-26 06:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2340, 74, 'Arie S Mulia', '2018-12-26 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2341, 74, 'Arie S Mulia', '2018-12-26 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2342, 74, 'Arie S Mulia', '2018-12-28 05:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2343, 74, 'Arie S Mulia', '2018-12-28 05:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2344, 74, 'Arie S Mulia', '2018-12-28 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2345, 74, 'Arie S Mulia', '2018-12-28 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2346, 75, 'Rifan', '2018-12-03 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2347, 75, 'Rifan', '2018-12-03 18:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2348, 75, 'Rifan', '2018-12-04 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2349, 75, 'Rifan', '2018-12-04 19:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2350, 75, 'Rifan', '2018-12-05 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2351, 75, 'Rifan', '2018-12-05 17:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2352, 75, 'Rifan', '2018-12-06 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2353, 75, 'Rifan', '2018-12-06 17:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2354, 75, 'Rifan', '2018-12-07 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2355, 75, 'Rifan', '2018-12-07 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2356, 75, 'Rifan', '2018-12-10 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2357, 75, 'Rifan', '2018-12-10 19:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2358, 75, 'Rifan', '2018-12-11 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2359, 75, 'Rifan', '2018-12-11 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2360, 75, 'Rifan', '2018-12-12 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2361, 75, 'Rifan', '2018-12-12 17:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2362, 75, 'Rifan', '2018-12-14 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2363, 75, 'Rifan', '2018-12-14 19:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2364, 75, 'Rifan', '2018-12-17 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2365, 75, 'Rifan', '2018-12-18 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2366, 75, 'Rifan', '2018-12-20 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2367, 75, 'Rifan', '2018-12-20 20:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2368, 75, 'Rifan', '2018-12-21 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2369, 75, 'Rifan', '2018-12-21 17:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2370, 75, 'Rifan', '2018-12-26 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2371, 75, 'Rifan', '2018-12-26 19:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2372, 75, 'Rifan', '2018-12-27 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2373, 75, 'Rifan', '2018-12-27 17:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2374, 75, 'Rifan', '2018-12-28 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2375, 75, 'Rifan', '2018-12-28 18:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2376, 75, 'Rifan', '2018-12-31 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2377, 75, 'Rifan', '2018-12-31 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2378, 76, 'Pohan', '2018-12-03 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2379, 76, 'Pohan', '2018-12-03 18:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2380, 76, 'Pohan', '2018-12-04 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2381, 76, 'Pohan', '2018-12-04 19:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2382, 76, 'Pohan', '2018-12-05 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2383, 76, 'Pohan', '2018-12-07 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2384, 76, 'Pohan', '2018-12-07 19:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2385, 76, 'Pohan', '2018-12-11 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2386, 76, 'Pohan', '2018-12-11 20:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2387, 76, 'Pohan', '2018-12-12 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2388, 76, 'Pohan', '2018-12-12 20:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2389, 76, 'Pohan', '2018-12-13 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2390, 76, 'Pohan', '2018-12-13 18:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2391, 76, 'Pohan', '2018-12-14 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2392, 76, 'Pohan', '2018-12-14 18:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2393, 76, 'Pohan', '2018-12-17 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2394, 76, 'Pohan', '2018-12-17 19:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2395, 76, 'Pohan', '2018-12-18 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2396, 76, 'Pohan', '2018-12-20 06:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2397, 76, 'Pohan', '2018-12-21 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2398, 76, 'Pohan', '2018-12-21 19:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2399, 76, 'Pohan', '2018-12-27 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2400, 76, 'Pohan', '2018-12-28 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2401, 76, 'Pohan', '2018-12-31 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2402, 77, 'Zulkifli M', '2018-12-03 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2403, 77, 'Zulkifli M', '2018-12-03 19:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2404, 77, 'Zulkifli M', '2018-12-04 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2405, 77, 'Zulkifli M', '2018-12-04 19:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2406, 77, 'Zulkifli M', '2018-12-05 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2407, 77, 'Zulkifli M', '2018-12-05 19:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2408, 77, 'Zulkifli M', '2018-12-06 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2409, 77, 'Zulkifli M', '2018-12-06 21:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2410, 77, 'Zulkifli M', '2018-12-07 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2411, 77, 'Zulkifli M', '2018-12-07 19:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2412, 77, 'Zulkifli M', '2018-12-10 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2413, 77, 'Zulkifli M', '2018-12-10 19:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2414, 77, 'Zulkifli M', '2018-12-11 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2415, 77, 'Zulkifli M', '2018-12-11 20:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2416, 77, 'Zulkifli M', '2018-12-12 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2417, 77, 'Zulkifli M', '2018-12-12 20:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2418, 77, 'Zulkifli M', '2018-12-13 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2419, 77, 'Zulkifli M', '2018-12-13 20:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2420, 77, 'Zulkifli M', '2018-12-14 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2421, 77, 'Zulkifli M', '2018-12-14 19:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2422, 77, 'Zulkifli M', '2018-12-14 19:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2423, 77, 'Zulkifli M', '2018-12-20 09:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2424, 77, 'Zulkifli M', '2018-12-20 20:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2425, 77, 'Zulkifli M', '2018-12-21 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2426, 77, 'Zulkifli M', '2018-12-21 18:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2427, 77, 'Zulkifli M', '2018-12-26 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2428, 77, 'Zulkifli M', '2018-12-26 19:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2429, 77, 'Zulkifli M', '2018-12-27 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2430, 77, 'Zulkifli M', '2018-12-27 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2431, 78, 'Susi Ringoringo', '2018-12-03 06:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2432, 78, 'Susi Ringoringo', '2018-12-03 18:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2433, 78, 'Susi Ringoringo', '2018-12-04 06:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2434, 78, 'Susi Ringoringo', '2018-12-04 19:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2435, 78, 'Susi Ringoringo', '2018-12-05 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2436, 78, 'Susi Ringoringo', '2018-12-05 18:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2437, 78, 'Susi Ringoringo', '2018-12-06 07:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2438, 78, 'Susi Ringoringo', '2018-12-06 17:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2439, 78, 'Susi Ringoringo', '2018-12-07 06:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2440, 78, 'Susi Ringoringo', '2018-12-07 06:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2441, 78, 'Susi Ringoringo', '2018-12-07 22:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2442, 78, 'Susi Ringoringo', '2018-12-10 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2443, 78, 'Susi Ringoringo', '2018-12-10 19:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2444, 78, 'Susi Ringoringo', '2018-12-11 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2445, 78, 'Susi Ringoringo', '2018-12-11 18:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2446, 78, 'Susi Ringoringo', '2018-12-12 06:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2447, 78, 'Susi Ringoringo', '2018-12-12 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2448, 78, 'Susi Ringoringo', '2018-12-13 07:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2449, 78, 'Susi Ringoringo', '2018-12-13 18:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2450, 78, 'Susi Ringoringo', '2018-12-14 07:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2451, 78, 'Susi Ringoringo', '2018-12-14 21:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2452, 78, 'Susi Ringoringo', '2018-12-17 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2453, 78, 'Susi Ringoringo', '2018-12-17 17:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2454, 78, 'Susi Ringoringo', '2018-12-18 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2455, 78, 'Susi Ringoringo', '2018-12-18 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2456, 78, 'Susi Ringoringo', '2018-12-18 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2457, 78, 'Susi Ringoringo', '2018-12-19 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2458, 78, 'Susi Ringoringo', '2018-12-19 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2459, 78, 'Susi Ringoringo', '2018-12-20 07:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2460, 78, 'Susi Ringoringo', '2018-12-20 18:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2461, 78, 'Susi Ringoringo', '2018-12-21 06:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2462, 78, 'Susi Ringoringo', '2018-12-21 18:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2463, 78, 'Susi Ringoringo', '2018-12-26 08:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2464, 78, 'Susi Ringoringo', '2018-12-26 17:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2465, 78, 'Susi Ringoringo', '2018-12-27 06:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2466, 78, 'Susi Ringoringo', '2018-12-27 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2467, 79, 'Nugroho P A', '2018-12-03 07:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2468, 79, 'Nugroho P A', '2018-12-03 19:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2469, 79, 'Nugroho P A', '2018-12-04 07:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2470, 79, 'Nugroho P A', '2018-12-04 07:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2471, 79, 'Nugroho P A', '2018-12-04 17:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2472, 79, 'Nugroho P A', '2018-12-05 06:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2473, 79, 'Nugroho P A', '2018-12-05 17:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2474, 79, 'Nugroho P A', '2018-12-05 18:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2475, 79, 'Nugroho P A', '2018-12-06 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2476, 79, 'Nugroho P A', '2018-12-06 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2477, 79, 'Nugroho P A', '2018-12-06 19:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2478, 79, 'Nugroho P A', '2018-12-06 19:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2479, 79, 'Nugroho P A', '2018-12-07 05:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2480, 79, 'Nugroho P A', '2018-12-07 17:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2481, 79, 'Nugroho P A', '2018-12-10 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2482, 79, 'Nugroho P A', '2018-12-10 19:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2483, 79, 'Nugroho P A', '2018-12-10 20:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2484, 79, 'Nugroho P A', '2018-12-11 07:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2485, 79, 'Nugroho P A', '2018-12-11 23:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2486, 79, 'Nugroho P A', '2018-12-12 20:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2487, 79, 'Nugroho P A', '2018-12-12 22:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2488, 79, 'Nugroho P A', '2018-12-13 06:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2489, 79, 'Nugroho P A', '2018-12-13 20:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2490, 79, 'Nugroho P A', '2018-12-13 22:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2491, 79, 'Nugroho P A', '2018-12-14 06:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2492, 79, 'Nugroho P A', '2018-12-14 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2493, 79, 'Nugroho P A', '2018-12-17 06:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2494, 79, 'Nugroho P A', '2018-12-17 19:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2495, 79, 'Nugroho P A', '2018-12-18 07:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2496, 79, 'Nugroho P A', '2018-12-18 20:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2497, 79, 'Nugroho P A', '2018-12-19 07:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2498, 79, 'Nugroho P A', '2018-12-19 18:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2499, 79, 'Nugroho P A', '2018-12-20 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2500, 79, 'Nugroho P A', '2018-12-21 07:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2501, 79, 'Nugroho P A', '2018-12-21 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2502, 79, 'Nugroho P A', '2018-12-21 17:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2503, 79, 'Nugroho P A', '2018-12-26 12:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2504, 79, 'Nugroho P A', '2018-12-26 17:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2505, 79, 'Nugroho P A', '2018-12-27 06:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2506, 79, 'Nugroho P A', '2018-12-27 19:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2507, 79, 'Nugroho P A', '2018-12-28 05:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2508, 79, 'Nugroho P A', '2018-12-31 06:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2509, 79, 'Nugroho P A', '2018-12-31 20:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2510, 80, 'Monisa', '2018-12-03 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2511, 80, 'Monisa', '2018-12-03 20:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2512, 80, 'Monisa', '2018-12-04 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2513, 80, 'Monisa', '2018-12-04 22:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2514, 80, 'Monisa', '2018-12-05 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2515, 80, 'Monisa', '2018-12-05 21:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2516, 80, 'Monisa', '2018-12-06 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2517, 80, 'Monisa', '2018-12-06 19:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2518, 80, 'Monisa', '2018-12-06 19:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2519, 80, 'Monisa', '2018-12-07 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2520, 80, 'Monisa', '2018-12-07 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2521, 80, 'Monisa', '2018-12-07 19:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2522, 80, 'Monisa', '2018-12-10 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2523, 80, 'Monisa', '2018-12-10 20:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2524, 80, 'Monisa', '2018-12-11 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2525, 80, 'Monisa', '2018-12-11 20:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2526, 80, 'Monisa', '2018-12-12 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2527, 80, 'Monisa', '2018-12-12 21:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2528, 80, 'Monisa', '2018-12-13 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2529, 80, 'Monisa', '2018-12-13 21:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2530, 80, 'Monisa', '2018-12-14 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2531, 80, 'Monisa', '2018-12-14 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2532, 80, 'Monisa', '2018-12-17 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2533, 80, 'Monisa', '2018-12-17 19:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2534, 80, 'Monisa', '2018-12-18 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2535, 80, 'Monisa', '2018-12-18 18:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2536, 80, 'Monisa', '2018-12-19 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2537, 80, 'Monisa', '2018-12-19 17:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2538, 80, 'Monisa', '2018-12-26 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2539, 80, 'Monisa', '2018-12-26 18:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2540, 80, 'Monisa', '2018-12-27 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2541, 80, 'Monisa', '2018-12-28 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2542, 80, 'Monisa', '2018-12-28 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2543, 81, 'Iwan s', '2018-12-03 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2544, 81, 'Iwan s', '2018-12-03 19:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2545, 81, 'Iwan s', '2018-12-04 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2546, 81, 'Iwan s', '2018-12-04 18:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2547, 81, 'Iwan s', '2018-12-05 07:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2548, 81, 'Iwan s', '2018-12-05 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2549, 81, 'Iwan s', '2018-12-07 07:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2550, 81, 'Iwan s', '2018-12-07 19:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2551, 81, 'Iwan s', '2018-12-10 06:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2552, 81, 'Iwan s', '2018-12-10 19:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2553, 81, 'Iwan s', '2018-12-11 07:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2554, 81, 'Iwan s', '2018-12-11 21:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2555, 81, 'Iwan s', '2018-12-12 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2556, 81, 'Iwan s', '2018-12-12 19:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2557, 81, 'Iwan s', '2018-12-13 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2558, 81, 'Iwan s', '2018-12-13 19:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2559, 81, 'Iwan s', '2018-12-14 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2560, 81, 'Iwan s', '2018-12-14 19:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2561, 81, 'Iwan s', '2018-12-17 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2562, 81, 'Iwan s', '2018-12-17 19:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2563, 81, 'Iwan s', '2018-12-18 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2564, 81, 'Iwan s', '2018-12-18 20:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2565, 81, 'Iwan s', '2018-12-26 07:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2566, 81, 'Iwan s', '2018-12-26 19:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2567, 81, 'Iwan s', '2018-12-27 07:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2568, 81, 'Iwan s', '2018-12-27 20:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2569, 81, 'Iwan s', '2018-12-28 07:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2570, 81, 'Iwan s', '2018-12-28 19:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2571, 82, 'Diki a', '2018-12-03 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2572, 82, 'Diki a', '2018-12-03 18:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2573, 82, 'Diki a', '2018-12-04 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2574, 82, 'Diki a', '2018-12-04 18:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2575, 82, 'Diki a', '2018-12-05 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2576, 82, 'Diki a', '2018-12-05 18:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2577, 82, 'Diki a', '2018-12-06 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2578, 82, 'Diki a', '2018-12-06 16:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2579, 82, 'Diki a', '2018-12-07 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2580, 82, 'Diki a', '2018-12-07 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2581, 82, 'Diki a', '2018-12-10 00:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2582, 82, 'Diki a', '2018-12-10 01:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2583, 82, 'Diki a', '2018-12-10 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2584, 82, 'Diki a', '2018-12-10 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2585, 82, 'Diki a', '2018-12-11 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2586, 82, 'Diki a', '2018-12-11 18:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2587, 82, 'Diki a', '2018-12-12 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2588, 82, 'Diki a', '2018-12-12 18:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2589, 82, 'Diki a', '2018-12-13 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2590, 82, 'Diki a', '2018-12-13 17:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2591, 82, 'Diki a', '2018-12-26 07:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2592, 82, 'Diki a', '2018-12-26 18:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2593, 82, 'Diki a', '2018-12-27 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2594, 82, 'Diki a', '2018-12-27 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2595, 82, 'Diki a', '2018-12-28 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2596, 82, 'Diki a', '2018-12-28 16:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2597, 82, 'Diki a', '2018-12-28 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2598, 82, 'Diki a', '2018-12-31 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2599, 82, 'Diki a', '2018-12-31 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2600, 83, 'Jani', '2018-12-03 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2601, 83, 'Jani', '2018-12-03 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2602, 83, 'Jani', '2018-12-04 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2603, 83, 'Jani', '2018-12-04 16:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2604, 83, 'Jani', '2018-12-04 16:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2605, 83, 'Jani', '2018-12-05 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2606, 83, 'Jani', '2018-12-05 17:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2607, 83, 'Jani', '2018-12-06 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2608, 83, 'Jani', '2018-12-06 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2609, 83, 'Jani', '2018-12-07 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2610, 83, 'Jani', '2018-12-07 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2611, 83, 'Jani', '2018-12-10 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2612, 83, 'Jani', '2018-12-10 19:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2613, 83, 'Jani', '2018-12-11 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2614, 83, 'Jani', '2018-12-11 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2615, 83, 'Jani', '2018-12-12 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2616, 83, 'Jani', '2018-12-12 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2617, 83, 'Jani', '2018-12-13 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2618, 83, 'Jani', '2018-12-13 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2619, 83, 'Jani', '2018-12-14 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2620, 83, 'Jani', '2018-12-14 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2621, 83, 'Jani', '2018-12-17 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2622, 83, 'Jani', '2018-12-17 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2623, 83, 'Jani', '2018-12-18 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2624, 83, 'Jani', '2018-12-18 17:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2625, 83, 'Jani', '2018-12-20 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2626, 83, 'Jani', '2018-12-20 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2627, 83, 'Jani', '2018-12-21 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2628, 83, 'Jani', '2018-12-21 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2629, 83, 'Jani', '2018-12-26 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2630, 83, 'Jani', '2018-12-26 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2631, 84, 'Heri afandi', '2018-12-03 08:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2632, 84, 'Heri afandi', '2018-12-03 19:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2633, 84, 'Heri afandi', '2018-12-04 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2634, 84, 'Heri afandi', '2018-12-04 17:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2635, 84, 'Heri afandi', '2018-12-10 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2636, 84, 'Heri afandi', '2018-12-10 18:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2637, 84, 'Heri afandi', '2018-12-11 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2638, 84, 'Heri afandi', '2018-12-11 18:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2639, 84, 'Heri afandi', '2018-12-12 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2640, 84, 'Heri afandi', '2018-12-12 18:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2641, 84, 'Heri afandi', '2018-12-13 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2642, 84, 'Heri afandi', '2018-12-13 18:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2643, 84, 'Heri afandi', '2018-12-14 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2644, 84, 'Heri afandi', '2018-12-14 17:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2645, 84, 'Heri afandi', '2018-12-17 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2646, 84, 'Heri afandi', '2018-12-17 17:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2647, 84, 'Heri afandi', '2018-12-18 17:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2648, 84, 'Heri afandi', '2018-12-20 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2649, 84, 'Heri afandi', '2018-12-21 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2650, 84, 'Heri afandi', '2018-12-26 07:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2651, 84, 'Heri afandi', '2018-12-27 12:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2652, 84, 'Heri afandi', '2018-12-27 20:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2653, 84, 'Heri afandi', '2018-12-28 06:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2654, 84, 'Heri afandi', '2018-12-31 05:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2655, 85, 'Andi', '2018-12-03 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2656, 85, 'Andi', '2018-12-03 18:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2657, 85, 'Andi', '2018-12-04 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2658, 85, 'Andi', '2018-12-04 17:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2659, 85, 'Andi', '2018-12-05 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2660, 85, 'Andi', '2018-12-05 17:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2661, 85, 'Andi', '2018-12-06 08:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2662, 85, 'Andi', '2018-12-06 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2663, 85, 'Andi', '2018-12-07 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2664, 85, 'Andi', '2018-12-07 17:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2665, 85, 'Andi', '2018-12-10 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2666, 85, 'Andi', '2018-12-10 17:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2667, 85, 'Andi', '2018-12-11 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2668, 85, 'Andi', '2018-12-11 17:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2669, 85, 'Andi', '2018-12-11 17:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2670, 85, 'Andi', '2018-12-12 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2671, 85, 'Andi', '2018-12-12 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2672, 85, 'Andi', '2018-12-13 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2673, 85, 'Andi', '2018-12-13 18:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2674, 85, 'Andi', '2018-12-14 08:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2675, 85, 'Andi', '2018-12-14 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2676, 85, 'Andi', '2018-12-17 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2677, 85, 'Andi', '2018-12-17 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2678, 85, 'Andi', '2018-12-18 08:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2679, 85, 'Andi', '2018-12-18 17:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2680, 85, 'Andi', '2018-12-19 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2681, 85, 'Andi', '2018-12-20 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2682, 85, 'Andi', '2018-12-20 17:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2683, 85, 'Andi', '2018-12-21 17:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2684, 85, 'Andi', '2018-12-26 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2685, 86, 'Marpaung', '2018-12-03 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2686, 86, 'Marpaung', '2018-12-03 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2687, 86, 'Marpaung', '2018-12-03 19:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2688, 86, 'Marpaung', '2018-12-03 19:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2689, 86, 'Marpaung', '2018-12-04 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2690, 86, 'Marpaung', '2018-12-04 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2691, 86, 'Marpaung', '2018-12-04 19:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2692, 86, 'Marpaung', '2018-12-04 19:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2693, 86, 'Marpaung', '2018-12-10 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2694, 86, 'Marpaung', '2018-12-10 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2695, 86, 'Marpaung', '2018-12-10 18:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2696, 86, 'Marpaung', '2018-12-10 18:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2697, 86, 'Marpaung', '2018-12-11 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2698, 86, 'Marpaung', '2018-12-11 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2699, 86, 'Marpaung', '2018-12-11 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2700, 86, 'Marpaung', '2018-12-11 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2701, 86, 'Marpaung', '2018-12-12 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2702, 86, 'Marpaung', '2018-12-12 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2703, 86, 'Marpaung', '2018-12-12 18:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2704, 86, 'Marpaung', '2018-12-12 18:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2705, 86, 'Marpaung', '2018-12-13 08:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2706, 86, 'Marpaung', '2018-12-13 08:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2707, 86, 'Marpaung', '2018-12-13 18:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2708, 86, 'Marpaung', '2018-12-13 18:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2709, 86, 'Marpaung', '2018-12-14 08:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2710, 86, 'Marpaung', '2018-12-14 18:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2711, 86, 'Marpaung', '2018-12-17 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2712, 86, 'Marpaung', '2018-12-17 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2713, 86, 'Marpaung', '2018-12-17 17:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2714, 86, 'Marpaung', '2018-12-17 17:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2715, 86, 'Marpaung', '2018-12-18 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2716, 86, 'Marpaung', '2018-12-18 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2717, 86, 'Marpaung', '2018-12-18 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2718, 87, 'Kanti Rusni', '2018-12-03 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2719, 87, 'Kanti Rusni', '2018-12-04 07:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2720, 87, 'Kanti Rusni', '2018-12-05 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2721, 87, 'Kanti Rusni', '2018-12-06 06:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2722, 87, 'Kanti Rusni', '2018-12-07 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2723, 87, 'Kanti Rusni', '2018-12-10 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2724, 87, 'Kanti Rusni', '2018-12-11 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2725, 87, 'Kanti Rusni', '2018-12-12 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2726, 87, 'Kanti Rusni', '2018-12-13 07:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2727, 87, 'Kanti Rusni', '2018-12-14 07:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2728, 87, 'Kanti Rusni', '2018-12-17 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2729, 87, 'Kanti Rusni', '2018-12-18 07:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2730, 87, 'Kanti Rusni', '2018-12-19 07:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2731, 87, 'Kanti Rusni', '2018-12-20 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2732, 87, 'Kanti Rusni', '2018-12-21 06:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2733, 87, 'Kanti Rusni', '2018-12-26 07:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2734, 87, 'Kanti Rusni', '2018-12-27 07:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2735, 87, 'Kanti Rusni', '2018-12-28 07:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2736, 88, 'Reza Munthe', '2018-12-03 07:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2737, 88, 'Reza Munthe', '2018-12-03 17:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2738, 88, 'Reza Munthe', '2018-12-07 04:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2739, 88, 'Reza Munthe', '2018-12-07 18:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2740, 88, 'Reza Munthe', '2018-12-10 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2741, 88, 'Reza Munthe', '2018-12-10 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2742, 88, 'Reza Munthe', '2018-12-10 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2743, 88, 'Reza Munthe', '2018-12-10 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2744, 88, 'Reza Munthe', '2018-12-11 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2745, 88, 'Reza Munthe', '2018-12-11 19:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2746, 88, 'Reza Munthe', '2018-12-13 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2747, 88, 'Reza Munthe', '2018-12-14 18:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2748, 88, 'Reza Munthe', '2018-12-17 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2749, 88, 'Reza Munthe', '2018-12-17 20:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2750, 88, 'Reza Munthe', '2018-12-18 07:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2751, 88, 'Reza Munthe', '2018-12-18 18:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2752, 88, 'Reza Munthe', '2018-12-26 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2753, 88, 'Reza Munthe', '2018-12-26 21:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2754, 88, 'Reza Munthe', '2018-12-26 21:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2755, 88, 'Reza Munthe', '2018-12-27 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2756, 88, 'Reza Munthe', '2018-12-27 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2757, 88, 'Reza Munthe', '2018-12-27 18:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2758, 88, 'Reza Munthe', '2018-12-28 21:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2759, 89, 'Nurdin Nurdiawan', '2018-12-03 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2760, 89, 'Nurdin Nurdiawan', '2018-12-03 17:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2761, 89, 'Nurdin Nurdiawan', '2018-12-04 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2762, 89, 'Nurdin Nurdiawan', '2018-12-04 18:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2763, 89, 'Nurdin Nurdiawan', '2018-12-05 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2764, 89, 'Nurdin Nurdiawan', '2018-12-05 20:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2765, 89, 'Nurdin Nurdiawan', '2018-12-06 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2766, 89, 'Nurdin Nurdiawan', '2018-12-06 20:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2767, 89, 'Nurdin Nurdiawan', '2018-12-07 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2768, 89, 'Nurdin Nurdiawan', '2018-12-07 17:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2769, 89, 'Nurdin Nurdiawan', '2018-12-10 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2770, 89, 'Nurdin Nurdiawan', '2018-12-10 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2771, 89, 'Nurdin Nurdiawan', '2018-12-10 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2772, 89, 'Nurdin Nurdiawan', '2018-12-11 07:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2773, 89, 'Nurdin Nurdiawan', '2018-12-11 19:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2774, 89, 'Nurdin Nurdiawan', '2018-12-12 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2775, 89, 'Nurdin Nurdiawan', '2018-12-12 16:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2776, 89, 'Nurdin Nurdiawan', '2018-12-13 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2777, 89, 'Nurdin Nurdiawan', '2018-12-13 17:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2778, 89, 'Nurdin Nurdiawan', '2018-12-14 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2779, 89, 'Nurdin Nurdiawan', '2018-12-14 18:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2780, 89, 'Nurdin Nurdiawan', '2018-12-17 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2781, 89, 'Nurdin Nurdiawan', '2018-12-17 17:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2782, 89, 'Nurdin Nurdiawan', '2018-12-18 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2783, 89, 'Nurdin Nurdiawan', '2018-12-19 09:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2784, 89, 'Nurdin Nurdiawan', '2018-12-19 17:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2785, 89, 'Nurdin Nurdiawan', '2018-12-20 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2786, 89, 'Nurdin Nurdiawan', '2018-12-20 17:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2787, 89, 'Nurdin Nurdiawan', '2018-12-21 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2788, 89, 'Nurdin Nurdiawan', '2018-12-21 17:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2789, 89, 'Nurdin Nurdiawan', '2018-12-26 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2790, 89, 'Nurdin Nurdiawan', '2018-12-26 17:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2791, 89, 'Nurdin Nurdiawan', '2018-12-27 07:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2792, 89, 'Nurdin Nurdiawan', '2018-12-27 18:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2793, 89, 'Nurdin Nurdiawan', '2018-12-28 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2794, 89, 'Nurdin Nurdiawan', '2018-12-28 19:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2795, 90, 'Vegy', '2018-12-03 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2796, 90, 'Vegy', '2018-12-03 18:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2797, 90, 'Vegy', '2018-12-04 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2798, 90, 'Vegy', '2018-12-04 18:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2799, 90, 'Vegy', '2018-12-05 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2800, 90, 'Vegy', '2018-12-05 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2801, 90, 'Vegy', '2018-12-06 08:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2802, 90, 'Vegy', '2018-12-06 17:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2803, 90, 'Vegy', '2018-12-07 08:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2804, 90, 'Vegy', '2018-12-07 19:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2805, 90, 'Vegy', '2018-12-10 08:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2806, 90, 'Vegy', '2018-12-10 18:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2807, 90, 'Vegy', '2018-12-12 08:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2808, 90, 'Vegy', '2018-12-12 18:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2809, 90, 'Vegy', '2018-12-13 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2810, 90, 'Vegy', '2018-12-13 20:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2811, 90, 'Vegy', '2018-12-14 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2812, 90, 'Vegy', '2018-12-14 19:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2813, 90, 'Vegy', '2018-12-17 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2814, 90, 'Vegy', '2018-12-17 18:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2815, 90, 'Vegy', '2018-12-18 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2816, 90, 'Vegy', '2018-12-18 19:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2817, 90, 'Vegy', '2018-12-19 20:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2818, 90, 'Vegy', '2018-12-20 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2819, 90, 'Vegy', '2018-12-20 22:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2820, 90, 'Vegy', '2018-12-21 05:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2821, 90, 'Vegy', '2018-12-22 08:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2822, 90, 'Vegy', '2018-12-24 07:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2823, 90, 'Vegy', '2018-12-26 07:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2824, 90, 'Vegy', '2018-12-26 18:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2825, 90, 'Vegy', '2018-12-27 08:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2826, 90, 'Vegy', '2018-12-27 19:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2827, 90, 'Vegy', '2018-12-28 06:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2828, 90, 'Vegy', '2018-12-28 20:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2829, 90, 'Vegy', '2018-12-31 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2830, 91, 'Desti', '2018-12-03 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2831, 91, 'Desti', '2018-12-03 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2832, 91, 'Desti', '2018-12-03 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2833, 91, 'Desti', '2018-12-05 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2834, 91, 'Desti', '2018-12-05 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2835, 91, 'Desti', '2018-12-06 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2836, 91, 'Desti', '2018-12-06 17:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2837, 91, 'Desti', '2018-12-07 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2838, 91, 'Desti', '2018-12-07 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2839, 91, 'Desti', '2018-12-18 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2840, 91, 'Desti', '2018-12-18 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2841, 91, 'Desti', '2018-12-19 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2842, 91, 'Desti', '2018-12-20 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2843, 91, 'Desti', '2018-12-21 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2844, 91, 'Desti', '2018-12-21 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2845, 91, 'Desti', '2018-12-21 17:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2846, 91, 'Desti', '2018-12-26 09:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2847, 91, 'Desti', '2018-12-26 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2848, 91, 'Desti', '2018-12-27 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2849, 91, 'Desti', '2018-12-27 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2850, 91, 'Desti', '2018-12-28 08:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2851, 91, 'Desti', '2018-12-28 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2852, 91, 'Desti', '2018-12-31 08:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2853, 91, 'Desti', '2018-12-31 16:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2854, 91, 'Desti', '2018-12-31 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2855, 94, 'M Ilham Ramdani', '2018-12-03 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2856, 94, 'M Ilham Ramdani', '2018-12-03 19:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2857, 94, 'M Ilham Ramdani', '2018-12-03 19:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2858, 94, 'M Ilham Ramdani', '2018-12-04 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2859, 94, 'M Ilham Ramdani', '2018-12-04 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2860, 94, 'M Ilham Ramdani', '2018-12-04 19:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2861, 94, 'M Ilham Ramdani', '2018-12-05 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2862, 94, 'M Ilham Ramdani', '2018-12-05 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2863, 94, 'M Ilham Ramdani', '2018-12-05 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2864, 94, 'M Ilham Ramdani', '2018-12-05 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2865, 94, 'M Ilham Ramdani', '2018-12-06 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2866, 94, 'M Ilham Ramdani', '2018-12-06 19:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2867, 94, 'M Ilham Ramdani', '2018-12-06 19:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2868, 94, 'M Ilham Ramdani', '2018-12-07 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2869, 94, 'M Ilham Ramdani', '2018-12-07 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2870, 94, 'M Ilham Ramdani', '2018-12-07 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2871, 94, 'M Ilham Ramdani', '2018-12-10 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2872, 94, 'M Ilham Ramdani', '2018-12-10 19:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2873, 94, 'M Ilham Ramdani', '2018-12-10 19:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2874, 94, 'M Ilham Ramdani', '2018-12-10 19:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2875, 94, 'M Ilham Ramdani', '2018-12-11 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2876, 94, 'M Ilham Ramdani', '2018-12-11 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2877, 94, 'M Ilham Ramdani', '2018-12-11 20:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2878, 94, 'M Ilham Ramdani', '2018-12-12 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2879, 94, 'M Ilham Ramdani', '2018-12-12 20:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2880, 94, 'M Ilham Ramdani', '2018-12-13 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2881, 94, 'M Ilham Ramdani', '2018-12-13 20:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2882, 94, 'M Ilham Ramdani', '2018-12-13 20:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2883, 94, 'M Ilham Ramdani', '2018-12-13 20:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2884, 94, 'M Ilham Ramdani', '2018-12-14 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2885, 94, 'M Ilham Ramdani', '2018-12-14 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2886, 94, 'M Ilham Ramdani', '2018-12-14 18:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2887, 94, 'M Ilham Ramdani', '2018-12-14 18:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2888, 94, 'M Ilham Ramdani', '2018-12-17 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2889, 94, 'M Ilham Ramdani', '2018-12-17 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2890, 94, 'M Ilham Ramdani', '2018-12-17 18:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2891, 94, 'M Ilham Ramdani', '2018-12-17 18:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2892, 94, 'M Ilham Ramdani', '2018-12-21 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2893, 94, 'M Ilham Ramdani', '2018-12-21 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2894, 94, 'M Ilham Ramdani', '2018-12-26 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2895, 94, 'M Ilham Ramdani', '2018-12-26 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2896, 94, 'M Ilham Ramdani', '2018-12-26 17:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2897, 94, 'M Ilham Ramdani', '2018-12-26 17:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2898, 94, 'M Ilham Ramdani', '2018-12-26 23:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2899, 94, 'M Ilham Ramdani', '2018-12-27 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2900, 94, 'M Ilham Ramdani', '2018-12-27 19:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2901, 94, 'M Ilham Ramdani', '2018-12-27 19:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2902, 94, 'M Ilham Ramdani', '2018-12-28 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2903, 94, 'M Ilham Ramdani', '2018-12-28 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2904, 94, 'M Ilham Ramdani', '2018-12-28 19:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2905, 94, 'M Ilham Ramdani', '2018-12-29 00:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2906, 94, 'M Ilham Ramdani', '2018-12-31 07:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2907, 94, 'M Ilham Ramdani', '2018-12-31 07:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2908, 94, 'M Ilham Ramdani', '2018-12-31 18:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2909, 97, 'Dwiva Rizky', '2018-12-03 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2910, 97, 'Dwiva Rizky', '2018-12-03 17:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2911, 97, 'Dwiva Rizky', '2018-12-04 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2912, 97, 'Dwiva Rizky', '2018-12-04 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2913, 97, 'Dwiva Rizky', '2018-12-05 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2914, 97, 'Dwiva Rizky', '2018-12-05 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2915, 97, 'Dwiva Rizky', '2018-12-06 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2916, 97, 'Dwiva Rizky', '2018-12-06 17:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2917, 97, 'Dwiva Rizky', '2018-12-07 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2918, 97, 'Dwiva Rizky', '2018-12-07 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2919, 97, 'Dwiva Rizky', '2018-12-10 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2920, 97, 'Dwiva Rizky', '2018-12-10 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2921, 97, 'Dwiva Rizky', '2018-12-11 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2922, 97, 'Dwiva Rizky', '2018-12-11 16:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2923, 97, 'Dwiva Rizky', '2018-12-12 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2924, 97, 'Dwiva Rizky', '2018-12-12 16:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2925, 97, 'Dwiva Rizky', '2018-12-13 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2926, 97, 'Dwiva Rizky', '2018-12-13 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2927, 97, 'Dwiva Rizky', '2018-12-14 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2928, 97, 'Dwiva Rizky', '2018-12-14 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2929, 97, 'Dwiva Rizky', '2018-12-17 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2930, 97, 'Dwiva Rizky', '2018-12-17 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2931, 97, 'Dwiva Rizky', '2018-12-18 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2932, 97, 'Dwiva Rizky', '2018-12-18 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2933, 97, 'Dwiva Rizky', '2018-12-19 17:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2934, 97, 'Dwiva Rizky', '2018-12-20 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2935, 97, 'Dwiva Rizky', '2018-12-20 18:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2936, 97, 'Dwiva Rizky', '2018-12-26 08:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2937, 97, 'Dwiva Rizky', '2018-12-26 16:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2938, 97, 'Dwiva Rizky', '2018-12-26 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2939, 97, 'Dwiva Rizky', '2018-12-27 08:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2940, 97, 'Dwiva Rizky', '2018-12-28 08:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2941, 97, 'Dwiva Rizky', '2018-12-28 17:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2942, 97, 'Dwiva Rizky', '2018-12-31 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2943, 99, 'Fina Fauziah', '2018-12-03 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2944, 99, 'Fina Fauziah', '2018-12-03 17:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2945, 99, 'Fina Fauziah', '2018-12-04 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2946, 99, 'Fina Fauziah', '2018-12-04 18:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2947, 99, 'Fina Fauziah', '2018-12-05 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2948, 99, 'Fina Fauziah', '2018-12-05 17:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2949, 99, 'Fina Fauziah', '2018-12-06 07:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2950, 99, 'Fina Fauziah', '2018-12-07 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2951, 99, 'Fina Fauziah', '2018-12-10 07:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2952, 99, 'Fina Fauziah', '2018-12-10 17:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2953, 99, 'Fina Fauziah', '2018-12-11 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2954, 99, 'Fina Fauziah', '2018-12-11 16:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2955, 99, 'Fina Fauziah', '2018-12-12 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2956, 99, 'Fina Fauziah', '2018-12-13 07:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2957, 99, 'Fina Fauziah', '2018-12-14 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2958, 99, 'Fina Fauziah', '2018-12-14 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2959, 99, 'Fina Fauziah', '2018-12-17 07:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2960, 99, 'Fina Fauziah', '2018-12-17 18:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2961, 99, 'Fina Fauziah', '2018-12-18 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2962, 99, 'Fina Fauziah', '2018-12-20 07:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2963, 99, 'Fina Fauziah', '2018-12-20 17:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2964, 99, 'Fina Fauziah', '2018-12-21 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2965, 99, 'Fina Fauziah', '2018-12-21 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2966, 101, 'Fahmy Bramasta', '2018-12-13 09:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2967, 101, 'Fahmy Bramasta', '2018-12-28 18:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2968, 103, 'Rhasie Batara', '2018-12-13 09:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2969, 104, 'Fauzan Pratama', '2018-12-03 06:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2970, 104, 'Fauzan Pratama', '2018-12-04 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2971, 104, 'Fauzan Pratama', '2018-12-04 22:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2972, 104, 'Fauzan Pratama', '2018-12-05 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2973, 104, 'Fauzan Pratama', '2018-12-05 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2974, 104, 'Fauzan Pratama', '2018-12-05 20:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2975, 104, 'Fauzan Pratama', '2018-12-06 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2976, 104, 'Fauzan Pratama', '2018-12-06 17:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2977, 104, 'Fauzan Pratama', '2018-12-07 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2978, 104, 'Fauzan Pratama', '2018-12-10 07:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2979, 104, 'Fauzan Pratama', '2018-12-10 17:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2980, 104, 'Fauzan Pratama', '2018-12-15 03:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2981, 104, 'Fauzan Pratama', '2018-12-17 08:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2982, 104, 'Fauzan Pratama', '2018-12-17 17:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2983, 104, 'Fauzan Pratama', '2018-12-18 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2984, 104, 'Fauzan Pratama', '2018-12-18 20:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2985, 104, 'Fauzan Pratama', '2018-12-19 06:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2986, 104, 'Fauzan Pratama', '2018-12-19 20:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2987, 104, 'Fauzan Pratama', '2018-12-20 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2988, 104, 'Fauzan Pratama', '2018-12-20 20:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2989, 104, 'Fauzan Pratama', '2018-12-21 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2990, 104, 'Fauzan Pratama', '2018-12-21 17:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2991, 104, 'Fauzan Pratama', '2018-12-26 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2992, 104, 'Fauzan Pratama', '2018-12-26 20:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2993, 104, 'Fauzan Pratama', '2018-12-27 06:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2994, 104, 'Fauzan Pratama', '2018-12-27 16:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2995, 104, 'Fauzan Pratama', '2018-12-28 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2996, 104, 'Fauzan Pratama', '2018-12-28 20:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2997, 104, 'Fauzan Pratama', '2018-12-31 07:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2998, 104, 'Fauzan Pratama', '2018-12-31 16:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (2999, 105, 'Eriend Qila Aprilia', '2018-12-03 08:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3000, 105, 'Eriend Qila Aprilia', '2018-12-03 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3001, 105, 'Eriend Qila Aprilia', '2018-12-04 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3002, 105, 'Eriend Qila Aprilia', '2018-12-04 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3003, 105, 'Eriend Qila Aprilia', '2018-12-05 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3004, 105, 'Eriend Qila Aprilia', '2018-12-05 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3005, 105, 'Eriend Qila Aprilia', '2018-12-05 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3006, 105, 'Eriend Qila Aprilia', '2018-12-06 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3007, 105, 'Eriend Qila Aprilia', '2018-12-06 16:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3008, 105, 'Eriend Qila Aprilia', '2018-12-07 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3009, 105, 'Eriend Qila Aprilia', '2018-12-07 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3010, 105, 'Eriend Qila Aprilia', '2018-12-07 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3011, 105, 'Eriend Qila Aprilia', '2018-12-10 08:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3012, 105, 'Eriend Qila Aprilia', '2018-12-10 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3013, 105, 'Eriend Qila Aprilia', '2018-12-10 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3014, 105, 'Eriend Qila Aprilia', '2018-12-11 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3015, 105, 'Eriend Qila Aprilia', '2018-12-11 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3016, 105, 'Eriend Qila Aprilia', '2018-12-11 16:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3017, 105, 'Eriend Qila Aprilia', '2018-12-13 08:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3018, 105, 'Eriend Qila Aprilia', '2018-12-13 08:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3019, 105, 'Eriend Qila Aprilia', '2018-12-13 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3020, 105, 'Eriend Qila Aprilia', '2018-12-17 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3021, 105, 'Eriend Qila Aprilia', '2018-12-17 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3022, 105, 'Eriend Qila Aprilia', '2018-12-20 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3023, 105, 'Eriend Qila Aprilia', '2018-12-20 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3024, 105, 'Eriend Qila Aprilia', '2018-12-20 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3025, 105, 'Eriend Qila Aprilia', '2018-12-21 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3026, 105, 'Eriend Qila Aprilia', '2018-12-21 17:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3027, 106, 'Zaennurohim', '2018-12-03 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3028, 106, 'Zaennurohim', '2018-12-03 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3029, 106, 'Zaennurohim', '2018-12-04 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3030, 106, 'Zaennurohim', '2018-12-04 16:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3031, 106, 'Zaennurohim', '2018-12-05 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3032, 106, 'Zaennurohim', '2018-12-05 17:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3033, 106, 'Zaennurohim', '2018-12-06 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3034, 106, 'Zaennurohim', '2018-12-06 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3035, 106, 'Zaennurohim', '2018-12-07 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3036, 106, 'Zaennurohim', '2018-12-07 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3037, 106, 'Zaennurohim', '2018-12-10 06:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3038, 106, 'Zaennurohim', '2018-12-10 17:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3039, 106, 'Zaennurohim', '2018-12-11 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3040, 106, 'Zaennurohim', '2018-12-11 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3041, 107, 'Bimin', '2018-12-03 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3042, 107, 'Bimin', '2018-12-03 19:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3043, 107, 'Bimin', '2018-12-04 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3044, 107, 'Bimin', '2018-12-04 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3045, 107, 'Bimin', '2018-12-04 19:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3046, 107, 'Bimin', '2018-12-05 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3047, 107, 'Bimin', '2018-12-05 19:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3048, 107, 'Bimin', '2018-12-06 07:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3049, 107, 'Bimin', '2018-12-06 18:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3050, 107, 'Bimin', '2018-12-07 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3051, 107, 'Bimin', '2018-12-07 16:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3052, 107, 'Bimin', '2018-12-10 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3053, 107, 'Bimin', '2018-12-10 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3054, 107, 'Bimin', '2018-12-11 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3055, 107, 'Bimin', '2018-12-11 18:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3056, 107, 'Bimin', '2018-12-12 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3057, 107, 'Bimin', '2018-12-12 18:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3058, 107, 'Bimin', '2018-12-13 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3059, 107, 'Bimin', '2018-12-13 18:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3060, 107, 'Bimin', '2018-12-26 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3061, 107, 'Bimin', '2018-12-26 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3062, 107, 'Bimin', '2018-12-26 19:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3063, 107, 'Bimin', '2018-12-27 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3064, 107, 'Bimin', '2018-12-27 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3065, 107, 'Bimin', '2018-12-27 18:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3066, 107, 'Bimin', '2018-12-28 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3067, 107, 'Bimin', '2018-12-28 17:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3068, 108, 'Sumali', '2018-12-03 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3069, 108, 'Sumali', '2018-12-03 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3070, 108, 'Sumali', '2018-12-03 20:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3071, 108, 'Sumali', '2018-12-04 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3072, 108, 'Sumali', '2018-12-04 21:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3073, 108, 'Sumali', '2018-12-05 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3074, 108, 'Sumali', '2018-12-05 20:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3075, 108, 'Sumali', '2018-12-05 20:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3076, 108, 'Sumali', '2018-12-06 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3077, 108, 'Sumali', '2018-12-06 20:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3078, 108, 'Sumali', '2018-12-07 19:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3079, 108, 'Sumali', '2018-12-10 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3080, 108, 'Sumali', '2018-12-10 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3081, 108, 'Sumali', '2018-12-10 21:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3082, 108, 'Sumali', '2018-12-11 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3083, 108, 'Sumali', '2018-12-11 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3084, 108, 'Sumali', '2018-12-11 21:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3085, 108, 'Sumali', '2018-12-12 04:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3086, 108, 'Sumali', '2018-12-13 08:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3087, 108, 'Sumali', '2018-12-13 19:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3088, 108, 'Sumali', '2018-12-14 05:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3089, 108, 'Sumali', '2018-12-14 05:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3090, 108, 'Sumali', '2018-12-14 19:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3091, 108, 'Sumali', '2018-12-19 19:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3092, 108, 'Sumali', '2018-12-20 05:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3093, 108, 'Sumali', '2018-12-20 22:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3094, 108, 'Sumali', '2018-12-21 05:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3095, 108, 'Sumali', '2018-12-21 20:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3096, 108, 'Sumali', '2018-12-26 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3097, 108, 'Sumali', '2018-12-26 19:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3098, 108, 'Sumali', '2018-12-27 05:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3099, 108, 'Sumali', '2018-12-27 20:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3100, 108, 'Sumali', '2018-12-28 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3101, 108, 'Sumali', '2018-12-28 20:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3102, 109, 'Agus Setiawan', '2018-12-03 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3103, 109, 'Agus Setiawan', '2018-12-03 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3104, 109, 'Agus Setiawan', '2018-12-03 19:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3105, 109, 'Agus Setiawan', '2018-12-04 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3106, 109, 'Agus Setiawan', '2018-12-04 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3107, 109, 'Agus Setiawan', '2018-12-04 19:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3108, 109, 'Agus Setiawan', '2018-12-05 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3109, 109, 'Agus Setiawan', '2018-12-05 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3110, 109, 'Agus Setiawan', '2018-12-05 19:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3111, 109, 'Agus Setiawan', '2018-12-06 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3112, 109, 'Agus Setiawan', '2018-12-06 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3113, 109, 'Agus Setiawan', '2018-12-06 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3114, 109, 'Agus Setiawan', '2018-12-06 20:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3115, 109, 'Agus Setiawan', '2018-12-07 08:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3116, 109, 'Agus Setiawan', '2018-12-07 19:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3117, 109, 'Agus Setiawan', '2018-12-10 08:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3118, 109, 'Agus Setiawan', '2018-12-10 20:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3119, 109, 'Agus Setiawan', '2018-12-11 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3120, 109, 'Agus Setiawan', '2018-12-11 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3121, 109, 'Agus Setiawan', '2018-12-11 21:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3122, 109, 'Agus Setiawan', '2018-12-12 08:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3123, 109, 'Agus Setiawan', '2018-12-12 08:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3124, 109, 'Agus Setiawan', '2018-12-12 19:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3125, 109, 'Agus Setiawan', '2018-12-12 19:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3126, 109, 'Agus Setiawan', '2018-12-13 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3127, 109, 'Agus Setiawan', '2018-12-13 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3128, 109, 'Agus Setiawan', '2018-12-13 19:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3129, 109, 'Agus Setiawan', '2018-12-14 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3130, 109, 'Agus Setiawan', '2018-12-14 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3131, 109, 'Agus Setiawan', '2018-12-14 19:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3132, 109, 'Agus Setiawan', '2018-12-17 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3133, 109, 'Agus Setiawan', '2018-12-17 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3134, 109, 'Agus Setiawan', '2018-12-17 19:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3135, 109, 'Agus Setiawan', '2018-12-18 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3136, 109, 'Agus Setiawan', '2018-12-18 20:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3137, 109, 'Agus Setiawan', '2018-12-19 09:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3138, 109, 'Agus Setiawan', '2018-12-19 09:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3139, 109, 'Agus Setiawan', '2018-12-19 19:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3140, 109, 'Agus Setiawan', '2018-12-20 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3141, 109, 'Agus Setiawan', '2018-12-20 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3142, 109, 'Agus Setiawan', '2018-12-20 22:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3143, 109, 'Agus Setiawan', '2018-12-20 22:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3144, 109, 'Agus Setiawan', '2018-12-21 21:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3145, 109, 'Agus Setiawan', '2018-12-21 21:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3146, 110, 'Feriyan', '2018-12-19 10:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3147, 111, 'Giyarno', '2018-12-03 06:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3148, 111, 'Giyarno', '2018-12-03 06:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3149, 111, 'Giyarno', '2018-12-03 18:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3150, 111, 'Giyarno', '2018-12-04 06:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3151, 111, 'Giyarno', '2018-12-04 18:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3152, 111, 'Giyarno', '2018-12-05 06:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3153, 111, 'Giyarno', '2018-12-05 18:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3154, 111, 'Giyarno', '2018-12-06 06:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3155, 111, 'Giyarno', '2018-12-06 06:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3156, 111, 'Giyarno', '2018-12-06 18:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3157, 111, 'Giyarno', '2018-12-07 06:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3158, 111, 'Giyarno', '2018-12-07 06:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3159, 111, 'Giyarno', '2018-12-07 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3160, 111, 'Giyarno', '2018-12-10 05:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3161, 111, 'Giyarno', '2018-12-10 05:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3162, 111, 'Giyarno', '2018-12-10 18:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3163, 111, 'Giyarno', '2018-12-10 18:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3164, 111, 'Giyarno', '2018-12-11 06:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3165, 111, 'Giyarno', '2018-12-11 06:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3166, 111, 'Giyarno', '2018-12-11 18:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3167, 111, 'Giyarno', '2018-12-12 06:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3168, 111, 'Giyarno', '2018-12-12 06:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3169, 111, 'Giyarno', '2018-12-12 18:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3170, 111, 'Giyarno', '2018-12-13 06:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3171, 111, 'Giyarno', '2018-12-13 18:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3172, 111, 'Giyarno', '2018-12-14 06:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3173, 111, 'Giyarno', '2018-12-14 06:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3174, 111, 'Giyarno', '2018-12-14 16:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3175, 111, 'Giyarno', '2018-12-20 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3176, 111, 'Giyarno', '2018-12-20 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3177, 111, 'Giyarno', '2018-12-20 17:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3178, 111, 'Giyarno', '2018-12-21 06:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3179, 111, 'Giyarno', '2018-12-21 06:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3180, 111, 'Giyarno', '2018-12-26 06:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3181, 111, 'Giyarno', '2018-12-26 06:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3182, 111, 'Giyarno', '2018-12-26 18:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3183, 111, 'Giyarno', '2018-12-27 06:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3184, 111, 'Giyarno', '2018-12-27 06:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3185, 111, 'Giyarno', '2018-12-27 18:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3186, 111, 'Giyarno', '2018-12-28 06:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3187, 111, 'Giyarno', '2018-12-28 06:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3188, 111, 'Giyarno', '2018-12-28 13:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3189, 112, 'Susilo', '2018-12-03 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3190, 112, 'Susilo', '2018-12-03 17:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3191, 112, 'Susilo', '2018-12-04 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3192, 112, 'Susilo', '2018-12-04 17:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3193, 112, 'Susilo', '2018-12-05 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3194, 112, 'Susilo', '2018-12-05 18:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3195, 112, 'Susilo', '2018-12-06 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3196, 112, 'Susilo', '2018-12-06 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3197, 112, 'Susilo', '2018-12-06 17:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3198, 112, 'Susilo', '2018-12-07 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3199, 112, 'Susilo', '2018-12-07 17:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3200, 112, 'Susilo', '2018-12-07 17:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3201, 112, 'Susilo', '2018-12-10 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3202, 112, 'Susilo', '2018-12-10 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3203, 112, 'Susilo', '2018-12-10 18:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3204, 112, 'Susilo', '2018-12-11 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3205, 112, 'Susilo', '2018-12-11 18:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3206, 112, 'Susilo', '2018-12-12 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3207, 112, 'Susilo', '2018-12-12 17:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3208, 112, 'Susilo', '2018-12-12 18:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3209, 112, 'Susilo', '2018-12-13 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3210, 112, 'Susilo', '2018-12-13 18:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3211, 112, 'Susilo', '2018-12-14 08:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3212, 112, 'Susilo', '2018-12-14 17:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3213, 112, 'Susilo', '2018-12-17 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3214, 112, 'Susilo', '2018-12-17 17:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3215, 112, 'Susilo', '2018-12-18 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3216, 112, 'Susilo', '2018-12-18 16:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3217, 112, 'Susilo', '2018-12-19 09:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3218, 112, 'Susilo', '2018-12-19 17:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3219, 112, 'Susilo', '2018-12-20 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3220, 112, 'Susilo', '2018-12-20 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3221, 112, 'Susilo', '2018-12-20 17:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3222, 112, 'Susilo', '2018-12-21 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3223, 112, 'Susilo', '2018-12-21 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3224, 112, 'Susilo', '2018-12-26 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3225, 112, 'Susilo', '2018-12-26 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3226, 112, 'Susilo', '2018-12-26 18:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3227, 112, 'Susilo', '2018-12-27 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3228, 112, 'Susilo', '2018-12-27 18:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3229, 112, 'Susilo', '2018-12-28 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3230, 112, 'Susilo', '2018-12-28 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3231, 112, 'Susilo', '2018-12-28 18:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3232, 112, 'Susilo', '2018-12-28 18:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3233, 113, 'Agus Hari', '2018-12-03 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3234, 113, 'Agus Hari', '2018-12-04 07:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3235, 113, 'Agus Hari', '2018-12-05 08:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3236, 113, 'Agus Hari', '2018-12-07 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3237, 113, 'Agus Hari', '2018-12-10 07:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3238, 113, 'Agus Hari', '2018-12-13 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3239, 113, 'Agus Hari', '2018-12-14 07:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3240, 113, 'Agus Hari', '2018-12-17 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3241, 113, 'Agus Hari', '2018-12-18 08:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3242, 113, 'Agus Hari', '2018-12-21 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3243, 113, 'Agus Hari', '2018-12-27 08:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3244, 113, 'Agus Hari', '2018-12-28 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3245, 113, 'Agus Hari', '2018-12-28 18:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3246, 113, 'Agus Hari', '2018-12-31 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3247, 114, 'Kaka Zakaria W', '2018-12-03 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3248, 114, 'Kaka Zakaria W', '2018-12-03 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3249, 114, 'Kaka Zakaria W', '2018-12-04 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3250, 114, 'Kaka Zakaria W', '2018-12-04 17:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3251, 114, 'Kaka Zakaria W', '2018-12-05 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3252, 114, 'Kaka Zakaria W', '2018-12-05 17:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3253, 114, 'Kaka Zakaria W', '2018-12-06 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3254, 114, 'Kaka Zakaria W', '2018-12-06 17:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3255, 114, 'Kaka Zakaria W', '2018-12-07 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3256, 114, 'Kaka Zakaria W', '2018-12-07 17:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3257, 114, 'Kaka Zakaria W', '2018-12-10 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3258, 114, 'Kaka Zakaria W', '2018-12-10 17:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3259, 114, 'Kaka Zakaria W', '2018-12-11 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3260, 114, 'Kaka Zakaria W', '2018-12-11 17:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3261, 114, 'Kaka Zakaria W', '2018-12-12 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3262, 114, 'Kaka Zakaria W', '2018-12-12 16:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3263, 114, 'Kaka Zakaria W', '2018-12-13 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3264, 114, 'Kaka Zakaria W', '2018-12-13 17:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3265, 114, 'Kaka Zakaria W', '2018-12-14 07:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3266, 114, 'Kaka Zakaria W', '2018-12-14 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3267, 114, 'Kaka Zakaria W', '2018-12-17 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3268, 114, 'Kaka Zakaria W', '2018-12-17 17:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3269, 114, 'Kaka Zakaria W', '2018-12-18 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3270, 114, 'Kaka Zakaria W', '2018-12-18 17:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3271, 114, 'Kaka Zakaria W', '2018-12-19 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3272, 114, 'Kaka Zakaria W', '2018-12-20 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3273, 114, 'Kaka Zakaria W', '2018-12-20 17:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3274, 114, 'Kaka Zakaria W', '2018-12-21 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3275, 114, 'Kaka Zakaria W', '2018-12-21 17:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3276, 114, 'Kaka Zakaria W', '2018-12-26 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3277, 114, 'Kaka Zakaria W', '2018-12-26 17:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3278, 114, 'Kaka Zakaria W', '2018-12-27 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3279, 114, 'Kaka Zakaria W', '2018-12-27 17:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3280, 114, 'Kaka Zakaria W', '2018-12-28 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3281, 114, 'Kaka Zakaria W', '2018-12-28 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3282, 114, 'Kaka Zakaria W', '2018-12-31 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3283, 114, 'Kaka Zakaria W', '2018-12-31 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3284, 115, 'Yugo', '2018-12-03 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3285, 115, 'Yugo', '2018-12-03 18:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3286, 115, 'Yugo', '2018-12-04 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3287, 115, 'Yugo', '2018-12-04 18:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3288, 115, 'Yugo', '2018-12-05 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3289, 115, 'Yugo', '2018-12-05 18:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3290, 115, 'Yugo', '2018-12-06 07:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3291, 115, 'Yugo', '2018-12-07 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3292, 115, 'Yugo', '2018-12-07 19:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3293, 115, 'Yugo', '2018-12-10 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3294, 115, 'Yugo', '2018-12-10 18:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3295, 115, 'Yugo', '2018-12-11 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3296, 115, 'Yugo', '2018-12-11 19:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3297, 115, 'Yugo', '2018-12-12 07:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3298, 115, 'Yugo', '2018-12-12 18:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3299, 115, 'Yugo', '2018-12-13 18:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3300, 115, 'Yugo', '2018-12-14 18:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3301, 115, 'Yugo', '2018-12-26 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3302, 115, 'Yugo', '2018-12-26 18:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3303, 115, 'Yugo', '2018-12-27 19:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3304, 115, 'Yugo', '2018-12-28 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3305, 115, 'Yugo', '2018-12-28 18:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3306, 115, 'Yugo', '2018-12-31 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3307, 115, 'Yugo', '2018-12-31 17:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3308, 116, 'Ari Ardianto', '2018-12-03 07:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3309, 116, 'Ari Ardianto', '2018-12-03 20:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3310, 116, 'Ari Ardianto', '2018-12-04 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3311, 116, 'Ari Ardianto', '2018-12-04 22:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3312, 116, 'Ari Ardianto', '2018-12-05 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3313, 116, 'Ari Ardianto', '2018-12-05 19:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3314, 116, 'Ari Ardianto', '2018-12-06 07:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3315, 116, 'Ari Ardianto', '2018-12-06 20:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3316, 116, 'Ari Ardianto', '2018-12-06 20:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3317, 116, 'Ari Ardianto', '2018-12-07 08:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3318, 116, 'Ari Ardianto', '2018-12-07 19:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3319, 116, 'Ari Ardianto', '2018-12-17 08:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3320, 116, 'Ari Ardianto', '2018-12-17 21:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3321, 116, 'Ari Ardianto', '2018-12-18 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3322, 116, 'Ari Ardianto', '2018-12-18 19:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3323, 116, 'Ari Ardianto', '2018-12-19 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3324, 116, 'Ari Ardianto', '2018-12-19 22:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3325, 116, 'Ari Ardianto', '2018-12-20 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3326, 116, 'Ari Ardianto', '2018-12-20 22:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3327, 116, 'Ari Ardianto', '2018-12-21 05:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3328, 116, 'Ari Ardianto', '2018-12-21 21:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3329, 116, 'Ari Ardianto', '2018-12-26 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3330, 116, 'Ari Ardianto', '2018-12-26 22:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3331, 116, 'Ari Ardianto', '2018-12-27 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3332, 116, 'Ari Ardianto', '2018-12-27 21:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3333, 116, 'Ari Ardianto', '2018-12-28 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3334, 116, 'Ari Ardianto', '2018-12-28 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3335, 116, 'Ari Ardianto', '2018-12-28 19:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3336, 116, 'Ari Ardianto', '2018-12-28 20:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3337, 116, 'Ari Ardianto', '2018-12-31 06:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3338, 116, 'Ari Ardianto', '2018-12-31 18:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3339, 117, 'Muhdidin', '2018-12-03 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3340, 117, 'Muhdidin', '2018-12-03 18:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3341, 117, 'Muhdidin', '2018-12-04 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3342, 117, 'Muhdidin', '2018-12-04 18:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3343, 117, 'Muhdidin', '2018-12-05 08:16:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3344, 117, 'Muhdidin', '2018-12-05 18:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3345, 117, 'Muhdidin', '2018-12-06 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3346, 117, 'Muhdidin', '2018-12-06 18:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3347, 117, 'Muhdidin', '2018-12-07 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3348, 117, 'Muhdidin', '2018-12-07 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3349, 117, 'Muhdidin', '2018-12-10 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3350, 117, 'Muhdidin', '2018-12-10 17:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3351, 117, 'Muhdidin', '2018-12-10 20:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3352, 117, 'Muhdidin', '2018-12-11 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3353, 117, 'Muhdidin', '2018-12-11 18:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3354, 117, 'Muhdidin', '2018-12-12 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3355, 117, 'Muhdidin', '2018-12-12 19:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3356, 117, 'Muhdidin', '2018-12-13 08:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3357, 117, 'Muhdidin', '2018-12-13 18:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3358, 117, 'Muhdidin', '2018-12-14 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3359, 117, 'Muhdidin', '2018-12-14 16:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3360, 117, 'Muhdidin', '2018-12-17 08:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3361, 117, 'Muhdidin', '2018-12-17 17:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3362, 117, 'Muhdidin', '2018-12-18 08:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3363, 117, 'Muhdidin', '2018-12-18 16:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3364, 117, 'Muhdidin', '2018-12-19 07:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3365, 117, 'Muhdidin', '2018-12-19 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3366, 117, 'Muhdidin', '2018-12-20 08:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3367, 117, 'Muhdidin', '2018-12-20 19:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3368, 117, 'Muhdidin', '2018-12-21 08:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3369, 117, 'Muhdidin', '2018-12-21 18:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3370, 117, 'Muhdidin', '2018-12-26 08:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3371, 117, 'Muhdidin', '2018-12-26 17:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3372, 117, 'Muhdidin', '2018-12-27 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3373, 117, 'Muhdidin', '2018-12-27 18:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3374, 117, 'Muhdidin', '2018-12-28 08:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3375, 117, 'Muhdidin', '2018-12-28 16:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3376, 117, 'Muhdidin', '2018-12-31 16:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3377, 118, 'Christoforus Aries', '2018-12-03 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3378, 118, 'Christoforus Aries', '2018-12-03 19:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3379, 118, 'Christoforus Aries', '2018-12-04 07:30:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3380, 118, 'Christoforus Aries', '2018-12-04 18:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3381, 118, 'Christoforus Aries', '2018-12-05 07:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3382, 118, 'Christoforus Aries', '2018-12-05 19:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3383, 118, 'Christoforus Aries', '2018-12-06 18:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3384, 118, 'Christoforus Aries', '2018-12-07 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3385, 118, 'Christoforus Aries', '2018-12-07 19:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3386, 118, 'Christoforus Aries', '2018-12-10 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3387, 118, 'Christoforus Aries', '2018-12-10 19:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3388, 118, 'Christoforus Aries', '2018-12-11 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3389, 118, 'Christoforus Aries', '2018-12-11 20:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3390, 118, 'Christoforus Aries', '2018-12-12 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3391, 118, 'Christoforus Aries', '2018-12-12 20:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3392, 118, 'Christoforus Aries', '2018-12-13 07:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3393, 118, 'Christoforus Aries', '2018-12-13 20:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3394, 118, 'Christoforus Aries', '2018-12-13 20:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3395, 118, 'Christoforus Aries', '2018-12-14 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3396, 118, 'Christoforus Aries', '2018-12-14 18:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3397, 118, 'Christoforus Aries', '2018-12-20 20:02:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3398, 118, 'Christoforus Aries', '2018-12-21 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3399, 118, 'Christoforus Aries', '2018-12-21 18:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3400, 118, 'Christoforus Aries', '2018-12-26 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3401, 118, 'Christoforus Aries', '2018-12-27 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3402, 118, 'Christoforus Aries', '2018-12-27 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3403, 118, 'Christoforus Aries', '2018-12-28 18:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3404, 118, 'Christoforus Aries', '2018-12-31 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3405, 120, 'Nyoman Gede a', '2018-12-03 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3406, 120, 'Nyoman Gede a', '2018-12-03 16:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3407, 120, 'Nyoman Gede a', '2018-12-04 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3408, 120, 'Nyoman Gede a', '2018-12-04 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3409, 120, 'Nyoman Gede a', '2018-12-05 07:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3410, 120, 'Nyoman Gede a', '2018-12-05 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3411, 120, 'Nyoman Gede a', '2018-12-06 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3412, 120, 'Nyoman Gede a', '2018-12-06 16:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3413, 120, 'Nyoman Gede a', '2018-12-07 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3414, 120, 'Nyoman Gede a', '2018-12-07 16:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3415, 120, 'Nyoman Gede a', '2018-12-10 08:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3416, 120, 'Nyoman Gede a', '2018-12-10 17:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3417, 120, 'Nyoman Gede a', '2018-12-11 07:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3418, 120, 'Nyoman Gede a', '2018-12-11 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3419, 120, 'Nyoman Gede a', '2018-12-12 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3420, 120, 'Nyoman Gede a', '2018-12-12 16:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3421, 120, 'Nyoman Gede a', '2018-12-13 08:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3422, 120, 'Nyoman Gede a', '2018-12-13 18:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3423, 120, 'Nyoman Gede a', '2018-12-14 08:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3424, 120, 'Nyoman Gede a', '2018-12-14 16:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3425, 120, 'Nyoman Gede a', '2018-12-17 07:35:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3426, 120, 'Nyoman Gede a', '2018-12-17 16:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3427, 120, 'Nyoman Gede a', '2018-12-18 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3428, 120, 'Nyoman Gede a', '2018-12-18 18:46:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3429, 120, 'Nyoman Gede a', '2018-12-19 16:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3430, 120, 'Nyoman Gede a', '2018-12-20 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3431, 120, 'Nyoman Gede a', '2018-12-20 17:04:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3432, 120, 'Nyoman Gede a', '2018-12-21 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3433, 120, 'Nyoman Gede a', '2018-12-21 16:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3434, 120, 'Nyoman Gede a', '2018-12-26 07:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3435, 120, 'Nyoman Gede a', '2018-12-26 16:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3436, 120, 'Nyoman Gede a', '2018-12-27 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3437, 120, 'Nyoman Gede a', '2018-12-28 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3438, 120, 'Nyoman Gede a', '2018-12-28 16:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3439, 120, 'Nyoman Gede a', '2018-12-31 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3440, 120, 'Nyoman Gede a', '2018-12-31 16:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3441, 121, 'Taryono', '2018-12-03 07:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3442, 121, 'Taryono', '2018-12-03 18:15:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3443, 121, 'Taryono', '2018-12-04 07:20:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3444, 121, 'Taryono', '2018-12-04 18:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3445, 121, 'Taryono', '2018-12-05 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3446, 121, 'Taryono', '2018-12-05 18:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3447, 121, 'Taryono', '2018-12-06 07:29:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3448, 121, 'Taryono', '2018-12-06 18:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3449, 121, 'Taryono', '2018-12-07 07:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3450, 121, 'Taryono', '2018-12-07 16:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3451, 121, 'Taryono', '2018-12-10 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3452, 121, 'Taryono', '2018-12-10 18:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3453, 121, 'Taryono', '2018-12-11 06:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3454, 121, 'Taryono', '2018-12-11 18:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3455, 121, 'Taryono', '2018-12-12 07:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3456, 121, 'Taryono', '2018-12-12 18:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3457, 121, 'Taryono', '2018-12-13 07:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3458, 121, 'Taryono', '2018-12-13 18:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3459, 121, 'Taryono', '2018-12-26 07:06:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3460, 121, 'Taryono', '2018-12-26 18:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3461, 121, 'Taryono', '2018-12-27 07:24:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3462, 121, 'Taryono', '2018-12-27 18:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3463, 121, 'Taryono', '2018-12-28 06:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3464, 121, 'Taryono', '2018-12-28 18:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3465, 121, 'Taryono', '2018-12-31 06:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3466, 122, 'Agus Setiono', '2018-12-03 06:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3467, 122, 'Agus Setiono', '2018-12-04 05:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3468, 122, 'Agus Setiono', '2018-12-04 05:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3469, 122, 'Agus Setiono', '2018-12-04 06:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3470, 122, 'Agus Setiono', '2018-12-04 18:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3471, 122, 'Agus Setiono', '2018-12-07 06:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3472, 122, 'Agus Setiono', '2018-12-10 05:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3473, 122, 'Agus Setiono', '2018-12-11 06:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3474, 122, 'Agus Setiono', '2018-12-11 18:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3475, 122, 'Agus Setiono', '2018-12-11 18:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3476, 122, 'Agus Setiono', '2018-12-12 06:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3477, 122, 'Agus Setiono', '2018-12-12 06:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3478, 122, 'Agus Setiono', '2018-12-12 18:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3479, 122, 'Agus Setiono', '2018-12-13 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3480, 122, 'Agus Setiono', '2018-12-13 18:21:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3481, 122, 'Agus Setiono', '2018-12-14 05:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3482, 122, 'Agus Setiono', '2018-12-14 17:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3483, 122, 'Agus Setiono', '2018-12-17 05:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3484, 122, 'Agus Setiono', '2018-12-17 06:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3485, 122, 'Agus Setiono', '2018-12-17 17:54:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3486, 122, 'Agus Setiono', '2018-12-18 05:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3487, 122, 'Agus Setiono', '2018-12-18 18:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3488, 122, 'Agus Setiono', '2018-12-18 18:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3489, 122, 'Agus Setiono', '2018-12-20 06:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3490, 122, 'Agus Setiono', '2018-12-20 06:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3491, 122, 'Agus Setiono', '2018-12-21 07:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3492, 123, 'Pryandi', '2018-12-03 08:19:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3493, 123, 'Pryandi', '2018-12-07 16:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3494, 123, 'Pryandi', '2018-12-17 22:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3495, 123, 'Pryandi', '2018-12-18 23:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3496, 123, 'Pryandi', '2018-12-19 08:55:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3497, 123, 'Pryandi', '2018-12-27 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3498, 123, 'Pryandi', '2018-12-31 08:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3499, 124, 'Sigit Irawan', '2018-12-03 06:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3500, 125, 'Sudiharto', '2018-12-03 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3501, 125, 'Sudiharto', '2018-12-03 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3502, 125, 'Sudiharto', '2018-12-03 19:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3503, 125, 'Sudiharto', '2018-12-03 19:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3504, 125, 'Sudiharto', '2018-12-04 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3505, 125, 'Sudiharto', '2018-12-04 07:42:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3506, 125, 'Sudiharto', '2018-12-04 18:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3507, 125, 'Sudiharto', '2018-12-04 18:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3508, 125, 'Sudiharto', '2018-12-05 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3509, 125, 'Sudiharto', '2018-12-05 18:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3510, 125, 'Sudiharto', '2018-12-06 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3511, 125, 'Sudiharto', '2018-12-06 07:59:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3512, 125, 'Sudiharto', '2018-12-06 18:31:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3513, 125, 'Sudiharto', '2018-12-07 07:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3514, 125, 'Sudiharto', '2018-12-07 18:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3515, 125, 'Sudiharto', '2018-12-10 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3516, 125, 'Sudiharto', '2018-12-10 07:58:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3517, 125, 'Sudiharto', '2018-12-10 18:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3518, 125, 'Sudiharto', '2018-12-11 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3519, 125, 'Sudiharto', '2018-12-11 07:53:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3520, 125, 'Sudiharto', '2018-12-11 19:07:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3521, 125, 'Sudiharto', '2018-12-12 07:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3522, 125, 'Sudiharto', '2018-12-12 18:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3523, 125, 'Sudiharto', '2018-12-13 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3524, 125, 'Sudiharto', '2018-12-13 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3525, 125, 'Sudiharto', '2018-12-13 18:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3526, 125, 'Sudiharto', '2018-12-14 08:03:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3527, 125, 'Sudiharto', '2018-12-14 16:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3528, 125, 'Sudiharto', '2018-12-17 07:50:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3529, 125, 'Sudiharto', '2018-12-17 18:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3530, 125, 'Sudiharto', '2018-12-18 07:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3531, 125, 'Sudiharto', '2018-12-19 18:28:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3532, 125, 'Sudiharto', '2018-12-20 07:39:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3533, 125, 'Sudiharto', '2018-12-20 18:40:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3534, 125, 'Sudiharto', '2018-12-21 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3535, 125, 'Sudiharto', '2018-12-21 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3536, 125, 'Sudiharto', '2018-12-21 17:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3537, 125, 'Sudiharto', '2018-12-21 17:18:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3538, 126, 'Adzani', '2018-12-03 04:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3539, 126, 'Adzani', '2018-12-03 04:23:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3540, 126, 'Adzani', '2018-12-03 07:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3541, 126, 'Adzani', '2018-12-03 18:08:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3542, 126, 'Adzani', '2018-12-04 18:25:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3543, 126, 'Adzani', '2018-12-05 07:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3544, 126, 'Adzani', '2018-12-05 18:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3545, 126, 'Adzani', '2018-12-06 07:09:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3546, 126, 'Adzani', '2018-12-06 17:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3547, 126, 'Adzani', '2018-12-07 07:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3548, 126, 'Adzani', '2018-12-07 18:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3549, 126, 'Adzani', '2018-12-10 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3550, 126, 'Adzani', '2018-12-10 19:52:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3551, 126, 'Adzani', '2018-12-11 07:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3552, 126, 'Adzani', '2018-12-11 19:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3553, 126, 'Adzani', '2018-12-12 07:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3554, 126, 'Adzani', '2018-12-12 20:48:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3555, 126, 'Adzani', '2018-12-13 07:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3556, 126, 'Adzani', '2018-12-13 19:17:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3557, 126, 'Adzani', '2018-12-14 07:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3558, 126, 'Adzani', '2018-12-14 16:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3559, 126, 'Adzani', '2018-12-17 08:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3560, 126, 'Adzani', '2018-12-17 18:27:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3561, 126, 'Adzani', '2018-12-18 07:33:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3562, 126, 'Adzani', '2018-12-18 23:32:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3563, 126, 'Adzani', '2018-12-19 09:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3564, 126, 'Adzani', '2018-12-19 18:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3565, 126, 'Adzani', '2018-12-20 08:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3566, 126, 'Adzani', '2018-12-20 19:38:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3567, 126, 'Adzani', '2018-12-21 08:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3568, 126, 'Adzani', '2018-12-21 18:12:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3569, 126, 'Adzani', '2018-12-26 05:10:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3570, 126, 'Adzani', '2018-12-26 19:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3571, 126, 'Adzani', '2018-12-27 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3572, 126, 'Adzani', '2018-12-27 17:26:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3573, 126, 'Adzani', '2018-12-28 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3574, 126, 'Adzani', '2018-12-28 17:14:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3575, 127, 'Ilyas', '2018-12-11 12:49:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3576, 127, 'Ilyas', '2018-12-11 18:37:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3577, 127, 'Ilyas', '2018-12-12 07:56:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3578, 127, 'Ilyas', '2018-12-12 19:13:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3579, 127, 'Ilyas', '2018-12-13 07:44:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3580, 127, 'Ilyas', '2018-12-13 19:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3581, 127, 'Ilyas', '2018-12-14 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3582, 127, 'Ilyas', '2018-12-14 18:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3583, 127, 'Ilyas', '2018-12-17 07:36:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3584, 127, 'Ilyas', '2018-12-17 18:45:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3585, 127, 'Ilyas', '2018-12-18 17:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3586, 127, 'Ilyas', '2018-12-19 17:47:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3587, 127, 'Ilyas', '2018-12-20 08:05:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3588, 127, 'Ilyas', '2018-12-20 17:51:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3589, 127, 'Ilyas', '2018-12-21 08:01:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3590, 127, 'Ilyas', '2018-12-21 17:11:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3591, 127, 'Ilyas', '2018-12-26 07:57:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3592, 127, 'Ilyas', '2018-12-26 18:41:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3593, 127, 'Ilyas', '2018-12-27 08:00:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3594, 127, 'Ilyas', '2018-12-27 17:43:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3595, 128, 'Vinsa', '2018-12-28 08:22:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3596, 128, 'Vinsa', '2018-12-31 16:34:00', NULL, 1, NULL, 1, 77);
INSERT INTO `tr_absensi` VALUES (3597, 56, 'Adi P', '2018-12-18 07:48:21', NULL, 1, NULL, 1, 77);
COMMIT;

-- ----------------------------
-- Table structure for tr_indikator_template
-- ----------------------------
DROP TABLE IF EXISTS `tr_indikator_template`;
CREATE TABLE `tr_indikator_template` (
  `id_indikator_template` int(11) NOT NULL AUTO_INCREMENT,
  `nm_indikator_template` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_indikator_template`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tr_indikator_template
-- ----------------------------
BEGIN;
INSERT INTO `tr_indikator_template` VALUES (9, 'Template 1', 1, 77);
INSERT INTO `tr_indikator_template` VALUES (10, 'KEPUASAN KERJA TERHADAP IMBALAN KERJA', 1, 77);
INSERT INTO `tr_indikator_template` VALUES (11, 'KEPUASAN KERJA TERHADAP SUPERVISI ATASAN', 1, 77);
INSERT INTO `tr_indikator_template` VALUES (12, 'KEPUASAN KERJA TERHADAP REKAN KERJA', 1, 77);
INSERT INTO `tr_indikator_template` VALUES (13, 'KEPUASAN KERJA TERHADAP PROMOSI', 1, 77);
COMMIT;

-- ----------------------------
-- Procedure structure for p_insert_inspeksi_detail
-- ----------------------------
DROP PROCEDURE IF EXISTS `p_insert_inspeksi_detail`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insert_inspeksi_detail`(IN p_id_inspeksi int, IN p_id_perusahaan int, IN p_id_bu int)
BEGIN
 DECLARE done INT DEFAULT FALSE;
 DECLARE a INT;
 DECLARE b VARCHAR(255);

 DECLARE cur1 CURSOR FOR SELECT id_cek, nm_cek FROM ref_cek where id_perusahaan = p_id_perusahaan and active = 1 ;

 DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
 	
 OPEN cur1;
 read_loop: LOOP
 FETCH cur1 INTO a, b;
 		
 IF done THEN
 LEAVE read_loop;
 END IF;
 		
 INSERT INTO tr_inspeksi_detail (id_inspeksi, id_cek, nm_cek, id_perusahaan, id_bu, status) VALUES (p_id_inspeksi, a, b, p_id_perusahaan, p_id_bu, 0);
	
 END LOOP;
 CLOSE cur1;

END;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for p_insert_level
-- ----------------------------
DROP PROCEDURE IF EXISTS `p_insert_level`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insert_level`(IN p_id_level int, IN p_id_perusahaan int)
BEGIN
 DECLARE done INT DEFAULT FALSE;
 DECLARE a_id_menu_details INT;

 DECLARE cur1 CURSOR FOR SELECT id_menu_details FROM ref_menu_details ;

 DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
 	
 OPEN cur1;
 read_loop: LOOP
 FETCH cur1 INTO a_id_menu_details;
 		
 IF done THEN
 LEAVE read_loop;
 END IF;
 		
 INSERT INTO ref_menu_details_access (id_level, id_menu_details, active, id_perusahaan) VALUES (p_id_level, a_id_menu_details, 0, p_id_perusahaan);
	
 END LOOP;
 CLOSE cur1;

END;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for p_insert_level_group
-- ----------------------------
DROP PROCEDURE IF EXISTS `p_insert_level_group`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insert_level_group`(IN p_id_level int, IN p_id_perusahaan int)
BEGIN
 DECLARE done INT DEFAULT FALSE;
 DECLARE a_id_menu_groups INT;

 DECLARE cur1 CURSOR FOR SELECT id_menu_groups FROM ref_menu_groups ;

 DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
 	
 OPEN cur1;
 read_loop: LOOP
 FETCH cur1 INTO a_id_menu_groups;
 		
 IF done THEN
 LEAVE read_loop;
 END IF;
 		
 INSERT INTO ref_menu_groups_access (id_level, id_menu_groups, active, id_perusahaan) VALUES (p_id_level, a_id_menu_groups, 0, p_id_perusahaan);
	
 END LOOP;
 CLOSE cur1;

END;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for p_insert_survei
-- ----------------------------
DROP PROCEDURE IF EXISTS `p_insert_survei`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insert_survei`(IN p_id_survei int, IN p_id_perusahaan int)
BEGIN
 DECLARE done INT DEFAULT FALSE;
 DECLARE a INT;
 DECLARE b VARCHAR(255);

 DECLARE cur1 CURSOR FOR SELECT id_cek, nm_cek FROM ref_cek where id_perusahaan = p_id_perusahaan and active = 1 ;

 DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
 	
 OPEN cur1;
 read_loop: LOOP
 FETCH cur1 INTO a, b;
 		
 IF done THEN
 LEAVE read_loop;
 END IF;
 		
 INSERT INTO tr_survei_detail (id_survei, id_cek, nm_cek, id_perusahaan, status) VALUES (p_id_survei, a, b, p_id_perusahaan, 0);
	
 END LOOP;
 CLOSE cur1;

END;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for p_insert_survei_responden
-- ----------------------------
DROP PROCEDURE IF EXISTS `p_insert_survei_responden`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insert_survei_responden`(IN p_id_survei INT, IN p_id_perusahaan INT, in p_id_session varchar(255))
BEGIN
 DECLARE done INT DEFAULT FALSE;
 DECLARE a INT;
 DECLARE b VARCHAR(255);

 DECLARE cur1 CURSOR FOR SELECT id_cek, nm_cek FROM ref_cek WHERE id_perusahaan = p_id_perusahaan AND active = 1 ;

 DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
 	
 OPEN cur1;
 read_loop: LOOP
 FETCH cur1 INTO a, b;
 		
 IF done THEN
 LEAVE read_loop;
 END IF;
 		
 INSERT INTO tr_survei_responden (id_session, id_survei, id_cek, nm_cek, id_perusahaan, STATUS) VALUES (p_id_session, p_id_survei, a, b, p_id_perusahaan, 1);
	
 END LOOP;
 CLOSE cur1;

END;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for p_menudetails
-- ----------------------------
DROP PROCEDURE IF EXISTS `p_menudetails`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_menudetails`(IN p_id_menu_details int, IN p_cuser int)
BEGIN
 DECLARE done INT DEFAULT FALSE;
 DECLARE a_id_level, a_id_perusahaan INT;
 

 DECLARE cur1 CURSOR FOR SELECT id_level, id_perusahaan FROM ref_level  ;

 DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
 	
 OPEN cur1;
 read_loop: LOOP
 FETCH cur1 INTO a_id_level, a_id_perusahaan;
 		
 IF done THEN
 LEAVE read_loop;
 END IF;
 		
 INSERT INTO ref_menu_details_access (id_level, id_menu_details, active, cdate, cuser, id_perusahaan) VALUES (a_id_level, p_id_menu_details, 0, CURRENT_TIMESTAMP(), p_cuser, a_id_perusahaan);
	
 END LOOP;
 CLOSE cur1;

END;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for p_menugroup
-- ----------------------------
DROP PROCEDURE IF EXISTS `p_menugroup`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_menugroup`(IN p_id_menu_groups int, IN p_cuser int)
BEGIN
 DECLARE done INT DEFAULT FALSE;
 DECLARE a_id_level, a_id_perusahaan INT;
 

 DECLARE cur1 CURSOR FOR SELECT id_level, id_perusahaan FROM ref_level   ;

 DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
 	
 OPEN cur1;
 read_loop: LOOP
 FETCH cur1 INTO a_id_level, a_id_perusahaan;
 		
 IF done THEN
 LEAVE read_loop;
 END IF;
 		
 INSERT INTO ref_menu_groups_access (id_level, id_menu_groups, active, cdate, cuser, id_perusahaan) VALUES (a_id_level, p_id_menu_groups , 0, CURRENT_TIMESTAMP(), p_cuser, a_id_perusahaan);
	
 END LOOP;
 CLOSE cur1;

END;
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_keluarga
-- ----------------------------
DROP TRIGGER IF EXISTS `before_insert_keluarga`;
delimiter ;;
CREATE TRIGGER `before_insert_keluarga` BEFORE INSERT ON `ref_keluarga` FOR EACH ROW begin
set new.cdate = DATE_FORMAT(current_timestamp(), "%Y-%m-%d %H:%i:%s");
if new.status_keluarga = "PASANGAN" then
update ref_pegawai set pasangan_pegawai = pasangan_pegawai + 1 where id_pegawai = new.id_pegawai and id_perusahaan = new.id_perusahaan;
else 
update ref_pegawai set anak_pegawai = anak_pegawai + 1 where id_pegawai = new.id_pegawai and id_perusahaan = new.id_perusahaan;
end if;
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_keluarga
-- ----------------------------
DROP TRIGGER IF EXISTS `before_update_keluarga`;
delimiter ;;
CREATE TRIGGER `before_update_keluarga` BEFORE UPDATE ON `ref_keluarga` FOR EACH ROW begin
set new.cdate = DATE_FORMAT(current_timestamp(), "%Y-%m-%d %H:%i:%s");
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_keluarga
-- ----------------------------
DROP TRIGGER IF EXISTS `before_delete_keluarga`;
delimiter ;;
CREATE TRIGGER `before_delete_keluarga` BEFORE DELETE ON `ref_keluarga` FOR EACH ROW BEGIN
if old.status_keluarga = "PASANGAN" then
update ref_pegawai set pasangan_pegawai = pasangan_pegawai - 1 where id_pegawai = old.id_pegawai and id_perusahaan = old.id_perusahaan;
else 
update ref_pegawai set anak_pegawai = anak_pegawai - 1 where id_pegawai = old.id_pegawai and id_perusahaan = old.id_perusahaan;
end if;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_level
-- ----------------------------
DROP TRIGGER IF EXISTS `ref_level_BEFORE_INSERT`;
delimiter ;;
CREATE TRIGGER `ref_level_BEFORE_INSERT` BEFORE INSERT ON `ref_level` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_level
-- ----------------------------
DROP TRIGGER IF EXISTS `ref_level_after_inser`;
delimiter ;;
CREATE TRIGGER `ref_level_after_inser` AFTER INSERT ON `ref_level` FOR EACH ROW begin
call p_insert_level(new.id_level, new.id_perusahaan);
call p_insert_level_group(new.id_level, new.id_perusahaan);
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_level
-- ----------------------------
DROP TRIGGER IF EXISTS `ref_level_before_delete`;
delimiter ;;
CREATE TRIGGER `ref_level_before_delete` BEFORE DELETE ON `ref_level` FOR EACH ROW begin

delete from ref_menu_groups_access where id_level = old.id_level;
delete from ref_menu_details_access where id_level = old.id_level;
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_menu_details
-- ----------------------------
DROP TRIGGER IF EXISTS `ref_menu_details_BEFORE_INSERT`;
delimiter ;;
CREATE TRIGGER `ref_menu_details_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_details` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_menu_details
-- ----------------------------
DROP TRIGGER IF EXISTS `ref_menudetail_after_insert`;
delimiter ;;
CREATE TRIGGER `ref_menudetail_after_insert` AFTER INSERT ON `ref_menu_details` FOR EACH ROW begin

call p_menudetails(new.id_menu_details, new.cuser);

end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_menu_details
-- ----------------------------
DROP TRIGGER IF EXISTS `before_delete_ref_menudetails`;
delimiter ;;
CREATE TRIGGER `before_delete_ref_menudetails` BEFORE DELETE ON `ref_menu_details` FOR EACH ROW begin
delete from ref_menu_details_access where id_menu_details = old.id_menu_details ;
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_menu_details_access
-- ----------------------------
DROP TRIGGER IF EXISTS `ref_menu_details_access_BEFORE_INSERT`;
delimiter ;;
CREATE TRIGGER `ref_menu_details_access_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_details_access` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_menu_groups
-- ----------------------------
DROP TRIGGER IF EXISTS `ref_menu_groups_BEFORE_INSERT`;
delimiter ;;
CREATE TRIGGER `ref_menu_groups_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_groups` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_menu_groups
-- ----------------------------
DROP TRIGGER IF EXISTS `ref_menugroup_after_insert`;
delimiter ;;
CREATE TRIGGER `ref_menugroup_after_insert` AFTER INSERT ON `ref_menu_groups` FOR EACH ROW begin

call p_menugroup(new.id_menu_groups, new.cuser);

end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_menu_groups_access
-- ----------------------------
DROP TRIGGER IF EXISTS `ref_menu_groups_access_BEFORE_INSERT`;
delimiter ;;
CREATE TRIGGER `ref_menu_groups_access_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_groups_access` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_pegawai
-- ----------------------------
DROP TRIGGER IF EXISTS `before_insert_pegawai`;
delimiter ;;
CREATE TRIGGER `before_insert_pegawai` BEFORE INSERT ON `ref_pegawai` FOR EACH ROW begin
set new.cdate = DATE_FORMAT(current_timestamp(), "%Y-%m-%d %H:%i:%s");
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_pegawai
-- ----------------------------
DROP TRIGGER IF EXISTS `before_update_pegawai`;
delimiter ;;
CREATE TRIGGER `before_update_pegawai` BEFORE UPDATE ON `ref_pegawai` FOR EACH ROW begin
set new.cdate = DATE_FORMAT(current_timestamp(), "%Y-%m-%d %H:%i:%s");
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_pendidikan
-- ----------------------------
DROP TRIGGER IF EXISTS `before_insert_pendidikan`;
delimiter ;;
CREATE TRIGGER `before_insert_pendidikan` BEFORE INSERT ON `ref_pendidikan` FOR EACH ROW begin
set new.cdate = DATE_FORMAT(current_timestamp(), "%Y-%m-%d %H:%i:%s");
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_pendidikan
-- ----------------------------
DROP TRIGGER IF EXISTS `before_update_pendidikan`;
delimiter ;;
CREATE TRIGGER `before_update_pendidikan` BEFORE UPDATE ON `ref_pendidikan` FOR EACH ROW begin
set new.cdate = DATE_FORMAT(current_timestamp(), "%Y-%m-%d %H:%i:%s");
end
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_perusahaan
-- ----------------------------
DROP TRIGGER IF EXISTS `ref_perusahaan_BEFORE_INSERT`;
delimiter ;;
CREATE TRIGGER `ref_perusahaan_BEFORE_INSERT` BEFORE INSERT ON `ref_perusahaan` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_user
-- ----------------------------
DROP TRIGGER IF EXISTS `ref_user_BEFORE_INSERT`;
delimiter ;;
CREATE TRIGGER `ref_user_BEFORE_INSERT` BEFORE INSERT ON `ref_user` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tr_absensi
-- ----------------------------
DROP TRIGGER IF EXISTS `before_insert_absensi`;
delimiter ;;
CREATE TRIGGER `before_insert_absensi` BEFORE INSERT ON `tr_absensi` FOR EACH ROW begin
set new.cdate = DATE_FORMAT(current_timestamp(), "%Y-%m-%d %H:%i:%s");
end
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
