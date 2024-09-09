<?php
$koneksi = new mysqli("localhost", "root", "", "db_wisata");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$id = intval($_GET['id']); // Sanitasi input

// Ambil data pemesanan berdasarkan ID
$stmt = $koneksi->prepare("SELECT * FROM pemesanan_paket_wisata WHERE id = ?");
if (!$stmt) {
    die("Prepare statement gagal: " . $koneksi->error);
}
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Data tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi dan sanitasi data POST
    $nama = trim($_POST["nama"]);
    $nomorHp = trim($_POST["nomor_hp"]);
    $tanggalPesan = $_POST["tanggal_pesan"];
    $waktuPerjalanan = floatval($_POST["waktu_perjalanan"]);
    $jumlahPeserta = intval($_POST["jumlah_peserta"]);
    $pelayanan = isset($_POST["pelayanan"]) ? $_POST["pelayanan"] : [];
    $hargaPaket = floatval($_POST["harga_paket"]);
    $jumlahTagihan = floatval($_POST["jumlah_tagihan"]);

    // Periksa dan sanitasi input
    if (empty($nama) || empty($nomorHp) || empty($tanggalPesan) || empty($waktuPerjalanan) || empty($jumlahPeserta) || empty($hargaPaket)) {
        die("Semua field harus diisi.");
    }

    // Update data ke database
    $stmt = $koneksi->prepare("UPDATE pemesanan_paket_wisata SET 
                                nama_pemesan = ?,
                                nomor_hp = ?,
                                tanggal_pesan = ?,
                                waktu_perjalanan = ?,
                                jumlah_peserta = ?,
                                pelayanan = ?,
                                harga_paket = ?,
                                jumlah_tagihan = ?
                                WHERE id = ?");
    if (!$stmt) {
        die("Prepare statement gagal: " . $koneksi->error);
    }

    $pelayananStr = implode(", ", $pelayanan);
    $stmt->bind_param("sssissddi", $nama, $nomorHp, $tanggalPesan, $waktuPerjalanan, $jumlahPeserta, $pelayananStr, $hargaPaket, $jumlahTagihan, $id);

    if ($stmt->execute()) {
        header("Location: modifikasi.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Edit Pemesanan</title>
    <script>
        function calculateTotal() {
            var waktuPerjalanan = parseFloat(document.getElementById("waktu_perjalanan").value) || 0;
            var jumlahPeserta = parseFloat(document.getElementById("jumlah_peserta").value) || 0;
            var hargaPaket = parseFloat(document.getElementById("harga_paket").value) || 0;

            var pelayanan = document.getElementsByName("pelayanan[]");
            var hargaPelayanan = 0;

            for (var i = 0; i < pelayanan.length; i++) {
                if (pelayanan[i].checked) {
                    if (pelayanan[i].value === "Penginapan") {
                        hargaPelayanan += 1000000;
                    } else if (pelayanan[i].value === "Transportasi") {
                        hargaPelayanan += 1200000;
                    } else if (pelayanan[i].value === "Makanan") {
                        hargaPelayanan += 500000;
                    }
                }
            }

            var totalTagihan = (hargaPaket + hargaPelayanan) * waktuPerjalanan * jumlahPeserta;
            document.getElementById("jumlah_tagihan").value = totalTagihan.toFixed(2); // Format dengan dua angka di belakang koma
        }

        function resetForm() {
            document.getElementById("editForm").reset();
            document.getElementById("jumlah_tagihan").value = "";
        }
    </script>
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
        <h2>Edit Pemesanan</h2>
        <form id="editForm" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" />
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama_pemesan']); ?>" required />
            </div>
            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?php echo htmlspecialchars($row['nomor_hp']); ?>" required />
            </div>
            <div class="mb-3">
                <label for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
                <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan" value="<?php echo htmlspecialchars($row['tanggal_pesan']); ?>" required />
            </div>
            <div class="mb-3">
                <label for="waktu_perjalanan" class="form-label">Waktu Perjalanan (hari)</label>
                <input type="number" class="form-control" id="waktu_perjalanan" name="waktu_perjalanan" value="<?php echo htmlspecialchars($row['waktu_perjalanan']); ?>" oninput="calculateTotal()" required />
            </div>
            <div class="mb-3">
                <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="<?php echo htmlspecialchars($row['jumlah_peserta']); ?>" oninput="calculateTotal()" required />
            </div>
            <div class="mb-3">
                <label class="form-label">Pelayanan</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="pelayanan[]" value="Penginapan" <?php echo strpos($row['pelayanan'], 'Penginapan') !== false ? 'checked' : ''; ?> />
                    <label class="form-check-label">Penginapan (Rp 1.000.000)</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="pelayanan[]" value="Transportasi" <?php echo strpos($row['pelayanan'], 'Transportasi') !== false ? 'checked' : ''; ?> />
                    <label class="form-check-label">Transportasi (Rp 1.200.000)</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="pelayanan[]" value="Makanan" <?php echo strpos($row['pelayanan'], 'Makanan') !== false ? 'checked' : ''; ?> />
                    <label class="form-check-label">Makanan (Rp 500.000)</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="harga_paket" class="form-label">Harga Paket (IDR)</label>
                <input type="number" class="form-control" id="harga_paket" name="harga_paket" value="<?php echo htmlspecialchars($row['harga_paket']); ?>" oninput="calculateTotal()" required />
            </div>
            <div class="mb-3">
                <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan (IDR)</label>
                <input type="text" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" value="<?php echo htmlspecialchars(number_format($row['jumlah_tagihan'], 2, ',', '.')); ?>" readonly />
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset</button>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
