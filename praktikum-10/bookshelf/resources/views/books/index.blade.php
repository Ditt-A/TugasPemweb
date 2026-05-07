<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Katalog Buku
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Daftar buku yang tersedia di BookShelf.
                </p>
            </div>

            @auth
                <a href="{{ route('books.create') }}" class="inline-flex items-center justify-center rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Tambah Buku
                </a>
            @else
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-700">
                        Register
                    </a>
                </div>
            @endauth
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Judul</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Penulis</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Kategori</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Tahun</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Stok</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-semibold uppercase text-gray-500">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse ($books as $book)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <a href="{{ route('books.show', $book) }}" class="font-semibold text-gray-900 hover:text-gray-700">
                                            {{ $book->judul }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $book->penulis }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $book->kategori ?: '-' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $book->tahun_terbit }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $book->stok }}</td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <div class="flex flex-wrap items-center justify-end gap-2">
                                            <a href="{{ route('books.show', $book) }}" class="rounded-md border border-gray-300 px-3 py-1.5 font-medium text-gray-700 hover:bg-gray-50">
                                                Detail
                                            </a>
                                            @auth
                                                <a href="{{ route('books.edit', $book) }}" class="rounded-md border border-blue-200 px-3 py-1.5 font-medium text-blue-700 hover:bg-blue-50">
                                                    Edit
                                                </a>
                                                <form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="rounded-md border border-red-200 px-3 py-1.5 font-medium text-red-700 hover:bg-red-50">
                                                        Hapus
                                                    </button>
                                                </form>
                                            @endauth
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">
                                        Belum ada data buku.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
