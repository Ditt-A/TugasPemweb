<?php
class Mahasiswa {
    public $nim;
    public $nama;
    public $prodi;

    public function __construct($nim, $nama, $prodi) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
    }

    public function kuliah() {
        return $this->nama . " sedang mengikuti kuliah.";
    }

    public function ujian() {
        return $this->nama . " sedang mengikuti ujian.";
    }

    public function praktikum() {
        return $this->nama . " sedang mengikuti praktikum.";
    }
}

$mhs1 = new Mahasiswa("230101", "Andi", "Teknik Informatika");
$mhs2 = new Mahasiswa("230102", "Siti", "Sistem Informasi");

echo "=== Data Mahasiswa 1 ===" . PHP_EOL;
echo "NIM   : " . $mhs1->nim . PHP_EOL;
echo "Nama  : " . $mhs1->nama . PHP_EOL;
echo "Prodi : " . $mhs1->prodi . PHP_EOL;
echo $mhs1->kuliah() . PHP_EOL;
echo $mhs1->ujian() . PHP_EOL;
echo $mhs1->praktikum() . PHP_EOL;

echo PHP_EOL;

echo "=== Data Mahasiswa 2 ===" . PHP_EOL;
echo "NIM   : " . $mhs2->nim . PHP_EOL;
echo "Nama  : " . $mhs2->nama . PHP_EOL;
echo "Prodi : " . $mhs2->prodi . PHP_EOL;
echo $mhs2->kuliah() . PHP_EOL;
echo $mhs2->ujian() . PHP_EOL;
echo $mhs2->praktikum() . PHP_EOL;
?>