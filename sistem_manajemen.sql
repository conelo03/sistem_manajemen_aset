-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2021 pada 05.07
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_manajemen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `asets`
--

CREATE TABLE `asets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_aset` enum('laboratorium','institusi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepemilikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tanggal_maintenance` date DEFAULT NULL,
  `waktu_maintenance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` enum('rusak','maintenance','baik') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `asets`
--

INSERT INTO `asets` (`id`, `nama_aset`, `jenis_aset`, `kepemilikan`, `lokasi`, `tanggal_pembelian`, `tanggal_maintenance`, `waktu_maintenance`, `kondisi`, `kode_aset`, `merk`) VALUES
(4, 'Printer', 'laboratorium', 'pribadi', 'Subang', '2021-07-18', '2021-07-24', '1 minggu', 'maintenance', '1234567890', 'Epson'),
(10, 'Komputer', 'institusi', 'kepemilikan', 'lokasi', '2021-07-21', '2021-07-24', '1 minggu', 'rusak', 'T420', 'ROG'),
(11, 'nama aset', 'laboratorium', 'kepemilikan', 'lokasi', '2021-07-27', '2021-07-21', '1 minggu', 'baik', '123456', 'merk'),
(12, 'Monitor', 'laboratorium', 'kepemilikan', 'lokasi', '2021-07-28', '2021-07-29', '1 minggu', 'maintenance', '08572385', 'Samsung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `maintenance`
--

CREATE TABLE `maintenance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_maintenance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_maintenance` date NOT NULL,
  `aset_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mitra_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kaur` enum('terima','tolak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_wadek` enum('terima','tolak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_keuangan` enum('terima','tolak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('terima','tolak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `maintenance`
--

INSERT INTO `maintenance` (`id`, `kode_maintenance`, `tanggal_maintenance`, `aset_id`, `mitra_id`, `biaya`, `tanggal_selesai`, `lokasi`, `status_kaur`, `status_wadek`, `status_keuangan`, `status`, `created_at`, `updated_at`) VALUES
(1, '12345678', '2021-07-08', '4', '4', 10000000, '2021-07-29', 'Bandung', 'terima', 'terima', 'terima', 'terima', '2021-07-07 20:21:34', '2021-07-28 08:09:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2021_07_06_063510_create_asets_table', 1),
(9, '2021_07_06_130123_tambah_kode_aset', 2),
(10, '2021_07_07_034726_tambah_no_induk_user', 3),
(11, '2021_07_07_063303_buat_table_pengadaan_dan_mitra', 4),
(12, '2021_07_08_023920_create_maintenances_table', 5),
(13, '2021_07_11_143913_create_peminjaman_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitras`
--

CREATE TABLE `mitras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_mitra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mitra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mitras`
--

INSERT INTO `mitras` (`id`, `kode_mitra`, `nama_mitra`, `alamat`, `kontak`, `created_at`, `updated_at`) VALUES
(1, '1', 'M. Bagas Setia', 'Sagalaherang', '085723853284', NULL, NULL),
(2, '2', 'Firizki', 'Tambakan', '085723853284', NULL, NULL),
(3, '3', 'Rivaldo Nugraha', 'Pamanukan', '085723853284', NULL, NULL),
(4, '4', 'Febri', 'Subang', '085723853284', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aset_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `asal_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kaur` enum('terima','tolak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_keuangan` enum('terima','tolak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_wadek` enum('terima','tolak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('terima','tolak') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `aset_id`, `peminjam`, `lokasi_peminjaman`, `tanggal_peminjaman`, `tanggal_kembali`, `asal_barang`, `created_at`, `updated_at`, `nip`, `email`, `no_telepon`, `status_kaur`, `status_keuangan`, `status_wadek`, `status`) VALUES
(2, '10', 'bagas', 'subang', '2021-07-18', '2021-07-24', '1 hari', '2021-07-18 08:00:45', '2021-07-20 00:31:55', '10104019', 'setiapermanabagas@gmail.com', '085723853284', 'terima', 'terima', 'terima', 'terima'),
(4, '10', 'M. Bagas Setia', 'C100', '2021-07-20', '2021-07-24', '1 hari', '2021-07-20 00:25:57', '2021-07-20 00:25:57', '10104019', 'bagassetia271@gmail.com', '085723853284', 'terima', 'terima', 'terima', 'terima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaans`
--

CREATE TABLE `pengadaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_pengadaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_input` date NOT NULL,
  `nama_aset` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_aset` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `mitra_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kaur` enum('tolak','terima') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_wadek` enum('tolak','terima') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_keuangan` enum('tolak','terima') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `harga_aset` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengadaans`
--

INSERT INTO `pengadaans` (`id`, `no_pengadaan`, `tanggal_input`, `nama_aset`, `jenis_aset`, `merk`, `quantity`, `mitra_id`, `status_kaur`, `status_wadek`, `status_keuangan`, `status`, `created_at`, `updated_at`, `harga_aset`) VALUES
(2, '12345678910', '2021-07-12', 'Komputer', 'Lenovo', 'Lenovo', 100, '4', 'terima', 'terima', 'terima', 'terima', '2021-07-12 06:40:07', '2021-07-27 07:36:07', 10000000),
(3, '12345678910', '2021-07-18', 'nama', 'jenis', 'merk', 100, '4', 'tolak', 'tolak', 'tolak', 'tolak', '2021-07-18 05:52:05', '2021-07-27 07:48:35', 10000000),
(4, '12345678910', '2021-07-18', 'nama', 'jenis', 'merk', 100, '4', 'terima', NULL, NULL, NULL, '2021-07-18 05:52:32', '2021-07-27 08:13:01', 10000000),
(5, '12345678910', '2021-07-19', 'nama', 'jenis', 'merk', 100, '4', NULL, NULL, NULL, NULL, '2021-07-18 05:52:54', '2021-07-27 08:20:18', 10000000),
(7, '12345678910', '2021-07-21', 'Headset', 'jenis', 'Samsung', 100, '4', NULL, NULL, NULL, NULL, '2021-07-20 01:07:44', '2021-07-27 09:47:32', 7060500),
(10, '12345678910', '2021-07-28', 'Printer', 'Printer', 'Epson', 10, '2', NULL, NULL, NULL, NULL, '2021-07-27 07:31:07', '2021-07-27 07:31:07', 1000000),
(11, '12345678910', '2021-07-27', 'nama', 'jenis', 'merk', 100, '3', NULL, NULL, NULL, NULL, '2021-07-27 07:45:45', '2021-07-27 07:45:45', 7060500),
(12, '12345678910', '2021-07-27', 'CPU', 'jenis', 'merk', 100, '4', NULL, 'terima', NULL, NULL, '2021-07-27 08:18:08', '2021-07-28 07:55:21', 7060500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('laboran','keuangan','wadek','admin','kaur_laboratorium','staff_keuangan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `jabatan`, `alamat`, `no_telp`, `role`, `remember_token`, `created_at`, `updated_at`, `no_induk`) VALUES
(1, 'laboran', 'laboran', '$2y$10$GrUaRkbu.Ake15PqqUAq1eBdaA3PZhYHEfI.oWFkJlN/k3eH746ki', 'laboran', 'subang', '085723853284', 'laboran', NULL, NULL, NULL, '10104019'),
(2, 'wadek', 'wadek', '$2y$10$6tdi6qbDqgxD1LwAWQ.uGeYoAgs..LkRKqodkIwxwEHolLdk2zJpq', 'wadek', 'subang', '085723853284', 'wadek', NULL, NULL, NULL, '10104019'),
(3, 'admin', 'admin', '$2y$10$qoUSf527x.FnKYqx4JnaR.TMwXgLvhFnEZHZm0e9zbjv5r7tuRVRm', 'admin', 'subang', '085723853284', 'admin', NULL, NULL, NULL, '10104019'),
(4, 'keuangan', 'keuangan', '$2y$10$Y4SG0WGbv9UqQJ5hOoTE3u5guRgLUvOFHWydvbPwBGsNCDm7qQ0bi', 'keuangan', 'subang', '085723853284', 'keuangan', NULL, NULL, NULL, '10104019'),
(7, 'Kaur Laboratorium', 'kaur_lab', '$2y$10$1Bs0n6UaEftHHTYIe7Vjfuvor8SQ.ya3OrzQOU/G85HFLvXL/.2G2', 'Kaur Laboratorium', 'Bandung', '085723853284', 'kaur_laboratorium', NULL, '2021-07-20 03:10:58', '2021-07-20 03:10:58', '321301261180001'),
(8, 'Staff Keuangan', 'staff_keuangan', '$2y$10$Dza1PxKkEuZzu5V5y3O8luTQbIdvbLavC/eZGdI8r4cKTZeO0qRUu', 'staff_keuangan', 'Binong', '085723853284', 'staff_keuangan', NULL, '2021-07-27 09:01:08', '2021-07-27 09:01:08', '321301261180001');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `asets`
--
ALTER TABLE `asets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitras`
--
ALTER TABLE `mitras`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengadaans`
--
ALTER TABLE `pengadaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `asets`
--
ALTER TABLE `asets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mitras`
--
ALTER TABLE `mitras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengadaans`
--
ALTER TABLE `pengadaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
