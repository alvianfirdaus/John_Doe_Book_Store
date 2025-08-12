<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;

class RatingsController extends Controller
{
    public function create(Request $r)
    {
        $authors = Author::orderBy('name')->pluck('name', 'id');
        $authorId = $r->input('author_id');
        $books = $authorId
            ? Book::where('author_id', $authorId)
                ->orderBy('title')
                ->pluck('title', 'id')
            : collect();

        return view('ratings.create', compact('authors', 'books', 'authorId'));
    }

    public function booksByAuthor(Author $author)
    {
        return Book::where('author_id', $author->id)
            ->orderBy('title')
            ->get(['id', 'title']);
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'author_id' => ['required', 'exists:authors,id'],
            'book_id'   => ['required', 'exists:books,id'],
            'score'     => ['required', 'integer', 'between:1,10'],
        ]);

        // Pastikan buku benar-benar milik author tersebut
        $valid = Book::where('id', $data['book_id'])
            ->where('author_id', $data['author_id'])
            ->exists();

        abort_unless($valid, 422, 'Book not authored by selected author.');

        Rating::create([
            'book_id' => $data['book_id'],
            'score'   => $data['score'],
        ]);

        return redirect()->route('books.index')->with('ok', 'Rating saved');
    }
}