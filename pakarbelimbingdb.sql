-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2013 at 04:21 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pakarbelimbingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisahasil`
--

CREATE TABLE IF NOT EXISTS `analisahasil` (
  `id_analisa` int(11) NOT NULL AUTO_INCREMENT,
  `id_log` int(11) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `id_penyakit` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_gejala` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_solusi` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `noip` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_analisa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `analisahasil`
--


-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `artikel` text COLLATE latin1_general_ci NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `artikel`, `urutan`) VALUES
('G000000001', 'AMD Umuman APU E-Series Terbaru', '<p>tes</p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `id_gejala` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `gejala` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `gejala`) VALUES
('G000000002', 'Terdapat bercak-bercak berwarna kekuning-kuningan'),
('G000000001', 'Daun-daun berwarna kuning dan rontok'),
('G000000003', 'Pemukaan daun berwarna hitam'),
('G000000004', 'Terdapat kutu pada daun dan mengeluarkan larutan seperti madu'),
('G000000005', 'Daun bagian bawah terdapat bercak-bercak besar'),
('G000000006', 'Daun membusuk');

-- --------------------------------------------------------

--
-- Table structure for table `hamapenyakit`
--

CREATE TABLE IF NOT EXISTS `hamapenyakit` (
  `Id_Pnykt` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `JnsPnykt` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `Keterangan` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id_Pnykt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hamapenyakit`
--

INSERT INTO `hamapenyakit` (`Id_Pnykt`, `JnsPnykt`, `Keterangan`) VALUES
('P000000001', 'Penyakit bercak daun', 'Penyakit daun'),
('P000000002', 'Penyakit kapang jelaga', 'penyakit pada buah'),
('P000000003', 'Penyakit hawar daun', 'penyakit daun kering'),
('P000000004', 'Hama lalat buah', 'hama belimbing ');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(5) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `log`
--


-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id_pages` int(2) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_pages`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id_pages`, `tipe`, `isi`) VALUES
(1, 'site_home', '<p>Belimbing manis memiliki beraneka khasiat dan manfaat. Tanaman obat dan buah dengan nama ilmiah Averrhoa carambola ini dapat tumbuh hingga ketinggian 10 meter. Batang belimbing sebenarnya tidaklah terlalu besar. Warnanya cokelat muda dan memiliki benjolan. Apa saja khasiat belimbing manis ? Daun belimbing merupakan daun majemuk. Bentuk daun kurang lebih seperti bulat telur. Bunga belimbing manis bentuknya bintang dengan ukuran kecil. Buahnya berbentuk lonjong bersegi. Bagian Mana yang Bermanfaat dari Belimbing Manis ?&nbsp;</p><p><img alt="" style="width: 960px; height: 640px;" src="/pakarbelimbing/administrator/ckeditor/kcfinder/upload/images/562364_645412885484706_719479137_n.jpg" /></p><p>Bagian yang sering digunakan dari belimbing manis adalah buah, daun dan bunganya. Apa Saja Manfaat dan Khasiat Belimbing Manis ? Belimbing manis berkhasiat untuk meredakan rasa sakit, mengatasi radang, menurunkan kolesterol, serta mengurangi dampak negatif diabetes. Daun belimbing dapat digunakan untuk mengobati sakit perut, rematik, serta gondongan.&nbsp;</p><p>Sedangkan buah belimbing manis berkhasiat untuk mengatasi batuk rejan, sariawan, gusi berdarah, jerawat, gigi berlubang, darah tinggi, serta dapat membantu memperbaiki pencernaan. Bunga belimbing dapat digunakan untuk mengatasi batuk dan sariawan. Semoga bermanfaat.</p>'),
(2, 'site_help', '- Menu Home, berisi informasi tentang buah belimbing manis.\r\n\r\n \r\n 	\r\n- Menu Diagnosa, berisi langkah-langkah untuk mendiagnosa hama dan penyakit belimbing\r\n\r\n \r\n 	 	manis. Disini terdapat langkah-langkahnya sebagai berikut :	 \r\n 	 	1.	Pengguna mendaftar dengan mengisi form yang telah tersedia dengan memasukkan	 \r\n 	 	 	jenis kelamin, usia alamat.	 \r\n 	 	2.	Selanjutnya, pengguna akan diarahkan ke menu diagnosa hama dan penyakit  dengan	 \r\n 	 	 	\r\n      memilih salah satu hama penyakit sebagai hipotesa awal atau dugaan, lalu klik lanjut.\r\n\r\n \r\n 	 	3.	\r\n. Kemudian tampil ke menu pilihan gejala yang menyerang tanaman belimbing manis anda.\r\n\r\n \r\n 	 	 	Klik proses.	 \r\n 	 	4.	\r\nAplikasi akan menampilkan hasil dari diagnosa sebelumnya, berupa nama hama  dan\r\n\r\n \r\n 	 	 	\r\npenyakit yang di derita, gejala-gejalanya, prosentase terserangnya, dan solusi untuk\r\n\r\n \r\n 	 	 	menindaklanjuti perlakuan terhadap tanaman belimbing manis anda.	 \r\n 	\r\n- Menu Artikel, berisi tentang artikel belimbing manis, seputar belimbing manis.\r\n\r\n \r\n 	\r\n- Menu Profil, berisi tentang pembuat aplikasi diagnosa hama dan penyakit belimbing manis.\r\n\r\n \r\n 	\r\n- Menu Admin, berisi halaman untuk masuk ke menu admin, dengan memasukkan nama user\r\n\r\n \r\n 	 	dan kata kunci admin.	 \r\n 	\r\n- Menu Bantuan, berisi tentang bantuan menggunakan aplikasi diagnosa hama dan penyakit\r\n\r\n \r\n 	 	\r\nbelimbing manis.'),
(3, 'site_profil', 'isi profil');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kelamin` varchar(50) NOT NULL,
  `usia` int(5) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama`, `kelamin`, `usia`, `alamat`) VALUES
(1, 'ddd', '8277e0910d750195b448797616e091ad', 'dede', 'P', 3, 'Bali'),
(2, 'gede', '13ad65cc032d4b04927943c33673a65d', 'Gede Lumbung', 'P', 22, 'Bali');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE IF NOT EXISTS `relasi` (
  `id_relasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_penyakit` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_gejala` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_relasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=140 ;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `id_penyakit`, `id_gejala`) VALUES
(132, 'P000000004', 'G000000002'),
(87, 'P000000003', 'G000000003'),
(88, 'P000000003', 'G000000004'),
(89, 'P000000003', 'G000000005'),
(139, 'P000000001', 'G000000006'),
(85, 'P000000002', 'G000000002'),
(86, 'P000000002', 'G000000003'),
(138, 'P000000001', 'G000000002'),
(137, 'P000000001', 'G000000001'),
(131, 'P000000004', 'G000000001');

-- --------------------------------------------------------

--
-- Table structure for table `relasigejala`
--

CREATE TABLE IF NOT EXISTS `relasigejala` (
  `id_relasigejala` int(32) NOT NULL AUTO_INCREMENT,
  `id_gejala` varchar(10) CHARACTER SET ascii NOT NULL,
  `id_solusi` varchar(10) CHARACTER SET ascii NOT NULL,
  PRIMARY KEY (`id_relasigejala`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `relasigejala`
--

INSERT INTO `relasigejala` (`id_relasigejala`, `id_gejala`, `id_solusi`) VALUES
(28, 'G000000001', 'S000000001'),
(3, 'G000000003', 'S000000002'),
(4, 'G000000003', 'S000000003'),
(7, 'G000000004', 'S000000002'),
(8, 'G000000006', 'S000000001'),
(9, 'G000000005', 'S000000001'),
(13, 'G000000002', 'S000000003'),
(12, 'G000000002', 'S000000003'),
(29, 'G000000001', 'S000000003');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE IF NOT EXISTS `solusi` (
  `id_solusi` varchar(10) CHARACTER SET ascii NOT NULL,
  `solusi` text CHARACTER SET ascii NOT NULL,
  PRIMARY KEY (`id_solusi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `solusi`) VALUES
('S000000001', 'Cara kultur teknis :\r\n-	Membungkus buah blimbing pada waktu buah masih muda dengan kantong plastik atau kertas. \r\n'),
('S000000002', 'Cara fisik mekanis :\r\n-	Mengadakan sanitasi buah yang rontok dan terserang lalat buah dan selanjutnya dibenamkan ke dalam tanah dengan kedalaman 60-70 cm agar larva terbunuh. \r\n'),
('S000000003', 'Cara kimiawi1 :\r\n-	Penyemprotan tanaman dengan insektisida kontak yang efektif.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE IF NOT EXISTS `tmp_gejala` (
  `id_pnykt` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_log` int(5) NOT NULL,
  `id_gejala` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `noip` varchar(60) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tmp_gejala`
--


-- --------------------------------------------------------

--
-- Table structure for table `tmp_pengguna`
--

CREATE TABLE IF NOT EXISTS `tmp_pengguna` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_log` int(5) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `noip` varchar(60) COLLATE latin1_general_ci NOT NULL,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tmp_pengguna`
--


-- --------------------------------------------------------

--
-- Table structure for table `tmp_penyakit`
--

CREATE TABLE IF NOT EXISTS `tmp_penyakit` (
  `Id_Pnykt` varchar(10) CHARACTER SET ascii NOT NULL,
  `id_log` int(5) NOT NULL,
  `noip` varchar(60) CHARACTER SET ascii NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tmp_penyakit`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(5) CHARACTER SET ascii NOT NULL,
  `username` varchar(15) CHARACTER SET ascii NOT NULL,
  `password` text CHARACTER SET ascii NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
('ID001', 'yudha', '2b9633304de305ed5c03fe19b7a06afe'),
('ID002', 'agus', 'fdf169558242ee051cca1479770ebac3'),
('ID003', 'admin', '21232f297a57a5a743894a0e4a801fc3');
