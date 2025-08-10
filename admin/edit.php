<?php
include '../auth/cek_login.php';
include '../config/db.php';

$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM sertifikat WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Sertifikat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-green-100 to-white flex items-center justify-center py-12 px-4">

<div class="w-full max-w-4xl bg-white p-10 rounded-2xl shadow-xl">
    <h2 class="text-3xl font-bold text-gray-700 mb-8 text-center">Edit Data Sertifikat</h2>
    <form method="post" class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block text-gray-700 font-medium mb-1">Nomor Order</label>
            <input name="nomor_order" value="<?= $data['nomor_order'] ?>"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-300 outline-none" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Nomor Sertifikat</label>
            <input name="nomor_sertif" value="<?= $data['nomor_sertif'] ?>"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-300 outline-none" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Nama Alat</label>
            <input name="nama_alat" value="<?= $data['nama_alat'] ?>"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-300 outline-none" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Tanggal Diterima</label>
            <input name="tgl_diterima" type="date" value="<?= $data['tgl_diterima'] ?>"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-300 outline-none" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Tanggal Dikalibrasi</label>
            <input name="tgl_dikalibrasi" type="date" value="<?= $data['tgl_dikalibrasi'] ?>"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-300 outline-none" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Nama Perusahaan</label>
            <input name="nama_perusahaan" value="<?= $data['nama_perusahaan'] ?>"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-300 outline-none" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Jumlah Alat</label>
            <input name="jumlah_alat" type="number" value="<?= $data['jumlah_alat'] ?>"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-300 outline-none" required>
        </div>

        <div class="col-span-1 md:col-span-2 flex justify-between mt-4">
            <button name="update" type="submit"
                    class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition-all shadow-md">
                Update
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

<?php
if (isset($_POST['update'])) {
    $koneksi->query("UPDATE sertifikat SET 
        nomor_order='$_POST[nomor_order]',
        nomor_sertif='$_POST[nomor_sertif]',
        nama_alat='$_POST[nama_alat]',
        tgl_diterima='$_POST[tgl_diterima]',
        tgl_dikalibrasi='$_POST[tgl_dikalibrasi]',
        nama_perusahaan='$_POST[nama_perusahaan]',
        jumlah_alat=$_POST[jumlah_alat]
        WHERE id=$id
    ");
    header("Location: index.php");
}
?>
