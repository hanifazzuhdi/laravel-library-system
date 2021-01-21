<?php

namespace App\Http\Controllers;

use App\Book;
use App\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas = Book::with('author')->simplePaginate(9);

        $pinjaman = Peminjaman::with('book')->where('user_id', Auth::id())->where('is_returned', 0)->get();

        return view('pages.user.home', compact('datas', 'pinjaman'));
    }

    public function cari(Book $book)
    {
        $data = request()->validate([
            'keyword' => 'required'
        ]);

        $datas = Book::where('title', 'LIKE', "%$data[keyword]%")->orWhere('isbn', 'LIKE', "%$data[keyword]%")->simplePaginate(9);

        return view('pages.user.home', compact('datas'));
    }
}
