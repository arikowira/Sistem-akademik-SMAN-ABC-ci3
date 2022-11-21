-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Feb 2022 pada 16.30
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_sistemakademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(120) NOT NULL,
  `email` varchar(255) NOT NULL,
  `blokir` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email`, `blokir`, `username`, `password`) VALUES
(6, 'Ariko', 'admin@gmail.com', 'No', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_catatan`
--

CREATE TABLE `tb_catatan` (
  `id_catatan` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_catatan`
--

INSERT INTO `tb_catatan` (`id_catatan`, `nisn`, `tahun_akademik`, `semester`, `catatan`) VALUES
(4, '0001212412', '2020/2021', 'Ganjil', 'mantapp bubuu1'),
(5, '0002349876', '2020/2021', 'Genap', 'terusin ajaa dyy wkwk'),
(8, '0008807186', '2020/2021', 'Genap', 'bagus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `kode_guru` varchar(20) NOT NULL,
  `nama_guru` varchar(120) NOT NULL,
  `tempat_lahir` varchar(120) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(120) NOT NULL,
  `agama` varchar(120) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(120) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `walikelas` varchar(5) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `kode_guru`, `nama_guru`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `email`, `telepon`, `foto`, `walikelas`, `username`, `password`) VALUES
(1, 'GUR001', 'Budiyono', 'Jakarta', '2021-08-20', 'Laki-Laki', 'Islam', 'Jl. Mini I Bambu Apus', 'budiyono@gmail.com', '081285664990', 'IMG_20201007_165625.jpg', 'Ya', 'budiyono', 'budiyono'),
(3, 'GUR002', 'Sulistian', 'Jakarta', '2021-08-24', 'Laki-laki', 'Islam', 'Jl.Setu Indah V no.15', 'sulistian@gmail.com', '081212452352', '20082020_200821.jpg', 'Ya', 'sulistian', 'sulistian'),
(4, 'GUR003', 'Sutrisno', 'Jakarta', '2021-10-05', 'Laki-laki', 'Buddha', '3384 Glen Falls Road', 'sutrisno@gmail.com', '0812432432', 'Pic4.png', 'Tidak', 'sutrisno', 'sutrisno');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`) VALUES
(6, '01', 'IPS'),
(7, '02', 'IPA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `nama_jurusan` varchar(5) NOT NULL,
  `tingkat` varchar(5) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kode_kelas`, `kelas`, `nama_jurusan`, `tingkat`, `id_guru`) VALUES
(13, '10012', 'X IPS-2', 'IPS', 'X', 3),
(15, '10013', 'X IPS-3', 'IPS', 'X', 0),
(16, '10014', 'X IPS-4', 'IPS', 'X', 0),
(17, '10021', 'X IPA-1', 'IPA', 'X', 0),
(18, '10022', 'X IPA-2', 'IPA', 'X', 0),
(19, '10023', 'X IPA-3', 'IPA', 'X', 0),
(20, '11011', 'XI IPS-1', 'IPS', 'XI', 0),
(21, '11012', 'XI IPS-2', 'IPS', 'XI', 0),
(22, '11013', 'XI IPS-3', 'IPS', 'XI', 0),
(23, '11014', 'XI IPS-4', 'IPS', 'XI', 0),
(24, '11021', 'XI IPA-1', 'IPA', 'XI', 0),
(25, '11022', 'XI IPA-2', 'IPA', 'XI', 0),
(26, '11023', 'XI IPA-3', 'IPA', 'XI', 0),
(27, '12011', 'XII IPS-1', 'IPS', 'XII', 0),
(28, '12012', 'XII IPS-2', 'IPS', 'XII', 0),
(29, '12013', 'XII IPS-3', 'IPS', 'XII', 0),
(30, '12014', 'XII IPS-4', 'IPS', 'XII', 0),
(36, '10011', 'X IPS-1', 'IPS', 'X', 1),
(37, '12021', 'XII IPA-1', 'IPA', 'XII', 0),
(38, '12022', 'XII IPA-2', 'IPA', 'XII', 0),
(39, '12023', 'XII IPA-3', 'IPA', 'XII', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelulusan`
--

CREATE TABLE `tb_kelulusan` (
  `id_kelulusan` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `kelulusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelulusan`
--

INSERT INTO `tb_kelulusan` (`id_kelulusan`, `nisn`, `tahun_akademik`, `semester`, `kelulusan`) VALUES
(3, '0002349876', '2020/2021', 'Genap', 'Naik Kelas'),
(6, '0008807186', '2020/2021', 'Genap', 'Tidak Naik Kelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matapelajaran`
--

CREATE TABLE `tb_matapelajaran` (
  `kode_matapelajaran` varchar(10) NOT NULL,
  `nama_matapelajaran` varchar(100) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `tingkat` varchar(5) NOT NULL,
  `nama_jurusan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_matapelajaran`
--

INSERT INTO `tb_matapelajaran` (`kode_matapelajaran`, `nama_matapelajaran`, `semester`, `tingkat`, `nama_jurusan`) VALUES
('ENG011001', 'Bahasa Inggris', 'Ganjil', 'X', 'IPS'),
('ENG021001', 'Bahasa Inggris', 'Genap', 'X', 'IPS'),
('IND011001', 'Bahasa Indonesia', 'Ganjil', 'X', 'IPS'),
('IND021001', 'Bahasa Indonesia', 'Genap', 'X', 'IPS'),
('SOS011001', 'Sosiologi', 'Ganjil', 'X', 'IPS'),
('SOS021001', 'Sosiologi', 'Genap', 'X', 'IPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `kode_guru` varchar(30) NOT NULL,
  `kode_matapelajaran` varchar(10) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `nilai` int(100) DEFAULT NULL,
  `kkm` int(100) DEFAULT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `nisn`, `kode_guru`, `kode_matapelajaran`, `id_kelas`, `tahun_akademik`, `semester`, `nilai`, `kkm`, `deskripsi`) VALUES
(67, '0001212412', 'GUR001', 'SOS011001', 36, '2020/2021', 'Ganjil', 80, 75, 'bubuu'),
(68, '0008807186', 'GUR001', 'SOS011001', 36, '2020/2021', 'Ganjil', 100, 75, 'bahh mantappppps'),
(69, '0001212412', 'GUR001', 'SOS021001', 36, '2020/2021', 'Genap', 100, 75, 'bubuu2'),
(70, '0008807186', 'GUR001', 'SOS021001', 36, '2020/2021', 'Genap', 100, 75, 'cukup baik dalam belajar'),
(77, '0001212412', 'GUR001', 'IND011001', 36, '2020/2021', 'Ganjil', 80, 70, 'sipp bubuu ind'),
(78, '0008807186', 'GUR001', 'IND011001', 36, '2020/2021', 'Ganjil', 90, 70, 'ntapss ko ind'),
(79, '0001212412', 'GUR001', 'ENG011001', 36, '2020/2021', 'Ganjil', 100, 70, 'sipp bubuu eng'),
(80, '0008807186', 'GUR001', 'ENG011001', 36, '2020/2021', 'Ganjil', 90, 70, 'ssipp koo eng'),
(81, '0001212412', 'GUR002', 'ENG021001', 36, '2020/2021', 'Genap', 80, 70, 'afifah eng 2'),
(82, '0008807186', 'GUR002', 'ENG021001', 36, '2020/2021', 'Genap', 100, 70, 'sudah cukup menguasai pelajaran dengan baik'),
(83, '0002349876', 'GUR001', 'IND021001', 13, '2020/2021', 'Genap', 80, 75, 'aldy ind 2'),
(84, '0002342234', 'GUR001', 'IND021001', 13, '2020/2021', 'Genap', 90, 75, 'budi ind 2'),
(85, '0001241124', 'GUR001', 'IND021001', 13, '2020/2021', 'Genap', 100, 75, 'farhan ind 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesertadidik`
--

CREATE TABLE `tb_pesertadidik` (
  `id` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama_pesertadidik` varchar(120) NOT NULL,
  `tempat_lahir` varchar(120) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(120) NOT NULL,
  `agama` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_orangtua` varchar(120) NOT NULL,
  `telepon_orangtua` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesertadidik`
--

INSERT INTO `tb_pesertadidik` (`id`, `nisn`, `nama_pesertadidik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `email`, `alamat`, `telepon`, `id_kelas`, `nama_orangtua`, `telepon_orangtua`, `foto`, `username`, `password`) VALUES
(13, '0008807186', 'Ariko Wirasetya Yuddha', 'Jakarta', '2021-08-05', 'Laki-laki', 'Islam', 'arikowirasetya@yahoo.co.id', 'Jl.Setu Indah V no.13', '081285664990', 36, 'Lanny Hariastika', '02129065461', '20082020_200821_(3)3.jpg', 'arikowira', 'arikowira'),
(17, '0001212412', 'Afifah', 'Depok', '2021-08-05', 'Perempuan', '', 'afifah@gmail.com', 'Jl. Merdeka Selatan', '08213432123', 36, 'Suprapmi', '02129065461', '20082020_200821_(2)4.jpg', 'afifah', 'afifah'),
(19, '0002342234', 'Budi', 'Medan', '2021-08-01', 'Laki-laki', '', 'budi@gmail.com', 'Jl.Setu Indah Raya', '08213432123', 13, 'diaa', '0212937729', 'Screenshot_2020-05-22-03-27-33-1.png', '', ''),
(20, '0002349876', 'Aldy', 'Jakarta', '2021-08-26', 'Laki-laki', '', 'aldy@gmail.com', 'Jl.Setu Indah IV no.15', '08213432123', 13, 'a', '0212937729', 'photo_16512846663.jpg', '', ''),
(21, '0001241124', 'Farhan', 'Jakarta', '2021-08-28', 'Laki-laki', '', 'farhan@gmail.com', 'Jl.Setu Indah XV no.16', '08213432123', 13, 'b', '02129065461', 'Pic11.png', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id_presensi` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `jumlah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_presensi`
--

INSERT INTO `tb_presensi` (`id_presensi`, `nisn`, `tahun_akademik`, `semester`, `keterangan`, `jumlah`) VALUES
(1, '0002342234', '2020/2021', 'Genap', 'Izin', '3'),
(2, '0002342234', '2020/2021', 'Genap', 'Sakit', '4'),
(6, '0002342234', '2020/2021', 'Genap', 'Tanpa keterangan', '10'),
(7, '0002342234', '2020/2021', 'Genap', 'Sakit', '11'),
(8, '0001212412', '2020/2021', 'Genap', 'Sakit', '1'),
(12, '0008807186', '2020/2021', 'Genap', 'Sakit', '5'),
(14, '0001212412', '2020/2021', 'Ganjil', 'Tanpa keterangan', '1'),
(15, '0002349876', '2020/2021', 'Genap', 'Sakit', '1'),
(16, '0001212412', '2020/2021', 'Ganjil', 'Izin', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahunakademik`
--

CREATE TABLE `tb_tahunakademik` (
  `id_tahunakademik` int(11) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tahunakademik`
--

INSERT INTO `tb_tahunakademik` (`id_tahunakademik`, `tahun_akademik`, `semester`, `status`) VALUES
(29, '2020/2021', 'Genap', 'Aktif'),
(30, '2020/2021', 'Ganjil', 'Tidak Aktif'),
(31, '2015/2016', 'Ganjil', 'Tidak Aktif'),
(32, '2015/2016', 'Genap', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tingkat`
--

CREATE TABLE `tb_tingkat` (
  `id_tingkat` int(11) NOT NULL,
  `kode_tingkat` varchar(2) NOT NULL,
  `tingkat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tingkat`
--

INSERT INTO `tb_tingkat` (`id_tingkat`, `kode_tingkat`, `tingkat`) VALUES
(1, '10', 'X'),
(2, '11', 'XI'),
(3, '12', 'XII');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_catatan`
--
ALTER TABLE `tb_catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_kelulusan`
--
ALTER TABLE `tb_kelulusan`
  ADD PRIMARY KEY (`id_kelulusan`);

--
-- Indeks untuk tabel `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  ADD PRIMARY KEY (`kode_matapelajaran`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tb_pesertadidik`
--
ALTER TABLE `tb_pesertadidik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indeks untuk tabel `tb_tahunakademik`
--
ALTER TABLE `tb_tahunakademik`
  ADD PRIMARY KEY (`id_tahunakademik`);

--
-- Indeks untuk tabel `tb_tingkat`
--
ALTER TABLE `tb_tingkat`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_catatan`
--
ALTER TABLE `tb_catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tb_kelulusan`
--
ALTER TABLE `tb_kelulusan`
  MODIFY `id_kelulusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `tb_pesertadidik`
--
ALTER TABLE `tb_pesertadidik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_tahunakademik`
--
ALTER TABLE `tb_tahunakademik`
  MODIFY `id_tahunakademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tb_tingkat`
--
ALTER TABLE `tb_tingkat`
  MODIFY `id_tingkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
