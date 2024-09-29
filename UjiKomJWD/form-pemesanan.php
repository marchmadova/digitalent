<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <style>
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        .room-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .video-container {
            max-width: 100%;
            margin-top: 20px;
        }
        .col-md-6 {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .col-md-6 img {
            border-radius: 8px;
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
    <title>Form Pemesanan Kamar</title>
    <script>
        function validasiNomorIdentitas() {
            const nomorIdentitas = document.getElementById("nomorIdentitas").value;
            if (nomorIdentitas.length !== 16 || isNaN(nomorIdentitas)) {
                alert("Isian salah.. data harus 16 digit angka.");
                return false;
            }
            return true;
        }

        function validasiDurasiMenginap() {
            const durasi = document.getElementById("durasiMenginap").value;
            if (isNaN(durasi) || durasi <= 0) {
                alert("Durasi menginap harus diisi dengan angka.");
                return false;
            }
            return true;
        }

        function setHargaKamar() {
    const tipeKamar = document.getElementById("tipeKamar").value;
    let harga = 0;
    let gambarPath = "";
    let videoPath = "";

    if (tipeKamar === "Standar") {
        harga = 1000000;
        gambarPath = "path/to/hotel_standart.jpg"; // Ganti dengan path yang sesuai
        videoPath = "path/to/vidStandart.mp4"; // Ganti dengan path yang sesuai
    } else if (tipeKamar === "Deluxe") {
        harga = 1500000;
        gambarPath = "path/to/hotel_deluxe.jpg"; // Ganti dengan path yang sesuai
        videoPath = "path/to/vidDeluxe.mp4"; // Ganti dengan path yang sesuai
    } else if (tipeKamar === "Exclusive") {
        harga = 2000000;
        gambarPath = "path/to/hotel_exclusv.jpg"; // Ganti dengan path yang sesuai
        videoPath = "path/to/vidExclusive.mp4"; // Ganti dengan path yang sesuai
    }

    document.getElementById("harga").value = harga;
    document.getElementById("gambar").src = gambarPath;
    document.getElementById("videoSource").src = videoPath;
    
    // Tampilkan gambar dan video
    document.getElementById("gambar").style.display = "block";
    document.getElementById("video").style.display = "block";
    
    // Reload video source
    document.getElementById("video").load();
}


        function hitungTotal() {
    const hargaKamar = parseInt(document.getElementById("harga").value);
    const durasiMenginap = parseInt(document.getElementById("durasiMenginap").value);
    const includeBreakfast = document.getElementById("breakfast").checked;

    // Hitung total harga kamar untuk durasi menginap
    let total = hargaKamar * durasiMenginap;

    // Tambahkan biaya breakfast jika dipilih
    if (includeBreakfast) {
        total += 80000 * durasiMenginap; // Harga breakfast per malam
    }

    // Diskon 10% jika durasi menginap lebih dari 3 malam
    if (durasiMenginap > 3) {
        total *= 0.9; // Diskon 10%
    }

    // Tampilkan total bayar di input
    document.getElementById("totalBayar").value = total;
}

    </script>
</head>
<body class="bg-light">
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

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h3>Form Pemesanan Kamar</h3>
            </div>
            <div class="card-body">
                <form action="modifikasi.php" method="POST" onsubmit="return validasiNomorIdentitas() && validasiDurasiMenginap()">
                    <div class="form-group">
                        <label for="namaPemesan">Nama Pemesan</label>
                        <input type="text" class="form-control" id="namaPemesan" name="namaPemesan" required>
                    </div>
                    <div class="form-group">
    <label>Jenis Kelamin</label><br>
    <div class="form-check">
        <input type="radio" class="form-check-input" id="jenisKelaminLaki" name="jenisKelamin" value="Laki-laki" required>
        <label class="form-check-label" for="jenisKelaminLaki">Laki-laki</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" id="jenisKelaminPerempuan" name="jenisKelamin" value="Perempuan" required>
        <label class="form-check-label" for="jenisKelaminPerempuan">Perempuan</label>
    </div>
</div>

                    <div class="form-group">
                        <label for="nomorIdentitas">Nomor Identitas (16 digit)</label>
                        <input type="text" class="form-control" id="nomorIdentitas" name="nomorIdentitas" maxlength="16" required>
                    </div>
                    <div class="form-group">
                        <label for="tipeKamar">Tipe Kamar</label>
                        <select id="tipeKamar" name="tipeKamar" class="form-control" onchange="setHargaKamar()" required>
                            <option value="Standar">Standar</option>
                            <option value="Deluxe">Deluxe</option>
                            <option value="Exclusive">Exclusive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Kamar (IDR)</label>
                        <input type="text" class="form-control" id="harga" name="harga" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="tanggalPesan">Tanggal Pesan (dd/mm/yyyy)</label>
                        <input type="date" class="form-control" id="tanggalPesan" name="tanggalPesan" pattern="\d{2}/\d{2}/\d{4}" required>
                    </div>
                    <div class="form-group">
                        <label for="durasiMenginap">Durasi Menginap (dalam hari)</label>
                        <input type="text" class="form-control" id="durasiMenginap" name="durasiMenginap" required>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="breakfast" name="breakfast">
                            <label for="breakfast" class="form-check-label">Termasuk Breakfast</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-info" onclick="hitungTotal()">Hitung Total Bayar</button>
                    </div>
                    <div class="form-group">
                        <label for="totalBayar">Total Bayar (IDR)</label>
                        <input type="text" class="form-control" id="totalBayar" name="totalBayar" readonly>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Pesan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="button" class="btn btn-danger" onclick="window.location.reload()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Footer -->
         <footer class="footer">
            <div class="container">
                <p>&copy; 2024 oleh <a href="#">March Madova J</a>. Semua Hak Cipta Dilindungi.</p>
            </div>
        </footer>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- done -->
</body>
</html>
