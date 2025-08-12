<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function index(Request $req)
    {
        $limit = (int) $req->input('limit', 10);
        if ($limit < 10 || $limit > 100) {
            $limit = 10;
        }

        $q = trim($req->input('q', ''));

        $books = Book::query()
            ->with(['author:id,name', 'category:id,name'])
            ->leftJoin('ratings', 'ratings.book_id', '=', 'books.id')
            ->select(
                'books.id',
                'books.title',
                'books.author_id',
                'books.category_id',
                'books.created_at',
                'books.updated_at',
                DB::raw('COALESCE(AVG(ratings.score), 0) as avg_rating'),
                DB::raw('COUNT(ratings.id) as voters')
            )
            ->when($q, function ($builder) use ($q) {
                $builder->where('books.title', 'like', "%$q%")
                    ->orWhereHas('author', fn($a) => $a->where('name', 'like', "%$q%"));
            })
            ->groupBy(
                'books.id',
                'books.title',
                'books.author_id',
                'books.category_id',
                'books.created_at',
                'books.updated_at'
            )
            ->orderByDesc('avg_rating')
            ->limit($limit)
            ->get();

        return view('books.index', compact('books', 'limit', 'q'));
    }
}
