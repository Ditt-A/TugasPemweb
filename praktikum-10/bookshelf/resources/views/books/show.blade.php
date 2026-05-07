<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Detail Buku
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Informasi lengkap buku yang dipilih.
                </p>
            </div>

            @auth
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('books.edit', $book) }}" class="inline-flex items-center justify-center rounded-md border border-blue-200 bg-white px-4 py-2 text-sm font-semibold text-blue-700 shadow-sm hover:bg-blue-50">
                        Edit
                    </a>
                    <form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center justify-center rounded-md border border-red-200 bg-white px-4 py-2 text-sm font-semibold text-red-700 shadow-sm hover:bg-red-50">
                            Hapus
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
                <div class="border-b border-gray-200 pb-5">
                    <h3 class="text-2xl font-semibold text-gray-900">{{ $book->judul }}</h3>
                    <p class="mt-2 text-sm text-gray-600">Ditulis oleh {{ $book->penulis }}</p>
                </div>

                <dl class="mt-6 grid gap-5 sm:grid-cols-3">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Kategori</dt>
                        <dd class="mt-1 text-base font-semibold text-gray-900">{{ $book->kategori ?: '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Tahun Terbit</dt>
                        <dd class="mt-1 text-base font-semibold text-gray-900">{{ $book->tahun_terbit }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Stok</dt>
                        <dd class="mt-1 text-base font-semibold text-gray-900">{{ $book->stok }}</dd>
                    </div>
                </dl>

                <div class="mt-8">
                    <h4 class="text-sm font-semibold uppercase text-gray-500">Deskripsi</h4>
                    <div class="mt-3 whitespace-pre-line text-gray-700">
                        {{ $book->deskripsi ?: 'Belum ada deskripsi.' }}
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ route('books.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
