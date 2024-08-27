-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2024 at 12:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartskills`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'ridhoreja', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id_agent` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_agent` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `title` varchar(100) NOT NULL,
  `biography` text NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'Image.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id_agent`, `username`, `email`, `password`, `nama_agent`, `instansi`, `nik`, `no_hp`, `title`, `biography`, `foto`) VALUES
(1, '', 'radja@gmail.com', '$2y$10$5Tg.M1zIcVeogaXiy6xlG.pKlM9rtey/.y4F1O0DdhmUBQmWlKzVG', 'Radja Nainggolan', '', '3206342705030001', '085559360760', '', '', 'Image.png'),
(2, 'alimhidayat', 'entarinkayani23@gmail.com', '$2y$10$1qhrWa4MrKH/C/AgE82iX.BqkmSDdX2PbSsmQnPl.bYzez34cGSN2', 'Muhammad Alim', '', '3206342705030001', '085314704439', 'CEO', 'I am 21 yo', '66c2d8c89551f.jpg'),
(3, 'alimmmst', 'muhammadalim27@gmail.com', '$2y$10$Qg6c3w/GBkOA0dmNjNLSLO9JoZn8n8mhhMXZa0ZRJEdJJFIYdkiuW', 'Alim Hidayat', '', '32063427@gmail.com', '085559360760', 'Chief of Officer', 'I work as a programmer', '66c009424eb79.jpg'),
(4, 'reja', 'reja@gmail.com', '$2y$10$R14FfWqFtgfb5heDD.WfgOIwEFUUnHb7EWrgXdPdsC.ogNnVom5W6', 'Muhammad  Reja', 'PT Sembako ', '3206342705030001', '08555593670', 'CEO', 'Work as a ui/ux', '66c04b16548af.jpg'),
(5, 'rejaaa', 'reja12@gmail.com', '$2y$10$XZakKmkW12W2mgoeJtifNevTbdSTRLDHIzJGyU2azfXgOyRvHunuu', '', 'SMPN 1 Bojongsoang', '320634270503', '085559360760', '', '', 'Image.png'),
(6, 'sahabat_pohon', 'sahabat@gmail.com', '$2y$10$qhhuYTVDmfM7pvEWiqdomuwtCb.1CeA6nXrC/e8wH.urGj6N7BLUC', '', 'SMPN 1 Sukahening', '3206342705030001', '085559360760', '', '', 'Image.png');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `artikel` text NOT NULL,
  `header1` varchar(255) NOT NULL,
  `artikel1` text NOT NULL,
  `header2` varchar(255) NOT NULL,
  `artikel2` varchar(255) NOT NULL,
  `tgl_membuat` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_agent`, `judul`, `kategori`, `artikel`, `header1`, `artikel1`, `header2`, `artikel2`, `tgl_membuat`, `foto`) VALUES
(14, 2, 'Pemrograman Javascript Untuk Masyarakat', 'Pemrograman', 'Javascript merupakan bahasa pemrograman yang dapat digunakan dalam semua hal', '', '', '', '', '2024-08-22', '66c6cf585bd05.png'),
(16, 2, 'Design Figma Untuk Pengguna Anak-Anak Pemrorgaman Perangkat Bergerak', 'Javascript', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit ipsa, eveniet repellendus ratione voluptatum odit mollitia sed quisquam, eos labore facere corrupti quas provident enim dolorum blanditiis quasi qui. Necessitatibus voluptates cupiditate dolorum mollitia rerum, nostrum nisi modi, quo nulla corporis praesentium! Minus iusto pariatur recusandae adipisci illo tenetur in. Ex, ab velit. Error amet voluptate provident cupiditate, voluptas, neque ipsa, pariatur deleniti nisi similique perspiciatis sapiente consectetur maxime? Laudantium magnam porro odio quaerat quasi! Minima ipsam ad laudantium alias, vero cumque omnis, dolore voluptatum et exercitationem voluptatibus a ducimus sit modi quod tempore beatae quibusdam rem autem est. Vero deleniti quidem saepe ab dignissimos expedita consectetur cupiditate quos dolorem qui harum odit ex vel animi, ea, porro quaerat, fugiat sint cum! Minus quo maxime voluptates possimus harum obcaecati quas sed! A sed quidem vel. Illum veritatis quod voluptatibus repudiandae deleniti optio consectetur dolor cumque. Cumque, temporibus soluta. Ipsam aliquid qui quaerat laudantium corrupti laboriosam similique rerum soluta consequatur dolor! Porro, rem pariatur. Dignissimos ipsam numquam optio, alias veritatis repudiandae, doloremque iure omnis voluptas maxime vitae asperiores? Tenetur sed aut aperiam. Soluta, maxime asperiores deleniti voluptatum labore mollitia rem perspiciatis nobis velit minus impedit, corporis blanditiis sed veritatis cumque error!', 'Implementasi Lorem Ipsum ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit ipsa, eveniet repellendus ratione voluptatum odit mollitia sed quisquam, eos labore facere corrupti quas provident enim dolorum blanditiis quasi qui. Necessitatibus voluptates cupiditate dolorum mollitia rerum, nostrum nisi modi, quo nulla corporis praesentium! Minus iusto pariatur recusandae adipisci illo tenetur in. Ex, ab velit. Error amet voluptate provident cupiditate, voluptas, neque ipsa, pariatur deleniti nisi similique perspiciatis sapiente consectetur maxime? Laudantium magnam porro odio quaerat quasi! ', 'Lorem Ipsum Sit dolor', 'Minima ipsam ad laudantium alias, vero cumque omnis, dolore voluptatum et exercitationem voluptatibus a ducimus sit modi quod tempore beatae quibusdam rem autem est. Vero deleniti quidem saepe ab dignissimos expedita consectetur cupiditate quos dolorem qu', '2024-08-23', '66c84d44ccdfc.png'),
(17, 4, 'Bed of Roses', 'Song', 'Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12', 'Lorem Ipsum Dolor', 'Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12', 'Lorem Ipsum ', 'Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12Lorem 12 Lorem 12', '2024-08-26', '66cc249a06a19.png');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `username`, `email`, `password`, `instansi`, `no_hp`, `nama_siswa`, `tanggal_lahir`, `kota`, `tempat_lahir`, `jk`, `foto`) VALUES
(13, 'alimmmst', 'hidayatalim27@gmail.com', '$2y$10$tRf81CRH/uNVgLpfkMI20u63ppl9UtFkM5IayV0lhGT9cPK88L1ry', 'SMPN 1 Sukahening', '085559360760', 'Muhammad Alim Hidayat', '2001-11-11', 'Tasikmalaya', 'Tasikmalaya', 'no', '66bc6f746c8f9.jpg'),
(14, 'radja', 'radja@gmail.com', '$2y$10$Y7KMFnt7K3YFSLcglBWT9u8PALq3X4dF2nKUeXVx06eiynXfINHzK', 'ITB', '123', '', '2024-08-14', '', '', '', ''),
(15, 'alimmmst', 'entarinkayani23@gmail.com', '$2y$10$/8t/9vcs3ptdEV2xgF1ZXuj2e021DUeaqZuZI..FsQ4.qJC4qwaSa', 'ITB', '085559360760', 'Muhammad Alim Hidayat', '2003-12-17', 'Tasikmalaya', 'Tasikmalaya', 'disamarkan', '66cc91764829c.jpg'),
(16, 'alimmmst', 'alimhidayat@gmail.com', '$2y$10$qzUmXu.lP.xEYBtWeE2JG.UgX/Iw.R0L0csFPiwuRtgnY0AZgqtbW', 'SMP N 1 Sukahening', '085559360760', 'Muhammad Alim Hidayat', '2024-08-18', '', '', '', '66c1f7bbb1b33.jpg'),
(17, 'alimmmst', 'muhammad27@gmail.com', '$2y$10$ZAMvutQtW1kXieOQcnXOhefNUgMu7TLhcc59BkI6zChmAGrpAnD1O', 'SMPN 1 Sukahening', '085559360760', 'Ahmad Syahroni', '2020-02-02', 'Tasikmalaya', 'Tasikmalaya', 'disamarkan', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sosmed`
--

CREATE TABLE `sosmed` (
  `id_sosmed` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `personal_web` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `wa` varchar(255) NOT NULL,
  `yt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sosmed`
--

INSERT INTO `sosmed` (`id_sosmed`, `id_agent`, `personal_web`, `fb`, `ig`, `linkedin`, `twitter`, `wa`, `yt`) VALUES
(1, 2, 'alimhidayat.id', 'alimmmst', '@alimmmst', 'muhammad-alim-hidayat', 'alimmmst', '085559360760', 'alimhidayat'),
(2, 3, 'alimhidayat.com', 'alimmmst', '@alimmmst', 'muhammad-alim-hidayat', 'alimmmst', '085559360760', 'alimhidayat'),
(3, 4, 'reja.com', 'rejaa', 'rejaa', 'rejaaa', 'reja', '085555555', 'reja'),
(4, 5, 'alim.com', 'alimmmst', '@alimmmst', 'muhammad-alim-hidayat', 'alimmmst', '085559360760', 'alimmmst'),
(7, 6, 'sahabatPohon.com', 'alimmmst', '@alimmmst', 'muhammad-alim-hidayat', 'alimmmst', '085559360760', 'sahabat-pohon-sejawat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id_agent`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `FOREIGN` (`id_agent`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id_sosmed`),
  ADD KEY `id_agent` (`id_agent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id_agent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id_sosmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id_agent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD CONSTRAINT `sosmed_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id_agent`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
