-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2020 pada 10.25
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dokter`
--

CREATE TABLE `data_dokter` (
  `id_dokter` char(10) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `spesialisasi_dokter` enum('Anak','Vaksinasi','Penyakit Dalam','Gigi','Kandungan','THT','Umum','Jiwa','Mata','Radiologi','Saraf','Jantung','Bedah','Paru','Gizi','Kelamin & Kulit') NOT NULL,
  `hari_praktek` enum('Senin','Selasa','Rabu','Kamis','Jumat') NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_dokter`
--

INSERT INTO `data_dokter` (`id_dokter`, `nama_dokter`, `jenis_kelamin`, `spesialisasi_dokter`, `hari_praktek`, `jam_masuk`, `jam_keluar`) VALUES
('dok1', 'Muhammad Faruq Syahad', 'Laki-laki', 'Kandungan', 'Selasa', '20:50:00', '23:50:00'),
('dok2', 'Muhammad Fadhil Syahad', 'Laki-laki', 'Umum', 'Rabu', '14:00:00', '16:00:00'),
('dok3', 'Naila Qanitah Syahad', 'Perempuan', 'Anak', 'Selasa', '10:00:00', '13:00:00'),
('dok4', 'Yara Pra Adha', 'Perempuan', 'Kandungan', 'Senin', '18:00:00', '20:00:00'),
('dok5', 'Talitha Denaneer', 'Perempuan', 'Gizi', 'Jumat', '14:00:00', '16:00:00'),
('dok6', 'Syifa Hasanah', 'Perempuan', 'Vaksinasi', 'Kamis', '10:00:00', '12:00:00'),
('dok7', 'Dr. Fulan', 'Laki-laki', 'Gigi', 'Rabu', '13:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kunjungan_pasien`
--

CREATE TABLE `data_kunjungan_pasien` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_pasien` char(10) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `poli_tujuan` enum('Anak','Vaksinasi','Penyakit Dalam','Gigi','Kandungan','THT','Umum','Jiwa','Mata','Radiologi','Saraf','Jantung','Bedah','Paru','Gizi','Kelamin & Kulit') NOT NULL,
  `keluhan` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kunjungan_pasien`
--

INSERT INTO `data_kunjungan_pasien` (`id_pendaftaran`, `id_pasien`, `nama_pasien`, `poli_tujuan`, `keluhan`, `tanggal`, `waktu`) VALUES
(1, 'pas1', 'Saadatunnahar', 'Umum', 'Demam', '2020-12-10', '17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_obat`
--

CREATE TABLE `data_obat` (
  `id_pasien` char(10) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `jenis_obat` varchar(255) NOT NULL,
  `satuan_obat` varchar(255) NOT NULL,
  `harga_obat` varchar(10) NOT NULL,
  `tanggal_keluar_obat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_obat`
--

INSERT INTO `data_obat` (`id_pasien`, `nama_pasien`, `nama_obat`, `jenis_obat`, `satuan_obat`, `harga_obat`, `tanggal_keluar_obat`) VALUES
('pas1', 'Saadatunnahar', 'Methamizole / Antrain inj', 'Tablet', '14 buah, 1x sehari', '15.000', '2020-12-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pasien`
--

CREATE TABLE `data_pasien` (
  `id_pasien` char(10) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `kelamin_pasien` enum('Laki-laki','Perempuan') NOT NULL,
  `usia_pasien` int(3) NOT NULL,
  `gol_darah_pasien` enum('A','B','AB','O') NOT NULL,
  `tanggal_lahir_pasien` varchar(255) NOT NULL,
  `alamat_pasien` varchar(255) NOT NULL,
  `asuransi_pasien` enum('BPJS','Asuransi Swasta','Pribadi') NOT NULL,
  `nomor_telepon_pasien` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pasien`
--

INSERT INTO `data_pasien` (`id_pasien`, `nama_pasien`, `kelamin_pasien`, `usia_pasien`, `gol_darah_pasien`, `tanggal_lahir_pasien`, `alamat_pasien`, `asuransi_pasien`, `nomor_telepon_pasien`) VALUES
('pas1', 'Saadatunnahar', 'Perempuan', 49, 'B', '23/10/1971', 'Komp. Perumahan Guru Cendana Blok D.4', 'BPJS', '0852xxxxxxxx'),
('pas2', 'Saadatunnahar', 'Perempuan', 49, 'B', '23/10/1971', 'SD Cendana Duri', 'BPJS', '08126843601'),
('pas3', 'Pasien Anonim', 'Laki-laki', 32, 'AB', '01/12/1988', 'Cisitu', 'Asuransi Swasta', '081356784351');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_staff`
--

CREATE TABLE `data_staff` (
  `id_staff` char(10) NOT NULL,
  `nama_staff` varchar(255) NOT NULL,
  `bidang_staff` enum('Administrasi','Apoteker') NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `hari_kerja` enum('Senin','Selasa','Rabu','Kamis','Jumat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_staff`
--

INSERT INTO `data_staff` (`id_staff`, `nama_staff`, `bidang_staff`, `jenis_kelamin`, `hari_kerja`) VALUES
('admin1', 'Mrs. Anonim', 'Administrasi', 'Perempuan', 'Senin'),
('admin123', 'Naila Qanitah Syahad', 'Administrasi', 'Perempuan', 'Rabu'),
('apo1', 'Mrs. Anon', 'Apoteker', 'Perempuan', 'Jumat'),
('apo123', 'Muhammad Faruq Syahad', 'Apoteker', 'Laki-laki', 'Selasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `no` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`no`, `nama`, `email`, `phone`, `feedback`) VALUES
(1, 'Muhammad Fadhil Syahad', 'syahadadil@gmail.com', '082283575474', 'Sudah bagus kok, mulai aja TA lagi'),
(2, 'Muhammad Faruq Syahad', 'muhammadsyahad9ridho17@gmail.com', '08xxxxxxxxxx', 'love you');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_pasien` char(10) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `diagnosa` text NOT NULL,
  `tindakan` text NOT NULL,
  `resep_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_pasien`, `nama_pasien`, `tanggal_kunjungan`, `diagnosa`, `tindakan`, `resep_obat`) VALUES
('pas1', 'Saadatunnahar', '2020-12-10', 'Demam,sakit kepala', 'banyak minum', 'paracetamol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_obat`
--

CREATE TABLE `resep_obat` (
  `no` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `jenis_obat` varchar(255) NOT NULL,
  `khasiat` text NOT NULL,
  `efek_samping` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep_obat`
--

INSERT INTO `resep_obat` (`no`, `nama_obat`, `jenis_obat`, `khasiat`, `efek_samping`) VALUES
(1, 'Paracetamol Biru', 'Tablet', 'Menghilangkan demam', 'Ngantuk'),
(2, 'Paracetamol merah', 'Tablet', 'Meredakan sakit kepala', 'Mengantuk'),
(3, 'Aminofilin', 'Tablet', 'Mengobati sakit pernafasan', 'Lelah, gangguan pencernaan'),
(4, 'Ambroksol', 'Tablet, Sirup, Bubuk', 'Mengencerkan dahak', 'Gangguan pencernaan, maag, muntah'),
(5, 'Amoksisilin', 'Tablet, Kapsul, Sirup', 'Sistem Pernapasan, Sistem Pencernaan, Sistem Sluran Kemih, THT', 'Mual. Muntah. Sakit kepala. Muncul ruam pada kulit.'),
(6, 'Antasida DOEN', 'Tablet', 'Maag', 'Diare, perut kembung'),
(7, 'Vitamin C', 'Tablet', 'Mencegah dan Mengatasi Defisiensi Vitami C', '-'),
(8, 'Asam Folat', 'Tablet', 'Vitamin Penambahan Sel Darah Merah', 'Kehilangan nafsu makan'),
(9, 'Bedak Salisil', 'Serbuk', 'Gatal', '-'),
(10, 'Basitrasin Salep', 'Topikal', 'Mencegah infeksi bakteri pada luka ringan dikulit, mengobati peneumonia pada bayi', 'Ruam kulit'),
(11, 'Betametason', 'Salep', 'Alergi dan gatal', 'Ruam kulit'),
(12, 'Clopidogrel', 'Tablet', 'Serangan jantung, stroke, oprasi pada jantung, penderita penyakit arteri', 'Mudah mengalami memar. Perdarahan yang sulit berhenti. Gangguan pencernaan. Nyeri perut.'),
(13, 'Citicolin Inj', 'Tablet, suntik, kapsul', 'Mencegah degenarasi saraf dan melindungi kerusakan mata, meningkatkan metabolisme diotak', 'Insomnia. Sakit kepala. Diare. Tekanan darah rendah atau hipotensi.'),
(14, 'Dextrofen Sirup', 'Sirup', 'Menghilangkan batuk akibat pilek, alergi, & hidung tersumbat', 'Kering mulut'),
(15, 'Diazepam', 'Tablet', 'Penenang, Insomnia', 'Pusing, lelah, bingung'),
(16, 'Furosemid', 'Tablet, Sirup', 'Mengendalikan Darah Tinggi Dan Edema', 'Pusing. Vertigo. Mual dan muntah.'),
(17, 'Hidroklorotiazid', 'Tablet', 'Menangani Hipertensi', 'Hipotensi, sinkop, dan ketidakseimbangan elektrolit.'),
(18, 'Karbamazepin', 'Tablet, Kapsul', 'Mencegah kejang epilepsi', 'Pusing. Kehilangan koordinasi. Kesulitan berjalan.'),
(19, 'Levertran', 'Salep', 'Mengobati luka bakar', '-'),
(20, 'Metformin HCl', 'Tablet, Serbuk', 'Menurunkan kadar gula darah', 'Heartburn (sensasi terbakar dan panas pada ulu hati) Sakit perut. Mual atau muntah. Perut kembung dan bergas.'),
(21, 'Methamizole / Antrain inj', 'Tablet', 'Meredakan demam, menghilangkan rasa sakit', 'Vertigo, kejang, gangguan pencernaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` enum('Pasien','Administrasi','Apoteker','Dokter') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `user_level`) VALUES
('admin1', 'admin_anon', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'Administrasi'),
('admin123', 'nailasyahad', 'd506ad8ec510079f34cc7970ca9a9c49b86a9cc617ad02482bf17ba17e9690dd', 'Administrasi'),
('apo1', 'apo_anon', 'd1343995cf508ce1aa312be53aee87359c928421a5b9a967b485e1c791b59680', 'Apoteker'),
('apo123', 'faruqsyahad', '8926a6b2b8f450fc004ad3342df36270da6d73dd6b66755c2d3b157289ef7113', 'Apoteker'),
('dok1', 'faruqtamvan', 'e3a7524b5ba9a6c98d9c24c8f5501473918101b745caeace8b042132cc814397', 'Dokter'),
('dok2', 'fadhilsyahad', 'a960bfc4270dbb6d2a629f344ae50b54de4e501f00f5c16ff41d4f93f2fc1348', 'Dokter'),
('dok3', 'naqod', '106d66554b5f30e96e5c228c8fbd93f6c7f492612d902e4d094bd1c3cfe81cbc', 'Dokter'),
('dok4', 'yara', '781d3de6be9aeeb7952d0d0ce1397368f304abe1c3d0d263839abd50ec6e9da8', 'Dokter'),
('dok5', 'titha', '848be944013cc3374ddfef3655d6816c060610161c835c71a9665e6dc18f6542', 'Dokter'),
('dok6', 'syifa', '6cd18d7d1d256f040e76cc5fde9e013b333b291badcd98aac094befa4913be52', 'Dokter'),
('dok7', 'doktor_anon', 'b3959dee9b178b030c2b8373da55a04ab3adb318edeb178953ff8b77301a360a', 'Dokter'),
('pas1', 'adsyahad', 'c5cf6c19be2356db327bd0ce999801faf3c936dd723caac50ecab3e79fee29fc', 'Pasien'),
('pas2', 'atun', '06db036a4582f6b6ac06d960bce1a752282c8be6732c58c2f501c8de83b0956d', 'Pasien'),
('pas3', 'anonim', 'b3cb1bf1350e826eafc2250c570837e1ef1a0e8d6fece2c3478740670ce8fed1', 'Pasien');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD UNIQUE KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `data_kunjungan_pasien`
--
ALTER TABLE `data_kunjungan_pasien`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD UNIQUE KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `data_staff`
--
ALTER TABLE `data_staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD UNIQUE KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `nama_obat` (`nama_obat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kunjungan_pasien`
--
ALTER TABLE `data_kunjungan_pasien`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD CONSTRAINT `data_dokter_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `data_kunjungan_pasien`
--
ALTER TABLE `data_kunjungan_pasien`
  ADD CONSTRAINT `data_kunjungan_pasien_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `data_pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `data_obat`
--
ALTER TABLE `data_obat`
  ADD CONSTRAINT `data_obat_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `data_pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD CONSTRAINT `data_pasien_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `data_staff`
--
ALTER TABLE `data_staff`
  ADD CONSTRAINT `data_staff_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `data_pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
