<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <style>
            .slogan-header {
            width: 100%;
            height: 100vh; /* Sesuaikan tinggi header sesuai kebutuhan, misal 50% dari tinggi viewport */
            position: relative;
            overflow: hidden; /* Menghindari gambar keluar dari area header */
        }

        .slogan-img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Memastikan gambar menyesuaikan dengan area tanpa merusak rasio aspek */
            object-position: center; /* Gambar diposisikan di tengah */
        }

        .body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .about-section {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }
        .about-section h2 {
            text-align: left;
            color: #555;
        }
        .contact-info {
            margin-top: 20px;
        }
        .contact-info p {
            margin: 5px 0;
        }

        .navbar-nav .nav-link {
            font-size: 1rem; /* Sesuaikan ukuran font navbar items */
            font-family: inherit; /* Sesuaikan jenis font navbar items */
            color: rgba(255, 255, 255, 0.55); /* Warna teks default */
        }
        .navbar-nav .nav-link:hover, .navbar-nav .dropdown-toggle:hover {
            color: white; /* Warna teks saat hover */
        }
        .card-img-top {
            height: 200px; /* Atur tinggi gambar card agar seragam */
            object-fit: cover; /* Memastikan gambar memenuhi kotak tanpa merusak rasio aspek */
        }
        .gallery-item {
            margin-bottom: 20px;
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .card-img-top {
            height: 250px; /* Atur tinggi gambar card agar seragam */
            object-fit: cover; /* Memastikan gambar memenuhi kotak tanpa merusak rasio aspek */
        }
        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-body {
            flex-grow: 1; /* Mengatur body card agar memanjang sesuai konten */
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
    <!-- Header with Slogan Image -->
    <header class="jumbotron jumbotron-fluid text-center bg-light slogan-header" id="beranda">
        <img src="foto/sloganbanner.png" alt="logoposter" class="img-fluid slogan-img">
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand nav-link" href="#beranda">BERANDA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand nav-link" href="tentang.html">ABOUT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand nav-link" href="modifikasi.php">MODIFIKASI PESANAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PAKET KAMAR
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="#pakethotel">Paket Hotel Standart</a></li>
                            <li><a class="dropdown-item" href="#pakethotel">Paket Hotel Deluxe</a></li>
                            <li><a class="dropdown-item" href="#pakethotel">Paket Hotel Exclusive</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Tentang Kami -->
    <div class="container">
        <div class="about-section">
            <h1>Tentang Kami</h1>
            <p>Selamat datang di March Hotel, sebuah penginapan yang menawarkan kenyamanan dan kemewahan di pusat Kota Surabaya. Kami menyediakan tiga tipe kamar, yaitu Standar, Deluxe, dan Exclusive, yang dirancang khusus untuk memberikan pengalaman menginap terbaik bagi setiap tamu kami.</p>
            <p>Berlokasi strategis di jantung kota, March Hotel memudahkan akses ke berbagai tempat wisata, pusat perbelanjaan, dan pusat bisnis di Surabaya.</p>

            <div class="contact-info">
                <h2>Informasi Kontak</h2>
                <p><strong>Alamat:</strong> Jalan Surabaya, Surabaya, Jawa Timur, Indonesia</p>
                <p><strong>No. Telepon:</strong> (+62) 9876543215</p>
                <p><strong>Email:</strong> info@marchhotel.com</p>
            </div>
        </div>
    </div>

    <!-- YouTube Videos -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Video 2 -->
            <div class="col-md-4 mb-4">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/gY8xka_aJ6w" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Daftar Paket Hotel-->
    <div class="container mt-5" id="pakethotel">
      <h2 class="text-center mb-4">Paket Hotel</h2>
        <div class="row">
            <!-- Paket 1 -->
            <div class="col-md-4">
                <div class="card">
                <a href="detail-standart.html">
                <img src="foto/hotel standart.jpg" class="card-img-top" alt="Kamar standart">
                </a>
                    <div class="card-body">
                        <h5 class="card-title">Kamar Standar </h5>
                        <p class="card-text">Kamar nyaman dengan fasilitas lengkap seperti AC, TV, Wi-Fi, dan kamar mandi pribadi, 
                            cocok untuk pelancong bisnis atau wisatawan.</p>
                        <p class="card-text"><strong>Harga: Rp 1.000.000</strong></p>
                        <!-- Tombol Kamar Standar -->
                        <a href="form-pemesanan.php" class="btn btn-primary mt-3">Pesan Kamar</a>

                    </div>
                </div>
            </div>
            <!-- Paket 2 -->
            <div class="col-md-4">
                <div class="card">
                <a href="detail-deluxe.html">
                <img src="foto/hotel deluxe.jpg" class="card-img-top" alt="Kamar deluxe">
                </a>
                    <div class="card-body">
                        <h5 class="card-title">Kamar Deluxe</h5>
                        <p class="card-text">Kamar luas dengan fasilitas premium, minibar, 
                            dan pemandangan kota, ideal untuk tamu yang ingin kenyamanan ekstra.</p>
                        <p class="card-text"><strong>Harga: Rp 1.500.000</strong></p>
                        <!-- Tombol Kamar Deluxe -->
                        <a href="form-pemesanan.php" class="btn btn-primary mt-3">Pesan Kamar</a>
                    </div>
                </div>
            </div>
            <!-- Paket 3 -->
            <div class="col-md-4">
                <div class="card">
                <a href="detail-exclusive.html">
                <img src="foto/hotel exclusv.jpg" class="card-img-top" alt="Kamar exclusv">
                </a>
                    <div class="card-body">
                        <h5 class="card-title">Kamar Exclusive</h5>
                        <p class="card-text">Kamar mewah dengan jacuzzi, layanan kamar 24 jam, 
                            dan akses lounge.</p>
                        <br>
                        <p class="card-text"><strong>Harga: Rp 2.000.000</strong></p>
                        <!-- Tombol Kamar Exclusive -->
                        <a href="form-pemesanan.php" class="btn btn-primary mt-3">Pesan Kamar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container table-container">
        <h1>Tabel Harga Kamar Hotel</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tipe Kamar</th>
                    <th>Fasilitas</th>
                    <th>Harga per Malam</th>
                    <th>Harga dengan Breakfast</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Standart</td>
                    <td>1 Bed, AC, TV, Wi-Fi</td>
                    <td>Rp 1.000.000</td>
                    <td>Rp 1080.000</td>
                </tr>
                <tr>
                    <td>Deluxe</td>
                    <td>1 Bed King Size, AC, TV, Wi-Fi, Mini Bar</td>
                    <td>Rp 1.500.000</td>
                    <td>Rp 1.580.000</td>
                </tr>
                <tr>
                    <td>Exclusive</td>
                    <td>2 Bed King Size, AC, TV, Wi-Fi, Mini Bar, Jacuzzi</td>
                    <td>Rp 2.000.000</td>
                    <td>Rp 2080.000</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Galeri -->
    <div class="container mt-5" id="galeri">
        <h2 class="text-center mb-4">Galeri hotel</h2>
        <div class="row">
            <!-- Gambar 1 -->
            <div class="col-md-3 gallery-item">
                <img src="foto/galeri1.jpg" class="img-fluid" alt="Galeri 1">
            </div>
            <!-- Gambar 2 -->
            <div class="col-md-3 gallery-item">
                <img src="foto/galeri2.jpg" class="img-fluid" alt="Galeri 2">
            </div>
            <!-- Gambar 3 -->
            <div class="col-md-3 gallery-item">
                <img src="foto/galeri3.jpg" class="img-fluid" alt="Galeri 3">
            </div>
            <!-- Gambar 4 -->
            <div class="col-md-3 gallery-item">
                <img src="foto/galeri4.jpg" class="img-fluid" alt="Galeri 4">
            </div>
            <!-- Gambar 5 -->
            <div class="col-md-3 gallery-item">
                <img src="foto/galeri5.jpg" class="img-fluid" alt="Galeri 5">
            </div>
            <!-- Gambar 6 -->
            <div class="col-md-3 gallery-item">
                <img src="foto/galeri6.jpg" class="img-fluid" alt="Galeri 6">
            </div>
            <!-- Gambar 7 -->
            <div class="col-md-3 gallery-item">
                <img src="foto/galeri7.jpg" class="img-fluid" alt="Galeri 7">
            </div>
            <!-- Gambar 8 -->
            <div class="col-md-3 gallery-item">
                <img src="foto/galeri8.jpg" class="img-fluid" alt="Galeri 8">
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
