-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Jun 2021 pada 12.46
-- Versi server: 10.3.29-MariaDB-cll-lve
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smp1qualbahjah1_eraport2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `c_admin` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`c_admin`, `nama`, `username`, `password`) VALUES
('fikri', 'Administrator', 'fikri', '21232f297a57a5a743894a0e4a801fc3'),
('rino', 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('veno', 'Administrator', 'admin', '14/iKXDMbEvfw');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id` int(2) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `kepsek` varchar(30) NOT NULL,
  `nipkepsek` varchar(30) NOT NULL,
  `namasek` varchar(60) NOT NULL,
  `logo` text NOT NULL,
  `dibagi` varchar(5) NOT NULL,
  `berapa` int(11) NOT NULL,
  `hapsetaktif` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aplikasi`
--

INSERT INTO `aplikasi` (`id`, `alamat`, `kepsek`, `nipkepsek`, `namasek`, `logo`, `dibagi`, `berapa`, `hapsetaktif`) VALUES
(1, 'Jalan Pangeran Cakrabuana No. ', 'Fikri Rizky Pratama, S.Pd', '-', 'SMP ISLAM QURANI AL BAHJAH', 'media/logo/', 'NO', 4, 'NO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspekket`
--

CREATE TABLE `aspekket` (
  `c_aspekket` int(11) NOT NULL,
  `ket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aspekket`
--

INSERT INTO `aspekket` (`c_aspekket`, `ket`) VALUES
(1, 'Keterampilan 1'),
(2, 'Keterampilan 2'),
(3, 'Keterampilan 3'),
(4, 'Keterampilan 4'),
(5, 'Keterampilan 5'),
(6, 'Keterampilan 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspeksikap`
--

CREATE TABLE `aspeksikap` (
  `c_aspeksikap` int(11) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `ket` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aspeksikap`
--

INSERT INTO `aspeksikap` (`c_aspeksikap`, `c_kelas`, `ket`) VALUES
(1, '56f14', 'Aspek Sikap 1'),
(2, '56f14', 'Aspek Sikap 2'),
(3, '56f14', 'Aspek Sikap 3'),
(4, '56f14', 'Aspek Sikap 4'),
(5, '56f14', 'Aspek Sikap 5'),
(6, '56f14', 'Aspek Sikap 6'),
(7, '56f14', 'Aspek Sikap 7'),
(10, '56f14', 'Aspek Sikap 10'),
(11, 'NYGh3F2AD', 'Bertanggung Jawab'),
(12, 'NYGh3F2AD', 'Menerima Tugas Dengan Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspektug`
--

CREATE TABLE `aspektug` (
  `c_aspektug` int(11) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aspektug`
--

INSERT INTO `aspektug` (`c_aspektug`, `ket`) VALUES
(1, 'TUGAS 1'),
(2, 'TUGAS 2'),
(3, 'TUGAS 3'),
(4, 'TUGAS 4'),
(5, 'TUGAS 5'),
(6, 'TUGAS 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspekuh`
--

CREATE TABLE `aspekuh` (
  `c_aspekuh` int(11) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aspekuh`
--

INSERT INTO `aspekuh` (`c_aspekuh`, `ket`) VALUES
(1, 'UH 1'),
(2, 'UH 2'),
(3, 'UH 3'),
(4, 'UH 4'),
(5, 'UH 5'),
(6, 'UH 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspek_fisik`
--

CREATE TABLE `aspek_fisik` (
  `c_aspek_fisik` int(11) NOT NULL,
  `c_ta` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `penglihatan` varchar(50) NOT NULL,
  `pendengaran` varchar(50) NOT NULL,
  `gigi` varchar(50) NOT NULL,
  `lainnya` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aspek_fisik`
--

INSERT INTO `aspek_fisik` (`c_aspek_fisik`, `c_ta`, `c_siswa`, `c_kelas`, `penglihatan`, `pendengaran`, `gigi`, `lainnya`) VALUES
(1, 'lqs5UNv1B', 'y2nolIaDO', 'VluX9dpWt', 'Baik', 'Baik', 'Baik', 'Baik'),
(2, 'lqs5UNv1B', 'JfErVoiYa', 'VluX9dpWt', 'Baik', 'Baik', 'Baik', 'Baik'),
(3, 'lqs5UNv1B', 'lsIP2fUhb', 'VluX9dpWt', 'Baik', 'Baik', 'Baik', 'Baik');


-- --------------------------------------------------------

--
-- Struktur dari tabel `backup`
--

CREATE TABLE `backup` (
  `c_backup` int(11) NOT NULL,
  `at` datetime NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `backup`
--

INSERT INTO `backup` (`c_backup`, `at`, `file`) VALUES
(1, '2021-06-22 08:32:50', 'backup_db_eraport-22-06-2021-08-32-50-.sql');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berattinggi`
--

CREATE TABLE `berattinggi` (
  `c_berattinggi` int(11) NOT NULL,
  `c_ta` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `berats1` varchar(3) NOT NULL,
  `tinggis1` varchar(3) NOT NULL,
  `berats2` varchar(3) NOT NULL,
  `tinggis2` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deskripsi_rapot`
--

CREATE TABLE `deskripsi_rapot` (
  `c_deskripsi` int(11) NOT NULL,
  `c_ta` varchar(10) NOT NULL,
  `des_peng` text NOT NULL,
  `des_ket` text NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `deskripsi_rapot`
--

INSERT INTO `deskripsi_rapot` (`c_deskripsi`, `c_ta`, `des_peng`, `des_ket`, `c_kelas`, `c_mapel`, `c_siswa`) VALUES
(1, 'YGeEUxyYK', 'Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek', 'Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat', 'PAUKsCNOz', 'ratPgIl4V', 'wCnrCBr8S'),
(2, 'YGeEUxyYK', 'Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek', 'Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat', 'PAUKsCNOz', 'ratPgIl4V', 'dhn7U9dlp');


-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaiket`
--

CREATE TABLE `nilaiket` (
  `c_nilaiket` int(11) NOT NULL,
  `c_ta` varchar(10) NOT NULL,
  `c_aspekket` int(11) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `nilai` int(5) NOT NULL,
  `at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilaiket`
--

INSERT INTO `nilaiket` (`c_nilaiket`, `c_ta`, `c_aspekket`, `c_siswa`, `c_kelas`, `c_mapel`, `nilai`, `at`) VALUES
(1, 'lqs5UNv1B', 1, 'wXwpylURw', 'AYMyV1d0W', 'eGM8uWq8t', 89, '2020-12-29'),
(2, 'lqs5UNv1B', 1, 'GFtm1G65q', 'AYMyV1d0W', 'eGM8uWq8t', 96, '2020-12-29');


-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaimd`
--

CREATE TABLE `nilaimd` (
  `id_nilaimd` int(11) NOT NULL,
  `c_ta` varchar(10) DEFAULT NULL,
  `c_siswa` varchar(10) DEFAULT NULL,
  `c_kelas` varchar(10) DEFAULT NULL,
  `id_mapelmd` varchar(10) DEFAULT NULL,
  `nilai` int(5) DEFAULT NULL,
  `at` date DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilaimd`
--

INSERT INTO `nilaimd` (`id_nilaimd`, `c_ta`, `c_siswa`, `c_kelas`, `id_mapelmd`, `nilai`, `at`, `deskripsi`) VALUES
(1, 'YGeEUxyYK', 'dhn7U9dlp', 'PAUKsCNOz', '1', 90, '2020-10-24', 'Sangat baik anak ini'),
(2, 'YGeEUxyYK', 'XzYAeyimw', 'PAUKsCNOz', '1', 100, '2020-10-24', 'Oke');


-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaimid`
--

CREATE TABLE `nilaimid` (
  `c_nilaimid` int(11) NOT NULL,
  `c_ta` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `nilai` int(5) NOT NULL,
  `at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilaimid`
--

INSERT INTO `nilaimid` (`c_nilaimid`, `c_ta`, `c_siswa`, `c_kelas`, `c_mapel`, `nilai`, `at`) VALUES
(1, 'lqs5UNv1B', 'wXwpylURw', 'AYMyV1d0W', 'eGM8uWq8t', 88, '2020-12-29'),
(2, 'lqs5UNv1B', 'GFtm1G65q', 'AYMyV1d0W', 'eGM8uWq8t', 95, '2020-12-29');


-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaisikap`
--

CREATE TABLE `nilaisikap` (
  `c_nilaisikap` int(11) NOT NULL,
  `c_ta` varchar(10) NOT NULL,
  `c_aspeksikap` int(11) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `nilai` int(5) NOT NULL,
  `at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaitq`
--

CREATE TABLE `nilaitq` (
  `id_nilaitq` int(11) NOT NULL,
  `c_ta` varchar(10) DEFAULT NULL,
  `c_siswa` varchar(10) DEFAULT NULL,
  `c_kelas` varchar(10) DEFAULT NULL,
  `id_mapeltq` varchar(10) DEFAULT NULL,
  `at` date DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `juz` varchar(100) DEFAULT NULL,
  `surat` varchar(100) DEFAULT NULL,
  `ayat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilaitq`
--

INSERT INTO `nilaitq` (`id_nilaitq`, `c_ta`, `c_siswa`, `c_kelas`, `id_mapeltq`, `at`, `deskripsi`, `juz`, `surat`, `ayat`) VALUES
(1, 'YGeEUxyYK', 'wCnrCBr8S', 'PAUKsCNOz', '2', '2020-10-24', 'Bagus bacaanya', '5', 'An-Nahl', '5'),
(2, 'YGeEUxyYK', 'VSt02629P', 'PAUKsCNOz', '2', '2020-10-24', 'Siap', '5', 'An-Nahl', '10');


-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaitugas`
--

CREATE TABLE `nilaitugas` (
  `c_nilaitugas` int(11) NOT NULL,
  `c_ta` varchar(10) NOT NULL,
  `c_aspektug` int(11) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `nilai` int(5) NOT NULL,
  `at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilaitugas`
--

INSERT INTO `nilaitugas` (`c_nilaitugas`, `c_ta`, `c_aspektug`, `c_siswa`, `c_kelas`, `c_mapel`, `nilai`, `at`) VALUES
(1, 'lqs5UNv1B', 1, 'wXwpylURw', 'AYMyV1d0W', 'eGM8uWq8t', 90, '2020-12-29'),
(2, 'lqs5UNv1B', 1, 'GFtm1G65q', 'AYMyV1d0W', 'eGM8uWq8t', 97, '2020-12-29');


-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaiuas`
--

CREATE TABLE `nilaiuas` (
  `c_nilaiuas` int(11) NOT NULL,
  `c_ta` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `nilai` int(5) NOT NULL,
  `at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilaiuas`
--

INSERT INTO `nilaiuas` (`c_nilaiuas`, `c_ta`, `c_siswa`, `c_kelas`, `c_mapel`, `nilai`, `at`) VALUES
(1, 'lqs5UNv1B', 'NHFZlFB2V', 'voaaw0eSY', 'eGM8uWq8t', 93, '2020-12-28'),
(2, 'lqs5UNv1B', 'rO5DMXwqE', 'voaaw0eSY', 'eGM8uWq8t', 75, '2020-12-28');


-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaiuh`
--

CREATE TABLE `nilaiuh` (
  `c_nilaiuh` int(11) NOT NULL,
  `c_ta` varchar(10) NOT NULL,
  `c_aspekuh` int(11) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `nilai` int(5) NOT NULL,
  `at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilaiuh`
--

INSERT INTO `nilaiuh` (`c_nilaiuh`, `c_ta`, `c_aspekuh`, `c_siswa`, `c_kelas`, `c_mapel`, `nilai`, `at`) VALUES
(1, 'lqs5UNv1B', 1, 'wXwpylURw', 'AYMyV1d0W', 'eGM8uWq8t', 89, '2020-12-29'),
(2, 'lqs5UNv1B', 1, 'GFtm1G65q', 'AYMyV1d0W', 'eGM8uWq8t', 96, '2020-12-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkl`
--

CREATE TABLE `pkl` (
  `c_pkl` int(11) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `mitradudi` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `lama` int(11) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pkl`
--

INSERT INTO `pkl` (`c_pkl`, `c_siswa`, `mitradudi`, `lokasi`, `lama`, `ket`) VALUES
(1, 'lYEQ2FfF8', 'Kantor Kecamatan', 'Baron', 2, 'Baik'),
(3, 'lYEQ2FfF8', 'Kominfo Jawa Timur', 'Baron', 2, 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `c_prestasi` int(11) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_extra` varchar(10) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`c_prestasi`, `c_siswa`, `c_extra`, `ket`) VALUES
(1, 'wCnrCBr8S', '4u9uxDxsi', 'Juara 1 Se Kabupaten'),
(2, 'lYEQ2FfF8', 'HratPgIl4', 'Juara 1 Se Kabupaten'),
(3, 'lYEQ2FfF8', '7y1X9UuX6', 'Juara 3'),
(10, '7XHtNO5C9', 'ELvSju4yI', 'BAIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapotsiswa`
--

CREATE TABLE `rapotsiswa` (
  `c_rapotsiswa` int(11) NOT NULL,
  `c_ta` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `s` int(3) NOT NULL,
  `i` int(3) NOT NULL,
  `a` int(3) NOT NULL,
  `catatan` text NOT NULL,
  `kelakuan` varchar(10) NOT NULL,
  `kerajinan` varchar(10) NOT NULL,
  `kerapian` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rapotsiswa`
--

INSERT INTO `rapotsiswa` (`c_rapotsiswa`, `c_ta`, `c_kelas`, `c_siswa`, `s`, `i`, `a`, `catatan`, `kelakuan`, `kerajinan`, `kerapian`) VALUES
(1, 'lqs5UNv1B', 'wjhiseJjy', '2CYS6k6i1', 0, 0, 0, 'Tingatkan terus semangat dalam belajar baik itu pelajaran umum, diniyyah ataupun tahfidz, berikan kemampuan yang terbaik pada setiap aspek yang ada dan hadirkan motivasi diri untuk terus aktif dan produktif dalam menjalankan bimbingan dari para ustadz tidak lupa disertai iringan nasihat penyemangat dan doa dari orang tua.', 'Baik', 'Baik', 'Baik'),
(2, 'lqs5UNv1B', 'NJWMsxwO6', '8szAraDeo', 1, 0, 0, 'lebih dimotivasi lagi agar santri khususnya akhdiat agar lebih semngat, dan dalam keseharian alhamdulillah akhdiat baik dan bisa mengikuti kegiatan di sekolah dan di boarding', 'Baik', 'Baik', 'Baik');


-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `c_siswa` varchar(10) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `temlahir` varchar(20) NOT NULL,
  `tanglahir` date NOT NULL,
  `jk` varchar(2) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `foto_siswa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`c_siswa`, `nisn`, `nama`, `temlahir`, `tanglahir`, `jk`, `c_kelas`, `foto_siswa`) VALUES
('0a8l2dW1o', '0079146025', 'Talitha Tndy Bako', 'Bogor', '2007-10-07', 'P', 'f6Xj7h96a', 'media/fotosiswa/1609292430.'),
('0AP0uizjL', '0071279181', 'Kholilulrahman', 'Bekasi', '2007-12-28', 'L', 'fBZ5xnIk6', 'media/fotosiswa/1610723864.');


-- --------------------------------------------------------

--
-- Struktur dari tabel `tahunakademik`
--

CREATE TABLE `tahunakademik` (
  `c_ta` varchar(10) NOT NULL,
  `tahun` varchar(15) NOT NULL,
  `semester` varchar(12) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahunakademik`
--

INSERT INTO `tahunakademik` (`c_ta`, `tahun`, `semester`, `status`) VALUES
('6ARym1eC6', '2016/2017', '2', ''),
('fFzum9siq', '2020/2021', '2', 'aktif'),
('FJKbpALlk', '2017/2018', '1', ''),
('jDK0ouMR4', '2016/2017', '1', ''),
('lqs5UNv1B', '2020/2021', '1', ''),
('WzpoCjGl1', '2017/2018', '2', ''),
('YGeEUxyYK', '2018/2019', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipekognitif`
--

CREATE TABLE `tipekognitif` (
  `c_tipekognitif` int(11) NOT NULL,
  `kognitif` varchar(10) NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `persen` int(11) NOT NULL,
  `ket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipekognitif`
--

INSERT INTO `tipekognitif` (`c_tipekognitif`, `kognitif`, `tipe`, `persen`, `ket`) VALUES
(1, 'uh', 'persen', 35, 'ULANGAN HARIAN'),
(2, 'tugas', 'persen', 35, 'TUGAS'),
(3, 'mid', 'persen', 15, 'MID SEMESTER'),
(4, 'uas', 'persen', 15, 'ULANGAN AKHIR SEMESTER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `walikelas`
--

CREATE TABLE `walikelas` (
  `c_walikelas` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `c_guru` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `ttdwalikelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `walikelas`
--

INSERT INTO `walikelas` (`c_walikelas`, `username`, `password`, `c_guru`, `c_kelas`, `ttdwalikelas`) VALUES
('09vbS17zO', 'arifrahman', '12345678', 'nuhuUY0OW', 'wjhiseJjy', 'ttdwalikelas7.png'),
('3ItVjBR3h', 'intan9c', '12345678', 'tE3KZIiH4', 'voaaw0eSY', 'ttdwalikelasC.png'),


-- --------------------------------------------------------

--
-- Struktur dari tabel `walimurid`
--

CREATE TABLE `walimurid` (
  `c_walimurid` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `walimurid`
--

INSERT INTO `walimurid` (`c_walimurid`, `c_siswa`, `nama`, `username`, `password`) VALUES
('02v9x0HUt', 'zZ9HLvCgc', 'Ade Handayani', 'adehan', 'adehan7f'),
('07aSwRlSD', '3Ygu5mWGm', 'Subandi', 'Subandi', 'subandi7e');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`c_admin`);

--
-- Indeks untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aspekket`
--
ALTER TABLE `aspekket`
  ADD PRIMARY KEY (`c_aspekket`);

--
-- Indeks untuk tabel `aspeksikap`
--
ALTER TABLE `aspeksikap`
  ADD PRIMARY KEY (`c_aspeksikap`);

--
-- Indeks untuk tabel `aspektug`
--
ALTER TABLE `aspektug`
  ADD PRIMARY KEY (`c_aspektug`);

--
-- Indeks untuk tabel `aspekuh`
--
ALTER TABLE `aspekuh`
  ADD PRIMARY KEY (`c_aspekuh`);

--
-- Indeks untuk tabel `aspek_fisik`
--
ALTER TABLE `aspek_fisik`
  ADD PRIMARY KEY (`c_aspek_fisik`);

--
-- Indeks untuk tabel `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`c_backup`);

--
-- Indeks untuk tabel `berattinggi`
--
ALTER TABLE `berattinggi`
  ADD PRIMARY KEY (`c_berattinggi`);

--
-- Indeks untuk tabel `deskripsi_rapot`
--
ALTER TABLE `deskripsi_rapot`
  ADD PRIMARY KEY (`c_deskripsi`);

--
-- Indeks untuk tabel `deskripsi_sikap`
--
ALTER TABLE `deskripsi_sikap`
  ADD PRIMARY KEY (`c_deskripsi`);

--
-- Indeks untuk tabel `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`c_extra`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`c_guru`);

--
-- Indeks untuk tabel `gurumapel`
--
ALTER TABLE `gurumapel`
  ADD PRIMARY KEY (`c_gurumapel`);

--
-- Indeks untuk tabel `jumlahnilra`
--
ALTER TABLE `jumlahnilra`
  ADD PRIMARY KEY (`c_jumlahnilra`);

--
-- Indeks untuk tabel `kategori_mapel`
--
ALTER TABLE `kategori_mapel`
  ADD PRIMARY KEY (`c_katmapel`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`c_kelas`);

--
-- Indeks untuk tabel `kompetensi_sikap`
--
ALTER TABLE `kompetensi_sikap`
  ADD PRIMARY KEY (`c_kompetensi_sikap`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`c_mapel`);

--
-- Indeks untuk tabel `mapelmd`
--
ALTER TABLE `mapelmd`
  ADD PRIMARY KEY (`id_mapelmd`);

--
-- Indeks untuk tabel `mapelmd_kelas`
--
ALTER TABLE `mapelmd_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapeltq`
--
ALTER TABLE `mapeltq`
  ADD PRIMARY KEY (`id_mapeltq`);

--
-- Indeks untuk tabel `mapeltq_kelas`
--
ALTER TABLE `mapeltq_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD PRIMARY KEY (`c_mapelkelas`);

--
-- Indeks untuk tabel `nilaiextra`
--
ALTER TABLE `nilaiextra`
  ADD PRIMARY KEY (`c_nilaiextra`);

--
-- Indeks untuk tabel `nilaiket`
--
ALTER TABLE `nilaiket`
  ADD PRIMARY KEY (`c_nilaiket`);

--
-- Indeks untuk tabel `nilaimd`
--
ALTER TABLE `nilaimd`
  ADD PRIMARY KEY (`id_nilaimd`);

--
-- Indeks untuk tabel `nilaimid`
--
ALTER TABLE `nilaimid`
  ADD PRIMARY KEY (`c_nilaimid`);

--
-- Indeks untuk tabel `nilaisikap`
--
ALTER TABLE `nilaisikap`
  ADD PRIMARY KEY (`c_nilaisikap`);

--
-- Indeks untuk tabel `nilaitq`
--
ALTER TABLE `nilaitq`
  ADD PRIMARY KEY (`id_nilaitq`);

--
-- Indeks untuk tabel `nilaitugas`
--
ALTER TABLE `nilaitugas`
  ADD PRIMARY KEY (`c_nilaitugas`);

--
-- Indeks untuk tabel `nilaiuas`
--
ALTER TABLE `nilaiuas`
  ADD PRIMARY KEY (`c_nilaiuas`);

--
-- Indeks untuk tabel `nilaiuh`
--
ALTER TABLE `nilaiuh`
  ADD PRIMARY KEY (`c_nilaiuh`);

--
-- Indeks untuk tabel `pkl`
--
ALTER TABLE `pkl`
  ADD PRIMARY KEY (`c_pkl`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`c_prestasi`);

--
-- Indeks untuk tabel `rapotsiswa`
--
ALTER TABLE `rapotsiswa`
  ADD PRIMARY KEY (`c_rapotsiswa`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`c_siswa`);

--
-- Indeks untuk tabel `tahunakademik`
--
ALTER TABLE `tahunakademik`
  ADD PRIMARY KEY (`c_ta`);

--
-- Indeks untuk tabel `tipekognitif`
--
ALTER TABLE `tipekognitif`
  ADD PRIMARY KEY (`c_tipekognitif`);

--
-- Indeks untuk tabel `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`c_walikelas`);

--
-- Indeks untuk tabel `walimurid`
--
ALTER TABLE `walimurid`
  ADD PRIMARY KEY (`c_walimurid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aspekket`
--
ALTER TABLE `aspekket`
  MODIFY `c_aspekket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `aspeksikap`
--
ALTER TABLE `aspeksikap`
  MODIFY `c_aspeksikap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `aspektug`
--
ALTER TABLE `aspektug`
  MODIFY `c_aspektug` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `aspekuh`
--
ALTER TABLE `aspekuh`
  MODIFY `c_aspekuh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `aspek_fisik`
--
ALTER TABLE `aspek_fisik`
  MODIFY `c_aspek_fisik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `backup`
--
ALTER TABLE `backup`
  MODIFY `c_backup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berattinggi`
--
ALTER TABLE `berattinggi`
  MODIFY `c_berattinggi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `deskripsi_rapot`
--
ALTER TABLE `deskripsi_rapot`
  MODIFY `c_deskripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9419;

--
-- AUTO_INCREMENT untuk tabel `deskripsi_sikap`
--
ALTER TABLE `deskripsi_sikap`
  MODIFY `c_deskripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT untuk tabel `jumlahnilra`
--
ALTER TABLE `jumlahnilra`
  MODIFY `c_jumlahnilra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;

--
-- AUTO_INCREMENT untuk tabel `kategori_mapel`
--
ALTER TABLE `kategori_mapel`
  MODIFY `c_katmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kompetensi_sikap`
--
ALTER TABLE `kompetensi_sikap`
  MODIFY `c_kompetensi_sikap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1370;

--
-- AUTO_INCREMENT untuk tabel `mapelmd`
--
ALTER TABLE `mapelmd`
  MODIFY `id_mapelmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mapelmd_kelas`
--
ALTER TABLE `mapelmd_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT untuk tabel `mapeltq`
--
ALTER TABLE `mapeltq`
  MODIFY `id_mapeltq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mapeltq_kelas`
--
ALTER TABLE `mapeltq_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  MODIFY `c_mapelkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=711;

--
-- AUTO_INCREMENT untuk tabel `nilaiextra`
--
ALTER TABLE `nilaiextra`
  MODIFY `c_nilaiextra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=717;

--
-- AUTO_INCREMENT untuk tabel `nilaiket`
--
ALTER TABLE `nilaiket`
  MODIFY `c_nilaiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25583;

--
-- AUTO_INCREMENT untuk tabel `nilaimd`
--
ALTER TABLE `nilaimd`
  MODIFY `id_nilaimd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4088;

--
-- AUTO_INCREMENT untuk tabel `nilaimid`
--
ALTER TABLE `nilaimid`
  MODIFY `c_nilaimid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9350;

--
-- AUTO_INCREMENT untuk tabel `nilaisikap`
--
ALTER TABLE `nilaisikap`
  MODIFY `c_nilaisikap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilaitq`
--
ALTER TABLE `nilaitq`
  MODIFY `id_nilaitq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1557;

--
-- AUTO_INCREMENT untuk tabel `nilaitugas`
--
ALTER TABLE `nilaitugas`
  MODIFY `c_nilaitugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24825;

--
-- AUTO_INCREMENT untuk tabel `nilaiuas`
--
ALTER TABLE `nilaiuas`
  MODIFY `c_nilaiuas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9391;

--
-- AUTO_INCREMENT untuk tabel `nilaiuh`
--
ALTER TABLE `nilaiuh`
  MODIFY `c_nilaiuh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25013;

--
-- AUTO_INCREMENT untuk tabel `pkl`
--
ALTER TABLE `pkl`
  MODIFY `c_pkl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `c_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `rapotsiswa`
--
ALTER TABLE `rapotsiswa`
  MODIFY `c_rapotsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;

--
-- AUTO_INCREMENT untuk tabel `tipekognitif`
--
ALTER TABLE `tipekognitif`
  MODIFY `c_tipekognitif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
