<html>
    <head>
        <title>Paket Wisata</title>
    </head>

    <body>
        <h1>Form Pemesanan</h1>
        <form action=""method="POST">
            <label for="Nama">Nama Pemesanan</label>
            <input type="text" Name="namapemesan">
            <label for="Nohp">Nomor HP</label>
            <input type="text" name="nohp">
            <input type="submit" value="Submit" name="submit">
        </form>
    </body>
</html>

<?php
if (isset($_POST['namapemesan'])) {
    $namapemesan = $_POST['namapemesan'];
    $nohp = $_POST['nohp'];

    echo "Resume Pemesanan <br>";
    echo "Nama Pesanan: $namapemesan <br>";
    echo "No HP: $nohp";
}

?>