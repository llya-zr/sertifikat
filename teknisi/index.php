<?php
include '../auth/cek_login.php';
include '../config/db.php';

$data = $koneksi->query("SELECT * FROM sertifikat");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Sertifikat - Teknisi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-7xl mx-auto bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Data Sertifikat (Teknisi)</h2>
            <a href="../auth/logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nomor Order</th>
                        <th class="px-4 py-2 text-left">Nomor Sertifikat</th>
                        <th class="px-4 py-2 text-left">Nama Alat</th>
                        <th class="px-4 py-2 text-left">Tgl Diterima</th>
                        <th class="px-4 py-2 text-left">Tgl Dikalibrasi</th>
                        <th class="px-4 py-2 text-left">Nama Perusahaan</th>
                        <th class="px-4 py-2 text-left">Jumlah Alat</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <?php $no = 1; while($row = $data->fetch_assoc()): ?>
                    <tr>
                        <td class="px-4 py-2"><?= $no++ ?></td>
                        <td class="px-4 py-2"><?= $row['nomor_order'] ?></td>
                        <td class="px-4 py-2"><?= $row['nomor_sertif'] ?></td>
                        <td class="px-4 py-2"><?= $row['nama_alat'] ?></td>
                        <td class="px-4 py-2"><?= $row['tgl_diterima'] ?></td>
                        <td class="px-4 py-2"><?= $row['tgl_dikalibrasi'] ?></td>
                        <td class="px-4 py-2"><?= $row['nama_perusahaan'] ?></td>
                        <td class="px-4 py-2"><?= $row['jumlah_alat'] ?></td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
