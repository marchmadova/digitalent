<!DOCTYPE html>
<html>
<head>
    <title>Hitung Diskon</title>
</head>
<body>

<?php
function hitungDiskon($totalBelanja) {
    $diskon = 0;

    if ($totalBelanja >= 100000) {
        $diskon = 0.10 * $totalBelanja;
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja;
    } else {
        $diskon = 0;
    }

    return $diskon;
}

function tampilkanHasil($totalBelanja) {
    $diskon = hitungDiskon($totalBelanja);
    $totalBayar = $totalBelanja - $diskon;

    echo "Total Belanja: Rp. " . number_format($totalBelanja, 2, ',', '.') . "<br>";
    echo "Diskon: Rp. " . number_format($diskon, 2, ',', '.') . "<br>";
    echo "Total yang Harus Dibayar: Rp. " . number_format($totalBayar, 2, ',', '.') . "<br>";
}

// Contoh total belanja
$totalBelanjaContoh = 120000;
tampilkanHasil($totalBelanjaContoh);

?>

</body>
</html>
