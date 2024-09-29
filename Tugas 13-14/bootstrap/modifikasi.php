<?php
// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "db_wisata");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Simpan pesanan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '';
    $nomor_hp = isset($_POST['nomor_hp']) ? htmlspecialchars($_POST['nomor_hp']) : '';
    $tanggal_pesan = isset($_POST['tanggal_pesan']) ? htmlspecialchars($_POST['tanggal_pesan']) : '';
    $waktu_perjalanan = isset($_POST['waktu_perjalanan']) ? htmlspecialchars($_POST['waktu_perjalanan']) : '';
    $jumlah_peserta = isset($_POST['jumlah_peserta']) ? htmlspecialchars($_POST['jumlah_peserta']) : '';
    $harga_paket = isset($_POST['harga_paket']) ? htmlspecialchars($_POST['harga_paket']) : '';
    $pelayanan = isset($_POST['pelayanan']) && is_array($_POST['pelayanan']) ? implode(', ', $_POST['pelayanan']) : '';
    $jumlah_tagihan = isset($_POST['jumlah_tagihan']) ? htmlspecialchars($_POST['jumlah_tagihan']) : '';

    // Query untuk menyimpan data
    $sql = "INSERT INTO pemesanan_paket_wisata (nama_pemesan, nomor_hp, tanggal_pesan, waktu_perjalanan, jumlah_peserta, harga_paket, pelayanan, jumlah_tagihan)
            VALUES ('$nama', '$nomor_hp', '$tanggal_pesan', '$waktu_perjalanan', '$jumlah_peserta', '$harga_paket', '$pelayanan', '$jumlah_tagihan')";

    // Mengeksekusi query
    if ($koneksi->query($sql) === TRUE) {
        echo "Pesanan berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Jika ada permintaan untuk menghapus data
if (isset($_GET['delete_id'])) {
    $deleteId = intval($_GET['delete_id']); // Sanitasi input
    $stmt = $koneksi->prepare("DELETE FROM pemesanan_paket_wisata WHERE id = ?");
    $stmt->bind_param("i", $deleteId);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Data berhasil dihapus.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $koneksi->error . "</div>";
    }
    $stmt->close();
}

// Ambil semua data pemesanan dari database
$sql = "SELECT * FROM pemesanan_paket_wisata";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Modifikasi Pemesanan</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand nav-link" href="index.php">BERANDA</a>
            <a class="navbar-brand nav-link" href="index.php">ABOUT</a>
            <a class="navbar-brand nav-link" href="index.php">OBYEK WISATA</a>
            <a class="navbar-brand nav-link" href="index.php">GALERI</a>
            <a class="navbar-brand nav-link" href="index.php">DAFTAR PAKET WISATA</a>
            <a class="navbar-brand nav-link" href="modifikasi.php">MODIFIKASI PESANAN</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Daftar Pemesanan</h2>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Phone</th>
                        <th>Jumlah Peserta</th>
                        <th>Jumlah Hari</th>
                        <th>Akomodasi</th>
                        <th>Transportasi</th>
                        <th>Makanan</th>
                        <th>Harga Paket</th>
                        <th>Total Tagihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['nama_pemesan']); ?></td>
                            <td><?php echo htmlspecialchars($row['nomor_hp']); ?></td>
                            <td><?php echo htmlspecialchars($row['jumlah_peserta']); ?></td>
                            <td><?php echo htmlspecialchars($row['waktu_perjalanan']); ?></td>
                            <td><?php echo strpos($row['pelayanan'], 'Penginapan') !== false ? 'Y' : 'N'; ?></td>
                            <td><?php echo strpos($row['pelayanan'], 'Transportasi') !== false ? 'Y' : 'N'; ?></td>
                            <td><?php echo strpos($row['pelayanan'], 'Makanan') !== false ? 'Y' : 'N'; ?></td>
                            <td><?php echo number_format($row['harga_paket'], 0, ',', '.'); ?></td>
                            <td><?php echo number_format($row['jumlah_tagihan'], 0, ',', '.'); ?></td>
                            <td>
                                <a href="edit_pemesanan.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="modifikasi.php?delete_id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada data pemesanan.</p>
        <?php endif; ?>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$koneksi->close();
?>
