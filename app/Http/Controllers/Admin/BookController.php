<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function validated(Request $request)
    {
        $data = request()->validate([
            'author_id' => 'required',
            'title' => 'required',
            'cover' => 'required',
            'isbn' => 'required',
            'short_description' => 'required',
            'jumlah' => 'required',
        ]);

        return $data;
    }

    public function index()
    {
        $datas = Book::with('author')->simplePaginate(9);
        $authors = Author::get();

        return view('pages.admin.books', compact('datas', 'authors'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        Book::create($data);

        return back()
            ->with('success', 'Buku Berhasil ditambahkan');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return back()
            ->with('success', 'Data Berhasil dihapus');
    }
}
