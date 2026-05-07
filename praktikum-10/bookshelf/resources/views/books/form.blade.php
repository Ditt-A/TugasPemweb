@php
    $book = $book ?? null;
    $submitLabel = $submitLabel ?? 'Simpan';
@endphp

<div>
    <x-input-label for="judul" value="Judul" />
    <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full" :value="old('judul', $book?->judul)" required autofocus />
    <x-input-error class="mt-2" :messages="$errors->get('judul')" />
</div>

<div>
    <x-input-label for="penulis" value="Penulis" />
    <x-text-input id="penulis" name="penulis" type="text" class="mt-1 block w-full" :value="old('penulis', $book?->penulis)" required />
    <x-input-error class="mt-2" :messages="$errors->get('penulis')" />
</div>

<div>
    <x-input-label for="kategori" value="Kategori" />
    <x-text-input id="kategori" name="kategori" type="text" class="mt-1 block w-full" :value="old('kategori', $book?->kategori)" maxlength="100" />
    <x-input-error class="mt-2" :messages="$errors->get('kategori')" />
</div>

<div class="grid gap-6 sm:grid-cols-2">
    <div>
        <x-input-label for="tahun_terbit" value="Tahun Terbit" />
        <x-text-input id="tahun_terbit" name="tahun_terbit" type="number" min="1900" max="{{ now()->year }}" class="mt-1 block w-full" :value="old('tahun_terbit', $book?->tahun_terbit)" required />
        <x-input-error class="mt-2" :messages="$errors->get('tahun_terbit')" />
    </div>

    <div>
        <x-input-label for="stok" value="Stok" />
        <x-text-input id="stok" name="stok" type="number" min="0" class="mt-1 block w-full" :value="old('stok', $book?->stok)" required />
        <x-input-error class="mt-2" :messages="$errors->get('stok')" />
    </div>
</div>

<div>
    <x-input-label for="deskripsi" value="Deskripsi" />
    <textarea id="deskripsi" name="deskripsi" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('deskripsi', $book?->deskripsi) }}</textarea>
    <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
</div>

<div class="flex items-center justify-end gap-3">
    <a href="{{ route('books.index') }}" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50">
        Batal
    </a>
    <x-primary-button>
        {{ $submitLabel }}
    </x-primary-button>
</div>
