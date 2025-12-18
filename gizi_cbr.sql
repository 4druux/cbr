-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2025 pada 15.52
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gizi_cbr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `analisa_hasil`
--

CREATE TABLE `analisa_hasil` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelamin` char(10) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `analisa_hasil`
--

INSERT INTO `analisa_hasil` (`id`, `nama`, `kelamin`, `umur`, `alamat`, `kd_penyakit`, `tanggal`) VALUES
(691, 'rahmi', 'Wanita', '3', 'padang', 'P003', '2025-09-06 20:05:54'),
(690, 'rahmi', 'Wanita', '3', 'padang', 'P003', '2025-09-06 20:05:54'),
(689, 'rahmi', 'Laki-laki', '3', 'padang', 'P003', '2025-09-06 20:00:44'),
(688, 'rahmi', 'Laki-laki', '3', 'padang', 'P003', '2025-09-06 20:00:44'),
(706, 'saaaa', 'Wanita', '2', 'cvfvgb', 'P003', '2025-11-06 21:42:01'),
(707, 'saaaa', 'Wanita', '2', 'cvfvgb', 'P003', '2025-11-06 21:42:01'),
(692, 'rahmi', 'Laki-laki', '3', 'padang', 'P003', '2025-09-06 20:07:20'),
(693, 'rahmi', 'Laki-laki', '3', 'padang', 'P003', '2025-09-06 20:07:20'),
(694, 'rahmi', 'Laki-laki', '3', 'padang', 'P003', '2025-09-06 20:07:20'),
(695, 'rahmi', 'Wanita', '3', 'padang', 'P004', '2025-09-07 16:51:07'),
(696, 'rahmi', 'Wanita', '3', 'padang', 'P002', '2025-09-07 16:51:07'),
(697, 'rahmi', 'Wanita', '3', 'padang', 'P003', '2025-10-13 19:47:01'),
(698, 'rahmi', 'Laki-laki', '3', 'padang', 'P004', '2025-10-28 17:02:13'),
(699, 'rahmi', 'Laki-laki', '3', 'padang', 'P003', '2025-10-28 17:02:13'),
(700, 'najmi', 'Wanita', '3', 'ciputat', 'P004', '2025-11-04 22:36:29'),
(701, 'najmi', 'Wanita', '3', 'ciputat', 'P003', '2025-11-04 22:36:29'),
(702, 'najmi', 'Wanita', '3', 'ciputat', 'P004', '2025-11-04 22:39:50'),
(703, 'najmi', 'Wanita', '3', 'ciputat', 'P001', '2025-11-04 22:39:50'),
(704, 'najmi', 'Wanita', '2', 'ciputat', 'P004', '2025-11-05 13:30:51'),
(708, 'saaaa', 'Wanita', '2', 'cvfvgb', 'P003', '2025-11-06 21:42:01'),
(709, 'saaaa', 'Wanita', '2', 'cvfvgb', 'P003', '2025-11-06 21:42:01'),
(710, 'saaaa', 'Wanita', '2', 'cvfvgb', 'P003', '2025-11-06 21:42:01'),
(711, 'saaaa', 'Wanita', '2', 'cvfvgb', 'P003', '2025-11-06 21:42:01'),
(712, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(713, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(714, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(715, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(716, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(717, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(718, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(719, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(720, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(721, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(722, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(723, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(724, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(725, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(726, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(727, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(728, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(729, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(730, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(731, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(732, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(733, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(734, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(735, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(736, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(737, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(738, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(739, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(740, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(741, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(742, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(743, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(744, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(745, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(746, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(747, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(748, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(749, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(750, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(751, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(752, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(753, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(754, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(755, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(756, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(757, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(758, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(759, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(760, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(761, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(762, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(763, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(764, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(765, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(766, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(767, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(768, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(769, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(770, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(771, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(772, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(773, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(774, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(775, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(776, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(777, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(778, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(779, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(780, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(781, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(782, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(783, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(784, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P003', '2025-11-06 22:42:02'),
(785, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-06 22:42:02'),
(786, 'najmi', 'Wanita', '3', 'ciputat', 'P004', '2025-11-08 20:17:38'),
(787, 'najmi', 'Wanita', '3', 'ciputat', 'P001', '2025-11-08 20:17:38'),
(788, 'najmi', 'Wanita', '3', 'ciputat', 'P003', '2025-11-08 21:38:49'),
(789, 'najmi', 'Wanita', '3', 'ciputat', 'P002', '2025-11-08 21:38:49'),
(790, 'najmi', 'Wanita', '3', 'ciputat', 'P004', '2025-11-08 21:57:50'),
(791, 'najmi', 'Wanita', '3', 'ciputat', 'P002', '2025-11-08 21:57:50'),
(792, 'najmi', 'Laki-laki', '3', 'ciputat', 'P004', '2025-11-10 15:46:14'),
(793, 'najmi', 'Laki-laki', '3', 'ciputat', 'P003', '2025-11-10 15:46:14'),
(794, 'najmi', 'Wanita', '3', 'ciputat', 'P004', '2025-11-10 15:54:21'),
(795, 'najmi', 'Wanita', '3', 'ciputat', 'P003', '2025-11-10 15:54:21'),
(796, 'najmi', 'Wanita', '3', 'ciputat', 'P004', '2025-11-10 15:54:21'),
(797, 'najmi', 'Wanita', '3', 'ciputat', 'P003', '2025-11-10 15:54:21'),
(798, 'najmi', 'Wanita', '3', 'ciputat', 'P004', '2025-11-10 15:54:21'),
(799, 'najmi', 'Wanita', '3', 'ciputat', 'P003', '2025-11-10 15:54:21'),
(800, 'wisnu', 'Laki-laki', '3', 'ciputat', 'P002', '2025-11-13 16:00:18'),
(801, 'wisnu', 'Laki-laki', '3', 'ciputat', 'P003', '2025-11-13 16:00:18'),
(802, 'wisnu', 'Laki-laki', '3', 'ciputat', 'P002', '2025-11-13 16:00:18'),
(803, 'wisnu', 'Laki-laki', '3', 'ciputat', 'P003', '2025-11-13 16:00:18'),
(804, 'wisnu', 'Laki-laki', '3', 'ciputat', 'P002', '2025-11-13 16:00:18'),
(805, 'wisnu', 'Laki-laki', '3', 'ciputat', 'P003', '2025-11-13 16:00:18'),
(806, 'wisnu', 'Laki-laki', '3', 'ciputat', 'P003', '2025-11-15 15:53:53'),
(807, 'wisnu', 'Laki-laki', '3', 'ciputat', 'P002', '2025-11-15 15:53:53'),
(808, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P002', '2025-11-20 14:36:46'),
(809, 'saaaa', 'Laki-laki', '2', 'cvfvgb', 'P001', '2025-11-20 14:36:46'),
(810, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P002', '2025-11-20 17:16:11'),
(811, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P003', '2025-11-20 17:16:11'),
(812, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P003', '2025-11-20 21:25:44'),
(813, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P004', '2025-11-20 21:25:44'),
(814, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P003', '2025-11-20 21:25:44'),
(815, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P004', '2025-11-20 21:25:44'),
(816, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P003', '2025-11-20 21:25:44'),
(817, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P004', '2025-11-20 21:25:44'),
(818, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P003', '2025-11-20 21:25:44'),
(819, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P004', '2025-11-20 21:25:44'),
(820, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P003', '2025-11-20 21:25:44'),
(821, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P004', '2025-11-20 21:25:44'),
(822, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P003', '2025-11-20 21:25:44'),
(823, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', 'P004', '2025-11-20 21:25:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` char(4) NOT NULL,
  `gejala` varchar(100) NOT NULL,
  `pengertian` text DEFAULT NULL,
  PRIMARY KEY (`kd_gejala`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `gejala`, `pengertian`) VALUES
('G001', 'Berat badan tidak naik/turun (dalam jangka waktu 3 bulan)', 'Berat badan balita tidak bertambah atau menurun selama tiga bulan.'),
('G002', 'Badan sangat kurus (tulang iga/mata cekung terlihat)', 'Kondisi tubuh balita tampak sangat kurus dengan tulang terlihat.'),
('G003', 'Lingkar lengan atas (LiLA) < 11,5 cm', 'Ukuran lingkar lengan atas balita kurang dari 11,5 cm'),
('G004', 'Ada bengkak di kaki/wajah (edema)', 'Terjadi pembengkakan pada kaki atau wajah akibat penumpukan cairan yang dapat disebabkan oleh gangguan gizi atau pencernaan.'),
('G005', 'Perut buncit', 'Perut balita tampak membesar atau menonjol.'),
('G006', 'Kulit kering/bersisik', 'Kulit balita tampak kering atau bersisik.'),
('G007', 'Rambut rontok/kusam', 'Rambut balita mudah rontok dan terlihat kusam.'),
('G008', 'Lemas/tidak aktif bermain', 'Balita terlihat lemas dan kurang aktif bermain.'),
('G009', 'Sering rewel/menangis', 'Balita sering rewel atau menangis.'),
('G010', 'Nafsu makan sangat kurang', 'Nafsu makan balita menurun secara signifikan.'),
('G011', 'Makan berlebihan/tidak bisa berhenti', 'Balita makan berlebihan melebihi kebutuhan normal.'),
('G012', 'Sering sakit (diare/ISPA) dalam 1 bulan', 'Balita sering mengalami diare atau ISPA.'),
('G013', 'Pakaian longgar (tidak lagi pas)', 'Pakaian balita menjadi longgar akibat penurunan berat badan.'),
('G014', 'Frekuensi makan < 3x/hari ', 'Balita makan kurang dari tiga kali sehari.'),
('G015', 'Hanya makan nasi/tekstur cair (variasi minim)', 'Pola makan balita kurang bervariasi.');
-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit_solusi`
--

CREATE TABLE `penyakit_solusi` (
  `kd_penyakit` char(4) NOT NULL,
  `nama_penyakit` varchar(30) DEFAULT NULL,
  `definisi` text DEFAULT NULL,
  `solusi` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penyakit_solusi`
--

INSERT INTO `penyakit_solusi` (`kd_penyakit`, `nama_penyakit`, `definisi`, `solusi`) VALUES
('P001', 'Gizi Baik (Normal)', 'Kondisi status gizi yang seimbang, di mana asupan energi dan zat gizi sesuai dengan kebutuhan tubuh, sehingga menghasilkan berat badan, tinggi badan, dan indeks massa tubuh (IMT) yang ideal, serta menjaga kesehatan dan kebugaran tubuh secara keseluruhan.', 'Untuk mempertahankan status gizi baik (normal), pastikan anak tetap mendapat pola makan seimbang dengan karbohidrat, protein, sayur, buah, dan lemak sehat sesuai kebutuhan usianya. Usahakan makan teratur tiga kali sehari ditambah dua kali camilan sehat, batasi makanan manis, asin, dan berlemak, serta biasakan anak cukup minum air putih. Jangan lupa ajak anak tetap aktif bergerak, tidur cukup, dan rutin pantau berat serta tinggi badannya agar tumbuh kembangnya selalu optimal.'),
('P002', 'Gizi Kurang (Underweight)', 'Kondisi ketika berat badan seseorang berada di bawah standar normal untuk usia dan jenis kelaminnya. Ini seringkali disebabkan oleh kurangnya asupan nutrisi yang dibutuhkan tubuh untuk menjaga fungsi tubuh dan pertumbuhan yang optimal. ', 'Pertama, tingkatkan asupan energi dan protein anak melalui makanan bergizi seimbang, misalnya menambahkan lauk hewani seperti telur, ikan, ayam, atau daging pada setiap kali makan, serta sumber protein nabati seperti tempe, tahu, atau kacang-kacangan. Berikan makanan utama tiga kali sehari dan camilan sehat dua hingga tiga kali, misalnya buah, roti isi, atau susu. Pilih makanan yang padat gizi, bukan sekadar mengenyangkan, dan upayakan suasana makan yang menyenangkan agar anak tidak mudah bosan. Selain itu, pastikan anak cukup minum air putih, beristirahat dengan baik, serta tetap aktif bergerak untuk merangsang nafsu makan dan mendukung metabolisme. Pemantauan berat badan perlu dilakukan secara berkala, dan bila perbaikan tidak terlihat, sebaiknya dilakukan evaluasi lebih lanjut untuk mengetahui kemungkinan penyebab lain.'),
('P003', 'Gizi Buruk (Stunting)', 'Kondisi ketika berat badan seseorang berada di bawah standar normal untuk usia dan jenis kelaminnya. Ini seringkali disebabkan oleh kurangnya asupan nutrisi yang dibutuhkan tubuh untuk menjaga fungsi tubuh dan pertumbuhan yang optimal.', 'kategori gizi buruk, sehingga perlu penanganan serius. Segera dibawa ke fasilitas kesehatan terdekat agar mendapat pengawasan medis. Di rumah, berikan makanan padat gizi dengan porsi kecil tapi sering, misalnya telur, ikan, daging cincang halus, tempe, tahu, sayur, buah, dan susu sesuai anjuran. Pastikan anak cukup minum, istirahat, dan terhindar dari infeksi. Pemantauan berat badan harus rutin dilakukan agar perbaikannya bisa terpantau dengan baik.'),
('P004', 'Resiko Obesitas', 'Berat badan melebihi standar tinggi badan. Berisiko mengalami gangguan metabolik dan penyakit tidak menular di masa depan.', 'Anak disarankan mengonsumsi makanan seimbang dengan porsi sesuai kebutuhan, memperbanyak sayur, buah, protein sehat, dan membatasi makanan tinggi gula, garam, serta lemak jenuh. Batasi camilan manis, minuman bersoda, dan makanan cepat saji. Dorong anak untuk aktif bergerak setiap hari melalui permainan, olahraga ringan, atau kegiatan fisik lain, serta pastikan tidur cukup. Pemantauan berat dan tinggi badan secara rutin penting agar risiko obesitas dapat dicegah sebelum menjadi masalah kesehatan lebih serius.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `kd_gejala`, `kd_penyakit`, `bobot`) VALUES
(1, 'G008', 'P002', 3),
(2, 'G018', 'P001', 5),
(3, 'G011', 'P004', 5),
(4, 'G001', 'P002', 1),
(5, 'G010', 'P002', 3),
(6, 'G015', 'P002', 5),
(8, 'G009', 'P001', 1),
(9, 'G002', 'P003', 1),
(10, 'G003', 'P003', 5),
(11, 'G004', 'P003', 5),
(12, 'G006', 'P003', 1),
(13, 'G013', 'P003', 3),
(14, 'G014', 'P003', 5),
(18, 'G005', 'P004', 1),
(19, 'G006', 'P004', 5),
(20, 'G009', 'P004', 1),
(42, 'G007', 'P001', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_analisa`
--

CREATE TABLE `tmp_analisa` (
  `id` int(11) NOT NULL,
  `noip` varchar(30) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `id` int(11) NOT NULL,
  `noip` varchar(45) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `bobot` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`id`, `noip`, `kd_gejala`, `bobot`) VALUES
(131077, '', 'G003', 0),
(131078, '', 'G004', 0),
(131079, '', 'G005', 0),
(131080, '', 'G006', 0),
(131081, '', 'G010', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_pasien`
--

CREATE TABLE `tmp_pasien` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelamin` char(10) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noip` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tmp_pasien`
--

INSERT INTO `tmp_pasien` (`id`, `nama`, `kelamin`, `umur`, `alamat`, `noip`, `tanggal`) VALUES
(131, 'Aleeya', 'Wanita', '2', 'Rawa Buntu', '::1', '2025-11-20 21:25:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `noip` varchar(30) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tmp_penyakit`
--

INSERT INTO `tmp_penyakit` (`noip`, `kd_penyakit`, `nilai`) VALUES
('', 'P002', 0.25),
('', 'P001', 0),
('', 'P004', 0.5),
('', 'P003', 0.55);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `penyakit_solusi`
--
ALTER TABLE `penyakit_solusi`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indeks untuk tabel `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`);

--
-- Indeks untuk tabel `tmp_analisa`
--
ALTER TABLE `tmp_analisa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=824;

--
-- AUTO_INCREMENT untuk tabel `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tmp_analisa`
--
ALTER TABLE `tmp_analisa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131082;

--
-- AUTO_INCREMENT untuk tabel `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
