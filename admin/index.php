<?php
include '../auth/cek_login.php';
include '../config/db.php';

// Ambil data filter pencarian
$keyword = $_GET['keyword'] ?? '';
$tahun = $_GET['tahun'] ?? '';

// Query data
$query = "SELECT * FROM sertifikat WHERE 1";
if (!empty($keyword)) {
    $query .= " AND (nomor_order LIKE '%$keyword%' OR nama_perusahaan LIKE '%$keyword%' OR nama_alat LIKE '%$keyword%')";
}
if (!empty($tahun)) {
    $query .= " AND YEAR(tgl_dikalibrasi) = '$tahun'";
}
$query .= " ORDER BY tgl_dikalibrasi DESC";

$result = $koneksi->query($query);

// Ambil daftar tahun unik untuk filter
$tahun_result = $koneksi->query("SELECT DISTINCT YEAR(tgl_dikalibrasi) AS tahun FROM sertifikat ORDER BY tahun DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Sertifikat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-white p-8">

<div class="max-w-7xl mx-auto">
    <h1 class="text-4xl font-bold text-gray-700 mb-6 text-center">Data Sertifikat Kalibrasi</h1>

    <!-- Form Pencarian & Filter Tahun -->
    <form method="get" class="mb-6 flex flex-wrap gap-4 justify-between items-center bg-white p-4 rounded-xl shadow">
        <input type="text" name="keyword" placeholder="Cari sertifikat..." value="<?= htmlspecialchars($keyword) ?>"
               class="w-full md:w-1/2 px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">

        <select name="tahun"
                class="px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            <option value="">Semua Tahun</option>
            <?php while ($row = $tahun_result->fetch_assoc()): ?>
                <option value="<?= $row['tahun'] ?>" <?= $tahun == $row['tahun'] ? 'selected' : '' ?>>
                    <?= $row['tahun'] ?>
                </option>
            <?php endwhile; ?>
        </select>

        <button type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-all">
            Filter
        </button>

        <a href="tambah.php"
           class="ml-auto bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition-all">
            + Tambah Sertifikat
        </a>
    </form>

    <!-- Tabel Sertifikat -->
    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full text-sm text-gray-800">
            <thead class="bg-blue-100 text-blue-800 uppercase text-left">
                <tr>
                    <th class="p-4">#</th>
                    <th class="p-4">Nomor Order</th>
                    <th class="p-4">Nomor Sertifikat</th>
                    <th class="p-4">Nama Alat</th>
                    <th class="p-4">Tanggal Diterima</th>
                    <th class="p-4">Tanggal Kalibrasi</th>
                    <th class="p-4">Perusahaan</th>
                    <th class="p-4">Jumlah Alat</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                        <tr class="hover:bg-gray-50 border-b">
                            <td class="p-4"><?= $no++ ?></td>
                            <td class="p-4"><?= $row['nomor_order'] ?></td>
                            <td class="p-4"><?= $row['nomor_sertif'] ?></td>
                            <td class="p-4"><?= $row['nama_alat'] ?></td>
                            <td class="p-4"><?= date('d-m-Y', strtotime($row['tgl_diterima'])) ?></td>
                            <td class="p-4"><?= date('d-m-Y', strtotime($row['tgl_dikalibrasi'])) ?></td>
                            <td class="p-4"><?= $row['nama_perusahaan'] ?></td>
                            <td class="p-4"><?= $row['jumlah_alat'] ?></td>
                            <td class="p-4 flex gap-2">
                                <a href="edit.php?id=<?= $row['id'] ?>"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-xl text-xs">Edit</a>
                                <a href="hapus.php?id=<?= $row['id'] ?>"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')"
                                   class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-xs">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="p-4 text-center text-gray-500">Tidak ada data ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
