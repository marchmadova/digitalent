<?php
// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "hotel_booking");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Hapus data pemesanan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql_hapus = "DELETE FROM pemesanan_kamar WHERE id = '$id'";
    
    if ($koneksi->query($sql_hapus) === TRUE) {
        echo "Data pemesanan berhasil dihapus!";
    } else {
        echo "Error: " . $koneksi->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['id'])) {
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

    if ($durasi_menginap > 3) {
        $discount = 10;
        $diskon_nilai = ($total_bayar_awal * $discount) / 100;
    } else {
        $discount = 0;
        $diskon_nilai = 0;
    }

    $total_bayar_setelah_diskon = $total_bayar_awal - $diskon_nilai;

    // Simpan data ke database
    $sql = "INSERT INTO pemesanan_kamar (nama_pemesan, jenis_kelamin, nomor_identitas, tipe_kamar, harga_kamar, tanggal_pesan, durasi_menginap, termasuk_breakfast, discount, total_bayar)
    VALUES ('$nama_pemesan', '$jenis_kelamin', '$nomor_identitas', '$tipe_kamar', '$harga_kamar', NOW(), '$durasi_menginap', '$termasuk_breakfast', '$discount', '$total_bayar_setelah_diskon')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Booking saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Ambil data dari tabel pemesanan_kamar
$sql_tampil = "SELECT * FROM pemesanan_kamar";
$result = $koneksi->query($sql_tampil);
?>

<!-- HTML untuk menampilkan tabel data pemesanan -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Data Pemesanan Kamar</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-nav .nav-link:hover {
            color: #ffd700; /* Warna hover untuk navbar */
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden; /* Menghindari border radius yang tajam */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1; /* Warna latar belakang saat hover */
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            margin-top: 50px;
            border-top: 1px solid #dee2e6;
        }
        .footer p {
            margin: 0;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">BERANDA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="tentang.html">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="modifikasi.php">MODIFIKASI PESANAN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h2>Data Pemesanan Kamar</h2>
    <div class="container">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama Pemesan</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Identitas</th>
                <th>Tipe Kamar</th>
                <th>Harga Kamar</th>
                <th>Tanggal Pesan</th>
                <th>Durasi Menginap</th>
                <th>Termasuk Breakfast</th>
                <th>Discount</th>
                <th>Total Bayar</th>
                <th>Aksi</th> <!-- Kolom Aksi -->
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nama_pemesan'] . "</td>";
                    echo "<td>" . $row['jenis_kelamin'] . "</td>";
                    echo "<td>" . $row['nomor_identitas'] . "</td>";
                    echo "<td>" . $row['tipe_kamar'] . "</td>";
                    echo "<td>" . $row['harga_kamar'] . "</td>";
                    echo "<td>" . $row['tanggal_pesan'] . "</td>";
                    echo "<td>" . $row['durasi_menginap'] . "</td>";
                    echo "<td>" . ($row['termasuk_breakfast'] ? 'Ya' : 'Tidak') . "</td>";
                    echo "<td>" . $row['discount'] . "%</td>";
                    echo "<td>Rp " . number_format($row['total_bayar'], 2, ',', '.') . "</td>";
                    echo "<td>"; // Awal kolom aksi
                    //echo "<a href='edit-pemesanan.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a> ";
                    echo "<form action='' method='POST' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"Anda yakin ingin menghapus?\")'>Hapus</button>";
                    echo "</form>";
                    echo "</td>"; // Akhir kolom aksi
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12'>Tidak ada data pemesanan</td></tr>";
            }
            ?>
        </table>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 oleh <a href="#">March Madova J</a>. Semua Hak Cipta Dilindungi.</p>
        </div>
    </footer>
</body>
</html>

<?php
// Tutup koneksi
$koneksi->close();

//done
?>
