-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Sep 2024 pada 14.47
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_food_order`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(9, 'admin1234', 'admin123', 'admin@gmail.com', 'QFE6ZM', '2024-10-11-11:24:52'),
(10, 'Muhamad Rizki', 'Iki123', '2206062@itg.ac.id', 'QMZR92', '2024-11-11:39:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_codes`
--

CREATE TABLE `admin_codes` (
  `id` int(222) NOT NULL,
  `codes` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_codes`
--

INSERT INTO `admin_codes` (`id`, `codes`) VALUES
(1, 'QX5ZMN'),
(2, 'QFE6ZM'),
(3, 'QMZR92'),
(4, 'QPGIOV'),
(5, 'QSTE52'),
(6, 'QMTZ2J');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dishes`
--

CREATE TABLE `Kue` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dishes`
--

INSERT INTO `Kue` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(15, 48, 'Bolu Pandan', 'Aroma pandan yang wangi, kelembutan tiada tanding!', '20000.00', 'bolupandan.jpg'),
(16, 49, 'Tart Cokelat', 'Rayakan dengan cokelat, manisnya selalu tepat!', '30000.00', 'kuetartt.jpg'),
(17, 50, 'Sobek rasa cokelat', 'manisnya bikin lengket!', '15000.00', 'rotisobekk.jpg'),
(18, 51, 'Sus Original', 'Kesederhanaan rasa yang memikat selera!', '5000.00', 'kuesuss.jpg'),
(19, 52, 'Cupcake Blueberry', 'Ledakan rasa blueberry di setiap gigitan', '50000.00', 'cupcakee.jpg'),
(20, 53, 'Pisang Bolen Keju', 'Perpaduan sempurna antara pisang dan keju!', '30000.00', 'rpisangbolenn.jpg')
-- --------------------------------------------------------

--
-- Struktur dari tabel `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `remark`
--

INSERT INTO `status` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(71, 41, 'in process', 'in proses', '2024-04-11 09:40:37'),
(72, 44, 'in process', 'sedang di masak', '2024-11-25 04:21:29'),
(73, 44, 'closed', 'sedang di antar', '2024-11-29 12:50:12'),
(74, 44, 'in process', 'sedang di masak', '2024-11-04 00:43:02'),
(75, 44, 'in process', 'sedang di buat', '2024-11-07 11:48:43'),
(76, 49, 'in process', 'sedang di masak', '2024-11-11 11:44:59'),
(77, 49, 'in process', 'process bre', '2024-11-13-11:45:15'),
(78, 49, 'closed', 'silahkan menikmati\r\n', '2024-11-13 12:02:40'),
(79, 50, 'closed', 'segera datang', '2024-11-13 12:12:59'),
(80, 50, 'in process', 'sdad', '2024-11-13 12:14:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restaurant`
--

CREATE TABLE `Jenis_Kue` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `slogan` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `restaurant`
--

INSERT INTO `Jenis_Kue` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `slogan`, `image`, `date`) VALUES
(48, 14, 'Bolu', 'BoluBerry@gmail.com', '0895373761194', 'BoluBerry.com', '24hour', '24hour', 'every-day', 'Lembutnya bolu di setiap gigitan, manisnya tak pernah mengecewakan!', 'bolu.jpg', '2024-11-07 11:39:35'),
(49, 13, 'Kue Tart', 'BoluBerry@gmail.com', '0895373761194', 'BoluBerry.com', '7am', '8pm', '24hr-x7', 'Hadirkan kemeriahan di setiap momen spesial dengan tart yang sempurna!', 'kuetart.png', '2024-11-25 04:53:25'),
(50, 12, 'Roti Sobek', 'BoluBerry@gmail.com', '0895373761194', 'BoluBerry.com', '9am', '8pm', '24hr-x7', 'Sobek dan nikmati, kelezatan yang siap berbagi!', 'rotisobek.jpg', '2024-11-25 11:32:51'),
(51, 11, 'Kue Sus', 'BoluBerry@gmail.com', '0895373761194', 'BoluBerry.com', '9am', '8pm', '24hr-x7', 'Isi krim yang melimpah, kenikmatan yang tak terduga di dalam!' 'kuesus.jpg', '2024-11-25 07:27:29'),
(52, 13, 'CupCake', 'BoluBerry@gmail.com', '0895373761194', 'BoluBerry.com', '8am', '8pm', '24hr-x7', 'Kecil, manis, dan penuh warna sempurna untuk segala suasana!', 'cupcake.jpg', '2024-11-25 07:19:36'),
(53, 12, 'Pisang Bolen', 'BoluBerry@gmail.com', '0895373761194', 'BoluBerry.com', '24hour', '24hour', 'every-day', 'Renyah di luar, lembut di dalam, dan lezat tak terlupakan', 'pisangbolen.jpg', '2024-11-14 11:54:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(14, 'Bolu - Boluan', '2024-11-25 07:35:48'),
(12, 'Roti - Rotian', '2024-11-24 12:30:09'),
(13, 'Kue - Kuean', '2024-11-25 04:52:42'),
(11, 'Kue Curiga', '2024-11-25 11:31:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(33, 'Muhamad Rizki', 'Muhamad', 'Rizki', '2206062@itg.ac.id', '0895373761194', 'ikiganteng', 'jl.pajagalan', '1', '2024-04-11:35:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(49, 33, 'Kue Cubit', 2, '20000.00', 'closed', '2024-11-13 12:02:40'),
(50, 33, 'Kue Sus', 2, '30000.00', 'in process', '2024-11-13 12:14:13'),
(54, 33, 'Kue Lapis', 1, '50000.00', NULL, '2024-11-14 04:19:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);


ALTER TABLE `admin_codes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Kue`
  ADD PRIMARY KEY (`d_id`);

ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `jenis_kue`
  ADD PRIMARY KEY (`rs_id`);

ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `admin_codes`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `Kue`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

ALTER TABLE `jenis_kue`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
