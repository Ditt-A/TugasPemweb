<?php
function tambah($a, $b) {
    return $a + $b;
}

function panjangString($teks) {
    return strlen($teks);
}

echo "=== Hasil Penjumlahan ===" . PHP_EOL;
echo "10 + 5 = " . tambah(10, 5) . PHP_EOL;
echo "7 + 12 = " . tambah(7, 12) . PHP_EOL;

echo PHP_EOL;
echo "=== Hasil Panjang String ===" . PHP_EOL;
echo "Panjang string 'Informatika' = " . panjangString("Informatika") . PHP_EOL;
echo "Panjang string 'Universitas' = " . panjangString("Universitas") . PHP_EOL;
?>