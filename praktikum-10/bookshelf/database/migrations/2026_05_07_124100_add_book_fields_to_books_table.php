<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            if (! Schema::hasColumn('books', 'judul')) {
                $table->string('judul')->after('id');
            }

            if (! Schema::hasColumn('books', 'penulis')) {
                $table->string('penulis')->after('judul');
            }

            if (! Schema::hasColumn('books', 'kategori')) {
                $table->string('kategori', 100)->nullable()->after('penulis');
            }

            if (! Schema::hasColumn('books', 'tahun_terbit')) {
                $table->unsignedSmallInteger('tahun_terbit')->after('kategori');
            }

            if (! Schema::hasColumn('books', 'stok')) {
                $table->unsignedInteger('stok')->default(0)->after('tahun_terbit');
            }

            if (! Schema::hasColumn('books', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('stok');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $columns = [
                'judul',
                'penulis',
                'kategori',
                'tahun_terbit',
                'stok',
                'deskripsi',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('books', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
