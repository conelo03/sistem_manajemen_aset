-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2021 pada 03.41
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
  `jenis_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepemilikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tanggal_maintenance` date NOT NULL,
  `waktu_maintenance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `asets`
--

INSERT INTO `asets` (`id`, `nama_aset`, `jenis_aset`, `kepemilikan`, `lokasi`, `tanggal_pembelian`, `tanggal_maintenance`, `waktu_maintenance`, `kondisi`, `kode_aset`) VALUES
(4, 'nama', 'jenis', 'kepemilikan', 'lokasi', '2021-07-06', '2021-07-06', '1 minggu', 'rusak', '123456');

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
(11, '2021_07_07_063303_buat_table_pengadaan_dan_mitra', 4);

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
-- Struktur dari tabel `pengadaans`
--

CREATE TABLE `pengadaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_pengadaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_input` date NOT NULL,
  `aset_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `mitra_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `harga_aset` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `role` enum('laboran','keuangan','wadek','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, 'keuangan', 'keuangan', '$2y$10$Y4SG0WGbv9UqQJ5hOoTE3u5guRgLUvOFHWydvbPwBGsNCDm7qQ0bi', 'keuangan', 'subang', '085723853284', 'keuangan', NULL, NULL, NULL, '10104019');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mitras`
--
ALTER TABLE `mitras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengadaans`
--
ALTER TABLE `pengadaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;