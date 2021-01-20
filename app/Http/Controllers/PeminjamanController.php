<?php

namespace App\Http\Controllers;

use App\Book;
use App\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function show(Book $book)
    {

        json_decode($book);

        return $book;
    }

    public function pinjam(Book $book)
    {
        request()->validate([
            'returned_at' => 'required',
        ]);

        Peminjaman::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'returned_at' => request('returned_at')
        ]);

        $book->update([
            'jumlah' => $book->jumlah -= 1
        ]);

        alert()->success('Success', 'Peminjaman Sukses');
        return back();
    }
}
