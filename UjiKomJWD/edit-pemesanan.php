<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "hotel_booking");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil ID dari URL dan lakukan sanitasi
$id = intval($_GET['id']);

// Ambil data pemesanan berdasarkan ID
$stmt = $koneksi->prepare("SELECT * FROM pemesanan_kamar WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Periksa apakah data ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan!";
    exit;
}

// Proses form jika dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pemesan = $_POST['namaPemesan'];
    $jenis_kelamin = $_POST['jenisKelamin'];
    $nomor_identitas = $_POST['nomorIdentitas'];
    $tipe_kamar = $_POST['tipeKamar'];
    $harga_kamar = $_POST['harga'];
    $durasi_menginap = $_POST['durasiMenginap'];
    $termasuk_breakfast = isset($_POST['breakfast']) ? 1 : 0;

    // Hitung total bayar sebelum diskon
    $total_bayar_awal = $harga_kamar * $durasi_menginap;
    if ($termasuk_breakfast) {
        $total_bayar_awal += 80000 * $durasi_menginap;
    }

    $discount = $durasi_menginap > 3 ? 10 : 0;
    $diskon_nilai = ($total_bayar_awal * $discount) / 100;
    $total_bayar_setelah_diskon = $total_bayar_awal - $diskon_nilai;

    // Update data ke database
    $stmt_update = $koneksi->prepare("UPDATE pemesanan_kamar SET nama_pemesan=?, jenis_kelamin=?, nomor_identitas=?, tipe_kamar=?, harga_kamar=?, durasi_menginap=?, termasuk_breakfast=?, discount=?, total_bayar=? WHERE id=?");
    $stmt_update->bind_param("sssiiiii", $nama_pemesan, $jenis_kelamin, $nomor_identitas, $tipe_kamar, $harga_kamar, $durasi_menginap, $termasuk_breakfast, $discount, $total_bayar_setelah_diskon, $id);

    if ($stmt_update->execute()) {
        echo "Data berhasil diupdate!";
        header("Location: modifikasi.php"); // Redirect ke halaman pemesanan
        exit();
    } else {
        echo "Error: " . $stmt_update->error;
    }
}

// Tutup koneksi
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Edit Pemesanan Kamar</title>
</head>
<body>
    <div class="container">
        <h2>Edit Pemesanan Kamar</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="namaPemesan" class="form-label">Nama Pemesan</label>
                <input type="text" name="namaPemesan" class="form-control" value="<?php echo htmlspecialchars($row['nama_pemesan']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenisKelamin" class="form-select" required>
                    <option value="Laki-laki" <?php echo $row['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo $row['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nomorIdentitas" class="form-label">Nomor Identitas</label>
                <input type="text" name="nomorIdentitas" class="form-control" value="<?php echo htmlspecialchars($row['nomor_identitas']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="tipeKamar" class="form-label">Tipe Kamar</label>
                <select name="tipeKamar" class="form-select" required>
                    <option value="Standar" <?php echo $row['tipe_kamar'] == 'Standar' ? 'selected' : ''; ?>>Standar</option>
                    <option value="Deluxe" <?php echo $row['tipe_kamar'] == 'Deluxe' ? 'selected' : ''; ?>>Deluxe</option>
                    <option value="Exclusive" <?php echo $row['tipe_kamar'] == 'Exclusive' ? 'selected' : ''; ?>>Exclusive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Kamar</label>
                <input type="number" name="harga" class="form-control" value="<?php echo htmlspecialchars($row['harga_kamar']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="durasiMenginap" class="form-label">Durasi Menginap (hari)</label>
                <input type="number" name="durasiMenginap" class="form-control" value="<?php echo htmlspecialchars($row['durasi_menginap']); ?>" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="breakfast" class="form-check-input" <?php echo $row['termasuk_breakfast'] ? 'checked' : ''; ?>>
                <label class="form-check-label">Termasuk Breakfast</label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="modifikasi.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>

<?php
$koneksi->close();
//tidak dipakai
?>
