-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 09:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `password` varchar(240) NOT NULL,
  `status_vote` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_user`, `name`, `nim`, `email`, `kelas`, `jurusan`, `password`, `status_vote`, `image`, `role_id`, `is_active`, `date_created`, `tanggal`) VALUES
(15, 'Agung Restu Saputra', '18.11.0015', 'agungrestusaputra@gmail.com', 'IF81S', 'Teknik Informatika', '$2y$10$F2wNDPwGRwG5YG8L9wfEQejQIz.ar3xzkg9YTUi83zWvNiBz74MlG', 0, 'default.png', 2, 1, '2021-02-05 13:49:56', '2021-02-05 06:49:56'),
(16, 'Pipit Ella Fiantia', '18.11.0041', 'ellafiantia1403@gmail.com', 'IF81S', 'Teknik Informatika', '$2y$10$3a/MXs.OoXJWUZ0H4ZiXsu9juciILs2CZaltoSACzsbZvlNuwUU7q', 0, 'default.png', 2, 1, '2021-02-05 13:54:23', '2021-02-05 06:54:23'),
(19, 'Radhwa Shafa Iftinan', '18.11.0086', 'radhwash@gmail.com', 'IF81S', 'Teknik Informatika', '$2y$10$7XGjWayIkYDR5JiQArouTuoreLOgh9s43gRGdMV.QN86tSBk3jlOG', 0, 'default.png', 2, 1, '2021-02-05 23:36:06', '2021-02-05 16:36:06'),
(20, 'Ari Purwaningsih', '18.11.0269', 'ari.purwaningsih08@gmail.com', 'IF81S', 'Teknik Informatika', '$2y$10$xknhEq4g/kPh8BAchUSPd.8dZkayYUnyvY6vaX9OAsefE93TNW4oW', 0, 'default.png', 2, 1, '2021-02-06 06:57:45', '2021-02-05 23:57:45'),
(21, 'Akhmad Ikhza Assaufi', '18.11.0205', 'akhmadikhza123@gmail.com', 'IF81S', 'Teknik Informatika', '$2y$10$GjpHNV8HFiXqWtgkOX5Q7eAdHUQjWtlYTFlnPjvwMSg28nJNF6fcq', 1, '1612587566-ikhza.jpg', 2, 1, '2021-02-06 11:29:54', '2021-02-06 04:29:54'),
(22, 'Ikhza Admin', '18.11.0210', 'ikhzabeatles11@gmail.com', 'IF81S', 'Teknik Informatika', '$2y$10$aTxZ4M0JX/7XGkR/G8vHH.nyfvIuD2rMAgn.nIwIIOdM4GTn.Bg/G', 0, 'default.png', 1, 1, '2021-02-06 11:52:06', '2021-02-06 04:52:06'),
(23, 'Manchester United', '18.11.0290', 'manutd@gmail.com', 'IF81S', 'Teknik Informatika', '$2y$10$dWlr5lXzYPk3SLd4CeA0ueo2dAHKv0x5tVmPqp34AJiZwvru/59wW', 1, 'default.png', 2, 1, '2021-02-06 12:09:39', '2021-02-06 05:09:39'),
(24, 'Manchester City', '18.11.0291', 'mancity@gmail.com', 'IF81S', 'Teknik Informatika', '$2y$10$dNf8B4fZPOhGgI0UXfixsOOzBMKqvTxLvCTIL9.xbRI6DYPCVs0h.', 1, 'default.png', 2, 1, '2021-02-06 12:10:43', '2021-02-06 05:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `log_vote`
--

CREATE TABLE `log_vote` (
  `id_user` int(11) NOT NULL,
  `user` varchar(128) NOT NULL,
  `tanggal_waktu` varchar(250) NOT NULL,
  `add_log` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_vote`
--

INSERT INTO `log_vote` (`id_user`, `user`, `tanggal_waktu`, `add_log`) VALUES
(274, 'Ikhza Admin,18.11.0210', '2021-04-12 06:24:25', 'Login'),
(275, 'Ikhza Admin,18.11.0210', '2021-04-12 07:07:25', 'Login'),
(276, 'Akhmad Ikhza Assaufi,18.11.0205', '2021-07-09 15:31:25', 'Login'),
(277, 'Akhmad Ikhza Assaufi,18.11.0205', '2021-07-09 15:32:01', 'Logout'),
(278, 'Ikhza Admin,18.11.0210', '2021-07-09 15:32:06', 'Login'),
(279, 'Akhmad Ikhza Assaufi,18.11.0205', '2021-09-20 18:22:52', 'Login'),
(280, 'Akhmad Ikhza Assaufi,18.11.0205', '2021-09-20 18:41:30', 'Logout'),
(281, 'Akhmad Ikhza Assaufi,18.11.0205', '2021-09-24 18:30:23', 'Login'),
(282, 'Akhmad Ikhza Assaufi,18.11.0205', '2021-09-24 18:31:21', 'Manchester City'),
(283, 'Ikhza Admin,18.11.0210', '2021-09-26 08:15:21', 'Login'),
(284, 'Ikhza Admin,18.11.0210', '2021-09-26 18:43:55', 'Login'),
(285, 'Ikhza Admin,18.11.0210', '2021-09-26 18:44:07', 'Logout'),
(286, 'Akhmad Ikhza Assaufi,18.11.0205', '2021-09-26 18:44:32', 'Login'),
(287, 'Akhmad Ikhza Assaufi,18.11.0205', '2021-09-26 18:51:18', 'Manchester United'),
(288, 'Akhmad Ikhza Assaufi,18.11.0205', '2021-09-26 18:51:54', 'Logout'),
(289, 'Akhmad Ikhza Assaufi,18.11.0205', '2021-11-05 06:47:40', 'Login'),
(290, 'Akhmad Ikhza Assaufi,18.11.0205', '2021-11-05 07:58:20', 'Logout');

-- --------------------------------------------------------

--
-- Table structure for table `urutan`
--

CREATE TABLE `urutan` (
  `id_urutan` int(11) NOT NULL,
  `urutan` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urutan`
--

INSERT INTO `urutan` (`id_urutan`, `urutan`, `date_created`) VALUES
(6, 'Calon1', '2021-02-01 11:50:03'),
(7, 'Calon2', '2021-02-01 11:50:07'),
(8, 'Calon3', '2021-02-01 11:50:11'),
(9, 'Calon4', '2021-02-01 11:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id_calon` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_urutan` int(11) NOT NULL,
  `nama_calon` varchar(128) NOT NULL,
  `desc_calon` text NOT NULL,
  `foto_calon` varchar(128) NOT NULL,
  `jumlah_vote` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id_calon`, `id_user`, `id_urutan`, `nama_calon`, `desc_calon`, `foto_calon`, `jumlah_vote`, `date_created`) VALUES
(1, 22, 6, 'Manchester United', '<p>Glory Glory Manchester United</p>\r\n', '1612507224-united.png', 9, '2021-01-28 22:59:07'),
(9, 22, 7, 'Manchester City', '<p>The blues</p>\r\n', '1612507261-city.png', 2, '2021-02-05 13:21:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `log_vote`
--
ALTER TABLE `log_vote`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `urutan`
--
ALTER TABLE `urutan`
  ADD PRIMARY KEY (`id_urutan`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id_calon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `log_vote`
--
ALTER TABLE `log_vote`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `urutan`
--
ALTER TABLE `urutan`
  MODIFY `id_urutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id_calon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
