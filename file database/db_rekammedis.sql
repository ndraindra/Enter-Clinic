-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2019 pada 06.35
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rekammedis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id_jadwal` int(5) NOT NULL,
  `kodedokter` varchar(50) NOT NULL,
  `namadokter` varchar(60) NOT NULL,
  `waktu` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id_jadwal`, `kodedokter`, `namadokter`, `waktu`, `foto`) VALUES
(1, 'DK-342715841', 'Drg. Bambang Mulyono', 'Senin (10.00-12.00) WIB\r\nRabu (13.00-15.00) WIB\r\nSabtu  (15.00-19.00) WIB', 'dokter1.jpeg'),
(2, 'DK-232915463', 'Dr. Ilham Nasution', 'Senin (12.30 - 15.30) WIB\r\nSelasa (07.30 - 12.30) WIB\r\nKamis (08.00 - 12.00) WIB', 'dokter2.jpg'),
(3, 'DK-452915317', 'Dr. Ningsih Hasibuan', 'Rabu (08.00-12.00) WIB\r\nJumat (08.00-15.00) WIB\r\nSabtu  (09.00-13.00) WIB ', 'dokter3.jpg'),
(6, 'DK-252915666', 'Dr. Joko Sulistiono', 'Senin (08.00-12.00) WIB\r\nJumat (08.00-15.00) WIB\r\nSabtu  (09.00-13.00) WIB ', 'dokter4.jpg'),
(7, 'DK-452915253', 'Dr. Jaka Siregar', 'Senin (12.30 - 15.30) WIB\r\nSelasa (12.30 - 15.30) WIB\r\nSabtu (12.30 - 15.30) WIB', 'dokter5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekammedik`
--

CREATE TABLE `rekammedik` (
  `id_rm` int(5) NOT NULL,
  `nomorRm` varchar(50) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `kodedokter` varchar(50) NOT NULL,
  `keluhan` varchar(150) NOT NULL,
  `diagnosa` varchar(150) NOT NULL,
  `tindakan` varchar(50) NOT NULL,
  `id_rs` int(5) NOT NULL,
  `spesialis` int(5) NOT NULL,
  `id_penyakit` int(5) NOT NULL,
  `jam` varchar(150) NOT NULL,
  `tgl` varchar(150) NOT NULL,
  `kodeuser` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekammedik`
--

INSERT INTO `rekammedik` (`id_rm`, `nomorRm`, `nama_pasien`, `kodedokter`, `keluhan`, `diagnosa`, `tindakan`, `id_rs`, `spesialis`, `id_penyakit`, `jam`, `tgl`, `kodeuser`) VALUES
(22, 'RM-2606161', 'WNO-9525', 'DK-342715841', 'Sakit Perut', 'diare', '5', 0, 14, 18, '09:03:03', '2016-06-26', 'US-0908164'),
(23, 'RM0001', 'a', '', 'a', 'a', 'a', 0, 0, 0, '4:15 PM', '05-04-2019', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(11) NOT NULL,
  `kodeDokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(150) NOT NULL,
  `spesialis` varchar(150) NOT NULL,
  `jk` varchar(150) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `kodeDokter`, `nama_dokter`, `spesialis`, `jk`, `alamat`, `no_hp`, `status`, `foto`) VALUES
(35, 'DK-00001', 'Dr. Ilham Nasution', 'Jantung', 'Laki-Laki', 'Jl. Gaperta', '0852111225', 'Non-Aktif', 'dokter1.jpeg'),
(36, 'DK-00002', 'Dr. Joko Sulistiono', 'Otak', 'Laki-Laki', 'Jl. Brikjen Katamso Gg. Markisa', '08541152254', 'Aktif', 'dokter2.jpg'),
(37, 'DK-00003', 'Dr. Ningsih Hasibuan', 'Kandungan', 'Perempuan', 'Jl. Bromo Ujung No. 255', '085112212121', 'Aktif', 'dokter3.jpg'),
(38, 'DK-00004', 'Dr. Jaka Siregar', 'Paru - Paru', 'Laki-Laki', 'Jl. Sisingamangaraja No. 432', '083158585411', 'Aktif', 'dokter4.jpg'),
(39, 'DK-00005', 'Dr. Zulkifli', 'Bedah', 'Laki-Laki', 'Jl. Seksama', '08212122121', 'Aktif', 'dokter5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konsultasi`
--

CREATE TABLE `tb_konsultasi` (
  `id_konsultasi` int(5) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `keluhan` varchar(150) NOT NULL,
  `diagnosis` varchar(150) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `tgl_konsultasi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_konsultasi`
--

INSERT INTO `tb_konsultasi` (`id_konsultasi`, `nama_pasien`, `keluhan`, `diagnosis`, `jam`, `tgl_konsultasi`) VALUES
(8, 'Rohman Al Ghozali', 'Sakit Kepala', 'Demam tifoid dan paratifoid', '1:00 AM', '02-07-2019'),
(9, 'Shinta Nurmala', 'Sesak Nafas', 'Asma', '1:00 AM', '01-07-2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(150) NOT NULL,
  `jmlh_obat` varchar(15) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `jmlh_obat`, `satuan`, `detail`, `tanggal`) VALUES
(1, 'Paramex', '100', '-', '-', '2019-07-01'),
(2, 'Panadol', '50', '-', '-', '2019-06-11'),
(3, 'Bodrex Extra', '200', '-', '-', '2019-07-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(10) NOT NULL,
  `kode_pasien` varchar(50) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `umur` varchar(4) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_daf` varchar(50) NOT NULL,
  `jam_daf` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `kode_pasien`, `nama_pasien`, `umur`, `jk`, `alamat`, `no_hp`, `tgl_daf`, `jam_daf`, `status`, `foto`) VALUES
(19, 'P00001', 'Rohman Al Ghozali', '55', 'Laki-Laki', 'Jl. Dji Sam Soe No.21', '08871884526', '12/05/2019', '5:45 AM', 'nonaktif', 'pasien1.jpg'),
(20, 'P-00002', 'Shinta Nurmala', '27', 'Laki-Laki', 'Jl. Merpati Putih No. 44', '0895803278324', '09/04/2019', '10:46 AM', 'aktif', 'pasien2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_pegawai` varchar(300) NOT NULL,
  `unit` varchar(150) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_lhr` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `unit`, `jk`, `alamat`, `no_hp`, `tgl_lhr`, `status`, `foto`) VALUES
(1, '151112394176812858', 'Yunita Kusmawati', 'Direksi', 'Perempuan', 'Jl. Tut Wuri Handayani No.44', '08958032878324', '13/01/1997', 'Aktif', 'pegawai1.jpg'),
(2, '121313122768128584', 'Gunawan Rifaldi Lubis', 'Administasi', 'Laki-Laki', 'Jl. Letda Sujono', '08871884526', '25/05/1992', 'Aktif', 'pegawai2.jpg'),
(6, '123456768128583687', 'Ferdinan Santoso', 'Keuangan', 'Laki-Laki', 'Jl. Hayam Wuruk No.12', '08978910347', '17/08/1990', 'Non-Aktif', 'pegawai3.jpg'),
(11, '121213357681285831', 'Widia Fernanda', 'Apoteker', 'Perempuan', 'Jl. Flamboyan No. 255', '083468702451', '10/03/2015', 'Aktif', 'pegawai4.jpg'),
(13, '418191019476812858', 'Gina Maulida Sari', 'Sekertaris', 'Perempuan', 'Jl. Prof. Dr. Hamka', '08958032878324', '10/10/2000', 'Aktif', 'pegawai5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemeriksaan`
--

CREATE TABLE `tb_pemeriksaan` (
  `id_pemeriksaan` int(5) NOT NULL,
  `nama_pasien` varchar(150) NOT NULL,
  `diagnosis` varchar(150) NOT NULL,
  `spesialis` varchar(150) NOT NULL,
  `tindakan` varchar(150) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `tgl_pemeriksaan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pemeriksaan`
--

INSERT INTO `tb_pemeriksaan` (`id_pemeriksaan`, `nama_pasien`, `diagnosis`, `spesialis`, `tindakan`, `jam`, `tgl_pemeriksaan`) VALUES
(7, 'Rohman Al Ghozali', 'Asma', 'Dr. Jaka Siregar', 'Fisioterapi', '1:15 AM', '30-06-2019'),
(8, 'Shinta Nurmala', 'Paru-Paru', 'Dr. Zulkifli', 'Operasi Paru-Paru', '1:15 AM', '01-07-2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` int(5) NOT NULL,
  `kode_penyakit` varchar(15) NOT NULL,
  `nama_penyakit` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`) VALUES
(7, 'A01', 'Demam tifoid dan paratifoid'),
(8, 'A02', 'Infeksi Salmonella lainnya'),
(9, 'A03', 'Shigellosis'),
(10, 'A04', 'Infeksi bakterial usus lainya'),
(11, 'A05', 'Intoksikasi'),
(12, 'A06', 'Amubiasis'),
(13, 'A07', 'Penyakit-penyakit protozoal usus lainnya'),
(14, 'A08', 'Infeksi viral dan infeksi usus lainya'),
(15, 'A09', 'Diare dan gastroenteritis oleh penyebab infeksi tertentu'),
(16, 'A10', 'Asma'),
(17, 'A11', 'Anemia'),
(18, 'A12', 'Diabetes Melitu'),
(19, 'A13', 'Diare & Gastroe'),
(20, 'A14', 'Gangguan Ginjal'),
(21, 'A15', 'Gangguan Mata'),
(22, 'A16', 'Gigi & Mulut'),
(23, 'A17', 'Hiperpuricemia'),
(24, 'A18', '	 Tumor'),
(25, 'A19', 'Paru-Paru'),
(26, 'A20', 'Imsomnia'),
(27, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tindakan`
--

CREATE TABLE `tb_tindakan` (
  `id_tindakan` int(11) NOT NULL,
  `nm_tindakan` varchar(300) NOT NULL,
  `ket` text NOT NULL,
  `lap` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tindakan`
--

INSERT INTO `tb_tindakan` (`id_tindakan`, `nm_tindakan`, `ket`, `lap`) VALUES
(5, 'Konsultasi Dokter Spesialis', '-', 0),
(6, 'Pemeriksaan Laboratorium', '-', 1),
(7, 'Pemeriksaan Radiologi', '-', 1),
(8, 'Fisioterapi', '-', 1),
(9, 'Rawat Inap', '-', 0),
(11, 'Haemodialisa', '-', 1),
(52, 'Operasi Paru-Paru', '-', 0),
(55, 'Operasi Usus Buntu', '-', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `kode_user` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` varchar(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `kode_user`, `first_name`, `last_name`, `jk`, `alamat`, `no_hp`, `tgl_lahir`, `username`, `password`, `level`, `status`, `foto`) VALUES
(1, 'U-001', 'Indra', 'DwiYulianto', 'Laki-Laki', 'Tangerang', '08871884526', '22-09-1998', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Aktif', 'indra.jpg'),
(2, 'U-002', 'Erik', 'Stepiki Isa', 'Laki-Laki', 'Tangerang', '085726060558', '01-02-1997', '41816010011', 'e10adc3949ba59abbe56e057f20f883e', 'pegawai', 'Aktif', 'erik.jfif'),
(4, 'U-003', 'Wahyu', 'Eko Saputro', 'Laki-Laki', 'Tangerang', '0895803278324', '05-01-1998', '41816010023', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Aktif', 'wahyu.jpg'),
(16, 'U-004', 'Muhammad', 'Farqi Karak', 'Laki-Laki', 'Tangerang', '895803278324', '29-04-1997', '41816010018', 'e10adc3949ba59abbe56e057f20f883e', 'pegawai', 'Aktif', 'farqi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `rekammedik`
--
ALTER TABLE `rekammedik`
  ADD PRIMARY KEY (`id_rm`);

--
-- Indeks untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indeks untuk tabel `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `tb_tindakan`
--
ALTER TABLE `tb_tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rekammedik`
--
ALTER TABLE `rekammedik`
  MODIFY `id_rm` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  MODIFY `id_konsultasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  MODIFY `id_pemeriksaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id_penyakit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_tindakan`
--
ALTER TABLE `tb_tindakan`
  MODIFY `id_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
