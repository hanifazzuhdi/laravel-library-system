<?php

namespace App\Http\Controllers;

use App\Book;
use App\Events\UserPinjam;
use App\Notifications\KembalikanBuku;
use App\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // For Ajax
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

        $data = Peminjaman::belumKembali()->where('book_id', $book->id)->get()->count();

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

        event(new UserPinjam($book));

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

        $user = Auth::user();
        $user->notify(new KembalikanBuku());

        alert()->success('Success', 'Pengembalian Berhasil');
        return back();
    }

    public function historyPinjaman()
    {
        $datas = Peminjaman::with('book')->where('user_id', Auth::id())->where('is_returned', 0)->get();

        return view('pages.user.pinjaman', compact('datas'));
    }
}
