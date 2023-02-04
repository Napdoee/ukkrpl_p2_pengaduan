-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2023 pada 06.32
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_pengaduan`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pengaduan` (IN `uNik` VARCHAR(255), IN `uJudul` VARCHAR(255), IN `uIsi` TEXT, IN `uFoto` VARCHAR(255))   BEGIN
	INSERT INTO pengaduan(nik, judul_laporan, isi_laporan, foto)
    VALUES(uNik, uJudul, uIsi, uFoto);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrasi` (IN `uNik` VARCHAR(255), IN `uNama` VARCHAR(255), IN `uName` VARCHAR(255), IN `uPass` VARCHAR(255), IN `uTelp` VARCHAR(255))   BEGIN
	INSERT INTO masyarakat
    VALUES(uNik, uNama, uName, uPass, uTelp);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tanggapan` (IN `uIdPengaduan` INT, IN `uTanggapan` TEXT, IN `uIdPetugas` INT)   BEGIN
	INSERT INTO tanggapan(id_pengaduan, tanggapan, id_petugas)
    VALUES(uIdPengaduan, uTanggapan, uIdPetugas);
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `jmlPengaduan` () RETURNS INT(11)  BEGIN
	DECLARE hasil int(11);
   	SET hasil = (SELECT COUNT(*) FROM pengaduan WHERE status = '0');
    RETURN hasil;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('1815175101721511', 'wiwi', 'wiwi', '38f2f8bb5145c0b899542570b91153f6', '62850180185'),
('8157519275018275', 'Hidayat', 'dayat', '1855c11f044cc8944e8cdac9cae5def8', '082189575000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL DEFAULT current_timestamp(),
  `nik` char(16) NOT NULL,
  `judul_laporan` varchar(255) DEFAULT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `judul_laporan`, `isi_laporan`, `foto`, `status`) VALUES
(13, '2023-02-02', '8157519275018275', 'Perbaikan Jalanan Antang Raya', '<h6 class=\"\"><b><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Perbaikan Jalanan Antang Raya</span></b></h6><h6 class=\"\" style=\"\"><u><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Alasan Mengajukan:</span></u></h6><ul style=\"margin-bottom: 0px;\"><li style=\"text-align: left;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Sangat menggangu kenyaman berkendara</span></li><li style=\"text-align: left;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Kemacetan yang sangat padat</span></li><li style=\"text-align: left;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Banjir semakin meluas</span></li></ul>', '1675338792.jpg', 'selesai'),
(14, '2023-02-03', '1815175101721511', 'Keributan yang terjadi disekitar pasar antang', '<p>Terdapat sekelompok anak muda yang melakukan aksi tawuran antara pelajar sekolah<br>2 Korban remaja yang mengakibatkan luka sayatan akibat terkena sajam</p><p><b>Permintaan dari masyarakat setempat</b></p><p>Diharapkan pemerintah dapat meminimalisirkan terjadinya tawuran antara pelajar agar tidak terjadi hal-hal yang lebih ekstrim dengan mengadakan sosialisasi di semua sekolah yang terlibat aksi tawuran.</p><p>Sekian dari kami.</p>', '1675340392.jpg', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('petugas','admin') NOT NULL DEFAULT 'petugas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'Super Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0000', 'admin'),
(2, 'Wandy', 'wandi', '3b061f6cd9ce9137e02c651f87e166b2', '155151', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL DEFAULT current_timestamp(),
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(14, 13, '2023-02-02', 'Baik kami akan segera melakukan perbaikan jalan yang akan dijadwalkan pada bulan Januari 2023 mendatang, terimakasih atas laporannya.', 1),
(15, 14, '2023-02-02', 'Kami ikut prihatin atas prilaku pelajar yang melakukan aksi tawuran, kami akan segera melakukan sosialisasi disekolah sekolah yang terlibat tawuran. Terimakasih atas laporannya', 1),
(16, 13, '2023-02-04', 'Perbaikan jalanan antang raya telah selesai dilaksanakan.\r\n', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
