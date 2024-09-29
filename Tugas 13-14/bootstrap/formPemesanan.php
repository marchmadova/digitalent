<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Form Pesanan</title>
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
        <h2>Form Pesanan</h2>
        <form action="modifikasi.php" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" id="nama" name="nama" required />
            </div>
            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required />
            </div>
            <div class="mb-3">
                <label for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
                <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan" required />
            </div>
            <div class="mb-3">
                <label for="waktu_perjalanan" class="form-label">Waktu Perjalanan (hari)</label>
                <input type="number" class="form-control" id="waktu_perjalanan" name="waktu_perjalanan" oninput="calculateTotal()" required />
            </div>
            <div class="mb-3">
                <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" oninput="calculateTotal()" required />
            </div>
            <div class="mb-3">
                <label class="form-label">Pelayanan</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="pelayanan[]" value="Penginapan" />
                    <label class="form-check-label">Penginapan (Rp 1.000.000)</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="pelayanan[]" value="Transportasi" />
                    <label class="form-check-label">Transportasi (Rp 1.200.000)</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="pelayanan[]" value="Makanan" />
                    <label class="form-check-label">Makanan (Rp 500.000)</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="harga_paket" class="form-label">Harga Paket (IDR)</label>
                <input type="number" class="form-control" id="harga_paket" name="harga_paket" oninput="calculateTotal()" required />
            </div>
            <div class="mb-3">
                <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan (IDR)</label>
                <input type="text" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" readonly />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
