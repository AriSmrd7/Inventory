-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2021 pada 17.40
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(5) NOT NULL,
  `kode_brg` varchar(10) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `harga` bigint(15) NOT NULL,
  `satuan_brg` varchar(20) NOT NULL,
  `stok_brg` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_brg`, `id_kategori`, `nama_brg`, `harga`, `satuan_brg`, `stok_brg`) VALUES
(5, 'BRG001', 5, 'Baju Muslim Albani', 120000, 'pcs', 100),
(6, 'BRG002', 8, 'Baju Koko', 700000, 'pcs', 10),
(7, 'BRG003', 8, 'Kemeja Panjang', 80000, 'pcs', 5),
(8, 'BRG004', 5, 'Kerudung Segitiga', 18000, 'pcs', 63),
(9, 'BRG005', 9, 'Kalung', 50000, 'pcs', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distribusi`
--

CREATE TABLE `distribusi` (
  `id_distribusi` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `jumlah` int(7) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `distribusi`
--

INSERT INTO `distribusi` (`id_distribusi`, `id_barang`, `jumlah`, `tanggal`) VALUES
(4, 5, 24, '26-07-2020'),
(5, 8, 7, '26-07-2020'),
(6, 8, 7, '26-07-2020');

--
-- Trigger `distribusi`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `distribusi` FOR EACH ROW UPDATE barang SET stok_brg = stok_brg - NEW.jumlah WHERE id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama` char(30) NOT NULL,
  `status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `status`) VALUES
(5, 'Pakaian Wanita', 'Aktif'),
(6, 'Perlengkapan Sholat', 'Aktif'),
(7, 'Makanan', 'Nonaktif'),
(8, 'Pakaian Pria', 'Aktif'),
(9, 'Aksesoris', 'Aktif'),
(10, 'Minuman', 'Nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` int(5) NOT NULL,
  `id_supplier` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `id_supplier`, `id_barang`, `jumlah`, `tanggal`) VALUES
(5, 3, 5, 100, '26-07-2020'),
(6, 5, 7, 5, '26-07-2020'),
(7, 4, 8, 77, '26-07-2020'),
(8, 5, 6, 10, '01-09-2021');

--
-- Trigger `pengadaan`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `pengadaan` FOR EACH ROW UPDATE barang SET stok_brg = stok_brg + NEW.jumlah WHERE id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(5) NOT NULL,
  `nama` char(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `telepon`) VALUES
(3, 'PT Albani', 'Jln, Sumbawa, No 21, Sumedang, Jawa Barat', '085863727216'),
(4, 'PT Kerudung Sakti', 'Jln. Asia Afrika No 219, Bandung, Jawa Barat', '085667216789'),
(5, 'PT Baju Murah', 'Jln. Sangkuriang No 73, Bandung, Jawa Barat', '085667216888'),
(6, 'PT IndoDrink', 'Jln. Merapi No 190B, Bekasi, Jawa Barat', '085863727999');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama`) VALUES
(1, 'admin@admin.com', 'admin', 'Ari Sumardi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id_distribusi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id_distribusi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id_pengadaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `distribusi`
--
ALTER TABLE `distribusi`
  ADD CONSTRAINT `distribusi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `pengadaan_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE NO ACTION,
  ADD CONSTRAINT `pengadaan_ibfk_4` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
