<?php
include '../auth/cek_login.php';
include '../config/db.php';

if (isset($_POST['simpan'])) {
    $nomor_order = $_POST['nomor_order'];
    $nomor_sertif = $_POST['nomor_sertif'];
    $nama_alat = $_POST['nama_alat'];
    $tgl_diterima = $_POST['tgl_diterima'];
    $tgl_dikalibrasi = $_POST['tgl_dikalibrasi'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $jumlah_alat = $_POST['jumlah_alat'];

    $query = "INSERT INTO sertifikat (nomor_order, nomor_sertif, nama_alat, tgl_diterima, tgl_dikalibrasi, nama_perusahaan, jumlah_alat) 
              VALUES ('$nomor_order', '$nomor_sertif', '$nama_alat', '$tgl_diterima', '$tgl_dikalibrasi', '$nama_perusahaan', $jumlah_alat)";

    if ($koneksi->query($query)) {
        header("Location: index.php?pesan=sukses");
    } else {
        echo "<script>alert('Gagal menyimpan data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Sertifikat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-white flex items-center justify-center py-12 px-4">

<div class="w-full max-w-4xl bg-white p-10 rounded-2xl shadow-xl">
    <h2 class="text-3xl font-bold text-gray-700 mb-8 text-center">Form Tambah Sertifikat</h2>
    <form method="post" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Nomor Order -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Nomor Order</label>
            <input name="nomor_order" placeholder="Contoh: ORD-001"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 outline-none" required>
            <p class="text-sm text-gray-500 mt-1">Nomor order dari perusahaan pemesan</p>
        </div>

        <!-- Nomor Sertifikat -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Nomor Sertifikat</label>
            <input name="nomor_sertif" placeholder="Contoh: SERT-2025-001"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 outline-none" required>
            <p class="text-sm text-gray-500 mt-1">Nomor unik yang terdapat pada sertifikat kalibrasi</p>
        </div>

        <!-- Nama Alat -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Nama Alat</label>
            <input name="nama_alat" placeholder="Contoh: Timbangan Digital"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 outline-none" required>
            <p class="text-sm text-gray-500 mt-1">Jenis alat yang dikalibrasi</p>
        </div>

        <!-- Tanggal Diterima -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Tanggal Diterima</label>
            <input name="tgl_diterima" type="date"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 outline-none" required>
            <p class="text-sm text-gray-500 mt-1">Tanggal alat diterima untuk dikalibrasi</p>
        </div>

        <!-- Tanggal Dikalibrasi -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Tanggal Dikalibrasi</label>
            <input name="tgl_dikalibrasi" type="date"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 outline-none" required>
            <p class="text-sm text-gray-500 mt-1">Tanggal pelaksanaan kalibrasi</p>
        </div>

        <!-- Nama Perusahaan -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Nama Perusahaan</label>
            <input name="nama_perusahaan" placeholder="Contoh: PT. Kalibrasi Jaya"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 outline-none" required>
            <p class="text-sm text-gray-500 mt-1">Nama perusahaan tempat alat berasal</p>
        </div>

        <!-- Jumlah Alat -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Jumlah Alat</label>
            <input name="jumlah_alat" type="number" placeholder="Contoh: 5"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 outline-none" required>
            <p class="text-sm text-gray-500 mt-1">Jumlah unit alat yang dikalibrasi</p>
        </div>

        <!-- Tombol Aksi -->
        <div class="col-span-1 md:col-span-2 flex justify-between mt-4">
            <button type="submit" name="simpan"
                    class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-md">
                Simpan
            </button>
            <a href="index.php"
               class="bg-gray-300 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-400 transition-all">
                Kembali
            </a>
        </div>
    </form>
</div>

</body>
</html>
