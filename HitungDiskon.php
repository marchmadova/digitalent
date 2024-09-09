<!DOCTYPE html>
<html>
<head>
    <!-- Bagian head yang berisi metadata dokumen -->
    <title>Hitung Diskon</title>
</head>
<body>

<?php
// Fungsi untuk menghitung diskon berdasarkan total belanja
function hitungDiskon($totalBelanja) {
    $diskon = 0;

    // Kondisi pertama: Jika total belanja >= 100000, diskon 10%
    if ($totalBelanja >= 100000) {
        $diskon = 0.10 * $totalBelanja;
    // Kondisi kedua: Jika total belanja >= 50000, diskon 5%
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja;
    // Kondisi ketiga: Jika total belanja < 50000, tidak ada diskon
    } else {
        $diskon = 0;
    }

    // Mengembalikan nilai diskon yang dihitung
    return $diskon;
}

// Fungsi untuk menampilkan hasil perhitungan total belanja, diskon, dan total yang harus dibayar
function tampilkanHasil($totalBelanja) {
    // Memanggil fungsi hitungDiskon untuk mendapatkan nilai diskon
    $diskon = hitungDiskon($totalBelanja);
    // Menghitung total yang harus dibayar setelah diskon
    $totalBayar = $totalBelanja - $diskon;

    // Menampilkan total belanja dalam format rupiah
    echo "Total Belanja: Rp. " . number_format($totalBelanja, 2, ',', '.') . "<br>";
    // Menampilkan nilai diskon dalam format rupiah
    echo "Diskon: Rp. " . number_format($diskon, 2, ',', '.') . "<br>";
    // Menampilkan total yang harus dibayar dalam format rupiah
    echo "Total yang Harus Dibayar: Rp. " . number_format($totalBayar, 2, ',', '.') . "<br>";
}
?>

<!-- Form untuk memasukkan total belanja -->
<form method="post" action="">
    <label for="totalBelanja">Masukkan Total Belanja: </label>
    <!-- Input field untuk total belanja, hanya menerima angka dan wajib diisi -->
    <input type="number" name="totalBelanja" id="totalBelanja" required>
    <!-- Tombol untuk mengirimkan form -->
    <button type="submit">Hitung Diskon</button>
</form>

<?php
// Mengecek apakah form telah disubmit menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai total belanja dari input form
    $totalBelanja = $_POST['totalBelanja'];
    // Memanggil fungsi tampilkanHasil untuk menampilkan hasil perhitungan
    tampilkanHasil($totalBelanja);
}
?>

</body>
</html>
