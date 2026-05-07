<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_book_list_and_detail(): void
    {
        $book = Book::create($this->bookData());

        $this->get('/books')->assertOk()->assertSee($book->judul);
        $this->get(route('books.show', $book))->assertOk()->assertSee($book->penulis);
    }

    public function test_guest_is_redirected_to_login_for_protected_book_pages(): void
    {
        $book = Book::create($this->bookData());

        $this->get(route('books.create'))->assertRedirect('/login');
        $this->get(route('books.edit', $book))->assertRedirect('/login');
        $this->delete(route('books.destroy', $book))->assertRedirect('/login');
    }

    public function test_authenticated_user_can_create_update_and_delete_book(): void
    {
        $user = User::factory()->create();

        $createResponse = $this->actingAs($user)->post(route('books.store'), $this->bookData([
            'judul' => 'Buku Baru',
        ]));

        $createResponse->assertRedirect(route('books.index', absolute: false));
        $this->assertDatabaseHas('books', ['judul' => 'Buku Baru']);

        $book = Book::where('judul', 'Buku Baru')->firstOrFail();

        $updateResponse = $this->actingAs($user)->put(route('books.update', $book), $this->bookData([
            'judul' => 'Buku Diperbarui',
            'stok' => 7,
        ]));

        $updateResponse->assertRedirect(route('books.index', absolute: false));
        $this->assertDatabaseHas('books', ['judul' => 'Buku Diperbarui', 'stok' => 7]);

        $deleteResponse = $this->actingAs($user)->delete(route('books.destroy', $book));

        $deleteResponse->assertRedirect(route('books.index', absolute: false));
        $this->assertDatabaseMissing('books', ['judul' => 'Buku Diperbarui']);
    }

    private function bookData(array $overrides = []): array
    {
        return array_merge([
            'judul' => 'Laravel Dasar',
            'penulis' => 'Andi Pratama',
            'kategori' => 'Pemrograman',
            'tahun_terbit' => 2024,
            'stok' => 5,
            'deskripsi' => 'Panduan belajar Laravel untuk pemula.',
        ], $overrides);
    }
}
