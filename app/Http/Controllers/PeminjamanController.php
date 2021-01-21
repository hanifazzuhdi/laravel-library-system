<?php

namespace App\Http\Controllers;

use App\Book;
use App\Peminjaman;
use Carbon\Carbon;
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

        $data = Peminjaman::where('book_id', $book->id)->where('is_returned', 0)->get()->count();

        if ($data >= 1) {
            alert()->info('Gagal!', 'Anda memiliki daftar pinjaman dengan judul buku yang sama');
            return back();
        }

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

    public function kembalikan(Book $book)
    {
        $datas = Peminjaman::where('book_id', $book->id)->where('is_returned', 0)->firstOrfail();

        $datas->update([
            'is_returned' => true,
        ]);

        $book->update([
            'jumlah' => $book->jumlah += 1,
        ]);

        alert()->success('Success', 'Pengembalian Berhasil');
        return back();
    }

    public function historyPinjaman()
    {
        $datas = Peminjaman::with('book')->where('user_id', Auth::id())->where('is_returned', 0)->get();

        return view('pages.user.pinjaman', compact('datas'));
    }
}
