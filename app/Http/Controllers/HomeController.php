<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

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
        $datas = Book::simplePaginate(9);

        return view('pages.user.home', compact('datas'));
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
