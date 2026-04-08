<?php
$prodi = [
    "teknik informatika",
    "teknik komputer",
    "ilmu komputer",
    "sistem informasi",
    "teknologi informasi",
    "pendidikan teknologi informasi"
];

echo "=== Indexed Array ===" . PHP_EOL;
foreach ($prodi as $item) {
    echo "- " . $item . PHP_EOL;
}

echo PHP_EOL;

$mahasiswa = [
    "nim" => "230101",
    "nama" => "Andi",
    "prodi" => "Teknik Informatika",
    "semester" => 4,
    "kampus" => "Universitas ABC"
];

echo "=== Associative Array ===" . PHP_EOL;
foreach ($mahasiswa as $key => $value) {
    echo $key . " : " . $value . PHP_EOL;
}
?>