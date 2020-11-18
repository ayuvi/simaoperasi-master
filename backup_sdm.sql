/*
SQLyog Professional v12.4.3 (64 bit)
MySQL - 10.1.13-MariaDB : Database - surveisdm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`surveisdm` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `surveisdm`;

/*Table structure for table `langs` */

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

/*Data for the table `langs` */

insert  into `langs`(`lang_srl`,`inkomaro`,`english`,`indonesian`,`korean`) values 
(1,'Approval','Approval','Persetujuan',NULL);

/*Table structure for table `ref_bidang` */

DROP TABLE IF EXISTS `ref_bidang`;

CREATE TABLE `ref_bidang` (
  `id_bidang` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis` int(11) DEFAULT NULL,
  `nm_bidang` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bidang`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ref_bidang` */

insert  into `ref_bidang`(`id_bidang`,`id_jenis`,`nm_bidang`,`active`,`id_perusahaan`) values 
(1,1,'Tanaman',1,77);

/*Table structure for table `ref_bu` */

DROP TABLE IF EXISTS `ref_bu`;

CREATE TABLE `ref_bu` (
  `id_bu` int(11) NOT NULL AUTO_INCREMENT,
  `kd_bu` varchar(255) DEFAULT NULL,
  `id_divre` int(11) DEFAULT NULL,
  `nm_bu` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

/*Data for the table `ref_bu` */

insert  into `ref_bu`(`id_bu`,`kd_bu`,`id_divre`,`nm_bu`,`active`,`id_perusahaan`) values 
(1,'D1.001',1,'Banda Aceh',1,77),
(2,'D1.002',1,'Bandar Lampung',1,77),
(3,'D1.003',1,'Bandara Soekarno Hatta',1,77),
(4,'D1.004',1,'Bandung',1,77),
(5,'D1.005',1,'Batam',1,77),
(6,'D1.006',1,'Bengkulu',1,77),
(7,'D1.007',1,'Bogor',1,77),
(8,'D1.008',1,'Jakarta',1,77),
(9,'D1.009',1,'Jambi',1,77),
(10,'D1.010',1,'Medan',1,77),
(11,'D1.011',1,'Padang',1,77),
(12,'D1.012',1,'Palembang',1,77),
(13,'D1.013',1,'Pangkal Pinang',1,77),
(14,'D1.014',1,'Pekanbaru',1,77),
(15,'D1.015',1,'Serang',1,77),
(16,'D1.016',1,'Koridor 1 & 8',1,77),
(17,'D1.017',1,'Angkutan Barang',1,77),
(18,'D2.001',2,'Banjarmasin',1,77),
(19,'D2.002',2,'Cilacap',1,77),
(20,'D2.003',2,'Palangkaraya',1,77),
(21,'D2.004',2,'Pontianak',1,77),
(22,'D2.005',2,'Purwokerto',1,77),
(23,'D2.006',2,'Purworejo',1,77),
(24,'D2.007',2,'Samarinda',1,77),
(25,'D2.008',2,'Semarang',1,77),
(26,'D2.009',2,'Surakarta',1,77),
(27,'D2.010',2,'Tanjung Selor',1,77),
(28,'D2.011',2,'Yogyakarta',1,77),
(29,'D3.001',3,'Banyuwangi',1,77),
(30,'D3.002',3,'Denpasar',1,77),
(31,'D3.003',3,'Ende',1,77),
(32,'D3.004',3,'Jember',1,77),
(33,'D3.005',3,'Kefamenanu',1,77),
(34,'D3.006',3,'Kendari',1,77),
(35,'D3.007',3,'Kupang',1,77),
(36,'D3.008',3,'Makassar',1,77),
(37,'D3.009',3,'Malang',1,77),
(38,'D3.010',3,'Mamuju',1,77),
(39,'D3.011',3,'Mataram',1,77),
(40,'D3.012',3,'Palu',1,77),
(41,'D3.013',3,'Pamekasan',1,77),
(42,'D3.014',3,'Ponorogo',1,77),
(43,'D3.015',3,'Surabaya',1,77),
(44,'D3.016',3,'Waingapu',1,77),
(45,'D4.001',4,'Ambon',1,77),
(46,'D4.002',4,'Biak',1,77),
(47,'D4.003',4,'Gorontalo',1,77),
(48,'D4.004',4,'Halmahera',1,77),
(49,'D4.005',4,'Jayapura',1,77),
(50,'D4.006',4,'Manado',1,77),
(51,'D4.007',4,'Manokwari',1,77),
(52,'D4.008',4,'Merauke',1,77),
(53,'D4.009',4,'Mimika',1,77),
(54,'D4.010',4,'Nabire',1,77),
(55,'D4.011',4,'Namlea',1,77),
(56,'D4.012',4,'Sarmi',1,77),
(57,'D4.013',4,'Serui',1,77),
(58,'D4.014',4,'Sorong',1,77),
(59,'D4.015',4,'Sorong Selatan',1,77),
(60,'D0.001',0,'Kantor Pusat',1,77),
(61,'D1',1,'Divre 1',1,77),
(62,'D2',2,'Divre 2',1,77),
(63,'D3',3,'Divre 3',1,77),
(64,'D4',4,'Divre 4',1,77);

/*Table structure for table `ref_bu_access` */

DROP TABLE IF EXISTS `ref_bu_access`;

CREATE TABLE `ref_bu_access` (
  `id_bu_access` int(11) NOT NULL AUTO_INCREMENT,
  `id_bu` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `active` tinyint(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bu_access`) USING BTREE,
  UNIQUE KEY `uq_bu_access` (`id_bu`,`id_user`,`id_perusahaan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `ref_bu_access` */

insert  into `ref_bu_access`(`id_bu_access`,`id_bu`,`id_user`,`active`,`id_perusahaan`) values 
(1,1,1,1,77),
(2,2,1,1,77),
(3,1,5,1,77),
(4,2,3,1,77),
(5,1,6,1,77),
(6,2,7,1,77);

/*Table structure for table `ref_cek` */

DROP TABLE IF EXISTS `ref_cek`;

CREATE TABLE `ref_cek` (
  `id_cek` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis` int(11) DEFAULT NULL,
  `nm_cek` varchar(255) DEFAULT NULL,
  `penilaian` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `critical` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cek`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `ref_cek` */

insert  into `ref_cek`(`id_cek`,`id_jenis`,`nm_cek`,`penilaian`,`deskripsi`,`critical`,`active`,`cdate`,`cuser`,`id_perusahaan`) values 
(1,9,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan','1','',0,1,NULL,NULL,77),
(2,9,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan','1','',0,1,NULL,NULL,77),
(3,9,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri','1','',0,1,NULL,NULL,77),
(4,9,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya','1','',0,1,NULL,NULL,77),
(5,9,'Saya senang dengan pekerjaan yang menarik dan menantang','1','',0,1,NULL,NULL,77),
(6,10,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga','1','',0,1,NULL,NULL,77),
(7,10,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya','1','',0,1,NULL,NULL,77),
(8,10,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji','1','',0,1,NULL,NULL,77),
(9,10,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari','1','',0,1,NULL,NULL,77),
(10,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan','1','',0,1,NULL,NULL,77),
(11,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan','1','',0,1,NULL,NULL,77),
(12,11,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja','1','',0,1,NULL,NULL,77),
(13,11,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya','1','',0,1,NULL,NULL,77),
(14,11,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi','1','',0,1,NULL,NULL,77),
(15,11,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya','1','',0,1,NULL,NULL,77),
(16,12,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya','1','',0,1,NULL,NULL,77),
(17,12,'Rekan kerja saya memiliki motivasi kerja yang tinggi','1','',0,1,NULL,NULL,77),
(18,12,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja','1','',0,1,NULL,NULL,77),
(19,12,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya','1','',0,1,NULL,NULL,77),
(20,13,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini','1','',0,1,NULL,NULL,77),
(21,13,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini','1','',0,1,NULL,NULL,77),
(22,13,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini','1','',0,1,NULL,NULL,77);

/*Table structure for table `ref_divre` */

DROP TABLE IF EXISTS `ref_divre`;

CREATE TABLE `ref_divre` (
  `id_divre` int(11) NOT NULL AUTO_INCREMENT,
  `kd_divre` varchar(255) DEFAULT NULL,
  `nm_divre` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_divre`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `ref_divre` */

insert  into `ref_divre`(`id_divre`,`kd_divre`,`nm_divre`,`active`,`id_perusahaan`) values 
(1,NULL,'Divre I',1,77),
(2,NULL,'Divre II',1,77),
(3,NULL,'Divre III',1,77);

/*Table structure for table `ref_driver` */

DROP TABLE IF EXISTS `ref_driver`;

CREATE TABLE `ref_driver` (
  `id_driver` int(11) NOT NULL AUTO_INCREMENT,
  `nm_driver` varchar(255) DEFAULT NULL,
  `nik_ktp` varchar(255) DEFAULT NULL,
  `no_sim` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_driver`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ref_driver` */

insert  into `ref_driver`(`id_driver`,`nm_driver`,`nik_ktp`,`no_sim`,`tgl_lahir`,`active`,`id_perusahaan`) values 
(1,'Asep Sariudin','0798234727492794','89876734','1989-01-20',1,77);

/*Table structure for table `ref_golongan` */

DROP TABLE IF EXISTS `ref_golongan`;

CREATE TABLE `ref_golongan` (
  `id_golongan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_golongan` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_golongan`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `ref_golongan` */

insert  into `ref_golongan`(`id_golongan`,`nm_golongan`,`active`,`id_perusahaan`) values 
(1,'Belum Ada',1,77),
(2,'Ia',1,77),
(3,'Ib',1,77),
(4,'Ic',1,77),
(5,'Id',1,77),
(6,'IIa',1,77),
(7,'IIb',1,77),
(8,'IIc',1,77),
(9,'IId',1,77),
(10,'IIIa',1,77),
(11,'IIIb',1,77),
(12,'IIIc',1,77),
(13,'IIId',1,77),
(14,'IVa',1,77),
(15,'IVb',1,77),
(16,'IVc',1,77),
(17,'IVd',1,77);

/*Table structure for table `ref_jenis` */

DROP TABLE IF EXISTS `ref_jenis`;

CREATE TABLE `ref_jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jenis` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `ref_jenis` */

insert  into `ref_jenis`(`id_jenis`,`nm_jenis`,`active`,`id_perusahaan`) values 
(9,'KEPUASAN KERJA TERHADAP LINGKUP PEKERJAAN',1,77),
(10,'KEPUASAN KERJA TERHADAP IMBALAN KERJA',1,77),
(11,'KEPUASAN KERJA TERHADAP SUPERVISI ATASAN',1,77),
(12,'KEPUASAN KERJA TERHADAP REKAN KERJA',1,77),
(13,'KEPUASAN KERJA TERHADAP PROMOSI',1,77);

/*Table structure for table `ref_kendaraan` */

DROP TABLE IF EXISTS `ref_kendaraan`;

CREATE TABLE `ref_kendaraan` (
  `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT,
  `no_plat` varchar(255) DEFAULT NULL,
  `kd_kendaraan` varchar(255) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `id_segment` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kendaraan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ref_kendaraan` */

insert  into `ref_kendaraan`(`id_kendaraan`,`no_plat`,`kd_kendaraan`,`id_type`,`id_segment`,`active`,`id_perusahaan`) values 
(1,'B1010JKW','4023',NULL,NULL,1,77);

/*Table structure for table `ref_level` */

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

/*Data for the table `ref_level` */

insert  into `ref_level`(`id_level`,`nm_level`,`active`,`cdate`,`cuser`,`id_perusahaan`) values 
(1,'Super Admin',1,'2018-09-17 13:29:04',1,77),
(2,'User',1,'2018-12-19 23:22:36',2,77);

/*Table structure for table `ref_menu_details` */

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `ref_menu_details` */

insert  into `ref_menu_details`(`id_menu_details`,`kd_menu_details`,`nm_menu_details`,`url`,`active`,`position`,`id_menu_groups`,`cdate`,`cuser`) values 
(1,'S01','Level','level',1,1,1,'2016-03-13 19:38:05',NULL),
(2,'S02','User','user',1,2,1,'2016-03-13 19:38:05',NULL),
(3,'S03','BU','bu',1,3,1,'2018-09-17 13:45:40',NULL),
(4,'S04','Jenis','jenis',1,4,2,'2018-09-17 16:36:16',NULL),
(5,'S05','Cek','cek',1,5,2,'2018-09-17 16:41:34',NULL),
(6,'S06','Driver','driver',1,6,2,'2018-09-17 16:54:50',NULL),
(7,'S07','Kendaraan','kendaraan',1,7,2,'2018-09-20 10:58:19',NULL),
(8,'S08','Type','type',1,8,2,'2018-09-20 14:30:45',NULL),
(9,'S09','Segment','segment',1,9,2,'2018-09-20 14:30:57',NULL),
(10,'T01','Fom Inspeksi','inspeksi',1,1,3,'2018-11-01 16:09:10',NULL),
(11,'P01','Template Pertanyaan','survei',1,1,5,'2018-12-17 14:14:18',NULL),
(12,'P02','Isi Pertanyaan','survei/indexnilai',1,2,5,'2018-12-19 23:14:28',NULL),
(13,'R01','Berdasarkan Setiap Pertanyaan','report',1,1,4,'2018-12-26 08:50:35',NULL),
(14,'R02','Berdasarkan Tugas / Posisi','report/indexposisi',1,2,4,'2018-12-26 08:51:30',NULL),
(15,'R03','Berdasarkan Setiap Lokasi','report/indexlokasi',1,3,4,'2018-12-26 08:52:00',NULL),
(16,'R04','Berdasarkan Umur','report/indexumur',1,4,4,'2018-12-26 08:52:30',NULL),
(17,'R05','Berdasarkan Lama Bekerja','report/indexlamabekerja',1,5,4,'2018-12-26 08:53:07',NULL),
(18,'R06','Berdasarkan Pendidikan','report/indexpendidikan',1,6,4,'2018-12-26 08:54:05',NULL),
(19,'R07','Berdasarkan Status Pegawai','report/indexstatus',1,7,4,'2018-12-26 08:54:30',NULL),
(20,'R08','Berdasarkan Golongan','report/indexgolongan',1,8,4,'2018-12-26 08:54:46',NULL),
(21,'R09','Berdasarkan Jenis Kelamin','report/indexjeniskelamin',1,9,4,'2018-12-26 08:55:11',NULL);

/*Table structure for table `ref_menu_details_access` */

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

/*Data for the table `ref_menu_details_access` */

insert  into `ref_menu_details_access`(`id_menu_details_access`,`id_level`,`id_menu_details`,`active`,`cdate`,`cuser`,`id_perusahaan`) values 
(1,1,1,1,'2018-09-17 13:29:04',NULL,77),
(2,1,2,1,'2018-09-17 13:29:04',NULL,77),
(3,1,3,1,'2018-09-17 13:45:40',NULL,77),
(4,1,4,1,'2018-09-17 16:36:16',NULL,77),
(5,1,5,1,'2018-09-17 16:41:34',NULL,77),
(6,1,6,0,'2018-09-17 16:54:50',NULL,77),
(7,1,7,0,'2018-09-20 10:58:19',NULL,77),
(8,1,8,0,'2018-09-20 14:30:45',NULL,77),
(9,1,9,0,'2018-09-20 14:30:57',NULL,77),
(10,1,10,1,'2018-11-01 16:09:10',NULL,77),
(11,1,11,1,'2018-12-17 14:14:18',NULL,77),
(12,1,12,1,'2018-12-19 23:14:28',NULL,77),
(13,2,1,0,'2018-12-19 23:22:36',NULL,77),
(14,2,2,0,'2018-12-19 23:22:36',NULL,77),
(15,2,3,0,'2018-12-19 23:22:36',NULL,77),
(16,2,4,0,'2018-12-19 23:22:36',NULL,77),
(17,2,5,0,'2018-12-19 23:22:36',NULL,77),
(18,2,6,0,'2018-12-19 23:22:36',NULL,77),
(19,2,7,0,'2018-12-19 23:22:36',NULL,77),
(20,2,8,0,'2018-12-19 23:22:36',NULL,77),
(21,2,9,0,'2018-12-19 23:22:36',NULL,77),
(22,2,10,0,'2018-12-19 23:22:36',NULL,77),
(23,2,11,0,'2018-12-19 23:22:36',NULL,77),
(24,2,12,1,'2018-12-19 23:22:36',NULL,77),
(25,1,13,1,'2018-12-26 08:50:35',NULL,77),
(26,2,13,0,'2018-12-26 08:50:35',NULL,77),
(27,1,14,1,'2018-12-26 08:51:30',NULL,77),
(28,2,14,0,'2018-12-26 08:51:30',NULL,77),
(29,1,15,1,'2018-12-26 08:52:00',NULL,77),
(30,2,15,0,'2018-12-26 08:52:00',NULL,77),
(31,1,16,1,'2018-12-26 08:52:30',NULL,77),
(32,2,16,0,'2018-12-26 08:52:30',NULL,77),
(33,1,17,1,'2018-12-26 08:53:07',NULL,77),
(34,2,17,0,'2018-12-26 08:53:07',NULL,77),
(35,1,18,1,'2018-12-26 08:54:05',NULL,77),
(36,2,18,0,'2018-12-26 08:54:05',NULL,77),
(37,1,19,1,'2018-12-26 08:54:30',NULL,77),
(38,2,19,0,'2018-12-26 08:54:30',NULL,77),
(39,1,20,1,'2018-12-26 08:54:46',NULL,77),
(40,2,20,0,'2018-12-26 08:54:46',NULL,77),
(41,1,21,1,'2018-12-26 08:55:11',NULL,77),
(42,2,21,0,'2018-12-26 08:55:11',NULL,77);

/*Table structure for table `ref_menu_groups` */

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `ref_menu_groups` */

insert  into `ref_menu_groups`(`id_menu_groups`,`nm_menu_groups`,`icon`,`active`,`position`,`cdate`,`cuser`) values 
(1,'Settings','fa fa-wrench',1,4,'2016-03-13 19:38:05',1),
(2,'Master','fa fa-database',1,2,'2016-03-13 19:38:05',1),
(3,'Inspeksi','fa fa-calendar-check-o',1,5,'2018-01-25 09:55:34',1),
(4,'Report','fa fa-steam',1,3,'2018-03-08 14:27:40',1),
(5,'Pertanyaan','fa fa-calendar-check-o',1,1,'2018-12-17 14:09:01',1);

/*Table structure for table `ref_menu_groups_access` */

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `ref_menu_groups_access` */

insert  into `ref_menu_groups_access`(`id_menu_groups_access`,`id_menu_groups`,`id_level`,`active`,`cdate`,`cuser`,`id_perusahaan`) values 
(1,1,1,1,'2018-09-17 13:29:04',1,77),
(2,2,1,1,'2018-09-17 13:29:04',1,77),
(3,3,1,0,'2018-09-17 13:29:04',1,77),
(4,4,1,1,'2018-09-17 13:29:04',1,77),
(5,5,1,1,'2018-12-17 14:09:01',1,77),
(6,1,2,0,'2018-12-19 23:22:36',NULL,77),
(7,2,2,0,'2018-12-19 23:22:36',NULL,77),
(8,3,2,0,'2018-12-19 23:22:36',NULL,77),
(9,4,2,0,'2018-12-19 23:22:36',NULL,77),
(10,5,2,1,'2018-12-19 23:22:36',NULL,77);

/*Table structure for table `ref_nilai_cek` */

DROP TABLE IF EXISTS `ref_nilai_cek`;

CREATE TABLE `ref_nilai_cek` (
  `id_nilai_cek` int(11) NOT NULL AUTO_INCREMENT,
  `id_cek` int(11) DEFAULT NULL,
  `nm_nilai_cek` varchar(255) DEFAULT NULL,
  `skors` double DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nilai_cek`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8;

/*Data for the table `ref_nilai_cek` */

insert  into `ref_nilai_cek`(`id_nilai_cek`,`id_cek`,`nm_nilai_cek`,`skors`,`active`,`cuser`,`cdate`,`id_perusahaan`) values 
(1,1,'Menyala',10,1,NULL,NULL,77),
(2,1,'Tidak Menyala / Redup',0,1,1,NULL,77),
(3,2,'Menyala',10,1,NULL,NULL,77),
(4,2,'Tidak Menyala / Redup',0,1,NULL,NULL,77),
(5,3,'Menyala',10,1,NULL,NULL,77),
(6,3,'Tidak Menyala / Redup',0,1,NULL,NULL,77),
(7,4,'Menyala',10,1,NULL,NULL,77),
(8,4,'Tidak Menyala / Redup',0,1,NULL,NULL,77),
(9,5,'Menyala',10,1,NULL,NULL,77),
(10,5,'Tidak Menyala / Redup',0,1,NULL,NULL,77),
(11,6,'Menyala',10,1,NULL,NULL,77),
(12,6,'Tidak Menyala / Redup',0,1,NULL,NULL,77),
(13,7,'Menyala',10,1,NULL,NULL,77),
(14,7,'Tidak Menyala',0,1,NULL,NULL,77),
(15,8,'Menyala',10,1,NULL,NULL,77),
(16,8,'Tidak Menyala',0,1,NULL,NULL,77),
(17,9,'Menyala',10,1,NULL,NULL,77),
(18,9,'Tidak Menyala',0,1,NULL,NULL,77),
(19,10,'Menyala',10,1,NULL,NULL,77),
(20,10,'Tidak Menyala',0,1,NULL,NULL,77),
(21,11,'Menyala',10,1,NULL,NULL,77),
(22,11,'Tidak Menyala',0,1,NULL,NULL,77),
(23,12,'Menyala',10,1,NULL,NULL,77),
(24,12,'Tidak Menyala',0,1,NULL,NULL,77),
(25,13,'Menyala',10,1,NULL,NULL,77),
(26,13,'Tidak Menyala / Redup',0,1,NULL,NULL,77),
(27,14,'Menyala',10,1,NULL,NULL,77),
(28,14,'Tidak Menyala / Redup',0,1,NULL,NULL,77),
(29,15,'Menyala',10,1,NULL,NULL,77),
(30,15,'Tidak Menyala',0,1,NULL,NULL,77),
(31,16,'Menyala',10,1,NULL,NULL,77),
(32,16,'Tidak Menyala',0,1,NULL,NULL,77),
(33,17,'Menyala',10,1,NULL,NULL,77),
(34,17,'Tidak Menyala',0,1,NULL,NULL,77),
(35,18,'Menyala',10,1,NULL,NULL,77),
(36,18,'Tidak Menyala',0,1,NULL,NULL,77),
(37,19,'Menyala',10,1,NULL,NULL,77),
(38,19,'Tidak Menyala',0,1,NULL,NULL,77),
(39,20,'Menyala',10,1,NULL,NULL,77),
(40,20,'Tidak Menyala',0,1,NULL,NULL,77),
(41,21,'Menyala',10,1,NULL,NULL,77),
(42,21,'Tidak Menyala',0,1,NULL,NULL,77),
(43,22,'Menyala',10,1,NULL,NULL,77),
(44,22,'Tidak Menyala',0,1,NULL,NULL,77),
(45,23,'Menyala',10,1,NULL,NULL,77),
(46,23,'Tidak Menyala',0,1,NULL,NULL,77),
(47,24,'Ada',10,1,NULL,NULL,77),
(48,24,'Tidak Ada',0,1,NULL,NULL,77),
(49,24,'Ada, Tidak Berfungsi',0,1,NULL,NULL,77),
(50,25,'Ada, dan Sesuai',10,1,NULL,NULL,77),
(51,25,'Ada, Tidak Sesuai',0,1,NULL,NULL,77),
(52,26,'Berfungsi',10,1,NULL,NULL,77),
(53,26,'Tidak Berfungsi',0,1,NULL,NULL,77),
(54,27,'Berfungsi',10,1,NULL,NULL,77),
(55,27,'Tidak Berfungsi',0,1,NULL,NULL,77),
(56,28,'Ada & Berfungsi',10,1,NULL,NULL,77),
(57,28,'Ada Tidak Berfungsi',0,1,NULL,NULL,77),
(58,28,'Tidak Ada',0,1,NULL,NULL,77),
(59,29,'Ada & Berfungsi',10,1,NULL,NULL,77),
(60,29,'Ada Tidak Berfungsi',0,1,NULL,NULL,77),
(61,29,'Tidak Ada',0,1,NULL,NULL,77),
(62,30,'Ada & Laik',10,1,NULL,NULL,77),
(63,30,'Ada & Tidak Laik',0,1,NULL,NULL,77),
(64,30,'Tidak Ada',0,1,NULL,NULL,77),
(65,31,'Ada ',10,1,NULL,NULL,77),
(66,31,'Ada Tidak Berfungsi',0,1,NULL,NULL,77),
(67,31,'Tidak Ada',0,1,NULL,NULL,77),
(68,32,'Ada ',10,1,NULL,NULL,77),
(69,32,'Tidak Ada',0,1,NULL,NULL,77),
(70,33,'Ada ',10,1,NULL,NULL,77),
(71,33,'Tidak Ada',0,1,NULL,NULL,77),
(72,34,'Ada ',10,1,NULL,NULL,77),
(73,34,'Ada Tidak Berfungsi',0,1,NULL,NULL,77),
(74,34,'Tidak Ada',0,1,NULL,NULL,77),
(75,35,'Ada ',10,1,NULL,NULL,77),
(76,35,'Tidak Ada',0,1,NULL,NULL,77),
(77,36,'Baik / Laik',0,1,NULL,NULL,77),
(78,36,'Tidak Baik / Tidak Laik',0,1,NULL,NULL,77),
(79,37,'Vulkanisir',0,1,NULL,NULL,77),
(80,37,'Tidak Vulkanisir',0,1,NULL,NULL,77),
(81,38,'Ada, Berfungsi',10,1,NULL,NULL,77),
(82,38,'Ada Tidak Berfungsi',0,1,NULL,NULL,77),
(83,38,'Tidak Ada',0,1,NULL,NULL,77),
(84,39,'Ada ',10,1,NULL,NULL,77),
(85,39,'Tidak Ada',0,1,NULL,NULL,77),
(86,40,'Ada ',10,1,NULL,NULL,77),
(87,40,'Tidak Ada',0,1,NULL,NULL,77),
(88,41,'Ada & Berfungsi',10,1,NULL,NULL,77),
(89,41,'Ada Tidak Berfungsi',0,1,NULL,NULL,77),
(90,41,'Tidak Ada',0,1,NULL,NULL,77),
(91,42,'Ada ',10,1,NULL,NULL,77),
(92,42,'Tidak Ada',0,1,NULL,NULL,77),
(93,43,'Ada, Belum Kadaluarsa',0,1,NULL,NULL,77),
(94,43,'Tidak Ada',0,1,NULL,NULL,77),
(95,43,'Ada, Kadaluarsa',0,1,NULL,NULL,77),
(96,44,'Berfungsi',10,1,NULL,NULL,77),
(97,44,'Tidak Berfungsi',0,1,NULL,NULL,77),
(98,45,'Ada ',10,1,NULL,NULL,77),
(99,45,'Tidak Ada',0,1,NULL,NULL,77),
(100,46,'Baik',10,1,NULL,NULL,77),
(101,46,'Buruk',0,1,NULL,NULL,77),
(102,47,'Baik',10,1,NULL,NULL,77),
(103,47,'Buruk',0,1,NULL,NULL,77),
(104,48,'Spelling Baik',10,1,NULL,NULL,77),
(105,48,'Spelling Tidak Baik',0,1,NULL,NULL,77),
(106,49,'Sehat',10,1,NULL,NULL,77),
(107,49,'Tidak Sehat',0,1,NULL,NULL,77),
(108,50,'Kompeten',10,1,NULL,NULL,77),
(109,50,'Tidak Kompeten',0,1,NULL,NULL,77),
(110,51,'Sesuai',10,1,NULL,NULL,77),
(111,51,'Tidak Sesuai',0,1,NULL,NULL,77),
(112,52,'Sesuai',10,1,NULL,NULL,77),
(113,52,'Tidak Sesuai',0,1,NULL,NULL,77),
(114,53,'Ada ',10,1,NULL,NULL,77),
(115,53,'Tidak Ada',0,1,NULL,NULL,77),
(116,54,'Ada, Tidak Menghalangi ',0,1,NULL,NULL,77),
(117,54,'Ada, Menghalangi ',0,1,NULL,NULL,77),
(118,54,'Tidak Ada',0,1,NULL,NULL,77),
(119,55,'Ada ',10,1,NULL,NULL,77),
(120,55,'Tidak Ada',0,1,NULL,NULL,77),
(121,56,'Ada & Berfungsi',10,1,NULL,NULL,77),
(122,56,'Ada Tidak Berfungsi',0,1,NULL,NULL,77),
(123,56,'Tidak Ada',0,1,NULL,NULL,77),
(124,57,'Ada & Berfungsi',10,1,NULL,NULL,77),
(125,57,'Ada Tidak Berfungsi',0,1,NULL,NULL,77),
(126,57,'Tidak Ada',0,1,NULL,NULL,77),
(127,58,'Ada & Berfungsi',10,1,NULL,NULL,77),
(128,58,'Ada Tidak Berfungsi',0,1,NULL,NULL,77),
(129,58,'Tidak Ada',0,1,NULL,NULL,77),
(130,59,'Ada & Berfungsi',10,1,NULL,NULL,77),
(131,59,'Ada Tidak Berfungsi',0,1,NULL,NULL,77),
(132,59,'Tidak Ada',0,1,NULL,NULL,77),
(133,60,'Sangat Tidak Setuju',1,1,1,NULL,77),
(134,60,'Tidak Setuju',2,1,1,NULL,77),
(135,60,'Kurang Setuju',3,1,1,NULL,77),
(136,60,'Setuju',4,1,1,NULL,77),
(137,60,'Sangat Setuju',5,1,1,NULL,77),
(138,61,'Sangat Tidak Setuju',1,1,1,NULL,77),
(139,61,'Tidak Setuju',2,1,1,NULL,77),
(140,61,'Kurang Setuju',3,1,1,NULL,77),
(141,61,'Setuju',4,1,1,NULL,77),
(142,61,'Sangat Setuju',5,1,1,NULL,77),
(143,62,'Sangat Tidak Setuju',1,1,1,NULL,77),
(144,62,'Tidak Setuju',2,1,1,NULL,77),
(145,62,'Kurang Setuju',3,1,1,NULL,77),
(146,62,'Setuju',4,1,1,NULL,77),
(147,62,'Sangat Setuju',5,1,1,NULL,77),
(148,63,'Sangat Tidak Setuju',1,1,1,NULL,77),
(149,63,'Tidak Setuju',2,1,1,NULL,77),
(150,63,'Kurang Setuju',3,1,1,NULL,77),
(151,63,'Setuju',4,1,1,NULL,77),
(152,63,'Sangat Setuju',5,1,1,NULL,77),
(153,64,'Sangat Tidak Setuju',1,1,1,NULL,77),
(154,64,'Tidak Setuju',2,1,1,NULL,77),
(155,64,'Kurang Setuju',3,1,1,NULL,77),
(156,64,'Setuju',4,1,1,NULL,77),
(157,64,'Sangat Setuju',5,1,1,NULL,77),
(158,65,'Sangat Tidak Setuju',1,1,1,NULL,77),
(159,65,'Tidak Setuju',2,1,1,NULL,77),
(160,65,'Kurang Setuju',3,1,1,NULL,77),
(161,65,'Setuju',4,1,1,NULL,77),
(162,65,'Sangat Setuju',5,1,1,NULL,77),
(163,66,'Sangat Tidak Setuju',1,1,1,NULL,77),
(164,66,'Tidak Setuju',2,1,1,NULL,77),
(165,66,'Kurang Setuju',3,1,1,NULL,77),
(166,66,'Setuju',4,1,1,NULL,77),
(167,66,'Sangat Setuju',5,1,1,NULL,77),
(168,67,'Sangat Tidak Setuju',1,1,1,NULL,77),
(169,67,'Tidak Setuju',2,1,1,NULL,77),
(170,67,'Kurang Setuju',3,1,1,NULL,77),
(171,67,'Setuju',4,1,1,NULL,77),
(172,67,'Sangat Setuju',5,1,1,NULL,77),
(173,68,'Sangat Tidak Setuju',1,1,1,NULL,77),
(174,68,'Tidak Setuju',2,1,1,NULL,77),
(175,68,'Kurang Setuju',3,1,1,NULL,77),
(176,68,'Setuju',4,1,1,NULL,77),
(177,68,'Sangat Setuju',5,1,1,NULL,77),
(178,69,'Sangat Tidak Setuju',1,1,1,NULL,77),
(179,69,'Tidak Setuju',2,1,1,NULL,77),
(180,69,'Kurang Setuju',3,1,1,NULL,77),
(181,69,'Setuju',4,1,1,NULL,77),
(182,69,'Sangat Setuju',5,1,1,NULL,77),
(183,70,'Sangat Tidak Setuju',1,1,1,NULL,77),
(184,70,'Tidak Setuju',2,1,1,NULL,77),
(185,70,'Kurang Setuju',3,1,1,NULL,77),
(186,70,'Setuju',4,1,1,NULL,77),
(187,70,'Sangat Setuju',5,1,1,NULL,77),
(188,71,'Sangat Tidak Setuju',1,1,1,NULL,77),
(189,71,'Tidak Setuju',2,1,1,NULL,77),
(190,71,'Kurang Setuju',3,1,1,NULL,77),
(191,71,'Setuju',4,1,1,NULL,77),
(192,71,'Sangat Setuju',5,1,1,NULL,77),
(193,72,'Sangat Tidak Setuju',1,1,1,NULL,77),
(194,72,'Tidak Setuju',2,1,1,NULL,77),
(195,72,'Kurang Setuju',3,1,1,NULL,77),
(196,72,'Setuju',4,1,1,NULL,77),
(197,72,'Sangat Setuju',5,1,1,NULL,77),
(198,73,'Sangat Tidak Setuju',1,1,1,NULL,77),
(199,73,'Tidak Setuju',2,1,1,NULL,77),
(200,73,'Kurang Setuju',3,1,1,NULL,77),
(201,73,'Setuju',4,1,1,NULL,77),
(202,73,'Sangat Setuju',5,1,1,NULL,77),
(203,74,'Sangat Tidak Setuju',1,1,1,NULL,77),
(204,74,'Tidak Setuju',2,1,1,NULL,77),
(205,74,'Kurang Setuju',3,1,1,NULL,77),
(206,74,'Setuju',4,1,1,NULL,77),
(207,74,'Sangat Setuju',5,1,1,NULL,77),
(208,75,'Sangat Tidak Setuju',1,1,1,NULL,77),
(209,75,'Tidak Setuju',2,1,1,NULL,77),
(210,75,'Kurang Setuju',3,1,1,NULL,77),
(211,75,'Setuju',4,1,1,NULL,77),
(212,75,'Sangat Setuju',5,1,1,NULL,77),
(213,76,'Sangat Tidak Setuju',1,1,1,NULL,77),
(214,76,'Tidak Setuju',2,1,1,NULL,77),
(215,76,'Kurang Setuju',3,1,1,NULL,77),
(216,76,'Setuju',4,1,1,NULL,77),
(217,76,'Sangat Setuju',5,1,1,NULL,77),
(218,77,'Sangat Tidak Setuju',1,1,1,NULL,77),
(219,77,'Tidak Setuju',2,1,1,NULL,77),
(220,77,'Kurang Setuju',3,1,1,NULL,77),
(221,77,'Setuju',4,1,1,NULL,77),
(222,77,'Sangat Setuju',5,1,1,NULL,77),
(223,78,'Sangat Tidak Setuju',1,1,1,NULL,77),
(224,78,'Tidak Setuju',2,1,1,NULL,77),
(225,78,'Kurang Setuju',3,1,1,NULL,77),
(226,78,'Setuju',4,1,1,NULL,77),
(227,78,'Sangat Setuju',5,1,1,NULL,77),
(228,79,'Sangat Tidak Setuju',1,1,1,NULL,77),
(229,79,'Tidak Setuju',2,1,1,NULL,77),
(230,79,'Kurang Setuju',3,1,1,NULL,77),
(231,79,'Setuju',4,1,1,NULL,77),
(232,79,'Sangat Setuju',5,1,1,NULL,77),
(233,80,'Sangat Tidak Setuju',1,1,1,NULL,77),
(234,80,'Tidak Setuju',2,1,1,NULL,77),
(235,80,'Kurang Setuju',3,1,1,NULL,77),
(236,80,'Setuju',4,1,1,NULL,77),
(237,80,'Sangat Setuju',5,1,1,NULL,77),
(238,81,'Sangat Tidak Setuju',1,1,1,NULL,77),
(239,81,'Tidak Setuju',2,1,1,NULL,77),
(240,81,'Kurang Setuju',3,1,1,NULL,77),
(241,81,'Setuju',4,1,1,NULL,77),
(242,81,'Sangat Setuju',5,1,1,NULL,77);

/*Table structure for table `ref_pendidikan` */

DROP TABLE IF EXISTS `ref_pendidikan`;

CREATE TABLE `ref_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_pendidikan` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `ref_pendidikan` */

insert  into `ref_pendidikan`(`id_pendidikan`,`nm_pendidikan`,`active`,`id_perusahaan`) values 
(1,'SD / Sederajat',1,77),
(2,'SMP / Sederajat',1,77),
(3,'SMA/SMK / Sederajat',1,77),
(4,'D1',1,77),
(5,'D2',1,77),
(6,'D3',1,77),
(7,'D4',1,77),
(8,'S1',1,77),
(9,'S2',1,77),
(10,'S3',1,77);

/*Table structure for table `ref_perusahaan` */

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

/*Data for the table `ref_perusahaan` */

insert  into `ref_perusahaan`(`id_perusahaan`,`nm_perusahaan`,`alamat`,`telp`,`jenis`,`active`,`cdate`,`cuser`,`logo`,`fifo`,`fefo`,`best`,`alloc`,`language`) values 
(77,'DAMRI','DKI Jakarta','',1,1,'2017-07-13 06:51:28',2,'32eaa902bd56712f93c0ee514b47b59c.png',1,1,0,'F','indonesian');

/*Table structure for table `ref_posisi` */

DROP TABLE IF EXISTS `ref_posisi`;

CREATE TABLE `ref_posisi` (
  `id_posisi` int(11) NOT NULL AUTO_INCREMENT,
  `nm_posisi` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_posisi`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `ref_posisi` */

insert  into `ref_posisi`(`id_posisi`,`nm_posisi`,`active`,`id_perusahaan`) values 
(1,'General Manager',1,77),
(2,'Deputi',1,77),
(3,'Asisten Deputi',1,77),
(4,'Manager',1,77),
(5,'Asisten Manager',1,77),
(6,'Kepala Divisi',1,77),
(7,'Kepala Sub Divisi',1,77),
(8,'Staff',1,77),
(9,'Kondektur',1,77),
(10,'Driver',1,77),
(11,'PPA',1,77),
(12,'Timer',1,77),
(13,'Mekanik',1,77),
(14,'Counter',1,77),
(15,'Lain lain',1,77);

/*Table structure for table `ref_segment` */

DROP TABLE IF EXISTS `ref_segment`;

CREATE TABLE `ref_segment` (
  `id_segment` int(11) NOT NULL AUTO_INCREMENT,
  `nm_segment` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_segment`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ref_segment` */

insert  into `ref_segment`(`id_segment`,`nm_segment`,`active`,`id_perusahaan`) values 
(1,'Sistem Penerangan',1,77);

/*Table structure for table `ref_template` */

DROP TABLE IF EXISTS `ref_template`;

CREATE TABLE `ref_template` (
  `id_template` int(11) NOT NULL AUTO_INCREMENT,
  `nm_template` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `id_bu` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_template`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ref_template` */

insert  into `ref_template`(`id_template`,`nm_template`,`active`,`cuser`,`id_bu`,`id_perusahaan`) values 
(1,'Penilaian Versi 1',1,NULL,NULL,77);

/*Table structure for table `ref_template_cek` */

DROP TABLE IF EXISTS `ref_template_cek`;

CREATE TABLE `ref_template_cek` (
  `id_template_cek` int(11) NOT NULL AUTO_INCREMENT,
  `id_template` int(11) DEFAULT NULL,
  `id_cek` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `id_bu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_template_cek`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ref_template_cek` */

/*Table structure for table `ref_type` */

DROP TABLE IF EXISTS `ref_type`;

CREATE TABLE `ref_type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nm_type` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ref_type` */

insert  into `ref_type`(`id_type`,`nm_type`,`active`,`id_perusahaan`) values 
(1,'44 Seat',1,77);

/*Table structure for table `ref_user` */

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `ref_user` */

insert  into `ref_user`(`id_user`,`nm_user`,`username`,`password`,`id_perusahaan`,`id_level`,`id_atasan`,`id_bu`,`active`,`cdate`,`cuser`,`email`,`vendor`,`admin`) values 
(1,'Pratama','noe.adipratama@gmail.com','986c9baaf20157cbf32b21c0314b3e2a',77,1,1,1,1,'2016-05-31 10:14:01',1,'noe.adipratama@gmail.com',1,1),
(2,'Cristananda Ratnady','nandaratnady@gmail.com','1ac5836dc0a551b2c17c108894da53cc',77,1,NULL,8,1,'2018-12-18 15:00:33',1,'nandaratnady@gmail.com',0,NULL),
(3,'Admin SDM','damrisdm','d41d8cd98f00b204e9800998ecf8427e',77,1,NULL,8,1,'2018-12-20 06:51:06',2,'damrisdm',0,NULL),
(4,'User Survei SDM','damri','23110f0ac5101b068530196ec4089809',77,2,NULL,60,1,'2018-12-27 08:58:36',2,'damri',0,NULL);

/*Table structure for table `ref_vendor` */

DROP TABLE IF EXISTS `ref_vendor`;

CREATE TABLE `ref_vendor` (
  `id_vendor` int(11) NOT NULL AUTO_INCREMENT,
  `nm_vendor` varchar(255) DEFAULT NULL,
  `addrs` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_vendor`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ref_vendor` */

insert  into `ref_vendor`(`id_vendor`,`nm_vendor`,`addrs`,`telp`,`active`,`id_perusahaan`,`id_user`) values 
(1,'PT UCK','Bandung','081111',1,77,1);

/*Table structure for table `time_dimension` */

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

/*Data for the table `time_dimension` */

insert  into `time_dimension`(`id`,`db_date`,`year`,`month`,`day`,`quarter`,`week`,`day_name`,`month_name`,`holiday_flag`,`weekend_flag`,`event`) values 
(20180101,'2018-01-01',2018,1,1,1,1,'Monday','January','f','f',NULL),
(20180102,'2018-01-02',2018,1,2,1,1,'Tuesday','January','f','f',NULL),
(20180103,'2018-01-03',2018,1,3,1,1,'Wednesday','January','f','f',NULL),
(20180104,'2018-01-04',2018,1,4,1,1,'Thursday','January','f','f',NULL),
(20180105,'2018-01-05',2018,1,5,1,1,'Friday','January','f','f',NULL),
(20180106,'2018-01-06',2018,1,6,1,1,'Saturday','January','f','t',NULL),
(20180107,'2018-01-07',2018,1,7,1,1,'Sunday','January','f','t',NULL),
(20180108,'2018-01-08',2018,1,8,1,2,'Monday','January','f','f',NULL),
(20180109,'2018-01-09',2018,1,9,1,2,'Tuesday','January','f','f',NULL),
(20180110,'2018-01-10',2018,1,10,1,2,'Wednesday','January','f','f',NULL),
(20180111,'2018-01-11',2018,1,11,1,2,'Thursday','January','f','f',NULL),
(20180112,'2018-01-12',2018,1,12,1,2,'Friday','January','f','f',NULL),
(20180113,'2018-01-13',2018,1,13,1,2,'Saturday','January','f','t',NULL),
(20180114,'2018-01-14',2018,1,14,1,2,'Sunday','January','f','t',NULL),
(20180115,'2018-01-15',2018,1,15,1,3,'Monday','January','f','f',NULL),
(20180116,'2018-01-16',2018,1,16,1,3,'Tuesday','January','f','f',NULL),
(20180117,'2018-01-17',2018,1,17,1,3,'Wednesday','January','f','f',NULL),
(20180118,'2018-01-18',2018,1,18,1,3,'Thursday','January','f','f',NULL),
(20180119,'2018-01-19',2018,1,19,1,3,'Friday','January','f','f',NULL),
(20180120,'2018-01-20',2018,1,20,1,3,'Saturday','January','f','t',NULL),
(20180121,'2018-01-21',2018,1,21,1,3,'Sunday','January','f','t',NULL),
(20180122,'2018-01-22',2018,1,22,1,4,'Monday','January','f','f',NULL),
(20180123,'2018-01-23',2018,1,23,1,4,'Tuesday','January','f','f',NULL),
(20180124,'2018-01-24',2018,1,24,1,4,'Wednesday','January','f','f',NULL),
(20180125,'2018-01-25',2018,1,25,1,4,'Thursday','January','f','f',NULL),
(20180126,'2018-01-26',2018,1,26,1,4,'Friday','January','f','f',NULL),
(20180127,'2018-01-27',2018,1,27,1,4,'Saturday','January','f','t',NULL),
(20180128,'2018-01-28',2018,1,28,1,4,'Sunday','January','f','t',NULL),
(20180129,'2018-01-29',2018,1,29,1,5,'Monday','January','f','f',NULL),
(20180130,'2018-01-30',2018,1,30,1,5,'Tuesday','January','f','f',NULL),
(20180131,'2018-01-31',2018,1,31,1,5,'Wednesday','January','f','f',NULL),
(20180201,'2018-02-01',2018,2,1,1,5,'Thursday','February','f','f',NULL),
(20180202,'2018-02-02',2018,2,2,1,5,'Friday','February','f','f',NULL),
(20180203,'2018-02-03',2018,2,3,1,5,'Saturday','February','f','t',NULL),
(20180204,'2018-02-04',2018,2,4,1,5,'Sunday','February','f','t',NULL),
(20180205,'2018-02-05',2018,2,5,1,6,'Monday','February','f','f',NULL),
(20180206,'2018-02-06',2018,2,6,1,6,'Tuesday','February','f','f',NULL),
(20180207,'2018-02-07',2018,2,7,1,6,'Wednesday','February','f','f',NULL),
(20180208,'2018-02-08',2018,2,8,1,6,'Thursday','February','f','f',NULL),
(20180209,'2018-02-09',2018,2,9,1,6,'Friday','February','f','f',NULL),
(20180210,'2018-02-10',2018,2,10,1,6,'Saturday','February','f','t',NULL),
(20180211,'2018-02-11',2018,2,11,1,6,'Sunday','February','f','t',NULL),
(20180212,'2018-02-12',2018,2,12,1,7,'Monday','February','f','f',NULL),
(20180213,'2018-02-13',2018,2,13,1,7,'Tuesday','February','f','f',NULL),
(20180214,'2018-02-14',2018,2,14,1,7,'Wednesday','February','f','f',NULL),
(20180215,'2018-02-15',2018,2,15,1,7,'Thursday','February','f','f',NULL),
(20180216,'2018-02-16',2018,2,16,1,7,'Friday','February','f','f',NULL),
(20180217,'2018-02-17',2018,2,17,1,7,'Saturday','February','f','t',NULL),
(20180218,'2018-02-18',2018,2,18,1,7,'Sunday','February','f','t',NULL),
(20180219,'2018-02-19',2018,2,19,1,8,'Monday','February','f','f',NULL),
(20180220,'2018-02-20',2018,2,20,1,8,'Tuesday','February','f','f',NULL),
(20180221,'2018-02-21',2018,2,21,1,8,'Wednesday','February','f','f',NULL),
(20180222,'2018-02-22',2018,2,22,1,8,'Thursday','February','f','f',NULL),
(20180223,'2018-02-23',2018,2,23,1,8,'Friday','February','f','f',NULL),
(20180224,'2018-02-24',2018,2,24,1,8,'Saturday','February','f','t',NULL),
(20180225,'2018-02-25',2018,2,25,1,8,'Sunday','February','f','t',NULL),
(20180226,'2018-02-26',2018,2,26,1,9,'Monday','February','f','f',NULL),
(20180227,'2018-02-27',2018,2,27,1,9,'Tuesday','February','f','f',NULL),
(20180228,'2018-02-28',2018,2,28,1,9,'Wednesday','February','f','f',NULL),
(20180301,'2018-03-01',2018,3,1,1,9,'Thursday','March','f','f',NULL),
(20180302,'2018-03-02',2018,3,2,1,9,'Friday','March','f','f',NULL),
(20180303,'2018-03-03',2018,3,3,1,9,'Saturday','March','f','t',NULL),
(20180304,'2018-03-04',2018,3,4,1,9,'Sunday','March','f','t',NULL),
(20180305,'2018-03-05',2018,3,5,1,10,'Monday','March','f','f',NULL),
(20180306,'2018-03-06',2018,3,6,1,10,'Tuesday','March','f','f',NULL),
(20180307,'2018-03-07',2018,3,7,1,10,'Wednesday','March','f','f',NULL),
(20180308,'2018-03-08',2018,3,8,1,10,'Thursday','March','f','f',NULL),
(20180309,'2018-03-09',2018,3,9,1,10,'Friday','March','f','f',NULL),
(20180310,'2018-03-10',2018,3,10,1,10,'Saturday','March','f','t',NULL),
(20180311,'2018-03-11',2018,3,11,1,10,'Sunday','March','f','t',NULL),
(20180312,'2018-03-12',2018,3,12,1,11,'Monday','March','f','f',NULL),
(20180313,'2018-03-13',2018,3,13,1,11,'Tuesday','March','f','f',NULL),
(20180314,'2018-03-14',2018,3,14,1,11,'Wednesday','March','f','f',NULL),
(20180315,'2018-03-15',2018,3,15,1,11,'Thursday','March','f','f',NULL),
(20180316,'2018-03-16',2018,3,16,1,11,'Friday','March','f','f',NULL),
(20180317,'2018-03-17',2018,3,17,1,11,'Saturday','March','f','t',NULL),
(20180318,'2018-03-18',2018,3,18,1,11,'Sunday','March','f','t',NULL),
(20180319,'2018-03-19',2018,3,19,1,12,'Monday','March','f','f',NULL),
(20180320,'2018-03-20',2018,3,20,1,12,'Tuesday','March','f','f',NULL),
(20180321,'2018-03-21',2018,3,21,1,12,'Wednesday','March','f','f',NULL),
(20180322,'2018-03-22',2018,3,22,1,12,'Thursday','March','f','f',NULL),
(20180323,'2018-03-23',2018,3,23,1,12,'Friday','March','f','f',NULL),
(20180324,'2018-03-24',2018,3,24,1,12,'Saturday','March','f','t',NULL),
(20180325,'2018-03-25',2018,3,25,1,12,'Sunday','March','f','t',NULL),
(20180326,'2018-03-26',2018,3,26,1,13,'Monday','March','f','f',NULL),
(20180327,'2018-03-27',2018,3,27,1,13,'Tuesday','March','f','f',NULL),
(20180328,'2018-03-28',2018,3,28,1,13,'Wednesday','March','f','f',NULL),
(20180329,'2018-03-29',2018,3,29,1,13,'Thursday','March','f','f',NULL),
(20180330,'2018-03-30',2018,3,30,1,13,'Friday','March','f','f',NULL),
(20180331,'2018-03-31',2018,3,31,1,13,'Saturday','March','f','t',NULL),
(20180401,'2018-04-01',2018,4,1,2,13,'Sunday','April','f','t',NULL),
(20180402,'2018-04-02',2018,4,2,2,14,'Monday','April','f','f',NULL),
(20180403,'2018-04-03',2018,4,3,2,14,'Tuesday','April','f','f',NULL),
(20180404,'2018-04-04',2018,4,4,2,14,'Wednesday','April','f','f',NULL),
(20180405,'2018-04-05',2018,4,5,2,14,'Thursday','April','f','f',NULL),
(20180406,'2018-04-06',2018,4,6,2,14,'Friday','April','f','f',NULL),
(20180407,'2018-04-07',2018,4,7,2,14,'Saturday','April','f','t',NULL),
(20180408,'2018-04-08',2018,4,8,2,14,'Sunday','April','f','t',NULL),
(20180409,'2018-04-09',2018,4,9,2,15,'Monday','April','f','f',NULL),
(20180410,'2018-04-10',2018,4,10,2,15,'Tuesday','April','f','f',NULL),
(20180411,'2018-04-11',2018,4,11,2,15,'Wednesday','April','f','f',NULL),
(20180412,'2018-04-12',2018,4,12,2,15,'Thursday','April','f','f',NULL),
(20180413,'2018-04-13',2018,4,13,2,15,'Friday','April','f','f',NULL),
(20180414,'2018-04-14',2018,4,14,2,15,'Saturday','April','f','t',NULL),
(20180415,'2018-04-15',2018,4,15,2,15,'Sunday','April','f','t',NULL),
(20180416,'2018-04-16',2018,4,16,2,16,'Monday','April','f','f',NULL),
(20180417,'2018-04-17',2018,4,17,2,16,'Tuesday','April','f','f',NULL),
(20180418,'2018-04-18',2018,4,18,2,16,'Wednesday','April','f','f',NULL),
(20180419,'2018-04-19',2018,4,19,2,16,'Thursday','April','f','f',NULL),
(20180420,'2018-04-20',2018,4,20,2,16,'Friday','April','f','f',NULL),
(20180421,'2018-04-21',2018,4,21,2,16,'Saturday','April','f','t',NULL),
(20180422,'2018-04-22',2018,4,22,2,16,'Sunday','April','f','t',NULL),
(20180423,'2018-04-23',2018,4,23,2,17,'Monday','April','f','f',NULL),
(20180424,'2018-04-24',2018,4,24,2,17,'Tuesday','April','f','f',NULL),
(20180425,'2018-04-25',2018,4,25,2,17,'Wednesday','April','f','f',NULL),
(20180426,'2018-04-26',2018,4,26,2,17,'Thursday','April','f','f',NULL),
(20180427,'2018-04-27',2018,4,27,2,17,'Friday','April','f','f',NULL),
(20180428,'2018-04-28',2018,4,28,2,17,'Saturday','April','f','t',NULL),
(20180429,'2018-04-29',2018,4,29,2,17,'Sunday','April','f','t',NULL),
(20180430,'2018-04-30',2018,4,30,2,18,'Monday','April','f','f',NULL),
(20180501,'2018-05-01',2018,5,1,2,18,'Tuesday','May','f','f',NULL),
(20180502,'2018-05-02',2018,5,2,2,18,'Wednesday','May','f','f',NULL),
(20180503,'2018-05-03',2018,5,3,2,18,'Thursday','May','f','f',NULL),
(20180504,'2018-05-04',2018,5,4,2,18,'Friday','May','f','f',NULL),
(20180505,'2018-05-05',2018,5,5,2,18,'Saturday','May','f','t',NULL),
(20180506,'2018-05-06',2018,5,6,2,18,'Sunday','May','f','t',NULL),
(20180507,'2018-05-07',2018,5,7,2,19,'Monday','May','f','f',NULL),
(20180508,'2018-05-08',2018,5,8,2,19,'Tuesday','May','f','f',NULL),
(20180509,'2018-05-09',2018,5,9,2,19,'Wednesday','May','f','f',NULL),
(20180510,'2018-05-10',2018,5,10,2,19,'Thursday','May','f','f',NULL),
(20180511,'2018-05-11',2018,5,11,2,19,'Friday','May','f','f',NULL),
(20180512,'2018-05-12',2018,5,12,2,19,'Saturday','May','f','t',NULL),
(20180513,'2018-05-13',2018,5,13,2,19,'Sunday','May','f','t',NULL),
(20180514,'2018-05-14',2018,5,14,2,20,'Monday','May','f','f',NULL),
(20180515,'2018-05-15',2018,5,15,2,20,'Tuesday','May','f','f',NULL),
(20180516,'2018-05-16',2018,5,16,2,20,'Wednesday','May','f','f',NULL),
(20180517,'2018-05-17',2018,5,17,2,20,'Thursday','May','f','f',NULL),
(20180518,'2018-05-18',2018,5,18,2,20,'Friday','May','f','f',NULL),
(20180519,'2018-05-19',2018,5,19,2,20,'Saturday','May','f','t',NULL),
(20180520,'2018-05-20',2018,5,20,2,20,'Sunday','May','f','t',NULL),
(20180521,'2018-05-21',2018,5,21,2,21,'Monday','May','f','f',NULL),
(20180522,'2018-05-22',2018,5,22,2,21,'Tuesday','May','f','f',NULL),
(20180523,'2018-05-23',2018,5,23,2,21,'Wednesday','May','f','f',NULL),
(20180524,'2018-05-24',2018,5,24,2,21,'Thursday','May','f','f',NULL),
(20180525,'2018-05-25',2018,5,25,2,21,'Friday','May','f','f',NULL),
(20180526,'2018-05-26',2018,5,26,2,21,'Saturday','May','f','t',NULL),
(20180527,'2018-05-27',2018,5,27,2,21,'Sunday','May','f','t',NULL),
(20180528,'2018-05-28',2018,5,28,2,22,'Monday','May','f','f',NULL),
(20180529,'2018-05-29',2018,5,29,2,22,'Tuesday','May','f','f',NULL),
(20180530,'2018-05-30',2018,5,30,2,22,'Wednesday','May','f','f',NULL),
(20180531,'2018-05-31',2018,5,31,2,22,'Thursday','May','f','f',NULL),
(20180601,'2018-06-01',2018,6,1,2,22,'Friday','June','f','f',NULL),
(20180602,'2018-06-02',2018,6,2,2,22,'Saturday','June','f','t',NULL),
(20180603,'2018-06-03',2018,6,3,2,22,'Sunday','June','f','t',NULL),
(20180604,'2018-06-04',2018,6,4,2,23,'Monday','June','f','f',NULL),
(20180605,'2018-06-05',2018,6,5,2,23,'Tuesday','June','f','f',NULL),
(20180606,'2018-06-06',2018,6,6,2,23,'Wednesday','June','f','f',NULL),
(20180607,'2018-06-07',2018,6,7,2,23,'Thursday','June','f','f',NULL),
(20180608,'2018-06-08',2018,6,8,2,23,'Friday','June','f','f',NULL),
(20180609,'2018-06-09',2018,6,9,2,23,'Saturday','June','f','t',NULL),
(20180610,'2018-06-10',2018,6,10,2,23,'Sunday','June','f','t',NULL),
(20180611,'2018-06-11',2018,6,11,2,24,'Monday','June','f','f',NULL),
(20180612,'2018-06-12',2018,6,12,2,24,'Tuesday','June','f','f',NULL),
(20180613,'2018-06-13',2018,6,13,2,24,'Wednesday','June','f','f',NULL),
(20180614,'2018-06-14',2018,6,14,2,24,'Thursday','June','f','f',NULL),
(20180615,'2018-06-15',2018,6,15,2,24,'Friday','June','f','f',NULL),
(20180616,'2018-06-16',2018,6,16,2,24,'Saturday','June','f','t',NULL),
(20180617,'2018-06-17',2018,6,17,2,24,'Sunday','June','f','t',NULL),
(20180618,'2018-06-18',2018,6,18,2,25,'Monday','June','f','f',NULL),
(20180619,'2018-06-19',2018,6,19,2,25,'Tuesday','June','f','f',NULL),
(20180620,'2018-06-20',2018,6,20,2,25,'Wednesday','June','f','f',NULL),
(20180621,'2018-06-21',2018,6,21,2,25,'Thursday','June','f','f',NULL),
(20180622,'2018-06-22',2018,6,22,2,25,'Friday','June','f','f',NULL),
(20180623,'2018-06-23',2018,6,23,2,25,'Saturday','June','f','t',NULL),
(20180624,'2018-06-24',2018,6,24,2,25,'Sunday','June','f','t',NULL),
(20180625,'2018-06-25',2018,6,25,2,26,'Monday','June','f','f',NULL),
(20180626,'2018-06-26',2018,6,26,2,26,'Tuesday','June','f','f',NULL),
(20180627,'2018-06-27',2018,6,27,2,26,'Wednesday','June','f','f',NULL),
(20180628,'2018-06-28',2018,6,28,2,26,'Thursday','June','f','f',NULL),
(20180629,'2018-06-29',2018,6,29,2,26,'Friday','June','f','f',NULL),
(20180630,'2018-06-30',2018,6,30,2,26,'Saturday','June','f','t',NULL),
(20180701,'2018-07-01',2018,7,1,3,26,'Sunday','July','f','t',NULL),
(20180702,'2018-07-02',2018,7,2,3,27,'Monday','July','f','f',NULL),
(20180703,'2018-07-03',2018,7,3,3,27,'Tuesday','July','f','f',NULL),
(20180704,'2018-07-04',2018,7,4,3,27,'Wednesday','July','f','f',NULL),
(20180705,'2018-07-05',2018,7,5,3,27,'Thursday','July','f','f',NULL),
(20180706,'2018-07-06',2018,7,6,3,27,'Friday','July','f','f',NULL),
(20180707,'2018-07-07',2018,7,7,3,27,'Saturday','July','f','t',NULL),
(20180708,'2018-07-08',2018,7,8,3,27,'Sunday','July','f','t',NULL),
(20180709,'2018-07-09',2018,7,9,3,28,'Monday','July','f','f',NULL),
(20180710,'2018-07-10',2018,7,10,3,28,'Tuesday','July','f','f',NULL),
(20180711,'2018-07-11',2018,7,11,3,28,'Wednesday','July','f','f',NULL),
(20180712,'2018-07-12',2018,7,12,3,28,'Thursday','July','f','f',NULL),
(20180713,'2018-07-13',2018,7,13,3,28,'Friday','July','f','f',NULL),
(20180714,'2018-07-14',2018,7,14,3,28,'Saturday','July','f','t',NULL),
(20180715,'2018-07-15',2018,7,15,3,28,'Sunday','July','f','t',NULL),
(20180716,'2018-07-16',2018,7,16,3,29,'Monday','July','f','f',NULL),
(20180717,'2018-07-17',2018,7,17,3,29,'Tuesday','July','f','f',NULL),
(20180718,'2018-07-18',2018,7,18,3,29,'Wednesday','July','f','f',NULL),
(20180719,'2018-07-19',2018,7,19,3,29,'Thursday','July','f','f',NULL),
(20180720,'2018-07-20',2018,7,20,3,29,'Friday','July','f','f',NULL),
(20180721,'2018-07-21',2018,7,21,3,29,'Saturday','July','f','t',NULL),
(20180722,'2018-07-22',2018,7,22,3,29,'Sunday','July','f','t',NULL),
(20180723,'2018-07-23',2018,7,23,3,30,'Monday','July','f','f',NULL),
(20180724,'2018-07-24',2018,7,24,3,30,'Tuesday','July','f','f',NULL),
(20180725,'2018-07-25',2018,7,25,3,30,'Wednesday','July','f','f',NULL),
(20180726,'2018-07-26',2018,7,26,3,30,'Thursday','July','f','f',NULL),
(20180727,'2018-07-27',2018,7,27,3,30,'Friday','July','f','f',NULL),
(20180728,'2018-07-28',2018,7,28,3,30,'Saturday','July','f','t',NULL),
(20180729,'2018-07-29',2018,7,29,3,30,'Sunday','July','f','t',NULL),
(20180730,'2018-07-30',2018,7,30,3,31,'Monday','July','f','f',NULL),
(20180731,'2018-07-31',2018,7,31,3,31,'Tuesday','July','f','f',NULL),
(20180801,'2018-08-01',2018,8,1,3,31,'Wednesday','August','f','f',NULL),
(20180802,'2018-08-02',2018,8,2,3,31,'Thursday','August','f','f',NULL),
(20180803,'2018-08-03',2018,8,3,3,31,'Friday','August','f','f',NULL),
(20180804,'2018-08-04',2018,8,4,3,31,'Saturday','August','f','t',NULL),
(20180805,'2018-08-05',2018,8,5,3,31,'Sunday','August','f','t',NULL),
(20180806,'2018-08-06',2018,8,6,3,32,'Monday','August','f','f',NULL),
(20180807,'2018-08-07',2018,8,7,3,32,'Tuesday','August','f','f',NULL),
(20180808,'2018-08-08',2018,8,8,3,32,'Wednesday','August','f','f',NULL),
(20180809,'2018-08-09',2018,8,9,3,32,'Thursday','August','f','f',NULL),
(20180810,'2018-08-10',2018,8,10,3,32,'Friday','August','f','f',NULL),
(20180811,'2018-08-11',2018,8,11,3,32,'Saturday','August','f','t',NULL),
(20180812,'2018-08-12',2018,8,12,3,32,'Sunday','August','f','t',NULL),
(20180813,'2018-08-13',2018,8,13,3,33,'Monday','August','f','f',NULL),
(20180814,'2018-08-14',2018,8,14,3,33,'Tuesday','August','f','f',NULL),
(20180815,'2018-08-15',2018,8,15,3,33,'Wednesday','August','f','f',NULL),
(20180816,'2018-08-16',2018,8,16,3,33,'Thursday','August','f','f',NULL),
(20180817,'2018-08-17',2018,8,17,3,33,'Friday','August','f','f',NULL),
(20180818,'2018-08-18',2018,8,18,3,33,'Saturday','August','f','t',NULL),
(20180819,'2018-08-19',2018,8,19,3,33,'Sunday','August','f','t',NULL),
(20180820,'2018-08-20',2018,8,20,3,34,'Monday','August','f','f',NULL),
(20180821,'2018-08-21',2018,8,21,3,34,'Tuesday','August','f','f',NULL),
(20180822,'2018-08-22',2018,8,22,3,34,'Wednesday','August','f','f',NULL),
(20180823,'2018-08-23',2018,8,23,3,34,'Thursday','August','f','f',NULL),
(20180824,'2018-08-24',2018,8,24,3,34,'Friday','August','f','f',NULL),
(20180825,'2018-08-25',2018,8,25,3,34,'Saturday','August','f','t',NULL),
(20180826,'2018-08-26',2018,8,26,3,34,'Sunday','August','f','t',NULL),
(20180827,'2018-08-27',2018,8,27,3,35,'Monday','August','f','f',NULL),
(20180828,'2018-08-28',2018,8,28,3,35,'Tuesday','August','f','f',NULL),
(20180829,'2018-08-29',2018,8,29,3,35,'Wednesday','August','f','f',NULL),
(20180830,'2018-08-30',2018,8,30,3,35,'Thursday','August','f','f',NULL),
(20180831,'2018-08-31',2018,8,31,3,35,'Friday','August','f','f',NULL),
(20180901,'2018-09-01',2018,9,1,3,35,'Saturday','September','f','t',NULL),
(20180902,'2018-09-02',2018,9,2,3,35,'Sunday','September','f','t',NULL),
(20180903,'2018-09-03',2018,9,3,3,36,'Monday','September','f','f',NULL),
(20180904,'2018-09-04',2018,9,4,3,36,'Tuesday','September','f','f',NULL),
(20180905,'2018-09-05',2018,9,5,3,36,'Wednesday','September','f','f',NULL),
(20180906,'2018-09-06',2018,9,6,3,36,'Thursday','September','f','f',NULL),
(20180907,'2018-09-07',2018,9,7,3,36,'Friday','September','f','f',NULL),
(20180908,'2018-09-08',2018,9,8,3,36,'Saturday','September','f','t',NULL),
(20180909,'2018-09-09',2018,9,9,3,36,'Sunday','September','f','t',NULL),
(20180910,'2018-09-10',2018,9,10,3,37,'Monday','September','f','f',NULL),
(20180911,'2018-09-11',2018,9,11,3,37,'Tuesday','September','f','f',NULL),
(20180912,'2018-09-12',2018,9,12,3,37,'Wednesday','September','f','f',NULL),
(20180913,'2018-09-13',2018,9,13,3,37,'Thursday','September','f','f',NULL),
(20180914,'2018-09-14',2018,9,14,3,37,'Friday','September','f','f',NULL),
(20180915,'2018-09-15',2018,9,15,3,37,'Saturday','September','f','t',NULL),
(20180916,'2018-09-16',2018,9,16,3,37,'Sunday','September','f','t',NULL),
(20180917,'2018-09-17',2018,9,17,3,38,'Monday','September','f','f',NULL),
(20180918,'2018-09-18',2018,9,18,3,38,'Tuesday','September','f','f',NULL),
(20180919,'2018-09-19',2018,9,19,3,38,'Wednesday','September','f','f',NULL),
(20180920,'2018-09-20',2018,9,20,3,38,'Thursday','September','f','f',NULL),
(20180921,'2018-09-21',2018,9,21,3,38,'Friday','September','f','f',NULL),
(20180922,'2018-09-22',2018,9,22,3,38,'Saturday','September','f','t',NULL),
(20180923,'2018-09-23',2018,9,23,3,38,'Sunday','September','f','t',NULL),
(20180924,'2018-09-24',2018,9,24,3,39,'Monday','September','f','f',NULL),
(20180925,'2018-09-25',2018,9,25,3,39,'Tuesday','September','f','f',NULL),
(20180926,'2018-09-26',2018,9,26,3,39,'Wednesday','September','f','f',NULL),
(20180927,'2018-09-27',2018,9,27,3,39,'Thursday','September','f','f',NULL),
(20180928,'2018-09-28',2018,9,28,3,39,'Friday','September','f','f',NULL),
(20180929,'2018-09-29',2018,9,29,3,39,'Saturday','September','f','t',NULL),
(20180930,'2018-09-30',2018,9,30,3,39,'Sunday','September','f','t',NULL),
(20181001,'2018-10-01',2018,10,1,4,40,'Monday','October','f','f',NULL),
(20181002,'2018-10-02',2018,10,2,4,40,'Tuesday','October','f','f',NULL),
(20181003,'2018-10-03',2018,10,3,4,40,'Wednesday','October','f','f',NULL),
(20181004,'2018-10-04',2018,10,4,4,40,'Thursday','October','f','f',NULL),
(20181005,'2018-10-05',2018,10,5,4,40,'Friday','October','f','f',NULL),
(20181006,'2018-10-06',2018,10,6,4,40,'Saturday','October','f','t',NULL),
(20181007,'2018-10-07',2018,10,7,4,40,'Sunday','October','f','t',NULL),
(20181008,'2018-10-08',2018,10,8,4,41,'Monday','October','f','f',NULL),
(20181009,'2018-10-09',2018,10,9,4,41,'Tuesday','October','f','f',NULL),
(20181010,'2018-10-10',2018,10,10,4,41,'Wednesday','October','f','f',NULL),
(20181011,'2018-10-11',2018,10,11,4,41,'Thursday','October','f','f',NULL),
(20181012,'2018-10-12',2018,10,12,4,41,'Friday','October','f','f',NULL),
(20181013,'2018-10-13',2018,10,13,4,41,'Saturday','October','f','t',NULL),
(20181014,'2018-10-14',2018,10,14,4,41,'Sunday','October','f','t',NULL),
(20181015,'2018-10-15',2018,10,15,4,42,'Monday','October','f','f',NULL),
(20181016,'2018-10-16',2018,10,16,4,42,'Tuesday','October','f','f',NULL),
(20181017,'2018-10-17',2018,10,17,4,42,'Wednesday','October','f','f',NULL),
(20181018,'2018-10-18',2018,10,18,4,42,'Thursday','October','f','f',NULL),
(20181019,'2018-10-19',2018,10,19,4,42,'Friday','October','f','f',NULL),
(20181020,'2018-10-20',2018,10,20,4,42,'Saturday','October','f','t',NULL),
(20181021,'2018-10-21',2018,10,21,4,42,'Sunday','October','f','t',NULL),
(20181022,'2018-10-22',2018,10,22,4,43,'Monday','October','f','f',NULL),
(20181023,'2018-10-23',2018,10,23,4,43,'Tuesday','October','f','f',NULL),
(20181024,'2018-10-24',2018,10,24,4,43,'Wednesday','October','f','f',NULL),
(20181025,'2018-10-25',2018,10,25,4,43,'Thursday','October','f','f',NULL),
(20181026,'2018-10-26',2018,10,26,4,43,'Friday','October','f','f',NULL),
(20181027,'2018-10-27',2018,10,27,4,43,'Saturday','October','f','t',NULL),
(20181028,'2018-10-28',2018,10,28,4,43,'Sunday','October','f','t',NULL),
(20181029,'2018-10-29',2018,10,29,4,44,'Monday','October','f','f',NULL),
(20181030,'2018-10-30',2018,10,30,4,44,'Tuesday','October','f','f',NULL),
(20181031,'2018-10-31',2018,10,31,4,44,'Wednesday','October','f','f',NULL),
(20181101,'2018-11-01',2018,11,1,4,44,'Thursday','November','f','f',NULL),
(20181102,'2018-11-02',2018,11,2,4,44,'Friday','November','f','f',NULL),
(20181103,'2018-11-03',2018,11,3,4,44,'Saturday','November','f','t',NULL),
(20181104,'2018-11-04',2018,11,4,4,44,'Sunday','November','f','t',NULL),
(20181105,'2018-11-05',2018,11,5,4,45,'Monday','November','f','f',NULL),
(20181106,'2018-11-06',2018,11,6,4,45,'Tuesday','November','f','f',NULL),
(20181107,'2018-11-07',2018,11,7,4,45,'Wednesday','November','f','f',NULL),
(20181108,'2018-11-08',2018,11,8,4,45,'Thursday','November','f','f',NULL),
(20181109,'2018-11-09',2018,11,9,4,45,'Friday','November','f','f',NULL),
(20181110,'2018-11-10',2018,11,10,4,45,'Saturday','November','f','t',NULL),
(20181111,'2018-11-11',2018,11,11,4,45,'Sunday','November','f','t',NULL),
(20181112,'2018-11-12',2018,11,12,4,46,'Monday','November','f','f',NULL),
(20181113,'2018-11-13',2018,11,13,4,46,'Tuesday','November','f','f',NULL),
(20181114,'2018-11-14',2018,11,14,4,46,'Wednesday','November','f','f',NULL),
(20181115,'2018-11-15',2018,11,15,4,46,'Thursday','November','f','f',NULL),
(20181116,'2018-11-16',2018,11,16,4,46,'Friday','November','f','f',NULL),
(20181117,'2018-11-17',2018,11,17,4,46,'Saturday','November','f','t',NULL),
(20181118,'2018-11-18',2018,11,18,4,46,'Sunday','November','f','t',NULL),
(20181119,'2018-11-19',2018,11,19,4,47,'Monday','November','f','f',NULL),
(20181120,'2018-11-20',2018,11,20,4,47,'Tuesday','November','f','f',NULL),
(20181121,'2018-11-21',2018,11,21,4,47,'Wednesday','November','f','f',NULL),
(20181122,'2018-11-22',2018,11,22,4,47,'Thursday','November','f','f',NULL),
(20181123,'2018-11-23',2018,11,23,4,47,'Friday','November','f','f',NULL),
(20181124,'2018-11-24',2018,11,24,4,47,'Saturday','November','f','t',NULL),
(20181125,'2018-11-25',2018,11,25,4,47,'Sunday','November','f','t',NULL),
(20181126,'2018-11-26',2018,11,26,4,48,'Monday','November','f','f',NULL),
(20181127,'2018-11-27',2018,11,27,4,48,'Tuesday','November','f','f',NULL),
(20181128,'2018-11-28',2018,11,28,4,48,'Wednesday','November','f','f',NULL),
(20181129,'2018-11-29',2018,11,29,4,48,'Thursday','November','f','f',NULL),
(20181130,'2018-11-30',2018,11,30,4,48,'Friday','November','f','f',NULL),
(20181201,'2018-12-01',2018,12,1,4,48,'Saturday','December','f','t',NULL),
(20181202,'2018-12-02',2018,12,2,4,48,'Sunday','December','f','t',NULL),
(20181203,'2018-12-03',2018,12,3,4,49,'Monday','December','f','f',NULL),
(20181204,'2018-12-04',2018,12,4,4,49,'Tuesday','December','f','f',NULL),
(20181205,'2018-12-05',2018,12,5,4,49,'Wednesday','December','f','f',NULL),
(20181206,'2018-12-06',2018,12,6,4,49,'Thursday','December','f','f',NULL),
(20181207,'2018-12-07',2018,12,7,4,49,'Friday','December','f','f',NULL),
(20181208,'2018-12-08',2018,12,8,4,49,'Saturday','December','f','t',NULL),
(20181209,'2018-12-09',2018,12,9,4,49,'Sunday','December','f','t',NULL),
(20181210,'2018-12-10',2018,12,10,4,50,'Monday','December','f','f',NULL),
(20181211,'2018-12-11',2018,12,11,4,50,'Tuesday','December','f','f',NULL),
(20181212,'2018-12-12',2018,12,12,4,50,'Wednesday','December','f','f',NULL),
(20181213,'2018-12-13',2018,12,13,4,50,'Thursday','December','f','f',NULL),
(20181214,'2018-12-14',2018,12,14,4,50,'Friday','December','f','f',NULL),
(20181215,'2018-12-15',2018,12,15,4,50,'Saturday','December','f','t',NULL),
(20181216,'2018-12-16',2018,12,16,4,50,'Sunday','December','f','t',NULL),
(20181217,'2018-12-17',2018,12,17,4,51,'Monday','December','f','f',NULL),
(20181218,'2018-12-18',2018,12,18,4,51,'Tuesday','December','f','f',NULL),
(20181219,'2018-12-19',2018,12,19,4,51,'Wednesday','December','f','f',NULL),
(20181220,'2018-12-20',2018,12,20,4,51,'Thursday','December','f','f',NULL),
(20181221,'2018-12-21',2018,12,21,4,51,'Friday','December','f','f',NULL),
(20181222,'2018-12-22',2018,12,22,4,51,'Saturday','December','f','t',NULL),
(20181223,'2018-12-23',2018,12,23,4,51,'Sunday','December','f','t',NULL),
(20181224,'2018-12-24',2018,12,24,4,52,'Monday','December','f','f',NULL),
(20181225,'2018-12-25',2018,12,25,4,52,'Tuesday','December','f','f',NULL),
(20181226,'2018-12-26',2018,12,26,4,52,'Wednesday','December','f','f',NULL),
(20181227,'2018-12-27',2018,12,27,4,52,'Thursday','December','f','f',NULL),
(20181228,'2018-12-28',2018,12,28,4,52,'Friday','December','f','f',NULL),
(20181229,'2018-12-29',2018,12,29,4,52,'Saturday','December','f','t',NULL),
(20181230,'2018-12-30',2018,12,30,4,52,'Sunday','December','f','t',NULL),
(20181231,'2018-12-31',2018,12,31,4,1,'Monday','December','f','f',NULL),
(20190101,'2019-01-01',2019,1,1,1,1,'Tuesday','January','f','f',NULL),
(20190102,'2019-01-02',2019,1,2,1,1,'Wednesday','January','f','f',NULL),
(20190103,'2019-01-03',2019,1,3,1,1,'Thursday','January','f','f',NULL),
(20190104,'2019-01-04',2019,1,4,1,1,'Friday','January','f','f',NULL),
(20190105,'2019-01-05',2019,1,5,1,1,'Saturday','January','f','t',NULL),
(20190106,'2019-01-06',2019,1,6,1,1,'Sunday','January','f','t',NULL),
(20190107,'2019-01-07',2019,1,7,1,2,'Monday','January','f','f',NULL),
(20190108,'2019-01-08',2019,1,8,1,2,'Tuesday','January','f','f',NULL),
(20190109,'2019-01-09',2019,1,9,1,2,'Wednesday','January','f','f',NULL),
(20190110,'2019-01-10',2019,1,10,1,2,'Thursday','January','f','f',NULL),
(20190111,'2019-01-11',2019,1,11,1,2,'Friday','January','f','f',NULL),
(20190112,'2019-01-12',2019,1,12,1,2,'Saturday','January','f','t',NULL),
(20190113,'2019-01-13',2019,1,13,1,2,'Sunday','January','f','t',NULL),
(20190114,'2019-01-14',2019,1,14,1,3,'Monday','January','f','f',NULL),
(20190115,'2019-01-15',2019,1,15,1,3,'Tuesday','January','f','f',NULL),
(20190116,'2019-01-16',2019,1,16,1,3,'Wednesday','January','f','f',NULL),
(20190117,'2019-01-17',2019,1,17,1,3,'Thursday','January','f','f',NULL),
(20190118,'2019-01-18',2019,1,18,1,3,'Friday','January','f','f',NULL),
(20190119,'2019-01-19',2019,1,19,1,3,'Saturday','January','f','t',NULL),
(20190120,'2019-01-20',2019,1,20,1,3,'Sunday','January','f','t',NULL),
(20190121,'2019-01-21',2019,1,21,1,4,'Monday','January','f','f',NULL),
(20190122,'2019-01-22',2019,1,22,1,4,'Tuesday','January','f','f',NULL),
(20190123,'2019-01-23',2019,1,23,1,4,'Wednesday','January','f','f',NULL),
(20190124,'2019-01-24',2019,1,24,1,4,'Thursday','January','f','f',NULL),
(20190125,'2019-01-25',2019,1,25,1,4,'Friday','January','f','f',NULL),
(20190126,'2019-01-26',2019,1,26,1,4,'Saturday','January','f','t',NULL),
(20190127,'2019-01-27',2019,1,27,1,4,'Sunday','January','f','t',NULL),
(20190128,'2019-01-28',2019,1,28,1,5,'Monday','January','f','f',NULL),
(20190129,'2019-01-29',2019,1,29,1,5,'Tuesday','January','f','f',NULL),
(20190130,'2019-01-30',2019,1,30,1,5,'Wednesday','January','f','f',NULL),
(20190131,'2019-01-31',2019,1,31,1,5,'Thursday','January','f','f',NULL),
(20190201,'2019-02-01',2019,2,1,1,5,'Friday','February','f','f',NULL),
(20190202,'2019-02-02',2019,2,2,1,5,'Saturday','February','f','t',NULL),
(20190203,'2019-02-03',2019,2,3,1,5,'Sunday','February','f','t',NULL),
(20190204,'2019-02-04',2019,2,4,1,6,'Monday','February','f','f',NULL),
(20190205,'2019-02-05',2019,2,5,1,6,'Tuesday','February','f','f',NULL),
(20190206,'2019-02-06',2019,2,6,1,6,'Wednesday','February','f','f',NULL),
(20190207,'2019-02-07',2019,2,7,1,6,'Thursday','February','f','f',NULL),
(20190208,'2019-02-08',2019,2,8,1,6,'Friday','February','f','f',NULL),
(20190209,'2019-02-09',2019,2,9,1,6,'Saturday','February','f','t',NULL),
(20190210,'2019-02-10',2019,2,10,1,6,'Sunday','February','f','t',NULL),
(20190211,'2019-02-11',2019,2,11,1,7,'Monday','February','f','f',NULL),
(20190212,'2019-02-12',2019,2,12,1,7,'Tuesday','February','f','f',NULL),
(20190213,'2019-02-13',2019,2,13,1,7,'Wednesday','February','f','f',NULL),
(20190214,'2019-02-14',2019,2,14,1,7,'Thursday','February','f','f',NULL),
(20190215,'2019-02-15',2019,2,15,1,7,'Friday','February','f','f',NULL),
(20190216,'2019-02-16',2019,2,16,1,7,'Saturday','February','f','t',NULL),
(20190217,'2019-02-17',2019,2,17,1,7,'Sunday','February','f','t',NULL),
(20190218,'2019-02-18',2019,2,18,1,8,'Monday','February','f','f',NULL),
(20190219,'2019-02-19',2019,2,19,1,8,'Tuesday','February','f','f',NULL),
(20190220,'2019-02-20',2019,2,20,1,8,'Wednesday','February','f','f',NULL),
(20190221,'2019-02-21',2019,2,21,1,8,'Thursday','February','f','f',NULL),
(20190222,'2019-02-22',2019,2,22,1,8,'Friday','February','f','f',NULL),
(20190223,'2019-02-23',2019,2,23,1,8,'Saturday','February','f','t',NULL),
(20190224,'2019-02-24',2019,2,24,1,8,'Sunday','February','f','t',NULL),
(20190225,'2019-02-25',2019,2,25,1,9,'Monday','February','f','f',NULL),
(20190226,'2019-02-26',2019,2,26,1,9,'Tuesday','February','f','f',NULL),
(20190227,'2019-02-27',2019,2,27,1,9,'Wednesday','February','f','f',NULL),
(20190228,'2019-02-28',2019,2,28,1,9,'Thursday','February','f','f',NULL),
(20190301,'2019-03-01',2019,3,1,1,9,'Friday','March','f','f',NULL),
(20190302,'2019-03-02',2019,3,2,1,9,'Saturday','March','f','t',NULL),
(20190303,'2019-03-03',2019,3,3,1,9,'Sunday','March','f','t',NULL),
(20190304,'2019-03-04',2019,3,4,1,10,'Monday','March','f','f',NULL),
(20190305,'2019-03-05',2019,3,5,1,10,'Tuesday','March','f','f',NULL),
(20190306,'2019-03-06',2019,3,6,1,10,'Wednesday','March','f','f',NULL),
(20190307,'2019-03-07',2019,3,7,1,10,'Thursday','March','f','f',NULL),
(20190308,'2019-03-08',2019,3,8,1,10,'Friday','March','f','f',NULL),
(20190309,'2019-03-09',2019,3,9,1,10,'Saturday','March','f','t',NULL),
(20190310,'2019-03-10',2019,3,10,1,10,'Sunday','March','f','t',NULL),
(20190311,'2019-03-11',2019,3,11,1,11,'Monday','March','f','f',NULL),
(20190312,'2019-03-12',2019,3,12,1,11,'Tuesday','March','f','f',NULL),
(20190313,'2019-03-13',2019,3,13,1,11,'Wednesday','March','f','f',NULL),
(20190314,'2019-03-14',2019,3,14,1,11,'Thursday','March','f','f',NULL),
(20190315,'2019-03-15',2019,3,15,1,11,'Friday','March','f','f',NULL),
(20190316,'2019-03-16',2019,3,16,1,11,'Saturday','March','f','t',NULL),
(20190317,'2019-03-17',2019,3,17,1,11,'Sunday','March','f','t',NULL),
(20190318,'2019-03-18',2019,3,18,1,12,'Monday','March','f','f',NULL),
(20190319,'2019-03-19',2019,3,19,1,12,'Tuesday','March','f','f',NULL),
(20190320,'2019-03-20',2019,3,20,1,12,'Wednesday','March','f','f',NULL),
(20190321,'2019-03-21',2019,3,21,1,12,'Thursday','March','f','f',NULL),
(20190322,'2019-03-22',2019,3,22,1,12,'Friday','March','f','f',NULL),
(20190323,'2019-03-23',2019,3,23,1,12,'Saturday','March','f','t',NULL),
(20190324,'2019-03-24',2019,3,24,1,12,'Sunday','March','f','t',NULL),
(20190325,'2019-03-25',2019,3,25,1,13,'Monday','March','f','f',NULL),
(20190326,'2019-03-26',2019,3,26,1,13,'Tuesday','March','f','f',NULL),
(20190327,'2019-03-27',2019,3,27,1,13,'Wednesday','March','f','f',NULL),
(20190328,'2019-03-28',2019,3,28,1,13,'Thursday','March','f','f',NULL),
(20190329,'2019-03-29',2019,3,29,1,13,'Friday','March','f','f',NULL),
(20190330,'2019-03-30',2019,3,30,1,13,'Saturday','March','f','t',NULL),
(20190331,'2019-03-31',2019,3,31,1,13,'Sunday','March','f','t',NULL),
(20190401,'2019-04-01',2019,4,1,2,14,'Monday','April','f','f',NULL),
(20190402,'2019-04-02',2019,4,2,2,14,'Tuesday','April','f','f',NULL),
(20190403,'2019-04-03',2019,4,3,2,14,'Wednesday','April','f','f',NULL),
(20190404,'2019-04-04',2019,4,4,2,14,'Thursday','April','f','f',NULL),
(20190405,'2019-04-05',2019,4,5,2,14,'Friday','April','f','f',NULL),
(20190406,'2019-04-06',2019,4,6,2,14,'Saturday','April','f','t',NULL),
(20190407,'2019-04-07',2019,4,7,2,14,'Sunday','April','f','t',NULL),
(20190408,'2019-04-08',2019,4,8,2,15,'Monday','April','f','f',NULL),
(20190409,'2019-04-09',2019,4,9,2,15,'Tuesday','April','f','f',NULL),
(20190410,'2019-04-10',2019,4,10,2,15,'Wednesday','April','f','f',NULL),
(20190411,'2019-04-11',2019,4,11,2,15,'Thursday','April','f','f',NULL),
(20190412,'2019-04-12',2019,4,12,2,15,'Friday','April','f','f',NULL),
(20190413,'2019-04-13',2019,4,13,2,15,'Saturday','April','f','t',NULL),
(20190414,'2019-04-14',2019,4,14,2,15,'Sunday','April','f','t',NULL),
(20190415,'2019-04-15',2019,4,15,2,16,'Monday','April','f','f',NULL),
(20190416,'2019-04-16',2019,4,16,2,16,'Tuesday','April','f','f',NULL),
(20190417,'2019-04-17',2019,4,17,2,16,'Wednesday','April','f','f',NULL),
(20190418,'2019-04-18',2019,4,18,2,16,'Thursday','April','f','f',NULL),
(20190419,'2019-04-19',2019,4,19,2,16,'Friday','April','f','f',NULL),
(20190420,'2019-04-20',2019,4,20,2,16,'Saturday','April','f','t',NULL),
(20190421,'2019-04-21',2019,4,21,2,16,'Sunday','April','f','t',NULL),
(20190422,'2019-04-22',2019,4,22,2,17,'Monday','April','f','f',NULL),
(20190423,'2019-04-23',2019,4,23,2,17,'Tuesday','April','f','f',NULL),
(20190424,'2019-04-24',2019,4,24,2,17,'Wednesday','April','f','f',NULL),
(20190425,'2019-04-25',2019,4,25,2,17,'Thursday','April','f','f',NULL),
(20190426,'2019-04-26',2019,4,26,2,17,'Friday','April','f','f',NULL),
(20190427,'2019-04-27',2019,4,27,2,17,'Saturday','April','f','t',NULL),
(20190428,'2019-04-28',2019,4,28,2,17,'Sunday','April','f','t',NULL),
(20190429,'2019-04-29',2019,4,29,2,18,'Monday','April','f','f',NULL),
(20190430,'2019-04-30',2019,4,30,2,18,'Tuesday','April','f','f',NULL),
(20190501,'2019-05-01',2019,5,1,2,18,'Wednesday','May','f','f',NULL),
(20190502,'2019-05-02',2019,5,2,2,18,'Thursday','May','f','f',NULL),
(20190503,'2019-05-03',2019,5,3,2,18,'Friday','May','f','f',NULL),
(20190504,'2019-05-04',2019,5,4,2,18,'Saturday','May','f','t',NULL),
(20190505,'2019-05-05',2019,5,5,2,18,'Sunday','May','f','t',NULL),
(20190506,'2019-05-06',2019,5,6,2,19,'Monday','May','f','f',NULL),
(20190507,'2019-05-07',2019,5,7,2,19,'Tuesday','May','f','f',NULL),
(20190508,'2019-05-08',2019,5,8,2,19,'Wednesday','May','f','f',NULL),
(20190509,'2019-05-09',2019,5,9,2,19,'Thursday','May','f','f',NULL),
(20190510,'2019-05-10',2019,5,10,2,19,'Friday','May','f','f',NULL),
(20190511,'2019-05-11',2019,5,11,2,19,'Saturday','May','f','t',NULL),
(20190512,'2019-05-12',2019,5,12,2,19,'Sunday','May','f','t',NULL),
(20190513,'2019-05-13',2019,5,13,2,20,'Monday','May','f','f',NULL),
(20190514,'2019-05-14',2019,5,14,2,20,'Tuesday','May','f','f',NULL),
(20190515,'2019-05-15',2019,5,15,2,20,'Wednesday','May','f','f',NULL),
(20190516,'2019-05-16',2019,5,16,2,20,'Thursday','May','f','f',NULL),
(20190517,'2019-05-17',2019,5,17,2,20,'Friday','May','f','f',NULL),
(20190518,'2019-05-18',2019,5,18,2,20,'Saturday','May','f','t',NULL),
(20190519,'2019-05-19',2019,5,19,2,20,'Sunday','May','f','t',NULL),
(20190520,'2019-05-20',2019,5,20,2,21,'Monday','May','f','f',NULL),
(20190521,'2019-05-21',2019,5,21,2,21,'Tuesday','May','f','f',NULL),
(20190522,'2019-05-22',2019,5,22,2,21,'Wednesday','May','f','f',NULL),
(20190523,'2019-05-23',2019,5,23,2,21,'Thursday','May','f','f',NULL),
(20190524,'2019-05-24',2019,5,24,2,21,'Friday','May','f','f',NULL),
(20190525,'2019-05-25',2019,5,25,2,21,'Saturday','May','f','t',NULL),
(20190526,'2019-05-26',2019,5,26,2,21,'Sunday','May','f','t',NULL),
(20190527,'2019-05-27',2019,5,27,2,22,'Monday','May','f','f',NULL),
(20190528,'2019-05-28',2019,5,28,2,22,'Tuesday','May','f','f',NULL),
(20190529,'2019-05-29',2019,5,29,2,22,'Wednesday','May','f','f',NULL),
(20190530,'2019-05-30',2019,5,30,2,22,'Thursday','May','f','f',NULL),
(20190531,'2019-05-31',2019,5,31,2,22,'Friday','May','f','f',NULL),
(20190601,'2019-06-01',2019,6,1,2,22,'Saturday','June','f','t',NULL),
(20190602,'2019-06-02',2019,6,2,2,22,'Sunday','June','f','t',NULL),
(20190603,'2019-06-03',2019,6,3,2,23,'Monday','June','f','f',NULL),
(20190604,'2019-06-04',2019,6,4,2,23,'Tuesday','June','f','f',NULL),
(20190605,'2019-06-05',2019,6,5,2,23,'Wednesday','June','f','f',NULL),
(20190606,'2019-06-06',2019,6,6,2,23,'Thursday','June','f','f',NULL),
(20190607,'2019-06-07',2019,6,7,2,23,'Friday','June','f','f',NULL),
(20190608,'2019-06-08',2019,6,8,2,23,'Saturday','June','f','t',NULL),
(20190609,'2019-06-09',2019,6,9,2,23,'Sunday','June','f','t',NULL),
(20190610,'2019-06-10',2019,6,10,2,24,'Monday','June','f','f',NULL),
(20190611,'2019-06-11',2019,6,11,2,24,'Tuesday','June','f','f',NULL),
(20190612,'2019-06-12',2019,6,12,2,24,'Wednesday','June','f','f',NULL),
(20190613,'2019-06-13',2019,6,13,2,24,'Thursday','June','f','f',NULL),
(20190614,'2019-06-14',2019,6,14,2,24,'Friday','June','f','f',NULL),
(20190615,'2019-06-15',2019,6,15,2,24,'Saturday','June','f','t',NULL),
(20190616,'2019-06-16',2019,6,16,2,24,'Sunday','June','f','t',NULL),
(20190617,'2019-06-17',2019,6,17,2,25,'Monday','June','f','f',NULL),
(20190618,'2019-06-18',2019,6,18,2,25,'Tuesday','June','f','f',NULL),
(20190619,'2019-06-19',2019,6,19,2,25,'Wednesday','June','f','f',NULL),
(20190620,'2019-06-20',2019,6,20,2,25,'Thursday','June','f','f',NULL),
(20190621,'2019-06-21',2019,6,21,2,25,'Friday','June','f','f',NULL),
(20190622,'2019-06-22',2019,6,22,2,25,'Saturday','June','f','t',NULL),
(20190623,'2019-06-23',2019,6,23,2,25,'Sunday','June','f','t',NULL),
(20190624,'2019-06-24',2019,6,24,2,26,'Monday','June','f','f',NULL),
(20190625,'2019-06-25',2019,6,25,2,26,'Tuesday','June','f','f',NULL),
(20190626,'2019-06-26',2019,6,26,2,26,'Wednesday','June','f','f',NULL),
(20190627,'2019-06-27',2019,6,27,2,26,'Thursday','June','f','f',NULL),
(20190628,'2019-06-28',2019,6,28,2,26,'Friday','June','f','f',NULL),
(20190629,'2019-06-29',2019,6,29,2,26,'Saturday','June','f','t',NULL),
(20190630,'2019-06-30',2019,6,30,2,26,'Sunday','June','f','t',NULL),
(20190701,'2019-07-01',2019,7,1,3,27,'Monday','July','f','f',NULL),
(20190702,'2019-07-02',2019,7,2,3,27,'Tuesday','July','f','f',NULL),
(20190703,'2019-07-03',2019,7,3,3,27,'Wednesday','July','f','f',NULL),
(20190704,'2019-07-04',2019,7,4,3,27,'Thursday','July','f','f',NULL),
(20190705,'2019-07-05',2019,7,5,3,27,'Friday','July','f','f',NULL),
(20190706,'2019-07-06',2019,7,6,3,27,'Saturday','July','f','t',NULL),
(20190707,'2019-07-07',2019,7,7,3,27,'Sunday','July','f','t',NULL),
(20190708,'2019-07-08',2019,7,8,3,28,'Monday','July','f','f',NULL),
(20190709,'2019-07-09',2019,7,9,3,28,'Tuesday','July','f','f',NULL),
(20190710,'2019-07-10',2019,7,10,3,28,'Wednesday','July','f','f',NULL),
(20190711,'2019-07-11',2019,7,11,3,28,'Thursday','July','f','f',NULL),
(20190712,'2019-07-12',2019,7,12,3,28,'Friday','July','f','f',NULL),
(20190713,'2019-07-13',2019,7,13,3,28,'Saturday','July','f','t',NULL),
(20190714,'2019-07-14',2019,7,14,3,28,'Sunday','July','f','t',NULL),
(20190715,'2019-07-15',2019,7,15,3,29,'Monday','July','f','f',NULL),
(20190716,'2019-07-16',2019,7,16,3,29,'Tuesday','July','f','f',NULL),
(20190717,'2019-07-17',2019,7,17,3,29,'Wednesday','July','f','f',NULL),
(20190718,'2019-07-18',2019,7,18,3,29,'Thursday','July','f','f',NULL),
(20190719,'2019-07-19',2019,7,19,3,29,'Friday','July','f','f',NULL),
(20190720,'2019-07-20',2019,7,20,3,29,'Saturday','July','f','t',NULL),
(20190721,'2019-07-21',2019,7,21,3,29,'Sunday','July','f','t',NULL),
(20190722,'2019-07-22',2019,7,22,3,30,'Monday','July','f','f',NULL),
(20190723,'2019-07-23',2019,7,23,3,30,'Tuesday','July','f','f',NULL),
(20190724,'2019-07-24',2019,7,24,3,30,'Wednesday','July','f','f',NULL),
(20190725,'2019-07-25',2019,7,25,3,30,'Thursday','July','f','f',NULL),
(20190726,'2019-07-26',2019,7,26,3,30,'Friday','July','f','f',NULL),
(20190727,'2019-07-27',2019,7,27,3,30,'Saturday','July','f','t',NULL),
(20190728,'2019-07-28',2019,7,28,3,30,'Sunday','July','f','t',NULL),
(20190729,'2019-07-29',2019,7,29,3,31,'Monday','July','f','f',NULL),
(20190730,'2019-07-30',2019,7,30,3,31,'Tuesday','July','f','f',NULL),
(20190731,'2019-07-31',2019,7,31,3,31,'Wednesday','July','f','f',NULL),
(20190801,'2019-08-01',2019,8,1,3,31,'Thursday','August','f','f',NULL),
(20190802,'2019-08-02',2019,8,2,3,31,'Friday','August','f','f',NULL),
(20190803,'2019-08-03',2019,8,3,3,31,'Saturday','August','f','t',NULL),
(20190804,'2019-08-04',2019,8,4,3,31,'Sunday','August','f','t',NULL),
(20190805,'2019-08-05',2019,8,5,3,32,'Monday','August','f','f',NULL),
(20190806,'2019-08-06',2019,8,6,3,32,'Tuesday','August','f','f',NULL),
(20190807,'2019-08-07',2019,8,7,3,32,'Wednesday','August','f','f',NULL),
(20190808,'2019-08-08',2019,8,8,3,32,'Thursday','August','f','f',NULL),
(20190809,'2019-08-09',2019,8,9,3,32,'Friday','August','f','f',NULL),
(20190810,'2019-08-10',2019,8,10,3,32,'Saturday','August','f','t',NULL),
(20190811,'2019-08-11',2019,8,11,3,32,'Sunday','August','f','t',NULL),
(20190812,'2019-08-12',2019,8,12,3,33,'Monday','August','f','f',NULL),
(20190813,'2019-08-13',2019,8,13,3,33,'Tuesday','August','f','f',NULL),
(20190814,'2019-08-14',2019,8,14,3,33,'Wednesday','August','f','f',NULL),
(20190815,'2019-08-15',2019,8,15,3,33,'Thursday','August','f','f',NULL),
(20190816,'2019-08-16',2019,8,16,3,33,'Friday','August','f','f',NULL),
(20190817,'2019-08-17',2019,8,17,3,33,'Saturday','August','f','t',NULL),
(20190818,'2019-08-18',2019,8,18,3,33,'Sunday','August','f','t',NULL),
(20190819,'2019-08-19',2019,8,19,3,34,'Monday','August','f','f',NULL),
(20190820,'2019-08-20',2019,8,20,3,34,'Tuesday','August','f','f',NULL),
(20190821,'2019-08-21',2019,8,21,3,34,'Wednesday','August','f','f',NULL),
(20190822,'2019-08-22',2019,8,22,3,34,'Thursday','August','f','f',NULL),
(20190823,'2019-08-23',2019,8,23,3,34,'Friday','August','f','f',NULL),
(20190824,'2019-08-24',2019,8,24,3,34,'Saturday','August','f','t',NULL),
(20190825,'2019-08-25',2019,8,25,3,34,'Sunday','August','f','t',NULL),
(20190826,'2019-08-26',2019,8,26,3,35,'Monday','August','f','f',NULL),
(20190827,'2019-08-27',2019,8,27,3,35,'Tuesday','August','f','f',NULL),
(20190828,'2019-08-28',2019,8,28,3,35,'Wednesday','August','f','f',NULL),
(20190829,'2019-08-29',2019,8,29,3,35,'Thursday','August','f','f',NULL),
(20190830,'2019-08-30',2019,8,30,3,35,'Friday','August','f','f',NULL),
(20190831,'2019-08-31',2019,8,31,3,35,'Saturday','August','f','t',NULL),
(20190901,'2019-09-01',2019,9,1,3,35,'Sunday','September','f','t',NULL),
(20190902,'2019-09-02',2019,9,2,3,36,'Monday','September','f','f',NULL),
(20190903,'2019-09-03',2019,9,3,3,36,'Tuesday','September','f','f',NULL),
(20190904,'2019-09-04',2019,9,4,3,36,'Wednesday','September','f','f',NULL),
(20190905,'2019-09-05',2019,9,5,3,36,'Thursday','September','f','f',NULL),
(20190906,'2019-09-06',2019,9,6,3,36,'Friday','September','f','f',NULL),
(20190907,'2019-09-07',2019,9,7,3,36,'Saturday','September','f','t',NULL),
(20190908,'2019-09-08',2019,9,8,3,36,'Sunday','September','f','t',NULL),
(20190909,'2019-09-09',2019,9,9,3,37,'Monday','September','f','f',NULL),
(20190910,'2019-09-10',2019,9,10,3,37,'Tuesday','September','f','f',NULL),
(20190911,'2019-09-11',2019,9,11,3,37,'Wednesday','September','f','f',NULL),
(20190912,'2019-09-12',2019,9,12,3,37,'Thursday','September','f','f',NULL),
(20190913,'2019-09-13',2019,9,13,3,37,'Friday','September','f','f',NULL),
(20190914,'2019-09-14',2019,9,14,3,37,'Saturday','September','f','t',NULL),
(20190915,'2019-09-15',2019,9,15,3,37,'Sunday','September','f','t',NULL),
(20190916,'2019-09-16',2019,9,16,3,38,'Monday','September','f','f',NULL),
(20190917,'2019-09-17',2019,9,17,3,38,'Tuesday','September','f','f',NULL),
(20190918,'2019-09-18',2019,9,18,3,38,'Wednesday','September','f','f',NULL),
(20190919,'2019-09-19',2019,9,19,3,38,'Thursday','September','f','f',NULL),
(20190920,'2019-09-20',2019,9,20,3,38,'Friday','September','f','f',NULL),
(20190921,'2019-09-21',2019,9,21,3,38,'Saturday','September','f','t',NULL),
(20190922,'2019-09-22',2019,9,22,3,38,'Sunday','September','f','t',NULL),
(20190923,'2019-09-23',2019,9,23,3,39,'Monday','September','f','f',NULL),
(20190924,'2019-09-24',2019,9,24,3,39,'Tuesday','September','f','f',NULL),
(20190925,'2019-09-25',2019,9,25,3,39,'Wednesday','September','f','f',NULL),
(20190926,'2019-09-26',2019,9,26,3,39,'Thursday','September','f','f',NULL),
(20190927,'2019-09-27',2019,9,27,3,39,'Friday','September','f','f',NULL),
(20190928,'2019-09-28',2019,9,28,3,39,'Saturday','September','f','t',NULL),
(20190929,'2019-09-29',2019,9,29,3,39,'Sunday','September','f','t',NULL),
(20190930,'2019-09-30',2019,9,30,3,40,'Monday','September','f','f',NULL),
(20191001,'2019-10-01',2019,10,1,4,40,'Tuesday','October','f','f',NULL),
(20191002,'2019-10-02',2019,10,2,4,40,'Wednesday','October','f','f',NULL),
(20191003,'2019-10-03',2019,10,3,4,40,'Thursday','October','f','f',NULL),
(20191004,'2019-10-04',2019,10,4,4,40,'Friday','October','f','f',NULL),
(20191005,'2019-10-05',2019,10,5,4,40,'Saturday','October','f','t',NULL),
(20191006,'2019-10-06',2019,10,6,4,40,'Sunday','October','f','t',NULL),
(20191007,'2019-10-07',2019,10,7,4,41,'Monday','October','f','f',NULL),
(20191008,'2019-10-08',2019,10,8,4,41,'Tuesday','October','f','f',NULL),
(20191009,'2019-10-09',2019,10,9,4,41,'Wednesday','October','f','f',NULL),
(20191010,'2019-10-10',2019,10,10,4,41,'Thursday','October','f','f',NULL),
(20191011,'2019-10-11',2019,10,11,4,41,'Friday','October','f','f',NULL),
(20191012,'2019-10-12',2019,10,12,4,41,'Saturday','October','f','t',NULL),
(20191013,'2019-10-13',2019,10,13,4,41,'Sunday','October','f','t',NULL),
(20191014,'2019-10-14',2019,10,14,4,42,'Monday','October','f','f',NULL),
(20191015,'2019-10-15',2019,10,15,4,42,'Tuesday','October','f','f',NULL),
(20191016,'2019-10-16',2019,10,16,4,42,'Wednesday','October','f','f',NULL),
(20191017,'2019-10-17',2019,10,17,4,42,'Thursday','October','f','f',NULL),
(20191018,'2019-10-18',2019,10,18,4,42,'Friday','October','f','f',NULL),
(20191019,'2019-10-19',2019,10,19,4,42,'Saturday','October','f','t',NULL),
(20191020,'2019-10-20',2019,10,20,4,42,'Sunday','October','f','t',NULL),
(20191021,'2019-10-21',2019,10,21,4,43,'Monday','October','f','f',NULL),
(20191022,'2019-10-22',2019,10,22,4,43,'Tuesday','October','f','f',NULL),
(20191023,'2019-10-23',2019,10,23,4,43,'Wednesday','October','f','f',NULL),
(20191024,'2019-10-24',2019,10,24,4,43,'Thursday','October','f','f',NULL),
(20191025,'2019-10-25',2019,10,25,4,43,'Friday','October','f','f',NULL),
(20191026,'2019-10-26',2019,10,26,4,43,'Saturday','October','f','t',NULL),
(20191027,'2019-10-27',2019,10,27,4,43,'Sunday','October','f','t',NULL),
(20191028,'2019-10-28',2019,10,28,4,44,'Monday','October','f','f',NULL),
(20191029,'2019-10-29',2019,10,29,4,44,'Tuesday','October','f','f',NULL),
(20191030,'2019-10-30',2019,10,30,4,44,'Wednesday','October','f','f',NULL),
(20191031,'2019-10-31',2019,10,31,4,44,'Thursday','October','f','f',NULL),
(20191101,'2019-11-01',2019,11,1,4,44,'Friday','November','f','f',NULL),
(20191102,'2019-11-02',2019,11,2,4,44,'Saturday','November','f','t',NULL),
(20191103,'2019-11-03',2019,11,3,4,44,'Sunday','November','f','t',NULL),
(20191104,'2019-11-04',2019,11,4,4,45,'Monday','November','f','f',NULL),
(20191105,'2019-11-05',2019,11,5,4,45,'Tuesday','November','f','f',NULL),
(20191106,'2019-11-06',2019,11,6,4,45,'Wednesday','November','f','f',NULL),
(20191107,'2019-11-07',2019,11,7,4,45,'Thursday','November','f','f',NULL),
(20191108,'2019-11-08',2019,11,8,4,45,'Friday','November','f','f',NULL),
(20191109,'2019-11-09',2019,11,9,4,45,'Saturday','November','f','t',NULL),
(20191110,'2019-11-10',2019,11,10,4,45,'Sunday','November','f','t',NULL),
(20191111,'2019-11-11',2019,11,11,4,46,'Monday','November','f','f',NULL),
(20191112,'2019-11-12',2019,11,12,4,46,'Tuesday','November','f','f',NULL),
(20191113,'2019-11-13',2019,11,13,4,46,'Wednesday','November','f','f',NULL),
(20191114,'2019-11-14',2019,11,14,4,46,'Thursday','November','f','f',NULL),
(20191115,'2019-11-15',2019,11,15,4,46,'Friday','November','f','f',NULL),
(20191116,'2019-11-16',2019,11,16,4,46,'Saturday','November','f','t',NULL),
(20191117,'2019-11-17',2019,11,17,4,46,'Sunday','November','f','t',NULL),
(20191118,'2019-11-18',2019,11,18,4,47,'Monday','November','f','f',NULL),
(20191119,'2019-11-19',2019,11,19,4,47,'Tuesday','November','f','f',NULL),
(20191120,'2019-11-20',2019,11,20,4,47,'Wednesday','November','f','f',NULL),
(20191121,'2019-11-21',2019,11,21,4,47,'Thursday','November','f','f',NULL),
(20191122,'2019-11-22',2019,11,22,4,47,'Friday','November','f','f',NULL),
(20191123,'2019-11-23',2019,11,23,4,47,'Saturday','November','f','t',NULL),
(20191124,'2019-11-24',2019,11,24,4,47,'Sunday','November','f','t',NULL),
(20191125,'2019-11-25',2019,11,25,4,48,'Monday','November','f','f',NULL),
(20191126,'2019-11-26',2019,11,26,4,48,'Tuesday','November','f','f',NULL),
(20191127,'2019-11-27',2019,11,27,4,48,'Wednesday','November','f','f',NULL),
(20191128,'2019-11-28',2019,11,28,4,48,'Thursday','November','f','f',NULL),
(20191129,'2019-11-29',2019,11,29,4,48,'Friday','November','f','f',NULL),
(20191130,'2019-11-30',2019,11,30,4,48,'Saturday','November','f','t',NULL),
(20191201,'2019-12-01',2019,12,1,4,48,'Sunday','December','f','t',NULL),
(20191202,'2019-12-02',2019,12,2,4,49,'Monday','December','f','f',NULL),
(20191203,'2019-12-03',2019,12,3,4,49,'Tuesday','December','f','f',NULL),
(20191204,'2019-12-04',2019,12,4,4,49,'Wednesday','December','f','f',NULL),
(20191205,'2019-12-05',2019,12,5,4,49,'Thursday','December','f','f',NULL),
(20191206,'2019-12-06',2019,12,6,4,49,'Friday','December','f','f',NULL),
(20191207,'2019-12-07',2019,12,7,4,49,'Saturday','December','f','t',NULL),
(20191208,'2019-12-08',2019,12,8,4,49,'Sunday','December','f','t',NULL),
(20191209,'2019-12-09',2019,12,9,4,50,'Monday','December','f','f',NULL),
(20191210,'2019-12-10',2019,12,10,4,50,'Tuesday','December','f','f',NULL),
(20191211,'2019-12-11',2019,12,11,4,50,'Wednesday','December','f','f',NULL),
(20191212,'2019-12-12',2019,12,12,4,50,'Thursday','December','f','f',NULL),
(20191213,'2019-12-13',2019,12,13,4,50,'Friday','December','f','f',NULL),
(20191214,'2019-12-14',2019,12,14,4,50,'Saturday','December','f','t',NULL),
(20191215,'2019-12-15',2019,12,15,4,50,'Sunday','December','f','t',NULL),
(20191216,'2019-12-16',2019,12,16,4,51,'Monday','December','f','f',NULL),
(20191217,'2019-12-17',2019,12,17,4,51,'Tuesday','December','f','f',NULL),
(20191218,'2019-12-18',2019,12,18,4,51,'Wednesday','December','f','f',NULL),
(20191219,'2019-12-19',2019,12,19,4,51,'Thursday','December','f','f',NULL),
(20191220,'2019-12-20',2019,12,20,4,51,'Friday','December','f','f',NULL),
(20191221,'2019-12-21',2019,12,21,4,51,'Saturday','December','f','t',NULL),
(20191222,'2019-12-22',2019,12,22,4,51,'Sunday','December','f','t',NULL),
(20191223,'2019-12-23',2019,12,23,4,52,'Monday','December','f','f',NULL),
(20191224,'2019-12-24',2019,12,24,4,52,'Tuesday','December','f','f',NULL),
(20191225,'2019-12-25',2019,12,25,4,52,'Wednesday','December','f','f',NULL),
(20191226,'2019-12-26',2019,12,26,4,52,'Thursday','December','f','f',NULL),
(20191227,'2019-12-27',2019,12,27,4,52,'Friday','December','f','f',NULL),
(20191228,'2019-12-28',2019,12,28,4,52,'Saturday','December','f','t',NULL),
(20191229,'2019-12-29',2019,12,29,4,52,'Sunday','December','f','t',NULL),
(20191230,'2019-12-30',2019,12,30,4,1,'Monday','December','f','f',NULL);

/*Table structure for table `tr_inspeksi` */

DROP TABLE IF EXISTS `tr_inspeksi`;

CREATE TABLE `tr_inspeksi` (
  `id_inspeksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_bu` int(11) DEFAULT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `id_kendaraan` int(11) DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inspeksi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tr_inspeksi` */

insert  into `tr_inspeksi`(`id_inspeksi`,`id_bu`,`id_driver`,`id_kendaraan`,`cuser`,`cdate`,`status`,`id_perusahaan`) values 
(1,0,0,0,1,'2018-11-01 16:42:49',2,77),
(2,1,1,1,1,'2018-11-01 16:45:31',2,77),
(3,1,1,1,1,'2018-11-02 11:17:08',2,77),
(4,1,1,1,1,'2018-11-05 14:02:18',2,77),
(5,1,1,1,1,'2018-11-05 14:05:05',2,77),
(6,1,1,1,1,'2018-12-13 12:34:22',1,77);

/*Table structure for table `tr_inspeksi_detail` */

DROP TABLE IF EXISTS `tr_inspeksi_detail`;

CREATE TABLE `tr_inspeksi_detail` (
  `id_inspeksi_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_inspeksi` int(11) DEFAULT NULL,
  `id_cek` int(11) DEFAULT NULL,
  `nm_cek` varchar(255) DEFAULT NULL,
  `id_nilai_cek` int(11) DEFAULT NULL,
  `skors` double DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `id_bu` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inspeksi_detail`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

/*Data for the table `tr_inspeksi_detail` */

insert  into `tr_inspeksi_detail`(`id_inspeksi_detail`,`id_inspeksi`,`id_cek`,`nm_cek`,`id_nilai_cek`,`skors`,`status`,`id_bu`,`id_perusahaan`) values 
(1,1,1,'Lampu Utama Kendaraan - Dekat Kanan',3,10,1,1,77),
(2,1,2,'Lampu Utama Kendaraan - Dekat Kiri',3,10,1,1,77),
(3,1,3,'Lampu Utama Kendaraan - Jauh Kanan',3,10,1,1,77),
(4,1,4,'Lampu Utama Kendaraan - Jauh Kiri',3,10,1,1,77),
(5,1,6,'Lampu Posisi Depan - Kanan',3,10,1,1,77),
(6,1,7,'Lampu Posisi Depan - Kiri',3,10,1,1,77),
(7,5,1,'Lampu Utama Kendaraan - Dekat Kanan',4,10,1,1,77),
(8,5,2,'Lampu Utama Kendaraan - Dekat Kiri',3,10,1,1,77),
(9,5,3,'Lampu Utama Kendaraan - Jauh Kanan',6,0,1,1,77),
(10,5,4,'Lampu Utama Kendaraan - Jauh Kiri',6,0,1,1,77),
(11,5,6,'Lampu Posisi Depan - Kanan',6,0,1,1,77),
(12,5,7,'Lampu Posisi Depan - Kiri',6,0,1,1,77),
(13,6,1,'Lampu Utama Kendaraan - Dekat Kanan',1,10,1,1,77),
(14,6,2,'Lampu Utama Kendaraan - Dekat Kiri',3,10,1,1,77),
(15,6,3,'Lampu Utama Kendaraan - Jauh Kanan',NULL,NULL,1,1,77),
(16,6,4,'Lampu Utama Kendaraan - Jauh Kiri',NULL,NULL,1,1,77),
(17,6,5,'Lampu Posisi Depan - Kanan',NULL,NULL,1,1,77),
(18,6,6,'Lampu Posisi Depan - Kiri',NULL,NULL,1,1,77),
(19,6,7,'Lampu Penunjuk Arah (sein) Depan - Kanan',NULL,NULL,1,1,77),
(20,6,8,'Lampu Penunjuk Arah (sein) Depan - Kiri',NULL,NULL,1,1,77),
(21,6,9,'Lampu Kabut - Kanan',NULL,NULL,1,1,77),
(22,6,10,'Lampu Kabut - Kiri',NULL,NULL,1,1,77),
(23,6,11,'Lampu Tanda Batas Dimensi Lebar (Depan) - Kanan',NULL,NULL,1,1,77),
(24,6,12,'Lampu Tanda Batas Dimensi Lebar (Depan) - Kiri',NULL,NULL,1,1,77),
(25,6,13,'Lampu Posisi Belakang - Kanan',NULL,NULL,1,1,77),
(26,6,14,'Lampu Posisi Belakang - Kiri',NULL,NULL,1,1,77),
(27,6,15,'Lampu Penunjuk Arah (sein) Belakang - Kanan',NULL,NULL,1,1,77),
(28,6,16,'Lampu Penunjuk Arah (sein) Belakang - Kiri',NULL,NULL,1,1,77),
(29,6,17,'Lampu Rem - Kanan',NULL,NULL,1,1,77),
(30,6,18,'Lampu Rem - Kiri',NULL,NULL,1,1,77),
(31,6,19,'Lampu Mundur - Kanan',NULL,NULL,1,1,77),
(32,6,20,'Lampu Mundur - Kiri',NULL,NULL,1,1,77),
(33,6,21,'Lampu Tanda Batas Dimensi Lebar (Belakang) - Kanan',NULL,NULL,1,1,77),
(34,6,22,'Lampu Tanda Batas Dimensi Lebar (Belakang) - Kiri',NULL,NULL,1,1,77),
(35,6,23,'Lampu Penerang Tanda Nomor Kendaraan',NULL,NULL,1,1,77),
(36,6,24,'Pengukur Kecepatan',NULL,NULL,1,1,77),
(37,6,25,'Kaca Spion Luar',NULL,NULL,1,1,77),
(38,6,26,'Penghapus Kaca / Wiper',NULL,NULL,1,1,77),
(39,6,27,'Klakson',NULL,NULL,1,1,77),
(40,6,28,'Sabuk Keselamatan - Pengemudi',NULL,NULL,1,1,77),
(41,6,29,'Sabuk Keselamatan - Penumpang',NULL,NULL,1,1,77),
(42,6,30,'Ban Cadangan',NULL,NULL,1,1,77),
(43,6,31,'Segitiga Pengaman',NULL,NULL,1,1,77),
(44,6,32,'Dongkrak',NULL,NULL,1,1,77),
(45,6,33,'Pembuka Roda',NULL,NULL,1,1,77),
(46,6,34,'Lampu Senter',NULL,NULL,1,1,77),
(47,6,35,'Pegangan Tangan (Hand Grip)',NULL,NULL,1,1,77),
(48,6,36,'Kondisi Ban',NULL,NULL,1,1,77),
(49,6,37,'Ban Cadangan',NULL,NULL,1,1,77),
(50,6,38,'Pintu Darurat',NULL,NULL,1,1,77),
(51,6,39,'Jendela Darurat',NULL,NULL,1,1,77),
(52,6,40,'Alat Pemukul / Pemecah Kaca (Martil)',NULL,NULL,1,1,77),
(53,6,41,'Alat Kendali Darurat Pintu Utama',NULL,NULL,1,1,77),
(54,6,42,'Fasilitas Kesehatan',NULL,NULL,1,1,77),
(55,6,43,'Alat Pemadam Api Ringan (APAR)',NULL,NULL,1,1,77),
(56,6,44,'Pintu Keluar & Masuk Penumpang',NULL,NULL,1,1,77),
(57,6,45,'Pintu Keluar Masuk Pengemudi',NULL,NULL,1,1,77),
(58,6,46,'Kondisi Kaca Depan',NULL,NULL,1,1,77),
(59,6,47,'Kondisi Kaca Jendela',NULL,NULL,1,1,77),
(60,6,48,'Roda Kemudi',NULL,NULL,1,1,77),
(61,6,49,'Pengemudi - Kondisi Fisik',NULL,NULL,1,1,77),
(62,6,50,'Pengemudi - Kompetensi',NULL,NULL,1,1,77),
(63,6,51,'Pengemudi - Waktu Kerja',NULL,NULL,1,1,77),
(64,6,52,'Pengemudi - Waktu Istirahat',NULL,NULL,1,1,77),
(65,6,53,'Buku Panduan Penumpang',NULL,NULL,1,1,77),
(66,6,54,'Rel Gordyn Di Jendela',NULL,NULL,1,1,77),
(67,6,55,'Alat Pembatas Kecepatan',NULL,NULL,1,1,77),
(68,6,56,'Kelistrikan Untuk Audio Visual - Audio System',NULL,NULL,1,1,77),
(69,6,57,'Kelistrikan Untuk Audio Visual - Jam Digital',NULL,NULL,1,1,77),
(70,6,58,'Kelistrikan Untuk Audio Visual - Papan Trayek',NULL,NULL,1,1,77),
(71,6,59,'Kelistrikan Untuk Audio Visual - Bel Penumpang',NULL,NULL,1,1,77);

/*Table structure for table `tr_responden` */

DROP TABLE IF EXISTS `tr_responden`;

CREATE TABLE `tr_responden` (
  `id_responden` int(11) NOT NULL AUTO_INCREMENT,
  `id_session` varchar(100) DEFAULT NULL,
  `id_survei` int(11) DEFAULT NULL,
  `nm_responden` varchar(100) DEFAULT NULL,
  `nip_responden` varchar(100) DEFAULT NULL,
  `id_posisi` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `id_bu` int(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `id_pendidikan` varchar(100) DEFAULT NULL,
  `status_pegawai` varchar(100) DEFAULT NULL,
  `id_golongan` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT '77',
  `status` tinyint(1) DEFAULT '0' COMMENT '0=belum, 1=sudah',
  PRIMARY KEY (`id_responden`),
  UNIQUE KEY `Uniqkey` (`id_survei`,`nip_responden`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `tr_responden` */

insert  into `tr_responden`(`id_responden`,`id_session`,`id_survei`,`nm_responden`,`nip_responden`,`id_posisi`,`tempat_lahir`,`id_bu`,`tgl_lahir`,`tgl_masuk`,`id_pendidikan`,`status_pegawai`,`id_golongan`,`jenis_kelamin`,`id_perusahaan`,`status`) values 
(1,'2018-12-2522:10:10',15,'Cristananda Ratnady','123',8,'Bangkalan',60,'1993-01-07','2018-07-18','8','Kontrak','0','1',77,1),
(2,'2018-12-2522:12:48',15,'Agus Fendiyanto','456',8,'Pamekasan',60,'1990-07-01','2018-07-18','8','Kontrak','0','1',77,1),
(3,'2018-12-2522:33:54',15,'Faiz Zainol','789',8,'Sumenep',60,'1991-04-01','2018-07-18','8','Kontrak','0','1',77,1),
(4,'2018-12-2522:54:47',15,'Fauzan Pratama','321',8,'Bekasi',60,'1996-07-01','2018-10-01','6','Capeg','7','1',77,1),
(5,'2018-12-2609:14:55',15,'Aditya Nur','654',8,'Bogor',60,'1990-03-01','2018-04-01','6','Capeg','8','1',77,1),
(6,'2018-12-2610:19:45',15,'Atika Ariasti','8818120301',7,'Jakarta',60,'1988-06-15','2018-05-30','9','Capeg','11','2',77,1),
(7,'2018-12-2610:38:11',15,'MONISA DAMAYANTI KS','871011366',7,'SEMARANG',60,'1987-08-25','2010-01-11','8','Pegawai','11','2',77,0),
(8,'2018-12-2610:39:28',15,'KUSNADI','901011606',8,'BOGOR',60,'1990-06-12','2010-06-01','3','Pegawai','7','1',77,1),
(9,'2018-12-2610:41:25',15,'anonim','987',8,'solo',60,'1991-10-08','2016-01-04','8','Kontrak','10','1',77,1),
(10,'2018-12-2610:41:55',15,'Nurdin Nurdiawan','900611080',8,'Ciamis',60,'1990-01-14','2006-11-01','8','Pegawai','10','1',77,1),
(11,'2018-12-2610:42:26',15,'Lydia Lupita','147',8,'Bekasi',60,'1994-07-18','2018-07-04','8','Kontrak','1','2',77,1),
(12,'2018-12-2610:43:46',15,'Nareswari Nur Anindita','91161200119',7,'Solo',60,'1991-10-08','2016-01-04','8','Pegawai','10','2',77,1),
(13,'2018-12-2610:44:01',15,'MONISA DAMAYANTI KS','871011367',7,'SEMARANG',60,'1987-08-25','2010-01-11','8','Pegawai','11','2',77,1),
(14,'2018-12-2610:58:23',15,'Agus priyo s','790110913',8,'Jakarta',60,'2097-01-01','2018-12-01','3','Pegawai','7','1',77,1),
(15,'2018-12-2610:59:32',15,'Atika','88993322',4,'jakarta',1,'1988-06-15','1999-06-30','9','Pegawai','12','1',77,0),
(16,'2018-12-2808:53:50',15,'erma','879878',1,'bekasi',2,'1996-12-12','2017-09-04','3','Capeg','3','2',77,1),
(17,'2018-12-2809:20:19',15,'Angoez','159753',4,'Pamekasan',41,'1988-07-01','2016-12-01','8','Capeg','12','1',77,0),
(18,'2018-12-2809:36:47',15,'Adi','7324985',1,'Bandung',1,'2018-12-02','2018-12-02','1','Kontrak','1','1',77,1),
(19,'2018-12-2810:01:12',15,'Ratnady','753159',6,'Surabaya',43,'1999-08-13','2015-04-01','9','Pegawai','11','1',77,1);

/*Table structure for table `tr_survei` */

DROP TABLE IF EXISTS `tr_survei`;

CREATE TABLE `tr_survei` (
  `id_survei` int(11) NOT NULL AUTO_INCREMENT,
  `nm_survei` varchar(100) DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_survei`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `tr_survei` */

insert  into `tr_survei`(`id_survei`,`nm_survei`,`cuser`,`cdate`,`status`,`id_perusahaan`) values 
(1,NULL,1,'2018-11-01 16:42:49',2,77),
(11,'Contoh Kedua',1,'0000-00-00 00:00:00',2,77),
(15,'Survei Kepuasan Pegawai 2018',2,'2018-12-17 22:33:07',1,77);

/*Table structure for table `tr_survei_access` */

DROP TABLE IF EXISTS `tr_survei_access`;

CREATE TABLE `tr_survei_access` (
  `id_survei_access` int(11) NOT NULL AUTO_INCREMENT,
  `id_survei` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `active` tinyint(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_survei_access`),
  UNIQUE KEY `uq_bu_access` (`id_survei`,`id_user`,`id_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tr_survei_access` */

insert  into `tr_survei_access`(`id_survei_access`,`id_survei`,`id_user`,`active`,`id_perusahaan`) values 
(1,15,1,1,77);

/*Table structure for table `tr_survei_detail` */

DROP TABLE IF EXISTS `tr_survei_detail`;

CREATE TABLE `tr_survei_detail` (
  `id_survei_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_survei` int(11) DEFAULT NULL,
  `id_cek` int(11) DEFAULT NULL,
  `nm_cek` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `skors` double DEFAULT NULL,
  PRIMARY KEY (`id_survei_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=396 DEFAULT CHARSET=utf8;

/*Data for the table `tr_survei_detail` */

insert  into `tr_survei_detail`(`id_survei_detail`,`id_survei`,`id_cek`,`nm_cek`,`status`,`id_perusahaan`,`skors`) values 
(374,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',1,77,NULL),
(375,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',1,77,NULL),
(376,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',1,77,NULL),
(377,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',1,77,NULL),
(378,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',1,77,NULL),
(379,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',1,77,NULL),
(380,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',1,77,NULL),
(381,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',1,77,NULL),
(382,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',1,77,NULL),
(383,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',1,77,NULL),
(384,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',1,77,NULL),
(385,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',1,77,NULL),
(386,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',1,77,NULL),
(387,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',1,77,NULL),
(388,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',1,77,NULL),
(389,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',1,77,NULL),
(390,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',1,77,NULL),
(391,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',1,77,NULL),
(392,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',1,77,NULL),
(393,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',1,77,NULL),
(394,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',1,77,NULL),
(395,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',1,77,NULL);

/*Table structure for table `tr_survei_responden` */

DROP TABLE IF EXISTS `tr_survei_responden`;

CREATE TABLE `tr_survei_responden` (
  `id_session` varchar(100) DEFAULT NULL,
  `id_survei_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_survei` int(11) DEFAULT NULL,
  `id_cek` int(11) DEFAULT NULL,
  `nm_cek` varchar(255) DEFAULT NULL,
  `id_nilai_cek` int(11) DEFAULT NULL,
  `skors` double DEFAULT NULL,
  `nm_skors` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `id_bu` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_survei_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=441 DEFAULT CHARSET=utf8;

/*Data for the table `tr_survei_responden` */

insert  into `tr_survei_responden`(`id_session`,`id_survei_detail`,`id_survei`,`id_cek`,`nm_cek`,`id_nilai_cek`,`skors`,`nm_skors`,`status`,`id_bu`,`id_perusahaan`) values 
('2018-12-2522:10:10',1,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',2,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',3,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',4,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',5,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',6,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',7,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',8,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',9,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',10,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',11,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',12,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',13,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',14,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',15,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',16,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',17,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',18,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',19,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',20,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',21,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:10:10',22,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:12:48',23,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:12:48',24,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:12:48',25,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:12:48',26,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:12:48',27,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:12:48',28,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:12:48',29,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:12:48',30,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:12:48',31,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:12:48',32,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:12:48',33,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:12:48',34,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:12:48',35,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:12:48',36,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:12:48',37,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:12:48',38,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:12:48',39,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:12:48',40,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:12:48',41,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:12:48',42,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:12:48',43,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:12:48',44,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:33:54',45,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:33:54',46,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:33:54',47,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:33:54',48,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:33:54',49,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:33:54',50,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:33:54',51,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:33:54',52,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:33:54',53,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:33:54',54,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:33:54',55,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:33:54',56,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:33:54',57,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:33:54',58,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:33:54',59,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:33:54',60,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:33:54',61,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:33:54',62,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:33:54',63,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:33:54',64,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:33:54',65,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:33:54',66,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:54:47',67,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2522:54:47',68,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:54:47',69,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:54:47',70,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:54:47',71,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:54:47',72,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:54:47',73,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2522:54:47',74,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:54:47',75,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:54:47',76,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:54:47',77,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:54:47',78,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:54:47',79,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2522:54:47',80,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:54:47',81,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:54:47',82,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2522:54:47',83,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:54:47',84,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:54:47',85,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2522:54:47',86,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2522:54:47',87,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2522:54:47',88,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2609:14:55',89,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',90,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',91,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',92,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',93,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',94,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',95,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',96,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',97,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,4,'Setuju',1,NULL,77),
('2018-12-2609:14:55',98,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',99,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',100,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',101,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2609:14:55',102,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',103,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',104,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2609:14:55',105,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',106,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',107,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2609:14:55',108,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2609:14:55',109,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2609:14:55',110,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:19:45',111,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:19:45',112,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:19:45',113,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:19:45',114,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:19:45',115,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:19:45',116,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:19:45',117,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:19:45',118,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:19:45',119,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:19:45',120,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:19:45',121,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:19:45',122,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:19:45',123,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:19:45',124,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:19:45',125,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:19:45',126,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:19:45',127,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:19:45',128,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:19:45',129,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:19:45',130,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:19:45',131,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:19:45',132,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:38:11',133,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',134,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',135,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',136,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',137,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',138,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',139,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',140,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',141,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',142,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',143,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',144,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',145,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',146,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',147,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',148,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',149,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',150,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',151,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',152,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',153,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:38:11',154,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:39:28',155,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',156,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:39:28',157,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',158,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',159,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',160,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:39:28',161,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:39:28',162,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:39:28',163,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:39:28',164,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:39:28',165,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',166,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',167,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',168,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',169,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',170,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',171,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',172,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',173,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:39:28',174,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:39:28',175,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:39:28',176,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:41:25',177,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',178,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',179,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',180,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',181,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',182,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',183,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',184,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',185,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',186,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',187,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',188,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',189,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',190,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',191,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',192,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',193,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',194,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',195,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',196,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',197,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:25',198,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:55',199,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:55',200,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:55',201,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:55',202,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:55',203,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:41:55',204,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:41:55',205,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:55',206,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:55',207,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:55',208,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:41:55',209,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:41:55',210,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:41:55',211,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:41:55',212,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2610:41:55',213,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2610:41:55',214,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2610:41:55',215,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:41:55',216,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:41:55',217,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2610:41:55',218,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:41:55',219,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:41:55',220,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',221,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:42:26',222,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:42:26',223,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',224,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',225,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',226,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:42:26',227,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:42:26',228,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',229,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:42:26',230,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:42:26',231,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',232,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',233,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',234,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',235,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',236,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',237,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',238,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',239,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',240,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:42:26',241,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:42:26',242,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:43:46',243,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:43:46',244,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:43:46',245,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:43:46',246,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:43:46',247,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:43:46',248,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:43:46',249,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:43:46',250,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:43:46',251,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:43:46',252,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:43:46',253,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:43:46',254,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:43:46',255,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:43:46',256,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:43:46',257,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:43:46',258,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:43:46',259,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:43:46',260,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:43:46',261,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2610:43:46',262,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:43:46',263,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:43:46',264,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:44:01',265,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',266,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:44:01',267,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',268,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',269,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',270,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',271,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',272,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:44:01',273,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',274,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',275,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',276,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',277,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',278,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',279,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',280,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',281,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',282,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',283,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',284,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:44:01',285,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:44:01',286,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:58:23',287,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:58:23',288,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:58:23',289,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:58:23',290,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:58:23',291,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:58:23',292,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2610:58:23',293,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:58:23',294,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:58:23',295,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:58:23',296,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:58:23',297,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:58:23',298,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:58:23',299,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:58:23',300,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:58:23',301,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:58:23',302,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:58:23',303,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:58:23',304,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:58:23',305,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:58:23',306,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2610:58:23',307,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:58:23',308,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2610:59:32',309,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',310,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',311,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',312,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',313,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',314,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',315,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',316,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',317,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',318,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',319,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',320,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',321,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',322,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',323,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',324,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',325,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',326,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',327,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',328,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',329,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,NULL,NULL,1,NULL,77),
('2018-12-2610:59:32',330,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,NULL,NULL,1,NULL,77),
('2018-12-2808:53:50',331,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',332,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',333,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',334,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',335,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',336,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',337,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',338,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',339,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',340,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',341,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',342,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',343,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',344,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',345,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',346,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',347,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',348,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',349,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',350,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',351,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2808:53:50',352,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2809:20:19',353,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2809:20:19',354,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2809:20:19',355,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2809:20:19',356,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',357,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',358,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',359,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',360,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',361,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',362,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',363,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',364,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',365,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',366,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',367,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',368,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',369,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',370,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',371,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',372,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',373,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:20:19',374,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,NULL,NULL,1,NULL,77),
('2018-12-2809:36:47',375,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2809:36:47',376,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2809:36:47',377,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2809:36:47',378,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2809:36:47',379,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2809:36:47',380,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2809:36:47',381,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2809:36:47',382,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2809:36:47',383,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2809:36:47',384,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2809:36:47',385,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2809:36:47',386,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2809:36:47',387,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2809:36:47',388,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2809:36:47',389,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2809:36:47',390,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2809:36:47',391,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2809:36:47',392,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2809:36:47',393,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2809:36:47',394,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2809:36:47',395,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2809:36:47',396,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2810:01:12',397,15,1,'Saya senang dengan pekerjaan saat ini karena sesuai dengan pendidikan / pengalaman kerja karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2810:01:12',398,15,2,'Saya merasa perusahaan sudah maksimal menginformasikan mengenai peraturan dan ketentuan perusahaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2810:01:12',399,15,3,'Saya senang dengan pekerjaan saya sendiri karena sesuai dengan harapan saya sendiri',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2810:01:12',400,15,4,'Saya senang dengan pekerjaan saat ini karena sesuai dengan kemampuan saya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2810:01:12',401,15,5,'Saya senang dengan pekerjaan yang menarik dan menantang',NULL,2,'Tidak Setuju',1,NULL,77),
('2018-12-2810:01:12',402,15,6,'Saya merasa perusahaan sudah memberikan imbalan kerja yang dapat mencukupi kebutuhan hidup keluarga',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2810:01:12',403,15,7,'Saya menerima imbalan kerja yang cukup dan sesuai, berdasarkan tanggung jawab pekerjaan yang diberikan pada saya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2810:01:12',404,15,8,'Saya mendapat kesempatan untuk memperoleh kenaikan gaji',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2810:01:12',405,15,9,'Saya merasa penghasilan dari pekerjaan saat ini dapat mencukupi kebutuhan hidup setiap hari',NULL,4,'Setuju',1,NULL,77),
('2018-12-2810:01:12',406,15,10,'Saya menerima kenaikan gaji berdasarkan prestasi kerja dan tanggung jawab saya terhadap pekerjaan',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2810:01:12',407,15,11,'Saya merasa atasan saya sudah memberikan bimbingan yang baik dan arahan yang jelas pada karyawan',NULL,4,'Setuju',1,NULL,77),
('2018-12-2810:01:12',408,15,12,'Saya merasa atasan saya juga telah membantu memberikan solusi jika saya dan karyawan lain sedang ada permasalahan kerja',NULL,1,'Sangat Tidak Setuju',1,NULL,77),
('2018-12-2810:01:12',409,15,13,'Saya merasa atasan saya yang dapat memberikan dukungan kepada karyawan bawahannya',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2810:01:12',410,15,14,'Saya merasa atasan saya mempunyai motivasi kerja yang tinggi',NULL,3,'Kurang Setuju',1,NULL,77),
('2018-12-2810:01:12',411,15,15,'Saya merasa atasan saya mau mendengarkan saran, kritik dan pendapat karyawan bawahannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2810:01:12',412,15,16,'Saya merasa rekan kerja saya bertanggung jawab atas pekerjaannya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2810:01:12',413,15,17,'Rekan kerja saya memiliki motivasi kerja yang tinggi',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2810:01:12',414,15,18,'Rekan kerja saya dapat memberikan solusi ketika ada masalah kerja',NULL,4,'Setuju',1,NULL,77),
('2018-12-2810:01:12',415,15,19,'Saya senang bekerja dengan rekan kerja yang dapat menciptakan suasana kerja yang harmonis satu dengan lainnya',NULL,4,'Setuju',1,NULL,77),
('2018-12-2810:01:12',416,15,20,'Saya senang dengan dasar yang digunakan untuk promosi (kenaikan jabatan) dalam perusahaan ini',NULL,5,'Sangat Setuju',1,NULL,77),
('2018-12-2810:01:12',417,15,21,'Saya senang dengan penilaian untuk promosi berdasarkan prestasi dan hasil kerja karyawan dalam perusahaan ini',NULL,4,'Setuju',1,NULL,77),
('2018-12-2810:01:12',418,15,22,'Saya senang karena ada kesempatan terbuka untuk dipromosikan dalam perusahaan ini',NULL,5,'Sangat Setuju',1,NULL,77);

/* Trigger structure for table `ref_level` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ref_level_BEFORE_INSERT` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ref_level_BEFORE_INSERT` BEFORE INSERT ON `ref_level` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END */$$


DELIMITER ;

/* Trigger structure for table `ref_level` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ref_level_after_inser` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ref_level_after_inser` AFTER INSERT ON `ref_level` FOR EACH ROW begin
call p_insert_level(new.id_level, new.id_perusahaan);
call p_insert_level_group(new.id_level, new.id_perusahaan);
end */$$


DELIMITER ;

/* Trigger structure for table `ref_level` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ref_level_before_delete` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ref_level_before_delete` BEFORE DELETE ON `ref_level` FOR EACH ROW begin

delete from ref_menu_groups_access where id_level = old.id_level;
delete from ref_menu_details_access where id_level = old.id_level;
end */$$


DELIMITER ;

/* Trigger structure for table `ref_menu_details` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ref_menu_details_BEFORE_INSERT` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ref_menu_details_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_details` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END */$$


DELIMITER ;

/* Trigger structure for table `ref_menu_details` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ref_menudetail_after_insert` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ref_menudetail_after_insert` AFTER INSERT ON `ref_menu_details` FOR EACH ROW begin

call p_menudetails(new.id_menu_details, new.cuser);

end */$$


DELIMITER ;

/* Trigger structure for table `ref_menu_details` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_delete_ref_menudetails` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_delete_ref_menudetails` BEFORE DELETE ON `ref_menu_details` FOR EACH ROW begin
delete from ref_menu_details_access where id_menu_details = old.id_menu_details ;
end */$$


DELIMITER ;

/* Trigger structure for table `ref_menu_details_access` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ref_menu_details_access_BEFORE_INSERT` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ref_menu_details_access_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_details_access` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END */$$


DELIMITER ;

/* Trigger structure for table `ref_menu_groups` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ref_menu_groups_BEFORE_INSERT` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ref_menu_groups_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_groups` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END */$$


DELIMITER ;

/* Trigger structure for table `ref_menu_groups` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ref_menugroup_after_insert` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ref_menugroup_after_insert` AFTER INSERT ON `ref_menu_groups` FOR EACH ROW begin

call p_menugroup(new.id_menu_groups, new.cuser);

end */$$


DELIMITER ;

/* Trigger structure for table `ref_menu_groups_access` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ref_menu_groups_access_BEFORE_INSERT` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ref_menu_groups_access_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_groups_access` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END */$$


DELIMITER ;

/* Trigger structure for table `ref_perusahaan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ref_perusahaan_BEFORE_INSERT` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ref_perusahaan_BEFORE_INSERT` BEFORE INSERT ON `ref_perusahaan` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END */$$


DELIMITER ;

/* Trigger structure for table `ref_user` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ref_user_BEFORE_INSERT` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ref_user_BEFORE_INSERT` BEFORE INSERT ON `ref_user` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END */$$


DELIMITER ;

/* Trigger structure for table `tr_inspeksi` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_inspeksi` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_inspeksi` BEFORE INSERT ON `tr_inspeksi` FOR EACH ROW begin
set new.cdate = DATE_FORMAT(current_timestamp(), "%Y-%m-%d %H:%i:%s");
end */$$


DELIMITER ;

/* Trigger structure for table `tr_inspeksi` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_insert_inspeksi` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_insert_inspeksi` AFTER INSERT ON `tr_inspeksi` FOR EACH ROW begin
call p_insert_inspeksi_detail(new.id_inspeksi, new.id_perusahaan, new.id_bu);
end */$$


DELIMITER ;

/* Trigger structure for table `tr_inspeksi` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_delete_inspeksi` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_delete_inspeksi` BEFORE DELETE ON `tr_inspeksi` FOR EACH ROW begin
delete from tr_inspeksi_detail where id_perusahaan = old.id_perusahaan and id_inspeksi = old.id_inspeksi;
end */$$


DELIMITER ;

/* Trigger structure for table `tr_inspeksi_detail` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_inspekd` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_inspekd` BEFORE UPDATE ON `tr_inspeksi_detail` FOR EACH ROW begin
set new.skors = (select skors from ref_nilai_cek where id_nilai_cek = new.id_nilai_cek and id_perusahaan = new.id_perusahaan);
end */$$


DELIMITER ;

/* Trigger structure for table `tr_responden` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_insert_responden` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_insert_responden` AFTER INSERT ON `tr_responden` FOR EACH ROW BEGIN
CALL p_insert_survei_responden(new.id_survei, new.id_perusahaan, new.id_session);
END */$$


DELIMITER ;

/* Trigger structure for table `tr_survei` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_survei` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_survei` BEFORE INSERT ON `tr_survei` FOR EACH ROW begin
set new.cdate = DATE_FORMAT(current_timestamp(), "%Y-%m-%d %H:%i:%s");
end */$$


DELIMITER ;

/* Trigger structure for table `tr_survei` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_insert_survei` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_insert_survei` AFTER INSERT ON `tr_survei` FOR EACH ROW begin
call p_insert_survei(new.id_survei, new.id_perusahaan);
end */$$


DELIMITER ;

/* Trigger structure for table `tr_survei` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_delete_survei` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_delete_survei` BEFORE DELETE ON `tr_survei` FOR EACH ROW begin

delete from tr_survei_detail where id_survei = old.id_survei;

end */$$


DELIMITER ;

/* Procedure structure for procedure `p_insert_inspeksi_detail` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_insert_inspeksi_detail` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insert_inspeksi_detail`(IN p_id_inspeksi int, IN p_id_perusahaan int, IN p_id_bu int)
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

END */$$
DELIMITER ;

/* Procedure structure for procedure `p_insert_level` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_insert_level` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insert_level`(IN p_id_level int, IN p_id_perusahaan int)
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

END */$$
DELIMITER ;

/* Procedure structure for procedure `p_insert_level_group` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_insert_level_group` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insert_level_group`(IN p_id_level int, IN p_id_perusahaan int)
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

END */$$
DELIMITER ;

/* Procedure structure for procedure `p_insert_survei` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_insert_survei` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insert_survei`(IN p_id_survei int, IN p_id_perusahaan int)
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

END */$$
DELIMITER ;

/* Procedure structure for procedure `p_insert_survei_responden` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_insert_survei_responden` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insert_survei_responden`(IN p_id_survei INT, IN p_id_perusahaan INT, in p_id_session varchar(255))
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

END */$$
DELIMITER ;

/* Procedure structure for procedure `p_menudetails` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_menudetails` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_menudetails`(IN p_id_menu_details int, IN p_cuser int)
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

END */$$
DELIMITER ;

/* Procedure structure for procedure `p_menugroup` */

/*!50003 DROP PROCEDURE IF EXISTS  `p_menugroup` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `p_menugroup`(IN p_id_menu_groups int, IN p_cuser int)
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

END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
