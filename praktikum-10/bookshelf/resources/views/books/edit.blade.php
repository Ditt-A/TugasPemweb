<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Buku
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
                <form method="POST" action="{{ route('books.update', $book) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    @include('books.form', ['book' => $book, 'submitLabel' => 'Perbarui Buku'])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
