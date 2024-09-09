
<?php

#Buatlah program php  menggunakan prosedur untuk menghitung diskon hitungDiskon() yang
#menerima parameter total belanja. Prosesnya adalah sebagai berikut:
#1. Jika total belanja lebih dari atau sama dengan Rp. 100.000, maka diskon sebesar 10%.
//2. Jika total belanja lebih dari atau sama dengan Rp. 50.000, tapi kurang dari Rp.
//100.000, maka diskon sebesar 5%.
//3. Jika total belanja kurang dari Rp. 50.000, maka tidak ada diskon.
//Setelah itu, prosedur mengembalikan nilai diskon yang kemudian digunakan untuk
//menghitung total yang harus dibayar.

//Kemudian, kita memanggil fungsi tersebut dengan contoh total belanja sebesar Rp. 120.000 dan
//menampilkan total belanja, persen diskon, rp diskonnya dan total yang harus dibayar setelah diberikan diskon

function hitungDiskon($totalBelanja) {
    $diskonPersen = 0;

    if ($totalBelanja >= 100000) {
        $diskonPersen = 10;
    } elseif ($totalBelanja >= 50000) {
        $diskonPersen = 5;
    }

    return $diskonPersen;
}

$totalBelanja = 120000; // Contoh total belanja
$diskonPersen = hitungDiskon($totalBelanja);
$rpDiskon = ($diskonPersen / 100) * $totalBelanja;
$totalBayar = $totalBelanja - $rpDiskon;

echo "Total Belanja: Rp. " . number_format($totalBelanja, 0, ',', '.') . "<br>";
echo "Diskon: " . $diskonPersen . "%<br>";
echo "Rp Diskon: Rp. " . number_format($rpDiskon, 0, ',', '.') . "<br>";
echo "Total Bayar: Rp. " . number_format($totalBayar, 0, ',', '.') . "<br>";
?>
