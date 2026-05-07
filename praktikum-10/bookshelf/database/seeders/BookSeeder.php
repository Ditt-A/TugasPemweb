<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'judul' => 'Laravel Dasar',
                'penulis' => 'Andi Pratama',
                'kategori' => 'Pemrograman',
                'tahun_terbit' => 2023,
                'stok' => 12,
                'deskripsi' => 'Panduan awal untuk memahami route, controller, Blade, dan Eloquent di Laravel.',
            ],
            [
                'judul' => 'Pemrograman Web',
                'penulis' => 'Siti Rahma',
                'kategori' => 'Web',
                'tahun_terbit' => 2022,
                'stok' => 8,
                'deskripsi' => 'Buku pengantar HTML, CSS, JavaScript, dan konsep dasar aplikasi web dinamis.',
            ],
            [
                'judul' => 'Basis Data',
                'penulis' => 'Budi Santoso',
                'kategori' => 'Database',
                'tahun_terbit' => 2021,
                'stok' => 10,
                'deskripsi' => 'Membahas perancangan basis data, normalisasi, SQL, dan relasi antar tabel.',
            ],
            [
                'judul' => 'Algoritma dan Struktur Data',
                'penulis' => 'Dewi Lestari',
                'kategori' => 'Ilmu Komputer',
                'tahun_terbit' => 2020,
                'stok' => 6,
                'deskripsi' => 'Materi dasar algoritma, array, linked list, stack, queue, tree, dan graph.',
            ],
            [
                'judul' => 'Sistem Informasi Manajemen',
                'penulis' => 'Rudi Hartono',
                'kategori' => 'Sistem Informasi',
                'tahun_terbit' => 2019,
                'stok' => 9,
                'deskripsi' => 'Pengantar penggunaan sistem informasi untuk mendukung pengambilan keputusan organisasi.',
            ],
        ];

        foreach ($books as $book) {
            Book::updateOrCreate(
                ['judul' => $book['judul']],
                $book
            );
        }
    }
}
