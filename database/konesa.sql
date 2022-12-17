-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 04:09 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `konesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_nama` varchar(60) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_gambar` varchar(1000) NOT NULL,
  `admin_telp` varchar(25) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_email`, `admin_password`, `admin_gambar`, `admin_telp`) VALUES
(1, 'Dwi Ramadhaniasari', 'dwirmdsari@gmail.com', 'a87bcf310c4fdf2a80f2f3d97f1f9424', 'foto/639467ac43185admin.jpg', '082537852177');

-- --------------------------------------------------------

--
-- Table structure for table `data_kos`
--

CREATE TABLE IF NOT EXISTS `data_kos` (
  `kos_id` int(11) NOT NULL AUTO_INCREMENT,
  `kos_nama` varchar(60) NOT NULL,
  `kos_alamat` varchar(100) NOT NULL,
  `kos_harga` float NOT NULL,
  `kos_fasilitas` varchar(1000) NOT NULL,
  `kos_tipe` varchar(25) NOT NULL,
  `kos_jarak` varchar(20) NOT NULL,
  `kos_gender` enum('Putra','Putri','Putra/i') NOT NULL,
  `kos_lokasi` varchar(30) NOT NULL,
  `kos_gambar` varchar(1000) NOT NULL,
  `status` varchar(25) NOT NULL,
  `pemilik_id` varchar(25) NOT NULL,
  PRIMARY KEY (`kos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `data_kos`
--

INSERT INTO `data_kos` (`kos_id`, `kos_nama`, `kos_alamat`, `kos_harga`, `kos_fasilitas`, `kos_tipe`, `kos_jarak`, `kos_gender`, `kos_lokasi`, `kos_gambar`, `status`, `pemilik_id`) VALUES
(4, 'Kos Putri Pak Thomas', 'Jl. Ketintang Baru Selatan V No.B/3, Ketintang, Kec. Gayungan, Kota SBY, Jawa Timur 60231', 700000, 'Parkir,Wifi,Kamar Mandi Dalam,Lemari,Meja,Kasur', 'bulanan', '>50 - 250 meter', 'Putri', 'Ketintang', 'fotokos/639a2a9aab7a5kamar.png', 'Kosong', '1'),
(5, 'Kos Putra Sasuke ', 'Jl. Ketintang Baru IV B No.36, Ketintang, Kec. Gayungan, Kota SBY, Jawa Timur 60231', 700000, 'Parkir,Wifi, Kamar Mandi Luar, Meja, Kasur, Lemari', 'bulanan', '>250 meter - 1km', 'Putra', 'Ketintang', 'fotokos/6396462da76f3kamar.jpg', 'Telah dikonfirmasi', '2'),
(6, 'Kos Safa', 'Jl. Ketintang Wiyata No.200, Ketintang, Kec. Gayungan, Kota SBY, Jawa Timur 60231', 750000, 'Wifi, Kamar Mandi Luar, Lemari, Kasur', 'harianbulanan', '>50 - 250 meter', 'Putri', 'Lidah Wetan', 'fotokos/639647592a2c5feature6.jpg', 'Kosong', '3'),
(7, 'Kos Bintang', 'Jl. Ketintang Tim. PTT III No.26, Ketintang, Kec. Gayungan, Kota SBY, Jawa Timur 60231', 1000000, 'Parkir, Wifi, Kamar Mandi Luar, Meja, Kasur, Lemari, Dapur', 'bulanan', '>50 - 250 meter', 'Putra', 'Lidah Wetan', 'fotokos/63964852a274akamar.jpg', 'Kosong', '4'),
(8, 'Kos Puri Indah', 'Jl. Ketintang No.115a, Wonokromo, Kec. Wonokromo, Kota SBY, Jawa Timur 60231', 1500000, 'Parkir, Wifi, Kamar Mandi Dalam, Meja, Kasur, Lemari', 'bulanan', '>1 - 2.5 km', 'Putra/i', 'Lidah Wetan', 'fotokos/639648e0a440ckamar.jpg', 'Kosong', '5');

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE IF NOT EXISTS `iklan` (
  `iklan_id` int(11) NOT NULL AUTO_INCREMENT,
  `iklan_paket` varchar(25) NOT NULL,
  `iklan_harga` float NOT NULL,
  `lama_iklan` varchar(20) NOT NULL,
  `iklan_detail` text NOT NULL,
  PRIMARY KEY (`iklan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`iklan_id`, `iklan_paket`, `iklan_harga`, `lama_iklan`, `iklan_detail`) VALUES
(1, 'Paket 1 Bulan', 0, '1 Bulan', 'Coba Gratis '),
(2, 'Paket 6 Bulan', 350000, '6 Bulan', 'Diskon 25% Khusus Hari Ini'),
(3, 'Paket 1 Tahun', 650000, '1 Tahun', 'Diskon 50% ');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_iklan`
--

CREATE TABLE IF NOT EXISTS `pemesanan_iklan` (
  `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_pemesanan` datetime NOT NULL,
  `bukti_pembayaran` varchar(1000) NOT NULL,
  `status` varchar(25) NOT NULL,
  `iklan_id` int(11) NOT NULL,
  `kos_id` int(11) NOT NULL,
  `pemilik_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`pemesanan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_kos`
--

CREATE TABLE IF NOT EXISTS `pemilik_kos` (
  `pemilik_id` int(11) NOT NULL AUTO_INCREMENT,
  `pemilik_email` varchar(50) NOT NULL,
  `pemilik_password` varchar(100) NOT NULL,
  `pemilik_nama` varchar(60) NOT NULL,
  `pemilik_tanggal_lahir` date NOT NULL,
  `pemilik_gambar` varchar(100) NOT NULL,
  `pemilik_telp` varchar(25) NOT NULL,
  `pemilik_gender` enum('L','P') NOT NULL,
  `pemilik_jenis_identitas` varchar(20) NOT NULL,
  `pemilik_foto_identitas` varchar(100) NOT NULL,
  `kos_id` int(11) NOT NULL,
  PRIMARY KEY (`pemilik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pemilik_kos`
--

INSERT INTO `pemilik_kos` (`pemilik_id`, `pemilik_email`, `pemilik_password`, `pemilik_nama`, `pemilik_tanggal_lahir`, `pemilik_gambar`, `pemilik_telp`, `pemilik_gender`, `pemilik_jenis_identitas`, `pemilik_foto_identitas`, `kos_id`) VALUES
(1, 'linaa7@gmail.com', 'f6f4deb7dad1c2e5e0b4d6569dc3c1c5', 'Bu Lina', '1975-05-27', 'foto/63962056519a4profil2.jpg', '081859602940', 'P', 'SIM', 'foto/6396206d81836ktp woman.png', 4),
(2, 'daffi.aransha@gmail.com', '13c699a92272580afdeefebf62c599e4', 'Daffi Aransha', '1994-12-10', 'foto/6394587920bdbprofil1.jpg', '082317765403', 'L', 'KTP', 'foto/63945879217cfktp man.png', 5),
(3, 'safarh10@gmail.com', '5a29245b8b3374aec4dbcd122bec618e', 'Safa R', '1973-07-11', 'foto/63945a82255baprofil4.jpg', '085763224097', 'P', 'KTP', 'foto/63945a822751dktp woman.png', 6),
(4, 'adityafajri02@gmail.com', '437eb04136c59d226f14527f52726341', 'Fajri Aditya', '1995-07-25', 'foto/63945b0179cbeprofil3.jpg', '085799950113', 'L', 'KTP', 'foto/63945b017b2b7ktp man.png', 7),
(5, 'claudiadrmwn@gmail.com', 'a1a8887793acfc199182a649e905daab', 'Bu Chen', '1970-12-22', 'foto/63945b8a8a71cprofil5.jpg', '088144399908', 'P', 'KTP', 'foto/63945b8a8c781ktp woman.png', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pencari_kos`
--

CREATE TABLE IF NOT EXISTS `pencari_kos` (
  `pencari_id` int(11) NOT NULL AUTO_INCREMENT,
  `pencari_email` varchar(50) NOT NULL,
  `pencari_password` varchar(100) NOT NULL,
  `pencari_nama` varchar(60) NOT NULL,
  `pencari_tanggal_lahir` date NOT NULL,
  `pencari_gambar` varchar(100) NOT NULL,
  `pencari_telp` varchar(25) NOT NULL,
  `pencari_gender` enum('L','P') NOT NULL,
  `pencari_jenis_identitas` varchar(20) NOT NULL,
  `pencari_foto_identitas` varchar(100) NOT NULL,
  PRIMARY KEY (`pencari_id`),
  UNIQUE KEY `pencari_email` (`pencari_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pencari_kos`
--

INSERT INTO `pencari_kos` (`pencari_id`, `pencari_email`, `pencari_password`, `pencari_nama`, `pencari_tanggal_lahir`, `pencari_gambar`, `pencari_telp`, `pencari_gender`, `pencari_jenis_identitas`, `pencari_foto_identitas`) VALUES
(2, 'bella_20047@mhs.unesa.ac.id', 'e7e9ec3723447a642f762b2b6a15cfd7', 'Bella', '2000-02-13', 'foto/639460b008728profil.jpg', '081234567890', 'P', 'KTP', 'foto/639460b017175ktp woman.png'),
(3, 'fifit.21001@mhs.unesa.ac.id', '12abef197e118fa7c8c842b32d713c90', 'Fifit Syafaaty', '2003-01-03', 'foto/63946228e1a62reviewer 1.jpg', '082331120999', 'P', 'KTP', 'foto/63946228efc1bktp woman.png'),
(4, 'nurhaslinda.21035@mhs.unesa.ac.id', 'eaf450085c15c3b880c66d0b78f2c041', 'Nur Haslinda', '2003-08-29', 'foto/639462f973fe4reviewer 2.jpeg', '088701234673', 'P', 'SIM', 'foto/639462f974d06ktp woman.png'),
(5, 'rizqicahya_21047@mhs.unesa.ac.id', '2ea4dce70aecd3a50945105a01aa2cba', 'Rizqi Cahya Angelita', '2002-07-10', 'foto/639463d148aedreviewer 3.jpg', '081754460001', 'P', 'PASSPORT', 'foto/639463d14bb19ktp woman.png');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `review_isi` text NOT NULL,
  `review_rating` int(5) NOT NULL,
  `kos_id` varchar(25) NOT NULL,
  `pencari_id` varchar(25) NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `review_isi`, `review_rating`, `kos_id`, `pencari_id`) VALUES
(1, 'Kos nya bagus, nyaman, dan aman', 5, '4', '3'),
(2, 'Kos nya enak banget lokasinya, kemana-mana deket.', 5, '4', '4'),
(3, 'Kos nya bagus, nyaman, dan Ibu kosnya juga ramah.', 5, '4', '5');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pemesanan`
--

CREATE TABLE IF NOT EXISTS `riwayat_pemesanan` (
  `riwayat_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_pemesanan` datetime NOT NULL,
  `status` varchar(25) NOT NULL,
  `kos_id` varchar(25) NOT NULL,
  `pemilik_id` varchar(25) NOT NULL,
  `pencari_id` varchar(25) NOT NULL,
  PRIMARY KEY (`riwayat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `riwayat_pemesanan`
--

INSERT INTO `riwayat_pemesanan` (`riwayat_id`, `tanggal_pemesanan`, `status`, `kos_id`, `pemilik_id`, `pencari_id`) VALUES
(14, '2022-12-16 04:37:25', 'Pemesanan ditolak', '4', '1', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
